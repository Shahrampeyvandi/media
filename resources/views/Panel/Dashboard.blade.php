@extends('layout.Panel.temp')

@section('content')
<div class="container-fluid boxShadow p-5">

    <div class="row justify-content-center">
        <div class="col-lg-3 col-sm-6 my-3">
            <!-- small box -->
            @if (auth()->user()->is_admin())
            <a href="{{route('Panel.Posts.All')}}">
            @else 

            <a href="{{route('MyVideos')}}">
            @endif
                <div class="small-box"
                    style="  padding: 21px;   box-shadow: 0 6px 20px 0 rgba(255,202,40,.5)!important; background: linear-gradient(-45deg,#ff6f00,#ffca28)!important;color: #fff;border-radius: 7px;">
                    <div class="inner ">
                        <h3 class="text-white">{{$countfilms}}</h3>
                        <p class="text-white fs-1-5">فیلم و سریال </p>
                    </div>
                    <div class="fs-2">
                        <i class="fas fa-video"></i>
                    </div>
                </div>
            </a>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-sm-6 my-3">
            <!-- small box -->
            @if (auth()->user()->is_admin())
            <a href="{{route('Panel.Posts.All','animations')}}">
            @else 

            <a href="{{route('MyVideos','animations')}}">
                @endif
                <div class="small-box" style="    padding: 20px;
                    box-shadow: 0 6px 20px 0 #71ec62 !important;
                    background: linear-gradient(-45deg,#2a9c05,#71ec62)!important;                    color: #fff;
                    border-radius: 7px;">
                    <div class="inner">
                        <h3 style="color: white !important;">{{$countanimations}}<sup style="font-size: 20px"></sup>
                        </h3>
                        <p class="text-white fs-1-5">انیمیشن </p>
                    </div>
                    <div class="fs-2">
                        <i class="fas fa-radiation-alt"></i>
                    </div>
                </div>
            </a>
        </div>
        <!-- ./col -->
        <!-- ./col -->
        <div class="col-lg-3 col-sm-6 my-3">
            <!-- small box -->
            @if (auth()->user()->is_admin())
            <a href="{{route('Panel.Posts.All','clips')}}">
            @else 

            <a href="{{route('MyVideos','clips')}}">
                @endif
                <div class="small-box" style="    padding: 20px;
                   box-shadow: 0 6px 20px 0 #bb52e6!important;
    background: linear-gradient(-45deg,#70059c,#bb52e6)!important;
                    color: #fff;
                    border-radius: 7px;">
                    <div class="inner">
                        <h3 style="color: white !important;">{{$countclips}}<sup style="font-size: 20px"></sup>
                        </h3>
                        <p class="text-white fs-1-5">ژن پلاس</p>
                    </div>
                    <div class="fs-2">
                        <i class="fas fa-film"></i>
                    </div>
                </div>
            </a>
        </div>
        <!-- ./col -->
        <!-- ./col -->
        <div class="col-lg-3 col-sm-6 my-3">
            <!-- small box -->
            @if (auth()->user()->is_admin())
            <a href="{{route('Panel.Posts.All','musics')}}">
            @else 

            <a href="{{route('MyAudios')}}">
                @endif
                <div class="small-box" style="    padding: 20px;
                    box-shadow: 0 6px 20px 0 #f971a3 !important;
                    background: linear-gradient(-45deg,#de0067,#f1689a)!important;                   color: #fff;
                    border-radius: 7px;">
                    <div class="inner">
                        <h3 style="color: white !important;">{{$countmusics}}<sup style="font-size: 20px"></sup>
                        </h3>
                        <p class="text-white fs-1-5">موسیقی </p>
                    </div>
                    <div class="fs-2">
                        <i class="fas fa-music"></i>
                    </div>
                </div>
            </a>
        </div>
        <!-- ./col -->
        <!-- ./col -->
        <div class="col-lg-3 col-sm-6 my-3">
            <!-- small box -->
                @if (auth()->user()->is_admin())
                <a href="{{route('Panel.Posts.All','podcasts')}}">
                @else 
    
                <a href="{{route('MyAudios','podcasts')}}">
                    @endif
                <div class="small-box" style="    padding: 20px;
                    box-shadow: 0 6px 20px 0 rgba(255, 53, 19, 0.5)!important;
                    background: linear-gradient(-45deg,#9c1405,#e91d26)!important;
                    color: #fff;
                    border-radius: 7px;">
                    <div class="inner">
                        <h3 style="color: white !important;">{{$countpodcasts}}<sup style="font-size: 20px"></sup>
                        </h3>
                        <p class="text-white fs-1-5">پادکست </p>
                    </div>
                    <div class="fs-2">
                        <i class="fas fa-compact-disc"></i>
                    </div>
                </div>
            </a>
        </div>
        <!-- ./col -->
        <!-- ./col -->
        @if (auth()->user()->group !== "student")
        <div class="col-lg-3 col-sm-6 my-3">
            <!-- small box -->
            @if (auth()->user()->is_admin())
            <a href="{{route('Panel.Posts.All','learnings')}}">
            @else 

            <a href="{{route('MyTutorials')}}">
                @endif
            
            
            <div class="small-box" style="    padding: 20px;
                      box-shadow: 0 6px 20px 0 #ff88e0!important;
                      background: linear-gradient(-45deg,#bb057b,#ff88e0)!important;                   color: #fff;
                    border-radius: 7px;">
                        <div class="inner">
                            <h3 style="color: white !important;">{{$countlearnings}}<sup style="font-size: 20px"></sup>
                            </h3>
                            <p class="text-white fs-1-5">دوره آموزشی</p>
                        </div>
                        <div class="fs-2">
                            <i class="fas fa-cubes"></i>
                        </div>
                    </div>
                </a>
        </div>
                @else
                    @endif

        <!-- ./col -->
        <div class="col-lg-3 col-sm-6 my-3">
            <!-- small box -->
            @if (auth()->user()->is_admin())
            <a href="{{route('Panel.Comments.All')}}">
                @else
                <a href="{{route('Panel.Comments')}}">
                    @endif
                    <div class="small-box"
                        style="padding:20px; box-shadow: 0 6px 20px 0 rgba(29,233,182,.5)!important; background: linear-gradient(-45deg,#43a047,#1de9b6)!important; color: #fff;border-radius: 7px;">
                        <div class="inner">
                            <h3 style="color: white !important;">{{$countcomments}}</h3>

                            <p class="text-white fs-1-5">دیدگاه ها</p>
                        </div>
                        <div class="fs-2">
                            <i class="fas fa-comments"></i>
                        </div>
                    </div>
                </a>
        </div>
        {{-- <div class="col-lg-3 col-sm-6 my-3">
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
        </div> --}}
        <div class="col-lg-3 col-sm-6 my-3">
            <!-- small box -->
            <div class="small-box" style="border-radius: 7px;
                            padding: 21px;
                            box-shadow: 0 8px 20px 0px rgba(38,198,218,.5)!important;
                            background: linear-gradient(-45deg,#0288d1,#26c6da)!important;
                        ">
                <div class="inner">
                <h3 style="color: white !important;">{{$followers}}</h3>

                    <p class="text-white fs-1-5">دنبال کننده ها</p>
                </div>
                <div class="fs-2 text-white">
                    <i class="fas fa-users"></i>
                </div>
            </div>
        </div>
    </div>
 @if (auth()->user()->group == 'admin')
 <div class="row mt-5">
    <div class="col-md-6 offset-md-3">
        <canvas id="visits" width="400" height="400"></canvas>

    </div>
</div>
 @endif
    <div class="row mt-5">
        <div class="col-md-6 offset-md-3">
            <canvas id="fileschart" width="400" height="400"></canvas>

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
@section('js')
<script src="{{asset('Panel/vendor/chartjs/Chart.min.js')}}"></script>
<script>
    var ctx = document.getElementById('visits');
    var ctx1 = document.getElementById('fileschart');

    window.chartColors = {
	red: 'rgb(255, 99, 132)',
	orange: 'rgb(255, 159, 64)',
	yellow: 'rgb(255, 205, 86)',
	green: 'rgb(75, 192, 192)',
	blue: 'rgb(54, 162, 235)',
	purple: 'rgb(153, 102, 255)',
	grey: 'rgb(201, 203, 207)'
};
    var details = {
                steppedLine: false,
				label: 'بازدیدهای سایت در یک هفته اخیر',
                color: window.chartColors.red
            }
            var myChart = new Chart(ctx1, {
    type: 'bar',
    data: {
        labels: <?php echo $cats_json ?>,
        datasets: [{
            label: <?php echo json_encode($label) ?>,
            data: <?php echo $counts_json ?>,
            backgroundColor: [
                window.chartColors.blue,
                window.chartColors.blue,
                window.chartColors.blue,
                window.chartColors.blue,
                window.chartColors.blue,
                window.chartColors.blue
            ],
           
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    }
});

    var myChart = new Chart(ctx, {
        type: 'line',
				data: {
					labels: <?php echo $day_json ?>,
					datasets: [{
						label: 'تعداد بازدیدها: ',
						steppedLine: details.steppedLine,
						data:<?php echo $visits_json ?>,
						borderColor: details.color,
						fill: false,
					}]
				},
                options: {
					responsive: true,
					title: {
						display: true,
						text: details.label,
					}
				}
    });

 
</script>
@endsection