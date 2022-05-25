<?php $__env->startSection('title','Seller List'); ?>

<?php $__env->startPush('css_or_js'); ?>

<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <div class="content container-fluid">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo e(route('admin.dashboard.index')); ?>"><?php echo e(trans('messages.Dashboard')); ?></a>
                </li>
                <li class="breadcrumb-item" aria-current="page"><?php echo e(trans('messages.Sellers')); ?></li>
            </ol>
        </nav>

        <div class="row mt-4">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <?php echo e(trans('messages.seller_table')); ?>

                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table
                                class="table table-borderless table-thead-bordered table-nowrap table-align-middle card-table">
                                <thead class="thead-light">
                                <tr>
                                    <th scope="col"><?php echo e(trans('messages.SL#')); ?></th>
                                    <th scope="col"><?php echo e(trans('messages.name')); ?></th>
                                    <th scope="col"><?php echo e(trans('messages.Phone')); ?></th>
                                    <th scope="col"><?php echo e(trans('messages.Email')); ?></th>
                                    <th scope="col"><?php echo e(trans('messages.status')); ?></th>
                                    <th scope="col"><?php echo e(trans('messages.orders')); ?></th>
                                    <th scope="col"><?php echo e(trans('messages.Products')); ?></th>
                                    <th scope="col" style="width: 50px"><?php echo e(trans('messages.action')); ?></th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $__currentLoopData = $sellers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$seller): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td scope="col"><?php echo e($key+1); ?></td>
                                        <td scope="col"><?php echo e($seller->f_name); ?> <?php echo e($seller->l_name); ?></td>
                                        <td scope="col"><?php echo e($seller->phone); ?></td>
                                        <td scope="col"><?php echo e($seller->email); ?></td>
                                        <td scope="col">
                                            <?php echo $seller->status=='approved'?'<label class="badge badge-success">Active</label>':'<label class="badge badge-danger">In-Active</label>'; ?>

                                        </td>
                                        <td scope="col">
                                            <a href="<?php echo e(route('admin.sellers.order-list',[$seller['id']])); ?>"
                                               class="btn btn-outline-primary btn-block">
                                                <i class="tio-shopping-cart-outlined"></i>( <?php echo e(count(array_unique($seller->orders->pluck('order_id')->toArray()))); ?>

                                                )
                                            </a>
                                        </td>
                                        <td scope="col">
                                            <a href="<?php echo e(route('admin.sellers.product-list',[$seller['id']])); ?>"
                                               class="btn btn-outline-primary btn-block">
                                                <i class="tio-premium-outlined mr-1"></i>( <?php echo e($seller->product->count()); ?>

                                                )
                                            </a>
                                        </td>
                                        <td>
                                            <a class="btn btn-primary"
                                               href="<?php echo e(route('admin.sellers.view',$seller->id)); ?>">
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
                        <?php echo $sellers->links(); ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>

<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.back-end.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/jj/Desktop/MrZ/WebVision/AdamG/Admin/resources/views/admin-views/seller/index.blade.php ENDPATH**/ ?>