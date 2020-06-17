@extends('layout.Panel.temp')

@section('content')


<div class="col-sm-12 col-sm-offset-3 col-md-12  ">
    <div class="wpb_wrapper py-3">
        <h2 class="  mt-15 mb-15 title__divider title__divider--line" style="margin-right: 0px;"><span
                class="title__divider__wrapper">لیست لینک های تبلیغاتی<span
                    class="line brk-base-bg-gradient-right"></span>
            </span> <a href="{{route('Panel.Content.AddAdvert')}}" style="left:0;"
                class=" btn btn-success btn-sm m-0 position-absolute">افزودن</a>
        </h2>
    </div>

    <div style="overflow-x: auto;">
        <table id="example1" class="table table-striped  table-bordered w-100">
            <thead>
                <tr>
                    <th>ردیف</th>
                    <th>محتوا</th>
                    <th>وضعیت</th>
                    <th>نوع</th>

                    <th>دسته بندی</th>
                    <th>بازدیدهای مجاز</th>
                    <th>بازدید فعلی</th>
                    <th>تاریخ ثبت</th>
                    <th>عملیات</th>

                </tr>
            </thead>
            <tbody>
                @foreach($advertLinks as $key=>$advert)
                <tr>
                    <td>{{$key+1}}</td>
                    <td>
                        @if ($advert->type == 'image')
                        <a href="{{$advert->content_link}}" target="_blank"><img src="{{$advert->pic_address}}"
                                style="width:200px;"></a>
                        @else
                        <video width="320" height="240" controls>
                            <source src="{{$advert->content_link}}" type="video/mp4">


                        </video>
                        @endif

                    </td>
                    <td>

                        @if ($advert->status == 1)
                        <span class="text-success">فعال</span>
                        @else
                        <span class="text-danger">غیرفعال</span>
                        @endif

                    </td>
                    <td><span class="text-primary">
                            @if ($advert->type == 'image')
                            تصویر
                            @endif
                            @if ($advert->type == 'video')
                            ویدئو
                            @endif

                        </span></td>

                    <td>
                        @if ($advert->cat_id == "همه")
                        همه

                        @else
                        {{\App\Models\Contents\Categories::where('id',$advert->cat_id)->first()->name}}
                        @endif

                    </td>
                    <td>

                        {{$advert->view_count}}

                    </td>
                    <td>

                        {{$advert->visits->count()}}

                    </td>
                    <td>{{\Morilog\Jalali\Jalalian::forge($advert->created_at)->format('%d %B %Y')}}</td>
                    <td>

                        <div class="btn-group" role="group" aria-label="">

                            <a data-id="{{$advert->id}}" class="delete btn btn-rounded btn-danger btn-sm m-0">حذف</a>
                            <a data-id="{{$advert->id}}" class="status btn btn-rounded btn-info btn-sm m-0">
                                @if ($advert->status == 1)
                                غیرفعال
                                @else
                                فعال
                                @endif
                            </a>
                            <a href="{{route('Panel.Content.EditAdvertLink',$advert)}}"
                                class=" btn btn-rounded btn-primary btn-sm m-0">ویرایش
                            </a>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</div>
@endsection
@section('css')

@endsection

@section('js')

<script>
    $(document).on('click','.delete',function(e){
                e.preventDefault()
                
                var value = $(this).data('id');
                swal({
            title: "آیا اطمینان دارید؟",
            text: "حذف خواهد شد",
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
                url:'{{route("Panel.AdvertList.Delete")}}',
                 data:{_token:'{{csrf_token()}}',id:value},
                 success:function(data){
                           if(data == 'success'){
                       setTimeout(()=>{
                            location.reload()
                       },500)
                           }
                       
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
     $(document).on('click','.status',function(e){
                e.preventDefault()
                var value = $(this).data('id');
                swal({
            title: "آیا اطمینان دارید؟",
            text: "تغییر حالت وضعیت",
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
                url:'{{route("Panel.AdvertList.Status")}}',
                 data:{_token:'{{csrf_token()}}',id:value,type:2},
                 success:function(data){
                       setTimeout(()=>{
                        location.reload()
                       },500)
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

    $('#slider-type').change(function(){
        if($(this).val() == "client slider"){
            $('.header_sec').show(200)
        }else{
            $('.header_sec').hide(200)
       
        }
    })

    $("#setting").validate({
		rules: {
            header:{
        required: function(element){
            return $("#slider-type").val() == "client slider";
        }
      },
		},
		messages: {
			header: "لطفا عنوان هدر اسلایدر را وارد نمایید",
		
		}
	});
</script>
@endsection