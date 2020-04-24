<section id="play" class="mt-5">


    <video class="video-js mx-3 w-100" poster="{{route('BaseUrl')}}/{{$content->picture}}" id="player" playsinline
        controls>
        <source src="{{route('BaseUrl')}}/{{$content->content_link}}" type="video/mp4" size="576" />
        <source src="{{route('BaseUrl')}}/{{$content->content_link}}" type="video/mp4" size="720" />
        <source src="{{route('BaseUrl')}}/{{$content->content_link}}" type="video/mp4" size="1080" />
        <!-- Captions are optional -->
        <track kind="captions" label="English captions" src="/path/to/captions.vtt" srclang="en" default />
    </video>

</section>