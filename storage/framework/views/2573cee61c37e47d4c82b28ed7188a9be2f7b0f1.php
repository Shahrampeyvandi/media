

<?php $__env->startSection('content'); ?>
<div class="col-sm-9 col-sm-offset-3 col-md-12  ">
    <div class="wpb_wrapper py-3">
        <h2 class="  mt-15 mb-15 title__divider title__divider--line"
            style="margin-right: 0px;"><span class="title__divider__wrapper"> دنبال کنندگان من<span
                    class="line brk-base-bg-gradient-right"></span>
            </span></h2>
     
    </div>
    <div style="overflow-x: auto;">
        <table id="example1" class="table table-striped  table-bordered text-center w-100">
            <thead>
            <tr>
                <th>ردیف</th>
                <th style=""> نام کاربری</th>
                <th style=""> تصویر</th>
            </tr>
            </thead>

            <tbody>
            <?php $__currentLoopData = $followers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$follower): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
            <td><?php echo e($key+1); ?></td>
            <td><?php echo e($follower->username); ?></td>
            <td>
                <?php if($follower->avatar): ?>
                    
                <img class="d-inline" style="width:45px;" src="<?php echo e($follower->avatar); ?>" alt="">
                <?php else: ?>
                <img class="d-inline" style="width:45px;" src="<?php echo e(asset('assets/images/avatar.png')); ?>" alt="">
                <?php endif; ?>
            </td>
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
<?php echo $__env->make('layout.Panel.temp', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\media\resources\views/Panel/MyFollowers.blade.php ENDPATH**/ ?>