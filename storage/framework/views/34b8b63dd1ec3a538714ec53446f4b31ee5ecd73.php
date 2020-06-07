

<?php $__env->startSection('content'); ?>

<div id="popup" class="overlay delete">
    <div class="popup">
        <a class="close" href="#">&times;</a>
        <div class="content">
            <form id="" action="<?php echo e(route('Panel.Posts.Reject.Submit')); ?>" method="get">
                <?php echo csrf_field(); ?>
                <div class="mt-5 pr-2">
                    <h5 class="modal-title  pt-1 mb-2" id="exampleModalLabel">اخطار</h5>
                    <div class="form-group col-md-12">
                        <input type="hidden" id="post-id" name="post_id" value="">
                        <input type="hidden" id="member-id" name="member_id" value="">
                    </div>
                    <label for="user_pass" class="col-form-label"><span class="text-danger">*</span> دلیل عدم تایید:
                    </label>
                    <div class="form-group mt-2 ">
                        <select name="reason" id="reason" class="form-control browser-default custom-select">
                            <option value="" selected>باز کردن فهرست انتخاب</option>
                       <?php $__currentLoopData = \App\Models\Contents\ViolationList::latest()->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($item->name); ?>" ><?php echo e($item->name); ?></option>
    
                       <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                       
                        </select>
                    </div>               
                </div>
                <div class="form-group  mt-1 ">
                    <button type="submit" class="btn btn-sm btn-danger ">عدم تایید </button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">

        <div class="card p-3">
            
            <?php $__env->startComponent('Includes.Main.player',['content' => $post,'link' => $link,
            'link_type'=>$link_type,
            'pic_link'=> $pic_link]); ?>
                
            <?php if (isset($__componentOriginal05cfbe25f58014efe1d163753904743c3c2151ce)): ?>
<?php $component = $__componentOriginal05cfbe25f58014efe1d163753904743c3c2151ce; ?>
<?php unset($__componentOriginal05cfbe25f58014efe1d163753904743c3c2151ce); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>

            <div class="wpb_wrapper py-3">
                <h2 class="font__family-open-sans font__size-20  mt-15 mb-15 title__divider title__divider--line"
                    style="margin-right: 0px;"><span class="title__divider__wrapper">ویرایش محتوا<span
                            class="line brk-base-bg-gradient-right"></span>
                    </span></h2>
            </div>
            <form id="upload-file" method="post" action="<?php echo e(route('Panel.Posts.Confirm.Submit')); ?>" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <input type="hidden" class="" name="id" id="id" value="<?php echo e($post->id); ?>">

                <div class="row">
                    <div class="form-group col-md-6">
                        <select name="type" id="type" class="form-control browser-default custom-select">
                            <option value="" selected>دسته بندی</option>
                           
                            <?php $__empty_1 = true; $__currentLoopData = \App\Models\Contents\Categories::latest()->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <option <?php if($post->categories_id == $category->id): ?>
                                selected
                            <?php endif; ?> value="<?php echo e($category->id); ?>"><?php echo e($category->name); ?></option>

                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <option value="" selected>دسته بندی تعریف نشده است</option>
                            <?php endif; ?>
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <select name="lang" id="lang" class="form-control browser-default custom-select">
                            <option value="" selected>انتخاب زبان</option>
                            <?php $__empty_1 = true; $__currentLoopData = \App\Models\Contents\Languages::latest()->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $laguage): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <option <?php if($post->languages_id  == $laguage->id): ?>
                                selected
                            <?php endif; ?> value="<?php echo e($laguage->id); ?>"><?php echo e($laguage->name); ?></option>

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
                            <option <?php if($post->subjects_id   == $subject->id): ?>
                                selected
                            <?php endif; ?> value="<?php echo e($subject->id); ?>"><?php echo e($subject->name); ?></option>

                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <option value="0" selected>موضوع تعریف نشده است</option>
                            <?php endif; ?>

                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <select name="level" id="level" class=" form-control browser-default custom-select">
                            <option value="" selected>سطح علمی</option>
                            <?php $__empty_1 = true; $__currentLoopData = \App\Models\Contents\Levels::latest()->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $level): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <option <?php if($post->levels_id    == $level->id): ?>
                                selected
                            <?php endif; ?> value="<?php echo e($level->id); ?>"><?php echo e($level->name); ?></option>

                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <option value="0" selected>سطح علمی تعریف نشده است</option>
                            <?php endif; ?>


                        </select>
                    </div>

                </div>
                <div class="row">
                    <div class="form-group col-md-6">
                    <input type="text" class="form-control" name="title" id="title" value="<?php echo e($post->title); ?>" placeholder="عنوان">
                    </div>
                    <div class="form-group col-md-6">
                        <input type="text" class="form-control" name="owner" placeholder="نام صاحب اثر">
                    </div>
                </div>

                <div class="row">
                    
                    <div class="form-group col-md-6">
                        <input type="text" class="form-control" name="url" placeholder="آدرس یکتا">
                    </div>
                </div>
              
                <div class="row">
                    <div class="form-group col-md-12">
                        <label for="desc">توضیحات : </label>
                        <textarea class="form-control" name="desc" id="desc" cols="30" rows="8"><?php echo $post->desc; ?></textarea>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-12">
                        <label for="desc">متن فایل: (این متن میتواند ترجمه فایل باشد)</label>
                        <textarea class="form-control" name="desc2" id="desc2" cols="30" rows="8"><?php echo $post->desc2; ?></textarea>
                    </div>
                </div>
               <?php if($post->categories->id == 6): ?>
               <div class="row">
                 
                <div class="form-group col-md-2">
                    <label for="desc">قیمت:  </label>
                    <input type="number" class="form-control" value="<?php echo e($post->price); ?>" name="price" id="price" placeholder="">
                    <span class="rial">ریال</span>
                </div>
        
                
               
            </div>
               <?php endif; ?>

                <div class="form-footer">
                   
                    <div class="row">
                        <div class="col-md-3 my-2 btn--wrapper">
                            <input type="submit" name="upload" value="تایید محتوا" class="btn btn-sm btn-success" />
                            <a data-id="<?php echo e($post->id); ?>" data-member="<?php echo e($post->members_id); ?>"
                                class="post--delete btn btn-danger btn-sm m-0">رد</a>
                        </div>
                    </div>
                </div>



        </div>

        </form>

        
        <hr>
        <form action="<?php echo e(route('UploadEpizode')); ?>" method="post">
            <?php echo csrf_field(); ?>
            <div class="card epizode p-3" style="display:none;">
                <h3 class="mb-2">آپلود قسمت های دوره: </h3>
                <div class="row">
                    <div class="form-group col-md-6">
                        <input type="number" class="form-control" name="epizode_number" id="epizode_number"
                            placeholder="شماره قسمت">
                    </div>
                    <div class="form-group col-md-6">
                        <input type="text" class="form-control" name="epizode_title" id="epizode_title" placeholder="عنوان">
                    </div>
                    <div class="form-group col-md-12">
                        <label for="desc">تصویر: </label>
                        <input type="file" class="form-control" name="epizode_pic" id="epizode_pic" />
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-12">
                        <label for="desc">فایل: </label>
                        <input type="file" class="form-control" name="epizode_file" id="epizode_file" />
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
                        <input type="submit" name="upload" value="آپلود" class="btn btn-sm btn-success" />
                    </div>
                </div>
            </div>
        </form>
        
        <br />
        
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>




<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>

<link rel="stylesheet" href="https://cdn.plyr.io/3.5.10/plyr.css" />

<script src="https://cdn.plyr.io/3.5.10/plyr.js"></script>



<script src="<?php echo e(asset('Panel/vendor/ckeditor/ckeditor.js')); ?>"></script>
<script>

    $(document).ready(function(){
        
    var controls =
[
    'play-large', // The large play button in the center
    
    'rewind', // Rewind by the seek time (default 10 seconds)
    'play', // Play/pause playback
    'fast-forward', // Fast forward by the seek time (default 10 seconds)
    'progress', // The progress bar and scrubber for playback and buffering
    'current-time', // The current time of playback
    'duration', // The full duration of the media
    'mute', // Toggle mute
    'volume', // Volume control
    'captions', // Toggle captions
    'settings', // Settings menu
    'pip', // Picture-in-picture (currently Safari only)
    'airplay', // Airplay (currently Safari only)
    'download', // Show a download button with a link to either the current source or a custom URL you specify in your options
    'fullscreen' // Toggle fullscreen
];
    const player = new Plyr('#player',{
        controls
    ,
    speed:{ selected: 1, options: [ 0.5, 0.75, 1, 1.25] }
    });


        CKEDITOR.replace('desc',{
            filebrowserUploadUrl : '<?php echo e(route('UploadImage')); ?>',
            filebrowserImageUploadUrl : '<?php echo e(route('UploadImage')); ?>'
        });
        CKEDITOR.replace('desc2');
        CKEDITOR.replace('epizode_desc');
        $(document).on('change','#type',function(){
            if($(this).val() == '6'){
                $('.btn--wrapper input').val('ارسال')
                $('.fileform').hide()
                $('.epizode').show()
            }else{
                $('.btn--wrapper input').val('آپلود')
                $('.fileform').show()
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
});
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.Panel.temp', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\media\resources\views/Panel/CheckPost.blade.php ENDPATH**/ ?>