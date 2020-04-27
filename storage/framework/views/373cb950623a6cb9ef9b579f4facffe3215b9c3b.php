<!DOCTYPE html>
<html lang="fa">

<head>
    <meta charset="utf-8">
    <title>
        ژن برتر - صفحه اصلی
    </title>
    <!-- UA-153829- -->
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta http-equiv="content-language" content="fa" />
    <link rel="stylesheet" href="<?php echo e(route('BaseUrl')); ?>/Panel/vendor/FontAwesome/all.css">
    <link rel="stylesheet" href="assets/css/animations.css">

    <link rel="stylesheet" href="assets/css/style.css" />
    <link rel="stylesheet" href="assets/css/stylemusic.css">
    <script src="assets/js/jquery-3.3.1.min.js"></script>
    
    <script src="assets/js/simple-scrollbar.min.js"></script>1
    <link href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.3.1/css/swiper.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.3.1/js/swiper.js"></script>

    <script>
        var isMobile = false;
    </script>

</head>

<body class="device-desktop theme-light" data-device="desktop" data-loading="logo" data-page="" data-pagename="home">
    <div class="load-progress hidden">
        <div class="bar"></div>
    </div>
    <main id="main" class="main" data-sidebar>

        <?php if(auth()->check()): ?>
        <a href="#" class="account-icon"><i class="fa fa-user"></i>
        </a>
        <div class="dropdown-content" style="display:none;">
            <div class="menu-wrapper">
                <ul class="menu-list">
                    <li class="menu-item-link">
                        <a href="<?php echo e(route('Panel.Dashboard',auth()->user()->path())); ?>" title="داشبورد"
                            aria-label="داشبورد"><svg class="icon icon-dashboard" viewBox="0 0 24 24" 0="" 24=""
                                24""="">
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
                        <a href="/myvideos" title="ویدیوهای من" aria-label="ویدیوهای من"><svg class="icon icon-videos"
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
                                <span class="text">ویدیوهای من</span>
                            </div>
                        </a>
                    </li>
                    <li class="menu-item-link">
                        <a href="/comments" title="دیدگاه‌ها" aria-label="دیدگاه‌ها"><svg class="icon icon-comments"
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
                                <span class="text">دیدگاه‌ها</span>
                            </div>
                        </a>
                    </li>


                    <li class="menu-item-link">
                        <a href="<?php echo e(route('Logout')); ?>" title="خروج از حساب کاربری" aria-label="خروج از حساب کاربری"><svg
                                class="icon icon-logout" viewBox="0 0 24 24" 0="" 24="" 24""="">
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
        <?php endif; ?>
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
                            <a href="/login?afterlogin=upload"
                                class="button button-info button-small button-hollow button-bordered upload-video"
                                data-ctr="upload-button" data-ctr-cta="upload-button">
                                <i class="fa fa-plus"></i>
                                <span class="text mr-1">بارگذاری فایل</span></a>
                        </div>
                        <div class="inline-flex live-button" data-responsive="mobile">
                            <a href="/live" class="button button-gray button-medium button-hollow live-button"><svg
                                    class="icon icon-live" viewBox="0 0 24 24" viewBox="viewBox=" 0 0 24 24"">
                                    <use xlink:href="#si_live"></use>
                                </svg> <span class="text">55 </span></a>
                        </div>







                        <div class="inline-flex register-button">
                            <?php if(!auth()->check()): ?>
                            <a href="<?php echo e(route('Login')); ?>" class="button button-medium  signin-button"><svg
                                    class="icon icon-user" viewBox="0 0 24 24" 0="" 24="" 24""="">
                                    <use xlink:href="#si_user">
                                        <g id="si_user" data-viewBox="0 0 24 24">
                                            <path d="M0 0h24v24H0z" fill="none"></path>
                                            <path
                                                d="M12 6a2 2 0 1 1-2 2 2.006 2.006 0 0 1 2-2m0 10c2.7 0 5.8 1.29 6 2H6c.23-.72 3.31-2 6-2m0-12a4 4 0 1 0 4 4 4 4 0 0 0-4-4zm0 10c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z">
                                            </path>
                                        </g>
                                    </use>
                                </svg> <span class="text">ورود یا ثبت نام</span></a>



                            <?php endif; ?>
                        </div>
                    </div>
                </div>


                <div class="search-widget" data-suggest-url="/search_suggestion">
                    <div class="input-text">
                        <div class="input-inner">

                            <input class="input" type="search" id="" value="" name="search"
                                placeholder="جستجوی ویدیوهای رویدادها، شخصیت‌ها و ..." autocomplete="off" />

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


                <div id=1 class="menu-wrapper main-list">
                    <ul class="menu-list">
                        <li class="menu-item-link active">
                            <a href="/" aria-label="صفحه نخست"><svg class="icon icon-home" viewBox="0 0 24 24"
                                    viewBox="viewBox=" 0 0 24 24"">
                                    <use xlink:href="#si_home"></use>
                                </svg>
                                <div class="content">
                                    <span class="text">صفحه نخست</span>
                                </div>
                            </a>
                        </li>
                        <li class="menu-item-link ">
                            <a href="/" aria-label="صفحه نخست"><svg class="icon icon-home" viewBox="0 0 24 24"
                                    viewBox="viewBox=" 0 0 24 24"">
                                    <use xlink:href="#si_home"></use>
                                </svg>
                                <div class="content">
                                    <span class="text">ویدیوهای دنبال شوندگان</span>
                                </div>
                            </a>
                        </li>
                        <li class="menu-item-link ">
                            <a href="/" aria-label="صفحه نخست"><svg class="icon icon-home" viewBox="0 0 24 24"
                                    viewBox="viewBox=" 0 0 24 24"">
                                    <use xlink:href="#si_home"></use>
                                </svg>
                                <div class="content">
                                    <span class="text">ویدیوهای پسند شده</span>
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>
                <div id=2 class="menu-wrapper categories menu-more">
                    <h3 class="menu-title">دسته‌بندی‌ها</h3>
                    <ul class="menu-list">
                        <li class="menu-item-link">
                            <a href="/movies/%D8%B3%D8%B1%DB%8C%D8%A7%D9%84_%D9%88_%D9%81%DB%8C%D9%84%D9%85%E2%80%8C%D9%87%D8%A7%DB%8C_%D8%B3%DB%8C%D9%86%D9%85%D8%A7%DB%8C%DB%8C"
                                onmousedown="this.href='/movies'" aria-label="سریال و فیلم‌های سینمایی"><svg
                                    class="icon icon-film" viewBox="0 0 24 24" viewBox="viewBox=" 0 0 24 24"">
                                    <use xlink:href="#si_film"></use>
                                </svg>
                                <div class="content">
                                    <span class="text">سریال و فیلم‌های </span>
                                </div>
                            </a>
                        </li>
                        <li class="menu-item-link">
                            <a href="/animated/%DA%A9%D8%A7%D8%B1%D8%AA%D9%88%D9%86" onmousedown="this.href='/animated'"
                                aria-label="کارتون"><svg class="icon icon-animated" viewBox="0 0 24 24"
                                    viewBox="viewBox=" 0 0 24 24"">
                                    <use xlink:href="#si_animated"></use>
                                </svg>
                                <div class="content">
                                    <span class="text">انیمیشن</span>
                                </div>
                            </a>
                        </li>
                        <li class="menu-item-link">
                            <a href="/funny/%D8%B7%D9%86%D8%B2" onmousedown="this.href='/funny'" aria-label="طنز"><svg
                                    class="icon icon-funny" viewBox="0 0 24 24" viewBox="viewBox=" 0 0 24 24"">
                                    <use xlink:href="#si_funny"></use>
                                </svg>
                                <div class="content">
                                    <span class="text">موسیقی</span>
                                </div>
                            </a>
                        </li>
                        <li class="menu-item-link">
                            <a href="/game/%DA%AF%DB%8C%D9%85" onmousedown="this.href='/game'" aria-label="گیم"><svg
                                    class="icon icon-gamepad" viewBox="0 0 24 24" viewBox="viewBox=" 0 0 24 24"">
                                    <use xlink:href="#si_gamepad"></use>
                                </svg>
                                <div class="content">
                                    <span class="text">پادکست</span>
                                </div>
                            </a>
                        </li>
                        <li class="menu-item-link">
                            <a href="/educational/%D8%A2%D9%85%D9%88%D8%B2%D8%B4%DB%8C"
                                onmousedown="this.href='/educational'" aria-label="آموزشی"><svg
                                    class="icon icon-educational" viewBox="0 0 24 24" viewBox="viewBox=" 0 0 24 24"">
                                    <use xlink:href="#si_educational"></use>
                                </svg>
                                <div class="content">
                                    <span class="text">دوره های آموزشی</span>
                                </div>
                            </a>
                        </li>




                        <li class="menu-item-link">
                            <a href="/news/%D8%AE%D8%A8%D8%B1%DB%8C" onmousedown="this.href='/news'"
                                aria-label="خبری"><svg class="icon icon-news" viewBox="0 0 24 24" viewBox="viewBox=" 0 0
                                    24 24"">
                                    <use xlink:href="#si_news"></use>
                                </svg>
                                <div class="content">
                                    <span class="text">خبری</span>
                                </div>
                            </a>
                        </li>


                        <li class="menu-item-link">
                            <a href="/sport/%D9%88%D8%B1%D8%B2%D8%B4%DB%8C" onmousedown="this.href='/sport'"
                                aria-label="ورزشی"><svg class="icon icon-sport" viewBox="0 0 24 24" viewBox="viewBox=" 0
                                    0 24 24"">
                                    <use xlink:href="#si_sport"></use>
                                </svg>
                                <div class="content">
                                    <span class="text">ورزشی</span>
                                </div>
                            </a>
                        </li>






                        <li class="menu-item-link menu-show-more">
                            <a href="#" title="نمایش بیشتر" aria-label="نمایش بیشتر"><svg class="icon icon-down"
                                    viewBox="0 0 24 24" viewBox="viewBox=" 0 0 24 24"">
                                    <use xlink:href="#si_down"></use>
                                </svg> <span class="content">نمایش بیشتر</span></a>
                        </li>
                    </ul>
                </div>
                <div id="6" class="menu-wrapper footer">
                    <h3 class="menu-title">دیگر صفحات آپارات</h3>
                    <ul class="menu-list-pages">
                        <li class="menu-item-link">
                            <a href="/advert" aria-label="تبلیغات">
                                <div class="content">
                                    <span class="text">تبلیغات</span>
                                </div>
                            </a>
                        </li>
                        <li class="menu-item-link">
                            <a href="/contact" aria-label="تماس با ما">
                                <div class="content">
                                    <span class="text">تماس با ما</span>
                                </div>
                            </a>
                        </li>
                        <li class="menu-item-link">
                            <a href="/logo" aria-label="لوگوهای آپارات">
                                <div class="content">
                                    <span class="text">لوگوهای آپارات</span>
                                </div>
                            </a>
                        </li>
                        <li class="menu-item-link">
                            <a href="/job" aria-label="به ما بپیوندید">
                                <div class="content">
                                    <span class="text">به ما بپیوندید</span>
                                </div>
                            </a>
                        </li>
                        <li class="menu-item-link">
                            <a href="/official" aria-label="کانال های رسمی">
                                <div class="content">
                                    <span class="text">کانال های رسمی</span>
                                </div>
                            </a>
                        </li>
                        <li class="menu-item-link">
                            <a href="/income" aria-label="درآمدزایی">
                                <div class="content">
                                    <span class="text">درآمدزایی</span>
                                </div>
                            </a>
                        </li>
                        <li class="menu-item-link">
                            <a href="/policy" aria-label="قوانین">
                                <div class="content">
                                    <span class="text">قوانین</span>
                                </div>
                            </a>
                        </li>
                        <li class="menu-item-link">
                            <a href="https://help.aparat.com" aria-label="سوالات متداول">
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



        <div id="container" class="container">
            <div class="view">
                <div id="trendMenu" class="trend-menu">
                    <div class="wrapper">
                        <span class="label">داغترین‌ها:</span>
                        <a href="https://www.aparat.com/movies" class="trend"><span class="text">#فيلم و سريال هاي دوبله
                                جديد</span></a>
                        <a href="https://www.aparat.com/user/video/user_list/userid/5958110/usercat/454220"
                            class="trend"><span class="text">#آموزش های همگانی هلال احمر</span></a>
                    </div>
                </div>


                <section class="top-banner"
                    style="ackground-attachment: fixed;position: relative;padding: 100px 0;  background-image: url(./assets/images/wallpapersden.com_abstract-green-shapes_1336x768.jpg);">
                    <div class="overlay-baner"></div>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-md-10">
                                <div class="img-baner-wrapper">
                                    <img class="img-fluid" src="assets/images/slider-bg.jpg" alt="">
                                </div>
                            </div>
                        </div>
                    </div>

                </section>

                <section id="" style="    padding: 40px 0;" class="list-item li" data-list="slider">
                    <div class="list-wrapper">
                        <div class="wpb_wrapper py-3">
                            <h2 class="font__family-open-sans font__size-20  mt-15 mb-15 title__divider title__divider--line"
                                style="margin-right: 0px;"><span class="title__divider__wrapper">ویدیو ها<span
                                        class="line brk-base-bg-gradient-right"></span>
                                </span></h2>
                            <span class="title--more">نمایش همه</span>
                        </div>


                        <section class="list-content">
                            <div id="carousel6d37245e2b67ebb3960241b7a1155e61"
                                class="carousel carousel-movie swiper-container1" dir="rtl">
                                <div class="swiper-wrapper">

                                    <div class="item carousel-item swiper-slide">
                                        <div class="thumbnail-movie thumbnail-serial">
                                            <div class="thumb-wrapper">
                                                <a class="thumb">
                                                    <div class="abs-fit">
                                                        <img src="assets/images/business.jpg" alt="خانه کاغذی"
                                                            aria-label="خانه کاغذی" class=" thumb-image">
                                                    </div>
                                                    <div class="tools">
                                                        <span class="badge-rate">
                                                            <span>96%</span>
                                                            <svg class="icon icon-thumb-up d-in v-m g-20 fs-1-2 ml-xxs"
                                                                viewBox="0 0 24 24" viewBox="viewBox=" 0 0 24 24"">
                                                                <use xlink:href="#si_thumb-up">
                                                                    <g id="si_thumb-up" data-viewBox="0 0 24 24">
                                                                        <path d="M0 0h24v24H0z" fill="none"></path>
                                                                        <path d="M0 0h24v24H0z" fill="none"></path>
                                                                        <path
                                                                            d="M9 21h9a1.987 1.987 0 0 0 1.84-1.22l3.02-7.05A1.976 1.976 0 0 0 23 12v-2a2.006 2.006 0 0 0-2-2h-6.31l.95-4.57.03-.32a1.505 1.505 0 0 0-.44-1.06L14.17 1 7.58 7.59A1.987 1.987 0 0 0 7 9v10a2.006 2.006 0 0 0 2 2zM9 9l4.34-4.34L12 10h9v2l-3 7H9z">
                                                                        </path>
                                                                        <path transform="translate(1 9)"
                                                                            d="M0 0h4v12H0z"></path>
                                                                    </g>
                                                                </use>
                                                            </svg> </span>
                                                        <span class="badge-rate">
                                                            <span>8.60</span>
                                                            <svg class="icon icon-imdb d-in v-m g-20 fs-1-5 ml-xxs"
                                                                viewBox="0 0 24 24" viewBox="viewBox=" 0 0 24 24"">
                                                                <use xlink:href="#si_imdb"></use>
                                                            </svg> </span>
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="position-relative">
                                                
                                               
                                                <a href="<?php echo e(route('ShowItem')); ?>"
                                                title="خانه کاغذی"
                                                class="title"><span>خانه کاغذی</span></a>
                                                <ul class="meta-tags d-b w-100 mt-xs pr-2 pb-2">
                                                    <li class="meta d-in light-60 dark-110">2017</li>
                                                    <li class="meta d-in light-60 dark-110">اسپانیا</li>

                                                    <li class="meta d-in light-60 dark-110">اکشن</li>
                                                    <li class="meta d-in light-60 dark-110">پلیسی معمایی</li>
                                                </ul>

                                            </div>
                                        </div>
                                    </div>
                                  
                                    <div class="item carousel-item swiper-slide">
                                        <div class="thumbnail-movie thumbnail-serial">
                                            <div class="thumb-wrapper">
                                                <a class="thumb">
                                                    <div class="abs-fit">
                                                        <img src="assets/images/business.jpg" alt="خانه کاغذی"
                                                            aria-label="خانه کاغذی" class=" thumb-image">
                                                    </div>
                                                    <div class="tools">
                                                        <span class="badge-rate">
                                                            <span>96%</span>
                                                            <svg class="icon icon-thumb-up d-in v-m g-20 fs-1-2 ml-xxs"
                                                                viewBox="0 0 24 24" viewBox="viewBox=" 0 0 24 24"">
                                                                <use xlink:href="#si_thumb-up">
                                                                    <g id="si_thumb-up" data-viewBox="0 0 24 24">
                                                                        <path d="M0 0h24v24H0z" fill="none"></path>
                                                                        <path d="M0 0h24v24H0z" fill="none"></path>
                                                                        <path
                                                                            d="M9 21h9a1.987 1.987 0 0 0 1.84-1.22l3.02-7.05A1.976 1.976 0 0 0 23 12v-2a2.006 2.006 0 0 0-2-2h-6.31l.95-4.57.03-.32a1.505 1.505 0 0 0-.44-1.06L14.17 1 7.58 7.59A1.987 1.987 0 0 0 7 9v10a2.006 2.006 0 0 0 2 2zM9 9l4.34-4.34L12 10h9v2l-3 7H9z">
                                                                        </path>
                                                                        <path transform="translate(1 9)"
                                                                            d="M0 0h4v12H0z"></path>
                                                                    </g>
                                                                </use>
                                                            </svg> </span>
                                                        <span class="badge-rate">
                                                            <span>8.60</span>
                                                            <svg class="icon icon-imdb d-in v-m g-20 fs-1-5 ml-xxs"
                                                                viewBox="0 0 24 24" viewBox="viewBox=" 0 0 24 24"">
                                                                <use xlink:href="#si_imdb"></use>
                                                            </svg> </span>
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="position-relative">
                                                
                                               
                                                <a href="<?php echo e(route('ShowItem')); ?>"
                                                title="خانه کاغذی"
                                                class="title"><span>خانه کاغذی</span></a>
                                                <ul class="meta-tags d-b w-100 mt-xs pr-2 pb-2">
                                                    <li class="meta d-in light-60 dark-110">2017</li>
                                                    <li class="meta d-in light-60 dark-110">اسپانیا</li>

                                                    <li class="meta d-in light-60 dark-110">اکشن</li>
                                                    <li class="meta d-in light-60 dark-110">پلیسی معمایی</li>
                                                </ul>

                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="item carousel-item swiper-slide">
                                        <div class="thumbnail-movie thumbnail-serial">
                                            <div class="thumb-wrapper">
                                                <a class="thumb">
                                                    <div class="abs-fit">
                                                        <img src="assets/images/business.jpg" alt="خانه کاغذی"
                                                            aria-label="خانه کاغذی" class=" thumb-image">
                                                    </div>
                                                    <div class="tools">
                                                        <span class="badge-rate">
                                                            <span>96%</span>
                                                            <svg class="icon icon-thumb-up d-in v-m g-20 fs-1-2 ml-xxs"
                                                                viewBox="0 0 24 24" viewBox="viewBox=" 0 0 24 24"">
                                                                <use xlink:href="#si_thumb-up">
                                                                    <g id="si_thumb-up" data-viewBox="0 0 24 24">
                                                                        <path d="M0 0h24v24H0z" fill="none"></path>
                                                                        <path d="M0 0h24v24H0z" fill="none"></path>
                                                                        <path
                                                                            d="M9 21h9a1.987 1.987 0 0 0 1.84-1.22l3.02-7.05A1.976 1.976 0 0 0 23 12v-2a2.006 2.006 0 0 0-2-2h-6.31l.95-4.57.03-.32a1.505 1.505 0 0 0-.44-1.06L14.17 1 7.58 7.59A1.987 1.987 0 0 0 7 9v10a2.006 2.006 0 0 0 2 2zM9 9l4.34-4.34L12 10h9v2l-3 7H9z">
                                                                        </path>
                                                                        <path transform="translate(1 9)"
                                                                            d="M0 0h4v12H0z"></path>
                                                                    </g>
                                                                </use>
                                                            </svg> </span>
                                                        <span class="badge-rate">
                                                            <span>8.60</span>
                                                            <svg class="icon icon-imdb d-in v-m g-20 fs-1-5 ml-xxs"
                                                                viewBox="0 0 24 24" viewBox="viewBox=" 0 0 24 24"">
                                                                <use xlink:href="#si_imdb"></use>
                                                            </svg> </span>
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="position-relative">
                                                
                                               
                                                <a href="<?php echo e(route('ShowItem')); ?>"
                                                title="خانه کاغذی"
                                                class="title"><span>خانه کاغذی</span></a>
                                                <ul class="meta-tags d-b w-100 mt-xs pr-2 pb-2">
                                                    <li class="meta d-in light-60 dark-110">2017</li>
                                                    <li class="meta d-in light-60 dark-110">اسپانیا</li>

                                                    <li class="meta d-in light-60 dark-110">اکشن</li>
                                                    <li class="meta d-in light-60 dark-110">پلیسی معمایی</li>
                                                </ul>

                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="item carousel-item swiper-slide">
                                        <div class="thumbnail-movie thumbnail-serial">
                                            <div class="thumb-wrapper">
                                                <a class="thumb">
                                                    <div class="abs-fit">
                                                        <img src="assets/images/business.jpg" alt="خانه کاغذی"
                                                            aria-label="خانه کاغذی" class=" thumb-image">
                                                    </div>
                                                    <div class="tools">
                                                        <span class="badge-rate">
                                                            <span>96%</span>
                                                            <svg class="icon icon-thumb-up d-in v-m g-20 fs-1-2 ml-xxs"
                                                                viewBox="0 0 24 24" viewBox="viewBox=" 0 0 24 24"">
                                                                <use xlink:href="#si_thumb-up">
                                                                    <g id="si_thumb-up" data-viewBox="0 0 24 24">
                                                                        <path d="M0 0h24v24H0z" fill="none"></path>
                                                                        <path d="M0 0h24v24H0z" fill="none"></path>
                                                                        <path
                                                                            d="M9 21h9a1.987 1.987 0 0 0 1.84-1.22l3.02-7.05A1.976 1.976 0 0 0 23 12v-2a2.006 2.006 0 0 0-2-2h-6.31l.95-4.57.03-.32a1.505 1.505 0 0 0-.44-1.06L14.17 1 7.58 7.59A1.987 1.987 0 0 0 7 9v10a2.006 2.006 0 0 0 2 2zM9 9l4.34-4.34L12 10h9v2l-3 7H9z">
                                                                        </path>
                                                                        <path transform="translate(1 9)"
                                                                            d="M0 0h4v12H0z"></path>
                                                                    </g>
                                                                </use>
                                                            </svg> </span>
                                                        <span class="badge-rate">
                                                            <span>8.60</span>
                                                            <svg class="icon icon-imdb d-in v-m g-20 fs-1-5 ml-xxs"
                                                                viewBox="0 0 24 24" viewBox="viewBox=" 0 0 24 24"">
                                                                <use xlink:href="#si_imdb"></use>
                                                            </svg> </span>
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="position-relative">
                                                
                                               
                                                <a href="<?php echo e(route('ShowItem')); ?>"
                                                title="خانه کاغذی"
                                                class="title"><span>خانه کاغذی</span></a>
                                                <ul class="meta-tags d-b w-100 mt-xs pr-2 pb-2">
                                                    <li class="meta d-in light-60 dark-110">2017</li>
                                                    <li class="meta d-in light-60 dark-110">اسپانیا</li>

                                                    <li class="meta d-in light-60 dark-110">اکشن</li>
                                                    <li class="meta d-in light-60 dark-110">پلیسی معمایی</li>
                                                </ul>

                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="item carousel-item swiper-slide">
                                        <div class="thumbnail-movie thumbnail-serial">
                                            <div class="thumb-wrapper">
                                                <a class="thumb">
                                                    <div class="abs-fit">
                                                        <img src="assets/images/business.jpg" alt="خانه کاغذی"
                                                            aria-label="خانه کاغذی" class=" thumb-image">
                                                    </div>
                                                    <div class="tools">
                                                        <span class="badge-rate">
                                                            <span>96%</span>
                                                            <svg class="icon icon-thumb-up d-in v-m g-20 fs-1-2 ml-xxs"
                                                                viewBox="0 0 24 24" viewBox="viewBox=" 0 0 24 24"">
                                                                <use xlink:href="#si_thumb-up">
                                                                    <g id="si_thumb-up" data-viewBox="0 0 24 24">
                                                                        <path d="M0 0h24v24H0z" fill="none"></path>
                                                                        <path d="M0 0h24v24H0z" fill="none"></path>
                                                                        <path
                                                                            d="M9 21h9a1.987 1.987 0 0 0 1.84-1.22l3.02-7.05A1.976 1.976 0 0 0 23 12v-2a2.006 2.006 0 0 0-2-2h-6.31l.95-4.57.03-.32a1.505 1.505 0 0 0-.44-1.06L14.17 1 7.58 7.59A1.987 1.987 0 0 0 7 9v10a2.006 2.006 0 0 0 2 2zM9 9l4.34-4.34L12 10h9v2l-3 7H9z">
                                                                        </path>
                                                                        <path transform="translate(1 9)"
                                                                            d="M0 0h4v12H0z"></path>
                                                                    </g>
                                                                </use>
                                                            </svg> </span>
                                                        <span class="badge-rate">
                                                            <span>8.60</span>
                                                            <svg class="icon icon-imdb d-in v-m g-20 fs-1-5 ml-xxs"
                                                                viewBox="0 0 24 24" viewBox="viewBox=" 0 0 24 24"">
                                                                <use xlink:href="#si_imdb"></use>
                                                            </svg> </span>
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="position-relative">
                                                
                                               
                                                <a href="<?php echo e(route('ShowItem')); ?>"
                                                title="خانه کاغذی"
                                                class="title"><span>خانه کاغذی</span></a>
                                                <ul class="meta-tags d-b w-100 mt-xs pr-2 pb-2">
                                                    <li class="meta d-in light-60 dark-110">2017</li>
                                                    <li class="meta d-in light-60 dark-110">اسپانیا</li>

                                                    <li class="meta d-in light-60 dark-110">اکشن</li>
                                                    <li class="meta d-in light-60 dark-110">پلیسی معمایی</li>
                                                </ul>

                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <div class="swiper-button-next swiper-n "></div>
                            <div class="swiper-button-prev swiper-p"></div>
                        </section>

                    </div>
                </section>


                


                


                <section class="filmoja-theater-area section_70">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-5">
                                <div class="theater-left">
                                    <div class="theater-box">
                                        <div class="theater-tex pr-md-4">
                                            <h2 class="py-md-2">فیلم آموزشی جدید</h2>
                                            <h3 class="py-md-2">عنوان فیلم</h3>
                                            <p class="py-md-2 text-secondary">آمار نشان می‌دهد بسیاری از کسب‌وکارها در
                                                چند سال اول خود شکست می‌خورند. و شما قطعا نمی‌خواهید یکی از این
                                                کارآفرینان باشید.در اینجا سه درس...</p>
                                            <a href="#" class="filmoja-btn">ادامه ...</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-7">
                                <div class="theater-slider slider-for px-2">
                                    <div class="single-theater">
                                        <img src="assets/images/theater.jpeg" alt="theater thumb">
                                        <a class="play-video" href="https://www.youtube.com/watch?v=1Q8fG0TtVAY">
                                            <i class="fa fa-play"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>


                <section id="" style="    padding: 40px 0;" class="list-item li" data-list="slider">
                    <div class="list-wrapper">
                        <div class="wpb_wrapper py-3">
                            <h2 class="font__family-open-sans font__size-20  mt-15 mb-15 title__divider title__divider--line"
                                style="margin-right: 0px;"><span class="title__divider__wrapper">آهنگ ها<span
                                        class="line brk-base-bg-gradient-right"></span>
                                </span></h2>
                            <span class="title--more">نمایش همه</span>
                        </div>


                        <section class="list-content">
                            <div id="carousel6d37245e2b67ebb3960241b7a1155e61"
                                class="carousel carousel-movie swiper-container-music" dir="rtl">
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide">
                                        <div class="news_box fadeInUp animated go">
                                            <figure><img src="assets/images/n2.jpg" alt="" style="min-height: 270px;">
                                            </figure>
                                            <div class="news_info_wrapper">
                                                <div class="news_info d-flex justify-content-between"
                                                    style="flex-direction: column;">
                                                    <h3>نام آهنگ</h3>
                                                    <ul class="" style="font-size: 15px;">
                                                        <li>خواننده</li>
                                                        <li>دسته بندی</li>
                                                    </ul>
                                                    <!--//news_meta-->
                                                    <h4>تعداد نظرها</h4>
                                                </div>
                                                <!--news_info-->
                                                <div class="news_box-createdby">
                                                    <h5>ایجاد شده توسط: <span>sdfs</span></h5>
                                                </div>
                                                <div class="news_box-like">
                                                    <svg class="icon icon-like d-in v-m g-20 fs-1-2 ml-xxs"
                                                        viewBox="0 0 24 24" 0="" 24="" 24""="">
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
                                                    10
                                                </div>
                                                <div class="news_box-views">
                                                    تعداد بازدید ها 30
                                                </div>
                                            </div>

                                            <!--//news_info_wrapper-->
                                            <div class="hover">
                                                <a class="triggerNews" href="news.html" data-number="1">
                                                    <i class="fa fa-play-circle"></i>
                                                </a>
                                            </div>
                                            <!--//hover-->
                                        </div>


                                    </div>
                                    <div class="swiper-slide">
                                        <div class="news_box fadeInUp animated go">
                                            <figure><img src="assets/images/n2.jpg" alt="" style="min-height: 270px;">
                                            </figure>
                                            <div class="news_info_wrapper">
                                                <div class="news_info d-flex justify-content-between"
                                                    style="flex-direction: column;">
                                                    <h3>نام آهنگ</h3>
                                                    <ul class="" style="font-size: 15px;">
                                                        <li>خواننده</li>
                                                        <li>دسته بندی</li>
                                                    </ul>
                                                    <!--//news_meta-->
                                                    <h4>تعداد نظرها</h4>
                                                </div>
                                                <!--news_info-->
                                                <div class="news_box-createdby">
                                                    <h5>ایجاد شده توسط: <span>sdfs</span></h5>
                                                </div>
                                                <div class="news_box-like">
                                                    <svg class="icon icon-like d-in v-m g-20 fs-1-2 ml-xxs"
                                                        viewBox="0 0 24 24" 0="" 24="" 24""="">
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
                                                    10
                                                </div>
                                                <div class="news_box-views">
                                                    تعداد بازدید ها 30
                                                </div>
                                            </div>

                                            <!--//news_info_wrapper-->
                                            <div class="hover">
                                                <a class="triggerNews" href="news.html" data-number="1">
                                                    <i class="fa fa-play-circle"></i>
                                                </a>
                                            </div>
                                            <!--//hover-->
                                        </div>


                                    </div>

                                    <div class="swiper-slide">
                                        <div class="news_box fadeInUp animated go">
                                            <figure><img src="assets/images/n2.jpg" alt="" style="min-height: 270px;">
                                            </figure>
                                            <div class="news_info_wrapper">
                                                <div class="news_info d-flex justify-content-between"
                                                    style="flex-direction: column;">
                                                    <h3>نام آهنگ</h3>
                                                    <ul class="" style="font-size: 15px;">
                                                        <li>خواننده</li>
                                                        <li>دسته بندی</li>
                                                    </ul>
                                                    <!--//news_meta-->
                                                    <h4>تعداد نظرها</h4>
                                                </div>
                                                <!--news_info-->
                                                <div class="news_box-createdby">
                                                    <h5>ایجاد شده توسط: <span>sdfs</span></h5>
                                                </div>
                                                <div class="news_box-like">
                                                    <svg class="icon icon-like d-in v-m g-20 fs-1-2 ml-xxs"
                                                        viewBox="0 0 24 24" 0="" 24="" 24""="">
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
                                                    10
                                                </div>
                                                <div class="news_box-views">
                                                    تعداد بازدید ها 30
                                                </div>
                                            </div>

                                            <!--//news_info_wrapper-->
                                            <div class="hover">
                                                <a class="triggerNews" href="news.html" data-number="1">
                                                    <i class="fa fa-play-circle"></i>
                                                </a>
                                            </div>
                                            <!--//hover-->
                                        </div>


                                    </div>

                                    <div class="swiper-slide">
                                        <div class="news_box fadeInUp animated go">
                                            <figure><img src="assets/images/n2.jpg" alt="" style="min-height: 270px;">
                                            </figure>
                                            <div class="news_info_wrapper">
                                                <div class="news_info d-flex justify-content-between"
                                                    style="flex-direction: column;">
                                                    <h3>نام آهنگ</h3>
                                                    <ul class="" style="font-size: 15px;">
                                                        <li>خواننده</li>
                                                        <li>دسته بندی</li>
                                                    </ul>
                                                    <!--//news_meta-->
                                                    <h4>تعداد نظرها</h4>
                                                </div>
                                                <!--news_info-->
                                                <div class="news_box-createdby">
                                                    <h5>ایجاد شده توسط: <span>sdfs</span></h5>
                                                </div>
                                                <div class="news_box-like">
                                                    <svg class="icon icon-like d-in v-m g-20 fs-1-2 ml-xxs"
                                                        viewBox="0 0 24 24" 0="" 24="" 24""="">
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
                                                    10
                                                </div>
                                                <div class="news_box-views">
                                                    تعداد بازدید ها 30
                                                </div>
                                            </div>

                                            <!--//news_info_wrapper-->
                                            <div class="hover">
                                                <a class="triggerNews" href="news.html" data-number="1">
                                                    <i class="fa fa-play-circle"></i>
                                                </a>
                                            </div>
                                            <!--//hover-->
                                        </div>


                                    </div>

                                    <div class="swiper-slide">
                                        <div class="news_box fadeInUp animated go">
                                            <figure><img src="assets/images/n2.jpg" alt="" style="min-height: 270px;">
                                            </figure>
                                            <div class="news_info_wrapper">
                                                <div class="news_info d-flex justify-content-between"
                                                    style="flex-direction: column;">
                                                    <h3>نام آهنگ</h3>
                                                    <ul class="" style="font-size: 15px;">
                                                        <li>خواننده</li>
                                                        <li>دسته بندی</li>
                                                    </ul>
                                                    <!--//news_meta-->
                                                    <h4>تعداد نظرها</h4>
                                                </div>
                                                <!--news_info-->
                                                <div class="news_box-createdby">
                                                    <h5>ایجاد شده توسط: <span>sdfs</span></h5>
                                                </div>
                                                <div class="news_box-like">
                                                    <svg class="icon icon-like d-in v-m g-20 fs-1-2 ml-xxs"
                                                        viewBox="0 0 24 24" 0="" 24="" 24""="">
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
                                                    10
                                                </div>
                                                <div class="news_box-views">
                                                    تعداد بازدید ها 30
                                                </div>
                                            </div>

                                            <!--//news_info_wrapper-->
                                            <div class="hover">
                                                <a class="triggerNews" href="news.html" data-number="1">
                                                    <i class="fa fa-play-circle"></i>
                                                </a>
                                            </div>
                                            <!--//hover-->
                                        </div>


                                    </div>

                                    <div class="swiper-slide">
                                        <div class="news_box fadeInUp animated go">
                                            <figure><img src="assets/images/n2.jpg" alt="" style="min-height: 270px;">
                                            </figure>
                                            <div class="news_info_wrapper">
                                                <div class="news_info d-flex justify-content-between"
                                                    style="flex-direction: column;">
                                                    <h3>نام آهنگ</h3>
                                                    <ul class="" style="font-size: 15px;">
                                                        <li>خواننده</li>
                                                        <li>دسته بندی</li>
                                                    </ul>
                                                    <!--//news_meta-->
                                                    <h4>تعداد نظرها</h4>
                                                </div>
                                                <!--news_info-->
                                                <div class="news_box-createdby">
                                                    <h5>ایجاد شده توسط: <span>sdfs</span></h5>
                                                </div>
                                                <div class="news_box-like">
                                                    <svg class="icon icon-like d-in v-m g-20 fs-1-2 ml-xxs"
                                                        viewBox="0 0 24 24" 0="" 24="" 24""="">
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
                                                    10
                                                </div>
                                                <div class="news_box-views">
                                                    تعداد بازدید ها 30
                                                </div>
                                            </div>

                                            <!--//news_info_wrapper-->
                                            <div class="hover">
                                                <a class="triggerNews" href="news.html" data-number="1">
                                                    <i class="fa fa-play-circle"></i>
                                                </a>
                                            </div>
                                            <!--//hover-->
                                        </div>


                                    </div>


                                </div>
                            </div>

                            <div class="swiper-pagination"></div>
                        </section>

                    </div>
                </section>


                <section id="" style=" padding: 40px 0;" class="list-item li" data-list="slider">
                    <div class="list-wrapper">
                        <div class="wpb_wrapper py-3">
                            <h2 class="font__family-open-sans font__size-20  mt-15 mb-15 title__divider title__divider--line"
                                style="margin-right: 0px;"><span class="title__divider__wrapper">پادکست ها<span
                                        class="line brk-base-bg-gradient-right"></span>
                                </span></h2>
                            <span class="title--more">نمایش همه</span>
                        </div>


                        <section class="">


                            <div class="row">

                                <div class="col-md-4">

                                    <div class="card radius shadowDepth1">
                                        <div class="card__image border-tlr-radius">
                                            <img src="assets/images/record.png" alt="image" class="border-tlr-radius">
                                        </div>

                                        <div class="card__content card__padding">
                                            <div class="card__share">


                                                <a id="" class=" share-icon" href="#"><i
                                                        class="fa fa-caret-square-left"></i></a>
                                            </div>



                                            <article class="card__article mt-2">
                                                <h2><a href="#">عنوان پادکست</a></h2>

                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus
                                                    harum...</p>
                                            </article>
                                        </div>

                                        <div class="card__action">

                                            <div class="card__author">

                                                <a href="#">مربوط به : علی محمدی</a>
                                                <p class="">ایجاد شده توسط <a
                                                        href="https://twitter.com/mithicher">ادمین</a></p>
                                            </div>
                                        </div>
                                        <div class="card__meta d-flex justify-content-between p-2">
                                            <a href="#">دسته بندی زبان</a>
                                            <span>11 بهمن 1398</span>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-md-4">

                                    <div class="card radius shadowDepth1">
                                        <div class="card__image border-tlr-radius">
                                            <img src="assets/images/record.png" alt="image" class="border-tlr-radius">
                                        </div>

                                        <div class="card__content card__padding">
                                            <div class="card__share">


                                                <a id="" class=" share-icon" href="#"><i
                                                        class="fa fa-caret-square-left"></i></a>
                                            </div>



                                            <article class="card__article mt-2">
                                                <h2><a href="#">عنوان پادکست</a></h2>

                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus
                                                    harum...</p>
                                            </article>
                                        </div>

                                        <div class="card__action">

                                            <div class="card__author">

                                                <a href="#">مربوط به : علی محمدی</a>
                                                <p class="">ایجاد شده توسط <a
                                                        href="https://twitter.com/mithicher">ادمین</a></p>
                                            </div>
                                        </div>
                                        <div class="card__meta d-flex justify-content-between p-2">
                                            <a href="#">دسته بندی زبان</a>
                                            <span>11 بهمن 1398</span>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-md-4">

                                    <div class="card radius shadowDepth1">
                                        <div class="card__image border-tlr-radius">
                                            <img src="assets/images/record.png" alt="image" class="border-tlr-radius">
                                        </div>

                                        <div class="card__content card__padding">
                                            <div class="card__share">


                                                <a id="" class=" share-icon" href="#"><i
                                                        class="fa fa-caret-square-left"></i></a>
                                            </div>



                                            <article class="card__article mt-2">
                                                <h2><a href="#">عنوان پادکست</a></h2>

                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus
                                                    harum...</p>
                                            </article>
                                        </div>

                                        <div class="card__action">

                                            <div class="card__author">

                                                <a href="#">مربوط به : علی محمدی</a>
                                                <p class="">ایجاد شده توسط <a
                                                        href="https://twitter.com/mithicher">ادمین</a></p>
                                            </div>
                                        </div>
                                        <div class="card__meta d-flex justify-content-between p-2">
                                            <a href="#">دسته بندی زبان</a>
                                            <span>11 بهمن 1398</span>
                                        </div>
                                    </div>

                                </div>

                                <div class="col-md-4">

                                    <div class="card radius shadowDepth1">
                                        <div class="card__image border-tlr-radius">
                                            <img src="assets/images/record.png" alt="image" class="border-tlr-radius">
                                        </div>

                                        <div class="card__content card__padding">
                                            <div class="card__share">


                                                <a id="" class=" share-icon" href="#"><i
                                                        class="fa fa-caret-square-left"></i></a>
                                            </div>



                                            <article class="card__article mt-2">
                                                <h2><a href="#">عنوان پادکست</a></h2>

                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus
                                                    harum...</p>
                                            </article>
                                        </div>

                                        <div class="card__action">

                                            <div class="card__author">

                                                <a href="#">مربوط به : علی محمدی</a>
                                                <p class="">ایجاد شده توسط <a
                                                        href="https://twitter.com/mithicher">ادمین</a></p>
                                            </div>
                                        </div>
                                        <div class="card__meta d-flex justify-content-between p-2">
                                            <a href="#">دسته بندی زبان</a>
                                            <span>11 بهمن 1398</span>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-md-4">

                                    <div class="card radius shadowDepth1">
                                        <div class="card__image border-tlr-radius">
                                            <img src="assets/images/record.png" alt="image" class="border-tlr-radius">
                                        </div>

                                        <div class="card__content card__padding">
                                            <div class="card__share">


                                                <a id="" class=" share-icon" href="#"><i
                                                        class="fa fa-caret-square-left"></i></a>
                                            </div>



                                            <article class="card__article mt-2">
                                                <h2><a href="#">عنوان پادکست</a></h2>

                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus
                                                    harum...</p>
                                            </article>
                                        </div>

                                        <div class="card__action">

                                            <div class="card__author">

                                                <a href="#">مربوط به : علی محمدی</a>
                                                <p class="">ایجاد شده توسط <a
                                                        href="https://twitter.com/mithicher">ادمین</a></p>
                                            </div>
                                        </div>
                                        <div class="card__meta d-flex justify-content-between p-2">
                                            <a href="#">دسته بندی زبان</a>
                                            <span>11 بهمن 1398</span>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-md-4">

                                    <div class="card radius shadowDepth1">
                                        <div class="card__image border-tlr-radius">
                                            <img src="assets/images/record.png" alt="image" class="border-tlr-radius">
                                        </div>

                                        <div class="card__content card__padding">
                                            <div class="card__share">


                                                <a id="" class=" share-icon" href="#"><i
                                                        class="fa fa-caret-square-left"></i></a>
                                            </div>



                                            <article class="card__article mt-2">
                                                <h2><a href="#">عنوان پادکست</a></h2>

                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus
                                                    harum...</p>
                                            </article>
                                        </div>

                                        <div class="card__action">

                                            <div class="card__author">

                                                <a href="#">مربوط به : علی محمدی</a>
                                                <p class="">ایجاد شده توسط <a
                                                        href="https://twitter.com/mithicher">ادمین</a></p>
                                            </div>
                                        </div>
                                        <div class="card__meta d-flex justify-content-between p-2">
                                            <a href="#">دسته بندی زبان</a>
                                            <span>11 بهمن 1398</span>
                                        </div>
                                    </div>

                                </div>
                            </div>

                        </section>

                    </div>
                </section>



            </div>
        </div>

    </main>





    <script src="assets/js/app.js"></script>


    <script>
        $(document).ready(function(){

            $('.card__share > a').on('click', function(e){ 
		e.preventDefault() // prevent default action - hash doesn't appear in url
   		$(this).parent().find( 'div' ).toggleClass( 'card__social--active' );
		$(this).toggleClass('share-expanded');
    });
  
       
    var swiper = new Swiper('.swiper-container1', {
            slidesPerView: 4,
            spaceBetween: 20,
           nextButton: '.swiper-p',
           prevButton: '.swiper-n',
      
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
                slidesPerView: 2,
                spaceBetween: 30
            },
            1024: {
                slidesPerView: 2,
                spaceBetween: 40
            },
            1380: {
                slidesPerView: 3,
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
        $('.account-icon').click(function(){
            $('.dropdown-content').fadeToggle(200)
        })
        
      
    })
    </script>
































    <script>
        window.uxData = window.uxData || {};
        window.uxData.page = JSON.parse('{"firstPage":[]}');
    </script>

</body>

</html><?php /**PATH C:\xampp\htdocs\Laravel\media\resources\views/Main/index.blade.php ENDPATH**/ ?>