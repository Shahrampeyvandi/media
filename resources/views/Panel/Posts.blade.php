@extends('layout.Panel.temp')

@section('content')
<div id="popup1" class="overlay">
    <div class="popup">

        <a class="close" href="#">&times;</a>
        <div class="content">
            <form id="" action="{{route('Panel.Post.Delete')}}" method="post">
                @csrf

                <div class="mt-5 pr-2">
                    <h5 class="modal-title  pt-1 mb-2" id="exampleModalLabel">اخطار</h5>
                    <div class="form-group col-md-12">
                        <input type="hidden" id="post_id" name="post_id" value="0">


                    </div>
                    <p>آیا برای حذف مورد مطمئن هستید؟</p>
                </div>
                <div class="form-group   offset-md-10">

                    <button type="submit" class="btn btn-sm btn-danger ">حذف </button>
                </div>
            </form>
        </div>
    </div>
</div>
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">پست ها</a></li>
        <li class="breadcrumb-item"><a href="#">لیست پست ها</a></li>
        <li class="breadcrumb-item active" aria-current="page">
            @switch(request()->path())
            @case("panel/allposts/category")
            فیلم و سریال
            @break
            @case("panel/allposts/category/clips")
            ژن پلاس
            @break
            @case("panel/allposts/category/animations")
            انیمیشن
            @break
            @case("panel/allposts/category/musics")
            موسیقی
            @break
            @case("panel/allposts/category/podcasts")
            پادکست
            @break
            
            @case("panel/allposts/category/learnings")
            دوره ی آموزشی
            @break

            @default

            @endswitch
        </li>
    </ol>
</nav>
<div class="tab-wrapper">

    <a href="{{route('Panel.Posts.All')}}" @if (request()->path() == "panel/allposts/category")
        class="btn btn-info" @else class="btn btn-light" @endif>فیلم و سریال </a>
    <a href="{{route('Panel.Posts.All','clips')}}" @if (request()->path() == "panel/allposts/category/clips")
        class="btn btn-info" @else class="btn btn-light" @endif> ژن پلاس </a>
    <a href="{{route('Panel.Posts.All','animations')}}" @if (request()->path() == "panel/allposts/category/animations")
        class="btn btn-info" @else class="btn btn-light" @endif> انیمیشن </a>
    <a href="{{route('Panel.Posts.All','musics')}}" @if (request()->path() == "panel/allposts/category/musics")
        class="btn btn-info" @else class="btn btn-light" @endif>موسیقی </a>
    <a href="{{route('Panel.Posts.All','podcasts')}}" @if (request()->path() == "panel/allposts/category/podcasts")
        class="btn btn-info" @else class="btn btn-light" @endif> پادکست </a>
    <a href="{{route('Panel.Posts.All','learnings')}}" @if (request()->path() == "panel/allposts/category/learnings")
        class="btn btn-info" @else class="btn btn-light" @endif> دوره ی آموزشی </a>



    <a href="#"></a>
</div>
<hr>


<div class="col-sm-12 col-sm-offset-3 col-md-12  ">
    <div class="wpb_wrapper py-3">
        <h2 class="  mt-15 mb-15 title__divider title__divider--line" style="margin-right: 0px;"><span
                class="title__divider__wrapper">پست ها<span class="line brk-base-bg-gradient-right"></span>
            </span></h2>

    </div>
    <div style="overflow-x: auto;">
        <table id="example1" class="table table-striped  table-bordered w-100">
            <thead class="blue lighten-2 text-white">
                <tr>
                    <th>ردیف</th>
                    <th> نام پست</th>
                    <th>بازدید ها</th>
                    <th>لایک ها</th>
                    <th>گزارشات تخلف</th>
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
                        <a href="{{route('ShowItem',$post->id)}}" class="text-primary">{{$post->title}}</a>
                    </td>
                    <td>{{$post->views}}</td>
                    <td class="text-success">{{$post->likes->count()}}</td>
                    <td class="text-danger">{{$post->violations->count()}}</td>
                    <td>{{$post->categories->name}}</td>
                    <td>{{$post->languages->name}}</td>
                    <td>{{$post->levels->name}}</td>
                    <td>{{$post->subjects->name}}</td>
                    <td>{{$post->members->username}}</td>
                    <td>{{\Morilog\Jalali\Jalalian::forge($post->created_at)->format('%d %B %Y')}}</td>
                    @switch($post->confirmed)
                    @case(0)
                    <td>در انتظار تایید</td>
                    <td>تایید - رد</td>
                    @break
                    @case(1)
                    <td>تایید شده</td>
                    <td>
                        <div class="btn-group" role="group" aria-label="">
                            <a href="{{route('Admin.CheckPost',$post->id)}}"
                                class=" btn btn-rounded btn-info btn-sm m-0">ویرایش</a>
                            <a data-id="{{$post->id}}" class="delete-post btn btn-rounded btn-danger btn-sm m-0">حذف</a>
                        </div>
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