<?php
$overallRating = \App\CPU\ProductManager::get_overall_rating($product->reviews);
$rating = \App\CPU\ProductManager::get_rating($product->reviews);
$productReviews = \App\CPU\ProductManager::get_product_review($product->id);
?>
<style>
    .product-title2 {
        font-family: 'Roboto', sans-serif !important;
        font-weight: 400 !important;
        font-size: 22px !important;
        color: #000000 !important;
        position: relative;
        display: inline-block;
        word-wrap: break-word;
        overflow: hidden;
        max-height: 1.2em; /* (Number of lines you want visible) * (line-height) */
        line-height: 1.2em;
    }

    .cz-product-gallery {
        display: block;
    }

    .cz-preview {
        width: 100%;
        margin-top: 0;
        margin-left: 0;
        max-height: 100% !important;
    }

    .cz-preview-item.active {
        border: 1px solid #E2F0FF;
        border-radius: 3px;
        padding: 10%;
    }

    .cz-preview-item > img {
        width: 80%;
    }

    .details {
        border: 1px solid #E2F0FF;
        border-radius: 3px;
        padding: 16px;
    }

    img, figure {
        max-width: 100%;
        vertical-align: middle;
    }

    .cz-thumblist-item.active {
        border-color: <?php echo e($web_config['primary_color']); ?>;
        padding: 10%;
    }

    .cz-thumblist-item {
        display: block;
        position: relative;
        width: 64px;
        height: 64px;
        margin: .625rem;
        transition: border-color 0.2s ease-in-out;
        border: 1px solid #E2F0FF;
        border-radius: .3125rem;
        text-decoration: none !important;
        overflow: hidden;
    }

    .for-hover-bg:hover {
        border: 2px solid<?php echo e($web_config['primary_color']); ?>;
    }

    .for-hover-bg {
        font-size: 18px;
        height: 45px;
        color: <?php echo e($web_config['primary_color']); ?>;
        border: 2px solid<?php echo e($web_config['secondary_color']); ?>;
    }

    .cz-thumblist-item > img {
        display: block;
        width: 80%;
        transition: opacity .2s ease-in-out;
        max-height: 58px;
        opacity: .6;
    }

    @media (max-width: 767.98px) and (min-width: 576px) {
        .cz-preview-item > img {
            width: 100%;
        }
    }

    @media (max-width: 575.98px) {
        .cz-thumblist {
            display: -ms-flexbox;
            display: flex;
            -ms-flex-wrap: wrap;
            flex-wrap: wrap;
            -ms-flex-pack: center;
            justify-content: center;
            margin-right: -1rem;
            margin-left: 0;
            padding-top: 1rem;
            padding-right: 22px;
            padding-bottom: 10px;
        }

        .cz-thumblist-item {
            margin: 0px;
        }

        .cz-thumblist {
            padding-top: 8px !important;
        }

        .cz-preview-item > img {
            width: 100%;
        }
    }
</style>
<div class="modal-header">
    <h4 class="modal-title product-title">
        <a class="product-title2" href="<?php echo e(route('product',$product->slug)); ?>" data-toggle="tooltip"
           data-placement="right"
           title="Go to product page"><?php echo e($product['name']); ?>

            <i class="czi-arrow-right font-size-lg ml-2"></i>
        </a>
    </h4>
    <button class="close call-when-done" type="button" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<div class="modal-body">
    <div class="row ">
        <!-- Product gallery-->
        <div class="col-lg-6 col-md-6">
            <div class="cz-product-gallery">
                <div class="cz-preview">
                    <?php if($product->images!=null && json_decode($product->images)>0): ?>
                        <?php $__currentLoopData = json_decode($product->images); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $photo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div
                                class="cz-preview-item d-flex align-items-center justify-content-center  <?php echo e($key==0?'active':''); ?>"
                                id="image<?php echo e($key); ?>">
                                <img class="cz-image-zoom img-responsive"
                                     onerror="this.src='<?php echo e(asset('public/assets/front-end/img/image-place-holder.png')); ?>'"
                                     src="<?php echo e(asset("product/$photo")); ?>"
                                     data-zoom="<?php echo e(asset("product/$photo")); ?>"
                                     alt="Product image" width="">
                                <div class="cz-image-zoom-pane"></div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                </div>
                <div class="cz">
                    <div class="container">
                        <div class="row">
                            <div class="table-responsive" data-simplebar style="max-height: 515px; padding: 0px;">
                                <div class="d-flex">
                                    <?php if($product->images!=null && json_decode($product->images)>0): ?>
                                        <?php $__currentLoopData = json_decode($product->images); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $photo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <div class="cz-thumblist">
                                                <a class="cz-thumblist-item  <?php echo e($key==0?'active':''); ?> d-flex align-items-center justify-content-center "
                                                   href="#image<?php echo e($key); ?>">
                                                    <img src="<?php echo e(asset("product/$photo")); ?>"
                                                         onerror="this.src='<?php echo e(asset('public/assets/front-end/img/image-place-holder.png')); ?>'"
                                                         alt="Product thumb">
                                                </a>
                                            </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
        <!-- Product details-->
        <div class="col-lg-6 col-md-6 mt-md-0 mt-sm-3">
            <div class="details">
                <a href="<?php echo e(route('product',$product->slug)); ?>" class="h3 mb-2 product-title"><?php echo e($product->name); ?></a>
                <div class="d-flex align-items-center mb-2 pro">
                    <span
                        class="d-inline-block font-size-sm text-body align-middle mt-1 mr-2 pr-2"><?php echo e($overallRating[0]); ?></span>
                    <div class="star-rating">
                        <?php for($inc=0;$inc<5;$inc++): ?>
                            <?php if($inc<$overallRating[0]): ?>
                                <i class="sr-star czi-star-filled active"></i>
                            <?php else: ?>
                                <i class="sr-star czi-star"></i>
                            <?php endif; ?>
                        <?php endfor; ?>
                    </div>
                    <span class="d-inline-block font-size-sm text-body align-middle mt-1 ml-1 mr-2 pl-2 pr-2"><?php echo e($overallRating[1]); ?> Reviews</span>
                    <span style="width: 0px;height: 10px;border: 0.5px solid #707070; margin-top: 6px"></span>
                    <span class="d-inline-block font-size-sm text-body align-middle mt-1 ml-1 mr-2 pl-2 pr-2"><?php echo e($countOrder); ?> orders  </span>
                    <span style="width: 0px;height: 10px;border: 0.5px solid #707070; margin-top: 6px">    </span>
                    <span class="d-inline-block font-size-sm text-body align-middle mt-1 ml-1 mr-2 pl-2 pr-2">  <?php echo e($countWishlist); ?>  wish</span>

                </div>
                <div class="mb-3">
                    <span class="h3 font-weight-normal text-accent mr-1">
                        <?php echo e(\App\CPU\Helpers::get_price_range($product)); ?>

                    </span>
                    <?php if($product->discount > 0): ?>
                        <strike style="font-size: 12px!important;color: grey!important;">
                            <?php echo e(\App\CPU\Helpers::currency_converter($product->unit_price)); ?>

                        </strike>
                    <?php endif; ?>
                </div>

                <?php if($product->discount > 0): ?>
                    <div class="mb-3">
                        <strong>Discount : </strong>
                        <strong id="set-discount-amount"></strong>
                    </div>
                <?php endif; ?>

                <div class="mb-3">
                    <strong>TAX : </strong>
                    <strong id="set-tax-amount"></strong>
                </div>

                <form id="add-to-cart-form" class="mb-2">
                    <?php echo csrf_field(); ?>
                    <input type="hidden" name="id" value="<?php echo e($product->id); ?>">
                    <div class="position-relative mr-n4 mb-3">
                        <?php if(count(json_decode($product->colors)) > 0): ?>
                            <div class="row no-gutters">
                                <div class="col-2">
                                    <div class="product-description-label mt-2"><?php echo e(__('Color')); ?>:
                                    </div>
                                </div>
                                <div class="col-10">
                                    <ul class="list-inline checkbox-color mb-1">
                                        <?php $__currentLoopData = json_decode($product->colors); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $color): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <li>
                                                <input type="radio"
                                                       id="<?php echo e($product->id); ?>-color-<?php echo e($key); ?>"
                                                       name="color" value="<?php echo e($color); ?>"
                                                       <?php if($key == 0): ?> checked <?php endif; ?>>
                                                <label style="background: <?php echo e($color); ?>;"
                                                       for="<?php echo e($product->id); ?>-color-<?php echo e($key); ?>"
                                                       data-toggle="tooltip"></label>
                                            </li>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </ul>
                                </div>
                            </div>
                        <?php endif; ?>
                        <?php
                            $qty = 0;
                            foreach (json_decode($product->variation) as $key => $variation) {
                                $qty += $variation->qty;
                            }
                        ?>

                    </div>
                    <?php $__currentLoopData = json_decode($product->choice_options); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $choice): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="row no-gutters">
                            <div class="col-2">
                                <div class="product-description-label mt-2 "><?php echo e($choice->title); ?>:
                                </div>
                            </div>
                            <div class="col-10">
                                <ul class="list-inline checkbox-alphanumeric checkbox-alphanumeric--style-1 mb-2">
                                    <?php $__currentLoopData = $choice->options; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $option): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li>
                                            <input type="radio"
                                                   id="<?php echo e($choice->name); ?>-<?php echo e($option); ?>"
                                                   name="<?php echo e($choice->name); ?>" value="<?php echo e($option); ?>"
                                                   <?php if($key == 0): ?> checked <?php endif; ?>>
                                            <label
                                                for="<?php echo e($choice->name); ?>-<?php echo e($option); ?>"><?php echo e($option); ?></label>
                                        </li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                <!-- Quantity + Add to cart -->
                    <div class="row no-gutters">
                        <div class="col-2">
                            <div class="product-description-label mt-2"><?php echo e(__('Quantity')); ?>:</div>
                        </div>
                        <div class="col-10">
                            <div class="product-quantity d-flex align-items-center">
                                <div class="input-group input-group--style-2 pr-3"
                                     style="width: 160px;">
                                    <span class="input-group-btn">
                                        <button class="btn btn-number" type="button"
                                                data-type="minus" data-field="quantity"
                                                disabled="disabled" style="padding: 10px">
                                            -
                                        </button>
                                    </span>
                                    <input type="text" name="quantity"
                                           class="form-control input-number text-center cart-qty-field"
                                           placeholder="1" value="1" min="1" max="100">
                                    <span class="input-group-btn">
                                        <button class="btn btn-number" type="button" data-type="plus"
                                                data-field="quantity" style="padding: 10px">
                                           +
                                        </button>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row no-gutters d-none mt-2" id="chosen_price_div">
                        <div class="col-2">
                            <div class="product-description-label"><?php echo e(__('Total Price')); ?>:</div>
                        </div>
                        <div class="col-10">
                            <div class="product-price">
                                <strong id="chosen_price"></strong>
                            </div>
                        </div>
                        <div class="col-12">
                            <?php if($product['current_stock']<=0): ?>
                                <h5 class="mt-3" style="color: red">Out of Stock</h5>
                            <?php endif; ?>
                        </div>
                    </div>
                    
                    <div class="row" style="display: none">
                        <div class="col-md-12">
                            <div id="accordion">
                                <div class="card mt-2 mb-2">
                                    <div class="card-header" id="headingTwo">
                                        <h5 class="mb-0">
                                            <a href="javascript:" style="font-size: 15px" class="collapsed"
                                               data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false"
                                               aria-controls="collapseTwo">
                                                Select Shipping Method
                                            </a>
                                        </h5>
                                    </div>
                                    <div id="collapseTwo" class="collapse show" aria-labelledby="headingTwo"
                                         data-parent="#accordion">
                                        <div class="card-body">
                                            <ul class="list-group">
                                                <?php $__currentLoopData = \App\CPU\ProductManager::get_shipping_methods($product); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$shipping): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <li class="list-group-item" style="cursor: pointer;"
                                                        onclick="$('#sh-<?php echo e($shipping['id']); ?>').prop( 'checked', true )">
                                                        <input type="radio" name="shipping_method_id"
                                                               id="sh-<?php echo e($shipping['id']); ?>"
                                                               value="<?php echo e($shipping['id']); ?>" <?php echo e($key==0?'checked':''); ?>>
                                                        <span class="checkmark" style="margin-right: 10px"></span>
                                                        <?php echo e($shipping['title']); ?> ( Duration
                                                        : <?php echo e($shipping['duration']); ?>,
                                                        Cost
                                                        : <?php echo e(\App\CPU\Helpers::currency_converter($shipping['cost'])); ?>

                                                        )
                                                    </li>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-between mt-2">

                        <button class="btn btn-secondary" onclick="buy_now()"
                                type="button"
                                style="width:37%; height: 45px">
                            <?php echo e(trans('messages.buy_now')); ?>

                        </button>
                        <button class="btn btn-primary"
                                onclick="addToCart()"
                                type="button"
                                style="width:37%; height: 45px">
                            <?php echo e(trans('messages.Add')); ?> <?php echo e(trans('messages.To')); ?> <?php echo e(trans('messages.Cart')); ?>

                        </button>

                        <button type="button" onclick="addWishlist('<?php echo e($product['id']); ?>')" class="btn for-hover-bg"
                                style="">
                            <i class="fa fa-heart-o mr-2" aria-hidden="true"></i>
                            <span class="countWishlist-<?php echo e($product['id']); ?>"><?php echo e($countWishlist); ?></span>
                        </button>

                    </div>
                </form>
                <!-- Product panels-->
                
            </div>
        </div>
    </div>
</div>
<script src="<?php echo e(asset('public/assets/front-end')); ?>/js/theme.min.js"></script>
<script type="text/javascript">
    cartQuantityInitialize();
    getVariantPrice();
    $('#add-to-cart-form input').on('change', function () {
        getVariantPrice();
    });
</script>

<script type="text/javascript"
        src="https://platform-api.sharethis.com/js/sharethis.js#property=5f55f75bde227f0012147049&product=sticky-share-buttons"
        async="async"></script>
<?php /**PATH /home/jj/Desktop/MrZ/WebVision/AdamG/Admin/resources/views/web-views/partials/_quick-view-data.blade.php ENDPATH**/ ?>