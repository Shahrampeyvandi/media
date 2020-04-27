
<?php $__env->startSection('content'); ?>

<?php echo $__env->make('Includes.Login.Header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <div class="main" style=" display: flex; justify-content: center; align-items: center;">  
        <div class="login-wrap">
            <div class="login-html">
                
                <div class="login-form">
                <form class="<?php echo e(route('SignUp')); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <label for="inlineFormInputName2" class="text-center">ایجاد حساب کاربری</label>
                        <input type="text" name="mobile" class="form-control my-3 " id="inlineFormInputName2" placeholder="شماره همراه یا ایمیل را وارد کنید">
                        <button type="submit" class="btn btn-info col-md-4 mb-2">ادامه</button>
                        <hr/>
                    </form>
                    <form action="#" class="form-inline">
                        <button type="submit" class="btn btn-danger ">ثبت نام با حساب گوگل</button>
                        <hr/>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layout.Login.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Laravel\media\resources\views/Register/register_step_one.blade.php ENDPATH**/ ?>