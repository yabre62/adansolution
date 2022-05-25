<?php $__env->startSection('title','Withdraw Request'); ?>

<?php $__env->startPush('css_or_js'); ?>
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <div class="content container-fluid">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo e(route('admin.dashboard.index')); ?>"><?php echo e(trans('messages.Dashboard')); ?></a>
                </li>
                <li class="breadcrumb-item" aria-current="page"><?php echo e(trans('messages.Withdraw')); ?>  </li>
            </ol>
        </nav>

        <div class="row" style="margin-top: 20px">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5><?php echo e(trans('messages.Withdraw Request Table')); ?></h5>
                        <select name="withdraw_status_filter" onchange="status_filter(this.value)" class="custom-select float-right" style="width: 200px">
                            <option value="all" <?php echo e(session()->has('withdraw_status_filter') && session('withdraw_status_filter') == 'all'?'selected':''); ?>>All</option>
                            <option value="approved" <?php echo e(session()->has('withdraw_status_filter') && session('withdraw_status_filter') == 'approved'?'selected':''); ?>>Approved</option>
                            <option value="denied" <?php echo e(session()->has('withdraw_status_filter') && session('withdraw_status_filter') == 'denied'?'selected':''); ?>>Denied</option>
                            <option value="pending" <?php echo e(session()->has('withdraw_status_filter') && session('withdraw_status_filter') == 'pending'?'selected':''); ?>>Pending</option>

                        </select>
                    </div>
                    <div class="card-body" style="padding: 0">
                        <div class="table-responsive">
                            <table id="datatable"
                                   class="table table-hover table-borderless table-thead-bordered table-nowrap table-align-middle card-table"
                                   style="width: 100%">
                                <thead class="thead-light">
                                <tr>
                                    <th><?php echo e(trans('messages.SL#')); ?></th>
                                    <th><?php echo e(trans('messages.amount')); ?></th>
                                    
                                    <th><?php echo e(trans('messages.Name')); ?></th>
                                    <th><?php echo e(trans('messages.request_time')); ?></th>
                                    <th><?php echo e(trans('messages.status')); ?></th>
                                    <th style="width: 5px"><?php echo e(trans('messages.Action')); ?></th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $__currentLoopData = $withdraw_req; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k=>$wr): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td scope="row"><?php echo e($k+1); ?></td>
                                        <td><?php echo e(\App\CPU\BackEndHelper::usd_to_currency($wr['amount'])); ?></td>
                                        
                                        <td>
                                            <a href="<?php echo e(route('admin.sellers.view',$wr->seller_id)); ?>"><?php echo e($wr->seller->f_name . ' ' . $wr->seller->l_name); ?></a>
                                        </td>
                                        <td><?php echo e($wr->created_at); ?></td>
                                        <td>
                                            <?php if($wr->approved==0): ?>
                                                <label class="badge badge-primary">Pending</label>
                                            <?php elseif($wr->approved==1): ?>
                                                <label class="badge badge-success">Approved</label>
                                            <?php else: ?>
                                                <label class="badge badge-danger">Denied</label>
                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <a href="<?php echo e(route('admin.sellers.withdraw_view',[$wr['id'],$wr->seller['id']])); ?>"
                                               class="btn btn-primary btn-sm">
                                                <?php echo e(trans('messages.View')); ?>

                                            </a>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card-footer">
                        <?php echo e($withdraw_req->links()); ?>

                    </div>
                </div>
            </div>

        </div>
    </div>
<?php $__env->stopSection(); ?>


<?php $__env->startPush('script_2'); ?>
  <script>
      function status_filter(type) {
          $.ajaxSetup({
              headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
          });
          $.post({
              url: '<?php echo e(route('admin.withdraw.status-filter')); ?>',
              data: {
                  withdraw_status_filter: type
              },
              beforeSend: function () {
                  $('#loading').show()
              },
              success: function (data) {
                 location.reload();
              },
              complete: function () {
                  $('#loading').hide()
              }
          });
      }
  </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.back-end.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/jj/Desktop/MrZ/WebVision/AdamG/Admin/resources/views/admin-views/seller/withdraw.blade.php ENDPATH**/ ?>