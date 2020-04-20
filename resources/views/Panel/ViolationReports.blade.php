@extends('layout.Panel.temp')

@section('content')
<div class="col-sm-9 col-sm-offset-3 col-md-12  ">
    <div class="wpb_wrapper py-3">
        <h2 class="  mt-15 mb-15 title__divider title__divider--line"
            style="margin-right: 0px;"><span class="title__divider__wrapper"> گزارشات تخلف پست ها<span
                    class="line brk-base-bg-gradient-right"></span>
            </span></h2>
     
    </div>
    <div style="overflow-x: auto;">
        <table id="example1" class="table table-striped  table-bordered">
            <thead>
            <tr>
                <th>ردیف</th>
                <th style="width: 600px">پست</th>
                <th > مشکل</th>
                <th > کاربر گزارش دهنده</th>
                <th > تاریخ ثبت</th>

            </tr>
            </thead>

            <tbody>
            @foreach($reports as $key=>$report)
            <tr>
            <td>{{$key+1}}</td>
            <td><a href="{{route('ShowItem',$report->posts_id)}}">
            {{$report->posts->title}}
            </a>
            </td>
            <td>{{$report->info}}</td>
            <td>
            {{$report->members->username}}
            </td>
            <td>{{\Morilog\Jalali\Jalalian::forge($report->created_at)->format('%d %B %Y')}}</td>

           </tr>
            @endforeach
         

          
          
            </tbody>
        </table>
    </div>
    <div style="text-align: center">
        
    </div>
</div>
@endsection
@section('css')
   
@endsection

@section('js')


@endsection