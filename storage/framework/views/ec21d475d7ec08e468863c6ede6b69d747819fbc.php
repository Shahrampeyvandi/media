

<?php $__env->startSection('content'); ?>
<div class="col-sm-12 col-sm-offset-3 col-md-12  ">
    <div class="wpb_wrapper py-3">
        <h2 class="  mt-15 mb-15 title__divider title__divider--line" style="margin-right: 0px;"><span
                class="title__divider__wrapper">تنظیمات<span class="line brk-base-bg-gradient-right"></span>
         
        </h2>
    </div>
    <div class="row mb-3">
        <div class="col-md-12">
        <form id="setting" action="<?php echo e(route('Panel.commission')); ?>" method="post">
                <?php echo csrf_field(); ?>
               <div class="row">
                <div class="form-group col-md-3">
                    <label for="" class="">میزان پورسانت فروش: (برحسب درصد)</label>
                    <input type="number" name="commission" class="form-control mt-1" id="" value="<?php echo e($setting->commission); ?>">
            
                  
                </div>
               </div>
               



                <div class="row">
                    <div class="form-group col-md-12">
                        <h4 for="" class="mb-2">نمایش در صفحه اصلی : </h4>
                       
                        <div class="checkstores custom-control custom-checkbox custom-control-inline ml-3"
                                    style="margin-left: -1rem;">
                                    <input  type="checkbox" id="1" name="mainpage[mainpage_films]"
                                        class="custom-control-input" value="1"  <?php if($setting->mainpage_films==1): ?>
                                        checked
                                        <?php endif; ?>>
                                    <label class="custom-control-label" for="1">لیست فیلم ها</label>
                        </div>
                        <div class="checkstores custom-control custom-checkbox custom-control-inline ml-3"
                                    style="margin-left: -1rem;">
                                    <input  type="checkbox" id="2" name="mainpage[mainpage_animations]"
                                        class="custom-control-input" value="1"  <?php if($setting->mainpage_animations==1): ?>
                                        checked
                                        <?php endif; ?>>
                                    <label class="custom-control-label" for="2">لیست انیمیشن ها</label>
                        </div>
                        <div class="checkstores custom-control custom-checkbox custom-control-inline ml-3"
                                    style="margin-left: -1rem;">
                                    <input  type="checkbox" id="3" name="mainpage[mainpage_plus]"
                                        class="custom-control-input" value="1" <?php if($setting->mainpage_plus==1): ?>
                                        checked
                                        <?php endif; ?>>
                                    <label class="custom-control-label" for="3">لیست ژن پلاس ها</label>
                        </div>
                        <div class="checkstores custom-control custom-checkbox custom-control-inline ml-3"
                                    style="margin-left: -1rem;">
                                    <input  type="checkbox" id="4" name="mainpage[mainpage_musics]"
                                        class="custom-control-input" value="1"  <?php if($setting->mainpage_musics==1): ?>
                                        checked
                                        <?php endif; ?>>
                                    <label class="custom-control-label" for="4">لیست موسیقی ها</label>
                        </div>
                        <div class="checkstores custom-control custom-checkbox custom-control-inline ml-3"
                                    style="margin-left: -1rem;">
                                    <input  type="checkbox" id="5" name="mainpage[mainpage_podcasts]"
                                        class="custom-control-input" value="1"  <?php if($setting->mainpage_podcasts==1): ?>
                                        checked
                                        <?php endif; ?>>
                                    <label class="custom-control-label" for="5">لیست پادکست ها</label>
                        </div>
                        <div class="checkstores custom-control custom-checkbox custom-control-inline ml-3"
                                    style="margin-left: -1rem;">
                                    <input  type="checkbox" id="6" name="mainpage[mainpage_taturials]"
                                        class="custom-control-input" value="1"  <?php if($setting->mainpage_taturials==1): ?>
                                        checked
                                        <?php endif; ?>>
                                    <label class="custom-control-label" for="6">لیست دوره های آموزشی </label>
                        </div>
                      
                    </div>
                </div>

                
                <div class="row mb-3">
                    <div class="form-group col-md-12">
                        <button class="mx-0 btn btn-sm btn-primary">تایید</button>
                </div>
                </div>

            </form>

            <hr>
            <form action="" method="post">
                <?php echo csrf_field(); ?>
                <div class="row">
                    <div class="form-group col-md-6">
                        <select name="" id="link_type" class="form-control custom-select">
                            <option value="1">لینک خارجی</option>
                            <option value="2">آپلود تبلیغ</option>

                        </select>
                    </div>
                    <div class="form-group col-md-6 text">
                        <input name="link"  type="text" class="form-control" placeholder="http://example.com">
                    </div>
                    <div class="form-group col-md-6 file" style="display: none;">
                        <input name="link"  type="file" class="form-control">
                    </div>


                </div>
            </form>
        </div>

    </div>

</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
<script>
    $(document).ready(function(){
        $('#link_type').change(function(){
            if($(this).val() == "1"){
                $('.text').show()
                $('.file').hide()
            }
            if($(this).val() == "2"){
                $('.file').show()
                $('.text').hide()
            }

        })
    })
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.Panel.temp', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\media\resources\views/Panel/Setting.blade.php ENDPATH**/ ?>