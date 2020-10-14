@extends('layout.Panel.temp')

@section('content')

<div class="row">
    <div class="col-md-12">
        <div>
            <a href="{{route('Panel.MyFavorites')}}" class="btn {{request()->path() == "panel/myfavorites" ? 'btn-info' : 'btn-light'}}">فیلم ها</a>
            <a href="{{route('Panel.MyFavorites','clips')}}" class="btn {{request()->path() == "panel/myfavorites/clips" ? 'btn-info' : 'btn-light'}}"> کلیپ ها</a>
            <a href="{{route('Panel.MyFavorites','animations')}}" class="btn {{request()->path() == "panel/myfavorites/animations" ? 'btn-info' : 'btn-light'}}"> انیمیشن ها</a>
            <a href="{{route('Panel.MyFavorites','musics')}}" class="btn {{request()->path() == "panel/myfavorites/musics" ? 'btn-info' : 'btn-light'}}">موسیقی ها</a>
            <a href="{{route('Panel.MyFavorites','podcasts')}}" class="btn {{request()->path() == "panel/myfavorites/podcasts" ? 'btn-info' : 'btn-light'}}"> پادکست ها</a>
            <a href="{{route('Panel.MyFavorites','learnings')}}" class="btn {{request()->path() == "panel/myfavorites/learnings" ? 'btn-info' : 'btn-light'}}"> فیلم های آموزشی </a>


            <a href="#"></a>
        </div>
        <hr>
    </div>
</div>


@if (request()->path() == "panel/myfavorites")
@component('Panel.Components.videos', ['movies' => $posts])
@endcomponent
@endif
@if (request()->path() == "panel/myfavorites/clips")
@component('Panel.Components.clips', ['clips' => $posts])
@endcomponent
@endif
@if (request()->path() == "panel/myfavorites/animations")
@component('Panel.Components.animations',['animations' => $posts])
@endcomponent
@endif
@if (request()->path() == "panel/myfavorites/musics")
@component('Panel.Components.musics', ['musics' => $posts])
@endcomponent
@endif
@if (request()->path() == "panel/myfavorites/podcasts")
@component('Panel.Components.podcasts', ['podcasts' => $posts])
@endcomponent
@endif



@endsection

@section('js')

@endsection