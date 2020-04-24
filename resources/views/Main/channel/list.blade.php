@extends('layout.Main.template')

@section('content')

<div class="row mr-3">
     @foreach ($channels as $channel)
    <div class="item grid-item">
        <div class="box">
            <div class="box-content">
                <div class="thumbnail-channel">
                    <div class="avatar">
                        <a href="{{route('User.Show',['name' => $channel->username])}}" class="picture image"><img
                                src="{{asset($channel->avatar)}}" alt=""
                                aria-label="Samsungmobile" class="avatar-img" width="45" height="45">
                        </a>
                    </div>
                    <div class="details">
                        <h2 class="title">
                            <a href="{{route('User.Show',['name' => $channel->username])}}"  class="name"><span
                                    class="text">{{$channel->username}}</span>
                                <span class="priority-brand" title="رسمی">
                                    <svg class="icon icon-tick icon-priority" viewBox="0 0 24 24" 0="" 24="" 24""="">
                                        <use xlink:href="#si_tick">
                                            <g id="si_tick" data-viewBox="0 0 24 24"><path d="M0 0h24v24H0z" fill="none"></path><path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41z"></path></g>
                                        </use>
                                    </svg>
                                </span>
                            </a>
                        </h2>
                        <span class="followers channel-followers-83055">{{count($channel->followers)}} دنبال کننده</span>
                        <span class="dot"></span>
                        <span class="video-cnt">{{count($channel->posts)}}  پست</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach 
   
</div>

@endsection
@section('css')
<link rel="stylesheet" href=" {{asset('assets/css/channel.css')}} ">

@endsection