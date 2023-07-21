
<?php $__env->startSection('title',  __('invoice.add_invoice_layout')); ?>

<?php $__env->startSection('content'); ?>
<style type="text/css">



</style>
<?php
  $custom_labels = json_decode(session('business.custom_labels'), true);
?>
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1><?php echo app('translator')->get('invoice.add_invoice_layout'); ?></h1>
</section>

<!-- Main content -->
<section class="content">
<?php echo Form::open(['url' => action('InvoiceLayoutController@store'), 'method' => 'post', 'id' => 'add_invoice_layout_form', 'files' => true]); ?>

  <div class="box box-solid">
    <div class="box-body">
      <div class="row">

        <div class="col-sm-6">
          <div class="form-group">
            <?php echo Form::label('name', __('invoice.layout_name') . ':*'); ?>

              <?php echo Form::text('name', null, ['class' => 'form-control', 'required',
              'placeholder' => __('invoice.layout_name')]); ?>

          </div>
        </div>
        <div class="col-sm-6">
          <div class="form-group">
            <?php echo Form::label('design', __('lang_v1.design') . ':*'); ?>

              <?php echo Form::select('design', $designs, 'classic', ['class' => 'form-control']); ?>

              <span class="help-block">
                <?php echo app('translator')->get('lang_v1.used_for_browser_based_printing'); ?>
              </span>
          </div>

          <div class="form-group hide" id="columnize-taxes">
            <div class="col-md-3">
              <input type="text" class="form-control"
              name="table_tax_headings[]" required="required"
              placeholder="tax 1 name"
              disabled>
              <?php
                if(session('business.enable_tooltip')){
                    echo '<i class="fa fa-info-circle text-info hover-q no-print " aria-hidden="true" 
                    data-container="body" data-toggle="popover" data-placement="auto bottom" 
                    data-content="' . __('lang_v1.tooltip_columnize_taxes_heading') . '" data-html="true" data-trigger="hover"></i>';
                }
                ?>
            </div>
            <div class="col-md-3">
              <input type="text" class="form-control"
              name="table_tax_headings[]" placeholder="tax 2 name"
              disabled>
            </div>
            <div class="col-md-3">
              <input type="text" class="form-control"
              name="table_tax_headings[]" placeholder="tax 3 name"
              disabled>
            </div>
            <div class="col-md-3">
              <input type="text" class="form-control"
              name="table_tax_headings[]" placeholder="tax 4 name"
              disabled>
            </div>
          </div>

        </div>

        <!-- Logo -->
        <div class="col-sm-6">
          <div class="form-group">
            <div class="checkbox">
              <label>
                <?php echo Form::checkbox('show_logo', 1, false, ['class' => 'input-icheck']); ?> <?php echo app('translator')->get('invoice.show_logo'); ?></label>
              </div>
          </div>
        </div>

        <div class="col-sm-6">
          <div class="form-group">
            <?php echo Form::label('logo', __('invoice.invoice_logo') . ':'); ?>

            <?php echo Form::file('logo', ['id' => 'upload_image', 'accept' => 'image/*']); ?>

            <small><p class="help-block"><?php echo app('translator')->get('lang_v1.invoice_logo_help', ['max_size' => '1 MB']); ?> </p></small>
          </div>
        </div>

        <div class="col-sm-12">
          <div class="form-group">
            <?php echo Form::label('header_text', __('invoice.header_text') . ':' ); ?>

            <?php echo Form::textarea('header_text','', ['class' => 'form-control',
              'placeholder' => __('invoice.header_text'), 'rows' => 3]); ?>

          </div>
        </div>
        <div class="clearfix"></div>
        <div class="col-sm-4">
          <div class="form-group">
            <?php echo Form::label('sub_heading_line1', __('lang_v1.sub_heading_line') . ' 1 :' ); ?>

            <?php echo Form::text('sub_heading_line1', null, ['class' => 'form-control',]); ?>

          </div>
        </div>
        <div class="col-sm-4">
          <div class="form-group">
            <?php echo Form::label('sub_heading_line2', __('lang_v1.sub_heading_line') . ' 2 :' ); ?>

            <?php echo Form::text('sub_heading_line2', null, ['class' => 'form-control',
              ]); ?>

          </div>
        </div>
        <div class="col-sm-4">
          <div class="form-group">
            <?php echo Form::label('sub_heading_line3', __('lang_v1.sub_heading_line') . ' 3 :' ); ?>

            <?php echo Form::text('sub_heading_line3', null, ['class' => 'form-control' ]); ?>

          </div>
        </div>
        <div class="col-sm-4">
          <div class="form-group">
            <?php echo Form::label('sub_heading_line4', __('lang_v1.sub_heading_line') . ' 4 :' ); ?>

            <?php echo Form::text('sub_heading_line4',null, ['class' => 'form-control',
            ]); ?>

          </div>
        </div>
        <div class="col-sm-4">
          <div class="form-group">
            <?php echo Form::label('sub_heading_line5', __('lang_v1.sub_heading_line') . ' 5 :' ); ?>

            <?php echo Form::text('sub_heading_line5', null, ['class' => 'form-control']); ?>

          </div>
        </div>
        <div class="clearfix"></div>
      </div>
    </div>
  </div>

  <div class="box box-solid">
  <div class="box-body">
    <div class="row">
        <div class="col-sm-3">
          <div class="form-group">
            <?php echo Form::label('invoice_heading', __('invoice.invoice_heading') . ':' ); ?>

            <?php echo Form::text('invoice_heading', 'Invoice', ['class' => 'form-control',
              'placeholder' => __('invoice.invoice_heading') ]); ?>

          </div>
        </div>
        <div class="col-sm-3">
          <div class="form-group">
            <?php echo Form::label('invoice_heading_not_paid', __('invoice.invoice_heading_not_paid') . ':' ); ?>

            <?php echo Form::text('invoice_heading_not_paid', null, ['class' => 'form-control',
              'placeholder' => __('invoice.invoice_heading_not_paid') ]); ?>

          </div>
        </div>
        <div class="col-sm-3">
          <div class="form-group">
            <?php echo Form::label('invoice_heading_paid', __('invoice.invoice_heading_paid') . ':' ); ?>

            <?php echo Form::text('invoice_heading_paid', null, ['class' => 'form-control',
              'placeholder' => __('invoice.invoice_heading_paid') ]); ?>

          </div>
        </div>
        <div class="col-sm-3">
          <div class="form-group">
            <?php echo Form::label('quotation_heading', __('lang_v1.quotation_heading') . ':' ); ?>

            <?php
                if(session('business.enable_tooltip')){
                    echo '<i class="fa fa-info-circle text-info hover-q no-print " aria-hidden="true" 
                    data-container="body" data-toggle="popover" data-placement="auto bottom" 
                    data-content="' . __('lang_v1.tooltip_quotation_heading') . '" data-html="true" data-trigger="hover"></i>';
                }
                ?>
            <?php echo Form::text('quotation_heading', __('lang_v1.quotation'), ['class' => 'form-control',
              'placeholder' => __('lang_v1.quotation_heading') ]); ?>

          </div>
        </div>
        <div class="clearfix"></div>
        <div class="col-sm-3">
          <div class="form-group">
            <?php echo Form::label('invoice_no_prefix', __('invoice.invoice_no_prefix') . ':' ); ?>

            <?php echo Form::text('invoice_no_prefix', __('sale.invoice_no'), ['class' => 'form-control',
              'placeholder' => __('invoice.invoice_no_prefix') ]); ?>

          </div>
        </div>
        <div class="col-sm-3">
          <div class="form-group">
            <?php echo Form::label('quotation_no_prefix', __('lang_v1.quotation_no_prefix') . ':' ); ?>

            <?php echo Form::text('quotation_no_prefix', __('lang_v1.quotation_no'), ['class' => 'form-control',
              'placeholder' => __('lang_v1.quotation_no_prefix') ]); ?>

          </div>
        </div>
        <div class="col-sm-3">
          <div class="form-group">
            <?php echo Form::label('date_label', __('lang_v1.date_label') . ':' ); ?>

            <?php echo Form::text('date_label', __('lang_v1.date'), ['class' => 'form-control',
              'placeholder' => __('lang_v1.date_label') ]); ?>

          </div>
        </div>

        <div class="col-sm-3">
          <div class="form-group">
            <?php echo Form::label('due_date_label', __('lang_v1.due_date_label') . ':' ); ?>

            <?php echo Form::text('common_settings[due_date_label]', __('lang_v1.due_date'), ['class' => 'form-control',
              'placeholder' => __('lang_v1.due_date_label'), 'id' => 'due_date_label' ]); ?>

          </div>
        </div>
        <div class="col-sm-3">
          <div class="form-group">
            <div class="checkbox">
              <label>
                <?php echo Form::checkbox('common_settings[show_due_date]', 1, false, ['class' => 'input-icheck']); ?> <?php echo app('translator')->get('lang_v1.show_due_date'); ?></label>
              </div>
          </div>
        </div>

        <div class="col-sm-3">
          <div class="form-group">
            <?php echo Form::label('date_time_format', __('lang_v1.date_time_format') . ':' ); ?>

            <?php echo Form::text('date_time_format', null, ['class' => 'form-control',
              'placeholder' => __('lang_v1.date_time_format') ]); ?>

              <p class="help-block"><?php echo __('lang_v1.date_time_format_help'); ?></p>
          </div>
        </div>

        <div class="col-sm-3">
          <div class="form-group">
            <?php echo Form::label('sales_person_label', __('lang_v1.sales_person_label') . ':' ); ?>

            <?php echo Form::text('sales_person_label', null, ['class' => 'form-control',
            'placeholder' => __('lang_v1.sales_person_label') ]); ?>

          </div>
        </div>
        <div class="clearfix"></div>

        <div class="col-sm-3">
          <div class="form-group">
            <div class="checkbox">
              <label>
                <?php echo Form::checkbox('show_business_name', 1, false, ['class' => 'input-icheck']); ?> <?php echo app('translator')->get('invoice.show_business_name'); ?></label>
              </div>
          </div>
        </div>
        <div class="col-sm-3">
          <div class="form-group">
            <div class="checkbox">
              <label>
                <?php echo Form::checkbox('show_location_name', 1, true, ['class' => 'input-icheck']); ?> <?php echo app('translator')->get('invoice.show_location_name'); ?></label>
              </div>
          </div>
        </div>

        <div class="col-sm-3">
          <div class="form-group">
            <div class="checkbox">
              <label>
                <?php echo Form::checkbox('show_sales_person', 1, false, ['class' => 'input-icheck']); ?> <?php echo app('translator')->get('lang_v1.show_sales_person'); ?></label>
              </div>
          </div>
        </div>
        <div class="clearfix"></div>
        <div class="col-sm-12">
          <h4><?php echo app('translator')->get('lang_v1.fields_for_customer_details'); ?>:</h4>
        </div>
        <div class="clearfix"></div>
        <div class="col-sm-3">
          <div class="form-group">
            <div class="checkbox">
              <label>
                <?php echo Form::checkbox('show_customer', 1, true, ['class' => 'input-icheck']); ?> <?php echo app('translator')->get('invoice.show_customer'); ?></label>
              </div>
          </div>
        </div>
        <div class="col-sm-3">
          <div class="form-group">
            <?php echo Form::label('customer_label', __('invoice.customer_label') . ':' ); ?>

            <?php echo Form::text('customer_label', __('contact.customer'), ['class' => 'form-control',
              'placeholder' => __('invoice.customer_label') ]); ?>

          </div>
        </div>
        <div class="col-sm-3">
          <div class="form-group">
            <div class="checkbox">
              <label>
                <?php echo Form::checkbox('show_client_id', 1, false, ['class' => 'input-icheck']); ?> <?php echo app('translator')->get('lang_v1.show_client_id'); ?></label>
              </div>
          </div>
        </div>
        <div class="col-sm-3">
          <div class="form-group">
            <?php echo Form::label('client_id_label', __('lang_v1.client_id_label') . ':' ); ?>

            <?php echo Form::text('client_id_label', null, ['class' => 'form-control',
              'placeholder' => __('lang_v1.client_id_label') ]); ?>

          </div>
        </div>

        <div class="col-sm-3">
          <div class="form-group">
            <?php echo Form::label('client_tax_label', __('lang_v1.client_tax_label') . ':' ); ?>

            <?php echo Form::text('client_tax_label', null, ['class' => 'form-control',
            'placeholder' => __('lang_v1.client_tax_label') ]); ?>

          </div>
        </div>

        <div class="col-sm-3">
          <div class="form-group">
            <div class="checkbox">
              <label>
                <?php echo Form::checkbox('show_reward_point', 1, false, ['class' => 'input-icheck']); ?> <?php echo app('translator')->get('lang_v1.show_reward_point'); ?></label>
              </div>
          </div>
        </div>
        <div class="clearfix"></div>
        <div class="col-sm-3">
        <div class="form-group">
          <div class="checkbox">
            <label>
              <?php echo Form::checkbox('contact_custom_fields[]', 'custom_field1', false, ['class' => 'input-icheck']); ?> <?php echo e($custom_labels['contact']['custom_field_1'] ?? __('lang_v1.contact_custom_field1'), false); ?></label>
          </div>
        </div>
      </div>

      <div class="col-sm-3">
        <div class="form-group">
          <div class="checkbox">
            <label>
              <?php echo Form::checkbox('contact_custom_fields[]', 'custom_field2', false, ['class' => 'input-icheck']); ?> <?php echo e($custom_labels['contact']['custom_field_2'] ?? __('lang_v1.contact_custom_field2'), false); ?></label>
          </div>
        </div>
      </div>

      <div class="col-sm-3">
        <div class="form-group">
          <div class="checkbox">
            <label>
              <?php echo Form::checkbox('contact_custom_fields[]', 'custom_field3', false, ['class' => 'input-icheck']); ?> <?php echo e($custom_labels['contact']['custom_field_3'] ?? __('lang_v1.contact_custom_field3'), false); ?></label>
          </div>
        </div>
      </div>
      <div class="col-sm-3">
        <div class="form-group">
          <div class="checkbox">
            <label>
              <?php echo Form::checkbox('contact_custom_fields[]', 'custom_field4', false, ['class' => 'input-icheck']); ?> <?php echo e($custom_labels['contact']['custom_field_4'] ?? __('lang_v1.contact_custom_field4'), false); ?></label>
          </div>
        </div>
      </div>

        <div class="clearfix"></div>
        <div class="col-sm-12">
          <h4><?php echo app('translator')->get('invoice.fields_to_be_shown_in_address'); ?>:</h4>
        </div>
        <div class="clearfix"></div>
        <div class="col-sm-3">
          <div class="form-group">
            <div class="checkbox">
              <label>
                <?php echo Form::checkbox('show_landmark', 1, true, ['class' => 'input-icheck']); ?> <?php echo app('translator')->get('business.landmark'); ?></label>
              </div>
          </div>
        </div>
        <div class="col-sm-3">
          <div class="form-group">
            <div class="checkbox">
              <label>
                <?php echo Form::checkbox('show_city', 1, true, ['class' => 'input-icheck']); ?> <?php echo app('translator')->get('business.city'); ?></label>
              </div>
          </div>
        </div>
        <div class="col-sm-3">
          <div class="form-group">
            <div class="checkbox">
              <label>
                <?php echo Form::checkbox('show_state', 1, true, ['class' => 'input-icheck']); ?> <?php echo app('translator')->get('business.state'); ?></label>
              </div>
          </div>
        </div>
        <div class="col-sm-3">
          <div class="form-group">
            <div class="checkbox">
              <label>
                <?php echo Form::checkbox('show_country', 1, true, ['class' => 'input-icheck']); ?> <?php echo app('translator')->get('business.country'); ?></label>
              </div>
          </div>
        </div>
        <div class="clearfix"></div>
        <div class="col-sm-3">
          <div class="form-group">
            <div class="checkbox">
              <label>
                <?php echo Form::checkbox('show_zip_code', 1, true, ['class' => 'input-icheck']); ?> <?php echo app('translator')->get('business.zip_code'); ?></label>
              </div>
          </div>
        </div>
        <div class="col-sm-3">
        <div class="form-group">
          <div class="checkbox">
            <label>
              <?php echo Form::checkbox('location_custom_fields[]', 'custom_field1', false, ['class' => 'input-icheck']); ?> <?php echo e($custom_labels['location']['custom_field_1'] ?? __('lang_v1.location_custom_field1'), false); ?></label>
          </div>
        </div>
      </div>

      <div class="col-sm-3">
        <div class="form-group">
          <div class="checkbox">
            <label>
              <?php echo Form::checkbox('location_custom_fields[]', 'custom_field2', false, ['class' => 'input-icheck']); ?> <?php echo e($custom_labels['location']['custom_field_2'] ?? __('lang_v1.location_custom_field2'), false); ?></label>
          </div>
        </div>
      </div>

      <div class="col-sm-3">
        <div class="form-group">
          <div class="checkbox">
            <label>
              <?php echo Form::checkbox('location_custom_fields[]', 'custom_field3', false, ['class' => 'input-icheck']); ?> <?php echo e($custom_labels['location']['custom_field_3'] ?? __('lang_v1.location_custom_field3'), false); ?></label>
          </div>
        </div>
      </div>

      <div class="col-sm-3">
        <div class="form-group">
          <div class="checkbox">
            <label>
              <?php echo Form::checkbox('location_custom_fields[]', 'custom_field4', false, ['class' => 'input-icheck']); ?> <?php echo e($custom_labels['location']['custom_field_4'] ?? __('lang_v1.location_custom_field4'), false); ?></label>
          </div>
        </div>
      </div>

        <div class="clearfix"></div>
         <!-- Shop Communication details -->
        <div class="col-sm-12">
          <h4><?php echo app('translator')->get('invoice.fields_to_shown_for_communication'); ?>:</h4>
        </div>

        <div class="col-sm-3">
          <div class="form-group">
            <div class="checkbox">
              <label>
                <?php echo Form::checkbox('show_mobile_number', 1, true, ['class' => 'input-icheck']); ?> <?php echo app('translator')->get('invoice.show_mobile_number'); ?></label>
              </div>
          </div>
        </div>
        <div class="col-sm-3">
          <div class="form-group">
            <div class="checkbox">
              <label>
                <?php echo Form::checkbox('show_alternate_number', 1, false, ['class' => 'input-icheck']); ?> <?php echo app('translator')->get('invoice.show_alternate_number'); ?></label>
              </div>
          </div>
        </div>
        <div class="col-sm-3">
          <div class="form-group">
            <div class="checkbox">
              <label>
                <?php echo Form::checkbox('show_email', 1, false, ['class' => 'input-icheck']); ?> <?php echo app('translator')->get('invoice.show_email'); ?></label>
              </div>
          </div>
        </div>
    </div>
    </div>
  </div>

  
  <div  class="box box-solid" >
    <div class="box-body">
      <div class="col-sm-12">
        <div class="form-group">
          <label><?php echo app('translator')->get('invoice.fields_to_shown_for_tax'); ?>:</label>
        </div>
      </div>
      <div class="col-sm-4">
        <div class="form-group">
          <?php echo Form::label('tax_number', __('lang_v1.tax_number') . ':' ); ?>

          <?php echo Form::text('tax_number', null, ['class' => 'form-control',]); ?>

        </div>
      </div>
      <div class="col-sm-4">
        <div class="form-group">
          <?php echo Form::label('commercial_register', __('lang_v1.commercial_register') . ':' ); ?>

          <?php echo Form::text('commercial_register', null, ['class' => 'form-control',
            ]); ?>

        </div>
      </div>
      <div class="col-sm-4"  style="display: none">
        <div class="form-group">
          <?php echo Form::label('tax_number2', __('lang_v1.tax_number') . ' 2:' ); ?>

          <?php echo Form::text('tax_number2', null, ['class' => 'form-control' ]); ?>

        </div>
      </div>



      <div class="col-sm-3 d-none" style="display: none">
        <div class="form-group">
          <div class="checkbox">
            <label>
              <?php echo Form::checkbox('show_tax_1', 1, 0, ['class' => 'input-icheck']); ?> <?php echo app('translator')->get('invoice.show_tax_1'); ?></label>
          </div>
        </div>
      </div>
      <div class="col-sm-3 " style="display: none">
        <div class="form-group">
          <div class="checkbox">
            <label>
              <?php echo Form::checkbox('show_tax_2', 1, 0, ['class' => 'input-icheck']); ?> <?php echo app('translator')->get('invoice.show_tax_2'); ?></label>
          </div>
        </div>
      </div>
    </div>
  </div>
  
  <div class="box box-solid">
    <div class="box-body">
      <div class="row">
        <div class="col-sm-3">
          <div class="form-group">
            <?php echo Form::label('table_product_label', __('lang_v1.product_label') . ':' ); ?>

            <?php echo Form::text('table_product_label', __('sale.product'), ['class' => 'form-control',
              'placeholder' => __('lang_v1.product_label') ]); ?>

          </div>
        </div>
        <div class="col-sm-3">
          <div class="form-group">
            <?php echo Form::label('table_qty_label', __('lang_v1.qty_label') . ':' ); ?>

            <?php echo Form::text('table_qty_label', __('lang_v1.quantity'), ['class' => 'form-control',
              'placeholder' => __('lang_v1.qty_label') ]); ?>

          </div>
        </div>
        <div class="col-sm-3">
          <div class="form-group">
            <?php echo Form::label('table_unit_price_label', __('lang_v1.unit_price_label') . ':' ); ?>

            <?php echo Form::text('table_unit_price_label', __('sale.unit_price'), ['class' => 'form-control',
              'placeholder' => __('lang_v1.unit_price_label') ]); ?>

          </div>
        </div>
        <div class="col-sm-3">
          <div class="form-group">
            <?php echo Form::label('table_subtotal_label', __('lang_v1.subtotal_label') . ':' ); ?>

            <?php echo Form::text('table_subtotal_label', __('sale.subtotal'), ['class' => 'form-control',
              'placeholder' => __('lang_v1.subtotal_label') ]); ?>

          </div>
        </div>
        <div class="col-sm-3">
          <div class="form-group">
            <?php echo Form::label('cat_code_label', __('lang_v1.cat_code_label') . ':' ); ?>

            <?php echo Form::text('cat_code_label', 'HSN', ['class' => 'form-control',
              'placeholder' => 'HSN or Category Code' ]); ?>

          </div>
        </div>
        <div class="col-sm-3">
          <div class="form-group">
            <?php echo Form::label('total_quantity_label', __('lang_v1.total_quantity_label') . ':' ); ?>

            <?php echo Form::text('common_settings[total_quantity_label]', 'Total Quantity', ['class' => 'form-control',
              'placeholder' => __('lang_v1.total_quantity_label'), 'id' => 'total_quantity_label' ]); ?>

          </div>
        </div>

        <div class="col-sm-12">
          <h4><?php echo app('translator')->get('lang_v1.product_details_to_be_shown'); ?>:</h4>
        </div>
        <div class="col-sm-3">
          <div class="form-group">
            <div class="checkbox">
              <label>
                <?php echo Form::checkbox('show_brand', 1, false, ['class' => 'input-icheck']); ?> <?php echo app('translator')->get('lang_v1.show_brand'); ?></label>
              </div>
          </div>
        </div>
        <div class="col-sm-3">
          <div class="form-group">
            <div class="checkbox">
              <label>
                <?php echo Form::checkbox('show_sku', 1, true, ['class' => 'input-icheck']); ?> <?php echo app('translator')->get('lang_v1.show_sku'); ?></label>
              </div>
          </div>
        </div>
        <div class="col-sm-3">
          <div class="form-group">
            <div class="checkbox">
              <label>
                <?php echo Form::checkbox('show_cat_code', 1, false, ['class' => 'input-icheck']); ?> <?php echo app('translator')->get('lang_v1.show_cat_code'); ?></label>
              </div>
          </div>
        </div>



        <div class="col-sm-3">
          <div class="form-group">
            <div class="checkbox">
              <label>
                <?php echo Form::checkbox('show_sale_description', 1, false, ['class' => 'input-icheck']); ?> <?php echo app('translator')->get('lang_v1.show_sale_description'); ?></label>
            </div>
            <p class="help-block"><?php echo app('translator')->get('lang_v1.product_imei_or_sn'); ?></p>
          </div>
        </div>
        <div class="clearfix"></div>
        <div class="col-sm-3">
        <div class="form-group">
          <div class="checkbox">
            <label>
              <?php echo Form::checkbox('product_custom_fields[]', 'product_custom_field1', false, ['class' => 'input-icheck']); ?> <?php echo e($custom_labels['product']['custom_field_1'] ?? __('lang_v1.product_custom_field1'), false); ?></label>
          </div>
        </div>
      </div>

      <div class="col-sm-3">
        <div class="form-group">
          <div class="checkbox">
            <label>
              <?php echo Form::checkbox('product_custom_fields[]', 'product_custom_field2', false, ['class' => 'input-icheck']); ?> <?php echo e($custom_labels['product']['custom_field_2'] ?? __('lang_v1.product_custom_field2'), false); ?></label>
          </div>
        </div>
      </div>

      <div class="col-sm-3">
        <div class="form-group">
          <div class="checkbox">
            <label>
              <?php echo Form::checkbox('product_custom_fields[]', 'product_custom_field3', false, ['class' => 'input-icheck']); ?> <?php echo e($custom_labels['product']['custom_field_3'] ?? __('lang_v1.product_custom_field3'), false); ?></label>
          </div>
        </div>
      </div>

      <div class="col-sm-3">
        <div class="form-group">
          <div class="checkbox">
            <label>
              <?php echo Form::checkbox('product_custom_fields[]', 'product_custom_field4', false, ['class' => 'input-icheck']); ?> <?php echo e($custom_labels['product']['custom_field_4'] ?? __('lang_v1.product_custom_field4'), false); ?></label>
          </div>
        </div>
      </div>
      <div class="clearfix"></div>
        <?php if(request()->session()->get('business.enable_product_expiry') == 1): ?>
          <div class="col-sm-3">
            <div class="form-group">
              <div class="checkbox">
                <label>
                  <?php echo Form::checkbox('show_expiry', 1, false, ['class' => 'input-icheck']); ?> <?php echo app('translator')->get('lang_v1.show_product_expiry'); ?></label>
                </div>
            </div>
          </div>
        <?php endif; ?>
        <?php if(request()->session()->get('business.enable_lot_number') == 1): ?>
          <div class="col-sm-3">
            <div class="form-group">
              <div class="checkbox">
                <label>
                  <?php echo Form::checkbox('show_lot', 1, false, ['class' => 'input-icheck']); ?> <?php echo app('translator')->get('lang_v1.show_lot_number'); ?></label>
                </div>
            </div>
          </div>
        <?php endif; ?>

        <div class="col-sm-3">
          <div class="form-group">
            <div class="checkbox">
              <label>
                <?php echo Form::checkbox('show_image', 1, false, ['class' => 'input-icheck']); ?> <?php echo app('translator')->get('lang_v1.show_product_image'); ?></label>
              </div>
          </div>
        </div>

        <div class="clearfix"></div>
        <div class="col-sm-3">
          <div class="form-group">
            <div class="checkbox">
              <label>
                <?php echo Form::checkbox('common_settings[show_warranty_name]', 1, false, ['class' => 'input-icheck']); ?> <?php echo app('translator')->get('lang_v1.show_warranty_name'); ?></label>
              </div>
          </div>
        </div>
        <div class="col-sm-3">
          <div class="form-group">
            <div class="checkbox">
              <label>
                <?php echo Form::checkbox('common_settings[show_warranty_exp_date]', 1, false, ['class' => 'input-icheck']); ?> <?php echo app('translator')->get('lang_v1.show_warranty_exp_date'); ?></label>
              </div>
          </div>
        </div>
        <div class="col-sm-3">
          <div class="form-group">
            <div class="checkbox">
              <label>
                <?php echo Form::checkbox('common_settings[show_warranty_description]', 1, false, ['class' => 'input-icheck']); ?> <?php echo app('translator')->get('lang_v1.show_warranty_description'); ?></label>
              </div>
          </div>
        </div>

      </div>
    </div>
  </div>
  <div class="box box-solid">
    <div class="box-body">
      <div class="row">
        <div class="col-sm-3">
          <div class="form-group">
            <?php echo Form::label('sub_total_label', __('invoice.sub_total_label') . ':' ); ?>

            <?php echo Form::text('sub_total_label', __('sale.subtotal'), ['class' => 'form-control',
              'placeholder' => __('invoice.sub_total_label') ]); ?>

          </div>
        </div>
        <div class="col-sm-3">
          <div class="form-group">
            <?php echo Form::label('discount_label', __('invoice.discount_label') . ':' ); ?>

            <?php echo Form::text('discount_label', __('sale.discount'), ['class' => 'form-control',
              'placeholder' => __('invoice.discount_label') ]); ?>

          </div>
        </div>
        <div class="col-sm-3">
          <div class="form-group">
            <?php echo Form::label('tax_label', __('invoice.tax_label') . ':' ); ?>

            <?php echo Form::text('tax_label', __('sale.tax'), ['class' => 'form-control',
              'placeholder' => __('invoice.tax_label') ]); ?>

          </div>
        </div>
        <div class="col-sm-3">
          <div class="form-group">
            <?php echo Form::label('total_label', __('invoice.total_label') . ':' ); ?>

            <?php echo Form::text('total_label', __('sale.total'), ['class' => 'form-control',
              'placeholder' => __('invoice.total_label') ]); ?>

          </div>
        </div>

        <div class="col-sm-3">
          <div class="form-group">
            <?php echo Form::label('round_off_label', __('lang_v1.round_off_label') . ':' ); ?>

            <?php echo Form::text('round_off_label', __('lang_v1.round_off'), ['class' => 'form-control',
              'placeholder' => __('lang_v1.round_off_label') ]); ?>

          </div>
        </div>

        <div class="col-sm-3">
          <div class="form-group">
            <?php echo Form::label('total_due_label', __('invoice.total_due_label') . ' (' . __('lang_v1.current_sale') . '):' ); ?>

            <?php echo Form::text('total_due_label', __('report.total_due'), ['class' => 'form-control',
              'placeholder' => __('invoice.total_due_label') ]); ?>

          </div>
        </div>
        <div class="col-sm-3">
          <div class="form-group">
            <?php echo Form::label('paid_label', __('invoice.paid_label') . ':' ); ?>

            <?php echo Form::text('paid_label', __('sale.total_paid'), ['class' => 'form-control',
              'placeholder' => __('invoice.paid_label') ]); ?>

          </div>
        </div>

        <div class="col-sm-3">
          <div class="form-group">
            <div class="checkbox">
              <label>
                <?php echo Form::checkbox('show_payments', 1, true, ['class' => 'input-icheck']); ?> <?php echo app('translator')->get('invoice.show_payments'); ?></label>
              </div>
          </div>
        </div>
        <!-- Barcode -->
        <div class="col-sm-3">
          <div class="form-group">
            <div class="checkbox">
              <label>
                <?php echo Form::checkbox('show_barcode', 1, false, ['class' => 'input-icheck']); ?> <?php echo app('translator')->get('invoice.show_barcode'); ?></label>
              </div>
          </div>
        </div>
        <div class="clearfix"></div>
        <div class="col-sm-3">
          <div class="form-group">
            <?php echo Form::label('prev_bal_label', __('invoice.total_due_label') . ' (' . __('lang_v1.all_sales') . '):' ); ?>

            <?php echo Form::text('prev_bal_label', '', ['class' => 'form-control',
              'placeholder' => __('invoice.total_due_label') ]); ?>

          </div>
        </div>
        <div class="col-sm-5">
          <div class="form-group">
            <div class="checkbox">
              <label>
                <?php echo Form::checkbox('show_previous_bal', 1, false, ['class' => 'input-icheck']); ?> <?php echo app('translator')->get('lang_v1.show_previous_bal_due'); ?></label>
                <?php
                if(session('business.enable_tooltip')){
                    echo '<i class="fa fa-info-circle text-info hover-q no-print " aria-hidden="true" 
                    data-container="body" data-toggle="popover" data-placement="auto bottom" 
                    data-content="' . __('lang_v1.previous_bal_due_help') . '" data-html="true" data-trigger="hover"></i>';
                }
                ?>
              </div>
          </div>
        </div>
        <div class="col-sm-3">
          <div class="form-group">
            <?php echo Form::label('change_return_label', __('lang_v1.change_return_label') . ':' ); ?> <?php
                if(session('business.enable_tooltip')){
                    echo '<i class="fa fa-info-circle text-info hover-q no-print " aria-hidden="true" 
                    data-container="body" data-toggle="popover" data-placement="auto bottom" 
                    data-content="' . __('lang_v1.change_return_help') . '" data-html="true" data-trigger="hover"></i>';
                }
                ?>
            <?php echo Form::text('change_return_label', __('lang_v1.change_return'), ['class' => 'form-control',
              'placeholder' => __('lang_v1.change_return_label') ]); ?>

          </div>
        </div>

        <div class="col-sm-3 hide" id="hide_price_div">
          <div class="form-group">
            <div class="checkbox">
              <label>
                <?php echo Form::checkbox('common_settings[hide_price]', 1, false, ['class' => 'input-icheck']); ?> <?php echo app('translator')->get('lang_v1.hide_all_prices'); ?></label>
              </div>
          </div>
        </div>

        <div class="col-sm-3">
          <div class="form-group">
              <label>
                <?php echo Form::checkbox('common_settings[show_total_in_words]', 1, false, ['class' => 'input-icheck']); ?> <?php echo app('translator')->get('lang_v1.show_total_in_words'); ?></label> <?php
                if(session('business.enable_tooltip')){
                    echo '<i class="fa fa-info-circle text-info hover-q no-print " aria-hidden="true" 
                    data-container="body" data-toggle="popover" data-placement="auto bottom" 
                    data-content="' . __('lang_v1.show_in_word_help') . '" data-html="true" data-trigger="hover"></i>';
                }
                ?>
                <?php if(!extension_loaded('intl')): ?>
                  <p class="help-block"><?php echo app('translator')->get('lang_v1.enable_php_intl_extension'); ?></p>
                <?php endif; ?>
          </div>
        </div>

        <div class="col-sm-3">
          <div class="form-group">
            <?php echo Form::label('word_format', __('lang_v1.word_format') . ':'); ?>

            <?php
                if(session('business.enable_tooltip')){
                    echo '<i class="fa fa-info-circle text-info hover-q no-print " aria-hidden="true" 
                    data-container="body" data-toggle="popover" data-placement="auto bottom" 
                    data-content="' . __('lang_v1.word_format_help') . '" data-html="true" data-trigger="hover"></i>';
                }
                ?>
            <?php echo Form::select('common_settings[num_to_word_format]', ['international' => __('lang_v1.international'), 'indian' => __('lang_v1.indian')], 'international', ['class' => 'form-control', 'id' => 'word_format']); ?>

          </div>
        </div>


      </div>
    </div>
  </div>
	<div class="box box-solid">
    <div class="box-body">
      <div class="row">
        <div class="col-sm-6 hide">
          <div class="form-group">
            <?php echo Form::label('highlight_color', __('invoice.highlight_color') . ':' ); ?>

            <?php echo Form::text('highlight_color', '#000000', ['class' => 'form-control',
              'placeholder' => __('invoice.highlight_color') ]); ?>

          </div>
        </div>

        <div class="clearfix"></div>
        <div class="col-md-12 hide">
          <hr/>
        </div>

        <div class="col-sm-12">
          <div class="form-group">
            <?php echo Form::label('footer_text', __('invoice.footer_text') . ':' ); ?>

              <?php echo Form::textarea('footer_text', null, ['class' => 'form-control',
              'placeholder' => __('invoice.footer_text'), 'rows' => 3]); ?>

          </div>
        </div>
        <div class="col-sm-6">
          <div class="form-group">
            <br>
            <div class="checkbox">
              <label>
                <?php echo Form::checkbox('is_default', 1, false, ['class' => 'input-icheck']); ?> <?php echo app('translator')->get('barcode.set_as_default'); ?></label>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  

  <?php $__env->startComponent('components.widget', ['class' => 'box-solid', 'title' => __('lang_v1.qr_code')]); ?>
    <div class="row">
      <div class="col-sm-4">
        <div class="form-group">
          <div class="checkbox">
            <label>
              <?php echo Form::checkbox('show_qr_code', 1,false, ['class' => 'input-icheck']); ?> <?php echo app('translator')->get('lang_v1.show_qr_code'); ?></label>
          </div>
        </div>
      </div>
      <div class="clearfix"></div>
      <div class="col-md-12">
        <h4><?php echo app('translator')->get('lang_v1.fields_to_be_shown'); ?>:</h4>
      </div>

      <div class="col-sm-4">
        <div class="form-group">
          <div class="checkbox">
            <label>
              <?php echo Form::checkbox('qr_code_fields[]', 'business_name', false, ['class' => 'input-icheck']); ?> <?php echo app('translator')->get('business.business_name'); ?></label>
          </div>
        </div>
      </div>
      <div class="col-sm-4">
        <div class="form-group">
          <div class="checkbox">
            <label>
              <?php echo Form::checkbox('qr_code_fields[]', 'address', false, ['class' => 'input-icheck']); ?> <?php echo app('translator')->get('lang_v1.business_location_address'); ?></label>
          </div>
        </div>
      </div>
      <div class="col-sm-4">
        <div class="form-group">
          <div class="checkbox">
            <label>
              <?php echo Form::checkbox('qr_code_fields[]', 'tax_1', false, ['class' => 'input-icheck']); ?> <?php echo app('translator')->get('lang_v1.business_tax_1'); ?></label>
          </div>
        </div>
      </div>
      <div class="col-sm-4">
        <div class="form-group">
          <div class="checkbox">
            <label>
              <?php echo Form::checkbox('qr_code_fields[]', 'tax_2', false, ['class' => 'input-icheck']); ?> <?php echo app('translator')->get('lang_v1.business_tax_2'); ?></label>
          </div>
        </div>
      </div>
      <div class="col-sm-4">
        <div class="form-group">
          <div class="checkbox">
            <label>
              <?php echo Form::checkbox('qr_code_fields[]', 'invoice_no', false, ['class' => 'input-icheck']); ?> <?php echo app('translator')->get('sale.invoice_no'); ?></label>
          </div>
        </div>
      </div>
      <div class="col-sm-4">
        <div class="form-group">
          <div class="checkbox">
            <label>
              <?php echo Form::checkbox('qr_code_fields[]', 'invoice_datetime', false, ['class' => 'input-icheck']); ?> <?php echo app('translator')->get('lang_v1.invoice_datetime'); ?></label>
          </div>
        </div>
      </div>
      <div class="col-sm-4">
        <div class="form-group">
          <div class="checkbox">
            <label>
              <?php echo Form::checkbox('qr_code_fields[]', 'subtotal', false, ['class' => 'input-icheck']); ?> <?php echo app('translator')->get('sale.subtotal'); ?></label>
          </div>
        </div>
      </div>
      <div class="col-sm-4">
        <div class="form-group">
          <div class="checkbox">
            <label>
              <?php echo Form::checkbox('qr_code_fields[]', 'total_amount', false, ['class' => 'input-icheck']); ?> <?php echo app('translator')->get('lang_v1.total_amount_with_tax'); ?></label>
          </div>
        </div>
      </div>
      <div class="col-sm-4">
        <div class="form-group">
          <div class="checkbox">
            <label>
              <?php echo Form::checkbox('qr_code_fields[]', 'total_tax', false, ['class' => 'input-icheck']); ?> <?php echo app('translator')->get('lang_v1.total_tax'); ?></label>
          </div>
        </div>
      </div>
      <div class="col-sm-4">
        <div class="form-group">
          <div class="checkbox">
            <label>
              <?php echo Form::checkbox('qr_code_fields[]', 'customer_name', false, ['class' => 'input-icheck']); ?> <?php echo app('translator')->get('sale.customer_name'); ?></label>
          </div>
        </div>
      </div>
      <div class="col-sm-4">
        <div class="form-group">
          <div class="checkbox">
            <label>
              <?php echo Form::checkbox('qr_code_fields[]', 'invoice_url', false, ['class' => 'input-icheck']); ?> <?php echo app('translator')->get('lang_v1.view_invoice_url'); ?></label>
          </div>
        </div>
      </div>

    </div>
  <?php echo $__env->renderComponent(); ?>


  
  <?php if(!empty($enabled_modules) && in_array('types_of_service', $enabled_modules) ): ?>
    <?php echo $__env->make('types_of_service.invoice_layout_settings', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  <?php endif; ?>

  <!-- Call restaurant module if defined -->
  <?php echo $__env->make('restaurant.partials.invoice_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

  <?php if(Module::has('Repair')): ?>
    <?php echo $__env->make('repair::layouts.partials.invoice_layout_settings', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  <?php endif; ?>
  <div class="box box-solid">
    <div class="box-header with-border">
      <h3 class="box-title"><?php echo app('translator')->get('lang_v1.layout_credit_note'); ?></h3>
    </div>

    <div class="box-body">
      <div class="row">

        <div class="col-sm-3">
          <div class="form-group">
            <?php echo Form::label('cn_heading', __('lang_v1.cn_heading') . ':' ); ?>

            <?php echo Form::text('cn_heading', 'Credit Note', ['class' => 'form-control',
              'placeholder' => __('lang_v1.cn_heading') ]); ?>

          </div>
        </div>

        <div class="col-sm-3">
          <div class="form-group">
            <?php echo Form::label('cn_no_label', __('lang_v1.cn_no_label') . ':' ); ?>

            <?php echo Form::text('cn_no_label', __('purchase.ref_no'), ['class' => 'form-control',
              'placeholder' => __('lang_v1.cn_no_label') ]); ?>

          </div>
        </div>

        <div class="col-sm-3">
          <div class="form-group">
            <?php echo Form::label('cn_amount_label', __('lang_v1.cn_amount_label') . ':' ); ?>

            <?php echo Form::text('cn_amount_label', 'Credit Amount', ['class' => 'form-control', 'placeholder' => __('lang_v1.cn_amount_label') ]); ?>

          </div>
        </div>

      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-sm-12">
      <button type="submit" class="btn btn-primary pull-right"><?php echo app('translator')->get('messages.save'); ?></button>
    </div>
  </div>

  <?php echo Form::close(); ?>

</section>
<!-- /.content -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('javascript'); ?>
<script type="text/javascript">
    var img_fileinput_setting = {
        showUpload: false,
        showPreview: true,
        browseLabel: LANG.file_browse_label,
        removeLabel: LANG.remove,
        previewSettings: {
            image: { 'max-width': '50px', 'max-height': '50px' },
        },
    };
    $('#upload_image').fileinput(img_fileinput_setting);

    __page_leave_confirmation('#add_invoice_layout_form');
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u217138193/domains/mzgr0up.com/public_html/erp1/resources/views/invoice_layout/create.blade.php ENDPATH**/ ?>