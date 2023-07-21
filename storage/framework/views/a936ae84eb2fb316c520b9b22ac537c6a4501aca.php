<div class="modal-dialog modal-lg" role="document">
  <div class="modal-content">

  <?php

    if(isset($update_action)) {
        $url = $update_action;
        $customer_groups = [];
        $opening_balance = 0;
        $lead_users = $contact->leadUsers->pluck('id');
    } else {
      $url = action('ContactController@update', [$contact->id]);
      $sources = [];
      $life_stages = [];
      $users = [];
      $lead_users = [];
    }
  ?>

    <?php echo Form::open(['url' => $url, 'method' => 'PUT', 'id' => 'contact_edit_form']); ?>


    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <h4 class="modal-title"><?php echo app('translator')->get('contact.edit_contact'); ?></h4>
    </div>

    <div class="modal-body">

      <div class="row">

        <div class="col-md-4">
          <div class="form-group">
              <?php echo Form::label('type', __('contact.contact_type') . ':*' ); ?>

              <div class="input-group">
                  <span class="input-group-addon">
                      <i class="fa fa-user"></i>
                  </span>
                  <?php echo Form::select('type', $types, $contact->type, ['class' => 'form-control', 'id' => 'contact_type','placeholder' => __('messages.please_select'), 'required']); ?>

              </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
              <?php echo Form::label('contact_id', __('lang_v1.contact_id') . ':'); ?>

              <div class="input-group">
                  <span class="input-group-addon">
                      <i class="fa fa-id-badge"></i>
                  </span>
                  <input type="hidden" id="hidden_id" value="<?php echo e($contact->id, false); ?>">
                  <?php echo Form::text('contact_id', $contact->contact_id, ['class' => 'form-control','placeholder' => __('lang_v1.contact_id')]); ?>

              </div>
              <p class="help-block">
                <?php echo app('translator')->get('lang_v1.leave_empty_to_autogenerate'); ?>
            </p>
          </div>
        </div>
        <div class="col-md-4 customer_fields">
          <div class="form-group">
              <?php echo Form::label('customer_group_id', __('lang_v1.customer_group') . ':'); ?>

              <div class="input-group">
                  <span class="input-group-addon">
                      <i class="fa fa-users"></i>
                  </span>
                  <?php echo Form::select('customer_group_id', $customer_groups, $contact->customer_group_id, ['class' => 'form-control']); ?>

              </div>
          </div>
        </div>
        <div class="clearfix customer_fields"></div>
        <div class="col-md-4">
          <div class="form-group">
              <?php echo Form::label('supplier_business_name', __('business.business_name') . ':'); ?>

              <div class="input-group">
                  <span class="input-group-addon">
                      <i class="fa fa-briefcase"></i>
                  </span>
                  <?php echo Form::text('supplier_business_name', 
                  $contact->supplier_business_name, ['class' => 'form-control', 'placeholder' => __('business.business_name')]); ?>

              </div>
          </div>
        </div>
        <div class="clearfix"></div>
        <div class="col-md-3">
                <div class="form-group">
                    <?php echo Form::label('prefix', __( 'business.prefix' ) . ':'); ?>

                    <?php echo Form::text('prefix', $contact->prefix, ['class' => 'form-control', 'placeholder' => __( 'business.prefix_placeholder' ) ]); ?>

                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <?php echo Form::label('first_name', __( 'business.first_name' ) . ':*'); ?>

                    <?php echo Form::text('first_name', $contact->first_name, ['class' => 'form-control', 'required', 'placeholder' => __( 'business.first_name' ) ]); ?>

                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <?php echo Form::label('middle_name', __( 'lang_v1.middle_name' ) . ':'); ?>

                    <?php echo Form::text('middle_name', $contact->middle_name, ['class' => 'form-control', 'placeholder' => __( 'lang_v1.middle_name' ) ]); ?>

                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <?php echo Form::label('last_name', __( 'business.last_name' ) . ':'); ?>

                    <?php echo Form::text('last_name', $contact->last_name, ['class' => 'form-control', 'placeholder' => __( 'business.last_name' ) ]); ?>

                </div>
            </div>
            <div class="clearfix"></div>

      <div class="col-md-3">
        <div class="form-group">
            <?php echo Form::label('mobile', __('contact.mobile') . ':*'); ?>

            <div class="input-group">
                <span class="input-group-addon">
                    <i class="fa fa-mobile"></i>
                </span>
                <?php echo Form::text('mobile', $contact->mobile, ['class' => 'form-control', 'required', 'placeholder' => __('contact.mobile')]); ?>

            </div>
        </div>
      </div>
      <div class="col-md-3">
        <div class="form-group">
            <?php echo Form::label('alternate_number', __('contact.alternate_contact_number') . ':'); ?>

            <div class="input-group">
                <span class="input-group-addon">
                    <i class="fa fa-phone"></i>
                </span>
                <?php echo Form::text('alternate_number', $contact->alternate_number, ['class' => 'form-control', 'placeholder' => __('contact.alternate_contact_number')]); ?>

            </div>
        </div>
      </div>
      <div class="col-md-3">
        <div class="form-group">
            <?php echo Form::label('landline', __('contact.landline') . ':'); ?>

            <div class="input-group">
                <span class="input-group-addon">
                    <i class="fa fa-phone"></i>
                </span>
                <?php echo Form::text('landline', $contact->landline, ['class' => 'form-control', 'placeholder' => __('contact.landline')]); ?>

            </div>
        </div>
      </div>
      <div class="col-md-3">
            <div class="form-group">
                <?php echo Form::label('email', __('business.email') . ':'); ?>

                <div class="input-group">
                    <span class="input-group-addon">
                        <i class="fa fa-envelope"></i>
                    </span>
                    <?php echo Form::email('email', $contact->email, ['class' => 'form-control','placeholder' => __('business.email')]); ?>

                </div>
            </div>
        </div>

        <div class="col-sm-4">
            <div class="form-group">
                <?php echo Form::label('dob', __('lang_v1.dob') . ':'); ?>

                <div class="input-group">
                    <span class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                    </span>
                    
                    <?php echo Form::text('dob', !empty($contact->dob) ? \Carbon::createFromTimestamp(strtotime($contact->dob))->format(session('business.date_format')) : null, ['class' => 'form-control dob-date-picker','placeholder' => __('lang_v1.dob'), 'readonly']); ?>

                </div>
            </div>
        </div>
        
        <!-- lead additional field -->
        <div class="col-md-4 lead_additional_div">
          <div class="form-group">
              <?php echo Form::label('crm_source', __('lang_v1.source') . ':' ); ?>

              <div class="input-group">
                  <span class="input-group-addon">
                      <i class="fas fa fa-search"></i>
                  </span>
                  <?php echo Form::select('crm_source', $sources, $contact->crm_source , ['class' => 'form-control', 'id' => 'crm_source','placeholder' => __('messages.please_select')]); ?>

              </div>
          </div>
        </div>
        <div class="col-md-4 lead_additional_div">
          <div class="form-group">
              <?php echo Form::label('crm_life_stage', __('lang_v1.life_stage') . ':' ); ?>

              <div class="input-group">
                  <span class="input-group-addon">
                      <i class="fas fa fa-life-ring"></i>
                  </span>
                  <?php echo Form::select('crm_life_stage', $life_stages, $contact->crm_life_stage , ['class' => 'form-control', 'id' => 'crm_life_stage','placeholder' => __('messages.please_select')]); ?>

              </div>
          </div>
        </div>
        <div class="col-md-6 lead_additional_div">
          <div class="form-group">
              <?php echo Form::label('user_id', __('lang_v1.assigned_to') . ':*' ); ?>

              <div class="input-group">
                  <span class="input-group-addon">
                      <i class="fa fa-user"></i>
                  </span>
                  <?php echo Form::select('user_id[]', $users, $lead_users , ['class' => 'form-control select2', 'id' => 'user_id', 'multiple', 'required', 'style' => 'width: 100%;']); ?>

              </div>
          </div>
        </div>

        <div class="col-md-12">
            <button type="button" class="btn btn-primary center-block more_btn" data-target="#more_div"><?php echo app('translator')->get('lang_v1.more_info'); ?> <i class="fa fa-chevron-down"></i></button>
        </div>
        
        <div id="more_div" class="hide">

            <div class="col-md-12"><hr/></div>
        
        <div class="col-md-4">
          <div class="form-group">
              <?php echo Form::label('tax_number', __('contact.tax_no') . ':'); ?>

              <div class="input-group">
                  <span class="input-group-addon">
                      <i class="fa fa-info"></i>
                  </span>
                  <?php echo Form::text('tax_number', $contact->tax_number, ['class' => 'form-control', 'placeholder' => __('contact.tax_no')]); ?>

              </div>
          </div>
        </div>

        
        <div class="col-md-4 opening_balance">
          <div class="form-group">
              <?php echo Form::label('opening_balance', __('lang_v1.opening_balance') . ':'); ?>

              <div class="input-group">
                  <span class="input-group-addon">
                      <i class="fas fa-money-bill-alt"></i>
                  </span>
                  <?php echo Form::text('opening_balance', $opening_balance, ['class' => 'form-control input_number']); ?>

              </div>
          </div>
        </div>

        <div class="col-md-4 pay_term">
          <div class="form-group">
            <div class="multi-input">
              <?php echo Form::label('pay_term_number', __('contact.pay_term') . ':'); ?> <?php
                if(session('business.enable_tooltip')){
                    echo '<i class="fa fa-info-circle text-info hover-q no-print " aria-hidden="true" 
                    data-container="body" data-toggle="popover" data-placement="auto bottom" 
                    data-content="' . __('tooltip.pay_term') . '" data-html="true" data-trigger="hover"></i>';
                }
                ?>
              <br/>
              <?php echo Form::number('pay_term_number', $contact->pay_term_number, ['class' => 'form-control width-40 pull-left', 'placeholder' => __('contact.pay_term')]); ?>


              <?php echo Form::select('pay_term_type', ['months' => __('lang_v1.months'), 'days' => __('lang_v1.days')], $contact->pay_term_type, ['class' => 'form-control width-60 pull-left','placeholder' => __('messages.please_select')]); ?>

            </div>
          </div>
        </div>
        <div class="clearfix"></div>
        
        <div class="col-md-4 customer_fields">
          <div class="form-group">
              <?php echo Form::label('credit_limit', __('lang_v1.credit_limit') . ':'); ?>

              <div class="input-group">
                  <span class="input-group-addon">
                      <i class="fas fa-money-bill-alt"></i>
                  </span>
                  <?php echo Form::text('credit_limit', $contact->credit_limit != null ? number_format($contact->credit_limit, config('constants.currency_precision', 2), session('currency')['decimal_separator'], session('currency')['thousand_separator']) : null, ['class' => 'form-control input_number']); ?>

              </div>
              <p class="help-block"><?php echo app('translator')->get('lang_v1.credit_limit_help'); ?></p>
          </div>
        </div>
          
      <div class="col-md-12">
        <hr/>
      </div>
      
      <div class="col-md-6">
        <div class="form-group">
            <?php echo Form::label('address_line_1', __('lang_v1.address_line_1') . ':'); ?>

            <?php echo Form::text('address_line_1', $contact->address_line_1, ['class' => 'form-control', 'placeholder' => __('lang_v1.address_line_1'), 'rows' => 3]); ?>

        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
            <?php echo Form::label('address_line_2', __('lang_v1.address_line_2') . ':'); ?>

            <?php echo Form::text('address_line_2', $contact->address_line_2, ['class' => 'form-control', 
                'placeholder' => __('lang_v1.address_line_2'), 'rows' => 3]); ?>

        </div>
      </div>
      <div class="clearfix"></div>
      <div class="col-md-3">
        <div class="form-group">
            <?php echo Form::label('city', __('business.city') . ':'); ?>

            <div class="input-group">
                <span class="input-group-addon">
                    <i class="fa fa-map-marker"></i>
                </span>
                <?php echo Form::text('city', $contact->city, ['class' => 'form-control', 'placeholder' => __('business.city')]); ?>

            </div>
        </div>
      </div>
      <div class="col-md-3">
        <div class="form-group">
            <?php echo Form::label('state', __('business.state') . ':'); ?>

            <div class="input-group">
                <span class="input-group-addon">
                    <i class="fa fa-map-marker"></i>
                </span>
                <?php echo Form::text('state', $contact->state, ['class' => 'form-control', 'placeholder' => __('business.state')]); ?>

            </div>
        </div>
      </div>
      <div class="col-md-3">
        <div class="form-group">
            <?php echo Form::label('country', __('business.country') . ':'); ?>

            <div class="input-group">
                <span class="input-group-addon">
                    <i class="fa fa-globe"></i>
                </span>
                <?php echo Form::text('country', $contact->country, ['class' => 'form-control', 'placeholder' => __('business.country')]); ?>

            </div>
        </div>
      </div>
      <div class="col-md-3">
        <div class="form-group">
            <?php echo Form::label('zip_code', __('business.zip_code') . ':'); ?>

            <div class="input-group">
                <span class="input-group-addon">
                    <i class="fa fa-map-marker"></i>
                </span>
                <?php echo Form::text('zip_code', $contact->zip_code, ['class' => 'form-control', 
                'placeholder' => __('business.zip_code_placeholder')]); ?>

            </div>
        </div>
      </div>
      <div class="clearfix"></div>
      <div class="col-md-12">
        <hr/>
      </div>
      <?php
        $custom_labels = json_decode(session('business.custom_labels'), true);
        $contact_custom_field1 = !empty($custom_labels['contact']['custom_field_1']) ? $custom_labels['contact']['custom_field_1'] : __('lang_v1.contact_custom_field1');
        $contact_custom_field2 = !empty($custom_labels['contact']['custom_field_2']) ? $custom_labels['contact']['custom_field_2'] : __('lang_v1.contact_custom_field2');
        $contact_custom_field3 = !empty($custom_labels['contact']['custom_field_3']) ? $custom_labels['contact']['custom_field_3'] : __('lang_v1.contact_custom_field3');
        $contact_custom_field4 = !empty($custom_labels['contact']['custom_field_4']) ? $custom_labels['contact']['custom_field_4'] : __('lang_v1.contact_custom_field4');
        $contact_custom_field5 = !empty($custom_labels['contact']['custom_field_5']) ? $custom_labels['contact']['custom_field_5'] : __('lang_v1.custom_field', ['number' => 5]);
        $contact_custom_field6 = !empty($custom_labels['contact']['custom_field_6']) ? $custom_labels['contact']['custom_field_6'] : __('lang_v1.custom_field', ['number' => 6]);
        $contact_custom_field7 = !empty($custom_labels['contact']['custom_field_7']) ? $custom_labels['contact']['custom_field_7'] : __('lang_v1.custom_field', ['number' => 7]);
        $contact_custom_field8 = !empty($custom_labels['contact']['custom_field_8']) ? $custom_labels['contact']['custom_field_8'] : __('lang_v1.custom_field', ['number' => 8]);
        $contact_custom_field9 = !empty($custom_labels['contact']['custom_field_9']) ? $custom_labels['contact']['custom_field_9'] : __('lang_v1.custom_field', ['number' => 9]);
        $contact_custom_field10 = !empty($custom_labels['contact']['custom_field_10']) ? $custom_labels['contact']['custom_field_10'] : __('lang_v1.custom_field', ['number' => 10]);
      ?>
      <div class="col-md-3">
        <div class="form-group">
            <?php echo Form::label('custom_field1', $contact_custom_field1 . ':'); ?>

            <?php echo Form::text('custom_field1', $contact->custom_field1, ['class' => 'form-control', 
                'placeholder' => $contact_custom_field1]); ?>

        </div>
      </div>
      <div class="col-md-3">
        <div class="form-group">
            <?php echo Form::label('custom_field2', $contact_custom_field2 . ':'); ?>

            <?php echo Form::text('custom_field2', $contact->custom_field2, ['class' => 'form-control', 
                'placeholder' => $contact_custom_field2]); ?>

        </div>
      </div>
      <div class="col-md-3">
        <div class="form-group">
            <?php echo Form::label('custom_field3', $contact_custom_field3 . ':'); ?>

            <?php echo Form::text('custom_field3', $contact->custom_field3, ['class' => 'form-control', 
                'placeholder' => $contact_custom_field3]); ?>

        </div>
      </div>
      <div class="col-md-3">
        <div class="form-group">
            <?php echo Form::label('custom_field4', $contact_custom_field4 . ':'); ?>

            <?php echo Form::text('custom_field4', $contact->custom_field4, ['class' => 'form-control', 
                'placeholder' => $contact_custom_field4]); ?>

        </div>
      </div>
      <div class="col-md-3">
        <div class="form-group">
            <?php echo Form::label('custom_field5', $contact_custom_field5 . ':'); ?>

            <?php echo Form::text('custom_field5', $contact->custom_field5, ['class' => 'form-control', 
                'placeholder' => $contact_custom_field5]); ?>

        </div>
      </div>
      <div class="col-md-3">
        <div class="form-group">
            <?php echo Form::label('custom_field6', $contact_custom_field6 . ':'); ?>

            <?php echo Form::text('custom_field6', $contact->custom_field6, ['class' => 'form-control', 
                'placeholder' => $contact_custom_field6]); ?>

        </div>
      </div>
      <div class="col-md-3">
        <div class="form-group">
            <?php echo Form::label('custom_field7', $contact_custom_field7 . ':'); ?>

            <?php echo Form::text('custom_field7', $contact->custom_field7, ['class' => 'form-control', 
                'placeholder' => $contact_custom_field7]); ?>

        </div>
      </div>
      <div class="col-md-3">
        <div class="form-group">
            <?php echo Form::label('custom_field8', $contact_custom_field8 . ':'); ?>

            <?php echo Form::text('custom_field8', $contact->custom_field8, ['class' => 'form-control', 
                'placeholder' => $contact_custom_field8]); ?>

        </div>
      </div>
      <div class="col-md-3">
        <div class="form-group">
            <?php echo Form::label('custom_field9', $contact_custom_field9 . ':'); ?>

            <?php echo Form::text('custom_field9', $contact->custom_field9, ['class' => 'form-control', 
                'placeholder' => $contact_custom_field9]); ?>

        </div>
      </div>
      <div class="col-md-3">
        <div class="form-group">
            <?php echo Form::label('custom_field10', $contact_custom_field10 . ':'); ?>

            <?php echo Form::text('custom_field10', $contact->custom_field10, ['class' => 'form-control', 
                'placeholder' => $contact_custom_field10]); ?>

        </div>
      </div>
      <div class="clearfix"></div>
      <div class="col-md-12 shipping_addr_div"><hr></div>
      <div class="col-md-8 col-md-offset-2 shipping_addr_div" >
          <strong><?php echo e(__('lang_v1.shipping_address'), false); ?></strong><br>
          <?php echo Form::text('shipping_address', $contact->shipping_address, ['class' => 'form-control', 
                'placeholder' => __('lang_v1.search_address'), 'id' => 'shipping_address']); ?>

        <div id="map"></div>
      </div>
      <?php echo Form::hidden('position', $contact->position, ['id' => 'position']); ?>


    </div>
</div>
    </div>

    <div class="modal-footer">
      <button type="submit" class="btn btn-primary"><?php echo app('translator')->get( 'messages.update' ); ?></button>
      <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo app('translator')->get( 'messages.close' ); ?></button>
    </div>

    <?php echo Form::close(); ?>


  </div><!-- /.modal-content -->
</div><!-- /.modal-dialog --><?php /**PATH /home/u217138193/domains/mzgr0up.com/public_html/erp1/resources/views/contact/edit.blade.php ENDPATH**/ ?>