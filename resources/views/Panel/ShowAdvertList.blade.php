@extends('layout.Panel.temp')

@section('content')
<div id="popup1" class="overlay">
    <div class="popup">
        <a class="close" href="#">&times;</a>
        <div class="content">
            <form id="" action="{{route('Panel.SlideShow.Delete')}}" method="post">
                @csrf
                <div class="mt-5 pr-2">
                    <h5 class="modal-title  pt-1 mb-2" id="exampleModalLabel">اخطار</h5>
                    <div class="form-group col-md-12">
                        <input type="hidden" id="comment_id" name="comment_id" value="0">
                    </div>
                    <p>آیا برای حذف مورد مطمئن هستید؟</p>
                </div>
                <div class="form-group   offset-md-10">
                    <button type="submit" class="btn btn-sm btn-danger ">حذف </button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="col-sm-12 col-sm-offset-3 col-md-12  ">
    <div class="wpb_wrapper py-3">
        <h2 class="  mt-15 mb-15 title__divider title__divider--line" style="margin-right: 0px;"><span
                class="title__divider__wrapper">لیست لینک های تبلیغاتی<span class="line brk-base-bg-gradient-right"></span>
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
                    <a href="{{$advert->content_link}}" target="_blank"><img src="{{$advert->pic_address}}" style="width:200px;"></a>
                        @else
                        <video width="320" height="240" controls>
                            <source src="{{$advert->content_link}}" type="video/mp4">
                        
                           
                          </video>
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

                    <td>{{$advert->categories->name}}</td>
                    <td>
                        
                        {{$advert->view_count}}
                      
                    </td>
                    <td>
                        
                        {{$advert->visits->count()}}
                      
                    </td>
                    <td>{{\Morilog\Jalali\Jalalian::forge($advert->created_at)->format('%d %B %Y')}}</td>
                    <td>

                        <div class="btn-group" role="group" aria-label="">
                      
                            <a data-id="{{$advert->id}}"
                                class="btn--delete btn btn-rounded btn-danger btn-sm m-0">حذف</a>
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