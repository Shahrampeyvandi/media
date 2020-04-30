@extends('layout.Login.template')
@section('content')
<div class="row">
    <div class="col-md-12 mt-1">
        <a href="{{route('BaseUrl')}}" class="btn btn-info pt-2">بازگشت به صفحه اصلی</a>
    </div>
</div>
    <div class="main" style=" display: flex; justify-content: center; align-items: center;">
       
        <div class="login-wrap" style="transform: translate(0,15%);">
          
            <div class="col-md-12">
                {{-- @include('FrontEnd.Login.partials.errors') --}}
                <div class="col-md-12 text-center mt-2">
                    @include('Includes.errors')
                  </div>
     
                <div class="login-form" >
                <form class="{{route('Login')}}" method="POST">
                    @csrf
                        <label for="inlineFormInputName2" class="text-black-50">چنانچه حساب کاربری دارید وارد شوید</label>
                        <input type="text" class="form-control my-3 " name="field" id="inlineFormInputName2" placeholder="نام کاربری یا ایمیل">
                        <input type="password" class="form-control my-3 " name="pass" id="inlineFormInputName2" placeholder="رمز عبور">
                      
     
                        <button type="submit" class="btn btn-sm btn-success col-md-3 mb-2">ورود</button>
                        <a href="{{route('SignUp.Google')}}" class="btn btn-sm btn-danger">ورود نام با حساب گوگل <i class="fab fa-google"></i></a>

                        <hr/>
                    </form>
                    <form action="{{route('SignUp')}}" method="get" class="form-inline">
                        <label>اگر حساب کاربری ندارید ثبت نام کنید</label>
                        <button type="submit" class="btn btn-sm btn-primary mx-2">ثبت نام</button>
                        <hr/>
                    </form>
                    <form action="{{route('forgot')}}" method="get" class="form-inline">
                        <label>رمز عبور خود را فراموش کرده اید؟</label>
                        <button type="submit" class="btn btn-sm btn-primary mx-2">فراموشی رمز عبور</button>
                        <hr/>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
