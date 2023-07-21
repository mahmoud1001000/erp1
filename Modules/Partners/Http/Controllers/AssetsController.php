<?php

namespace Modules\Partners\Http\Controllers;

use App\Account;
use App\BusinessLocation;
use App\Transaction;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Modules\Partners\Entities\Asset;

class AssetsController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        if (!auth()->user()->can('assets.view') && !auth()->user()->can('assets.create')) {
            abort(403, 'Unauthorized action.');
        }


            $business_id = request()->session()->get('user.business_id');
           // $assets= Asset::where('business_id', $business_id)->get();

            $assets=DB::table('assets')->select('assets.*',
                DB::raw('assets.curentprice+assets.type*(YEAR(CURDATE())- YEAR(assets.changedate))*assets.consume_rate/100*assets.curentprice
                as currentvalue'))
                ->where('business_id', $business_id)->get();

            $currentyear=Carbon::now()->year;

           /* foreach ($assets as $index=>$asset)
                $assets[$index]['currentprice2']=$currentyear-date('Y', strtotime( $asset->changedate));*/



            $price=Asset::where('business_id', $business_id)->where('status','<',3)->sum('price');
            $curentprice=Asset::where('business_id', $business_id)->where('status','<',3)->sum('curentprice');


       return view('partners::assets.index',['assets'=>$assets,'price'=>$price,'curentprice'=>$curentprice]);
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        $business_id = request()->session()->get('user.business_id');
        $business_locations = BusinessLocation::forDropdown($business_id);
        $accounts =Account::forDropdown($business_id, true, false, true);
        return view('partners::assets.create',['business_locations'=>$business_locations,'accounts'=>$accounts]);
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $business_id = request()->session()->get('user.business_id');

        /*if (!(auth()->user()->can('superadmin'))) {
            abort(403, 'Unauthorized action.');
        }*/


        try {
            $data=Asset::create([
                'assetcode'     =>$request->assetcode,
                'description'   =>$request->description,
                'purchasedate'  =>$request->purchasedate,
                'price'         =>$request->price,
                'curentprice'   =>$request->curentprice,
                'changedate'    =>$request->changedate,
                'status'    =>$request->status,
                'business_id'   => $business_id,
                'quantity'=>$request->quantity,
                'type'=>$request->type,
                'consume_rate'=>$request->consume_rate,

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

        return redirect()->action('\Modules\Partners\Http\Controllers\AssetsController@index');
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

        if (!auth()->user()->can('assets.view') && !auth()->user()->can('assets.create')) {
            abort(403, 'Unauthorized action.');
        }
        $business_id = request()->session()->get('user.business_id');
        $business_locations = BusinessLocation::forDropdown($business_id);
      $asset= Asset::find($id);
        //dd($asset);
      return view('partners::assets.edit',['asset'=>$asset,'business_locations'=>$business_locations]);
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
            $data = Asset::findOrFail($id);

                $data->assetcode=$request->assetcode;
                $data->description=$request->description;
                $data->purchasedate=$request->purchasedate;
                $data->price=$request->price;
                $data->curentprice=$request->curentprice;
                $data->changedate=$request->changedate;
                $data->status=$request->status;
                $data->quantity=$request->quantity;
                $data->type=$request->type;
                $data->consume_rate=$request->consume_rate;
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
        return redirect()->action('\Modules\Partners\Http\Controllers\AssetsController@index');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {

        $asset= Asset::where('id',$id)->delete();
        $output = ['success' => true,
            'msg' => 'تم حذف الأصل'
        ];

        return $output;
    }
}
