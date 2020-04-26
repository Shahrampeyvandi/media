

<?php $__env->startSection('content'); ?>
<div id="popup1" class="overlay">
    <div class="popup">

        <a class="close" href="#">&times;</a>
        <div class="content">
            <form id="" action="<?php echo e(route('Panel.SlideShow.Submit')); ?>" method="post" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <div class="mt-5 pr-2">
                    <h5 class="modal-title  pt-1 mb-2" id="exampleModalLabel">افزودن تصویر جدید</h5>
                    <div class="form-group col-md-12">
                    <label for="title" class="col-form-label"><span class="text-danger">*</span> تیتر: </label>
                    <input type="text" name="title" id="title" class="form-control">
                    <label for="pic" class="col-form-label"><span class="text-danger">*</span> تصویر: </label>
                    <input type="file" class="form-control" name="pic" id="pic" />
                    <label for="link" class="col-form-label"><span class="text-danger">*</span> لینک: </label>
                    <input type="link" name="link" id="link" class="form-control">
                    <button type="submit" class="btn btn-sm btn-danger ">افزودن</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="col-sm-12 col-sm-offset-3 col-md-12  ">
    <div class="wpb_wrapper py-3">
        <h2 class="  mt-15 mb-15 title__divider title__divider--line"
            style="margin-right: 0px;"><span class="title__divider__wrapper"> بنر های اسلایدشو<span
                    class="line brk-base-bg-gradient-right"></span>
            </span>                            <a data-id="" style="left:0;" class="btn--delete btn btn-success btn-sm m-0 position-absolute">افزودن</a>

            </h2>
        
    </div>
    <div style="overflow-x: auto;">
        <table id="example1" class="table table-striped  table-bordered">
            <thead>
            <tr>
                <th>ردیف</th>
                <th>تصویر</th>
                <th style="width: 600px"> تیتر</th>
                <th>لینک</th>
                <th>تاریخ ثبت</th>
                <th>عملیات</th>

            </tr>
            </thead>

            <tbody>
            <?php $__currentLoopData = $slideshows; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$slideshow): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
            <td><?php echo e($key+1); ?></td>
            <td><img src="<?php echo e(route('BaseUrl')); ?>//<?php echo e($slideshow->banner); ?>" style="width:300px;"></td>
            <td><?php echo e($slideshow->title); ?></td>
            <td><?php echo e($slideshow->link); ?></td>
            <td><?php echo e(\Morilog\Jalali\Jalalian::forge($slideshow->created_at)->format('%d %B %Y')); ?></td>
            <td>
            <form action="<?php echo e(route('Panel.SlideShow.Delete')); ?>" method="post">
            <?php echo csrf_field(); ?>
             <div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
                          <input type="hidden" value="<?php echo e($slideshow->id); ?>" name="id">
                            <input type="submit" class="btn btn-warning btn-sm m-0" value="حذف">
                        </div></form>
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
<?php echo $__env->make('layout.Panel.temp', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\media\resources\views/Panel/SlideShow.blade.php ENDPATH**/ ?>