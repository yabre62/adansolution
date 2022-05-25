<?php $__env->startSection('title','My Support Tickets'); ?>

<?php $__env->startPush('css_or_js'); ?>
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
            font-weight: 600;
            display: inline-block;
            margin-bottom: 0;
            font-size: 17px;
            color: #030303;
        }

        .spandHeadO {
            color: #FFFFFF !important;
            font-weight: 600 !important;
            font-size: 14px !important;

        }

        .tdBorder {
            border-right: 1px solid #f7f0f0;
            text-align: center;
        }

        .bodytr {
            border: 1px solid #dadada;
            text-align: center;
        }

        .sellerName {
            font-size: 15px;
            font-weight: 600;
        }

        .modal-footer {
            border-top: none;
        }

        .sidebarL h3:hover + .divider-role {
            border-bottom: 3px solid <?php echo e($web_config['primary_color']); ?>         !important;
            transition: .2s ease-in-out;
        }

        .marl {
            margin-left: 7px;
        }

        tr td {
            padding: 3px 5px !important;
        }

        td button {
            padding: 3px 13px !important;
        }

        @media (max-width: 600px) {
            .sidebar_heading {
                background: <?php echo e($web_config['primary_color']); ?>









            }

            .sidebar_heading h1 {
                text-align: center;
                color: aliceblue;
                padding-bottom: 17px;
                font-size: 19px;
            }
        }
    </style>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>

    <div class="modal fade" id="open-ticket" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-lg  " role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="row">
                        <div class="col-md-12"><h5
                                class="modal-title font-nameA "><?php echo e(trans('messages.submit_new_ticket')); ?></h5></div>
                        <div class="col-md-12" style=" color: #030303;  margin-top: 1rem;">
                            <span><?php echo e(trans('messages.you_will_get_response')); ?>.</span>
                        </div>
                    </div>
                </div>
                <div class="modal-body">
                    <form class="mt-3" method="post" action="<?php echo e(route('ticket-submit')); ?>" id="open-ticket">
                        <?php echo csrf_field(); ?>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="firstName"><?php echo e(trans('messages.Subject')); ?></label>
                                <input type="text" class="form-control" id="ticket-subject" name="ticket_subject"
                                       required>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <div class="">
                                    <label class="" for="inlineFormCustomSelect"><?php echo e(trans('messages.Type')); ?></label>
                                    <select class="custom-select " id="ticket-type" name="ticket_type" required>
                                        <option
                                            value="Website problem"><?php echo e(trans('messages.Website')); ?> <?php echo e(trans('messages.problem')); ?></option>
                                        <option value="Partner request"><?php echo e(trans('messages.partner_request')); ?></option>
                                        <option value="Complaint"><?php echo e(trans('messages.Complaint')); ?></option>
                                        <option
                                            value="Info inquiry"><?php echo e(trans('messages.Info')); ?> <?php echo e(trans('messages.inquiry')); ?> </option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <div class="">
                                    <label class="" for="inlineFormCustomSelect"><?php echo e(trans('messages.Priority')); ?></label>
                                    <select class="form-control custom-select" id="ticket-priority"
                                            name="ticket_priority" required>
                                        <option value><?php echo e(trans('messages.choose_priority')); ?>?</option>
                                        <option value="Urgent"><?php echo e(trans('messages.Urgent')); ?></option>
                                        <option value="High"><?php echo e(trans('messages.High')); ?></option>
                                        <option value="Medium"><?php echo e(trans('messages.Medium')); ?></option>
                                        <option value="Low"><?php echo e(trans('messages.Low')); ?></option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="detaaddressils"><?php echo e(trans('messages.describe_your_issue')); ?></label>
                                <textarea class="form-control" rows="6" id="ticket-description"
                                          name="ticket_description"
                                          required placeholder="Write Here"></textarea>
                            </div>
                        </div>
                        <div class="modal-footer" style="padding: 0px!important;">
                            <button type="button" class="btn btn-secondary"
                                    data-dismiss="modal"><?php echo e(trans('messages.close')); ?></button>
                            <button type="submit" class="btn btn-primary"><?php echo e(trans('messages.submit_a_ticket')); ?></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Page Title-->
    <div class="container">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-9 sidebar_heading">
                <h1 class="h3  mb-0 folot-left headerTitle"><?php echo e(trans('messages.support_ticket')); ?></h1>
            </div>
        </div>
    </div>
    <!-- Page Content-->
    <div class="container pb-5 mb-2 mb-md-4 mt-3">
        <div class="row">
            <!-- Sidebar-->
        <?php echo $__env->make('web-views.partials._profile-aside', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <!-- Content  -->
            <section class="col-lg-9 col-md-9 mt-3">
                <!-- Toolbar-->
                <!-- Tickets list-->
                <?php ($allTickets =App\Model\SupportTicket::where('customer_id', auth('customer')->id())->get()); ?>
                <div class="card box-shadow-sm">
                    <div style="overflow: auto">
                        <table class="table table-striped table-bordered">
                            <thead>
                            <tr style="background: <?php echo e($web_config['secondary_color']); ?>">
                                <td class="tdBorder">
                                    <div class="py-2"><span
                                            class="d-block spandHeadO "><?php echo e(trans('messages.Topic')); ?></span></div>
                                </td>
                                <td class="tdBorder">
                                    <div class="py-2 ml-2"><span
                                            class="d-block spandHeadO "><?php echo e(trans('messages.submition_date')); ?></span>
                                    </div>
                                </td>
                                <td class="tdBorder">
                                    <div class="py-2"><span class="d-block spandHeadO"><?php echo e(trans('messages.Type')); ?></span>
                                    </div>
                                </td>
                                <td class="tdBorder">
                                    <div class="py-2">
                                        <span class="d-block spandHeadO">
                                            <?php echo e(trans('messages.Status')); ?>

                                        </span>
                                    </div>
                                </td>
                                <td class="tdBorder">
                                    <div class="py-2">
                                        <span class="d-block spandHeadO"><i class="fa fa-eye"></i></span>
                                    </div>
                                </td>
                                <td class="tdBorder">
                                    <div class="py-2"><span
                                            class="d-block spandHeadO"><?php echo e(trans('messages.Action')); ?> </span></div>
                                </td>
                            </tr>
                            </thead>

                            <tbody>

                            <?php $__currentLoopData = $allTickets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ticket): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>

                                    <td class="bodytr font-weight-bold" style="color: <?php echo e($web_config['primary_color']); ?>">
                                        <span class="marl"><?php echo e($ticket['subject']); ?></span>
                                    </td>
                                    <td class="bodytr">
                                        <span><?php echo e(Carbon\Carbon::createFromFormat('Y-m-d H:i:s',$ticket['created_at'])->format('Y-m-d h:i A')); ?></span>
                                    </td>
                                    <td class="bodytr"><span class=""><?php echo e($ticket['type']); ?>t</span></td>
                                    <td class="bodytr"><span class=""><?php echo e($ticket['status']); ?></span></td>

                                    <td class="bodytr">
                                        <span class="">
                                            <a class="btn btn-primary btn-sm"
                                               href="<?php echo e(route('support-ticket.index',$ticket['id'])); ?>">View
                                            </a>
                                        </span>
                                    </td>

                                    <td class="bodytr">
                                        <a href="javascript:"
                                           onclick="Swal.fire({
                                               title: 'Do you want to delete this?',
                                               showDenyButton: true,
                                               showCancelButton: true,
                                               confirmButtonColor: '<?php echo e($web_config['primary_color']); ?>',
                                               cancelButtonColor: '<?php echo e($web_config['secondary_color']); ?>',
                                               confirmButtonText: `Yes`,
                                               denyButtonText: `Don't Delete`,
                                               }).then((result) => {
                                               if (result.value) {
                                               Swal.fire('Deleted!', '', 'success')
                                               location.href='<?php echo e(route('support-ticket.delete',['id'=>$ticket->id])); ?>';
                                               } else{
                                               Swal.fire('Cancelled', '', 'info')
                                               }
                                               })"
                                           id="delete" class=" marl">
                                            <i class="czi-trash" style="font-size: 25px; color:#e81616;"></i>
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <hr class="mb-4">
                <div class="mt-3">
                    <button type="submit" class="btn btn-primary float-right" data-toggle="modal"
                            data-target="#open-ticket">
                            <?php echo e(trans('messages.add_new_ticket')); ?>

                    </button>
                </div>
            </section>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.front-end.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/jj/Desktop/MrZ/WebVision/AdamG/Admin/resources/views/web-views/users-profile/account-tickets.blade.php ENDPATH**/ ?>