<div class="modal-dialog" role="document">
	<?php echo Form::open(['url' => action('\Modules\Crm\Http\Controllers\ContactLoginController@store'), 'method' => 'post', 'id' => 'contact_login_add' ]); ?>

	<div class="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
			<h4 class="modal-title" id="myModalLabel">
				<?php echo app('translator')->get("crm::lang.add_login"); ?>
			</h4>
		</div>
		<div class="modal-body">
			<div class="row">
				<div class="col-md-2">
			        <div class="form-group">
			         	<?php echo Form::label('surname', __( 'business.prefix' ) . ':'); ?>

			         	<?php echo Form::text('surname', null, ['class' => 'form-control', 'placeholder' => __( 'business.prefix_placeholder' ) ]); ?>

			        </div>
			    </div>
			    <div class="col-md-5">
			        <div class="form-group">
						<?php echo Form::label('first_name', __( 'business.first_name' ) . ':*'); ?>

						<?php echo Form::text('first_name', null, ['class' => 'form-control', 'required', 'placeholder' => __( 'business.first_name' ) ]); ?>

			        </div>
				</div>
				<div class="col-md-5">
					<div class="form-group">
						<?php echo Form::label('last_name', __( 'business.last_name' ) . ':'); ?>

						<?php echo Form::text('last_name', null, ['class' => 'form-control', 'placeholder' => __( 'business.last_name' ) ]); ?>

					</div>
				</div>
		      	<div class="clearfix"></div>
		      	<?php if(!empty($contacts)): ?>
		      		<div class="col-md-6">
                        <div class="form-group">
                            <?php echo Form::label('crm_contact_id', __('contact.contact') .':*'); ?>

                            <?php echo Form::select('crm_contact_id', $contacts, null, ['class' => 'form-control select2', 'placeholder' => __('messages.please_select'), 'required', 'style' => 'width: 100%;']); ?>

                        </div>
                    </div>
                <?php else: ?>
                <!-- conatct_id hidden field -->
				<input type="hidden" name="crm_contact_id" value="<?php echo e($crm_contact_id, false); ?>">
		      	<?php endif; ?>
				<div class="col-md-6">
					<div class="form-group">
						<?php echo Form::label('email', __( 'business.email' ) . ':*'); ?>

						<?php echo Form::text('email', null, ['class' => 'form-control', 'required', 'placeholder' => __( 'business.email' ) ]); ?>

					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
					    <?php echo Form::label("contact_number", __( 'lang_v1.mobile_number' ) . ':'); ?>

					    <?php echo Form::text('contact_number', null, ['class' => 'form-control', 'placeholder' => __( 'lang_v1.mobile_number')]); ?>

					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
				    	<?php echo Form::label('alt_number', __( 'business.alternate_number' ) . ':'); ?>

				    	<?php echo Form::text('alt_number', null, ['class' => 'form-control', 'placeholder' => __( 'business.alternate_number') ]); ?>

					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
				    	<?php echo Form::label('family_number', __( 'lang_v1.family_contact_number' ) . ':'); ?>

				    	<?php echo Form::text('family_number', null, ['class' => 'form-control', 'placeholder' => __( 'lang_v1.family_contact_number') ]); ?>

				    </div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<?php echo Form::label('username', __( 'business.username' ) . ':*'); ?>

						<?php echo Form::text('username', null, ['class' => 'form-control', 'placeholder' => __( 'business.username' ), 'required']); ?>

					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<?php echo Form::label('password', __( 'business.password' ) . ':*'); ?>

						<?php echo Form::password('password', ['class' => 'form-control', 'required', 'placeholder' => __( 'business.password' ) ]); ?>

					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<?php echo Form::label('confirm_password', __( 'business.confirm_password' ) . ':*'); ?>

						<?php echo Form::password('confirm_password', ['class' => 'form-control', 'required', 'placeholder' => __( 'business.confirm_password' ) ]); ?>

					</div>
				</div>
		      	<div class="clearfix"></div>
				<div class="col-md-4">
					<div class="form-group">
						<label>
							<?php echo Form::checkbox('is_active', 'active', true, ['class' => 'input-icheck status']); ?> <?php echo e(__('lang_v1.status_for_user'), false); ?>

						</label>
						<?php
                if(session('business.enable_tooltip')){
                    echo '<i class="fa fa-info-circle text-info hover-q no-print " aria-hidden="true" 
                    data-container="body" data-toggle="popover" data-placement="auto bottom" 
                    data-content="' . __('lang_v1.tooltip_enable_user_active') . '" data-html="true" data-trigger="hover"></i>';
                }
                ?>
					</div>
				</div>
			</div>
		</div>
		<div class="modal-footer">
			<button type="button" class="btn btn-default" data-dismiss="modal">
				<?php echo app('translator')->get( 'messages.close' ); ?>
			</button>
			<button type="submit" class="btn btn-primary">
				<?php echo app('translator')->get( 'messages.save' ); ?>
			</button>
		</div>
	</div>
	<?php echo Form::close(); ?>

</div><?php /**PATH /home/u217138193/domains/mzgr0up.com/public_html/erp1/Modules/Crm/Providers/../Resources/views/contact_login/create.blade.php ENDPATH**/ ?>