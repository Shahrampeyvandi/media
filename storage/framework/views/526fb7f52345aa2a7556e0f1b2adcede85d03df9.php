
<?php $__env->startSection('content'); ?>


<div class="main" style=" display: flex; justify-content: center; align-items: center;height: 100vh;">
    <div class="login-wrap card mt-5 mt-md-0">
       
            <div class="col-md-12 text-center">
              <?php echo $__env->make('Includes.errors', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
        
        <div class="col-md-12">
            
            <div class="login-form p-md-3">
                <form action="<?php echo e(route('forgot.sendtoken')); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <div class="form-group">
                        <label for="inlineFormInputName2" class="text-center text-black-50">فراموشی رمز عبور</label>
                        <input type="text" name="email" id="email" class="form-control my-3 "
                            id="inlineFormInputName2" placeholder="ایمیل خود را وارد کنید">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-sm btn-info  mb-2 mr-0">ارسال ایمیل بازیابی</button>
                    </div>
                </form>
               
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('js'); ?>
<script>
    $(document).ready(function(){
  
    $.validator.addMethod(
    "regex",
    function(value, element, regexp) {
        return this.optional(element) || regexp.test(value);
    },
    "Please check your input."
);
    $("#rstep1").validate({
		rules: {
     
	mobile: {
		required: true,
        // regex: /^[0][1-9]\d{9}$|^[1-9]\d{9}$/
			},
		},
		messages: {
			
		mobile: {
            required: "لطفا شماره موبایل خود را وارد نمایید",
            
            // regex:"شماره موبایل وارد شده صحیح نمی باشد"
			},
        }
	});
  })
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.Login.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\media\resources\views/Login/forgot.blade.php ENDPATH**/ ?>