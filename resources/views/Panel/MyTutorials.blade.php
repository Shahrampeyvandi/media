@extends('layout.Panel.temp')

@section('content')

<div class="col-sm-9 col-sm-offset-3 col-md-12  ">
    <div class="wpb_wrapper py-3">
        <h2 class="  mt-15 mb-15 title__divider title__divider--line"
            style="margin-right: 0px;"><span class="title__divider__wrapper">دوره های من<span
                    class="line brk-base-bg-gradient-right"></span>
            </span></h2>
     
    </div>
    <div style="overflow-x: auto;">
        <table id="example1" class="table table-striped  table-bordered">
            <thead class="blue lighten-2 text-white">
            <tr>
                <th>ردیف</th>
                <th> نام </th>
                <th>دسته بندی</th>
                <th>زبان</th>
                <th>سطح</th>
                <th>موضوع</th>
                <th>کامنت ها</th>
                <th>گزارشات تخلف</th>
                <th>لایک ها</th>
                <th>بازدیدها</th>
                <th></th>
                

            </tr>
            </thead>

            <tbody>
            @foreach($tutorials as $key=>$post)
            <tr>
            <td>{{$key+1}}</td>
            <td>{{$post->title}}</td>
            <td>{{$post->categories->name}}</td>
            <td>{{$post->languages->name}}</td>
            <td>{{$post->levels->name}}</td>
            <td>{{$post->subjects->name}}</td>
           
            <td>{{$post->comments->count()}}</td>
            <td>{{$post->violations->count()}}</td>
            <td>{{$post->likes->count()}}</td>
            <td>{{$post->views}}</td>
          
            
            <td>
                <div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
                    <a href="{{route('ShowItem',$post->id)}}" class="btn btn-sm btn-rounded btn-primary">مشاهده</a>
                <a href="{{route('Tutorial.CreateEpisode',$post->id)}}"  class=" btn btn-danger btn-sm m-0">قسمت جدید <i class="fa fa-plus"></i></a>
                    </div>
            
            </td>
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