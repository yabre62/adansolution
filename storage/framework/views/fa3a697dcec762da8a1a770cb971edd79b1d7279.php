<?php if($data['data_from']!='search'): ?>

    <ul class="pagination">
        <?php if($data['page_no']-1!=0): ?>
            <li class="page-item">
                <a class="page-link"
                   href="<?php echo e(route('products',['id'=> $data['id'],'data_from'=>$data['data_from'],'sort_by'=>$data['sort_by'],'min_price'=>$data['min_price'],'max_price'=>$data['max_price'],'page'=>$data['page_no']-1])); ?>">
                    <i class="czi-arrow-left mr-2"></i>
                    Prev
                </a>
            </li>
        <?php endif; ?>
    </ul>
    <ul class="pagination">
        <?php for($page=1;$page<=$data['page_number'];$page++): ?>
            <li class="page-item <?php echo e($data['page_no']==$page?'active':''); ?> d-sm-block">
                <a class="page-link"
                   href="<?php echo e(route('products',['id'=> $data['id'],'data_from'=>$data['data_from'],'sort_by'=>$data['sort_by'],'min_price'=>$data['min_price'],'max_price'=>$data['max_price'],'page'=>$page])); ?>">
                    <?php echo e($page); ?>

                </a>
            </li>
        <?php endfor; ?>
    </ul>
    <ul class="pagination">
        <?php if($data['page_no']+1<=$data['page_number']): ?>
            <li class="page-item">
                <a class="page-link"
                   href="<?php echo e(route('products',['id'=> $data['id'],'data_from'=>$data['data_from'],'sort_by'=>$data['sort_by'],'min_price'=>$data['min_price'],'max_price'=>$data['max_price'],'page'=>$data['page_no']+1])); ?>"
                   aria-label="Next">
                    Next<i class="czi-arrow-right ml-2"></i>
                </a>
            </li>
        <?php endif; ?>
    </ul>

<?php else: ?>

    <ul class="pagination">
        <?php if($data['page_no']-1!=0): ?>
            <li class="page-item">
                <a class="page-link"
                   href="<?php echo e(route('products',['name'=> $data['name'],'data_from'=>$data['data_from'],'sort_by'=>$data['sort_by'],'min_price'=>$data['min_price'],'max_price'=>$data['max_price'],'page'=>$data['page_no']-1])); ?>">
                    <i class="czi-arrow-left mr-2"></i>
                    Prev
                </a>
            </li>
        <?php endif; ?>
    </ul>
    <ul class="pagination">
        <?php for($page=1;$page<=$data['page_number'];$page++): ?>
            <li class="page-item <?php echo e($data['page_no']==$page?'active':''); ?> d-sm-block">
                <a class="page-link"
                   href="<?php echo e(route('products',['name'=> $data['name'],'data_from'=>$data['data_from'],'sort_by'=>$data['sort_by'],'min_price'=>$data['min_price'],'max_price'=>$data['max_price'],'page'=>$page])); ?>">
                    <?php echo e($page); ?>

                </a>
            </li>
        <?php endfor; ?>
    </ul>
    <ul class="pagination">
        <?php if($data['page_no']+1<=$data['page_number']): ?>
            <li class="page-item">
                <a class="page-link"
                   href="<?php echo e(route('products',['name'=> $data['name'],'data_from'=>$data['data_from'],'sort_by'=>$data['sort_by'],'min_price'=>$data['min_price'],'max_price'=>$data['max_price'],'page'=>$data['page_no']+1])); ?>"
                   aria-label="Next">
                    Next<i class="czi-arrow-right ml-2"></i>
                </a>
            </li>
        <?php endif; ?>
    </ul>

<?php endif; ?>


<?php /**PATH /home/jj/Desktop/MrZ/WebVision/AdamG/Admin/resources/views/web-views/products/_ajax-paginator.blade.php ENDPATH**/ ?>