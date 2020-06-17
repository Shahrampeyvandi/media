

<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-md-12">
        <div class="card p-3">
            <form id="upload-file" method="post" action="<?php echo e(route('Panel.SaveBannesPost')); ?>"
                enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <div class="row">
                    <div class="form-group col-md-6">
                        <select name="position" id="position" class="form-control browser-default custom-select">
                            <option value="" selected>جایگاه</option>
                            <option value="top_banner" >top_banner</option>
                            <option value="bottom_banner" >bottom_banner</option>
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <select name="type" id="type" class="form-control browser-default custom-select">
                            <option value="" selected>دسته بندی</option>

                            <?php $__empty_1 = true; $__currentLoopData = \App\Models\Contents\Categories::where('id','!=',6)->latest()->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <option value="<?php echo e($category->id); ?>"><?php echo e($category->name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <option value="" selected>دسته بندی تعریف نشده است</option>
                            <?php endif; ?>

                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <select name="lang" id="lang" class="form-control browser-default custom-select">
                            <option value="" selected>انتخاب زبان</option>
                            <?php $__empty_1 = true; $__currentLoopData = \App\Models\Contents\Languages::latest()->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $laguage): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <option value="<?php echo e($laguage->id); ?>"><?php echo e($laguage->name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <option value="0" selected>زبان تعریف نشده است</option>
                            <?php endif; ?>
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <select name="content" id="content" class="form-control browser-default custom-select">
                            <option value="0">ابتدا دسته بندی و زبان را انتخاب کنید</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                 
                </div>
                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="pic" class="col-form-label"><span class="text-danger">*</span> تصویر: </label>
                        <input type="file" class="form-control" name="pic" id="pic" />
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-12">
                        <label for="title">متن خود را وارد نمایید </label>
                        <textarea class="form-control" name="title" id="title" cols="30" rows="20"></textarea>
                    </div>
                </div>
               
                <div class="row">
                    <div class="col-md-3 my-2 btn--wrapper">
                        <input type="submit" name="upload" value="تایید" class="btn btn-sm btn-success" />
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
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        CKEDITOR.replace('title',{
            extraPlugins: 'uploadimage',
            filebrowserUploadUrl: '<?php echo e(route('UploadImage')); ?>?type=file',
            imageUploadUrl: '<?php echo e(route('UploadImage')); ?>?type=image'
        });


        $('#lang').change(function(e){
            e.preventDefault();
           var type =  $('#type').val()
           var lang = $(this).val()
          
        $.ajax({
                    url: '<?php echo e(route('Panel.GetAjaxContent')); ?>',
                    type: 'POST',
                    data: {type: type,lang:lang},
                    dataType: 'JSON',
                    cache: false,
                    success: function (res) {
                       $('#content').html(res)

                    }
                });

        });
});
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.Panel.temp', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\media\resources\views/Panel/BannerPost.blade.php ENDPATH**/ ?>