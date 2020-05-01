@extends('layout.Login.template')
@section('content')
@include('Includes.Login.Header')

    <div class="main mt-5 mt-md-0" style="display: flex; justify-content: center; align-items: center;">
        <div class="col-md-12 card" style="max-width:650px !important;margin-bottom: 2rem; ">
            <div class="head-login">
              <h4 class="mb-2"><a class="text-black-50 fs-0-8" href="#">اطلاعات فردی</a></h4>
            </div>
            <div class="row">
              <div class="col-md-12 text-center">
                @include('Includes.errors')
              </div>
            </div>

                <div class="">
                <form id="signupForm" action="{{route('SignUp.Final')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @if($user)
                        <input type="hidden" class="form-control" name="googleid" id="googleid" autocomplete="off"
                                  value="{{$user->id}}" >

                        <input type="hidden" class="form-control" name="email" id="email" autocomplete="off"
                                  value="{{$user->email}}">
                        @endif

                            <div class="row">
                                <div class="col-md-12" style="display: flex;align-items: center;justify-content: center;">
                                  <div class="profile-img">
                                    <div class="chose-img">
                                      <input type="file" class="btn-chose-img" id="user_profile" name="user_profile" title="نوع فایل میتواند png , jpg  باشد">
                                    </div>
                                    <img
                                      style="border-radius: 50%;object-fit: contain; background: #fff; max-width: 100%; height: 100%; width: 100%;"
                                      src="{{asset('assets/images/temp_logo.jpg')}}" alt="">
                                    <p class="text-chose-img" style="position: absolute;top: 44%;left: 14%;font-size: 13px;">انتخاب
                                      پروفایل</p>
                                  </div>
                                </div>
                              </div>
                              <div class="row">
                                <div class="form-group col-md-6">
                                  <label for="user_name" class="col-form-label"><span class="text-danger">*</span> نام: </label>
                                  <input type="text" class="form-control" name="user_name" id="user_name" autocomplete="off"
                                  @if($user)
                                  value="{{$user->name}}"

                                  @endif
                                  
                                  >
                                </div>
                                <div class="form-group col-md-6">
                                  <label for="user_family" class="col-form-label"><span class="text-danger">*</span> نام خانوادگی:</label>
                                  <input type="text" class="form-control" name="user_family" id="user_family"
                                  @if($user)
                                  value="{{$user->name}}"

                                  @endif
                                  >
                                </div>
                              </div>
                              <div class="row">
                                <div class="form-group col-md-6">
                                  
                                  <label for="user_pass" class="col-form-label"><span class="text-danger"  autocomplete="off">*</span> رمز عبور: </label>
                                  
                                 
                                  <input type="password" class="form-control" name="user_pass" id="user_pass">
                                  <span toggle="#user_pass" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                                </div>
                                <div class="form-group col-md-6">
                                  <label for="user_cpass" class="col-form-label"><span class="text-danger">*</span> تکرار
                                    رمز عبور:</label>
                                  <input type="password" class="form-control" name="user_cpass" id="user_cpass">
                                  <span toggle="#user_cpass" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                                </div>
                              </div>
                              <div class="row">
                                <div class="form-group col-md-6">
                                  <label for="user_mobile" class="col-form-label"><span class="text-danger">*</span> شماره موبایل:</label>
                                  <input type="text" class="form-control" name="user_mobile" id="user_mobile">
                                </div>
                                <div class="form-group col-md-6">
                                  <label for="userid" class="col-form-label"><span class="text-danger">*</span> نام کاربری:</label>
                                  <input type="text" class="form-control" name="userid" id="userid">
                                </div>
                              </div>
                              <div class="row">
                                
                                <div class="form-group col-md-6">
                                    <label for="user_age" class="col-form-label">سن:  </label>
                                    <input type="text" class="form-control" name="user_age" id="user_age">
                                  </div>
                              </div>
                      
                          <label for=""></label>
                          <div class="row">
                           <div class="form-group col-md-6">
                            <div class="custom-control custom-radio custom-control-inline">
                              <input type="radio" id="student" value="student" name="user_role" class="custom-control-input"
                                value="">
                              <label class="custom-control-label text-primary" for="student">دانشجو هستم</label>
                            </div>
                           </div>
                           <div class="form-group col-md-6">
                            <div class="custom-control custom-radio custom-control-inline">
                              <input type="radio" id="teacher" value="teacher"  name="user_role" class="custom-control-input"
                                value="">
                              <label class="custom-control-label text-primary" for="teacher">استاد هستم</label>
                            </div>
                           </div>
                          </div>
                 
                          <div class="row teacher-spec">
                            <div class="form-group col-md-6">
                              <input type="text" placeholder="مدرک تحصیلی" class="form-control" name="user_certificate" id="user_certificate">
                            </div>
                            <div class="form-group col-md-6">
                              <input type="text" placeholder="مقطع تحصیلی" class="form-control" name="user_level" id="user_level">
                            </div>
                            <div class="form-group col-md-6">
                              <input type="text" placeholder="دوره های تدریس شده" class="form-control" name="user_history" id="user_history">
                            </div>
                            <div class="form-group col-md-6">
                              <input type="text" placeholder="سنوات تدریس" class="form-control" name="user_sanavat" id="user_sanavat">
                            </div>
                          
                          
                          </div>
                          <div class="row">
                            <div class="form-group col-md-3">
                                <button type="submit" class="btn btn-sm btn-block btn-success ">ثبت نام</button>

                            </div>
                        </div>
                    </form>
                </div>
            
        </div>
    </div>

@endsection
@section('js')
    <script>
 
   $(document).ready(function(){
    $('.teacher-spec').hide();

   $('#teacher').on('change',function(){
    if ($(this).is(':checked')){
        $('.teacher-spec').fadeIn();
      }
   });
   $('#student').on('change',function(){
    if ($(this).is(':checked')){
        $('.teacher-spec').fadeOut();
      }
   });
   
    $.validator.addMethod(
    "regex",
    function(value, element, regexp) {
        return this.optional(element) || regexp.test(value);
    },
    "Please check your input."
);
    $("#signupForm").validate({
		rules: {
      user_name: "required",
      user_family: "required",
			userid: {
				required: true,
        minlength: 5,
        regex: /^[a-zA-Z]+[a-zA-Z\d]*$/
			},
      user_role:"required",
			user_pass: {
				required: true,
				minlength: 6
			},
			user_cpass: {
				required: true,
				equalTo: "#user_pass"
			},
		user_mobile: {
				
      required: true,
      regex:/^09[0-9]{9}$/
			},
      user_history:{
        required: function(element){
            return $("#teacher").val().length > 0;
        }
      },
      user_sanavat:{
        required: function(element){
            return $("#teacher").val().length > 0;
        }
      },
      user_certificate:{
        required: function(element){
            return $("#teacher").val().length > 0;
        }
      },
      user_level:{
        required: function(element){
            return $("#teacher").val().length > 0;
        }
      }
	
		},
		messages: {
			user_name: "لطفا نام خود را وارد نمایید",
			user_family: "لطفا نام خانوادگی خود را وارد نمایید",
			userid: {
				required: "لطفا نام کاربری یکتای خود را وارد نمایید",
        minlength: "نام کابری حداقل 5 کاراکتر دارد",
        regex:"نام کاربری تنها شامل حروف لاتین میباشد و نمی تواند با عدد شروع شود"
			},
			user_pass: {
				required: "رمز عبور دا وارد نمایید",
				minlength: "رمز عبور بایستی حداقل 6 کاراکتر باشد"
			},
			user_cpass: {
				required: "رمز عبور را وارد نمایید",
				equalTo: "رمز عبور وارد شده مطابقت ندارد"
			},
      user_mobile:{
        required:"شماره موبایل الزامی میباشد",
        regex:"موبایل دارای فرمت نامعتبر می باشد"
      },
      user_responsibility:"انتخاب نقش الزامی است",
      user_role:"نقش خود را انتخاب کنید",
      user_history:{required:"دوره هایی که تدریس کرده اید را وارد کنید"}
    ,user_sanavat:{required:"سنوات تدریس خود را وارد کنید"}
    ,user_certificate:{required:" مدرک تحصیلی را وارد نمایید"}
    ,user_level:{required:"مقطع تحصیلی را وارد نمایید"}


		}
	});
  })
    </script>
@endsection
