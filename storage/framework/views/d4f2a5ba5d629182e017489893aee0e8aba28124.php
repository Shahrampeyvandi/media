

<?php $__env->startSection('content'); ?>
<?php


?>
<div class="row">
    <div class="col-md-12">
      <?php echo $__env->make('Includes.Channel.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        
            <div class="content mt-5 px-2">
                <div class="list-wrapper">
                    <div class="wpb_wrapper py-3 mr-2">
                        <h2 class="font__family-open-sans fs-1  mt-15 mb-15 title__divider " style="margin-right: 0px;">
                            <span class="title__divider__wrapper text-success">آخرین ویدیو<span
                                    class="line brk-base-bg-gradient-right"></span>
                            </span></h2>
                    </div>
                </div>
                <div class="recent_content d-flex ">
                    <a href="#" class="image">
                        <img src="<?php echo e(asset('assets/images/poster.jpg')); ?>" height="100%" width="100%" alt="">
                    </a>
                    <div class="d-flex  flex-column pr-5">
                        <h3>عنوان</h3>
                        <p>توضیح مختصر</p>
                        <div>
                            <span class="fs-0-8 text-black-50 mt-2 ml-3">اسفند 1399 </span>
                            <span class="fs-0-8 text-black-50 mt-2">5 بازدید</span>

                        </div>
                    </div>
                </div>
                <hr>
                





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

                                <?php $__currentLoopData = $moveis; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $movie): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                <div class="item carousel-item swiper-slide">
                                    <div id="" class="thumbnail-video" data-uid=""
                                        data-duration="" data-recommendation="other"
                                        >
                                        <div class="thumb-wrapper">
                                            <a id="" href="" 
                                                class="thumb thumb-preview"
                                                data-poster="<?php echo e(asset('assets/images/Education-1.jpg')); ?>"><img
                                                    src="<?php echo e(asset('assets/images/Education-1.jpg')); ?>"
                                                    class=" thumb-image">


                                                <div class="tools">
                                                    <span class="duration">54:29</span>
                                                </div>
                                                  
                                                
                                            </a>
                                        </div>
                                        <div class="thumb-details">

                                            <h2 class="thumb-title">
                                                <a href=""
                                                    
                                                    title="بررسی نحوه عملکرد سایت‌های پزشکی آنلاین"
                                                    class="title"><span>title content</span></a>
                                            </h2>

                                            <div class="thumb-view-date">
                                                <span>1 بازدید</span>
                                                <span class="dot"></span><span class="date">4 ساعت پیش</span>
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


            <section id="" style="padding:0 0 40px 0;" class="list-item li" data-list="slider">
                <div class="list-wrapper">
                    <div class="wpb_wrapper py-3">
                        <h2 class="font__family-open-sans fs-1  mt-15 mb-15 title__divider " style="margin-right: 0px;">
                            <span class="title__divider__wrapper text-success">لغت<span
                                    class="line brk-base-bg-gradient-right"></span>
                            </span></h2>

                        <a href="<?php echo e(route('Category',['slug'=>'videos'])); ?>">
                            <span class="title--more">نمایش همه <i class="ti ti-angle-left fs-0-5"></i></span>
                        </a>
                    </div>


                    <section class="list-content">
                        <div id="" class="carousel carousel-movie swiper-container-channel2">
                            <div class="swiper-wrapper">

                                <?php $__currentLoopData = $moveis; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $movie): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                <div class="item carousel-item swiper-slide">
                                    <div id="" class="thumbnail-video" data-uid=""
                                        data-duration="" data-recommendation="other"
                                        >
                                        <div class="thumb-wrapper">
                                            <a id="" href="" 
                                                class="thumb thumb-preview"
                                                data-poster="<?php echo e(asset('assets/images/Education-1.jpg')); ?>"><img
                                                    src="<?php echo e(asset('assets/images/Education-1.jpg')); ?>"
                                                    class=" thumb-image">


                                                <div class="tools">
                                                    <span class="duration">54:29</span>
                                                </div>
                                                  
                                                
                                            </a>
                                        </div>
                                        <div class="thumb-details">

                                            <h2 class="thumb-title">
                                                <a href=""
                                                    
                                                    title="بررسی نحوه عملکرد سایت‌های پزشکی آنلاین"
                                                    class="title"><span>title content</span></a>
                                            </h2>

                                            <div class="thumb-view-date">
                                                <span>1 بازدید</span>
                                                <span class="dot"></span><span class="date">4 ساعت پیش</span>
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