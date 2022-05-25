<?php $__env->startSection('title','Mail Config'); ?>
<?php $__env->startPush('css_or_js'); ?>

<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <div class="content container-fluid">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo e(route('admin.dashboard.index')); ?>"><?php echo e(trans('messages.Dashboard')); ?></a>
                </li>
                <li class="breadcrumb-item" aria-current="page"><?php echo e(trans('messages.mail_config')); ?></li>
            </ol>
        </nav>

        <div class="row" style="padding-bottom: 20px">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body" style="padding: 20px">

                        <?php ($config=\App\Model\BusinessSetting::where(['type'=>'mail_config'])->first()); ?>
                        <?php ($data=json_decode($config['value'],true)); ?>
                        <form action="<?php echo e(route('admin.business-settings.mail.update')); ?>"
                              method="post">
                            <?php echo csrf_field(); ?>
                            <?php if(isset($config)): ?>
                                <div class="form-group mb-2">
                                    <label class="control-label"><?php echo e(trans('messages.smtp_mail_config')); ?></label>
                                </div>
                                <div class="form-group mb-2">
                                    <label style="padding-left: 10px"><?php echo e(trans('messages.mailer_name')); ?></label><br>
                                    <input type="text" placeholder="ex : Alex" class="form-control" name="name"
                                           value="<?php echo e(env('APP_MODE')=='demo'?'':$data['name']); ?>">
                                </div>

                                <div class="form-group mb-2">
                                    <label style="padding-left: 10px"><?php echo e(trans('messages.Host')); ?></label><br>
                                    <input type="text" class="form-control" name="host"
                                           value="<?php echo e(env('APP_MODE')=='demo'?'':$data['host']); ?>">
                                </div>
                                <div class="form-group mb-2">
                                    <label style="padding-left: 10px"><?php echo e(trans('messages.Driver')); ?></label><br>
                                    <input type="text" class="form-control" name="driver"
                                           value="<?php echo e(env('APP_MODE')=='demo'?'':$data['driver']); ?>">
                                </div>
                                <div class="form-group mb-2">
                                    <label style="padding-left: 10px"><?php echo e(trans('messages.port')); ?></label><br>
                                    <input type="text" class="form-control" name="port"
                                           value="<?php echo e(env('APP_MODE')=='demo'?'':$data['port']); ?>">
                                </div>

                                <div class="form-group mb-2">
                                    <label style="padding-left: 10px"><?php echo e(trans('messages.Username')); ?></label><br>
                                    <input type="text" placeholder="ex : ex@yahoo.com" class="form-control"
                                           name="username" value="<?php echo e(env('APP_MODE')=='demo'?'':$data['username']); ?>">
                                </div>

                                <div class="form-group mb-2">
                                    <label style="padding-left: 10px"><?php echo e(trans('messages.email_id')); ?></label><br>
                                    <input type="text" placeholder="ex : ex@yahoo.com" class="form-control" name="email"
                                           value="<?php echo e(env('APP_MODE')=='demo'?'':$data['email_id']); ?>">
                                </div>

                                <div class="form-group mb-2">
                                    <label style="padding-left: 10px"><?php echo e(trans('messages.Encryption')); ?></label><br>
                                    <input type="text" placeholder="ex : tls" class="form-control" name="encryption"
                                           value="<?php echo e(env('APP_MODE')=='demo'?'':$data['encryption']); ?>">
                                </div>

                                <div class="form-group mb-2">
                                    <label style="padding-left: 10px"><?php echo e(trans('messages.password')); ?></label><br>
                                    <input type="text" class="form-control" name="password"
                                           value="<?php echo e(env('APP_MODE')=='demo'?'':$data['password']); ?>">
                                </div>
                                <button type="<?php echo e(env('APP_MODE')!='demo'?'submit':'button'); ?>"
                                        onclick="<?php echo e(env('APP_MODE')!='demo'?'':'call_demo()'); ?>"
                                        class="btn btn-primary mb-2"><?php echo e(trans('messages.save')); ?></button>
                            <?php else: ?>
                                <button type="submit"
                                        class="btn btn-primary mb-2"><?php echo e(trans('messages.Configure')); ?></button>
                            <?php endif; ?>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>

<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.back-end.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/jj/Desktop/MrZ/WebVision/AdamG/Admin/resources/views/admin-views/business-settings/mail/index.blade.php ENDPATH**/ ?>