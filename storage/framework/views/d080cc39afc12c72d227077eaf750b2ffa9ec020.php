

<?php $__env->startSection('content'); ?>

<div class="col-sm-9 col-sm-offset-3 col-md-12  ">
    <div class="wpb_wrapper py-3">
        <h2 class="  mt-15 mb-15 title__divider title__divider--line"
            style="margin-right: 0px;"><span class="title__divider__wrapper">دوره های من<span
                    class="line brk-base-bg-gradient-right"></span>
            </span>
        <a class="float-left btn btn-outline-success btn-sm btn-rounded" href="<?php echo e(route('UploadFile')); ?>?c=tutorial">  <i class="fas fa-plus"></i> جدید</a>
        </h2>
     
    </div>
    <div style="overflow-x: auto;">
        <table id="example1" class="table table-striped  table-bordered w-100">
            <thead class="blue lighten-2 text-white">
            <tr>
                <th>ردیف</th>
                <th> نام </th>
                <th>دسته بندی</th>
                <th>زبان</th>
                <th>سطح</th>
                <th>موضوع</th>
                <?php if(auth()->user()->group!=='student'): ?>
                <th>کامنت ها</th>
                <th>گزارشات تخلف</th>
                <th>لایک ها</th>
                <th>بازدیدها</th>
                <th>عملیات</th>
                <?php endif; ?>
                

            </tr>
            </thead>

            <tbody>
            <?php $__currentLoopData = $tutorials; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
            <td><?php echo e($key+1); ?></td>
            <td>
            <a href="<?php echo e(route('ShowItem',$post->id)); ?>" class="text-primary"><?php echo e($post->title); ?></a>
            </td>
            <td><?php echo e($post->categories->name); ?></td>
            <td><?php echo e($post->languages->name); ?></td>
            <td><?php echo e($post->levels->name); ?></td>
            <td><?php echo e($post->subjects->name); ?></td>
            <?php if(auth()->user()->group!=='student'): ?>
            <td><?php echo e($post->comments->count()); ?></td>
            <td><?php echo e($post->violations->count()); ?></td>
            <td><?php echo e($post->likes->count()); ?></td>
            <td><?php echo e($post->views); ?></td>
          
            
            <td>
                <div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
                    <a href="<?php echo e(route('ShowItem',$post->id)); ?>" class="btn btn-sm btn-rounded btn-primary">مشاهده</a>
                <a href="<?php echo e(route('Tutorial.CreateEpisode',$post->id)); ?>"  class=" btn btn-danger btn-sm m-0">قسمت جدید <i class="fa fa-plus"></i></a>
                    </div>
            
            </td>
            <?php endif; ?>
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
<?php echo $__env->make('layout.Panel.temp', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\media\resources\views/Panel/MyTutorials.blade.php ENDPATH**/ ?>