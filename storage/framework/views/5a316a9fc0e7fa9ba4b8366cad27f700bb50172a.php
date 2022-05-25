<?php $__env->startSection('title','Currency'); ?>

<?php $__env->startPush('css_or_js'); ?>
    <style>
        .switch {
            position: relative;
            display: inline-block;
            width: 48px;
            height: 23px;
        }

        .switch input {
            opacity: 0;
            width: 0;
            height: 0;
        }

        .slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #ccc;
            -webkit-transition: .4s;
            transition: .4s;
        }

        .slider:before {
            position: absolute;
            content: "";
            height: 15px;
            width: 15px;
            left: 4px;
            bottom: 4px;
            background-color: white;
            -webkit-transition: .4s;
            transition: .4s;
        }

        input:checked + .slider {
            background-color: #377dff;
        }

        input:focus + .slider {
            box-shadow: 0 0 1px #377dff;
        }

        input:checked + .slider:before {
            -webkit-transform: translateX(26px);
            -ms-transform: translateX(26px);
            transform: translateX(26px);
        }

        /* Rounded sliders */
        .slider.round {
            border-radius: 34px;
        }

        .slider.round:before {
            border-radius: 50%;
        }

        .modal-backdrop {
            position: inherit;
            top: 0;
            left: 0;
            z-index: unset;
            width: 100vw;
            height: 100vh;
            background-color: #000;
        }
    </style>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <div class="content container-fluid">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo e(route('admin.dashboard.index')); ?>"><?php echo e(trans('messages.Dashboard')); ?></a>
                </li>
                <li class="breadcrumb-item" aria-current="page"><?php echo e(trans('messages.Currency')); ?></li>
            </ol>
        </nav>
        <!-- Page Heading -->

        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h5 class="text-center">
                            <i class="tio-money"></i>
                            Add New Currency
                        </h5>
                    </div>
                    <div class="card-body">
                        <form action="<?php echo e(route('admin.currency.store')); ?>" method="post">
                            <?php echo csrf_field(); ?>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6">
                                        <input type="text" name="name" class="form-control"
                                               id="name" placeholder="Enter currency Name">
                                    </div>
                                    <div class="col-md-6">
                                        <input type="text" name="symbol" class="form-control"
                                               id="symbol" placeholder="Enter currency symbol">
                                    </div>
                                </div>

                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6">
                                        <input type="text" name="code" class="form-control"
                                               id="code" placeholder="Enter currency code">
                                    </div>
                                    <div class="col-md-6">
                                        <input type="number" min="0" max="1000000"
                                               name="exchange_rate" step="0.00000001"
                                               class="form-control" id="exchange_rate"
                                               placeholder="Enter currency exchange rate">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group text-center">
                                <button type="submit" id="add" class="btn btn-primary text-capitalize"
                                        style="color: white">
                                    <i class="tio-add"></i> <?php echo e(trans('messages.add')); ?>

                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card h-100">
                    <div class="card-header">
                        <h5 class="text-center">
                            <i class="tio-settings"></i>
                            <?php echo e(trans('messages.system_default_currency')); ?>

                        </h5>
                    </div>
                    <div class="card-body">
                        <form class="form-inline_" action="<?php echo e(route('admin.currency.system-currency-update')); ?>"
                              method="post">
                            <?php echo csrf_field(); ?>
                            <div class="row">
                                <div class="col-md-12">
                                    <?php ($default=\App\Model\BusinessSetting::where('type', 'system_default_currency')->first()); ?>
                                    <div class="form-group mb-2">
                                        <select style="width: 100%" class="form-control js-example-responsive"
                                                name="currency_id">
                                            <?php $__currentLoopData = App\Model\Currency::where('status', 1)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $currency): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option
                                                    value="<?php echo e($currency->id); ?>" <?php echo e($default->value == $currency->id?'selected':''); ?> ><?php echo e($currency->name); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-2">
                                        <button type="submit"
                                                class="btn btn-primary mb-2"><?php echo e(trans('messages.Save')); ?></button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>


        <div class="row" style="margin-top: 20px">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row justify-content-between pl-4 pr-4">
                            <div>
                                <h5><?php echo e(trans('messages.Currency')); ?> <?php echo e(trans('messages.table')); ?> </h5>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table
                                class="table table-borderless table-thead-bordered table-nowrap table-align-middle card-table">
                                <thead class="thead-light">
                                <tr>
                                    <th scope="col"><?php echo e(trans('messages.SL#')); ?></th>
                                    <th scope="col"><?php echo e(trans('messages.currency_name')); ?></th>
                                    <th scope="col"><?php echo e(trans('messages.currency_symbol')); ?></th>
                                    <th scope="col"><?php echo e(trans('messages.currency_code')); ?></th>
                                    <th scope="col"><?php echo e(trans('messages.exchange_rate')); ?>

                                        (1 <?php echo e(App\Model\Currency::where('id', $default->value)->first()->code); ?>= ?)
                                    </th>
                                    <th scope="col"><?php echo e(trans('messages.status')); ?></th>
                                    <th scope="col"><?php echo e(trans('messages.action')); ?></th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $__currentLoopData = App\Model\Currency::orderBy('id','asc')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key =>$data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr class="text-center">
                                        <td><?php echo e($key +1); ?></td>
                                        <td><?php echo e($data->name); ?></td>
                                        <td><?php echo e($data->symbol); ?></td>
                                        <td><?php echo e($data->code); ?></td>
                                        <td><?php echo e($data->exchange_rate); ?></td>
                                        <td><label class="switch">
                                                <input type="checkbox" class="status"
                                                       id="<?php echo e($data->id); ?>" <?php if ($data->status == 1) echo "checked" ?>><span
                                                    class="slider round">
                                            </span>
                                            </label>
                                        </td>
                                        <td>
                                            <?php if($data->code!='USD'): ?>
                                                <a type="button" class="btn btn-primary btn-sm btn-xs edit"
                                                   href="<?php echo e(route('admin.currency.edit',[$data->id])); ?>">
                                                    <i class="tio-edit"></i> Edit
                                                </a>
                                                <a type="button" class="btn btn-danger btn-sm btn-xs"
                                                   href="<?php echo e(route('admin.currency.delete',[$data->id])); ?>">
                                                    <i class="tio-edit"></i> Delete
                                                </a>
                                            <?php else: ?>
                                                <button class="btn btn-primary btn-sm btn-xs edit" disabled>
                                                    <i class="tio-edit"></i> Edit
                                                </button>
                                            <?php endif; ?>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>
    <!-- Page level custom scripts -->
    <script src="<?php echo e(asset('public/assets/select2/js/select2.min.js')); ?>"></script>
    <script>
        $(".js-example-theme-single").select2({
            theme: "classic"
        });

        $(".js-example-responsive").select2({
            width: 'resolve'
        });
    </script>

    <script>
        $('#add').on('click', function () {
            var name = $('#name').val();
            var symbol = $('#symbol').val();
            var code = $('#code').val();
            var exchange_rate = $('#exchange_rate').val();
            if (name == "" || symbol == "" || code == "" || exchange_rate == "") {
                alert('All input field is required');
                return false;
            } else {
                return true;
            }
        });
        $(document).on('change', '.status', function () {
            var id = $(this).attr("id");
            if ($(this).prop("checked") == true) {
                var status = 1;
            } else if ($(this).prop("checked") == false) {
                var status = 0;
            }

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                }
            });
            $.ajax({
                url: "<?php echo e(route('admin.currency.status')); ?>",
                method: 'POST',
                data: {
                    id: id,
                    status: status
                },
                success: function (response) {
                    if (response.status === 1) {
                        toastr.success(response.message);
                    }else{
                        toastr.error(response.message);
                    }
                    location.reload();
                }
            });
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.back-end.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/jj/Desktop/MrZ/WebVision/AdamG/Admin/resources/views/admin-views/currency/view.blade.php ENDPATH**/ ?>