@extends('layout.Panel.temp')

@section('content')

<div class="col-md-8 offset-md-2 mb-3">
    <form id="edit" action="{{route('Request.Channel')}}" method="post" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="id" value="{{$member->id}}">
        <div class="card p-3">
            <div class="row">
                <div class="col-md-12 text-center mb-5">
                    <h3><<  فرم ثبت کانال رسمی  >></h3>
                    <hr>
                </div>
                <div class="col-md-12 text-center mb-2">
                    @include('Includes.errors')
                </div>
            </div>
            @if($member->channelInformations && $member->channelInformations->accepted==1)

            درخواست شما در دست بررسی می باشد
            @elseif($member->channelInformations && $member->channelInformations->accepted==2)

            در خواست شما تایید شد

            @elseif($member->channelInformations && $member->channelInformations->accepted==3)

            در خواست شما رد شد

            @else
            <div class="row">
                <div class="form-group  col-md-6">
                    <label for=""><span class="text-danger">*</span> مورد استفاده کانال: </label>
                    <select name="role" id="role" class="form-control  custom-select">
                        <option value="personal">شخصی</option>
                        <option value="official">مرکز آموزشی</option>
                    </select>
                </div>
            </div>





            <div class="row">
                <div class="form-group col-md-6">
                    <label for="national_card_pic" class="col-form-label"><span class="text-danger">*</span> تصویر کارت
                        ملی: </label>
                    <input type="file" placeholder="" class="form-control" name="national_card_pic"
                        id="national_card_pic">
                </div>
                <div class="form-group col-md-6">
                    <label for="education_certificate_pic" class="col-form-label"><span class="text-danger">*</span>
                        تصویر مدرک تحصیلی: </label>
                    <input type="file" placeholder="" class="form-control" name="education_certificate_pic"
                        id="education_certificate_pic">
                </div>

            </div>
            <div class="row permission_work_section" style="display: none;">
                <div class="form-group col-md-12">
                    <label for="permission_work_pic" class="col-form-label"><span class="text-danger">*</span> تصویر
                        پروانه فعالیت: </label>
                    <input type="file" placeholder="" class="form-control" name="permission_work_pic"
                        id="permission_work_pic">
                </div>


            </div>



            <div class="row">
                <div class="form-group col-md-6">
                    <input type="submit" class="btn btn-sm btn-primary" value="آپلود">
                </div>
            </div>
        </div>
    </form>
    @endif
</div>
@endsection
@section('js')
<script type="text/javascript">
    $(document).ready(function(){
  
        $('#role').on('change',function(){
    if ($(this).val() == "official"){
        $('.permission_work_section').fadeIn();
      }else{
        $('.permission_work_section').fadeOut();

      }
   });
  

  
    $("#edit").validate({
		rules: {
         
            national_card_pic: {
				required: true,
                accept: "jpg|jpeg|png|JPG|JPEG|PNG",
			},
            education_certificate_pic: {
				required: true,
                accept: "jpg|jpeg|png|JPG|JPEG|PNG",
			},
            permission_work_pic:{
                required: function(element){
            return $('#role').val() == "official";
        },
                accept: "jpg|jpeg|png|JPG|JPEG|PNG",
            }
		},
		messages: {
		
			national_card_pic: {
				required: "تصویر کارت ملی خود را وارد نمایید",
				accept: "تصویر وارد شده دارای فرمت غیرمجاز است"
			},
            education_certificate_pic: {
				required: "تصویر مدرک تحصیلی خود را وارد نمایید",
				accept: "تصویر وارد شده دارای فرمت غیرمجاز است"
			},
            permission_work_pic: {
				required: "تصویر پروانه فعالیت خود را وارد نمایید",
				accept: "تصویر وارد شده دارای فرمت غیرمجاز است"
			}
		}
	});
  })
</script>

@endsection