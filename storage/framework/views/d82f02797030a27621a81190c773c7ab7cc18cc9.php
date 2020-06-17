
<?php $__env->startSection('title','ژن برتر - کانال های رسمی'); ?>
<?php $__env->startSection('content'); ?>

<div class="row mr-3">
     <?php $__currentLoopData = $channels; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $channel): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="item grid-item">
        <div class="box">
            <div class="box-content">
                <div class="thumbnail-channel">
                    <div class="avatar">
                        <a href="<?php echo e(route('User.Show',['name' => $channel->username])); ?>" class="picture image"><img
                                src="<?php echo e(asset($channel->avatar)); ?>" alt=""
                                aria-label="Samsungmobile" class="avatar-img" width="45" height="45">
                        </a>
                    </div>
                    <div class="details">
                        <h2 class="title">
                            <a href="<?php echo e(route('User.Show',['name' => $channel->username])); ?>"  class="name"><span
                                    class="text"><?php echo e($channel->username); ?></span>
                                <span class="priority-brand" title="رسمی">
                                    <svg class="icon icon-tick icon-priority" viewBox="0 0 24 24" 0="" 24="" 24""="">
                                        <use xlink:href="#si_tick">
                                            <g id="si_tick" data-viewBox="0 0 24 24"><path d="M0 0h24v24H0z" fill="none"></path><path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41z"></path></g>
                                        </use>
                                    </svg>
                                </span>
                            </a>
                        </h2>
                        <span class="followers channel-followers-83055"><?php echo e(count($channel->followers)); ?> دنبال کننده</span>
                        <span class="dot"></span>
                        <span class="video-cnt"><?php echo e(count($channel->posts)); ?>  پست</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
   
</div>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>
<link rel="stylesheet" href=" <?php echo e(asset('assets/css/channel.css')); ?> ">

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.Main.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\media\resources\views/Main/channel/list.blade.php ENDPATH**/ ?>