<?php if(!empty($notifications_data)): ?>
  <?php $__currentLoopData = $notifications_data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $notification_data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <li class="<?php if(empty($notification_data['read_at'])): ?> unread <?php endif; ?> notification-li">
      <a href="<?php echo e($notification_data['link'] ?? '#', false); ?>" 
      <?php if(isset($notification_data['show_popup'])): ?> class="show-notification-in-popup" <?php endif; ?> >
        <i class="notif-icon <?php echo e($notification_data['icon_class'] ?? '', false); ?>"></i> 
        <span class="notif-info"><?php echo $notification_data['msg'] ?? ''; ?></span>
        <span class="time"><?php echo e($notification_data['created_at'], false); ?></span>
      </a>
    </li>
  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php else: ?>
  <li class="text-center no-notification notification-li">
    <?php echo app('translator')->get('lang_v1.no_notifications_found'); ?>
  </li>
<?php endif; ?><?php /**PATH /home/u217138193/domains/mzgr0up.com/public_html/erp1/resources/views/layouts/partials/notification_list.blade.php ENDPATH**/ ?>