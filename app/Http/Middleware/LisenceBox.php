<?php

namespace App\Http\Middleware;

use Closure;

class LisenceBox
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        
	/*	$now=now();

         require_once public_path().'/includes/lb_helper.php';
         $api = new \LicenseBoxAPI(); 

         //dd(public_path().'/includes/lb_helper.php');
        
        $curren_lisence=\DB::table('lisenceBox')->first();
		if($curren_lisence == NULL || $curren_lisence->created_at == NULL){
			\DB::table('lisenceBox')->where('id','>',0)->delete();
			 \DB::table('lisenceBox')->insert([
            'id'=>1,
            'lisence'=>0,
            'client_name'=>'Default',
            'created_at'=>'2020-02-01 05:59:12',
            ]);
			 $curren_lisence=\DB::table('lisenceBox')->first();
        }
        $verify_response = $api->verify_license(false,$curren_lisence->lisence,$curren_lisence->client_name);
    //
    $date = date('Y-m-d H:i:s');
    $threedayslater =date('Y-m-d H:i:s',strtotime($curren_lisence->created_at. ' + 30 day'));
   
  
    $verify_response=[];
    if($date > $threedayslater){
        $subs=$api->get_subscriptions();
        if($subs['status']==true){
           $this->update_subscriptions_data($subs[0]);
                
        }
        //dd($threedayslater);
        $verify_response = $api->verify_license(false,$curren_lisence->lisence,$curren_lisence->client_name);
        //dd($verify_response);
        if($verify_response['status'])
		    $update=\DB::table('lisenceBox')->where('id',1)->update(['created_at'=>$now]);
    }else{
        $verify_response['status']=true;
    }
       //dd($verify_response);
       
        if($verify_response['status']==false){
            //dd($verify_response);
            return redirect()->to('/lisenceBox')->with(['message'=>$verify_response['message']]);
        }
        */
        return $next($request);
    }
	//update pacakage data for offline version from license box
public function update_packages($data){
    $update=\DB::table('packages')->where('id','>=',1)->delete();
    foreach($data as $row){
       
    $update=\DB::table('packages')->insert([$row]);
    }
    if($update)
        return true;
    else 
        return false;
        
}
public function update_packages_data($data){

    $update=\DB::table('packages')->where('id','>=',1)->delete();
    foreach($data as $row){
    $update=\DB::table('packages')->insert([$row]);
    }
    if($update)
        return true;
    else 
        return false;
        
}
public function update_subscriptions_data($data){
    
    $update=\DB::table('subscriptions')->where('id','>=',1)->delete();
    foreach($data as $row){
       
    $update=\DB::table('subscriptions')->insert([$row]);
    }
    if($update)
        return true;
    else 
        return false;
}
}
