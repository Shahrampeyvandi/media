<div class="row">
    <?php $__currentLoopData = $podcasts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $podcast): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div style="width:230px;" class="m-3">
        <div class="card radius shadowDepth1">
            <div class="card__image border-tlr-radius">
                 <?php if($podcast->picture): ?>
                <img src="<?php echo e(asset("$podcast->picture")); ?>" alt="image" class="border-tlr-radius">
                  <?php else: ?> 
    
                  <img src="<?php echo e(asset('assets/images/record.png')); ?>" alt="image" class="border-tlr-radius">
                <?php endif; ?>
            </div>
            <div class="card__content px-3 pb-2">
                <div class="card__share">
                    <a href="<?php echo e(route('ShowItem',['id'=>$podcast->id])); ?>" id="" class=" share-icon"
                       ><i class="fa fa-caret-square-left"></i></a>
                </div>
                <article class="card__article mt-2 pt-3">
                    <h2><a href="<?php echo e(route('ShowItem',['id'=>$podcast->id])); ?>" class="fs-0-8"><?php echo e($podcast->title); ?></a></h2>
                    <p><?php echo e($podcast->desc); ?></p>
                </article>
            </div>
            <div class="pr-3">
                <div class="card__author">
                    <a href="#" class="fs-0-8"> زبان: <?php echo e($podcast->languages->name); ?></a>
                    <p class="">سطح:  <?php echo e($podcast->levels->name); ?></p>
                </div>
            </div>
            <div class="card__meta d-flex justify-content-between px-3 pt-1">
                <span class="text-black-50 fs-0-8"><?php echo e($podcast->languages->name); ?></span>
                <span class="text-black-50 fs-0-8"><?php echo e(\Morilog\Jalali\Jalalian::forge($podcast->created_at)->format('%d %B %Y')); ?></span>
            </div>
        </div>
    </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>

<div class="row">
    <div class="col-md-12">
     <a href="<?php echo e(route('UploadFile')); ?>" class=" btn btn-sm btn-outline-info btn-rounded"><i class="fa fa-plus"></i> &nbsp; آپلود  </a>
    </div>
 </div><?php /**PATH C:\xampp\htdocs\media\resources\views/Panel/Components/podcasts.blade.php ENDPATH**/ ?>