<!-- app css -->
<?php if( in_array(session()->get('user.language', config('app.locale')), config('constants.langs_rtl')) ): ?>
	<link rel="stylesheet" href="<?php echo e(asset('css/rtl.css?v='.$asset_v), false); ?>">
<?php endif; ?>
<?php if(!empty($for_pdf)): ?>
	<link rel="stylesheet" href="<?php echo e(asset('css/app.css?v='.$asset_v), false); ?>">
<?php endif; ?>

<div class="col-md-12 col-sm-12 <?php if(!empty($for_pdf)): ?> width-100 align-left <?php endif; ?>">
	<p class="text-left align-left"><strong><?php echo e($contact->business->name, false); ?></strong>
        	<br>
        	<?php if(!empty($location)): ?>
        		<?php echo $location->city; ?>-<?php echo $location->state; ?>

        	<?php else: ?>

        	<?php endif; ?>
        </p>
</div>

		<div class="co-md-12 col-sm-12 col-xs-12 ">
			<h4 class="mb-0 blue-heading p-4"
				style="text-align: center;font-size: 20px;padding: 10px 0px !important;">
				<?php echo app('translator')->get('lang_v1.account_summary'); ?></h4>
		</div>
		<div class="col-md-6 col-sm-6 col-xs-12 ">
			<p><strong><?php echo e($contact->name, false); ?></strong>
				<?php if(!empty($contact->address_line_1)): ?>
					<br><?php echo e($contact->address_line_1, false); ?>

				<?php endif; ?>
				<?php if(!empty($contact->address_line_2)): ?>
					<br><?php echo e($contact->address_line_2, false); ?>

				<?php endif; ?>
				<?php if(!empty($contact->email)): ?>
					<br><?php echo app('translator')->get('business.email'); ?>: <?php echo e($contact->email, false); ?>

				<?php endif; ?>
				    <br><?php echo app('translator')->get('contact.mobile'); ?>: <?php echo e($contact->mobile, false); ?>

				    <?php if(!empty($contact->tax_number)): ?>
					<br><?php echo app('translator')->get('contact.tax_no'); ?>: <?php echo e($contact->tax_number, false); ?>

				<?php endif; ?>
			</p>
			<small><?php echo app('translator')->get('lang_v1.from'); ?> <?php echo e($ledger_details['start_date'], false); ?> <?php echo app('translator')->get('lang_v1.to'); ?> <?php echo e($ledger_details['end_date'], false); ?></small>

		</div>
		<div class="col-md-6 col-sm-6 col-xs-12">
			<table class="table table-condensed text-right align-right  <?php if(empty($for_pdf)): ?> table-pdf <?php endif; ?>">
				<tr>
					<td class="align-right"><?php echo app('translator')->get('lang_v1.opening_balance'); ?></td>
					<td class="align-right"><?php 
            $formated_number = "";
            if (session("business.currency_symbol_placement") == "before") {
                $formated_number .= session("currency")["symbol"] . " ";
            } 
            $formated_number .= number_format((float) $ledger_details['beginning_balance'], config("constants.currency_precision",2) , session("currency")["decimal_separator"], session("currency")["thousand_separator"]);

            if (session("business.currency_symbol_placement") == "after") {
                $formated_number .= " " . session("currency")["symbol"];
            }
            echo $formated_number; ?></td>
				</tr>
				<?php if( $contact->type == 'supplier' || $contact->type == 'both'): ?>
					<tr>
						<td class="align-right"><?php echo app('translator')->get('report.total_purchase'); ?></td>
						<td class="align-right"><?php 
            $formated_number = "";
            if (session("business.currency_symbol_placement") == "before") {
                $formated_number .= session("currency")["symbol"] . " ";
            } 
            $formated_number .= number_format((float) $ledger_details['total_purchase'], config("constants.currency_precision",2) , session("currency")["decimal_separator"], session("currency")["thousand_separator"]);

            if (session("business.currency_symbol_placement") == "after") {
                $formated_number .= " " . session("currency")["symbol"];
            }
            echo $formated_number; ?></td>
					</tr>
				<?php endif; ?>
				<?php if( $contact->type == 'customer' || $contact->type == 'both'): ?>
					<tr>
						<td class="align-right"><?php echo app('translator')->get('lang_v1.total_invoice'); ?></td>
						<td class="align-right"><?php 
            $formated_number = "";
            if (session("business.currency_symbol_placement") == "before") {
                $formated_number .= session("currency")["symbol"] . " ";
            } 
            $formated_number .= number_format((float) $ledger_details['total_invoice'], config("constants.currency_precision",2) , session("currency")["decimal_separator"], session("currency")["thousand_separator"]);

            if (session("business.currency_symbol_placement") == "after") {
                $formated_number .= " " . session("currency")["symbol"];
            }
            echo $formated_number; ?></td>
					</tr>
				<?php endif; ?>
				<tr>
					<td class="align-right"><?php echo app('translator')->get('sale.total_paid'); ?></td>
					<td class="align-right"><?php 
            $formated_number = "";
            if (session("business.currency_symbol_placement") == "before") {
                $formated_number .= session("currency")["symbol"] . " ";
            } 
            $formated_number .= number_format((float) $ledger_details['total_paid'], config("constants.currency_precision",2) , session("currency")["decimal_separator"], session("currency")["thousand_separator"]);

            if (session("business.currency_symbol_placement") == "after") {
                $formated_number .= " " . session("currency")["symbol"];
            }
            echo $formated_number; ?></td>
				</tr>
				<?php if($contact->balance>0): ?>
				<tr>
					<td class="align-right"><?php echo app('translator')->get('lang_v1.advance_balance'); ?></td>
					<td class="align-right"><?php 
            $formated_number = "";
            if (session("business.currency_symbol_placement") == "before") {
                $formated_number .= session("currency")["symbol"] . " ";
            } 
            $formated_number .= number_format((float) $contact->balance, config("constants.currency_precision",2) , session("currency")["decimal_separator"], session("currency")["thousand_separator"]);

            if (session("business.currency_symbol_placement") == "after") {
                $formated_number .= " " . session("currency")["symbol"];
            }
            echo $formated_number; ?></td>
				</tr>
				<?php endif; ?>
				<tr>
					<td class="align-right"><strong><?php echo app('translator')->get('lang_v1.balance_due'); ?></strong></td>
					<td class="align-right"><?php 
            $formated_number = "";
            if (session("business.currency_symbol_placement") == "before") {
                $formated_number .= session("currency")["symbol"] . " ";
            } 
            $formated_number .= number_format((float) $ledger_details['balance_due'], config("constants.currency_precision",2) , session("currency")["decimal_separator"], session("currency")["thousand_separator"]);

            if (session("business.currency_symbol_placement") == "after") {
                $formated_number .= " " . session("currency")["symbol"];
            }
            echo $formated_number; ?></td>
				</tr>
			</table>
		</div>


<div class="col-md-12 col-sm-12 <?php if(!empty($for_pdf)): ?> width-100 <?php endif; ?>">
	<p class="text-center" style="text-align: center;">
		<strong><?php echo app('translator')->get('lang_v1.ledger_table_heading', ['start_date' => $ledger_details['start_date'], 'end_date' => $ledger_details['end_date']]); ?></strong></p>
	<div class="table-responsive">
	<table class="table table-striped <?php if(!empty($for_pdf)): ?> table-pdf td-border <?php endif; ?>" id="ledger_table">
		<thead>
			<tr class="row-border blue-heading">
				<th width="18%" class="text-center"><?php echo app('translator')->get('lang_v1.date'); ?></th>
				<th width="9%" class="text-center"><?php echo app('translator')->get('purchase.ref_no'); ?></th>
				<th width="8%" class="text-center"><?php echo app('translator')->get('lang_v1.type'); ?></th>
				<?php if(empty($for_pdf)): ?>
				<th width="10%" class="text-center"><?php echo app('translator')->get('sale.location'); ?></th>
				<th width="5%" class="text-center"><?php echo app('translator')->get('sale.payment_status'); ?></th>
				<?php endif; ?>
				
				<th width="10%" class="text-center"><?php echo app('translator')->get('account.debit'); ?></th>
				<th width="10%" class="text-center"><?php echo app('translator')->get('account.credit'); ?></th>

				<th width="10%" class="text-center"><?php echo app('translator')->get('lang_v1.balance'); ?></th>

				<th width="5%" class="text-center"><?php echo app('translator')->get('lang_v1.payment_method'); ?></th>
				<th width="15%" class="text-center"><?php echo app('translator')->get('report.others'); ?></th>

			</tr>
		</thead>
		<tbody>
			<?php $__currentLoopData = $ledger_details['ledger']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<tr <?php if(!empty($for_pdf) && $loop->iteration % 2 == 0): ?> class="odd" <?php endif; ?>>
					<td class="row-border"><?php echo e(\Carbon::createFromTimestamp(strtotime($data['date']))->format(session('business.date_format') . ' ' . 'H:i'), false); ?></td>
					<td><?php echo e($data['ref_no'], false); ?></td>
					<td><?php echo e($data['type'], false); ?></td>
					<?php if(empty($for_pdf)): ?>
					<td><?php echo e($data['location'], false); ?></td>
					<td><?php echo e($data['payment_status'], false); ?></td>
					<?php endif; ?>

					<td class="ws-nowrap align-right"><?php if($data['debit'] != ''): ?> <?php echo e(@number_format($data['debit'],2,'.',','), false); ?> <?php endif; ?></td>
					<td class="ws-nowrap align-right"><?php if($data['credit'] != ''): ?> <?php echo e(@number_format($data['credit'],2,'.',','), false); ?> <?php endif; ?></td>

					<td class="ws-nowrap align-right"><?php echo e($data['balance'], false); ?></td>

					<td><?php echo e($data['payment_method'], false); ?></td>
					<td><?php echo $data['others']; ?></td>

				</tr>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		</tbody>
	</table>
	</div>
</div>
<?php /**PATH /home/u217138193/domains/mzgr0up.com/public_html/erp1/resources/views/contact/ledger.blade.php ENDPATH**/ ?>