<?php

namespace App\Exports;

use App\Product;
use Maatwebsite\Excel\Concerns\FromCollection;
use DB;
use Maatwebsite\Excel\Concerns\WithHeadings;
class ExportProducts implements FromCollection,WithHeadings
{
    public function collection()
    {
    
         $business_id = request()->session()->get('user.business_id');

         $location_id ='none';
         $query = Product::leftJoin('brands', 'products.brand_id', '=', 'brands.id')
                ->join('units', 'products.unit_id', '=', 'units.id')
                ->leftJoin('categories as c1', 'products.category_id', '=', 'c1.id')
                ->leftJoin('categories as c2', 'products.sub_category_id', '=', 'c2.id')
                ->leftJoin('tax_rates', 'products.tax', '=', 'tax_rates.id')
                ->join('variations as v', 'v.product_id', '=', 'products.id')
                ->leftJoin('variation_location_details as vld', 'vld.variation_id', '=', 'v.id')
                ->leftJoin('business_locations as bl', 'vld.location_id', '=', 'bl.id')
                ->leftJoin('product_racks as racks', 'racks.product_id', '=', 'products.id')
                ->leftJoin('purchase_lines as pl', 'pl.product_id', '=', 'products.id')
                ->where('products.business_id', $business_id)
                ->where('products.type', '!=', 'modifier');
                $products = $query->select(
                'products.name as product',                             //1
                'brands.name as brand',                                 //2
                'units.actual_name as unit',                            //3
                'c1.name as category',                                  //4
                'c2.name as sub_category',                              //5
                'products.sku',                                         //6
                'products.barcode_type',                                //7
                'products.enable_stock',                                //8
                'products.alert_quantity',                              //9
                'products.expiry_period',                               //10
                'products.expiry_period_type',                          //11
                'tax_rates.name as tax',                                //12
                'products.tax_type',                                    //13
                'products.type',                                        //14
               
                'v.name as variation_name',                             //15
                DB::raw('GROUP_CONCAT(v.name SEPARATOR "|") as variation_values'), //16
                DB::raw('GROUP_CONCAT(v.dpp_inc_tax SEPARATOR "|") as dpp_inc_tax'), //17
                DB::raw('GROUP_CONCAT(v.default_purchase_price SEPARATOR "|") as default_purchase_price'), //18
                DB::raw('GROUP_CONCAT(v.profit_percent SEPARATOR "|") as profit_percent'), //19
                DB::raw('GROUP_CONCAT(v.sell_price_inc_tax SEPARATOR "|") as selling_price'), //20
                
                
                DB::raw('GROUP_CONCAT(vld.qty_available SEPARATOR "|")as oppening_stock'), //21
                'bl.name as location_name',                         //22
                DB::raw('MAX(pl.exp_date) as exp_date'), //23
                'products.enable_sr_no',//24
                'products.weight',//25  
                 DB::raw('GROUP_CONCAT(racks.rack SEPARATOR "|") as rack'), //26
                 DB::raw('GROUP_CONCAT(racks.row SEPARATOR "|") as row'), //27
                 DB::raw('GROUP_CONCAT(racks.position SEPARATOR "|") as position'), //28
                'products.image',                                                   //29
                'products.product_description',//30
                 'products.product_custom_field1',//32
                'products.product_custom_field2',//33
                'products.product_custom_field3',//34
                'products.product_custom_field4',//34
                'products.not_for_selling',//35
               DB::raw('GROUP_CONCAT(bl.name SEPARATOR "|") as location_names') //36
                )->groupBy('products.id')->get();
          
                return $products; //DB::table('products')->where('business_id',$business_id)->get();
    }
    public function headings(): array
    {
        return ["product", "brand", "unit", "category", "sub_category", "sku", "barcode_type", "enable_stock", "alert_quantity", "expiry_period",
        "expiry_period_type", "tax", "tax_type", "type", "variation_name", "variation_values", "dpp_inc_tax", "default_purchase_price", "profit_percent",
        "max_price", "current_stock", "location_name", "exp_date", "enable_sr_no", "weight", "rack", "row", "position", "image", "product_description", "product_custom_field1", 
        "product_custom_field2", "product_custom_field3", "product_custom_field4", "not_for_selling", "location_names"];
    }
}