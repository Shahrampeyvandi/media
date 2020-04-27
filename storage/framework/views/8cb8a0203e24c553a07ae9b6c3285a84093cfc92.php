
<?php $__env->startSection('content'); ?>

    <div class="main" style=" display: flex; justify-content: center; align-items: center;">  
        <div class="login-wrap">
            <div class="login-html">
                
                <div class="login-form">
                    <form class="/submitVerify" method="POST">
                        <?php echo csrf_field(); ?>
                        <label for="inlineFormInputName2" class="text-center">کد فرستاده شده برای (<?php echo e($id); ?>) را وارد نمایید</label>
                        <input type="text" name="code" class="form-control my-3 " id="inlineFormInputName2" placeholder="شماره همراه یا ایمیل را وارد کنید">
                        <button type="submit" class="btn btn-info col-md-4 mb-2">ورود</button>
                        <hr/>
                    </form>
 
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layout.Login.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Laravel\media\resources\views/Login/register_step_two.blade.php ENDPATH**/ ?>