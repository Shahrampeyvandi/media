

<?php $__env->startSection('content'); ?>
<?php if($member->channelInformations && $member->channelInformations->accepted>0): ?>

<?php else: ?>
<link rel="stylesheet" href="<?php echo e(route('BaseUrl')); ?>/assets/css/login.css">

<header class="container d-none d-md-block" >
    <div class="row" style="justify-content: center;">
        <div class="col-md-6">
            <ul class="stepper stepper-horizontal">

    

                <li class="active">
                    <a href="#!" class="p-2 text-primary">
                        <span style="border: 3px solid #7979d0;
                        background: #9696f9 !important;" class="circle_ " >۱</span>
                        <span class="fs-0-8">تایید شماره تلفن</span>
                    </a>
                  
                  
                </li>
                
                <li class="active">
               
                    <a href="#!" class="p-2 text-black-50">
                        <span style="" class="circle_ ">۲</span>
                        <span class="">بارگذاری مدارک</span>
                    </a>
                </li>

            </ul>
        </div>
    </div>
</header>
<?php endif; ?>
<div class="col-md-6 offset-md-3 mb-3">
    <form id="edit" action="<?php echo e(route('Request.VerifyMobile')); ?>" method="post" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>
        <input type="hidden" name="id" value="<?php echo e($member->id); ?>">
        <div class="card p-3">
            <div class="row">

                <div class="col-md-12 text-center mb-2">
                    <?php echo $__env->make('Includes.errors', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
            </div>
            <?php if($member->channelInformations && $member->channelInformations->accepted==1): ?>

            <div class="col-md-12 text-center mb-3">
                    <h3>
                    درخواست شما در دست بررسی می باشد

                    </h3>
                </div>
            <?php elseif($member->channelInformations && $member->channelInformations->accepted==2): ?>

            <div class="col-md-12 text-center mb-3">
                    <h3>
                    در خواست شما تایید شد

                    </h3>
                </div>

            <?php elseif($member->channelInformations && $member->channelInformations->accepted==3): ?>

            <div class="col-md-12 text-center mb-3">
                    <h3>
                    در خواست شما رد شد

                    </h3>
                </div>

            <?php else: ?>
            <div class="row justify-content-center">
                <div class="form-group  col-md-6">
                   
                <label for=""><span class="text-danger">*</span> کد ارسال شده به شماره موبایل <?php echo e($member->mobile); ?> را وارد نمایید: </label>

                <input type="number" class="form-control" name="code" id="mobile" value="" 
                placeholder="کد تایید" >

                </div>
           
               
            </div>
            
            <div class="row justify-content-center">
                <div class="form-group col-md-12 text-center">
                    <a id="sendsms" type="submit" class="btn btn-sm btn-primary " >در خواست ارسال کد تایید</a>
                    <input type="submit" class="btn btn-sm btn-primary " value="تایید">

                </div>
            </div>

         
        </div>
    </form>
    <?php endif; ?>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
<script type="text/javascript">
    $(document).ready(function(){
  
        $('#role').on('change',function(){
    if ($(this).val() == "official"){
        $('.permission_work_section').fadeIn();
      }else{
        $('.permission_work_section').fadeOut();

      }
   });
  
   $.validator.addMethod(
    "regex",
    function(value, element, regexp) {
        return this.optional(element) || regexp.test(value);
    },
    "Please check your input."
);
  
    $("#edit").validate({
		rules: {
         
          mobile:{
              required:true,
          }
		},
		messages: {
		
		mobile:{
              required:"َلطفا کد تایید را وارد نمایید",
              
          }
		}
    });
    
    $('#sendsms').click(function(e){
                e.preventDefault()
                var thiss = $(this)
                $(this).html(`
                    <span class="spinner-border spinner-border-sm m-l-5 fs-0-8" role="status" aria-hidden="true"></span>
                    ارسال
                `)
                // ajax request
             $.ajax({

                type:'post',
                url:'<?php echo e(route("Request.SendSMS")); ?>',
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                 data:{mobile:<?php echo e(auth()->user()->mobile); ?>},

            
                 
                 success:function(data){
                    
                    $("#sendsms").html(data);

               
                }
        })
    })

   
  })
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.Panel.temp', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\media\resources\views/Panel/RequestChannel.blade.php ENDPATH**/ ?>