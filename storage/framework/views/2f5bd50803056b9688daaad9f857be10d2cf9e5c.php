<?php $__env->startSection('title','Support Ticket'); ?>
<?php $__env->startPush('css_or_js'); ?>
    <!-- Custom styles for this page -->
    <link href="<?php echo e(asset('public/assets/back-end')); ?>/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link href="<?php echo e(asset('public/assets/back-end/css/croppie.css')); ?>" rel="stylesheet">
    <style>
        .switch {
            position: relative;
            display: inline-block;
            width: 60px;
            height: 34px;
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
            height: 26px;
            width: 26px;
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
    </style>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
<div class="content container-fluid"> 
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo e(route('admin.dashboard.index')); ?>">Dashboard</a></li>
            <li class="breadcrumb-item" aria-current="page">Support Tickets</li>
        </ol>
    </nav>

    <?php $__currentLoopData = $supportTicket; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ticket): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php
        $userDetails = \App\User::where('id', $ticket['customer_id'])->first();
        $conversations = \App\Model\SupportTicketConv::where('support_ticket_id', $ticket['id'])->get();
        $admin = \App\Model\Admin::get();
        ?>
        <div class="media pb-4">
            <img class="rounded-circle" style="width: 40px; height:40px;"
                 src="<?php echo e(asset('profile')); ?>/<?php echo e($userDetails['image']); ?>"
                 alt="<?php echo e($userDetails['name']); ?>"/>
            <div class="media-body pl-3">
                <h6 class="font-size-md mb-2"><?php echo e($userDetails['name']); ?></h6>
                <p class="font-size-md mb-1"><?php echo e($ticket['description']); ?></p>
                <span class="font-size-ms text-muted">
                             <i class="czi-time align-middle mr-2"><?php echo e(Carbon\Carbon::createFromFormat('Y-m-d H:i:s',$ticket['created_at'])->format('Y-m-d h:i A')); ?></i></span>
            </div>
        </div>
        <?php $__currentLoopData = $conversations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $conversation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if($conversation['admin_message'] ==null ): ?>
                <div class="media pb-4">
                    <img class="rounded-circle" style="width: 40px; height:40px;"
                         src="<?php echo e(asset('profile')); ?>/<?php echo e($userDetails['image']); ?>"
                         alt="<?php echo e($userDetails['name']); ?>"/>
                    <div class="media-body pl-3">
                        <h6 class="font-size-md mb-2"><?php echo e($userDetails['name']); ?></h6>
                        <p class="font-size-md mb-1"><?php echo e($conversation['customer_message']); ?></p>
                        <span class="font-size-ms text-muted">
                         <i class="czi-time align-middle mr-2"></i><?php echo e(Carbon\Carbon::createFromFormat('Y-m-d H:i:s',$conversation['created_at'])->format('Y-m-d h:i A')); ?></span>
                    </div>
                </div>
            <?php endif; ?>
            <?php if($conversation['customer_message'] ==null ): ?>
                <div class="media pb-4 " style="text-align: right">
                    <div class="media-body pl-3 ">
                        <h6 class="font-size-md mb-2"></h6>
                        <p class="font-size-md mb-1"><?php echo e($conversation['admin_message']); ?></p>
                        <span
                            class="font-size-ms text-muted"> <?php echo e(Carbon\Carbon::createFromFormat('Y-m-d H:i:s',$conversation['updated_at'])->format('Y-m-d h:i A')); ?></span>
                    </div>
                </div>
            <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <!-- Leave message-->
    <h3 class="h5 mt-2 pt-4 pb-2">Leave a Message</h3>
    <?php $__currentLoopData = $supportTicket; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $reply): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <form class="needs-validation" href="<?php echo e(route('admin.support-ticket.replay',$reply['id'])); ?>" method="post"
              novalidate>
            <?php echo csrf_field(); ?>
            <input type="hidden" name="id" value="<?php echo e($reply['id']); ?>">
            <input type="hidden" name="adminId" value="1">
            <div class="form-group">
                <textarea class="form-control" name="replay" rows="8" placeholder="Write your message here..."
                          required></textarea>
                <div class="invalid-tooltip">Please write the message!</div>
            </div>
            <div class="d-flex flex-wrap justify-content-between align-items-center">
                <div class="custom-control custom-checkbox d-block">
                </div>
                <button class="btn btn-primary my-2" type="submit">Submit Reply</button>
            </div>
        </form>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

</div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>
    <!-- Page level plugins -->
    <script src="<?php echo e(asset('public/assets/back-end')); ?>/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="<?php echo e(asset('public/assets/back-end')); ?>/vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="<?php echo e(asset('public/assets/back-end')); ?>/js/demo/datatables-demo.js"></script>
    <script src="<?php echo e(asset('public/assets/back-end/js/croppie.js')); ?>"></script>

<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.back-end.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/jj/Desktop/MrZ/WebVision/AdamG/Admin/resources/views/admin-views/support-ticket/singleView.blade.php ENDPATH**/ ?>