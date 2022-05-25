<?php $__env->startSection('title','Seller View'); ?>

<?php $__env->startPush('css_or_js'); ?>
    <style>
        .switch {
            position: relative;
            display: inline-block;
            width: 48px;
            height: 23px;
        }

        .switch input {
            opacity: 0;
            width: 0;
            height: 0;
        }

        .slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #ccc;
            -webkit-transition: .4s;
            transition: .4s;
        }

        .slider:before {
            position: absolute;
            content: "";
            height: 15px;
            width: 15px;
            left: 4px;
            bottom: 4px;
            background-color: white;
            -webkit-transition: .4s;
            transition: .4s;
        }

        input:checked + .slider {
            background-color: #377dff;
        }

        input:focus + .slider {
            box-shadow: 0 0 1px #377dff;
        }

        input:checked + .slider:before {
            -webkit-transform: translateX(26px);
            -ms-transform: translateX(26px);
            transform: translateX(26px);
        }

        /* Rounded sliders */
        .slider.round {
            border-radius: 34px;
        }

        .slider.round:before {
            border-radius: 50%;
        }

        #banner-image-modal .modal-content {
            width: 1116px !important;
            margin-left: -264px !important;
        }

        @media (max-width: 768px) {
            #banner-image-modal .modal-content {
                width: 698px !important;
                margin-left: -75px !important;
            }


        }

        @media (max-width: 375px) {
            #banner-image-modal .modal-content {
                width: 367px !important;
                margin-left: 0 !important;
            }

        }

        @media (max-width: 500px) {
            #banner-image-modal .modal-content {
                width: 400px !important;
                margin-left: 0 !important;
            }


        }


    </style>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <div class="content container-fluid">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo e(route('admin.dashboard.index')); ?>"><?php echo e(trans('messages.Dashboard')); ?></a>
                </li>
                <li class="breadcrumb-item" aria-current="page">Seller Details</li>
            </ol>
        </nav>

        <!-- Page Heading -->
        <div class="d-sm-flex row align-items-center justify-content-between mb-2">
            <div class="col-md-6">
                <a href="<?php echo e(route('admin.sellers.seller-list')); ?>" class="btn btn-primary mt-3 mb-3">Back to seller
                    list</a>
            </div>
            <div class="col-md-6 mt-3 mb-3">
                <?php if($seller->status=="pending"): ?>
                    <div class="mt-4 pr-2 float-right">
                        <h4><i class="tio-shop-outlined"></i> Seller request for open a shop.</h4>
                        <div class="text-center">
                            <form class="d-inline-block" action="<?php echo e(route('admin.sellers.updateStatus')); ?>" method="POST">
                                <?php echo csrf_field(); ?>
                                <input type="hidden" name="id" value="<?php echo e($seller->id); ?>">
                                <input type="hidden" name="status" value="approved">
                                <button type="submit" class="btn btn-primary"><?php echo e(trans('messages.Approve')); ?></button>
                            </form>
                            <form class="d-inline-block" action="<?php echo e(route('admin.sellers.updateStatus')); ?>" method="POST">
                                <?php echo csrf_field(); ?>
                                <input type="hidden" name="id" value="<?php echo e($seller->id); ?>">
                                <input type="hidden" name="status" value="rejected">
                                <button type="submit" class="btn btn-danger"><?php echo e(trans('messages.reject')); ?></button>
                            </form>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header text-capitalize">
                        <?php echo e(trans('messages.Seller')); ?> <?php echo e(trans('messages.Account')); ?> <br>
                        <?php if($seller->status=='approved'): ?>
                            <form class="d-inline-block" action="<?php echo e(route('admin.sellers.updateStatus')); ?>" method="POST">
                                <?php echo csrf_field(); ?>
                                <input type="hidden" name="id" value="<?php echo e($seller->id); ?>">
                                <input type="hidden" name="status" value="suspended">
                                <button type="submit"
                                        class="btn btn-outline-danger"><?php echo e(trans('messages.suspend')); ?></button>
                            </form>
                        <?php elseif($seller->status=='rejected' || $seller->status=='suspended'): ?>
                            <form class="d-inline-block" action="<?php echo e(route('admin.sellers.updateStatus')); ?>" method="POST">
                                <?php echo csrf_field(); ?>
                                <input type="hidden" name="id" value="<?php echo e($seller->id); ?>">
                                <input type="hidden" name="status" value="approved">
                                <button type="submit"
                                        class="btn btn-outline-success"><?php echo e(trans('messages.activate')); ?></button>
                            </form>
                        <?php endif; ?>
                    </div>
                    <div class="card-body">
                        <h4>
                            Status : <?php echo $seller->status=='approved'?'<label class="badge badge-success">Active</label>':'<label class="badge badge-danger">In-Active</label>'; ?>

                        </h4>
                        <h5><?php echo e(trans('messages.name')); ?> : <?php echo e($seller->f_name); ?> <?php echo e($seller->l_name); ?></h5>
                        <h5><?php echo e(trans('messages.Email')); ?> : <?php echo e($seller->email); ?></h5>
                        <h5><?php echo e(trans('messages.Phone')); ?> : <?php echo e($seller->phone); ?></h5>
                    </div>
                </div>
            </div>
            <?php if($seller->shop): ?>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <?php echo e(trans('messages.Shop')); ?> <?php echo e(trans('messages.info')); ?>

                        </div>
                        <div class="card-body">
                            <h5><?php echo e(trans('messages.seller_b')); ?> : <?php echo e($seller->shop->name); ?></h5>
                            <h5><?php echo e(trans('messages.Phone')); ?> : <?php echo e($seller->shop->contact); ?></h5>
                            <h5><?php echo e(trans('messages.address')); ?> : <?php echo e($seller->shop->address); ?></h5>
                        </div>
                    </div>
                </div>
            <?php endif; ?>

            <div class="col-md-6 mt-3">
                <div class="card">
                    <div class="card-header">
                        <?php echo e(trans('messages.bank_info')); ?>

                    </div>
                    <div class="card-body">
                        <div class="col-md-8 mt-4">

                            <h4><?php echo e(trans('messages.bank_name')); ?>

                                : <?php echo e($seller->bank_name ? $seller->bank_name : 'No Data found'); ?></h4>
                            <h6><?php echo e(trans('messages.Branch')); ?>

                                : <?php echo e($seller->branch ? $seller->branch : 'No Data found'); ?></h6>
                            <h6><?php echo e(trans('messages.holder_name')); ?>

                                : <?php echo e($seller->holder_name ? $seller->holder_name : 'No Data found'); ?></h6>
                            <h6><?php echo e(trans('messages.account_no')); ?>

                                : <?php echo e($seller->account_no ? $seller->account_no : 'No Data found'); ?></h6>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6 mt-3">
                <form action="<?php echo e(route('admin.sellers.sales-commission-update',[$seller['id']])); ?>" method="post">
                    <?php echo csrf_field(); ?>
                    <div class="card">
                        <div class="card-header">
                            <label> Sales Commission : </label>
                            <label class="switch ml-3">
                                <input type="checkbox" name="status"
                                       class="status"
                                       value="1" <?php echo e($seller['sales_commission_percentage']!=null?'checked':''); ?>>
                                <span class="slider round"></span>
                            </label>
                        </div>
                        <div class="card-body">
                            <small class="badge badge-soft-danger mb-3">
                                If sales commission is disabled here, the system default commission will be applied.
                            </small>
                            <div class="form-group">
                                <label>Commission ( % )</label>
                                <input type="number" value="<?php echo e($seller['sales_commission_percentage']); ?>"
                                       class="form-control" name="commission">
                            </div>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>

<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.back-end.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/jj/Desktop/MrZ/WebVision/AdamG/Admin/resources/views/admin-views/seller/view.blade.php ENDPATH**/ ?>