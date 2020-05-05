@extends('layout.Login.template')
@section('content')
<div class="row">
    <div class="col-md-12 mt-1">
        <a href="{{route('BaseUrl')}}" class="btn btn-info pt-2">بازگشت به صفحه اصلی</a>
    </div>
</div>
    <div class="main" style=" display: flex; justify-content: center; align-items: center;">
       
        <div class="login-wrap " style="transform: translate(0,15%);">
          
            <div class="col-md-12">
                {{-- @include('FrontEnd.Login.partials.errors') --}}
                <div class="col-md-12 text-center mt-2">
                    @include('Includes.errors')
                  </div>
     
                <div class="login-form" >
                <form action="{{route('forgot.resetpassword')}}" method="POST">
                    @csrf
                        <label for="inlineFormInputName2" class="text-black-50">رمز عبور جدید خود را وارد کنید</label>
                        <input type="hidden" name="token" value="{{$token}}">
                        <input type="password" class="form-control my-3 " name="password" id="inlineFormInputName2" placeholder="رمز عبور جدید">
                        <input type="password" class="form-control my-3 " name="passwordr" id="inlineFormInputName2" placeholder="تکرار رمز عبور جدید">
                      
     
                        <button type="submit" class="btn btn-sm btn-success col-md-3 mb-2">بازیابی رمز</button>
                    </form>
                    <hr/>

                </div>
            </div>
        </div>
    </div>
@endsection
