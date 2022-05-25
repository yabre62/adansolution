<?php $__env->startSection('title','Web Config'); ?>

<?php $__env->startPush('css_or_js'); ?>
    <link href="<?php echo e(asset('public/assets/select2/css/select2.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('public/assets/back-end/css/custom.css')); ?>" rel="stylesheet">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <style>
        .switch {
            position: relative;
            display: inline-block;
            width: 48px;
            height: 23px;
        }

        .switch input {
            opacity: 0;
            width: 0;
            height: 0;
        }

        .slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #ccc;
            -webkit-transition: .4s;
            transition: .4s;
        }

        .slider:before {
            position: absolute;
            content: "";
            height: 15px;
            width: 15px;
            left: 4px;
            bottom: 4px;
            background-color: white;
            -webkit-transition: .4s;
            transition: .4s;
        }

        input:checked + .slider {
            background-color: #377dff;
        }

        input:focus + .slider {
            box-shadow: 0 0 1px #377dff;
        }

        input:checked + .slider:before {
            -webkit-transform: translateX(26px);
            -ms-transform: translateX(26px);
            transform: translateX(26px);
        }

        /* Rounded sliders */
        .slider.round {
            border-radius: 34px;
        }

        .slider.round:before {
            border-radius: 50%;
        }

        #banner-image-modal .modal-content {
            width: 1116px !important;
            margin-left: -264px !important;
        }

        @media (max-width: 768px) {
            #banner-image-modal .modal-content {
                width: 698px !important;
                margin-left: -75px !important;
            }


        }

        @media (max-width: 375px) {
            #banner-image-modal .modal-content {
                width: 367px !important;
                margin-left: 0 !important;
            }

        }

        @media (max-width: 500px) {
            #banner-image-modal .modal-content {
                width: 400px !important;
                margin-left: 0 !important;
            }


        }


    </style>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <div class="content container-fluid">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo e(route('admin.dashboard.index')); ?>"><?php echo e(trans('messages.Dashboard')); ?></a>
                </li>
                <li class="breadcrumb-item"
                    aria-current="page"><?php echo e(trans('messages.Website')); ?> <?php echo e(trans('messages.Info')); ?> </li>
            </ol>
        </nav>

        <!-- Page Heading -->

        <div class="modal fade" id="companyName" role="dialog" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel"><?php echo e(trans('messages.rename_your_website')); ?></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="<?php echo e(route('admin.business-settings.web-config.company-update')); ?>" method="post">
                            <?php echo csrf_field(); ?>
                            <div class="form-group mb-2">
                                <label class="control-label"><?php echo e(trans('messages.name')); ?></label>
                            </div>
                            <div class="form-group mb-2 mt-2">
                                <input class="form-control" type="text" name="company_name"
                                       value="<?php echo e($company_name->value); ?>">
                            </div>
                            <button type="submit"
                                    class="btn btn-primary float-right"><?php echo e(trans('messages.Update')); ?></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="companyEmail" role="dialog" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title"
                            id="exampleModalLabel"><?php echo e(trans('messages.rename_company')); ?> <?php echo e(trans('messages.Email')); ?></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="<?php echo e(route('admin.business-settings.web-config.company-email-update')); ?>"
                              method="post">
                            <?php echo csrf_field(); ?>
                            <div class="form-group mb-2">
                                <label class="control-label"><?php echo e(trans('messages.name')); ?></label>
                            </div>
                            <div class="form-group mb-2 mt-2">
                                <input class="form-control" type="text" name="company_email"
                                       value="<?php echo e($company_email->value); ?>">
                            </div>
                            <button type="submit"
                                    class="btn btn-primary float-right"><?php echo e(trans('messages.Update')); ?></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="companyPhone" role="dialog" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title"
                            id="exampleModalLabel"><?php echo e(trans('messages.rename_company')); ?>  <?php echo e(trans('messages.Phone')); ?> </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="<?php echo e(route('admin.business-settings.web-config.company-phone-update')); ?>"
                              method="post">
                            <?php echo csrf_field(); ?>
                            <div class="form-group mb-2">
                                <label class="control-label"><?php echo e(trans('messages.name')); ?></label>
                            </div>
                            <div class="form-group mb-2 mt-2">
                                <input class="form-control" type="text" name="company_phone"
                                       value="<?php echo e($company_phone->value); ?>">
                            </div>
                            <button type="submit"
                                    class="btn btn-primary float-right"><?php echo e(trans('messages.Update')); ?></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="row" style="padding-bottom: 20px;">
            <div class="col-md-12 mb-3 mt-3">
                <div class="card">
                    <div class="card-body" style="padding-bottom: 12px">
                        <div class="row">
                            <?php ($config=\App\CPU\Helpers::get_business_settings('maintenance_mode')); ?>
                            <div class="col-6">
                                <h5>
                                    <i class="tio-settings-outlined"></i>
                                    <?php echo e(__('messages.maintenance_mode')); ?>

                                </h5>
                            </div>
                            <div class="col-6">
                                <label class="switch ml-3 float-right">
                                    <input type="checkbox" class="status" onclick="maintenance_mode()"
                                        <?php echo e(isset($config) && $config?'checked':''); ?>>
                                    <span class="slider round"></span>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-4">
                <div class="card">
                    <div class="card-header">
                        <h5 class="text-center"><i class="tio-money"></i> Currency Symbol Position</h5>
                        <i class="tio-dollar"></i>
                    </div>
                    <div class="card-body">
                        <?php ($config=\App\CPU\Helpers::get_business_settings('currency_symbol_position')); ?>
                        <div class="form-row">
                            <div class="col-sm mb-2 mb-sm-0">
                                <!-- Custom Radio -->
                                <div class="form-control">
                                    <div class="custom-control custom-radio custom-radio-reverse"
                                         onclick="currency_symbol_position('<?php echo e(route('admin.business-settings.web-config.currency-symbol-position',['left'])); ?>')">
                                        <input type="radio" class="custom-control-input"
                                               name="projectViewNewProjectTypeRadio"
                                               id="projectViewNewProjectTypeRadio1" <?php echo e((isset($config) && $config=='left')?'checked':''); ?>>
                                        <label class="custom-control-label media align-items-center"
                                               for="projectViewNewProjectTypeRadio1">
                                            <i class="tio-agenda-view-outlined text-muted mr-2"></i>
                                            <span class="media-body">
                                               <?php echo e(\App\CPU\BackEndHelper::currency_symbol()); ?> Left
                                              </span>
                                        </label>
                                    </div>
                                </div>
                                <!-- End Custom Radio -->
                            </div>

                            <div class="col-sm mb-2 mb-sm-0">
                                <!-- Custom Radio -->
                                <div class="form-control">
                                    <div class="custom-control custom-radio custom-radio-reverse"
                                         onclick="currency_symbol_position('<?php echo e(route('admin.business-settings.web-config.currency-symbol-position',['right'])); ?>')">
                                        <input type="radio" class="custom-control-input"
                                               name="projectViewNewProjectTypeRadio"
                                               id="projectViewNewProjectTypeRadio2" <?php echo e((isset($config) && $config=='right')?'checked':''); ?>>
                                        <label class="custom-control-label media align-items-center"
                                               for="projectViewNewProjectTypeRadio2">
                                            <i class="tio-table text-muted mr-2"></i>
                                            <span class="media-body">
                                        Right <?php echo e(\App\CPU\BackEndHelper::currency_symbol()); ?>

                                      </span>
                                        </label>
                                    </div>
                                </div>
                                <!-- End Custom Radio -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <h5 class="text-center"><?php echo e(trans('messages.apple_store')); ?> <?php echo e(trans('messages.Status')); ?></h5>
                    </div>
                    <div class="card-body" style="padding: 20px">

                        <?php ($config=\App\CPU\Helpers::get_business_settings('download_app_apple_stroe')); ?>
                        <form
                            action="<?php echo e(route('admin.business-settings.web-config.app-store-update',['download_app_apple_stroe'])); ?>"
                            method="post">
                            <?php echo csrf_field(); ?>
                            <?php if(isset($config)): ?>

                                <div class="form-group mb-2 mt-2">
                                    <input type="radio" name="status" value="1" <?php echo e($config['status']==1?'checked':''); ?>>
                                    <label style="padding-left: 10px"><?php echo e(trans('messages.Active')); ?></label>
                                    <br>
                                </div>

                                <div class="form-group mb-2">
                                    <input type="radio" name="status" value="0" <?php echo e($config['status']==0?'checked':''); ?>>
                                    <label style="padding-left: 10px"><?php echo e(trans('messages.Inactive')); ?></label>
                                    <br>
                                </div>
                                <div class="form-group mb-2">
                                    <label style="padding-left: 10px"><?php echo e(trans('messages.link')); ?></label><br>
                                    <input type="text" class="form-control" name="link" value="<?php echo e($config['link']); ?>"
                                           required>
                                </div>

                                <button type="submit" class="btn btn-primary mb-2"><?php echo e(trans('messages.Save')); ?></button>
                            <?php else: ?>
                                <button type="submit"
                                        class="btn btn-primary mb-2"><?php echo e(trans('messages.Configure')); ?></button>
                            <?php endif; ?>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <h5 class="text-center"><?php echo e(trans('messages.google_play_store')); ?> <?php echo e(trans('messages.Status')); ?></h5>
                    </div>
                    <div class="card-body" style="padding: 20px">

                        <?php ($config=\App\CPU\Helpers::get_business_settings('download_app_google_stroe')); ?>
                        <form
                            action="<?php echo e(route('admin.business-settings.web-config.app-store-update',['download_app_google_stroe'])); ?>"
                            method="post">
                            <?php echo csrf_field(); ?>
                            <?php if(isset($config)): ?>

                                <div class="form-group mb-2 mt-2">
                                    <input type="radio" name="status" value="1" <?php echo e($config['status']==1?'checked':''); ?>>
                                    <label style="padding-left: 10px"><?php echo e(trans('messages.Active')); ?></label>
                                    <br>
                                </div>
                                <div class="form-group mb-2">
                                    <input type="radio" name="status" value="0" <?php echo e($config['status']==0?'checked':''); ?>>
                                    <label style="padding-left: 10px"><?php echo e(trans('messages.Inactive')); ?></label>
                                    <br>
                                </div>
                                <div class="form-group mb-2">
                                    <label style="padding-left: 10px"><?php echo e(trans('messages.link')); ?></label><br>
                                    <input type="text" class="form-control" name="link" value="<?php echo e($config['link']); ?>"
                                           required>
                                </div>

                                <button type="submit" class="btn btn-primary mb-2"><?php echo e(trans('messages.Save')); ?></button>
                            <?php else: ?>
                                <button type="submit"
                                        class="btn btn-primary mb-2"><?php echo e(trans('messages.Configure')); ?></button>
                            <?php endif; ?>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-md-12 mt-3">
                <div class="card">
                    <div class="card-header">
                        <h5> <i class="tio-shop"></i> Admin Shop Banner <small style="color: red">Ratio ( 6:1 )</small></h5>
                        <i class="tio-panorama-image"></i>
                    </div>
                    <div class="card-body" style="padding: 20px">
                        <center>
                            <img height="200" style="width: 100%" id="viewerML"
                                 onerror="this.src='<?php echo e(asset('public/assets/front-end/img/image-place-holder.png')); ?>'"
                                 src="<?php echo e(asset('shop')); ?>/<?php echo e(\App\CPU\Helpers::get_business_settings('shop_banner')); ?>">
                        </center>
                        <hr>
                        <form action="<?php echo e(route('admin.business-settings.web-config.shop-banner')); ?>"
                              method="post" enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>
                            <div class="row pl-4 pr-4">
                                <div class=" col-9">
                                    <input type="file" name="image" id="customFileUploadML" class="custom-file-input"
                                           accept=".jpg, .png, .jpeg, .gif, .bmp, .tif, .tiff|image/*">
                                    <label class="custom-file-label" for="customFileUploadML">
                                        <?php echo e(trans('messages.choose')); ?> <?php echo e(trans('messages.file')); ?>

                                    </label>
                                </div>
                                <div class="col-3">
                                    <button type="submit" class="btn btn-primary btn-block ml-3"><?php echo e(trans('messages.Save')); ?></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="row" style="padding-bottom: 20px">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body" style="padding: 20px">
                        <h5><?php echo e(trans('messages.name')); ?> : <?php echo e($company_name->value); ?></h5>
                        <button type="submit" class="btn btn-primary float-right" data-toggle="modal"
                                data-target="#companyName"><?php echo e(trans('messages.Edit')); ?>

                        </button>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body" style="padding: 20px">
                        <h5><?php echo e(trans('messages.Email')); ?>: <?php echo e($company_email->value); ?></h5>
                        <button type="submit" class="btn btn-primary float-right" data-toggle="modal"
                                data-target="#companyEmail"><?php echo e(trans('messages.Edit')); ?>

                        </button>
                    </div>
                </div>
            </div>
        </div>

        <div class="row" style="padding-bottom: 20px">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body" style="padding: 20px">
                        <h5><?php echo e(trans('messages.Phone')); ?>: <?php echo e($company_phone->value); ?></h5>
                        <button type="submit" class="btn btn-primary float-right" data-toggle="modal"
                                data-target="#companyPhone"><?php echo e(trans('messages.Edit')); ?>

                        </button>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="modal fade" id="companyCopyRight" role="dialog" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title"
                                    id="exampleModalLabel"><?php echo e(trans('messages.rename_company')); ?> <?php echo e(trans('messages.copy_right')); ?> <?php echo e(trans('messages.Text')); ?>   </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="<?php echo e(route('admin.business-settings.web-config.company-copy-right-update')); ?>"
                                      method="post">
                                    <?php echo csrf_field(); ?>
                                    <div class="form-group mb-2">
                                        <label
                                            class="control-label"><?php echo e(trans('messages.copy_right')); ?> <?php echo e(trans('messages.Text')); ?> </label>
                                    </div>
                                    <div class="form-group mb-2 mt-2">
                                        <?php ($company_copyright_text=\App\Model\BusinessSetting::where(['type'=>'company_copyright_text'])->first()); ?>
                                        <input class="form-control" type="text" name="company_copyright_text"
                                               value="<?php echo e($company_copyright_text->value); ?>">
                                    </div>
                                    <button type="submit"
                                            class="btn btn-info float-right"><?php echo e(trans('messages.Update')); ?></button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-body" style="padding: 20px">
                        <h5><?php echo e(trans('messages.copy_right')); ?> <?php echo e($company_copyright_text->value); ?></h5>
                        <button type="submit" class="btn btn-primary float-right" data-toggle="modal"
                                data-target="#companyCopyRight"><?php echo e(trans('messages.Edit')); ?>

                        </button>
                    </div>
                </div>
            </div>
        </div>

        <div class="row" style="padding-bottom: 20px">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h5><?php echo e(trans('messages.Web')); ?> <?php echo e(trans('messages.logo')); ?> </h5>
                        <span class="badge badge-soft-danger">( ratio 3:1 )</span>
                    </div>
                    <div class="card-body" style="padding: 20px">
                        <center>
                            <img width="200" id="viewerWL"
                                 onerror="this.src='<?php echo e(asset('public/assets/front-end/img/image-place-holder.png')); ?>'"
                                 src="<?php echo e(asset('company')); ?>/<?php echo e(\App\Model\BusinessSetting::where(['type' => 'company_web_logo'])->pluck('value')[0]); ?>">
                        </center>
                        <hr>
                        <form action="<?php echo e(route('admin.business-settings.web-config.company-web-logo-upload')); ?>"
                              method="post" enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>
                            <div class="row">
                                <div class="custom-file col-9">
                                    <input type="file" name="image" id="customFileUploadWL" class="custom-file-input"
                                           accept=".jpg, .png, .jpeg, .gif, .bmp, .tif, .tiff|image/*">
                                    <label class="custom-file-label"
                                           for="customFileUploadWL"><?php echo e(trans('messages.choose')); ?> <?php echo e(trans('messages.file')); ?></label>
                                </div>
                                <div class="col-3">
                                    <button type="submit"
                                            class="btn btn-primary float-right ml-3"><?php echo e(trans('messages.Save')); ?></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h5><?php echo e(trans('messages.Mobile')); ?> <?php echo e(trans('messages.logo')); ?></h5>
                        <span class="badge badge-soft-danger">( ratio 3:1 )</span>
                    </div>
                    <div class="card-body" style="padding: 20px">
                        <center>
                            <img width="200" id="viewerML"
                                 onerror="this.src='<?php echo e(asset('public/assets/front-end/img/image-place-holder.png')); ?>'"
                                 src="<?php echo e(asset('company')); ?>/<?php echo e(\App\Model\BusinessSetting::where(['type' => 'company_mobile_logo'])->pluck('value')[0]); ?>">
                        </center>
                        <hr>
                        <form action="<?php echo e(route('admin.business-settings.web-config.company-mobile-logo-upload')); ?>"
                              method="post" enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>
                            <div class="row">
                                <div class="custom-file col-9">
                                    <input type="file" name="image" id="customFileUploadML" class="custom-file-input"
                                           accept=".jpg, .png, .jpeg, .gif, .bmp, .tif, .tiff|image/*">
                                    <label class="custom-file-label"
                                           for="customFileUploadML"><?php echo e(trans('messages.choose')); ?> <?php echo e(trans('messages.file')); ?></label>
                                </div>
                                <div class="col-3">
                                    <button type="submit"
                                            class="btn btn-primary float-right ml-3"><?php echo e(trans('messages.Save')); ?></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="row" style="padding-bottom: 20px">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h5><?php echo e(trans('messages.web_footer')); ?> <?php echo e(trans('messages.logo')); ?> </h5>
                        <span class="badge badge-soft-danger">( ratio 3:1 )</span>
                    </div>
                    <div class="card-body" style="padding: 20px">
                        <center>
                            <img width="200" id="viewerWFL"
                                 onerror="this.src='<?php echo e(asset('public/assets/front-end/img/image-place-holder.png')); ?>'"
                                 src="<?php echo e(asset('company')); ?>/<?php echo e(\App\Model\BusinessSetting::where(['type' => 'company_footer_logo'])->pluck('value')[0]); ?>">
                        </center>
                        <hr>
                        <form action="<?php echo e(route('admin.business-settings.web-config.company-footer-logo-upload')); ?>"
                              method="post" enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>
                            <div class="row">
                                <div class="custom-file col-9">
                                    <input type="file" name="image" id="customFileUploadWFL" class="custom-file-input"
                                           accept=".jpg, .png, .jpeg, .gif, .bmp, .tif, .tiff|image/*">
                                    <label class="custom-file-label"
                                           for="customFileUploadWFL"><?php echo e(trans('messages.choose')); ?> <?php echo e(trans('messages.file')); ?></label>
                                </div>
                                <div class="col-3">
                                    <button type="submit"
                                            class="btn btn-primary float-right ml-3"><?php echo e(trans('messages.Save')); ?></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h5><?php echo e(trans('messages.web_fav_icon')); ?> </h5>
                        <span class="badge badge-soft-danger">( ratio 1:1 )</span>
                    </div>
                    <div class="card-body" style="padding: 20px">
                        <center>
                            <img width="60" id="viewerFI"
                                 onerror="this.src='<?php echo e(asset('public/assets/front-end/img/image-place-holder.png')); ?>'"
                                 src="<?php echo e(asset('company')); ?>/<?php echo e(\App\Model\BusinessSetting::where(['type' => 'company_fav_icon'])->pluck('value')[0]); ?>">
                        </center>
                        <hr>
                        <form action="<?php echo e(route('admin.business-settings.web-config.company-fav-icon')); ?>"
                              method="post" enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>
                            <div class="row">
                                <div class="custom-file col-9">
                                    <input type="file" name="image" id="customFileUploadFI" class="custom-file-input"
                                           accept=".jpg, .png, .jpeg, .gif, .bmp, .tif, .tiff|image/*">
                                    <label class="custom-file-label"
                                           for="customFileUploadFI"><?php echo e(trans('messages.choose')); ?> <?php echo e(trans('messages.file')); ?></label>
                                </div>
                                <div class="col-3">
                                    <button type="submit"
                                            class="btn btn-primary float-right ml-3"><?php echo e(trans('messages.Save')); ?></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>

        <div class="row" style="padding-bottom: 20px">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body" style="padding: 20px">
                        <?php ($colors=\App\Model\BusinessSetting::where(['type'=>'colors'])->first()); ?>
                        <?php if(isset($colors)): ?>
                            <?php ($data=json_decode($colors['value'])); ?>
                        <?php else: ?>
                            <?php (\Illuminate\Support\Facades\DB::table('business_settings')->insert([
                                    'type'=>'colors',
                                    'value'=>json_encode(
                                        [
                                            'primary'=>null,
                                            'secondary'=>null,
                                        ])
                                ])); ?>
                            <?php ($colors=\App\Model\BusinessSetting::where(['type'=>'colors'])->first()); ?>
                            <?php ($data=json_decode($colors['value'])); ?>
                        <?php endif; ?>
                        <h4><?php echo e(trans('messages.web_color_setup')); ?></h4>
                        <form action="<?php echo e(route('admin.business-settings.web-config.update-colors')); ?>" method="post"
                              enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>
                            <div class="form-group">
                                <label><?php echo e(trans('messages.Primary')); ?></label>
                                <input type="color" name="primary" value="<?php echo e($data->primary); ?>" class="form-control">
                            </div>
                            <div class="form-group">
                                <label><?php echo e(trans('messages.Secondary')); ?></label>
                                <input type="color" name="secondary" value="<?php echo e($data->secondary); ?>"
                                       class="form-control">
                            </div>
                            <button type="submit"
                                    class="btn btn-primary float-right ml-3"><?php echo e(trans('messages.Save')); ?></button>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>
    <script src="<?php echo e(asset('public/assets/back-end')); ?>/js/tags-input.min.js"></script>
    <script src="<?php echo e(asset('public/assets/select2/js/select2.min.js')); ?>"></script>
    <script>
        function readWLURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#viewerWL').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#customFileUploadWL").change(function () {
            readWLURL(this);
        });

        function readWFLURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#viewerWFL').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#customFileUploadWFL").change(function () {
            readWFLURL(this);
        });

        function readMLURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#viewerML').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#customFileUploadML").change(function () {
            readMLURL(this);
        });

        function readFIURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#viewerFI').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#customFileUploadFI").change(function () {
            readFIURL(this);
        });


        $(".js-example-theme-single").select2({
            theme: "classic"
        });

        $(".js-example-responsive").select2({
            width: 'resolve'
        });

    </script>
    <script>
        $(document).ready(function () {
            $('.color-var-select').select2({
                templateResult: colorCodeSelect,
                templateSelection: colorCodeSelect,
                escapeMarkup: function (m) {
                    return m;
                }
            });

            function colorCodeSelect(state) {
                var colorCode = $(state.element).val();
                if (!colorCode) return state.text;
                return "<span class='color-preview' style='background-color:" + colorCode + ";'></span>" + state.text;
            }
        });
    </script>

    <script>
        <?php ($language=\App\Model\BusinessSetting::where('type','pnc_language')->first()); ?>
        <?php ($language = $language->value ?? null); ?>
        let language = <?php echo e($language); ?>;
        $('#language').val(language);
    </script>


    <script>
        function maintenance_mode() {
            Swal.fire({
                title: 'Are you sure?',
                text: 'Be careful before you turn on/off maintenance mode',
                type: 'warning',
                showCancelButton: true,
                cancelButtonColor: 'default',
                confirmButtonColor: '#377dff',
                cancelButtonText: 'No',
                confirmButtonText: 'Yes',
                reverseButtons: true
            }).then((result) => {
                if (result.value) {
                    $.get({
                        url: '<?php echo e(route('admin.maintenance-mode')); ?>',
                        contentType: false,
                        processData: false,
                        beforeSend: function () {
                            $('#loading').show();
                        },
                        success: function (data) {
                            toastr.success(data.message);
                        },
                        complete: function () {
                            $('#loading').hide();
                        },
                    });
                } else {
                    location.reload();
                }
            })
        };

        function currency_symbol_position(route) {
            $.get({
                url: route,
                contentType: false,
                processData: false,
                beforeSend: function () {
                    $('#loading').show();
                },
                success: function (data) {
                    toastr.success(data.message);
                },
                complete: function () {
                    $('#loading').hide();
                },
            });
        }
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.back-end.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/jj/Desktop/MrZ/WebVision/AdamG/Admin/resources/views/admin-views/business-settings/website-info.blade.php ENDPATH**/ ?>