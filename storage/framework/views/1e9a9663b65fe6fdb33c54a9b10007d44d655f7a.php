

<?php $__env->startSection('content'); ?>
<div id="popup1" class="overlay">
    <div class="popup">

        <a class="close" href="#">&times;</a>
        <div class="content">
            <form id="" action="<?php echo e(route('Panel.Checkout')); ?>" method="post">
                <?php echo csrf_field(); ?>

                <div class="mt-5 pr-2">
                    <h5 class="modal-title  pt-1 mb-2" id="exampleModalLabel">تسویه حساب</h5>
                    <div class="form-group col-md-12">
                        <input type="hidden" id="post_id" name="id" value="0">


                    </div>
                    <p>آیا با تسویه حساب با استاد و انتقال موجودی کیف پول به حساب فرد موافقید؟</p>
                </div>
                <div class="form-group   offset-md-9">

                    <button type="submit" class="btn btn-sm btn-danger ">تسویه حساب </button>
                </div>
            </form>
        </div>
    </div>
</div>



<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">کاربران </a></li>
        <li class="breadcrumb-item"><a href="#">لیست کاربران</a></li>
        <li class="breadcrumb-item active" aria-current="page">
            <?php switch(request()->path()):
            case ("panel/members"): ?>
            دانشجویان
            <?php break; ?>
            <?php case ("panel/members/teacher"): ?>
            اساتید
            <?php break; ?>
            <?php case ("panel/members/deactive"): ?>
            غیر فعال
            <?php break; ?>


            <?php default: ?>

            <?php endswitch; ?>
        </li>
    </ol>
</nav>
<div class="row">
    <div class="col-md-12">
        <div>

            <a href="<?php echo e(route('Panel.Members')); ?>" <?php if(request()->path() == "panel/members"): ?>
                class="btn btn-info" <?php else: ?> class="btn btn-light" <?php endif; ?>>دانشجویان</a>
            <a href="<?php echo e(route('Panel.Members','teacher')); ?>" <?php if(request()->path() == "panel/members/teacher"): ?>
                class="btn btn-info" <?php else: ?> class="btn btn-light" <?php endif; ?>>اساتید</a>
            <a href="<?php echo e(route('Panel.Members','deactive')); ?>" <?php if(request()->path() == "panel/members/deactive"): ?>
                class="btn btn-info" <?php else: ?> class="btn btn-light" <?php endif; ?>>غیر فعال</a>


            <a href="#"></a>
        </div>
        <hr>
    </div>
</div>

<div class="col-sm-9 col-sm-offset-3 col-md-12  ">
    <div class="wpb_wrapper py-3">
        <h2 class="  mt-15 mb-15 title__divider title__divider--line" style="margin-right: 0px;"><span
                class="title__divider__wrapper">کاربران<span class="line brk-base-bg-gradient-right"></span>
            </span></h2>

    </div>
    <style>
        td {
            text-align: center;
        }
    </style>
    <div style="overflow-x: auto;">
        <table id="example1" class="table table-striped  table-bordered " style="width: 120%;">
            <thead>
                <tr>
                    <th>ردیف</th>
                    <th>نام </th>
                    <th>نام خانوادگی</th>
                    <th>موبایل</th>
                    <th>یوزرنیم</th>
                    <th>ایمیل</th>
                    <?php if(request()->path() == "panel/members/teacher"): ?>
                    <th>موجودی کیف پول</th>
                    <th>نقش مدیریت</th>
                    <th>وضعیت کانال</th>
                    <?php endif; ?>
                    <th>تاریخ عضویت</th>

                    <?php if(auth()->user()->is_admin()): ?>
                    <th>عملیات</th>
                    <?php endif; ?>

                </tr>
            </thead>

            <tbody>
                <?php $__currentLoopData = $members; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$member): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($key+1); ?></td>
                    <td><?php echo e($member->firstname); ?></td>
                    <td><?php echo e($member->lastname); ?></td>
                    <td><?php echo e($member->mobile); ?></td>
                    <td><a href="<?php echo e(route('User.Show',$member->username)); ?>"
                            class="text-primary"><?php echo e($member->username); ?></a></td>
                    <td><?php echo e($member->email); ?></td>

                    <?php if($member->group=='teacher'): ?>
                    <td>
                        <?php echo e($member->wallet); ?>

                        <br>

                        <?php if(auth()->user()->is_admin()): ?>
                        <div class="btn-group" role="group" aria-label="">
                            <a data-id="<?php echo e($member->id); ?>" class="delete-post btn  btn-danger btn-sm m-0">تسویه</a>
                        </div>
                        <?php endif; ?>
                    </td>

                    <td style="">
                        <?php if($member->ability =='mid-level-admin'): ?>

                        ادمین
                        <br>
                        <div class="btn-group" role="group" aria-label="">
                            <a id="touser" value="<?php echo e($member->id); ?>" class="touser btn  btn-danger btn-sm m-0">تغییر
                                به کاربر</a>
                        </div>

                        <?php else: ?>

                        کاربر
                        <br>
                        <div class="btn-group" role="group" aria-label="">
                            <a id="toadmin" value="<?php echo e($member->id); ?>" class="toadmin btn  btn-danger btn-sm m-0">تغییر به
                                ادمین</a>
                        </div>
                        <?php endif; ?>
                    </td>

                    <td>
                        <?php if($member->approved == 1): ?>
                        رسمی
                        <br>
                        <?php if(auth()->user()->is_admin()): ?>
                        <div class="btn-group" role="group" aria-label="">
                            <a id="fromoff" value="<?php echo e($member->id); ?>" class=" btn  btn-danger btn-sm m-0"><i
                                    class="fas fa-sync"></i>&nbsp;
                                غیر رسمی</a>
                        </div>
                        <?php endif; ?>
                        <?php else: ?>
                        غیر رسمی
                        <br>
                        <?php if(auth()->user()->is_admin()): ?>
                        <div class="btn-group" role="group" aria-label="">
                            <a id="tooff" value="<?php echo e($member->id); ?>" class=" btn  btn-danger btn-sm m-0"><i
                                    class="fas fa-sync"></i>&nbsp;
                                رسمی</a>
                        </div>
                        <?php endif; ?>
                        <?php endif; ?>


                    </td>
                    <?php endif; ?>


                    <td><?php echo e(\Morilog\Jalali\Jalalian::forge($member->created_at)->format('%d %B %Y')); ?></td>


                    <?php if(auth()->user()->is_admin()): ?>
                    <td>

                        <a href="" data-id="<?php echo e($member->id); ?>" class=" delete--user btn btn-sm btn-danger"> <i
                                class="fas fa-trash"></i></a>

                        <a href="<?php echo e(route('Members.SendMessage',$member)); ?>" class="  btn btn-sm btn-primary"> <i
                                class="fas fa-inbox"></i></a>
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
<script>
    $('.delete--user').click(function(e){
                e.preventDefault()
                var value = $(this).data('id');
           swal({
            title: "آیا اطمینان دارید؟",
            text: "توجه داشته باشد با حذف کاربر تمام پست های متعلق به این کاربر نیز حذف خواهند شد!!",
            icon: "warning",
			buttons: {
				confirm : 'بله',
				cancel : 'خیر'
			},
            dangerMode: true
        })
        .then(function(willDelete) {
            if (willDelete) {
                // ajax request
              $.ajax({
                type:'post',
                url:'<?php echo e(route("Panel.Members.Delete")); ?>',
                 data:{_token:'<?php echo e(csrf_token()); ?>',id:value},
        
                      
                 
                 success:function(data){


                       setTimeout(()=>{
                        location.reload()
                       },1000)
               
                }
        })
            }
			else {
                swal("عملیات لغو شد", {
					icon: "error",
					button: "تایید"
				});
    		}
    	});
    

    
    })
    $('.toadmin').click(function(e){
                e.preventDefault()
                var value = $(this).attr('value');
           swal({
            title: "آیا اطمینان دارید؟",
            text: "با انجام این کاربر نقش ادمین می گیرد!",
            icon: "warning",
			buttons: {
				confirm : 'بله',
				cancel : 'خیر'
			},
            dangerMode: false
        })
        .then(function(willDelete) {
            if (willDelete) {
                // ajax request
              $.ajax({
                type:'post',
                url:'<?php echo e(route("Panel.Member.ChangeAbility")); ?>',
                 data:{_token:'<?php echo e(csrf_token()); ?>',id:value,type:1},
                 success:function(data){
                       setTimeout(()=>{
                        location.reload()
                       },1000)
                }
        })
            }
			else {
                swal("عملیات لغو شد", {
					icon: "error",
					button: "تایید"
				});
    		}
    	});
    })


    $('.touser').click(function(e){
                e.preventDefault()
                var value = $(this).attr('value');
                swal({
            title: "آیا اطمینان دارید؟",
            text: "بازگشت به نقش کابر عادی",
            icon: "warning",
			buttons: {
				confirm : 'بله',
				cancel : 'خیر'
			},
            dangerMode: false
        })
        .then(function(willDelete) {
            if (willDelete) {
                // ajax request
                $.ajax({
                type:'post',
                url:'<?php echo e(route("Panel.Member.ChangeAbility")); ?>',
                 data:{_token:'<?php echo e(csrf_token()); ?>',id:value,type:2},
                 success:function(data){
                       setTimeout(()=>{
                        location.reload()
                       },1000)
                }
        })
            }
			else {
                swal("عملیات لغو شد", {
					icon: "error",
					button: "تایید"
				});
    		}
    	});
    })
   
    $('#fromoff').click(function(e){
                e.preventDefault()
                var value = $(this).attr('value');

                // ajax request
                swal({
            title: "آیا اطمینان دارید؟",
            text: "وضعیت کانال کابر به غیررسمی تغییر خواهد کرد!",
            icon: "warning",
			buttons: {
				confirm : 'بله',
				cancel : 'خیر'
			},
            dangerMode: false
        })
        .then(function(willDelete) {
            if (willDelete) {
                // ajax request
                $.ajax({
                type:'post',
                url:'<?php echo e(route("Panel.Channel.Official")); ?>',
                 data:{_token:'<?php echo e(csrf_token()); ?>',id:value,type:2},
                 success:function(data){
                       setTimeout(()=>{
                        location.reload()
                       },1000)
               
                }
        })
            }
			else {
                swal("عملیات لغو شد", {
					icon: "error",
					button: "تایید"
				});
    		}
    	});

    })

    
    $('#tooff').click(function(e){
                e.preventDefault()
                var value = $(this).attr('value');
                     // ajax request
                     swal({
            title: "آیا اطمینان دارید؟",
            text: "وضعیت کانال کابر به رسمی تغییر خواهد کرد!",
            icon: "warning",
			buttons: {
				confirm : 'بله',
				cancel : 'خیر'
			},
            dangerMode: false
        })
        .then(function(willDelete) {
            if (willDelete) {
               
              
                // ajax request
            $.ajax({
                type:'post',
                url:'<?php echo e(route("Panel.Channel.Official")); ?>',
                 data:{_token:'<?php echo e(csrf_token()); ?>',id:value,type:1},
                 success:function(data){

                       setTimeout(()=>{
                        location.reload()
                       },1000)
               
                }
        })
            }
			else {
                swal("عملیات لغو شد", {
					icon: "error",
					button: "تایید"
				});
    		}
    	});

    })
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.Panel.temp', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\media\resources\views/Panel/Members.blade.php ENDPATH**/ ?>