@foreach($videos as $movie)
@component('components.video-article',['movie'=>$movie,'class'=>'mb-5'])
    
@endcomponent
@endforeach