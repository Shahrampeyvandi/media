

<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-md-12">
        <div class="card p-3">
            
            <form id="upload-file" method="post" action="<?php echo e(route('Panel.SaveEditSlideShow')); ?>"
                enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
        <input type="hidden" name="id" value="<?php echo e($slideshow->id); ?>">
                <img style="width:25%;" src="<?php echo e(asset($slideshow->banner)); ?>" alt="">
                <div class="row mt-2">
                    <div class="form-group col-md-12">
                        <label for="pic" class="col-form-label"><span class="text-danger">*</span> تصویر جدید : </label>
                    <input type="file" class="form-control"  name="pic" id="pic" />
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-12">
                        <label for="title">متن اسلایدشو </label>
                        <textarea class="form-control" name="title" id="title" cols="30" rows="20">

                            <?php echo $slideshow->title; ?>

                        </textarea>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-md-12">
                    <label for="link" class="col-form-label"><span class="text-danger">*</span> لینک: </label>
                    <input type="link" name="link" id="link" value="<?php echo e($slideshow->link); ?>" class="form-control">
                  </div>
                </div>

                <div class="row">
                    <div class="col-md-3 my-2 btn--wrapper">
                        <input type="submit" name="upload" value="ویرایش" class="btn btn-sm btn-success" />
                    </div>
                </div>





            </form>
        </div>


        

        <br />

    </div>
</div>

</div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>

<!-- begin::input mask -->
<script src="<?php echo e(asset('Panel/vendor/input-mask/jquery.mask.js')); ?>"></script>
<script src="<?php echo e(asset('Panel/assets/js/input-mask.js')); ?>"></script>
<!-- end::input mask -->
<script src="http://malsup.github.com/jquery.form.js"></script>
<script src="<?php echo e(asset('Panel/vendor/ckeditor/ckeditor.js')); ?>"></script>
<script>
    $(document).ready(function(){
        CKEDITOR.replace('title',{
            extraPlugins: 'uploadimage',
            filebrowserUploadUrl: '<?php echo e(route('UploadImage')); ?>?type=file',
            imageUploadUrl: '<?php echo e(route('UploadImage')); ?>?type=image'
        });
});
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.Panel.temp', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\media\resources\views/Panel/EditSlideShow.blade.php ENDPATH**/ ?>