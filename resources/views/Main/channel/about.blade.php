@extends('layout.Main.template')

@section('content')

<div class="row">
    <div class="col-md-12">
        @include('Includes.Channel.header')
       <h3 class="mt-5">
          <span class="mr-3 d-inline-block pr-1 pb-2" style="border-bottom: 3px solid gray;"> همه چیز درباره کانال ...</span>
       </h3>

       <div>
           {{-- !! content !! --}}
           {! content !}
       </div>
       <h4 class="mt-5">
        <span class="mr-3 d-inline-block pr-1 pb-2" >لینک های مرتبط</span>
     </h4>
       <div class="other links d-flex justify-content-start mx-3">
            <a href="#" class="ml-2"><i class="fa fa-circle"></i> تلگرام </a>
            <a href="#" class="ml-2"><i class="fa fa-circle"></i> توییتر</a>
            <a href="#" class="ml-2"><i class="fa fa-circle"></i> اینستاگرام</a>
            <a href="#" class="ml-2"><i class="fa fa-circle"></i> وبسایت</a>

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