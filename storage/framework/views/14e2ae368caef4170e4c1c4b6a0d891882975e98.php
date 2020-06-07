

<?php $__env->startSection('content'); ?>
<div id="popup1" class="overlay">
    <div class="popup">
        <a class="close" href="#">&times;</a>
        <div class="content">
            <form id="" action="<?php echo e(route('Panel.SlideShow.Delete')); ?>" method="post">
                <?php echo csrf_field(); ?>
                <div class="mt-5 pr-2">
                    <h5 class="modal-title  pt-1 mb-2" id="exampleModalLabel">اخطار</h5>
                    <div class="form-group col-md-12">
                        <input type="hidden" id="comment_id" name="comment_id" value="0">
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
        <h2 class="  mt-15 mb-15 title__divider title__divider--line" style="margin-right: 0px;"><span
                class="title__divider__wrapper"> پست های ویژه<span class="line brk-base-bg-gradient-right"></span>
            </span> <a href="<?php echo e(route('Panel.CreateBanner')); ?>" style="left:0;"
                class=" btn btn-success btn-sm m-0 position-absolute">جدید</a>
        </h2>
    </div>
   
    <div style="overflow-x: auto;">
        <table id="example1" class="table table-striped  table-bordered w-100">
            <thead>
                <tr>
                    <th>ردیف</th>
                    <th>تصویر</th>
                    <th> متن</th>
                    <th>لینک</th>
                    <th>تاریخ ثبت</th>
                    <th>عملیات</th>

                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $postbanners; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$banner): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($key+1); ?></td>
                    <td><img src="<?php echo e(route('BaseUrl')); ?>//<?php echo e($banner->banner); ?>" style="width:200px;"></td>
                    <td><?php echo e($banner->title); ?></td>
                    <td><?php echo e($banner->link); ?></td>
                    <td><?php echo e(\Morilog\Jalali\Jalalian::forge($banner->created_at)->format('%d %B %Y')); ?></td>
                    <td>

                        <div class="btn-group" role="group" aria-label="">
                        <a href="<?php echo e(route('Panel.EditSlideShow',$banner->id)); ?>"
                                class=" btn btn-rounded btn-info btn-sm m-0">ویرایش</a>
                            <a data-id="<?php echo e($banner->id); ?>"
                                class="btn--delete btn btn-rounded btn-danger btn-sm m-0">حذف</a>
                        </div>
                    </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>

</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.Panel.temp', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\media\resources\views/Panel/BannerPostList.blade.php ENDPATH**/ ?>