@extends('layout.Panel.temp')

@section('content')
<div id="popup" class="overlay delete">
    <div class="popup">
        <a class="close" href="#">&times;</a>
        <div class="content">
            <form id="" action="{{route("Channel.Requested.Response")}}" method="post">
                @csrf
                <div class="mt-5 pr-2">
                    <h5 class="modal-title  pt-1 mb-2" id="exampleModalLabel">اخطار</h5>
                    <div class="form-group col-md-12">
                        <input type="hidden" id="request_id" name="id" value="">
                        <input type="hidden" id="member-id" name="member_id" value="">
                    </div>
                    <label for="user_pass" class="col-form-label"><span class="text-danger">*</span> دلیل عدم تایید:
                    </label>
                    <div class="form-group mt-2 ">
                        <select name="reason" id="reason" class="form-control browser-default custom-select">
                            <option value="" selected>باز کردن فهرست انتخاب</option>
                         
                            <option value="عدم تطابق با شرایط لازم" >عدم تطابق با شرایط لازم</option>
                            <option value="نقص مدارک">نقص مدارک</option>
                         
                       
                        </select>
                    </div>               
                </div>
                <div class="form-group  mt-1 ">
                    <button type="submit" class="btn btn-sm btn-danger ">عدم تایید </button>
                </div>
            </form>
        </div>
    </div>
</div>
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">کاربران </a></li>
        <li class="breadcrumb-item active">در خواست های کانال رسمی</li>
        
    </ol>
</nav>
<div class="col-sm-9 col-sm-offset-3 col-md-12  ">
    <div class="wpb_wrapper py-3">
        <h2 class="  mt-15 mb-15 title__divider title__divider--line" style="margin-right: 0px;"><span
                class="title__divider__wrapper"> در خواست های کانال رسمی<span
                    class="line brk-base-bg-gradient-right"></span>
            </span></h2>

    </div>
    <div style="overflow-x: auto;">
        <table id="example1" class="table table-striped  table-bordered w-100">
            <thead>
                <tr>
                    <th>ردیف</th>
                    <th> کاربر</th>
                    <th> تصویر کارت ملی</th>
                    <th> تصویر مدرک تحصیلی</th>
                    <th> تصویر پروانه فعالیت</th>
                    <th> عملیات</th>

                </tr>
            </thead>

            <tbody>
                @foreach($requestedchannels as $key=>$requestedchannel)
                <tr>
                    <td>{{$key+1}}</td>
                    <td>
                        <a class="text-primary" href="{{route('User.Show',$requestedchannel->member->username)}}">
                            {{$requestedchannel->member->username}}</a>
                    </td>
                    <td>
                        <a target="_blank" href="{{route('BaseUrl')}}//{{$requestedchannel->kart_melli}}">
                            <img src="{{route('BaseUrl')}}//{{$requestedchannel->kart_melli}}" style="width:200px;">
                        </a>
                    </td>
                    <td>
                        <a target="_blank" href="{{route('BaseUrl')}}//{{$requestedchannel->madrak}}">
                            <img src="{{route('BaseUrl')}}//{{$requestedchannel->madrak}}" style="width:200px;"></a>
                    </td>
                    <td>
                        @if($requestedchannel->parvane_faaliat)
                        <a target="_blank" href="{{route('BaseUrl')}}//{{$requestedchannel->parvane_faaliat}}">
                            <img src="{{route('BaseUrl')}}//{{$requestedchannel->parvane_faaliat}}"
                                style="width:200px;">
                        </a>
                        @else
                        بارگذاری نشده

                        @endif
                    </td>

                    <td>

                        <div class="btn-group" role="group" aria-label="">
                            <a id="acceptchannel" value="{{$requestedchannel->id}}"
                                class="acceptchannel btn btn-rounded btn-info btn-sm m-0">تایید</a>

                            <a id="refusechannel" value="{{$requestedchannel->id}}"
                                class="refusechannel delete-post btn btn-rounded btn-danger btn-sm m-0">رد</a>


                        </div>
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
<script>
    $('.acceptchannel').click(function(e){
                e.preventDefault()
                var value = $(this).attr('value');
                swal({
            title: "آیا اطمینان دارید؟",
            text: "درخواست کانال رسمی پذیرفته خواهد شد",
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
                url:'{{route("Channel.Requested.Response")}}',
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

     
       $('.refusechannel').click(function(e){
        e.preventDefault()
        let id = $(this).attr('value')
       $('#request_id').attr('value',id)
     $('.overlay').css({  'visibility': 'visible',
         'opacity': '1',
         'z-index': '10',})
    })



</script>
@endsection