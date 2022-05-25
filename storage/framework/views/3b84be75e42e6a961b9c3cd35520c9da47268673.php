
<div class="navbar-tool dropdown ml-3" style="margin-right: 6px">
    <a class="navbar-tool-icon-box bg-secondary dropdown-toggle" href="<?php echo e(route('shop-cart')); ?>">
        <span class="navbar-tool-label">
            <?php echo e(session()->has('cart')?count(session()->get('cart')):0); ?>

        </span>
        <i class="navbar-tool-icon czi-cart"></i>
    </a>
    <a class="navbar-tool-text" href="<?php echo e(route('shop-cart')); ?>"><small><?php echo e(trans('messages.my_cart')); ?></small>
        <?php echo e(\App\CPU\Helpers::currency_converter(\App\CPU\CartManager::cart_total_applied_discount(session()->get('cart')))); ?>

    </a>
    <!-- Cart dropdown-->
    <div class="dropdown-menu dropdown-menu-right" style="width: 20rem;">
        <div class="widget widget-cart px-3 pt-2 pb-3">
            <?php if(session()->has('cart') && count( session()->get('cart')) > 0): ?>
                <div style="height: 15rem;" data-simplebar data-simplebar-auto-hide="false">
                    <?php ($sub_total=0); ?>
                    <?php ($total_tax=0); ?>
                    <?php $__currentLoopData = session('cart'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $cartItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="widget-cart-item pb-2">
                            <button class="close text-danger " type="button" onclick="removeFromCart(<?php echo e($key); ?>)"
                                    aria-label="Remove"><span
                                    aria-hidden="true">&times;</span>
                            </button>
                            <div class="media align-items-center">
                                <a class="d-block mr-2"
                                   href="<?php echo e(route('product',$cartItem['slug'])); ?>">
                                    <img width="64"
                                         onerror="this.src='<?php echo e(asset('public/assets/front-end/img/image-place-holder.png')); ?>'"
                                         src="<?php echo e(\App\CPU\ProductManager::product_image_path('thumbnail')); ?>/<?php echo e($cartItem['thumbnail']); ?>"
                                         alt="Product"/>
                                </a>
                                <div class="media-body">
                                    <h6 class="widget-product-title">
                                        <a href="<?php echo e(route('product',$cartItem['slug'])); ?>"><?php echo e($cartItem['name']); ?></a></h6>
                                    <?php $__currentLoopData = $cartItem['variations']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key =>$variation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <span style="font-size: 14px"><?php echo e($key); ?> : <?php echo e($variation); ?></span><br>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <div class="widget-product-meta">
                                        <span class="text-muted mr-2">x <?php echo e($cartItem['quantity']); ?></span>
                                        <span class="text-accent mr-2">
                                                <?php echo e(\App\CPU\Helpers::currency_converter(($cartItem['price']-$cartItem['discount'])*$cartItem['quantity'])); ?>

                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php ($sub_total+=($cartItem['price']-$cartItem['discount'])*$cartItem['quantity']); ?>
                        <?php ($total_tax+=$cartItem['tax']*$cartItem['quantity']); ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
                <hr>
                <div class="d-flex flex-wrap justify-content-between align-items-center py-3">
                    <div class="font-size-sm mr-2 py-2 float-right">
                        <span class="">Subtotal :</span>
                        <span class="text-accent font-size-base ml-1">
                             <?php echo e(\App\CPU\Helpers::currency_converter($sub_total)); ?>

                        </span>
                    </div>

                    <a class="btn btn-outline-secondary btn-sm" href="<?php echo e(route('shop-cart')); ?>">
                        Expand cart<i class="czi-arrow-right ml-1 mr-n1"></i>
                    </a>
                </div>
                <a class="btn btn-primary btn-sm btn-block" href="<?php echo e(route('checkout-details')); ?>">
                    <i class="czi-card mr-2 font-size-base align-middle"></i>Checkout
                </a>
            <?php else: ?>
                <div class="widget-cart-item">
                    <h6 class="text-danger text-center"><i class="fa fa-cart-arrow-down"></i><?php echo e(trans('messages.Cart')); ?> <?php echo e(trans('messages.Empty')); ?>  </h6>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>


<?php /**PATH /home/jj/Desktop/MrZ/WebVision/AdamG/Admin/resources/views/layouts/front-end/partials/cart.blade.php ENDPATH**/ ?>