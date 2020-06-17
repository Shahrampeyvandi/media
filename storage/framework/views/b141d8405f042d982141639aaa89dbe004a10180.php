

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
            style="margin-right: 0px;"><span class="title__divider__wrapper"> گزارشات تخلف پست ها<span
                    class="line brk-base-bg-gradient-right"></span>
            </span></h2>
     
    </div>
    <div style="overflow-x: auto;">
        <table id="example1" class="table table-striped  table-bordered">
            <thead>
            <tr>
                <th>ردیف</th>
                <th >پست</th>
                <th > دسته بندی</th>
                <th > موضوع</th>
                <th style="width:50%;"> گزارش</th>
                <th > کاربر گزارش دهنده</th>
                <th > تاریخ ثبت</th>
                <th >  عملیات</th>

            </tr>
            </thead>

            <tbody>
            <?php $__currentLoopData = $reports; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$report): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
            <td><?php echo e($key+1); ?></td>
            <td><a class="text-primary" href="<?php echo e(route('ShowItem',$report->posts_id)); ?>">
            <?php echo e($report->posts->title); ?>

            </a>
            </td>
            <td><?php echo e($report->posts->categories->name); ?></td>
            <td><?php echo e($report->posts->subjects->name); ?></td>
            <td><?php echo $report->info; ?></td>
            <td>
            <?php echo e($report->members->username); ?>

            </td>
            <td><?php echo e(\Morilog\Jalali\Jalalian::forge($report->created_at)->format('%d %B %Y')); ?></td>

<td>
            <div class="btn-group" role="group" aria-label="">
                <a  href="<?php echo e(route('Admin.CheckPost',$report->posts->id)); ?>" class=" btn btn-rounded btn-info btn-sm m-0">ویرایش</a>
                    <a  data-id="<?php echo e($report->posts->id); ?>" class="delete-post btn btn-rounded btn-danger btn-sm m-0">حذف</a>
                  </div>
    </td>       </tr>
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
<?php echo $__env->make('layout.Panel.temp', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\media\resources\views/Panel/ViolationReports.blade.php ENDPATH**/ ?>