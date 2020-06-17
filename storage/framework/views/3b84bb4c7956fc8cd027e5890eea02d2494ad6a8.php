<?php $__currentLoopData = $podcasts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $podcast): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<div style="width:230px;" class="m-3">
    <div class="card radius shadowDepth1">
        <div class="card__image border-tlr-radius">
             <a href="<?php echo e(route('ShowItem',['content'=>$podcast->categories->name,'slug'=>$podcast->slug])); ?>">
            <?php if($podcast->picture): ?>
            <img src="<?php echo e(asset("$podcast->picture")); ?>" alt="image" class="border-tlr-radius">
            <?php else: ?>

            <img src="<?php echo e(asset('assets/images/logo-music1.png')); ?>" alt="image" class="border-tlr-radius">
            <?php endif; ?>
             </a>
        </div>
        <div class="card__content px-3 pb-2">
            <div class="card__share">
                <a href="<?php echo e(route('ShowItem',['content'=>$podcast->categories->name,'slug'=>$podcast->slug])); ?>" id="" class=" share-icon"><i
                        class="fa fa-play-circle"></i></a>
            </div>
            <article class="card__article mt-2 pt-3">
                <h2><a href="<?php echo e(route('ShowItem',['content'=>$podcast->categories->name,'slug'=>$podcast->slug])); ?>"
                        class="fs-0-8"><?php echo e(Illuminate\Support\Str::limit($podcast->title,22)); ?></a></h2>
                
            </article>
        </div>
        <div class="pr-3">
            <div class="card__author">
                <a class="fs-0-8"> زبان: <?php echo e($podcast->languages->name); ?></a>
                <p class="item-level position-relative">سطح: 
                    <?php if($podcast->levels->name == 'مقدماتی'): ?>
                    <img src="<?php echo e(asset('assets/images/audio-level-1.png')); ?>" alt="">
                    <img src="<?php echo e(asset('assets/images/audio-level-0.png')); ?>" alt="">
                    <img src="<?php echo e(asset('assets/images/audio-level-0.png')); ?>" alt="">
                    <?php elseif($podcast->levels->name == 'متوسط'): ?>

                    <img src="<?php echo e(asset('assets/images/audio-level-1.png')); ?>" alt="">
                    <img src="<?php echo e(asset('assets/images/audio-level-1.png')); ?>" alt="">
                    <img src="<?php echo e(asset('assets/images/audio-level-0.png')); ?>" alt="">
                    <?php else: ?>
                    <img src="<?php echo e(asset('assets/images/audio-level-1.png')); ?>" alt="">
                    <img src="<?php echo e(asset('assets/images/audio-level-1.png')); ?>" alt="">
                    <img src="<?php echo e(asset('assets/images/audio-level-1.png')); ?>" alt="">
                    <?php endif; ?>    
                </p>
            </div>
        </div>
        <div class="card__meta d-flex justify-content-between px-3 pt-1">
            <span class="text-black-50 fs-0-8"><?php echo e($podcast->languages->name); ?></span>
            <span
                class="text-black-50 fs-0-8"><?php echo e(\Morilog\Jalali\Jalalian::forge($podcast->created_at)->format('%d %B %Y')); ?></span>
        </div>
    </div>
</div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php /**PATH C:\xampp\htdocs\media\resources\views/Main/components/podcast.blade.php ENDPATH**/ ?>