

<?php $__env->startSection('content'); ?>
<div class="overlay_upload " >
    <img src="<?php echo e(asset('assets/images/LOGO.jpeg')); ?>" style=" bottom: -60px;" alt="">
    </div>
<div class="row">
    <div class="col-md-12">

        <div class="card p-3">
            <div class="wpb_wrapper py-3">
                <h2 class="font__family-open-sans font__size-20  mt-15 mb-15 title__divider title__divider--line"
                    style="margin-right: 0px;"><span class="title__divider__wrapper">ایجاد قسمت جدید<span
                            class="line brk-base-bg-gradient-right"></span>
                    </span></h2>

            </div>
            <form id="upload-episode" action="<?php echo e(route('UploadEpizode')); ?>" method="post" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <input type="hidden" name="post_id" value="<?php echo e($id); ?>">
                <div class=" epizode p-3">
                    <h3 class="mb-2">آپلود قسمت های دوره: </h3>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <input type="number" class="form-control" name="epizode_number" id="epizode_number"
                                value="<?php echo e($number+1); ?>" placeholder="شماره قسمت">
                        </div>
                        <div class="form-group col-md-6">
                            <input type="text" class="form-control" name="epizode_title" id="epizode_title"
                                placeholder="عنوان">
                        </div>
                        <div class="form-group col-md-12">
                            <label for="desc">تصویر: </label>
                            <input type="file" class="form-control" name="epizode_pic" id="epizode_pic" />
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-12">
                            <label for="desc">فایل: </label>
                            <input type="file" class="form-control" name="file" id="file" />
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-12">
                            <label for="epizode_desc">توضیحات : </label>
                            <textarea class="form-control" name="epizode_desc" id="epizode_desc" cols="30"
                                rows="8"></textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-12">
                            <label for="desc">افزودن زیرنویس: فایل زیرنویس باید با فرمت vtt باشد </label>
                            <input type="file" class="form-control" name="epizode_subtitle" id="epizode_subtitle" />
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-3 my-2 ">
                            <input type="submit" id="upload" name="upload" value="آپلود"
                                class="btn btn-sm btn-success" />
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
          
            <script src="<?php echo e(asset('Panel/assets/js/jquery.form.min.js')); ?>"></script>

            <script src="<?php echo e(asset('Panel/vendor/ckeditor/ckeditor.js')); ?>"></script>
            <script>
                $(document).ready(function(){
      
        CKEDITOR.replace('epizode_desc',{
            extraPlugins: 'uploadimage',
            filebrowserUploadUrl: '<?php echo e(route('UploadImage')); ?>?type=file',
            imageUploadUrl: '<?php echo e(route('UploadImage')); ?>?type=image'
        });


        $("#upload-episode").validate({
		rules: {
            epizode_number:"required",
            epizode_title:"required",
            file:{required:true,accept: "avi,mp4,mov,mpga,mkv,3gp"},
            epizode_subtitle:{
                accept: "vtt"
            }

           
		},
		messages: {
			
            epizode_number: {required: "لطفا شماره قسمت را وارد نمایید",},
            epizode_title:"لطفا عنوان قسمت را وارد نمایید",
            file:{required:"فایل مورد نظر خود را انتخاب نمایید",accept:"فرمت فایل غیرمجاز می باشد"},
            epizode_subtitle:{
                accept: "فرمت زیرنویس غیرمجاز می باشد"
            }
			},
        
    });
    $('#upload').click(function(){
           if($('#upload-file').valid()){
            $(this).val('در حال آپلود ...')
           }
        })

    $('form').ajaxForm({
        beforeSerialize:function($Form, options){
        /* Before serialize */
        for ( instance in CKEDITOR.instances ) {
            CKEDITOR.instances[instance].updateElement();
        }
        return true; 
    },
      beforeSend:function(){
        $('#success').empty();
        
      },
      uploadProgress:function(event, position, total, percentComplete)
      {
     
        $('.btn--wrapper').html(`<button class="btn btn-sm btn-success" type="button" disabled="">
                    <span class="spinner-border spinner-border-sm m-l-5 fs-0-8" role="status" aria-hidden="true"></span>
                    در حال بارگذاری ...
                </button>`)
                $('.overlay_upload').show(300)
        $('.overlay_upload img').animate({bottom:'8px'}, 1000)
        $('.progress-bar').text(percentComplete + '%');
        $('.progress-bar').css('width', percentComplete + '%');
      
      
      },
     
      success:function(data)
      {
         
        

          $('.btn--wrapper').html(`<input type="submit" name="upload" value="آپلود" class="btn btn-sm btn-success" />`)
     
        if(data.errors)
        {
            swal("خطا"
            , data.errors
            ,
             "error", {
			button: "باشه"
		});
          $('.progress-bar').text('0%');
          $('.progress-bar').css('width', '0%');
          
        }
        if(data.success)
        {
        
            swal("موفق"
            , "فایل با موفقیت آپلود شد"
            ,
             "success", {
			button: "باشه"
		});

         window.location.reload()
          
        }
      },

      error:function(data){
        swal("خطا"
            , 'آپلود ناموفق بود'
            ,
             "error", {
			button: "باشه"
		});
      }
    });
   
});
            </script>
            <?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.Panel.temp', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\media\resources\views/Panel/UploadEpisode.blade.php ENDPATH**/ ?>