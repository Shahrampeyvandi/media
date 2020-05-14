@extends('layout.Panel.temp')

@section('content')

        <div class="tab-wrapper">
            <a href="{{route('MyVideos')}}"  @if (request()->path() == "panel/myvideos")
            class="btn btn-info" @else class="btn btn-light"  @endif >فیلم </a>
            <a href="{{route('MyVideos','clips')}}" @if (request()->path() == "panel/myvideos/clips")
            class="btn btn-info" @else class="btn btn-light"  @endif> ژن پلاس </a>

            <a href="{{route('MyVideos','animations')}}" @if (request()->path() == "panel/myvideos/animations")
            class="btn btn-info" @else class="btn btn-light"  @endif> انیمیشن </a>
           

            <a href="#"></a>
        </div>
        <hr>



@if (request()->path() == "panel/myvideos")
@component('Panel.Components.videos', ['movies' => $posts])
@endcomponent
@endif
@if (request()->path() == "panel/myvideos/clips")
@component('Panel.Components.clips', ['clips' => $posts])
@endcomponent
@endif
@if (request()->path() == "panel/myvideos/animations")
@component('Panel.Components.animations',['animations' => $posts])
@endcomponent
@endif
   



@endsection

@section('js')

@endsection