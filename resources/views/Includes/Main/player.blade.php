<section id="play" class="mt-5">
<link href="https://vjs.zencdn.net/7.7.6/video-js.css" rel="stylesheet" />
<script src="https://vjs.zencdn.net/7.7.6/video.js"></script>
<script src="{{route('BaseUrl')}}/Panel/assets/js/videojs.ads.min.js"></script>
<script src="{{route('BaseUrl')}}/Panel/assets/js/videojs-preroll.js"></script>
<link href="{{route('BaseUrl')}}/Panel/assets/css/videojs-preroll.css" rel="stylesheet" type="text/css">

<link href="{{route('BaseUrl')}}/Panel/assets/css/videojs.watermark.css" rel="stylesheet">
<script src="{{route('BaseUrl')}}/Panel/assets/js/videojs.watermark.js"></script>


    @if ($content->categories_id == 4 || $content->categories_id == 5 )
    <audio id="player" controls>
        <source src="{{$content->content_link}}" type="audio/mp3" />
        {{-- <source src="/path/to/audio.ogg" type="audio/ogg" /> --}}
    </audio>
    @else
    <video class="video-js mx-3 w-100" id="player" playsinline
        controls>
        <source src="{{$content->content_link}}" type="video/mp4" size="576" />
        <source src="{{$content->content_link}}" type="video/mp4" size="720" />
        <source src="{{$content->content_link}}" type="video/mp4" size="1080" />

        <track kind="captions" label="English captions" src="/path/to/captions.vtt" srclang="en" default />
    </video>
    @endif


<script>
videojs('player', {}, function(){
  var player = this;
  player.preroll({
    src:"Https://dl.genebartar.ir/files/posts/file_1589382614.mp4"
  });
});

var video = videojs('player');

video.watermark({
    file: '{{route('BaseUrl')}}/assets/images/LOGO.jpeg',
    xpos: 0,
  ypos: 0,
  xrepeat:1,
  opacity: 0.5
});
</script>
</section>