<?php

namespace Modules\Partners\Http\Controllers;

use App\Business;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Modules\Partners\Entities\partner;

class PartnersController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        if (!auth()->user()->can('partner.payment_view') ) {
            abort(403, 'Unauthorized action.');
        }

      $business_id = request()->session()->get('user.business_id');
        //$partners=partner::where('business_id', $business_id)->get();

        $partners=partner::select('partners.id','partners.address','partners.mobile','partners.share','partners.name','partners.capital'
            ,DB::raw('sum(partner_payments.value) as value'))
            ->leftjoin('partner_payments','partners.id','=','partner_payments.partner_id')
            ->groupBy('partners.id','partners.address','partners.mobile','partners.name'
            )
            ->where('partners.business_id', $business_id)->get();

        $totalshare=partner::where('business_id', $business_id)->sum('share');
        $totalcapital=partner::where('business_id', $business_id)->sum('capital');
        $business_data=Business::where('id','=',$business_id)->first();


       return view('partners::partners.index',['partners'=>$partners,'totalshare'=>$totalshare,'totalcapital'=>$totalcapital,'business_data'=>$business_data]);
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        if (!auth()->user()->can('partner.payment_edit')) {
            abort(403, 'Unauthorized action.');
        }
      return view('partners::partners.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        if (!auth()->user()->can('partner.payment_edit')) {
            abort(403, 'Unauthorized action.');
        }
        $business_id = request()->session()->get('user.business_id');

        /*if (!(auth()->user()->can('superadmin'))) {
            abort(403, 'Unauthorized action.');
        }*/



        try {
            $data=partner::create([
                'name'    =>$request->name,
                'address' =>$request->address,
                'mobile'  =>$request->mobile,
                'share'   =>$request->share,
                'capital'   =>$request->capital,
                'status'  =>0,
                'business_id'   => $business_id,


            ]);

            $output = [
                'success' => true,
                'msg' => __('lang_v1.success')
            ];
        } catch (Exception $e) {

            \Log::emergency("File:" . $e->getFile(). "Line:" . $e->getLine(). "Message:" . $e->getMessage());

            $output = [
                'success' => false,
                'msg' => __('messages.something_went_wrong')
            ];
        }

        return redirect()->action('\Modules\Partners\Http\Controllers\PartnersController@index');
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

        if (!auth()->user()->can('partner.payment_edit')) {
            abort(403, 'Unauthorized action.');
        }
        $partner= partner::find($id);
        //dd($asset);
        return view('partners::partners.edit',['partner'=>$partner]);
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        if (!auth()->user()->can('partner.payment_edit')) {
            abort(403, 'Unauthorized action.');
        }
        try {
            $data = partner::findOrFail($id);

            $data->name=$request->name;
            $data->address=$request->address;
            $data->mobile=$request->mobile;
            $data->share=$request->share;
            $data->capital=$request->capital;
            $data->save();


            $output = [
                'success' => true,
                'msg' => __('lang_v1.success')
            ];
        } catch (Exception $e) {

            \Log::emergency("File:" . $e->getFile(). "Line:" . $e->getLine(). "Message:" . $e->getMessage());

            $output = [
                'success' => false,
                'msg' => __('messages.something_went_wrong')
            ];
        }
        return redirect()->action('\Modules\Partners\Http\Controllers\PartnersController@index');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        if (!auth()->user()->can('partner.payment_delete')) {
            abort(403, 'Unauthorized action.');
        }
        $partnr= partner::where('id',$id)->delete();
        $output = ['success' => true,
            'msg' => 'تم حذف الأصل'
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
