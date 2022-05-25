<?php $__env->startSection('title','Brand List'); ?>

<?php $__env->startPush('css_or_js'); ?>

<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <div class="content container-fluid">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo e(route('admin.dashboard.index')); ?>"><?php echo e(trans('messages.Dashboard')); ?></a>
                </li>
                <li class="breadcrumb-item" aria-current="page"><?php echo e(trans('messages.Dashboard')); ?></li>
            </ol>
        </nav>
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-2">
            <h1 class="h3 mb-0 text-black-50"><?php echo e(trans('messages.brand_list')); ?></h1>
        </div>

        <div class="row" style="margin-top: 20px">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5><?php echo e(trans('messages.brand_table')); ?></h5>
                    </div>
                    <div class="card-body" style="padding: 0">
                        <div class="table-responsive">
                            <table
                                class="table table-borderless table-thead-bordered table-nowrap table-align-middle card-table">
                                <thead class="thead-light">
                                <tr>
                                    <th scope="col" style="width: 100px">
                                        <?php echo e(trans('messages.brand')); ?> <?php echo e(trans('messages.ID')); ?>

                                    </th>
                                    <th scope="col"><?php echo e(trans('messages.name')); ?></th>
                                    <th scope="col"><?php echo e(trans('messages.image')); ?></th>
                                    <th scope="col" style="width: 100px" class="text-center">
                                        <?php echo e(trans('messages.action')); ?>

                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $__currentLoopData = $br; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k=>$b): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td class="text-center"><?php echo e($b['id']); ?></td>
                                        <td><?php echo e($b['name']); ?></td>
                                        <td>
                                            <img style="width: 60px;height: 60px"
                                                 onerror="this.src='<?php echo e(asset('public/assets/front-end/img/image-place-holder.png')); ?>'"
                                                 src="<?php echo e(asset('brand')); ?>/<?php echo e($b['image']); ?>">
                                        </td>
                                        <td>
                                            <a class="btn btn-primary btn-sm"
                                               href="<?php echo e(route('admin.brand.update',[$b['id']])); ?>">
                                                <i class="tio-edit"></i> <?php echo e(trans('messages.Edit')); ?>

                                            </a>
                                            <a class="btn btn-danger btn-sm delete"
                                               id="<?php echo e($b['id']); ?>">
                                                <i class="tio-add-to-trash"></i> <?php echo e(trans('messages.Delete')); ?>

                                            </a>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card-footer">
                        <?php echo e($br->links()); ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>
    <script>
        $(document).on('click', '.delete', function () {
            var id = $(this).attr("id");
            Swal.fire({
                title: 'Are you sure delete this brand?',
                text: "You won't be able to revert this!",
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.value) {
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                        }
                    });
                    $.ajax({
                        url: "<?php echo e(route('admin.brand.delete')); ?>",
                        method: 'POST',
                        data: {id: id},
                        success: function () {
                            toastr.success('Brand deleted successfully');
                            location.reload();
                        }
                    });
                }
            })
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.back-end.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/jj/Desktop/MrZ/WebVision/AdamG/Admin/resources/views/admin-views/brand/list.blade.php ENDPATH**/ ?>