<!-- Header -->
<div class="card-header">
    <h5 class="card-header-title">
        <i class="tio-company"></i> <?php echo e(trans('messages.top_selling_store')); ?>

    </h5>
    <i class="tio-dollar-outlined" style="font-size: 45px"></i>
</div>
<!-- End Header -->

<!-- Body -->
<div class="card-body">
    <div class="row">
        <?php $__currentLoopData = $top_store_by_earning; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php ($shop=\App\Model\Shop::where('seller_id',$item['seller_id'])->first()); ?>
            <?php if(isset($shop)): ?>
                <div class="col-6 col-md-4 mt-2"
                     onclick="location.href='<?php echo e(route('admin.sellers.view',$item['seller_id'])); ?>'"
                     style="padding-left: 6px;padding-right: 6px;cursor: pointer">
                    <div class="grid-card" style="min-height: 170px">
                        <label class="label_1"
                               style="width: 78px"><?php echo e($item['count']); ?> <?php echo e(\App\CPU\BackEndHelper::currency_symbol()); ?></label>
                        <center class="mt-6">
                            <img style="border-radius: 50%;width: 60px;height: 60px;border:2px solid #80808082;"
                                 onerror="this.src='<?php echo e(asset('public/assets/back-end/img/160x160/img1.jpg')); ?>'"
                                 src="<?php echo e(asset('shop/'.$shop->image??'')); ?>">
                        </center>
                        <div class="text-center mt-2">
                            <span style="font-size: 10px"><?php echo e($shop['name']??'Not exist'); ?></span>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</div>
<!-- End Body -->
<?php /**PATH /home/jj/Desktop/MrZ/WebVision/AdamG/Admin/resources/views/admin-views/partials/_top-selling-store.blade.php ENDPATH**/ ?>