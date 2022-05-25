<?php $__env->startSection('title','FCM Settings'); ?>

<?php $__env->startPush('css_or_js'); ?>

<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <div class="content container-fluid">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo e(route('admin.dashboard.index')); ?>"><?php echo e(trans('messages.Dashboard')); ?></a>
                </li>
                <li class="breadcrumb-item" aria-current="page">Push Notification Setup</li>
            </ol>
        </nav>

        <!-- End Page Header -->
        <div class="row gx-2 gx-lg-3">
            <div class="col-sm-12 col-lg-12 mb-3 mb-lg-2">
                <div class="card">
                    <div class="card-header">
                        <h1 class="page-header-title">Firebase Push Notification Setup</h1>
                    </div>
                    <div class="card-body">
                        <form action="<?php echo e(route('admin.business-settings.update-fcm')); ?>" method="post"
                              enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>
                            <?php ($key=\App\Model\BusinessSetting::where('type','push_notification_key')->first()->value); ?>
                            <div class="form-group">
                                <label class="input-label" for="exampleFormControlInput1">Server Key</label>
                                <textarea name="push_notification_key" class="form-control"
                                          required><?php echo e(env('APP_MODE')=='demo'?'':$key); ?></textarea>
                            </div>

                            <div class="row" style="display: none">
                                <?php ($project_id=\App\Model\BusinessSetting::where('type','fcm_project_id')->first()->value); ?>
                                <div class="col-md-12 col-12">
                                    <div class="form-group">
                                        <label class="input-label" for="exampleFormControlInput1">FCM Project ID</label>
                                        <input type="text" value="<?php echo e($project_id); ?>"
                                               name="fcm_project_id" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <button type="<?php echo e(env('APP_MODE')!='demo'?'submit':'button'); ?>"
                                    onclick="<?php echo e(env('APP_MODE')!='demo'?'':'call_demo()'); ?>"
                                    class="btn btn-primary mb-2"><?php echo e(trans('messages.save')); ?></button>
                        </form>
                    </div>
                </div>
            </div>

            <hr>
            <div class="col-sm-12 col-lg-12 mb-3 mb-lg-2">

                <div class="card">
                    <div class="card-header">
                        <h2>Push Messages</h2>
                    </div>
                    <div class="card-body">
                        <form action="<?php echo e(route('admin.business-settings.update-fcm-messages')); ?>" method="post"
                              enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>

                            <div class="row">
                                <?php ($opm=\App\Model\BusinessSetting::where('type','order_pending_message')->first()->value); ?>
                                <?php ($data=json_decode($opm,true)); ?>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label class="toggle-switch d-flex align-items-center mb-3"
                                               for="pending_status">
                                            <input type="checkbox" name="pending_status" class="toggle-switch-input"
                                                   value="1" id="pending_status" <?php echo e($data['status']==1?'checked':''); ?>>
                                            <span class="toggle-switch-label">
                                                <span class="toggle-switch-indicator"></span>
                                              </span>
                                            <span class="toggle-switch-content">
                                            <span class="d-block">Order Pending Message</span>
                                          </span>
                                        </label>
                                        <textarea name="pending_message"
                                                  class="form-control"><?php echo e($data['message']); ?></textarea>
                                    </div>
                                </div>

                                <?php ($ocm=\App\Model\BusinessSetting::where('type','order_confirmation_msg')->first()->value); ?>
                                <?php ($data=json_decode($ocm,true)); ?>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label class="toggle-switch d-flex align-items-center mb-3"
                                               for="confirm_status">
                                            <input type="checkbox" name="confirm_status" class="toggle-switch-input"
                                                   value="1" id="confirm_status" <?php echo e($data['status']==1?'checked':''); ?>>
                                            <span class="toggle-switch-label">
                                                <span class="toggle-switch-indicator"></span>
                                              </span>
                                            <span class="toggle-switch-content">
                                                <span class="d-block"> Order Confirmation Message</span>
                                              </span>
                                        </label>

                                        <textarea name="confirm_message"
                                                  class="form-control"><?php echo e($data['message']); ?></textarea>
                                    </div>
                                </div>

                                <?php ($oprm=\App\Model\BusinessSetting::where('type','order_processing_message')->first()->value); ?>
                                <?php ($data=json_decode($oprm,true)); ?>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label class="toggle-switch d-flex align-items-center mb-3"
                                               for="processing_status">
                                            <input type="checkbox" name="processing_status"
                                                   class="toggle-switch-input"
                                                   value="1" id="processing_status" <?php echo e($data['status']==1?'checked':''); ?>>
                                            <span class="toggle-switch-label">
                                                <span class="toggle-switch-indicator"></span>
                                              </span>
                                            <span class="toggle-switch-content">
                                                <span class="d-block">Order Processing Message</span>
                                              </span>
                                        </label>

                                        <textarea name="processing_message"
                                                  class="form-control"><?php echo e($data['message']); ?></textarea>
                                    </div>
                                </div>

                                <?php ($ofdm=\App\Model\BusinessSetting::where('type','out_for_delivery_message')->first()->value); ?>
                                <?php ($data=json_decode($ofdm,true)); ?>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label class="toggle-switch d-flex align-items-center mb-3"
                                               for="out_for_delivery">
                                            <input type="checkbox" name="out_for_delivery_status"
                                                   class="toggle-switch-input"
                                                   value="1" id="out_for_delivery" <?php echo e($data['status']==1?'checked':''); ?>>
                                            <span class="toggle-switch-label">
                                                <span class="toggle-switch-indicator"></span>
                                              </span>
                                            <span class="toggle-switch-content">
                                                <span class="d-block">Order out for delivery Message</span>
                                              </span>
                                        </label>
                                        <textarea name="out_for_delivery_message"
                                                  class="form-control"><?php echo e($data['message']); ?></textarea>
                                    </div>
                                </div>

                                <?php ($odm=\App\Model\BusinessSetting::where('type','order_delivered_message')->first()->value); ?>
                                <?php ($data=json_decode($odm,true)); ?>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label class="toggle-switch d-flex align-items-center mb-3"
                                               for="delivered_status">
                                            <input type="checkbox" name="delivered_status"
                                                   class="toggle-switch-input"
                                                   value="1" id="delivered_status" <?php echo e($data['status']==1?'checked':''); ?>>
                                            <span class="toggle-switch-label">
                                                <span class="toggle-switch-indicator"></span>
                                              </span>
                                            <span class="toggle-switch-content">
                                                <span class="d-block">Order Delivered Message</span>
                                              </span>
                                        </label>

                                        <textarea name="delivered_message"
                                                  class="form-control"><?php echo e($data['message']); ?></textarea>
                                    </div>
                                </div>


                                <?php ($odm=\App\Model\BusinessSetting::where('type','order_returned_message')->first()->value); ?>
                                <?php ($data=json_decode($odm,true)); ?>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label class="toggle-switch d-flex align-items-center mb-3"
                                               for="returned_status">
                                            <input type="checkbox" name="returned_status"
                                                   class="toggle-switch-input"
                                                   value="1" id="returned_status" <?php echo e($data['status']==1?'checked':''); ?>>
                                            <span class="toggle-switch-label">
                                                <span class="toggle-switch-indicator"></span>
                                              </span>
                                            <span class="toggle-switch-content">
                                                <span class="d-block">Order Returned Message</span>
                                              </span>
                                        </label>

                                        <textarea name="returned_message"
                                                  class="form-control"><?php echo e($data['message']); ?></textarea>
                                    </div>
                                </div>


                                <?php ($odm=\App\Model\BusinessSetting::where('type','order_failed_message')->first()->value); ?>
                                <?php ($data=json_decode($odm,true)); ?>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label class="toggle-switch d-flex align-items-center mb-3"
                                               for="failed_status">
                                            <input type="checkbox" name="failed_status"
                                                   class="toggle-switch-input"
                                                   value="1" id="failed_status" <?php echo e($data['status']==1?'checked':''); ?>>
                                            <span class="toggle-switch-label">
                                                <span class="toggle-switch-indicator"></span>
                                              </span>
                                            <span class="toggle-switch-content">
                                                <span class="d-block">Order Failed Message</span>
                                              </span>
                                        </label>

                                        <textarea name="failed_message"
                                                  class="form-control"><?php echo e($data['message']); ?></textarea>
                                    </div>
                                </div>

                            </div>
                            <hr>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script_2'); ?>
    <script>
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#viewer').attr('src', e.target.result);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#customFileEg1").change(function () {
            readURL(this);
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.back-end.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/jj/Desktop/MrZ/WebVision/AdamG/Admin/resources/views/admin-views/business-settings/fcm-index.blade.php ENDPATH**/ ?>