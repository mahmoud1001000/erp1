<?php

namespace Modules\Partners\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Modules\Partners\Entities\payment;
use Modules\Partners\Entities\partner;
use Modules\Partners\Entities\Businessprofit;


class FinalAccountController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index(Request $request)
    {
        if (!auth()->user()->can('partners.view') && !auth()->user()->can('partners.create')) {
            abort(403, 'Unauthorized action.');
        }

        $business_id = request()->session()->get('user.business_id');
        $partners=partner::select('partners.id','partners.address','partners.mobile','partners.share','partners.name'
                                  ,DB::raw('sum(partner_payments.value) as value'))
                                  ->leftjoin('partner_payments','partners.id','=','partner_payments.partner_id')
                                  ->groupBy('partners.id','partners.address','partners.mobile','partners.name'
                                             )
                                  ->where('partners.business_id', $business_id)->get();

        
        $totalshare=partner::where('business_id', $business_id)->sum('share');
        $totalval=payment::where('business_id', $business_id)->sum('value');



        if($request->ajax()){

            $data=businessprofit::where('business_id', $business_id)->get();
            $tabledata='';
            foreach ($data as $row){
                $tabledata .='<tr id="'.$row->id.'">';
                $tabledata .='<td>'.$row->profite.'</td>';
                $tabledata .='<td>'.$row->startdate.'</td>';
                $tabledata .='<td>'.$row->enddate.'</td>';
                $tabledata .='<td>'.$row->sharenumber.'</td>';
                $tabledata .='<td>'.number_format($row->profite/$row->sharenumber,2).'</td>';
                $tabledata .='<td>'.$row->notes.'</td>';
                if($row->status==0){
                    $tabledata .='<td>
                                 <button onclick="deleterec('.$row->id.')" class="btn btn-xs btn-danger "><i class="glyphicon glyphicon-trash"></i> حذف</button>
                                 <button onclick="edit('.$row->id.')"  class="btn btn-xs btn-primary btn-modal"><i class="glyphicon glyphicon-edit"></i> تعديل</button>
                                 <button onclick="distribution('.$row->id.')" class="btn btn-xs btn-danger "><i class="glyphicon glyphicon-arrow-down"></i> توزيع</button>
                               </td>';
                }else{
                    $tabledata .='<td><span style="color: red">تم التوزيع علي الشركاء</span>
                                 </td>';
                }

                $tabledata .='</tr>';
            }


            return $tabledata;
        }



        return view('partners::finalaccount.index',['partners'=>$partners,'totalshare'=>$totalshare,'totalval'=>$totalval]);
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        $business_id = request()->session()->get('user.business_id');
        $totalshare=partner::where('business_id', $business_id)->sum('share');
        return view('partners::finalaccount.create',['totalshare'=>$totalshare]);
    }
    public function store(Request $request)
    {
        $business_id = request()->session()->get('user.business_id');
      try {

          businessprofit::create([
                'startdate'=>$request->startdate,
                'enddate'=>$request->enddate,
                'profite'=>$request->profite,
                'sharenumber'=>$request->sharenumber,
                'notes'=>$request->notes,
                'status'=>0,
                'user_id'=>auth()->user()->id,
                'business_id'=>auth()->user()->business_id,

            ]);
            $output = [
                'success' => true,
                'msg' => __('partners::lang.saved_succes')
            ];
        } catch (Exception $e) {

            \Log::emergency("File:" . $e->getFile(). "Line:" . $e->getLine(). "Message:" . $e->getMessage());

            $output = [
                'success' => false,
                'msg' => __('messages.something_went_wrong')
            ];
        }

        return $output;
    }



    public function show($id)
    {
        return view('partners::finalaccount.create');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {

        if (!auth()->user()->can('assets.view') && !auth()->user()->can('assets.create')) {
            abort(403, 'Unauthorized action.');
        }
        $business_id = request()->session()->get('user.business_id');
        $data=businessprofit::findorfail($id);

        return view('partners::finalaccount.edit',['data'=>$data]);
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        try {
            $data = businessprofit::findorfail($id);
            $data ->startdate=$request->startdate;
            $data ->enddate=$request->enddate;
            $data ->profite=$request->profite;
            $data ->sharenumber=$request->sharenumber;
            $data ->notes=$request->notes;
            $data ->user_id=auth()->user()->id ;

            $data->save();
                $output = [
                    'success' => true,
                    'msg' => __('partners::lang.saved_succes')
                ];
            } catch (Exception $e) {

                \Log::emergency("File:" . $e->getFile(). "Line:" . $e->getLine(). "Message:" . $e->getMessage());

                $output = [
                    'success' => false,
                    'msg' => __('messages.something_went_wrong')
                ];
            }

            return $output;
    }


    /* distribution add values to partners save */
    public function distribution(Request $request, $id)
    {
        try {
            $data = businessprofit::findorfail($id);
            $sharval=$data->profite/$data->sharenumber;
            $business_id = request()->session()->get('user.business_id');
           $partners=partner::where('business_id','=',$business_id)->get();
           foreach ($partners as $partner){
               payment::create([
                   'partner_id' => $partner->id,
                   'value' =>-$partner->share*$sharval,
                   'type' =>2,
                   'date' =>Carbon::now(),
                   'notes' => 'قيمة توزيع الأرباح عن المدة من :'.$data->startdate .'إلي :'.$data->enddate,
                   'user_id' => auth()->user()->id,
                   'business_id' => auth()->user()->business_id,

               ]);
           }

           $data->status=1;
           $data->save();





            $output = [
                    'success' => true,
                    'msg' => __('partners::lang.saved_succes')
                ];
            } catch (Exception $e) {

                \Log::emergency("File:" . $e->getFile(). "Line:" . $e->getLine(). "Message:" . $e->getMessage());

                $output = [
                    'success' => false,
                    'msg' => __('messages.something_went_wrong')
                ];
            }

            return $output;
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {

        $partnr= businessprofit::where('id',$id)->delete();
        $output = ['success' => true,
            'msg' => __('partners::lang.Payment_deleted')
        ];

        return $output;
    }
    public function partners(){
        return view('partners::partners');
    }

    public function partners_pay(){
        return view('partners::partners_pay');
    }
    public function partners_set(){
        return view('partners::partners_set');
    }
}
