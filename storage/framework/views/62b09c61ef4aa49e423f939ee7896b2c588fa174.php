<?php $__env->startSection('title','Payment Method'); ?>

<?php $__env->startPush('css_or_js'); ?>
    <style>
        .switch {
            position: relative;
            display: inline-block;
            width: 60px;
            height: 34px;
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
            height: 26px;
            width: 26px;
            left: 4px;
            bottom: 4px;
            background-color: white;
            -webkit-transition: .4s;
            transition: .4s;
        }

        input:checked + .slider {
            background-color: #2196F3;
        }

        input:focus + .slider {
            box-shadow: 0 0 1px #2196F3;
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
    </style>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
<div class="content container-fluid">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo e(route('admin.dashboard.index')); ?>"><?php echo e(trans('messages.Dashboard')); ?></a></li>
            <li class="breadcrumb-item" aria-current="page"><?php echo e(trans('messages.payment_method')); ?></li>
        </ol>
    </nav>

    <div class="row" style="padding-bottom: 20px">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body" style="padding: 20px">
                    <h5 class="text-center"><?php echo e(trans('messages.system_default')); ?> <?php echo e(trans('messages.payment_method')); ?></h5>
                    <?php ($config=\App\CPU\Helpers::get_business_settings('cash_on_delivery')); ?>
                    <form action="<?php echo e(route('admin.business-settings.payment-method.update',['cash_on_delivery'])); ?>"
                          method="post">
                        <?php echo csrf_field(); ?>
                        <?php if(isset($config)): ?>
                            <div class="form-group mb-2">
                                <label class="control-label"><?php echo e(trans('messages.cash_on_delivery')); ?></label>
                            </div>
                            <div class="form-group mb-2 mt-2">
                                <input type="radio" name="status" value="1" <?php echo e($config['status']==1?'checked':''); ?>>
                                <label
                                    style="padding-left: 10px"><?php echo e(trans('messages.Active')); ?></label>
                                <br>
                            </div>
                            <div class="form-group mb-2">
                                <input type="radio" name="status" value="0" <?php echo e($config['status']==0?'checked':''); ?>>
                                <label
                                    style="padding-left: 10px"><?php echo e(trans('messages.Inactive')); ?></label>
                                <br>
                            </div>
                            <button type="<?php echo e(env('APP_MODE')!='demo'?'submit':'button'); ?>"
                                    onclick="<?php echo e(env('APP_MODE')!='demo'?'':'call_demo()'); ?>"
                                    class="btn btn-primary mb-2"><?php echo e(trans('messages.save')); ?></button>
                        <?php else: ?>
                            <button type="submit" class="btn btn-primary mb-2"><?php echo e(trans('messages.Configure')); ?></button>
                        <?php endif; ?>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-body" style="padding: 20px">
                    <h5 class="text-center"><?php echo e(trans('messages.digital_payment')); ?></h5>
                    <?php ($config=\App\CPU\Helpers::get_business_settings('digital_payment')); ?>
                    <form action="<?php echo e(route('admin.business-settings.payment-method.update',['digital_payment'])); ?>"
                          method="post">
                        <?php echo csrf_field(); ?>
                        <?php if(isset($config)): ?>
                            <div class="form-group mb-2">
                                <label class="control-label"><?php echo e(trans('messages.digital_payment')); ?></label>
                            </div>
                            <div class="form-group mb-2 mt-2">
                                <input type="radio" name="status" value="1" <?php echo e($config['status']==1?'checked':''); ?>>
                                <label style="padding-left: 10px"><?php echo e(trans('messages.Active')); ?></label>
                                <br>
                            </div>
                            <div class="form-group mb-2">
                                <input type="radio" name="status" value="0" <?php echo e($config['status']==0?'checked':''); ?>>
                                <label
                                    style="padding-left: 10px"><?php echo e(trans('messages.Inactive')); ?></label>
                                <br>
                            </div>
                            <button type="<?php echo e(env('APP_MODE')!='demo'?'submit':'button'); ?>"
                                    onclick="<?php echo e(env('APP_MODE')!='demo'?'':'call_demo()'); ?>"
                                    class="btn btn-primary mb-2"><?php echo e(trans('messages.save')); ?></button>
                        <?php else: ?>
                            <button type="submit" class="btn btn-primary mb-2"><?php echo e(trans('messages.Configure')); ?></button>
                        <?php endif; ?>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-6 mt-4">
            <div class="card">
                <div class="card-body" style="padding: 20px">
                    <h5 class="text-center"><?php echo e(trans('messages.SSLCOMMERZ')); ?></h5>
                    <?php ($config=\App\CPU\Helpers::get_business_settings('ssl_commerz_payment')); ?>
                    <form action="<?php echo e(route('admin.business-settings.payment-method.update',['ssl_commerz_payment'])); ?>"
                          method="post">
                        <?php echo csrf_field(); ?>
                        <?php if(isset($config)): ?>
                            <div class="form-group mb-2">
                                <label class="control-label"><?php echo e(trans('messages.ssl_commerz_payment')); ?></label>
                            </div>
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
                                <label style="padding-left: 10px"><?php echo e(trans('messages.Store')); ?> <?php echo e(trans('messages.ID')); ?> </label><br>
                                <input type="text" class="form-control" name="store_id" value="<?php echo e(env('APP_MODE')=='demo'?'':$config['store_id']); ?>">
                            </div>
                            <div class="form-group mb-2">
                                <label style="padding-left: 10px"><?php echo e(trans('messages.Store')); ?> <?php echo e(trans('messages.password')); ?></label><br>
                                <input type="text" class="form-control" name="store_password"
                                       value="<?php echo e(env('APP_MODE')=='demo'?'':$config['store_password']); ?>">
                            </div>
                            <button type="<?php echo e(env('APP_MODE')!='demo'?'submit':'button'); ?>"
                                    onclick="<?php echo e(env('APP_MODE')!='demo'?'':'call_demo()'); ?>"
                                    class="btn btn-primary mb-2"><?php echo e(trans('messages.save')); ?></button>
                        <?php else: ?>
                            <button type="submit" class="btn btn-primary mb-2"><?php echo e(trans('messages.Configure')); ?></button>
                        <?php endif; ?>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-6 mt-4">
            <div class="card">
                <div class="card-body" style="padding: 20px">
                    <h5 class="text-center"><?php echo e(trans('messages.Paypal')); ?></h5>
                    <?php ($config=\App\CPU\Helpers::get_business_settings('paypal')); ?>
                    <form action="<?php echo e(route('admin.business-settings.payment-method.update',['paypal'])); ?>"
                          method="post">
                        <?php echo csrf_field(); ?>
                        <?php if(isset($config)): ?>
                            <div class="form-group mb-2">
                                <label class="control-label"><?php echo e(trans('messages.Paypal')); ?> <?php echo e(trans('messages.Payment')); ?></label>
                            </div>
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
                                <label style="padding-left: 10px"><?php echo e(trans('messages.Paypal')); ?> <?php echo e(trans('messages.Client')); ?><?php echo e(trans('messages.ID')); ?>  </label><br>
                                <input type="text" class="form-control" name="paypal_client_id"
                                       value="<?php echo e(env('APP_MODE')=='demo'?'':$config['paypal_client_id']); ?>">
                            </div>
                            <div class="form-group mb-2">
                                <label style="padding-left: 10px"><?php echo e(trans('messages.Paypal')); ?> <?php echo e(trans('messages.Secret')); ?> </label><br>
                                <input type="text" class="form-control" name="paypal_secret"
                                       value="<?php echo e(env('APP_MODE')=='demo'?'':$config['paypal_secret']); ?>">
                            </div>
                            <button type="<?php echo e(env('APP_MODE')!='demo'?'submit':'button'); ?>"
                                    onclick="<?php echo e(env('APP_MODE')!='demo'?'':'call_demo()'); ?>"
                                    class="btn btn-primary mb-2"><?php echo e(trans('messages.save')); ?></button>
                        <?php else: ?>
                            <button type="submit" class="btn btn-primary mb-2"><?php echo e(trans('messages.Configure')); ?></button>
                        <?php endif; ?>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-6 mt-4">
            <div class="card">
                <div class="card-body" style="padding: 20px">
                    <h5 class="text-center"><?php echo e(trans('messages.Stripe')); ?></h5>
                    <?php ($config=\App\CPU\Helpers::get_business_settings('stripe')); ?>
                    <form action="<?php echo e(route('admin.business-settings.payment-method.update',['stripe'])); ?>"
                          method="post">
                        <?php echo csrf_field(); ?>
                        <?php if(isset($config)): ?>
                            <div class="form-group mb-2">
                                <label class="control-label"><?php echo e(trans('messages.stripe')); ?></label>
                            </div>
                            <div class="form-group mb-2 mt-2">
                                <input type="radio" name="status" value="1" <?php echo e($config['status']==1?'checked':''); ?>>
                                <label style="padding-left: 10px"><?php echo e(trans('messages.Active')); ?></label>
                                <br>
                            </div>
                            <div class="form-group mb-2">
                                <input type="radio" name="status" value="0" <?php echo e($config['status']==0?'checked':''); ?>>
                                <label style="padding-left: 10px"><?php echo e(trans('messages.Inactive')); ?> </label>
                                <br>
                            </div>
                            <div class="form-group mb-2">
                                <label style="padding-left: 10px"><?php echo e(trans('messages.Published')); ?><?php echo e(trans('messages.Key')); ?>  </label><br>
                                <input type="text" class="form-control" name="published_key"
                                       value="<?php echo e(env('APP_MODE')=='demo'?'':$config['published_key']); ?>">
                            </div>

                            <div class="form-group mb-2">
                                <label style="padding-left: 10px"><?php echo e(trans('messages.api_key')); ?></label><br>
                                <input type="text" class="form-control" name="api_key"
                                       value="<?php echo e(env('APP_MODE')=='demo'?'':$config['api_key']); ?>">
                            </div>
                            <button type="<?php echo e(env('APP_MODE')!='demo'?'submit':'button'); ?>"
                                    onclick="<?php echo e(env('APP_MODE')!='demo'?'':'call_demo()'); ?>"
                                    class="btn btn-primary mb-2"><?php echo e(trans('messages.save')); ?></button>
                        <?php else: ?>
                            <button type="submit" class="btn btn-primary mb-2"><?php echo e(trans('messages.Configure')); ?></button>
                        <?php endif; ?>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-6 mt-4">
            <div class="card">
                <div class="card-body" style="padding: 20px">
                    <h5 class="text-center"><?php echo e(trans('messages.razor_pay')); ?></h5>
                    <?php ($config=\App\CPU\Helpers::get_business_settings('razor_pay')); ?>
                    <form action="<?php echo e(route('admin.business-settings.payment-method.update',['razor_pay'])); ?>"
                          method="post">
                        <?php echo csrf_field(); ?>
                        <?php if(isset($config)): ?>
                            <div class="form-group mb-2">
                                <label class="control-label"><?php echo e(trans('messages.razor_pay')); ?></label>
                            </div>
                            <div class="form-group mb-2 mt-2">
                                <input type="radio" name="status" value="1" <?php echo e($config['status']==1?'checked':''); ?>>
                                <label style="padding-left: 10px"><?php echo e(trans('messages.Active')); ?></label>
                                <br>
                            </div>
                            <div class="form-group mb-2">
                                <input type="radio" name="status" value="0" <?php echo e($config['status']==0?'checked':''); ?>>
                                <label style="padding-left: 10px"><?php echo e(trans('messages.Inactive')); ?> </label>
                                <br>
                            </div>
                            <div class="form-group mb-2">
                                <label style="padding-left: 10px"><?php echo e(trans('messages.Key')); ?>  </label><br>
                                <input type="text" class="form-control" name="razor_key"
                                       value="<?php echo e(env('APP_MODE')=='demo'?'':$config['razor_key']); ?>">
                            </div>

                            <div class="form-group mb-2">
                                <label style="padding-left: 10px"><?php echo e(trans('messages.secret')); ?></label><br>
                                <input type="text" class="form-control" name="razor_secret"
                                       value="<?php echo e(env('APP_MODE')=='demo'?'':$config['razor_secret']); ?>">
                            </div>
                            <button type="<?php echo e(env('APP_MODE')!='demo'?'submit':'button'); ?>"
                                    onclick="<?php echo e(env('APP_MODE')!='demo'?'':'call_demo()'); ?>"
                                    class="btn btn-primary mb-2"><?php echo e(trans('messages.save')); ?></button>
                        <?php else: ?>
                            <button type="submit" class="btn btn-primary mb-2"><?php echo e(trans('messages.Configure')); ?></button>
                        <?php endif; ?>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-6 mt-4">
            <div class="card">
                <div class="card-body" style="padding: 20px">
                    <h5 class="text-center"><?php echo e(trans('messages.senang_pay')); ?></h5>
                    <?php ($config=\App\CPU\Helpers::get_business_settings('senang_pay')); ?>
                    <form action="<?php echo e(env('APP_MODE')!='demo'?route('admin.business-settings.payment-method.update',['senang_pay']):'javascript:'); ?>"
                          method="post">
                        <?php echo csrf_field(); ?>
                        <?php if(isset($config)): ?>
                            <div class="form-group mb-2">
                                <label class="control-label"><?php echo e(trans('messages.senang_pay')); ?></label>
                            </div>
                            <div class="form-group mb-2 mt-2">
                                <input type="radio" name="status" value="1" <?php echo e($config['status']==1?'checked':''); ?>>
                                <label style="padding-left: 10px"><?php echo e(trans('messages.Active')); ?></label>
                                <br>
                            </div>
                            <div class="form-group mb-2">
                                <input type="radio" name="status" value="0" <?php echo e($config['status']==0?'checked':''); ?>>
                                <label style="padding-left: 10px"><?php echo e(trans('messages.Inactive')); ?> </label>
                                <br>
                            </div>
                            <div class="form-group mb-2">
                                <label
                                    style="padding-left: 10px"><?php echo e(trans('messages.secret')); ?> <?php echo e(trans('messages.key')); ?></label><br>
                                <input type="text" class="form-control" name="secret_key"
                                       value="<?php echo e(env('APP_MODE')!='demo'?$config['secret_key']:''); ?>">
                            </div>

                            <div class="form-group mb-2">
                                <label
                                    style="padding-left: 10px"><?php echo e(trans('messages.Merchant')); ?> <?php echo e(trans('messages.ID')); ?></label><br>
                                <input type="text" class="form-control" name="merchant_id"
                                       value="<?php echo e(env('APP_MODE')!='demo'?$config['merchant_id']:''); ?>">
                            </div>
                            <button type="<?php echo e(env('APP_MODE')!='demo'?'submit':'button'); ?>" onclick="<?php echo e(env('APP_MODE')!='demo'?'':'call_demo()'); ?>" class="btn btn-primary mb-2"><?php echo e(trans('messages.save')); ?></button>
                        <?php else: ?>
                            <button type="submit"
                                    class="btn btn-primary mb-2"><?php echo e(trans('messages.configure')); ?></button>
                        <?php endif; ?>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-6" style="margin-top: 26px!important;">
            <div class="card">
                <div class="card-body" style="padding: 20px">
                    <h5 class="text-center"><?php echo e(trans('messages.paystack')); ?></h5>
                    <?php ($config=\App\CPU\Helpers::get_business_settings('paystack')); ?>
                    <form
                        action="<?php echo e(env('APP_MODE')!='demo'?route('admin.business-settings.payment-method.update',['paystack']):'javascript:'); ?>"
                        method="post">
                        <?php echo csrf_field(); ?>
                        <?php if(isset($config)): ?>
                            <div class="form-group mb-2">
                                <label class="control-label"><?php echo e(trans('messages.paystack')); ?></label>
                            </div>
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
                                <label
                                    style="padding-left: 10px"><?php echo e(trans('messages.publicKey')); ?></label><br>
                                <input type="text" class="form-control" name="publicKey"
                                       value="<?php echo e(env('APP_MODE')!='demo'?$config['publicKey']:''); ?>">
                            </div>
                            <div class="form-group mb-2">
                                <label style="padding-left: 10px"><?php echo e(trans('messages.secretKey')); ?> </label><br>
                                <input type="text" class="form-control" name="secretKey"
                                       value="<?php echo e(env('APP_MODE')!='demo'?$config['secretKey']:''); ?>">
                            </div>
                            <div class="form-group mb-2">
                                <label style="padding-left: 10px"><?php echo e(trans('messages.paymentUrl')); ?> </label><br>
                                <input type="text" class="form-control" name="paymentUrl"
                                       value="<?php echo e(env('APP_MODE')!='demo'?$config['paymentUrl']:''); ?>">
                            </div>
                            <div class="form-group mb-2">
                                <label style="padding-left: 10px"><?php echo e(trans('messages.merchantEmail')); ?> </label><br>
                                <input type="text" class="form-control" name="merchantEmail"
                                       value="<?php echo e(env('APP_MODE')!='demo'?$config['merchantEmail']:''); ?>">
                            </div>
                            <button type="<?php echo e(env('APP_MODE')!='demo'?'submit':'button'); ?>"
                                    onclick="<?php echo e(env('APP_MODE')!='demo'?'':'call_demo()'); ?>"
                                    class="btn btn-primary mb-2"><?php echo e(trans('messages.save')); ?></button>
                        <?php else: ?>
                            <button type="submit"
                                    class="btn btn-primary mb-2"><?php echo e(trans('messages.configure')); ?></button>
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

<?php echo $__env->make('layouts.back-end.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/jj/Desktop/MrZ/WebVision/AdamG/Admin/resources/views/admin-views/business-settings/payment-method/index.blade.php ENDPATH**/ ?>