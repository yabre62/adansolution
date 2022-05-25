<style>
    .dropdown-menu {
        min-width: 304px !important;
        margin-left: -8px;
        border-top-left-radius: 0px;
        border-top-right-radius: 0px;
    }

    .card-body.search-result-box {
        overflow: scroll;
        height: 400px;
        overflow-x: hidden;
    }

    .active .seller {
        font-weight: 700;
    }

    .for-count-value {
        position: absolute;

        right: 0.6875rem;;
        width: 1.25rem;
        height: 1.25rem;
        border-radius: 50%;
        color: <?php echo e($web_config['primary_color']); ?>;

        font-size: .75rem;
        font-weight: 500;
        text-align: center;
        line-height: 1.25rem;
    }

    @media (min-width: 992px) {
        .navbar-sticky.navbar-stuck .navbar-stuck-menu.show {
            display: block;
            height: 55px !important;
        }
    }

    @media (min-width: 768px) {
        .navbar-stuck-menu {
            background: <?php echo e($web_config['primary_color']); ?>;
            line-height: 15px;
            padding-bottom: 6px;
        }

    }

    @media (max-width: 767px) {
        .search_button {
            background: transparent !important;
        }

        .search_button .input-group-text i {
            color: <?php echo e($web_config['primary_color']); ?>                       !important;
        }

        .navbar-expand-md .dropdown-menu > .dropdown > .dropdown-toggle {
            position: relative;
            padding-right: 1.95rem;
        }

        .navbar-brand img {

        }

        .mega-nav1 {
            background: white;
            color: <?php echo e($web_config['primary_color']); ?>                       !important;
            border-radius: 3px;
        }

        .mega-nav1 .nav-link {
            color: <?php echo e($web_config['primary_color']); ?>                       !important;
        }
    }

    @media (max-width: 768px) {
        .tab-logo {
            width: 2rem;
        }
    }

    @media (max-width: 360px) {
        .mobile-head {
            padding: 3px;
        }
    }

    @media (max-width: 471px) {
        .navbar-brand img {

        }

        .mega-nav1 {
            background: white;
            color: <?php echo e($web_config['primary_color']); ?>                       !important;
            border-radius: 3px;
        }

        .mega-nav1 .nav-link {
            color: <?php echo e($web_config['primary_color']); ?>                       !important;
        }
    }


</style>

<header class="box-shadow-sm">
    <!-- Topbar-->
    <div class="topbar" style="background: #000000a6;">
        <div class="container ">
            <div>
                <?php
                    $locale = session()->get('locale') ;
                    if ($locale==""){
                        $locale = "en";
                    }
                    \App\CPU\Helpers::currency_load();
                    $currency_code = session('currency_code');
                    $currency_symbol= session('currency_symbol');
                    if ($currency_symbol=="")
                    {
                        $system_default_currency_info = \session('system_default_currency_info');
                        $currency_symbol = $system_default_currency_info->symbol;
                        $currency_code = $system_default_currency_info->code;
                    }
                    $language=\App\CPU\Helpers::language_load();
                    $company_phone =$web_config['phone']->value;
                    $company_name =$web_config['name']->value;
                    $company_web_logo =$web_config['web_logo']->value;
                    $company_mobile_logo =$web_config['mob_logo']->value;
                ?>
                <div class="topbar-text dropdown disable-autohide mr-3 text-capitalize" >
                    <a class="topbar-link dropdown-toggle" href="#" data-toggle="dropdown">
                        <?php $__currentLoopData = json_decode($language['value'],true); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($data['code']==$locale): ?>
                                <img class="mr-2" width="20"
                                     src="<?php echo e(asset('public/assets/front-end')); ?>/img/flags/<?php echo e($data['code']); ?>.png"
                                     alt="Eng">
                                <?php echo e($data['name']); ?>

                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </a>
                    <ul class="dropdown-menu">
                        <?php $__currentLoopData = json_decode($language['value'],true); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key =>$data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($data['status']==1): ?>
                                <li>
                                    <a class="dropdown-item pb-1" href="<?php echo e(route('lang',[$data['code']])); ?>">
                                        <img class="mr-2" width="20"
                                             src="<?php echo e(asset('public/assets/front-end')); ?>/img/flags/<?php echo e($data['code']); ?>.png"
                                             alt="<?php echo e($data['name']); ?>"/>
                                        <span style="text-transform: uppercase"><?php echo e($data['code']); ?></span>
                                    </a>
                                </li>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>


                <div class="topbar-text dropdown disable-autohide">
                    <a class="topbar-link dropdown-toggle" href="#" data-toggle="dropdown">
                        <span><?php echo e($currency_code); ?> <?php echo e($currency_symbol); ?></span>
                    </a>
                    <ul class="dropdown-menu" style="min-width: 160px!important;">
                        <?php $__currentLoopData = \App\Model\Currency::where('status', 1)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $currency): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li style="cursor: pointer" class="dropdown-item"
                                onclick="currency_change('<?php echo e($currency['code']); ?>')">
                                <?php echo e($currency->name); ?>

                            </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
            </div>
            <div class="topbar-text dropdown d-md-none ml-auto">
                <a class="topbar-link" href="tel: <?php echo e($company_phone); ?>">
                    <i class="fa fa-phone"></i> <?php echo e($company_phone); ?>

                </a>
            </div>
            <div class="d-none d-md-block ml-3 text-nowrap">
                <a class="topbar-link d-none d-md-inline-block" href="tel:<?php echo e($company_phone); ?>">
                    <i class="fa fa-phone"></i> <?php echo e($company_phone); ?>

                </a>
            </div>
        </div>
    </div>
    <!-- Remove "navbar-sticky" class to make navigation bar scrollable with the page.-->
    <div class="navbar-sticky bg-light mobile-head" >
        <div class="navbar navbar-expand-md navbar-white" >
            <div class="container ">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <a class="navbar-brand d-none d-sm-block mr-3 flex-shrink-0 tab-logo" href="<?php echo e(route('home')); ?>"
                   style="min-width: 7rem;">
                    <img style="width: 160px!important;"
                         src="<?php echo e(asset("company/$company_web_logo")); ?>"
                         onerror="this.src='<?php echo e(asset('public/assets/front-end/img/image-place-holder.png')); ?>'"
                         alt="<?php echo e($company_name); ?>"/>
                </a>
                <a class="navbar-brand d-sm-none mr-2" href="<?php echo e(route('home')); ?>">
                    <img width="100" height="60" style="height: 60px!important;"
                         src="<?php echo e(asset("company/$company_mobile_logo")); ?>"
                         onerror="this.src='<?php echo e(asset('public/assets/front-end/img/image-place-holder.png')); ?>'"
                         alt="<?php echo e($company_name); ?>"/>
                </a>
                <!-- Search-->
                <div class="input-group-overlay d-none d-md-block mx-4">
                    <form action="<?php echo e(route('products')); ?>" type="submit" class="search_form">
                        <input class="form-control appended-form-control search-bar-input" type="text"
                               autocomplete="off"
                               placeholder="<?php echo e(trans('messages.search')); ?>"
                               name="name">
                        <input name="data_from" value="search" hidden>
                        <input name="page" value="1" hidden>
                        <button class="input-group-append-overlay search_button" type="submit"
                                style="border-radius: 0px 7px 7px 0px;">
                            <span class="input-group-text" style="font-size: 20px;">
                                <i class="czi-search text-white"></i>
                            </span>
                        </button>
                        <diV class="card search-card"
                             style="position: absolute;background: white;z-index: 999;width: 100%;display: none">
                            <div class="card-body search-result-box"
                                 style="overflow:scroll; height:400px;overflow-x: hidden"></div>
                        </diV>
                    </form>
                </div>
                <!-- Toolbar-->
                <div class="navbar-toolbar d-flex flex-shrink-0 align-items-center">
                    <a class="navbar-tool navbar-stuck-toggler" href="#">
                        <span class="navbar-tool-tooltip">Expand menu</span>
                        <div class="navbar-tool-icon-box">
                            <i class="navbar-tool-icon czi-menu" style="color: white"></i>
                        </div>
                    </a>
                    <div class="navbar-tool dropdown ml-3">
                        <a class="navbar-tool-icon-box bg-secondary dropdown-toggle" href="<?php echo e(route('wishlists')); ?>">
                            <span class="navbar-tool-label">
                                <span
                                    class="countWishlist"><?php echo e(session()->has('wish_list')?count(session('wish_list')):0); ?></span>
                           </span>
                            <i class="navbar-tool-icon czi-heart"></i>
                        </a>
                    </div>
                    <?php if(auth('customer')->check()): ?>
                        <div class="dropdown">
                            <a class="navbar-tool ml-2 mr-2 " type="button" data-toggle="dropdown" aria-haspopup="true"
                               aria-expanded="false">
                                <div class="navbar-tool-icon-box bg-secondary">
                                    <div class="navbar-tool-icon-box bg-secondary">
                                        <img style="width: 40px;height: 40px"
                                             src="<?php echo e(asset('profile/'.auth('customer')->user()->image)); ?>"
                                             onerror="this.src='<?php echo e(asset('public/assets/front-end/img/image-place-holder.png')); ?>'"
                                             class="img-profile rounded-circle">
                                    </div>
                                </div>
                                <div class="navbar-tool-text">
                                    <small> <?php echo e(trans('messages.Hello')); ?> <?php echo e(auth('customer')->user()->f_name); ?></small>
                                    Dashboard
                                </div>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item"
                                   href="<?php echo e(route('account-oder')); ?>"> <?php echo e(trans('messages.my_order')); ?> </a>
                                <a class="dropdown-item"
                                   href="<?php echo e(route('user-account')); ?>"> <?php echo e(trans('messages.my_profile')); ?></a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item"
                                   href="<?php echo e(route('customer.auth.logout')); ?>"><?php echo e(trans('messages.logout')); ?></a>
                            </div>
                        </div>
                    <?php else: ?>
                        <div class="dropdown">
                            <a class="navbar-tool ml-3" type="button" data-toggle="dropdown" aria-haspopup="true"
                               aria-expanded="false">
                                <div class="navbar-tool-icon-box bg-secondary">
                                    <div class="navbar-tool-icon-box bg-secondary">
                                        <i class="navbar-tool-icon czi-user"></i>
                                    </div>
                                </div>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="<?php echo e(route('customer.auth.login')); ?>">
                                    <i class="fa fa-sign-in mr-2"></i> <?php echo e(trans('messages.sing_in')); ?>

                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="<?php echo e(route('customer.auth.register')); ?>">
                                    <i class="fa fa-user-circle mr-2"></i><?php echo e(trans('messages.sing_up')); ?>

                                </a>
                            </div>
                        </div>
                    <?php endif; ?>
                    <div id="cart_items">
                        <?php echo $__env->make('layouts.front-end.partials.cart', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="navbar navbar-expand-md navbar-stuck-menu">
            <div class="container">
                <div class="collapse navbar-collapse" id="navbarCollapse">

                    <!-- Search-->
                    <div class="input-group-overlay d-md-none my-3">
                        <form action="<?php echo e(route('products')); ?>" type="submit" class="search_form">
                            <input class="form-control appended-form-control search-bar-input-mobile" type="text"
                                   autocomplete="off"
                                   placeholder="<?php echo e(trans('messages.search')); ?>" name="name">
                            <input name="data_from" value="search" hidden>
                            <input name="page" value="1" hidden>
                            <button class="input-group-append-overlay search_button" type="submit"
                                    style="border-radius: 0px 7px 7px 0px;">
                            <span class="input-group-text" style="font-size: 20px;">
                                <i class="czi-search text-white"></i>
                            </span>
                            </button>
                            <diV class="card search-card"
                                 style="position: absolute;background:  red;z-index: 999;width: 100%;display: none">
                                <div class="card-body search-result-box" id=""
                                     style="overflow:scroll; height:400px;overflow-x: hidden"></div>
                            </diV>
                        </form>
                    </div>

                    <?php ($categories=\App\CPU\CategoryManager::parents()); ?>
                    <ul class="navbar-nav mega-nav pr-2 mr-2 pl-2 d-none d-xl-block "><!--web-->
                        <li class="nav-item <?php echo e(!request()->is('/')?'dropdown':''); ?>">
                            <a class="nav-link dropdown-toggle pl-0" href="#" data-toggle="dropdown">
                                <i class="czi-menu align-middle mt-n1 mr-2"></i>
                                <span style="margin-left: 40px !important;margin-right: 50px">
                                    <?php echo e(trans('messages.categories')); ?>

                                </span>
                            </a>
                            <?php if(request()->is('/')): ?>
                                <ul class="dropdown-menu"
                                    style="display: block!important;margin-top: 7px; box-shadow: none;min-width: 303px !important;margin-left: 1px!important;padding-bottom: 0px!important;">
                                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if($key<11): ?>
                                            <li class="dropdown">
                                                <a class="dropdown-item <?php if ($category->childes->count() > 0) echo "dropdown-toggle"?> "
                                                   <?php if ($category->childes->count() > 0) echo "data-toggle='dropdown'"?> href="javascript:"
                                                   onclick="location.href='<?php echo e(route('products',['id'=> $category['id'],'data_from'=>'category','page'=>1])); ?>'">
                                                    <img src="<?php echo e(asset("category/$category->icon")); ?>"
                                                         onerror="this.src='<?php echo e(asset('public/assets/front-end/img/image-place-holder.png')); ?>'"
                                                         style="width: 18px; height: 18px; ">
                                                    <span class="pl-3"><?php echo e($category['name']); ?></span>
                                                </a>
                                                <?php if($category->childes->count()>0): ?>
                                                    <ul class="dropdown-menu">
                                                        <?php $__currentLoopData = $category['childes']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subCategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <li class="dropdown">
                                                                <a class="dropdown-item <?php if ($subCategory->childes->count() > 0) echo "dropdown-toggle"?> "
                                                                   <?php if ($subCategory->childes->count() > 0) echo "data-toggle='dropdown'"?> href="javascript:"
                                                                   onclick="location.href='<?php echo e(route('products',['id'=> $subCategory['id'],'data_from'=>'category','page'=>1])); ?>'">
                                                                    <span class="pl-3"><?php echo e($subCategory['name']); ?></span>
                                                                </a>
                                                                <?php if($subCategory->childes->count()>0): ?>
                                                                    <ul class="dropdown-menu">
                                                                        <?php $__currentLoopData = $subCategory['childes']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subSubCategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                            <li>
                                                                                <a class="dropdown-item"
                                                                                   href="<?php echo e(route('products',['id'=> $subSubCategory['id'],'data_from'=>'category','page'=>1])); ?>"><?php echo e($subSubCategory['name']); ?></a>
                                                                            </li>
                                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                    </ul>
                                                                <?php endif; ?>
                                                            </li>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </ul>
                                                <?php endif; ?>
                                            </li>
                                        <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <a class="dropdown-item" href="<?php echo e(route('categories')); ?>" style="left: 29%">
                                        <?php echo e(trans('messages.view_more')); ?>

                                    </a>
                                </ul>
                            <?php else: ?>
                                <ul class="dropdown-menu">
                                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li class="dropdown">
                                            <a class="dropdown-item <?php if ($category->childes->count() > 0) echo "dropdown-toggle"?> "
                                               <?php if ($category->childes->count() > 0) echo "data-toggle='dropdown'"?> href="javascript:"
                                               onclick="location.href='<?php echo e(route('products',['id'=> $category['id'],'data_from'=>'category','page'=>1])); ?>'">
                                                <img src="<?php echo e(asset("category/$category->icon")); ?>"
                                                     onerror="this.src='<?php echo e(asset('public/assets/front-end/img/image-place-holder.png')); ?>'"
                                                     style="width: 18px; height: 18px; ">
                                                <span class="pl-3"><?php echo e($category['name']); ?></span>
                                            </a>
                                            <?php if($category->childes->count()>0): ?>
                                                <ul class="dropdown-menu">
                                                    <?php $__currentLoopData = $category['childes']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subCategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <li class="dropdown">
                                                            <a class="dropdown-item <?php if ($subCategory->childes->count() > 0) echo "dropdown-toggle"?> "
                                                               <?php if ($subCategory->childes->count() > 0) echo "data-toggle='dropdown'"?> href="javascript:"
                                                               onclick="location.href='<?php echo e(route('products',['id'=> $subCategory['id'],'data_from'=>'category','page'=>1])); ?>'">
                                                                <span class="pl-3"><?php echo e($subCategory['name']); ?></span>
                                                            </a>
                                                            <?php if($subCategory->childes->count()>0): ?>
                                                                <ul class="dropdown-menu">
                                                                    <?php $__currentLoopData = $subCategory['childes']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subSubCategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                        <li>
                                                                            <a class="dropdown-item"
                                                                               href="<?php echo e(route('products',['id'=> $subSubCategory['id'],'data_from'=>'category','page'=>1])); ?>"><?php echo e($subSubCategory['name']); ?></a>
                                                                        </li>
                                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                </ul>
                                                            <?php endif; ?>
                                                        </li>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </ul>
                                            <?php endif; ?>
                                        </li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>
                            <?php endif; ?>
                        </li>
                    </ul>

                    <ul class="navbar-nav mega-nav1 pr-2 pl-2 d-block d-xl-none "><!--mobile-->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle pl-0" href="#" data-toggle="dropdown">
                                <i class="czi-menu align-middle mt-n1 mr-2"></i>
                                <span style="margin-left: 20px !important; color:black">Categories</span>
                            </a>
                            <ul class="dropdown-menu">
                                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li class="dropdown">
                                        <a class="dropdown-item <?php if ($category->childes->count() > 0) echo "dropdown-toggle"?> "
                                           <?php if ($category->childes->count() > 0) echo "data-toggle='dropdown'"?> href="<?php echo e(route('products',['id'=> $category['id'],'data_from'=>'category','page'=>1])); ?>">
                                            <img src="<?php echo e(asset("category/$category->icon")); ?>"
                                                 onerror="this.src='<?php echo e(asset('public/assets/front-end/img/image-place-holder.png')); ?>'"
                                                 style="width: 18px; height: 18px; ">
                                            <span class="pl-3"><?php echo e($category['name']); ?></span>
                                        </a>
                                        <?php if($category->childes->count()>0): ?>
                                            <ul class="dropdown-menu">
                                                <?php $__currentLoopData = $category['childes']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subCategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <li class="dropdown">
                                                        <a class="dropdown-item <?php if ($subCategory->childes->count() > 0) echo "dropdown-toggle"?> "
                                                           <?php if ($subCategory->childes->count() > 0) echo "data-toggle='dropdown'"?> href="<?php echo e(route('products',['id'=> $subCategory['id'],'data_from'=>'category','page'=>1])); ?>">
                                                            <span class="pl-3"><?php echo e($subCategory['name']); ?></span>
                                                        </a>
                                                        <?php if($subCategory->childes->count()>0): ?>
                                                            <ul class="dropdown-menu">
                                                                <?php $__currentLoopData = $subCategory['childes']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subSubCategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                    <li>
                                                                        <a class="dropdown-item"
                                                                           href="<?php echo e(route('products',['id'=> $subSubCategory['id'],'data_from'=>'category','page'=>1])); ?>"><?php echo e($subSubCategory['name']); ?></a>
                                                                    </li>
                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                            </ul>
                                                        <?php endif; ?>
                                                    </li>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </ul>
                                        <?php endif; ?>
                                    </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        </li>
                    </ul>
                    <!-- Primary menu-->
                    <ul class="navbar-nav">
                        <li class="nav-item dropdown <?php echo e(request()->is('/')?'active':''); ?>">
                            <a class="nav-link" href="<?php echo e(route('home')); ?>"><?php echo e(trans('messages.Home')); ?></a>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#"
                               data-toggle="dropdown"><?php echo e(trans('messages.brand')); ?></a>
                            <ul class="dropdown-menu scroll-bar">

                                <?php $__currentLoopData = \App\CPU\BrandManager::get_brands(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $brand): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li style="border-bottom: 1px solid #e3e9ef;">
                                        <a class="dropdown-item"
                                           href="<?php echo e(route('products',['id'=> $brand['id'],'data_from'=>'brand','page'=>1])); ?>">
                                            <?php echo e($brand['name']); ?>

                                            <?php if($brand['brand_products_count'] > 0 ): ?>
                                                <span class="for-count-value" style="float: right">( <?php echo e($brand['brand_products_count']); ?> )</span>
                                            <?php endif; ?>
                                        </a>

                                    </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        </li>
                        <?php ($seller_registration=\App\Model\BusinessSetting::where(['type'=>'seller_registration'])->first()->value); ?>
                        <?php if($seller_registration): ?>
                            <li class="nav-item">
                                <div class="dropdown">
                                    <a class="btn "  href="<?php echo e(route('seller.auth.login')); ?>" style="color: white;margin-top: 5px;">
                                        <b> <?php echo e(trans('messages.seller_prest')); ?>  </b>
                                    </a>

                                </div>
                            </li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</header>
<?php /**PATH /home/jj/Desktop/MrZ/WebVision/AdamG/Admin/resources/views/layouts/front-end/partials/_header.blade.php ENDPATH**/ ?>
