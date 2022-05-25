<?php $__env->startSection('title','Update Currency'); ?>

<?php $__env->startPush('css_or_js'); ?>

<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <div class="content container-fluid">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo e(route('admin.dashboard.index')); ?>"><?php echo e(trans('messages.Dashboard')); ?></a>
                </li>
                <li class="breadcrumb-item" aria-current="page"><?php echo e(trans('messages.Currency')); ?></li>
            </ol>
        </nav>
        <!-- Page Heading -->

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="text-center">
                            <i class="tio-money"></i>
                            Update Currency
                        </h5>
                    </div>
                    <div class="card-body">
                        <form action="<?php echo e(route('admin.currency.update',[$data['id']])); ?>" method="post">
                            <?php echo csrf_field(); ?>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Currency Name :</label>
                                        <input type="text" name="name"
                                               placeholder="Currency Name"
                                               class="form-control" id="name"
                                               value="<?php echo e($data->name); ?>">
                                    </div>
                                    <div class="col-md-6">
                                        <label>Currency Symbol :</label>
                                        <input type="text" name="symbol"
                                               placeholder="Currency Symbol"
                                               class="form-control" id="symbol"
                                               value="<?php echo e($data->symbol); ?>">
                                    </div>
                                </div>

                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Currency Code :</label>
                                        <input type="text" name="code"
                                               placeholder="Currency Code"
                                               class="form-control" id="code"
                                               value="<?php echo e($data->code); ?>">
                                    </div>
                                    <div class="col-md-6">
                                        <label>Exchange Rate :</label>
                                        <input type="number" min="0" max="1000000"
                                               name="exchange_rate" step="0.00000001"
                                               placeholder="Exchange Rate"
                                               class="form-control" id="exchange_rate"
                                               value="<?php echo e($data->exchange_rate); ?>">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group text-center">
                                <button type="submit" id="add" class="btn btn-primary"
                                        style="color: white">Update
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>

<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.back-end.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/jj/Desktop/MrZ/WebVision/AdamG/Admin/resources/views/admin-views/currency/edit.blade.php ENDPATH**/ ?>