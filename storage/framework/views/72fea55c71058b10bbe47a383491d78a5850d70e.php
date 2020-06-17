<?php if(count($relateds)): ?>
<div class="col-md-3">
    <aside id="secondary" class="secondary">
        <section id="recom" class="single-recom mt-4">
            <header class="recom-header">
                <h3 class="title mr-3 mr-md-0">پست های مرتبط</h3>
            </header>
            <div class="recommended-list">
                <div class="inner">
                    <?php $__currentLoopData = $relateds; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $related): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div id="thumb" class="d-flex flex-md-wrap m-3 mx-md-0">
                        <div class="w-50">
                            <?php if($related->picture): ?>
                            <a href="<?php echo e(route('ShowItem',['content'=>$related->categories->name,'slug'=>$related->slug])); ?>"> <img
                                    src="<?php echo e(route('BaseUrl')); ?>/<?php echo e($related->picture); ?>" alt="<?php echo e($related->title); ?>"
                                    aria-label="<?php echo e($related->title); ?>" class="thumb-image" style="min-height: 130px;"></a>
                            <?php else: ?>
                            <a href="<?php echo e(route('ShowItem',['content'=>$related->categories->name,'slug'=>$related->slug])); ?>">
                                <div class="d-flex justify-content-center align-items-center h-100 " style="    border: 1px solid gray;
                                border-radius: 4px;">
                                    
                                   <?php if($content->categories_id == 4 || $content->categories_id == 5): ?>
                                   <img style="object-fit: fill; height: 100%;" src="<?php echo e(asset("assets/images/logo-music1.png")); ?>" alt="<?php echo e($related->title); ?>"
                                   aria-label="<?php echo e($related->title); ?>" class="thumb-image">  
                                   <?php else: ?> 
                                   <img style="   object-fit: fill; height: 100%;" src="<?php echo e(asset("assets/images/logo-video1.png")); ?>" alt="<?php echo e($related->title); ?>"
                                   aria-label="<?php echo e($related->title); ?>" class="thumb-image">   
                                   <?php endif; ?>
                                </div>
                            </a>
                            <?php endif; ?>
                        </div>
                        <div class="thumb-details pr-2 pt-2 mb-3">
                            <h4 class="thumb-title">
                                <a href="<?php echo e(route('ShowItem',['content'=>$related->categories->name,'slug'=>$related->slug])); ?>" title="<?php echo e($related->title); ?>"
                                    class="title"><span><?php echo e(Illuminate\Support\Str::limit($related->title,12)); ?></span></a>
                            </h4>
                            <a href="<?php echo e(route('Category',['slug'=>$related->categories->latin_name])); ?>"
                                title="<?php echo e($related->categories->name); ?>" class="thumb-channel has-priority"><span
                                    class="channel-name"><?php echo e($related->categories->name); ?></span>
                                <span class="priority-brand" title="رسمی">
                                    <svg class="icon icon-tick icon-priority" viewBox="0 0 24 24" 0="" 24="" 24""="">
                                        <use xlink:href="#si_tick">
                                            <g id="si_tick" data-viewBox="0 0 24 24">
                                                <path d="M0 0h24v24H0z" fill="none"></path>
                                                <path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41z">
                                                </path>
                                            </g>
                                        </use>
                                    </svg> </span></a>
                            <ul class="meta-tags d-b w-100 mt-xs">
                                <li class="meta d-in light-60 dark-110 fs-0-8">زبان:
                                    <?php echo e($related->languages->name); ?>

                                </li>
                            </ul>
                            <ul class="meta-tags d-b w-100">
                                <li class="meta d-in light-60 dark-110 fs-0-8">موضوع:
                                    <?php echo e($related->subjects->name); ?>

                                </li>
                            </ul>
                            <ul class="meta-tags d-b w-100">
                                <li class="meta d-in light-60 dark-110 fs-0-8">سطح:
                                    <?php echo e($related->levels->name); ?>

                                </li>
                            </ul>
                        </div>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </section>
    </aside>
</div>
<?php else: ?>
<div class="col-md-3">
    <aside id="secondary" class="secondary">
        <section id="recom" class="single-recom mt-5">
            <div class="alert alert-success ml-2">
                محتوای مرتبط با این موضوع وجود ندارد
            </div>
        </section>
    </aside>
</div>
<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\media\resources\views/Includes/Main/relatedposts.blade.php ENDPATH**/ ?>