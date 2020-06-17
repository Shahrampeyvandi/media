

<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-md-12">
        <div class="card p-3">
            <form id="upload-file" method="post" action="<?php echo e(route('Members.SubmitMessage')); ?>"
                enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <input type="hidden" name="id" value="<?php echo e($member->id); ?>">

                <div class="row">
                    <div class="form-group col-md-12">
                        <h3 class=" mb-2">ارسال پیام برای  <?php echo e($member->firstname .' '.$member->lastname); ?> </h3>
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
            <h3 class="mb-2">پیام های شما با <?php echo e($member->firstname .' '.$member->lastname); ?></h3>
            <?php $__currentLoopData = \App\Models\Members\Messages::where('recived_id',$member->id)->orWhere('members_id',$member->id)->latest()->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

            <?php if($item->recived_id == null): ?>
            <div class="d-flex my-3">

                <span class="member_box  radius-10" style="padding: 5px 20px;
            background: #f3fdfa;border: 1px solid #e2e2e2;width:100%;
        ">
        <div class="d-flex justify-content-between mb-3" style="border-bottom: 1px solid #d2dae2;">
            <span><a href="#"><span><i class="fas fa-user"></i>
                <?php echo e($member->firstname .' '.$member->lastname); ?></span></a> <br>
               
            </span>
            <div>
                <span
                class="fs-0-8"><?php echo e(\Morilog\Jalali\Jalalian::forge($item->created_at)->format('%d %B %Y')); ?></span>
               
               </div>
          

        </div>


                    <?php echo $item->message; ?>



                </span>
            </div>
            <?php endif; ?>
            <?php if($item->members_id == null): ?>
            <div class="d-flex my-3 ">

                <span class="member_box  radius-10 position-relative" style="padding: 5px 20px;
                background: #f9f9f9;
                border: 1px solid #e2e2e2;
                width:100%;">
                    <div class="d-flex justify-content-between mb-3" style="border-bottom: 1px solid #d2dae2;">
                        <span><span><i class="fas fa-user"></i>
                                شما</span> <br>
                           
                        </span>
                       <div>
                        <span
                        class="fs-0-8"><?php echo e(\Morilog\Jalali\Jalalian::forge($item->created_at)->format('%d %B %Y')); ?></span>
                        <a title="حذف پیام" href="<?php echo e(route('Admin.Message.Delete',$item->id)); ?>"
                            style="position: absolute;left: 4px;color: red;"><i class="fas fa-times"></i></a>
                       </div>

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
<?php echo $__env->make('layout.Panel.temp', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\media\resources\views/Panel/SendMessage.blade.php ENDPATH**/ ?>