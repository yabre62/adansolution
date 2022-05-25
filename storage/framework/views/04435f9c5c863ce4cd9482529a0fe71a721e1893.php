<div class="feature_header">
    <span><?php echo e(trans('messages.shopping_cart')); ?></span>
</div>
<!-- Grid-->
<hr class="view_border">

<div class="row">
    <!-- List of items-->
    <section class="col-lg-8">
        <div class="cart_information">
            <?php if(session()->has('cart') && count( session()->get('cart')) > 0): ?>
                <?php $__currentLoopData = session()->get('cart'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $cartItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="cart_item mb-2">
                        <div class="row">
                            <div class="col-md-7 col-sm-6 col-9 d-flex align-items-center">
                                <div class="media">
                                    <div
                                        class="media-header d-flex justify-content-center align-items-center mr-2">
                                        <a href="<?php echo e(route('product',$cartItem['slug'])); ?>">
                                            <img style="height: 82px;"
                                                 onerror="this.src='<?php echo e(asset('public/assets/front-end/img/image-place-holder.png')); ?>'"
                                                 src="<?php echo e(\App\CPU\ProductManager::product_image_path('thumbnail')); ?>/<?php echo e($cartItem['thumbnail']); ?>"
                                                 alt="Product">
                                        </a>
                                    </div>

                                    <div class="media-body d-flex justify-content-center align-items-center">
                                        <div class="cart_product">
                                            <div class="product-title">
                                                <a href="<?php echo e(route('product',$cartItem['slug'])); ?>"><?php echo e($cartItem['name']); ?></a>
                                            </div>
                                            <div
                                                class=" text-accent"><?php echo e(\App\CPU\Helpers::currency_converter($cartItem['price']-$cartItem['discount'])); ?></div>
                                            <?php if($cartItem['discount'] > 0): ?>
                                                <strike style="font-size: 12px!important;color: grey!important;">
                                                    <?php echo e(\App\CPU\Helpers::currency_converter($cartItem['price'])); ?>

                                                </strike>
                                            <?php endif; ?>
                                            <?php $__currentLoopData = $cartItem['variations']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key1 =>$variation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <div class="text-muted"><span
                                                        class="mr-2"><?php echo e($key1); ?> :</span><?php echo e($variation); ?></div>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-1 col-sm-2 col-3 d-flex align-items-center">
                                <div>
                                    <select name="quantity[<?php echo e($key); ?>]" id="cartQuantity<?php echo e($key); ?>"
                                            onchange="updateCartQuantity('<?php echo e($key); ?>')">
                                        <?php for($i = 1; $i <= 10; $i++): ?>
                                            <option
                                                value="<?php echo e($i); ?>" <?php if ($cartItem['quantity'] == $i) echo "selected"?>>
                                                <?php echo e($i); ?>

                                            </option>
                                        <?php endfor; ?>
                                    </select>
                                </div>
                            </div>
                            <div
                                class="col-md-4 col-sm-4 offset-4 offset-sm-0 text-center d-flex justify-content-between align-items-center">
                                <div class="">
                                    <div class=" text-accent">
                                        <?php echo e(\App\CPU\Helpers::currency_converter(($cartItem['price']-$cartItem['discount'])*$cartItem['quantity'])); ?>

                                    </div>
                                </div>
                                <div style="margin-top: 3px;">
                                    <button class="btn btn-link px-0 text-danger"
                                            onclick="removeFromCart(<?php echo e($key); ?>)" type="button"><i
                                            class="czi-close-circle mr-2"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php else: ?>
                <div class="d-flex justify-content-center align-items-center">
                    <h4 class="text-danger">Cart Empty</h4>
                </div>
            <?php endif; ?>
        </div>
        <div class="row pt-2">
            <div class="col-12">
                <select class="form-control" id="shipping_method_id" onchange="set_shipping_id(this.value)">
                    <option value="0"><?php echo e(trans('messages.shipping_method')); ?></option>
                    <?php $__currentLoopData = \App\Model\ShippingMethod::where(['status'=>1])->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $shipping): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option
                            value="<?php echo e($shipping['id']); ?>" <?php echo e(session()->has('shipping_method_id')?session('shipping_method_id')==$shipping['id']?'selected':'':''); ?>>
                            <?php echo e($shipping['title'].' ( '.$shipping['duration'].' ) '.\App\CPU\Helpers::currency_converter($shipping['cost'])); ?>

                        </option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
                <br>
            </div>

            <div class="col-6">
                <a href="<?php echo e(route('home')); ?>" class="btn btn-primary">
                    <i class="fa fa-backward"></i> <?php echo e(trans('messages.continue_shop')); ?>

                </a>
            </div>

            <div class="col-6">
                <a href="<?php echo e(route('checkout-details')); ?>" class="btn btn-primary pull-right">
                    <?php echo e(trans('messages.checkout')); ?> <i class="fa fa-forward"></i>
                </a>
            </div>
        </div>
    </section>
    <!-- Sidebar-->
    <?php echo $__env->make('web-views.partials._order-summary', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</div>


<script>
    cartQuantityInitialize();

    function set_shipping_id(id) {
        <?php $__currentLoopData = session()->get('cart'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        let key = '<?php echo e($key); ?>';
        <?php break; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        $.get({
            url: '<?php echo e(url('/')); ?>/customer/set-shipping-method',
            dataType: 'json',
            data: {
                id: id,
                key: key
            },
            beforeSend: function () {
                $('#loading').show();
            },
            success: function (data) {
                if (data.status == 1) {
                    toastr.success('Shipping method selected', {
                        CloseButton: true,
                        ProgressBar: true
                    });
                    setInterval(function () {
                        location.reload();
                    }, 2000);
                } else {
                    toastr.error('Choose proper shipping method.', {
                        CloseButton: true,
                        ProgressBar: true
                    });
                }
            },
            complete: function () {
                $('#loading').hide();
            },
        });
    }
</script>
<?php /**PATH /home/jj/Desktop/MrZ/WebVision/AdamG/Admin/resources/views/layouts/front-end/partials/cart_details.blade.php ENDPATH**/ ?>