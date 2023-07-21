<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
class GenQrcode extends Controller
{

    public function index(){

        $val=str_pad(number_format(10000.00,0,'.',''),7,0,STR_PAD_LEFT);
        /*$encoded =$this->tohex(1,0,2).$this->tohex(12,0,2). bin2hex('Bobs Records');
        $encoded .=$this->tohex(2,0,2).$this->tohex(15,0,2). bin2hex('310122393500003');
        $encoded .=$this->tohex(3,0,2).$this->tohex(20,0,2). bin2hex('2022-04-25T15:30:00Z');
        $encoded .=$this->tohex(4,0,2).$this->tohex(7,0,2). bin2hex($val);
        $encoded .=$this->tohex(5,0,2).$this->tohex(6,0,2). bin2hex('150.00');*/

        $invoictotal=str_pad(number_format("1000.00",2,'.',''),7,0,STR_PAD_LEFT);
        $seller=utf8_encode('Bobs Records');
        $encoded1 ='010C'.bin2hex('Bobs Records');
        $encoded2 ='020F'.bin2hex('310122393500003');
        $encoded3 ='0314'.bin2hex('2022-04-25T15:30:00Z');
        $encoded4 ='0407'.bin2hex('1000.00');
        $encoded5 ='0506'.bin2hex('150.00');
        $encoded=$encoded1.$encoded2.$encoded3.$encoded4.$encoded5;
        $decoded = base64_encode(pack('H*',$encoded));
        return view('genqrcode',compact('decoded','seller','invoictotal','encoded1','encoded2','encoded3','encoded4','encoded5','encoded'));

    }
    public function test(Request $request){

        $invoictotal=str_pad(number_format($request->invoictotal,1,'.',''),7,0,STR_PAD_LEFT);
        $valtotal=str_pad(number_format($request->valtotal,1,'.',''),6,0,STR_PAD_LEFT);

        $seller=$request->sellare;//str_pad($request->sellare,12,'*',STR_PAD_LEFT);

        /*dd(unpack('C*',$seller));

        */
        $var=unpack('C*',$seller);
        $l1=dechex(count($var));


        $l2=dechex(strlen($invoictotal));
        $l2='01'.strlen($l1)==1? '0'.$l2:$l2;

        $l2=dechex(strlen($invoictotal));
        $l2='01'.strlen($l1)==1? '0'.$l2:$l2;




        $l2=dechex(strlen($invoictotal));
        $l2='01'.strlen($l1)==1? '0'.$l2:$l2;

        $encoded1 ='01'.$l1. bin2hex($seller);
        $encoded2 ='020F'. bin2hex($request->taxnumber);
        $encoded3 ='0314'. bin2hex($request->timestamp);
        $encoded4 ='04'.$l2. bin2hex($invoictotal);
        $encoded5 ='0506'. bin2hex($valtotal);

        $encoded=$encoded1.$encoded2.$encoded3.$encoded4.$encoded5;
        $decoded = base64_encode(pack('H*',$encoded));

//
        $business_name=$seller;
        $var=unpack('C*',$business_name);
        $l1=dechex(count($var));
        $l1=strlen($l1)==1? '0'.$l1:$l1;
        $encoded1 ='01'.$l1. bin2hex($business_name);

        $tax_info1=$request->taxnumber;
        $l2=dechex(strlen($tax_info1));
        $l2=strlen($l2)==1? '0'.$l2:$l2;
        $encoded2 ='02'.$l2. bin2hex($tax_info1);

        $transaction_date=Carbon::parse($request->timestamp)->format('Y-m-d')."T" .Carbon::parse($request->timestampe)->format('H-i-s')."Z";
        $encoded3 ='0314'. bin2hex($transaction_date);


        $total_final=$request->invoictotal;
        $l4=dechex(strlen($total_final));
        $l4=strlen($l4)==1? '0'.$l4:$l4;
        $encoded4 ='04'.$l4. bin2hex($total_final);

        /* Tax amount after dicount */
        $vat_total=$request->valtotal; // 6
        $l5=dechex(strlen($vat_total));
        $l5=strlen($l5)==1? '0'.$l5:$l5;
        $encoded5 ='05'.$l5. bin2hex($vat_total);


        $encoded=$encoded1.$encoded2.$encoded3.$encoded4.$encoded5;
        $decoded  = base64_encode(pack('H*',$encoded));

        return view('genqrcode',compact('decoded','seller','invoictotal','encoded1','encoded2','encoded3','encoded4','encoded5','encoded'));


    }
}
