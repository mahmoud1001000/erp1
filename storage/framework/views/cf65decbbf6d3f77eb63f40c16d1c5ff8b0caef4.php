<div class="modal fade" id="add_booking_modal" tabindex="-1" role="dialog" 
    	aria-labelledby="gridSystemModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">

		<?php echo Form::open(['url' => action('\Modules\Crm\Http\Controllers\ContactBookingController@store'), 'method' => 'post', 'id' => 'add_booking_form' ]); ?>

			<?php echo Form::hidden('contact_id', auth()->user()->crm_contact_id); ?>

			<?php echo Form::hidden('booking_status', 'waiting'); ?>

			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title"><?php echo app('translator')->get( 'restaurant.add_booking' ); ?></h4>
				</div>

				<div class="modal-body">
					<?php if(count($business_locations) == 1): ?>
						<?php 
							$default_location = current(array_keys($business_locations->toArray())) 
						?>
					<?php else: ?>
						<?php $default_location = null; ?>
					<?php endif; ?>
					<div class="row">
					<div class="col-sm-12">
						<div class="form-group">
							<div class="input-group">
								<span class="input-group-addon">
									<i class="fa fa-map-marker"></i>
								</span>
								<?php echo Form::select('location_id', $business_locations, $default_location, ['class' => 'form-control', 'placeholder' => __('purchase.business_location'), 'required', 'id' => 'booking_location_id']); ?>

							</div>
						</div>
					</div>
					<div class="clearfix"></div>
					<div class="col-sm-6">
						<div class="form-group">
						<?php echo Form::label('status', __('restaurant.start_time') . ':*'); ?>

	            			<div class='input-group date' >
	            			<span class="input-group-addon">
	                    		<span class="glyphicon glyphicon-calendar"></span>
	                		</span>
							<?php echo Form::text('booking_start', null, ['class' => 'form-control','placeholder' => __( 'restaurant.start_time' ), 'required', 'id' => 'start_time', 'readonly']); ?>

							</div>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="form-group">
							<?php echo Form::label('status', __('restaurant.end_time') . ':*'); ?>

	            			<div class='input-group date' >
	            			<span class="input-group-addon">
	                    		<span class="glyphicon glyphicon-calendar"></span>
	                		</span>
							<?php echo Form::text('booking_end', null, ['class' => 'form-control','placeholder' => __( 'restaurant.end_time' ), 'required', 'id' => 'end_time', 'readonly']); ?>

							</div>
						</div>
					</div>
					<div class="col-sm-12">
						<div class="form-group">
						<?php echo Form::label('booking_note', __( 'restaurant.customer_note' ) . ':'); ?>

						<?php echo Form::textarea('booking_note', null, ['class' => 'form-control','placeholder' => __( 'restaurant.customer_note' ), 'rows' => 3 ]); ?>

						</div>
					</div>
				</div>

				<div class="modal-footer">
				<button type="submit" class="btn btn-primary"><?php echo app('translator')->get( 'messages.save' ); ?></button>
				<button type="button" class="btn btn-default" data-dismiss="modal"><?php echo app('translator')->get( 'messages.close' ); ?></button>
			</div>

		<?php echo Form::close(); ?>


		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><?php /**PATH /home/u217138193/domains/mzgr0up.com/public_html/erp1/Modules/Crm/Providers/../Resources/views/booking/create.blade.php ENDPATH**/ ?>