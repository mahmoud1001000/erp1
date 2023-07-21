<?php
    $custom_labels = json_decode(session('business.custom_labels'), true);
?>
<div class="row">
	<div class="col-md-12">
		<div class="col-md-12">
			<h4><?php echo app('translator')->get('lang_v1.more_info'); ?></h4>
		</div>
		<div class="col-md-4">
			<p><strong><?php echo app('translator')->get( 'lang_v1.dob' ); ?>:</strong> <?php if(!empty($user->dob)): ?> <?php echo e(\Carbon::createFromTimestamp(strtotime($user->dob))->format(session('business.date_format')), false); ?> <?php endif; ?></p>
			<p><strong><?php echo app('translator')->get( 'lang_v1.gender' ); ?>:</strong> <?php if(!empty($user->gender)): ?> <?php echo app('translator')->get('lang_v1.' .$user->gender); ?> <?php endif; ?></p>
			<p><strong><?php echo app('translator')->get( 'lang_v1.marital_status' ); ?>:</strong> <?php if(!empty($user->marital_status)): ?> <?php echo app('translator')->get('lang_v1.' .$user->marital_status); ?> <?php endif; ?></p>
			<p><strong><?php echo app('translator')->get( 'lang_v1.blood_group' ); ?>:</strong> <?php echo e($user->blood_group ?? '', false); ?></p>
			<p><strong><?php echo app('translator')->get( 'lang_v1.mobile_number' ); ?>:</strong> <?php echo e($user->contact_number ?? '', false); ?></p>
			<p><strong><?php echo app('translator')->get( 'business.alternate_number' ); ?>:</strong> <?php echo e($user->alt_number ?? '', false); ?></p>
			<p><strong><?php echo app('translator')->get( 'lang_v1.family_contact_number' ); ?>:</strong> <?php echo e($user->family_number ?? '', false); ?></p>
		</div>
		<div class="col-md-4">
			<p><strong><?php echo app('translator')->get( 'lang_v1.fb_link' ); ?>:</strong> <?php echo e($user->fb_link ?? '', false); ?></p>
			<p><strong><?php echo app('translator')->get( 'lang_v1.twitter_link' ); ?>:</strong> <?php echo e($user->twitter_link ?? '', false); ?></p>
			<p><strong><?php echo app('translator')->get( 'lang_v1.social_media', ['number' => 1] ); ?>:</strong> <?php echo e($user->social_media_1 ?? '', false); ?></p>
			<p><strong><?php echo app('translator')->get( 'lang_v1.social_media', ['number' => 2] ); ?>:</strong> <?php echo e($user->social_media_2 ?? '', false); ?></p>
		</div>
		<div class="col-md-4">
			<p><strong><?php echo e($custom_labels['user']['custom_field_1'] ?? __('lang_v1.user_custom_field1' ), false); ?>:</strong> <?php echo e($user->custom_field_1 ?? '', false); ?></p>
			<p><strong><?php echo e($custom_labels['user']['custom_field_2'] ?? __('lang_v1.user_custom_field2' ), false); ?>:</strong> <?php echo e($user->custom_field_2 ?? '', false); ?></p>
			<p><strong><?php echo e($custom_labels['user']['custom_field_3'] ?? __('lang_v1.user_custom_field3' ), false); ?>:</strong> <?php echo e($user->custom_field_3 ?? '', false); ?></p>
			<p><strong><?php echo e($custom_labels['user']['custom_field_4'] ?? __('lang_v1.user_custom_field4' ), false); ?>:</strong> <?php echo e($user->custom_field_4 ?? '', false); ?></p>
		</div>
		<div class="clearfix"></div>
		<div class="col-md-4">
			<p><strong><?php echo app('translator')->get('lang_v1.id_proof_name'); ?>:</strong>
			<?php echo e($user->id_proof_name ?? '', false); ?></p>
		</div>
		<div class="col-md-4">
			<p><strong><?php echo app('translator')->get('lang_v1.id_proof_number'); ?>:</strong>
			<?php echo e($user->id_proof_number ?? '', false); ?></p>
		</div>
		<div class="clearfix"></div>
		<hr>
		<div class="col-md-6">
			<strong><?php echo app('translator')->get('lang_v1.permanent_address'); ?>:</strong><br>
			<p><?php echo e($user->permanent_address ?? '', false); ?></p>
		</div>
		<div class="col-md-6">
			<strong><?php echo app('translator')->get('lang_v1.current_address'); ?>:</strong><br>
			<p><?php echo e($user->current_address ?? '', false); ?></p>
		</div>
		<div class="clearfix"></div>
		<hr>
		<div class="col-md-12">
			<h4><?php echo app('translator')->get('lang_v1.bank_details'); ?>:</h4>
		</div>
		<?php
			$bank_details = !empty($user->bank_details) ? json_decode($user->bank_details, true) : [];
		?>
		<div class="col-md-4">
			<p><strong><?php echo app('translator')->get('lang_v1.account_holder_name'); ?>:</strong> <?php echo e($bank_details['account_holder_name'] ?? '', false); ?></p>
			<p><strong><?php echo app('translator')->get('lang_v1.account_number'); ?>:</strong> <?php echo e($bank_details['account_number'] ?? '', false); ?></p>
		</div>
		<div class="col-md-4">
			<p><strong><?php echo app('translator')->get('lang_v1.bank_name'); ?>:</strong> <?php echo e($bank_details['bank_name'] ?? '', false); ?></p>
			<p><strong><?php echo app('translator')->get('lang_v1.bank_code'); ?>:</strong> <?php echo e($bank_details['bank_code'] ?? '', false); ?></p>
		</div>
		<div class="col-md-4">
			<p><strong><?php echo app('translator')->get('lang_v1.branch'); ?>:</strong> <?php echo e($bank_details['branch'] ?? '', false); ?></p>
			<p><strong><?php echo app('translator')->get('lang_v1.tax_payer_id'); ?>:</strong> <?php echo e($bank_details['tax_payer_id'] ?? '', false); ?></p>
		</div>
		<?php if(!empty($view_partials)): ?>
	      <?php $__currentLoopData = $view_partials; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $partial): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	        <?php echo $partial; ?>

	      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	    <?php endif; ?>
	</div>
</div><?php /**PATH /home/u217138193/domains/mzgr0up.com/public_html/erp1/resources/views/user/show_details.blade.php ENDPATH**/ ?>