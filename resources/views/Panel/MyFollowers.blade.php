@extends('layout.Panel.temp')

@section('content')
<div class="col-sm-9 col-sm-offset-3 col-md-12  ">
    <div class="wpb_wrapper py-3">
        <h2 class="  mt-15 mb-15 title__divider title__divider--line"
            style="margin-right: 0px;"><span class="title__divider__wrapper"> دنبال کنندگان من<span
                    class="line brk-base-bg-gradient-right"></span>
            </span></h2>
     
    </div>
    <div style="overflow-x: auto;">
        <table id="example1" class="table table-striped  table-bordered text-center">
            <thead>
            <tr>
                <th>ردیف</th>
                <th style=""> نام کاربری</th>
                <th style=""> تصویر</th>
            </tr>
            </thead>

            <tbody>
            @foreach($followers as $key=>$follower)
            <tr>
            <td>{{$key+1}}</td>
            <td>{{$follower->username}}</td>
            <td>
                @if ($follower->avatar)
                    
                <img class="d-inline" style="width:45px;" src="{{$follower->avatar}}" alt="">
                @else
                <img class="d-inline" style="width:45px;" src="{{asset('assets/images/avatar.png')}}" alt="">
                @endif
            </td>
           </tr>
            @endforeach
         

          
          
            </tbody>
        </table>
    </div>
    <div style="text-align: center">
        
    </div>
</div>
@endsection
@section('css')
   
@endsection

@section('js')


@endsection