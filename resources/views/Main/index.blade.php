@extends('layout.Main.template')
@section('content')
<section class="top-banner"
    style="ackground-attachment: fixed;position: relative;padding: 100px 0; background: linear-gradient(40deg,#2096ff,#05ffa3) !important;">
    <div class="overlay-baner"></div>
    <div class="container position-relative">
        <div class="position-absolute" style="
        bottom: -110px;
        width: 100%;
    ">
            <img src="{{asset('assets/images/untitled1.png')}}" alt="" style="
        width: 100%;
    ">
        </div>
        <div class="row justify-content-center">
            <div class="owl-carousel owl-theme header-carousel fadeOut " style="max-width:1000px;">
                @foreach ($slideshows as $slideshow)
                <a href="{{$slideshow->link}}">
                    <div class="item single-client position-relative" style="height: 15rem;">
                        <img src="{{asset($slideshow->banner)}}" alt="client logo" class="client-img">
                       <div class="overlay-banner"></div>
                        <div class="banner-txt">
                            {!! $slideshow->title !!}
                        </div>
                    </div>
                </a>
                @endforeach

            </div>
        </div>
    </div>
</section>
@if (count($moveis))
<section id="" style="padding: 40px 0;" class="list-item li" data-list="slider">
    <div class="list-wrapper">
        <div class="wpb_wrapper py-3">
            <h2 class="font__family-open-sans font__size-20  mt-15 mb-15 title__divider title__divider--line"
                style="margin-right: 0px;"><span class="title__divider__wrapper text-header">فیلم ها و سریال ها<span
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
                        <div class="thumbnail-movie thumbnail-serial mx-3 card" style="max-width: 220px;">
                            <div class="thumb-wrapper">
                                <a class="thumb" href="{{route('ShowItem',['id'=>$movie->id])}}">
                                    <div class="abs-fit">
                                        @if ($movie->picture)
                                        <img src="{{asset("$movie->picture")}}" alt="{{$movie->title}}"
                                            aria-label="{{$movie->title}}" class="thumb-image">
                                        @else
                                        <div class="d-flex justify-content-center align-items-center h-100">
                                            {{-- <img src="{{asset('assets/images/cinema.png')}}"
                                            alt="{{$movie->title}}"
                                            aria-label="{{$movie->title}}" class="thumb-image"> --}}
                                            <i class="ti ti-video-camera text-black-50" style="font-size: 5rem;"></i>
                                        </div>
                                        @endif
                                    </div>
                                    <div class="tools">
                                        <span class="badge-rate">
                                            <span>{{count($movie->likes)}}</span>
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
                                                @if (substr($movie->duration,0,1) == '0' && substr($movie->duration,1,1)
                                                == '0')
                                                {{substr($movie->duration,3)}}
                                                @else
                                                {{$movie->duration}}
                                                @endif
                                            </span>
                                            <i class="fa fa-clock-o pl-1"></i>
                                        </span>
                                    </div>
                                </a>
                            </div>
                            <div class="position-relative px-2 pt-3">
                                <a href="{{route('ShowItem',['id'=>$movie->id])}}" title="{{$movie->title}}"
                                    class="title title d-block mb-2"><span>{{$movie->title}}</span></a>
                                <p class=""><span class="text-black-50">موضوع: </span><span class="fw-500">
                                        @if ($movie->subjects)

                                        {{$movie->subjects->name}}
                                        @endif
                                    </span></p>
                                <p class=""><span class="text-black-50">زبان: </span><span class="fw-500 fs-0-8">
                                        @if ($movie->languages)
                                        {{$movie->languages->name}}
                                        @endif
                                    </span></p>
                                <p class=""><span class="fs-0-9">سطح: {{$movie->levels->name}}</span></p>

                                <ul class="meta-tags d-b w-100 mt-xs  pb-2">
                                    <li class="meta d-in light-60 dark-110">
                                        {{\Morilog\Jalali\Jalalian::forge($movie->created_at)->format('%d %B %Y')}}</li>
                                </ul>
                            </div>
                        </div>
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
                        <div class="thumbnail-movie thumbnail-serial mx-3 card" style="max-width: 220px;">
                            <div class="thumb-wrapper">
                                <a class="thumb" href="{{route('ShowItem',['id'=>$movie->id])}}">
                                    <div class="abs-fit">
                                        @if ($movie->picture)
                                        <img src="{{asset("$movie->picture")}}" alt="{{$movie->title}}"
                                            aria-label="{{$movie->title}}" class="thumb-image">
                                        @else
                                        <div class="d-flex justify-content-center align-items-center h-100">
                                            {{-- <img src="{{asset('assets/images/cinema.png')}}"
                                            alt="{{$movie->title}}"
                                            aria-label="{{$movie->title}}" class="thumb-image"> --}}
                                            <i class="ti ti-video-camera text-black-50" style="font-size: 5rem;"></i>
                                        </div>
                                        @endif

                                    </div>
                                    <div class="tools">
                                        <span class="badge-rate">
                                            <span>{{count($movie->likes)}}</span>
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
                                            <span> @if (substr($movie->duration,0,1) == '0' &&
                                                substr($movie->duration,1,1) == '0')
                                                {{substr($movie->duration,3)}}
                                                @else
                                                {{$movie->duration}}
                                                @endif</span>
                                            <i class="fa fa-clock-o pl-1"></i>
                                        </span>
                                    </div>
                                </a>
                            </div>
                            <div class="position-relative px-2 pt-3">

                                <a href="{{route('ShowItem',['id'=>$movie->id])}}" title="{{$movie->title}}"
                                    class="title title d-block mb-2"><span>{{$movie->title}}</span></a>
                                <p class=""><span class="text-black-50">موضوع: </span><span class="fw-500">
                                        @if ($movie->subjects)

                                        {{$movie->subjects->name}}
                                        @endif
                                    </span></p>
                                <p class=""><span class="text-black-50">زبان: </span><span class="fw-500 fs-0-8">
                                        @if ($movie->languages)
                                        {{$movie->languages->name}}
                                        @endif
                                    </span></p>
                                <p class=""><span class="fs-0-9">سطح: {{$movie->levels->name}}</span></p>

                                <ul class="meta-tags d-b w-100 mt-xs  pb-2">
                                    <li class="meta d-in light-60 dark-110">
                                        {{\Morilog\Jalali\Jalalian::forge($movie->created_at)->format('%d %B %Y')}}</li>

                                </ul>

                            </div>
                        </div>
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
                        <div class="thumbnail-movie thumbnail-serial mx-3 card" style="max-width: 220px;">
                            <div class="thumb-wrapper">
                                <a class="thumb" href="{{route('ShowItem',['id'=>$movie->id])}}">
                                    <div class="abs-fit">
                                        @if ($movie->picture)
                                        <img src="{{asset("$movie->picture")}}" alt="{{$movie->title}}"
                                            aria-label="{{$movie->title}}" class="thumb-image">
                                        @else
                                        <div class="d-flex justify-content-center align-items-center h-100">
                                            {{-- <img src="{{asset('assets/images/cinema.png')}}"
                                            alt="{{$movie->title}}"
                                            aria-label="{{$movie->title}}" class="thumb-image"> --}}
                                            <i class="ti ti-video-camera text-black-50" style="font-size: 5rem;"></i>
                                        </div>
                                        @endif

                                    </div>
                                    <div class="tools">
                                        <span class="badge-rate">
                                            <span>{{count($movie->likes)}}</span>
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
                                                @if (substr($movie->getEpisodesTime(),0,1) == '0' &&
                                                substr($movie->getEpisodesTime(),1,1) == '0')
                                                {{substr($movie->getEpisodesTime(),3)}}
                                                @else
                                                {{$movie->getEpisodesTime()}}
                                                @endif
                                            </span>
                                            <i class="fa fa-clock-o pl-1"></i>
                                        </span>
                                    </div>
                                </a>
                            </div>
                            <div class="position-relative px-2 pt-3">

                                <a href="{{route('ShowItem',['id'=>$movie->id])}}" title="{{$movie->title}}"
                                    class="title title d-block mb-2"><span>{{$movie->title}}</span></a>
                                <p class=""><span class="text-black-50">ویدیوها:</span><span class="fw-500">


                                        {{$movie->epizodes->count()}}

                                    </span></p>
                                <p class=""><span class="text-black-50">موضوع: </span><span class="fw-500">
                                        @if ($movie->subjects)

                                        {{$movie->subjects->name}}
                                        @endif
                                    </span></p>
                                <p class=""><span class="text-black-50">زبان: </span><span class="fw-500 fs-0-8">
                                        @if ($movie->languages)
                                        {{$movie->languages->name}}
                                        @endif
                                    </span></p>
                                <p class=""><span class="fs-0-9">سطح: {{$movie->levels->name}}</span></p>

                                <ul class="meta-tags d-b w-100 mt-xs  pb-2">
                                    <li class="meta d-in light-60 dark-110">
                                        {{\Morilog\Jalali\Jalalian::forge($movie->created_at)->format('%d %B %Y')}}</li>

                                </ul>

                            </div>
                        </div>
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
            <div id="carousel6d37245e2b67ebb3960241b7a1155e61" class="carousel carousel-movie swiper-container-music"
                dir="rtl">
                <div class="swiper-wrapper">

                    @foreach($musics as $music)
                    <div class="swiper-slide ">
                        <div class="item w-100 ml-5 mr-2  my-5 card" style="max-width: 210px;">
                            <div class="position-relative">
                                <div class="item-overlay opacity r r-2x bg-black">
                                    <div class="text-info padder m-t-sm text-sm"> <i class="fa fa-star"></i> <i
                                            class="fa fa-star"></i> <i class="fa fa-star"></i> <i
                                            class="fa fa-star"></i> <i class="fa fa-star-o text-muted"></i> </div>
                                    <div class="center text-center m-t-n"> <a
                                            href="{{route('ShowItem',['id'=>$music->id])}}"><i
                                                class="ti ti-control-play fs-2"></i></a> </div>
                                    <div class="bottom padder m-b-sm"> <a
                                            href="{{route('ShowItem',['id'=>$music->id])}}" class="ml-2"> <span
                                                class="text-info"> {{count($music->comments)}}</span><svg
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
                                            </svg> </a> <a href="{{route('ShowItem',['id'=>$music->id])}}"> <span
                                                class="text-success">{{\App\Models\Contents\Likes::where('posts_id',$music->id)->count()}}</span>
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
                                            class="fa fa-bookmark i-lg"></i> </span> </div> <a
                                    href="{{route('ShowItem',['id'=>$music->id])}}" class="music-img">
                                    @if($music->picture)
                                    <img src="{{asset($music->picture)}}" width="100%;" style="height: 230px;" alt=""
                                        class="r r-2x img-full">
                                    @else
                                    <img src="{{asset('assets/images/p4.jpg')}}" width="100%;" style="height: 230px;"
                                        alt="" class="r r-2x img-full">
                                    @endif
                                </a>
                            </div>
                            <div class="padder-v px-2"> <a href="{{route('ShowItem',['id'=>$music->id])}}"
                                    class="text-ellipsis">{{$music->title}}</a>
                                <p href="#" class="text-ellipsis text-black-50">سطح: {{$music->levels->name}}</p>
                                <a href="#" class="text-ellipsis text-xs text-muted">
                                    @if ($music->languages)
                                    {{$music->language}}
                                    @endif
                                </a>
                                <div class="d-flex justify-content-between mt-3">
                                    <span class="fs-0-8 text-black-50">
                                        {{$music->languages->name}}
                                    </span>
                                    <span class="fs-0-8 text-black-50">
                                        11 بهمن 1398
                                    </span>

                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach




                </div>
            </div>

            <div class="swiper-pagination"></div>
        </section>

    </div>
</section>

@endif

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


        <section class="">
            <div class="row">
                @foreach($podcasts as $podcast)
                <div style="width:230px;" class="m-3">
                    <div class="card radius shadowDepth1">
                        <div class="card__image border-tlr-radius">
                            @if ($podcast->picture)
                            <img src="{{asset("$podcast->picture")}}" alt="image" class="border-tlr-radius">
                            @else

                            <img src="{{asset('assets/images/record.png')}}" alt="image" class="border-tlr-radius">
                            @endif
                        </div>
                        <div class="card__content px-3 pb-2">
                            <div class="card__share">
                                <a href="{{route('ShowItem',['id'=>$podcast->id])}}" id="" class=" share-icon"><i
                                        class="fa fa-play-circle"></i></a>
                            </div>
                            <article class="card__article mt-2 pt-3">
                                <h2><a href="{{route('ShowItem',['id'=>$podcast->id])}}"
                                        class="fs-0-8">{{$podcast->title}}</a></h2>
                                <p>{{$podcast->desc}}</p>
                            </article>
                        </div>
                        <div class="pr-3">
                            <div class="card__author">
                                <a class="fs-0-8"> زبان: {{$movie->languages->name}}</a>
                                <p class="">سطح: {{$podcast->levels->name}}</p>
                            </div>
                        </div>
                        <div class="card__meta d-flex justify-content-between px-3 pt-1">
                            <span class="text-black-50 fs-0-8">{{$podcast->languages->name}}</span>
                            <span
                                class="text-black-50 fs-0-8">{{\Morilog\Jalali\Jalalian::forge($podcast->created_at)->format('%d %B %Y')}}</span>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </section>
    </div>
</section>

@endif















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
                    <img src="{{asset('assets/images/1566673202.jpg')}}" alt="client logo" class="client-img">
                </div>
                <div class="item single-client">
                    <img src="{{asset('assets/images/1566673200.jpg')}}" alt="client logo" class="client-img">
                </div>
                <div class="item single-client">
                    <img src="{{asset('assets/images/1566673200.jpg')}}" alt="client logo" class="client-img">
                </div>
                <div class="item single-client">
                    <img src="{{asset('assets/images/1566673202.jpg')}}" alt="client logo" class="client-img">
                </div>
                <div class="item single-client">
                    <img src="{{asset('assets/images/1566673202.jpg')}}" alt="client logo" class="client-img">
                </div>

            </div>
        </div>
    </div>
</section>




@endsection