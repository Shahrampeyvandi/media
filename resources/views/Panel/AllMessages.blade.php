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
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">کاربران </a></li>
        <li class="breadcrumb-item "><a href="#">پیام های کاربران</a></li>
        @if (request()->path() == "panel/membermessages")
            <li class="breadcrumb-item active">پیام های دریافتی</li> 
        @elseif(request()->path() == "panel/adminmessages") 
            <li class="breadcrumb-item active">پیام های ارسالی</li>
        @endif
       
       

    </ol>
</nav>
<div class="col-sm-9 col-sm-offset-3 col-md-12  ">
    <div class="tab-wrapper mb-3">
        <a href="{{route('Message.All')}}" @if (request()->path() == "panel/membermessages")
            class="btn btn-info" @else class="btn btn-light" @endif>پیام های دریافتی</a>
        <a href="{{route('Admin.Message.All')}}" @if (request()->path() == "panel/adminmessages")
            class="btn btn-info" @else class="btn btn-light" @endif> پیام های ارسالی</a>
        <a href="#"></a>
    </div>
    <div style="overflow-x: auto;">
        <table id="example1" class="table table-striped  table-bordered w-100">
            <thead>
                <tr>
                    <th>ردیف</th>
                    <th style=""> متن</th>
                    @if (request()->path() == "panel/membermessages")

                    <th> کاربر ارسال کننده</th>
                    <th> پاسخ شما</th>
                    @endif
                    @if (request()->path() == "panel/adminmessages")

                    <th> کاربر دریافت کننده</th>
                    <th> پاسخ کاربر</th>
                    @endif

                    <th> تاریخ ثبت</th>

                </tr>
            </thead>

            <tbody>
                @foreach($messages as $key=>$message)
                <tr>
                    <td>{{$key+1}}</td>
                    <td>{!!$message->message!!}</td>
                    @if (request()->path() == "panel/membermessages")
                    <td><a class="text-primary" href="{{route('User.Show',$message->members->username)}}">
                            {{$message->members->username}}</a></td>
                    <td>
                        @if($message->response)
                        {!!$message->response!!}
                        @else
                        <div class="btn-group btn-group-sm" role="group" aria-label="Basic example">

                            <a data-id="{{$message->id}}" data-member="{{$message->id}}"
                                class="post--delete btn btn-warning btn-sm m-0">پاسخ</a>
                        </div>
                        @endif

                    </td>
                    @endif
                    @if (request()->path() == "panel/adminmessages")
                    <td><a class="text-primary" href="{{route('User.Show',$message->recived->username)}}">
                            {{$message->recived->username}}</a></td>
                    <td>
                        @if($message->response)
                        {!!$message->response!!}
                        @else
                        <span>بدون پاسخ</span>
                        @endif

                    </td>
                    @endif

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