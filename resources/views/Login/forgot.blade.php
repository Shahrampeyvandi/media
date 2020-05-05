@extends('layout.Login.template')
@section('content')
{{-- <div class="row">
    <div class="col-md-12">
        <a href="#" class="d-block mt-3 text-primary">بازگشت به صفحه اصلی</a>
    </div>
</div> --}}

<div class="main" style=" display: flex; justify-content: center; align-items: center;height: 100vh;">
    <div class="login-wrap card mt-5 mt-md-0">
       
            <div class="col-md-12 text-center">
              @include('Includes.errors')
            </div>
        
        <div class="col-md-12">
            {{-- @include('FrontEnd.Login.partials.errors') --}}
            <div class="login-form p-md-3">
                <form action="{{route('forgot.sendtoken')}}" method="POST">
                    @csrf
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