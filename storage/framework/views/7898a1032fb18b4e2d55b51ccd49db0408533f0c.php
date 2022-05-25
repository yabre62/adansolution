<div class="col-sm-6 col-lg-3 mb-3 mb-lg-5">
    <!-- Card -->
    <a class="card card-hover-shadow h-100" href="<?php echo e(route('admin.orders.list',['pending'])); ?>" style="background: #ff7600; box-shadow: 0 1rem 1rem #ffa50a">
        <div class="card-body">
            <h6 class="card-subtitle"
                style="color: white!important;"><?php echo e(__('messages.pending')); ?></h6>
            <div class="row align-items-center gx-2 mb-1">
                <div class="col-6">
                    <span class="card-title h2" style="color: white!important;">
                        <?php echo e($data['pending']); ?>

                    </span>
                </div>
                <div class="col-6 mt-2">
                    <i class="tio-shopping-cart ml-6" style="font-size: 30px;color: white"></i>
                </div>
            </div>
            <!-- End Row -->
        </div>
    </a>
    <!-- End Card -->
</div>

<div class="col-sm-6 col-lg-3 mb-3 mb-lg-5">
    <!-- Card -->
    <a class="card card-hover-shadow h-100" href="<?php echo e(route('admin.orders.list',['confirmed'])); ?>" style="background: #069d0b; box-shadow: 0 1rem 1rem #15a920">
        <div class="card-body">
            <h6 class="card-subtitle"
                style="color: white!important;">Confirmé</h6>

            <div class="row align-items-center gx-2 mb-1">
                <div class="col-6">
                        <span class="card-title h2" style="color: white!important;">
                            <?php echo e($data['confirmed']); ?>

                        </span>
                </div>

                <div class="col-6 mt-2">
                    <i class="tio-checkmark-circle ml-6" style="font-size: 30px;color: white"></i>
                </div>
            </div>
            <!-- End Row -->
        </div>
    </a>
    <!-- End Card -->
</div>

<div class="col-sm-6 col-lg-3 mb-3 mb-lg-5">
    <!-- Card -->
    <a class="card card-hover-shadow h-100" href="<?php echo e(route('admin.orders.list',['processing'])); ?>" style="background: #053742">
        <div class="card-body">
            <h6 class="card-subtitle"
                style="color: white!important;"><?php echo e(__('messages.Processing')); ?></h6>

            <div class="row align-items-center gx-2 mb-1">
                <div class="col-6">
                        <span class="card-title h2" style="color: white!important;">
                          <?php echo e($data['processing']); ?>

                        </span>
                </div>

                <div class="col-6 mt-2">
                    <i class="tio-time ml-6" style="font-size: 30px;color: white"></i>
                </div>
            </div>
            <!-- End Row -->
        </div>
    </a>
    <!-- End Card -->
</div>

<div class="col-sm-6 col-lg-3 mb-3 mb-lg-5">
    <!-- Card -->
    <a class="card card-hover-shadow h-100" href="<?php echo e(route('admin.orders.list',['out_for_delivery'])); ?>" style="background: #343A40">
        <div class="card-body">
            <h6 class="card-subtitle"
                style="color: white!important;"><?php echo e(__('messages.out_for_delivery')); ?></h6>

            <div class="row align-items-center gx-2 mb-1">
                <div class="col-6">
                    <span class="card-title h2" style="color: white!important;">
                        <?php echo e($data['out_for_delivery']); ?>

                    </span>
                </div>

                <div class="col-6 mt-2">
                    <i class="tio-bike ml-6" style="font-size: 30px;color: white"></i>
                </div>
            </div>
            <!-- End Row -->
        </div>
    </a>
    <!-- End Card -->
</div>

<div class="col-12">
    <div class="card card-body" style="background: #FEF7DC!important;">
        <div class="row gx-lg-4">
            <div class="col-sm-6 col-lg-3">
                <div class="media" style="cursor: pointer"
                     onclick="location.href='<?php echo e(route('admin.orders.list',['delivered'])); ?>'">
                    <div class="media-body">
                        <h6 class="card-subtitle"><?php echo e(__('messages.delivered')); ?></h6>
                        <span class="card-title h3">
                         <?php echo e($data['delivered']); ?>

                        </span>
                    </div>
                    <span class="icon icon-sm icon-soft-secondary icon-circle ml-3">
                      <i class="tio-checkmark-circle-outlined"></i>
                    </span>
                </div>
                <div class="d-lg-none">
                    <hr>
                </div>
            </div>

            <div class="col-sm-6 col-lg-3 column-divider-sm">
                <div class="media" style="cursor: pointer"
                     onclick="location.href='<?php echo e(route('admin.orders.list',['canceled'])); ?>'">
                    <div class="media-body">
                        <h6 class="card-subtitle"><?php echo e(__('messages.canceled')); ?></h6>
                        <span
                            class="card-title h3"><?php echo e($data['canceled']); ?></span>
                    </div>
                    <span class="icon icon-sm icon-soft-secondary icon-circle ml-3">
                      <i class="tio-remove-from-trash"></i>
                    </span>
                </div>
                <div class="d-lg-none">
                    <hr>
                </div>
            </div>

            <div class="col-sm-6 col-lg-3 column-divider-lg">
                <div class="media" style="cursor: pointer"
                     onclick="location.href='<?php echo e(route('admin.orders.list',['returned'])); ?>'">
                    <div class="media-body">
                        <h6 class="card-subtitle"><?php echo e(__('messages.returned')); ?></h6>
                        <span
                            class="card-title h3"><?php echo e($data['returned']); ?></span>
                    </div>
                    <span class="icon icon-sm icon-soft-secondary icon-circle ml-3">
                      <i class="tio-history"></i>
                    </span>
                </div>
                <div class="d-lg-none">
                    <hr>
                </div>
            </div>

            <div class="col-sm-6 col-lg-3 column-divider-sm">
                <div class="media" style="cursor: pointer"
                     onclick="location.href='<?php echo e(route('admin.orders.list',['failed'])); ?>'">
                    <div class="media-body">
                        <h6 class="card-subtitle"><?php echo e(__('messages.failed')); ?></h6>
                        <span
                            class="card-title h3"><?php echo e($data['failed']); ?></span>
                    </div>
                    <span class="icon icon-sm icon-soft-secondary icon-circle ml-3">
                      <i class="tio-message-failed"></i>
                    </span>
                </div>
                <div class="d-lg-none">
                    <hr>
                </div>
            </div>
        </div>
    </div>
</div>
<?php /**PATH /home/jj/Desktop/MrZ/WebVision/AdamG/Admin/resources/views/admin-views/partials/_dashboard-order-stats.blade.php ENDPATH**/ ?>