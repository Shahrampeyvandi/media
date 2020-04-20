@extends('layout.Login.template')
@section('content')
@include('Includes.Login.Header')
    <div class="main mt-5 mt-md-0" style=" display: flex; justify-content: center; align-items: center;">  
        <div class="login-wrap">
            <div class="col-md-12">
                {{-- @include('FrontEnd.Login.partials.errors') --}}
                <div class="login-form p-md-3">
                <form action="{{route('SignUp.verifySubmit')}}" method="POST">
                        @csrf
                       <div class="form-group">
                        <label for="inlineFormInputName2" class="text-center text-black-50">کد فرستاده شده برای ({{$id}}) را وارد نمایید</label>
                        <input type="text" name="code" class="form-control my-3 " id="inlineFormInputName2" placeholder="">
                       </div>
                       <div class="form-group">
                        <button type="submit" class="btn btn-info  mb-2">تایید</button>
                       </div>
                        <hr/>
                    </form>
 
                </div>
            </div>
        </div>
    </div>
@endsection

