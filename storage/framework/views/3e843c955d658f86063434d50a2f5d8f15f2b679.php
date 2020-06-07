

<?php $__env->startSection('content'); ?>

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">پست ها</a></li>
        <li class="breadcrumb-item active">پست های پیش نویس</li>
        
    </ol>
</nav>

<div class="col-sm-12 col-sm-offset-3 col-md-12  ">
    <div class="wpb_wrapper py-3">
        <h2 class="  mt-15 mb-15 title__divider title__divider--line" style="margin-right: 0px;"><span
                class="title__divider__wrapper">پست های پیش نویس<span class="line brk-base-bg-gradient-right"></span>
            </span></h2>
    </div>
    <div style="overflow-x: auto;">
        <table id="example1" class="table table-striped  table-bordered w-100">
            <thead class="grey lighten-1 text-white">
                <tr>
                    <th>ردیف</th>
                    <th> نام پست</th>
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
                        <a class="text-primary" href=" <?php echo e(route('ShowItem',['content'=>$post->categories->name,'slug'=>$post->slug])); ?>">
                            <?php echo e($post->title); ?>

                        </a>
                    </td>
                    <td><?php echo e($post->categories->name); ?></td>
                    <td><?php echo e($post->languages->name); ?></td>
                    <td><?php echo e($post->levels->name); ?></td>
                    <td><?php echo e($post->subjects->name); ?></td>
                    <td><?php echo e($post->members->username); ?></td>
                    <td><?php echo e(\Morilog\Jalali\Jalalian::forge($post->created_at)->format('%d %B %Y')); ?></td>
                    <?php switch($post->confirmed):
                    case (0): ?>
                    <td>در انتظار تایید</td>
                    <td>
                        <div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
                            <a href="<?php echo e(route('Admin.CheckPost',$post->id)); ?>?member=<?php echo e($post->members_id); ?>"
                                class=" btn btn-primary btn-sm m-0">مشاهده  </a>
                          
                        </div>
                    </td>
                    <?php break; ?>
                    <?php case (1): ?>
                    <td>تایید شده</td>
                    <td>رد</td>
                    <?php break; ?>
                    <?php case (2): ?>
                    <td>تایید نشده
                        به علت
                        <?php echo e($post->rejectreason); ?></td>
                    <td>

                        <div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
                            <a href="#" class=" btn btn-primary btn-sm m-0">تایید</a>
                        </div>


                    </td>
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
<?php echo $__env->make('layout.Panel.temp', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\media\resources\views/Panel/PostsDraft.blade.php ENDPATH**/ ?>