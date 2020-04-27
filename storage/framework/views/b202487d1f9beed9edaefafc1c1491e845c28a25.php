

<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-md-12">

        <div class="card p-3">
            <div class="wpb_wrapper py-3">
                <h2 class="font__family-open-sans font__size-20  mt-15 mb-15 title__divider title__divider--line"
                    style="margin-right: 0px;"><span class="title__divider__wrapper">ایجاد پست جدید<span
                            class="line brk-base-bg-gradient-right"></span>
                    </span></h2>

            </div>
            <form id="upload-file" method="post" action="<?php echo e(route('sUploadFile')); ?>" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <div class="row">
                    <div class="form-group col-md-6">
                        <select name="type" id="type" class="form-control browser-default custom-select">
                            <option value="" selected>دسته بندی</option>
                            <?php if($member->group=='student'): ?>
                            <?php $__empty_1 = true; $__currentLoopData = \App\Models\Contents\Categories::where('id','!=',6)->latest()->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <option value="<?php echo e($category->id); ?>"><?php echo e($category->name); ?></option>

                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <option value="" selected>دسته بندی تعریف نشده است</option>
                            <?php endif; ?>

 
                            <?php else: ?>
                            <?php $__empty_1 = true; $__currentLoopData = \App\Models\Contents\Categories::latest()->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <option value="<?php echo e($category->id); ?>"><?php echo e($category->name); ?></option>

                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <option value="" selected>دسته بندی تعریف نشده است</option>
                            <?php endif; ?>

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
                </div>
                <div class="row">

                    <div class="form-group col-md-6">
                        <select name="subject" id="subject" class="form-control browser-default custom-select">
                            <option value="" selected>موضوع</option>
                            <?php $__empty_1 = true; $__currentLoopData = \App\Models\Contents\Subjects::latest()->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subject): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <option value="<?php echo e($subject->id); ?>"><?php echo e($subject->name); ?></option>

                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <option value="0" selected>موضوع تعریف نشده است</option>
                            <?php endif; ?>

                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <select name="level" id="level" class=" form-control browser-default custom-select">
                            <option value="" selected>سطح علمی</option>
                            <?php $__empty_1 = true; $__currentLoopData = \App\Models\Contents\Levels::latest()->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $level): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <option value="<?php echo e($level->id); ?>"><?php echo e($level->name); ?></option>

                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <option value="0" selected>سطح علمی تعریف نشده است</option>
                            <?php endif; ?>


                        </select>
                    </div>

                </div>
                <div class="row">
                    <div class="form-group col-md-6">
                        <input type="text" class="form-control" name="title" id="title" placeholder="عنوان">
                    </div>
                    <div class="form-group col-md-6">
                        <input type="text" class="form-control" name="owner" placeholder="نام صاحب اثر">
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-md-6">
                        <div class="form-row">
                            <div class="col-md-3">
                                <label for="">تصویر فایل</label>
                            </div>
                            <div class="col-md-9">
                                <input type="file" class="form-control" name="pic">
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <input type="text" class="form-control" name="url" placeholder="آدرس یکتا">
                    </div>
                </div>
              
                <div class="row">
                    <div class="form-group col-md-12">
                        <label for="desc">توضیحات : </label>
                        <textarea class="form-control" name="desc" id="desc" cols="30" rows="8"></textarea>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-12">
                        <label for="desc">متن فایل: (این متن میتواند ترجمه فایل باشد)</label>
                        <textarea class="form-control" name="desc2" id="desc2" cols="30" rows="8"></textarea>
                    </div>
                </div>
                

                <div class="form-footer">
                    <div class="row fileform">
                        <div class="form-group col-md-6">
                            <label for="desc">فایل: </label>
                            <input type="file" class="form-control" name="file" id="file" />
                        </div>

                        <div class="form-group col-md-6">
                            <label for="desc">افزودن زیرنویس: فایل زیرنویس باید با فرمت vtt باشد </label>
                            <input type="file" class="form-control" name="subtitle" id="subtitle" />
                        </div>
                    </div>
                    <div class="row">
                        
                        <div class="form-group col-md-2">
                            <label for="desc">قیمت:  </label>
                            <input type="number" class="form-control" value="0" name="price" id="price" placeholder="">
                            <span class="rial">ریال</span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3 my-2 btn--wrapper">
                            <input type="submit" name="upload" id="upload" value="آپلود" class="btn btn-sm btn-success" />
                        </div>
                    </div>
                </div>
               



        </div>

        </form>

        
        <hr>
       
        <div class="progress">
            <div class="progress-bar" role="progressbar" aria-valuenow="" aria-valuemin="0" aria-valuemax="100"
                style="width: 0%">
                0%
            </div>
        </div>
        <br />
        <div id="success">

        </div>
    </div>
</div>

</div>
<div class="row">
    <div class="col-md-12 mt-3 mb-5">
        <div class="sc-gZMcBi ePNtwd"><span>پسوند های مجاز فایل </span>
            <div class="sc-gqjmRU CZXVf">؟</div>

        </div>
        <div class="sc-VigVT hESCWV">
            <p>avi,mp4,mp3,mpga,mkv,3gp
            </p>
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
        CKEDITOR.replace('desc',{
            extraPlugins: 'uploadimage',
            filebrowserUploadUrl: '<?php echo e(route('UploadImage')); ?>?type=file',
            imageUploadUrl: '<?php echo e(route('UploadImage')); ?>?type=image'
        });
    CKEDITOR.replace('desc2',{
            extraPlugins: 'uploadimage',
            filebrowserUploadUrl: '<?php echo e(route('UploadImage')); ?>?type=file',
            imageUploadUrl: '<?php echo e(route('UploadImage')); ?>?type=image'
        });
        CKEDITOR.replace('epizode_desc',{
            extraPlugins: 'uploadimage',
            filebrowserUploadUrl: '<?php echo e(route('UploadImage')); ?>?type=file',
            imageUploadUrl: '<?php echo e(route('UploadImage')); ?>?type=image'
        });




        $(document).on('change','#type',function(){
            if($(this).val() == '6'){
                $('.btn--wrapper input').val('ارسال')
               
                $('.epizode').show()
            }else{
                $('.btn--wrapper input').val('آپلود')
                
                $('.epizode').hide()
            }
        })



        $("#upload-file").validate({
		rules: {
            title:"required",
            type:"required",
            lang:"required",
            subject:"required",
            level:"required",
            desc:"required",
		},
		messages: {
			
            title: {
            required: "لطفا عنوان فایل را وارد نمایید",
            

            },
            type:"محتوای فایل را انتخاب کنید",
            lang:"زبان فایل را انتخاب کنید",
            level:"سطح علمی فایل را انتخاب کنید",
            subject:"موضوع مورد نظر خود را انتخاب کنید",
            desc:"توضیحات برای فایل الزامی است",

           
			},
        
	});
    
    $('#upload').click(function(){
           if($('#upload-file').valid()){
            $(this).val('در حال آپلود ...')
           }
            
        })
    // $('form').ajaxForm({
    //     beforeSerialize:function($Form, options){
    //     /* Before serialize */
    //     for ( instance in CKEDITOR.instances ) {
    //         CKEDITOR.instances[instance].updateElement();
    //     }
    //     return true; 
    // },
    //   beforeSend:function(){
    //     $('#success').empty();
        
    //   },
    //   uploadProgress:function(event, position, total, percentComplete)
    //   {
    //    if ($('#type').val() != '6') {
    //     $('.btn--wrapper').html(`<button class="btn btn-sm btn-success" type="button" disabled="">
    //                 <span class="spinner-border spinner-border-sm m-l-5 fs-0-8" role="status" aria-hidden="true"></span>
    //                 در حال بارگذاری ...
    //             </button>`)
    //     $('.progress-bar').text(percentComplete + '%');
    //     $('.progress-bar').css('width', percentComplete + '%');
    //    }else{
    //     $('.btn--wrapper').html(`<button class="btn btn-sm btn-success" type="button" disabled="">
    //                 <span class="spinner-border spinner-border-sm m-l-5 fs-0-8" role="status" aria-hidden="true"></span>
    //                 در حال ارسال...
    //             </button>`)
    //    }
      
    //   },
     
    //   success:function(data)
    //   {
    //     if ($('#type').val() != '6') {

    //       $('.btn--wrapper').html(`<input type="submit" name="upload" value="آپلود" class="btn btn-sm btn-success" />`)
    //     }else{
    //         $('.btn--wrapper').html(`<input type="submit" name="upload" value="ارسال" class="btn btn-sm btn-success" />`)

    //     }
    //     if(data.errors)
    //     {
    //         swal("خطا"
    //         , data.errors
    //         ,
    //          "error", {
	// 		button: "باشه"
	// 	});
    //       $('.progress-bar').text('0%');
    //       $('.progress-bar').css('width', '0%');
    //     }
    //     if(data.success)
    //     {
    //     if ($('#type').val() != '6') {
    //         swal("موفق"
    //         , "فایل با موفقیت آپلود شد"
    //         ,
    //          "success", {
	// 		button: "باشه"
	// 	});

    //       $('.progress-bar').text('انجام شد');
    //       $('.progress-bar').css('width', '100%');
    //       }else{
    //         swal("موفق"
    //         , "ارسال با موفقیت انجام شد"
    //         ,
    //          "success", {
	// 		button: "باشه"
	// 	});
    //       }
    //       $('#success').append(data.image);

    //       var form = $('#upload-file')
    //         form.find('input[type="text"]').val('')
           
    //         form.find('input[type="file"]').val('')
           
    //         form.find('textarea').val('')
          
    //     }
    //   },

    //   error:function(data){
    //     swal("خطا"
    //         , 'آپلود ناموفق بود'
    //         ,
    //          "error", {
	// 		button: "باشه"
	// 	});
    //   }
    // });

});
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.Panel.temp', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\media\resources\views/Panel/UploadFile.blade.php ENDPATH**/ ?>