<header class="channel-header">
    <section class="cover-wrapper">

        <?php if(\App\Models\Members\ChannelInformations::where('members_id',auth()->id())->first() && $url = \App\Models\Members\ChannelInformations::where('members_id',auth()->id())->first()->image ): ?>
        <div class="cover"
            style="background-image: url(<?php echo e(asset($url)); ?>); background-position: center;">
        </div>
        <?php else: ?> 
        <div class="cover"
            style="background-image: url(<?php echo e(asset('assets/images/edu.jpg')); ?>); background-position: center;">
        </div>   
        <?php endif; ?>
        <div class="wrapper">

            <?php if(!is_null(\App\Models\Members\ChannelInformations::where('members_id',auth()->id())->first())): ?>
            <ul class="socials">


                <li class="social">
                    <a href="<?php echo e(\App\Models\Members\ChannelInformations::where('members_id',auth()->id())->first()->link_whatsapp); ?>"
                        class="social-icons" title="whatsapp" target="_blank"><i class="fa fa-whatsapp"></i></a>
                </li>
                <li class="social">
                    <a href="<?php echo e(\App\Models\Members\ChannelInformations::where('members_id',auth()->id())->first()->link_telegram); ?>"
                        class="social-icons" title="telegram" target="_blank"><i class="fa fa-telegram"></i></a>
                </li>
                <li class="social">
                    <a href="<?php echo e(\App\Models\Members\ChannelInformations::where('members_id',auth()->id())->first()->link_instagram); ?>"
                        class="social-icons" title="instagram" target="_blank"><i class="fa fa-instagram"></i></a>
                </li>

            </ul>
            <?php endif; ?>
        </div>
    </section>
    <section class="details-row">
        <div class="wrapper">
            <div class="details">
                <div class="item">
                    <div class="avatar">

                        <a href="<?php echo e(route('User.Show',['name'=>$member->username])); ?>" class="picture image">
                            
                            <i class="fa fa-user channel-pic"></i>

                        </a>

                        <div class="channel-title">
                            <a id="channelTitle" href="<?php echo e(route('User.Show',['name'=>$member->username])); ?>"
                                title="<?php echo e($member->username); ?>">
                                <h3 class="title">
                                    <span class="name"><?php echo e($member->username); ?></span>

                                </h3>
                            </a>
                        </div>
                    </div>
                    <a href="#" title="" data-id="<?php echo e($member->id); ?>"
                        class="follow-link button follow-button-349868 button-small follow-btn mr-2 mt-0">
                        <?php if($checkfollow): ?>
                        <span class="text">دنبال میکنید</span>
                        <?php else: ?>
                        <svg class="icon icon-add" viewBox="0 0 24 24" 0="" 24="" 24""="">
                            <use xlink:href="#si_add">
                                <g id="si_add" data-viewBox="0 0 24 24">
                                    <path d="M19 13h-6v6h-2v-6H5v-2h6V5h2v6h6z"></path>
                                    <path d="M0 0h24v24H0z" fill="none"></path>
                                </g>
                            </use>
                        </svg>
                        <span class="text">دنبال کردن</span>
                        <?php endif; ?>
                    </a>
                </div>

                <div class="item">
                    <div class="stat">

                        <span class="number channel-followers-349868"><?php echo e(count($member->followers)); ?></span>
                        <span class="text">دنبال‌ کننده</span>
                    </div>
                    <div class="stat">
                        <span class="number"><?php echo e(count($member->followings)); ?></span>
                        <span class="text">دنبال شونده</span>
                    </div>
                </div>
            </div>
        </div>
    </section>
</header>
<section class="main mt-5">

    <div class="tabs d-flex flex-wrap pr-2">
        <a href="<?php echo e(route('User.Show',['name'=>$member->username,'slug'=>''])); ?>"
            class="tabs push_btn ml-2 px-2 mb-2 <?php if(Request::url() == route('User.Show',['name'=>$member->username,'slug'=>''])): ?> active <?php endif; ?>">فیلم
            ها</a>
        <a href="<?php echo e(route('User.Show',['name'=>$member->username,'slug'=>'animations'])); ?>"
            class="tabs push_btn ml-2 px-2 mb-2 <?php if(Request::url() == route('User.Show',['name'=>$member->username,'slug'=>'animations'])): ?> active <?php endif; ?>">انیمیشن
            ها</a>
        <a href="<?php echo e(route('User.Show',['name'=>$member->username,'slug'=>'genplus'])); ?>"
            class="tabs push_btn ml-2 px-2 mb-2 <?php if(Request::url() == route('User.Show',['name'=>$member->username,'slug'=>'genplus'])): ?> active <?php endif; ?>">ژن پلاس
            ها</a>
        <a href="<?php echo e(route('User.Show',['name'=>$member->username,'slug'=>'musics'])); ?>"
            class="tabs push_btn ml-2 px-2 mb-2 <?php if(Request::url() == route('User.Show',['name'=>$member->username,'slug'=>'musics'])): ?> active <?php endif; ?>">موسیقی
            ها</a>
        <a href="<?php echo e(route('User.Show',['name'=>$member->username,'slug'=>'podcasts'])); ?>"
            class="tabs push_btn ml-2 px-2 mb-2 <?php if(Request::url() == route('User.Show',['name'=>$member->username,'slug'=>'podcasts'])): ?> active <?php endif; ?>">پادکست
            ها</a>
        <a href="<?php echo e(route('User.Show',['name'=>$member->username,'slug'=>'tutorial'])); ?>"
            class="tabs push_btn ml-2 px-2 mb-2 <?php if(Request::url() == route('User.Show',['name'=>$member->username,'slug'=>'tutorial'])): ?> active <?php endif; ?>">دوره
            های آموزشی</a>
        <?php if(auth()->user()->approved == 1 || auth()->user()->group == "admin"): ?>

        <a href="<?php echo e(route('User.About',['name'=>$member->username])); ?>" <?php if(request()->route()->getName() == "User.About"): ?>
            class="tabs push_btn active ml-2 px-2 mb-2" <?php else: ?> class="tabs push_btn ml-2 px-2 mb-2" <?php endif; ?> >درباره
            کانال</a>
        <?php endif; ?>

    </div>

</section><?php /**PATH C:\xampp\htdocs\media\resources\views/Includes/Channel/header.blade.php ENDPATH**/ ?>