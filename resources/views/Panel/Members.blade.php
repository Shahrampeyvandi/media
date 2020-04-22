@extends('layout.Panel.temp')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div>

            <a href="{{route('Panel.Members')}}" @if (request()->path() == "panel/members")
                class="btn btn-info" @else class="btn btn-light"  @endif>دانشجویان</a>
            <a href="{{route('Panel.Members','teacher')}}" @if (request()->path() == "panel/members/teacher")
                class="btn btn-info" @else class="btn btn-light"  @endif>اساتید</a>
            <a href="{{route('Panel.Members','deactive')}}" @if (request()->path() == "panel/members/deactive")
                class="btn btn-info" @else class="btn btn-light"  @endif>غیر فعال</a>


            <a href="#"></a>
        </div>
        <hr>
    </div>
</div>

<div class="col-sm-9 col-sm-offset-3 col-md-12  ">
    <div class="wpb_wrapper py-3">
        <h2 class="  mt-15 mb-15 title__divider title__divider--line"
            style="margin-right: 0px;"><span class="title__divider__wrapper">کاربران<span
                    class="line brk-base-bg-gradient-right"></span>
            </span></h2>
     
    </div>
    <div style="overflow-x: auto;">
        <table id="example1" class="table table-striped  table-bordered">
            <thead>
            <tr>
                <th>ردیف</th>
                <th>نام </th>
                <th>نام خانوادگی</th>

                <th>موبایل</th>
                <th>یوزرنیم</th>
                <th>ایمیل</th>
                <th>تاریخ عضویت</th>
                <th>وضعیت</th>
                <th>عملیات</th>

            </tr>
            </thead>

            <tbody>
            @foreach($members as $key=>$member)
            <tr>
            <td>{{$key+1}}</td>
            <td>{{$member->firstname}}</td>
            <td>{{$member->lastname}}</td>
            <td>{{$member->mobile}}</td>
            <td>{{$member->username}}</td>
            <td>{{$member->email}}</td>
            <td>{{\Morilog\Jalali\Jalalian::forge($member->created_at)->format('%d %B %Y')}}</td>
            @switch($member->confirmed)
            @case(0)
            <td>در انتظار تایید</td>
            <td>تایید  -  رد</td>
            @break
            @case(1)
            <td>فعال</td>
            <td>غیر فعال کردن</td>
            @break
            @case(2)
            <td>غیر فعال</td>
            <td>فعال کردن</td>
            @break
            @endswitch
            

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