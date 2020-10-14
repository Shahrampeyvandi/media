@extends('layout.Main.template')
@section('content')

<section class="top-banner" style="">
    {{-- <div class="overlay-baner"></div> --}}
    <div class="container position-relative">
        <div class="shape-wrapper">
            <img src="{{asset('assets/images/header-shape.png')}}" alt="header shape" class="w-100">
        </div>
        <div class="row justify-content-center">
            <div class="owl-carousel owl-theme header-carousel fadeOut ">
                @foreach ($header_slideshow as $slideshow)
                @if ($slideshow->link)

                <a href="{{$slideshow->link}}">

                    @else
                    <a href="#">
                        @endif
                        <div class="item single-client position-relative">
                            <img style="object-fit: contain" src="{{asset($slideshow->banner)}}" alt="{{$slideshow->link ?? 'تبلیغ'}}" height="100%"
                                class="client-img">
                            {{-- <div class="overlay-banner"></div> --}}
                            <div class="banner-txt">
                                {!! $slideshow->title !!}
                            </div>
                        </div>
                    </a>
                    @endforeach

            </div>
        </div>
    </div>
    <div id="scene3" class="d-none d-md-block">
        <img data-depth="0.1" src="{{asset('assets/images/layer3.png')}}" alt="parallax_shape1">
    </div>
    <div id="scene2" class="d-none d-md-block">
        <img data-depth="0.2" src="{{asset('assets/images/layer2.png')}}" alt="parallax_shape2">
    </div>
    <div id="scene" class="d-none d-md-block">
        <img data-depth="0.3" src="{{asset('assets/images/layer1.png')}}" alt="parallax_shape3">
    </div>
</section>
@if(\App\Models\Setting::first()->mainpage_films==1)
@if (count($moveis))
<section id="" style="padding: 40px 0;" class="list-item li" data-list="slider">
    <div class="list-wrapper">
        <div class="wpb_wrapper py-3">
            <h2 class="font__family-open-sans font__size-20  mt-15 mb-15 title__divider title__divider--line"
                style="margin-right: 0px;"><span class="title__divider__wrapper text-header">فیلم ها<span
                        class="line brk-base-bg-gradient-right"></span>
                </span></h2>
            <a href="{{route('Category',['slug'=>'videos'])}}">
                <span class="title--more">نمایش همه <i class="ti ti-angle-left fs-0-5"></i></span>
            </a>
        </div>
        <section class="list-content">
            <div id="" class="carousel carousel-movie swiper-container1" dir="rtl">
                <div class="swiper-wrapper">
                    @foreach($moveis as $movie)
                    <div class="item carousel-item swiper-slide">
                        @component('components.video-article',['movie'=>$movie])
                            
                        @endcomponent
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="swiper-button-next swiper-n "></div>
            <div class="swiper-button-prev swiper-p"></div>
        </section>
    </div>
</section>
@endif
@endif

@if(\App\Models\Setting::first()->mainpage_animations==1)
@if (count($animations))
<section id="" style="padding:0 0 40px 0;" class="list-item li" data-list="slider">
    <div class="list-wrapper">
        <div class="wpb_wrapper py-3">
            <h2 class="font__family-open-sans font__size-20  mt-15 mb-15 title__divider title__divider--line"
                style="margin-right: 0px;"><span class="title__divider__wrapper text-header">انیمیشن ها<span
                        class="line brk-base-bg-gradient-right"></span>
                </span></h2>

            <a href="{{route('Category',['slug'=>'animations'])}}">
                <span class="title--more">نمایش همه <i class="ti ti-angle-left fs-0-5"></i></span>
            </a>
        </div>


        <section class="list-content">
            <div id="" class="carousel carousel-movie swiper-container2" dir="rtl">
                <div class="swiper-wrapper">

                    @foreach($animations as $movie)

                    <div class="item carousel-item swiper-slide">
                        @component('components.video-article',['movie'=>$movie])
                            
                        @endcomponent
                    </div>

                    @endforeach



                </div>
            </div>

            <div class="swiper-button-next swiper-ani-n "></div>
            <div class="swiper-button-prev swiper-ani-p"></div>
        </section>

    </div>
</section>
@endif
@endif


{{-- start genplus --}}
@if(\App\Models\Setting::first()->mainpage_plus==1)
@if (count($clips))
<section id="" style="padding:0 0 40px 0;" class="list-item li" data-list="slider">
    <div class="list-wrapper">
        <div class="wpb_wrapper py-3">
            <h2 class="font__family-open-sans font__size-20  mt-15 mb-15 title__divider title__divider--line"
                style="margin-right: 0px;"><span class="title__divider__wrapper text-header">ژن پلاس<span
                        class="line brk-base-bg-gradient-right"></span>
                </span></h2>

            <a href="{{route('Category',['slug'=>'genplus'])}}">
                <span class="title--more">نمایش همه <i class="ti ti-angle-left fs-0-5"></i></span>
            </a>
        </div>


        <section class="list-content">
            <div id="" class="carousel carousel-movie swiper-container-clip" dir="rtl">
                <div class="swiper-wrapper">

                    @foreach($clips as $movie)

                    <div class="item carousel-item swiper-slide">
                        @component('components.video-article',['movie'=>$movie])
                            
                        @endcomponent
                    </div>

                    @endforeach



                </div>
            </div>

            <div class="swiper-button-next swiper-clip-n "></div>
            <div class="swiper-button-prev swiper-clip-p"></div>
        </section>

    </div>
</section>
@endif
@endif
{{-- end genplus --}}

@if (!is_null($toppostbanner))
<section class="filmoja-theater-area section_70 px-2 px-md-0">
    <div class="container">
        <div class="row">
            <div class="col-md-5 my-2 my-md-0  wow bounceInUp" data-wow-duration=".7s" data-wow-delay=".3s">
                <div class="theater-left">
                    <div class="theater-box">
                        <div class="theater-tex pr-md-4">
                            {!! $toppostbanner->text !!}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-7 wow slideInLeft" data-wow-duration="1s" data-wow-delay=".2s">
                <div class="theater-slider slider-for px-2">
                    <div class="single-theater">
                        <img src="{{asset($toppostbanner->image)}}" alt="theater thumb">
                        <a class="play-video"
                            href="{{route('ShowItem',['content'=>$movie->categories->name,'slug'=>$movie->slug])}}">
                            <i class="fa fa-play"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@else
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
                        <img src="{{asset('assets/images/theater.jpeg')}}" alt="theater thumb">
                        <a class="play-video" href="#">
                            <i class="fa fa-play"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endif

@if(\App\Models\Setting::first()->mainpage_taturials==1)
@if (count($learning))
<section id="" style="padding: 40px 0;" class="list-item li" data-list="slider">
    <div class="list-wrapper">
        <div class="wpb_wrapper py-3">
            <h2 class="font__family-open-sans font__size-20  mt-15 mb-15 title__divider title__divider--line"
                style="margin-right: 0px;"><span class="title__divider__wrapper text-header">دوره های آموزشی<span
                        class="line brk-base-bg-gradient-right"></span>
                </span></h2>

            <a href="{{route('Category',['slug'=>'tutorial'])}}">
                <span class="title--more">نمایش همه <i class="ti ti-angle-left fs-0-5"></i></span>
            </a>
        </div>


        <section class="list-content">
            <div id="" class="carousel carousel-movie swiper-container-learning" dir="rtl">
                <div class="swiper-wrapper">
                    @foreach($learning as $movie)
                    <div class="item carousel-item swiper-slide">
                       @component('components.tutorial-article',['movie'=>$movie])
                           
                       @endcomponent
                    </div>

                    @endforeach



                </div>
            </div>

            <div class="swiper-button-next swiper-learning-n "></div>
            <div class="swiper-button-prev swiper-learning-p"></div>
        </section>

    </div>
</section>
@endif
@endif

@if(\App\Models\Setting::first()->mainpage_musics==1)
@if (count($musics))
<section id="" style="    padding: 40px 0;" class="list-item li" data-list="slider">
    <div class="list-wrapper">
        <div class="wpb_wrapper py-3">
            <h2 class="font__family-open-sans font__size-20  mt-15 mb-15 title__divider title__divider--line"
                style="margin-right: 0px;"><span class="title__divider__wrapper text-header">آهنگ ها<span
                        class="line brk-base-bg-gradient-right"></span>
                </span></h2>
            <a href="{{route('Category',['slug'=>'musics'])}}"><span class="title--more">نمایش همه</span></a>
        </div>


        <section class="list-content">
            <div id="" class="carousel carousel-movie swiper-container-music" dir="rtl">
                <div class="swiper-wrapper">
                    @foreach($musics as $music)
                    <div class="swiper-slide ">
                        @component('components.music-article',['music'=>$music])
                            
                        @endcomponent
                    </div>
                    @endforeach




                </div>
            </div>

            <div class="swiper-pagination"></div>
        </section>

    </div>
</section>
@endif
@endif

@if(\App\Models\Setting::first()->mainpage_podcasts==1)
@if (count($podcasts))
<section id="" style=" padding: 40px 0;" class="list-item li" data-list="slider">
    <div class="list-wrapper">
        <div class="wpb_wrapper py-3">
            <h2 class="font__family-open-sans font__size-20  mt-15 mb-15 title__divider title__divider--line"
                style="margin-right: 0px;"><span class="title__divider__wrapper text-header">پادکست ها<span
                        class="line brk-base-bg-gradient-right"></span>
                </span></h2>
            <a href="{{route('Category',['slug'=>'podcasts'])}}"><span class="title--more">نمایش همه <i
                        class="ti ti-angle-left fs-0-5"></i></span></a>
        </div>


        <section id="podcasts">
            <div id="" class="carousel carousel-movie swiper-container-podcast" dir="rtl">
                <div class="swiper-wrapper">
                    @foreach($podcasts as $podcast)
                    <div class="swiper-slide ">
                       @component('components.podcast-article',['podcast'=>$podcast])
                           
                       @endcomponent
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="swiper-pagination swiper-podcast-pagination"></div>
        </section>
    </div>
</section>
@endif
@endif















@if (count($footer_slideshow))
<section class="" style="padding: 100px;">
    <div class="row align-items-center justify-content-center">
        <div class="wpb_wrapper py-3">
            <h2 class="font__family-open-sans font__size-20  mt-15 mb-15 title__divider title__divider--line"
                style="margin-right: 0px;"><span
                    class="title__divider__wrapper text-header">{{$setting->footer_slider_title}}<span
                        class="line brk-base-bg-gradient-right"></span>
                </span></h2>

        </div>
        <div class="col-md-12">
            <div class="owl-carousel owl-theme clients-carousel dot-indicator">
                @foreach ($footer_slideshow as $item)

                <a href="{{$item->link}}">
                    <div class="item single-client position-relative">
                        <img style="max-height: 150px;" src="{{asset($item->banner)}}" alt="client logo" height="100%"
                            class="client-img">
                        <div class="overlay-banner"></div>
                        <div class="banner-txt">
                            {!! $item->title !!}
                        </div>
                    </div>
                </a>

                @endforeach

            </div>
        </div>
    </div>
</section>
@endif




@endsection

@section('js')
<script src="{{asset('assets/js/parallax.min.js')}}"></script>
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
@endsection