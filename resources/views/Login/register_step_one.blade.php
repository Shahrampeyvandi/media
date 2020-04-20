@extends('layout.Login.template')
@section('content')
{{-- <div class="row">
    <div class="col-md-12">
        <a href="#" class="d-block mt-3 text-primary">بازگشت به صفحه اصلی</a>
    </div>
</div> --}}
@include('Includes.Login.Header')

<div class="main" style=" display: flex; justify-content: center; align-items: center;">
    <div class="login-wrap mt-5 mt-md-0">
       
            <div class="col-md-12 text-center">
              @include('Includes.errors')
            </div>
        
        <div class="col-md-12">
            {{-- @include('FrontEnd.Login.partials.errors') --}}
            <div class="login-form p-md-3">
                <form id="rstep1" class="{{route('SignUp')}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="inlineFormInputName2" class="text-center text-black-50">ایجاد حساب کاربری</label>
                        <input type="text" name="mobile" id="mobile" class="form-control my-3 "
                            id="inlineFormInputName2" placeholder="ایمیل خود را وارد کنید">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-info  mb-2">ادامه</button>
                    </div>
                    <hr />
                </form>
                <form action="#" class="form-inline">
                    <button type="submit" class="btn btn-danger ">ثبت نام با حساب گوگل</button>
                    <hr />
                </form>
            </div>
        </div>
    </div>
</div>
@endsection


@section('js')
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
@endsection