

<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-md-12">
        <div class="card p-3">
            <form id="upload-file" method="post" action="<?php echo e(route('Message.Send')); ?>"
                enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
        <input type="hidden" name="id" value="<?php echo e($member->id); ?>">
               
                <div class="row">
                    <div class="form-group col-md-12">
                        <h3 class=" mb-2">متن پیام خود را وارد نمایید </h3>
                        <textarea class="form-control" name="message" id="message" cols="30" rows="20"></textarea>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-md-3 my-2 btn--wrapper">
                        <input type="submit" name="upload" value="ارسال" class="btn btn-sm btn-success" />
                    </div>
                </div>
            </form>
        </div>
        <br />
    </div>
</div>
<div class="row ">
    <div class="col-md-12">
        <div class="card p-3">
            <h3 class="mb-2">پیام ها: </h3>
            <?php $__currentLoopData = \App\Models\Members\Messages::where('recived_id',$member->id)->orWhere('members_id',$member->id)->latest()->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
           
           <?php if($item->members_id == null): ?>
           <div class="d-flex my-3 ">
              
            <span class="member_box  radius-10" style="padding: 5px 20px;
            background: #f3fdfa;border: 1px solid #e2e2e2;min-width: 270px;
                  ">
                   <div class="d-flex justify-content-between mb-2" style="border-bottom: 1px solid">
                    <span><span><i class="fas fa-user"></i>
                            مدیریت </span> <br>
                        <span
                            class="fs-0-8"><?php echo e(\Morilog\Jalali\Jalalian::forge($item->created_at)->format('%d %B %Y')); ?></span>
                    </span>
                   
        
                </div>
           
              <?php echo $item->message; ?>

           

        </span>
        </div>
           <?php endif; ?>
           <?php if($item->recived_id == null): ?>
            <div class="d-flex my-3 ">
               
                <span class="member_box  radius-10 position-relative" style="padding: 5px 20px;
                background: #f9f9f9;
                border: 1px solid #e2e2e2;min-width: 270px;
            ">
             <div class="d-flex justify-content-between mb-2" style="border-bottom: 1px solid">
                <span><span><i class="fas fa-user"></i>
                        شما </span> <br>
                    <span
                        class="fs-0-8"><?php echo e(\Morilog\Jalali\Jalalian::forge($item->created_at)->format('%d %B %Y')); ?></span>
                </span>
                <a title="حذف پیام" href="<?php echo e(route('Message.Delete',$item->id)); ?>"
                    style="position: absolute;left: 4px;color: red;"><i class="fas fa-times"></i></a>
    
            </div>
            
               
               <?php echo $item->message; ?>

    
            </span>
            </div>
            <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
       
        </div>
    </div>
</div>

</div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>

<script src="<?php echo e(asset('Panel/vendor/ckeditor/ckeditor.js')); ?>"></script>
<script>
    $(document).ready(function(){
        CKEDITOR.replace('message',{
            extraPlugins: 'uploadimage',
            filebrowserUploadUrl: '<?php echo e(route('UploadImage')); ?>?type=file',
            imageUploadUrl: '<?php echo e(route('UploadImage')); ?>?type=image'
        });
});
</script>
<?php $__env->stopSection(); ?>





<?php echo $__env->make('layout.Panel.temp', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\media\resources\views/Panel/MyMessages.blade.php ENDPATH**/ ?>