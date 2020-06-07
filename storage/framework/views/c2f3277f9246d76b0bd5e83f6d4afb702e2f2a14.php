

<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-md-12">
        <div class="card p-3">
           
            <form id="upload-file" method="post" action="<?php echo e(route('Panel.SaveEditContactUs')); ?>" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <input type="hidden" name="id" value="<?php echo e($advert->id); ?>">

                <div class="row">
                    <div class="form-group col-md-12">
                        <label for="content">متن خود را وارد نمایید </label>
                        <textarea class="form-control" name="content" id="content" cols="30" rows="20">

                            <?php echo $advert->content; ?>

                        </textarea>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-3 my-2 btn--wrapper">
                        <input type="submit" name="upload" value="جدید" class="btn btn-sm btn-success" />
                    </div>
                </div>





        </div>

        </form>

        
      
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
        CKEDITOR.replace('content',{
            extraPlugins: 'uploadimage',
            filebrowserUploadUrl: '<?php echo e(route('UploadImage')); ?>?type=file',
            imageUploadUrl: '<?php echo e(route('UploadImage')); ?>?type=image'
        });
});
</script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layout.Panel.temp', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\media\resources\views/Panel/EditAdvert.blade.php ENDPATH**/ ?>