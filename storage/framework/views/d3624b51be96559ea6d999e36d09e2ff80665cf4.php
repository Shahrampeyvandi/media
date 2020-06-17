
<?php $__env->startSection('title'); ?>
    <?php echo e($title); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.3.1/js/swiper.js"></script>

<link rel="stylesheet" href="<?php echo e(route('BaseUrl')); ?>/assets/css/style.css" />


<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<?php echo $__env->make('Includes.Main.popups', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<div id="container" class="container">
    <div class="view">
        <div class="row">
            <div class="col-md-9">
                <div class="pr-3 ml-2 ml-md-0">
                    <div id="primary" class="primary">

                        <?php echo $__env->make('Includes.Main.player', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>

                        <?php echo $__env->make('Includes.Main.playerSubtitles', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                    


                    <div>
                        <div class="head  put-right  light-bc-30 dark-bc-100 mt-2" style="display: flex; ">
                            <div class="avatar">
                                <?php if($content->members->avatar): ?>
                                <a href="<?php echo e(route('User.Show',['name'=>$content->members->username])); ?>"
                                    class="picture user-avatar">
                                    <img src="<?php echo e(asset('members/1587120640.jpg')); ?>" alt="">
                                </a>

                                <?php else: ?>
                                <a href="<?php echo e(route('User.Show',['name'=>$content->members->username])); ?>"
                                    class="picture image"
                                    style="width: 40px;height: 40px;    border: 2px solid #eaeaea;">
                                    <i class="fa fa-user  position-absolute fs-1-5 text-white"
                                        style="right: 12px;top: 7px;"></i>
                                </a>
                                <?php endif; ?>


                                <div class=" fs-0-8 mt-2 mr-1">
                                    <a id="" href="<?php echo e(route('User.Show',['name'=>$content->members->username])); ?>"
                                        title="<?php echo e($content->members->username); ?>">
                                        <h3 class="title d-flex flex-column">
                                            <span class="name"><?php echo e($content->members->username); ?></span>
                                        <span class="name fs-0-8">دنبال کننده ها  <?php echo e($followers); ?></span>
                                        </h3>
                                    </a>
                                </div>
                            </div>

                            <?php if(auth()->user() &&
                            \App\Models\Members\Follows::where('follower_id',auth()->user()->id)->where('followed_id',$content->members->id)->count()): ?>
                            <a href="#" title="" data-id="<?php echo e($content->members->id); ?>" class="follow-link followed"> <span
                                    class="text">دنبال میکنید</span></a>
                            <?php else: ?>
                            <a href="#" title="" data-id="<?php echo e($content->members->id); ?>" class="follow-link"><i
                                    class="fa fa-plus"></i> <span class="text">دنبال
                                    کردن</span></a>

                            <?php endif; ?>
                        </div>

                    </div>
                    <div class="channel rel w-100 put-right py-xl">
                        <div class="avatar">
                            <a href="#" title="<?php echo e($content->categories->name); ?>" class="picture"><svg
                                    class="icon icon-videos" viewBox="0 0 24 24" 0="" 24="" 24""="">
                                    <use xlink:href="#si_videos"></use>
                                </svg></a>

                            <div class="details">
                                <a href="/movies" title="<?php echo e($content->categories->name); ?>" class="title">دسته بندی:
                                    <?php echo e($content->categories->name); ?></a>
                                <span class="caption"><?php echo e($countcategoryposts); ?>

                                    <?php echo e($content->categories->name); ?></span>
                            </div>
                        </div>
                    </div>

                    <div class="description w-100 put-right pr-2">

                        <p class="paragraph mb-lg text-black-50">
                            <?php echo $content->desc; ?>

                        </p>
                    </div>
                    <?php if($content->otheroninformation): ?>
                    <div class="description w-100 put-right pr-2 mt-3">
                        <h3 class="fs-0-9 mb-xs">متن زیرنویس: </h3>
                        <p class="paragraph mb-lg text-black-50">
                            <?php echo $content->otheroninformation; ?>

                        </p>
                    </div>
                    <?php endif; ?>
                    <div
                        class="information w-100 put-right  fs-0-9 fw-300 light-80 dark-white mt-xl mb-5 pr-2 border-t-1">
                        <div class="d-tr">
                            <div class="d-tc w-20 py-xs light-60 dark-110">مربوط به</div>
                            <div class="d-tc py-xs">
                                <span class="text"><?php echo e($content->members->username); ?></span>
                                <span class="d-in v-m"></span>
                            </div>
                        </div>
                        <div class="d-tr">
                            <div class="d-tc w-20 py-xs light-60 dark-110">تاریخ انتشار</div>
                            <div class="d-tc py-xs">
                                <?php echo e(\Morilog\Jalali\Jalalian::forge($content->created_at)->format('%d %B %Y')); ?></div>
                        </div>
                        <div class="d-tr">
                            <div class="d-tc w-20 py-xs light-60 dark-110">مدت</div>
                            <div class="d-tc py-xs"><?php echo e($content->getEpisodesTime()); ?></div>
                        </div>
                        <div class="d-tr">
                            <div class="d-tc w-20 py-xs light-60 dark-110">زبان</div>
                            <div class="d-tc py-xs">
                                <span class="text"><?php echo e($content->languages->name); ?></span>
                            </div>
                        </div>
                        <div class="d-tr">
                            <div class="d-tc w-20 py-xs light-60 dark-110">موضوع</div>
                            <div class="d-tc py-xs">
                                <span class="text"><?php echo e($content->subjects->name); ?></span>
                            </div>
                        </div>
                        <div class="d-tr">
                            <div class="d-tc w-20 py-xs light-60 dark-110">سطح</div>
                            <div class="d-tc py-xs">
                                <span class="text"><?php echo e($content->levels->name); ?></span>
                            </div>
                        </div>
                    </div>
                    <?php if($content->type == "money"): ?>
                    <?php if($isbuyedit==false): ?>
                    <div class="buy w-100 put-right  fs-0-9 fw-300 light-80 dark-white mt-xl mb-5 pr-2 ">
                        <h3 class="text-black-50">این <?php echo e($content->categories->name); ?> غیر رایگان می باشد برای مشاهده
                            بایستی خریداری نمایید</h3>
                        <h3>شهریه دوره : <?php echo e($content->price); ?> تومان </h3>

                        <form action="<?php echo e(route('Pay.Start')); ?>" method="post">
                            <?php echo csrf_field(); ?>
                            <input type="hidden" name="id" value="<?php echo e($id); ?>">
                            <input type="submit" class="btn btn-success btn-sm mr-0" value="پرداخت">
                        </form>

                    </div>
                    <?php endif; ?>
                    <?php endif; ?>

                    <div id="episodes_list" class="episodes_list">
                        <div class="episodes_list--section">

                            <div class="episodes_list--item "  <?php if($episode_id == null): ?>
                            style="background: #92d7ff54;"
                            <?php endif; ?>>
                                <div class="section-right"><span class="episodes_list--number">۰</span>
                                    <div class="episodes_list--title"><a
                                            href="<?php echo e(route('ShowItem',['content'=>$post->categories->name,'slug'=>$post->slug])); ?>">معرفی دوره</a></div>
                                </div>
                                <div class="section-left">
                                    <div class="episodes_list--details">
                                        <?php if(auth()->user()): ?>
                                        <?php if($content->members_id == auth()->user()->id): ?>

                                        <span class="btn btn-info btn-sm btn-rounded">
                                            تعداد بازدیدها <?php echo e($post->views); ?></span>
                                        <?php endif; ?>
                                        <?php endif; ?>
                                        <span class="detail-type">
                                            رایگان</span>
                                        <span class="detail-time"><?php echo e($post->duration); ?>

                                        </span>

                                    </div>
                                </div>
                            </div>

                            <?php $__currentLoopData = $episodes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$episode): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div <?php if($content->type == "money" && !$isbuyedit): ?>
                                class="episodes_list--item lock"
                                <?php else: ?>
                                class="episodes_list--item "
                                <?php endif; ?>

                                <?php if($episode->id == $episode_id): ?>
                                    style="background: #92d7ff54;"
                                <?php endif; ?>

                                >
                                <div class="section-right">
                                    <?php if($content->type == "money"): ?>
                                    <span class="episodes_list--number"><?php echo e($episode->number); ?></span>
                                    <?php else: ?>
                                    <span class="episodes_list--free"><?php echo e($episode->number); ?></span>
                                    <?php endif; ?>
                                    <div class="episodes_list--title">
                                        <?php if($isbuyedit==true): ?>
                                        <a
                                            href="<?php echo e(route('ShowItem.Episode',['slug'=>$episode->post->slug,'ep'=>$episode->number])); ?>">
                                            <?php endif; ?>
                                            <?php echo e($episode->title); ?>

                                        </a></div>
                                </div>
                                <div class="section-left">
                                    <div class="episodes_list--details">
                                        <?php if(auth()->user()): ?>
                                        <?php if($content->members_id == auth()->user()->id): ?>
                                        <a href="#"><span class="btn btn-danger btn-sm btn-rounded">
                                                حذف </span></a>
                                        <span class="btn btn-info btn-sm btn-rounded">
                                            تعداد بازدیدها <?php echo e($episode->views); ?></span>
                                        <?php endif; ?>
                                        <?php endif; ?>

                                        <span class="detail-time"><?php echo e($episode->duration); ?></span>

                                    </div>
                                </div>
                            </div>

                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>




                        </div>
                    </div>


                    <?php echo $__env->make('Includes.Main.Comments', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
            </div>
            <?php echo $__env->make('Includes.Main.relatedposts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
    </div>
</div>
</main>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>


<link rel="stylesheet" href="<?php echo e(route('BaseUrl')); ?>/assets/css/emojionearea.min.css">
<script src="<?php echo e(route('BaseUrl')); ?>/assets/js/emojionearea.min.js"></script>

<script>
    $(".add-emoji").emojioneArea({
    attributes: {
        dir : "rtl",
       
    },
    textcomplete: {
        maxCount  : 20,
        placement : 'absright'
    },
    pickerPosition: "bottom"
});

//     var controls =
// [
//     'play-large', // The large play button in the center
    
//     'rewind', // Rewind by the seek time (default 10 seconds)
//     'play', // Play/pause playback
//     'fast-forward', // Fast forward by the seek time (default 10 seconds)
//     'progress', // The progress bar and scrubber for playback and buffering
//     'current-time', // The current time of playback
//     'duration', // The full duration of the media
//     'mute', // Toggle mute
//     'volume', // Volume control
//     'captions', // Toggle captions
//     'settings', // Settings menu
//     'pip', // Picture-in-picture (currently Safari only)
//     'airplay', // Airplay (currently Safari only)
//     'download', // Show a download button with a link to either the current source or a custom URL you specify in your options
//     'fullscreen' // Toggle fullscreen
// ];
// const player = new Plyr('#player',{
//         controls
//     ,
//     speed:{ selected: 1, options: [ 0.5, 0.75, 1, 1.25] }
//     });
    var type = "<?php echo e($type); ?>";
    var checkauth = '<?php echo e(auth()->user()); ?>';
    
    function ajaxlike(id, url) {
          
        
     
  }

  $('#like-post').click(function (e) {
      e.preventDefault();
      
      if (checkauth) {
          if(type == "post"){

          var url = '<?php echo e(route("LikePost")); ?>';
          }
          if(type == "episode"){
         
            var url = '<?php echo e(route("LikeEpisode")); ?>';
            
          }
          let id = $(this).data('id')
          $.ajax({
              url: url,
              type: 'POST',
              data: {id: id},
              dataType: 'JSON',
              cache: false,
              success: function (res) {
                  $('#like-post span').text(res)
              }
          });
      } else {
          window.location.href = "<?php echo e(route("login")); ?>"
      }

  })

  $('.favorite-post').click(function (e) {
      e.preventDefault();
      if (checkauth) {
          
          let thiss = $(this)

          let url = '<?php echo e(route("AddFavorite")); ?>';
          let id = $(this).data('id')
          $.ajax({
              url: url,
              type: 'POST',
              data: {id: id},
              dataType: 'JSON',
              cache: false,
              success: function (res) {
                  if (res == 'add') {
                      thiss.find('svg').attr('fill', 'red')
                  }
                  if (res == 'remove') {
                      thiss.find('svg').attr('fill', 'gray')
                  }
              }

          });
      } else {
          window.location.href = "<?php echo e(route("login")); ?>"
      }
  })
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.Main.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\media\resources\views/Main/tutorial.blade.php ENDPATH**/ ?>