@extends('layout.Main.template')

@section('content')
<div class="row mx-2" >
    @foreach ($posts as $post)
    

    <div id="" class="thumbnail-video mr-3 ml-2 my-3"  style="max-width: 240px;">
        <div class="thumb-wrapper">
            <a id="" href="{{route('ShowItem',['id'=>$post->id])}}"
                class="thumb thumb-preview" data-poster="{{asset("$post->picture")}}"><img
                    src="{{asset("$post->picture")}}" class=" thumb-image">


                <div class="tools">
                    <span class="duration">{{$post->duration}}</span>
                </div>
                {{-- وقتی موس روی تصویر میرود فیلم زیر به حالت پیش نمایش می آید --}}
                {{-- <video class="preview" poster="https://static.cdn.asset.aparat.com/avt/21369543-9445__2874.jpg" src="https://static.cdn.asset.aparat.com/avt/21369543_15s.mp4" muted="" autoplay="" style="opacity: 0;"></video> --}}
            </a>
        </div>
        <div class="thumb-details">

            <h2 class="thumb-title">
                <a href="" title="{{$post->title}}"
                    class="title"><span>{{$post->title}}</span></a>
            </h2>

            <div class="thumb-view-date">
                <span>{{$post->views}} بازدید</span>
                <span class="dot"></span><span
                    class="date">{{\Morilog\Jalali\Jalalian::forge($post->created_at)->format('%B %Y')}}</span>
            </div>

        </div>
    </div>

@endforeach
</div>





@endsection
@section('css')
<link rel="stylesheet" href=" {{asset('assets/css/channel.css')}} ">

@endsection

@section('js')

@endsection