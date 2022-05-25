<style>
    .navbar-vertical .nav-link {
        color: #ffffff;
        font-weight: bold;
    }

    .navbar .nav-link:hover {
        color: #f49b01;
    }

    .navbar .active > .nav-link, .navbar .nav-link.active, .navbar .nav-link.show, .navbar .show > .nav-link {
        color: #C6FFC1;
    
    }

    .navbar-vertical .active .nav-indicator-icon, .navbar-vertical .nav-link:hover .nav-indicator-icon, .navbar-vertical .show > .nav-link > .160pxnav-indicator-icon {
        color: #C6FFC1;
    }

    .nav-subtitle {
        display: block;
        color: #fffbdf91;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: .03125rem;
    }

    .side-logo {
        background-color: #000;
    }

    .nav-sub {
        background-color: #f49b01 !important;
    }

    .nav-sub .nav-link:hover{
        color:#000 !important;
    }
</style>

<div id="sidebarMain" class="d-none">
    <aside style="background: #000!important;"
           class="js-navbar-vertical-aside navbar navbar-vertical-aside navbar-vertical navbar-vertical-fixed navbar-expand-xl navbar-bordered  ">
        <div class="navbar-vertical-container">
            <div class="navbar-vertical-footer-offset pb-0">
                <div class="navbar-brand-wrapper justify-content-between side-logo">
                    <!-- Logo -->
                    <?php ($e_commerce_logo=\App\Model\BusinessSetting::where(['type'=>'company_web_logo'])->first()->value); ?>
                    <a class="navbar-brand" href="<?php echo e(route('admin.dashboard.index')); ?>" aria-label="Front">
                        <img style="max-width: 160px"
                             onerror="this.src='<?php echo e(asset('public/assets/back-end/img/white.png')); ?>'"
                             class="navbar-brand-logo-mini for-web-logo"
                             src="<?php echo e(asset("company/$e_commerce_logo")); ?>" alt="Logo">
                    </a>
                    <!-- Navbar Vertical Toggle -->
                    <button type="button"
                            class="js-navbar-vertical-aside-toggle-invoker navbar-vertical-aside-toggle btn btn-icon btn-xs btn-ghost-dark">
                        <i class="tio-clear tio-lg"></i>
                    </button>
                    <!-- End Navbar Vertical Toggle -->
                </div>

                <!-- Content -->
                <div class="navbar-vertical-content mt-2">
                    <ul class="navbar-nav navbar-nav-lg nav-tabs">
                        <!-- Dashboards -->
                        <li class="navbar-vertical-aside-has-menu <?php echo e(Request::is('admin')?'show':''); ?>">
                            <a class="js-navbar-vertical-aside-menu-link nav-link"
                               href="<?php echo e(route('admin.dashboard.index')); ?>">
                                <i class="tio-home-vs-1-outlined nav-icon"></i>
                                <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">
                                    <?php echo e(trans('messages.Dashboard')); ?>

                                </span>
                            </a>
                        </li>
                        <!-- End Dashboards -->

                        <?php if(\App\CPU\Helpers::module_permission_check('order')): ?>
                            <li class="nav-item <?php echo e(Request::is('admin/orders*')?'scroll-here':''); ?>">
                                <small class="nav-subtitle" title=""><?php echo e(trans('messages.order_management')); ?></small>
                                <small class="tio-more-horizontal nav-subtitle-replacer"></small>
                            </li>
                            <!-- Order -->
                            <li class="navbar-vertical-aside-has-menu <?php echo e(Request::is('admin/orders*')?'active':''); ?>">
                                <a class="js-navbar-vertical-aside-menu-link nav-link nav-link-toggle"
                                   href="javascript:">
                                    <i class="tio-shopping-cart-outlined nav-icon"></i>
                                    <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">
                                    Commandes
                                </span>
                                </a>
                                <ul class="js-navbar-vertical-aside-submenu nav nav-sub"
                                    style="display: <?php echo e(Request::is('admin/order*')?'block':'none'); ?>">
                                    <li class="nav-item <?php echo e(Request::is('admin/orders/list/all')?'active':''); ?>">
                                        <a class="nav-link" href="<?php echo e(route('admin.orders.list',['all'])); ?>" title="">
                                            <span class="tio-circle nav-indicator-icon"></span>
                                            <span class="text-truncate">
                                            Tous
                                            <span class="badge badge-info badge-pill ml-1">
                                                <?php echo e(\App\Model\Order::count()); ?>

                                            </span>
                                        </span>
                                        </a>
                                    </li>
                                    <li class="nav-item <?php echo e(Request::is('admin/orders/list/pending')?'active':''); ?>">
                                        <a class="nav-link " href="<?php echo e(route('admin.orders.list',['pending'])); ?>" title="">
                                            <span class="tio-circle nav-indicator-icon"></span>
                                            <span class="text-truncate">
                                            En attente
                                            <span class="badge badge-soft-info badge-pill ml-1">
                                                <?php echo e(\App\Model\Order::where(['order_status'=>'pending'])->count()); ?>

                                            </span>
                                        </span>
                                        </a>
                                    </li>
                                    <li class="nav-item <?php echo e(Request::is('admin/orders/list/confirmed')?'active':''); ?>">
                                        <a class="nav-link " href="<?php echo e(route('admin.orders.list',['confirmed'])); ?>"
                                           title="">
                                            <span class="tio-circle nav-indicator-icon"></span>
                                            <span class="text-truncate">
                                            Confirmé
                                                <span class="badge badge-soft-success badge-pill ml-1">
                                                <?php echo e(\App\Model\Order::where(['order_status'=>'confirmed'])->count()); ?>

                                            </span>
                                        </span>
                                        </a>
                                    </li>
                                    <li class="nav-item <?php echo e(Request::is('admin/orders/list/processing')?'active':''); ?>">
                                        <a class="nav-link " href="<?php echo e(route('admin.orders.list',['processing'])); ?>"
                                           title="">
                                            <span class="tio-circle nav-indicator-icon"></span>
                                            <span class="text-truncate">
                                            <?php echo e(trans('messages.Processing')); ?>

                                                <span class="badge badge-warning badge-pill ml-1">
                                                <?php echo e(\App\Model\Order::where(['order_status'=>'processing'])->count()); ?>

                                            </span>
                                        </span>
                                        </a>
                                    </li>
                                    <li class="nav-item <?php echo e(Request::is('admin/orders/list/out_for_delivery')?'active':''); ?>">
                                        <a class="nav-link " href="<?php echo e(route('admin.orders.list',['out_for_delivery'])); ?>"
                                           title="">
                                            <span class="tio-circle nav-indicator-icon"></span>
                                            <span class="text-truncate">
                                            <?php echo e(trans('messages.out_for_delivery')); ?>

                                                <span class="badge badge-warning badge-pill ml-1">
                                                <?php echo e(\App\Model\Order::where(['order_status'=>'out_for_delivery'])->count()); ?>

                                            </span>
                                        </span>
                                        </a>
                                    </li>
                                    <li class="nav-item <?php echo e(Request::is('admin/orders/list/delivered')?'active':''); ?>">
                                        <a class="nav-link " href="<?php echo e(route('admin.orders.list',['delivered'])); ?>"
                                           title="">
                                            <span class="tio-circle nav-indicator-icon"></span>
                                            <span class="text-truncate">
                                            Livré
                                                <span class="badge badge-success badge-pill ml-1">
                                                <?php echo e(\App\Model\Order::where(['order_status'=>'delivered'])->count()); ?>

                                            </span>
                                        </span>
                                        </a>
                                    </li>
                                    <li class="nav-item <?php echo e(Request::is('admin/orders/list/returned')?'active':''); ?>">
                                        <a class="nav-link " href="<?php echo e(route('admin.orders.list',['returned'])); ?>"
                                           title="">
                                            <span class="tio-circle nav-indicator-icon"></span>
                                            <span class="text-truncate">
                                            <?php echo e(trans('messages.returned')); ?>

                                                <span class="badge badge-soft-danger badge-pill ml-1">
                                                <?php echo e(\App\Model\Order::where(['order_status'=>'returned'])->count()); ?>

                                            </span>
                                        </span>
                                        </a>
                                    </li>
                                    <li class="nav-item <?php echo e(Request::is('admin/orders/list/failed')?'active':''); ?>">
                                        <a class="nav-link " href="<?php echo e(route('admin.orders.list',['failed'])); ?>" title="">
                                            <span class="tio-circle nav-indicator-icon"></span>
                                            <span class="text-truncate">
                                            <?php echo e(trans('messages.failed')); ?>

                                            <span class="badge badge-danger badge-pill ml-1">
                                                <?php echo e(\App\Model\Order::where(['order_status'=>'failed'])->count()); ?>

                                            </span>
                                        </span>
                                        </a>
                                    </li>

                                    <li class="nav-item <?php echo e(Request::is('admin/orders/list/canceled')?'active':''); ?>">
                                        <a class="nav-link " href="<?php echo e(route('admin.orders.list',['canceled'])); ?>"
                                           title="">
                                            <span class="tio-circle nav-indicator-icon"></span>
                                            <span class="text-truncate">
                                            Annulé
                                                <span class="badge badge-soft-dark badge-pill ml-1">
                                                <?php echo e(\App\Model\Order::where(['order_status'=>'canceled'])->count()); ?>

                                            </span>
                                        </span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        <?php endif; ?>
                    <!--order management ends-->

                        <?php if(\App\CPU\Helpers::module_permission_check('product_management')): ?>
                            <li class="nav-item <?php echo e((Request::is('admin/brand*') || Request::is('admin/category*') || Request::is('admin/sub*') || Request::is('admin/attribute*') || Request::is('admin/product*'))?'scroll-here':''); ?>">
                                <small class="nav-subtitle" title=""><?php echo e(trans('messages.product_management')); ?></small>
                                <small class="tio-more-horizontal nav-subtitle-replacer"></small>
                            </li>
                            <!-- Pages -->
                            <li class="navbar-vertical-aside-has-menu <?php echo e(Request::is('admin/brand*')?'active':''); ?>">
                                <a class="js-navbar-vertical-aside-menu-link nav-link nav-link-toggle"
                                   href="javascript:">
                                    <i class="tio-apple-outlined nav-icon"></i>
                                    <span
                                        class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate"><?php echo e(trans('messages.brands')); ?></span>
                                </a>
                                <ul class="js-navbar-vertical-aside-submenu nav nav-sub"
                                    style="display: <?php echo e(Request::is('admin/brand*')?'block':'none'); ?>">
                                    <li class="nav-item <?php echo e(Request::is('admin/brand/add-new')?'active':''); ?>">
                                        <a class="nav-link " href="<?php echo e(route('admin.brand.add-new')); ?>">
                                            <span class="tio-circle nav-indicator-icon"></span>
                                            <span class="text-truncate"><?php echo e(trans('messages.add_new')); ?></span>
                                        </a>
                                    </li>
                                    <li class="nav-item <?php echo e(Request::is('admin/brand/list')?'active':''); ?>">
                                        <a class="nav-link " href="<?php echo e(route('admin.brand.list')); ?>">
                                            <span class="tio-circle nav-indicator-icon"></span>
                                            <span class="text-truncate"><?php echo e(trans('messages.List')); ?></span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="navbar-vertical-aside-has-menu <?php echo e((Request::is('admin/category*') ||Request::is('admin/sub*')) ?'active':''); ?>">
                                <a class="js-navbar-vertical-aside-menu-link nav-link nav-link-toggle"
                                   href="javascript:">
                                    <i class="tio-filter-list nav-icon"></i>
                                    <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">
                                        <?php echo e(trans('messages.categories')); ?>

                                    </span>
                                </a>
                                <ul class="js-navbar-vertical-aside-submenu nav nav-sub"
                                    style="display: <?php echo e((Request::is('admin/category*') ||Request::is('admin/sub*'))?'block':''); ?>">
                                    <li class="nav-item <?php echo e(Request::is('admin/category/view')?'active':''); ?>">
                                        <a class="nav-link " href="<?php echo e(route('admin.category.view')); ?>">
                                            <span class="tio-circle nav-indicator-icon"></span>
                                            <span class="text-truncate"><?php echo e(trans('messages.category')); ?></span>
                                        </a>

                                    </li>
                                    <li class="nav-item <?php echo e(Request::is('admin/sub-category/view')?'active':''); ?>">
                                        <a class="nav-link " href="<?php echo e(route('admin.sub-category.view')); ?>">
                                            <span class="tio-circle nav-indicator-icon"></span>
                                            <span class="text-truncate"><?php echo e(trans('messages.sub_category')); ?></span>
                                        </a>
                                    </li>
                                    <li class="nav-item <?php echo e(Request::is('admin/sub-sub-category/view')?'active':''); ?>">
                                        <a class="nav-link " href="<?php echo e(route('admin.sub-sub-category.view')); ?>">
                                            <span class="tio-circle nav-indicator-icon"></span>
                                            <span class="text-truncate"><?php echo e(trans('messages.sub_sub_category')); ?></span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="navbar-vertical-aside-has-menu <?php echo e((Request::is('admin/attribute*') || Request::is('admin/product*'))?'active':''); ?>">
                                <a class="js-navbar-vertical-aside-menu-link nav-link nav-link-toggle"
                                   href="javascript:">
                                    <i class="tio-airdrop nav-icon"></i>
                                    <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">
                                        Produits
                                    </span>
                                </a>
                                <ul class="js-navbar-vertical-aside-submenu nav nav-sub"
                                    style="display: <?php echo e((Request::is('admin/attribute*') || Request::is('admin/product*'))?'block':''); ?>">
                                    <li class="nav-item <?php echo e(Request::is('admin/attribute/view')?'active':''); ?>">
                                        <a class="nav-link " href="<?php echo e(route('admin.attribute.view')); ?>">
                                            <span class="tio-circle nav-indicator-icon"></span>
                                            <span class="text-truncate"><?php echo e(trans('messages.Attribute')); ?></span>
                                        </a>
                                    </li>
                                  
                                    <li class="nav-item <?php echo e(Request::is('admin/product/list/seller')?'active':''); ?>">
                                        <a class="nav-link " href="<?php echo e(route('admin.product.list',['seller'])); ?>">
                                            <span class="tio-circle nav-indicator-icon"></span>
                                            <span class="text-truncate">Produits Clients/Prestataires</span>
                                        </a>
                                    </li>


                                </ul>
                            </li>
                        <?php endif; ?>
                    <!--product management ends-->

                        <?php if(\App\CPU\Helpers::module_permission_check('marketing')): ?>
                            <li class="nav-item <?php echo e((Request::is('admin/banner*') || Request::is('admin/coupon*') || Request::is('admin/notification*') || Request::is('admin/deal*'))?'scroll-here':''); ?>">
                                <small class="nav-subtitle" title=""><?php echo e(trans('messages.marketing_section')); ?></small>
                                <small class="tio-more-horizontal nav-subtitle-replacer"></small>
                            </li>
                            <li class="navbar-vertical-aside-has-menu <?php echo e(Request::is('admin/banner*')?'active':''); ?>">
                                <a class="js-navbar-vertical-aside-menu-link nav-link"
                                   href="<?php echo e(route('admin.banner.list')); ?>">
                                    <i class="tio-photo-square-outlined nav-icon"></i>
                                    <span
                                        class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate"><?php echo e(trans('messages.banners')); ?></span>
                                </a>
                            </li>
                            <li class="navbar-vertical-aside-has-menu <?php echo e(Request::is('admin/coupon*')?'active':''); ?>">
                                <a class="js-navbar-vertical-aside-menu-link nav-link"
                                   href="<?php echo e(route('admin.coupon.add-new')); ?>">
                                    <i class="tio-credit-cards nav-icon"></i>
                                    <span
                                        class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate"><?php echo e(trans('messages.coupons')); ?></span>
                                </a>
                            </li>
                            <li class="navbar-vertical-aside-has-menu <?php echo e(Request::is('admin/notification*')?'active':''); ?>">
                                <a class="js-navbar-vertical-aside-menu-link nav-link"
                                   href="<?php echo e(route('admin.notification.add-new')); ?>" title="">
                                    <i class="tio-notifications-on-outlined nav-icon"></i>
                                    <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">
                                        <?php echo e(trans('messages.push_notification')); ?>

                                    </span>
                                </a>
                            </li>
                            <li class="navbar-vertical-aside-has-menu <?php echo e(Request::is('admin/deal/flash')?'active':''); ?>">
                                <a class="js-navbar-vertical-aside-menu-link nav-link"
                                   href="<?php echo e(route('admin.deal.flash')); ?>">
                                    <i class="tio-flash nav-icon"></i>
                                    <span
                                        class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">Flash Promo</span>
                                </a>
                            </li>
                            <li class="navbar-vertical-aside-has-menu <?php echo e(Request::is('admin/deal/day')?'active':''); ?>">
                                <a class="js-navbar-vertical-aside-menu-link nav-link"
                                   href="<?php echo e(route('admin.deal.day')); ?>">
                                    <i class="tio-crown-outlined nav-icon"></i>
                                    <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">
                                        <?php echo e(trans('messages.deal_of_the_day')); ?>

                                    </span>
                                </a>
                            </li>
                            <li class="navbar-vertical-aside-has-menu <?php echo e(Request::is('admin/deal/feature')?'active':''); ?>">
                                <a class="js-navbar-vertical-aside-menu-link nav-link"
                                   href="<?php echo e(route('admin.deal.feature')); ?>">
                                    <i class="tio-flag-outlined nav-icon"></i>
                                    <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">
                                        <?php echo e(trans('messages.featured_deal')); ?>

                                    </span>
                                </a>
                            </li>
                        <?php endif; ?>
                    <!--marketing section ends here-->

                        <?php if(\App\CPU\Helpers::module_permission_check('business_section')): ?>
                            <li class="nav-item <?php echo e((Request::is('admin/report/product-in-wishlist') || Request::is('admin/reviews*') || Request::is('admin/sellers/withdraw_list') || Request::is('admin/report/product-stock'))?'scroll-here':''); ?>">
                                <small class="nav-subtitle" title=""><?php echo e(trans('messages.business_section')); ?></small>
                                <small class="tio-more-horizontal nav-subtitle-replacer"></small>
                            </li>

                            <li class="navbar-vertical-aside-has-menu <?php echo e(Request::is('admin/sellers/withdraw_list')?'active':''); ?>">
                                <a class="js-navbar-vertical-aside-menu-link nav-link"
                                   href="<?php echo e(route('admin.sellers.withdraw_list')); ?>">
                                    <i class="tio-atm-outlined nav-icon"></i>
                                    <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">
                                        <?php echo e(trans('messages.seller_withdraws')); ?>

                                    </span>
                                </a>
                            </li>
                            <li class="navbar-vertical-aside-has-menu <?php echo e(Request::is('admin/report/product-stock')?'active':''); ?>">
                                <a class="js-navbar-vertical-aside-menu-link nav-link"
                                   href="<?php echo e(route('admin.report.product-stock')); ?>">
                                    <i class="tio-fullscreen-1-1 nav-icon"></i>
                                    <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">
                                 Produits <?php echo e(trans('messages.stock')); ?>

                                </span>
                                </a>
                            </li>
                            <li class="navbar-vertical-aside-has-menu <?php echo e(Request::is('admin/reviews*')?'active':''); ?>">
                                <a class="js-navbar-vertical-aside-menu-link nav-link"
                                   href="<?php echo e(route('admin.reviews.list')); ?>">
                                    <i class="tio-star nav-icon"></i>
                                    <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">
                                    Clients <?php echo e(trans('messages.Reviews')); ?>

                                </span>
                                </a>
                            </li>
                            <li class="navbar-vertical-aside-has-menu <?php echo e(Request::is('admin/report/product-in-wishlist')?'active':''); ?>">
                                <a class="js-navbar-vertical-aside-menu-link nav-link"
                                   href="<?php echo e(route('admin.report.product-in-wishlist')); ?>">
                                    <i class="tio-heart-outlined nav-icon"></i>
                                    <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">
                                 <?php echo e(trans('messages.product')); ?> <?php echo e(trans('messages.in')); ?>  <?php echo e(trans('messages.wish_list')); ?>

                                </span>
                                </a>
                            </li>
                        <?php endif; ?>
                    <!--business section ends here-->

                        <?php if(\App\CPU\Helpers::module_permission_check('user_section')): ?>
                            <li class="nav-item <?php echo e((Request::is('admin/customer/list') || Request::is('admin/sellers/seller-list'))?'scroll-here':''); ?>">
                                <small class="nav-subtitle" title=""><?php echo e(trans('messages.user_section')); ?></small>
                                <small class="tio-more-horizontal nav-subtitle-replacer"></small>
                            </li>

                            <li class="navbar-vertical-aside-has-menu <?php echo e(Request::is('admin/sellers/seller-list')?'active':''); ?>">
                                <a class="js-navbar-vertical-aside-menu-link nav-link"
                                   href="<?php echo e(route('admin.sellers.seller-list')); ?>">
                                    <i class="tio-users-switch nav-icon"></i>
                                    <span
                                        class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate text-capitalize">
                                        Commerçants/Prestataires
                                    </span>
                                </a>
                            </li>
                            <li class="nav-item <?php echo e(Request::is('admin/customer/list')?'active':''); ?>">
                                <a class="nav-link " href="<?php echo e(route('admin.customer.list')); ?>">
                                    <span class="tio-poi-user nav-icon"></span>
                                    <span
                                        class="text-truncate"> Les Clients</span>
                                </a>
                            </li>
                        <?php endif; ?>
                    <!--user section ends here-->

                        <?php if(\App\CPU\Helpers::module_permission_check('support_section')): ?>
                            <li class="nav-item <?php echo e((Request::is('admin/support-ticket*') || Request::is('admin/contact*'))?'scroll-here':''); ?>">
                                <small class="nav-subtitle" title=""><?php echo e(trans('messages.support_section')); ?></small>
                                <small class="tio-more-horizontal nav-subtitle-replacer"></small>
                            </li>

                            <li class="navbar-vertical-aside-has-menu <?php echo e(Request::is('admin/contact*')?'active':''); ?>">
                                <a class="js-navbar-vertical-aside-menu-link nav-link"
                                   href="<?php echo e(route('admin.contact.list')); ?>">
                                    <i class="tio-messages nav-icon"></i>
                                    <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">
                                    <?php echo e(trans('messages.messages')); ?>

                                </span>
                                </a>
                            </li>
                            <li class="navbar-vertical-aside-has-menu <?php echo e(Request::is('admin/support-ticket*')?'active':''); ?>">
                                <a class="js-navbar-vertical-aside-menu-link nav-link"
                                   href="<?php echo e(route('admin.support-ticket.view')); ?>">
                                    <i class="tio-chat nav-icon"></i>
                                    <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">
                                    Demandes /Plaintes clients
                                </span>
                                </a>
                            </li>
                        <?php endif; ?>
                    <!--support section ends here-->

                        <?php if(\App\CPU\Helpers::module_permission_check('business_settings')): ?>
                          
                            <li class="navbar-vertical-aside-has-menu <?php echo e(Request::is('admin/business-settings/payment-method')?'active':''); ?>">
                                <a class="js-navbar-vertical-aside-menu-link nav-link"
                                   href="<?php echo e(route('admin.business-settings.payment-method.index')); ?>">
                                    <i class="tio-money-vs nav-icon"></i>
                                    <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">
                                        Méthodes de Paiements
                                    </span>
                                </a>
                            </li>

                            <li class="navbar-vertical-aside-has-menu <?php echo e(Request::is('admin/business-settings/language*')?'active':''); ?>">
                                <a class="js-navbar-vertical-aside-menu-link nav-link nav-link-toggle"
                                   href="javascript:">
                                    <i class="tio-book-opened nav-icon"></i>
                                    <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">
                                        Langues
                                    </span>
                                </a>
                                <ul class="js-navbar-vertical-aside-submenu nav nav-sub"
                                    style="display: <?php echo e(Request::is('admin/business-settings/language*')?'block':'none'); ?>">
                                    <li class="nav-item <?php echo e(Request::is('admin/business-settings/language-app')?'active':''); ?>">
                                        <a class="nav-link"
                                           href="<?php echo e(route('admin.business-settings.language.index-app')); ?>">
                                            <span class="tio-circle nav-indicator-icon"></span>
                                            <span class="text-truncate">
                                              <?php echo e(trans('messages.for_data_entry')); ?>

                                            </span>
                                        </a>
                                    </li>
                                    <li class="nav-item <?php echo e(Request::is('admin/business-settings/language')?'active':''); ?>">
                                        <a class="nav-link"
                                           href="<?php echo e(route('admin.business-settings.language.index')); ?>">
                                            <span class="tio-circle nav-indicator-icon"></span>
                                            <span class="text-truncate">
                                               <?php echo e(trans('messages.for_website')); ?>

                                            </span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="navbar-vertical-aside-has-menu <?php echo e(Request::is('admin/currency/view')?'active':''); ?>">
                                <a class="js-navbar-vertical-aside-menu-link nav-link"
                                   href="<?php echo e(route('admin.currency.view')); ?>">
                                    <i class="tio-dollar-outlined nav-icon"></i>
                                    <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">
                                        Dévise / Monnaie
                                    </span>
                                </a>
                            </li>
                        <?php endif; ?>
                    <!--business settings ends here-->

                        <?php if(\App\CPU\Helpers::module_permission_check('web_&_app_settings')): ?>
                            <li class="nav-item <?php echo e((Request::is('admin/business-settings/social-media') || Request::is('admin/business-settings/terms-condition') || Request::is('admin/business-settings/privacy-policy') || Request::is('admin/business-settings/about-us') || Request::is('admin/helpTopic/list') || Request::is('admin/business-settings/fcm-index') || Request::is('admin/business-settings/mail') || Request::is('admin/business-settings/web-config'))?'scroll-here':''); ?>">
                                <small class="nav-subtitle" title=""><?php echo e(trans('messages.web_&_app_settings')); ?></small>
                                <small class="tio-more-horizontal nav-subtitle-replacer"></small>
                            </li>

                            <li class="navbar-vertical-aside-has-menu <?php echo e(Request::is('admin/business-settings/web-config')?'active':''); ?>">
                                <a class="js-navbar-vertical-aside-menu-link nav-link"
                                   href="<?php echo e(route('admin.business-settings.web-config.index')); ?>">
                                    <i class="tio-globe nav-icon"></i>
                                    <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">
                                        <?php echo e(trans('messages.web_config')); ?>

                                    </span>
                                </a>
                            </li>
                            <li class="navbar-vertical-aside-has-menu <?php echo e(Request::is('admin/business-settings/mail')?'active':''); ?>">
                                <a class="js-navbar-vertical-aside-menu-link nav-link"
                                   href="<?php echo e(route('admin.business-settings.mail.index')); ?>">
                                    <i class="tio-email nav-icon"></i>
                                    <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">
                                        <?php echo e(trans('messages.mail_config')); ?>

                                    </span>
                                </a>
                            </li>
                            <li class="navbar-vertical-aside-has-menu <?php echo e(Request::is('admin/business-settings/fcm-index')?'active':''); ?>">
                                <a class="js-navbar-vertical-aside-menu-link nav-link"
                                   href="<?php echo e(route('admin.business-settings.fcm-index')); ?>">
                                    <i class="tio-notifications-alert nav-icon"></i>
                                    <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">
                                        <?php echo e(trans('messages.notification')); ?>

                                    </span>
                                </a>
                            </li>
                            <li class="navbar-vertical-aside-has-menu <?php echo e(Request::is('admin/business-settings/terms-condition') || Request::is('admin/business-settings/privacy-policy') || Request::is('admin/business-settings/about-us') || Request::is('admin/helpTopic/list')?'active':''); ?>">
                                <a class="js-navbar-vertical-aside-menu-link nav-link nav-link-toggle"
                                   href="javascript:">
                                    <i class="tio-pages-outlined nav-icon"></i>
                                    <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">
                                        Paramètres Pages
                                    </span>
                                </a>
                                <ul class="js-navbar-vertical-aside-submenu nav nav-sub"
                                    style="display: <?php echo e(Request::is('admin/business-settings/terms-condition') || Request::is('admin/business-settings/privacy-policy') || Request::is('admin/business-settings/about-us') || Request::is('admin/helpTopic/list')?'block':'none'); ?>">
                                    <li class="nav-item <?php echo e(Request::is('admin/business-settings/terms-condition')?'active':''); ?>">
                                        <a class="nav-link" href="<?php echo e(route('admin.business-settings.terms-condition')); ?>">
                                            <span class="tio-circle nav-indicator-icon"></span>
                                            <span class="text-truncate">
                                              <?php echo e(trans('messages.terms_and_condition')); ?>

                                            </span>
                                        </a>
                                    </li>
                                    <li class="nav-item <?php echo e(Request::is('admin/business-settings/privacy-policy')?'active':''); ?>">
                                        <a class="nav-link" href="<?php echo e(route('admin.business-settings.privacy-policy')); ?>">
                                            <span class="tio-circle nav-indicator-icon"></span>
                                            <span class="text-truncate">
                                              <?php echo e(trans('messages.privacy_policy')); ?>

                                            </span>
                                        </a>
                                    </li>
                                    <li class="nav-item <?php echo e(Request::is('admin/business-settings/about-us')?'active':''); ?>">
                                        <a class="nav-link" href="<?php echo e(route('admin.business-settings.about-us')); ?>">
                                            <span class="tio-circle nav-indicator-icon"></span>
                                            <span class="text-truncate">
                                              <?php echo e(trans('messages.about_us')); ?>

                                            </span>
                                        </a>
                                    </li>
                                    <li class="nav-item <?php echo e(Request::is('admin/helpTopic/list')?'active':''); ?>">
                                        <a class="nav-link" href="<?php echo e(route('admin.helpTopic.list')); ?>">
                                            <span class="tio-circle nav-indicator-icon"></span>
                                            <span class="text-truncate">
                                              <?php echo e(trans('messages.faq')); ?>

                                            </span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="navbar-vertical-aside-has-menu <?php echo e(Request::is('admin/business-settings/social-media')?'active':''); ?>">
                                <a class="js-navbar-vertical-aside-menu-link nav-link"
                                   href="<?php echo e(route('admin.business-settings.social-media')); ?>">
                                    <i class="tio-twitter nav-icon"></i>
                                    <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">
                                        <?php echo e(trans('messages.social_media')); ?>

                                    </span>
                                </a>
                            </li>
                        <?php endif; ?>
                    <!--web & app settings ends here-->

                        <?php if(\App\CPU\Helpers::module_permission_check('report')): ?>
                            <li class="nav-item <?php echo e((Request::is('admin/report/inhoue-product-sale') || Request::is('admin/report/seller-product-sale') || Request::is('admin/report/order') || Request::is('admin/report/earning'))?'scroll-here':''); ?>">
                                <small class="nav-subtitle" title="">
                                    <?php echo e(trans('messages.Report')); ?>& <?php echo e(trans('messages.Analytics')); ?>

                                </small>
                                <small class="tio-more-horizontal nav-subtitle-replacer"></small>
                            </li>

                            <li class="navbar-vertical-aside-has-menu <?php echo e(Request::is('admin/report/earning')?'active':''); ?>">
                                <a class="js-navbar-vertical-aside-menu-link nav-link"
                                   href="<?php echo e(route('admin.report.earning')); ?>">
                                    <i class="tio-chart-pie-1 nav-icon"></i>
                                    <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">
                                       <?php echo e(trans('messages.Earning')); ?> <?php echo e(trans('messages.Report')); ?>

                                    </span>
                                </a>
                            </li>
                            <li class="navbar-vertical-aside-has-menu <?php echo e(Request::is('admin/report/order')?'active':''); ?>">
                                <a class="js-navbar-vertical-aside-menu-link nav-link"
                                   href="<?php echo e(route('admin.report.order')); ?>">
                                    <i class="tio-chart-bar-1 nav-icon"></i>
                                    <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">
                                     <?php echo e(trans('messages.Report')); ?> <?php echo e(trans('messages.Order')); ?> 
                                    </span>
                                </a>
                            </li>
                            <li class="navbar-vertical-aside-has-menu <?php echo e(Request::is('admin/report/inhoue-product-sale') || Request::is('admin/report/seller-product-sale') ?'active':''); ?>">
                                <a class="js-navbar-vertical-aside-menu-link nav-link nav-link-toggle"
                                   href="javascript:">
                                    <i class="tio-chart-bar-4 nav-icon"></i>
                                    <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">
                                        <?php echo e(trans('messages.sale_report')); ?>

                                    </span>
                                </a>
                                <ul class="js-navbar-vertical-aside-submenu nav nav-sub"
                                    style="display: <?php echo e(Request::is('admin/report/inhoue-product-sale') || Request::is('admin/report/seller-product-sale') ?'block':'none'); ?>">
                                    <li class="nav-item <?php echo e(Request::is('admin/report/inhoue-product-sale')?'active':''); ?>">
                                        <a class="nav-link" href="<?php echo e(route('admin.report.inhoue-product-sale')); ?>">
                                            <span class="tio-circle nav-indicator-icon"></span>
                                            <span class="text-truncate">
                                                <?php echo e(trans('messages.inhouse')); ?> <?php echo e(trans('messages.sale')); ?>

                                            </span>
                                        </a>
                                    </li>
                                    <li class="nav-item <?php echo e(Request::is('admin/report/seller-product-sale')?'active':''); ?>">
                                        <a class="nav-link" href="<?php echo e(route('admin.report.seller-product-sale')); ?>">
                                            <span class="tio-circle nav-indicator-icon"></span>
                                            <span class="text-truncate text-capitalize">
                                                <?php echo e(trans('messages.seller')); ?> <?php echo e(trans('messages.sale')); ?>

                                            </span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        <?php endif; ?>
                    <!--reporting and analysis ends here-->

                        <?php if(\App\CPU\Helpers::module_permission_check('employee_section')): ?>
                            <li class="nav-item <?php echo e((Request::is('admin/employee*') || Request::is('admin/custom-role*'))?'scroll-here':''); ?>">
                                <small class="nav-subtitle"><?php echo e(trans('messages.employee_section')); ?></small>
                                <small class="tio-more-horizontal nav-subtitle-replacer"></small>
                            </li>

                            <li class="navbar-vertical-aside-has-menu <?php echo e(Request::is('admin/custom-role*')?'active':''); ?>">
                                <a class="js-navbar-vertical-aside-menu-link nav-link"
                                   href="<?php echo e(route('admin.custom-role.create')); ?>">
                                    <i class="tio-incognito nav-icon"></i>
                                    <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">
                                            <?php echo e(trans('messages.employee_role')); ?></span>
                                </a>
                            </li>
                            <li class="navbar-vertical-aside-has-menu <?php echo e(Request::is('admin/employee*')?'active':''); ?>">
                                <a class="js-navbar-vertical-aside-menu-link nav-link nav-link-toggle"
                                   href="javascript:">
                                    <i class="tio-user nav-icon"></i>
                                    <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">
                                            <?php echo e(trans('messages.employees')); ?>

                                        </span>
                                </a>
                                <ul class="js-navbar-vertical-aside-submenu nav nav-sub"
                                    style="display: <?php echo e(Request::is('admin/employee*')?'block':'none'); ?>">
                                    <li class="nav-item <?php echo e(Request::is('admin/employee/add-new')?'active':''); ?>">
                                        <a class="nav-link " href="<?php echo e(route('admin.employee.add-new')); ?>">
                                            <span class="tio-circle nav-indicator-icon"></span>
                                            <span class="text-truncate"><?php echo e(trans('messages.add_new')); ?></span>
                                        </a>
                                    </li>
                                    <li class="nav-item <?php echo e(Request::is('admin/employee/list')?'active':''); ?>">
                                        <a class="nav-link" href="<?php echo e(route('admin.employee.list')); ?>">
                                            <span class="tio-circle nav-indicator-icon"></span>
                                            <span class="text-truncate"><?php echo e(trans('messages.List')); ?></span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        <?php endif; ?>

                        <li class="nav-item" style="padding-top: 50px">
                            <div class="nav-divider"></div>
                        </li>
                    </ul>
                </div>
                <!-- End Content -->
            </div>
        </div>
    </aside>
</div>



<?php /**PATH /home/jj/Desktop/MrZ/WebVision/AdamG/Admin/resources/views/layouts/back-end/partials/_side-bar.blade.php ENDPATH**/ ?>