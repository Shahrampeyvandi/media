

<?php $__env->startSection('content'); ?>
<?php


?>
<div class="row">
    <div class="col-md-12">
        <header class="channel-header">
            <section class="cover-wrapper">

                <div class="cover"
                    style="background-image: url(<?php echo e(asset('assets/images/edu.jpg')); ?>); background-position: center;">
                </div>
                <div class="wrapper">

                    <ul class="socials">
                        <li class="social">
                            <a href="#" class="social-icons" title="facebook" target="_blank" ><i class="fa fa-facebook"></i></a>
                        </li>
                        <li class="social">
                            <a href="#" class="social-icons" title="facebook" target="_blank" ><i class="fa fa-telegram"></i></a>
                        </li>
                        <li class="social">
                            <a href="#" class="social-icons" title="facebook" target="_blank" ><i class="fa fa-instagram"></i></a>
                        </li>
                        
                    </ul>
                </div>
            </section>
            <section class="details-row">
                <div class="wrapper">
                    <div class="details">
                        <div class="item">
                            <div class="avatar">

                                <a href="/Digiato" class="picture image">
                                    
                                        <i class="fa fa-user channel-pic"></i>
                                    
                                    </a>

                                <div class="channel-title">
                                    <a id="channelTitle" href="/Digiato" title="دیجیاتو">
                                        <h3 class="title">
                                            <span class="name">Udemy</span>

                                        </h3>
                                    </a>
                                </div>
                            </div>
                            <a href="/login?afterlogin=follow&amp;userid=349868" title="دیجیاتو"
                                class="button follow-button-349868 button-small follow-btn mr-2"
                                data-target="#txWrapper" data-insert="replace" data-channel-follow=""
                                data-userid="349868" data-username="Digiato" data-status="login"><svg
                                    class="icon icon-add" viewBox="0 0 24 24" 0="" 24="" 24""="">
                                    <use xlink:href="#si_add">
                                        <g id="si_add" data-viewBox="0 0 24 24">
                                            <path d="M19 13h-6v6h-2v-6H5v-2h6V5h2v6h6z"></path>
                                            <path d="M0 0h24v24H0z" fill="none"></path>
                                        </g>
                                    </use>
                                </svg> <span class="text">دنبال کردن</span></a>
                        </div>

                        <div class="item">
                            <div class="stat">

                                <span class="number channel-followers-349868">0</span>
                                <span class="text">دنبال‌ کننده</span>
                            </div>
                            <div class="stat">
                                <span class="number">0</span>
                                <span class="text">دنبال شونده</span>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </header>

        


        <section class="main mt-5">
            <div class="tabs d-flex flex-wrap pr-2">
                <a href="#" class="tabs push_btn ml-2 px-2 mb-2"> فیلم ها و انیمیشن ها</a>
                <a href="#" class="tabs push_btn ml-2 px-2 mb-2">کلیپ ها</a>
                <a href="#" class="tabs push_btn ml-2 px-2 mb-2">موسیقی ها</a>

                <a href="#" class="tabs push_btn ml-2 px-2 mb-2">پادکست ها</a>

                <a href="#" class="tabs push_btn ml-2 px-2 mb-2">دوره های آموزشی</a>
                <a href="#" class="tabs push_btn ml-2 px-2 mb-2">درباره کانال</a>

            </div>
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

    </section>

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
<?php echo $__env->make('layout.Main.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\media\resources\views/Main/user.blade.php ENDPATH**/ ?>