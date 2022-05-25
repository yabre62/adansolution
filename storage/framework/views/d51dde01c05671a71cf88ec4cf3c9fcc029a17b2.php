<?php $__env->startSection('title','Language'); ?>
<?php $__env->startPush('css_or_js'); ?>
    <!-- Custom styles for this page -->
    <link href="<?php echo e(asset('public/assets/back-end')); ?>/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
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

    </style>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <div class="content container-fluid">
        <!-- Page Heading -->
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo e(route('admin.dashboard.index')); ?>"><?php echo e(trans('messages.Dashboard')); ?></a>
                </li>
                <li class="breadcrumb-item" aria-current="page"><?php echo e(trans('messages.language_setting')); ?></li>
            </ol>
        </nav>

        <div class="row" style="margin-top: 20px">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5><?php echo e(trans('messages.language_table')); ?></h5>
                        <button class="btn btn-primary btn-icon-split float-right" data-toggle="modal"
                                data-target="#lang-modal">
                            <i class="tio-add-circle"></i>
                            <span class="text"><?php echo e(trans('messages.add_new_language')); ?></span>
                        </button>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="dataTable" class="display table table-hover " style="width:100%">
                                <thead>
                                <tr>
                                    <th scope="col"><?php echo e(trans('messages.SL#')); ?></th>
                                    <th scope="col"><?php echo e(trans('messages.Id')); ?></th>
                                    <th scope="col"><?php echo e(trans('messages.name')); ?></th>
                                    <th scope="col"><?php echo e(trans('messages.Code')); ?>Code</th>
                                    <th scope="col"><?php echo e(trans('messages.status')); ?></th>
                                    <th scope="col" style="width: 100px" class="text-center"><?php echo e(trans('messages.action')); ?></th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php ($language=App\Model\BusinessSetting::where('type','language')->first()); ?>
                                <?php $__currentLoopData = json_decode($language['value'],true); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key =>$data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($key+1); ?></td>
                                        <td><?php echo e($data['id']); ?></td>
                                        <td><?php echo e($data['name']); ?></td>
                                        <td><?php echo e($data['code']); ?></td>
                                        <td>
                                            <?php if($data['code']!='en'): ?>
                                                <label class="switch">
                                                    <input type="checkbox"
                                                           onclick="updateStatus('<?php echo e(route('admin.business-settings.language.update-status')); ?>','<?php echo e($data['code']); ?>')"
                                                           class="status" <?php echo e($data['status']==1?'checked':''); ?>>
                                                    <span class="slider round"></span>
                                                </label>
                                            <?php else: ?>
                                                <label class="badge-soft-success">Active</label>
                                            <?php endif; ?>
                                        </td>
                                        <td class="text-center">
                                            <?php if($data['code']!='en'): ?>
                                                <div class="dropdown float-right">
                                                    <button class="btn btn-seconary btn-sm dropdown-toggle"
                                                            type="button"
                                                            id="dropdownMenuButton" data-toggle="dropdown"
                                                            aria-haspopup="true"
                                                            aria-expanded="false">
                                                        <i class="tio-settings"></i>
                                                    </button>
                                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                        
                                                        
                                                    </div>
                                                </div>
                                            <?php else: ?>
                                                <label class="badge badge-soft-success">Default</label>
                                            <?php endif; ?>
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

        <div class="modal fade" id="lang-modal" tabindex="-1" role="dialog"
             aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel"><?php echo e(trans('messages.new_language')); ?></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="<?php echo e(route('admin.business-settings.language.add-new')); ?>" method="post">
                        <?php echo csrf_field(); ?>
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="recipient-name"
                                       class="col-form-label"><?php echo e(trans('messages.language')); ?> </label>
                                <input type="text" class="form-control" id="recipient-name" name="name">
                            </div>
                            <div class="form-group">
                                <label for="message-text"
                                       class="col-form-label"><?php echo e(trans('messages.language_code')); ?></label>
                                <select class="form-control" name="code">
                                  
                                </select>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary"
                                    data-dismiss="modal"><?php echo e(trans('messages.close')); ?></button>
                            <button type="submit" class="btn btn-primary"><?php echo e(trans('messages.Add')); ?> <i
                                    class="fa fa-plus"></i></button>
                        </div>
                    </form>
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
        // Call the dataTables jQuery plugin
        $(document).ready(function () {
            $('#dataTable').DataTable();
        });

        function updateStatus(route, code) {
            $.get({
                url: route,
                data: {
                    code: code,
                },
                success: function (data) {
                    /* console.log(data)*/
                }
            });
        }
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.back-end.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/jj/Desktop/MrZ/WebVision/AdamG/Admin/resources/views/admin-views/business-settings/language/index.blade.php ENDPATH**/ ?>