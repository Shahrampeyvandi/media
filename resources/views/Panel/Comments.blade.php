@extends('layout.Panel.temp')

@section('content')
<div id="popup1" class="overlay">
    <div class="popup">

        <a class="close" href="#">&times;</a>
        <div class="content">
            <form id="" action="{{route('Panel.Comments.UnConfirm.Submit')}}" method="post">
                @csrf
               
                <div class="mt-5 pr-2">
                    <h5 class="modal-title  pt-1 mb-2" id="exampleModalLabel">اخطار</h5>
                    <div class="form-group col-md-12">
                        <input type="hidden" id="comment_id" name="comment_id" value="0">
                      
                       
                    </div>
                    <p>آیا برای حذف مورد مطمئن هستید؟</p>
                </div>
                <div class="form-group  float-left offset-md-10">

                    <button type="submit" class="btn btn-sm btn-danger ">حذف </button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div>

            <a href="{{route('Panel.Comments.All')}}" @if (request()->path() == "panel/allcomments")
                class="btn btn-info" @else class="btn btn-light"  @endif>تایید شده</a>
            <a href="{{route('Panel.Comments.All','unconfirmed')}}" @if (request()->path() == "panel/allcomments/unconfirmed")
                class="btn btn-info" @else class="btn btn-light"  @endif>در انتظار تایید</a>
            <a href="{{route('Panel.Comments.All','rejected')}}" @if (request()->path() == "panel/allcomments/rejected")
                class="btn btn-info" @else class="btn btn-light"  @endif>تایید نشده</a>


            <a href="#"></a>
        </div>
        <hr>
    </div>
</div>

<div class="col-sm-9 col-sm-offset-3 col-md-12  ">
    <div class="wpb_wrapper py-3">
        <h2 class="  mt-15 mb-15 title__divider title__divider--line"
            style="margin-right: 0px;"><span class="title__divider__wrapper">نظرات <span
                    class="line brk-base-bg-gradient-right"></span>
            </span></h2>
     
    </div>
    <div style="overflow-x: auto;">
        <table id="example1" class="table table-striped  table-bordered">
            <thead>
            <tr>
                <th>ردیف</th>
                <th>متن </th>
                <th>برای پست</th>
                <th>نویسنده</th>
                <th>تاریخ ثبت</th>
                <th>رای مثبت</th>
                <th>رای منفی</th>
                <th>وضعیت</th>
                <th>عملیات</th>

            </tr>
            </thead>

            <tbody>
            @foreach($comments as $key=>$comment)
            <tr>
            <td>{{$key+1}}</td>
            <td style="max-width: 500px;word-wrap: break-word;">{!! $comment->text !!}</td>
            <td><a class="text-primary" href="{{route('ShowItem',['id'=>$comment->posts->id])}}">{{$comment->posts->title}}</a></td>
            <td>{{$comment->members->username}}</td>
            <td>{{\Morilog\Jalali\Jalalian::forge($comment->created_at)->format('%d %B %Y')}}</td>
            <td class="text-success">{{$comment->commentlikes->where('score','like')->count()}}</td>
            <td class="text-danger">{{$comment->commentlikes->where('score','dislike')->count()}}</td>
            @switch($comment->confirmed)
            @case(0)
            <td>در انتظار تایید</td>
            <td>
              
                <div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
                    <a href="{{route('Panel.Comments.Confirm.Submit',$comment->id)}}"  class=" btn btn-success btn-sm m-0">تایید</a>
                    <a  data-id="{{$comment->id}}" class="button__ btn btn-warning btn-sm m-0">رد</a>
                  </div>
            </td>
            @break
            @case(1)
            <td class="text-success">تایید شده</td>
            <td>
                <a  data-id="{{$comment->id}}" class="button__ btn btn-danger btn-sm m-0">حذف</a>
            </td>
            @break
            @case(2)
            <td>تایید نشده</td>
            <td>تایید</td>
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