<div class="d-table table-fixed w-100">
    <a class="d-table-cell cz-handheld-toolbar-item" href="#navbarCollapse" data-toggle="collapse" onclick="window.scrollTo(0, 0)">
        <span class="cz-handheld-toolbar-icon"><i class="czi-menu"></i></span>
        <span class="cz-handheld-toolbar-label">Menu</span></a>
    <a class="d-table-cell cz-handheld-toolbar-item" href="<?php echo e(route('wishlists')); ?>">
        <span class="cz-handheld-toolbar-icon"><i class="czi-heart"></i></span>
        <span class="cz-handheld-toolbar-label"><?php echo e(trans('messages.WISHLIST')); ?> (<span class="countWishlist"><?php echo e(session()->has('wish_list')?count(session('wish_list')):0); ?></span>)</span></a>

    <a class="d-table-cell cz-handheld-toolbar-item" href="<?php echo e(route('shop-cart')); ?>">
        <span class="cz-handheld-toolbar-icon"><i class="czi-cart"></i>
            <span class="badge badge-primary badge-pill ml-1" id="cart_count"><?php echo e(session()->has('cart') && count( session()->get('cart')) > 0 ? count( session()->get('cart')):0); ?></span>
        </span>
        <span class="cz-handheld-toolbar-label" id="cart_total_price">
            <?php if(session()->has('cart')): ?>

                <?php if(count( session()->get('cart')) > 0): ?>
                    <?php
                    $total1 = 0;
                    ?>
                    <?php $__currentLoopData = session()->get('cart'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $cartItem1): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php
                        $product_subtotal1 = \App\CPU\convert_price($cartItem1['price'] * $cartItem1['quantity']);
                        $total1 += $product_subtotal1;
                        ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php echo e(number_format($total1,2).\App\CPU\currency_symbol()); ?>

                <?php else: ?>
                    0<?php echo e(\App\CPU\currency_symbol()); ?>

                <?php endif; ?>
            <?php else: ?>
                0<?php echo e(\App\CPU\currency_symbol()); ?>

            <?php endif; ?>
        </span>
    </a>
</div>
<?php /**PATH /home/jj/Desktop/MrZ/WebVision/AdamG/Admin/resources/views/layouts/front-end/partials/_toolbar.blade.php ENDPATH**/ ?>