<?php $__currentLoopData = $musics; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $music): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

<div class="item w-100 ml-5 mr-2  my-5 card" style="max-width: 233px;">
    <div class="position-relative">
        <div class="item-overlay opacity r r-2x bg-black">
            <div class="text-info padder m-t-sm text-sm"> <i class="fa fa-star"></i> <i
                    class="fa fa-star"></i> <i class="fa fa-star"></i> <i
                    class="fa fa-star"></i> <i class="fa fa-star-o text-muted"></i> </div>
            <div class="center text-center m-t-n"> <a
                    href="<?php echo e(route('ShowItem',['content'=>$music->categories->name,'slug'=>$music->slug])); ?>"><i
                        class="ti ti-control-play fs-2"></i></a> </div>
            <div class="bottom padder m-b-sm">

                <a href="<?php echo e(route('ShowItem',['content'=>$music->categories->name,'slug'=>$music->slug])); ?>" class="ml-2"> <span
                        class="text-info"> <?php echo e(count($music->comments)); ?></span><svg
                        class="icon v-m  icon-comments" viewBox="0 0 24 24" 0="" 24="" 24""="">
                        <use xlink:href="#si_comments">
                            <g id="si_comments" data-viewBox="0 0 24 24">
                                <path d="M0 0h24v24H0z" fill="none"></path>
                                <path
                                    d="M4 4h16v12H5.17L4 17.17V4m0-2a2 2 0 0 0-1.99 2L2 22l4-4h14a2.006 2.006 0 0 0 2-2V4a2.006 2.006 0 0 0-2-2z">
                                </path>
                                <path d="M6 12h8v2H6zM6 9h12v2H6zM6 6h12v2H6z"></path>
                            </g>
                        </use>
                    </svg>
                </a>
                <a href="<?php echo e(route('ShowItem',['content'=>$music->categories->name,'slug'=>$music->slug])); ?>"> <span
                        class="text-success"><?php echo e(\App\Models\Contents\Likes::where('posts_id',$music->slug)->count()); ?></span>
                    <svg class="icon icon-like d-in v-m g-20 fs-1-2 ml-xxs" viewBox="0 0 24 24"
                        0="" 24="" 24""="">
                        <use xlink:href="#si_thumb-up">
                            <g id="si_thumb-up" data-viewbox="0 0 24 24">
                                <path d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M0 0h24v24H0z" fill="none"></path>
                                <path
                                    d="M9 21h9a1.987 1.987 0 0 0 1.84-1.22l3.02-7.05A1.976 1.976 0 0 0 23 12v-2a2.006 2.006 0 0 0-2-2h-6.31l.95-4.57.03-.32a1.505 1.505 0 0 0-.44-1.06L14.17 1 7.58 7.59A1.987 1.987 0 0 0 7 9v10a2.006 2.006 0 0 0 2 2zM9 9l4.34-4.34L12 10h9v2l-3 7H9z">
                                </path>
                                <path transform="translate(1 9)" d="M0 0h4v12H0z">
                                </path>
                            </g>
                        </use>
                    </svg>

                </a>
                <span class="badge-rate badge-rate float-left text-white-80"><span>
                        <?php if(substr($music->duration,0,1) == '0' && substr($music->duration,1,1)
                        == '0'): ?>
                        <?php echo e(substr($music->duration,3)); ?>

                        <?php else: ?>
                        <?php echo e($music->duration); ?>

                        <?php endif; ?>
                    </span>
                    <i class="fa fa-clock-o pl-1"></i>
                </span>
            </div>
        </div>
        <div class="top"> <span class="pull-right m-t-n-xs m-r-sm text-white"> <i
                    class="fa fa-bookmark i-lg"></i> </span> </div> <a
            href="<?php echo e(route('ShowItem',['content'=>$music->categories->name,'slug'=>$music->slug])); ?>" class="music-img">
            <?php if($music->picture): ?>
            <img src="<?php echo e(asset($music->picture)); ?>" width="100%;" style="height: 131px;" alt=""
                class="r r-2x img-full">
            <?php else: ?>
            <img src="<?php echo e(asset('assets/images/logo-music1.png')); ?>" width="100%;" style="height: 131px;"
                alt="" class="r r-2x img-full">
            <?php endif; ?>
        </a>
    </div>
    <div class="padder-v px-2"> <a href="<?php echo e(route('ShowItem',['content'=>$music->categories->name,'slug'=>$music->slug])); ?>"
            class="text-ellipsis"><?php echo e($music->title); ?></a>
        <p href="#" class="text-ellipsis text-black-50">موضوع: <?php echo e($music->subjects->name); ?></p>
        <p href="#" class="item-level position-relative text-ellipsis text-black-50">سطح:
            <?php if($music->levels->name == 'مقدماتی'): ?>
            <img src="<?php echo e(asset('assets/images/audio-level-1.png')); ?>" alt="">
            <img src="<?php echo e(asset('assets/images/audio-level-0.png')); ?>" alt="">
            <img src="<?php echo e(asset('assets/images/audio-level-0.png')); ?>" alt="">
            <?php elseif($music->levels->name == 'متوسط'): ?>

            <img src="<?php echo e(asset('assets/images/audio-level-1.png')); ?>" alt="">
            <img src="<?php echo e(asset('assets/images/audio-level-1.png')); ?>" alt="">
            <img src="<?php echo e(asset('assets/images/audio-level-0.png')); ?>" alt="">
            <?php else: ?>
            <img src="<?php echo e(asset('assets/images/audio-level-1.png')); ?>" alt="">
            <img src="<?php echo e(asset('assets/images/audio-level-1.png')); ?>" alt="">
            <img src="<?php echo e(asset('assets/images/audio-level-1.png')); ?>" alt="">
            <?php endif; ?>
            </p>

        <a href="#" class="text-ellipsis text-xs text-muted">
            <?php if($music->languages): ?>
            <?php echo e($music->language); ?>

            <?php endif; ?>
        </a>
        <div class="d-flex justify-content-between mt-3">
            <span class="fs-0-8 text-black-50">
                <?php echo e($music->languages->name); ?>

            </span>
            <span class="fs-0-8 text-black-50">
                <?php echo e(\Morilog\Jalali\Jalalian::forge($music->created_at)->format('%d %B %Y')); ?>

            </span>

        </div>
    </div>
</div>

<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php /**PATH C:\xampp\htdocs\media\resources\views/Main/components/music.blade.php ENDPATH**/ ?>