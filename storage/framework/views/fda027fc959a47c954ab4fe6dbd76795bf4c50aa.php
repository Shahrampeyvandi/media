
<?php $__env->startSection('content'); ?>

<section class="top-banner"
    style="">
    <div class="overlay-baner"></div>
    <div class="container position-relative">
        <div class="shape-wrapper" >
            <img src="<?php echo e(asset('assets/images/header-shape.png')); ?>" alt="header shape" class="w-100">
         </div>
        <div class="row justify-content-center">
            <div class="owl-carousel owl-theme header-carousel fadeOut " >
                <?php $__currentLoopData = $header_slideshow; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $slideshow): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($slideshow->link): ?>
                    
                <a href="<?php echo e($slideshow->link); ?>">
                
                <?php else: ?>
                <a href="#">
                <?php endif; ?>
                    <div class="item single-client position-relative" >
                        <img src="<?php echo e(asset($slideshow->banner)); ?>" alt="<?php echo e($slideshow->link ?? 'تبلیغ'); ?>" height="100%" class="client-img">
                        <div class="overlay-banner"></div>
                        <div class="banner-txt">
                            <?php echo $slideshow->title; ?>

                        </div>
                    </div>
                </a>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </div>
        </div>
    </div>
    <div  id="scene3"  class="d-none d-md-block">
        <img data-depth="0.1" src="<?php echo e(asset('assets/images/layer3.png')); ?>" alt="parallax_shape1">
    </div>
    <div  id="scene2"  class="d-none d-md-block" >
        <img data-depth="0.2" src="<?php echo e(asset('assets/images/layer2.png')); ?>" alt="parallax_shape2">
    </div>
    <div  id="scene" class="d-none d-md-block">
     <img data-depth="0.3" src="<?php echo e(asset('assets/images/layer1.png')); ?>" alt="parallax_shape3">
    </div>
</section>
<?php if(\App\Models\Setting::first()->mainpage_films==1): ?>
<?php if(count($moveis)): ?>
<section id="" style="padding: 40px 0;" class="list-item li" data-list="slider">
    <div class="list-wrapper">
        <div class="wpb_wrapper py-3">
            <h2 class="font__family-open-sans font__size-20  mt-15 mb-15 title__divider title__divider--line"
                style="margin-right: 0px;"><span class="title__divider__wrapper text-header">فیلم ها<span
                        class="line brk-base-bg-gradient-right"></span>
                </span></h2>
            <a href="<?php echo e(route('Category',['slug'=>'videos'])); ?>">
                <span class="title--more">نمایش همه <i class="ti ti-angle-left fs-0-5"></i></span>
            </a>
        </div>
        <section class="list-content">
            <div id="" class="carousel carousel-movie swiper-container1" dir="rtl">
                <div class="swiper-wrapper">
                    <?php $__currentLoopData = $moveis; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $movie): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="item carousel-item swiper-slide">
                        <div class="thumbnail-movie thumbnail-serial mx-3 card" style="max-width: 220px;">
                            <div class="thumb-wrapper">
                                <a class="thumb" href="<?php echo e(route('ShowItem',['content'=>$movie->categories->name,'slug'=>$movie->slug])); ?>">
                                    <div class="abs-fit">
                                        <?php if($movie->picture): ?>
                                        <img src="<?php echo e(asset("$movie->picture")); ?>" alt="<?php echo e($movie->title); ?>"
                                        aria-label="<?php echo e($movie->title); ?>" class="thumb-image">
                                        <?php else: ?>
                                        <div class="d-flex justify-content-center align-items-center h-100">
                                            <img style="object-fit: cover;" src="<?php echo e(asset("assets/images/logo-video1.png")); ?>" alt="<?php echo e($movie->title); ?>"
                                            aria-label="<?php echo e($movie->title); ?>" class="thumb-image">
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
                                        <span class="badge-rate"><span>
                                                <?php if(substr($movie->duration,0,1) == '0' && substr($movie->duration,1,1)
                                                == '0'): ?>
                                                <?php echo e(substr($movie->duration,3)); ?>

                                                <?php else: ?>
                                                <?php echo e($movie->duration); ?>

                                                <?php endif; ?>
                                            </span>
                                            <i class="fa fa-clock-o pl-1"></i>
                                        </span>
                                    </div>
                                </a>
                            </div>
                            <div class="position-relative px-2 pt-3">
                                <a href="<?php echo e(route('ShowItem',['content'=>$movie->categories->name,'slug'=>$movie->slug])); ?>" title="<?php echo e($movie->title); ?>"
                                    class="title title d-block mb-2"><span><?php echo e(Illuminate\Support\Str::limit($movie->title,22)); ?></span></a>
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
                                    <p class="item-level position-relative"><span class="fs-0-9">سطح: 
                                        <?php if($movie->levels->name == 'مقدماتی'): ?>
                                        <img src="<?php echo e(asset('assets/images/level1.png')); ?>" alt="">
                                        <img src="<?php echo e(asset('assets/images/level0.png')); ?>" alt="">
                                        <img src="<?php echo e(asset('assets/images/level0.png')); ?>" alt="">
                                        <?php elseif($movie->levels->name == 'متوسط'): ?>
    
                                        <img src="<?php echo e(asset('assets/images/level1.png')); ?>" alt="">
                                        <img src="<?php echo e(asset('assets/images/level1.png')); ?>" alt="">
                                        <img src="<?php echo e(asset('assets/images/level0.png')); ?>" alt="">
                                        <?php else: ?>
                                        <img src="<?php echo e(asset('assets/images/level1.png')); ?>" alt="">
                                        <img src="<?php echo e(asset('assets/images/level1.png')); ?>" alt="">
                                        <img src="<?php echo e(asset('assets/images/level1.png')); ?>" alt="">
                                        <?php endif; ?>
                                </span></p>

                                <ul class="meta-tags d-b w-100 mt-xs  pb-2">
                                    <li class="meta d-in light-60 dark-110">
                                        <?php echo e(\Morilog\Jalali\Jalalian::forge($movie->created_at)->format('%d %B %Y')); ?></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
            <div class="swiper-button-next swiper-n "></div>
            <div class="swiper-button-prev swiper-p"></div>
        </section>
    </div>
</section>
<?php endif; ?>
<?php endif; ?>

<?php if(\App\Models\Setting::first()->mainpage_animations==1): ?>
<?php if(count($animations)): ?>
<section id="" style="padding:0 0 40px 0;" class="list-item li" data-list="slider">
    <div class="list-wrapper">
        <div class="wpb_wrapper py-3">
            <h2 class="font__family-open-sans font__size-20  mt-15 mb-15 title__divider title__divider--line"
                style="margin-right: 0px;"><span class="title__divider__wrapper text-header">انیمیشن ها<span
                        class="line brk-base-bg-gradient-right"></span>
                </span></h2>

            <a href="<?php echo e(route('Category',['slug'=>'animations'])); ?>">
                <span class="title--more">نمایش همه <i class="ti ti-angle-left fs-0-5"></i></span>
            </a>
        </div>


        <section class="list-content">
            <div id="" class="carousel carousel-movie swiper-container2" dir="rtl">
                <div class="swiper-wrapper">

                    <?php $__currentLoopData = $animations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $movie): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                    <div class="item carousel-item swiper-slide">
                        <div class="thumbnail-movie thumbnail-serial mx-3 card" style="max-width: 220px;">
                            <div class="thumb-wrapper">
                                <a class="thumb" href="<?php echo e(route('ShowItem',['content'=>$movie->categories->name,'slug'=>$movie->slug])); ?>">
                                    <div class="abs-fit">
                                        <?php if($movie->picture): ?>
                                        <img src="<?php echo e(asset("$movie->picture")); ?>" alt="<?php echo e($movie->title); ?>"
                                            aria-label="<?php echo e($movie->title); ?>" class="thumb-image">
                                        <?php else: ?>
                                        <div class="d-flex justify-content-center align-items-center h-100">
                                            
                                            <img style="object-fit: cover;" src="<?php echo e(asset("assets/images/logo-video1.png")); ?>" alt="<?php echo e($movie->title); ?>"
                                            aria-label="<?php echo e($movie->title); ?>" class="thumb-image">
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
                                            <span> <?php if(substr($movie->duration,0,1) == '0' &&
                                                substr($movie->duration,1,1) == '0'): ?>
                                                <?php echo e(substr($movie->duration,3)); ?>

                                                <?php else: ?>
                                                <?php echo e($movie->duration); ?>

                                                <?php endif; ?></span>
                                            <i class="fa fa-clock-o pl-1"></i>
                                        </span>
                                    </div>
                                </a>
                            </div>
                            <div class="position-relative px-2 pt-3">

                                <a href="<?php echo e(route('ShowItem',['content'=>$movie->categories->name,'slug'=>$movie->slug])); ?>" title="<?php echo e($movie->title); ?>"
                                    class="title title d-block mb-2"><span><?php echo e(Illuminate\Support\Str::limit($movie->title,22)); ?></span></a>
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
                                    <p class="item-level position-relative"><span class="fs-0-9">سطح: 
                                        <?php if($movie->levels->name == 'مقدماتی'): ?>
                                        <img src="<?php echo e(asset('assets/images/level1.png')); ?>" alt="">
                                        <img src="<?php echo e(asset('assets/images/level0.png')); ?>" alt="">
                                        <img src="<?php echo e(asset('assets/images/level0.png')); ?>" alt="">
                                        <?php elseif($movie->levels->name == 'متوسط'): ?>
    
                                        <img src="<?php echo e(asset('assets/images/level1.png')); ?>" alt="">
                                        <img src="<?php echo e(asset('assets/images/level1.png')); ?>" alt="">
                                        <img src="<?php echo e(asset('assets/images/level0.png')); ?>" alt="">
                                        <?php else: ?>
                                        <img src="<?php echo e(asset('assets/images/level1.png')); ?>" alt="">
                                        <img src="<?php echo e(asset('assets/images/level1.png')); ?>" alt="">
                                        <img src="<?php echo e(asset('assets/images/level1.png')); ?>" alt="">
                                        <?php endif; ?>
                                </span></p>

                                <ul class="meta-tags d-b w-100 mt-xs  pb-2">
                                    <li class="meta d-in light-60 dark-110">
                                        <?php echo e(\Morilog\Jalali\Jalalian::forge($movie->created_at)->format('%d %B %Y')); ?></li>

                                </ul>

                            </div>
                        </div>
                    </div>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>



                </div>
            </div>

            <div class="swiper-button-next swiper-ani-n "></div>
            <div class="swiper-button-prev swiper-ani-p"></div>
        </section>

    </div>
</section>
<?php endif; ?>
<?php endif; ?>



<?php if(\App\Models\Setting::first()->mainpage_plus==1): ?>
<?php if(count($clips)): ?>
<section id="" style="padding:0 0 40px 0;" class="list-item li" data-list="slider">
    <div class="list-wrapper">
        <div class="wpb_wrapper py-3">
            <h2 class="font__family-open-sans font__size-20  mt-15 mb-15 title__divider title__divider--line"
                style="margin-right: 0px;"><span class="title__divider__wrapper text-header">ژن پلاس<span
                        class="line brk-base-bg-gradient-right"></span>
                </span></h2>

            <a href="<?php echo e(route('Category',['slug'=>'genplus'])); ?>">
                <span class="title--more">نمایش همه <i class="ti ti-angle-left fs-0-5"></i></span>
            </a>
        </div>


        <section class="list-content">
            <div id="" class="carousel carousel-movie swiper-container-clip" dir="rtl">
                <div class="swiper-wrapper">

                    <?php $__currentLoopData = $clips; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $movie): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                    <div class="item carousel-item swiper-slide">
                        <div class="thumbnail-movie thumbnail-serial mx-3 card" style="max-width: 220px;">
                            <div class="thumb-wrapper">
                                <a class="thumb" href="<?php echo e(route('ShowItem',['content'=>$movie->categories->name,'slug'=>$movie->slug])); ?>">
                                    <div class="abs-fit">
                                        <?php if($movie->picture): ?>
                                        <img src="<?php echo e(asset("$movie->picture")); ?>" alt="<?php echo e($movie->title); ?>"
                                            aria-label="<?php echo e($movie->title); ?>" class="thumb-image">
                                        <?php else: ?>
                                        <div class="d-flex justify-content-center align-items-center h-100">
                                            
                                            <img style="object-fit: cover;" src="<?php echo e(asset("assets/images/logo-video1.png")); ?>" alt="<?php echo e($movie->title); ?>"
                                            aria-label="<?php echo e($movie->title); ?>" class="thumb-image">
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
                                            <span> <?php if(substr($movie->duration,0,1) == '0' &&
                                                substr($movie->duration,1,1) == '0'): ?>
                                                <?php echo e(substr($movie->duration,3)); ?>

                                                <?php else: ?>
                                                <?php echo e($movie->duration); ?>

                                                <?php endif; ?></span>
                                            <i class="fa fa-clock-o pl-1"></i>
                                        </span>
                                    </div>
                                </a>
                            </div>
                            <div class="position-relative px-2 pt-3">

                                <a href="<?php echo e(route('ShowItem',['content'=>$movie->categories->name,'slug'=>$movie->slug])); ?>" title="<?php echo e($movie->title); ?>"
                                    class="title title d-block mb-2"><span><?php echo e(Illuminate\Support\Str::limit($movie->title,22)); ?></span></a>
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
                                    <p class="item-level position-relative"><span class="fs-0-9">سطح: 
                                        <?php if($movie->levels->name == 'مقدماتی'): ?>
                                        <img src="<?php echo e(asset('assets/images/level1.png')); ?>" alt="">
                                        <img src="<?php echo e(asset('assets/images/level0.png')); ?>" alt="">
                                        <img src="<?php echo e(asset('assets/images/level0.png')); ?>" alt="">
                                        <?php elseif($movie->levels->name == 'متوسط'): ?>
    
                                        <img src="<?php echo e(asset('assets/images/level1.png')); ?>" alt="">
                                        <img src="<?php echo e(asset('assets/images/level1.png')); ?>" alt="">
                                        <img src="<?php echo e(asset('assets/images/level0.png')); ?>" alt="">
                                        <?php else: ?>
                                        <img src="<?php echo e(asset('assets/images/level1.png')); ?>" alt="">
                                        <img src="<?php echo e(asset('assets/images/level1.png')); ?>" alt="">
                                        <img src="<?php echo e(asset('assets/images/level1.png')); ?>" alt="">
                                        <?php endif; ?>
                                </span></p>

                                <ul class="meta-tags d-b w-100 mt-xs  pb-2">
                                    <li class="meta d-in light-60 dark-110">
                                        <?php echo e(\Morilog\Jalali\Jalalian::forge($movie->created_at)->format('%d %B %Y')); ?></li>

                                </ul>

                            </div>
                        </div>
                    </div>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>



                </div>
            </div>

            <div class="swiper-button-next swiper-clip-n "></div>
            <div class="swiper-button-prev swiper-clip-p"></div>
        </section>

    </div>
</section>
<?php endif; ?>
<?php endif; ?>


<?php if(!is_null($toppostbanner)): ?>
<section class="filmoja-theater-area section_70 px-2 px-md-0">
    <div class="container">
        <div class="row">
            <div class="col-md-5 my-2 my-md-0  wow bounceInUp" data-wow-duration=".7s" data-wow-delay=".3s">
                <div class="theater-left">
                    <div class="theater-box">
                        <div class="theater-tex pr-md-4">
                            <?php echo $toppostbanner->text; ?>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-7 wow slideInLeft" data-wow-duration="1s" data-wow-delay=".2s">
                <div class="theater-slider slider-for px-2">
                    <div class="single-theater">
                        <img src="<?php echo e(asset($toppostbanner->image)); ?>" alt="theater thumb">
                        <a class="play-video" href="<?php echo e(route('ShowItem',['content'=>$movie->categories->name,'slug'=>$movie->slug])); ?>">
                            <i class="fa fa-play"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php else: ?>
<section class="filmoja-theater-area section_70 px-2 px-md-0">
    <div class="container">
        <div class="row">
            <div class="col-md-5 my-2 my-md-0  wow bounceInUp" data-wow-duration=".7s" data-wow-delay=".6s">
                <div class="theater-left">
                    <div class="theater-box">
                        <div class="theater-tex pr-md-4">
                            <h2 class="py-md-2 fs-2">فیلم آموزشی جدید</h2>
                            <h3 class="py-md-2">عنوان فیلم</h3>
                            <p class="py-md-2 text-black-50">آمار نشان می‌دهد بسیاری از کسب‌وکارها در
                                چند سال اول خود شکست می‌خورند. و شما قطعا نمی‌خواهید یکی از این
                                کارآفرینان باشید.در اینجا سه درس...</p>
                            <a href="#" class="filmoja-btn">ادامه ...</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-7 wow slideInLeft" data-wow-duration="1s" data-wow-delay=".3s">
                <div class="theater-slider slider-for px-2">
                    <div class="single-theater">
                        <img src="<?php echo e(asset('assets/images/theater.jpeg')); ?>" alt="theater thumb">
                        <a class="play-video" href="#">
                            <i class="fa fa-play"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php endif; ?>

<?php if(\App\Models\Setting::first()->mainpage_taturials==1): ?>
<?php if(count($learning)): ?>
<section id="" style="padding: 40px 0;" class="list-item li" data-list="slider">
    <div class="list-wrapper">
        <div class="wpb_wrapper py-3">
            <h2 class="font__family-open-sans font__size-20  mt-15 mb-15 title__divider title__divider--line"
                style="margin-right: 0px;"><span class="title__divider__wrapper text-header">دوره های آموزشی<span
                        class="line brk-base-bg-gradient-right"></span>
                </span></h2>

            <a href="<?php echo e(route('Category',['slug'=>'tutorial'])); ?>">
                <span class="title--more">نمایش همه <i class="ti ti-angle-left fs-0-5"></i></span>
            </a>
        </div>


        <section class="list-content">
            <div id="" class="carousel carousel-movie swiper-container-learning" dir="rtl">
                <div class="swiper-wrapper">
                    <?php $__currentLoopData = $learning; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $movie): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="item carousel-item swiper-slide">
                        <div class="thumbnail-movie thumbnail-serial mx-3 card" style="max-width: 220px;">
                            <div class="thumb-wrapper">
                                <a class="thumb" href="<?php echo e(route('ShowItem',['content'=>$movie->categories->name,'slug'=>$movie->slug])); ?>">
                                    <div class="abs-fit">
                                        <?php if($movie->picture): ?>
                                        <img src="<?php echo e(asset($movie->picture)); ?>" alt="<?php echo e($movie->title); ?>"
                                            aria-label="<?php echo e($movie->title); ?>" class="thumb-image">
                                        <?php else: ?>
                                        <div class="d-flex justify-content-center align-items-center h-100">
                                            
                                            <img style="object-fit: cover;" src="<?php echo e(asset("assets/images/logo-video1.png")); ?>" alt="<?php echo e($movie->title); ?>"
                                            aria-label="<?php echo e($movie->title); ?>" class="thumb-image">
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
                                        <span class="badge-rate"><span>
                                                <?php if(substr($movie->getEpisodesTime(),0,1) == '0' &&
                                                substr($movie->getEpisodesTime(),1,1) == '0'): ?>
                                                <?php echo e(substr($movie->getEpisodesTime(),3)); ?>

                                                <?php else: ?>
                                                <?php echo e($movie->getEpisodesTime()); ?>

                                                <?php endif; ?>
                                            </span>
                                            <i class="fa fa-clock-o pl-1"></i>
                                        </span>
                                    </div>
                                </a>
                            </div>
                            <div class="position-relative px-2 pt-3">

                                <a href="<?php echo e(route('ShowItem',['content'=>$movie->categories->name,'slug'=>$movie->slug])); ?>" title="<?php echo e($movie->title); ?>"
                                    class="title title d-block mb-2"><span><?php echo e($movie->title); ?></span></a>
                                <p class=""><span class="text-black-50">ویدیوها:</span><span class="fw-500">


                                        <?php echo e($movie->epizodes->count()); ?>


                                    </span></p>
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
                                <p class="item-level position-relative"><span class="fs-0-9">سطح: 
                                    <?php if($movie->levels->name == 'مقدماتی'): ?>
                                    <img src="<?php echo e(asset('assets/images/level1.png')); ?>" alt="">
                                    <img src="<?php echo e(asset('assets/images/level0.png')); ?>" alt="">
                                    <img src="<?php echo e(asset('assets/images/level0.png')); ?>" alt="">
                                    <?php elseif($movie->levels->name == 'متوسط'): ?>

                                    <img src="<?php echo e(asset('assets/images/level1.png')); ?>" alt="">
                                    <img src="<?php echo e(asset('assets/images/level1.png')); ?>" alt="">
                                    <img src="<?php echo e(asset('assets/images/level0.png')); ?>" alt="">
                                    <?php else: ?>
                                    <img src="<?php echo e(asset('assets/images/level1.png')); ?>" alt="">
                                    <img src="<?php echo e(asset('assets/images/level1.png')); ?>" alt="">
                                    <img src="<?php echo e(asset('assets/images/level1.png')); ?>" alt="">
                                    <?php endif; ?>
                            </span></p>

                                <ul class="meta-tags d-b w-100 mt-xs  pb-2">
                                    <li class="meta d-in light-60 dark-110">
                                        <?php echo e(\Morilog\Jalali\Jalalian::forge($movie->created_at)->format('%d %B %Y')); ?></li>

                                </ul>

                            </div>
                        </div>
                    </div>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>



                </div>
            </div>

            <div class="swiper-button-next swiper-learning-n "></div>
            <div class="swiper-button-prev swiper-learning-p"></div>
        </section>

    </div>
</section>
<?php endif; ?>
<?php endif; ?>

<?php if(\App\Models\Setting::first()->mainpage_musics==1): ?>
<?php if(count($musics)): ?>
<section id="" style="    padding: 40px 0;" class="list-item li" data-list="slider">
    <div class="list-wrapper">
        <div class="wpb_wrapper py-3">
            <h2 class="font__family-open-sans font__size-20  mt-15 mb-15 title__divider title__divider--line"
                style="margin-right: 0px;"><span class="title__divider__wrapper text-header">آهنگ ها<span
                        class="line brk-base-bg-gradient-right"></span>
                </span></h2>
            <a href="<?php echo e(route('Category',['slug'=>'musics'])); ?>"><span class="title--more">نمایش همه</span></a>
        </div>


        <section class="list-content">
            <div id="" class="carousel carousel-movie swiper-container-music"
                dir="rtl">
                <div class="swiper-wrapper">

                    <?php $__currentLoopData = $musics; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $music): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="swiper-slide ">
                        <div class="item w-100 ml-5 mr-2  my-5 card" style="max-width: 233px;">
                            <div class="position-relative">
                                <div class="item-overlay opacity r r-2x bg-black">
                                    <a class="item-overlay"
                                    href="<?php echo e(route('ShowItem',['content'=>$music->categories->name,'slug'=>$music->slug])); ?>">
                                    
                                    <div class="text-info padder m-t-sm text-sm"> <i class="fa fa-star"></i> <i
                                            class="fa fa-star"></i> <i class="fa fa-star"></i> <i
                                            class="fa fa-star"></i> <i class="fa fa-star"></i> </div>
                                    <div class="center text-center m-t-n"> <i
                                                class="ti ti-control-play fs-2"></i> </div>
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
                                </a>
                                </div>
                                <div class="top"> <span class="pull-right m-t-n-xs m-r-sm text-white"> <i
                                            class="fa fa-bookmark i-lg"></i> </span> </div> <a
                                    href="<?php echo e(route('ShowItem',['content'=>$music->categories->name,'slug'=>$music->slug])); ?>" class="music-img">
                                    <?php if($music->picture): ?>
                                    <img src="<?php echo e(asset($music->picture)); ?>" width="100%;" style="height: 131px;" alt="<?php echo e($music->title); ?>"
                                        class="r r-2x img-full">
                                    <?php else: ?>
                                    <img src="<?php echo e(asset('assets/images/logo-music1.png')); ?>" width="100%;" style="height: 131px;"
                                        alt="<?php echo e($music->title); ?>" class="r r-2x img-full">
                                    <?php endif; ?>
                                </a>
                            </div>
                            <div class="padder-v px-2"> <a href="<?php echo e(route('ShowItem',['content'=>$music->categories->name,'slug'=>$music->slug])); ?>"
                                    class="text-ellipsis"><?php echo e(Illuminate\Support\Str::limit($music->title,22)); ?></a>
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
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>




                </div>
            </div>

            <div class="swiper-pagination"></div>
        </section>

    </div>
</section>
<?php endif; ?>
<?php endif; ?>

<?php if(\App\Models\Setting::first()->mainpage_podcasts==1): ?>
<?php if(count($podcasts)): ?>
<section id="" style=" padding: 40px 0;" class="list-item li" data-list="slider">
    <div class="list-wrapper">
        <div class="wpb_wrapper py-3">
            <h2 class="font__family-open-sans font__size-20  mt-15 mb-15 title__divider title__divider--line"
                style="margin-right: 0px;"><span class="title__divider__wrapper text-header">پادکست ها<span
                        class="line brk-base-bg-gradient-right"></span>
                </span></h2>
            <a href="<?php echo e(route('Category',['slug'=>'podcasts'])); ?>"><span class="title--more">نمایش همه <i
                        class="ti ti-angle-left fs-0-5"></i></span></a>
        </div>


        <section id="podcasts">
            <div id="" class="carousel carousel-movie swiper-container-podcast"
            dir="rtl">
             <div class="swiper-wrapper">
                <?php $__currentLoopData = $podcasts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $podcast): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="swiper-slide ">
                    <div style="width:230px;" class="m-3">
                        <div class="card radius shadowDepth1">
                            <div class="card__image border-tlr-radius">
                                 <a href="<?php echo e(route('ShowItem',['content'=>$podcast->categories->name,'slug'=>$podcast->slug])); ?>">
                                <?php if($podcast->picture): ?>
                                <img src="<?php echo e(asset("$podcast->picture")); ?>" alt="<?php echo e($podcast->title); ?>" class="border-tlr-radius">
                                <?php else: ?>
                    
                                <img src="<?php echo e(asset('assets/images/logo-music1.png')); ?>" alt="<?php echo e($podcast->title); ?>" class="border-tlr-radius">
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
                                    <p  class="item-level position-relative">
                                        بازدید: <?php echo e($podcast->views); ?>

                                    </p>
                                </div>
                            </div>
                            <div class="card__meta d-flex justify-content-between px-3 pt-1">
                            <span class="text-black-50 fs-0-8">
                                <i class="fa fa-clock-o pl-1"></i>
                                <?php if(substr($podcast->duration,0,1) == '0' && substr($podcast->duration,1,1)
                                == '0'): ?>
                                <?php echo e(substr($podcast->duration,3)); ?>

                                <?php else: ?>
                                <?php echo e($podcast->duration); ?>

                                <?php endif; ?>
                
                               
                            </span>
                                <span
                                    class="text-black-50 fs-0-8"><?php echo e(\Morilog\Jalali\Jalalian::forge($podcast->created_at)->format('%d %B %Y')); ?></span>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
             </div>
            </div>
            <div class="swiper-pagination swiper-podcast-pagination"></div>
        </section>
    </div>
</section>
<?php endif; ?>
<?php endif; ?>















<?php if(count($footer_slideshow)): ?>
<section class="" style="padding: 100px;">
    <div class="row align-items-center justify-content-center">
        <div class="wpb_wrapper py-3">
            <h2 class="font__family-open-sans font__size-20  mt-15 mb-15 title__divider title__divider--line"
                style="margin-right: 0px;"><span
                    class="title__divider__wrapper text-header"><?php echo e($setting->footer_slider_title); ?><span
                        class="line brk-base-bg-gradient-right"></span>
                </span></h2>

        </div>
        <div class="col-md-12">
            <div class="owl-carousel owl-theme clients-carousel dot-indicator">
                <?php $__currentLoopData = $footer_slideshow; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                <a href="<?php echo e($item->link); ?>">
                    <div class="item single-client position-relative">
                        <img style="max-height: 150px;" src="<?php echo e(asset($item->banner)); ?>" alt="client logo" height="100%" class="client-img">
                        <div class="overlay-banner"></div>
                        <div class="banner-txt">
                            <?php echo $item->title; ?>

                        </div>
                    </div>
                </a>

                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </div>
        </div>
    </div>
</section>
<?php endif; ?>




<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
<script src="<?php echo e(asset('assets/js/parallax.min.js')); ?>"></script>
<script>
   
        new WOW().init();
        var scene = document.getElementById('scene');
        var parallaxInstance = new Parallax(scene);
        var scene2 = document.getElementById('scene2');
        var parallaxInstance = new Parallax(scene2);
        var scene3 = document.getElementById('scene3');
        var parallaxInstance = new Parallax(scene3);
   
    $(document).ready(function(){

            $('.header-carousel').owlCarousel({
            items: <?php echo json_encode($setting->header_slide_count) ?>,
            animateOut: 'fadeOut',
            loop: true,
            autoplay:true,
            margin: 10,
            rtl:true,
            margin:40,
            stagePadding:30,
            smartSpeed:450,
      
    });

 // 9. our clients logo carousel
 $('.clients-carousel').owlCarousel({
        autoplay: true,
        loop: true,
        rtl:true,
        margin:15,
        dots:true,
        slideTransition:'linear',
        autoplayTimeout:4500,
        autoplayHoverPause:true,
        autoplaySpeed:4500,
        responsive:{
            0:{
                items:1
            },
            500: {
                items:1
            },
            600:{
                items:<?php echo json_encode($setting->footer_slide_count) ?>
            },
           

        }
    })





        });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.Main.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp1\htdocs\media\resources\views/Main/index.blade.php ENDPATH**/ ?>