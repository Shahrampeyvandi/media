

<?php $__env->startSection('content'); ?>

<div class="row">
    <div class="col-md-12">
        <?php echo $__env->make('Includes.Channel.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <h3 class="mt-5">
            <span class="mr-3 d-inline-block pr-1 pb-2" style="border-bottom: 3px solid gray;"> همه چیز درباره کانال
                ...</span>
        </h3>

        <div class="pr-3 my-3">
            <?php if(auth()->user()->channelInformations->content !== null): ?>

            <?php echo auth()->user()->channelInformations->content; ?>

            <?php else: ?>
            هیچ اطلاعاتی وارد نشده است
            <?php endif; ?>
        </div>
        <h4 class="mt-5">
            <span class="mr-3 d-inline-block pr-1 pb-2">لینک های مرتبط</span>
        </h4>
        <div class="other links d-flex justify-content-start mx-3">
            <?php if(auth()->user()->channelInformations->link_telegram): ?>

            <a href="<?php echo e(auth()->user()->channelInformations->link_telegram); ?>" class="ml-2"><i class="fa fa-circle"></i>
                تلگرام </a>
            <?php endif; ?>
            <?php if(auth()->user()->channelInformations->link_whatsapp): ?>
            <a href="<?php echo e(auth()->user()->channelInformations->link_whatsapp); ?>" class="ml-2"><i class="fa fa-circle"></i> واتس اپ</a>
            <?php endif; ?>
            <?php if(auth()->user()->channelInformations->link_instagram): ?>
            <a href="<?php echo e(auth()->user()->channelInformations->link_instagram); ?>" class="ml-2"><i class="fa fa-circle"></i> اینستاگرام</a>
            <?php endif; ?>
            <?php if(auth()->user()->channelInformations->link_linkedin): ?>
            <a href="<?php echo e(auth()->user()->channelInformations->link_linkedin); ?>" class="ml-2"><i class="fa fa-circle"></i> لینکدین</a>
            <?php endif; ?>
        </div>
    </div>
</div>





<?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>
<link rel="stylesheet" href=" <?php echo e(asset('assets/css/channel.css')); ?> ">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
<script>
    var swiper = new Swiper('.swiper-container-channel', {
          
        spaceBetween: 5,
            nextButton: '.swiper-user-one',
           prevButton: '.swiper-user-two',
            breakpoints: {
            320: {
                slidesPerView: 1,
                spaceBetween: 10
            },
            640: {
                slidesPerView: 1,
                spaceBetween: 20
            },
            768: {
                slidesPerView: 3,
                spaceBetween: 10
            },
            1024: {
                slidesPerView: 4,
                spaceBetween: 20
            },
            1380: {
                slidesPerView: 4,
                spaceBetween: 40
            },
           
        }
    });
    var swiper = new Swiper('.swiper-container-channel2', {
          
          spaceBetween: 5,
              nextButton: '.swiper-channel2-one',
             prevButton: '.swiper-channel2-two',
              breakpoints: {
              320: {
                  slidesPerView: 1,
                  spaceBetween: 10
              },
              640: {
                  slidesPerView: 1,
                  spaceBetween: 20
              },
              768: {
                  slidesPerView: 3,
                  spaceBetween: 10
              },
              1024: {
                  slidesPerView: 4,
                  spaceBetween: 20
              },
              1380: {
                  slidesPerView: 4,
                  spaceBetween: 40
              },
             
          }
      });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.Main.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\media\resources\views/Main/channel/about.blade.php ENDPATH**/ ?>