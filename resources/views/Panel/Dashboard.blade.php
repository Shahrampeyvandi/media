@extends('layout.Panel.temp')

@section('content')
<div class="container-fluid boxShadow p-5">

    <div class="row justify-content-center">
        <div class="col-lg-3 col-xs-6 my-3">
            <!-- small box -->
            <a href="{{route('MyVideos')}}">
                <div class="small-box"
                    style="  padding: 21px;   box-shadow: 0 6px 20px 0 rgba(255,202,40,.5)!important; background: linear-gradient(-45deg,#ff6f00,#ffca28)!important;color: #fff;border-radius: 7px;">
                    <div class="inner ">
                        <h3 class="text-white">{{$countfilms}}</h3>
                        <p class="text-white fs-1-5">فیلم ها</p>
                    </div>
                    <div class="fs-2">
                        <i class="fas fa-exclamation"></i>
                    </div>
                </div>
            </a>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6 my-3">
            <!-- small box -->
            <a href="{{route('MyVideos','animations')}}">
                <div class="small-box" style="    padding: 20px;
                    box-shadow: 0 6px 20px 0 #71ec62 !important;
                    background: linear-gradient(-45deg,#2a9c05,#71ec62)!important;                    color: #fff;
                    border-radius: 7px;">
                    <div class="inner">
                        <h3 style="color: white !important;">{{$countanimations}}<sup style="font-size: 20px"></sup>
                        </h3>
                        <p class="text-white fs-1-5">انیمیشن ها</p>
                    </div>
                    <div class="fs-2">
                        <i class="fas fa-cubes"></i>
                    </div>
                </div>
            </a>
        </div>
        <!-- ./col -->
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6 my-3">
            <!-- small box -->
            <a href="{{route('MyVideos','clips')}}">
                <div class="small-box" style="    padding: 20px;
                   box-shadow: 0 6px 20px 0 #bb52e6!important;
    background: linear-gradient(-45deg,#70059c,#bb52e6)!important;
                    color: #fff;
                    border-radius: 7px;">
                    <div class="inner">
                        <h3 style="color: white !important;">{{$countclips}}<sup style="font-size: 20px"></sup>
                        </h3>
                        <p class="text-white fs-1-5">کلیپ ها</p>
                    </div>
                    <div class="fs-2">
                        <i class="fas fa-cubes"></i>
                    </div>
                </div>
            </a>
        </div>
        <!-- ./col -->
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6 my-3">
            <!-- small box -->
            <a href="{{route('MyAudios')}}">
            <div class="small-box" style="    padding: 20px;
                    box-shadow: 0 6px 20px 0 #f971a3 !important;
                    background: linear-gradient(-45deg,#9c054b,#f971a3)!important;                    color: #fff;
                    border-radius: 7px;">
                <div class="inner">
                    <h3 style="color: white !important;">{{$countmusics}}<sup style="font-size: 20px"></sup>
                    </h3>
                    <p class="text-white fs-1-5">موسیقی ها</p>
                </div>
                <div class="fs-2">
                    <i class="fas fa-cubes"></i>
                </div>
            </div>
            </a>
        </div>
        <!-- ./col -->
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6 my-3">
            <!-- small box -->
            <a href="{{route('MyAudios','podcasts')}}">
            <div class="small-box" style="    padding: 20px;
                    box-shadow: 0 6px 20px 0 rgba(255, 53, 19, 0.5)!important;
                    background: linear-gradient(-45deg,#9c1405,#e91d26)!important;
                    color: #fff;
                    border-radius: 7px;">
                <div class="inner">
                    <h3 style="color: white !important;">{{$countpodcasts}}<sup style="font-size: 20px"></sup>
                    </h3>
                    <p class="text-white fs-1-5">پادکست ها</p>
                </div>
                <div class="fs-2">
                    <i class="fas fa-cubes"></i>
                </div>
            </div>
            </a>
        </div>
        <!-- ./col -->
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6 my-3">
            <!-- small box -->
            @if (auth()->user()->group !== "student")
            <a href="{{route('MyTutorials')}}">
            @else
            <a href="#">
            @endif
           
            <div class="small-box" style="    padding: 20px;
                    box-shadow: 0 6px 20px 0 #f5e259 !important;
                    background: linear-gradient(-45deg,#b38400,#f5e259)!important;                    color: #fff;
                    border-radius: 7px;">
                <div class="inner">
                    <h3 style="color: white !important;">{{$countlearnings}}<sup style="font-size: 20px"></sup>
                    </h3>
                    <p class="text-white fs-1-5">دوره های آموزشی</p>
                </div>
                <div class="fs-2">
                    <i class="fas fa-cubes"></i>
                </div>
            </div>
        </a>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6 my-3">
            <!-- small box -->
            @if (auth()->user()->group == "admin")
            <a href="{{route('Panel.Comments.All')}}">
            @else
            <a href="{{route('Panel.Comments')}}">
            @endif
            <div class="small-box"
                style="padding:20px; box-shadow: 0 6px 20px 0 rgba(29,233,182,.5)!important; background: linear-gradient(-45deg,#43a047,#1de9b6)!important; color: #fff;border-radius: 7px;">
                <div class="inner">
                    <h3>{{$countcomments}}</h3>

                    <p class="text-white fs-1-5">دیدگاه ها</p>
                </div>
                <div class="fs-2">
                    <i class="fas fa-dice-d20"></i>
                </div>
            </div>
            </a>
        </div>
        <div class="col-lg-3 col-xs-6 my-3">
            <!-- small box -->
            <div class="small-box"
                style=" 
                                    border-radius: 7px;
                                    padding: 21px;
                                    box-shadow: 0 6px 20px 0 rgba(244,143,177,.5)!important; background: linear-gradient(-45deg,#ff5252,#f48fb1)!important;">
                <div class="inner">
                    <h3 style="color: white !important;">0<sup style="font-size: 20px"></sup>
                    </h3>

                    <p class="text-white fs-1-5"> بازدید های امروز</p>
                </div>
                <div class="fs-2 text-white">
                    <i class="fas fa-file"></i>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-xs-6 my-3">
            <!-- small box -->
            <div class="small-box" style="border-radius: 7px;
                            padding: 21px;
                            box-shadow: 0 8px 20px 0px rgba(38,198,218,.5)!important;
                            background: linear-gradient(-45deg,#0288d1,#26c6da)!important;
                        ">
                <div class="inner">
                    <h3 style="color: white !important;">0</h3>

                    <p class="text-white fs-1-5">دنبال کننده ها</p>
                </div>
                <div class="fs-2 text-white">
                    <i class="fas fa-users"></i>
                </div>
            </div>
        </div>
    </div>
</div>
@if (auth()->user()->group !== 'admin')
<div class="container-fluid ">
    <div style="    box-shadow: 0px 11px 21px #DDD;
            padding: 7px;" class="col-md-12  m-auto col-md-offset-2">

        <h4 class=" text-center text-muted " style="margin-bottom: 20px;">گفتگو</h4>

    </div>
    <div class="chat col-md-12">

        <div class="chat col-md-6 offset-md-3 bg-secondary text-light mt-5 py-3 radius-5">
            <p class="text-white"> وقت بخیر </p>
            <p class="text-white">
                شما می توانید با ارسال پیام با مدیریت در ارتباط باشید</p>

        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-8  mb-5">
            <form action="{{route('Message.Send')}}" method="post">
                @csrf
                <div class="row " style="align-items: center">
                    <div class="col-md-12">
                        <h3 class="mb-2 fs-1">متن پیام: </h3>
                        <div class="form-group">

                            <textarea class="form-control" required="" name="message" id="" rows="4"></textarea>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group text-center">
                            <button type="submit" class="btn btn-sm btn-primary">ارسال</button>
                        </div>
                    </div>

                </div>
            </form>
        </div>
    </div>
</div>
@endif

@endsection