

<?php $__env->startSection('content'); ?>

        <div class="tab-wrapper">
            <a href="<?php echo e(route('MyVideos')); ?>"  <?php if(request()->path() == "panel/myvideos"): ?>
            class="btn btn-info" <?php else: ?> class="btn btn-light"  <?php endif; ?> >فیلم ها</a>
            <a href="<?php echo e(route('MyVideos','clips')); ?>" <?php if(request()->path() == "panel/myvideos/clips"): ?>
            class="btn btn-info" <?php else: ?> class="btn btn-light"  <?php endif; ?>> کلیپ ها</a>

            <a href="<?php echo e(route('MyVideos','animations')); ?>" <?php if(request()->path() == "panel/myvideos/animations"): ?>
            class="btn btn-info" <?php else: ?> class="btn btn-light"  <?php endif; ?>> انیمیشن ها</a>
           

            <a href="#"></a>
        </div>
        <hr>



<?php if(request()->path() == "panel/myvideos"): ?>
<?php $__env->startComponent('Panel.Components.videos', ['movies' => $posts]); ?>
<?php if (isset($__componentOriginal12e11a13188e4a289559cf7c4638685134d94ffe)): ?>
<?php $component = $__componentOriginal12e11a13188e4a289559cf7c4638685134d94ffe; ?>
<?php unset($__componentOriginal12e11a13188e4a289559cf7c4638685134d94ffe); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if(request()->path() == "panel/myvideos/clips"): ?>
<?php $__env->startComponent('Panel.Components.clips', ['clips' => $posts]); ?>
<?php if (isset($__componentOriginal0d53f1edcbfaeda788be9b560d11399799193acd)): ?>
<?php $component = $__componentOriginal0d53f1edcbfaeda788be9b560d11399799193acd; ?>
<?php unset($__componentOriginal0d53f1edcbfaeda788be9b560d11399799193acd); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if(request()->path() == "panel/myvideos/animations"): ?>
<?php $__env->startComponent('Panel.Components.animations',['animations' => $posts]); ?>
<?php if (isset($__componentOriginal8592351f5d883b099b121ee9f3772babe2ecf951)): ?>
<?php $component = $__componentOriginal8592351f5d883b099b121ee9f3772babe2ecf951; ?>
<?php unset($__componentOriginal8592351f5d883b099b121ee9f3772babe2ecf951); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
   



<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.Panel.temp', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\media\resources\views/Panel/MyVideos.blade.php ENDPATH**/ ?>