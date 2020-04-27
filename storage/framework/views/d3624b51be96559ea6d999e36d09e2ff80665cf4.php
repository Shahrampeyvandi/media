

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
                <div class="pr-3">
                    <div id="primary" class="primary">

                        <?php echo $__env->make('Includes.Main.player', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                     </div>
 


                    <div class="head w-100 put-right  border-b-1 light-bc-30 dark-bc-100">
                        <div class="genre mb-md">
                            <?php $__currentLoopData = $content->tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <a href="#" class="actor d-in v-m fs-0-9 c-blue ml-xs"><span
                                    class="text">#<?php echo e($tag->name); ?></span></a>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                        <div class="d-flex justify-content-between align-items-center col-12">
                            <h1 class="title fs-1-4 fw-300"> <?php echo e($content->title); ?></h1>
                            <div class="d-flex align-items-center">
                                <a id="shareinmedia" href="#"
                                    class="button button-medium button-gray button-hollow "><svg class="icon icon-share"
                                        viewBox="0 0 24 24" 0="" 24="" 24""="">
                                        <use xlink:href="#si_share">
                                            <g id="si_share" data-viewBox="0 0 24 24">
                                                <path d="M0 0h24v24H0z" fill="none"></path>
                                                <path
                                                    d="M18 16.08a2.912 2.912 0 0 0-1.96.77L8.91 12.7A3.274 3.274 0 0 0 9 12a3.274 3.274 0 0 0-.09-.7l7.05-4.11A2.993 2.993 0 1 0 15 5a3.274 3.274 0 0 0 .09.7L8.04 9.81a3 3 0 1 0 0 4.38l7.12 4.16a2.821 2.821 0 0 0-.08.65A2.92 2.92 0 1 0 18 16.08zM18 4a1 1 0 0 1 1 1l.063-1-1.83-.656C16.683 3.344 17 5.55 17 5a1 1 0 0 1 1-1zM6 13c-.55 0 .672.847.672.3S5.45 13.219 6 13.219s0-.019 0 .531.55-.75 0-.75zm12 7.02c-.55 0-.234 1.046-.234.5s-.237-.172.313-.172.172-.55.172 0 .299-.328-.251-.328z">
                                                </path>
                                            </g>
                                        </use>
                                    </svg></a>
                                <a href="#" id="like-post" data-id="<?php echo e($content->id); ?>"> <span class="text-success">
                                        <?php echo e($likes); ?>

                                    </span>
                                    <svg class="icon icon-thumb-up d-in v-m c-theme fs-1-2 ml-xxs" viewBox="0 0 24 24"
                                        0="" 24="" 24""="">
                                        <use xlink:href="#si_thumb-up">
                                            <g id="si_thumb-up" data-viewbox="0 0 24 24">
                                                <path d="M0 0h24v24H0z" fill="none"></path>
                                                <path d="M0 0h24v24H0z" fill="none"></path>
                                                <path
                                                    d="M9 21h9a1.987 1.987 0 0 0 1.84-1.22l3.02-7.05A1.976 1.976 0 0 0 23 12v-2a2.006 2.006 0 0 0-2-2h-6.31l.95-4.57.03-.32a1.505 1.505 0 0 0-.44-1.06L14.17 1 7.58 7.59A1.987 1.987 0 0 0 7 9v10a2.006 2.006 0 0 0 2 2zM9 9l4.34-4.34L12 10h9v2l-3 7H9z">
                                                </path>
                                                <path transform="translate(1 9)" d="M0 0h4v12H0z"></path>
                                            </g>
                                        </use>
                                    </svg> </a>
                                <a href="#" data-id="<?php echo e($content->id); ?>" class="favorite-post pt-2 mx-2">
                                    <svg class="icon icon-favorite" <?php if($favorite_status): ?> fill="red" <?php else: ?> fill="gray"
                                        <?php endif; ?> viewBox="0 0 24 24" 0="" 24="" 24""="">
                                        <use xlink:href="#si_favorite">
                                            <g id="si_favorite" data-viewBox="0 0 24 24">
                                                <path d="M0 0h24v24H0z" fill="none"></path>
                                                <path
                                                    d="M16.5 3A5.988 5.988 0 0 0 12 5.09 5.988 5.988 0 0 0 7.5 3 5.447 5.447 0 0 0 2 8.5c0 3.78 3.4 6.86 8.55 11.54L12 21.35l1.45-1.32C18.6 15.36 22 12.28 22 8.5A5.447 5.447 0 0 0 16.5 3zm-4.4 15.55l-.1.1-.1-.1C7.14 14.24 4 11.39 4 8.5A3.418 3.418 0 0 1 7.5 5a3.909 3.909 0 0 1 3.57 2.36h1.87A3.885 3.885 0 0 1 16.5 5 3.418 3.418 0 0 1 20 8.5c0 2.89-3.14 5.74-7.9 10.05z">
                                                </path>
                                            </g>
                                        </use>
                                    </svg>

                                </a>
                                <?php if(auth()->check()): ?>
                                <a class="report-btn  p-1 text-danger mr-2 fs-0-8 radius-5 border-1 bc-red">

                                    گزارش تخلف
                                </a>
                                <?php endif; ?>

                                <?php if(auth()->check()): ?>
                                <a data-id="0" class="button__  p-1 text-primary mr-2 fs-0-8 radius-5 border-1 bc-blue">

                                    افزودن دیدگاه
                                </a>

                                <?php endif; ?>

                            </div>
                        </div>

                    </div>


                    <div class="head  put-right  light-bc-30 dark-bc-100 mt-2" style="display: flex; ">
                        <div class="avatar">
                            <?php if($content->members->avatar): ?>
                        <a href="<?php echo e(route('User.Show',['name'=>$content->members->username])); ?>" class="picture user-avatar">
                                <img src="<?php echo e(asset('members/1587120640.jpg')); ?>" alt="">
                            </a>

                            <?php else: ?>
                            <a href="<?php echo e(route('User.Show',['name'=>$content->members->username])); ?>" class="picture image"
                                style="width: 40px;height: 40px;    border: 2px solid #eaeaea;">
                                <i class="fa fa-user  position-absolute fs-1-5 text-white"
                                    style="right: 12px;top: 7px;"></i>
                            </a>
                            <?php endif; ?>


                            <div class=" fs-0-8 mt-2 mr-1">
                                <a id="" href="<?php echo e(route('User.Show',['name'=>$content->members->username])); ?>" title="<?php echo e($content->members->username); ?>">
                                    <h3 class="title">
                                        <span class="name"><?php echo e($content->members->username); ?></span>
                                    </h3>
                                </a>
                            </div>
                        </div>
                        <a href="#" title="" data-id="<?php echo e($content->members->id); ?>" class="follow-link"><i class="fa fa-plus"></i> <span class="text">دنبال
                                کردن</span></a>
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
                        <h3 class="fs-0-9 mb-xs">توضیحات</h3>
                        <p class="paragraph mb-lg text-black-50">
                            <?php echo $content->desc; ?>

                        </p>
                    </div>
                    <div class="description w-100 put-right pr-2">
                        <h3 class="fs-0-9 mb-xs">متن زیرنویس: </h3>
                        <p class="paragraph mb-lg text-black-50">
                            <?php echo $content->otheroninformation; ?>

                        </p>
                    </div>
                    <div class="information w-100 put-right  fs-0-9 fw-300 light-80 dark-white mt-xl mb-5 pr-2">
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

                    <div id="episodes_list" class="episodes_list">
                        <div class="episodes_list--section">

                            <div class="episodes_list--item ">
                                <div class="section-right"><span class="episodes_list--number">۰</span>
                                    <div class="episodes_list--title"><a
                                            href="<?php echo e(route('ShowItem',['id'=>$post->id])); ?>">معرفی دوره</a></div>
                                </div>
                                <div class="section-left">
                                    <div class="episodes_list--details">
                                    <?php if(auth()->user()): ?>
                                       <?php if($content->members_id == auth()->user()->id): ?>
                            
                                       <span class="btn btn-info btn-sm btn-rounded">
                                       تعداد بازدیدها  <?php echo e($post->views); ?></span>
                                       <?php endif; ?>
                                       <?php endif; ?>
                                        <span class="detail-type">
                                            رایگان</span>
                                        <span class="detail-time"><?php echo e($post->duration); ?>

                                        </span>

                                    </div>
                                </div>
                            </div>

                            <?php $__currentLoopData = $episodes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $episode): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="episodes_list--item lock">
                                <div class="section-right"><span
                                        class="episodes_list--number"><?php echo e($episode->number); ?></span>
                                    <div class="episodes_list--title">
                                   <?php if($isbuyedit==true): ?>
                                    <a href="<?php echo e(route('ShowItem.Episode',['id'=>$episode->posts_id,'ep'=>$episode->number])); ?>">
                                    <?php endif; ?>
                                            <?php echo e($episode->title); ?>

                                        </a></div>
                                </div>
                                <div class="section-left">
                                    <div class="episodes_list--details">
                                    <?php if(auth()->user()): ?>
                                       <?php if($content->members_id == auth()->user()->id): ?>
                                       <a href="#"><span class="btn btn-danger btn-sm btn-rounded">
                                      حذف  </span></a>
                                       <span class="btn btn-info btn-sm btn-rounded">
                                       تعداد بازدیدها  <?php echo e($episode->views); ?></span>
                                       <?php endif; ?>
                                       <?php endif; ?>
                                        <span
                                            class="detail-time"><?php echo e($episode->duration); ?></span></div>
                                </div>
                            </div>

                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>




                        </div>
                    </div>



                    <div class="w-100 information put-right mt-2 mb-5 pl-3 radius-5 text-black-50 border-1">

                        <h3 class="mb-2 pr-2 pt-3 text-info">نظرهای شما</h3>
                        <?php if(count($comments)): ?>
                        <?php $__currentLoopData = $comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="row mr-2 ml-5 mb-2" style="   background: #e9e9ff;
                                border-radius: 5px;
                                padding: 10px;">
                            <div class="col-3 col-md-1 pl-0">
                                <div class="w-100 d-flex justify-content-center pt-3">
                                    <img class="w-100 rounded-circle" src="<?php echo e(asset('assets/images/avatar.png')); ?>"
                                        alt="">
                                </div>
                            </div>
                            <div class="col-12 col-md-11 pl-3 comment-user-name">
                                <div class="mt-3">
                                    <div class=" d-flex justify-content-between mb-2">
                                        <h3><?php echo e($comment->members->firstname .' '.$comment->members->lastname); ?></h3>
                                        <span class="text-black-50 fs-0-8">
                                            <?php echo e(\Morilog\Jalali\Jalalian::forge($comment->created_at)->format('%d %B %Y')); ?>

                                        </span>
                                    </div>
                                    <p style="word-wrap: break-word;min-height: 40px;" class="w-100">
                                        <?php echo $comment->text; ?>

                                    </p>
                                    <div>
                                        <div class="d-flex justify-content-end">

                                            <div>
                                                <a data-id="<?php echo e($comment->id); ?>"
                                                    class="like-comment border-1 radius-5 pr-2 text-success" href="#">
                                                    <span
                                                        class="text-success pl-3"><?php echo e(\App\Models\Contents\CommentsLikes::where('comments_id',$comment->id)->where('score','like')->count()); ?></span>
                                                    <i class="fa fa-plus-square"></i>
                                                </a>
                                                <a data-id="<?php echo e($comment->id); ?>"
                                                    class="dislike-comment border-1 radius-5 pr-2 text-danger mr-2"
                                                    href="#"> <span
                                                        class="text-success pl-3"><?php echo e(\App\Models\Contents\CommentsLikes::where('comments_id',$comment->id)->where('score','dislike')->count()); ?></span>
                                                    <i class="fa fa-plus-square pl-1"></i>
                                                </a>
                                            </div>
                                            <div class="text-info mr-2">
                                                <a href="#"
                                                    data-name="<?php echo e($comment->members->firstname .' '.$comment->members->lastname); ?>"
                                                    data-id="<?php echo e($comment->id); ?>" class="button__"> پاسخ
                                                    <i class="fa fa-reply"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php $__currentLoopData = \App\Models\Contents\Comments::where('parent_id',$comment->id)->where('confirmed',1)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment_l2): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="row mr-3 ml-2 mb-2" style="   background: #e9e9ff;
                                                       border-radius: 5px;
                                                       padding: 10px;">
                            <div class="col-3 col-md-1 pl-0">
                                <div class="w-100 d-flex justify-content-center pt-3">
                                    <img class="w-100 rounded-circle" src="<?php echo e(asset('assets/images/avatar.png')); ?>"
                                        alt="">
                                </div>
                            </div>
                            <div class="col-12 col-md-11 pl-3 comment-user-name">
                                <div class="mt-3">
                                    <div class=" d-flex justify-content-between mb-2">
                                        <h3><?php echo e($comment_l2->members->firstname .' '.$comment_l2->members->lastname); ?>

                                        </h3>
                                        <span class="text-black-50 fs-0-8">
                                            <?php echo e(\Morilog\Jalali\Jalalian::forge($comment_l2->created_at)->format('%d %B %Y')); ?>

                                        </span>
                                    </div>

                                    <p style="word-wrap: break-word;min-height: 40px;" class="w-100">
                                        <?php echo $comment_l2->text; ?>

                                    </p>
                                    <div>
                                        <div class="d-flex justify-content-end">

                                            <div>
                                                <a data-id="<?php echo e($comment_l2->id); ?>"
                                                    class="like-comment border-1 radius-5 pr-2 text-success" href="#">
                                                    <span
                                                        class="text-success pl-3"><?php echo e(\App\Models\Contents\CommentsLikes::where('comments_id',$comment_l2->id)->where('score','like')->count()); ?></span>
                                                    <i class="fa fa-plus-square"></i>
                                                </a>
                                                <a data-id="<?php echo e($comment_l2->id); ?>"
                                                    class="dislike-comment border-1 radius-5 pr-2 text-danger mr-2"
                                                    href="#"> <span
                                                        class="text-success pl-3"><?php echo e(\App\Models\Contents\CommentsLikes::where('comments_id',$comment_l2->id)->where('score','dislike')->count()); ?></span>
                                                    <i class="fa fa-plus-square pl-1"></i>
                                                </a>
                                            </div>
                                            <div class="text-info mr-2">
                                                <a href="#" data-id="<?php echo e($comment_l2->id); ?>" class="button__"> پاسخ
                                                    <i class="fa fa-reply"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php $__currentLoopData = \App\Models\Contents\Comments::where('parent_id',$comment_l2->id)->where('confirmed',1)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment_l3): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="row mr-5 ml-2 mb-2" style="   background: #e9e9ff;
                            border-radius: 5px;
                            padding: 10px;">
                            <div class="col-3 col-md-1 pl-0">
                                <div class="w-100 d-flex justify-content-center pt-3">
                                    <img class="w-100 rounded-circle" src="<?php echo e(asset('assets/images/avatar.png')); ?>"
                                        alt="">
                                </div>
                            </div>
                            <div class="col-12 col-md-11 pl-3 comment-user-name">
                                <div class="mt-3">
                                    <div class=" d-flex justify-content-between mb-2">
                                        <h3><?php echo e($comment_l3->members->firstname .' '.$comment_l3->members->lastname); ?>

                                        </h3>
                                        <span class="text-black-50 fs-0-8">
                                            <?php echo e(\Morilog\Jalali\Jalalian::forge($comment_l3->created_at)->format('%d %B %Y')); ?>

                                        </span>
                                    </div>

                                    <p style="word-wrap: break-word;min-height: 40px;" class="w-100">
                                        <?php echo $comment_l3->text; ?>

                                    </p>
                                    <div>
                                        <div class="d-flex justify-content-end">

                                            <div>
                                                <a href="#"> <span class="text-success">0</span>
                                                    <svg class="icon icon-thumb-up d-in v-m c-theme fs-1-2 ml-xxs"
                                                        viewBox="0 0 24 24" 0="" 24="" 24""="">
                                                        <use xlink:href="#si_thumb-up">
                                                            <g id="si_thumb-up" data-viewbox="0 0 24 24">
                                                                <path d="M0 0h24v24H0z" fill="none"></path>
                                                                <path d="M0 0h24v24H0z" fill="none"></path>
                                                                <path
                                                                    d="M9 21h9a1.987 1.987 0 0 0 1.84-1.22l3.02-7.05A1.976 1.976 0 0 0 23 12v-2a2.006 2.006 0 0 0-2-2h-6.31l.95-4.57.03-.32a1.505 1.505 0 0 0-.44-1.06L14.17 1 7.58 7.59A1.987 1.987 0 0 0 7 9v10a2.006 2.006 0 0 0 2 2zM9 9l4.34-4.34L12 10h9v2l-3 7H9z">
                                                                </path>
                                                                <path transform="translate(1 9)" d="M0 0h4v12H0z">
                                                                </path>
                                                            </g>
                                                        </use>
                                                    </svg> </a>
                                            </div>
                                            <div class="text-info mr-2">
                                                <a href="#" data-id="<?php echo e($comment_l3->id); ?>" class="button__"> پاسخ
                                                    <i class="fa fa-reply"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php else: ?>
                        <p class="py-3 pr-2 text-black-50">هیچ نظری برای این پست ثبت نشده است</p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <?php echo $__env->make('Includes.Main.relatedposts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
    </div>
</div>
</main>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>

<link rel="stylesheet" href="https://cdn.plyr.io/3.5.10/plyr.css" />
<script src="https://cdn.plyr.io/3.5.10/plyr.js"></script>
<script>
    const player = new Plyr('#player',{
        
    });
</script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layout.Main.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\media\resources\views/Main/tutorial.blade.php ENDPATH**/ ?>