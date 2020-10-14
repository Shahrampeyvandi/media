@foreach($learnings as $movie)
@component('components.tutorial-article',['movie'=>$movie,'class'=>'mb-5'])
    
@endcomponent


@endforeach