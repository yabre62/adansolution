<?php $__env->startSection('title','Brand Add'); ?>

<?php $__env->startPush('css_or_js'); ?>
    <link href="<?php echo e(asset('public/assets/back-end')); ?>/css/select2.min.css" rel="stylesheet"/>
    <link href="<?php echo e(asset('public/assets/back-end/css/croppie.css')); ?>" rel="stylesheet">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <!-- Custom styles for this page -->
    <link href="<?php echo e(asset('public/assets/back-end')); ?>/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
<div class="content container-fluid">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo e(route('admin.dashboard.index')); ?>"><?php echo e(trans('messages.Dashboard')); ?></a></li>
            <li class="breadcrumb-item" aria-current="page"><?php echo e(trans('messages.brand')); ?></li>
        </ol>
    </nav>

    <!-- Content Row -->
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <?php echo e(trans('messages.brand_form')); ?>

                </div>
                <div class="card-body">
                    <form action="<?php echo e(route('admin.brand.add-new')); ?>" method="post" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name"><?php echo e(trans('messages.name')); ?></label>
                                    <input type="text" name="name" required class="form-control" id="name" value="<?php echo e(old('name')); ?>" placeholder="Ex : LUX">
                                </div>
                                <div class="form-group">
                                    <label for="name"><?php echo e(trans('messages.brand_logo')); ?></label><span class="badge badge-soft-danger">( ratio 1:1 )</span>
                                    <div class="custom-file">
                                        <input type="file" name="image" id="customFileUpload" class="custom-file-input"
                                            accept=".jpg, .png, .jpeg, .gif, .bmp, .tif, .tiff|image/*" required>
                                        <label class="custom-file-label" for="customFileUpload"><?php echo e(trans('messages.choose')); ?> <?php echo e(trans('messages.file')); ?></label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <center>
                                    <img style="border-radius: 10px; max-height:200px;" id="viewer"
                                        src="<?php echo e(asset('public\assets\back-end\img\400x400\img2.jpg')); ?>" alt="banner image"/>
                                </center>
                            </div>
                        </div>


                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary"><?php echo e(trans('messages.save')); ?></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>
    <script src="<?php echo e(asset('public/assets/back-end')); ?>/js/select2.min.js"></script>
    <script>
        $(".js-example-theme-single").select2({
            theme: "classic"
        });

        $(".js-example-responsive").select2({
            width: 'resolve'
        });
    </script>

    <script>
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#viewer').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#customFileUpload").change(function () {
            readURL(this);
        });


        $(document).ready(function() {
            $('#dataTable').DataTable();
        });
        $(document).on('click', '.delete', function () {
            var id = $(this).attr("id");
            Swal.fire({
                title: 'Are you sure to delete is brand?',
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

<?php echo $__env->make('layouts.back-end.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/jj/Desktop/MrZ/WebVision/AdamG/Admin/resources/views/admin-views/brand/add-new.blade.php ENDPATH**/ ?>