

<?php $__env->startSection('content'); ?>

<div id="popup" class="overlay delete">
    <div class="popup">
        <a class="close" href="#">&times;</a>
        <div class="content">
            <form id="" action="<?php echo e(route('Panel.Posts.Reject.Submit')); ?>" method="get">
                <?php echo csrf_field(); ?>
                <div class="mt-5 pr-2">
                    <h5 class="modal-title  pt-1 mb-2" id="exampleModalLabel">اخطار</h5>
                    <div class="form-group col-md-12">
                        <input type="hidden" id="post-id" name="post_id" value="">
                        <input type="hidden" id="member-id" name="member_id" value="">
                    </div>
                    <label for="user_pass" class="col-form-label"><span class="text-danger">*</span> دلیل عدم تایید:
                    </label>
                    <div class="form-group mt-2 ">
                        <select name="reason" id="reason" class="form-control browser-default custom-select">
                            <option value="" selected>باز کردن فهرست انتخاب</option>
                       <?php $__currentLoopData = \App\Models\Contents\ViolationList::latest()->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($item->name); ?>" ><?php echo e($item->name); ?></option>
    
                       <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                       
                        </select>
                    </div>               
                </div>
                <div class="form-group  float-left mt-1 ">
                    <button type="submit" class="btn btn-sm btn-danger ">عدم تایید </button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div>
            <a href="<?php echo e(route('Panel.Posts.Unconfirmed')); ?>" <?php if(request()->path() == "panel/allposts/unconfirmed"): ?>
                class="btn btn-info" <?php else: ?> class="btn btn-light" <?php endif; ?>>درانتظار تایید</a>
            <a href="<?php echo e(route('Panel.Posts.Rejected')); ?>" <?php if(request()->path() == "panel/allposts/rejected"): ?>
                class="btn btn-info" <?php else: ?> class="btn btn-light" <?php endif; ?>>تایید نشده</a>
            <a href="#"></a>
        </div>
        <hr>
    </div>
</div>
<div class="col-sm-12 col-sm-offset-3 col-md-12  ">
    <div class="wpb_wrapper py-3">
        <h2 class="  mt-15 mb-15 title__divider title__divider--line" style="margin-right: 0px;"><span
                class="title__divider__wrapper">پست ها<span class="line brk-base-bg-gradient-right"></span>
            </span></h2>
    </div>
    <div style="overflow-x: auto;">
        <table id="example1" class="table table-striped  table-bordered">
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
                        <a class="text-primary" href="<?php echo e(route('ShowItem',$post->id)); ?>">
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
                                class=" btn btn-primary btn-sm m-0">مشاهده و تایید</a>
                            <a data-id="<?php echo e($post->id); ?>" data-member="<?php echo e($post->members_id); ?>"
                                class="post--delete btn btn-danger btn-sm m-0">رد</a>
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