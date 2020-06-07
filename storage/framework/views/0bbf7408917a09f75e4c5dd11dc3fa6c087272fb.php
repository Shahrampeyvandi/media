

<?php $__env->startSection('content'); ?>
<div class="col-sm-12 col-sm-offset-3 col-md-12  ">
    <div class="wpb_wrapper py-3">
        <h2 class="  mt-15 mb-15 title__divider title__divider--line" style="margin-right: 0px;"><span
                class="title__divider__wrapper">تسویه حساب<span class="line brk-base-bg-gradient-right"></span>
         
        </h2>
    </div>
    <div class="row mb-3">
        <div class="col-md-12">
        <form id="setting" action="<?php echo e(route('Panel.Checkout.Create')); ?>" method="post">
                <?php echo csrf_field(); ?>
               <div class="row">
                <div class="form-group col-md-12">
                    <label for="" class="">انتخاب اساتید برای تسویه</label>
<br>
بعد از انتخاب اساتید و کلیک بر روی دکمه ی تایید فایلی با فرمت تکست با خروجی مبلغ و شماره شبای اساتید برای شما تولید می شود و موجودی کیف پول استید صفر خواهد شد. از فایل تولید شده برای تسویه با اساتید از طریق سیستم بام بانک ملی بخش انتقال گروهی پول اقدام فرمایید
                    <select name="checkout[]" class="form-control mt-1" id="" multiple>
                    
                    <?php $__currentLoopData = $members; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $member): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                    <?php if($member->wallet>0): ?>



                    <option value="<?php echo e($member->id); ?>"><?php echo e($member->firstname); ?> <?php echo e($member->lastname); ?> - موجودی کیف پول: <?php echo e($member->wallet); ?> تومان</option>

<?php endif; ?>


                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    
                    </select>
            
                  
                </div>
               </div>
               

               <div class="row mb-3">
                    <div class="form-group col-md-12">
                        <button class="mx-0 btn btn-sm btn-primary">تایید</button>
                </div>
                </div>


            

            </form>

           
           
        </div>

    </div>

</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.Panel.temp', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\media\resources\views/Panel/Checkouts.blade.php ENDPATH**/ ?>