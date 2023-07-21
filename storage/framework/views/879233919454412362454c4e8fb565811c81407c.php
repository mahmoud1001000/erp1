<?php $__env->startSection('title', __('lang_v1.import_contacts')); ?>

<?php $__env->startSection('content'); ?>

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1><?php echo app('translator')->get('lang_v1.import_contacts'); ?>
    </h1>
</section>

<!-- Main content -->
<section class="content">
    
    <?php if(session('notification') || !empty($notification)): ?>
        <div class="row">
            <div class="col-sm-12">
                <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <?php if(!empty($notification['msg'])): ?>
                        <?php echo e($notification['msg'], false); ?>

                    <?php elseif(session('notification.msg')): ?>
                        <?php echo e(session('notification.msg'), false); ?>

                    <?php endif; ?>
                </div>
            </div>  
        </div>     
    <?php endif; ?>
    
    <div class="row">
        <div class="col-sm-12">
            <?php $__env->startComponent('components.widget', ['class' => 'box-primary']); ?>
                <?php echo Form::open(['url' => action('ContactController@postImportContacts'), 'method' => 'post', 'enctype' => 'multipart/form-data' ]); ?>

                    <div class="row">
                        <div class="col-sm-6">
                        <div class="col-sm-8">
                            <div class="form-group">
                                <?php echo Form::label('name', __( 'product.file_to_import' ) . ':'); ?>

                                <?php echo Form::file('contacts_csv', ['accept'=> '.xls', 'required' => 'required']); ?>

                              </div>
                        </div>
                        <div class="col-sm-4">
                        <br>
                            <button type="submit" class="btn btn-primary"><?php echo app('translator')->get('messages.submit'); ?></button>
                        </div>
                        </div>
                    </div>

                <?php echo Form::close(); ?>

                <br><br>
                <div class="row">
                    <div class="col-sm-4">
                        <a href="<?php echo e(asset('files/import_contacts_csv_template.xls'), false); ?>" class="btn btn-success" download><i class="fa fa-download"></i> <?php echo app('translator')->get('lang_v1.download_template_file'); ?></a>
                    </div>
                </div>
            <?php echo $__env->renderComponent(); ?>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <?php $__env->startComponent('components.widget', ['class' => 'box-primary', 'title' => __('lang_v1.instructions')]); ?>
                <strong><?php echo app('translator')->get('lang_v1.instruction_line1'); ?></strong><br>
                    <?php echo app('translator')->get('lang_v1.instruction_line2'); ?>
                    <br><br>
                <table class="table table-striped">
                    <tr>
                        <th><?php echo app('translator')->get('lang_v1.col_no'); ?></th>
                        <th><?php echo app('translator')->get('lang_v1.col_name'); ?></th>
                        <th><?php echo app('translator')->get('lang_v1.instruction'); ?></th>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td><?php echo app('translator')->get('contact.contact_type'); ?> <small class="text-muted">(<?php echo app('translator')->get('lang_v1.required'); ?>)</small></td>
                        <td><?php echo __('lang_v1.import_contact_type_ins'); ?></td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td><?php echo app('translator')->get('business.prefix'); ?> <small class="text-muted">(<?php echo app('translator')->get('lang_v1.optional'); ?>)</small></td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td><?php echo app('translator')->get('business.first_name'); ?> <small class="text-muted">(<?php echo app('translator')->get('lang_v1.required'); ?>)</small></td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td><?php echo app('translator')->get('lang_v1.middle_name'); ?> <small class="text-muted">(<?php echo app('translator')->get('lang_v1.optional'); ?>)</small></td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>5</td>
                        <td><?php echo app('translator')->get('business.last_name'); ?> <small class="text-muted">(<?php echo app('translator')->get('lang_v1.optional'); ?>)</small></td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>6</td>
                        <td><?php echo app('translator')->get('business.business_name'); ?> <br><small class="text-muted">(<?php echo app('translator')->get('lang_v1.required_if_supplier'); ?>)</small></td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>7</td>
                        <td><?php echo app('translator')->get('lang_v1.contact_id'); ?> <small class="text-muted">(<?php echo app('translator')->get('lang_v1.optional'); ?>)</small></td>
                        <td><?php echo app('translator')->get('lang_v1.contact_id_ins'); ?></td>
                    </tr>
                    <tr>
                        <td>8</td>
                        <td><?php echo app('translator')->get('contact.tax_no'); ?> <small class="text-muted">(<?php echo app('translator')->get('lang_v1.optional'); ?>)</small></td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>9</td>
                        <td><?php echo app('translator')->get('lang_v1.opening_balance'); ?> <small class="text-muted">(<?php echo app('translator')->get('lang_v1.optional'); ?>)</small></td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>10</td>
                        <td><?php echo app('translator')->get('contact.pay_term'); ?> <br><small class="text-muted">(<?php echo app('translator')->get('lang_v1.required_if_supplier'); ?>)</small></td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>11</td>
                        <td><?php echo app('translator')->get('contact.pay_term_period'); ?> <br><small class="text-muted">(<?php echo app('translator')->get('lang_v1.required_if_supplier'); ?>)</small></td>
                        <td><strong><?php echo app('translator')->get('lang_v1.pay_term_period_ins'); ?></strong></td>
                    </tr>
                    <tr>
                        <td>12</td>
                        <td><?php echo app('translator')->get('lang_v1.credit_limit'); ?> <small class="text-muted">(<?php echo app('translator')->get('lang_v1.optional'); ?>)</small></td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>13</td>
                        <td><?php echo app('translator')->get('business.email'); ?> <small class="text-muted">(<?php echo app('translator')->get('lang_v1.optional'); ?>)</small></td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>14</td>
                        <td><?php echo app('translator')->get('contact.mobile'); ?> <small class="text-muted">(<?php echo app('translator')->get('lang_v1.required'); ?>)</small></td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>15</td>
                        <td><?php echo app('translator')->get('contact.alternate_contact_number'); ?> <small class="text-muted">(<?php echo app('translator')->get('lang_v1.optional'); ?>)</small></td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>16</td>
                        <td><?php echo app('translator')->get('contact.landline'); ?> <small class="text-muted">(<?php echo app('translator')->get('lang_v1.optional'); ?>)</small></td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>17</td>
                        <td><?php echo app('translator')->get('business.city'); ?> <small class="text-muted">(<?php echo app('translator')->get('lang_v1.optional'); ?>)</small></td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>18</td>
                        <td><?php echo app('translator')->get('business.state'); ?> <small class="text-muted">(<?php echo app('translator')->get('lang_v1.optional'); ?>)</small></td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>19</td>
                        <td><?php echo app('translator')->get('business.country'); ?> <small class="text-muted">(<?php echo app('translator')->get('lang_v1.optional'); ?>)</small></td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>20</td>
                        <td><?php echo app('translator')->get('lang_v1.address_line_1'); ?> <small class="text-muted">(<?php echo app('translator')->get('lang_v1.optional'); ?>)</small></td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>21</td>
                        <td><?php echo app('translator')->get('lang_v1.address_line_2'); ?> <small class="text-muted">(<?php echo app('translator')->get('lang_v1.optional'); ?>)</small></td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>22</td>
                        <td><?php echo app('translator')->get('business.zip_code'); ?> <small class="text-muted">(<?php echo app('translator')->get('lang_v1.optional'); ?>)</small></td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>23</td>
                        <td><?php echo app('translator')->get('lang_v1.dob'); ?> <small class="text-muted">(<?php echo app('translator')->get('lang_v1.optional'); ?>)</small></td>
                        <td><?php echo app('translator')->get('lang_v1.dob_ins'); ?> (<?php echo e(\Carbon::now()->format('Y-m-d'), false); ?>)</td>
                    </tr>
                    <?php
                        $custom_labels = json_decode(session('business.custom_labels'), true);
                    ?>
                    <tr>
                        <td>24</td>
                         <td><?php echo e($custom_labels['contact']['custom_field_1'] ?? __('lang_v1.contact_custom_field1'), false); ?> <small class="text-muted">(<?php echo app('translator')->get('lang_v1.optional'); ?>)</small></td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>25</td>
                        <td><?php echo e($custom_labels['contact']['custom_field_2'] ?? __('lang_v1.contact_custom_field2'), false); ?> <small class="text-muted">(<?php echo app('translator')->get('lang_v1.optional'); ?>)</small></td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>26</td>
                        <td><?php echo e($custom_labels['contact']['custom_field_3'] ?? __('lang_v1.contact_custom_field3'), false); ?> <small class="text-muted">(<?php echo app('translator')->get('lang_v1.optional'); ?>)</small></td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>27</td>
                        <td><?php echo e($custom_labels['contact']['custom_field_4'] ?? __('lang_v1.contact_custom_field4'), false); ?> <small class="text-muted">(<?php echo app('translator')->get('lang_v1.optional'); ?>)</small></td>
                        <td>&nbsp;</td>
                    </tr>
                </table>
            <?php echo $__env->renderComponent(); ?>
        </div>
    </div>
</section>
<!-- /.content -->

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u217138193/domains/mzgr0up.com/public_html/erp1/resources/views/contact/import.blade.php ENDPATH**/ ?>