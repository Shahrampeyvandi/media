

<?php $__env->startSection('content'); ?>



<div class="wpb_wrapper py-3">
    <h2 class="  mt-15 mb-15 title__divider title__divider--line"
        style="margin-right: 0px;"><span class="title__divider__wrapper">وضعیت فایل های منتشر نشده<span
                class="line brk-base-bg-gradient-right"></span>
        </span></h2>
 
</div>
<div class="row">
<div class="col-sm-9 col-sm-offset-3 col-md-12 mt-3 ">
   
    <div style="overflow-x: auto;">
        <table id="example1" class="table table-striped  table-bordered">
            <thead>
            <tr>
                <th>ردیف</th>
                <th> عنوان</th>
                <th style="width: 600px"> دلیل عدم تایید</th>
                <th>تاریخ ارسال</th>
            </tr>
            </thead>

            <tbody>
            <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>

            <th><?php echo e($key+1); ?></th>
            <th><?php echo e($post->title); ?></th>
            <th><?php echo e($post->rejectreason); ?></th>
            <th><?php echo e(\Morilog\Jalali\Jalalian::forge($post->created_at)->format('%d %B %Y')); ?></th>

            </tr>

            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          
          
            </tbody>
        </table>
    </div>
    <div style="text-align: center">
        
    </div>
</div>
</div>


<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.Panel.temp', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\media\resources\views/Panel/UnsubscribeFiles.blade.php ENDPATH**/ ?>