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
@section('content')
<div class="container">
<br><br><br><br>
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <div class="box box-warning">
    	      <div class="box-body">
    	          
<?php
                    if($check_connection_response['status']==true){
                        echo '<label><i class="fa fa-globe" style="color:green" aria-hidden="true"></i>متصل</label>';
                    }
				echo "<br><span>النسخة الحالية </span>  ".$api->current_version;
					$update_data1 = $api->check_update();
				
					if(!empty($update_data1)){
//dd($update_data1);
					    echo '<h5>'.$update_data1['message'].'</h5>';
					    ?>
				            <table class="table table-hover" style="@if($update_data1['status']==false) display:none @endif">
				                <tr>
				                    <td>تاريخ الاصدار</td>
				                    <td>{{$update_data1['release_date']}}</td>
				                </tr>
				                <tr>
				                    <td>ملخص التحديثات </td>
				                    <td>{{$update_data1['summary']}}</td>
				                </tr>
				                <tr>
				                    <td> المزايا الجديدة</td>
				                    <td>{!! $update_data1['changelog']!!}</td>
				                </tr>
				            </table>
				<?php	}
					if(!empty($_POST['update_id'])){
						echo "<div class='text-primary'><progress id=\"prog\" value=\"0\" max=\"100.0\"></progress><br>";
						$api->download_update($_POST['update_id'],$_POST['has_sql'],$_POST['version']); echo "</div>";?>
						<br><br>
					<?php }
					else {
						?>
						<form action="{{URL::to('/lisenceBox/update')}}" method="POST" style="@if($update_data1['status']==false) display:none @endif" >
						    @csrf
							<input type="hidden" class="form-control" value="<?php echo $update_data1['update_id']; ?>" name="update_id">
							<input type="hidden" class="form-control" value="<?php echo $update_data1['has_sql']; ?>" name="has_sql">
							<input type="hidden" class="form-control" value="<?php echo $update_data1['version']; ?>" name="version">
							<button type="submit" class="btn btn-primary">Download Update</button>
						</form><br>
					<?php } ?>
                    <center>
                       <span>زوروا موقعنا </span> <a href="https://WE2UP.com/">WE2UP</a>
                    </center>
					<!--
						<?php
					if(isset($_POST['something'])){
						$deactivate_response = $api->deactivate_license();
						echo "<p class='text-primary'><strong>".$deactivate_response['message']."</strong></p>"; ?>
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