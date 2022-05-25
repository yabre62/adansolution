<!-- Header -->
<div class="card-header">
    <h5 class="card-header-title">
        <i class="tio-star"></i> <?php echo e(trans('messages.most_rated_products')); ?>

    </h5>
    <i class="tio-gift" style="font-size: 45px"></i>
</div>
<!-- End Header -->

<!-- Body -->
<div class="card-body">
    <div class="row">
        <div class="col-12">
            <table class="table">
                <tbody>
                <?php $__currentLoopData = $most_rated_products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php ($product=\App\Model\Product::find($item['product_id'])); ?>
                    <?php if(isset($product)): ?>
                        <tr onclick="location.href='<?php echo e(route('admin.product.view',[$item['product_id']])); ?>'"
                            style="cursor: pointer">
                            <td scope="row">
                                <img height="35" style="border-radius: 5px"
                                     src="<?php echo e(asset('product/thumbnail')); ?>/<?php echo e($product['thumbnail']); ?>"
                                     onerror="this.src='<?php echo e(asset('public/assets/back-end/img/160x160/img2.jpg')); ?>'"
                                     alt="<?php echo e($product->name); ?> image">
                                <span class="ml-2">
                                <?php echo e(isset($product)?substr($product->name,0,30) . (strlen($product->name)>20?'...':''):'not exists'); ?>

                            </span>
                            </td>
                            <td>
                            <span style="font-size: 18px">
                                <?php echo e(round($item['ratings_average'],2)); ?>

                                <i style="color: gold" class="tio-star"></i>
                            </span>
                            </td>
                            <td>
                          <span style="font-size: 18px">
                            <?php echo e($item['total']); ?> <i class="tio-users-switch"></i>
                          </span>
                            </td>
                        </tr>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- End Body -->
<?php /**PATH /home/jj/Desktop/MrZ/WebVision/AdamG/Admin/resources/views/admin-views/partials/_most-rated-products.blade.php ENDPATH**/ ?>