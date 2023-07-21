<?php

namespace Modules\Partners\Http\Controllers;

use App\Account;
use App\Business;
use App\Transaction;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Modules\Partners\Entities\Asset;
use Modules\Partners\Entities\partner;
use App\Utils\TransactionUtil;
use App\Utils\ProductUtil;
use App\Contact;




class BusinessController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */

    public function __construct(TransactionUtil $transactionUtil, ProductUtil $productUtil)
    {
        $this->transactionUtil = $transactionUtil;
        $this->productUtil = $productUtil;

    }
    public function index()
    {
        if (!auth()->user()->can('partners.view') && !auth()->user()->can('partners.create')) {
            abort(403, 'Unauthorized action.');
        }


        $business_id = request()->session()->get('user.business_id');
        $end_date = \Carbon::now()->format('Y-m-d');
        $filters = request()->only(['category_id', 'sub_category_id', 'brand_id', 'unit_id']);
        $closing_stock_by_pp = $this->transactionUtil->getOpeningClosingStock(
            $business_id,
            $end_date,
           '',
            false,
            false,
            $filters
        );



        $closing_stock_by_sp = $this->transactionUtil->getOpeningClosingStock(
            $business_id,
            $end_date,
            '',
            false,
            true,
            $filters
        );

        $closing_stock_by_sp = $this->transactionUtil->getOpeningClosingStock(
            $business_id,
            $end_date,
            '',
            false,
            true,
            $filters
        );
        $potential_profit = $closing_stock_by_sp - $closing_stock_by_pp;
        $profit_margin = empty($closing_stock_by_sp) ? 0 : ($potential_profit / $closing_stock_by_sp) * 100;

       $assets=Asset::where('business_id','=',$business_id)->sum('curentprice');
       $totalshare=partner::where('business_id','=',$business_id)->sum('share');




        $business_id = request()->session()->get('user.business_id');
        $walk_id=Contact::where('contact_id','=','CO0001')->where('business_id','=',$business_id)->pluck('id');

        $total_purchase=Transaction::where('business_id','=',$business_id)->where('type','=','purchase')->sum('final_total');
        $purchase_return=Transaction::where('business_id','=',$business_id)->where('type','=','purchase_return')->sum('final_total');

        $purchase_paid=DB::select("select Sum(amount)as purchase_paid from transaction_payments where transaction_id in (SELECT id FROM  transactions where business_id=? and type='purchase')",[$business_id]);
        $purchase_paid=$purchase_paid[0]->purchase_paid;

        $purchase_return_paid=DB::select("select Sum(amount)as purchase_return_paid from transaction_payments where transaction_id in (SELECT id FROM  transactions where business_id=? and type='purchase_return')",[$business_id]);
        $purchase_return_paid=$purchase_return_paid[0]->purchase_return_paid;


        $total_invoice=Transaction::where('business_id','=',$business_id)
            ->where('type','=','sell')
            ->where('contact_id','!=',$walk_id)
            ->where('status','=','final')
            ->sum('final_total');

        $total_sell_return=Transaction::where('business_id','=',$business_id)
            ->where('type','=','sell_return')
            ->where('contact_id','!=',$walk_id)
            ->where('status','=','final')
            ->sum('final_total');


        $invoice_received=DB::select("select Sum(amount)as invoice_received from transaction_payments where transaction_id in (SELECT id FROM  transactions where business_id=? and type='sell' and  status = 'final' and contact_id=?)",[$business_id,$walk_id]);
        $invoice_received= $invoice_received[0]->invoice_received;

        $sell_return_paid=DB::select("select Sum(amount)as sell_return_paid from transaction_payments where transaction_id in (SELECT id FROM  transactions where business_id=? and type='sell_return' and contact_id=?)",[$business_id,$walk_id]);
        $sell_return_paid=$sell_return_paid[0]->sell_return_paid;


        //opening_balance
        $opening_customer=Transaction::join('contacts as t','transactions.contact_id','=','t.id')
            ->where('transactions.business_id','=',$business_id)
            ->where('transactions.type','=','opening_balance')
            ->where('transactions.status','=','final')
            ->where('t.type','=','customer')
            ->sum('final_total');

        $opening_supplier=Transaction::join('contacts as t','transactions.contact_id','=','t.id')
            ->where('transactions.business_id','=',$business_id)
            ->where('transactions.type','=','opening_balance')
            ->where('transactions.status','=','final')
            ->where('t.type','=','supplier')
            ->sum('final_total');

        $supplier=$total_purchase-$purchase_return-$purchase_paid-$purchase_return_paid+$opening_supplier;
        $customer=$total_invoice-$total_sell_return-$invoice_received-$invoice_received+$opening_customer;


        // get total account of  account/account

         $end_date =Carbon::now()->format('Y-m-d');
         $query =Account::leftjoin('account_transactions as AT','AT.account_id','=','accounts.id' )
                                  ->whereNull('AT.deleted_at')
                                  ->where('business_id', $business_id)
                                  ->whereDate('AT.operation_date', '<=', $end_date);





        $credit=Account::leftjoin('account_transactions as AT','AT.account_id','=','accounts.id' )
                                 ->whereNull('AT.deleted_at')
                                 ->where('business_id', $business_id)
                                 ->where('AT.type','=','credit')
                                 ->sum('amount');

        $depit=Account::leftjoin('account_transactions as AT','AT.account_id','=','accounts.id' )
            ->whereNull('AT.deleted_at')
            ->where('business_id', $business_id)
            ->where('AT.type','!=','credit')
             ->sum('amount');

        $account_details=$credit-$depit;




        return view('partners::business.index',
            [
                'closing_stock_by_pp'=>$closing_stock_by_pp,
                'closing_stock_by_sp'=>$closing_stock_by_sp,
                'potential_profit'=>$potential_profit,
                'profit_margin'=> $profit_margin,
                'assets'=>$assets,
                'totalshare'=>$totalshare,

                'total_purchase'=>$total_purchase,
                'purchase_return'=>$purchase_return,
                'purchase_paid'=>$purchase_paid,
                'purchase_return_paid'=>$purchase_return_paid,

                'total_invoice'=>$total_invoice,
                'total_sell_return'=>$total_sell_return,

                'invoice_received'=>$invoice_received,
                'invoice_received'=>$invoice_received,

                'customer'=>$customer,
                'supplier'=>$supplier,
                'account_details'=>$account_details

            ]);
    }
    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('partners::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        return view('partners::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        return view('partners::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {


    }

    public function gettotal(){


        $business_id = request()->session()->get('user.business_id');
        $walk_id=Contact::where('contact_id','=','CO0001')->where('business_id','=',$business_id)->pluck('id');

        $total_purchase=Transaction::where('business_id','=',$business_id)->where('type','=','purchase')->sum('final_total');
        $purchase_return=Transaction::where('business_id','=',$business_id)->where('type','=','purchase_return')->sum('final_total');

        $purchase_paid=DB::select("select Sum(amount)as purchase_paid from transaction_payments where transaction_id in (SELECT id FROM  transactions where business_id=? and type='purchase')",[$business_id]);
        $purchase_paid=$purchase_paid[0]->purchase_paid;

        $purchase_return_paid=DB::select("select Sum(amount)as purchase_return_paid from transaction_payments where transaction_id in (SELECT id FROM  transactions where business_id=? and type='purchase_return')",[$business_id]);
        $purchase_return_paid=$purchase_return_paid[0]->purchase_return_paid;


        $total_invoice=Transaction::where('business_id','=',$business_id)->where('type','=','sell')->where('status','=','final')->sum('final_total');
        $sell_return_paid=Transaction::where('business_id','=',$business_id)->where('type','=','sell_return')->where('status','=','final')->sum('final_total');


        $invoice_received=DB::select("select Sum(amount)as invoice_received from transaction_payments where transaction_id in (SELECT id FROM  transactions where business_id=? and type='sell' and  status = 'final')",[$business_id]);
        $invoice_received= $invoice_received[0]->invoice_received;

        $sell_return_paid=DB::select("select Sum(amount)as sell_return_paid from transaction_payments where transaction_id in (SELECT id FROM  transactions where business_id=? and type='sell_return')",[$business_id]);
        $sell_return_paid=$sell_return_paid[0]->sell_return_paid;



        return $sell_return_paid;

    }

    public function savecapital(Request $request){

        $business_id = request()->session()->get('user.business_id');

        $totalshare=partner::where('business_id','=',$business_id)->sum('share');
        $totalcapital=partner::where('business_id','=',$business_id)->sum('capital');

        if($request->capital < $totalcapital){
            $output=[
                      'sucess'=>false,
                       'message'=>'عفوا رأس المال لايمكن أن يقل عن الفعلي الموجود'
                     ];
            return  $output;
        }

        if($request->sharenumber < $totalshare){
            $output=[
                'sucess'=>false,
                'message'=>'عفوا عدد الإسهم لايمكن أن يقل عن الفعلي الموجود'
            ];
            return  $output;
        }
       $data=Business::findorfail($business_id );
        $data->sharenumber=$request->sharenumber;
        $data->capital=$request->capital;
        $data->save();

        $output=[
                    'sucess'=>true,
                    'message'=>'تم حفظ البيانات بنجاح'
                ];
        return  $output;

    }
}
