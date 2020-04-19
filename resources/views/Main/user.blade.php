@extends('layout.Main.template')

@section('content')
@php
    

@endphp
<div class="row">
    <div class="col-md-12">
        <header class="channel-header">
            <section class="cover-wrapper">
                
                <div class="cover" style="background-image: url(https://static.cdn.asset.aparat.com/profile-cover/349868_5219.jpg); background-position: center;"></div>
                <div class="wrapper">
                    
                    <ul class="socials">
                        <li class="social">
                            <a href="/rss/Digiato" title="RSS" target="_blank" aria-label="RSS"><svg class="icon icon-rss" viewBox="0 0 24 24" 0="" 24="" 24""=""><use xlink:href="#si_rss"></use></svg></a>
                            </li>
                                                <li class="social">
                                <a href="http://www.digiato.com" title="آدرس اینترنتی" target="_blank" aria-label="آدرس اینترنتی"><svg class="icon icon-earth" viewBox="0 0 24 24" 0="" 24="" 24""=""><use xlink:href="#si_earth"></use></svg></a>
                                </li>
                                                <li class="social">
                                <a href="http://www.facebook.com/digiato" title="فیسبوک" target="_blank" aria-label="فیسبوک"><svg class="icon icon-facebook" viewBox="0 0 24 24" 0="" 24="" 24""=""><use xlink:href="#si_facebook"></use></svg></a>
                                </li>
                                                <li class="social">
                                <a href="http://www.telegram.me/digiato" title="تلگرام" target="_blank" aria-label="تلگرام"><svg class="icon icon-telegram" viewBox="0 0 24 24" 0="" 24="" 24""=""><use xlink:href="#si_telegram"></use></svg></a>
                                </li>
                                                <li class="social">
                                <a href="http://www.twitter.com/digiato" title="تویتتر" target="_blank" aria-label="تویتتر"><svg class="icon icon-twitter" viewBox="0 0 24 24" 0="" 24="" 24""=""><use xlink:href="#si_twitter"></use></svg></a>
                                </li>
                                        </ul>
                </div>
            </section>
            <section class="details-row">
                <div class="wrapper">
                    <div class="details">
                        <div class="item">
                            <div class="avatar">
        
                <a href="/Digiato" class="picture image"><img src="https://static.cdn.asset.aparat.com/profile-photo/349868-m.jpg" class=" avatar-img"></a>
                
                <div class="channel-title">
                                    <a id="channelTitle" href="/Digiato" title="دیجیاتو"><h3 class="title">
                                            <span class="name">دیجیاتو</span>
                                            <span class="priority-brand" title="رسمی">
            <svg class="icon icon-tick icon-priority" viewBox="0 0 24 24" 0="" 24="" 24""=""><use xlink:href="#si_tick"></use></svg>    </span>
                                        </h3></a>
                                                                    </div>
        </div>                                                                                    
                                    <a href="/login?afterlogin=follow&amp;userid=349868" title="دیجیاتو" class="button follow-button-349868 button-small follow-btn" data-target="#txWrapper" data-insert="replace" data-channel-follow="" data-userid="349868" data-username="Digiato" data-status="login"><svg class="icon icon-add" viewBox="0 0 24 24" 0="" 24="" 24""=""><use xlink:href="#si_add"></use></svg>        <span class="text">دنبال کردن</span></a>
                                                                                </div>
    
                        <div class="item">
                                                        <div class="stat">
                                    
                                    <span class="number channel-followers-349868">16 هزار</span>
                                    <span class="text">دنبال‌ کننده</span>
                                </div>
                                <div class="stat">
                                    <span class="number">18.7 میلیون</span>
                                    <span class="text">بازدید ویدیو</span>
                                </div>
                                                </div>
                    </div>
                </div>
            </section>
        </header>

{{-- content --}}





    </div>
</div>





@endsection
@section('css')
<link rel="stylesheet" href=" {{asset('assets/css/channel.css')}} ">

@endsection