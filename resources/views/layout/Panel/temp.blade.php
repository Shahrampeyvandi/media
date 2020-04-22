<!DOCTYPE html>
<html lang="fa">

<head>
    <meta charset="utf-8">
    <title>
        ژن برتر - پنل
    </title>
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
                        </div>

                    </div>
                    <div class="item">
                        <div class="inline-flex upload-button">
                            <a href="{{route('UploadFile')}}"
                                class="button button-info button-small button-hollow button-bordered upload-video"
                                data-ctr="upload-button" data-ctr-cta="upload-button">
                                <i class="fa fa-plus"></i>
                                <span class="text mr-1">بارگذاری فایل</span></a>
                        </div>

                        <div class="inline-flex ">
                            <div id="" class="dropdown">
                                <div class="dropdown-toggle"><a  href="#" style="z-index: 2"
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
<span class="position-absolute noty-icon"> <i class="fa fa-exclamation-circle text-danger"></i></span>

@endif                                    
                                    </div>
                                <div class="dropdown-content mdb-color lighten-1">
                                    <div id="notification " class="d-b  pt-2">
                                        <ul>
                                        
                                            @foreach ($notifications as $notification)
                                        <li><div  class=" text-white d-flex flex-column flex-sm-wrap mb-2">
                                                <span class="mr-1 fs-0-8 d-flex justify-content-between">
                                                   
                                                    <span class="text-info">{{$notification->title}}
                                                    </span>
                                                    @if ($notification->read == 0)
                                                    <a  href="#" data-id="{{$notification->id}}" class="noty-link text-white mdb-color lighten-2 px-1 radius-5 ml-1">فهمیدم</a>
                                                    @endif
                                                </span>
                                                <span class="mr-1 fs-0-8 ">
                                                    <span>{!!$notification->text!!}</span>
                                                    
                                                </span>
                                            
                                            </div></li>
                                            @endforeach                                                                          
                                        </ul>
                                    </div>
                                </div>
                            </div>
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
                            <svg class="icon icon-search" viewBox="0 0 24 24" viewBox="viewBox=" 0 0 24 24"">
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
                                <div class="inner"><svg class="icon icon-inner">
                                        <use xlink:href="#si_loading-inner"></use>
                                    </svg><svg class="icon icon-outer">
                                        <use xlink:href="#si_loading-outer"></use>
                                    </svg></div>
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
                        <a href="https://www.aparat.com" title="آپارات - سرویس اشتراک ویدیو"
                            aria-label="آپارات - سرویس اشتراک ویدیو"><svg
                                class="icon icon-logo-fa logo-brand sidebar-logo" viewBox="0 0 90 31.89"
                                viewBox="viewBox=" 0 0 90 31.89"">
                                <use xlink:href="#si_logo-fa"></use>
                            </svg></a>
                    </div>
                </div>


                <section class="top pt-3">

                    <div class="avatar">

                        @if (auth()->user()->avatar)
                        <a href="#" class="picture image">
                            <div class=" avatar-img"
                                style="background-image: url({{route('BaseUrl')}}/{{auth()->user()->avatar}})">
                            </div>
                        </a>   
                        @else 
                        <a href="#" class="picture image">
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
                        
                    @if (auth()->user()->is_admin())
                    <li class="menu-item-link">
                        <a href="{{route('Panel.Posts.All')}}" aria-label=""><i
                                class="ti ti-files fs-1-5 text-black-50 ml-3"></i>
                            <div class="content">
                                <span class="text">پست ها</span>
                            </div>
                        </a>
                    </li>
                    <li class="menu-item-link">
                        <a href="{{route('Panel.Posts.Unconfirmed')}}" aria-label=""><i
                                class="ti ti-file fs-1-5 text-black-50 ml-3"></i>
                            <div class="content">
                                <span class="text">پست های پیش نویس</span>
                            </div>
                        </a>
                    </li>
                    <li class="menu-item-link">
                        <a href="{{route('Panel.Members')}}" aria-label=""><i
                                class="ti ti-user fs-1-5 text-black-50 ml-3"></i>
                            <div class="content">
                                <span class="text">کاربران</span>
                            </div>
                        </a>
                    </li>
                    <li class="menu-item-link">
                        <a href="{{route('Panel.Comments.All')}}" aria-label=""><i
                                class="ti ti-comments fs-1-5 text-black-50 ml-3"></i>
                            <div class="content">
                                <span class="text">نظرات</span>
                            </div>
                        </a>
                    </li>
                    <li class="menu-item-link">
                        <a href="{{route('Panel.SlideShow.All')}}" aria-label=""><i
                                class="ti ti-layout-slider fs-1-5 text-black-50 ml-3"></i>
                            <div class="content">
                                <span class="text">اسلایدشو</span>
                            </div>
                        </a>
                    </li>
                    <li class="menu-item-link">
                        <a href="{{route('Post.Report.All')}}" aria-label=""><i
                                class="ti ti-info fs-1-5 text-black-50 ml-3"></i>
                            <div class="content">
                                <span class="text">گزارش های تخلف</span>
                            </div>
                        </a>
                    </li>
                    <li class="menu-item-link">
                        <a href="{{route('Message.All')}}" aria-label=""><i
                                class="ti ti-headphone-alt fs-1-5 text-black-50 ml-3"></i>
                            <div class="content">
                                <span class="text">پیام های کاربران</span>
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
                                class="ti ti-volume fs-1-5 text-black-50 ml-3"></i>
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
                    <li class="menu-item-link">
                        <a href="{{route('UnsubscribeFiles')}}" aria-label=""><i
                                class="ti ti-na fs-1-5 text-black-50 ml-3"></i>
                            <div class="content">
                                <span class="text">فایل های منتشر نشده</span>
                            </div>
                        </a>
                    </li>
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
                                <span class="text">پیام های من</span>
                            </div>
                        </a>
                    </li>
                    <li class="menu-item-link">
                      <a href="{{route('Purchase.My')}}" aria-label=""><i
                            class="ti ti-info fs-1-5 text-black-50 ml-3"></i>
                            <div class="content">
                            <span class="text">دوره های خریداری من</span>
                            </div>
                      </a>
                  </li>
                       @endif
                        <li class="menu-item-link">
                            <a href="{{route('Panel.MyFollowers')}}" aria-label="گیم"><svg class="icon icon-gamepad"
                                    viewBox="0 0 24 24" viewBox="viewBox=" 0 0 24 24"">
                                    <use xlink:href="#si_gamepad"></use>
                                </svg>
                                <div class="content">
                                    <span class="text">دنبال کننده ها</span>
                                </div>
                            </a>
                        </li>
                       
                        <li class="menu-item-link">
                            <a href="{{route('Profile')}}" aria-label=""><i
                                    class="ti ti-user fs-1-5 text-black-50 ml-3"></i>
                                <div class="content">
                                    <span class="text">ویرایش پروفایل</span>
                                </div>
                            </a>
                        </li>
                     

                        <li class="menu-item-link">
                            <a href="{{route('logout')}}" aria-label=""><svg class="icon icon-logout"
                                    viewBox="0 0 24 24" 0="" 24="" 24""="">
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
                
                $('.dropdown-content').removeClass('lighten-1').addClass('lighten-2')
            }
    });
    })
    </script>
    @yield('js')
</body>

</html>