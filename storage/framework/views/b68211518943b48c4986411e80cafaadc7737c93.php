<style>
    input[type="file"] {
        display: none;
    }

    .custom-file-upload {
        margin-left: 38%;
        border: 1px solid #ccc;
        display: inline-block;
        padding: 6px 12px;
        cursor: pointer;
    }
</style>

<?php if(!isset($width)): ?>
    <?php ($width=516); ?>
<?php endif; ?>

<?php if(!isset($margin_left)): ?>
    <?php ($margin_left='0%'); ?>
<?php endif; ?>

<div class="modal fade" id="<?php echo e($modal_id); ?>" tabindex="-1" role="dialog" aria-labelledby=""
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content" style="width: <?php echo e($width+66); ?>px;margin-left: <?php echo e($margin_left); ?>">
            <div class="modal-header">
                <h5 class="modal-title text-capitalize" id=""><?php echo e(str_replace('-',' ',$modal_id)); ?></h5>
            </div>
            <div class="modal-body">

                <div class="alert alert-block alert-success" id="img-suc-<?php echo e($modal_id); ?>"
                     style="display: none;">
                    <i class="ace-icon fa fa-check green"></i>
                    <strong class="green">
                        Image uploaded successfully.
                    </strong>
                </div>

                <div class="alert alert-block alert-danger" id="img-err-<?php echo e($modal_id); ?>"
                     style="display: none;">
                    <strong class="red">
                        Error , Something went wrong !
                    </strong>
                </div>

                <div class="row" id="show-images-<?php echo e($modal_id); ?>">
                    <?php echo $__env->make('shared-partials.image-process._show-images',['folder'=>str_replace('-','_',$modal_id)], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>

                <form>
                    <div class="form-group" style="display: none" id="crop-<?php echo e($modal_id); ?>">
                        <div id="upload-image-div-<?php echo e($modal_id); ?>"></div>
                    </div>
                    <div class="form-group" id="select-img-<?php echo e($modal_id); ?>">
                        <label for="image-set-<?php echo e($modal_id); ?>" class="custom-file-upload">
                            Choose Image <i class="fa fa-plus-circle"></i>
                        </label>
                        <input type="file" name="image" onchange="cropView('<?php echo e($modal_id); ?>')"
                               id="image-set-<?php echo e($modal_id); ?>" required>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">
                    Close
                </button>
                <button type="button" class="btn btn-primary btn-upload-image-<?php echo e($modal_id); ?>" style="display: none">
                    Add
                </button>
            </div>
        </div>
    </div>
</div>
<?php /**PATH /home/jj/Desktop/MrZ/WebVision/AdamG/Admin/resources/views/shared-partials/image-process/_image-crop-modal.blade.php ENDPATH**/ ?>