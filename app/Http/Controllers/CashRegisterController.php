<?php

namespace App\Http\Controllers;

use App\BusinessLocation;
use App\CashRegister;
use App\Utils\CashRegisterUtil;
use App\Utils\ModuleUtil;
use Illuminate\Http\Request;
use App\Transaction;
use DB;
class CashRegisterController extends Controller
{
    /**
     * All Utils instance.
     *
     */
    protected $cashRegisterUtil;
    protected $moduleUtil;

    /**
     * Constructor
     *
     * @param CashRegisterUtil $cashRegisterUtil
     * @return void
     */
    public function __construct(CashRegisterUtil $cashRegisterUtil, ModuleUtil $moduleUtil)
    {
        $this->cashRegisterUtil = $cashRegisterUtil;
        $this->moduleUtil = $moduleUtil;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('cash_register.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //like:repair
        $sub_type = request()->get('sub_type');

        //Check if there is a open register, if yes then redirect to POS screen.
        if ($this->cashRegisterUtil->countOpenedRegister() != 0) {
            return redirect()->action('SellPosController@create', ['sub_type' => $sub_type]);
        }
        $business_id = request()->session()->get('user.business_id');
        $business_locations = BusinessLocation::forDropdown($business_id);

        return view('cash_register.create')->with(compact('business_locations', 'sub_type'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //like:repair
        $sub_type = request()->get('sub_type');
            
        try {
            $initial_amount = 0;
            if (!empty($request->input('amount'))) {
                $initial_amount = $this->cashRegisterUtil->num_uf($request->input('amount'));
            }
            $user_id = $request->session()->get('user.id');
            $business_id = $request->session()->get('user.business_id');

            $register = CashRegister::create([
                        'business_id' => $business_id,
                        'user_id' => $user_id,
                        'status' => 'open',
                        'location_id' => $request->input('location_id'),
                        'created_at' => \Carbon::now()->format('Y-m-d H:i:00')
                    ]);
            if (!empty($initial_amount)) {
                $register->cash_register_transactions()->create([
                            'amount' => $initial_amount,
                            'pay_method' => 'cash',
                            'type' => 'credit',
                            'transaction_type' => 'initial'
                        ]);
            }
            
        } catch (\Exception $e) {
            \Log::emergency("File:" . $e->getFile(). "Line:" . $e->getLine(). "Message:" . $e->getMessage());
        }

        return redirect()->action('SellPosController@create', ['sub_type' => $sub_type]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\CashRegister  $cashRegister
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (!auth()->user()->can('view_cash_register')) {
            abort(403, 'Unauthorized action.');
        }

        $business_id = request()->session()->get('user.business_id');

        $register_details =  $this->cashRegisterUtil->getRegisterDetails($id);
        $user_id = $register_details->user_id;
        $open_time = $register_details['open_time'];
        $close_time = !empty($register_details['closed_at']) ? $register_details['closed_at'] : \Carbon::now()->toDateTimeString();
        $details = $this->cashRegisterUtil->getRegisterTransactionDetails($user_id, $open_time, $close_time);

        $payment_types = $this->cashRegisterUtil->payment_types(null, false, $business_id);
        $payements_detail=\DB::table('transaction_payments as TP')
        ->join('transactions AS TR','TP.transaction_id','TR.id')
        ->join('contacts','TR.contact_id','contacts.id')
        ->where('TR.type','sell')
        ->where('TP.created_by',$user_id)
        ->whereBetween('TP.created_at', [$open_time, $close_time])
        ->select(
            'TR.id',
             'TP.id as tpid',
            'TP.payment_ref_no',
            'TP.amount',
            'TR.invoice_no',
            'contacts.name'
            
            )->get();
            
            
            
            
            //EXPENSES
            $expenses = Transaction::leftJoin('expense_categories AS ec', 'transactions.expense_category_id', '=', 'ec.id')
                        ->join(
                            'business_locations AS bl',
                            'transactions.location_id',
                            '=',
                            'bl.id'
                        )
                        ->leftJoin('tax_rates as tr', 'transactions.tax_id', '=', 'tr.id')
                        ->leftJoin('users AS U', 'transactions.expense_for', '=', 'U.id')
                        ->leftJoin('users AS usr', 'transactions.created_by', '=', 'usr.id')
                        ->leftJoin('contacts AS c', 'transactions.contact_id', '=', 'c.id')
                        ->leftJoin(
                            'transaction_payments AS TP',
                            'transactions.id',
                            '=',
                            'TP.transaction_id'
                        )
                        //->where('transactions.location_id', $register_details->location_id)
                        ->where('transactions.type', 'expense')
                        ->where('transactions.created_by', $user_id)
                        ->whereBetween('transaction_date', [$open_time, $close_time])
                        ->select(
                            'transactions.id',
                            'transactions.document',
                            'transaction_date',
                            'ref_no',
                            'ec.name as category',
                            'payment_status',
                            'additional_notes',
                            'final_total',
                            'transactions.is_recurring',
                            'transactions.recur_interval',
                            'transactions.recur_interval_type',
                            'transactions.recur_repetitions',
                            'transactions.subscription_repeat_on',
                            'bl.name as location_name',
                            DB::raw("CONCAT(COALESCE(U.surname, ''),' ',COALESCE(U.first_name, ''),' ',COALESCE(U.last_name,'')) as expense_for"),
                            DB::raw("CONCAT(tr.name ,' (', tr.amount ,' )') as tax"),
                           
                            DB::raw("CONCAT(COALESCE(usr.surname, ''),' ',COALESCE(usr.first_name, ''),' ',COALESCE(usr.last_name,'')) as added_by"),
                            'transactions.recur_parent_id',
                            'c.name as contact_name'
                        )
                        ->with(['recurring_parent'])
                        ->groupBy('transactions.id')->get();
                         $sum=0;
                          foreach($expenses as $row){
                              $sum+=$row->final_total;
                              
                          } 
                          if(sizeof($expenses)>0){
                            $expenses[0]->amount_paid=$sum;
                            $total_expences=$sum;
                          }else{
                              $total_expences=0;
                          }
            $purchases=DB::table('transaction_payments as tp')
                ->join('transactions as t','t.id','tp.transaction_id')
                ->whereIn('t.type', ['purchase', 'opening_balance'])
                ->where('tp.created_by',$user_id)
                ->whereBetween('tp.created_at',[$open_time, $close_time])
                ->select(
                    'tp.*'
                    )
                ->get();
                $purchases=\DB::table('transaction_payments as TP')
                    ->join('transactions AS TR','TP.transaction_id','TR.id')
                    ->join('contacts','TR.contact_id','contacts.id')
                  ->whereIn('TR.type', ['purchase', 'opening_balance'])
                    ->where('TP.created_by',$user_id)
                    ->whereBetween('TP.created_at', [$open_time, $close_time])
                    ->select(
                        'TR.id',
                        'TP.payment_ref_no',
                        'TP.amount',
                        'TR.invoice_no',
                        'contacts.name',
                         DB::raw('SUM(TP.amount) as amount_paid')
                        )->get();
                $sells=\DB::table('transaction_payments as TP')
                    ->join('transactions AS TR','TP.transaction_id','TR.id')
                    ->join('contacts','TR.contact_id','contacts.id')
                  ->whereIn('TR.type', ['sell'])
                    ->where('TP.created_by',$user_id)
                    ->whereBetween('TP.created_at', [$open_time, $close_time])
                    ->select(
                        'TR.id',
                        'TP.payment_ref_no',
                        'TP.amount',
                        'TR.invoice_no',
                        'contacts.name',
                         DB::raw('SUM(TP.amount) as amount_paid')
                        )->get();
                
                //Sell Return
                $sells_return = Transaction::leftJoin('contacts', 'transactions.contact_id', '=', 'contacts.id')
                    
                    ->join(
                        'business_locations AS bl',
                        'transactions.location_id',
                        '=',
                        'bl.id'
                    )
                    ->join(
                        'transactions as T1',
                        'transactions.return_parent_id',
                        '=',
                        'T1.id'
                    )
                    ->leftJoin(
                        'transaction_payments AS TP',
                        'transactions.id',
                        '=',
                        'TP.transaction_id'
                    )
                    ->where('transactions.business_id', $business_id)
                    ->where('transactions.type', 'sell_return')
                    ->where('transactions.status', 'final')
                    ->whereBetween('TP.created_at', [$open_time, $close_time])
                     ->where('TP.created_by',$user_id)
                    ->select(
                        'transactions.id',
                        'transactions.transaction_date',
                        'transactions.invoice_no',
                        'contacts.name',
                        'transactions.final_total',
                        'transactions.payment_status',
                        'bl.name as business_location',
                        'T1.invoice_no as parent_sale',
                        'T1.id as parent_sale_id',
                        DB::raw('SUM(TP.amount) as amount_paid')
                    )->get();
                    
                  //Purchase Return
                  $purchases_returns = Transaction::leftJoin('contacts', 'transactions.contact_id', '=', 'contacts.id')
                    ->join(
                        'business_locations AS BS',
                        'transactions.location_id',
                        '=',
                        'BS.id'
                    )
                    ->leftJoin(
                        'transactions AS T',
                        'transactions.return_parent_id',
                        '=',
                        'T.id'
                    )
                    ->leftJoin(
                        'transaction_payments AS TP',
                        'transactions.id',
                        '=',
                        'TP.transaction_id'
                    )
                    ->where('transactions.business_id', $business_id)
                    ->where('transactions.type', 'purchase_return')
                    ->whereBetween('TP.created_at', [$open_time, $close_time])
                     ->where('TP.created_by',$user_id)
                    ->select(
                        'transactions.id',
                        'transactions.transaction_date',
                        'transactions.ref_no',
                        'contacts.name',
                        'transactions.status',
                        'transactions.payment_status',
                        'transactions.final_total',
                        'transactions.return_parent_id',
                        'BS.name as location_name',
                        'T.ref_no as parent_purchase',
                        DB::raw('SUM(TP.amount) as amount_paid')
                    )->get();
                    

        return view('cash_register.register_details')
                    ->with(compact('register_details', 'details', 'total_expences','sells_return','sells','purchases_returns','expenses','purchases','payment_types', 'close_time','payements_detail'));
    }

    /**
     * Shows register details modal.
     *
     * @param  void
     * @return \Illuminate\Http\Response
     */
    public function getRegisterDetails()
    {
        if (!auth()->user()->can('view_cash_register')) {
            abort(403, 'Unauthorized action.');
        }

        $business_id = request()->session()->get('user.business_id');

        $register_details =  $this->cashRegisterUtil->getRegisterDetails();

        $user_id = auth()->user()->id;
        $open_time = $register_details['open_time'];
        $close_time = \Carbon::now()->toDateTimeString();

        $is_types_of_service_enabled = $this->moduleUtil->isModuleEnabled('types_of_service');

        $details = $this->cashRegisterUtil->getRegisterTransactionDetails($user_id, $open_time, $close_time, $is_types_of_service_enabled);

        $payment_types = $this->cashRegisterUtil->payment_types($register_details->location_id, true, $business_id);

        $payements_detail=\DB::table('transaction_payments as TP')
        ->join('transactions AS TR','TP.transaction_id','TR.id')
        ->join('contacts','TR.contact_id','contacts.id')
        ->where('TR.type','sell')
        ->where('TP.created_by',$user_id)
        ->whereBetween('TP.created_at', [$open_time, $close_time])
        ->select(
            'TR.id',
            'TP.id as tpid',
            'TP.payment_ref_no',
            'TP.amount',
            'TR.invoice_no',
            'contacts.name'
            
            )->get();
            
            
            
            //EXPENSES
            $expenses = Transaction::leftJoin('expense_categories AS ec', 'transactions.expense_category_id', '=', 'ec.id')
                        ->join(
                            'business_locations AS bl',
                            'transactions.location_id',
                            '=',
                            'bl.id'
                        )
                        ->leftJoin('tax_rates as tr', 'transactions.tax_id', '=', 'tr.id')
                        ->leftJoin('users AS U', 'transactions.expense_for', '=', 'U.id')
                        ->leftJoin('users AS usr', 'transactions.created_by', '=', 'usr.id')
                        ->leftJoin('contacts AS c', 'transactions.contact_id', '=', 'c.id')
                        ->leftJoin(
                            'transaction_payments AS TP',
                            'transactions.id',
                            '=',
                            'TP.transaction_id'
                        )
                        //->where('transactions.location_id', $register_details->location_id)
                        ->where('transactions.type', 'expense')
                        ->where('transactions.created_by', $user_id)
                        ->whereBetween('transaction_date', [$open_time, $close_time])
                        ->select(
                            'transactions.id',
                            'transactions.document',
                            'transaction_date',
                            'ref_no',
                            'ec.name as category',
                            'payment_status',
                            'additional_notes',
                            'final_total',
                            'transactions.is_recurring',
                            'transactions.recur_interval',
                            'transactions.recur_interval_type',
                            'transactions.recur_repetitions',
                            'transactions.subscription_repeat_on',
                            'bl.name as location_name',
                            DB::raw("CONCAT(COALESCE(U.surname, ''),' ',COALESCE(U.first_name, ''),' ',COALESCE(U.last_name,'')) as expense_for"),
                            DB::raw("CONCAT(tr.name ,' (', tr.amount ,' )') as tax"),
                           
                            DB::raw("CONCAT(COALESCE(usr.surname, ''),' ',COALESCE(usr.first_name, ''),' ',COALESCE(usr.last_name,'')) as added_by"),
                            'transactions.recur_parent_id',
                            'c.name as contact_name'
                        )
                        ->with(['recurring_parent'])
                        ->groupBy('transactions.id')->get();
                         $sum=0;
                          foreach($expenses as $row){
                              $sum+=$row->final_total;
                              
                          } 
                          if(sizeof($expenses)>0){
                            $expenses[0]->amount_paid=$sum;
                            $total_expences=$sum;
                          }else{
                              $total_expences=0;
                          }
            $purchases=DB::table('transaction_payments as tp')
                ->join('transactions as t','t.id','tp.transaction_id')
                ->whereIn('t.type', ['purchase', 'opening_balance'])
                ->where('tp.created_by',$user_id)
                ->whereBetween('tp.created_at',[$open_time, $close_time])
                ->select(
                    'tp.*'
                    )
                ->get();
                $purchases=\DB::table('transaction_payments as TP')
                    ->join('transactions AS TR','TP.transaction_id','TR.id')
                    ->join('contacts','TR.contact_id','contacts.id')
                  ->whereIn('TR.type', ['purchase', 'opening_balance'])
                    ->where('TP.created_by',$user_id)
                    ->whereBetween('TP.created_at', [$open_time, $close_time])
                    ->select(
                        'TR.id',
                        'TP.payment_ref_no',
                        'TP.amount',
                        'TR.invoice_no',
                        'contacts.name',
                         DB::raw('SUM(TP.amount) as amount_paid')
                        )->get();
                $sells=\DB::table('transaction_payments as TP')
                    ->join('transactions AS TR','TP.transaction_id','TR.id')
                    ->join('contacts','TR.contact_id','contacts.id')
                  ->whereIn('TR.type', ['sell'])
                    ->where('TP.created_by',$user_id)
                    ->whereBetween('TP.created_at', [$open_time, $close_time])
                    ->select(
                        'TR.id',
                        'TP.payment_ref_no',
                        'TP.amount',
                        'TR.invoice_no',
                        'contacts.name',
                         DB::raw('SUM(TP.amount) as amount_paid')
                        )->get();
                
                //Sell Return
                $sells_return = Transaction::leftJoin('contacts', 'transactions.contact_id', '=', 'contacts.id')
                    
                    ->join(
                        'business_locations AS bl',
                        'transactions.location_id',
                        '=',
                        'bl.id'
                    )
                    ->join(
                        'transactions as T1',
                        'transactions.return_parent_id',
                        '=',
                        'T1.id'
                    )
                    ->leftJoin(
                        'transaction_payments AS TP',
                        'transactions.id',
                        '=',
                        'TP.transaction_id'
                    )
                    ->where('transactions.business_id', $business_id)
                    ->where('transactions.type', 'sell_return')
                    ->where('transactions.status', 'final')
                    ->whereBetween('TP.created_at', [$open_time, $close_time])
                     ->where('TP.created_by',$user_id)
                    ->select(
                        'transactions.id',
                        'transactions.transaction_date',
                        'transactions.invoice_no',
                        'contacts.name',
                        'transactions.final_total',
                        'transactions.payment_status',
                        'bl.name as business_location',
                        'T1.invoice_no as parent_sale',
                        'T1.id as parent_sale_id',
                        DB::raw('SUM(TP.amount) as amount_paid')
                    )->get();
                    
                  //Purchase Return
                  $purchases_returns = Transaction::leftJoin('contacts', 'transactions.contact_id', '=', 'contacts.id')
                    ->join(
                        'business_locations AS BS',
                        'transactions.location_id',
                        '=',
                        'BS.id'
                    )
                    ->leftJoin(
                        'transactions AS T',
                        'transactions.return_parent_id',
                        '=',
                        'T.id'
                    )
                    ->leftJoin(
                        'transaction_payments AS TP',
                        'transactions.id',
                        '=',
                        'TP.transaction_id'
                    )
                    ->where('transactions.business_id', $business_id)
                    ->where('transactions.type', 'purchase_return')
                    ->whereBetween('TP.created_at', [$open_time, $close_time])
                     ->where('TP.created_by',$user_id)
                    ->select(
                        'transactions.id',
                        'transactions.transaction_date',
                        'transactions.ref_no',
                        'contacts.name',
                        'transactions.status',
                        'transactions.payment_status',
                        'transactions.final_total',
                        'transactions.return_parent_id',
                        'BS.name as location_name',
                        'T.ref_no as parent_purchase',
                        DB::raw('SUM(TP.amount) as amount_paid')
                    )->get();
                    

        return view('cash_register.register_details')
                ->with(compact('register_details','total_expences','sells_return','sells','purchases_returns','expenses','purchases','details', 'payment_types', 'close_time','payements_detail'));
    }

    /**
     * Shows close register form.
     *
     * @param  void
     * @return \Illuminate\Http\Response
     */
    public function getCloseRegister($id = null)
    {
        if (!auth()->user()->can('close_cash_register')) {
            abort(403, 'Unauthorized action.');
        }
        $business_id = request()->session()->get('user.business_id');
        $register_details =  $this->cashRegisterUtil->getRegisterDetails($id);

        $user_id = $register_details->user_id;
        $open_time = $register_details['open_time'];
        $close_time = \Carbon::now()->toDateTimeString();

        $is_types_of_service_enabled = $this->moduleUtil->isModuleEnabled('types_of_service');

        $details = $this->cashRegisterUtil->getRegisterTransactionDetails($user_id, $open_time, $close_time, $is_types_of_service_enabled);
        
        $payment_types = $this->cashRegisterUtil->payment_types($register_details->location_id, true, $business_id);
        $pos_settings = !empty(request()->session()->get('business.pos_settings')) ? json_decode(request()->session()->get('business.pos_settings'), true) : [];

        $payements_detail=\DB::table('transaction_payments as TP')
        ->join('transactions AS TR','TP.transaction_id','TR.id')
        ->join('contacts','TR.contact_id','contacts.id')
        ->where('TR.type','sell')
        ->where('TP.created_by',$user_id)
        ->whereBetween('TP.created_at', [$open_time, $close_time])
        ->select(
            'TR.id',
            'TP.id as tpid',
            'TP.payment_ref_no',
            'TP.amount',
            'TR.invoice_no',
            'contacts.name'
            
            )->get();
            
            //EXPENSES
            $expenses = Transaction::leftJoin('expense_categories AS ec', 'transactions.expense_category_id', '=', 'ec.id')
                        ->join(
                            'business_locations AS bl',
                            'transactions.location_id',
                            '=',
                            'bl.id'
                        )
                        ->leftJoin('tax_rates as tr', 'transactions.tax_id', '=', 'tr.id')
                        ->leftJoin('users AS U', 'transactions.expense_for', '=', 'U.id')
                        ->leftJoin('users AS usr', 'transactions.created_by', '=', 'usr.id')
                        ->leftJoin('contacts AS c', 'transactions.contact_id', '=', 'c.id')
                        ->leftJoin(
                            'transaction_payments AS TP',
                            'transactions.id',
                            '=',
                            'TP.transaction_id'
                        )
                        //->where('transactions.location_id', $register_details->location_id)
                        ->where('transactions.type', 'expense')
                        ->where('transactions.created_by', $user_id)
                        ->whereBetween('transaction_date', [$open_time, $close_time])
                        ->select(
                            'transactions.id',
                            'transactions.document',
                            'transaction_date',
                            'ref_no',
                            'ec.name as category',
                            'payment_status',
                            'additional_notes',
                            'final_total',
                            'transactions.is_recurring',
                            'transactions.recur_interval',
                            'transactions.recur_interval_type',
                            'transactions.recur_repetitions',
                            'transactions.subscription_repeat_on',
                            'bl.name as location_name',
                            DB::raw("CONCAT(COALESCE(U.surname, ''),' ',COALESCE(U.first_name, ''),' ',COALESCE(U.last_name,'')) as expense_for"),
                            DB::raw("CONCAT(tr.name ,' (', tr.amount ,' )') as tax"),
                            
                            DB::raw("CONCAT(COALESCE(usr.surname, ''),' ',COALESCE(usr.first_name, ''),' ',COALESCE(usr.last_name,'')) as added_by"),
                            'transactions.recur_parent_id',
                            'c.name as contact_name'
                        )
                        ->with(['recurring_parent'])
                        ->groupBy('transactions.id')->get();
                        $sum=0;
                          foreach($expenses as $row){
                              $sum+=$row->final_total;
                            }
                           
                            if(sizeof($expenses)>0){
                            $expenses[0]->amount_paid=$sum;
                            $total_expences=$sum;
                          }else{
                              $total_expences=0;
                          }
            $purchases=DB::table('transaction_payments as tp')
                ->join('transactions as t','t.id','tp.transaction_id')
                ->whereIn('t.type', ['purchase', 'opening_balance'])
                ->where('tp.created_by',$user_id)
                ->whereBetween('tp.created_at',[$open_time, $close_time])
                ->select(
                    'tp.*'
                    )
                ->get();

                $purchases=\DB::table('transaction_payments as TP')
                    ->join('transactions AS TR','TP.transaction_id','TR.id')
                    ->join('contacts','TR.contact_id','contacts.id')
                    ->whereIn('TR.type', ['purchase', 'opening_balance'])
                    ->where('TP.created_by',$user_id)
                    ->whereBetween('TP.created_at', [$open_time, $close_time])
                    ->select(
                        'TR.id',
                        'TP.payment_ref_no',
                        'TP.amount',
                        'TR.invoice_no',
                        'contacts.name',
                         DB::raw('SUM(TP.amount) as amount_paid')
                        )->get();

                $sells=\DB::table('transaction_payments as TP')
                    ->join('transactions AS TR','TP.transaction_id','TR.id')
                    ->join('contacts','TR.contact_id','contacts.id')
                  ->whereIn('TR.type', ['sell'])
                    ->where('TP.created_by',$user_id)
                    ->whereBetween('TP.created_at', [$open_time, $close_time])
                    ->select(
                        'TR.id',
                        'TP.payment_ref_no',
                        'TP.amount',
                        'TR.invoice_no',
                        'contacts.name',
                         DB::raw('SUM(TP.amount) as amount_paid')
                        )->get();
                
                //Sell Return
                $sells_return = Transaction::leftJoin('contacts', 'transactions.contact_id', '=', 'contacts.id')
                    ->join(
                        'business_locations AS bl',
                        'transactions.location_id',
                        '=',
                        'bl.id'
                    )
                    ->join(
                        'transactions as T1',
                        'transactions.return_parent_id',
                        '=',
                        'T1.id'
                    )
                    ->leftJoin(
                        'transaction_payments AS TP',
                        'transactions.id',
                        '=',
                        'TP.transaction_id'
                    )
                    ->where('transactions.business_id', $business_id)
                    ->where('transactions.type', 'sell_return')
                    ->where('transactions.status', 'final')
                    ->whereBetween('TP.created_at', [$open_time, $close_time])
                     ->where('TP.created_by',$user_id)
                    ->select(
                        'transactions.id',
                        'transactions.transaction_date',
                        'transactions.invoice_no',
                        'contacts.name',
                        'transactions.final_total',
                        'transactions.payment_status',
                        'bl.name as business_location',
                        'T1.invoice_no as parent_sale',
                        'T1.id as parent_sale_id',
                        DB::raw('SUM(TP.amount) as amount_paid')
                    )->get();
                    
                  //Purchase Return
                  $purchases_returns = Transaction::leftJoin('contacts', 'transactions.contact_id', '=', 'contacts.id')
                    ->join(
                        'business_locations AS BS',
                        'transactions.location_id',
                        '=',
                        'BS.id'
                    )
                    ->leftJoin(
                        'transactions AS T',
                        'transactions.return_parent_id',
                        '=',
                        'T.id'
                    )
                    ->leftJoin(
                        'transaction_payments AS TP',
                        'transactions.id',
                        '=',
                        'TP.transaction_id'
                    )
                    ->where('transactions.business_id', $business_id)
                    ->where('transactions.type', 'purchase_return')
                    ->whereBetween('TP.created_at', [$open_time, $close_time])
                     ->where('TP.created_by',$user_id)
                    ->select(
                        'transactions.id',
                        'transactions.transaction_date',
                        'transactions.ref_no',
                        'contacts.name',
                        'transactions.status',
                        'transactions.payment_status',
                        'transactions.final_total',
                        'transactions.return_parent_id',
                        'BS.name as location_name',
                        'T.ref_no as parent_purchase',
                        DB::raw('SUM(TP.amount) as amount_paid')
                    )->get();
                    

        return view('cash_register.close_register_modal')
                    ->with(compact('register_details','total_expences','sells_return','sells','purchases_returns','expenses','purchases','details', 'payment_types', 'close_time','payements_detail'));
    }

    /**
     * Closes currently opened register.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function postCloseRegister(Request $request)
    {
        if (!auth()->user()->can('close_cash_register')) {
            abort(403, 'Unauthorized action.');
        }

        try {
            //Disable in demo
            if (config('app.env') == 'demo') {
                $output = ['success' => 0,
                                'msg' => 'Feature disabled in demo!!'
                            ];
                return redirect()->action('HomeController@index')->with('status', $output);
            }
            
            $input = $request->only(['closing_amount', 'total_card_slips', 'total_cheques',
                                    'closing_note']);
            $input['closing_amount'] = $this->cashRegisterUtil->num_uf($input['closing_amount']);
            $user_id = $request->input('user_id');
            $input['closed_at'] = \Carbon::now()->format('Y-m-d H:i:s');
            $input['status'] = 'close';

            CashRegister::where('user_id', $user_id)
                                ->where('status', 'open')
                                ->update($input);
            $output = ['success' => 1,
                            'msg' => __('cash_register.close_success')
                        ];
        } catch (\Exception $e) {
            \Log::emergency("File:" . $e->getFile(). "Line:" . $e->getLine(). "Message:" . $e->getMessage());
            $output = ['success' => 0,
                            'msg' => __("messages.something_went_wrong")
                        ];
        }

        return redirect()->back()->with('status', $output);
    }
}
