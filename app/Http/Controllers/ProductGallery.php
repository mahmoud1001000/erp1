<?php

namespace  App\Http\Controllers;

use App\Brands;
use App\busines_slug;
use App\Business;
use App\BusinessLocation;
use App\Category;
use App\Currency;
use App\Media;
use App\price_currencies;
use App\Product;
use App\product_barcode;
use App\ProductVariation;
use App\PurchaseLine;
use App\SellingPriceGroup;
use App\TaxRate;
use App\Unit;
use App\Utils\ModuleUtil;
use App\Utils\ProductUtil;
use App\Variation;
use App\VariationGroupPrice;
use App\VariationLocationDetails;
use App\VariationTemplate;
use App\Warranty;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Excel;
use Stripe\Checkout\Session;
use Stripe\File;
use Yajra\DataTables\Facades\DataTables;


class ProductGallery extends Controller
{
    /**
     * All Utils instance.
     *
     */
    protected $productUtil;
    protected $moduleUtil;

    private $barcode_types;

    /**
     * Constructor
     *
     * @param ProductUtils $product
     * @return void
     */
    public function __construct(ProductUtil $productUtil, ModuleUtil $moduleUtil)
    {
        $this->productUtil = $productUtil;
        $this->moduleUtil = $moduleUtil;

        //barcode types
        $this->barcode_types = $this->productUtil->barcode_types();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function gallery()
    {

        if (!auth()->user()->can('product.view') && !auth()->user()->can('product.create')) {
            abort(403, 'Unauthorized action.');
        }
        $business_id = request()->session()->get('user.business_id');
        $selling_price_group_count = SellingPriceGroup::countSellingPriceGroups($business_id);





        if (request()->ajax()) {

            $query = Product::with(['media'])
                ->leftJoin('brands', 'products.brand_id', '=', 'brands.id')
                ->join('units', 'products.unit_id', '=', 'units.id')
                ->leftJoin('categories as c1', 'products.category_id', '=', 'c1.id')
                ->leftJoin('categories as c2', 'products.sub_category_id', '=', 'c2.id')
                ->leftJoin('tax_rates', 'products.tax', '=', 'tax_rates.id')
                ->join('variations as v', 'v.product_id', '=', 'products.id')
                ->leftJoin('variation_location_details as vld', 'vld.variation_id', '=', 'v.id')
                ->where('products.business_id', $business_id)
                ->where('products.type', '!=', 'modifier');

            //Filter by location
            $location_id = request()->get('location_id', null);
            $permitted_locations = auth()->user()->permitted_locations();

            if (!empty($location_id) && $location_id != 'none') {
                if ($permitted_locations == 'all' || in_array($location_id, $permitted_locations)) {
                    $query->whereHas('product_locations', function ($query) use ($location_id) {
                        $query->where('product_locations.location_id', '=', $location_id);
                    });
                }
            } elseif ($location_id == 'none') {
                $query->doesntHave('product_locations');
            } else {
                if ($permitted_locations != 'all') {
                    $query->whereHas('product_locations', function ($query) use ($permitted_locations) {
                        $query->whereIn('product_locations.location_id', $permitted_locations);
                    });
                } else {
                    $query->with('product_locations');
                }
            }

            $offset = request()->get('offset', 0);
            $products = $query->select(
                'products.id',
                'products.name as product',
                'products.type',
                'c1.name as category',
                'c2.name as sub_category',
                'units.actual_name as unit',
                'brands.name as brand',
                'tax_rates.name as tax',
                'products.sku',
                'products.image',
                'products.enable_stock',
                'products.is_inactive',
                'products.not_for_selling',
                'products.product_custom_field1',
                'products.product_custom_field2',
                'products.product_custom_field3',
                'products.product_custom_field4',
                DB::raw('SUM(vld.qty_available) as current_stock'),
                DB::raw('MAX(v.sell_price_inc_tax) as max_price'),
                DB::raw('MIN(v.sell_price_inc_tax) as min_price'),
                DB::raw('MAX(v.dpp_inc_tax) as max_purchase_price'),
                DB::raw('MIN(v.dpp_inc_tax) as min_purchase_price')

            )->orderBy('products.name') ->groupBy('products.id')->offset( $offset)
                ->limit(12);

            $productname = request()->get('productname', null);
            $products->where('products.name','like','%'.$productname.'%');


            $type = request()->get('type', null);
            if (!empty($type)) {
                $products->where('products.type', $type);
            }
            $image_type = request()->get('image_type', null);
            if ($image_type=='default') {
                $products->whereNull('products.image');
            }
            if ($image_type=='image') {
                $products->where('products.image','!=', '');
            }


            $current_stock = request()->get('current_stock', null);
            //dd($products);
            if ($current_stock=='zero') {
                $products->having('current_stock', '0');
            }
            if ($current_stock=='gtzero') {
                $products->having('current_stock','>', 0);
            }
            if ($current_stock=='lszero') {
                $products->having('current_stock','<', 0);
            }

            $category_id = request()->get('category_id', null);
            if (!empty($category_id)) {
                $products->where('products.category_id', $category_id);
            }

            $brand_id = request()->get('brand_id', null);
            if (!empty($brand_id)) {
                $products->where('products.brand_id', $brand_id);
            }

            $unit_id = request()->get('unit_id', null);
            if (!empty($unit_id)) {
                $products->where('products.unit_id', $unit_id);
            }

            $tax_id = request()->get('tax_id', null);
            if (!empty($tax_id)) {
                $products->where('products.tax', $tax_id);
            }

            $active_state = request()->get('active_state', null);
            if ($active_state == 'active') {
                $products->Active();
            }
            if ($active_state == 'inactive') {
                $products->Inactive();
            }
            $not_for_selling = request()->get('not_for_selling', null);
            if ($not_for_selling == 'true') {
                $products->ProductNotForSales();
            }

            $woocommerce_enabled = request()->get('woocommerce_enabled', 0);
            if ($woocommerce_enabled == 1) {
                $products->where('products.woocommerce_disable_sync', 0);
            }

            if (!empty(request()->get('repair_model_id'))) {
                $products->where('products.repair_model_id', request()->get('repair_model_id'));
            }

            $products=$products->get();
            //added just for limte number of product
            $output['product'] = view('product_gallery.product', ['products'=>$products,'from'=>'gallery'])->render();
            $output['count']=$products->count();

           return $output;

        }

        $rack_enabled = (request()->session()->get('business.enable_racks') || request()->session()->get('business.enable_row') || request()->session()->get('business.enable_position'));

        $categories = Category::forDropdown($business_id, 'product');

        $brands = Brands::forDropdown($business_id);

        $units = Unit::forDropdown($business_id);

        $tax_dropdown = TaxRate::forBusinessDropdown($business_id, false);
        $taxes = $tax_dropdown['tax_rates'];

        $business_locations = BusinessLocation::forDropdown($business_id);
        $business_locations->prepend(__('lang_v1.none'), 'none');

        if ($this->moduleUtil->isModuleInstalled('Manufacturing') && (auth()->user()->can('superadmin') || $this->moduleUtil->hasThePermissionInSubscription($business_id, 'manufacturing_module'))) {
            $show_manufacturing_data = true;
        } else {
            $show_manufacturing_data = false;
        }

        //list product screen filter from module
        $pos_module_data = $this->moduleUtil->getModuleData('get_filters_for_list_product_screen');

        $is_woocommerce = $this->moduleUtil->isModuleInstalled('Woocommerce');





        return view('product_gallery.index')
            ->with(compact(
                'rack_enabled',
                'categories',
                'brands',
                'units',
                'taxes',
                'business_locations',
                'show_manufacturing_data',
                'pos_module_data',
                'is_woocommerce'
            ));


        }


    public function inventory()
    {
       $business_id =busines_slug::business(request()->slug);


      /* $selling_price_group_count = SellingPriceGroup::countSellingPriceGroups($business_id);*/

      if (request()->ajax()) {
          $query = Product::with(['media'])
                ->leftJoin('brands', 'products.brand_id', '=', 'brands.id')
                ->join('units', 'products.unit_id', '=', 'units.id')
                ->leftJoin('categories as c1', 'products.category_id', '=', 'c1.id')
                ->leftJoin('categories as c2', 'products.sub_category_id', '=', 'c2.id')
                ->leftJoin('tax_rates', 'products.tax', '=', 'tax_rates.id')
                ->join('variations as v', 'v.product_id', '=', 'products.id')
                ->leftJoin('variation_location_details as vld', 'vld.variation_id', '=', 'v.id')
                ->where('products.business_id', $business_id)
                ->where('products.type', '!=', 'modifier');

                $query->with('product_locations');


            $offset = request()->get('offset', 0);
            $products = $query->select(
                'products.id',
                'products.name as product',
                'products.type',
                'c1.name as category',
                'c2.name as sub_category',
                'units.actual_name as unit',
                'brands.name as brand',
                'tax_rates.name as tax',
                'products.sku',
                'products.image',
                'products.enable_stock',
                'products.is_inactive',
                'products.not_for_selling',
                'products.product_custom_field1',
                'products.product_custom_field2',
                'products.product_custom_field3',
                'products.product_custom_field4',
                DB::raw('MAX(v.sell_price_inc_tax) as max_price'),
                DB::raw('MIN(v.sell_price_inc_tax) as min_price'),
                DB::raw('MAX(v.dpp_inc_tax) as max_purchase_price'),
                DB::raw('MIN(v.dpp_inc_tax) as min_purchase_price')

            )->orderBy('products.name') ->groupBy('products.id')->offset( $offset)
                ->limit(12);

            $productname = request()->get('productname', null);
            $products->where('products.name','like','%'.$productname.'%');


            $type = request()->get('type', null);
            if (!empty($type)) {
                $products->where('products.type', $type);
            }

            $category_id = request()->get('category_id', null);
            if (!empty($category_id)) {
                $products->where('products.category_id', $category_id);
            }

            $brand_id = request()->get('brand_id', null);
            if (!empty($brand_id)) {
                $products->where('products.brand_id', $brand_id);
            }

            $unit_id = request()->get('unit_id', null);
            if (!empty($unit_id)) {
                $products->where('products.unit_id', $unit_id);
            }
            $location_id = request()->get('location_id', null);
            if (!empty($location_id)) {
                $products->where('vld.location_id', $location_id);
            }


            $products=$products->get();
            //added just for limte number of product
            $output['product'] = view('product_gallery.product', ['products'=>$products,'from'=>'inventory'])->render();
            $output['count']=$products->count();

            return $output;

        }


        $categories = Category::forDropdown($business_id, 'product');

        $brands = Brands::forDropdown($business_id);

        $units = Unit::forDropdown($business_id);

        $business_locations  = BusinessLocation::where('business_id', $business_id)->Active()->pluck('name', 'id');
        $business_locations->prepend(__('report.all_locations'), '');
        /*total products */


        return view('product_gallery.inventory')
            ->with(compact(
                  'categories',
                'brands',
                'units',
                'business_locations'

            ));


    }


    public function setting(){

        return view('product_gallery.setting');
    }


    public function update(Request $request)
    {
        if (!auth()->user()->can('product.gallary')) {
            abort(403, 'Unauthorized action.');
        }

        $business_id = request()->session()->get('user.business_id');
        $request->validate([
          'slug'=>['required', 'string', 'max:5','min:3', 'unique:busines_slugs']
       ],
       [
       'slug.unique'=>'عفوا هذا المسار موجود برجاء تغييرة!!!',
       'slug.min'=>'يجب أن يحتوي النص على الأقل 3 أحرف!!!',
       'slug.max'=>'لا يمكن أن يحتوي النص  على أكثر من 5 حرف(أحرف).!!!',
       ]);

        $data=busines_slug::updateOrCreate(['business_id'=>$business_id],
            [
            'business_id'=>$business_id,
            'slug'=>$request->slug,
        ]);
        $data->save();
        return redirect('/gallery/gallery');

    }


    public function singlproduct(Request $request){

        $product_id=$request->id;
        $product=Product::findorfail($product_id);




        $output=$request->id;
        return view('product_gallery.singlproduct',['product'=>$product]);
    }

    public function stock_report(Request $request){
       if (!auth()->user()->can('product.view') && !auth()->user()->can('product.create')) {
                abort(403, 'Unauthorized action.');
            }
            $business_id = request()->session()->get('user.business_id');
            $selling_price_group_count = SellingPriceGroup::countSellingPriceGroups($business_id);





            if (request()->ajax()) {

                $query = Product::with(['media'])
                    ->leftJoin('brands', 'products.brand_id', '=', 'brands.id')
                    ->leftJoin('categories as c1', 'products.category_id', '=', 'c1.id')
                    ->leftJoin('categories as c2', 'products.sub_category_id', '=', 'c2.id')
                    ->join('variations as v', 'v.product_id', '=', 'products.id')
                    ->where('products.business_id', $business_id)
                    ->where('products.type', '!=', 'modifier');

                if($request->pricegroup>0){
                    $query->leftJoin('variation_group_prices','v.id','=','variation_group_prices.variation_id')
                        ->leftJoin('selling_price_groups','selling_price_groups.id','=','variation_group_prices.price_group_id');
                      }

                //Filter by location
                $location_id = request()->get('location_id', null);
                $permitted_locations = auth()->user()->permitted_locations();

                if (!empty($location_id) && $location_id != 'none') {
                    if ($permitted_locations == 'all' || in_array($location_id, $permitted_locations)) {
                        $query->whereHas('product_locations', function ($query) use ($location_id) {
                            $query->where('product_locations.location_id', '=', $location_id);
                        });
                    }
                } elseif ($location_id == 'none') {
                    $query->doesntHave('product_locations');
                } else {
                    if ($permitted_locations != 'all') {
                        $query->whereHas('product_locations', function ($query) use ($permitted_locations) {
                            $query->whereIn('product_locations.location_id', $permitted_locations);
                        });
                    } else {
                        $query->with('product_locations');
                    }
                }

                $offset = request()->get('offset', 0);
                $products = $query->select(
                    'products.id',
                    'products.name as product',
                    'products.type',
                    'c1.name as category',
                    'c2.name as sub_category',
                    'brands.name as brand',
                    'products.sku',
                    'products.image',
                    'v.name as variationname',
                    'v.sell_price_inc_tax as max_price',
                    'v.sell_price_inc_tax  as min_price' ,
                    'v.dpp_inc_tax  as max_purchase_price' ,
                    'v.dpp_inc_tax  as min_purchase_price'


                )->orderBy('products.name');


                if($request->pricegroup>0) {
                    $products->addSelect(
                        'variation_group_prices.price_inc_tax as groupprice',
                        'selling_price_groups.name as groupname'
                    );

                    $products->orderBy('groupname');
                }
                $productname = request()->get('productname', null);


                $products->where('products.name','like','%'.$productname.'%');

           if( $request->pricegroup>0)
               $products->where('variation_group_prices.price_group_id', $request->pricegroup);

                $type = request()->get('type', null);
                if (!empty($type)) {
                    $products->where('products.type', $type);
                }
                $image_type = request()->get('image_type', null);
                if ($image_type=='default') {
                    $products->whereNull('products.image');
                }
                if ($image_type=='image') {
                    $products->where('products.image','!=', '');
                }


                $current_stock = request()->get('current_stock', null);
                //dd($products);
                if ($current_stock=='zero') {
                    $products->having('current_stock', '0');
                }
                if ($current_stock=='gtzero') {
                    $products->having('current_stock','>', 0);
                }
                if ($current_stock=='lszero') {
                    $products->having('current_stock','<', 0);
                }

                $category_id = request()->get('category_id', null);
                if (!empty($category_id)) {
                    $products->where('products.category_id', $category_id);
                }

                $brand_id = request()->get('brand_id', null);
                if (!empty($brand_id)) {
                    $products->where('products.brand_id', $brand_id);
                }

                $unit_id = request()->get('unit_id', null);
                if (!empty($unit_id)) {
                    $products->where('products.unit_id', $unit_id);
                }

                $tax_id = request()->get('tax_id', null);
                if (!empty($tax_id)) {
                    $products->where('products.tax', $tax_id);
                }

                $active_state = request()->get('active_state', null);
                if ($active_state == 'active') {
                    $products->Active();
                }
                if ($active_state == 'inactive') {
                    $products->Inactive();
                }
                $not_for_selling = request()->get('not_for_selling', null);
                if ($not_for_selling == 'true') {
                    $products->ProductNotForSales();
                }

                $woocommerce_enabled = request()->get('woocommerce_enabled', 0);
                if ($woocommerce_enabled == 1) {
                    $products->where('products.woocommerce_disable_sync', 0);
                }

                if (!empty(request()->get('repair_model_id'))) {
                    $products->where('products.repair_model_id', request()->get('repair_model_id'));
                }

                $products=$products->get();
                //added just for limte number of product
                $output['product'] = view('product_gallery.partials.stock_report', ['products'=>$products,'from'=>'gallery'])->render();
                $output['count']=$products->count();

                return $output;

            }

            $rack_enabled = (request()->session()->get('business.enable_racks') || request()->session()->get('business.enable_row') || request()->session()->get('business.enable_position'));

            $categories = Category::forDropdown($business_id, 'product');

            $brands = Brands::forDropdown($business_id);

            $units = Unit::forDropdown($business_id);

            $tax_dropdown = TaxRate::forBusinessDropdown($business_id, false);
            $taxes = $tax_dropdown['tax_rates'];

            $business_locations = BusinessLocation::forDropdown($business_id);
            $business_locations->prepend(__('lang_v1.none'), 'none');

            if ($this->moduleUtil->isModuleInstalled('Manufacturing') && (auth()->user()->can('superadmin') || $this->moduleUtil->hasThePermissionInSubscription($business_id, 'manufacturing_module'))) {
                $show_manufacturing_data = true;
            } else {
                $show_manufacturing_data = false;
            }

            //list product screen filter from module
            $pos_module_data = $this->moduleUtil->getModuleData('get_filters_for_list_product_screen');

            $is_woocommerce = $this->moduleUtil->isModuleInstalled('Woocommerce');



           $price_groups = SellingPriceGroup::where('business_id', $business_id)->active()->pluck('name', 'id');
           $price_groups->prepend('السعر الأساسي',0);


        return view('product_gallery.stock_report')
                ->with(compact(
                    'rack_enabled',
                    'categories',
                    'brands',
                    'units',
                    'taxes',
                    'business_locations',
                    'show_manufacturing_data',
                    'pos_module_data',
                    'is_woocommerce','price_groups'
                ));


        }

    public function export(Request $request){

        $data=Product::get();


return \Maatwebsite\Excel\Facades\Excel::download($data,'data.xlsx');




     }

 }
