<?php if(isset($folder) && session($folder)!=null): ?>
    <?php $__currentLoopData = session($folder); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k=>$i): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="col-md-4" style="margin-bottom: 10px">
            <img style="height:60%!important" src="<?php echo e($i['image']); ?>"/>
            <div style="width: 70%!important; background-color: white ">
                <a onclick="removeImage('<?php echo e($i['remove_route']); ?>'+'/'+'<?php echo e($k); ?>'+'/'+'<?php echo e($folder); ?>','<?php echo e($modal_id); ?>')"
                   href="javascript:" class="call-when-done">
                    <center style="color: #ff6161">
                        <i class="fa fa-trash"></i>
                    </center>
                </a>
            </div>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?>
<?php /**PATH /home/jj/Desktop/MrZ/WebVision/AdamG/Admin/resources/views/shared-partials/image-process/_show-images.blade.php ENDPATH**/ ?>