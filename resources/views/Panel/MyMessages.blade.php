@extends('layout.Panel.temp')

@section('content')
<div class="col-sm-9 col-sm-offset-3 col-md-12  ">
    <div class="wpb_wrapper py-3">
        <h2 class="  mt-15 mb-15 title__divider title__divider--line"
            style="margin-right: 0px;"><span class="title__divider__wrapper"> پیام های من<span
                    class="line brk-base-bg-gradient-right"></span>
            </span></h2>
     
    </div>
    <div style="overflow-x: auto;">
        <table id="example1" class="table table-striped  table-bordered w-100">
            <thead>
            <tr>
                <th>ردیف</th>
                <th style="">پیام شما</th>
                <th >پاسخ مدیریت</th>
                <th >تاریخ ثبت</th>
                <th>عملیات</th>
            </tr>
            </thead>

            <tbody>
            @foreach($messages as $key=>$message)
            <tr>
            <td>{{$key+1}}</td>
            <td>{!!$message->message!!}</td>
            <td>@if ($message->response == null)
                <span class="text-primary">در انتظار</span>
                @else
               <span class="text-success"> {!!$message->response!!}</span>
            @endif</td>
            <td>{{\Morilog\Jalali\Jalalian::forge($message->created_at)->format('%d %B %Y')}}</td>
                <td>
                <!-- <a href="{{route('MyMessage.Delete',$message->id)}}" class="btn btn-danger btn-sm">حذف</a> -->
                </td>
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