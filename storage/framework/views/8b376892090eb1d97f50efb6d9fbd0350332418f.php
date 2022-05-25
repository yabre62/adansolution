<?php $__env->startSection('title','Shop view'); ?>
<?php $__env->startPush('css_or_js'); ?>
    <!-- Custom styles for this page -->
    <link href="<?php echo e(asset('public/assets/back-end')); ?>/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
<div class="content container-fluid"> 
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3 class="h3 mb-0  "><?php echo e(trans('messages.my_shop')); ?> <?php echo e(trans('messages.Info')); ?> </h3>
            </div>
            <div class="card-body">
                <div class="row mt-2">
                    <?php if($shop->image=='def.png'): ?>
                    <div class="col-md-4">
                        <img height="200" width="200"  class="rounded-circle border"
                        src="<?php echo e(asset('public/assets/back-end')); ?>/img/shop.png"
                        alt="User Pic">
                    </div>
                    
                    <?php else: ?>
                    
                        <div class="col-md-4">
                            <img src="<?php echo e(asset('shop/'.$shop->image)); ?>" class="rounded-circle border"
                            height="200" width="200" alt="">
                        </div>

                    
                    <?php endif; ?>
                 
                  
                    <div class="col-md-8 mt-4">
                        <h4><?php echo e(trans('messages.Name')); ?> : <?php echo e($shop->name); ?></h4>
                        <h6><?php echo e(trans('messages.Phone')); ?> : <?php echo e($shop->contact); ?></h6>
                        <h6><?php echo e(trans('messages.address')); ?> : <?php echo e($shop->address); ?></h6>
                        <a class="btn btn-primary" href="<?php echo e(route('seller.shop.edit',[$shop->id])); ?>">EDIT</a>
                    </div>
                </div>
                
               
            </div>
        </div>
    </div>
</div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>
    <!-- Page level plugins -->
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.back-end.app-seller', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/jj/Desktop/MrZ/WebVision/AdamG/Admin/resources/views/seller-views/shop/shopInfo.blade.php ENDPATH**/ ?>