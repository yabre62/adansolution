<?php $__env->startSection('title','Shop Edit'); ?>
<?php $__env->startPush('css_or_js'); ?>
    <!-- Custom styles for this page -->
    <link href="<?php echo e(asset('public/assets/back-end')); ?>/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
     <!-- Custom styles for this page -->
     <link href="<?php echo e(asset('public/assets/back-end/css/croppie.css')); ?>" rel="stylesheet">
     <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
     <style>
        @media(max-width:375px){
         #shop-image-modal .modal-content{
           width: 367px !important;
         margin-left: 0 !important;
     }

     }

@media(max-width:500px){
 #shop-image-modal .modal-content{
           width: 400px !important;
         margin-left: 0 !important;
     }
}
 </style>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('content'); ?>
    <!-- Content Row -->
    <div class="content container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h1 class="h3 mb-0 ">Edit Shop Info</h1>
                </div>
                <div class="card-body">
                    <form action="<?php echo e(route('seller.shop.update',[$shop->id])); ?>" method="post"
                          enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">Type Of Shop <span class="text-danger">*</span></label>
                                    <input type="text" name="type_of_shop" disabled value="<?php echo e($shop->type_of_shop); ?>" class="form-control" id="name"
                                            required>
                                </div>

                                <div class="form-group">
                                    <label for="name">Shop Name <span class="text-danger">*</span></label>
                                    <input type="text" name="name" value="<?php echo e($shop->name); ?>" class="form-control" id="name"
                                            required>
                                </div>

                                
                                <div class="form-group">
                                    <label for="name">Contact <span class="text-danger">*</span></label>
                                    <input type="text" name="contact" value="<?php echo e($shop->contact); ?>" class="form-control" id="name"
                                            required>
                                </div>
                                <div class="form-group">
                                    <label for="address">Address <span class="text-danger">*</span></label>
                                    <textarea type="text" rows="4" name="address" value="" class="form-control" id="address"
                                            required><?php echo e($shop->address); ?></textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name"><?php echo e(trans('messages.Upload')); ?> <?php echo e(trans('messages.image')); ?></label>
                                    <div class="custom-file">
                                        <input type="file" name="image" id="customFileUpload" class="custom-file-input"
                                            accept=".jpg, .png, .jpeg, .gif, .bmp, .tif, .tiff|image/*">
                                        <label class="custom-file-label" for="customFileUpload"><?php echo e(trans('messages.choose')); ?> <?php echo e(trans('messages.file')); ?></label>
                                    </div>
                                </div>
                                <center>
                                    <img style="width: auto;border: 1px solid; border-radius: 10px; max-height:200px;" id="viewer"
                                    onerror="this.src='<?php echo e(asset('public/assets/front-end/img/image-place-holder.png')); ?>'"
                                    src="<?php echo e(asset('shop/'.$shop->image)); ?>" alt="Product thumbnail"/>
                                </center>
                            </div>
                            <div class="col-md-6 mb-4 mt-2">
                                <div class="form-group">
                                    <label for="name"><?php echo e(trans('messages.Upload')); ?> <?php echo e(trans('messages.Banner')); ?> <small style="color: red">Ratio : ( 6:1 )</small></label>
                                    <div class="custom-file">
                                        <input type="file" name="banner" id="BannerUpload" class="custom-file-input"
                                               accept=".jpg, .png, .jpeg, .gif, .bmp, .tif, .tiff|image/*">
                                        <label class="custom-file-label" for="BannerUpload"><?php echo e(trans('messages.choose')); ?> <?php echo e(trans('messages.file')); ?></label>
                                    </div>
                                </div>
                                <center>
                                    <img style="width: auto; height:auto; border: 1px solid; border-radius: 10px; max-height:200px" id="viewerBanner"
                                         onerror="this.src='<?php echo e(asset('public/assets/front-end/img/image-place-holder.png')); ?>'"
                                         src="<?php echo e(asset('shop/banner/'.$shop->banner)); ?>" alt="Product thumbnail"/>
                                </center>
                            </div>
                        </div>



                        <button type="submit" class="btn btn-primary" id="btn_update">Update</button>
                        <a class="btn btn-danger" href="<?php echo e(route('seller.shop.view')); ?>">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!--modal-->
    <?php echo $__env->make('shared-partials.image-process._image-crop-modal',['modal_id'=>'shop-image-modal'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!--modal-->
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>
    <!-- Page level plugins -->
    <script src="<?php echo e(asset('public/assets/back-end/js/croppie.js')); ?>"></script>
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

        function readBannerURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#viewerBanner').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#customFileUpload").change(function () {
            readURL(this);
        });

        $("#BannerUpload").change(function () {
            readBannerURL(this);
        });
   </script>



    <?php echo $__env->make('shared-partials.image-process._script',[
     'id'=>'shop-image-modal',
     'height'=>300,
     'width'=>300,
     'multi_image'=>false,
     'route'=>route('image-upload')
     ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.back-end.app-seller', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/jj/Desktop/MrZ/WebVision/AdamG/Admin/resources/views/seller-views/shop/edit.blade.php ENDPATH**/ ?>