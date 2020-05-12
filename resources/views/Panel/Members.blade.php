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
                <div class="form-group   offset-md-9">

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
                class="btn btn-info" @else class="btn btn-light" @endif>دانشجویان</a>
            <a href="{{route('Panel.Members','teacher')}}" @if (request()->path() == "panel/members/teacher")
                class="btn btn-info" @else class="btn btn-light" @endif>اساتید</a>
            <a href="{{route('Panel.Members','deactive')}}" @if (request()->path() == "panel/members/deactive")
                class="btn btn-info" @else class="btn btn-light" @endif>غیر فعال</a>


            <a href="#"></a>
        </div>
        <hr>
    </div>
</div>

<div class="col-sm-9 col-sm-offset-3 col-md-12  ">
    <div class="wpb_wrapper py-3">
        <h2 class="  mt-15 mb-15 title__divider title__divider--line" style="margin-right: 0px;"><span
                class="title__divider__wrapper">کاربران<span class="line brk-base-bg-gradient-right"></span>
            </span></h2>

    </div>
    <style>
        td {
            text-align: center;
        }
    </style>
    <div style="overflow-x: auto;">
        <table id="example1" class="table table-striped  table-bordered " style="width: 120%;">
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
                <td><a href="{{route('User.Show',$member->username)}}" class="text-primary">{{$member->username}}</a></td>
                    <td>{{$member->email}}</td>

                    @if($member->group=='teacher')
                    <td>
                        {{$member->wallet}}
                        <br>

                        <div class="btn-group" role="group" aria-label="">
                            <a data-id="{{$member->id}}"
                                class="delete-post btn  btn-danger btn-sm m-0">تسویه</a>
                        </div>
                    </td>

                    <td style="">
                        @if($member->ability =='mid-level-admin')

                        ادمین
                        <br>
                        <div class="btn-group" role="group" aria-label="">
                            <a id="touser" value="{{$member->id}}" class="touser btn  btn-danger btn-sm m-0">تغییر
                                به کاربر</a>
                        </div>

                        @else

                        کاربر
                        <br>
                        <div class="btn-group" role="group" aria-label="">
                            <a id="toadmin" value="{{$member->id}}" class="toadmin btn  btn-danger btn-sm m-0">تغییر به
                                ادمین</a>
                        </div>
                        @endif
                    </td>

                    <td>
                        @if($member->approved == 1)
                        رسمی
                        <br>
                        <div class="btn-group" role="group" aria-label="">
                            <a id="fromoff" value="{{$member->id}}" class=" btn  btn-danger btn-sm m-0">تبدیل
                                به غیر رسمی</a>
                        </div>
                        @else
                        غیر رسمی
                        <br>
                        <div class="btn-group" role="group" aria-label="">
                            <a id="tooff" value="{{$member->id}}" class=" btn  btn-danger btn-sm m-0">تبدیل
                                به رسمی</a>
                        </div>
                        @endif


                    </td>
                    @endif


                    <td>{{\Morilog\Jalali\Jalalian::forge($member->created_at)->format('%d %B %Y')}}</td>
                   
                 
                <td><a href="" data-id="{{$member->id}}"  class=" delete--user btn btn-sm btn-danger"> حذف کاربر</a></td>
                   


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


$('.delete--user').click(function(e){
                e.preventDefault()
                var value = $(this).data('id');
           swal({
            title: "آیا اطمینان دارید؟",
            text: "توجه داشته باشد با حذف کاربر تمام پست های متعلق به این کاربر نیز حذف خواهند شد!!",
            icon: "warning",
			buttons: {
				confirm : 'بله',
				cancel : 'خیر'
			},
            dangerMode: true
        })
        .then(function(willDelete) {
            if (willDelete) {
                // ajax request
              $.ajax({
                type:'post',
                url:'{{route("Panel.Members.Delete")}}',
                 data:{_token:'{{csrf_token()}}',id:value},
        
                      
                 
                 success:function(data){


                       setTimeout(()=>{
                        location.reload()
                       },1000)
               
                }
        })
            }
			else {
                swal("عملیات لغو شد", {
					icon: "error",
					button: "تایید"
				});
    		}
    	});
    

    
    })
    $('.toadmin').click(function(e){
                e.preventDefault()
                var value = $(this).attr('value');
           swal({
            title: "آیا اطمینان دارید؟",
            text: "با انجام این کاربر نقش ادمین می گیرد!",
            icon: "warning",
			buttons: {
				confirm : 'بله',
				cancel : 'خیر'
			},
            dangerMode: false
        })
        .then(function(willDelete) {
            if (willDelete) {
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
            }
			else {
                swal("عملیات لغو شد", {
					icon: "error",
					button: "تایید"
				});
    		}
    	});
    

    
    })


    $('.touser').click(function(e){
                e.preventDefault()
                var value = $(this).attr('value');
                swal({
            title: "آیا اطمینان دارید؟",
            text: "بازگشت به نقش کابر عادی",
            icon: "warning",
			buttons: {
				confirm : 'بله',
				cancel : 'خیر'
			},
            dangerMode: false
        })
        .then(function(willDelete) {
            if (willDelete) {
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
            }
			else {
                swal("عملیات لغو شد", {
					icon: "error",
					button: "تایید"
				});
    		}
    	});
    })
   

   
    $('#fromoff').click(function(e){
                e.preventDefault()
                var value = $(this).attr('value');

                // ajax request
                swal({
            title: "آیا اطمینان دارید؟",
            text: "وضعیت کانال کابر به غیررسمی تغییر خواهد کرد!",
            icon: "warning",
			buttons: {
				confirm : 'بله',
				cancel : 'خیر'
			},
            dangerMode: false
        })
        .then(function(willDelete) {
            if (willDelete) {
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
            }
			else {
                swal("عملیات لغو شد", {
					icon: "error",
					button: "تایید"
				});
    		}
    	});

    })


    
    $('#tooff').click(function(e){
                e.preventDefault()
                var value = $(this).attr('value');
                     // ajax request
                     swal({
            title: "آیا اطمینان دارید؟",
            text: "وضعیت کانال کابر به رسمی تغییر خواهد کرد!",
            icon: "warning",
			buttons: {
				confirm : 'بله',
				cancel : 'خیر'
			},
            dangerMode: false
        })
        .then(function(willDelete) {
            if (willDelete) {
               
              
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
            }
			else {
                swal("عملیات لغو شد", {
					icon: "error",
					button: "تایید"
				});
    		}
    	});

    })
</script>

@endsection