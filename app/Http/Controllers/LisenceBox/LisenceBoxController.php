<?php

namespace App\Http\Controllers\LisenceBox;
//use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LisenceBoxController extends Controller
{
    //
    public function lisenceBox(){
        //dd('herer');
        return view('lisenceBox.index');
    }
     public function download_update(){
        if (!auth()->user()->can('download_update') ) {
            abort(403, 'Unauthorized action.');
        }
        //dd('herer');
        return view('lisenceBox.download_update');
    }
      public function governorates(){
         $business_id = request()->session()->get('user.business_id');
         $govs=\DB::table('governorates')->where('business_id',$business_id)->get();
    
        return view('business.shipping_area',compact('govs'));
    }
}
