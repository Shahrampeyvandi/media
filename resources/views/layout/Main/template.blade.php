<!DOCTYPE html>
<html lang="fa">

<head>
    <meta charset="utf-8">
    <title>
        ژن برتر
    </title>
    <!-- UA-153829- -->
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta http-equiv="content-language" content="fa" />
    <link rel="icon" href="{{asset('assets/images/logo.jpeg')}}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    {{-- <link rel="stylesheet" href="{{route('BaseUrl')}}/Panel/vendor/FontAwesome/all.css"> --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link rel="stylesheet" href="{{route('BaseUrl')}}/Panel/vendor/themify/themify-icons.css">
    <link rel="stylesheet" href="{{route('BaseUrl')}}/assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="{{route('BaseUrl')}}/assets/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="{{route('BaseUrl')}}/assets/css/animate.css">
    <link rel="stylesheet" href="{{route('BaseUrl')}}/assets/css/toastr.css">
    <link rel="stylesheet" href="{{route('BaseUrl')}}/assets/css/stylemusic.css">
    <link rel="stylesheet" href="{{route('BaseUrl')}}/assets/css/mdb.min.css">
    <link href="{{route('BaseUrl')}}/assets/css/swiper.min.css" rel="stylesheet">
    <script src="{{asset('assets/js/jquery-3.4.1.js')}}"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="{{route('BaseUrl')}}/assets/js/simplebar.min.js"></script>
    <script src="{{route('BaseUrl')}}/assets/js/simple-scrollbar.min.js"></script>
    <script src="{{route('BaseUrl')}}/assets/js/swiper.js"></script>
    <link rel="stylesheet" href="{{route('BaseUrl')}}/assets/css/style.css" />
    @yield('css')
    <style>
        /* width */
        ::-webkit-scrollbar {
            width: 10px;
        }

        /* Track */
        ::-webkit-scrollbar-track {
            background: #fff;
        }

        /* Handle */
        ::-webkit-scrollbar-thumb {
            background: lightgray;
        }


        /* Handle on hover */
        ::-webkit-scrollbar-thumb:hover {
            background: #555;
        }
    </style>
    <script>
        var isMobile = false;
    </script>
</head>

<body class="device-desktop theme-light">
    <div class="page-loader" style="display: none; ">
        <div class="spinner-border text-success"></div>
        <span>در حال بارگذاری ...</span>
    </div>


    {{-- <div id="popup2" class="overlay note">
        <div class="popup" style="width:60%;">
            <a class="close" href="#">&times;</a>
            <div class="content">
                <div class="row">
                    <div class="note-text" style="flex: 1.2;display: none;">
                        <form id="" action="#" method="post">
                            @csrf
                            <div class="mt-3">
                                <h5 class="modal-title px-3 pt-1 mb-2" id="exampleModalLabel"> یادداشت ها
                                </h5>
                                <div class="form-group col-md-12">
                                    <input type="hidden" id="parent_id" name="parent_id" value="0">
                                    <input type="hidden" name="postid" value="">

                                    <textarea type="text" placeholder=" " rows="7" class="form-control" name="info"
                                        id="description"></textarea>
                                </div>
                            </div>
                            {{-- <div class="form-group col-md-12">
            <button type="submit" class="btn btn-sm btn-primary">افزودن </button>
        </div> 
                        </form>
                    </div>
                    <div class="" style="margin: 0 20px;
                            flex: 1;">
                        <ul style="max-height: 235px;
                            overflow: scroll;margin-top: 40px;">
                            <li style="display: flex;
                      justify-content: space-between;"><a class="note-list" href="" style="flex: 1.7;">dsf</a>
                                <span style="flex:.3;" class="fs-0-8 text-black-50 ml-1">11 بهمن </span>
                            </li>
                            <li><a href="">sfsf</a></li>
                            <li><a href="">sdf</a></li>
                            <li><a href="">sdfsd</a></li>
                            <li><a href="">sdfsf</a></li>
                            <li><a href="">dsf</a></li>
                            <li><a href="">sfsf</a></li>
                            <li><a href="">sdf</a></li>
                            <li><a href="">sdfsd</a></li>
                            <li><a href="">sdfsf</a></li>
                            <li><a href="">dsf</a></li>
                            <li><a href="">sfsf</a></li>
                            <li><a href="">sdf</a></li>
                            <li><a href="">sdfsd</a></li>
                            <li><a href="">sdfsf</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}

    <main id="main" class="main" data-sidebar>

        @if (auth()->check())
        <a href="#" class="account-icon"><i class="fa fa-user"></i>
        </a>
        <div class="dropdown-content" style="display:none;">
            <div class="menu-wrapper">
                <ul class="menu-list">
                    <li class="menu-item-link">
                        <a href="{{route('Panel.Dashboard',auth()->user()->path())}}" title="داشبورد"
                            aria-label="داشبورد">
                            <svg class="icon icon-dashboard" viewBox="0 0 24 24" 0="" 24="" 24 ""="">
                                <use xlink:href="#si_dashboard">

                                    <g id="si_dashboard" data-viewBox="0 0 24 24">
                                        <path d="M0 0h24v24H0z" fill="none"></path>
                                        <path
                                            d="M19 5v4H4V5h15m0 10v4H4v-4h15m1-12H3a1 1 0 0 0-1 1v6a1 1 0 0 0 1 1h17a1 1 0 0 0 1-1V4a1 1 0 0 0-1-1zm0 10H3a1 1 0 0 0-1 1v6a1 1 0 0 0 1 1h17a1 1 0 0 0 1-1v-6a1 1 0 0 0-1-1z">
                                        </path>
                                    </g>
                                </use>
                            </svg>
                            <div class="content">
                                <span class="text">داشبورد</span>
                            </div>
                        </a>
                    </li>

                    <li class="menu-item-link">
                        <a href="{{route('MyVideos')}}" title="ویدیوهای من" aria-label="ویدیوهای من">
                            <svg class="icon icon-videos" viewBox="0 0 24 24" 0="" 24="" 24 ""="">
                                <use xlink:href="#si_videos">
                                    <g id="si_videos" data-viewBox="0 0 24 24">
                                        <path d="M0 0h24v24H0z" fill="none"></path>
                                        <path
                                            d="M4 6.47L5.76 10H20v8H4V6.47M22 4h-4l2 4h-3l-2-4h-2l2 4h-3l-2-4H8l2 4H7L5 4H4a2 2 0 0 0-1.99 2L2 18a2.006 2.006 0 0 0 2 2h16a2.006 2.006 0 0 0 2-2V4z">
                                        </path>
                                    </g>
                                </use>
                            </svg>
                            <div class="content">
                                <span class="text">ویدیوهای من</span>
                            </div>
                        </a>
                    </li>
                    <li class="menu-item-link">
                        <a href="{{route('Panel.Comments')}}" title="دیدگاه‌ها" aria-label="دیدگاه‌ها">
                            <svg class="icon icon-comments" viewBox="0 0 24 24" 0="" 24="" 24 ""="">
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
                            <div class="content">
                                <span class="text">دیدگاه‌ها</span>
                            </div>
                        </a>
                    </li>


                    <li class="menu-item-link">
                        <a href="{{route('logout')}}" title="خروج از حساب کاربری" aria-label="خروج از حساب کاربری">
                            <svg class="icon icon-logout" viewBox="0 0 24 24" 0="" 24="" 24 ""="">
                                <use xlink:href="#si_logout">
                                    <g id="si_logout" data-viewBox="0 0 24 24">
                                        <path d="M0 0h24v24H0z" fill="none"></path>
                                        <path
                                            d="M13 3h-2v10h2zm4.83 2.17l-1.42 1.42A6.92 6.92 0 0 1 19 12 7 7 0 1 1 7.58 6.58L6.17 5.17A8.992 8.992 0 1 0 21 12a8.932 8.932 0 0 0-3.17-6.83z">
                                        </path>
                                    </g>
                                </use>
                            </svg>
                            <div class="content">
                                <span class="text">خروج از حساب کاربری</span>
                            </div>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        @endif
        <header id="header" class="header">
            <div class="wrapper">
                <div class="header-row">
                    <div class="item">
                        <div class="inline-flex sidebar-toggle">
                            <button type="button"
                                class="button button-medium button-gray button-hollow button-circular sidebar-toggler">
                                <svg class="icon icon-cats" viewBox="0 0 24 24" viewBox="viewBox=" 0 0 24 24 "">
                                    <use xlink:href="#si_cats">
                                        <g id="si_cats" data-viewBox="0 0 24 24">
                                            <path d="M2 15.5v2h20v-2H2zm0-5v2h20v-2H2zm0-5v2h20v-2H2z"></path>
                                            <path d="M0 0h24v24H0z" fill="none"></path>
                                        </g>
                                    </use>
                                </svg>
                            </button>
                        </div>

                    </div>
                    <div class="item">
                        <div class="inline-flex upload-button">
                            <a href="{{route('Main.UploadFile')}}"
                                class="button button-info button-small button-hollow button-bordered upload-video"
                                data-ctr="upload-button" data-ctr-cta="upload-button">
                                <i class="fa fa-plus"></i>
                                <span class="text mr-1">بارگذاری فایل</span></a>
                        </div>
                        <div class="inline-flex live-button" data-responsive="mobile">
                            <a href="/live" class="button button-gray button-medium button-hollow live-button">
                                <svg class="icon icon-live" viewBox="0 0 24 24" viewBox="viewBox=" 0 0 24 24 "">
                                    <use xlink:href="#si_live"></use>
                                </svg> <span class="text">55 </span></a>
                        </div>


                        <div class="inline-flex register-button">
                            @if (!auth()->check())
                            <a href="{{route('Login')}}" class="button button-medium  signin-button">
                                <svg class="icon icon-user" viewBox="0 0 24 24" 0="" 24="" 24 ""="">
                                    <use xlink:href="#si_user">
                                        <g id="si_user" data-viewBox="0 0 24 24">
                                            <path d="M0 0h24v24H0z" fill="none"></path>
                                            <path
                                                d="M12 6a2 2 0 1 1-2 2 2.006 2.006 0 0 1 2-2m0 10c2.7 0 5.8 1.29 6 2H6c.23-.72 3.31-2 6-2m0-12a4 4 0 1 0 4 4 4 4 0 0 0-4-4zm0 10c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z">
                                            </path>
                                        </g>
                                    </use>
                                </svg> <span class="text">ورود یا ثبت نام</span></a>



                            @endif
                        </div>
                    </div>
                </div>


                <div class="search-widget" data-suggest-url="/search_suggestion">
                    <div class="input-text">
                        <div class="input-inner">

                            <input class="input" type="search" id="" value="" name="search"
                                placeholder="مطلب مورد نظر خود را جست و جو کنید..." autocomplete="off" />

                            <div class="input-box input-round"></div>
                        </div>
                        <button type="submit" id=searchIcon
                            class="button button-small button-gray button-hollow button-circular end-icon search-icon">
                            <svg class="icon icon-search" viewBox="0 0 24 24" viewBox="viewBox=" 0 0 24 24 "">
                                <use xlink:href="#si_search">
                                    <g id="si_search" data-viewBox="0 0 24 24">
                                        <path
                                            d="M15.5 14h-.79l-.28-.27a6.51 6.51 0 1 0-.7.7l.27.28v.79l5 4.99L20.49 19zm-6 0A4.5 4.5 0 1 1 14 9.5 4.494 4.494 0 0 1 9.5 14z">
                                        </path>
                                        <path d="M0 0h24v24H0z" fill="none"></path>
                                    </g>
                                </use>
                            </svg>
                        </button>
                    </div>
                    <div id="suggestions" class="search-suggestion">

                        <div id="suggestionContent" class="suggestion-content">
                            <div class="loading loading-aparat">
                                <div class="inner">
                                    <svg class="icon icon-inner">
                                        <use xlink:href="#si_loading-inner"></use>
                                    </svg>
                                    <svg class="icon icon-outer">
                                        <use xlink:href="#si_loading-outer"></use>
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <a href="#" class="search-overlay"></a>
            </div>
        </header>


        <aside id="sidebar" class="sidebar">

            <div class="sidebar-inner" data-simplebar data-simplebar-direction=rtl>
                <div class="sidebar-toggle">
                    <div class="toggle">
                        <button type="button"
                            class="button button-medium button-gray button-hollow button-circular sidebar-toggler">
                            <svg class="icon icon-cats" viewBox="0 0 24 24" viewBox="viewBox=" 0 0 24 24 "">
                                <use xlink:href="#si_cats"></use>
                            </svg>
                        </button>
                    </div>
                    <div class="logo">
                        <a href="https://www.aparat.com" title="آپارات - سرویس اشتراک ویدیو"
                            aria-label="آپارات - سرویس اشتراک ویدیو">
                            <svg class="icon icon-logo-fa logo-brand sidebar-logo" viewBox="0 0 90 31.89"
                                viewBox="viewBox=" 0 0 90 31.89 "">
                                <use xlink:href="#si_logo-fa"></use>
                            </svg></a>
                    </div>
                </div>


                <div id=1 class="menu-wrapper main-list">
                    <ul class="menu-list">
                      
                        <li class="menu-item-link active">
                            <a href="{{route('BaseUrl')}}" aria-label="صفحه نخست">
                                <svg class="icon icon-home" viewBox="0 0 24 24" viewBox="viewBox=" 0 0 24 24 "">
                                    <use xlink:href="#si_home"></use>
                                </svg>
                                <div class="content">
                                    <span class="text">صفحه نخست</span>
                                </div>
                            </a>
                        </li>
                        @if (auth()->check())
                        <li class="menu-item-link ">
                         <a href="{{route('User.Show',auth()->user()->username)}}" aria-label="پروفایل من">
                             <svg class="icon icon-home" viewBox="0 0 24 24" viewBox="viewBox=" 0 0 24 24 "">
                                 <use xlink:href="#si_home"></use>
                             </svg>
                             <div class="content">
                                 <span class="text">پروفایل من</span>
                             </div>
                         </a>
                     </li>
                        @endif
                        {{-- <li class="menu-item-link ">
                        <a href="{{route('Panel.MyFavorites')}}" aria-label="صفحه نخست"><svg class="icon icon-home"
                            viewBox="0 0 24 24" viewBox="viewBox=" 0 0 24 24"">
                            <use xlink:href="#si_home"></use>
                        </svg>
                        <div class="content">
                            <span class="text">ویدیوهای دنبال شوندگان</span>
                        </div>
                        </a>
                        </li> --}}
                        <li class="menu-item-link ">
                            <a href="{{route('Panel.MyFavorites')}}" aria-label="علاقه مندی ها">
                                <svg class="icon icon-home" viewBox="0 0 24 24" viewBox="viewBox=" 0 0 24 24 "">
                                    <use xlink:href="#si_home"></use>
                                </svg>
                                <div class="content">
                                    <span class="text">علاقه مندی ها</span>
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>
                <div id=2 class="menu-wrapper categories menu-more">
                    <h3 class="menu-title">دسته‌بندی‌ها</h3>
                    <ul class="menu-list">
                        @foreach($categories as $category)
                        <li class="menu-item-link">
                            <a href="{{route('Category',['slug'=>$category->latin_name])}}" onmousedown=""
                                aria-label="{{$category->name}}">
                                <svg class="icon icon-film" viewBox="0 0 24 24" viewBox="viewBox=" 0 0 24 24 "">
                                    <use xlink:href="#si_film"></use>
                                </svg>
                                <div class="content">
                                    <span class="text">{{$category->name}}</span>
                                </div>
                            </a>
                        </li>
                        @endforeach
                        <li class="menu-item-link menu-show-more">
                            <a href="#" title="نمایش بیشتر" aria-label="نمایش بیشتر">
                                <svg class="icon icon-down" viewBox="0 0 24 24" viewBox="viewBox=" 0 0 24 24 "">
                                    <use xlink:href="#si_down"></use>
                                </svg> <span class="content">نمایش بیشتر</span></a>
                        </li>
                    </ul>
                </div>
                @if (\Request::route()->getName() == "Category")

                <div id="sizes" class="menu-item-link menu-wrapper refinement-group-wrapper">
                    <h3 class="menu-title">فیلتربندی</h3>
                    <div class="col-10 position-relative">
                        <input type="text" class="form-control search-field">
                        <span class="filter-search"><i class="fa fa-search"></i></span>
                    </div>
                    <div class="refinement-group mb-3 text-right pr-3">

                        <a class="d-block" type="" data-toggle="collapse" data-target="#collapseExample4"
                            aria-expanded="true" aria-controls="collapseExample">
                            <i class=" ml-1 fa fa-caret-down position-absolute  " style="left: 5%;"></i>

                            <span class="menu-title text-dark"> زبان</span>
                        </a>
                        <div class="collapse" id="collapseExample4">
                            <div class="form-group menu-title text-black-50">
                                @foreach ($langs as $lang)
                                <div class="custom-control custom-checkbox">
                                    <input data-name="{{$lang->name}}" type="checkbox" class="custom-control-input"
                                        value="{{$lang->id}}" name="lang[]" id="{{$lang->name}}">
                                    <label class="custom-control-label" for="{{$lang->name}}">{{$lang->name}}</label>
                                </div>
                                @endforeach
                            </div>

                        </div>

                    </div>
                    <div class="refinement-group mb-3 text-right pr-3">

                        <a class="d-block" type="" data-toggle="collapse" data-target="#collapseExample3"
                            aria-expanded="true" aria-controls="collapseExample">
                            <i class=" ml-1 fa  fa-caret-down position-absolute  " style="left: 5%;"></i>

                            <span class="menu-title text-dark"> موضوع</span>
                        </a>
                        <div class="collapse" id="collapseExample3">
                            <div class="form-group menu-title text-black-50">
                                @foreach ($subjects as $subject)
                                <div class="custom-control custom-checkbox">
                                    <input data-name="{{$subject->name}}" type="checkbox" class="custom-control-input"
                                        value="{{$subject->id}}" name="subject[]" id="{{$subject->name}}">
                                    <label class="custom-control-label"
                                        for="{{$subject->name}}">{{$subject->name}}</label>
                                </div>
                                @endforeach


                            </div>

                        </div>

                    </div>
                    <div class="refinement-group mb-3 text-right pr-3">

                        <a class="d-block" type="" data-toggle="collapse" data-target="#collapseExample5"
                            aria-expanded="true" aria-controls="collapseExample">
                            <i class=" ml-1 fa fa-caret-down position-absolute  " style="left: 5%;"></i>

                            <span class="menu-title text-dark"> سطح علمی</span>
                        </a>
                        <div class="collapse" id="collapseExample5">
                            <div class="form-group menu-title text-black-50">
                                @foreach ($levels as $level)
                                <div class="custom-control custom-checkbox">
                                    <input data-name="{{$level->name}}" type="checkbox" class="custom-control-input"
                                        value="{{$level->id}}" name="level[]" id="{{$level->name}}">
                                    <label class="custom-control-label" for="{{$level->name}}">{{$level->name}}</label>
                                </div>
                                @endforeach


                            </div>

                        </div>

                    </div>

                </div>
                @endif

                <div id="6" class="menu-wrapper footer">

                    <ul class="menu-list-pages">
                        <li class="menu-item-link">
                            <a href="{{route('Policies','s')}}" aria-label="قوانین">
                                <div class="content">
                                    <span class="text">قوانین</span>
                                </div>
                            </a>
                        </li>
                        <li class="menu-item-link">
                            <a href="#" aria-label="تبلیغات">
                                <div class="content">
                                    <span class="text">تبلیغات</span>
                                </div>
                            </a>
                        </li>
                        <li class="menu-item-link">
                        <a href="{{route('ContactUs')}}" aria-label="تماس با ما">
                                <div class="content">
                                    <span class="text">تماس با ما</span>
                                </div>
                            </a>
                        </li>

                        <li class="menu-item-link">
                            <a href="{{route('Channels.List')}}" aria-label="کانال های رسمی">
                                <div class="content">
                                    <span class="text">کانال های رسمی</span>
                                </div>
                            </a>
                        </li>


                        <li class="menu-item-link">
                            <a href="#" aria-label="سوالات متداول">
                                <div class="content">
                                    <span class="text">سوالات متداول</span>
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>

            </div>
            <div class="sidebar-overlay"></div>
        </aside>


        <div id="" class="container">
            <div class="view">

                @yield('content')


                <div class="">
                    <ul class="side-function">
                        <li class="side-contact"><a href="#" class="note-link" rel="nofollow"><i
                                    class="fa fa-pencil fs-2"></i></a>

                        </li>


                    </ul>

                </div>
            </div>
        </div>


    </main>


    <script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('assets/js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('assets/js/scripts.js')}}"></script>
    <script src="{{route('BaseUrl')}}/assets/js/app.js"></script>
    <script src="{{asset('assets/js/wow.min.js')}}"></script>
    <script src="{{asset('assets/js/toastr.min.js')}}"></script>
    @toastr_render
    <script>
        new WOW().init();
    </script>
    <script>
        $(document).ready(function () {
        var checkauth = '{{auth()->user()}}';
        $('.note-link').click(function(e){
            e.preventDefault()
        })
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        var swiper = new Swiper('.swiper-container1', {
            spaceBetween: 5,
            nextButton: '.swiper-p',
            prevButton: '.swiper-n',
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
        var swiper = new Swiper('.swiper-container2', {

            spaceBetween: 5,
            nextButton: '.swiper-ani-p',
            prevButton: '.swiper-ani-n',
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
        var learning_slider = new Swiper('.swiper-container-learning', {

            spaceBetween: 5,
            pagination: '.swiper-pagination',
            paginationClickable: true,
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
        var music_slider = new Swiper('.swiper-container-music', {

            spaceBetween: 5,
            pagination: '.swiper-pagination',
            paginationClickable: true,
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
        var baner_slider = new Swiper('.swiper-container-banner', {
            spaceBetween: 30,
            effect: 'fade',
            autoplay: 2500,
            autoplayDisableOnInteraction: false
        });


        $('.account-icon').click(function (e) {
            e.preventDefault()
            $('.dropdown-content').fadeToggle(200)
        })

        $(document).on('click', function (e) {
            if ($(e.target).closest(".account-icon").length == 0 && $(e.target).closest(".dropdown-content").length == 0) {
                $('.dropdown-content').fadeOut(200)
            }
        })

        $('.button__').click(function (e) {
            e.preventDefault()
            let parent_id = $(this).data('id')
            $('#parent_id').attr('value', parent_id)
            $('.overlay1').css({
                'visibility': 'visible',
                'opacity': '1',
                'z-index': '10',
            })
        })
        $('.report-btn').click(function (e) {
            e.preventDefault()

            $('#parent_id').attr('value', parent_id)
            $('.overlay.report').css({
                'visibility': 'visible',
                'opacity': '1',
                'z-index': '10',
            })
        })
        $('.close').click(function (e) {
            e.preventDefault()
            $('.overlay1').css({
                'visibility': 'hidden',
                'opacity': '0', 'z-index': '0'
            })
            $('.overlay2').css({
                'visibility': 'hidden',
                'opacity': '0', 'z-index': '0'
            })
            $('.overlay.report').css({
                'visibility': 'hidden',
                'opacity': '0', 'z-index': '0'
            })
            $('.overlay.note').css({
                'visibility': 'hidden',
                'opacity': '0', 'z-index': '0'
            })
        })
        $('#shareinmedia').click(function (e) {
            e.preventDefault()
            let parent_id = $(this).data('id')

            $('.overlay2').css({
                'visibility': 'visible',
                'opacity': '1',
                'z-index': '10',
            })
        })

        $('.follow-link').on('click', function (e) {
            e.preventDefault();

            if (checkauth) {
                let id = $(this).data('id')
                let thiss = $(this)
                $.ajax({
                    url: '{{route('User.Follow')}}',
                    type: 'POST',
                    data: {id: id},
                    dataType: 'JSON',
                    cache: false,
                    success: function (res) {
                        if (res == 'follow') {
                            thiss.text('دنبال میکنید')
                            thiss.addClass('followed')
                        }
                        if (res == 'unfollow') {
                            thiss.html(`<i class="fa fa-plus"></i> <span class="text">دنبال کردن</span>`)
                            thiss.removeClass('followed')
                        }

                    }
                });
            } else {
                window.location.href = "{{route("login")}}"
            }
        });


        function ajaxlike(id, url) {
          
                $.ajax({
                    url: url,
                    type: 'POST',
                    data: {id: id},
                    dataType: 'JSON',
                    cache: false,
                    success: function (res) {
                        $('#like-post span').text(res)
                    }
                });
           
        }

        $('#like-post').click(function (e) {
            e.preventDefault();
            if (checkauth) {
                let url = '{{route("LikePost")}}';
                let post_id = $(this).data('id')
                ajaxlike(post_id, url);
            } else {
                window.location.href = "{{route("login")}}"
            }

        })

        $('.favorite-post').click(function (e) {
            e.preventDefault();
            if (checkauth) {
                
                let thiss = $(this)

                let url = '{{route("AddFavorite")}}';
                let id = $(this).data('id')
                $.ajax({
                    url: url,
                    type: 'POST',
                    data: {id: id},
                    dataType: 'JSON',
                    cache: false,
                    success: function (res) {
                        if (res == 'add') {
                            thiss.find('svg').attr('fill', 'red')
                        }
                        if (res == 'remove') {
                            thiss.find('svg').attr('fill', 'gray')
                        }
                    }

                });
            } else {
                window.location.href = "{{route("login")}}"
            }
        })

        $('.like-comment').click(function (e) {
            e.preventDefault();
            if (checkauth) {
               

                let thiss = $(this)
                let url = '{{route("LikeComment")}}';
                ;
                let id = $(this).data('id')
                $.ajax({
                    url: url,
                    type: 'POST',
                    dataType: 'JSON',
                    cache: false,
                    data: {id: id},
                    dataType: 'JSON',
                    cache: false,
                    success: function (res) {
                        thiss.find('span').text(res)
                    }

                });
            } else {
                window.location.href = "{{route("login")}}"

            }

        })
        $('.dislike-comment').click(function (e) {
            e.preventDefault();
            if (checkauth) {
              


                let thiss = $(this)
                let url = '{{route("DisLikeComment")}}';
                ;
                let id = $(this).data('id')
                $.ajax({
                    url: url,
                    type: 'POST',
                    dataType: 'JSON',
                    cache: false,
                    data: {id: id},
                    dataType: 'JSON',
                    cache: false,
                    success: function (res) {
                        thiss.find('span').text(res)
                    }

                })
            } else {
                window.location.href = "{{route("login")}}"

            }

        })


    })


    </script>
    @yield('js')
</body>

</html>