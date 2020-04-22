@extends('layout.Panel.temp')

@section('content')
<div class="row">
    <div class="col-md-12">
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
                        <div class="form-group  float-left offset-md-10">
        
                            <button type="submit" class="btn btn-sm btn-danger ">حذف </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div>

            <a href="{{route('Panel.Posts.All')}}" @if (request()->path() == "panel/allposts/category")
                class="btn btn-info" @else class="btn btn-light"  @endif>فیلم ها</a>
            <a href="{{route('Panel.Posts.All','clips')}}" @if (request()->path() == "panel/allposts/category/clips")
                class="btn btn-info" @else class="btn btn-light"  @endif> کلیپ ها</a>
            <a href="{{route('Panel.Posts.All','animations')}}" @if (request()->path() == "panel/allposts/category/animations")
                class="btn btn-info" @else class="btn btn-light"  @endif> انیمیشن ها</a>
            <a href="{{route('Panel.Posts.All','musics')}}" @if (request()->path() == "panel/allposts/category/musics")
                class="btn btn-info" @else class="btn btn-light"  @endif>موسیقی ها</a>
            <a href="{{route('Panel.Posts.All','podcasts')}}" @if (request()->path() == "panel/allposts/category/podcasts")
                class="btn btn-info" @else class="btn btn-light"  @endif> پادکست ها</a>
            <a href="{{route('Panel.Posts.All','learnings')}}" @if (request()->path() == "panel/allposts/category/learnings")
                class="btn btn-info" @else class="btn btn-light"  @endif> فیلم های آموزشی </a>



            <a href="#"></a>
        </div>
        <hr>
    </div>
</div>

<div class="col-sm-9 col-sm-offset-3 col-md-12  ">
    <div class="wpb_wrapper py-3">
        <h2 class="  mt-15 mb-15 title__divider title__divider--line"
            style="margin-right: 0px;"><span class="title__divider__wrapper">پست ها<span
                    class="line brk-base-bg-gradient-right"></span>
            </span></h2>
     
    </div>
    <div style="overflow-x: auto;">
        <table id="example1" class="table table-striped  table-bordered">
            <thead class="blue lighten-2 text-white">
            <tr>
                <th>ردیف</th>
                <th > نام پست</th>
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
            <td>{{$post->title}}</td>
            <td>{{$post->categories->name}}</td>
            <td>{{$post->languages->name}}</td>
            <td>{{$post->levels->name}}</td>
            <td>{{$post->subjects->name}}</td>
            <td>{{$post->members->username}}</td>
            <td>{{\Morilog\Jalali\Jalalian::forge($post->created_at)->format('%d %B %Y')}}</td>
            @switch($post->confirmed)
            @case(0)
            <td>در انتظار تایید</td>
            <td>تایید  -  رد</td>
            @break
            @case(1)
            <td>تایید شده</td>
            <td>
             <a  data-id="{{$post->id}}" class="delete-post btn btn-rounded btn-danger btn-sm m-0">حذف</a>
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