@extends('layout.Panel.temp')

@section('content')

<div id="popup" class="overlay delete">
    <div class="popup">
        <a class="close" href="#">&times;</a>
        <div class="content">
            <form id="" action="{{route('Panel.Posts.Reject.Submit')}}" method="get">
                @csrf
                <div class="mt-5 pr-2">
                    <h5 class="modal-title  pt-1 mb-2" id="exampleModalLabel">اخطار</h5>
                    <div class="form-group col-md-12">
                        <input type="hidden" id="post-id" name="post_id" value="">
                        <input type="hidden" id="member-id" name="member_id" value="">
                    </div>
                    <label for="user_pass" class="col-form-label"><span class="text-danger">*</span> دلیل عدم تایید:
                    </label>
                    <div class="form-group mt-2 ">
                        <select name="reason" id="reason" class="form-control browser-default custom-select">
                            <option value="" selected>باز کردن فهرست انتخاب</option>
                       @foreach (\App\Models\Contents\ViolationList::latest()->get() as $item)
                        <option value="{{$item->name}}" >{{$item->name}}</option>
    
                       @endforeach
                       
                        </select>
                    </div>               
                </div>
                <div class="form-group  mt-1 ">
                    <button type="submit" class="btn btn-sm btn-danger ">عدم تایید </button>
                </div>
            </form>
        </div>
    </div>
</div>
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">پست ها</a></li>
        <li class="breadcrumb-item active">پست های پیش نویس</li>
        
    </ol>
</nav>

<div class="col-sm-12 col-sm-offset-3 col-md-12  ">
    <div class="wpb_wrapper py-3">
        <h2 class="  mt-15 mb-15 title__divider title__divider--line" style="margin-right: 0px;"><span
                class="title__divider__wrapper">پست های پیش نویس<span class="line brk-base-bg-gradient-right"></span>
            </span></h2>
    </div>
    <div style="overflow-x: auto;">
        <table id="example1" class="table table-striped  table-bordered w-100">
            <thead class="grey lighten-1 text-white">
                <tr>
                    <th>ردیف</th>
                    <th> نام پست</th>
                    <th>دسته بندی</th>
                    <th>زبان</th>
                    <th>سطح</th>
                    <th>موضوع</th>
                    <th>نویسنده</th>
                    <th>تاریخ ثبت</th>
                    <th>وضعیت</th>

                    <th>عملیات</th>

                </tr>
            </thead>

            <tbody>
                @foreach($posts as $key=>$post)
                <tr>
                    <td>{{$key+1}}</td>
                    <td>
                        <a class="text-primary" href="{{route('ShowItem',$post->id)}}">
                            {{$post->title}}
                        </a>
                    </td>
                    <td>{{$post->categories->name}}</td>
                    <td>{{$post->languages->name}}</td>
                    <td>{{$post->levels->name}}</td>
                    <td>{{$post->subjects->name}}</td>
                    <td>{{$post->members->username}}</td>
                    <td>{{\Morilog\Jalali\Jalalian::forge($post->created_at)->format('%d %B %Y')}}</td>
                    @switch($post->confirmed)
                    @case(0)
                    <td>در انتظار تایید</td>
                    <td>
                        <div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
                            <a href="{{route('Admin.CheckPost',$post->id)}}?member={{$post->members_id}}"
                                class=" btn btn-primary btn-sm m-0">مشاهده و تایید</a>
                            <a data-id="{{$post->id}}" data-member="{{$post->members_id}}"
                                class="post--delete btn btn-danger btn-sm m-0">رد</a>
                        </div>
                    </td>
                    @break
                    @case(1)
                    <td>تایید شده</td>
                    <td>رد</td>
                    @break
                    @case(2)
                    <td>تایید نشده
                        به علت
                        {{$post->rejectreason}}</td>
                    <td>

                        <div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
                            <a href="#" class=" btn btn-primary btn-sm m-0">تایید</a>
                        </div>


                    </td>
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