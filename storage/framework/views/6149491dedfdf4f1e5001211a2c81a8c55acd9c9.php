

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
               
                <div class="form-group  float-left mt-1 ">

                    <button type="submit" class="btn btn-sm btn-danger "> ارسال </button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="col-sm-9 col-sm-offset-3 col-md-12  ">
    <div class="wpb_wrapper py-3">
        <h2 class="  mt-15 mb-15 title__divider title__divider--line"
            style="margin-right: 0px;"><span class="title__divider__wrapper"> دنبال کنندگان من<span
                    class="line brk-base-bg-gradient-right"></span>
            </span></h2>
     
    </div>
    <div style="overflow-x: auto;">
        <table id="example1" class="table table-striped  table-bordered">
            <thead>
            <tr>
                <th>ردیف</th>
                <th style="width: 600px"> متن</th>
                <th> کاربر ارسال کننده</th>
                <th> پاسخ شما</th>
                <th> تاریخ ثبت</th>

            </tr>
            </thead>

            <tbody>
            <?php $__currentLoopData = $messages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
            <td><?php echo e($key+1); ?></td>
            <td><?php echo e($message->message); ?></td>
            <td><?php echo e($message->members->username); ?></td>
            <td>
            <?php if($message->response): ?>
            <?php echo e($message->response); ?>

            <?php else: ?>
            <div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
                    
                        <a data-id="<?php echo e($message->id); ?>" data-member="<?php echo e($message->id); ?>" class="post--delete btn btn-warning btn-sm m-0">پاسخ</a>
                        </div>
            <?php endif; ?>
            
            </td>
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