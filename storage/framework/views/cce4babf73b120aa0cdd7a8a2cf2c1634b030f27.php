<?php $__env->startSection('title','Category'); ?>

<?php $__env->startPush('css_or_js'); ?>

<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <div class="content container-fluid">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo e(route('admin.dashboard.index')); ?>"><?php echo e(trans('messages.Dashboard')); ?></a>
                </li>
                <li class="breadcrumb-item" aria-current="page"><?php echo e(trans('messages.category')); ?></li>
            </ol>
        </nav>

        <!-- Content Row -->
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <?php echo e(trans('messages.category_form')); ?>

                    </div>
                    <div class="card-body">
                        <form action="<?php echo e(route('admin.category.store')); ?>" method="POST" enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>
                            <?php ($language=\App\Model\BusinessSetting::where('type','pnc_language')->first()); ?>
                            <?php ($language = $language->value ?? null); ?>
                            <?php ($default_lang = 'en'); ?>
                            <?php ($default_lang = json_decode($language)[0]); ?>
                            <ul class="nav nav-tabs mb-4">
                                <?php $__currentLoopData = json_decode($language); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li class="nav-item">
                                        <a class="nav-link lang_link <?php echo e($lang == $default_lang? 'active':''); ?>"
                                           href="#"
                                           id="<?php echo e($lang); ?>-link"><?php echo e(\App\CPU\Helpers::get_language_name($lang).'('.strtoupper($lang).')'); ?></a>
                                    </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                            <div class="row">
                                <div class="col-6">
                                    <?php $__currentLoopData = json_decode($language); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>


                                        <div class="form-group <?php echo e($lang != $default_lang ? 'd-none':''); ?> lang_form"
                                             id="<?php echo e($lang); ?>-form">
                                            <label class="input-label"
                                                   for="exampleFormControlInput1"><?php echo e(trans('messages.name')); ?>

                                                (<?php echo e(strtoupper($lang)); ?>)</label>
                                            <input type="text" name="name[]" class="form-control"
                                                   placeholder="New Category" <?php echo e($lang == $default_lang? 'required':''); ?>>
                                        </div>



                                        <input type="hidden" name="lang[]" value="<?php echo e($lang); ?>">
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <input name="position" value="0" style="display: none">
                                </div>



                                        <div class="col-md-12">
                                            <label for="name"><?php echo e(trans('messages.Type of categorie')); ?></label>
                                            <select class="js-example-basic-multiple form-control"
                                                name="categorie_name" id="categorie">

                                                <option value="biens">Ventes de Biens</option>
                                                <option value="services">Prestations de Services</option>

                                            </select>
                                        </div>

                                <div class="col-6 from_part_2">
                                    <label><?php echo e(trans('messages.image')); ?></label><small style="color: red">*
                                        ( <?php echo e(trans('messages.ratio')); ?> 3:1 )</small>
                                    <div class="custom-file">
                                        <input type="file" name="image" id="customFileEg1"
                                               class="custom-file-input"
                                               accept=".jpg, .png, .jpeg, .gif, .bmp, .tif, .tiff|image/*"
                                               required>
                                        <label class="custom-file-label"
                                               for="customFileEg1"><?php echo e(trans('messages.choose')); ?> <?php echo e(trans('messages.file')); ?></label>
                                    </div>
                                </div>
                                <div class="col-12 from_part_2">
                                    <div class="form-group">
                                        <hr>
                                        <center>
                                            <img
                                                style="width: 30%;border: 1px solid; border-radius: 10px;"
                                                id="viewer"
                                                src="<?php echo e(asset('public/assets/back-end/img/900x400/img1.jpg')); ?>"
                                                alt="image"/>
                                        </center>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <button type="submit" class="btn btn-primary"><?php echo e(trans('messages.submit')); ?></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="row" style="margin-top: 20px" id="cate-table">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5><?php echo e(trans('messages.category_table')); ?></h5>
                    </div>
                    <div class="card-body" style="padding: 0">
                        <div class="table-responsive">
                            <table class="table table-borderless table-thead-bordered table-nowrap table-align-middle card-table">
                                <thead class="thead-light">
                                <tr>
                                    <th style="width: 100px"><?php echo e(trans('messages.category')); ?> <?php echo e(trans('messages.Type of categorie')); ?></th>
                                    <th><?php echo e(trans('messages.name')); ?></th>
                                    <th><?php echo e(trans('messages.slug')); ?></th>
                                    <th><?php echo e(trans('messages.icon')); ?></th>
                                    <th><?php echo e(trans('messages.home_status')); ?></th>
                                    <th class="text-center" style="width:15%;"><?php echo e(trans('messages.action')); ?></th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td class="text-center"><?php echo e($category['type']); ?></td>
                                        <td><?php echo e($category['name']); ?></td>
                                        <td><?php echo e($category['slug']); ?></td>
                                        <td>
                                            <img width="64"
                                                 onerror="this.src='<?php echo e(asset('public/assets/front-end/img/image-place-holder.png')); ?>'"
                                                 src="<?php echo e(asset('category')); ?>/<?php echo e($category['icon']); ?>">
                                        </td>
                                        <td>
                                            <?php if($category->home_status == true): ?>
                                                <div style="padding: 10px;border: 1px solid;cursor: pointer"
                                                     onclick="location.href='<?php echo e(route('admin.category.status',[$category['id'],0])); ?>'">
                                                    <span class="legend-indicator bg-success"></span>Active
                                                </div>
                                            <?php elseif($category->home_status == false): ?>
                                                <div style="padding: 10px;border: 1px solid;cursor: pointer"
                                                     onclick="location.href='<?php echo e(route('admin.category.status',[$category['id'],1])); ?>'">
                                                    <span class="legend-indicator bg-danger"></span>Disabled
                                                </div>
                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <a class="btn btn-primary btn-sm edit" style="cursor: pointer;"
                                               href="<?php echo e(route('admin.category.edit',[$category['id']])); ?>">
                                                <i class="tio-edit"></i><?php echo e(trans('messages.Edit')); ?>

                                            </a>
                                            <a class="btn btn-danger btn-sm delete" style="cursor: pointer;"
                                               id="<?php echo e($category['id']); ?>">
                                                <i class="tio-add-to-trash"></i><?php echo e(trans('messages.Delete')); ?>

                                            </a>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="card-footer">
                        <?php echo e($categories->links()); ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>

    <script>
        $(".lang_link").click(function (e) {
            e.preventDefault();
            $(".lang_link").removeClass('active');
            $(".lang_form").addClass('d-none');
            $(this).addClass('active');

            let form_id = this.id;
            let lang = form_id.split("-")[0];
            console.log(lang);
            $("#" + lang + "-form").removeClass('d-none');
            if (lang == '<?php echo e($default_lang); ?>') {
                $(".from_part_2").removeClass('d-none');
            } else {
                $(".from_part_2").addClass('d-none');
            }
        });

        $(document).ready(function () {
            $('#dataTable').DataTable();
        });
    </script>

    <script>
        $(document).on('click', '.delete', function () {
            var id = $(this).attr("id");
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.value) {
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                        }
                    });
                    $.ajax({
                        url: "<?php echo e(route('admin.category.delete')); ?>",
                        method: 'POST',
                        data: {id: id},
                        success: function () {
                            toastr.success('Category deleted Successfully.');
                            location.reload();
                        }
                    });
                }
            })
        });
    </script>

    <script>
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#viewer').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#customFileEg1").change(function () {
            readURL(this);
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.back-end.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/jj/Desktop/MrZ/WebVision/AdamG/Admin/resources/views/admin-views/category/view.blade.php ENDPATH**/ ?>