

<?php $__env->startSection('content'); ?>
<section class="top-banner"
    style="ackground-attachment: fixed;position: relative;padding: 100px 0; background: linear-gradient(40deg,#2096ff,#05ffa3) !important;">
    <div class="overlay-baner"></div>
    <div class="container position-relative">
        <div class="position-absolute" style="
        bottom: -110px;
        width: 100%;
    ">
            <img src="http://localhost/media/public/assets/images/untitled1.png" alt="" style="
        width: 100%;
    ">
        </div>
        <div class="row justify-content-center">
            <div class="col-sm-8 mx-2 mx-md-0">
                
                <div id="slider">
                    <img class="show" src="<?php echo e(asset('assets/images/baner22.jpg')); ?>" alt="">
                    <img class="" src="<?php echo e(asset('assets/images/baner33.jpg')); ?>" alt="">
                    <?php $__currentLoopData = $slideshows; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $slideshow): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                   <img src="<?php echo e(route('BaseUrl')); ?>/<?php echo e($slideshow->banner); ?>" style="display:none;" alt="<?php echo e($slideshow->title); ?>">



                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    
                  </div>
                
            </div>
        </div>

    </div>

</section>

<?php if(count($moveis)): ?>
<section id="" style="padding: 40px 0;" class="list-item li" data-list="slider">
    <div class="list-wrapper">
        <div class="wpb_wrapper py-3">
            <h2 class="font__family-open-sans font__size-20  mt-15 mb-15 title__divider title__divider--line"
                style="margin-right: 0px;"><span class="title__divider__wrapper text-header">فیلم ها و سریال ها<span
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
                                <a class="thumb" href="<?php echo e(route('ShowItem',['id'=>$movie->id])); ?>">
                                    <div class="abs-fit">
                                       <?php if($movie->picture): ?>
                                       <img src="<?php echo e(asset("$movie->picture")); ?>" alt="<?php echo e($movie->title); ?>"
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
                                        <span class="badge-rate"><span>
                                            <?php if(substr($movie->duration,0,1) == '0' && substr($movie->duration,1,1) == '0'): ?>
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
                                <a class="thumb" href="<?php echo e(route('ShowItem',['id'=>$movie->id])); ?>">
                                    <div class="abs-fit">
                                       <?php if($movie->picture): ?>
                                       <img src="<?php echo e(asset("$movie->picture")); ?>" alt="<?php echo e($movie->title); ?>"
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
                                            <i class="fa fa-clock-o pl-1"></i>
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
            <div id="carousel6d37245e2b67ebb3960241b7a1155e61" class="carousel carousel-movie swiper-container-music"
                dir="rtl">
                <div class="swiper-wrapper">

                    <?php $__currentLoopData = $musics; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $music): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="swiper-slide ">
                        <div class="item w-100 ml-5 mr-2  my-5 card" style="max-width: 210px;">
                            <div class="position-relative">
                                <div class="item-overlay opacity r r-2x bg-black">
                                    <div class="text-info padder m-t-sm text-sm"> <i class="fa fa-star"></i> <i
                                            class="fa fa-star"></i> <i class="fa fa-star"></i> <i
                                            class="fa fa-star"></i> <i class="fa fa-star-o text-muted"></i> </div>
                                    <div class="center text-center m-t-n"> <a href="<?php echo e(route('ShowItem',['id'=>$music->id])); ?>"><i
                                                class="ti ti-control-play fs-2"></i></a> </div>
                                    <div class="bottom padder m-b-sm"> <a href="#" class="ml-2"> <span
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
                                            </svg> </a> <a href="#"> <span class="text-success"><?php echo e(\App\Models\Contents\Likes::where('posts_id',$music->id)->count()); ?></span>
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
                    
                                        </a> </div>
                                </div>
                                <div class="top"> <span class="pull-right m-t-n-xs m-r-sm text-white"> <i
                                            class="fa fa-bookmark i-lg"></i> </span> </div> <a href="#"
                                    class="music-img">
                                   <?php if($music->picture): ?>
                                    <img src="<?php echo e(asset($music->picture)); ?>" width="100%;" style="height: 230px;" alt="" class="r r-2x img-full">
                                    <?php else: ?>
                                    <img src="<?php echo e(asset('assets/images/p4.jpg')); ?>" width="100%;" style="height: 230px;" alt=""
                                        class="r r-2x img-full">
                                    <?php endif; ?>
                                </a>
                            </div>
                            <div class="padder-v px-2"> <a href="#" class="text-ellipsis"><?php echo e($music->title); ?></a>
                                <p href="#" class="text-ellipsis text-black-50">سطح: <?php echo e($music->levels->name); ?></p>
                                <a href="#"
                                    class="text-ellipsis text-xs text-muted">
                                <?php if($music->languages): ?>
                                    <?php echo e($music->language); ?>

                                <?php endif; ?>
                                </a>
                                <div class="d-flex justify-content-between mt-3">
                                    <span class="fs-0-8 text-black-50">
                                        <?php echo e($music->languages->name); ?>

                                    </span>
                                    <span class="fs-0-8 text-black-50">
                                        11 بهمن 1398
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


        <section class="">
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
                                   ><i class="fa fa-play-circle"></i></a>
                            </div>
                            <article class="card__article mt-2 pt-3">
                                <h2><a href="<?php echo e(route('ShowItem',['id'=>$podcast->id])); ?>" class="fs-0-8"><?php echo e($podcast->title); ?></a></h2>
                                <p><?php echo e($podcast->desc); ?></p>
                            </article>
                        </div>
                        <div class="pr-3">
                            <div class="card__author">
                                <a href="#" class="fs-0-8"> زبان: <?php echo e($movie->languages->name); ?></a>
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
        </section>
    </div>
</section>

<?php endif; ?>
<section class="" style="padding: 100px;">
    <div class="row align-items-center justify-content-center">
        <div class="wpb_wrapper py-3">
            <h2 class="font__family-open-sans font__size-20  mt-15 mb-15 title__divider title__divider--line"
                style="margin-right: 0px;"><span class="title__divider__wrapper text-header">نماد های مربوطه<span
                        class="line brk-base-bg-gradient-right"></span>
                </span></h2>

        </div>
        <div class="col-md-12">
            <div class="owl-carousel owl-theme clients-carousel dot-indicator">
                <div class="item single-client">
                    <img src="<?php echo e(asset('assets/images/1566673202.jpg')); ?>" alt="client logo" class="client-img">
                </div>
                <div class="item single-client">
                    <img src="<?php echo e(asset('assets/images/1566673200.jpg')); ?>" alt="client logo" class="client-img">
                </div>
                <div class="item single-client">
                    <img src="<?php echo e(asset('assets/images/1566673200.jpg')); ?>" alt="client logo" class="client-img">
                </div>
                <div class="item single-client">
                    <img src="<?php echo e(asset('assets/images/1566673202.jpg')); ?>" alt="client logo" class="client-img">
                </div>
                <div class="item single-client">
                    <img src="<?php echo e(asset('assets/images/1566673202.jpg')); ?>" alt="client logo" class="client-img">
                </div>

            </div>
        </div>
    </div>
</section>




<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.Main.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\media\resources\views/Main/index.blade.php ENDPATH**/ ?>