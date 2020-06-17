

<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-md-12">
        <div>
            <a href="<?php echo e(route('Panel.MyFavorites')); ?>" class="btn btn-info">فیلم ها</a>
            <a href="<?php echo e(route('Panel.MyFavorites','clips')); ?>" class="btn btn-light"> کلیپ ها</a>
            <a href="<?php echo e(route('Panel.MyFavorites','animations')); ?>" class="btn btn-light"> انیمیشن ها</a>
            <a href="<?php echo e(route('Panel.MyFavorites','musics')); ?>" class="btn btn-light">موسیقی ها</a>
            <a href="<?php echo e(route('Panel.MyFavorites','podcasts')); ?>" class="btn btn-light"> پادکست ها</a>
            <a href="<?php echo e(route('Panel.MyFavorites','learnings')); ?>" class="btn btn-light"> فیلم های آموزشی </a>


            <a href="#"></a>
        </div>
        <hr>
    </div>
</div>


<?php if(request()->path() == "panel/myfavorites"): ?>
<?php $__env->startComponent('Panel.Components.videos', ['movies' => $posts]); ?>
<?php if (isset($__componentOriginal12e11a13188e4a289559cf7c4638685134d94ffe)): ?>
<?php $component = $__componentOriginal12e11a13188e4a289559cf7c4638685134d94ffe; ?>
<?php unset($__componentOriginal12e11a13188e4a289559cf7c4638685134d94ffe); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if(request()->path() == "panel/myfavorites/clips"): ?>
<?php $__env->startComponent('Panel.Components.clips', ['clips' => $posts]); ?>
<?php if (isset($__componentOriginal0d53f1edcbfaeda788be9b560d11399799193acd)): ?>
<?php $component = $__componentOriginal0d53f1edcbfaeda788be9b560d11399799193acd; ?>
<?php unset($__componentOriginal0d53f1edcbfaeda788be9b560d11399799193acd); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if(request()->path() == "panel/myfavorites/animations"): ?>
<?php $__env->startComponent('Panel.Components.animations',['animations' => $posts]); ?>
<?php if (isset($__componentOriginal8592351f5d883b099b121ee9f3772babe2ecf951)): ?>
<?php $component = $__componentOriginal8592351f5d883b099b121ee9f3772babe2ecf951; ?>
<?php unset($__componentOriginal8592351f5d883b099b121ee9f3772babe2ecf951); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if(request()->path() == "panel/myfavorites/musics"): ?>
<?php $__env->startComponent('Panel.Components.musics', ['musics' => $posts]); ?>
<?php if (isset($__componentOriginal68a24e35dd0d5475620421442a9ebf49cd81f182)): ?>
<?php $component = $__componentOriginal68a24e35dd0d5475620421442a9ebf49cd81f182; ?>
<?php unset($__componentOriginal68a24e35dd0d5475620421442a9ebf49cd81f182); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if(request()->path() == "panel/myfavorites/podcasts"): ?>
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
<?php echo $__env->make('layout.Panel.temp', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\media\resources\views/Panel/MyFavorites.blade.php ENDPATH**/ ?>