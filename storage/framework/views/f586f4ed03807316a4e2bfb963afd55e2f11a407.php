<style>
    .list-group-item li, a {
        color: <?php echo e($web_config['primary_color']); ?>;
    }

    .list-group-item li, a:hover {
        color: <?php echo e($web_config['secondary_color']); ?>;
    }
</style>
<ul class="list-group list-group-flush">
    <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <li class="list-group-item" onclick="$('.search_form').submit()">
            <a href="javascript:" onmouseover="$('.search-bar-input-mobile').val('<?php echo e($i['name']); ?>');$('.search-bar-input').val('<?php echo e($i['name']); ?>');">
                <?php echo e($i['name']); ?>

            </a>
        </li>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</ul>
<?php /**PATH /home/jj/Desktop/MrZ/WebVision/AdamG/Admin/resources/views/web-views/partials/_search-result.blade.php ENDPATH**/ ?>