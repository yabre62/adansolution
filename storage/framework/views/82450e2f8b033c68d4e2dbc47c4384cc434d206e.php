

<div class="footer">
    <div class="row justify-content-between align-items-center">
        <div class="col">
            <p class="font-size-sm mb-0">
                &copy; <?php echo e(\App\Model\BusinessSetting::where(['type'=>'company_name'])->first()->value); ?>. <span
                    class="d-none d-sm-inline-block"><?php echo e(\App\Model\BusinessSetting::where(['type'=>'company_copyright_text'])->first()->value); ?></span>
            </p>
        </div>
        <div class="col-auto">
            <div class="d-flex justify-content-end">
                <!-- List Dot -->
                <ul class="list-inline list-separator">
                    <li class="list-inline-item">
                        <a class="list-separator-link" href="<?php echo e(route('admin.business-settings.web-config.index')); ?>"> Settings</a>
                    </li>

                    <li class="list-inline-item">
                        <a class="list-separator-link"href="<?php echo e(route('admin.helpTopic.list')); ?>">FAQ</a>
                    </li>

                    <li class="list-inline-item">
                        <!-- Keyboard Shortcuts Toggle -->
                        <div class="hs-unfold">
                            <a class="js-hs-unfold-invoker btn btn-icon btn-ghost-secondary rounded-circle"
                               href="<?php echo e(route('admin.dashboard.index')); ?>">
                                <i class="tio-home-outlined"></i>
                            </a>
                        </div>
                        <!-- End Keyboard Shortcuts Toggle -->
                    </li>
                </ul>
                <!-- End List Dot -->
            </div>
        </div>
    </div>
</div>
<?php /**PATH /home/jj/Desktop/MrZ/WebVision/AdamG/Admin/resources/views/layouts/back-end/partials/_footer.blade.php ENDPATH**/ ?>