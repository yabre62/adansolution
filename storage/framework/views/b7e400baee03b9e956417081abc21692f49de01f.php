<?php $__env->startSection('message'); ?>
    <style>
        .for-margin {
            margin: auto;

            margin-bottom: 10%;
        }

        .for-margin {

        }

        .page-not-found {
            margin-top: 30px;
            font-weight: 600;
            text-align: center;
        }
    </style>
    <div class="container ">
        <div class="col-md-3"></div>
        <div class="col-md-6 for-margin">
            <div class="for-image">
                <img style="" src="<?php echo e(asset("png/404.png")); ?>" alt="">
            </div>
            <h2 class="page-not-found">Page NoN Trouvée</h2>

            <p style="text-align: center;">We are sorry, the page you requested could not be found <br> Plese go back to
                the homepage</p>
            <div style="text-align: center;">
                <a class="btn btn-primary" href="<?php echo e(route('home')); ?>"> Accueil</a>
            </div>

        </div>
        <div class="col-md-3"></div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('errors::minimal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/jj/Desktop/MrZ/WebVision/AdamG/Admin/resources/views/errors/404.blade.php ENDPATH**/ ?>