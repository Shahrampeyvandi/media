<section id="play" class="mt-5">

    @if ($content->categories_id == 4 || $content->categories_id == 5 )
    <audio id="player" controls>
        <source src="{{$content->content_link}}" type="audio/mp3" />
        {{-- <source src="/path/to/audio.ogg" type="audio/ogg" /> --}}
    </audio>
    @else
    <video class="video-js mx-3 w-100" poster="{{$content->picture}}" id="player" playsinline
        controls>
        <source src="{{$content->content_link}}" type="video/mp4" size="576" />
        <source src="{{$content->content_link}}" type="video/mp4" size="720" />
        <source src="{{$content->content_link}}" type="video/mp4" size="1080" />

        <track kind="captions" label="English captions" src="/path/to/captions.vtt" srclang="en" default />
    </video>
    @endif


</section>