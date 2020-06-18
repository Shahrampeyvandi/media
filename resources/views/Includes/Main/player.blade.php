@if ($content->media == 'audio' )
@if ($content->picture)
<img src="{{route('BaseUrl')}}/{{$content->picture}}" class="mt-5 position-relative mx-auto mx-md-3 w-100">
@else
<img src="{{asset('assets/images/logo-transparent.png')}}" class="mt-5 position-relative mx-auto w-50 ">

@endif
<section id="play" class="" style="margin-top: 2rem;">
  <audio id="player" controls>
    <source src="{{$content->content_link}}" type="audio/mp3" />
    {{-- <source src="/path/to/audio.ogg" type="audio/ogg" /> --}}
  </audio>
</section>
@else
<link href="https://vjs.zencdn.net/7.7.6/video-js.css" rel="stylesheet" />
<script src="https://vjs.zencdn.net/7.7.6/video.js"></script>
<script src="{{route('BaseUrl')}}/Panel/assets/js/videojs.ads.min.js"></script>
<script src="{{route('BaseUrl')}}/Panel/assets/js/videojs-preroll.js"></script>
<link href="{{route('BaseUrl')}}/Panel/assets/css/videojs-preroll.css" rel="stylesheet" type="text/css">

<link href="{{route('BaseUrl')}}/Panel/assets/css/videojs.watermark.css" rel="stylesheet">
<script src="{{route('BaseUrl')}}/Panel/assets/js/videojs.watermark.js"></script>

<section id="play" class="mt-5 position-relative">
  @if ($link_type == 'image')
  <a class="close">بستن X</a>
  <a href="{{$link}}" target="_blank" class="advert-img"><img src="{{$pic_link}}" class="" alt=""></a>
  @endif
  <video class="video-js mx-3 w-100" controls preload="auto" height="440" id="player" controls>
    <source src="{{$content->content_link}}" type="video/mp4" size="576" />
    <source src="{{$content->content_link}}" type="video/mp4" size="720" />
    <source src="{{$content->content_link}}" type="video/mp4" size="1080" />

    <track kind="captions" label="other captions" src="{{$content->subtitle}}" srclang="en" default />
  </video>
</section>
@endif
@if($content->media == 'audio')
<script src="https://cdn.plyr.io/3.6.2/plyr.polyfilled.js"></script>
<link rel="stylesheet" href="https://cdn.plyr.io/3.6.2/plyr.css" />
<script>
  const player = new Plyr('#player',{
         speed:{ selected: 1, options: [0.5,0.75, 1] }
       });
</script>
@else
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
         file: '{{route('BaseUrl')}}/assets/images/logo-transparent.png',
         xpos: 1,
       ypos: 0,
       xrepeat:1,
       opacity: 0.5
     });
</script>
@endif
</section>