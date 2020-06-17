

<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-md-12">
        <?php echo $__env->make('Includes.Channel.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        
        <div class="content mt-5 px-2">
            <?php if(!is_null($lastpost)): ?>
            <div class="list-wrapper">
                <div class="wpb_wrapper py-3 mr-2">
                    <h2 class="font__family-open-sans fs-1  mt-15 mb-15 title__divider " style="margin-right: 0px;">
                        <span class="title__divider__wrapper text-success">آخرین مطلب<span
                                class="line brk-base-bg-gradient-right"></span>
                        </span></h2>
                </div>
            </div>
           
            <div class="recent_content d-flex mr-3">
                <a href="<?php echo e(route('ShowItem',['content'=>$lastpost->categories->name,'slug'=>$lastpost->slug])); ?>" class="image">
                    
                    <?php if($lastpost->picture): ?>
                    <img src="<?php echo e(asset("$lastpost->picture")); ?>" height="100%" width="100%" alt="">
                    <?php else: ?>
                   <img style="width: 100%;
                   object-fit: cover;
                   height: 100%;box-shadow: 0 0 2px 0px grey;" src="<?php echo e(asset('assets/images/logo-video1.png')); ?>" alt="">
                    <?php endif; ?>
                </a>
                <div class="d-flex  flex-column pr-3">
                    <h3><a href="#"><?php echo e(Illuminate\Support\Str::limit($lastpost->title,15)); ?></a></h3>
                    <p><?php echo e($lastpost->subjects->name); ?></p>
                    <div>
                        <span class="fs-0-8 text-black-50 mt-2 ml-3">
                            <?php echo e(\Morilog\Jalali\Jalalian::forge($lastpost->created_at)->format('%B %Y')); ?></span>
                        <span class="fs-0-8 text-black-50 mt-2"><?php echo e($lastpost->views); ?> بازدید</span>
                    </div>
                </div>
            </div>
            <?php endif; ?>
            <hr>
            <?php if(count($postsloghat)): ?>
            <section id="" style="padding:0 0 40px 0;" class="list-item li" data-list="slider">
                <div class="list-wrapper">
                    <div class="wpb_wrapper py-3">
                        <h2 class="font__family-open-sans fs-1  mt-15 mb-15 title__divider " style="margin-right: 0px;">
                            <span class="title__divider__wrapper text-success">لغت<span
                                    class="line brk-base-bg-gradient-right"></span>
                            </span></h2>
                        <a
                            href="<?php echo e(route('Channel.Category.ShowAll',['name'=>auth()->user()->username,'category'=>$category->latin_name,'subject'=>'لغت'])); ?>">
                            <span class="title--more">نمایش همه <i class="ti ti-angle-left fs-0-5"></i></span>
                        </a>
                    </div>
                    <section class="list-content">
                        <div id="" class="carousel carousel-movie swiper-container-channel2">
                            <div class="swiper-wrapper">
                                <?php $__currentLoopData = $postsloghat; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="item carousel-item swiper-slide">
                                    <div id="" class="thumbnail-video" data-uid="" data-duration=""
                                        data-recommendation="other">
                                        <div class="thumb-wrapper">
                                            <a id="" href="<?php echo e(route('ShowItem',['content'=>$post->categories->name,'slug'=>$post->slug])); ?>"
                                                class="thumb thumb-preview"
                                                data-poster="<?php echo e(asset("$post->picture")); ?>"><img
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
                                </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>
                        <div class="swiper-button-next swiper-channel2-one "></div>
                        <div class="swiper-button-prev swiper-channel2-two"></div>
                    </section>
                </div>
            </section>
            <?php endif; ?>
            <?php if(count($postsgrammer)): ?>
            <section id="" style="padding:0 0 40px 0;" class="list-item li" data-list="slider">
                <div class="list-wrapper">
                    <div class="wpb_wrapper py-3">
                        <h2 class="font__family-open-sans fs-1  mt-15 mb-15 title__divider " style="margin-right: 0px;">
                            <span class="title__divider__wrapper text-success">گرامر<span
                                    class="line brk-base-bg-gradient-right"></span>
                            </span></h2>
                        <a href="<?php echo e(route('Category',['slug'=>'videos'])); ?>">
                            <span class="title--more">نمایش همه <i class="ti ti-angle-left fs-0-5"></i></span>
                        </a>
                    </div>
                    <section class="list-content">
                        <div id="" class="carousel carousel-movie swiper-container-channel2">
                            <div class="swiper-wrapper">
                                <?php $__currentLoopData = $postsgrammer; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="item carousel-item swiper-slide">
                                    <div id="" class="thumbnail-video" data-uid="" data-duration=""
                                        data-recommendation="other">
                                        <div class="thumb-wrapper">
                                            <a id="" href="<?php echo e(route('ShowItem',['content'=>$post->categories->name,'slug'=>$post->slug])); ?>"
                                                class="thumb thumb-preview"
                                                data-poster="<?php echo e(asset("$post->picture")); ?>"><img
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
                                </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>

                        <div class="swiper-button-next swiper-channel2-one "></div>
                        <div class="swiper-button-prev swiper-channel2-two"></div>
                    </section>

                </div>
            </section>
            <?php endif; ?>
            <?php if(count($postsestelahat)): ?>
            <section id="" style="padding:0 0 40px 0;" class="list-item li" data-list="slider">
                <div class="list-wrapper">
                    <div class="wpb_wrapper py-3">
                        <h2 class="font__family-open-sans fs-1  mt-15 mb-15 title__divider " style="margin-right: 0px;">
                            <span class="title__divider__wrapper text-success">اصطلاحات<span
                                    class="line brk-base-bg-gradient-right"></span>
                            </span></h2>

                        <a href="<?php echo e(route('Category',['slug'=>'videos'])); ?>">
                            <span class="title--more">نمایش همه <i class="ti ti-angle-left fs-0-5"></i></span>
                        </a>
                    </div>


                    <section class="list-content">
                        <div id="" class="carousel carousel-movie swiper-container-channel2">
                            <div class="swiper-wrapper">

                                <?php $__currentLoopData = $postsestelahat; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                <div class="item carousel-item swiper-slide">
                                    <div id="" class="thumbnail-video" data-uid="" data-duration=""
                                        data-recommendation="other">
                                        <div class="thumb-wrapper">
                                            <a id="" href="<?php echo e(route('ShowItem',['content'=>$post->categories->name,'slug'=>$post->slug])); ?>"
                                                class="thumb thumb-preview"
                                                data-poster="<?php echo e(asset("$post->picture")); ?>"><img
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
                                </div>

                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>



                            </div>
                        </div>

                        <div class="swiper-button-next swiper-channel2-one "></div>
                        <div class="swiper-button-prev swiper-channel2-two"></div>
                    </section>

                </div>
            </section>
            <?php endif; ?>
            <?php if(count($postsconversaion)): ?>
            <section id="" style="padding:0 0 40px 0;" class="list-item li" data-list="slider">
                <div class="list-wrapper">
                    <div class="wpb_wrapper py-3">
                        <h2 class="font__family-open-sans fs-1  mt-15 mb-15 title__divider " style="margin-right: 0px;">
                            <span class="title__divider__wrapper text-success">مکالمه<span
                                    class="line brk-base-bg-gradient-right"></span>
                            </span></h2>

                        <a href="<?php echo e(route('Category',['slug'=>'videos'])); ?>">
                            <span class="title--more">نمایش همه <i class="ti ti-angle-left fs-0-5"></i></span>
                        </a>
                    </div>


                    <section class="list-content">
                        <div id="" class="carousel carousel-movie swiper-container-channel2">
                            <div class="swiper-wrapper">

                                <?php $__currentLoopData = $postsconversaion; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                <div class="item carousel-item swiper-slide">
                                    <div id="" class="thumbnail-video" data-uid="" data-duration=""
                                        data-recommendation="other">
                                        <div class="thumb-wrapper">
                                            <a id="" href="<?php echo e(route('ShowItem',['content'=>$post->categories->name,'slug'=>$post->slug])); ?>"
                                                class="thumb thumb-preview"
                                                data-poster="<?php echo e(asset("$post->picture")); ?>"><img
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
                                </div>

                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>



                            </div>
                        </div>

                        <div class="swiper-button-next swiper-channel2-one "></div>
                        <div class="swiper-button-prev swiper-channel2-two"></div>
                    </section>

                </div>
            </section>
            <?php endif; ?>
            <?php if(count($postswriting)): ?>
            <section id="" style="padding:0 0 40px 0;" class="list-item li" data-list="slider">
                <div class="list-wrapper">
                    <div class="wpb_wrapper py-3">
                        <h2 class="font__family-open-sans fs-1  mt-15 mb-15 title__divider " style="margin-right: 0px;">
                            <span class="title__divider__wrapper text-success">رایتینگ<span
                                    class="line brk-base-bg-gradient-right"></span>
                            </span></h2>

                        <a href="<?php echo e(route('Category',['slug'=>'videos'])); ?>">
                            <span class="title--more">نمایش همه <i class="ti ti-angle-left fs-0-5"></i></span>
                        </a>
                    </div>


                    <section class="list-content">
                        <div id="" class="carousel carousel-movie swiper-container-channel2">
                            <div class="swiper-wrapper">

                                <?php $__currentLoopData = $postswriting; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                <div class="item carousel-item swiper-slide">
                                    <div id="" class="thumbnail-video" data-uid="" data-duration=""
                                        data-recommendation="other">
                                        <div class="thumb-wrapper">
                                            <a id="" href="<?php echo e(route('ShowItem',['content'=>$post->categories->name,'slug'=>$post->slug])); ?>"
                                                class="thumb thumb-preview"
                                                data-poster="<?php echo e(asset("$post->picture")); ?>"><img
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
                                </div>

                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>



                            </div>
                        </div>

                        <div class="swiper-button-next swiper-channel2-one "></div>
                        <div class="swiper-button-prev swiper-channel2-two"></div>
                    </section>

                </div>
            </section>

            <?php endif; ?>
            <?php if(count($postsreading)): ?>
            <section id="" style="padding:0 0 40px 0;" class="list-item li" data-list="slider">
                <div class="list-wrapper">
                    <div class="wpb_wrapper py-3">
                        <h2 class="font__family-open-sans fs-1  mt-15 mb-15 title__divider " style="margin-right: 0px;">
                            <span class="title__divider__wrapper text-success">ریدینگ<span
                                    class="line brk-base-bg-gradient-right"></span>
                            </span></h2>

                        <a href="<?php echo e(route('Category',['slug'=>'videos'])); ?>">
                            <span class="title--more">نمایش همه <i class="ti ti-angle-left fs-0-5"></i></span>
                        </a>
                    </div>


                    <section class="list-content">
                        <div id="" class="carousel carousel-movie swiper-container-channel">
                            <div class="swiper-wrapper">

                                <?php $__currentLoopData = $postsreading; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                <div class="item carousel-item swiper-slide">
                                    <div id="" class="thumbnail-video" data-uid="" data-duration=""
                                        data-recommendation="other">
                                        <div class="thumb-wrapper">
                                            <a id="" href="<?php echo e(route('ShowItem',['content'=>$post->categories->name,'slug'=>$post->slug])); ?>"
                                                class="thumb thumb-preview"
                                                data-poster="<?php echo e(asset("$post->picture")); ?>"><img
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
                                </div>

                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>



                            </div>
                        </div>

                        <div class="swiper-button-next swiper-user-one "></div>
                        <div class="swiper-button-prev swiper-user-two"></div>
                    </section>

                </div>
            </section>

            <?php endif; ?>
            <?php if(count($postslessening)): ?>
            <section id="" style="padding:0 0 40px 0;" class="list-item li" data-list="slider">
                <div class="list-wrapper">
                    <div class="wpb_wrapper py-3">
                        <h2 class="font__family-open-sans fs-1  mt-15 mb-15 title__divider " style="margin-right: 0px;">
                            <span class="title__divider__wrapper text-success">لسنینگ<span
                                    class="line brk-base-bg-gradient-right"></span>
                            </span></h2>

                        <a href="<?php echo e(route('Category',['slug'=>'videos'])); ?>">
                            <span class="title--more">نمایش همه <i class="ti ti-angle-left fs-0-5"></i></span>
                        </a>
                    </div>


                    <section class="list-content">
                        <div id="" class="carousel carousel-movie swiper-container-channel2">
                            <div class="swiper-wrapper">

                                <?php $__currentLoopData = $postslessening; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                <div class="item carousel-item swiper-slide">
                                    <div id="" class="thumbnail-video" data-uid="" data-duration=""
                                        data-recommendation="other">
                                        <div class="thumb-wrapper">
                                            <a id="" href="<?php echo e(route('ShowItem',['content'=>$post->categories->name,'slug'=>$post->slug])); ?>"
                                                class="thumb thumb-preview"
                                                data-poster="<?php echo e(asset("$post->picture")); ?>"><img
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
                                </div>

                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>



                            </div>
                        </div>

                        <div class="swiper-button-next swiper-channel2-one "></div>
                        <div class="swiper-button-prev swiper-channel2-two"></div>
                    </section>

                </div>
            </section>
            <?php endif; ?>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>
<link rel="stylesheet" href=" <?php echo e(asset('assets/css/channel.css')); ?> ">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
<script>
    var swiper = new Swiper('.swiper-container-channel', {
          
        spaceBetween: 5,
            nextButton: '.swiper-user-one',
           prevButton: '.swiper-user-two',
            breakpoints: {
            320: {
                slidesPerView: 1,
                spaceBetween: 10
            },
            640: {
                slidesPerView: 1,
                spaceBetween: 20
            },
            768: {
                slidesPerView: 3,
                spaceBetween: 10
            },
            1024: {
                slidesPerView: 4,
                spaceBetween: 20
            },
            1380: {
                slidesPerView: 4,
                spaceBetween: 40
            },
           
        }
    });
    var swiper = new Swiper('.swiper-container-channel2', {
          
          spaceBetween: 5,
              nextButton: '.swiper-channel2-one',
             prevButton: '.swiper-channel2-two',
              breakpoints: {
              320: {
                  slidesPerView: 1,
                  spaceBetween: 10
              },
              640: {
                  slidesPerView: 1,
                  spaceBetween: 20
              },
              768: {
                  slidesPerView: 3,
                  spaceBetween: 10
              },
              1024: {
                  slidesPerView: 4,
                  spaceBetween: 20
              },
              1380: {
                  slidesPerView: 4,
                  spaceBetween: 40
              },
             
          }
      });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.Main.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\media\resources\views/Main/channel/user.blade.php ENDPATH**/ ?>