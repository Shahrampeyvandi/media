

<?php $__env->startSection('content'); ?>
<div id="popup1" class="overlay">
    <div class="popup">

        <a class="close" href="#">&times;</a>
        <div class="content">
            <form id="" action="<?php echo e(route('Panel.Post.Delete')); ?>" method="post">
                <?php echo csrf_field(); ?>
               
                <div class="mt-5 pr-2">
                    <h5 class="modal-title  pt-1 mb-2" id="exampleModalLabel">اخطار</h5>
                    <div class="form-group col-md-12">
                        <input type="hidden" id="post_id" name="post_id" value="0">
                      
                       
                    </div>
                    <p>آیا برای حذف مورد مطمئن هستید؟</p>
                </div>
                <div class="form-group   offset-md-10">

                    <button type="submit" class="btn btn-sm btn-danger ">حذف </button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="col-sm-12 col-sm-offset-3 col-md-12  ">
    <div class="wpb_wrapper py-3">
        <h2 class="  mt-15 mb-15 title__divider title__divider--line"
            style="margin-right: 0px;"><span class="title__divider__wrapper"> گزارش تراکنش ها<span
                    class="line brk-base-bg-gradient-right"></span>
            </span></h2>
     
    </div>
    <div style="overflow-x: auto;">
        <table id="example1" class="table table-striped  table-bordered">
            <thead>
            <tr>
                <th>ردیف</th>
                <th >مقدار</th>
                <th > برای پست</th>
                <th > توسط</th>
                <th > توضیحات</th>
                <th > تاریخ ثبت</th>

            </tr>
            </thead>

            <tbody>
            <?php $__currentLoopData = $transactions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$transaction): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
            <td><?php echo e($key+1); ?></td>
            <td>
            <?php echo e($transaction->amount); ?>

            تومان
            </td>
            <td>
            <a class="text-primary" href="<?php echo e(route('ShowItem',$transaction->posts_id)); ?>">
            <?php echo e($transaction->posts->title); ?>

            </a>
            </td>
            <td><a class="text-primary" href="<?php echo e(route('User.Show',$transaction->members->username)); ?>">
            <?php echo e($transaction->members->username); ?>

            </a>
            </td>
            <td>
            <?php echo e($transaction->description); ?>


            </td>
            <td><?php echo e(\Morilog\Jalali\Jalalian::forge($transaction->created_at)->format('%d %B %Y')); ?></td>
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
<?php echo $__env->make('layout.Panel.temp', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\media\resources\views/Panel/Transactions.blade.php ENDPATH**/ ?>