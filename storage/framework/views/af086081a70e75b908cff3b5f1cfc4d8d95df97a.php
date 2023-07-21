<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">

	<a href="<?php echo e(action('\Modules\Crm\Http\Controllers\DashboardController@index'), false); ?>" class="logo">
		<span class="logo-lg"><?php echo e(Session::get('business.name'), false); ?></span>
	</a>

    <!-- Sidebar Menu -->
    <?php echo Menu::render('contact-sidebar-menu', 'adminltecustom'); ?>


    <!-- /.sidebar-menu -->
  </section>
  <!-- /.sidebar -->
</aside>
<?php /**PATH /home/u217138193/domains/mzgr0up.com/public_html/erp1/Modules/Crm/Providers/../Resources/views/layouts/sidebar.blade.php ENDPATH**/ ?>