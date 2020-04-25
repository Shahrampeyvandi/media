

<?php $__env->startSection('content'); ?>
<div class="col-sm-9 col-sm-offset-3 col-md-12  ">
    <div class="wpb_wrapper py-3">
        <h2 class="  mt-15 mb-15 title__divider title__divider--line"
            style="margin-right: 0px;"><span class="title__divider__wrapper">وضعیت دیدگاه های من<span
                    class="line brk-base-bg-gradient-right"></span>
            </span></h2>
     
    </div>
    <div style="overflow-x: auto;">
        <table id="example1" class="table table-striped  table-bordered">
            <thead>
            <tr>
                <th>ردیف</th>
                <th style="width: 600px"> متن پیام</th>
                <th>برای نظر</th>
                <th>وضعیت</th>
                <th>تاریخ ثبت</th>

            </tr>
            </thead>
            <tbody>
            <?php $__currentLoopData = $member->comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
            <td><?php echo e($key+1); ?></td>
            <td><?php echo $comment->text; ?></td>
           <td> <a href="<?php echo e(route('ShowItem',['id'=>$comment->posts->id])); ?>"><?php echo e($comment->posts->title); ?><a></td>
            <?php if($comment->confirmed == 0): ?>
            <td>تایید نشده</td>
            <?php else: ?>
            <td>تایید شده</td>
            <?php endif; ?>
            <td><?php echo e(\Morilog\Jalali\Jalalian::forge($comment->created_at)->format('%d %B %Y')); ?></td>
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
<?php echo $__env->make('layout.Panel.temp', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\media\resources\views/Panel/MyComments.blade.php ENDPATH**/ ?>