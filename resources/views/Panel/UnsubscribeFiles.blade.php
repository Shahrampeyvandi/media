@extends('layout.Panel.temp')

@section('content')
{{-- <div class="row">
    <div class="col-md-12">
        <div>
            <a href="{{route('MyAudios')}}" class="btn btn-info">موسیقی ها</a>
            <a href="{{route('MyAudios','podcasts')}}" class="btn btn-light"> پادکست ها</a>
            <a href="#"></a>
        </div>
        <hr>
    </div>
</div> --}}

{{-- <div class="row">
    <div class="col-md-12">
        <h4 class="mb-3">کلیپ ها</h4>
    </div>
</div> --}}
<div class="wpb_wrapper py-3">
    <h2 class="  mt-15 mb-15 title__divider title__divider--line"
        style="margin-right: 0px;"><span class="title__divider__wrapper">وضعیت فایل های منتشر نشده<span
                class="line brk-base-bg-gradient-right"></span>
        </span></h2>
 
</div>
<div class="row">
<div class="col-sm-9 col-sm-offset-3 col-md-12 mt-3 ">
   
    <div style="overflow-x: auto;">
        <table id="example1" class="table table-striped  table-bordered">
            <thead>
            <tr>
                <th>ردیف</th>
                <th> عنوان</th>
                <th style="width: 600px"> دلیل عدم تایید</th>
                <th>تاریخ ارسال</th>
            </tr>
            </thead>

            <tbody>
            @foreach($posts as $key=>$post)
            <tr>

            <th>{{$key+1}}</th>
            <th>{{$post->title}}</th>
            <th>{{$post->rejectreason}}</th>
            <th>{{\Morilog\Jalali\Jalalian::forge($post->created_at)->format('%d %B %Y')}}</th>

            </tr>

            @endforeach
          
          
            </tbody>
        </table>
    </div>
    <div style="text-align: center">
        
    </div>
</div>
</div>


@endsection

@section('js')

@endsection