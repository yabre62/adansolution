<?php $__env->startSection('title',auth('customer')->user()->f_name.' '.auth('customer')->user()->l_name); ?>

<?php $__env->startPush('css_or_js'); ?>
    <style>
        .headerTitle {
            font-size: 24px;
            font-weight: 600;
            margin-top: 1rem;
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
            margin-top: 0px !important;
            margin-bottom: 0;
            font-size: 15px;
            color: #030303;
        }

        .font-nameA {
            font-weight: 600;
            margin-top: 0px;
            margin-bottom: 7px !important;
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
            border-bottom: 3px solid <?php echo e($web_config['primary_color']); ?>         !important;
            transition: .2s ease-in-out;
        }

        .sidebarL {
            padding: <?php echo e($web_config['primary_color']); ?>;
        }

        .price_sidebar {
            padding: 20px;
        }
        @media (max-width:350px){
            
        .photoHeader {
            border: none!important;
            margin-left:  0.1px !important;
            margin-right:  0.1px !important;
            padding:  0.1px !important;
            
        }
        
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

            .photoHeader {
                border: none;
                margin-left:  2px !important;
                margin-right:  1px !important;
                padding: 13px;
            }
        }
    </style>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <!-- Page Title-->
    <div class="container">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-9 sidebar_heading">
                <h1 class="h3  mb-0 folot-left headerTitle"><?php echo e(trans('messages.profile_Info')); ?></h1>
            </div>
        </div>
    </div>
    <!-- Page Content-->
    <div class="container pb-5 mb-2 mb-md-4 mt-3">
        <div class="row">
            <!-- Sidebar-->
        <?php echo $__env->make('web-views.partials._profile-aside', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <!-- Content  -->
            <section class="col-lg-9 mt-2 col-md-9">
                <div class="card box-shadow-sm mt-2">
                    <div class="card-header">
                        <form class="mt-3" action="<?php echo e(route('user-update')); ?>" method="post"
                              enctype="multipart/form-data">
                            <div class="row photoHeader">
                                <?php echo csrf_field(); ?>
                                <img id="blah"
                                     style=" border-radius: 50px; margin-left: 7px; width: 50px!important;height: 50px!important;"
                                     class="rounded-circle border"
                                     onerror="this.src='<?php echo e(asset('public/assets/front-end/img/image-place-holder.png')); ?>'"
                                     src="<?php echo e(asset('profile')); ?>/<?php echo e($customerDetail['image']); ?>">

                                <div class="col-md-10">
                                    <h5 class="font-name"><?php echo e($customerDetail->f_name. ' '.$customerDetail->l_name); ?></h5>
                                    <label for="files"
                                           style="cursor: pointer; color:<?php echo e($web_config['primary_color']); ?>;"
                                           class="spandHeadO">
                                        <?php echo e(trans('messages.change_your_profile')); ?>

                                    </label>
                                    <span style="color: red;font-size: 10px">( * Image ratio should be 1:1 )</span>
                                    <input id="files" name="image" style="visibility:hidden;" type="file">
                                </div>

                                <div class="card-body ml-3">
                                    <h3 class="font-nameA"><?php echo e(trans('messages.account_information')); ?> </h3>


                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="firstName"><?php echo e(trans('messages.first_name')); ?> </label>
                                            <input type="text" class="form-control" id="f_name" name="f_name"
                                                   value="<?php echo e($customerDetail['f_name']); ?>" required>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="lastName"> <?php echo e(trans('messages.last_name')); ?> </label>
                                            <input type="text" class="form-control" id="l_name" name="l_name"
                                                   value="<?php echo e($customerDetail['l_name']); ?>">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="inputEmail4"><?php echo e(trans('messages.Email')); ?> </label>
                                            <input type="email" class="form-control" type="email" id="account-email"
                                                   value="<?php echo e($customerDetail['email']); ?>" disabled>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="phone"><?php echo e(trans('messages.phone_name')); ?> </label>
                                            <input type="text" class="form-control" type="text" id="phone"
                                                   name="phone"
                                                   value="<?php echo e($customerDetail['phone']); ?>" required>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="si-password"><?php echo e(trans('messages.new_password')); ?></label>
                                            <div class="password-toggle">
                                                <input class="form-control" name="password" type="password"
                                                       id="password"
                                                >
                                                <label class="password-toggle-btn">
                                                    <input class="custom-control-input" type="checkbox" style="display: none">
                                                    <i class="czi-eye password-toggle-indicator"
                                                        onChange="checkPasswordMatch()"></i>
                                                    <span class="sr-only"><?php echo e(trans('messages.Show')); ?> <?php echo e(trans('messages.password')); ?> </span>
                                                </label>
                                            </div>
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label for="newPass"><?php echo e(trans('messages.confirm_password')); ?> </label>
                                            <div class="password-toggle">
                                                <input class="form-control" name="con_password" type="password"
                                                       id="confirm_password">
                                                <div>
                                                    <label class="password-toggle-btn">
                                                        <input class="custom-control-input" type="checkbox" style="display: none">
                                                        <i class="czi-eye password-toggle-indicator"
                                                            onChange="checkPasswordMatch()"></i><span
                                                            class="sr-only"><?php echo e(trans('messages.Show')); ?> <?php echo e(trans('messages.password')); ?> </span>
                                                    </label>
                                                </div>

                                            </div>
                                            <div id='message'></div>
                                        </div>
                                    </div>


                                    <button type="submit"
                                            class="btn btn-primary float-right"><?php echo e(trans('messages.update')); ?> <?php echo e(trans('messages.Informations')); ?>  </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </section>
            
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>
    <script src="<?php echo e(asset('public/assets/front-end')); ?>/vendor/nouislider/distribute/nouislider.min.js"></script>
    <script src="<?php echo e(asset('public/assets/back-end/js/croppie.js')); ?>"></script>
    <script>
        function checkPasswordMatch() {
            var password = $("#password").val();
            var confirmPassword = $("#confirm_password").val();
            $("#message").removeAttr("style");
            $("#message").html("");
            if (confirmPassword == "") {
                $("#message").attr("style", "color:black");
                $("#message").html("Please ReType Password");

            } else if (password == "") {
                $("#message").removeAttr("style");
                $("#message").html("");

            } else if (password != confirmPassword) {
                $("#message").html("Passwords do not match!");
                $("#message").attr("style", "color:red");
            } else if (confirmPassword.length <= 6) {
                $("#message").html("password Must Be 6 Character");
                $("#message").attr("style", "color:red");
            } else {

                $("#message").html("Passwords match.");
                $("#message").attr("style", "color:green");
            }

        }

        $(document).ready(function () {
            $("#confirm_password").keyup(checkPasswordMatch);

        });

        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#blah').attr('src', e.target.result);
                };

                reader.readAsDataURL(input.files[0]); // convert to base64 string
            }
        }

        $("#files").change(function () {
            readURL(this);
        });

    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.front-end.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/jj/Desktop/MrZ/WebVision/AdamG/Admin/resources/views/web-views/users-profile/account-profile.blade.php ENDPATH**/ ?>