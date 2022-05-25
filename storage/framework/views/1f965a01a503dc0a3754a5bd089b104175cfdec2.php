<?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <?php if(!empty($product['product_id'])): ?>
        <?php ($product=$product->product); ?>
    <?php endif; ?>
    <div class=" <?php echo e(Request::is('products*')?'col-lg-3 col-md-4 col-sm-4 col-6':'col-lg-2 col-md-3 col-sm-4 col-6'); ?> <?php echo e(Request::is('shopView*')?'col-lg-3 col-md-4 col-sm-4 col-6':''); ?> mb-2">
        <?php if(!empty($product)): ?>
            <?php echo $__env->make('web-views.partials._single-product',['p'=>$product], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php endif; ?>
        <hr class="d-sm-none">
    </div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php /**PATH /home/jj/Desktop/MrZ/WebVision/AdamG/Admin/resources/views/web-views/products/_ajax-products.blade.php ENDPATH**/ ?>