
<?php $__env->startSection('content'); ?>
<?php echo $__env->make('Includes.Login.Header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="main mt-5 mt-md-0" style=" display: flex; justify-content: center; align-items: center;">  
        <div class="login-wrap">
            <div class="col-md-12">
                
                <div class="login-form p-md-3">
                <form action="<?php echo e(route('SignUp.verifySubmit')); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                       <div class="form-group">
                        <label for="inlineFormInputName2" class="text-center text-black-50">کد فرستاده شده برای (<?php echo e(substr_replace($id,"***",2,5)); ?>) را وارد نمایید</label>
                        <input type="text" name="code" class="form-control my-3 " id="inlineFormInputName2" placeholder="">
                       </div>
                       <div class="form-group">
                        <button type="submit" class="btn btn-sm btn-info  mb-2">تایید</button>
                       </div>
                        <hr/>
                    </form>
 
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layout.Login.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\media\resources\views/Login/register_step_two.blade.php ENDPATH**/ ?>