@extends('layout.Main.template')

@section('content')
<div class="row">
    <div class="col-md-12">
        @include('Includes.Channel.header')
        @include('Includes.Channel.navbar')
        {{-- content --}}
        <div class="content mt-5 px-2">
            @if (!is_null($lastpost))
            <div class="list-wrapper">
                <div class="wpb_wrapper py-3 mr-2">
                    <h2 class="font__family-open-sans fs-1  mt-15 mb-15 title__divider " style="margin-right: 0px;">
                        <span class="title__divider__wrapper text-success">آخرین مطلب<span
                                class="line brk-base-bg-gradient-right"></span>
                        </span></h2>
                </div>
            </div>

            <div class="recent_content d-flex mr-3">
                <a href="{{route('ShowItem',['content'=>$lastpost->categories->name,'slug'=>$lastpost->slug])}}"
                    class="image">

                    @if ($lastpost->media == 'video')
                    <img src="{{$lastpost->picture ? asset("$lastpost->picture") : asset("assets/images/logo-video1.png")}}"
                        @else <img
                        src="{{$lastpost->picture ? asset("$lastpost->picture") : asset("assets/images/logo-music1.png")}}"
                        @endif style="{{$lastpost->picture ? '': 'width: 100%;
                   object-fit: cover;
                   height: 100%;box-shadow: 0 0 2px 0px grey;'}}" height="100%" width="100%" alt="">

                </a>
                <div class="d-flex  flex-column pr-3">
                    <h3><a href="#">{{$lastpost->title}}</a></h3>
                    <p>{{$lastpost->subjects->name}}</p>
                    <div>
                        <span class="fs-0-8 text-black-50 mt-2 ml-3">
                            {{\Morilog\Jalali\Jalalian::forge($lastpost->created_at)->format('%B %Y')}}</span>
                        <span class="fs-0-8 text-black-50 mt-2">{{$lastpost->views}} بازدید</span>
                    </div>
                </div>
            </div>
            @endif
            <hr>
            @if (count($postsloghat))
            <section id="" style="padding:0 0 40px 0;" class="list-item li" data-list="slider">
                <div class="list-wrapper">
                    <div class="wpb_wrapper py-3">
                        <h2 class="font__family-open-sans fs-1  mt-15 mb-15 title__divider " style="margin-right: 0px;">
                            <span class="title__divider__wrapper text-success">لغت<span
                                    class="line brk-base-bg-gradient-right"></span>
                            </span></h2>
                        <a
                            href="{{route('Channel.Category.ShowAll',['subject'=>'لغت','member'=>$member->username])}}?category={{$category->latin_name}}">
                            <span class="title--more">نمایش همه <i class="ti ti-angle-left fs-0-5"></i></span>
                        </a>
                    </div>
                    <section class="list-content">
                        <div id="" class="carousel carousel-movie swiper-container-1">
                            <div class="swiper-wrapper">
                                @foreach($postsloghat as $post)
                                <div class="item carousel-item swiper-slide">
                                    <div id="" class="thumbnail-video" data-uid="" data-duration=""
                                        data-recommendation="other">
                                        <div class="thumb-wrapper">
                                            <a id=""
                                                href="{{route('ShowItem',['content'=>$post->categories->name,'slug'=>$post->slug])}}"
                                                class="thumb thumb-preview">
                                                @if ($post->media == 'video')
                                                <img src="{{$post->picture ? asset("$post->picture") : asset("assets/images/logo-video1.png")}}"
                                                    class=" thumb-image" alt="{{$post->title}}">
                                                @else
                                                <img src="{{$post->picture ? asset("$post->picture") : asset("assets/images/logo-music1.png")}}"
                                                    class=" thumb-image" alt="{{$post->title}}">
                                                @endif

                                                <div class="tools">
                                                    <span class="duration">{{$post->duration}}</span>
                                                </div>
                                                {{-- وقتی موس روی تصویر میرود فیلم زیر به حالت پیش نمایش می آید --}}
                                                {{-- <video class="preview" poster="https://static.cdn.asset.aparat.com/avt/21369543-9445__2874.jpg" src="https://static.cdn.asset.aparat.com/avt/21369543_15s.mp4" muted="" autoplay="" style="opacity: 0;"></video> --}}
                                            </a>
                                        </div>
                                        <div class="thumb-details">
                                            <h2 class="thumb-title">
                                                <a href="" title="{{$post->title}}"
                                                    class="title"><span>{{$post->title}}</span></a>
                                            </h2>
                                            <div class="thumb-view-date">
                                                <span>{{$post->views}} بازدید</span>
                                                <span class="dot"></span><span
                                                    class="date">{{\Morilog\Jalali\Jalalian::forge($post->created_at)->format('%B %Y')}}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="swiper-button-next swiper-p-1 "></div>
                        <div class="swiper-button-prev swiper-n-1"></div>
                    </section>
                </div>
            </section>
            @endif
            @if (count($postsgrammer))
            <section id="" style="padding:0 0 40px 0;" class="list-item li" data-list="slider">
                <div class="list-wrapper">
                    <div class="wpb_wrapper py-3">
                        <h2 class="font__family-open-sans fs-1  mt-15 mb-15 title__divider " style="margin-right: 0px;">
                            <span class="title__divider__wrapper text-success">گرامر<span
                                    class="line brk-base-bg-gradient-right"></span>
                            </span></h2>
                        <a
                            href="{{route('Channel.Category.ShowAll',['subject'=>'گرامر','member'=>$member->username])}}?category={{$category->latin_name}}">
                            <span class="title--more">نمایش همه <i class="ti ti-angle-left fs-0-5"></i></span>
                        </a>
                    </div>
                    <section class="list-content">
                        <div id="" class="carousel carousel-movie swiper-container-2">
                            <div class="swiper-wrapper">
                                @foreach($postsgrammer as $post)
                                <div class="item carousel-item swiper-slide">
                                    <div id="" class="thumbnail-video" data-uid="" data-duration=""
                                        data-recommendation="other">
                                        <div class="thumb-wrapper">
                                            <a id=""
                                                href="{{route('ShowItem',['content'=>$post->categories->name,'slug'=>$post->slug])}}"
                                                class="thumb thumb-preview">
                                                @if ($post->media == 'video')
                                                <img src="{{$post->picture ? asset("$post->picture") : asset("assets/images/logo-video1.png")}}"
                                                    class=" thumb-image" alt="{{$post->title}}">
                                                @else
                                                <img src="{{$post->picture ? asset("$post->picture") : asset("assets/images/logo-music1.png")}}"
                                                    class=" thumb-image" alt="{{$post->title}}">
                                                @endif

                                                <div class="tools">
                                                    <span class="duration">{{$post->duration}}</span>
                                                </div>
                                                {{-- وقتی موس روی تصویر میرود فیلم زیر به حالت پیش نمایش می آید --}}
                                                {{-- <video class="preview" poster="https://static.cdn.asset.aparat.com/avt/21369543-9445__2874.jpg" src="https://static.cdn.asset.aparat.com/avt/21369543_15s.mp4" muted="" autoplay="" style="opacity: 0;"></video> --}}
                                            </a>
                                        </div>
                                        <div class="thumb-details">

                                            <h2 class="thumb-title">
                                                <a href="" title="{{$post->title}}"
                                                    class="title"><span>{{$post->title}}</span></a>
                                            </h2>

                                            <div class="thumb-view-date">
                                                <span>{{$post->views}} بازدید</span>
                                                <span class="dot"></span><span
                                                    class="date">{{\Morilog\Jalali\Jalalian::forge($post->created_at)->format('%B %Y')}}</span>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>

                        <div class="swiper-button-next swiper-p-2 "></div>
                        <div class="swiper-button-prev swiper-n-2"></div>
                    </section>

                </div>
            </section>
            @endif
            @if (count($postsestelahat))
            <section id="" style="padding:0 0 40px 0;" class="list-item li" data-list="slider">
                <div class="list-wrapper">
                    <div class="wpb_wrapper py-3">
                        <h2 class="font__family-open-sans fs-1  mt-15 mb-15 title__divider " style="margin-right: 0px;">
                            <span class="title__divider__wrapper text-success">اصطلاحات<span
                                    class="line brk-base-bg-gradient-right"></span>
                            </span></h2>

                        <a
                            href="{{route('Channel.Category.ShowAll',['subject'=>'اصطلاحات','member'=>$member->username])}}?category={{$category->latin_name}}">
                            <span class="title--more">نمایش همه <i class="ti ti-angle-left fs-0-5"></i></span>
                        </a>
                    </div>


                    <section class="list-content">
                        <div id="" class="carousel carousel-movie swiper-container-3">
                            <div class="swiper-wrapper">

                                @foreach($postsestelahat as $post)

                                <div class="item carousel-item swiper-slide">
                                    <div id="" class="thumbnail-video" data-uid="" data-duration=""
                                        data-recommendation="other">
                                        <div class="thumb-wrapper">
                                            <a id=""
                                                href="{{route('ShowItem',['content'=>$post->categories->name,'slug'=>$post->slug])}}"
                                                class="thumb thumb-preview">
                                                @if ($post->media == 'video')
                                                <img src="{{$post->picture ? asset("$post->picture") : asset("assets/images/logo-video1.png")}}"
                                                    class=" thumb-image" alt="{{$post->title}}">
                                                @else
                                                <img src="{{$post->picture ? asset("$post->picture") : asset("assets/images/logo-music1.png")}}"
                                                    class=" thumb-image" alt="{{$post->title}}">
                                                @endif

                                                <div class="tools">
                                                    <span class="duration">{{$post->duration}}</span>
                                                </div>
                                                {{-- وقتی موس روی تصویر میرود فیلم زیر به حالت پیش نمایش می آید --}}
                                                {{-- <video class="preview" poster="https://static.cdn.asset.aparat.com/avt/21369543-9445__2874.jpg" src="https://static.cdn.asset.aparat.com/avt/21369543_15s.mp4" muted="" autoplay="" style="opacity: 0;"></video> --}}
                                            </a>
                                        </div>
                                        <div class="thumb-details">

                                            <h2 class="thumb-title">
                                                <a href="" title="{{$post->title}}"
                                                    class="title"><span>{{$post->title}}</span></a>
                                            </h2>

                                            <div class="thumb-view-date">
                                                <span>{{$post->views}} بازدید</span>
                                                <span class="dot"></span><span
                                                    class="date">{{\Morilog\Jalali\Jalalian::forge($post->created_at)->format('%B %Y')}}</span>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                                @endforeach



                            </div>
                        </div>

                        <div class="swiper-button-next swiper-p-3"></div>
                        <div class="swiper-button-prev swiper-n-3"></div>
                    </section>

                </div>
            </section>
            @endif
            @if (count($postsconversaion))
            <section id="" style="padding:0 0 40px 0;" class="list-item li" data-list="slider">
                <div class="list-wrapper">
                    <div class="wpb_wrapper py-3">
                        <h2 class="font__family-open-sans fs-1  mt-15 mb-15 title__divider " style="margin-right: 0px;">
                            <span class="title__divider__wrapper text-success">مکالمه<span
                                    class="line brk-base-bg-gradient-right"></span>
                            </span></h2>

                        <a
                            href="{{route('Channel.Category.ShowAll',['subject'=>'مکالمه','member'=>$member->username])}}?category={{$category->latin_name}}">
                            <span class="title--more">نمایش همه <i class="ti ti-angle-left fs-0-5"></i></span>
                        </a>
                    </div>


                    <section class="list-content">
                        <div id="" class="carousel carousel-movie swiper-container-4">
                            <div class="swiper-wrapper">

                                @foreach($postsconversaion as $post)

                                <div class="item carousel-item swiper-slide">
                                    <div id="" class="thumbnail-video" data-uid="" data-duration=""
                                        data-recommendation="other">
                                        <div class="thumb-wrapper">
                                            <a id=""
                                                href="{{route('ShowItem',['content'=>$post->categories->name,'slug'=>$post->slug])}}"
                                                class="thumb thumb-preview">
                                                @if ($post->media == 'video')
                                                <img src="{{$post->picture ? asset("$post->picture") : asset("assets/images/logo-video1.png")}}"
                                                    class=" thumb-image" alt="{{$post->title}}">
                                                @else
                                                <img src="{{$post->picture ? asset("$post->picture") : asset("assets/images/logo-music1.png")}}"
                                                    class=" thumb-image" alt="{{$post->title}}">
                                                @endif

                                                <div class="tools">
                                                    <span class="duration">{{$post->duration}}</span>
                                                </div>
                                                {{-- وقتی موس روی تصویر میرود فیلم زیر به حالت پیش نمایش می آید --}}
                                                {{-- <video class="preview" poster="https://static.cdn.asset.aparat.com/avt/21369543-9445__2874.jpg" src="https://static.cdn.asset.aparat.com/avt/21369543_15s.mp4" muted="" autoplay="" style="opacity: 0;"></video> --}}
                                            </a>
                                        </div>
                                        <div class="thumb-details">

                                            <h2 class="thumb-title">
                                                <a href="" title="{{$post->title}}"
                                                    class="title"><span>{{$post->title}}</span></a>
                                            </h2>

                                            <div class="thumb-view-date">
                                                <span>{{$post->views}} بازدید</span>
                                                <span class="dot"></span><span
                                                    class="date">{{\Morilog\Jalali\Jalalian::forge($post->created_at)->format('%B %Y')}}</span>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                                @endforeach



                            </div>
                        </div>

                        <div class="swiper-button-next swiper-p-4 "></div>
                        <div class="swiper-button-prev swiper-n-4"></div>
                    </section>

                </div>
            </section>
            @endif
            @if (count($postswriting))
            <section id="" style="padding:0 0 40px 0;" class="list-item li" data-list="slider">
                <div class="list-wrapper">
                    <div class="wpb_wrapper py-3">
                        <h2 class="font__family-open-sans fs-1  mt-15 mb-15 title__divider " style="margin-right: 0px;">
                            <span class="title__divider__wrapper text-success">رایتینگ<span
                                    class="line brk-base-bg-gradient-right"></span>
                            </span></h2>

                        <a
                            href="{{route('Channel.Category.ShowAll',['subject'=>'رایتینگ','member'=>$member->username])}}?category={{$category->latin_name}}">
                            <span class="title--more">نمایش همه <i class="ti ti-angle-left fs-0-5"></i></span>
                        </a>
                    </div>


                    <section class="list-content">
                        <div id="" class="carousel carousel-movie swiper-container-5">
                            <div class="swiper-wrapper">

                                @foreach($postswriting as $post)

                                <div class="item carousel-item swiper-slide">
                                    <div id="" class="thumbnail-video" data-uid="" data-duration=""
                                        data-recommendation="other">
                                        <div class="thumb-wrapper">
                                            <a id=""
                                                href="{{route('ShowItem',['content'=>$post->categories->name,'slug'=>$post->slug])}}"
                                                class="thumb thumb-preview">
                                                @if ($post->media == 'video')
                                                <img src="{{$post->picture ? asset("$post->picture") : asset("assets/images/logo-video1.png")}}"
                                                    class=" thumb-image" alt="{{$post->title}}">
                                                @else
                                                <img src="{{$post->picture ? asset("$post->picture") : asset("assets/images/logo-music1.png")}}"
                                                    class=" thumb-image" alt="{{$post->title}}">
                                                @endif

                                                <div class="tools">
                                                    <span class="duration">{{$post->duration}}</span>
                                                </div>
                                                {{-- وقتی موس روی تصویر میرود فیلم زیر به حالت پیش نمایش می آید --}}
                                                {{-- <video class="preview" poster="https://static.cdn.asset.aparat.com/avt/21369543-9445__2874.jpg" src="https://static.cdn.asset.aparat.com/avt/21369543_15s.mp4" muted="" autoplay="" style="opacity: 0;"></video> --}}
                                            </a>
                                        </div>
                                        <div class="thumb-details">

                                            <h2 class="thumb-title">
                                                <a href="" title="{{$post->title}}"
                                                    class="title"><span>{{$post->title}}</span></a>
                                            </h2>

                                            <div class="thumb-view-date">
                                                <span>{{$post->views}} بازدید</span>
                                                <span class="dot"></span><span
                                                    class="date">{{\Morilog\Jalali\Jalalian::forge($post->created_at)->format('%B %Y')}}</span>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                                @endforeach



                            </div>
                        </div>

                        <div class="swiper-button-next swiper-p-5 "></div>
                        <div class="swiper-button-prev swiper-n-5"></div>
                    </section>

                </div>
            </section>

            @endif
            @if (count($postsreading))
            <section id="" style="padding:0 0 40px 0;" class="list-item li" data-list="slider">
                <div class="list-wrapper">
                    <div class="wpb_wrapper py-3">
                        <h2 class="font__family-open-sans fs-1  mt-15 mb-15 title__divider " style="margin-right: 0px;">
                            <span class="title__divider__wrapper text-success">ریدینگ<span
                                    class="line brk-base-bg-gradient-right"></span>
                            </span></h2>

                        <a
                            href="{{route('Channel.Category.ShowAll',['subject'=>'ریدینگ','member'=>$member->username])}}?category={{$category->latin_name}}">
                            <span class="title--more">نمایش همه <i class="ti ti-angle-left fs-0-5"></i></span>
                        </a>
                    </div>


                    <section class="list-content">
                        <div id="" class="carousel carousel-movie swiper-container-6">
                            <div class="swiper-wrapper">

                                @foreach($postsreading as $post)

                                <div class="item carousel-item swiper-slide">
                                    <div id="" class="thumbnail-video" data-uid="" data-duration=""
                                        data-recommendation="other">
                                        <div class="thumb-wrapper">
                                            <a id=""
                                                href="{{route('ShowItem',['content'=>$post->categories->name,'slug'=>$post->slug])}}"
                                                class="thumb thumb-preview">
                                                @if ($post->media == 'video')
                                                <img src="{{$post->picture ? asset("$post->picture") : asset("assets/images/logo-video1.png")}}"
                                                    class=" thumb-image" alt="{{$post->title}}">
                                                @else
                                                <img src="{{$post->picture ? asset("$post->picture") : asset("assets/images/logo-music1.png")}}"
                                                    class=" thumb-image" alt="{{$post->title}}">
                                                @endif

                                                <div class="tools">
                                                    <span class="duration">{{$post->duration}}</span>
                                                </div>
                                                {{-- وقتی موس روی تصویر میرود فیلم زیر به حالت پیش نمایش می آید --}}
                                                {{-- <video class="preview" poster="https://static.cdn.asset.aparat.com/avt/21369543-9445__2874.jpg" src="https://static.cdn.asset.aparat.com/avt/21369543_15s.mp4" muted="" autoplay="" style="opacity: 0;"></video> --}}
                                            </a>
                                        </div>
                                        <div class="thumb-details">

                                            <h2 class="thumb-title">
                                                <a href="" title="{{$post->title}}"
                                                    class="title"><span>{{$post->title}}</span></a>
                                            </h2>

                                            <div class="thumb-view-date">
                                                <span>{{$post->views}} بازدید</span>
                                                <span class="dot"></span><span
                                                    class="date">{{\Morilog\Jalali\Jalalian::forge($post->created_at)->format('%B %Y')}}</span>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                                @endforeach



                            </div>
                        </div>

                        <div class="swiper-button-next swiper-p-6 "></div>
                        <div class="swiper-button-prev swiper-n-6"></div>
                    </section>

                </div>
            </section>

            @endif
            @if (count($postspeaking))
            <section id="" style="padding:0 0 40px 0;" class="list-item li" data-list="slider">
                <div class="list-wrapper">
                    <div class="wpb_wrapper py-3">
                        <h2 class="font__family-open-sans fs-1  mt-15 mb-15 title__divider " style="margin-right: 0px;">
                            <span class="title__divider__wrapper text-success">اسپیکینگ<span
                                    class="line brk-base-bg-gradient-right"></span>
                            </span></h2>

                        <a
                            href="{{route('Channel.Category.ShowAll',['subject'=>'اسپیکینگ','member'=>$member->username])}}?category={{$category->latin_name}}">
                            <span class="title--more">نمایش همه <i class="ti ti-angle-left fs-0-5"></i></span>
                        </a>
                    </div>


                    <section class="list-content">
                        <div id="" class="carousel carousel-movie swiper-container-channel2">
                            <div class="swiper-wrapper">

                                @foreach($postspeaking as $post)

                                <div class="item carousel-item swiper-slide">
                                    <div id="" class="thumbnail-video" data-uid="" data-duration=""
                                        data-recommendation="other">
                                        <div class="thumb-wrapper">
                                            <a id=""
                                                href="{{route('ShowItem',['content'=>$post->categories->name,'slug'=>$post->slug])}}"
                                                class="thumb thumb-preview">
                                                @if ($post->media == 'video')
                                                <img src="{{$post->picture ? asset("$post->picture") : asset("assets/images/logo-video1.png")}}"
                                                    class=" thumb-image" alt="{{$post->title}}">
                                                @else
                                                <img src="{{$post->picture ? asset("$post->picture") : asset("assets/images/logo-music1.png")}}"
                                                    class=" thumb-image" alt="{{$post->title}}">
                                                @endif

                                                <div class="tools">
                                                    <span class="duration">{{$post->duration}}</span>
                                                </div>
                                                {{-- وقتی موس روی تصویر میرود فیلم زیر به حالت پیش نمایش می آید --}}
                                                {{-- <video class="preview" poster="https://static.cdn.asset.aparat.com/avt/21369543-9445__2874.jpg" src="https://static.cdn.asset.aparat.com/avt/21369543_15s.mp4" muted="" autoplay="" style="opacity: 0;"></video> --}}
                                            </a>
                                        </div>
                                        <div class="thumb-details">

                                            <h2 class="thumb-title">
                                                <a href="" title="{{$post->title}}"
                                                    class="title"><span>{{$post->title}}</span></a>
                                            </h2>

                                            <div class="thumb-view-date">
                                                <span>{{$post->views}} بازدید</span>
                                                <span class="dot"></span><span
                                                    class="date">{{\Morilog\Jalali\Jalalian::forge($post->created_at)->format('%B %Y')}}</span>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                                @endforeach



                            </div>
                        </div>

                        <div class="swiper-button-next swiper-channel2-one "></div>
                        <div class="swiper-button-prev swiper-channel2-two"></div>
                    </section>

                </div>
            </section>
            @endif
            @if (count($ilets))
            <section id="" style="padding:0 0 40px 0;" class="list-item li" data-list="slider">
                <div class="list-wrapper">
                    <div class="wpb_wrapper py-3">
                        <h2 class="font__family-open-sans fs-1  mt-15 mb-15 title__divider " style="margin-right: 0px;">
                            <span class="title__divider__wrapper text-success">آیلتس<span
                                    class="line brk-base-bg-gradient-right"></span>
                            </span></h2>
                        <a
                            href="{{route('Channel.Category.ShowAll',['subject'=>'آیلتس','member'=>$member->username])}}?category={{$category->latin_name}}">
                            <span class="title--more">نمایش همه <i class="ti ti-angle-left fs-0-5"></i></span>
                        </a>
                    </div>


                    <section class="list-content">
                        <div id="" class="carousel carousel-movie swiper-container-7">
                            <div class="swiper-wrapper">

                                @foreach($ilets as $post)

                                <div class="item carousel-item swiper-slide">
                                    <div id="" class="thumbnail-video" data-uid="" data-duration=""
                                        data-recommendation="other">
                                        <div class="thumb-wrapper">
                                            <a id=""
                                                href="{{route('ShowItem',['content'=>$post->categories->name,'slug'=>$post->slug])}}"
                                                class="thumb thumb-preview">
                                                @if ($post->media == 'video')
                                                <img src="{{$post->picture ? asset("$post->picture") : asset("assets/images/logo-video1.png")}}"
                                                    class=" thumb-image" alt="{{$post->title}}">
                                                @else
                                                <img src="{{$post->picture ? asset("$post->picture") : asset("assets/images/logo-music1.png")}}"
                                                    class=" thumb-image" alt="{{$post->title}}">
                                                @endif

                                                <div class="tools">
                                                    <span class="duration">{{$post->duration}}</span>
                                                </div>
                                                {{-- وقتی موس روی تصویر میرود فیلم زیر به حالت پیش نمایش می آید --}}
                                                {{-- <video class="preview" poster="https://static.cdn.asset.aparat.com/avt/21369543-9445__2874.jpg" src="https://static.cdn.asset.aparat.com/avt/21369543_15s.mp4" muted="" autoplay="" style="opacity: 0;"></video> --}}
                                            </a>
                                        </div>
                                        <div class="thumb-details">

                                            <h2 class="thumb-title">
                                                <a href="" title="{{$post->title}}"
                                                    class="title"><span>{{$post->title}}</span></a>
                                            </h2>

                                            <div class="thumb-view-date">
                                                <span>{{$post->views}} بازدید</span>
                                                <span class="dot"></span><span
                                                    class="date">{{\Morilog\Jalali\Jalalian::forge($post->created_at)->format('%B %Y')}}</span>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="swiper-button-next swiper-p-7 "></div>
                        <div class="swiper-button-prev swiper-n-7"></div>
                    </section>

                </div>
            </section>
            @endif
        </div>
    </div>
</div>
@endsection
@section('css')
<link rel="stylesheet" href=" {{asset('assets/css/channel.css')}} ">
@endsection
@section('js')
<script>
    var default_slides = 5;
        var  breakpoints= {
        640: {
          slidesPerView: 2,
          spaceBetween: 20,
        },
        768: {
          slidesPerView: 2,
          spaceBetween: 5,
        },
        1024: {
          slidesPerView: 3,
          spaceBetween: 1,
        },
        1380:{
          slidesPerView: 4,
          spaceBetween: 1,
        }
    }
    var swiper = new Swiper('.swiper-container-1', {
          
           slidesPerView:default_slides,
            spaceBetween: 5,
            nextButton: '.swiper-p-1',
            prevButton: '.swiper-n-1',
            breakpoints:breakpoints
    });
    var swiper = new Swiper('.swiper-container-2', {
          
          slidesPerView:default_slides,
           spaceBetween: 5,
           nextButton: '.swiper-p-2',
           prevButton: '.swiper-n-2',
           breakpoints:breakpoints
   });
   var swiper = new Swiper('.swiper-container-3', {
          
          slidesPerView:default_slides,
           spaceBetween: 5,
           nextButton: '.swiper-p-3',
           prevButton: '.swiper-n-3',
           breakpoints:breakpoints
   });
   var swiper = new Swiper('.swiper-container-4', {
          
          slidesPerView:default_slides,
           spaceBetween: 5,
           nextButton: '.swiper-p-4',
           prevButton: '.swiper-n-4',
           breakpoints:breakpoints
   });
   var swiper = new Swiper('.swiper-container-5', {
          
          slidesPerView:default_slides,
           spaceBetween: 5,
           nextButton: '.swiper-p-5',
           prevButton: '.swiper-n-5',
           breakpoints:breakpoints
   });
   var swiper = new Swiper('.swiper-container-6', {
          
          slidesPerView:default_slides,
           spaceBetween: 5,
           nextButton: '.swiper-p-6',
           prevButton: '.swiper-n-6',
           breakpoints:breakpoints
   });
   var swiper = new Swiper('.swiper-container-7', {
          
          slidesPerView:default_slides,
           spaceBetween: 5,
           nextButton: '.swiper-p-7',
           prevButton: '.swiper-n-7',
           breakpoints:breakpoints
   });

   
     
</script>
@endsection