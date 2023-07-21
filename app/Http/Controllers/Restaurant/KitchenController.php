<?php

namespace App\Http\Controllers\Restaurant;

use App\BusinessLocation;
use App\Product;
use App\Restaurant\kitchen;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

use App\Transaction;
use App\TransactionSellLine;

use App\Utils\Util;

use App\Utils\RestaurantUtil;
class KitchenController extends Controller
{
    /**
     * All Utils instance.
     *
     */
    protected $commonUtil;
    protected $restUtil;

    /**
     * Constructor
     *
     * @param Util $commonUtil
     * @param RestaurantUtil $restUtil
     * @return void
     */
    public function __construct(Util $commonUtil, RestaurantUtil $restUtil)
    {
        $this->commonUtil = $commonUtil;
        $this->restUtil = $restUtil;
    }

    /**
     * Display a listing of the resource.
     * @return Response
     */


    /**
     * Marks an order as cooked
     * @return json $output
     */
    public function markAsCooked($id)
    {
        // if (!auth()->user()->can('sell.update')) {
        //     abort(403, 'Unauthorized action.');
        // }
        try {
            $business_id = request()->session()->get('user.business_id');
            $sl = TransactionSellLine::leftJoin('transactions as t', 't.id', '=', 'transaction_sell_lines.transaction_id')
                        ->where('t.business_id', $business_id)
                        ->where('transaction_id', $id)
                        ->where(function($q) {
                            $q->whereNull('res_line_order_status')
                                ->orWhere('res_line_order_status', 'received');
                        })
                        ->update(['res_line_order_status' => 'cooked']);

            $output = ['success' => 1,
                            'msg' => trans("restaurant.order_successfully_marked_cooked")
                        ];
        } catch (\Exception $e) {
            \Log::emergency("File:" . $e->getFile(). "Line:" . $e->getLine(). "Message:" . $e->getMessage());
            
            $output = ['success' => 0,
                            'msg' => trans("messages.something_went_wrong")
                        ];
        }

        return $output;
    }

    /**
     * Retrives fresh orders
     *
     * @return Json $output
     */
    public function refreshOrdersList(Request $request)
    {

        // if (!auth()->user()->can('sell.view')) {
        //     abort(403, 'Unauthorized action.');
        // }
        $business_id = request()->session()->get('user.business_id');
        $orders_for = $request->orders_for;
        $filter = [];
        $service_staff_id = request()->session()->get('user.id');

        if (!$this->restUtil->is_service_staff($service_staff_id) && !empty($request->input('service_staff_id'))) {
            $service_staff_id = $request->input('service_staff_id');
        }

        if ($orders_for == 'kitchen') {
            $filter['line_order_status'] = 'received';
        } elseif ($orders_for == 'waiter') {
            $filter['waiter_id'] = $service_staff_id;
        }
        
        $orders = $this->restUtil->getAllOrders($business_id, $filter);
        return view('restaurant.partials.show_orders', compact('orders', 'orders_for'));
    }

    /**
     * Retrives fresh orders
     *
     * @return Json $output
     */
    public function refreshLineOrdersList(Request $request)
    {

        // if (!auth()->user()->can('sell.view')) {
        //     abort(403, 'Unauthorized action.');
        // }
        $business_id = request()->session()->get('user.business_id');
        $orders_for = $request->orders_for;
        $filter = [];
        $service_staff_id = request()->session()->get('user.id');

        if (!$this->restUtil->is_service_staff($service_staff_id) && !empty($request->input('service_staff_id'))) {
            $service_staff_id = $request->input('service_staff_id');
        }

        if ($orders_for == 'kitchen') {
            $filter['order_status'] = 'received';
        } elseif ($orders_for == 'waiter') {
            $filter['waiter_id'] = $service_staff_id;
        }
        
        $line_orders = $this->restUtil->getLineOrders($business_id, $filter);
        return view('restaurant.partials.line_orders', compact('line_orders', 'orders_for'));
    }
    public function index(Request $request){
        $business_id = request()->session()->get('user.business_id');
        $business_locations = BusinessLocation::forDropdown($business_id, true, false);

        if(request()->ajax()){
            $kitchen=kitchen::select('kitchens.name','kitchens.id','kitchens.description','business_locations.name as location')
                ->leftjoin('business_locations','kitchens.location_id','=','business_locations.id')
                ->where('kitchens.business_id','=',$business_id)
                ->where(function ($query) use ($request){
                    if(request()->location_id)
                        $query->where('kitchens.location_id','=',request()->location_id);
                })
                ->get();

            $output='';
            foreach ($kitchen as $row){
                $output .='<tr id="'.$row->id.'">';
                $output .='<td>'.$row->location.'</td>';
                $output .='<td>'.$row->name.'</td>';
                $output .='<td>'.$row->description.'</td>';
                $output .='<td>';
                if (auth()->user()->can('kitchen.delete') ){
                    $output .=' <button onclick="edit('.$row->id.')"  class="btn btn-xs btn-primary btn-modal"><i class="glyphicon glyphicon-edit"></i>'. __('messages.edit').'</button>
                                <button onclick="deleterow('.$row->id.')" class="btn btn-xs btn-danger "><i class="glyphicon glyphicon-trash"></i>'.__('messages.delete').'</button>';
                }
                $output .='</td>';
                $output .='</tr>';

            }
            return $output;

        }


        return view('restaurant.kitchen.view', compact('business_locations'));
    }

    public function index_order(Request $request)
    {
     $business_id = request()->session()->get('user.business_id');
        $orders = $this->restUtil->getketcheOrders($business_id, ['line_order_status' => 'received'],$request->kitchen);
        $kitchen=kitchen::where('business_id','=',$business_id)->pluck('name', 'id')->prepend('الكل',0);
        if(request()->ajax()){
            $query = Transaction::leftJoin('contacts', 'transactions.contact_id', '=', 'contacts.id')
                ->leftjoin('business_locations AS bl','transactions.location_id','=','bl.id')
                ->leftjoin('res_tables AS rt','transactions.res_table_id','=','rt.id')
                ->leftjoin('transaction_sell_lines','transactions.id','=','transaction_sell_lines.transaction_id')
                ->leftjoin('variations','transaction_sell_lines.variation_id','=','variations.id')
                ->leftjoin('products','transaction_sell_lines.product_id','=','products.id')
                ->leftjoin('kitchens','products.kitchen_id','=','kitchens.id')
                ->where('transactions.business_id', $business_id)
                ->where('transactions.type', 'sell')
                ->where('transactions.status', 'final')
                ->where('transaction_sell_lines.kitchen_status','<',3)
                ->where(function ($query) use ($request){
                    if($request->kitchen>0)
                        $query->where('kitchens.id','=',$request->kitchen);
                    else
                        $query->where('kitchens.id','>',0);

                });


            $orders =  $query->select(
                'transactions.*',
                'contacts.name as customer_name',
                'bl.name as business_location',
                'rt.name as table_name',
                'products.name as productname',
                'products.type as producttype',
                'kitchens.name as kitchen',
                'transaction_sell_lines.kitchen_status',
                'transaction_sell_lines.quantity',
                'transaction_sell_lines.id as order_id',
                'transaction_sell_lines.res_line_order_status as status',
                'transaction_sell_lines.sell_line_note',
                'variations.name as variation',
                'transaction_sell_lines.parent_sell_line_id'
            )->with(['sell_lines'])
                ->orderBy('created_at', 'desc')
                ->get();

            $kitchen_status=array('جديد','جاري العمل','تم التسليم','','','','','','','','','','');

           // $output=view('restaurant.kitchen.orders', compact('orders'))->render();
            $output='';
         foreach ($orders as $key=>$order){
                $modifier=$this->getmodifier($order->order_id);

                $output .='<tr> 
                             <td>'.($key+1).' </td>
                              <td>'.$order->kitchen.' </td>
                              <td>#'.$order->invoice_no.' </td>
                              <td>'.$order->table_name.' </td>';

                if($order->producttype === 'variable')
                    $output .='  <td> '.$order->productname.'( '.$order->variation.' ) </td>';
                else
                    $output .='  <td> '.$order->productname.'</td>';


                $output .='<td>'. $modifier.'</td>';
                $output .='<td>'. $order->sell_line_note.'</td>';

                $output .='<td> '.number_format($order->quantity,2).'</td>';

                if($order->kitchen_status==0)
                    $output .='<td class="ordermark"><span>جديد</span> </td>
                                             <td ><button class="btn  btn-primary" onclick="setstatsu(1,'.$order->order_id.')">  <i class="fas fa-calendar-minus"></i>  إستلام  </button></td>';
                if($order->kitchen_status==1)
                    $output .='<td class="ordermark"><span>جاري تنفيذ الطلب</span> </td>
                                              <td ><button class="btn  btn-danger" onclick="setstatsu(2,'.$order->order_id.')"><i class="fas fa-truck"></i>   تم الإنتهاء </button></td>';
                if($order->kitchen_status==2)
                    $output .='<td class="ordermark"><span>تم إنهاء الطلب</span>  </td>';
                if($order->kitchen_status==3)
                    $output .='<td class="ordermark"> <span>تم تسليم الطلب</span> </td>
                                              <td></td>';



                $output .='</tr>';
            }

            return $output;

        }

        return view('restaurant.kitchen.kitchen_order', compact('orders','kitchen'));
    }

    public function orders(Request $request){

        $business_id = request()->session()->get('user.business_id');

        $orders = $this->restUtil->getketcheOrders($business_id, ['line_order_status' => 'received'],$request->kitchen);
        $user_id = request()->session()->get('user.id');
        $service_staff = $this->restUtil->service_staff_dropdown($business_id);
        $kitchen=kitchen::where('business_id','=',$business_id)->pluck('name', 'id')->prepend('الكل',0);

        if(request()->ajax()){
            $query = Transaction::leftJoin('contacts', 'transactions.contact_id', '=', 'contacts.id')
                ->leftjoin(
                    'business_locations AS bl',
                    'transactions.location_id',
                    '=',
                    'bl.id'
                )
                ->leftjoin(
                    'res_tables AS rt',
                    'transactions.res_table_id',
                    '=',
                    'rt.id'
                )
                ->leftjoin('transaction_sell_lines','transactions.id','=','transaction_sell_lines.transaction_id')
                ->leftjoin('variations','transaction_sell_lines.variation_id','=','variations.id')
                ->leftjoin('products','transaction_sell_lines.product_id','=','products.id')
                ->leftjoin('kitchens','products.kitchen_id','=','kitchens.id')
                ->where('transactions.business_id', $business_id)
                ->where('transactions.type', 'sell')
                ->where('transactions.status', 'final')
                ->where('transaction_sell_lines.kitchen_status','<',3)
                ->where(function ($query) use ($request){
                    if($request->kitchen>0)
                        $query->where('kitchens.id','=',$request->kitchen);
                    else
                        $query->where('kitchens.id','>',0);

                })
                ->where(function ($query) use($request){
                    if($request->ordernumber)
                        $query->where('transactions.invoice_no','like','%'.$request->ordernumber.'%');
                })
                ->where(function ($query) use($request){
                    if($request->service_staff)
                        $query->where('transactions.res_waiter_id','=',$request->service_staff);
                });


            $orders =  $query->select(
                'transactions.*',
                'contacts.name as customer_name',
                'bl.name as business_location',
                'rt.name as table_name',
                'products.name as productname',
                'products.type as producttype',
                'kitchens.name as kitchen',
                'transaction_sell_lines.kitchen_status',
                'transaction_sell_lines.quantity',
                'transaction_sell_lines.id as order_id',
                'transaction_sell_lines.res_line_order_status as status',
                'variations.name as variation'
            )->with(['sell_lines'])
                ->orderBy('created_at', 'desc')
                ->get();

            $kitchen_status=array('جديد','جاري العمل','تم التسليم','','','','','','','','','','');

            $output='';
            foreach ($orders as $key=>$order){
                $output .='<tr> 
                             <td>'.($key+1).' </td>
                              <td>'.$order->kitchen.' </td>
                              <td>#'.$order->invoice_no.' </td>
                              <td>'.$order->table_name.' </td>';

                if($order->producttype === 'variable')
                    $output .='  <td> '.$order->productname.'( '.$order->variation.' ) </td>';
                else
                    $output .='  <td> '.$order->productname.'</td>';



                $output .='   <td> '.number_format($order->quantity,2).'</td>';

                if($order->kitchen_status==0)
                    $output .='<td class="ordermark"><span>جديد</span> </td>
                                             <td ></td>';
                if($order->kitchen_status==1)
                    $output .='<td class="ordermark"><span>جاري تنفيذ الطلب</span> </td>
                                               <td ></td>';
                if($order->kitchen_status==2)
                    $output .='<td class="ordermark"><span>تم إنهاء الطلب</span>  </td>
                                              <td ><button class="btn  btn-success" onclick="setstatsu(3,'.$order->order_id.')"><i class="fas fa-truck"></i>  إستلام الطلب</button></td>';
                if($order->kitchen_status==3)
                    $output .='<td class="ordermark"> <span>تم تسليم الطلب</span> </td>
                                              <td></td>';



                $output .='</tr>';
            }

            return $output;

        }

        return view('restaurant.orders.index', compact('orders','kitchen','service_staff'));

    }


    public function setorderstatus(Request $request){
        $data=TransactionSellLine::find($request->order_id)  ;
        $data->kitchen_status=$request->id;
        $data->save();

        return 'setorderstatus : '.$request->id.'-'.$request->order_id;
    }

    public function create(){
        if ( !auth()->user()->can('kitchen.create') ) {
            abort(403, 'Unauthorized action.');
        }
        $business_id = request()->session()->get('user.business_id');
        $business_locations = BusinessLocation::forDropdown($business_id);
        return view('restaurant.kitchen.create',['business_locations'=>$business_locations]);
    }

    public function edit($id){
        if ( !auth()->user()->can('kitchen.create') ) {
            abort(403, 'Unauthorized action.');
        }
        $business_id = request()->session()->get('user.business_id');
        $business_locations = BusinessLocation::forDropdown($business_id);
        $kitchen=kitchen::find($id);
        return view('restaurant.kitchen.edit',['business_locations'=>$business_locations,'kitchen'=>$kitchen]);
    }
    /* Functin add by eng Ali 20-40-2021 to add kitchen to database*/
    public function store(Request $request){
        if(!auth()->user()->can('kitchen.create'))
            abort(403, 'Unauthorized action.');
        $business_id = request()->session()->get('user.business_id');

        $kitchen=kitchen::create([
            'business_id'=>$business_id,
            'created_by'=>auth()->user()->id,
            'name'=>$request->name,
            'description'=>$request->description,
            'location_id'=>$request->location_id,
        ]);

        $output = ['success' => true,
            'data' => $kitchen,
            'msg' => 'تم الحفظ بنجاح'
        ];

        return $output;

    }

    public function update(Request $request){

        $kitchen=kitchen::findOrFail($request->id);
        $kitchen->created_by=auth()->user()->id;
        $kitchen->name=$request->name;
        $kitchen->description=$request->description;
        $kitchen->location_id=$request->location_id;
        $kitchen->save();
        $output = ['success' => true,
            'data' => $kitchen,
            'msg' =>'تم الحفظ بنجاح'
        ];

        return $output;

    }

    public function delete($id){
        if (!auth()->user()->can('kitchen.delete') ) {
            $output = ['success' => false,
                'msg' => 'ليس لديك صلاحية الحذف'

            ];
            return $output;
        }
        $kitchen=kitchen::where('id','=',$id)->delete();
        $output = ['success' => true,
            'msg' => 'تم حذف الأصل'
        ];

        return $output;
    }


    public function products(Request $request)
    {

        $business_id = request()->session()->get('user.business_id');
        $business_locations = BusinessLocation::forDropdown($business_id, true, false);
        $kitchen=kitchen::where('business_id','=',$business_id)->pluck('name', 'id')->prepend('الكل',0);

        if(request()->ajax()){
            $kitchen=Product::select('kitchens.name','kitchens.id','kitchens.description','products.name as product_name','products.id as product_id')
                ->leftjoin('kitchens','products.kitchen_id','=','kitchens.id')
                ->where('products.business_id','=',$business_id)
                ->where(function ($query) use($request){
                    if($request->kitchen_id>0)
                        $query->where('kitchens.id','=',$request->kitchen_id);
                })
                ->where(function ($query) use($request){
                    if($request->search !=='')
                        $query->where('products.name','like','%'.$request->search.'%');
                })

                ->get();

            $output='';
            foreach ($kitchen as $key=>$row){
                $output .='<tr id="'. $row->id.'">';
                $output .='<td>'.($key + 1).'</td>';
                $output .='<td>'.$row->product_name.'</td>';
                $output .='<td>'.$row->name.'</td>';
                $output .='<td>';
                if ( auth()->user()->can('kitchen.edit') ){
                    $kitchen_id=$row->id?$row->id:0;
                    $output .=' <button onclick="addproduct('.$row->product_id.')"  class="btn btn-xs btn-primary btn-modal"><i class="glyphicon glyphicon-edit"></i>'. __('messages.edit').'</button>
                                <button onclick="removefromkitchen('.$row->product_id.')" class="btn btn-xs btn-danger "><i class="glyphicon glyphicon-trash"></i>'.__('messages.delete').'</button>';
                }
                $output .='</td>';
                $output .='</tr>';

            }
            return $output;

        }

        return view ('restaurant.kitchen.products', compact('business_locations','kitchen'));
    }

    public function product_add(Request $request){

        if ( !auth()->user()->can('kitchen.create') ) {
            abort(403, 'Unauthorized action.');
        }
        $business_id = request()->session()->get('user.business_id');
        $product_id=$request->id;
        $kitchen=kitchen::where('business_id','=',$business_id)->pluck('name', 'id');

        return view('restaurant.kitchen.products_create',['kitchen'=>$kitchen,'product'=>$product_id]);
    }

    public function addtokitchen(Request $request){
        $data=Product::find($request->product_id);
        $data->kitchen_id=$request->kitchen_id;
        $data->save();
        $output = ['success' => true,
            'data' => $data,
            'msg' => 'تم الحفظ بنجاح'
        ];
        return $output;
    }


    public function removefromkitchen($id){
        if (!auth()->user()->can('kitchen.delete') ) {
            $output = ['success' => false,
                'msg' => 'ليس لديك صلاحية الحذف'
            ];
            return $output;
        }
        $product=Product::find($id);
        $product->kitchen_id=0;
        $product->save();

        $output = ['success' => true,
            'msg' => 'تم إزالة الصنف من المطبخ'
        ];

        return $output;
    }

    /**
     * Marks an order as cooked
     * @return json $output
     */


    /**
     * Retrives fresh orders
     *
     * @return Json $output
     */


    public function getmodifier($id){

        $data=TransactionSellLine::select('variations.name as variation','products.name as product')
            ->join('variations','transaction_sell_lines.variation_id','=','variations.id')
            ->join('products','transaction_sell_lines.product_id','=','products.id')
            ->where('transaction_sell_lines.parent_sell_line_id','=',$id)->get();

        $output='';
        foreach ($data as $modifier)
            $output .='<p style="color: #DD1515;">'.$modifier->product.'-'.$modifier->variation.'</p>';

        return $output;

    }
}

