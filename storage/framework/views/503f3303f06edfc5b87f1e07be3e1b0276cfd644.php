<header class="container d-none d-md-block">
    <div class="row">
        <div class="col-md-12">
            <ul class="stepper stepper-horizontal">

    

                <li class="active">
                    <?php if(request()->path() == "signup"): ?>
                    <a href="#!" class="p-2 text-primary">
                        <span style="border: 3px solid #7979d0;
                        background: #9696f9 !important;" class="circle_ " >۱</span>
                        <span class="fs-0-8">ورود ایمیل</span>
                    </a>
                    <?php elseif(session()->has('success_step1')): ?> 
                    <a href="#!" class="p-2 text-black-50">
                        <span style="" class="circle_ bg-gradient">
                            <i class="fa fa-check"></i>
                        </span>
                        <span class="fs-0-8 text-success">ورود ایمیل</span>
                    </a>
                    <?php else: ?>
                    <a href="#!" class="p-2 text-black-50">
                        <span style="" class="circle_ ">۱</span>
                        <span class="">ورود ایمیل</span>
                    </a>
                    <?php endif; ?>
                  
                </li>
                
                <li class="active">
                    <?php if(request()->route()->getName() == "SignUp.Verify"): ?>
                        <a href="#!" class="p-2 text-primary">
                            <span style="border: 3px solid #7979d0;
                            background: #9696f9 !important;" class="circle_">۲</span>
                            <span class="fs-0-8">تایید ایمیل</span>
                        </a>
                  
                    <?php elseif(session()->has('success_step2')): ?>
                  
                        <a href="#!" class="p-2 text-primary">
                            <span  class="circle_ bg-gradient"> <i class="fa fa-check"></i></span>
                            <span class="fs-0-8 text-success">تایید ایمیل</span>
                        </a>
                   
                    <?php else: ?>
                    <a href="#!" class="p-2 text-black-50">
                        <span style="" class="circle_ ">۲</span>
                        <span class="">تایید ایمیل</span>
                    </a>
                    <?php endif; ?>                
                </li>

            
                <li class="active">
                    <?php if(request()->route()->getName() == "SignUp.Final"): ?>
                    <a href="#!" class="p-2 text-primary">
                        <span style="border: 3px solid #7979d0;
                        background: #9696f9 !important;" class="circle_">۳</span>
                        <span class="fs-0-8">تکمیل اطلاعات</span>
                    </a>
              
                     <?php elseif(session()->has('success_step3')): ?>
              
                    <a href="#!" class="p-2 text-primary">
                        <span  class="circle_ bg-gradient"> <i class="fa fa-check"></i></span>
                        <span class="fs-0-8 text-success">تکمیل اطلاعات</span>
                    </a>
               
                <?php else: ?>
                <a href="#!" class="p-2 text-black-50">
                    <span style="" class="circle_">۳</span>
                    <span class="">تکمیل اطلاعات</span>
                </a>
                <?php endif; ?>     
                   
                </li>



            </ul>
        </div>
    </div>
</header><?php /**PATH C:\xampp\htdocs\media\resources\views/Includes/Login/Header.blade.php ENDPATH**/ ?>