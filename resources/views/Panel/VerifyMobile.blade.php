@extends('layout.Panel.temp')

@section('content')
<link rel="stylesheet" href="{{route('BaseUrl')}}/assets/css/login.css">

<header class="container d-none d-md-block" >
    <div class="row" style="justify-content: center;">
        <div class="col-md-6">
            <ul class="stepper stepper-horizontal">

    

                <li class="active">
                <a href="#!" class="p-2 text-black-50">
                        <span style="" class="circle_ bg-gradient">
                            <i class="fa fa-check"></i>
                        </span>
                        <span class="fs-0-8">تایید شماره تلفن</span>
                    </a>
                
                </li>
                
                <li class="active">
                <a href="#!" class="p-2 text-primary">
                        <span style="border: 3px solid #7979d0;
                        background: #9696f9 !important;" class="circle_ " >2</span>
                        <span class="">بارگذاری مدارک</span>
                    </a>
                </li>

            </ul>
        </div>
    </div>
</header>

<div class="col-md-8 offset-md-2 mb-3">
    <form id="edit" action="{{route('Request.Channel.Submit')}}" method="post" enctype="multipart/form-data">
        @csrf
        
        <div class="card p-3">
            <div class="row">
                <div class="col-md-12 text-center mb-5">
                    <h3><<   درخواست کانال رسمی >></h3>
                    <hr>
                </div>
                <div class="col-md-12 text-center mb-2">
                    @include('Includes.errors')
                </div>
            </div>
         
          




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
            verify_code:"required",
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
            verify_code:"لطفا کد تاییدی که برای شما پیامک شده را وارد نمایید",
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