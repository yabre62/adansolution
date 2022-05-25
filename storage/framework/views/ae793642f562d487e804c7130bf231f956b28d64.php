<?php $__env->startSection('title','My Order List'); ?>

<?php $__env->startPush('css_or_js'); ?>
    <style>
        .widget-categories .accordion-heading > a:hover {
            color: #FFD5A4 !important;
        }

        .widget-categories .accordion-heading > a {
            color: #FFD5A4;
        }

        body {
            font-family: 'Titillium Web', sans-serif
        }

        .card {
            border: none
        }

        .totals tr td {
            font-size: 13px
        }

        .product-qty span {
            font-size: 14px;
            color: #6A6A6A;
        }

        .spandHeadO {
            color: #FFFFFF !important;
            font-weight: 600 !important;
            font-size: 14px;

        }

        .tdBorder {
            border-right: 1px solid #f7f0f0;
            text-align: center;
        }

        .bodytr {
            border: 1px solid #dadada;
            text-align: center;
            vertical-align: middle!important;
        }

        .sidebar h3:hover + .divider-role {
            border-bottom: 3px solid <?php echo e($web_config['primary_color']); ?>                                  !important;
            transition: .2s ease-in-out;
        }

        tr td {
            padding: 3px 5px !important;
        }

        td button {
            padding: 3px 13px !important;
        }

        @media (max-width: 600px) {
            .sidebar_heading {
                background: <?php echo e($web_config['primary_color']); ?>;
            }

            .orderDate {
                display: none;
            }

            .sidebar_heading h1 {
                text-align: center;
                color: aliceblue;
                padding-bottom: 17px;
                font-size: 19px;
            }
        }
    </style>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>

    <div class="container">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-9 sidebar_heading">
                <h1 class="h3  mb-0 folot-left headerTitle"><?php echo e(trans('messages.my_order')); ?></h1>
            </div>
        </div>
    </div>

    <!-- Page Content-->
    <div class="container pb-5 mb-2 mb-md-4 mt-3">
        <div class="row">
            <!-- Sidebar-->
        <?php echo $__env->make('web-views.partials._profile-aside', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <!-- Content  -->
            <section class="col-lg-9 mt-3 col-md-9">
                <div class="card box-shadow-sm">
                    <div style="overflow: auto">
                        <table class="table table-striped table-bordered">
                            <thead>
                            <tr style="background-color: <?php echo e($web_config['secondary_color']); ?>;">
                                <td class="tdBorder">
                                    <div class="py-2"><span
                                            class="d-block spandHeadO "><?php echo e(trans('messages.Order#')); ?></span></div>
                                </td>

                                <td class="tdBorder orderDate">
                                    <div class="py-2"><span
                                            class="d-block spandHeadO"><?php echo e(trans('messages.Order')); ?> <?php echo e(trans('messages.Date')); ?></span>
                                    </div>
                                </td>
                                <td class="tdBorder">
                                    <div class="py-2"><span
                                            class="d-block spandHeadO"> <?php echo e(trans('messages.Status')); ?></span></div>
                                </td>
                                <td class="tdBorder">
                                    <div class="py-2"><span
                                            class="d-block spandHeadO"> <?php echo e(trans('messages.Total')); ?></span></div>
                                </td>
                                <td class="tdBorder">
                                    <div class="py-2"><span
                                            class="d-block spandHeadO"> <?php echo e(trans('messages.action')); ?></span></div>
                                </td>
                            </tr>
                            </thead>

                            <tbody>
                            <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td class="bodytr font-weight-bold">
                                        <?php echo e(trans('messages.ID')); ?>: <?php echo e($order['id']); ?>

                                    </td>
                                    <td class="bodytr orderDate"><span class=""><?php echo e($order['created_at']); ?></span></td>
                                    <td class="bodytr">
                                        <?php if($order['order_status']=='failed' || $order['order_status']=='canceled'): ?>
                                            <span class="badge badge-danger text-capitalize" style="padding: 10px">
                                                <?php echo e($order['order_status']); ?>

                                            </span>
                                            <a style="margin: 10px"
                                               href="<?php echo e(route('customer.payment-mobile',['order_id'=>$order['id'],'customer_id'=>auth('customer')->id()])); ?>"
                                               class="btn btn-secondary btn-sm">Pay Now</a>
                                        <?php elseif($order['order_status']=='confirmed' || $order['order_status']=='processing' || $order['order_status']=='delivered'): ?>
                                            <span class="badge badge-success text-capitalize" style="padding: 10px">
                                                <?php echo e($order['order_status']); ?>

                                            </span>
                                        <?php else: ?>
                                            <span class="badge badge-info text-capitalize" style="padding: 10px">
                                                <?php echo e($order['order_status']); ?>

                                            </span>
                                        <?php endif; ?>
                                    </td>
                                    <td class="bodytr">
                                        <?php echo e(\App\CPU\Helpers::currency_converter($order['order_amount'])); ?>

                                    </td>
                                    <td class="bodytr" style="width: 162px">
                                        <a href="<?php echo e(route('account-order-details', ['id'=>$order->id])); ?>"
                                           class="btn btn-secondary p-2">
                                            <i class="fa fa-eye"></i> View
                                        </a>
                                        <?php if($order['payment_method']=='cash_on_delivery' && $order['order_status']=='pending'): ?>
                                            <a href="<?php echo e(route('order-cancel',[$order->id])); ?>"
                                               class="btn btn-danger p-2">
                                                <i class="fa fa-trash"></i> Cancel
                                            </a>
                                        <?php else: ?>
                                            <button class="btn btn-danger p-2" disabled>
                                                <i class="fa fa-trash"></i> Cancel
                                            </button>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                        <?php if($orders->count()==0): ?>
                            <center class="mt-3 mb-2"> <?php echo e(trans('messages.order_not')); ?></center>
                        <?php endif; ?>
                    </div>
                </div>
            </section>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>

<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.front-end.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/jj/Desktop/MrZ/WebVision/AdamG/Admin/resources/views/web-views/users-profile/account-orders.blade.php ENDPATH**/ ?>