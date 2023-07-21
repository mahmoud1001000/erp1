<?php

namespace Modules\Partners\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Partners\Entities\payment;
use Modules\Partners\Entities\partner;


class PaymentsController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index(Request $request)
    {
        $business_id=auth()->user()->business_id;
        $partners=partner::forDropdown($business_id);
        return view('partners::payments.index',['partners'=>$partners]);
    }


    public function getpayments(Request $request)
    {
        $business_id=auth()->user()->business_id;
        $output='';
        $data=payment::select('partner_payments.*','partners.name','users.first_name as username')
            ->leftjoin('partners','partner_payments.partner_id','=','partners.id')
            ->leftjoin('users','partner_payments.user_id','=','users.id')
            ->where('users.business_id','=',$business_id)
            ->where(function ($query) use ($request){
                if($request->partner_id)
                    $query->where('partners.id',$request->partner_id);

                if($request->type)
                    $query->where('partner_payments.type',$request->type);

            })
            ->get();




          $total=0;
        $type=array('','سحب','إيداع');
        foreach ($data as $row){
                 $total=$total+$row->value;
            $output .='<tr id="'.$row->id.'">';
            $output .='<td>'.$row->name.'</td>';
            $output .='<td>'.abs($row->value).'</td>';
            $output .='<td>'.$row->date.'</td>';
            $output .='<td>'.$type[$row->type].'</td>';
            $output .='<td>'.$row->username.'</td>';
            $output .='<td>'.$row->notes.'</td>';
            $output .='<td> ';
            if(auth()->user()->can('partners.create')){
                $output .='<button onclick="paymentdit('.$row->id.')"  class="btn btn-xs btn-primary btn-modal"><i class="glyphicon glyphicon-edit"></i> تعديل</button>
                         <button onclick="deleteasset('.$row->id.')" class="btn btn-xs btn-danger "><i class="glyphicon glyphicon-trash"></i> حذف</button>';
             }

        $output .='  </td>
                       </tr>';
        }

       /* $output .='<tr>
                     <th colspan="1">الرصيد الحالي : </th>
                     <th colspan="1">'.$total.'</th>
                     <th colspan="5"></th>                    
                    </tr>';*/

            echo $output;

    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        $business_id=auth()->user()->business_id;
        $partners=partner::forDropdown($business_id);
        return view('partners::payments.create',['partners'=>$partners]);
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $value=$request->value;
        if($request->type==2)
            $value=$value*(-1);
        try {
            payment::create([
                'partner_id' => $request->partner_id,
                'value' => $value,
                'type' => $request->type,
                'date' => $request->date,
                'notes' => $request->notes,
                'user_id' => auth()->user()->id,
                'business_id' => auth()->user()->business_id,

            ]);

            $output = ['success' => true,
                'msg' => __('messages.something_went_wrong')
            ];
        }catch (\Exception $e) {
            \Log::emergency("File:" . $e->getFile(). "Line:" . $e->getLine(). "Message:" . $e->getMessage());

            $output = ['success' => false,
                'msg' => __("messages.something_went_wrong")
            ];
        }
      //  return redirect()->action('\Modules\Partners\Http\Controllers\PaymentsController@index');

        return $output;
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
        $data=payment::select('partner_payments.*','partners.name')
            ->leftjoin('partners','partner_payments.partner_id','=','partners.id')
            ->find($id);
        return view('partners::payments.edit',['data'=>$data]);
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $value=$request->value;
        if($request->type==2)
            $value=$value*(-1);

        $data=payment::findOrFail($id);
        $data->value=$value;
        $data->type=$request->type;
        $data->date=$request->date;
        $data->notes=$request->notes;
        $data->user_id=auth()->user()->id;

      $data->save();

        return redirect()->action('\Modules\Partners\Http\Controllers\PaymentsController@index');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        try{
            payment::findorfail($id)->delete();
            $output=['success'=>true
                      ,'msg' => __("partners::lang.Payment_deleted")
                     ];
        } catch (\Exception $e){
            \Log::emergency("File:" . $e->getFile(). "Line:" . $e->getLine(). "Message:" . $e->getMessage());
            $output=['success'=>false
                ,'msg' => __("\"partners::lang.something_went_wrong")
            ];
        }

        return $output;
    }
}
