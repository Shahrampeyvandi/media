
<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-md-12 mt-1">
        <a href="<?php echo e(route('BaseUrl')); ?>" class="btn btn-info pt-2">بازگشت به صفحه اصلی</a>
    </div>
</div>
    <div class="main" style=" display: flex; justify-content: center; align-items: center;">
       
        <div class="login-wrap" style="transform: translate(0,15%);">
          
            <div class="col-md-12">
                
                <div class="col-md-12 text-center mt-2">
                    <?php echo $__env->make('Includes.errors', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                  </div>
     
                <div class="login-form" >
                <form class="<?php echo e(route('Login')); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                        <label for="inlineFormInputName2" class="text-black-50">چنانچه حساب کاربری دارید وارد شوید</label>
                        <input type="text" class="form-control my-3 " name="field" id="inlineFormInputName2" placeholder="شماره همراه یا ایمیل">
                        <input type="password" class="form-control my-3 " name="pass" id="inlineFormInputName2" placeholder="رمز عبور">
                        <div class="row">
                            <div class="form-group mb-0 ">
                             <div class="custom-control custom-radio custom-control-inline">
                               <input type="radio" id="student" value="student" name="user_role" class="custom-control-input"
                                 value="">
                               <label class="custom-control-label text-primary fs-0-8" for="student">دانش آموز هستم</label>
                             </div>
                            </div>
                            <div class="form-group mb-0 mr-5">
                             <div class="custom-control custom-radio custom-control-inline">
                               <input type="radio" id="teacher" value="teacher"  name="user_role" class="custom-control-input"
                                 value="">
                               <label class="custom-control-label text-primary fs-0-8" for="teacher">استاد هستم</label>
                             </div>
                            </div>
                           </div>
                        <button type="submit" class="btn btn-sm btn-danger col-md-3 mb-2">ورود</button>
                        <hr/>
                    </form>
                    <form action="<?php echo e(route('SignUp')); ?>" method="get" class="form-inline">
                        <label>اگر حساب کاربری ندارید ثبت نام کنید</label>
                        <button type="submit" class="btn btn-sm btn-primary mx-2">ثبت نام</button>
                        <hr/>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.Login.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\media\resources\views/Login/login.blade.php ENDPATH**/ ?>