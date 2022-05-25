<?php $__env->startSection('title','Seller product sale Report'); ?>

<?php $__env->startPush('css_or_js'); ?>
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <style>
        .dataTables_info {
            margin-bottom: 20px;
            border-top: 1px solid;
            padding-top: 20px;
        }
    </style>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <div class="content container-fluid">
        <!-- Page Header -->
        <div class="page-header">
            <!-- Nav -->
            <div class="js-nav-scroller hs-nav-scroller-horizontal">
                <ul class="nav nav-tabs page-header-tabs" id="projectsTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" href="javascript:">Seller product sale report</a>
                    </li>
                </ul>
            </div>
            <!-- End Nav -->
        </div>
        <!-- End Page Header -->

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <form style="width: 100%;" id="filter-form">
                            <?php echo csrf_field(); ?>
                            <div class="row">
                                <div class="col-1">
                                    <div class="form-group ">
                                        <label for="exampleInputEmail1">Seller</label>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <select
                                            class="js-select2-custom form-control"
                                            name="seller_id">
                                            <option value="all">All</option>
                                            <?php $__currentLoopData = \App\Model\Seller::where(['status'=>'approved'])->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $seller): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($seller['id']); ?>">
                                                    <?php echo e($seller['f_name']); ?> <?php echo e($seller['l_name']); ?>

                                                </option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-1">
                                    <div class="form-group ">
                                        <label for="exampleInputEmail1">Category</label>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <select
                                            class="js-select2-custom form-control"
                                            name="category_id">
                                            <option value="all">All</option>
                                            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($c['id']); ?>" <?php echo e(old('name')==$c['id']? 'selected': ''); ?>>
                                                    <?php echo e($c['name']); ?>

                                                </option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-2">
                                    <button type="button" onclick="filter_form()" class="btn btn-primary btn-block">
                                        Filter
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="card-body" id="products-table">
                        <?php echo $__env->make('admin-views.report.partials.products-table',['products_array'=>$products_array], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Stats -->
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>
    <script>
        function filter_form() {
            var formData = new FormData(document.getElementById('filter-form'));
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.post({
                url: '<?php echo e(route('admin.report.sps-filter')); ?>',
                data: formData,
                contentType: false,
                processData: false,
                beforeSend: function () {
                    $('#loading').show();
                },
                success: function (data) {
                    $('#products-table').html(data.view)
                },
                complete: function () {
                    $('#loading').hide();
                },
            });
        };

        $(".js-example-theme-single").select2({
            theme: "classic"
        });

        $(".js-example-responsive").select2({
            width: 'resolve'
        });
    </script>
<?php $__env->stopPush(); ?>

<?php $__env->startPush('script_2'); ?>
    <script type="text/javascript">
        $(document).ready(function () {
            filter_form();
            $('input').addClass('form-control');
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.back-end.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/jj/Desktop/MrZ/WebVision/AdamG/Admin/resources/views/admin-views/report/seller-product-sale.blade.php ENDPATH**/ ?>