<?php if(count($combinations) > 0): ?>
    <table class="table table-bordered">
        <thead>
        <tr>
            <td class="text-center">
                <label for="" class="control-label"><?php echo e(trans('messages.Variant')); ?></label>
            </td>
            <td class="text-center">
                <label for="" class="control-label"><?php echo e(trans('messages.Variant Price')); ?></label>
            </td>
            <td class="text-center">
                <label for="" class="control-label"><?php echo e(trans('messages.SKU')); ?></label>
            </td>
            <td class="text-center">
                <label for="" class="control-label"><?php echo e(trans('messages.Quantity')); ?></label>
            </td>
        </tr>
        </thead>
        <tbody>
        <?php endif; ?>
        <?php $__currentLoopData = $combinations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $combination): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td>
                    <label for="" class="control-label"><?php echo e($combination['type']); ?></label>
                </td>
                <td>
                    <input type="number" name="price_<?php echo e($combination['type']); ?>" value="<?php echo e(\App\CPU\Convert::default($combination['price'])); ?>" min="0" step="0.01"
                           class="form-control" required>
                </td>
                <td>
                    <input type="text" name="sku_<?php echo e($combination['type']); ?>" value="<?php echo e($combination['sku']); ?>" class="form-control" required>
                </td>
                <td>
                    <input type="number" name="qty_<?php echo e($combination['type']); ?>" value="<?php echo e($combination['qty']); ?>" min="0" step="1" class="form-control"
                           required>
                </td>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>

<?php /**PATH /home/jj/Desktop/MrZ/WebVision/AdamG/Admin/resources/views/seller-views/product/partials/_edit_sku_combinations.blade.php ENDPATH**/ ?>