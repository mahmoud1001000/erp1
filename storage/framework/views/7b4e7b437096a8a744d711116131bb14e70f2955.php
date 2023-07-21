<?php
	$index = isset($index) ? (int) $index : '';
?>
<div class="row">
	<div class="col-md-12">
		<hr>
		<button type="button" class="btn btn-primary more_btn" data-target="#add_contact_person_div_<?php echo e($index, false); ?>"><?php echo app('translator')->get('crm::lang.add_contact_person', ['number' => $index + 1]); ?> <i class="fa fa-chevron-down"></i></button>
	</div>
</div>
<br>
<div class="row <?php if($index !== 0): ?>hide <?php endif; ?>" id="add_contact_person_div_<?php echo e($index, false); ?>">
	<div class="col-md-2">
        <div class="form-group">
         	<?php echo Form::label("surname$index", __( 'business.prefix' ) . ':'); ?>

         	<?php echo Form::text($index === '' ? 'surname' : "contact_persons[$index][surname]", null, ['class' => 'form-control', 'placeholder' => __( 'business.prefix_placeholder' ), 'id' => "surname$index" ]); ?>

        </div>
    </div>
    <div class="col-md-5">
        <div class="form-group">
			<?php echo Form::label("first_name$index", __( 'business.first_name' ) . ':*'); ?>

			<?php echo Form::text($index === '' ? 'first_name' : "contact_persons[$index][first_name]", null, ['class' => 'form-control', 'required', 'placeholder' => __( 'business.first_name' ), 'id' => "first_name$index" ]); ?>

        </div>
	</div>
	<div class="col-md-5">
		<div class="form-group">
			<?php echo Form::label("last_name$index", __( 'business.last_name' ) . ':'); ?>

			<?php echo Form::text($index === '' ? 'last_name' : "contact_persons[$index][last_name]", null, ['class' => 'form-control', 'placeholder' => __( 'business.last_name' ), 'id' => "last_name$index" ]); ?>

		</div>
	</div>
	<div class="clearfix"></div>
	<div class="col-md-6">
		<div class="form-group">
			<?php echo Form::label("email$index", __( 'business.email' ) . ':'); ?>

			<?php echo Form::text($index ==='' ? 'email' : "contact_persons[$index][email]", null, ['class' => 'form-control', 'placeholder' => __( 'business.email' ), 'id' => "email$index" ]); ?>

		</div>
	</div>
	<div class="col-md-6">
		<div class="form-group">
		    <?php echo Form::label("contact_number$index", __( 'lang_v1.mobile_number' ) . ':'); ?>

		    <?php echo Form::text($index === '' ? 'contact_number' : "contact_persons[$index][contact_number]", !empty($user->contact_number) ? $user->contact_number : null, ['class' => 'form-control', 'placeholder' => __( 'lang_v1.mobile_number'), 'id'=>"contact_number$index" ]); ?>

		</div>
	</div>
	<div class="col-md-6">
		<div class="form-group">
		    <?php echo Form::label("alt_number$index", __( 'business.alternate_number' ) . ':'); ?>

		    <?php echo Form::text($index === '' ? 'alt_number' : "contact_persons[$index][alt_number]", !empty($user->alt_number) ? $user->alt_number : null, ['class' => 'form-control', 'placeholder' => __( 'business.alternate_number'), 'id'=>"alt_number$index" ]); ?>

		</div>
	</div>
	<div class="col-md-6">
		<div class="form-group">
		    <?php echo Form::label("family_number$index", __( 'lang_v1.family_contact_number' ) . ':'); ?>

		    <?php echo Form::text($index === '' ? 'family_number' : "contact_persons[$index][family_number]", !empty($user->family_number) ? $user->family_number : null, ['class' => 'form-control', 'placeholder' => __( 'lang_v1.family_contact_number'), 'id'=>"family_number$index" ]); ?>

		</div>
	</div>
	<div class="clearfix"></div>
	<div class="col-md-12">
		<div class="form-group">
            <div class="checkbox">
              <label>
                <?php echo Form::checkbox($index === '' ? 'allow_login' : "contact_persons[$index][allow_login]", 1, false, 
                [ 'class' => 'input-icheck allow_login', "data-loginDiv" => "loginDiv$index"]); ?> <?php echo e(__( 'lang_v1.allow_login' ), false); ?>

              </label>
            </div>
        </div>
	</div>
</div>
<div class="row hide" id="loginDiv<?php echo e($index, false); ?>">
	<div class="col-md-6">
		<div class="form-group">
			<?php echo Form::label("username$index", __( 'business.username' ) . ':*'); ?>

			<?php echo Form::text($index ==='' ? 'username' : "contact_persons[$index][username]", null, ['class' => 'form-control', 'placeholder' => __( 'business.username' ), 'required', 'id'=>"username$index"]); ?>

		</div>
	</div>
	<div class="col-md-6">
		<div class="form-group">
			<?php echo Form::label("password$index", __( 'business.password' ) . ':*'); ?>

			<?php echo Form::password($index === '' ? 'password' : "contact_persons[$index][password]", ['class' => 'form-control', 'required', 'placeholder' => __( 'business.password' ), 'id'=>"password$index" ]); ?>

		</div>
	</div>
	<div class="col-md-6">
		<div class="form-group">
			<?php echo Form::label("confirm_password$index", __( 'business.confirm_password' ) . ':*'); ?>

			<?php echo Form::password($index === '' ? 'confirm_password' : "contact_persons[$index][confirm_password]", ['class' => 'form-control', 'required', 'placeholder' => __( 'business.confirm_password' ), 'id' => "confirm_password$index", 'data-rule-equalTo' => "#password$index" ]); ?>

		</div>
	</div>
  	<div class="clearfix"></div>
	<div class="col-md-4">
		<div class="form-group">
			<label>
				<?php echo Form::checkbox($index === '' ? 'is_active' : "contact_persons[$index][is_active]", 'active', true, ['class' => 'input-icheck status']); ?> <?php echo e(__('lang_v1.status_for_user'), false); ?>

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
</div><?php /**PATH /home/u217138193/domains/mzgr0up.com/public_html/erp1/Modules/Crm/Providers/../Resources/views/contact_login/partial/contact_login_from.blade.php ENDPATH**/ ?>