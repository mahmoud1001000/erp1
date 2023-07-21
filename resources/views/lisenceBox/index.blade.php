<?php
require_once 'includes/lb_helper.php';
$api = new LicenseBoxAPI(); 
					$check_connection_response = $api->check_connection();
					//dd($check_connection_response);
					//$st=$api->deactivate_license();
					//echo $st;
					//echo "<p class='text-primary'><strong>".$check_connection_response['message']."</strong></p>"; ?>
					<br>
@extends('layouts.app')
@section('title', 'lisenceBox')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.css" integrity="sha512-/zs32ZEJh+/EO2N1b0PEdoA10JkdC3zJ8L5FTiQu82LR9S/rOQNfQN7U59U9BC12swNeRAz3HSzIL2vpp4fv3w==" crossorigin="anonymous" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js" integrity="sha512-d9xgZrVZpmmQlfonhQUvTR7lMPtO7NkZMkA0ABN3PHCbKA5nqylQ/yWlFAyY6hYgdF1Qh6nYiuADWwKB4C2WSw==" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.bundle.js" integrity="sha512-zO8oeHCxetPn1Hd9PdDleg5Tw1bAaP0YmNvPY8CwcRyUk7d7/+nyElmFrB6f7vg4f7Fv4sui1mcep8RIEShczg==" crossorigin="anonymous"></script>
@section('content')
<div class="container">
<br><br><br><br>
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <div class="box box-warning">
    	      <div class="box-body">
			  @if(\Session::has('message'))
				<div class="alert alert-danger">
				
						<li>{{\Session::get('message')}}</li>
				</div>
    	    @endif
<?php
                    if($check_connection_response['status']==true){
                        echo '<label><i class="fa fa-globe" style="color:green" aria-hidden="true"></i>متصل</label>';
                    }
					if(!empty($_POST['license'])&&!empty($_POST['client'])){
						$activate_response = $api->activate_license($_POST['license'],$_POST['client']);
						echo "<p class='text-primary'><strong>".$activate_response['message']."</strong></p>"; 
						\DB::table('lisenceBox')->where('id',1)->update(['lisence'=>$_POST['license'],'client_name'=>$_POST['client']]);
						?>
						<br><br>
					<?php }
					else {
						?>
						<form action="{{URL::to('/lisenceBox')}}" method="POST">
						    @csrf
							<div class="form-group">
								<label for="email"> كود الترخيص :</label>
								<input type="text" class="form-control" name="license" required>
							</div>
							<div class="form-group">
								<label for="pwd">  اسم العميل :</label>
								<input type="text" class="form-control" name="client" required>
								
							</div>
							<button type="submit" class="btn btn-primary"> تنشيط </button>
						</form> 
						<br>
						<?php
					}?>
<center>
   <span>زوروا موقعنا </span> <a href="https://Azha.com/">Azha</a>
</center>
					<!--
						<?php
					if(isset($_POST['something'])){
						$deactivate_response = $api->deactivate_license();
						echo "<p class='text-primary'><strong>AAAAAAAA".$deactivate_response['message']."</strong></p>"; ?>
						<br><br>
					<?php }
					else {
						?>
						<form action="/lisenceBox" method="GET">
								<input type="hidden" class="form-control" name="something">
							<button type="submit" class="btn btn-primary">Deactivate License</button>
						</form> 
						<br>
						<?php
					}?>

					-->
			   </div>
			</div>
		</div>
		<div class="col-md-3"></div>
    </div>
</div>



				
@endsection
