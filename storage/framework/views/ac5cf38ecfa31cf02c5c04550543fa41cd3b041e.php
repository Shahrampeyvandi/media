

<?php $__env->startSection('content'); ?>
<div id="popup1" class="overlay">
    <div class="popup">

        <a class="close" href="#">&times;</a>
        <div class="content">
            <form id="" action="<?php echo e(route('Panel.Post.Delete')); ?>" method="post">
                <?php echo csrf_field(); ?>
               
                <div class="mt-5 pr-2">
                    <h5 class="modal-title  pt-1 mb-2" id="exampleModalLabel">اخطار</h5>
                    <div class="form-group col-md-12">
                        <input type="hidden" id="post_id" name="post_id" value="0">
                      
                       
                    </div>
                    <p>آیا برای حذف مورد مطمئن هستید؟</p>
                </div>
                <div class="form-group   offset-md-10">

                    <button type="submit" class="btn btn-sm btn-danger ">حذف </button>
                </div>
            </form>
        </div>
    </div>
</div>

        <div class="tab-wrapper">

            <a href="<?php echo e(route('Panel.Posts.All')); ?>" <?php if(request()->path() == "panel/allposts/category"): ?>
                class="btn btn-info" <?php else: ?> class="btn btn-light"  <?php endif; ?>>فیلم ها و سریال ها</a>
            <a href="<?php echo e(route('Panel.Posts.All','clips')); ?>" <?php if(request()->path() == "panel/allposts/category/clips"): ?>
                class="btn btn-info" <?php else: ?> class="btn btn-light"  <?php endif; ?>> کلیپ ها</a>
            <a href="<?php echo e(route('Panel.Posts.All','animations')); ?>" <?php if(request()->path() == "panel/allposts/category/animations"): ?>
                class="btn btn-info" <?php else: ?> class="btn btn-light"  <?php endif; ?>> انیمیشن ها</a>
            <a href="<?php echo e(route('Panel.Posts.All','musics')); ?>" <?php if(request()->path() == "panel/allposts/category/musics"): ?>
                class="btn btn-info" <?php else: ?> class="btn btn-light"  <?php endif; ?>>موسیقی ها</a>
            <a href="<?php echo e(route('Panel.Posts.All','podcasts')); ?>" <?php if(request()->path() == "panel/allposts/category/podcasts"): ?>
                class="btn btn-info" <?php else: ?> class="btn btn-light"  <?php endif; ?>> پادکست ها</a>
            <a href="<?php echo e(route('Panel.Posts.All','learnings')); ?>" <?php if(request()->path() == "panel/allposts/category/learnings"): ?>
                class="btn btn-info" <?php else: ?> class="btn btn-light"  <?php endif; ?>> دوره های آموزشی </a>



            <a href="#"></a>
        </div>
        <hr>


<div class="col-sm-12 col-sm-offset-3 col-md-12  ">
    <div class="wpb_wrapper py-3">
        <h2 class="  mt-15 mb-15 title__divider title__divider--line"
            style="margin-right: 0px;"><span class="title__divider__wrapper">پست ها<span
                    class="line brk-base-bg-gradient-right"></span>
            </span></h2>
     
    </div>
    <div style="overflow-x: auto;">
        <table id="example1" class="table table-striped  table-bordered">
            <thead class="blue lighten-2 text-white">
            <tr>
                <th>ردیف</th>
                <th > نام پست</th>
                <th>بازدید ها</th>
                <th>لایک ها</th>
                <th>گزارشات تخلف</th>
                <th>دسته بندی</th>
                <th>زبان</th>
                <th>سطح</th>
                <th>موضوع</th>
                <th>نویسنده</th>
                <th>تاریخ ثبت</th>
                <th>وضعیت</th>
                <th>عملیات</th>

            </tr>
            </thead>

            <tbody>
            <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
            <td><?php echo e($key+1); ?></td>
            <td>
            <a href="<?php echo e(route('ShowItem',$post->id)); ?>" class="text-primary"><?php echo e($post->title); ?></a>
            </td>
            <td><?php echo e($post->views); ?></td>
            <td class="text-success"><?php echo e($post->likes->count()); ?></td>
            <td class="text-danger"><?php echo e($post->violations->count()); ?></td>
            <td><?php echo e($post->categories->name); ?></td>
            <td><?php echo e($post->languages->name); ?></td>
            <td><?php echo e($post->levels->name); ?></td>
            <td><?php echo e($post->subjects->name); ?></td>
            <td><?php echo e($post->members->username); ?></td>
            <td><?php echo e(\Morilog\Jalali\Jalalian::forge($post->created_at)->format('%d %B %Y')); ?></td>
            <?php switch($post->confirmed):
            case (0): ?>
            <td>در انتظار تایید</td>
            <td>تایید  -  رد</td>
            <?php break; ?>
            <?php case (1): ?>
            <td>تایید شده</td>
            <td>
                <div class="btn-group" role="group" aria-label="">
                <a  href="<?php echo e(route('Admin.CheckPost',$post->id)); ?>" class=" btn btn-rounded btn-info btn-sm m-0">ویرایش</a>
                    <a  data-id="<?php echo e($post->id); ?>" class="delete-post btn btn-rounded btn-danger btn-sm m-0">حذف</a>
                  </div>
            </td>
            <?php break; ?>
            <?php case (2): ?>
            <td>تایید نشده</td>
            <td>تایید</td>
            <?php break; ?>
            <?php endswitch; ?>
            

            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          
          
            </tbody>
        </table>
    </div>
    <div style="text-align: center">
        
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>
   
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.Panel.temp', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\media\resources\views/Panel/Posts.blade.php ENDPATH**/ ?>