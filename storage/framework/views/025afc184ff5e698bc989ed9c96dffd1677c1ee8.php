<?php $__env->startSection('title','Profile Settings'); ?>

<?php $__env->startPush('css_or_js'); ?>
<link href="<?php echo e(asset('public/assets/back-end/css/croppie.css')); ?>" rel="stylesheet">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <!-- Content -->
    <div class="content container-fluid">
        <!-- Page Header -->
        <div class="page-header">
            <div class="row align-items-end">
                <div class="col-sm mb-2 mb-sm-0">
                    <h1 class="page-header-title"><?php echo e(trans('messages.Settings')); ?></h1>
                </div>

                <div class="col-sm-auto">
                    <a class="btn btn-primary" href="<?php echo e(route('admin.dashboard.index')); ?>">
                        <i class="tio-home mr-1"></i> <?php echo e(trans('messages.Dashboard')); ?>

                    </a>
                </div>
            </div>
            <!-- End Row -->
        </div>
        <!-- End Page Header -->

        <div class="row">
            <div class="col-lg-3">
                <!-- Navbar -->
                <div class="navbar-vertical navbar-expand-lg mb-3 mb-lg-5">
                    <!-- Navbar Toggle -->
                    <button type="button" class="navbar-toggler btn btn-block btn-white mb-3"
                            aria-label="Toggle navigation" aria-expanded="false" aria-controls="navbarVerticalNavMenu"
                            data-toggle="collapse" data-target="#navbarVerticalNavMenu">
                <span class="d-flex justify-content-between align-items-center">
                  <span class="h5 mb-0">Nav menu</span>

                  <span class="navbar-toggle-default">
                    <i class="tio-menu-hamburger"></i>
                  </span>

                  <span class="navbar-toggle-toggled">
                    <i class="tio-clear"></i>
                  </span>
                </span>
                    </button>
                    <!-- End Navbar Toggle -->

                    <div id="navbarVerticalNavMenu" class="collapse navbar-collapse">
                        <!-- Navbar Nav -->
                        <ul id="navbarSettings"
                            class="js-sticky-block js-scrollspy navbar-nav navbar-nav-lg nav-tabs card card-navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link active" href="javascript:" id="generalSection" style="color: black">
                                    <i class="tio-user-outlined nav-icon"></i><?php echo e(trans('messages.Basic')); ?> <?php echo e(trans('messages.information')); ?>

                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="javascript:" id="passwordSection" style="color: black">
                                    <i class="tio-lock-outlined nav-icon"></i> <?php echo e(trans('messages.Password')); ?>

                                </a>
                            </li>
                        </ul>
                        <!-- End Navbar Nav -->
                    </div>
                </div>
                <!-- End Navbar -->
            </div>

            <div class="col-lg-9">
                <form action="<?php echo e(route('admin.profile.update',[$data->id])); ?>" method="post" enctype="multipart/form-data" id="admin-profile-form">
                <?php echo csrf_field(); ?>
                <!-- Card -->
                    <div class="card mb-3 mb-lg-5" id="generalDiv">
                        <!-- Profile Cover -->
                        <div class="profile-cover">
                            <div class="profile-cover-img-wrapper"></div>
                        </div>
                        <!-- End Profile Cover -->

                        <!-- Avatar -->
                        <label
                            class="avatar avatar-xxl avatar-circle avatar-border-lg avatar-uploader profile-cover-avatar"
                            for="avatarUploader">
                            <img id="viewer"
                                 onerror="this.src='<?php echo e(asset('public/assets/back-end/img/160x160/img1.jpg')); ?>'"
                                 class="avatar-img"
                                 src="<?php echo e(asset('admin')); ?>/<?php echo e($data->image); ?>"
                                 alt="Image">
                        </label>
                        <!-- End Avatar -->
                    </div>
                    <!-- End Card -->

                    <!-- Card -->
                    <div class="card mb-3 mb-lg-5">
                        <div class="card-header">
                            <h2 class="card-title h4"><?php echo e(trans('messages.Basic')); ?> <?php echo e(trans('messages.information')); ?></h2>
                        </div>

                        <!-- Body -->
                        <div class="card-body">
                            <!-- Form -->
                            <!-- Form Group -->
                            <div class="row form-group">
                                <label for="firstNameLabel" class="col-sm-3 col-form-label input-label"><?php echo e(trans('messages.name')); ?> <?php echo e(trans('messages.Full')); ?>   <i
                                        class="tio-help-outlined text-body ml-1" data-toggle="tooltip"
                                        data-placement="top"
                                        title="Display name"></i></label>

                                <div class="col-sm-9">
                                    <div class="input-group input-group-sm-down-break">
                                        <input type="text" class="form-control" name="name" id="firstNameLabel"
                                               placeholder="Votre Prénom" aria-label="Your first name"
                                               value="<?php echo e($data->name); ?>">

                                    </div>
                                </div>
                            </div>
                            <!-- End Form Group -->

                            <!-- Form Group -->
                            <div class="row form-group">
                                <label for="phoneLabel" class="col-sm-3 col-form-label input-label"><?php echo e(trans('messages.Phone')); ?> <span
                                        class="input-label-secondary">(Optionnel)</span></label>

                                <div class="col-sm-9">
                                    <input type="text" class="js-masked-input form-control" name="phone" id="phoneLabel"
                                           placeholder="+x(xxx)xxx-xx-xx" aria-label="+(xxx)xx-xxx-xxxxx"
                                           value="<?php echo e($data->phone); ?>"
                                           data-hs-mask-options='{
                                           "template": "+(880)00-000-00000"
                                         }'>
                                </div>
                            </div>
                            <!-- End Form Group -->

                            <div class="row form-group">
                                <label for="newEmailLabel" class="col-sm-3 col-form-label input-label"><?php echo e(trans('messages.Email')); ?></label>

                                <div class="col-sm-9">
                                    <input type="email" class="form-control" name="email" id="newEmailLabel"
                                           value="<?php echo e($data->email); ?>"
                                           placeholder="Nouvelle adresse mail" aria-label="Enter new email address">
                                </div>
                            </div>
                            <div class="row">
                            <div class="col-md-3 col-form-label">
                            </div>
                                <div class="form-group col-md-9" id="select-img">
                                    <span class="badge badge-soft-danger">( ratio 1:1 )</span>
                                    <div class="custom-file">
                                        <input type="file" name="image" id="customFileUpload" class="custom-file-input"
                                            accept=".jpg, .png, .jpeg, .gif, .bmp, .tif, .tiff|image/*">
                                        <label class="custom-file-label" for="customFileUpload"><?php echo e(trans('messages.image')); ?> <?php echo e(trans('messages.Upload')); ?></label>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex justify-content-end">
                                <button type="button" onclick="<?php echo e(env('APP_MODE')!='demo'?"form_alert('admin-profile-form','Want to update admin info ?')":"call_demo()"); ?>" class="btn btn-primary">Enregistrer</button>
                            </div>
                            <!-- End Form -->
                        </div>
                        <!-- End Body -->
                    </div>
                    <!-- End Card -->
                </form>

                <!-- Card -->
                <div id="passwordDiv" class="card mb-3 mb-lg-5">
                    <div class="card-header">
                        <h4 class="card-title"><?php echo e(trans('messages.Change')); ?> <?php echo e(trans('messages.your')); ?> <?php echo e(trans('messages.password')); ?></h4>
                    </div>

                    <!-- Body -->
                    <div class="card-body">
                        <!-- Form -->
                        <form id="changePasswordForm" action="<?php echo e(route('admin.profile.settings-password')); ?>" method="post"
                              enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>

                        <!-- Form Group -->
                            <div class="row form-group">
                                <label for="newPassword" class="col-sm-3 col-form-label input-label"> <?php echo e(trans('messages.New')); ?>

                                    <?php echo e(trans('messages.password')); ?></label>

                                <div class="col-sm-9">
                                    <input type="password" class="js-pwstrength form-control" name="password"
                                           id="newPassword" placeholder="<?php echo e(trans('messages.new_password')); ?>"
                                           aria-label="Enter new password"
                                           data-hs-pwstrength-options='{
                                           "ui": {
                                             "container": "#changePasswordForm",
                                             "viewports": {
                                               "progress": "#passwordStrengthProgress",
                                               "verdict": "#passwordStrengthVerdict"
                                             }
                                           }
                                         }'>

                                    <p id="passwordStrengthVerdict" class="form-text mb-2"></p>

                                    <div id="passwordStrengthProgress"></div>
                                </div>
                            </div>
                            <!-- End Form Group -->

                            <!-- Form Group -->
                            <div class="row form-group">
                                <label for="confirmNewPasswordLabel" class="col-sm-3 col-form-label input-label"> <?php echo e(trans('messages.Confirm')); ?>

                                    <?php echo e(trans('messages.password')); ?> </label>

                                <div class="col-sm-9">
                                    <div class="mb-3">
                                        <input type="password" class="form-control" name="confirm_password"
                                               id="confirmNewPasswordLabel" placeholder="Confirmer le nouveau mot de passe"
                                               aria-label="Confirmation du nouveau mot de passe">
                                    </div>
                                </div>
                            </div>
                            <!-- End Form Group -->

                            <div class="d-flex justify-content-end">
                                <button type="button" onclick="<?php echo e(env('APP_MODE')!='demo'?"form_alert('changePasswordForm','Voulez vous vraiment mettre à jour ?')":"call_demo()"); ?>" class="btn btn-primary"><?php echo e(trans('messages.Save')); ?> <?php echo e(trans('messages.changes')); ?></button>
                            </div>
                        </form>
                        <!-- End Form -->
                    </div>
                    <!-- End Body -->
                </div>
                <!-- End Card -->

                <!-- Sticky Block End Point -->
                <div id="stickyBlockEndPoint"></div>
            </div>
        </div>
        <!-- End Row -->
    </div>
    <!-- End Content -->
       <!--modal-->
       <?php echo $__env->make('shared-partials.image-process._image-crop-modal',['modal_id'=>'profile-image-modal'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script_2'); ?>
    <script>
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#viewer').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#customFileUpload").change(function () {
            readURL(this);
        });
    </script>

    <script>
        $("#generalSection").click(function() {
            $("#passwordSection").removeClass("active");
            $("#generalSection").addClass("active");
            $('html, body').animate({
                scrollTop: $("#generalDiv").offset().top
            }, 2000);
        });

        $("#passwordSection").click(function() {
            $("#generalSection").removeClass("active");
            $("#passwordSection").addClass("active");
            $('html, body').animate({
                scrollTop: $("#passwordDiv").offset().top
            }, 2000);
        });
    </script>
        <!-- Page level plugins -->
        <script src="<?php echo e(asset('public/assets/back-end/js/croppie.js')); ?>"></script>

        <?php echo $__env->make('shared-partials.image-process._script',[
         'id'=>'profile-image-modal',
         'height'=>200,
         'width'=>200,
         'multi_image'=>false,
         'route'=>route('image-upload')
         ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->stopPush(); ?>

<?php $__env->startPush('script'); ?>

<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.back-end.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/jj/Desktop/MrZ/WebVision/AdamG/Admin/resources/views/admin-views/profile/edit.blade.php ENDPATH**/ ?>