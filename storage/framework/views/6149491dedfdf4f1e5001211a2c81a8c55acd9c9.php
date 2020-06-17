

<?php $__env->startSection('content'); ?>
<div id="popup" class="overlay delete">
    <div class="popup">

        <a class="close" href="#">&times;</a>
        <div class="content">
            <form id="" action="<?php echo e(route('Message.Response')); ?>" method="post">
                <?php echo csrf_field(); ?>

                <div class="mt-5 pr-2">
                    <h5 class="modal-title  pt-1 mb-2" id="exampleModalLabel">ارسال پاسخ</h5>
                    <div class="form-group col-md-12">
                        <input type="hidden" id="post-id" name="id" value="">


                    </div>


                    <label for="user_pass" class="col-form-label"><span class="text-danger">*</span> متن پاسخ: </label>
                    <textarea type="text" class="form-control" rows="3" name="response" id="response"></textarea>
                </div>

                <div class="form-group   mt-1 ">

                    <button type="submit" class="btn btn-sm btn-danger "> ارسال </button>
                </div>
            </form>
        </div>
    </div>
</div>
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">کاربران </a></li>
        <li class="breadcrumb-item "><a href="#">پیام های کاربران</a></li>
        <?php if(request()->path() == "panel/membermessages"): ?>
            <li class="breadcrumb-item active">پیام های دریافتی</li> 
        <?php elseif(request()->path() == "panel/adminmessages"): ?> 
            <li class="breadcrumb-item active">پیام های ارسالی</li>
        <?php endif; ?>
       
       

    </ol>
</nav>
<div class="col-sm-9 col-sm-offset-3 col-md-12  ">
    <div class="tab-wrapper mb-3">
        <a href="<?php echo e(route('Message.All')); ?>" <?php if(request()->path() == "panel/membermessages"): ?>
            class="btn btn-info" <?php else: ?> class="btn btn-light" <?php endif; ?>>پیام های دریافتی</a>
        <a href="<?php echo e(route('Admin.Message.All')); ?>" <?php if(request()->path() == "panel/adminmessages"): ?>
            class="btn btn-info" <?php else: ?> class="btn btn-light" <?php endif; ?>> پیام های ارسالی</a>
        <a href="#"></a>
    </div>
    <div style="overflow-x: auto;">
        <table id="example1" class="table table-striped  table-bordered w-100">
            <thead>
                <tr>
                    <th>ردیف</th>
                    <th style=""> متن</th>
                    <?php if(request()->path() == "panel/membermessages"): ?>

                    <th> کاربر ارسال کننده</th>
                    <th> پاسخ شما</th>
                    <?php endif; ?>
                    <?php if(request()->path() == "panel/adminmessages"): ?>

                    <th> کاربر دریافت کننده</th>
                    <th> پاسخ کاربر</th>
                    <?php endif; ?>

                    <th> تاریخ ثبت</th>

                </tr>
            </thead>

            <tbody>
                <?php $__currentLoopData = $messages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($key+1); ?></td>
                    <td><?php echo $message->message; ?></td>
                    <?php if(request()->path() == "panel/membermessages"): ?>
                    <td><a class="text-primary" href="<?php echo e(route('User.Show',$message->members->username)); ?>">
                            <?php echo e($message->members->username); ?></a></td>
                    <td>
                        <?php if($message->response): ?>
                        <?php echo $message->response; ?>

                        <?php else: ?>
                        <div class="btn-group btn-group-sm" role="group" aria-label="Basic example">

                            <a data-id="<?php echo e($message->id); ?>" data-member="<?php echo e($message->id); ?>"
                                class="post--delete btn btn-warning btn-sm m-0">پاسخ</a>
                        </div>
                        <?php endif; ?>

                    </td>
                    <?php endif; ?>
                    <?php if(request()->path() == "panel/adminmessages"): ?>
                    <td><a class="text-primary" href="<?php echo e(route('User.Show',$message->recived->username)); ?>">
                            <?php echo e($message->recived->username); ?></a></td>
                    <td>
                        <?php if($message->response): ?>
                        <?php echo $message->response; ?>

                        <?php else: ?>
                        <span>بدون پاسخ</span>
                        <?php endif; ?>

                    </td>
                    <?php endif; ?>

                    <td><?php echo e(\Morilog\Jalali\Jalalian::forge($message->created_at)->format('%d %B %Y')); ?></td>

                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>




            </tbody>
        </table>
    </div>
    <div style="text-align: center">

    </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.Panel.temp', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\media\resources\views/Panel/AllMessages.blade.php ENDPATH**/ ?>