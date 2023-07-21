<?php $__empty_1 = true; $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
	<div class="col-md-3 col-xs-6 order_div">
		<div class="small-box bg-gray">
            <div class="inner">
            	<h4 class="text-center">#<?php echo e($order->invoice_no, false); ?></h4>
            	<table class="table no-margin no-border table-slim">
            		<tr><th><?php echo app('translator')->get('restaurant.placed_at'); ?></th><td><?php echo e(\Carbon::createFromTimestamp(strtotime($order->created_at))->format(session('business.date_format')), false); ?> <?php echo e(\Carbon::createFromTimestamp(strtotime($order->created_at))->format('H:i'), false); ?></td></tr>
            		<tr><th><?php echo app('translator')->get('restaurant.order_status'); ?></th>
                              <?php
                                    $count_sell_line = count($order->sell_lines);
                                    $count_cooked = count($order->sell_lines->where('res_line_order_status', 'cooked'));
                                    $count_served = count($order->sell_lines->where('res_line_order_status', 'served'));
                                    $order_status =  'received';
                                    if($count_cooked == $count_sell_line) {
                                          $order_status =  'cooked';
                                    } else if($count_served == $count_sell_line) {
                                          $order_status =  'served';
                                    } else if ($count_served > 0 && $count_served < $count_sell_line) {
                                          $order_status =  'partial_served';
                                    } else if ($count_cooked > 0 && $count_cooked < $count_sell_line) {
                                          $order_status =  'partial_cooked';
                                    }
                                    
                              ?>
                              <td><span class="label <?php if($order_status == 'cooked' ): ?> bg-red <?php elseif($order_status == 'served'): ?> bg-green <?php elseif($order_status == 'partial_cooked'): ?> bg-orange <?php else: ?> bg-light-blue <?php endif; ?>"><?php echo app('translator')->get('restaurant.order_statuses.' . $order_status); ?> </span></td>
                        </tr>
            		<tr><th><?php echo app('translator')->get('contact.customer'); ?></th><td><?php echo e($order->customer_name, false); ?></td></tr>
            		<tr><th><?php echo app('translator')->get('restaurant.table'); ?></th><td><?php echo e($order->table_name, false); ?></td></tr>
            		<tr><th><?php echo app('translator')->get('sale.location'); ?></th><td><?php echo e($order->business_location, false); ?></td></tr>
            	</table>
            </div>
            <?php if($orders_for == 'kitchen'): ?>
            	<a href="#" class="btn btn-flat small-box-footer bg-yellow mark_as_cooked_btn" data-href="<?php echo e(action('Restaurant\KitchenController@markAsCooked', [$order->id]), false); ?>"><i class="fa fa-check-square-o"></i> <?php echo app('translator')->get('restaurant.mark_as_cooked'); ?></a>
            <?php elseif($orders_for == 'waiter' && $order->res_order_status != 'served'): ?>
            	<a href="#" class="btn btn-flat small-box-footer bg-yellow mark_as_served_btn" data-href="<?php echo e(action('Restaurant\OrderController@markAsServed', [$order->id]), false); ?>"><i class="fa fa-check-square-o"></i> <?php echo app('translator')->get('restaurant.mark_as_served'); ?></a>
            <?php else: ?>
            	<div class="small-box-footer bg-gray">&nbsp;</div>
            <?php endif; ?>
            	<a href="#" class="btn btn-flat small-box-footer bg-info btn-modal" data-href="<?php echo e(action('SellController@show', [$order->id]), false); ?>" data-container=".view_modal"><?php echo app('translator')->get('restaurant.order_details'); ?> <i class="fa fa-arrow-circle-right"></i></a>
         </div>
	</div>
	<?php if($loop->iteration % 4 == 0): ?>
		<div class="hidden-xs">
			<div class="clearfix"></div>
		</div>
	<?php endif; ?>
	<?php if($loop->iteration % 2 == 0): ?>
		<div class="visible-xs">
			<div class="clearfix"></div>
		</div>
	<?php endif; ?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
<div class="col-md-12">
	<h4 class="text-center"><?php echo app('translator')->get('restaurant.no_orders_found'); ?></h4>
</div>
<?php endif; ?><?php /**PATH /home/u217138193/domains/mzgr0up.com/public_html/erp1/resources/views/restaurant/partials/show_orders.blade.php ENDPATH**/ ?>