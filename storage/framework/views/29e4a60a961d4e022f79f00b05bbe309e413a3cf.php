<!DOCTYPE html>
<html lang="fa">

<head>
    <meta charset="utf-8">
    <title>
       <?php echo $__env->yieldContent('title','ژن برتر - مرجع آموزش زبان '); ?>
        
    </title>
    <!-- UA-153829- -->
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta http-equiv="content-language" content="fa" />
    <meta name="description" 
    content="<?php echo $__env->yieldContent('description','موزیک و ویدیوهای آموزشی خود را به راحتی آپلود کرده و با یکدیگر به اشتراک بگذارید'); ?>">
    <link rel="canonical" href="<?php echo e(route('BaseUrl')); ?>" />
    
    
    
    
    
    <link rel="icon" href="<?php echo e(asset('assets/images/logo.jpeg')); ?>">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link rel="stylesheet" href="<?php echo e(route('BaseUrl')); ?>/Panel/vendor/themify/themify-icons.css">
    <link rel="stylesheet" href="<?php echo e(route('BaseUrl')); ?>/assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?php echo e(route('BaseUrl')); ?>/assets/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="<?php echo e(route('BaseUrl')); ?>/assets/css/animate.css">
    <link rel="stylesheet" href="<?php echo e(route('BaseUrl')); ?>/assets/css/toastr.css">
    <link rel="stylesheet" href="<?php echo e(route('BaseUrl')); ?>/assets/css/stylemusic.css">
    <link rel="stylesheet" href="<?php echo e(route('BaseUrl')); ?>/assets/css/mdb.min.css">
    <link href="<?php echo e(route('BaseUrl')); ?>/assets/css/swiper.min.css" rel="stylesheet">
    <script src="<?php echo e(asset('assets/js/jquery-3.4.1.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/sweetalert.min.js')); ?>"></script>
    <script src="<?php echo e(route('BaseUrl')); ?>/assets/js/simplebar.min.js"></script>
    <script src="<?php echo e(route('BaseUrl')); ?>/assets/js/simple-scrollbar.min.js"></script>
    <script src="<?php echo e(route('BaseUrl')); ?>/assets/js/swiper.js"></script>
    <link rel="stylesheet" href="<?php echo e(route('BaseUrl')); ?>/assets/css/style.css" />
    <?php echo $__env->yieldContent('css'); ?>
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

    <script type="text/javascript">
        !function(){function t(){var t=document.createElement("script");t.type="text/javascript",t.async=!0,localStorage.getItem("rayToken")?t.src="https://app.raychat.io/scripts/js/"+o+"?rid="+localStorage.getItem("rayToken")+"&href="+window.location.href:t.src="https://app.raychat.io/scripts/js/"+o;var e=document.getElementsByTagName("script")[0];e.parentNode.insertBefore(t,e)}var e=document,a=window,o="7a58561c-2f4a-4a15-8c90-e75c8ed050ed";"complete"==e.readyState?t():a.attachEvent?a.attachEvent("onload",t):a.addEventListener("load",t,!1)}();
    </script>

</head>

<body class="device-desktop theme-light">
    <div class="page-loader " style="display: none;" >
        <div class="spinner-border text-success"></div>
        <img src="<?php echo e(asset('assets/images/LOGO.jpeg')); ?>" style=" bottom: 19px;
        position: absolute;
        /* bottom: 0; */
        right: 103px;
        width: 95px;" alt="">
    </div>
    

    <div id="notes" class="d-b  pt-2">
        <a class="float-left text-danger close-notes"><i class="fa fa-times "></i></a>
        <h3>یادداشت ها</h3>
        <ul class="mt-4">
            <?php $__currentLoopData = $mynotes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $note): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li><?php echo $note->text; ?>



                <a data-id="<?php echo e($note->id); ?>" href="#" class="float-left text-danger trash-note mr-2 pt-1"><i
                        class="fa fa-trash"></i></a>
                <span
                    class="float-left fs-0-8 pt-1"><?php echo e(\Morilog\Jalali\Jalalian::forge($note->created_at)->format('%d %B %Y')); ?>


                </span>
            </li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
        <div class="col-md-12 mt-3 mr-0 pr-0">
            <form id="newnote" action="#" method="post">
                <div class="form-group">
                    <textarea type="text" class="form-control" name="text" id="text"></textarea>
                    <button type="submit" class="btn btn-sm btn-primary">ذخیره</button>
                </div>
            </form>
        </div>
    </div>
    

    <main id="main" class="main" data-sidebar>

        <?php if(auth()->check()): ?>
        <?php if(auth()->user()->avatar): ?>
        <a href="#" class="account-icon p-0 ">
            <img src="<?php echo e(asset(auth()->user()->avatar)); ?>" alt="">
        </a>
        <?php else: ?>
        <a href="#" class="account-icon ">
            <i class="fa fa-user"></i>
        </a>
        <?php endif; ?>

        <div class="dropdown-content" style="display:none;">
            <div class="menu-wrapper">
                <ul class="menu-list">
                    <li class="menu-item-link">
                        <a href="<?php echo e(route('Panel.Dashboard',auth()->user()->path())); ?>" title="داشبورد"
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
                        <a href="<?php echo e(route('MyVideos')); ?>" title="ویدیوهای من" aria-label="ویدیوهای من">
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
                        <a href="<?php echo e(route('Panel.Comments')); ?>" title="دیدگاه‌ها" aria-label="دیدگاه‌ها">
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
                        <a href="<?php echo e(route('logout')); ?>" title="خروج از حساب کاربری" aria-label="خروج از حساب کاربری">
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
        <?php endif; ?>
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
                            <a href="<?php echo e(route('BaseUrl')); ?>" class="mr-3 pt-1 ">
                                <img src="<?php echo e(asset('assets/images/Logo-genebartar.png')); ?>" width="52px;" alt="">
                            </a>
                        </div>

                    </div>
                    <div class="item">
                        <div class="inline-flex upload-button">
                            <a href="<?php echo e(route('Main.UploadFile')); ?>"
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
                            <?php if(!auth()->check()): ?>
                            <a href="<?php echo e(route('Login')); ?>" class="button button-medium  signin-button">
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



                            <?php endif; ?>
                        </div>
                    </div>
                </div>


                <div class="search-widget" data-suggest-url="/search_suggestion">
                    <div class="input-text">
                        <div class="input-inner">

                            <input class="input" type="text" id="searchinput" value="" name=""
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
                    <div id="search--content" class="search-suggestion">

                        <div id="" class="">
                            <ul>
                                <li class="fs-0-8 text-black-50">در حال جست و جو ...</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <a href="#" class="search-overlay"></a>
            </div>
        </header>


        <aside id="sidebar" class="sidebar">

            <div class="sidebar-inner" data-simplebar data-simplebar-direction=rtl>
                <div class="inline-flex sidebar-toggle">
                    <div class="toggle">
                        <button type="button"
                            class="button button-medium button-gray button-hollow button-circular sidebar-toggler">
                            <svg class="icon icon-cats" viewBox="0 0 24 24" viewBox="viewBox=" 0 0 24 24 "">
                                <use xlink:href="#si_cats"></use>
                            </svg>
                        </button>

                    </div>

                    <div class="logo">

                    </div>
                </div>


                <div id=1 class="menu-wrapper main-list">
                    <ul class="menu-list">

                        <li class="menu-item-link active">
                            <a href="<?php echo e(route('BaseUrl')); ?>" aria-label="صفحه نخست">
                                <svg class="icon icon-home" viewBox="0 0 24 24" viewBox="viewBox=" 0 0 24 24 "">
                                    <use xlink:href="#si_home"></use>
                                </svg>
                                <div class="content">
                                    <span class="text">صفحه نخست</span>
                                </div>
                            </a>
                        </li>
                        <?php if(auth()->check()): ?>
                        <li class="menu-item-link ">
                            <a href="<?php echo e(route('User.Show',auth()->user()->username)); ?>" aria-label="پروفایل من">
                                <svg class="icon icon-home" viewBox="0 0 24 24" viewBox="viewBox=" 0 0 24 24 "">
                                    <use xlink:href="#si_home"></use>
                                </svg>
                                <div class="content">
                                    <span class="text">پروفایل من</span>
                                </div>
                            </a>
                        </li>
                        <?php endif; ?>
                        
                        <li class="menu-item-link ">
                            <a href="<?php echo e(route('Panel.MyFavorites')); ?>" aria-label="علاقه مندی ها">
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
                        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li class="menu-item-link">
                            <a href="<?php echo e(route('Category',['slug'=>$category->latin_name])); ?>" onmousedown=""
                                aria-label="<?php echo e($category->name); ?>">
                                <svg class="icon icon-film" viewBox="0 0 24 24" viewBox="viewBox=" 0 0 24 24 "">
                                    <use xlink:href="#si_film"></use>
                                </svg>
                                <div class="content">
                                    <span class="text"><?php echo e($category->name); ?></span>
                                </div>
                            </a>
                        </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <li class="menu-item-link menu-show-more">
                            <a href="#" title="نمایش بیشتر" aria-label="نمایش بیشتر">
                                <svg class="icon icon-down" viewBox="0 0 24 24" viewBox="viewBox=" 0 0 24 24 "">
                                    <use xlink:href="#si_down"></use>
                                </svg> 
                                <span class="content">نمایش بیشتر</span>
                            </a>
                        </li>
                    </ul>
                </div>
                <?php if(\Request::route()->getName() == "Category"): ?>

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
                                <?php $__currentLoopData = $langs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="custom-control custom-checkbox">
                                    <input data-name="<?php echo e($lang->name); ?>" type="checkbox" class="custom-control-input"
                                        value="<?php echo e($lang->id); ?>" name="lang[]" id="<?php echo e($lang->name); ?>">
                                    <label class="custom-control-label" for="<?php echo e($lang->name); ?>"><?php echo e($lang->name); ?></label>
                                </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
                                <?php $__currentLoopData = $subjects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subject): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="custom-control custom-checkbox">
                                    <input data-name="<?php echo e($subject->name); ?>" type="checkbox" class="custom-control-input"
                                        value="<?php echo e($subject->id); ?>" name="subject[]" id="<?php echo e($subject->name); ?>">
                                    <label class="custom-control-label"
                                        for="<?php echo e($subject->name); ?>"><?php echo e($subject->name); ?></label>
                                </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


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
                                <?php $__currentLoopData = $levels; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $level): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="custom-control custom-checkbox">
                                    <input data-name="<?php echo e($level->name); ?>" type="checkbox" class="custom-control-input"
                                        value="<?php echo e($level->id); ?>" name="level[]" id="<?php echo e($level->name); ?>">
                                    <label class="custom-control-label" for="<?php echo e($level->name); ?>"><?php echo e($level->name); ?></label>
                                </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                            </div>

                        </div>

                    </div>

                </div>
                <?php endif; ?>

                <div id="6" class="menu-wrapper footer">

                    <ul class="menu-list-pages">
                        <li class="menu-item-link">
                            <a href="<?php echo e(route('Policies','s')); ?>" aria-label="قوانین">
                                <div class="content">
                                    <span class="text">قوانین</span>
                                </div>
                            </a>
                        </li>
                        <li class="menu-item-link">
                            <a href="<?php echo e(route('Advert')); ?>" aria-label="تبلیغات">
                                <div class="content">
                                    <span class="text">تبلیغات</span>
                                </div>
                            </a>
                        </li>
                        <li class="menu-item-link">
                            <a href="<?php echo e(route('ContactUs')); ?>" aria-label="تماس با ما">
                                <div class="content">
                                    <span class="text">تماس با ما</span>
                                </div>
                            </a>
                        </li>

                        <li class="menu-item-link">
                            <a href="<?php echo e(route('Channels.List')); ?>" aria-label="کانال های رسمی">
                                <div class="content">
                                    <span class="text">کانال های رسمی</span>
                                </div>
                            </a>
                        </li>


                        <li class="menu-item-link">
                            <a href="<?php echo e(route('Testimonials')); ?>" aria-label="سوالات متداول">
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
            <div class="showall-wrapper">

                <?php echo $__env->yieldContent('content'); ?>
            </div>
                <section id="footer-section" style=" padding: 40px 0;position: relative;bottom:0;" class="list-item li stylish-color" data-list="slider">
                <div class="text-center text-white-50">
                    کلیه حقوق این سایت متعلق به ژن برتر میباشد
                </div>
                </section>
                <?php if(auth()->check()): ?>
                <div class="">
                    <ul class="side-function">
                        <li class="side-contact"><a href="#" class="note-link" rel="nofollow"><i
                                    class="fa fa-pencil fs-2"></i></a>
                        </li>
                    </ul>
                </div>
                <?php endif; ?>
           
        </div>


    </main>
  
       
   


    <script src="<?php echo e(asset('assets/js/bootstrap.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/owl.carousel.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/scripts.js')); ?>"></script>
    <script src="<?php echo e(route('BaseUrl')); ?>/assets/js/app.js"></script>
    <script src="<?php echo e(asset('assets/js/wow.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/toastr.min.js')); ?>"></script>
    <?php echo app('toastr')->render(); ?>
    <script>
        new WOW().init();
    </script>
    <script>
        $(document).ready(function () {
        var checkauth = '<?php echo e(auth()->user()); ?>';
     

        $('.note-link').click(function(){
            $('#notes').css({opacity: 1.0, visibility: "visible",left:"80px"});
        })
        $('.close-notes').click(function(e){
            e.preventDefault();
            $(this).parents('#notes').css({opacity: 0, visibility: "hidden",left:"-60px"});
        })

        $("#notes ul").stop().animate({ scrollTop: $("#notes ul")[0].scrollHeight}, 1000);

        $('#newnote').submit(function(e){
            e.preventDefault()
            var note = $(this).find('#text').val();
           
            if(note.length !== 0){
            $.ajax({
                    url: '<?php echo e(route('Note.Save')); ?>',
                    type: 'POST',
                    data: {note: note},
                    dataType: 'JSON',
                    cache: false,
                    success: function (res) {
                     
                        $('#text').val('')
                        $('#notes ul').append(res)
                        $("#notes ul").stop().animate({ scrollTop: $("#notes ul")[0].scrollHeight}, 1000);

                    }
                });
            }
        })
        $(document).on('click','.trash-note',function(e){
       
            e.preventDefault();
           
            var noteid = $(this).data('id')
            thiss = $(this)
            $.ajax({
                    url: '<?php echo e(route('Note.Delete')); ?>',
                    type: 'POST',
                    data: {id: noteid},
                    dataType: 'JSON',
                    cache: false,
                    success: function (res) {
                     thiss.parents('li').remove()
                    }
                });
        })


var request = false;
$(document).on('keyup','#searchinput',function(e){
    e.preventDefault()
    if($(this).val().length === 0) {
       
        $('#search--content').css({'visibility':'hidden','opacity':0})
        $('.search-widget').removeClass('has-suggest')
        
        
    }else{
        
    setTimeout(() => {
        if (!request) {
    
        request = true;
        let key = $(this).val();
        let url = '<?php echo e(route('SearchBar')); ?>';

          $.ajax({ 
               url: url,
               type: 'POST',
               data:{key:key},
               dataType: 'JSON', 
              
               success: function(res) {
                  $('#search--content').css({'visibility':'visible','opacity':1})
                  $('.search-widget').addClass('has-suggest')
                   $('#search--content ul').html(res)
                  
                //    $('.content-page').html(res[0])
                //    $('.paginate-item').html(res[1])
                   setTimeout(()=>{
                       request=false;
                   },500)
                   
               }
           
       })
       
     }
   },1000)
}
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
        
        var swiper = new Swiper('.swiper-container-clip', {

spaceBetween: 5,
nextButton: '.swiper-clip-p',
prevButton: '.swiper-clip-n',
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
            nextButton: '.swiper-learning-p',
            prevButton: '.swiper-learning-n',
           
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
        var music_slider = new Swiper('.swiper-container-podcast', {

spaceBetween: 5,
pagination: '.swiper-podcast-pagination',
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
            if ($(e.target).closest(".note-link").length == 0 && $(e.target).closest("#notes").length == 0) {
                
                $('#notes').css({opacity: 0, visibility: "hidden",left:"-60px"});

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
                    url: '<?php echo e(route('User.Follow')); ?>',
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
                window.location.href = "<?php echo e(route("login")); ?>"
            }
        });


       

        $('.like-comment').click(function (e) {
            e.preventDefault();
            if (checkauth) {
               

                let thiss = $(this)
                let url = '<?php echo e(route("LikeComment")); ?>';
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
                window.location.href = "<?php echo e(route("login")); ?>"

            }

        })
        $('.dislike-comment').click(function (e) {
            e.preventDefault();
            if (checkauth) {
              


                let thiss = $(this)
                let url = '<?php echo e(route("DisLikeComment")); ?>';
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
                window.location.href = "<?php echo e(route("login")); ?>"

            }

        })


    })


    $('.menu-show-more').click(function(e){
        e.preventDefault()
        if($(this).hasClass('less')){
            $(this).find('span').text('نمایش بیشتر')
            $(this).removeClass('less')

        }else{
            $(this).addClass('less')
        $(this).find('span').text('نمایش کمتر')
        }
        
    });


    </script>
    <?php echo $__env->yieldContent('js'); ?>
</body>

</html><?php /**PATH C:\xampp\htdocs\media\resources\views/layout/Main/template.blade.php ENDPATH**/ ?>