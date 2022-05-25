<?php $__env->startSection('title','Create Role'); ?>
<?php $__env->startPush('css_or_js'); ?>
    <!-- Custom styles for this page -->
    <link href="<?php echo e(asset('public/assets/back-end')); ?>/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <div class="content container-fluid">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo e(route('admin.dashboard.index')); ?>"><?php echo e(trans('messages.Dashboard')); ?></a>
                </li>
                <li class="breadcrumb-item" aria-current="page"><?php echo e(trans('messages.custom_role')); ?></li>
            </ol>
        </nav>

        <!-- Content Row -->
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <?php echo e(trans('messages.role_form')); ?>

                    </div>
                    <div class="card-body">
                        <form action="<?php echo e(route('admin.custom-role.create')); ?>" method="post">
                            <?php echo csrf_field(); ?>
                            <div class="form-group">
                                <label for="name"><?php echo e(trans('messages.role_name')); ?></label>
                                <input type="text" name="name" class="form-control" id="name"
                                       aria-describedby="emailHelp"
                                       placeholder="Ex : Store" required>
                            </div>

                            <label for="name"><?php echo e(trans('messages.module_permission')); ?> : </label>
                            <hr>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group form-check">
                                        <input type="checkbox" name="modules[]" value="order" class="form-check-input"
                                               id="order">
                                        <label class="form-check-label" for="order"><?php echo e(trans('messages.Order')); ?></label>
                                    </div>
                                </div>
                                <!--order-->

                                <div class="col-md-3">
                                    <div class="form-group form-check">
                                        <input type="checkbox" name="modules[]" value="product" class="form-check-input"
                                               id="product">
                                        <label class="form-check-label"
                                               for="product"><?php echo e(trans('messages.Products')); ?></label>
                                    </div>
                                </div>
                                <!--product-->

                                <div class="col-md-3">
                                    <div class="form-group form-check">
                                        <input type="checkbox" name="modules[]" value="marketing"
                                               class="form-check-input"
                                               id="marketing">
                                        <label class="form-check-label"
                                               for="marketing"><?php echo e(trans('messages.marketing')); ?></label>
                                    </div>
                                </div>
                                <!--marketing-->

                                <div class="col-md-3">
                                    <div class="form-group form-check">
                                        <input type="checkbox" name="modules[]" value="business_section"
                                               class="form-check-input"
                                               id="business_section">
                                        <label class="form-check-label"
                                               for="business_section"><?php echo e(trans('messages.business_section')); ?></label>
                                    </div>
                                </div>
                                <!--business_settings-->
                            </div>

                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group form-check">
                                        <input type="checkbox" name="modules[]" value="user_section"
                                               class="form-check-input"
                                               id="user_section">
                                        <label class="form-check-label"
                                               for="user_section"><?php echo e(trans('messages.user_section')); ?></label>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group form-check">
                                        <input type="checkbox" name="modules[]" value="support_section"
                                               class="form-check-input"
                                               id="support_section">
                                        <label class="form-check-label"
                                               for="support_section"><?php echo e(trans('messages.support_section')); ?></label>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group form-check">
                                        <input type="checkbox" name="modules[]" value="business_settings"
                                               class="form-check-input"
                                               id="business_settings">
                                        <label class="form-check-label"
                                               for="business_settings"><?php echo e(trans('messages.business_settings')); ?></label>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group form-check">
                                        <input type="checkbox" name="modules[]" value="web_&_app_settings"
                                               class="form-check-input"
                                               id="web_&_app_settings">
                                        <label class="form-check-label"
                                               for="web_&_app_settings"><?php echo e(trans('messages.web_&_app_settings')); ?></label>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group form-check">
                                        <input type="checkbox" name="modules[]" value="report" class="form-check-input"
                                               id="report">
                                        <label class="form-check-label"
                                               for="report"><?php echo e(trans('messages.Report')); ?></label>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group form-check">
                                        <input type="checkbox" name="modules[]" value="employee_section" class="form-check-input"
                                               id="employee_section">
                                        <label class="form-check-label"
                                               for="employee_section"><?php echo e(trans('messages.employee_section')); ?></label>
                                    </div>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary"><?php echo e(trans('messages.Submit')); ?></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="row" style="margin-top: 20px">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5><?php echo e(trans('messages.roles_table')); ?></h5>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                <tr>
                                    <th scope="col">SL#</th>
                                    <th scope="col"><?php echo e(trans('messages.role_name')); ?></th>
                                    <th scope="col"><?php echo e(trans('messages.modules')); ?></th>
                                    <th scope="col"><?php echo e(trans('messages.created_at')); ?></th>
                                    <th scope="col"><?php echo e(trans('messages.status')); ?></th>
                                    <th scope="col" style="width: 50px"><?php echo e(trans('messages.action')); ?></th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $__currentLoopData = $rl; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k=>$r): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <th scope="row"><?php echo e($k+1); ?></th>
                                        <td><?php echo e($r['name']); ?></td>
                                        <td class="text-capitalize">
                                            <?php if($r['module_access']!=null): ?>
                                                <?php $__currentLoopData = (array)json_decode($r['module_access']); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $m): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <?php echo e(str_replace('_',' ',$m)); ?> <br>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php endif; ?>
                                        </td>
                                        <td><?php echo e(date('d-M-y',strtotime($r['created_at']))); ?></td>
                                        <td><?php echo e(\App\CPU\Helpers::status($r['status'])); ?></td>
                                        <td>
                                            <a href="<?php echo e(route('admin.custom-role.update',[$r['id']])); ?>"
                                               class="btn btn-primary btn-sm">
                                                <?php echo e(trans('messages.Edit')); ?>

                                            </a>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>
    <!-- Page level plugins -->
    <script src="<?php echo e(asset('public/assets/back-end')); ?>/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="<?php echo e(asset('public/assets/back-end')); ?>/vendor/datatables/dataTables.bootstrap4.min.js"></script>
    <!-- Page level custom scripts -->
    <script>
        $(document).ready(function () {
            $('#dataTable').DataTable();
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.back-end.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/jj/Desktop/MrZ/WebVision/AdamG/Admin/resources/views/admin-views/custom-role/create.blade.php ENDPATH**/ ?>