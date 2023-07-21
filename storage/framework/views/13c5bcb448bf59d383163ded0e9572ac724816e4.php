<div class="modal-dialog modal-xl" role="document">
	<div class="modal-content">
		<div class="modal-header">
		    <button type="button" class="close no-print" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		    <h4 class="modal-title" id="modalTitle"> <?php echo app('translator')->get('lang_v1.stock_transfer_details'); ?> (<b><?php echo app('translator')->get('purchase.ref_no'); ?>:</b> #<?php echo e($sell_transfer->ref_no, false); ?>)
		    </h4>
		</div>
		<div class="modal-body">
				<div class="row invoice-info">
				  <div class="col-sm-4 invoice-col">
				    <?php echo app('translator')->get('lang_v1.location_from'); ?>:
				    <address>
				      <strong><?php echo e($location_details['sell']->name, false); ?></strong>
				      
				      <?php if(!empty($location_details['sell']->landmark)): ?>
				        <br><?php echo e($location_details['sell']->landmark, false); ?>

				      <?php endif; ?>

				      <?php if(!empty($location_details['sell']->city) || !empty($location_details['sell']->state) || !empty($location_details['sell']->country)): ?>
				        <br><?php echo e(implode(',', array_filter([$location_details['sell']->city, $location_details['sell']->state, $location_details['sell']->country])), false); ?>

				      <?php endif; ?>

				      <?php if(!empty($sell_transfer->contact->tax_number)): ?>
				        <br><?php echo app('translator')->get('contact.tax_no'); ?>: <?php echo e($sell_transfer->contact->tax_number, false); ?>

				      <?php endif; ?>

				      <?php if(!empty($location_details['sell']->mobile)): ?>
				        <br><?php echo app('translator')->get('contact.mobile'); ?>: <?php echo e($location_details['sell']->mobile, false); ?>

				      <?php endif; ?>
				      <?php if(!empty($location_details['sell']->email)): ?>
				        <br>Email: <?php echo e($location_details['sell']->email, false); ?>

				      <?php endif; ?>
				    </address>
				  </div>

				  <div class="col-md-4 invoice-col">
				    <?php echo app('translator')->get('lang_v1.location_to'); ?>:
				    <address>
				      <strong><?php echo e($location_details['purchase']->name, false); ?></strong>
				      
				      <?php if(!empty($location_details['purchase']->landmark)): ?>
				        <br><?php echo e($location_details['purchase']->landmark, false); ?>

				      <?php endif; ?>

				      <?php if(!empty($location_details['purchase']->city) || !empty($location_details['purchase']->state) || !empty($location_details['purchase']->country)): ?>
				        <br><?php echo e(implode(',', array_filter([$location_details['purchase']->city, $location_details['purchase']->state, $location_details['purchase']->country])), false); ?>

				      <?php endif; ?>

				      <?php if(!empty($sell_transfer->contact->tax_number)): ?>
				        <br><?php echo app('translator')->get('contact.tax_no'); ?>: <?php echo e($sell_transfer->contact->tax_number, false); ?>

				      <?php endif; ?>

				      <?php if(!empty($location_details['purchase']->mobile)): ?>
				        <br><?php echo app('translator')->get('contact.mobile'); ?>: <?php echo e($location_details['purchase']->mobile, false); ?>

				      <?php endif; ?>
				      <?php if(!empty($location_details['purchase']->email)): ?>
				        <br>Email: <?php echo e($location_details['purchase']->email, false); ?>

				      <?php endif; ?>
				    </address>
				  </div>

				  <div class="col-sm-4 invoice-col">
				    <b><?php echo app('translator')->get('purchase.ref_no'); ?>:</b> #<?php echo e($sell_transfer->ref_no, false); ?><br/>
				    <b><?php echo app('translator')->get('messages.date'); ?>:</b> <?php echo e(\Carbon::createFromTimestamp(strtotime($sell_transfer->transaction_date))->format(session('business.date_format')), false); ?><br/>
				    <b><?php echo app('translator')->get('sale.status'); ?>:</b> <?php echo e($statuses[$sell_transfer->status] ?? '', false); ?>

				  </div>
				</div>

				<br>
				<div class="row">
				  <div class="col-xs-12">
				    <div class="table-responsive">
				      <table class="table bg-gray">
				        <tr class="bg-green">
				          <th>#</th>
				          <th><?php echo app('translator')->get('sale.product'); ?></th>
				          <th><?php echo app('translator')->get('sale.qty'); ?></th>
				          <th><?php echo app('translator')->get('sale.subtotal'); ?></th>
				        </tr>
				        <?php 
				          $total = 0.00;
				        ?>
				        <?php $__currentLoopData = $sell_transfer->sell_lines; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sell_lines): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				          <tr>
				            <td><?php echo e($loop->iteration, false); ?></td>
				            <td>
				              <?php echo e($sell_lines->product->name, false); ?>

				               <?php if( $sell_lines->product->type == 'variable'): ?>
				                - <?php echo e($sell_lines->variations->product_variation->name, false); ?>

				                - <?php echo e($sell_lines->variations->name, false); ?>

				               <?php endif; ?>
				               <?php if($lot_n_exp_enabled && !empty($sell_lines->lot_details)): ?>
				                <br>
				                <strong><?php echo app('translator')->get('lang_v1.lot_n_expiry'); ?>:</strong> 
				                <?php if(!empty($sell_lines->lot_details->lot_number)): ?>
				                  <?php echo e($sell_lines->lot_details->lot_number, false); ?>

				                <?php endif; ?>
				                <?php if(!empty($sell_lines->lot_details->exp_date)): ?>
				                  - <?php echo e(\Carbon::createFromTimestamp(strtotime($sell_lines->lot_details->exp_date))->format(session('business.date_format')), false); ?>

				                <?php endif; ?>
				               <?php endif; ?>
				            </td>
				            <td><?php echo e(number_format($sell_lines->quantity, config('constants.quantity_precision', 2), session('currency')['decimal_separator'], session('currency')['thousand_separator']), false); ?> <?php echo e($sell_lines->product->unit->short_name ?? "", false); ?></td>
				            <td>
				              <span class="display_currency" data-currency_symbol="true"><?php echo e($sell_lines->unit_price_inc_tax * $sell_lines->quantity, false); ?></span>
				            </td>
				          </tr>
				          <?php 
				            $total += ($sell_lines->unit_price_inc_tax * $sell_lines->quantity);
				          ?>
				        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				      </table>
				    </div>
				  </div>
				</div>
				<br>
				<div class="row">
				  
				  <div class="col-xs-12 col-md-6 col-md-offset-6">
				    <div class="table-responsive">
				      <table class="table">
				        <tr>
				          <th><?php echo app('translator')->get('purchase.net_total_amount'); ?>: </th>
				          <td></td>
				          <td><span class="display_currency pull-right" data-currency_symbol="true"><?php echo e($total, false); ?></span></td>
				        </tr>
				        <?php if( !empty( $sell_transfer->shipping_charges ) ): ?>
				          <tr>
				            <th><?php echo app('translator')->get('purchase.additional_shipping_charges'); ?>:</th>
				            <td><b>(+)</b></td>
				            <td><span class="display_currency pull-right" data-currency_symbol="true"><?php echo e($sell_transfer->shipping_charges, false); ?></span></td>
				          </tr>
				        <?php endif; ?>
				        <tr>
				          <th><?php echo app('translator')->get('purchase.purchase_total'); ?>:</th>
				          <td></td>
				          <td><span class="display_currency pull-right" data-currency_symbol="true" ><?php echo e($sell_transfer->final_total, false); ?></span></td>
				        </tr>
				      </table>
				    </div>
				  </div>
				</div>
				<div class="row">
				  <div class="col-sm-6">
				    <strong><?php echo app('translator')->get('purchase.additional_notes'); ?>:</strong><br>
				    <p class="well well-sm no-shadow bg-gray">
				      <?php if($sell_transfer->additional_notes): ?>
				        <?php echo e($sell_transfer->additional_notes, false); ?>

				      <?php else: ?>
				        --
				      <?php endif; ?>
				    </p>
				  </div>
				</div>
				<div class="row">
			      <div class="col-md-12">
			            <strong><?php echo e(__('lang_v1.activities'), false); ?>:</strong><br>
			            <?php if ($__env->exists('activity_log.activities', ['activity_type' => 'sell'])) echo $__env->make('activity_log.activities', ['activity_type' => 'sell'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
			        </div>
			    </div>
				<div class="row print_section">
				  <div class="col-xs-12">
				    <img class="center-block" src="data:image/png;base64,<?php echo e(DNS1D::getBarcodePNG($sell_transfer->ref_no, 'C128', 2,30,array(39, 48, 54), true), false); ?>">
				  </div>
				</div>
		</div>
		<div class="modal-footer">
			<button type="button" class="btn btn-primary no-print" aria-label="Print" 
			onclick="$(this).closest('div.modal-content').printThis();"><i class="fa fa-print"></i> <?php echo app('translator')->get( 'messages.print' ); ?>
			</button>
			<button type="button" class="btn btn-default no-print" data-dismiss="modal"><?php echo app('translator')->get( 'messages.close' ); ?></button>
		</div>
	</div>
</div><?php /**PATH /home/u217138193/domains/mzgr0up.com/public_html/erp1/resources/views/stock_transfer/show.blade.php ENDPATH**/ ?>