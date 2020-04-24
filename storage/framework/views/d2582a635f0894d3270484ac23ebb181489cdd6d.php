
<div class="row">
   <?php $__currentLoopData = $movies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $movie): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
  
<div class="thumbnail-movie thumbnail-serial mb-5 mx-3 card" style="max-width: 220px;">
    <div class="thumb-wrapper">
        <a class="thumb" href="<?php echo e(route('ShowItem',['id'=>$movie->id])); ?>">
            <div class="abs-fit">
               <?php if($movie->picture): ?>
               <img src="<?php echo e(asset("$movie->picture")); ?>" height="230px" alt="<?php echo e($movie->title); ?>"
               aria-label="<?php echo e($movie->title); ?>" class="thumb-image">
               <?php else: ?> 
              <div class="d-flex justify-content-center align-items-center h-100">
                
            <i class="ti ti-video-camera text-black-50" style="font-size: 5rem;"></i>  
            </div>
               <?php endif; ?> 
               
            </div>
            <div class="tools">
                <span class="badge-rate">
                    <span><?php echo e(count($movie->likes)); ?></span>
                    <svg class="icon icon-thumb-up d-in v-m g-20 fs-1-2 ml-xxs"
                        viewBox="0 0 24 24" viewBox="viewBox=" 0 0 24 24"">
                        <use xlink:href="#si_thumb-up">
                            <g id="si_thumb-up" data-viewBox="0 0 24 24">
                                <path d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M0 0h24v24H0z" fill="none"></path>
                                <path
                                    d="M9 21h9a1.987 1.987 0 0 0 1.84-1.22l3.02-7.05A1.976 1.976 0 0 0 23 12v-2a2.006 2.006 0 0 0-2-2h-6.31l.95-4.57.03-.32a1.505 1.505 0 0 0-.44-1.06L14.17 1 7.58 7.59A1.987 1.987 0 0 0 7 9v10a2.006 2.006 0 0 0 2 2zM9 9l4.34-4.34L12 10h9v2l-3 7H9z">
                                </path>
                                <path transform="translate(1 9)" d="M0 0h4v12H0z"></path>
                            </g>
                        </use>
                    </svg> </span>
                <span class="badge-rate">
                    <span> <?php if(substr($movie->duration,0,1) == '0' && substr($movie->duration,1,1) == '0'): ?>
                        <?php echo e(substr($movie->duration,3)); ?>

                        <?php else: ?>
                        <?php echo e($movie->duration); ?>

                        <?php endif; ?></span>
                    <i class="fa fa-clock pl-1"></i>
                </span>
            </div>
        </a>
    </div>
    <div class="position-relative px-2 pt-3">

        <a href="<?php echo e(route('ShowItem',['id'=>$movie->id])); ?>" title="<?php echo e($movie->title); ?>"
            class="title title d-block mb-2"><span><?php echo e($movie->title); ?></span></a>
            <p class=""><span class="text-black-50">موضوع: </span><span class="fw-500">
                <?php if($movie->subjects): ?>
                
                <?php echo e($movie->subjects->name); ?>

                <?php endif; ?>
            </span></p>
            <p class=""><span class="text-black-50">زبان: </span><span class="fw-500 fs-0-8">
                <?php if($movie->languages): ?>
                <?php echo e($movie->languages->name); ?>

                <?php endif; ?>
            </span></p>
            <p class=""><span class="fs-0-9">سطح: <?php echo e($movie->levels->name); ?></span></p>

        <ul class="meta-tags d-b w-100 mt-xs  pb-2">
            <li class="meta d-in light-60 dark-110"><?php echo e(\Morilog\Jalali\Jalalian::forge($movie->created_at)->format('%d %B %Y')); ?></li>
       
        </ul>

    </div>
</div>
  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>
<div class="row">
   <div class="col-md-12">
    <a href="<?php echo e(route('UploadFile')); ?>" class=" btn btn-sm btn-outline-info btn-rounded"><i class="fa fa-plus"></i> &nbsp; آپلود  </a>
   </div>
</div><?php /**PATH C:\xampp\htdocs\media\resources\views/Panel/Components/videos.blade.php ENDPATH**/ ?>