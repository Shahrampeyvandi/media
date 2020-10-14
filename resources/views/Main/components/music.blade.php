@foreach($musics as $music)

@component('components.music-article',['music'=>$music,'style'=>'margin-left:1.5rem;'])
    
@endcomponent
@endforeach