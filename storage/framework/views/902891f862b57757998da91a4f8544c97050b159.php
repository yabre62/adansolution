<script src="<?php echo e(asset('public/assets/back-end/js/croppie.js')); ?>"></script>
<script>
    function Validate(file) {
        var x;
        var le = file.length;
        var poin = file.lastIndexOf(".");
        var accu1 = file.substring(poin, le);
        var accu = accu1.toLowerCase();
        if ((accu != '.png') && (accu != '.jpg') && (accu != '.jpeg')) {
            x = 1;
            return x;
        } else {
            x = 0;
            return x;
        }
    }

    function cropView(id) {
        $("#crop-" + id).show();
    }

    function removeImage(route, id) {
        $(function () {
            $.ajax({
                type: 'get',
                url: route,
                dataType: 'json',
                success: function (data) {
                    if (data.success === 1) {
                        $("#img-suc-" + id).hide();
                        $("#img-err-" + id).hide();
                        $("#crop-" + id).hide();
                        $("#show-images-" + id).html(data.images);
                        $("#image-count-" + id).text('( ' + data.count + ' )');
                    } else if (data.success === 0) {
                        $("#img-suc-" + id).hide();
                        $("#img-err-" + id).show();
                    }
                },
            });
        });
    }
</script>

<script>
    var resize_<?php echo e(str_replace('-','_',$id)); ?> = $('#upload-image-div-<?php echo e($id); ?>').croppie({
        enableExif: true,
        enableOrientation: true,
        viewport: { // Default { width: 100, height: 100, type: 'square' }//1340 X 595
            width: '<?php echo e($width); ?>',
            height: '<?php echo e($height); ?>',
            type: 'square' //square
        },
        boundary: {
            width: '<?php echo e($width+10); ?>',
            height: '<?php echo e($height+10); ?>',
        }
    });

    $('#image-set-<?php echo e($id); ?>').on('change', function () {

        var file = $('#image-set-<?php echo e($id); ?>').val();
        var file1 = Validate(file);
        if (file1 == 1) {
            $("#crop-<?php echo e($id); ?>").hide();
            $(this).val('');
            toastr.error('This is not an image file.', {
                CloseButton: true,
                ProgressBar: true
            });
        } else {
            $("#crop-<?php echo e($id); ?>").show();
            $('.image-set-<?php echo e($id); ?>').hide();
            $('.btn-upload-image-<?php echo e($id); ?>').show();
            var reader_<?php echo e(str_replace('-','_',$id)); ?> = new FileReader();
            reader_<?php echo e(str_replace('-','_',$id)); ?>.onload = function (e) {
                resize_<?php echo e(str_replace('-','_',$id)); ?>.croppie('bind', {
                    url: e.target.result
                }).then(function () {
                    /*console.log('jQuery bind complete');*/
                });
            }
            reader_<?php echo e(str_replace('-','_',$id)); ?>.readAsDataURL(this.files[0]);
        }

    });

    $('.btn-upload-image-<?php echo e($id); ?>').on('click', function (e) {
        e.preventDefault();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        resize_<?php echo e(str_replace('-','_',$id)); ?>.croppie('result', {
            type: 'canvas',
            size: 'viewport'
        }).then(function (img) {
            $.ajax({
                type: 'post',
                url: '<?php echo e($route); ?>',
                data: {
                    "image": img,
                    "folder": '<?php echo e(str_replace('-','_',$id)); ?>',
                    "multi_image": '<?php echo e($multi_image); ?>'
                },
                dataType: 'JSON',
                beforeSend: function () {
                    $("#loading").show();
                },
                success: function (data) {
                    if (data.success === 1) {
                        $("#img-suc-<?php echo e($id); ?>").show();
                        $("#img-err-<?php echo e($id); ?>").hide();
                        $("#crop-<?php echo e($id); ?>").hide();
                        $(".btn-upload-image-<?php echo e($id); ?>").hide();
                        $("#show-images-<?php echo e($id); ?>").html(data.images);
                        $("#image-count-<?php echo e($id); ?>").text(data.count + ' ' + 'image selected.');
                    } else if (data.success === 0) {
                        $("#img-suc-<?php echo e($id); ?>").hide();
                        $("#img-err-<?php echo e($id); ?>").show();
                        $(".btn-upload-image-<?php echo e($id); ?>").hide();
                    }
                },
                error: function () {
                    $("#img-suc-<?php echo e($id); ?>").hide();
                    $("#img-err-<?php echo e($id); ?>").show();
                },
                complete: function () {
                    $("#loading").hide();
                    $("#loading-<?php echo e($id); ?>").hide();
                },
            });
        });
    });

</script>
<?php /**PATH /home/jj/Desktop/MrZ/WebVision/AdamG/Admin/resources/views/shared-partials/image-process/_script.blade.php ENDPATH**/ ?>