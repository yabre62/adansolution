<?php $__env->startSection('title','Register'); ?>

<?php $__env->startPush('css_or_js'); ?>
<style>
    @media(max-width:500px){
        #sign_in{
            margin-top: -23% !important;
        }

    }
</style>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <div class="container py-4 py-lg-5 my-4">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card border-0 box-shadow">
                    <div class="card-body">
                        <h2 class="h4 mb-1"><?php echo e(trans('messages.no_account')); ?></h2>
                        <p class="font-size-sm text-muted mb-4"><?php echo e(trans('messages.register_control_your_order')); ?>.</p>
                        <form class="needs-validation_" id="sign-up-form" action="<?php echo e(route('customer.auth.register')); ?>"
                              method="post">
                            <?php echo csrf_field(); ?>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="reg-fn"><?php echo e(trans('messages.first_name')); ?></label>
                                        <input class="form-control" type="text" name="f_name" required>
                                        <div class="invalid-feedback">Please enter your first name!</div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="reg-ln"><?php echo e(trans('messages.last_name')); ?></label>
                                        <input class="form-control" type="text" name="l_name">
                                        <div class="invalid-feedback">Please enter your last name!</div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="reg-email"><?php echo e(trans('messages.email_address')); ?></label>
                                        <input class="form-control" type="email" name="email">
                                        <div class="invalid-feedback">Please enter valid email address!</div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="reg-phone"><?php echo e(trans('messages.phone_name')); ?></label>
                                        <input class="form-control" type="text" name="phone" required>
                                        <div class="invalid-feedback">Please enter your phone number!</div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="si-password"><?php echo e(trans('messages.password')); ?></label>
                                        <div class="password-toggle">
                                            <input class="form-control" name="password" type="password" id="si-password"
                                                   required>
                                            <label class="password-toggle-btn">
                                                <input class="custom-control-input" type="checkbox"><i
                                                    class="czi-eye password-toggle-indicator"></i><span
                                                    class="sr-only"><?php echo e(trans('messages.Show')); ?> <?php echo e(trans('messages.password')); ?> </span>
                                            </label>
                                        </div>
                                    </div>
                                    
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="si-password"><?php echo e(trans('messages.confirm_password')); ?></label>
                                        <div class="password-toggle">
                                            <input class="form-control" name="con_password" type="password" id="si-password"
                                                   required>
                                            <label class="password-toggle-btn">
                                                <input class="custom-control-input" type="checkbox"><i
                                                    class="czi-eye password-toggle-indicator"></i><span
                                                    class="sr-only"><?php echo e(trans('messages.Show')); ?> <?php echo e(trans('messages.password')); ?> </span>
                                            </label>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                            <div class="form-group d-flex flex-wrap justify-content-between">

                                <div class="form-group mb-1">
                                    <strong>
                                        <input type="checkbox" class="mr-1"
                                               name="remember" id="inputCheckd">
                                    </strong>
                                    <label class="" for="remember"><?php echo e(trans('messages.i_agree_to_Your_terms')); ?><a
                                            class="font-size-sm" target="_blank" href="<?php echo e(route('terms')); ?>">
                                            <?php echo e(trans('messages.terms_and_condition')); ?>

                                        </a></label>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <a class="btn btn-outline-primary" href="<?php echo e(route('customer.auth.login')); ?>">
                                        <i class="fa fa-sign-in"></i> <?php echo e(trans('messages.sing_in')); ?>

                                    </a>
                                </div>
                                <div class="col-sm-6">
                                    <div class="text-right">
                                        <button class="btn btn-primary" type="submit" id="sign_in" disabled><i
                                                class="czi-user mr-2 ml-n1"></i><?php echo e(trans('messages.sing_up')); ?>

                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>
    <script>
        $('#inputCheckd').change(function () {
            // console.log('jell');
            if ($(this).is(':checked')) {
                $('#sign_in').removeAttr('disabled');
            } else {
                $('#sign_in').attr('disabled', 'disabled');
            }

        });
        $('#sign-up-form').submit(function (e) {
            e.preventDefault();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.post({
                url: '<?php echo e(route('customer.auth.register')); ?>',
                dataType: 'json',
                data: $('#sign-up-form').serialize(),
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
                    toastr.error('password does not match!', {
                        CloseButton: true,
                        ProgressBar: true
                    });
                }
            });
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.front-end.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/jj/Desktop/MrZ/WebVision/AdamG/Admin/resources/views/customer-view/auth/register.blade.php ENDPATH**/ ?>