<?php $__env->startSection('title','Dashboard'); ?>

<?php $__env->startPush('css_or_js'); ?>
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <style>
        .grid-card {
            border: 2px solid #00000012;
            border-radius: 10px;
            padding: 10px;
        }

        .label_1 {
            position: absolute;
            font-size: 10px;
            background: #FF4C29;
            color: #ffffff;
            width: 80px;
            padding: 2px;
            font-weight: bold;
            border-radius: 6px;
            text-align: center;
        }

        .center-div {
            text-align: center;
            border-radius: 6px;
            padding: 6px;
            border: 2px solid #8080805e;
        }
    </style>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <?php if(auth('admin')->user()->admin_role_id==1): ?>
        <div class="content container-fluid">
            <!-- Page Header -->
            <div class="page-header"
                 style="padding-bottom: 0!important;border-bottom: 0!important;margin-bottom: 1.25rem!important;">
                <div class="row align-items-center">
                    <div class="col-sm mb-2 mb-sm-0">
                        <h1 class="page-header-title"><?php echo e(trans('messages.Dashboard')); ?></h1>
                        <p>Bienvenue Administrateeur.</p>
                    </div>
                    <div class="col-sm mb-2 mb-sm-0" style="height: 25px">
                        <label class="badge badge-soft-success float-right">
                            Version Logicielle : 4.0
                        </label>
                    </div>
                </div>
            </div>
            <!-- End Page Header -->

            <div class="card mb-3">
                <div class="card-body">
                    <div class="row gx-2 gx-lg-3 mb-2">
                        <div class="col-9">
                            <h4><i style="font-size: 30px"
                                   class="tio-chart-bar-4"></i><?php echo e(__('messages.dashboard_order_statistics')); ?></h4>
                        </div>
                        <div class="col-3">
                            <select class="custom-select" name="statistics_type"
                                    onchange="order_stats_update(this.value)">
                                <option
                                    value="overall" <?php echo e(session()->has('statistics_type') && session('statistics_type') == 'overall'?'selected':''); ?>>
                                    Overall Statistics
                                </option>
                                <option
                                    value="today" <?php echo e(session()->has('statistics_type') && session('statistics_type') == 'today'?'selected':''); ?>>
                                    Today's Statistics
                                </option>
                                <option
                                    value="today" <?php echo e(session()->has('statistics_type') && session('statistics_type') == 'this_month'?'selected':''); ?>>
                                    This Month's Statistics
                                </option>
                            </select>
                        </div>
                    </div>
                    <div class="row gx-2 gx-lg-3" id="order_stats">
                        <?php echo $__env->make('admin-views.partials._dashboard-order-stats',['data'=>$data], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                </div>
            </div>

            <!-- End Stats -->
            <div class="row gx-2 gx-lg-3">
                <div class="col-lg-12 mb-3 mb-lg-12">
                    <!-- Card -->
                    <div class="card h-100">
                        <!-- Body -->
                        <div class="card-body">
                            <div class="row mb-4">
                                <div class="col-12 mb-3 border-bottom">
                                    <h5 class="card-header-title float-left mb-2">
                                        <i style="font-size: 30px" class="tio-chart-pie-1"></i>
                                        Earning statistics for business analytics
                                    </h5>
                                    <!-- Legend Indicators -->
                                    <h5 class="card-header-title float-right mb-2">This Year Earning
                                        <i style="font-size: 30px" class="tio-chart-bar-2"></i>
                                    </h5>
                                    <!-- End Legend Indicators -->
                                </div>
                                <div class="col-md-4 col-12 graph-border-1">
                                    <div class="mt-2 center-div">
                                    <span class="h6 mb-0">
                                        <i class="legend-indicator bg-primary"
                                           style="background-color: #FFC074!important;"></i>
                                        In-House Earning : <?php echo e(\App\CPU\BackEndHelper::set_symbol(\App\CPU\BackEndHelper::usd_to_currency(array_sum($inhouse_data)))); ?>

                                    </span>
                                    </div>
                                </div>
                                <div class="col-md-4 col-12 graph-border-1">
                                    <div class="mt-2 center-div">
                                      <span class="h6 mb-0">
                                          <i class="legend-indicator bg-success"
                                             style="background-color: #B6C867!important;"></i>
                                         Seller Earnings : <?php echo e(\App\CPU\BackEndHelper::set_symbol(\App\CPU\BackEndHelper::usd_to_currency(array_sum($seller_data)))); ?>

                                    </span>
                                    </div>
                                </div>
                                <div class="col-md-4 col-12 graph-border-1">
                                    <div class="mt-2 center-div">
                                      <span class="h6 mb-0">
                                          <i class="legend-indicator bg-danger"
                                             style="background-color: #01937C!important;"></i>
                                        Commission Earned : <?php echo e(\App\CPU\BackEndHelper::set_symbol(\App\CPU\BackEndHelper::usd_to_currency(array_sum($commission_data)))); ?>

                                    </span>
                                    </div>
                                </div>
                            </div>
                            <!-- End Row -->

                            <!-- Bar Chart -->
                            <div class="chartjs-custom">
                                <canvas id="updatingData" style="height: 20rem;"
                                        data-hs-chartjs-options='{
                            "type": "bar",
                            "data": {
                              "labels": ["Jan","Feb","Mar","April","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec"],
                              "datasets": [{
                                "data": [<?php echo e($inhouse_data[1]); ?>,<?php echo e($inhouse_data[2]); ?>,<?php echo e($inhouse_data[3]); ?>,<?php echo e($inhouse_data[4]); ?>,<?php echo e($inhouse_data[5]); ?>,<?php echo e($inhouse_data[6]); ?>,<?php echo e($inhouse_data[7]); ?>,<?php echo e($inhouse_data[8]); ?>,<?php echo e($inhouse_data[9]); ?>,<?php echo e($inhouse_data[10]); ?>,<?php echo e($inhouse_data[11]); ?>,<?php echo e($inhouse_data[12]); ?>],
                                "backgroundColor": "#FFC074",
                                "hoverBackgroundColor": "#FFC074",
                                "borderColor": "#FFC074"
                              },
                              {
                                "data": [<?php echo e($seller_data[1]); ?>,<?php echo e($seller_data[2]); ?>,<?php echo e($seller_data[3]); ?>,<?php echo e($seller_data[4]); ?>,<?php echo e($seller_data[5]); ?>,<?php echo e($seller_data[6]); ?>,<?php echo e($seller_data[7]); ?>,<?php echo e($seller_data[8]); ?>,<?php echo e($seller_data[9]); ?>,<?php echo e($seller_data[10]); ?>,<?php echo e($seller_data[11]); ?>,<?php echo e($seller_data[12]); ?>],
                                "backgroundColor": "#B6C867",
                                "borderColor": "#B6C867"
                              },
                              {
                                "data": [<?php echo e($commission_data[1]); ?>,<?php echo e($commission_data[2]); ?>,<?php echo e($commission_data[3]); ?>,<?php echo e($commission_data[4]); ?>,<?php echo e($commission_data[5]); ?>,<?php echo e($commission_data[6]); ?>,<?php echo e($commission_data[7]); ?>,<?php echo e($commission_data[8]); ?>,<?php echo e($commission_data[9]); ?>,<?php echo e($commission_data[10]); ?>,<?php echo e($commission_data[11]); ?>,<?php echo e($commission_data[12]); ?>],
                                "backgroundColor": "#01937C",
                                "borderColor": "#01937C"
                              }]
                            },
                            "options": {
                              "scales": {
                                "yAxes": [{
                                  "gridLines": {
                                    "color": "#e7eaf3",
                                    "drawBorder": false,
                                    "zeroLineColor": "#e7eaf3"
                                  },
                                  "ticks": {
                                    "beginAtZero": true,
                                    "stepSize": 50000,
                                    "fontSize": 12,
                                    "fontColor": "#97a4af",
                                    "fontFamily": "Open Sans, sans-serif",
                                    "padding": 10,
                                    "postfix": " <?php echo e(\App\CPU\BackEndHelper::currency_symbol()); ?>"
                                  }
                                }],
                                "xAxes": [{
                                  "gridLines": {
                                    "display": false,
                                    "drawBorder": false
                                  },
                                  "ticks": {
                                    "fontSize": 12,
                                    "fontColor": "#97a4af",
                                    "fontFamily": "Open Sans, sans-serif",
                                    "padding": 5
                                  },
                                  "categoryPercentage": 0.5,
                                  "maxBarThickness": "10"
                                }]
                              },
                              "cornerRadius": 2,
                              "tooltips": {
                                "prefix": " ",
                                "hasIndicator": true,
                                "mode": "index",
                                "intersect": false
                              },
                              "hover": {
                                "mode": "nearest",
                                "intersect": true
                              }
                            }
                          }'></canvas>
                            </div>
                            <!-- End Bar Chart -->
                        </div>
                        <!-- End Body -->
                    </div>
                    <!-- End Card -->
                </div>
            </div>

            <div class="row gx-2 gx-lg-3 mt-2">
                <div class="col-lg-6 mb-3">
                    <!-- Card -->
                    <div class="card h-100">
                        <!-- Header -->
                        <div class="card-header">
                            <h5 class="card-header-title">
                                <i class="tio-company"></i> Total Business Overview
                            </h5>
                            <i class="tio-chart-pie-1" style="font-size: 45px"></i>
                        </div>
                        <!-- End Header -->

                        <!-- Body -->
                        <div class="card-body" id="business-overview-board">
                            <!-- Chart -->
                            <div class="chartjs-custom mx-auto">
                                <canvas id="business-overview" class="mt-2"></canvas>
                            </div>
                            <!-- End Chart -->
                        </div>
                        <!-- End Body -->
                    </div>
                    <!-- End Card -->
                </div>

                <div class="col-lg-6 mb-3">
                    <!-- Card -->
                    <div class="card h-100">
                        <?php echo $__env->make('admin-views.partials._top-store-by-order',['top_store_by_order_received'=>$data['top_store_by_order_received']], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                    <!-- End Card -->
                </div>

                <div class="col-lg-6 mb-3">
                    <!-- Card -->
                    <div class="card h-100">
                        <?php echo $__env->make('admin-views.partials._top-selling-store',['top_store_by_earning'=>$data['top_store_by_earning']], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                    <!-- End Card -->
                </div>

                <div class="col-lg-6 mb-3">
                    <!-- Card -->
                    <div class="card h-100">
                        <?php echo $__env->make('admin-views.partials._top-selling-products',['top_sell'=>$data['top_sell']], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                    <!-- End Card -->
                </div>

                <div class="col-lg-6 mb-3">
                    <!-- Card -->
                    <div class="card h-100">
                        <?php echo $__env->make('admin-views.partials._most-rated-products',['most_rated_products'=>$data['most_rated_products']], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                    <!-- End Card -->
                </div>

                <div class="col-lg-6 mb-3">
                    <!-- Card -->
                    <div class="card h-100">
                        <?php echo $__env->make('admin-views.partials._top-customer',['top_customer'=>$data['top_customer']], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                    <!-- End Card -->
                </div>

            </div>
        </div>
    <?php else: ?>
        <div class="content container-fluid">
            <!-- Page Header -->
            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col-12 mb-2 mb-sm-0">
                        <h3 class="text-center" style="color: gray">Hi <?php echo e(auth('admin')->user()->name); ?>, Welcome to your dashboard.</h3>
                    </div>
                </div>
            </div>
            <!-- End Page Header -->
        </div>
    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>
    <script src="<?php echo e(asset('public/assets/back-end')); ?>/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="<?php echo e(asset('public/assets/back-end')); ?>/vendor/chart.js.extensions/chartjs-extensions.js"></script>
    <script
        src="<?php echo e(asset('public/assets/back-end')); ?>/vendor/chartjs-plugin-datalabels/dist/chartjs-plugin-datalabels.min.js"></script>
<?php $__env->stopPush(); ?>


<?php $__env->startPush('script_2'); ?>
    <script>
        // INITIALIZATION OF CHARTJS
        // =======================================================
        Chart.plugins.unregister(ChartDataLabels);

        $('.js-chart').each(function () {
            $.HSCore.components.HSChartJS.init($(this));
        });

        var updatingChart = $.HSCore.components.HSChartJS.init($('#updatingData'));
    </script>

    <script>
        var ctx = document.getElementById('business-overview');
        var myChart = new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: [
                    'Customer ( <?php echo e($data['customer']); ?> )',
                    'Store ( <?php echo e($data['store']); ?> )',
                    'Product ( <?php echo e($data['product']); ?> )',
                    'Order ( <?php echo e($data['order']); ?> )',
                    'Brand ( <?php echo e($data['brand']); ?> )',
                ],
                datasets: [{
                    label: 'Business',
                    data: ['<?php echo e($data['customer']); ?>', '<?php echo e($data['store']); ?>', '<?php echo e($data['product']); ?>', '<?php echo e($data['order']); ?>', '<?php echo e($data['brand']); ?>'],
                    backgroundColor: [
                        '#f49b01',
                        '#C84B31',
                        '#346751',
                        '#343A40',
                        '#7D5A50',
                    ],
                    hoverOffset: 4
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>

    <script>
        function order_stats_update(type) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.post({
                url: '<?php echo e(route('admin.dashboard.order-stats')); ?>',
                data: {
                    statistics_type: type
                },
                beforeSend: function () {
                    $('#loading').show()
                },
                success: function (data) {
                    $('#order_stats').html(data.view)
                },
                complete: function () {
                    $('#loading').hide()
                }
            });
        }

        function business_overview_stats_update(type) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.post({
                url: '<?php echo e(route('admin.dashboard.business-overview')); ?>',
                data: {
                    business_overview: type
                },
                beforeSend: function () {
                    $('#loading').show()
                },
                success: function (data) {
                    console.log(data.view)
                    $('#business-overview-board').html(data.view)
                },
                complete: function () {
                    $('#loading').hide()
                }
            });
        }
    </script>

<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.back-end.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/jj/Desktop/MrZ/WebVision/AdamG/Admin/resources/views/admin-views/system/dashboard.blade.php ENDPATH**/ ?>