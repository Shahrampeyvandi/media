

<?php $__env->startSection('content'); ?>
<div class="row mx-2" >
    <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    

    <div id="" class="thumbnail-video mr-3 ml-2 my-3"  style="max-width: 240px;">
        <div class="thumb-wrapper">
            <a id="" href="<?php echo e(route('ShowItem',['id'=>$post->id])); ?>"
                class="thumb thumb-preview" data-poster="<?php echo e(asset("$post->picture")); ?>"><img
                    src="<?php echo e(asset("$post->picture")); ?>" class=" thumb-image">


                <div class="tools">
                    <span class="duration"><?php echo e($post->duration); ?></span>
                </div>
                
                
            </a>
        </div>
        <div class="thumb-details">

            <h2 class="thumb-title">
                <a href="" title="<?php echo e($post->title); ?>"
                    class="title"><span><?php echo e($post->title); ?></span></a>
            </h2>

            <div class="thumb-view-date">
                <span><?php echo e($post->views); ?> بازدید</span>
                <span class="dot"></span><span
                    class="date"><?php echo e(\Morilog\Jalali\Jalalian::forge($post->created_at)->format('%B %Y')); ?></span>
            </div>

        </div>
    </div>

<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>





<?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>
<link rel="stylesheet" href=" <?php echo e(asset('assets/css/channel.css')); ?> ">

<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.Main.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\media\resources\views/Main/channel/showall.blade.php ENDPATH**/ ?>