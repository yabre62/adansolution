<?php $__env->startSection('title','Checkout Process Start'); ?>

<?php $__env->startPush('css_or_js'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('public/assets/front-end')); ?>/css/checkout-details.css"/>
    <style>
        .nav-tabs .nav-link.active, .nav-tabs .nav-item.show .nav-link {
            background: <?php echo e($web_config['primary_color']); ?>;
            border-radius: 6px;
            color: white !important;
            border-color: <?php echo e($web_config['primary_color']); ?>;
        }

        .nav-tabs .nav-link {
            background: <?php echo e($web_config['secondary_color']); ?>;
            border: 1px solid<?php echo e($web_config['secondary_color']); ?>;
            border-radius: 6px;
            color: #f2f3ff !important;
            font-weight: 600 !important;
            font-size: 18px !important;
        }
    </style>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>

    <div class="container pb-5 mb-2 mb-md-4">
        <div class="row">
            <div class="col-md-12 mb-5 pt-5">
                <div class="feature_header" style="background: #dcdcdc;line-height: 1px">
                    <span><?php echo e(trans('messages.sign_in')); ?></span>
                </div>
            </div>
            <section class="col-lg-8">
                <hr>
                <div class="checkout_details mt-3">
                <?php echo $__env->make('web-views.partials._checkout-steps',['step'=>1], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <!-- Shipping methods table-->
                    <h2 class="h4 pb-3 mb-2 mt-5"><?php echo e(trans('messages.Authentication')); ?></h2>
                    <!-- Autor info-->
                    <?php if(auth('customer')->check()): ?>
                        <div class="card">
                            <div class="card-body">
                                <h4><?php echo e(auth('customer')->user()->f_name); ?>, <?php echo e(trans('messages.HI')); ?>!</h4>
                                <small><?php echo e(trans('messages.you_are_already_login_proceed')); ?>.</small>
                            </div>
                        </div>
                    <?php else: ?>
                        <div class="row">
                            <div class="col-12">
                                <ul class="nav nav-tabs mt-2 d-flex justify-content-between" role="tablist">
                                    <li class="nav-item d-inline-block">
                                        <a class="nav-link active" href="#signin" data-toggle="tab" role="tab">
                                            Sign In
                                        </a>
                                    </li>
                                    <li class="nav-item d-inline-block">
                                        <a class="nav-link" href="#signup" data-toggle="tab" role="tab">
                                            Sign Up
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-12">
                                <div class="tab-content">
                                    <!-- Tech specs tab-->
                                    <div class="tab-pane fade show active" id="signin" role="tabpanel">
                                        <form class="needs-validation" autocomplete="off" id="login-form"
                                              action="<?php echo e(route('customer.auth.login')); ?>" method="post" novalidate>
                                            <?php echo csrf_field(); ?>
                                            <div class="form-row">
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label
                                                            for="si-email"><?php echo e(trans('messages.email_address')); ?></label>
                                                        <input class="form-control" type="email" name="email"
                                                               id="si-email" value="<?php echo e(old('email')); ?>"
                                                               placeholder="johndoe@example.com"
                                                               required>
                                                        <div class="invalid-feedback">Please provide a valid email
                                                            address.
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label for="si-password"><?php echo e(trans('messages.Password')); ?></label>
                                                        <div class="password-toggle">
                                                            <input class="form-control" name="password" type="password"
                                                                   id="si-password" required>
                                                            <label class="password-toggle-btn">
                                                                <input class="custom-control-input" type="checkbox"><i
                                                                    class="czi-eye password-toggle-indicator"></i><span
                                                                    class="sr-only">Show password</span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="col-sm-6">
                                                    <div class="form-group d-flex flex-wrap justify-content-between">
                                                        <div class="mb-2">
                                                            <input type="checkbox" name="remember"
                                                                   <?php echo e(old('remember') ? 'checked' : ''); ?>

                                                                   id="remember_me">
                                                            <label for="remember_me" style="cursor: pointer">
                                                                <?php echo e(trans('messages.remember_me')); ?>

                                                            </label>

                                                            <a class="font-size-sm ml-5"
                                                               href="<?php echo e(route('customer.auth.recover-password')); ?>">
                                                                <?php echo e(trans('messages.forgot_password')); ?>?
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="col">
                                                    <button class="btn btn-primary btn-block"
                                                            type="submit"><?php echo e(trans('messages.sing_in')); ?></button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>

                                    <div class="tab-pane fade" id="signup" role="tabpanel">
                                        <form class="needs-validation_" autocomplete="off" novalidate id="sign-up-form"
                                              action="<?php echo e(route('customer.auth.register')); ?>" method="post">
                                            <?php echo csrf_field(); ?>
                                            <div class="form-row">
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label for="su-name"><?php echo e(trans('messages.first_name')); ?></label>
                                                        <input class="form-control" type="text" name="f_name"
                                                               placeholder="John" required>
                                                        <div class="invalid-feedback">Please fill in your name.</div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label for="su-name"><?php echo e(trans('messages.last_name')); ?> </label>
                                                        <input class="form-control" type="text" name="l_name"
                                                               placeholder="Doe" required>
                                                        <div class="invalid-feedback">Please fill in your name.</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label
                                                            for="su-email"><?php echo e(trans('messages.email_address')); ?></label>
                                                        <input class="form-control" name="email" type="email"
                                                               id="su-email"
                                                               placeholder="johndoe@example.com"
                                                               required>
                                                        <div class="invalid-feedback">Please provide a valid email
                                                            address.
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label for="su-email"><?php echo e(trans('messages.Phone')); ?></label>
                                                        <input class="form-control" name="phone" type="number"
                                                               id="su-phone" placeholder="017********"
                                                               required>
                                                        <div class="invalid-feedback">Please provide a valid phone
                                                            number.
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label for="su-password"><?php echo e(trans('messages.Password')); ?></label>
                                                        <div class="password-toggle">
                                                            <input class="form-control" name="password" type="password"
                                                                   id="su-password" required>
                                                            <label class="password-toggle-btn">
                                                                <input class="custom-control-input" type="checkbox"><i
                                                                    class="czi-eye password-toggle-indicator"></i><span
                                                                    class="sr-only">Show password</span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label
                                                            for="su-password-confirm"><?php echo e(trans('messages.confirm_password')); ?></label>
                                                        <div class="password-toggle">
                                                            <input class="form-control" name="con_password"
                                                                   type="password" id="su-password-confirm"
                                                                   required>
                                                            <label class="password-toggle-btn">
                                                                <input class="custom-control-input" type="checkbox"><i
                                                                    class="czi-eye password-toggle-indicator"></i><span
                                                                    class="sr-only">Show password</span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="col">
                                                    <button class="btn btn-primary btn-block" type="submit">
                                                        <?php echo e(trans('messages.sign-up')); ?>

                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>

                <br>
                <div class="row">
                    <div class="col-6">
                        <a class="btn btn-secondary btn-block" href="<?php echo e(route('shop-cart')); ?>">
                            <i class="czi-arrow-left mt-sm-0 mr-1"></i>
                            <span
                                class="d-none d-sm-inline"><?php echo e(trans('messages.Back')); ?> <?php echo e(trans('messages.to')); ?>  <?php echo e(trans('messages.Cart')); ?> </span>
                            <span class="d-inline d-sm-none"><?php echo e(trans('messages.Back')); ?></span>
                        </a>
                    </div>
                    <div class="col-6">
                        <?php if(auth('customer')->check()): ?>
                            <a class="btn btn-primary btn-block" href="<?php echo e(route('checkout-shipping')); ?>">
                                <span class="d-none d-sm-inline"><?php echo e(trans('messages.proceed_shipping')); ?></span>
                                <span class="d-inline d-sm-none"><?php echo e(trans('messages.Next')); ?></span>
                                <i class="czi-arrow-right mt-sm-0 ml-1"></i>
                            </a>
                        <?php endif; ?>
                    </div>
                </div>
            </section>
            <!-- Sidebar-->
            <?php echo $__env->make('web-views.partials._order-summary', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>

    <script>
        $('#login-form').submit(function (e) {
            e.preventDefault();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.post({
                url: '<?php echo e(route('customer.auth.login')); ?>',
                dataType: 'json',
                data: $('#login-form').serialize(),
                beforeSend: function () {
                    $('#loading').show();
                },
                success: function (data) {
                    toastr.success(data.message, {
                        CloseButton: true,
                        ProgressBar: true
                    });
                    location.reload();
                },
                complete: function () {
                    $('#loading').hide();
                },
                error: function () {
                    toastr.error('Credential not matched!', {
                        CloseButton: true,
                        ProgressBar: true
                    });
                }
            });
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
                    toastr.error('something went wrong!', {
                        CloseButton: true,
                        ProgressBar: true
                    });
                }
            });
        });
    </script>

<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.front-end.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/jj/Desktop/MrZ/WebVision/AdamG/Admin/resources/views/web-views/checkout-details.blade.php ENDPATH**/ ?>