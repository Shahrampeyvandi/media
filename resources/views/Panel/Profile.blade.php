@extends('layout.Panel.temp')

@section('content')

<div class="col-md-8 offset-md-2 mb-3">
<form id="edit" action="{{route('Profile.Submit')}}" method="post" enctype="multipart/form-data">
@csrf
<input type="hidden" name="id" value="{{$member->id}}">
    <div class="card p-3">
        <div class="row">
          <div class="col-md-12 text-center mb-2">
            @include('Includes.errors')
          </div>
            <div class="col-md-12" style="display: flex;align-items: center;justify-content: center;">
              <div class="profile-img">
                <div class="chose-img">
                  <input type="file" class="btn-chose-img" id="user_profile" name="user_profile" title="نوع فایل میتواند png , jpg  باشد">
                </div>
                <img id="profilepic"
                  style="border-radius: 50%;object-fit: contain; background: #fff; max-width: 100%; height: 100%; width: 100%;"
                  src="
                  
                  @if($member->avatar)

                  {{route('BaseUrl')}}/{{$member->avatar}}

                  @else
                  {{asset('assets/images/temp_logo.jpg')}}
                  @endif
                  
                  
                  " alt="">
                <p class="text-chose-img" style="position: absolute;top: 44%;left: 14%;font-size: 13px;">انتخاب
                  پروفایل</p>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="form-group col-md-6">
              <label for="user_name" class="col-form-label"><span class="text-danger">*</span> نام: </label>
              <input type="text" class="form-control" name="user_name" id="user_name" value="{{$member->firstname}}">
            </div>
            <div class="form-group col-md-6">
              <label for="user_family" class="col-form-label"><span class="text-danger">*</span> نام خانوادگی:</label>
              <input type="text" class="form-control" name="user_family" id="user_family" value="{{$member->lastname}}">
            </div>
          </div>
          <div class="row">
            <div class="form-group col-md-6">
              <label for="user_pass" class="col-form-label"><span class="text-danger">*</span> تغییر رمز عبور: </label>
            <input type="text" class="form-control" name="user_pass" id="user_pass" value="">
            </div>
            <div class="form-group col-md-6">
              <label for="confirm_user_pass" class="col-form-label"><span class="text-danger">*</span> تکرار
                رمز عبور:</label>
              <input type="text" class="form-control" name="confirm_user_pass" id="confirm_user_pass">
            </div>
          </div>
          <div class="row">
            <div class="form-group col-md-6">
              <label for="user_email" class="col-form-label" >ایمیل:</label>
              <input type="text" disabled class="form-control" name="user_email" id="user_email" value="{{$member->email}}">
            </div>
            <div class="form-group col-md-6">
              <label for="username" class="col-form-label"><span class="text-danger">*</span> نام کاربری:</label>
              <input type="text" class="form-control" name="username" id="username" value="{{$member->username}}">
            </div>
          </div>
          <div class="row">
            <div class="form-group col-md-6">
              <label for="user_mobile" class="col-form-label"><span class="text-danger">*</span> موبایل:</label>
              <input type="text" class="form-control" name="user_mobile"  id="user_mobile" disabled value="{{$member->mobile}}">
            </div>
            <div class="form-group col-md-6">
                <label for="username" class="col-form-label">سن:  </label>
                <input type="text" class="form-control" name="age" id="age" value="{{$member->age}}">
              </div>
          </div>
         
         
            <div class="row">
              <div class="form-group col-md-6">
                <label for="user_mobile" class="col-form-label">مدرک تحصیلی: </label>
                <input type="text" placeholder="" class="form-control" name="certificate" id="user_certificate">
              </div>
              <div class="form-group col-md-6">
                <label for="user_mobile" class="col-form-label">مقطع تحصیلی: </label>
                <input type="text" placeholder="" class="form-control" name="level" id="user_level">
              </div>
              <div class="form-group col-md-6">
                <label for="user_mobile" class="col-form-label">سابقه تدریس: </label>
                <input type="text" placeholder="" class="form-control" name="history" id="history">
              </div>
              <div class="form-group col-md-6">
                <label for="user_mobile" class="col-form-label">حق سنوات: </label>
                <input type="text" placeholder="" class="form-control" name="years" id="years">
              </div>
            </div>
          
          
         
          <div class="row">
            <div class="form-group col-md-6">
                <input type="submit" class="btn btn-sm btn-primary" value="تایید">
              </div>
          </div>
    </div>
    </form>
</div>
@endsection
@section('js')
<script type="text/javascript">
  $(document).ready(function(){
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function (e) {
                $('#profilepic').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    $("#user_profile").change(function(){
        readURL(this);
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
      user_name: "required",
      user_family: "required",
			username: {
				required: true,
        minlength: 5,
        regex: /^[a-zA-Z]+[a-zA-Z\d]*$/
			},
     
			user_pass: {
				
        minlength: 6,
        regex: /^[a-zA-Z\d]+$/
			},
			confirm_user_pass: {
			
				equalTo: "#user_pass"
			},
		user_mobile: {
				
      required: true
      },
      user_email:"required"
		},
		messages: {
			user_name: "لطفا نام خود را وارد نمایید",
      user_family: "لطفا نام خانوادگی خود را وارد نمایید",
      user_email:"ایمیل الزامی است",
			username: {
				required: "لطفا نام کاربری یکتای خود را وارد نمایید",
        minlength: "نام کابری حداقل 5 کاراکتر دارد",
        regex:"نام کاربری تنها شامل حروف لاتین میباشد و نمی تواند با عدد شروع شود"
			},
			user_pass: {
				regex: "نام کاربری تنها شامل حروف لاتین میباشد و نمی تواند با عدد شروع شود",
				minlength: "رمز عبور بایستی حداقل 6 کاراکتر باشد"
			},
			confirm_user_pass: {
				required: "رمز عبور را وارد نمایید",
				equalTo: "رمز عبور وارد شده مطابقت ندارد"
			},
      user_mobile:{
        required:"شماره موبایل الزامی میباشد"
      },
     
		}
	});
  })
</script>

@endsection
