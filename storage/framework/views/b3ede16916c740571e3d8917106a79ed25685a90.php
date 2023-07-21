<?php
/**
 * @var  Arcanedev\LogViewer\Entities\Log            $log
 * @var  Illuminate\Pagination\LengthAwarePaginator  $entries
 * @var  string|null                                 $query
 */
?>



<?php $__env->startSection('content'); ?>
    <h1 class="page-header">Log [<?php echo e($log->date, false); ?>]</h1>

    <div class="row">
        <div class="col-md-2">
            <div class="panel panel-default">
                <div class="panel-heading"><i class="fa fa-fw fa-flag"></i> Levels</div>
                <ul class="list-group">
                    <?php $__currentLoopData = $log->menu(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $levelKey => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($item['count'] === 0): ?>
                            <a href="#" class="list-group-item disabled">
                                <span class="badge">
                                    <?php echo e($item['count'], false); ?>

                                </span>
                                <?php echo $item['icon']; ?> <?php echo e($item['name'], false); ?>

                            </a>
                        <?php else: ?>
                            <a href="<?php echo e($item['url'], false); ?>" class="list-group-item <?php echo e($levelKey, false); ?>">
                                <span class="badge level-<?php echo e($levelKey, false); ?>">
                                    <?php echo e($item['count'], false); ?>

                                </span>
                                <span class="level level-<?php echo e($levelKey, false); ?>">
                                    <?php echo $item['icon']; ?> <?php echo e($item['name'], false); ?>

                                </span>
                            </a>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
        </div>
        <div class="col-md-10">
            
            <div class="panel panel-default">
                <div class="panel-heading">
                    Log info :

                    <div class="group-btns pull-right">
                        <a href="<?php echo e(route('log-viewer::logs.download', [$log->date]), false); ?>" class="btn btn-xs btn-success">
                            <i class="fa fa-download"></i> DOWNLOAD
                        </a>
                        <a href="#delete-log-modal" class="btn btn-xs btn-danger" data-toggle="modal">
                            <i class="fa fa-trash-o"></i> DELETE
                        </a>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-condensed">
                        <thead>
                            <tr>
                                <td>File path :</td>
                                <td colspan="5"><?php echo e($log->getPath(), false); ?></td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Log entries : </td>
                                <td>
                                    <span class="label label-primary"><?php echo e($entries->total(), false); ?></span>
                                </td>
                                <td>Size :</td>
                                <td>
                                    <span class="label label-primary"><?php echo e($log->size(), false); ?></span>
                                </td>
                                <td>Created at :</td>
                                <td>
                                    <span class="label label-primary"><?php echo e($log->createdAt(), false); ?></span>
                                </td>
                                <td>Updated at :</td>
                                <td>
                                    <span class="label label-primary"><?php echo e($log->updatedAt(), false); ?></span>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="panel-footer">
                    
                    <form action="<?php echo e(route('log-viewer::logs.search', [$log->date, $level]), false); ?>" method="GET">
                        <div class=form-group">
                            <div class="input-group">
                                <input id="query" name="query" class="form-control"  value="<?php echo $query; ?>" placeholder="Type here to search">
                                <span class="input-group-btn">
                                    <?php if (! (is_null($query))): ?>
                                        <a href="<?php echo e(route('log-viewer::logs.show', [$log->date]), false); ?>" class="btn btn-default">
                                            (<?php echo e($entries->count(), false); ?> results) <span class="glyphicon glyphicon-remove"></span>
                                        </a>
                                    <?php endif; ?>
                                    <button id="search-btn" class="btn btn-primary">
                                        <span class="glyphicon glyphicon-search"></span>
                                    </button>
                                </span>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            
            <div class="panel panel-default">
                <?php if($entries->hasPages()): ?>
                    <div class="panel-heading">
                        <?php echo e($entries->appends(compact('query'))->render(), false); ?>


                        <span class="label label-info pull-right">
                            Page <?php echo e($entries->currentPage(), false); ?> of <?php echo e($entries->lastPage(), false); ?>

                        </span>
                    </div>
                <?php endif; ?>

                <div class="table-responsive">
                    <table id="entries" class="table table-condensed">
                        <thead>
                            <tr>
                                <th>ENV</th>
                                <th style="width: 120px;">Level</th>
                                <th style="width: 65px;">Time</th>
                                <th>Header</th>
                                <th class="text-right">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__empty_1 = true; $__currentLoopData = $entries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $entry): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <?php /** @var  Arcanedev\LogViewer\Entities\LogEntry  $entry */ ?>
                                <tr>
                                    <td>
                                        <span class="label label-env"><?php echo e($entry->env, false); ?></span>
                                    </td>
                                    <td>
                                        <span class="level level-<?php echo e($entry->level, false); ?>"><?php echo $entry->level(); ?></span>
                                    </td>
                                    <td>
                                        <span class="label label-default">
                                            <?php echo e($entry->datetime->format('H:i:s'), false); ?>

                                        </span>
                                    </td>
                                    <td>
                                        <p><?php echo e($entry->header, false); ?></p>
                                    </td>
                                    <td class="text-right">
                                        <?php if($entry->hasStack()): ?>
                                            <a class="btn btn-xs btn-default" role="button" data-toggle="collapse" href="#log-stack-<?php echo e($key, false); ?>" aria-expanded="false" aria-controls="log-stack-<?php echo e($key, false); ?>">
                                                <i class="fa fa-toggle-on"></i> Stack
                                            </a>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                                <?php if($entry->hasStack()): ?>
                                    <tr>
                                        <td colspan="5" class="stack">
                                            <div class="stack-content collapse" id="log-stack-<?php echo e($key, false); ?>">
                                                <?php echo $entry->stack(); ?>

                                            </div>
                                        </td>
                                    </tr>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <tr>
                                    <td colspan="5" class="text-center">
                                        <span class="label label-default"><?php echo e(trans('log-viewer::general.empty-logs'), false); ?></span>
                                    </td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>

                <?php if($entries->hasPages()): ?>
                    <div class="panel-footer">
                        <?php echo $entries->appends(compact('query'))->render(); ?>


                        <span class="label label-info pull-right">
                            Page <?php echo e($entries->currentPage(), false); ?> of <?php echo e($entries->lastPage(), false); ?>

                        </span>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('modals'); ?>
    
    <div id="delete-log-modal" class="modal fade">
        <div class="modal-dialog">
            <form id="delete-log-form" action="<?php echo e(route('log-viewer::logs.delete'), false); ?>" method="POST">
                <input type="hidden" name="_method" value="DELETE">
                <input type="hidden" name="_token" value="<?php echo e(csrf_token(), false); ?>">
                <input type="hidden" name="date" value="<?php echo e($log->date, false); ?>">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h4 class="modal-title">DELETE LOG FILE</h4>
                    </div>
                    <div class="modal-body">
                        <p>Are you sure you want to <span class="label label-danger">DELETE</span> this log file <span class="label label-primary"><?php echo e($log->date, false); ?></span> ?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-sm btn-default pull-left" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-sm btn-danger" data-loading-text="Loading&hellip;">DELETE FILE</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <script>
        $(function () {
            var deleteLogModal = $('div#delete-log-modal'),
                deleteLogForm  = $('form#delete-log-form'),
                submitBtn      = deleteLogForm.find('button[type=submit]');

            deleteLogForm.on('submit', function(event) {
                event.preventDefault();
                submitBtn.button('loading');

                $.ajax({
                    url:      $(this).attr('action'),
                    type:     $(this).attr('method'),
                    dataType: 'json',
                    data:     $(this).serialize(),
                    success: function(data) {
                        submitBtn.button('reset');
                        if (data.result === 'success') {
                            deleteLogModal.modal('hide');
                            location.replace("<?php echo e(route('log-viewer::logs.list'), false); ?>");
                        }
                        else {
                            alert('OOPS ! This is a lack of coffee exception !')
                        }
                    },
                    error: function(xhr, textStatus, errorThrown) {
                        alert('AJAX ERROR ! Check the console !');
                        console.error(errorThrown);
                        submitBtn.button('reset');
                    }
                });

                return false;
            });

            <?php if (! (empty(log_styler()->toHighlight()))): ?>
            $('.stack-content').each(function() {
                var $this = $(this);
                var html = $this.html().trim()
                    .replace(/(<?php echo implode( '|',log_styler()->toHighlight()); ?>)/gm, '<strong>$1</strong>');

                $this.html(html);
            });
            <?php endif; ?>
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('log-viewer::bootstrap-3._master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u217138193/domains/mzgr0up.com/public_html/erp1/resources/views/vendor/log-viewer/bootstrap-3/show.blade.php ENDPATH**/ ?>