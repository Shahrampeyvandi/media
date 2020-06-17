


    <?php if($content->media == 'audio' ): ?>
    <?php if($content->picture): ?>
        <img src="<?php echo e(route('BaseUrl')); ?>/<?php echo e($content->picture); ?>" class="mt-5 position-relative mx-3 w-100">
    <?php endif; ?>
     
         <section id="play" class="" style="margin-top: 9rem;">
         <audio id="player" controls>
             <source src="<?php echo e($content->content_link); ?>" type="audio/mp3" />
             
         </audio>
     </section>
         <?php else: ?>
         <link href="https://vjs.zencdn.net/7.7.6/video-js.css" rel="stylesheet" />
     <script src="https://vjs.zencdn.net/7.7.6/video.js"></script>
     <script src="<?php echo e(route('BaseUrl')); ?>/Panel/assets/js/videojs.ads.min.js"></script>
     <script src="<?php echo e(route('BaseUrl')); ?>/Panel/assets/js/videojs-preroll.js"></script>
     <link href="<?php echo e(route('BaseUrl')); ?>/Panel/assets/css/videojs-preroll.css" rel="stylesheet" type="text/css">
     
     <link href="<?php echo e(route('BaseUrl')); ?>/Panel/assets/css/videojs.watermark.css" rel="stylesheet">
     <script src="<?php echo e(route('BaseUrl')); ?>/Panel/assets/js/videojs.watermark.js"></script>
     
         <section id="play" class="mt-5 position-relative">
           <?php if($link_type == 'image'): ?>
            <a class="close">بستن X</a>   
            <a href="<?php echo e($link); ?>" target="_blank" class="advert-img"><img src="<?php echo e($pic_link); ?>" class="" alt=""></a>
           <?php endif; ?>
         <video class="video-js mx-3 w-100" controls
         preload="auto"
         
         height="440" id="player" 
             controls>
             <source src="<?php echo e($content->content_link); ?>" type="video/mp4" size="576" />
             <source src="<?php echo e($content->content_link); ?>" type="video/mp4" size="720" />
             <source src="<?php echo e($content->content_link); ?>" type="video/mp4" size="1080" />
     
             <track kind="captions" label="other captions" src="<?php echo e($content->subtitle); ?>" srclang="en" default />
         </video>
         </section>
         <?php endif; ?>
     
     
     
     <?php if($content->media == 'audio'): ?>
     
     <script src="https://cdn.plyr.io/3.6.2/plyr.polyfilled.js"></script>
     <link rel="stylesheet" href="https://cdn.plyr.io/3.6.2/plyr.css" />
     <script>
       const player = new Plyr('#player',{
         speed:{ selected: 1, options: [0.5,0.75, 1] }
       });
     </script>
     <?php else: ?>
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
       var src = "<?php echo e($link); ?>";
       var type = "<?php echo e($link_type); ?>";
      if (type !== '' && type == 'video') {
       player.preroll({
         src:src
       });
      }
     });
     
     var video = videojs('player');
     
     video.watermark({
         file: '<?php echo e(route('BaseUrl')); ?>/assets/images/logo-transparent.png',
         xpos: 1,
       ypos: 0,
       xrepeat:1,
       opacity: 0.5
     });
     </script>
     <?php endif; ?>
     </section>
     <?php /**PATH C:\xampp\htdocs\media\resources\views/Includes/Main/player.blade.php ENDPATH**/ ?>