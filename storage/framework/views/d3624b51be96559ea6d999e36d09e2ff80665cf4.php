

<?php $__env->startSection('css'); ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.3.1/js/swiper.js"></script>
<link href="https://vjs.zencdn.net/7.7.5/video-js.css" rel="stylesheet" />
<link rel="stylesheet" href="<?php echo e(route('BaseUrl')); ?>/assets/css/style.css" />

<!-- If you'd like to support IE8 (for Video.js versions prior to v7) -->
<script src="https://vjs.zencdn.net/ie8/1.1.2/videojs-ie8.min.js"></script>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>


<div id="container" class="container">
    <div class="view">


        <div class="row">
            <div class="col-md-9">
                <div class="pr-3">
                    <div id="primary" class="primary">

                        <section id="play" class="mt-3">
                            <video id="my-video" class="video-js" controls preload="auto" width="640" height="264"
                                poster="<?php echo e(route('BaseUrl')); ?>/<?php echo e($content->picture); ?>" data-setup="{}">
                                <source src="<?php echo e(route('BaseUrl')); ?>/<?php echo e($content->content_link); ?>" type="video/mp4" />
                                <source src="<?php echo e(route('BaseUrl')); ?>/<?php echo e($content->content_link); ?>" type="video/webm" />
                                
                                <p class="vjs-no-js">
                                    To view this video please enable JavaScript, and consider upgrading to a
                                    web browser that
                                    <a href="https://videojs.com/html5-video-support/" target="_blank">supports
                                        HTML5 video</a>
                                </p>
                            </video>
                        </section>
                    </div>
                    <div id="popup1" class="overlay1">
                        <div class="popup">
                            <a class="close" href="#">&times;</a>
                            <div class="content">
                                <form id="" action="<?php echo e(route('AddComment')); ?>" method="post">
                                    <?php echo csrf_field(); ?>
                                    <div class="mt-3">
                                        <h5 class="modal-title px-3 pt-1 mb-2" id="exampleModalLabel"> افزودن دیدگاه
                                        </h5>
                                        <div class="form-group col-md-12">
                                            <input type="hidden" id="parent_id" name="parent_id" value="0">
                                            <input type="hidden" name="post_id" value="<?php echo e($content->id); ?>">
                                            <textarea type="text" rows="4" class="form-control" name="comment"
                                                id="comment"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <button type="submit" class="btn btn-sm btn-primary">ارسال </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div id="popup1" class="overlay report">
                        <div class="popup">
                            <a class="close" href="#">&times;</a>
                            <div class="content">
                                <form id="" action="<?php echo e(route('AddComment')); ?>" method="post">
                                    <?php echo csrf_field(); ?>
                                    <div class="mt-3">
                                        <h5 class="modal-title px-3 pt-1 mb-2" id="exampleModalLabel"> ارسال گزارش تخلف
                                        </h5>
                                        <div class="form-group col-md-12">
                                            <input type="hidden" id="parent_id" name="parent_id" value="0">
                                            <input type="hidden" name="post_id" value="<?php echo e($content->id); ?>">
                                            <input type="text"  class="form-control mb-2" name="title"
                                            id="title" placeholder="عنوان">
                                            <textarea type="text" placeholder="متن " rows="4" class="form-control" name="description"
                                                id="description"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <button type="submit" class="btn btn-sm btn-primary">ارسال </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="head w-100 put-right  border-b-1 light-bc-30 dark-bc-100">
                        <div class="genre mb-md">
                            <?php $__currentLoopData = $content->tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <a href="#" class="actor d-in v-m fs-0-9 c-blue ml-xs"><span
                                    class="text">#<?php echo e($tag->name); ?></span></a>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                        <div class="d-flex justify-content-between align-items-center col-11">
                            <h1 class="title fs-1-4 fw-300"> <?php echo e($content->title); ?></h1>
                            <div class="d-flex align-items-center">

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
                                <a  class="report-btn  p-1 text-danger mr-2 fs-0-8 radius-5 border-1 bc-red">

                                    گزارش تخلف محتوا
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
                    <div class="description w-100 put-right">
                        <h3 class="fs-0-9 mb-xs">توضیحات</h3>
                        <p class="paragraph mb-lg text-black-50">
                            <?php echo $content->desc; ?>

                        </p>
                    </div>

                    <div class="information w-100 put-right  fs-0-9 fw-300 light-80 dark-white mt-xl mb-5">
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
                            <div class="d-tc py-xs"><?php echo e($content->duration); ?></div>
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
                                            href="/series/react-native-tutorial/episode/0">معرفی دوره</a></div>
                                </div>
                                <div class="section-left">
                                    <div class="episodes_list--details"><span class="detail-type">رایگان</span> <span
                                            class="detail-time">۰۹:۴۹</span></div>
                                </div>
                            </div>
                            <div class="episodes_list--item ">
                                <div class="section-right"><span class="episodes_list--number">۱</span>
                                    <div class="episodes_list--title"><a
                                            href="/series/react-native-tutorial/episode/1">نصب و راه اندازی React Native
                                            در ویندوز</a></div>
                                </div>
                                <div class="section-left">
                                    <div class="episodes_list--details"><span class="detail-type">رایگان</span> <span
                                            class="detail-time">۴۴:۴۳</span></div>
                                </div>
                            </div>
                            <div class="episodes_list--item lock">
                                <div class="section-right"><span class="episodes_list--number">۲</span>
                                    <div class="episodes_list--title"><a
                                            href="/series/react-native-tutorial/episode/2">نصب و راه اندازی React Native
                                            در macOs</a></div>
                                </div>
                                <div class="section-left">
                                    <div class="episodes_list--details"><span class="detail-time">۱۶:۳۵</span></div>
                                </div>
                            </div>
                            <div class="episodes_list--item lock">
                                <div class="section-right"><span class="episodes_list--number">۳</span>
                                    <div class="episodes_list--title"><a
                                            href="/series/react-native-tutorial/episode/3">debugging در پروژه های React
                                            native</a></div>
                                </div>
                                <div class="section-left">
                                    <div class="episodes_list--details"><span class="detail-time">۱۸:۳۷</span></div>
                                </div>
                            </div>
                            <div class="episodes_list--item lock">
                                <div class="section-right"><span class="episodes_list--number">۴</span>
                                    <div class="episodes_list--title"><a
                                            href="/series/react-native-tutorial/episode/4">سلام دنیا با React Native</a>
                                    </div>
                                </div>
                                <div class="section-left">
                                    <div class="episodes_list--details"><span class="detail-time">۱۱:۰۴</span></div>
                                </div>
                            </div>
                            <div class="episodes_list--item lock">
                                <div class="section-right"><span class="episodes_list--number">۵</span>
                                    <div class="episodes_list--title"><a
                                            href="/series/react-native-tutorial/episode/5">مروری بر Props ها و State
                                            ها</a></div>
                                </div>
                                <div class="section-left">
                                    <div class="episodes_list--details"><span class="detail-time">۱۴:۲۵</span></div>
                                </div>
                            </div>
                            
                           
                        </div>
                    </div>
              


                    
</div>
</div>
<div class="col-md-3">
    <aside id="secondary" class="secondary">
        <section id="recom" class="single-recom">
            <header class="recom-header">
                <h3 class="title">پست های مرتبط</h3>
            </header>
            <div class="recommended-list">
                <div class="inner">
                   <?php if(count($relateds)): ?>
                   <?php $__currentLoopData = $relateds; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $related): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                   <div id="thumb" class="d-flex flex-md-wrap m-3 mx-md-0">
                       <div class="w-40">
                           <?php if($related->picture): ?>
                           <a href="<?php echo e(route('ShowItem',['id'=>$related->id])); ?>"> <img
                                   src="<?php echo e(route('BaseUrl')); ?>/<?php echo e($related->picture); ?>" alt="<?php echo e($related->title); ?>"
                                   aria-label="<?php echo e($related->title); ?>" class="thumb-image" style="min-height: 130px;"></a>
                           <?php else: ?>
                           <a href="<?php echo e(route('ShowItem',['id'=>$related->id])); ?>">
                               <div class="d-flex justify-content-center align-items-center h-100 p-3" style="    border: 1px solid gray;
                                           border-radius: 4px;">
                                   
                                   <i class="ti ti-video-camera text-black-50" style="font-size: 4rem;"></i>
                               </div>
                           </a>
                           <?php endif; ?>
                       </div>
                       <div class="thumb-details pr-2 pt-2 mb-3">
                           <h4 class="thumb-title">
                               <a href="<?php echo e(route('ShowItem',['id'=>$related->id])); ?>" title="<?php echo e($related->title); ?>"
                                   class="title"><span><?php echo e($related->title); ?></span></a>
                           </h4>
                           <a href="<?php echo e(route('Category',['slug'=>$related->categories->latin_name])); ?>"
                               title="<?php echo e($related->categories->name); ?>" class="thumb-channel has-priority"><span
                                   class="channel-name"><?php echo e($related->categories->name); ?></span>
                               <span class="priority-brand" title="رسمی">
                                   <svg class="icon icon-tick icon-priority" viewBox="0 0 24 24" 0="" 24="" 24""="">
                                       <use xlink:href="#si_tick">
                                           <g id="si_tick" data-viewBox="0 0 24 24">
                                               <path d="M0 0h24v24H0z" fill="none"></path>
                                               <path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41z">
                                               </path>
                                           </g>
                                       </use>
                                   </svg> </span></a>
                           <ul class="meta-tags d-b w-100 mt-xs">
                               <li class="meta d-in light-60 dark-110 fs-0-8">زبان:
                                   <?php echo e($related->languages->name); ?>

                               </li>
                           </ul>
                           <ul class="meta-tags d-b w-100">
                               <li class="meta d-in light-60 dark-110 fs-0-8">موضوع:
                                   <?php echo e($related->subjects->name); ?>

                               </li>
                           </ul>
                           <ul class="meta-tags d-b w-100">
                               <li class="meta d-in light-60 dark-110 fs-0-8">سطح:
                                   <?php echo e($related->levels->name); ?>

                               </li>
                           </ul>
                       </div>
                   </div>
                   <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                   <?php else: ?>
                   <p class="text-secondary">پست مرتبط با این موضوع وجود ندارد</p>
                   <?php endif; ?>
                </div>
            </div>
        </section>
    </aside>
</div>
</div>
</div>
</div>
</main>


<script src="https://vjs.zencdn.net/7.7.5/video.js"></script>


<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.Main.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\media\resources\views/Main/tutorial.blade.php ENDPATH**/ ?>