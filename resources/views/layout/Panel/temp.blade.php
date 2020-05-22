<!DOCTYPE html>
<html lang="fa">

<head>
    <meta charset="utf-8">
   @if (auth()->user()->is_admin())
   <title>
    ژن برتر - پنل ادمین
</title>   
   @else 
   <title>
    ژن برتر - پنل کاربری
</title>   
   @endif
    <!-- UA-153829- -->
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta http-equiv="content-language" content="fa" />
    <meta name="csrf-token" content="{{csrf_token()}}">
    <link rel="stylesheet" href="{{route('BaseUrl')}}/Panel/vendor/FontAwesome/all.css">
    <link rel="stylesheet" href="{{route('BaseUrl')}}/Panel/vendor/themify/themify-icons.css">
    <link rel="stylesheet" href="{{asset('Panel/vendor/dataTable/responsive.bootstrap.min.css')}}">
    <script src="{{asset('assets/js/jquery-3.4.1.js')}}"></script>
    <script src="{{asset('assets/js/simplebar.min.js')}}"></script>
    <script src="{{asset('assets/js/simple-scrollbar.min.js')}}"></script>
    <link rel="stylesheet" href=" {{asset('Panel/assets/css/app.css')}} ">
    <link rel="stylesheet" href="{{route('BaseUrl')}}/assets/css/toastr.css">
    <link rel="stylesheet" href="{{route('BaseUrl')}}/assets/css/mdb.min.css">
    <link rel="stylesheet" href="{{route('BaseUrl')}}/assets/css/stylemusic.css">
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}" />
    <link rel="stylesheet" href=" {{asset('Panel/assets/css/RTL.css')}} ">
    <link rel="stylesheet" href="{{asset('assets/css/dashboard.css')}}" />
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    {{-- <script src="{{route('BaseUrl')}}/Pannel/assets/js/examples/sweet-alert.js"></script> --}}
    @yield('css')
    <script>
        var isMobile = false;
    </script>
</head>
<body class="device-desktop theme-light">
    <div class="load-progress hidden">
        <div class="bar"></div>
    </div>
    <main id="main" class="main" data-sidebar>
        <header id="header" class="header">
            <div class="wrapper">
                <div class="header-row">
                    <div class="item">
                        <div class="inline-flex sidebar-toggle">
                            <button type="button"
                                class="button button-medium button-gray button-hollow button-circular sidebar-toggler">
                                <svg class="icon icon-cats" viewBox="0 0 24 24" viewBox="viewBox=" 0 0 24 24"">
                                    <use xlink:href="#si_cats">
                                        <g id="si_cats" data-viewBox="0 0 24 24">
                                            <path d="M2 15.5v2h20v-2H2zm0-5v2h20v-2H2zm0-5v2h20v-2H2z"></path>
                                            <path d="M0 0h24v24H0z" fill="none"></path>
                                        </g>
                                    </use>
                                </svg>
                            </button>

                            <a href="{{route('BaseUrl')}}" class="mr-3 pt-1 ">
                            <img src="{{asset('assets/images/Logo-genebartar.png')}}" width="52px;" alt="">
                            </a>
                        </div>
                    </div>
                    <div class="item">
                    @if(auth()->user()->group=='teacher')
                        <div class="inline-flex upload-button">
                            <a
                                class="button button-info button-small button-hollow button-bordered upload-video"
                                data-ctr="upload-button" data-ctr-cta="upload-button">
                                <span class="text mr-1">موجودی کیف پول: {{auth()->user()->wallet}}</span></a>
                        </div>
                        @endif
                        <div class="inline-flex upload-button">
                            
                            <a href="{{route('UploadFile')}}"
                                class="button button-info button-small button-hollow button-bordered upload-video"
                                data-ctr="upload-button" data-ctr-cta="upload-button">
                                <i class="fa fa-plus"></i>
                                <span class="text mr-1">بارگذاری فایل</span></a>
                        </div>
                        <div class="inline-flex ">
                            <div id="" class="dropdown">
                                <div class="dropdown-toggle"><a href="#" style="z-index: 2"
                                        class="button button-gray button-medium button-hollow button-circular notif-link"><svg
                                            class="icon icon-notifications" viewBox="0 0 24 24" 0="" 24="" 24""="">
                                            <use xlink:href="#si_notifications">
                                                <g id="si_notifications" data-viewBox="0 0 24 24">
                                                    <path d="M0 0h24v24H0z" fill="none"></path>
                                                    <path
                                                        d="M12 22a2.006 2.006 0 0 0 2-2h-4a2.006 2.006 0 0 0 2 2zm6-6v-5c0-3.07-1.63-5.64-4.5-6.32V4a1.5 1.5 0 0 0-3 0v.68C7.64 5.36 6 7.92 6 11v5l-2 2v1h16v-1zm-2 1H8v-6c0-2.48 1.51-4.5 4-4.5s4 2.02 4 4.5z">
                                                    </path>
                                                </g>
                                            </use>
                                        </svg>
                                    </a>
                                    @if ($notystatus)
                                    <span class="position-absolute noty-icon"> <i
                                            class="fa fa-exclamation-circle text-danger"></i>
                                    </span>
                                    @endif
                                </div>
                                <div class="dropdown-content">
                                    <div id="notification " class="d-b  pt-2">
                                        <ul class="ul">
                                            @foreach ($notifications as $notification)
                                            <li>
                                                <div class=" d-flex flex-column flex-sm-wrap mb-2">
                                                    <span class="mr-1 fs-0-8 d-flex justify-content-between">
                                                        <span class="text-info">{{$notification->title}}
                                                        </span>
                                                        <span>{{\Morilog\Jalali\Jalalian::forge($notification->created_at)->format('%d %B %Y')}}</span>
                                                        @if ($notification->read == 0)
                                                        <a href="#" data-id="{{$notification->id}}"
                                                            class="noty-link text-white mdb-color lighten-2 px-1 radius-5 ml-1">فهمیدم</a>
                                                        @endif
                                                    </span>
                                                    <span class="mr-1 fs-0-8 ">
                                                        <span>{!!$notification->text!!}</span>
                                                    </span>
                                                </div>
                                            </li>
                                            @endforeach
                                        </ul>
                                    </div>
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
                            <svg class="icon icon-cats" viewBox="0 0 24 24" viewBox="viewBox=" 0 0 24 24"">
                                <use xlink:href="#si_cats"></use>
                            </svg>
                        </button>
                    </div>
                    <div class="logo">
                        <a href="#" title=""
                            aria-label=""><svg
                                class="icon icon-logo-fa logo-brand sidebar-logo" viewBox="0 0 90 31.89"
                                viewBox="viewBox=" 0 0 90 31.89"">
                                <use xlink:href="#si_logo-fa"></use>
                            </svg></a>
                    </div>
                </div>


                <section class="top pt-3">

                    <div class="avatar">

                        @if (auth()->user()->avatar)
                        <a href="{{route('Panel.Dashboard')}}?u={{auth()->user()->username}}" class="picture image">
                            <div class=" avatar-img"
                                style="background-image: url({{route('BaseUrl')}}/{{auth()->user()->avatar}})">
                            </div>
                        </a>
                        @else
                        <a href="{{route('Panel.Dashboard')}}?u={{auth()->user()->username}}" class="picture image">
                            <div class=" avatar-img"
                                style="background-image: url({{asset('assets/images/avatar.png')}})">
                            </div>
                        </a>
                        @endif


                    </div>
                    <a href="#" title="آپارات - سرویس اشتراک ویدیو" class="username mt-2"><span
                            class="text">{{auth()->user()->firstname .' '.auth()->user()->lastname }}</span></a>
                </section>
                <div class="menu-wrapper categories ">

                    <ul class="menu-list">
                        <li class="menu-item-link">
                            <a href="{{route('Panel.Dashboard')}}" aria-label="سریال و فیلم‌های سینمایی"><svg
                                    class="icon icon-dashboard" viewBox="0 0 24 24" 0="" 24="" 24""="">
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
                                    <span class="text">داشبورد </span>
                                </div>
                            </a>
                        </li>

                        @if (auth()->user()->is_mid_admin())
                        <li class="menu-item-link d-flex flex-column">
                            <a class="menu-link position-relative" aria-label=""><i
                                    class="ti ti-files fs-1-5 text-black-50 ml-3"></i>
                                <div class="content">
                                    <span class="text">پست ها 
                                        @if (\App\Models\Contents\Posts::where('confirmed',0)->count())
                                        <span class="fs-0-8 text-danger pr-2 fw-500">جدید</span>
                                        @endif
                                    </span>
                                </div>
                                <i class="sub-menu-arrow ti-angle-left "></i>
                            </a>
                            <ul class="sub-menu" style="display:none;">
                          <li class="menu-item-link mr-35">
                                    <a href="{{route('Panel.Posts.Unconfirmed')}}" aria-label="">
                                        <div class="content">
                                            <span class="text">پست های پیش نویس</span>
                                        </div>
                                    </a>
                                </li>
                                <li class="menu-item-link mr-35">
                                    <a href="{{route('Panel.Comments.All')}}" aria-label="">
                                        <div class="content">
                                            <span class="text">کامنت ها</span>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        @endif

                        @if (auth()->user()->is_admin())
                        <li class="menu-item-link d-flex flex-column">
                            <a class="menu-link position-relative" aria-label=""><i
                                    class="ti ti-files fs-1-5 text-black-50 ml-3"></i>
                                <div class="content">
                                    <span class="text">پست ها 
                                        @if (\App\Models\Contents\Posts::where('confirmed',0)->count())
                                        <span class="fs-0-8 text-danger pr-2 fw-500">جدید</span>
                                        @endif
                                    </span>
                                </div>
                                <i class="sub-menu-arrow ti-angle-left "></i>
                            </a>
                            <ul class="sub-menu" style="display:none;">
                                <li class="menu-item-link mr-35">
                                    <a href="{{route('Panel.Posts.All')}}" aria-label="">
                                        <div class="content">
                                            <span class="text">لیست پست ها</span>
                                        </div>
                                    </a>
                                </li>
                                <li class="menu-item-link mr-35">
                                    <a href="{{route('Panel.Posts.Unconfirmed')}}" aria-label="">
                                        <div class="content">
                                            <span class="text">پست های پیش نویس</span>
                                        </div>
                                    </a>
                                </li>
                                <li class="menu-item-link mr-35">
                                    <a href="{{route('Panel.Comments.All')}}" aria-label="">
                                        <div class="content">
                                            <span class="text">کامنت ها</span>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li class="menu-item-link d-flex flex-column">
                            <a class="menu-link position-relative" href="#" aria-label="کاربران"><i
                                    class="ti ti-user fs-1-5 text-black-50 ml-3"></i>
                                <div class="content">
                                    <span class="text">کاربران</span>
                                </div>
                                <i class="sub-menu-arrow ti-angle-left "></i>
                            </a>
                            <ul class="sub-menu" style="display: none;">
                                <li class="menu-item-link mr-35">
                                    <a href="{{route('Panel.Members')}}" aria-label="لیست کاربران">
                                        <div class="content">
                                            <span class="text">لیست کاربران</span>
                                        </div>
                                    </a>
                                </li>
                                {{-- <li class="menu-item-link mr-35">
                                    <a href="{{route('Message.All')}}" aria-label="پیام های کاربران">
                                        <div class="content">
                                            <span class="text">پیام های کاربران</span>
                                        </div>
                                    </a>
                                </li> --}}
                                 <li class="menu-item-link mr-35">
                                    <a href="{{route('Channel.Requested.All')}}" aria-label="درخواست کانال رسمی">
                                        <div class="content">
                                            <span class="text">درخواست کانال رسمی

                                                @if (\App\Models\Members\ChannelInformations::where('accepted',1)->count())
                                                <span class="fs-0-8 text-danger fw-500">جدید</span>
                                                @endif
                                            </span>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="menu-item-link d-flex flex-column">
                            <a class="menu-link position-relative" href="#" aria-label=""><i
                                    class="ti ti-list fs-1-5 text-black-50 ml-3"></i>
                                <div class="content">
                                    <span class="text">محتوا</span>
                                </div>
                                <i class="sub-menu-arrow ti-angle-left "></i>
                            </a>
                            <ul class="sub-menu" style="display: none;">
                                <li class="menu-item-link mr-35">
                                    <a href="{{route('Panel.SlideShow.All')}}" aria-label="اسلایدشو">
                                        <div class="content">
                                            <span class="text">اسلایدشو</span>
                                        </div>
                                    </a>
                                </li>
                                <li class="menu-item-link mr-35">
                                    <a href="{{route('Panel.BannerPost')}}" aria-label="پست ویژه">
                                        <div class="content">
                                            <span class="text">پست ویژه</span>
                                        </div>
                                    </a>
                                </li>
                                <li class="menu-item-link mr-35">
                                    <a href="{{route('Panel.Policies')}}" aria-label="قوانین">
                                        <div class="content">
                                            <span class="text">قوانین</span>
                                        </div>
                                    </a>
                                </li>
                                <li class="menu-item-link mr-35">
                                    <a href="{{route('Panel.ContactUs')}}" aria-label="تماس با ما">
                                        <div class="content">
                                            <span class="text">تماس با ما</span>
                                        </div>
                                    </a>
                                </li>
                                <li class="menu-item-link mr-35">
                                    <a href="{{route('Panel.Advert')}}" aria-label="تبلیغات">
                                        <div class="content">
                                            <span class="text">صفحه تبلیغات</span>
                                        </div>
                                    </a>
                                </li>
                                <li class="menu-item-link mr-35">
                                    <a href="{{route('Panel.Content.AdvertList')}}" aria-label="مدیریت تبلیغات">
                                        <div class="content">
                                            <span class="text">مدیریت تبلیغات</span>
                                        </div>
                                    </a>
                                </li>
                                <li class="menu-item-link mr-35">
                                    <a href="{{route('Panel.Testimonials')}}" aria-label="سوالات متداول">
                                        <div class="content">
                                            <span class="text">سوالات متداول</span>
                                        </div>
                                    </a>
                                </li>
                                {{-- <li class="menu-item-link mr-35">
                                    <a href="{{route('Panel.ContactUs')}}" aria-label="">
                                <div class="content">
                                    <span class="text">درآمدزایی</span>
                                </div>
                                </a>
                        </li> --}}
                        @if (auth()->user()->approved == 1 || auth()->user()->group == "admin")
                          <li class="menu-item-link  mr-35">
                            <a href="{{route('AddAboutUs')}}" aria-label="">
                                <div class="content">
                                    <span class="text">اضافه کردن متن درباره ما</span>
                                </div>
                            </a>
                         </li>
                         @endif
                    </ul>
                    </li>

                    <li class="menu-item-link">
                        <a href="{{route('Post.Report.All')}}" aria-label="" style="padding-right: 37px;"><i
                                class="fas fa-exclamation fs-1-5 text-black-50 ml-3"></i>
                            <div class="content">
                                <span class="text">گزارش های تخلف</span>
                            </div>
                        </a>
                    </li>

                    <li class="menu-item-link">
                        <a href="{{route('Purchase.All')}}" aria-label=""><i
                                class="ti ti-money fs-1-5 text-black-50 ml-3"></i>
                            <div class="content">
                                <span class="text">دوره های خریداری شده</span>
                            </div>
                        </a>
                    </li>
                    <li class="menu-item-link">
                        <a href="{{route('Panel.Setting')}}" aria-label=""><i
                                class="fas fa-cog fs-1-5 text-black-50 ml-3"></i>
                            <div class="content">
                                <span class="text">تنظیمات</span>
                            </div>
                        </a>
                    </li>
                    <li class="menu-item-link">
                        <a style="padding-right: 31px;" href="{{route('Accounting.Transactions')}}" aria-label="تراکنش های من">
                        
                            <i
                            class="fas fa-dollar-sign fs-1-5 text-black-50 ml-3"></i>
                            <div class="content">
                                <span class="text">تراکنش های من</span>
                            </div>
                        </a>
                    </li>
                    <li class="menu-item-link">
                        <a style="padding-right: 24px;" href="{{route('Panel.Checkout')}}" aria-label="تسویه حساب با اساتید">
                            
                            <i
                            class="fas fa-hand-holding-usd fs-1-2 text-black-50 ml-3"></i>
                            <div class="content">
                                <span class="text">تسویه حساب با اساتید</span>
                            </div>
                        </a>
                    </li>
                    @endif

                    @if (auth()->user()->group == 'teacher' || auth()->user()->group == 'student')
                    <li class="menu-item-link">
                        <a href="{{route('MyVideos')}}" aria-label="کارتون"><svg class="icon icon-videos"
                                viewBox="0 0 24 24" 0="" 24="" 24""="">
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
                                <span class="text">فایل های ویدیویی من</span>
                            </div>
                        </a>
                    </li>
                    <li class="menu-item-link">
                        <a href="{{route('MyAudios')}}" aria-label=""><i
                                class="fa fa-music fs-1-2 text-black-50 ml-3"></i>
                            <div class="content">
                                <span class="text">فایل های صوتی من</span>
                            </div>
                        </a>
                    </li>
                    <li class="menu-item-link">
                        <a href="{{route('MyTutorials')}}" aria-label=""><i
                                class="ti ti-book fs-1-5 text-black-50 ml-3"></i>
                            <div class="content">
                                <span class="text">دوره های آموزشی من</span>
                            </div>
                        </a>
                    </li>
                    {{-- <li class="menu-item-link">
                        <a href="{{route('UnsubscribeFiles')}}" aria-label=""><i
                                class="ti ti-na fs-1-5 text-black-50 ml-3"></i>
                            <div class="content">
                                <span class="text">فایل های منتشر نشده</span>
                            </div>
                        </a>
                    </li> --}}
                    <li class="menu-item-link">
                        <a href=" {{route('Panel.Comments')}} " aria-label="گیم"><svg class="icon icon-comments"
                                viewBox="0 0 24 24" 0="" 24="" 24""="">
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
                                <span class="text">دیدگاه‌های من</span>
                            </div>
                        </a>
                    </li>
                    <li class="menu-item-link">
                        <a href="{{route('Panel.MyFavorites')}} " aria-label="">
                            <div class="content d-flex align-items-center"><i
                                    class="ti ti-tag fs-1-5 text-black-50 ml-3"></i>
                                <span class="text">علاقه مندی ها</span>
                            </div>
                        </a>
                    </li>
                    <li class="menu-item-link">
                        <a href="{{route('Message.My')}}" aria-label=""><i
                                class="ti ti-layout-media-overlay fs-1-5 text-black-50 ml-3"></i>
                            <div class="content">
                                <span class="text">پیام های من

                                    @if (\App\Models\Members\Messages::where('recived_id',auth()->user()->id)->where('read',0)->count())
                                    <span class="fs-0-8 text-danger fw-500">جدید</span>
                                    @endif
                                </span>
                            </div>
                        </a>
                    </li>
                    <li class="menu-item-link">
                        <a href="{{route('Purchase.My')}}" aria-label=""><i
                                class="ti ti-info fs-1-5 text-black-50 ml-3"></i>
                            <div class="content">
                                <span class="text">لیست خرید ها</span>
                            </div>
                        </a>
                    </li>
   
                    @endif
                    
                    <li class="menu-item-link">
                        <a href="{{route('Panel.MyFollowers')}}" aria-label="گیم">
                            <i class="fa fa-users text-black-50 ml-3"></i>
                            <div class="content">
                                <span class="text">دنبال کننده ها</span>
                            </div>
                        </a>
                    </li>
                   
                    @if (auth()->user()->group == 'teacher')
                    <li class="menu-item-link">
                        <a style="padding-right: 20px;" href="{{route('Request.Channel')}}" aria-label="تقاضای کانال رسمی">
                        
                            <i
                                class="fas fa-user-check fs-1-5 text-black-50 ml-3"></i>
                            <div class="content">
                                <span class="text">تقاضای کانال رسمی</span>
                            </div>
                        </a>
                    </li>
                    <li class="menu-item-link">
                        <a href="{{route('Accounting.Transactions')}}" aria-label=""><i
                        class="ti ti-money fs-1-5 text-black-50 ml-3"></i>
                            <div class="content">
                                <span class="text">تراکنش های من</span>
                            </div>
                        </a>
                    </li>
                    @endif
                   
                    <li class="menu-item-link">
                        <a href="{{route('Profile')}}" aria-label=""><i
                                class="fas fa-user fs-1-5 text-black-50 ml-3"></i>
                            <div class="content">
                                <span class="text">ویرایش پروفایل</span>
                            </div>
                        </a>
                    </li>
                   
                    <li class="menu-item-link">
                        <a href="{{route('logout')}}" aria-label=""><svg class="icon icon-logout" viewBox="0 0 24 24"
                                0="" 24="" 24""="">
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
            <div class="sidebar-overlay"></div>
        </aside>
        <div id="container" class="container">
            <div class="view">
                <div class="container-fluid">

                    <main class="mt-5">
                        @yield('content')
                    </main>
                </div>
            </div>

        </div>

        </div>
        </div>
    </main>
    <script src="{{asset('assets/js/app.js')}}"></script>
    <script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
    <script src="{{route('BaseUrl')}}/Panel/assets/js/jquery.validate.js"></script>
    <script src="{{asset('Panel/vendor/dataTable/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('Panel/vendor/dataTable/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('Panel/vendor/dataTable/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('Panel/assets/js/datatable.js')}}"></script>
    <script src="{{asset('assets/js/toastr.min.js')}}"></script>
    @toastr_render
    <script src="{{asset('Panel/assets/js/custom.js')}}"></script>
    <script>
        $('.noty-link').click(function(e){
        e.preventDefault()
        let id = $(this).data('id')
       var thiss = $(this)
       
       if ($(this).parents('ul').children().length == 1) {
           $(this).parents('.dropdown-content').remove()
       }
        $.ajaxSetup({
            headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
          });
        $.ajax({
            url: '{{route("Noty.Read")}}',
            type: 'POST',
            data:{id:id},
            dataType: 'JSON',
            cache:false,
            success: function(res) {
               if(res === true){
                thiss.parents('li').remove()
               }
               
            }
    });

    })
    $('.menu-link').click(function(e){
        e.preventDefault();
       if($(this).hasClass('active')){
        $(this).next('ul').slideUp()
        $('i').removeClass('rotate-in')
        $(this).removeClass('active')
        return false;
        }
       $('ul.sub-menu').slideUp()
       $('.menu-link').removeClass('active')
        $(this).addClass('active')
        
        $('i').removeClass('rotate-in')
        $(this).next('ul').slideToggle()
        $(this).find('i').toggleClass('rotate-in')

    })
    </script>
    @yield('js')
</body>

</html>
