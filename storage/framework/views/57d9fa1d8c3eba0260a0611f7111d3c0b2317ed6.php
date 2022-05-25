<?php $__env->startSection('title','My Address'); ?>

<?php $__env->startPush('css_or_js'); ?>
    <link rel="stylesheet" media="screen"
          href="<?php echo e(asset('public/assets/front-end')); ?>/vendor/nouislider/distribute/nouislider.min.css"/>

    <style>
        .headerTitle {
            font-size: 24px;
            font-weight: 600;
            margin-top: 1rem;
        }

        body {
            font-family: 'Titillium Web', sans-serif
        }

        .product-qty span {
            font-size: 14px;
            color: #6A6A6A;
        }

        .font-nameA {

            display: inline-block;
            margin-top: 5px !important;
            font-size: 13px !important;
            color: #030303;
        }

        .font-name {
            font-weight: 600;
            font-size: 15px;
            padding-bottom: 6px;
            color: #030303;
        }

        .modal-footer {
            border-top: none;
        }

        .cz-sidebar-body h3:hover + .divider-role {
            border-bottom: 3px solid <?php echo e($web_config['primary_color']); ?> !important;
            transition: .2s ease-in-out;
        }

        label {
            font-size: 15px;
            margin-bottom: 8px;
            color: #030303;

        }

        .nav-pills .nav-link.active {
            box-shadow: none;
            color: #ffffff !important;
        }

        .modal-header {
            border-bottom: none;
        }

        .nav-pills .nav-link {
            padding-top: .575rem;
            padding-bottom: .575rem;
            background-color: #ffffff;
            color: #050b16 !important;
            font-size: .9375rem;
            border: 1px solid #e4dfdf;
        }

        .nav-pills .nav-link :hover {
            padding-top: .575rem;
            padding-bottom: .575rem;
            background-color: #ffffff;
            color: #050b16 !important;
            font-size: .9375rem;
            border: 1px solid #e4dfdf;
        }

        .nav-pills .nav-link.active, .nav-pills .show > .nav-link {
            color: #fff;
            background-color: <?php echo e($web_config['primary_color']); ?>;
        }

        .iconHad {
            color: <?php echo e($web_config['primary_color']); ?>;
            padding: 4px;
        }

        .iconSp {
            margin-top: 0.70rem;
        }

        .fa-lg {
            padding: 4px;
        }

        .fa-trash {
            color: #FF4D4D;
        }

        .namHad {
            color: #030303;
            position: absolute;
            padding-left: 13px;
            padding-top: 8px;
        }

        .donate-now {
            list-style-type: none;
            margin: 25px 0 0 0;
            padding: 0;
        }

        .donate-now li {
            float: left;
            margin: 0 5px 0 0;
            width: 100px;
            height: 40px;
            position: relative;
            padding: 22px;
            text-align: center;
        }

        .donate-now label,
        .donate-now input {
            display: block;
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
        }

        .donate-now input[type="radio"] {
            opacity: 0.01;
            z-index: 100;
        }

        .donate-now input[type="radio"]:checked + label,
        .Checked + label {
            background: <?php echo e($web_config['primary_color']); ?>;
            color: white !important;
            border-radius: 7px;
        }

        .active_address_type{
            background: <?php echo e($web_config['primary_color']); ?>;
            color: white !important;
            border-radius: 7px;
        }
        .active_address_type:hover{
            background: <?php echo e($web_config['primary_color']); ?>!important;
            color: white !important;
        }

        .donate-now label {
            padding: 5px;
            border: 1px solid #CCC;
            cursor: pointer;
            z-index: 90;
        }

        .donate-now label:hover {
            background: #DDD;
        }

        .price_sidebar {
            padding: 20px;
        }
        #edit{
            cursor: pointer;
        }

        @media (max-width: 600px) {
            .sidebar_heading {
                background: <?php echo e($web_config['primary_color']); ?>;
            }

            .sidebar_heading h1 {
                text-align: center;
                color: aliceblue;
                padding-bottom: 17px;
                font-size: 19px;
            }

            .sidebarR {
                padding: 24px;
            }

            .price_sidebar {
                padding: 20px;
            }

            .btn-b {
                width: 350px;
                margin-right: 30px;
                margin-bottom: 10px;

            }

            .div-secon {
                margin-top: 2rem;
            }
        }
    </style>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>

    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog  modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="row">
                        <div class="col-md-12"><h5 class="modal-title font-name "><?php echo e(trans('messages.add_new_address')); ?></h5></div>
                    </div>
                </div>
                <div class="modal-body">
                    <form action="<?php echo e(route('address-store')); ?>" method="post">
                        <?php echo csrf_field(); ?>

                        <div class="col-md-12" style="display: flex">
                            <!-- Nav pills -->

                            <ul class="donate-now">
                                <li>
                                    <input type="radio" id="a25" name="addressAs" value="permanent"/>
                                    <label for="a25" class="component"><?php echo e(trans('messages.permanent')); ?></label>
                                </li>
                                <li>
                                    <input type="radio" id="a50" name="addressAs" value="home"/>
                                    <label for="a50" class="component"><?php echo e(trans('messages.Home')); ?></label>
                                </li>
                                <li>
                                    <input type="radio" id="a75" name="addressAs" value="office" checked="checked"/>
                                    <label for="a75" class="component"><?php echo e(trans('messages.Office')); ?></label>
                                </li>

                            </ul>
                        </div>

                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div id="home" class="container tab-pane active"><br>


                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="name"><?php echo e(trans('messages.contact_person_name')); ?></label>
                                        <input class="form-control" type="text" id="name" name="name" required>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="address"><?php echo e(trans('messages.address')); ?></label>
                                        <input class="form-control" type="text" id="address" name="address" required>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="address-city"><?php echo e(trans('messages.City')); ?></label>
                                        <input class="form-control" type="text" id="address-city" name="city" required>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="zip"><?php echo e(trans('messages.zip_code')); ?></label>
                                        <input class="form-control" type="number" id="zip" name="zip" required>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="state"><?php echo e(trans('messages.State')); ?></label>
                                        <input type="text" class="form-control" id="state" name="state" placeholder="" required>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="country"><?php echo e(trans('messages.Country')); ?></label>
                                        <input type="text" class="form-control" id="country" name="country"
                                               placeholder="" required>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label for="firstName"><?php echo e(trans('messages.Phone')); ?></label>
                                        <input class="form-control" type="text" id="phone" name="phone" required>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo e(trans('messages.close')); ?></button>
                                <button type="submit" class="btn btn-primary"><?php echo e(trans('messages.Add')); ?> <?php echo e(trans('messages.Informations')); ?>  </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>

    <!-- Page Content-->
    <div class="container pb-5 mb-2 mb-md-4 mt-3">
        <div class="row">
            <!-- Sidebar-->
        <?php echo $__env->make('web-views.partials._profile-aside', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <!-- Content  -->
            <section class="col-lg-9 mt-3 col-md-9">

                <!-- Addresses list-->
                <div class="row">
                    <div class="col-lg-12 col-md-12  d-flex justify-content-between overflow-hidden">
                        <div class="col-sm-4">
                            <h1 class="h3  mb-0 folot-left headerTitle"><?php echo e(trans('messages.ADDRESSES')); ?></h1>
                        </div>
                        <div class="mt-2 col-sm-4">
                            <button type="submit" class="btn btn-primary float-right" data-toggle="modal"
                                data-target="#exampleModal"><?php echo e(trans('messages.add_new_address')); ?>

                            </button>
                        </div>
                    </div>
                    <?php $__currentLoopData = $shippingAddresses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $shippingAddress): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <section class="col-lg-6 col-md-6 mb-4 mt-5">
                            <div class="card" style="text-transform: capitalize;">
                                
                                    <div class="card-header" style=" border: 1px solid <?php echo e($web_config['primary_color']); ?>; padding: 5px;">
                                        <i class="fa fa-thumb-tack fa-2x iconHad" aria-hidden="true"></i>
                                        <span class="namHad"> <?php echo e($shippingAddress['address_type']); ?> <?php echo e(trans('messages.address')); ?> </span>
                                        
                                        <span class="float-right iconSp">
                                            <a class="" id="edit" data-toggle="modal" data-target="#editAddress_<?php echo e($shippingAddress->id); ?>">
                                                <i class="fa fa-edit fa-lg"></i>
                                            </a>
                                            <a class="" href="<?php echo e(route('address-delete',['id'=>$shippingAddress->id])); ?>" onclick="return confirm('Are you sure you want to Delete?');" id="delete">
                                                <i class="fa fa-trash fa-lg"></i>
                                            </a>

                                        </span>
                                    </div>
                                        

                                    
                                    <div class="modal fade" id="editAddress_<?php echo e($shippingAddress->id); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog  modal-lg" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                <div class="row">
                                                    <div class="col-md-12"> <h5 class="modal-title font-name "><?php echo e(trans('messages.update')); ?> <?php echo e(trans('messages.address')); ?>  </h5></div>
                                                </div>
                                                </div>
                                                <div class="modal-body">
                                                    <form id="updateForm">
                                                        <?php echo csrf_field(); ?>
                                                        <div class="pb-3" style="display: flex">
                                                            <!-- Nav pills -->
                                                            <input type="hidden" id="defaultValue" class="add_type" value="<?php echo e($shippingAddress->address_type); ?>">
                                                            <ul class="donate-now">
                                                                <li class="address_type_li">
                                                                    <input type="radio" class="address_type" id="a25" name="addressAs" value="permanent"  <?php echo e($shippingAddress->address_type == 'permanent' ? 'checked' : ''); ?> />
                                                                    <label for="a25" class="component"><?php echo e(trans('messages.permanent')); ?></label>
                                                                </li>
                                                                <li class="address_type_li">
                                                                    <input type="radio" class="address_type" id="a50" name="addressAs" value="home" <?php echo e($shippingAddress->address_type == 'home' ? 'checked' : ''); ?> />
                                                                    <label for="a50" class="component"><?php echo e(trans('messages.Home')); ?></label>
                                                                </li>
                                                                <li class="address_type_li">
                                                                    <input type="radio" class="address_type" id="a75" name="addressAs" value="office" <?php echo e($shippingAddress->address_type == 'office' ? 'checked' : ''); ?>/>
                                                                    <label for="a75" class="component"><?php echo e(trans('messages.Office')); ?></label>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        <!-- Tab panes -->
                                                        <div class="form-row">
                                                            <div class="form-group col-md-6">
                                                                <label for="person_name"><?php echo e(trans('messages.contact_person_name')); ?></label>
                                                                <input class="form-control" type="text" id="person_name"
                                                                    name="name"
                                                                    value="<?php echo e($shippingAddress->contact_person_name); ?>"
                                                                    required>
                                                            </div>
                                                            <div class="form-group col-md-6">
                                                                <label for="own_address"><?php echo e(trans('messages.address')); ?></label>
                                                                <input class="form-control" type="text" id="own_address"
                                                                    name="address"
                                                                    value="<?php echo e($shippingAddress->address); ?>" required>
                                                            </div>
                                                        </div>
                                                        <div class="form-row">
                                                            <div class="form-group col-md-6">
                                                                <label for="city"><?php echo e(trans('messages.City')); ?></label>

                                                                <input class="form-control" type="text" id="city" name="city" value="<?php echo e($shippingAddress->city); ?>" required>
                                                            </div>
                                                            <div class="form-group col-md-6">
                                                                <label for="zip_code"><?php echo e(trans('messages.zip_code')); ?></label>
                                                                <input class="form-control" type="number" id="zip_code" name="zip" value="<?php echo e($shippingAddress->zip); ?>" required>
                                                            </div>
                                                        </div>
                                                        <div class="form-row">
                                                            <div class="form-group col-md-6">
                                                            <label for="own_state"><?php echo e(trans('messages.State')); ?></label>
                                                                <input type="text" class="form-control" name="state" value="<?php echo e($shippingAddress->state); ?>" id="own_state"  placeholder="" required>
                                                            </div>
                                                            <div class="form-group col-md-6">
                                                            <label for="own_country"><?php echo e(trans('messages.Country')); ?></label>
                                                                <input type="text" class="form-control" id="own_country" name="country" value="<?php echo e($shippingAddress->country); ?>" placeholder="" required>
                                                            </div>
                                                        </div>
                                                        <div class="form-row">
                                                            <div class="form-group col-md-12">
                                                            <label for="own_phone"><?php echo e(trans('messages.Phone')); ?></label>
                                                                <input class="form-control" type="text" id="own_phone" name="phone" value="<?php echo e($shippingAddress->phone); ?>" required="required">
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="closeB btn btn-secondary" data-dismiss="modal"><?php echo e(trans('messages.close')); ?></button>
                                                            <button type="submit" class="btn btn-primary" id="addressUpdate" data-id="<?php echo e($shippingAddress->id); ?>"><?php echo e(trans('messages.update')); ?>  </button>
                                                        </div>
                                                    </form>
                                            </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card-body" style="padding: 0 15px 15px 13px; border: 1px solid <?php echo e($web_config['primary_color']); ?>;">
                                        <div class="font-name"><span><?php echo e($shippingAddress['contact_person_name']); ?></span>
                                        </div>
                                        <div><span class="font-nameA"> <strong><?php echo e(trans('messages.Phone')); ?>  :</strong>  <?php echo e($shippingAddress['phone']); ?></span>
                                        </div>
                                        <div><span class="font-nameA"> <strong><?php echo e(trans('messages.City')); ?>  :</strong>  <?php echo e($shippingAddress['city']); ?></span>
                                        </div>
                                        <div><span class="font-nameA"> <strong> <?php echo e(trans('messages.zip_code')); ?> :</strong> <?php echo e($shippingAddress['zip']); ?></span>
                                        </div>
                                        <div><span class="font-nameA"> <strong><?php echo e(trans('messages.address')); ?> :</strong> <?php echo e($shippingAddress['address']); ?></span>
                                        </div>
                                        <div><span class="font-nameA"> <strong><?php echo e(trans('messages.Country')); ?> :</strong> <?php echo e($shippingAddress['country']); ?></span>
                                        </div>
                                    </div>
                                
                            </div>
                        </section>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>

            </section>

        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>
    <script src="<?php echo e(asset('public/assets/front-end')); ?>/vendor/nouislider/distribute/nouislider.min.js"></script>
    <script>
        $(document).ready(function (){
            $('.address_type_li').on('click', function (e) {
                // e.preventDefault();
                $('.address_type_li').find('.address_type').removeAttr('checked', false);
                $('.address_type_li').find('.component').removeClass('active_address_type');
                $(this).find('.address_type').attr('checked', true);
                $(this).find('.address_type').removeClass('add_type');
                $('#defaultValue').removeClass('add_type');
                $(this).find('.address_type').addClass('add_type');

                $(this).find('.component').addClass('active_address_type');
            });
        })

        $('#addressUpdate').on('click', function(e){
            e.preventDefault();
            let addressAs, address, name, zip, city, state, country, phone;

            addressAs = $('.add_type').val();

            address = $('#own_address').val();
            name = $('#person_name').val();
            zip = $('#zip_code').val();
            city = $('#city').val();
            state = $('#own_state').val();
            country = $('#own_country').val();
            phone = $('#own_phone').val();

            let id = $(this).attr('data-id');

            if (addressAs != '' && address != '' && name != '' && zip != '' && city != '' && state != '' && country != '' && phone != '') {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                    }
                });
                $.ajax({
                    url: "<?php echo e(route('address-update')); ?>",
                    method: 'POST',
                    data: {
                        id : id,
                        addressAs: addressAs,
                        address: address,
                        name: name,
                        zip: zip,
                        city: city,
                        state: state,
                        country: country,
                        phone: phone
                    },
                    success: function () {
                        toastr.success('Address Update Successfully.');
                        location.reload();
                        // $('#name').val('');
                        // $('#link').val('');
                        // $('#icon').val('');
                        // $('#image-set').val('');

                    }
                });
            }else{
                toastr.error('All input field required.');
            }

        });
    </script>
    <style>
        .modal-backdrop {
            z-index: 0 !important;
            display: none;
        }


    </style>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.front-end.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/jj/Desktop/MrZ/WebVision/AdamG/Admin/resources/views/web-views/users-profile/account-address.blade.php ENDPATH**/ ?>