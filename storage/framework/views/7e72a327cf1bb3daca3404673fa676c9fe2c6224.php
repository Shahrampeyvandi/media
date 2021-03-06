

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
                class="title__divider__wrapper"> بنر های اسلایدشو<span class="line brk-base-bg-gradient-right"></span>
            </span> <a href="<?php echo e(route('Panel.CreateSlideShow')); ?>" style="left:0;"
                class=" btn btn-success btn-sm m-0 position-absolute">افزودن</a>
        </h2>
    </div>
    <div class="row mb-3">
        <div class="col-md-6">
        <form id="setting" action="<?php echo e(route('SlideShow.Count')); ?>" method="post">
                <?php echo csrf_field(); ?>
                <div class="form-group ">
                    <label for="">نوع : </label>
                    <select name="slider_type" id="slider-type" class="form-control  custom-select">
                       
                       
                        <option value="header slider" >header slider</option>
                        <option value="client slider" >client slider</option>

                    </select>
                </div>
                <div class="form-group header_sec" style="display: none;">
                    <label for="header">عنوان هدر اسلایدر: </label>
                    <input type="text" class="form-control" name="header" id="header">
                </div>
                <div class="form-group ">
                    <label for="">تعداد نمایش داده شده در صفحه</label>
                    <select name="count" id="count" class="form-control  custom-select">
                       
                       
                        <option value="1" <?php if($count == 1): ?>
                            selected
                        <?php endif; ?> >یک</option>
                        <option value="2" <?php if($count == 2): ?>
                        selected
                    <?php endif; ?>>دو</option>
                        <option value="3" <?php if($count == 3): ?>
                        selected
                    <?php endif; ?>>سه</option>
                        <option value="4" <?php if($count == 4): ?>
                        selected
                    <?php endif; ?>>چهار</option>
                       
                    </select>
                </div>
                <div class="form-group">
                    <button class="mx-0 btn btn-sm btn-info">تایید</button>
                </div>
            </form>
        </div>
    </div>
    <div style="overflow-x: auto;">
        <table id="example1" class="table table-striped  table-bordered w-100">
            <thead>
                <tr>
                    <th>ردیف</th>
                    <th>تصویر</th>
                    <th>نوع</th>
                    <th> متن</th>
                    <th>لینک</th>
                    <th>تاریخ ثبت</th>
                    <th>عملیات</th>

                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $slideshows; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$slideshow): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($key+1); ?></td>
                    <td><img src="<?php echo e(route('BaseUrl')); ?>//<?php echo e($slideshow->banner); ?>" style="width:200px;"></td>
                    <td><span class="text-primary"><?php echo e($slideshow->type); ?></span></td>
                    <td><?php echo $slideshow->title; ?></td>
                    <td>
                        <?php if($slideshow->link): ?>
                        <?php echo e($slideshow->link); ?>

                        <?php else: ?>
                        <span class="text-danger">ندارد</span>
                        <?php endif; ?>
                    </td>
                    <td><?php echo e(\Morilog\Jalali\Jalalian::forge($slideshow->created_at)->format('%d %B %Y')); ?></td>
                    <td>

                        <div class="btn-group" role="group" aria-label="">
                        <a href="<?php echo e(route('Panel.EditSlideShow',$slideshow->id)); ?>"
                                class=" btn btn-rounded btn-info btn-sm m-0">ویرایش</a>
                            <a data-id="<?php echo e($slideshow->id); ?>"
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

<script>
    $('#slider-type').change(function(){
        if($(this).val() == "client slider"){
            $('.header_sec').show(200)
        }else{
            $('.header_sec').hide(200)
       
        }
    })

    $("#setting").validate({
		rules: {
            header:{
        required: function(element){
            return $("#slider-type").val() == "client slider";
        }
      },
		},
		messages: {
			header: "لطفا عنوان هدر اسلایدر را وارد نمایید",
		
		}
	});
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.Panel.temp', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\media\resources\views/Panel/SlideShow.blade.php ENDPATH**/ ?>