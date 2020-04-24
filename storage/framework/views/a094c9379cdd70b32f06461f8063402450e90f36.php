

<?php $__env->startSection('content'); ?>

<div class="col-md-12 p-3">
    <div class="tab-wrapper">
        <a href="<?php echo e(route('Policies','s')); ?>"  <?php if(request()->path() == "policies/s"): ?>
        class="btn btn-info d-inline-block mb-3" <?php else: ?> class="btn btn-light d-inline-block mb-3"  <?php endif; ?> >دانشجویان </a>
        <a href="<?php echo e(route('Policies','t')); ?>" <?php if(request()->path() == "policies/t"): ?>
        class="btn btn-info  d-inline-block mb-3" <?php else: ?> class="btn btn-light d-inline-block mb-3"  <?php endif; ?>> اساتید</a>
    </div>
    <div class="tab-contents clear mx-2">
        <div id="" class="">
            <div id="staticContainer">
                <div class="rules-section  grey lighten-4  p-3">
                   <?php echo $content; ?>

                </div>    
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.Main.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\media\resources\views/Main/policies.blade.php ENDPATH**/ ?>