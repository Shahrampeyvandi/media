@extends('layout.Main.template')

@section('content')

<div class="row">
    <div class="col-md-12">
        @include('Includes.Channel.header')
        <h3 class="mt-5">
            <span class="mr-3 d-inline-block pr-1 pb-2" style="border-bottom: 3px solid gray;"> همه چیز درباره کانال
                ...</span>
        </h3>

        <div class="pr-3 my-3">
            @if (auth()->user()->channelInformations->content !== null)

            {!! auth()->user()->channelInformations->content !!}
            @else
            هیچ اطلاعاتی وارد نشده است
            @endif
        </div>
        <h4 class="mt-5">
            <span class="mr-3 d-inline-block pr-1 pb-2">لینک های مرتبط</span>
        </h4>
        <div class="other links d-flex justify-content-start mx-3">
            @if (auth()->user()->channelInformations->link_telegram)

            <a href="{{auth()->user()->channelInformations->link_telegram}}" class="ml-2"><i class="fa fa-circle"></i>
                تلگرام </a>
            @endif
            @if (auth()->user()->channelInformations->link_whatsapp)
            <a href="{{auth()->user()->channelInformations->link_whatsapp}}" class="ml-2"><i class="fa fa-circle"></i> واتس اپ</a>
            @endif
            @if (auth()->user()->channelInformations->link_instagram)
            <a href="{{auth()->user()->channelInformations->link_instagram}}" class="ml-2"><i class="fa fa-circle"></i> اینستاگرام</a>
            @endif
            @if (auth()->user()->channelInformations->link_linkedin)
            <a href="{{auth()->user()->channelInformations->link_linkedin}}" class="ml-2"><i class="fa fa-circle"></i> لینکدین</a>
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
    var swiper = new Swiper('.swiper-container-channel', {
          
        spaceBetween: 5,
            nextButton: '.swiper-user-one',
           prevButton: '.swiper-user-two',
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
    var swiper = new Swiper('.swiper-container-channel2', {
          
          spaceBetween: 5,
              nextButton: '.swiper-channel2-one',
             prevButton: '.swiper-channel2-two',
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
</script>
@endsection