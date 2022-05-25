<style>
    .headerTitle {
        font-size: 24px;
        font-weight: 600;
        margin-top: 1rem;
    }

    .sidebar {
        max-width: 20rem;
    }

    .border:hover {
        border: 3px solid<?php echo e($web_config['primary_color']); ?>;
        margin-bottom: 5px;
        margin-top: -6px;
    }

    body {
        font-family: 'Titillium Web', sans-serif
    }

    .footer span {
        font-size: 12px
    }

    .product-qty span {
        font-size: 12px;
        color: #6A6A6A;
    }

    .spanTr {
        color: #FFFFFF;
        font-weight: 600;
        font-size: 13px;

    }

    .spandHead {
        color: #FFFFFF;
        font-weight: 600;
        font-size: 20px;
        margin-left: 25px;
    }

    .spandHeadO {
        color: <?php echo e($web_config['primary_color']); ?>;
        font-weight: 400;
        font-size: 13px;

    }

    .spandHeadO:hover {
        color: <?php echo e($web_config['primary_color']); ?>;
        font-weight: 400;
        font-size: 13px;

    }

    .font-name {
        font-weight: 600;
        margin-top: 1rem;
        margin-bottom: 0;
        font-size: 15px;
        color: #030303;
    }

    .font-nameA {
        font-weight: 600;
        margin-top: 2rem;
        margin-bottom: 0;
        font-size: 17px;
        color: #030303;
    }

    label {
        font-size: 16px;
    }

    .photoHeader {
        border: 1px solid #dae1e7;
        margin-left: 1rem;
        margin-right: 2rem;
        padding: 13px;
    }

    .card-header {
        border-bottom: none;
    }

    .divider-role {
        border-bottom: 1px solid whitesmoke;
    }

    .sidebarL h3:hover + .divider-role {
        border-bottom: 3px solid <?php echo e($web_config['secondary_color']); ?>    !important;
        transition: .2s ease-in-out;
    }

    .price_sidebar {
        padding: 20px;
    }

    @media (max-width: 600px) {
        .sidebar_heading {
            background: <?php echo e($web_config['primary_color']); ?>;
        }

        .sidebar_heading h1 {
            text-align: center;
            color: aliceblue;
            padding-bottom: 17px;
            font-size: 19px;
        }

        .sidebarR {
            padding: 24px;
        }

        .price_sidebar {
            padding: 20px;
        }
    }

</style>

<div class="sidebarR col-lg-3 col-md-3">
    <!--Price Sidebar-->
    <div class="price_sidebar rounded-lg box-shadow-sm" id="shop-sidebar" style="margin-bottom: -10px;">
        <div class="box-shadow-sm">

        </div>
        <div class="pb-0" style="padding-top: 12px;">
            <!-- Filter by price-->
            <div class="sidebarL">
                <h3 class="widget-title btnF" style="font-weight: 700;">
                    <a class="<?php echo e(Request::is('account-oder*') || Request::is('account-order-details*') ? 'active-menu' :''); ?>" href="<?php echo e(route('account-oder')); ?> "><?php echo e(trans('messages.my_order')); ?></a>
                </h3>
                <div class="divider-role"
                     style="border: 1px solid whitesmoke; margin-bottom: 14px;  margin-top: -6px;">
                </div>
            </div>
        </div>

        <div class="pb-0">
            <!-- Filter by price-->
            <div class="sidebarL">
                <h3 class="widget-title btnF " style="font-weight: 700;">
                    <a class="<?php echo e(Request::is('wishlists*')?'active-menu':''); ?>" href="<?php echo e(route('wishlists')); ?>"> <?php echo e(trans('messages.wish_list')); ?>  </a></h3>
                <div class="divider-role"
                     style="border: 1px solid whitesmoke; margin-bottom: 14px;  margin-top: -6px;">
                </div>
            </div>
        </div>

        
        <div class="pb-0">
            <!-- Filter by price-->
            <div class="sidebarL">
                <h3 class="widget-title btnF" style="font-weight: 700;">
                    <a class="<?php echo e(Request::is('chat*')?'active-menu':''); ?>" href="<?php echo e(route('chat-with-seller')); ?>">Chat avec Vendeur/Prestataire</a>
                </h3>
                <div class="divider-role"
                     style="border: 1px solid whitesmoke; margin-bottom: 14px;  margin-top: -6px;">
                </div>
            </div>
        </div>

        <div class="pb-0">
            <!-- Filter by price-->
            <div class=" sidebarL">
                <h3 class="widget-title btnF" style="font-weight: 700;">
                    <a class="<?php echo e(Request::is('user-account*')?'active-menu':''); ?>" href="<?php echo e(route('user-account')); ?>">
                        <?php echo e(trans('messages.profile_info')); ?>

                    </a>
                </h3>
                <div class="divider-role"
                     style="border: 1px solid whitesmoke; margin-bottom: 14px;  margin-top: -6px;">
                </div>
            </div>
        </div>
        <div class="pb-0">
            <!-- Filter by price-->
            <div class=" sidebarL">
                <h3 class="widget-title btnF" style="font-weight: 700;">
                    <a class="<?php echo e(Request::is('account-address*')?'active-menu':''); ?>"
                       href="<?php echo e(route('account-address')); ?>"><?php echo e(trans('messages.address')); ?> </a>
                </h3>
                <div class="divider-role"
                     style="border: 1px solid whitesmoke; margin-bottom: 14px;  margin-top: -6px;">
                </div>
            </div>
        </div>

        
    </div>
</div>


















<?php /**PATH /home/jj/Desktop/MrZ/WebVision/AdamG/Admin/resources/views/web-views/partials/_profile-aside.blade.php ENDPATH**/ ?>