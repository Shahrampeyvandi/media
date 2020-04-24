

<?php $__env->startSection('content'); ?>

        <div class="tab-wrapper">
            <a href="<?php echo e(route('MyAudios')); ?>" <?php if(request()->path() == "panel/myaudios"): ?>
                class="btn btn-info" <?php else: ?> class="btn btn-light"  <?php endif; ?>>موسیقی ها</a>
            <a href="<?php echo e(route('MyAudios','podcasts')); ?>"  <?php if(request()->path() == "panel/myaudios/podcasts"): ?>
                class="btn btn-info" <?php else: ?> class="btn btn-light"  <?php endif; ?>> پادکست ها</a>
            <a href="#"></a>
        </div>
        <hr>



<?php if(request()->path() == "panel/myaudios"): ?>
<?php $__env->startComponent('Panel.Components.musics', ['musics' => $posts]); ?>
<?php if (isset($__componentOriginal68a24e35dd0d5475620421442a9ebf49cd81f182)): ?>
<?php $component = $__componentOriginal68a24e35dd0d5475620421442a9ebf49cd81f182; ?>
<?php unset($__componentOriginal68a24e35dd0d5475620421442a9ebf49cd81f182); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if(request()->path() == "panel/myaudios/podcasts"): ?>
<?php $__env->startComponent('Panel.Components.podcasts', ['podcasts' => $posts]); ?>
<?php if (isset($__componentOriginal12cd8acc18065e52e44926ab381c3141746a51d0)): ?>
<?php $component = $__componentOriginal12cd8acc18065e52e44926ab381c3141746a51d0; ?>
<?php unset($__componentOriginal12cd8acc18065e52e44926ab381c3141746a51d0); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>

   



<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.Panel.temp', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\media\resources\views/Panel/MyAudios.blade.php ENDPATH**/ ?>