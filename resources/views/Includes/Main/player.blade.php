
<link href="https://vjs.zencdn.net/7.7.6/video-js.css" rel="stylesheet" />
<script src="https://vjs.zencdn.net/7.7.6/video.js"></script>
<script src="{{route('BaseUrl')}}/Panel/assets/js/videojs.ads.min.js"></script>
<script src="{{route('BaseUrl')}}/Panel/assets/js/videojs-preroll.js"></script>
<link href="{{route('BaseUrl')}}/Panel/assets/css/videojs-preroll.css" rel="stylesheet" type="text/css">

<link href="{{route('BaseUrl')}}/Panel/assets/css/videojs.watermark.css" rel="stylesheet">
<script src="{{route('BaseUrl')}}/Panel/assets/js/videojs.watermark.js"></script>


    @if ($content->categories_id == 4 || $content->categories_id == 5 )
    <section id="play" class="" style="margin-top: 7rem;">
    <audio id="player" controls>
        <source src="{{$content->content_link}}" type="audio/mp3" />
        {{-- <source src="/path/to/audio.ogg" type="audio/ogg" /> --}}
    </audio>
</section>
    @else
    <section id="play" class="mt-5 position-relative">
      @if ($link_type == 'image')
       <a class="close">بستن X</a>   
       <a href="{{$link}}" target="_blank" class="advert-img"><img src="{{$pic_link}}" class="" alt=""></a>
      @endif
    <video class="video-js mx-3 w-100" controls
    preload="auto"
    
    height="440" id="player" 
        controls>
        <source src="{{$content->content_link}}" type="video/mp4" size="576" />
        <source src="{{$content->content_link}}" type="video/mp4" size="720" />
        <source src="{{$content->content_link}}" type="video/mp4" size="1080" />

        <track kind="captions" label="other captions" src="{{$content->subtitle}}" srclang="en" default />
    </video>
    </section>
    @endif


<script>

  $('#play .close').click(function(e){
    e.preventDefault()
    $(this).next('a').remove()
    $(this).remove()
  })
videojs('player', {
    'playbackRates': [0.7, 1.0, 1.5, 2.0] 
}, function(){
  var player = this;
  var src = "{{$link}}";
  var type = "{{$link_type}}";
 if (type !== '' && type == 'video') {
  player.preroll({
    src:src
  });
 }
});

var video = videojs('player');

video.watermark({
    file: '{{route('BaseUrl')}}/assets/images/min-logo.png',
    xpos: 0,
  ypos: 0,
  xrepeat:1,
  opacity: 0.5
});
</script>
</section>
