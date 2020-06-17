@extends('layout.Panel.temp')

@section('content')

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
                        <a class="text-primary" href=" {{route('ShowItem',['content'=>$post->categories->name,'slug'=>$post->slug])}}">
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
                                class=" btn btn-primary btn-sm m-0">مشاهده  </a>
                          
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