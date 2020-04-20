@extends('layout.Panel.temp')

@section('content')
<div class="col-sm-9 col-sm-offset-3 col-md-12  ">
    <div class="wpb_wrapper py-3">
        <h2 class="  mt-15 mb-15 title__divider title__divider--line"
            style="margin-right: 0px;"><span class="title__divider__wrapper">وضعیت دیدگاه های من<span
                    class="line brk-base-bg-gradient-right"></span>
            </span></h2>
     
    </div>
    <div style="overflow-x: auto;">
        <table id="example1" class="table table-striped  table-bordered">
            <thead>
            <tr>
                <th>ردیف</th>
                <th style="width: 600px"> متن پیام</th>
                <th>برای نظر</th>
                <th>وضعیت</th>
                <th>تاریخ ثبت</th>

            </tr>
            </thead>
            <tbody>
            @foreach($member->comments as $key=>$comment)
            <tr>
            <td>{{$key+1}}</td>
            <td>{!!$comment->text!!}</td>
           <td> <a href="{{route('ShowItem',['id'=>$comment->posts->id])}}">{{$comment->posts->title}}<a></td>
            @if($comment->confirmed == 0)
            <td>تایید نشده</td>
            @else
            <td>تایید شده</td>
            @endif
            <td>{{\Morilog\Jalali\Jalalian::forge($comment->created_at)->format('%d %B %Y')}}</td>
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