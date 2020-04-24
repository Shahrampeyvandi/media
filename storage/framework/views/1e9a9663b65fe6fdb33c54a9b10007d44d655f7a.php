

<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-md-12">
        <div>

            <a href="<?php echo e(route('Panel.Members')); ?>" <?php if(request()->path() == "panel/members"): ?>
                class="btn btn-info" <?php else: ?> class="btn btn-light"  <?php endif; ?>>دانشجویان</a>
            <a href="<?php echo e(route('Panel.Members','teacher')); ?>" <?php if(request()->path() == "panel/members/teacher"): ?>
                class="btn btn-info" <?php else: ?> class="btn btn-light"  <?php endif; ?>>اساتید</a>
            <a href="<?php echo e(route('Panel.Members','deactive')); ?>" <?php if(request()->path() == "panel/members/deactive"): ?>
                class="btn btn-info" <?php else: ?> class="btn btn-light"  <?php endif; ?>>غیر فعال</a>


            <a href="#"></a>
        </div>
        <hr>
    </div>
</div>

<div class="col-sm-9 col-sm-offset-3 col-md-12  ">
    <div class="wpb_wrapper py-3">
        <h2 class="  mt-15 mb-15 title__divider title__divider--line"
            style="margin-right: 0px;"><span class="title__divider__wrapper">کاربران<span
                    class="line brk-base-bg-gradient-right"></span>
            </span></h2>
     
    </div>
    <div style="overflow-x: auto;">
        <table id="example1" class="table table-striped  table-bordered">
            <thead>
            <tr>
                <th>ردیف</th>
                <th>نام </th>
                <th>نام خانوادگی</th>

                <th>موبایل</th>
                <th>یوزرنیم</th>
                <th>ایمیل</th>
                <th>تاریخ عضویت</th>
                <th>وضعیت</th>
                <th>عملیات</th>

            </tr>
            </thead>

            <tbody>
            <?php $__currentLoopData = $members; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$member): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
            <td><?php echo e($key+1); ?></td>
            <td><?php echo e($member->firstname); ?></td>
            <td><?php echo e($member->lastname); ?></td>
            <td><?php echo e($member->mobile); ?></td>
            <td><?php echo e($member->username); ?></td>
            <td><?php echo e($member->email); ?></td>
            <td><?php echo e(\Morilog\Jalali\Jalalian::forge($member->created_at)->format('%d %B %Y')); ?></td>
            <?php switch($member->confirmed):
            case (0): ?>
            <td>در انتظار تایید</td>
            <td>تایید  -  رد</td>
            <?php break; ?>
            <?php case (1): ?>
            <td>فعال</td>
            <td>غیر فعال کردن</td>
            <?php break; ?>
            <?php case (2): ?>
            <td>غیر فعال</td>
            <td>فعال کردن</td>
            <?php break; ?>
            <?php endswitch; ?>
            

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
<?php echo $__env->make('layout.Panel.temp', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\media\resources\views/Panel/Members.blade.php ENDPATH**/ ?>