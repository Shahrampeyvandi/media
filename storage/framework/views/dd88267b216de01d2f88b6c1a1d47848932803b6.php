

<?php $__env->startSection('content'); ?>
<div class="col-sm-9 col-sm-offset-3 col-md-12  ">
    <div class="wpb_wrapper py-3">
        <h2 class="  mt-15 mb-15 title__divider title__divider--line"
            style="margin-right: 0px;"><span class="title__divider__wrapper">  دوره های خریداری شده ی من<span
                    class="line brk-base-bg-gradient-right"></span>
            </span></h2>
     
    </div>
    <div style="overflow-x: auto;">
        <table id="example1" class="table table-striped  table-bordered">
            <thead>
            <tr>
                <th>ردیف</th>
                <th >کاربر</th>
                <th >دوره</th>
                <th >هزینه پرداخت شده</th>
                <th >اطلاعات پرداخت</th>
                <th >وضعیت تراکنش</th>
                <th >تاریخ خرید </th>

            </tr>
            </thead>

            <tbody>
            <?php $__currentLoopData = $purchases; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$purchase): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
            <td><?php echo e($key+1); ?></td>
            <td><a href="<?php echo e(route('User.Videos',['name'=>$purchase->members->username])); ?>">
            <?php echo e($purchase->members->username); ?>

            </a>
            </td>
            <td><a href="<?php echo e(route('ShowItem',['id'=>$purchase->posts->id])); ?>">
            <?php echo e($purchase->posts->title); ?>

            </a></td>
            <td><?php echo e($purchase->payedprice); ?></td>
            <td><?php echo e($purchase->payinfo); ?></td>
            <td>
            <?php if($purchase->success ==1): ?>
            موفق

            <?php else: ?>
            نا موفق

            <?php endif; ?>
            </td>


            <td><?php echo e(\Morilog\Jalali\Jalalian::forge($purchase->created_at)->format('%d %B %Y')); ?></td>

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
<?php echo $__env->make('layout.Panel.temp', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\media\resources\views/Panel/MyPurchases.blade.php ENDPATH**/ ?>