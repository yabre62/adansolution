<?php $__env->startSection('title','Order List'); ?>

<?php $__env->startPush('css_or_js'); ?>
    <!-- Custom styles for this page -->
    <link href="<?php echo e(asset('public/assets/back-end')); ?>/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <!-- Page Heading -->
    <div class="content container-fluid">
        <div class="row align-items-center mb-3">
            <div class="col-sm">
                <h1 class="page-header-title"><?php echo e(trans('messages.Orders')); ?> <span
                        class="badge badge-soft-dark ml-2"><?php echo e($orders->total()); ?></span>
                </h1>
            </div>
        </div>

        <div class="row" style="margin-top: 20px">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5><?php echo e(trans('messages.order_table')); ?></h5>
                    </div>
                    <div class="card-body" style="padding: 0">
                        <div class="table-responsive">
                            <table id="datatable"
                                   class="table table-hover table-borderless table-thead-bordered table-nowrap table-align-middle card-table"
                                   style="width: 100%">
                                <thead class="thead-light">
                                <tr>
                                    <th><?php echo e(trans('messages.SL#')); ?></th>
                                    <th><?php echo e(trans('messages.Order')); ?></th>
                                    <th><?php echo e(trans('messages.customer_name')); ?></th>
                                    <th><?php echo e(trans('messages.Phone')); ?></th>
                                    <th><?php echo e(trans('messages.Payment')); ?></th>
                                    <th><?php echo e(trans('messages.Status')); ?> </th>
                                    <th style="width: 30px"><?php echo e(trans('messages.Action')); ?></th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k=>$detail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td>
                                            <?php echo e($k+1); ?>

                                        </td>
                                        <td>
                                            <a href="<?php echo e(route('seller.orders.details',$detail['order_id'])); ?>"><?php echo e($detail['order_id']); ?></a>
                                        </td>
                                        <td><?php echo e($detail->order->customer->f_name); ?></td>
                                        <td><?php echo e($detail->order->customer->phone); ?></td>
                                        <td>
                                            <?php if($detail->order->payment_status=='paid'): ?>
                                                <span class="badge badge-soft-success">
                                      <span class="legend-indicator bg-success"></span>Paid
                                    </span>
                                            <?php else: ?>
                                                <span class="badge badge-soft-danger">
                                      <span class="legend-indicator bg-danger"></span>Unpaid
                                    </span>
                                            <?php endif; ?>
                                        </td>
                                        <td class="text-capitalize ">
                                            <?php if($detail->order->order_status=='pending'): ?>
                                                <label
                                                    class="badge badge-primary"><?php echo e($detail->order['order_status']); ?></label>
                                            <?php elseif($detail->order->order_status=='processing'): ?>
                                                <label
                                                    class="badge badge-primary"><?php echo e($detail->order['order_status']); ?></label>
                                            <?php elseif($detail->order->order_status=='delivered'): ?>
                                                <label
                                                    class="badge badge-success"><?php echo e($detail->order['order_status']); ?></label>
                                            <?php elseif($detail->order->order_status=='returned'): ?>
                                                <label
                                                    class="badge badge-danger"><?php echo e($detail->order['order_status']); ?></label>
                                            <?php else: ?>
                                                <label
                                                    class="badge badge-danger"><?php echo e($detail->order['order_status']); ?></label>
                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            

                                            <div class="dropdown">
                                                <button class="btn btn-outline-secondary dropdown-toggle" type="button"
                                                        id="dropdownMenuButton" data-toggle="dropdown"
                                                        aria-haspopup="true"
                                                        aria-expanded="false">
                                                    <i class="tio-settings"></i>
                                                </button>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                    <a class="dropdown-item"
                                                       href="<?php echo e(route('seller.orders.details',[$detail['order_id']])); ?>"><i
                                                            class="tio-visible"></i> View</a>
                                                    <a class="dropdown-item" target="_blank"
                                                       href="<?php echo e(route('seller.orders.generate-invoice',[$detail['order_id']])); ?>"><i
                                                            class="tio-download"></i> Invoice</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- Footer -->
                    <div class="card-footer">
                        <!-- Pagination -->
                        <div class="row justify-content-center justify-content-sm-between align-items-sm-center">
                            

                            <div class="col-sm-auto">
                                <div class="d-flex justify-content-center justify-content-sm-end">
                                    <!-- Pagination -->
                                    <?php echo $orders->links(); ?>

                                    
                                </div>
                            </div>
                        </div>
                        <!-- End Pagination -->
                    </div>
                    <!-- End Footer -->
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>
    <!-- Page level plugins -->
    <script src="<?php echo e(asset('public/assets/back-end')); ?>/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="<?php echo e(asset('public/assets/back-end')); ?>/vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script>
        // Call the dataTables jQuery plugin
        $(document).ready(function () {
            $('#dataTable').DataTable();
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.back-end.app-seller', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/jj/Desktop/MrZ/WebVision/AdamG/Admin/resources/views/seller-views/order/list.blade.php ENDPATH**/ ?>