@foreach($podcasts as $podcast)
@component('components.podcast-article',['podcast'=>$podcast])
    
@endcomponent
@endforeach