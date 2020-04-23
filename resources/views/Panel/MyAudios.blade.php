@extends('layout.Panel.temp')

@section('content')

        <div class="tab-wrapper">
            <a href="{{route('MyAudios')}}" @if (request()->path() == "panel/myaudios")
                class="btn btn-info" @else class="btn btn-light"  @endif>موسیقی ها</a>
            <a href="{{route('MyAudios','podcasts')}}"  @if (request()->path() == "panel/myaudios/podcasts")
                class="btn btn-info" @else class="btn btn-light"  @endif> پادکست ها</a>
            <a href="#"></a>
        </div>
        <hr>



@if (request()->path() == "panel/myaudios")
@component('Panel.Components.musics', ['musics' => $posts])
@endcomponent
@endif
@if (request()->path() == "panel/myaudios/podcasts")
@component('Panel.Components.podcasts', ['podcasts' => $posts])
@endcomponent
@endif

   



@endsection

@section('js')

@endsection