@extends('layout.Panel.temp')

@section('content')
<div id="popup1" class="overlay">
    <div class="popup">

        <a class="close" href="#">&times;</a>
        <div class="content">
            <form id="" action="{{route('Panel.Checkout')}}" method="post">
                @csrf
               
                <div class="mt-5 pr-2">
                    <h5 class="modal-title  pt-1 mb-2" id="exampleModalLabel">تسویه حساب</h5>
                    <div class="form-group col-md-12">
                        <input type="hidden" id="post_id" name="id" value="0">
                      
                       
                    </div>
                    <p>آیا با تسویه حساب با استاد و انتقال موجودی کیف پول به حساب فرد موافقید؟</p>
                </div>
                <div class="form-group   offset-md-10">

                    <button type="submit" class="btn btn-sm btn-danger ">تسویه حساب </button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div>

            <a href="{{route('Panel.Members')}}" @if (request()->path() == "panel/members")
                class="btn btn-info" @else class="btn btn-light"  @endif>دانشجویان</a>
            <a href="{{route('Panel.Members','teacher')}}" @if (request()->path() == "panel/members/teacher")
                class="btn btn-info" @else class="btn btn-light"  @endif>اساتید</a>
            <a href="{{route('Panel.Members','deactive')}}" @if (request()->path() == "panel/members/deactive")
                class="btn btn-info" @else class="btn btn-light"  @endif>غیر فعال</a>


            <a href="#"></a>
        </div>
        <hr>
    </div>
</div>

<div class="col-sm-9 col-sm-offset-3 col-md-12  ">
    <div class="wpb_wrapper py-3">
        <h2 class="  mt-15 mb-15 title__divider title__divider--line"
            style="margin-right: 0px;"><span class="title__divider__wrapper">کاربران<span
                    class="line brk-base-bg-gradient-right"></span>
            </span></h2>
     
    </div>
    <div style="overflow-x: auto;">
        <table id="example1" class="table table-striped  table-bordered w-100">
            <thead>
            <tr>
                <th>ردیف</th>
                <th>نام </th>
                <th>نام خانوادگی</th>

                <th>موبایل</th>
                <th>یوزرنیم</th>
                <th>ایمیل</th>
                @if (request()->path() == "panel/members/teacher")
                <th>موجودی کیف پول</th>
                <th>نقش مدیریت</th>
                <th>وضعیت کانال</th>
                 @endif
                <th>تاریخ عضویت</th>
                <th>وضعیت</th>
                <th>عملیات</th>

            </tr>
            </thead>

            <tbody>
            @foreach($members as $key=>$member)
            <tr>
            <td>{{$key+1}}</td>
            <td>{{$member->firstname}}</td>
            <td>{{$member->lastname}}</td>
            <td>{{$member->mobile}}</td>
            <td>{{$member->username}}</td>
            <td>{{$member->email}}</td>

            @if($member->group=='teacher')
            <td>
            {{$member->wallet}}

            <div class="btn-group" role="group" aria-label="">
                    <a  data-id="{{$member->id}}" class="delete-post btn btn-rounded btn-danger btn-sm m-0">تسویه</a>
                  </div>
            </td>

            <td>
            @if($member->ability =='mid-level-admin')

            ادمین

            <div class="btn-group" role="group" aria-label="">
                    <a id="touser" value="{{$member->id}}" class=" btn btn-rounded btn-danger btn-sm m-0">تغییر به کاربر</a>
                  </div>

            @else

            کاربر

            <div class="btn-group" role="group" aria-label="">
                    <a id="toadmin" value="{{$member->id}}" class=" btn btn-rounded btn-danger btn-sm m-0">تغییر به ادمین</a>
                  </div>
            @endif
            </td>

        <td>
        @if($member->approved == 1)
        رسمی
        <div class="btn-group" role="group" aria-label="">
                    <a id="fromoff" value="{{$member->id}}" class=" btn btn-rounded btn-danger btn-sm m-0">تبدیل به غیر رسمی</a>
                  </div>
        @else
        غیر رسمی
        <div class="btn-group" role="group" aria-label="">
                    <a id="tooff" value="{{$member->id}}" class=" btn btn-rounded btn-danger btn-sm m-0">تبدیل به رسمی</a>
                  </div>
        @endif


        </td>
            @endif


            <td>{{\Morilog\Jalali\Jalalian::forge($member->created_at)->format('%d %B %Y')}}</td>
            @switch($member->confirmed)
            @case(0)
            <td>در انتظار تایید</td>
            <td>تایید  -  رد</td>
            @break
            @case(1)
            <td>فعال</td>
            <td>غیر فعال کردن</td>
            @break
            @case(2)
            <td>غیر فعال</td>
            <td>فعال کردن</td>
            @break
            @endswitch
            

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
<script>

$('#toadmin').click(function(e){
                e.preventDefault()
                var value = $(this).attr('value');

                // ajax request
 $.ajax({
                type:'post',
                url:'{{route("Panel.Member.ChangeAbility")}}',
                 data:{_token:'{{csrf_token()}}',id:value,type:1},
        
                      
                 
                 success:function(data){


                       setTimeout(()=>{
                        location.reload()
                       },1000)
               
                }
        })
    })


    $('#touser').click(function(e){
                e.preventDefault()
                var value = $(this).attr('value');

                // ajax request
 $.ajax({
                type:'post',
                url:'{{route("Panel.Member.ChangeAbility")}}',
                 data:{_token:'{{csrf_token()}}',id:value,type:2},
   
                      
                 
                 success:function(data){

                       setTimeout(()=>{
                        location.reload()
                       },1000)
               
                }
        })
    })


    $('#fromoff').click(function(e){
                e.preventDefault()
                var value = $(this).attr('value');

                // ajax request
 $.ajax({
                type:'post',
                url:'{{route("Panel.Channel.Official")}}',
                 data:{_token:'{{csrf_token()}}',id:value,type:2},
   
                      
                 
                 success:function(data){

                       setTimeout(()=>{
                        location.reload()
                       },1000)
               
                }
        })
    })
    $('#tooff').click(function(e){
                e.preventDefault()
                var value = $(this).attr('value');

                // ajax request
 $.ajax({
                type:'post',
                url:'{{route("Panel.Channel.Official")}}',
                 data:{_token:'{{csrf_token()}}',id:value,type:1},
   
                      
                 
                 success:function(data){

                       setTimeout(()=>{
                        location.reload()
                       },1000)
               
                }
        })
    })
</script>

@endsection