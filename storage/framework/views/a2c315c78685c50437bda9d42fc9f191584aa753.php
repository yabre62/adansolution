<?php $__env->startSection('title','Shop Page'); ?>

<?php $__env->startPush('css_or_js'); ?>
    <?php if($shop['id'] != 0): ?>
        <meta property="og:image" content="<?php echo e(asset('shop')); ?>/<?php echo e($shop->image); ?>"/>
        <meta property="og:title" content="<?php echo e($shop->name); ?> "/>
        <meta property="og:url" content="<?php echo e(route('shopView',[$shop['id']])); ?>">
    <?php else: ?>
        <meta property="og:image" content="<?php echo e(asset('company')); ?>/<?php echo e($web_config['fav_icon']->value); ?>"/>
        <meta property="og:title" content="<?php echo e($shop['name']); ?> "/>
        <meta property="og:url" content="<?php echo e(route('shopView',[$shop['id']])); ?>">
    <?php endif; ?>
    <meta property="og:description" content="<?php echo substr($web_config['about']->value,0,100); ?>">

    <?php if($shop['id'] != 0): ?>
        <meta property="twitter:card" content="<?php echo e(asset('shop')); ?>/<?php echo e($shop->image); ?>"/>
        <meta property="twitter:title" content="<?php echo e(route('shopView',[$shop['id']])); ?>"/>
        <meta property="twitter:url" content="<?php echo e(route('shopView',[$shop['id']])); ?>">
    <?php else: ?>
        <meta property="twitter:card"
              content="<?php echo e(asset('company')); ?>/<?php echo e($web_config['fav_icon']->value); ?>"/>
        <meta property="twitter:title" content="<?php echo e(route('shopView',[$shop['id']])); ?>"/>
        <meta property="twitter:url" content="<?php echo e(route('shopView',[$shop['id']])); ?>">
    <?php endif; ?>

    <meta property="twitter:description" content="<?php echo substr($web_config['about']->value,0,100); ?>">


    <link href="<?php echo e(asset('public/assets/front-end')); ?>/css/home.css" rel="stylesheet">
    <style>
        .headerTitle {
            font-size: 34px;
            font-weight: bolder;
            margin-top: 3rem;
        }

        .page-item.active .page-link {
            background-color: <?php echo e($web_config['primary_color']); ?>                     !important;
        }

        .page-item.active > .page-link {
            box-shadow: 0 0 black !important;
        }

        /***********************************/
        .sidepanel {
            width: 0;
            position: fixed;
            z-index: 6;
            height: 500px;
            top: 0;
            left: 0;
            background-color: #ffffff;
            overflow-x: hidden;
            transition: 0.5s;
            padding-top: 40px;
        }

        .sidepanel a {
            padding: 8px 8px 8px 32px;
            text-decoration: none;
            font-size: 25px;
            color: #818181;
            display: block;
            transition: 0.3s;
        }

        .sidepanel a:hover {
            color: #f1f1f1;
        }

        .sidepanel .closebtn {
            position: absolute;
            top: 0;
            right: 0px;
            font-size: 36px;
        }

        .openbtn {
            font-size: 18px;
            cursor: pointer;
            background-color: #ffffff;
            color: #373f50;
            width: 40%;
            border: none;
        }

        .openbtn:hover {
            background-color: #444;
        }

        .for-display {
            display: block !important;
        }

        @media (max-width: 360px) {
            .openbtn {
                width: 59%;
            }

            .for-shoting-mobile {
                margin-right: 0% !important;
            }

            .for-mobile {

                margin-left: 10% !important;
            }

        }

        @media  screen and (min-width: 375px) {

            .for-shoting-mobile {
                margin-right: 7% !important;
            }

            .custom-select {
                width: 86px;
            }


        }

        @media (max-width: 500px) {
            .for-mobile {

                margin-left: 27%;
            }

            .openbtn:hover {
                background-color: #fff;
            }

            .for-display {
                display: flex !important;
            }

            .for-shoting-mobile {
                margin-right: 11%;
            }

            .for-tab-display {
                display: none !important;
            }

            .openbtn-tab {
                margin-top: 0 !important;
            }

        }

        @media  screen and (min-width: 500px) {
            .openbtn {
                display: none !important;
            }


        }

        @media  screen and (min-width: 800px) {


            .for-tab-display {
                display: none !important;
            }

        }

        @media (max-width: 768px) {
            .headerTitle {
                font-size: 23px;

            }

            .openbtn-tab {
                margin-top: 3rem;
                display: inline-block !important;
            }

            .for-tab-display {
                display: inline;
            }

        }


    </style>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <!-- Page Content-->
    <div class="container pb-5 mb-2 mb-md-4">
        <div class="row">
            <!-- banner  -->
            <div class="col-lg-12 mt-2">
                <div style="background: white">
                    <?php if($shop['id'] != 0): ?>
                        <img style="width:100%; height: auto; max-height: 13.75rem; border-radius: 3px;"
                             src="<?php echo e(asset('shop/banner')); ?>/<?php echo e($shop->banner); ?>"
                             onerror="this.src='<?php echo e(asset('public/assets/front-end/img/image-place-holder.png')); ?>'"
                             alt="">
                    <?php else: ?>
                        <?php ($banner=\App\CPU\Helpers::get_business_settings('shop_banner')); ?>
                        <img style="width:100%; height: auto; max-height: 13.75rem; border-radius: 3px;"
                             src="<?php echo e(asset("shop")); ?>/<?php echo e($banner??""); ?>"
                             onerror="this.src='<?php echo e(asset('public/assets/front-end/img/image-place-holder.png')); ?>'"
                             alt="">
                    <?php endif; ?>
                </div>
            </div>
            
            <div class="col-md-3 mt-2 ">
                <a class="openbtn-tab" style="" onclick="openNav()">
                    <div style="font-size: 20px; font-weight: 600; " class="for-tab-display">
                        ☰ <?php echo e(trans('messages.categories')); ?></div>
                </a>
            </div>
            
            <div class="col-lg-12">
                <div class="mt-4 mb-2">
                    <div class="row">
                        
                        <div class="col-lg-8 col-md-6 col-12" style="display: inline-flex">
                            <div style="display:inline-block; vertical-align:top">
                                <?php if($shop['id'] != 0): ?>
                                    <img style="height: 65px; border-radius: 2px;"
                                         src="<?php echo e(asset('shop')); ?>/<?php echo e($shop->image); ?>"
                                         onerror="this.src='<?php echo e(asset('public/assets/front-end/img/image-place-holder.png')); ?>'"
                                         alt="">
                                <?php else: ?>
                                    <img style="height: 65px; border-radius: 2px;"
                                         src="<?php echo e(asset('company')); ?>/<?php echo e($web_config['fav_icon']->value); ?>"
                                         onerror="this.src='<?php echo e(asset('public/assets/front-end/img/image-place-holder.png')); ?>'"
                                         alt="">
                                <?php endif; ?>
                            </div>
                            <div style="display:inline-block;">
                                <h6 class="ml-4 font-weight-bold mt-3">
                                    <?php if($shop['id'] != 0): ?>
                                        <?php echo e($shop->name); ?>

                                    <?php else: ?>
                                        <?php echo e($web_config['name']->value); ?>

                                    <?php endif; ?>
                                </h6>
                                <span class="ml-4">
                                    <span class="mr-1"><?php echo e($total_rating); ?></span>
                                    <?php for($i=0; $i<$total_rating; $i++): ?>
                                        <i class="sr-star czi-star-filled active"></i>
                                    <?php endfor; ?>
                                    <?php if($total_rating == 0): ?>
                                        <i class="sr-star czi-star"></i>
                                    <?php endif; ?>
                                    <span class="ml-3"><?php echo e($total_review); ?> Reviews / <?php echo e($total_order); ?> Orders</span>
                                </span>
                            </div>
                        </div>

                        
                        <div class="col-md-2 col-12">
                            <?php if($seller_id!=0): ?>
                                <?php if(auth('customer')->check()): ?>
                                    <div class="d-flex">
                                        <a href="<?php echo e(route('customer.auth.login')); ?>" class="btn btn-primary btn-block">
                                            <i class="fa fa-envelope" aria-hidden="true"></i>
                                            <?php echo e(trans('messages.Contact')); ?> <?php echo e(trans('messages.Seller')); ?>

                                        </a>
                                    </div>
                                <?php else: ?>
                                    <div class="d-flex">
                                        <button class="btn btn-primary btn-block" data-toggle="modal"
                                                data-target="#exampleModal">
                                            <i class="fa fa-envelope" aria-hidden="true"></i>
                                            <?php echo e(trans('messages.Contact')); ?> <?php echo e(trans('messages.Seller')); ?>

                                        </button>
                                    </div>
                                <?php endif; ?>
                            <?php endif; ?>
                        </div>

                        
                        <div class="col-lg-2 col-md-4 col-12 pt-2">
                            <form class="form-inline md-form form-sm mt-0" method="get"
                                  action="<?php echo e(route('shopView',['id'=>$seller_id])); ?>">
                                <div class="input-group input-group-sm mb-3">
                                    <input type="text" class="form-control" name="product_name"
                                           placeholder="Search Product" aria-label="Recipient's username"
                                           aria-describedby="basic-addon2">
                                    <div class="input-group-append">
                                        <button type="submit" class="input-group-text" id="basic-addon2">
                                            <i class="fa fa-search" aria-hidden="true"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                     aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="card-header">
                                Write Something
                            </div>
                            <div class="modal-body">
                                <form action="<?php echo e(route('messages_store')); ?>" method="post" id="chat-form">
                                    <?php echo csrf_field(); ?>
                                    <?php if($shop['id'] != 0): ?>
                                        <input value="<?php echo e($shop->id); ?>" name="shop_id" hidden>
                                        <input value="<?php echo e($shop->seller_id); ?>}" name="seller_id" hidden>
                                    <?php endif; ?>

                                    <textarea name="message" class="form-control"></textarea>
                                    <br>
                                    <?php if($shop['id'] != 0): ?>
                                        <button class="btn btn-primary" style="color: white;">Send</button>
                                    <?php else: ?>
                                        <button class="btn btn-primary" style="color: white;" disabled>Send</button>
                                    <?php endif; ?>
                                </form>
                            </div>
                            <div class="card-footer">
                                <a href="<?php echo e(route('chat-with-seller')); ?>" class="btn btn-primary">
                                    <?php echo e(trans('messages.go_to')); ?> <?php echo e(trans('messages.chatbox')); ?>

                                </a>
                                <button type="button" class="btn btn-secondary pull-right" data-dismiss="modal">Close
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <hr>
        
        <button class="openbtn" onclick="openNav()">
            <div style="margin-bottom: -30%; text-align: left;">☰ <?php echo e(trans('messages.categories')); ?></div>
        </button>

        <div class="row mt-2 mr-0">
            
            <div class="col-lg-3 mt-3 pr-0 mr-0">
                <aside class=" hidden-xs SearchParameters" id="SearchParameters">
                    <!-- Categories Sidebar-->
                    <div class="cz-sidebar rounded-lg box-shadow-lg" id="shop-sidebar">
                        <div class="cz-sidebar-body">
                            <!-- Categories-->
                            <div class="widget widget-categories mb-4 pb-4 border-bottom">
                                <div>
                                    <div style="display: inline">
                                        <h3 class="widget-title"
                                            style="font-weight: 700;display: inline"><?php echo e(trans('messages.categories')); ?></h3>
                                    </div>
                                </div>
                                <div class="divider-role"
                                     style="border: 1px solid whitesmoke; margin-bottom: 14px;  margin-top: 5px;"></div>
                                <div class="accordion mt-n1" id="shop-categories">
                                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="card">
                                            <div class="card-header p-1">
                                                <label class="for-hover-lable" style="cursor: pointer"
                                                       onclick="location.href='<?php echo e(route('shopView',['id'=> $seller_id,'category_id'=>$category['id']])); ?>'" >
                                                    <?php echo e($category['name']); ?>

                                                </label>
                                                <strong class="pull-right for-brand-hover" style="cursor: pointer"
                                                        onclick="$('#collapse-m-<?php echo e($category['id']); ?>').toggle(400)">
                                                    <?php echo e($category->childes->count()>0?'+':''); ?>

                                                </strong>
                                            </div>
                                            <div class="card-body ml-2" id="collapse-m-<?php echo e($category['id']); ?>"
                                                 style="display: none">
                                                <?php $__currentLoopData = $category->childes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $child): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <div class=" for-hover-lable card-header p-1">
                                                        <label style="cursor: pointer"
                                                               onclick="location.href='<?php echo e(route('shopView',['id'=> $seller_id,'category_id'=>$child['id']])); ?>'">
                                                            <?php echo e($child['name']); ?>

                                                        </label>
                                                        <strong class="pull-right" style="cursor: pointer"
                                                                onclick="$('#collapse-m-<?php echo e($child['id']); ?>').toggle(400)">
                                                            <?php echo e($child->childes->count()>0?'+':''); ?>

                                                        </strong>
                                                    </div>
                                                    <div class="card-body ml-2" id="collapse-m-<?php echo e($child['id']); ?>"
                                                         style="display: none">
                                                        <?php $__currentLoopData = $child->childes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ch): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <div class="card-header p-1">
                                                                <label class="for-hover-lable" style="cursor: pointer"
                                                                       onclick="location.href='<?php echo e(route('shopView',['id'=> $seller_id,'category_id'=>$ch['id']])); ?>'">
                                                                    <?php echo e($ch['name']); ?>

                                                                </label>
                                                            </div>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </div>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </div>
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </aside>
            </div>
            
            <div id="mySidepanel" class="sidepanel">
                <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
                <div class="cz-sidebar-body">
                    <div class="widget widget-categories mb-4 pb-4 border-bottom">
                        <div>
                            <div style="display: inline">
                                <h3 class="widget-title"
                                    style="font-weight: 700;display: inline"><?php echo e(trans('messages.categories')); ?></h3>
                            </div>
                        </div>
                        <div class="divider-role"
                             style="border: 1px solid whitesmoke; margin-bottom: 14px;  margin-top: 5px;"></div>
                        <div class="accordion mt-n1" id="shop-categories">
                            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="card">
                                    <div class="card-header p-1">
                                        <label class="for-hover-lable" style="cursor: pointer"
                                               onclick="location.href='<?php echo e(route('shopView',['id'=> $seller_id,'category_id'=>$category['id']])); ?>'" >
                                            <?php echo e($category['name']); ?>

                                        </label>
                                        <strong class="pull-right for-brand-hover" style="cursor: pointer"
                                                onclick="$('#collapse-<?php echo e($category['id']); ?>').toggle(400)">
                                            <?php echo e($category->childes->count()>0?'+':''); ?>

                                        </strong>
                                    </div>
                                    <div class="card-body ml-2" id="collapse-<?php echo e($category['id']); ?>"
                                         style="display: none">
                                        <?php $__currentLoopData = $category->childes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $child): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <div class=" for-hover-lable card-header p-1">
                                                <label style="cursor: pointer"
                                                       onclick="location.href='<?php echo e(route('shopView',['id'=> $seller_id,'category_id'=>$child['id']])); ?>'">
                                                    <?php echo e($child['name']); ?>

                                                </label>
                                                <strong class="pull-right" style="cursor: pointer"
                                                        onclick="$('#collapse-<?php echo e($child['id']); ?>').toggle(400)">
                                                    <?php echo e($child->childes->count()>0?'+':''); ?>

                                                </strong>
                                            </div>
                                            <div class="card-body ml-2" id="collapse-<?php echo e($child['id']); ?>"
                                                 style="display: none">
                                                <?php $__currentLoopData = $child->childes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ch): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <div class="card-header p-1">
                                                        <label class="for-hover-lable" style="cursor: pointer"
                                                               onclick="location.href='<?php echo e(route('shopView',['id'=> $seller_id,'category_id'=>$ch['id']])); ?>'">
                                                            <?php echo e($ch['name']); ?>

                                                        </label>
                                                    </div>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-9 product-div">
                <div class="mt-3">
                    
                </div>
                <!-- Products grid-->
                <div class="row mt-3" id="ajax-products">
                    <?php echo $__env->make('web-views.products._ajax-products',['products'=>$products], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
            
            <!-- Pagination-->
                <div class="row">
                    <div class="col-md-12">
                        <div class="justify-content-center center-block align-content-center">
                            <?php echo $products->links(); ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>
    <script>
        function productSearch(seller_id, category_id) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                }
            });

            $.ajax({
                type: "post",
                url: '<?php echo e(url('/')); ?>/shopView/' + seller_id + '?category_id=' + category_id,

                beforeSend: function () {
                    $('#loading').show();
                },
                success: function (response) {
                    $('#ajax-products').html(response.view);
                },
                complete: function () {
                    $('#loading').hide();
                },
            });
        }
    </script>

    

    <script>
        function openNav() {

            document.getElementById("mySidepanel").style.width = "50%";
        }

        function closeNav() {
            document.getElementById("mySidepanel").style.width = "0";
        }
    </script>

    <script>
        $('#chat-form').on('submit', function (e) {
            e.preventDefault();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                }
            });

            $.ajax({
                type: "post",
                url: '<?php echo e(route('messages_store')); ?>',
                data: $('#chat-form').serialize(),
                success: function (respons) {

                    toastr.success('send successfully', {
                        CloseButton: true,
                        ProgressBar: true
                    });
                    $('#chat-form').trigger('reset');
                }
            });

        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.front-end.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/jj/Desktop/MrZ/WebVision/AdamG/Admin/resources/views/web-views/shop-page.blade.php ENDPATH**/ ?>