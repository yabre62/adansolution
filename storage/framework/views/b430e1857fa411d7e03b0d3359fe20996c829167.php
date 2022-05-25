

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required Meta Tags Always Come First -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Title -->
    <title>Admin | Connexion</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="favicon.ico">

    <!-- Font -->
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&amp;display=swap" rel="stylesheet">
    <!-- CSS Implementing Plugins -->
    <link rel="stylesheet" href="<?php echo e(asset('public/assets/back-end')); ?>/css/vendor.min.css">
    <link rel="stylesheet" href="<?php echo e(asset('public/assets/back-end')); ?>/vendor/icon-set/style.css">
    <!-- CSS Front Template -->
    <link rel="stylesheet" href="<?php echo e(asset('public/assets/back-end')); ?>/css/theme.minc619.css?v=1.0">
    <link rel="stylesheet" href="<?php echo e(asset('public/assets/back-end')); ?>/css/toastr.css">
</head>

<body style="background: #000">
<!-- ========== MAIN CONTENT ========== -->
<main id="content" role="main" class="main">



    <br><br><br><br>
    <!-- Content -->
    <div class="container py-5 py-sm-7">
        <?php ($e_commerce_logo=\App\Model\BusinessSetting::where(['type'=>'company_web_logo'])->first()->value); ?>
      

        <div class="row justify-content-center">
            <div class="col-md-7 col-lg-5">

                <h3 style="text-align: center;color: orange">Admin</h3>  <br><br>
                <!-- Card -->
                <div class="card card-lg mb-5" style="box-shadow: 0 0px 23px rgb(229 111 10);background: #000">
                    <div class="card-body">
                        <!-- Form -->
                        <form class="js-validate" action="<?php echo e(route('admin.auth.login')); ?>" method="post">
                            <?php echo csrf_field(); ?>


                            <a class="d-flex justify-content-center mb-5" href="javascript:">
                                        <img class="z-index-2" src="<?php echo e(asset("company/".$e_commerce_logo)); ?>" alt="Logo"
                                             onerror="this.src='<?php echo e(asset('public/assets/back-end/img/400x400/img2.jpg')); ?>'"
                                             style="width: 8rem;">
                            </a>


                            <!-- Form Group -->
                            <div class="js-form-message form-group">
                                <label class="input-label" style="color: white" for="signinSrEmail"><?php echo e(trans('messages.Email')); ?></label>

                                <input type="email" style="border-radius: 30px;background: #fff" class="form-control form-control-lg" name="email" id="signinSrEmail"
                                       tabindex="1" placeholder="email@address.com" aria-label="email@address.com"
                                       required data-msg="Please enter a valid email address.">
                            </div>
                            <!-- End Form Group -->

                            <!-- Form Group -->
                            <div class="js-form-message form-group">
                                <label style="color: white" class="input-label" for="signupSrPassword" tabindex="0">
                                    <span class="d-flex justify-content-between align-items-center">
                                      Password
                                    </span>
                                </label>

                                <div class="input-group input-group-merge">
                                    <input type="password" style="border-radius: 30px;background: #fff" class="js-toggle-password form-control form-control-lg"
                                           name="password" id="signupSrPassword" placeholder="8+ characters required"
                                           aria-label="8+ characters required" required
                                           data-msg="Your password is invalid. Please try again."
                                           data-hs-toggle-password-options='{
                                                     "target": "#changePassTarget",
                                            "defaultClass": "tio-hidden-outlined",
                                            "showClass": "tio-visible-outlined",
                                            "classChangeTarget": "#changePassIcon"
                                            }'>
                                    <div id="changePassTarget" class="input-group-append">
                                        <a class="input-group-text" href="javascript:">
                                            <i id="changePassIcon" class="tio-visible-outlined"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <!-- End Form Group -->

                            <!-- Checkbox -->
                            <div class="form-group">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="termsCheckbox"
                                           name="remember">
                                    <label class="custom-control-label text-muted" for="termsCheckbox">
                                        <?php echo e(trans('messages.remember_me')); ?>

                                    </label>
                                </div>
                            </div>
                            <!-- End Checkbox -->

                            <button type="submit"  style="background: #ed6400;border-radius: 20px;border: none"  class="btn btn-lg btn-block btn-primary"><?php echo e(trans('messages.login')); ?></button>
                        </form>

                        <!-- End Form -->
                    </div>

                </div>

                <center>
                        <a style="text-align: center;color: orange" href="#" >Back to home</a>
                </center>
                
                <!-- End Card -->
            </div>
        </div>
    </div>
    <!-- End Content -->
</main>
<!-- ========== END MAIN CONTENT ========== -->


<!-- JS Implementing Plugins -->
<script src="<?php echo e(asset('public/assets/back-end')); ?>/js/vendor.min.js"></script>

<!-- JS Front -->
<script src="<?php echo e(asset('public/assets/back-end')); ?>/js/theme.min.js"></script>
<script src="<?php echo e(asset('public/assets/back-end')); ?>/js/toastr.js"></script>
<?php echo Toastr::message(); ?>


<?php if($errors->any()): ?>
    <script>
        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        toastr.error('<?php echo e($error); ?>', Error, {
            CloseButton: true,
            ProgressBar: true
        });
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </script>
<?php endif; ?>

<!-- JS Plugins Init. -->
<script>
    $(document).on('ready', function () {
        // INITIALIZATION OF SHOW PASSWORD
        // =======================================================
        $('.js-toggle-password').each(function () {
            new HSTogglePassword(this).init()
        });

        // INITIALIZATION OF FORM VALIDATION
        // =======================================================
        $('.js-validate').each(function () {
            $.HSCore.components.HSValidation.init($(this));
        });
    });
</script>

<?php if(env('APP_MODE')=='demo'): ?>
    <script>
        function copy_cred() {
            $('#signinSrEmail').val('admin@admin.com');
            $('#signupSrPassword').val('12345678');
            toastr.success('Copied successfully!', 'Success!', {
                CloseButton: true,
                ProgressBar: true
            });
        }
    </script>
<?php endif; ?>

<!-- IE Support -->
<script>
    if (/MSIE \d|Trident.*rv:/.test(navigator.userAgent)) document.write('<script src="<?php echo e(asset('public/assets/admin')); ?>/vendor/babel-polyfill/polyfill.min.js"><\/script>');
</script>
</body>
</html>

<?php /**PATH /home/jj/Desktop/MrZ/WebVision/AdamG/Admin/resources/views/admin-views/auth/login.blade.php ENDPATH**/ ?>