<?php $__env->startSection('title','Login'); ?>
<?php $__env->startPush('css_or_js'); ?>
    <style>
        .password-toggle-btn .custom-control-input:checked ~ .password-toggle-indicator {
            color: <?php echo e($web_config['primary_color']); ?>;
        }

        .for-no-account {
            margin: auto;
            text-align: center;
        }
    </style>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('content'); ?>
    <div class="container py-4 py-lg-5 my-4 " style="background-color:black">
        <div class="row justify-content-center">
            <div  class="col-md-6" >
                <div class="card border-0 box-shadow" style="background:black" >
                    <div class="card-body">
                        <h2 style="color: white" class="h4 mb-1"><?php echo e(trans('messages.sing_in')); ?></h2>
                        <hr class="mt-2">

                        <form class="needs-validation mt-2" autocomplete="off" action="javascript:"
                              method="post" id="sign-in-form">
                            <?php echo csrf_field(); ?>
                            <div class="form-group" >
                                <label for="si-email" style="color: white"><?php echo e(trans('messages.email_address')); ?></label>
                                <input style="border-radius: 30px;background: #fff"  class="form-control  " style="background-color: #fff" type="email" name="email" id="si-email"
                                       placeholder="johndoe@example.com"
                                       required>
                                <div class="invalid-feedback"><?php echo e(trans('messages.please_provide_valid_email')); ?>.</div>
                            </div>
                            <div class="form-group">
                                <label for="si-password" style="color: white"><?php echo e(trans('messages.password')); ?></label>
                                <div class="password-toggle">
                                    <input style="border-radius: 30px;background: #fff" class="form-control"  name="password" type="password" id="si-password"
                                           required>
                                    <label class="password-toggle-btn">
                                        <input class="custom-control-input" type="checkbox"><i
                                            class="czi-eye password-toggle-indicator"></i><span
                                            class="sr-only"><?php echo e(trans('messages.Show')); ?> <?php echo e(trans('messages.password')); ?> </span>
                                    </label>
                                </div>
                            </div>
                            <div class="form-group d-flex flex-wrap justify-content-between">

                                <div class="form-group">
                                    <input type="checkbox" class="mr-1"
                                           name="remember" id="remember" <?php echo e(old('remember') ? 'checked' : ''); ?>>

                                    <label class="" for="remember"><?php echo e(trans('messages.remember_me')); ?></label>
                                </div>
                                <a class="font-size-sm" href="<?php echo e(route('customer.auth.recover-password')); ?>">
                                    <?php echo e(trans('messages.forgot_password')); ?>?
                                </a>
                            </div>
                            <button   class="btn btn-primary btn-block btn-shadow"
                                    type="submit"  style="background:#ed6400 ;
    border-radius: 20px;
    border: none;"><?php echo e(trans('messages.sign_in')); ?></button>
                        </form>
                    </div>
                    <div class="card-footer">
                        <div class="row">
                            <div class="col-md-8 col-sm-6 for-no-account">
                                <h6><?php echo e(trans('messages.no_account_Sign_up_now')); ?></h6>
                            </div>
                            <div class="col-md-4 col-sm-6">
                                <a class="btn btn-outline-primary pull-right"
                                   href="<?php echo e(route('customer.auth.register')); ?>">
                                    <i class="fa fa-user-circle"></i> <?php echo e(trans('messages.sing_up')); ?>

                                </a>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>
    <script>
        $('#sign-in-form').submit(function (e) {
            e.preventDefault();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.post({
                url: '<?php echo e(route('customer.auth.login')); ?>',
                dataType: 'json',
                data: $('#sign-in-form').serialize(),
                beforeSend: function () {
                    $('#loading').show();
                },
                success: function (data) {
                    if (data.errors) {
                        for (var i = 0; i < data.errors.length; i++) {
                            toastr.error(data.errors[i].message, {
                                CloseButton: true,
                                ProgressBar: true
                            });
                        }
                    } else {
                        toastr.success(data.message, {
                            CloseButton: true,
                            ProgressBar: true
                        });
                        setInterval(function () {
                            location.href = data.url;
                        }, 2000);
                    }
                },
                complete: function () {
                    $('#loading').hide();
                },
                error: function () {
                    toastr.error('Credentials do not match or account has been suspended.', {
                        CloseButton: true,
                        ProgressBar: true
                    });
                }
            });
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.front-end.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\adanSolutionAdmin\resources\views/customer-view/auth/login.blade.php ENDPATH**/ ?>
