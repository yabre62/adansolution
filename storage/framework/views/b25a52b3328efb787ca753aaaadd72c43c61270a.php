<!-- Header -->
<div class="card-header">
    <h5 class="card-header-title">
        <i class="tio-align-to-top"></i> <?php echo e(trans('messages.top_selling_products')); ?>

    </h5>
    <i class="tio-gift" style="font-size: 45px"></i>
</div>
<!-- End Header -->

<!-- Body -->
<div class="card-body">
    <div class="row">
        <?php $__currentLoopData = $top_sell; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-md-4 col-sm-6 mt-2"
                 onclick="location.href='<?php echo e(route('admin.product.view',[$item['product_id']])); ?>'"
                 style="cursor: pointer;padding-right: 6px;padding-left: 6px">
                <div class="grid-card">
                    <label class="label_1">Sold : <?php echo e($item['count']); ?></label>
                    <center class="mt-4">
                        <img style="height: 90px"
                             src="<?php echo e(\App\CPU\ProductManager::product_image_path('thumbnail')); ?>/<?php echo e($item->product['thumbnail']); ?>"
                             onerror="this.src='<?php echo e(asset('public/assets/back-end/img/160x160/img2.jpg')); ?>'"
                             alt="<?php echo e($item->product->name); ?> image">
                    </center>
                    <div class="text-center mt-2">
                        <span class="" style="font-size: 10px"><?php echo e(substr($item->product['name'],0,20)); ?> <?php echo e(strlen($item->product['name'])>20?'...':''); ?></span>
                    </div>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</div>
<!-- End Body -->
<?php /**PATH /home/jj/Desktop/MrZ/WebVision/AdamG/Admin/resources/views/seller-views/partials/_top-selling-products.blade.php ENDPATH**/ ?>