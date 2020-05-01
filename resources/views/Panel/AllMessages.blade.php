@extends('layout.Panel.temp')

@section('content')
<div id="popup" class="overlay delete">
    <div class="popup">

        <a class="close" href="#">&times;</a>
        <div class="content">
            <form id="" action="{{route('Message.Response')}}" method="post">
                @csrf
               
                <div class="mt-5 pr-2">
                    <h5 class="modal-title  pt-1 mb-2" id="exampleModalLabel">ارسال پاسخ</h5>
                    <div class="form-group col-md-12">
                        <input type="hidden" id="post-id" name="id" value="">


                    </div>
                    

            <label for="user_pass" class="col-form-label"><span class="text-danger">*</span> متن پاسخ: </label>
              <textarea type="text" class="form-control" rows="3" name="response" id="response"></textarea>
                </div>
               
                <div class="form-group   mt-1 ">

                    <button type="submit" class="btn btn-sm btn-danger "> ارسال </button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="col-sm-9 col-sm-offset-3 col-md-12  ">
    <div class="wpb_wrapper py-3">
        <h2 class="  mt-15 mb-15 title__divider title__divider--line"
            style="margin-right: 0px;"><span class="title__divider__wrapper"> پیام های کاربران<span
                    class="line brk-base-bg-gradient-right"></span>
            </span></h2>
     
    </div>
    <div style="overflow-x: auto;">
        <table id="example1" class="table table-striped  table-bordered w-100">
            <thead>
            <tr>
                <th>ردیف</th>
                <th style=""> متن</th>
                <th> کاربر ارسال کننده</th>
                <th> پاسخ شما</th>
                <th> تاریخ ثبت</th>

            </tr>
            </thead>

            <tbody>
            @foreach($messages as $key=>$message)
            <tr>
            <td>{{$key+1}}</td>
            <td>{!!$message->message!!}</td>
            <td><a class="text-primary" href="{{route('User.Show',$message->members->username)}}">
                {{$message->members->username}}</a></td>
            <td>
            @if($message->response)
            {!!$message->response!!}
            @else
            <div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
                    
                        <a data-id="{{$message->id}}" data-member="{{$message->id}}" class="post--delete btn btn-warning btn-sm m-0">پاسخ</a>
                        </div>
            @endif
            
            </td>
            <td>{{\Morilog\Jalali\Jalalian::forge($message->created_at)->format('%d %B %Y')}}</td>

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