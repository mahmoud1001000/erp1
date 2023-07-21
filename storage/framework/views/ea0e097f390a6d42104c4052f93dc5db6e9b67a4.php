

<?php $__env->startSection('title', __('home.home')); ?>

<?php $__env->startSection('content'); ?>
<!-- Content Header (Page header) -->
<section class="content-header content-header-custom">
    <h1><?php echo e(__('home.welcome_message', ['name' => Session::get('user.first_name')]), false); ?>

    </h1> <br>
</section>
<!-- Main content -->
<section class="content content-custom no-print">
	<div class="row row-custom">
		<?php if( $contact->type == 'supplier' || $contact->type == 'both'): ?>
	    	<div class="col-md-3 col-sm-6 col-xs-12 col-custom">
		      <div class="info-box info-box-new-style">
		        <span class="info-box-icon bg-aqua"><i class="ion ion-cash"></i></span>
		        <div class="info-box-content">
		          <span class="info-box-text fs-10"><?php echo app('translator')->get('report.total_purchase'); ?></span>
		          <span class="info-box-number display_currency" data-currency_symbol="true">
		          	<?php echo e($contact->total_purchase, false); ?>

		          </span>
		        </div>
		      </div>
		    </div>

		    <div class="col-md-3 col-sm-6 col-xs-12 col-custom">
		      <div class="info-box info-box-new-style">
		        <span class="info-box-icon bg-green">
		        	<i class="fas fa-money-check-alt"></i>
		        </span>
		        <div class="info-box-content">
		          <span class="info-box-text fs-10"><?php echo app('translator')->get('contact.total_purchase_paid'); ?></span>
		          <span class="info-box-number display_currency" data-currency_symbol="true">
		          	<?php echo e($contact->purchase_paid, false); ?>

		          </span>
		        </div>
		      </div>
		    </div>

		    <div class="col-md-3 col-sm-6 col-xs-12 col-custom">
		      <div class="info-box info-box-new-style">
		        <span class="info-box-icon bg-yellow">
		        	<i class="fas fa-money-check-alt"></i>
					<i class="fa fa-exclamation"></i>
		        </span>
		        <div class="info-box-content">
		          <span class="info-box-text fs-10"><?php echo app('translator')->get('contact.total_purchase_due'); ?></span>
		          <span class="info-box-number display_currency" data-currency_symbol="true">
		          	<?php echo e($contact->total_purchase - $contact->purchase_paid, false); ?>

		          </span>
		        </div>
		      </div>
		    </div>
	    <?php endif; ?>

	    <?php if( $contact->type == 'customer' || $contact->type == 'both'): ?>
		    <div class="col-md-3 col-sm-6 col-xs-12 col-custom">
		      <div class="info-box info-box-new-style">
		        <span class="info-box-icon bg-aqua">
		        	<i class="ion ion-ios-cart-outline"></i>
		        </span>
		        <div class="info-box-content">
		          <span class="info-box-text fs-10"><?php echo app('translator')->get('report.total_sell'); ?></span>
		          <span class="info-box-number display_currency" data-currency_symbol="true">
		          	<?php echo e($contact->total_invoice, false); ?>

		          </span>
		        </div>
		      </div>
		    </div>

	        <div class="col-md-3 col-sm-6 col-xs-12 col-custom">
	          <div class="info-box info-box-new-style">
	            <span class="info-box-icon bg-green">
	              <i class="fas fa-money-check-alt"></i>
	            </span>
	            <div class="info-box-content">
	              <span class="info-box-text fs-10">
	                <?php echo app('translator')->get('contact.total_sale_paid'); ?>
	              </span>
	              <span class="info-box-number display_currency" data-currency_symbol="true">
	              	<?php echo e($contact->invoice_received, false); ?>

	              </span>
	            </div>
	          </div>
	        </div>

	        <div class="col-md-3 col-sm-6 col-xs-12 col-custom">
	          <div class="info-box info-box-new-style">
	            <span class="info-box-icon bg-yellow">
	              	<i class="fas fa-money-check-alt"></i>
					<i class="fa fa-exclamation"></i>
	            </span>
	            <div class="info-box-content">
	              <span class="info-box-text fs-10">
	                <?php echo app('translator')->get('contact.total_sale_due'); ?>
	              </span>
	              <span class="info-box-number display_currency" data-currency_symbol="true">
	              	<?php echo e($contact->total_invoice - $contact->invoice_received, false); ?>

	              </span>
	            </div>
	          </div>
	        </div>
        <?php endif; ?>

        <?php if(!empty($contact->opening_balance) && $contact->opening_balance != '0.00'): ?>
	        <div class="col-md-3 col-sm-6 col-xs-12 col-custom">
	          <div class="info-box info-box-new-style">
	            <span class="info-box-icon bg-aqua">
	              <i class="fas fa-donate"></i>
	            </span>
	            <div class="info-box-content">
	              <span class="info-box-text fs-10">
	                <?php echo app('translator')->get('lang_v1.opening_balance'); ?>
	              </span>
	              <span class="info-box-number display_currency" data-currency_symbol="true">
		            <?php echo e($contact->opening_balance, false); ?>

		           </span>
	            </div>
	          </div>
	        </div>

	        <div class="col-md-3 col-sm-6 col-xs-12 col-custom">
	          <div class="info-box info-box-new-style">
	            <span class="info-box-icon bg-yellow">
	              <i class="fas fa-donate"></i>
	              <i class="fa fa-exclamation"></i>
	            </span>
	            <div class="info-box-content">
	              <span class="info-box-text fs-10">
	                <?php echo app('translator')->get('lang_v1.opening_balance_due'); ?>
	              </span>
	              <span class="info-box-number display_currency" data-currency_symbol="true">
		            <?php echo e($contact->opening_balance - $contact->opening_balance_paid, false); ?>

		           </span>
	            </div>
	          </div>
	        </div>
	    <?php endif; ?>
    </div>
</section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('crm::layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u217138193/domains/mzgr0up.com/public_html/erp1/Modules/Crm/Providers/../Resources/views/dashboard/index.blade.php ENDPATH**/ ?>