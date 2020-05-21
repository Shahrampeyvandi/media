@extends('layout.Panel.temp')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card p-3">
            <form id="upload-file" method="post" action="{{route('AddAboutUs')}}" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="form-group col-md-12">
                        <label for="content">برای کانال خود تصویر انتخاب کنید</label>
                        <input type="file" class="form-control" name="image" id="image" >
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-12">
                        <label for="content">متن خود را وارد نمایید </label>
                        <textarea class="form-control" name="content" id="content" cols="30" rows="20"></textarea>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3 my-2 btn--wrapper">
                        <input type="submit" name="upload" value="جدید" class="btn btn-sm btn-success" />
                    </div>
                </div>
        </div>



        </form>

        <div class="row">
            <div class="col-md-12 ">
                <div class="card p-3">
                <form action="{{route('AboutUsSocialLink')}}" method="post">
                        @csrf
                            <div class="row wrapper-content">
                                <div class="form-group  col-md-6">
                                    <label for=""><span class="text-danger">*</span> افزودن لینک شبکه اجتماعی</label>
                                    <select name="social[]" id="social" class="form-control  custom-select">
                                        <option value="">باز کردن فهرست انتخاب</option>

                                        <option value="link_telegram">تلگرام</option>
                                        <option value="link_whatsapp">واتس اپ</option>
                                       
                                        <option value="link_instagram">اینستاگرام</option>
                                        <option value="link_linkedin">لینکدین</option>
                                   

                                    </select>
                                </div>
                                <div class="form-group  col-md-6">
                                    <label for="link" class="col-form-label"><span class="text-danger">*</span>
                                        لینک</label>
                                    <input type="text" placeholder="" class="form-control" name="link[]" id="link">
                                </div>

                            </div>
                     
                        <hr>
                        <div class="clone ">

                        </div>
                        <div class="clone-bottom">

                            <a href="#" class="">
                                مورد جدید
                                <i class="fa fa-plus-circle"></i>
                            </a>
                        </div>

                        <div class="row">
                            <div class="col-md-3 my-2 btn--wrapper">
                                <input type="submit" name="upload" value="ارسال" class="btn btn-sm btn-success" />
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        {{-- <div class="col-md-3 my-2 btn--wrapper">
                <input type="submit" name="send" value="ارسال" class="btn btn-sm btn-success" />
            </div>
            <div class="col-md-12 my-2">
                <hr>
                <h3>آپلود قسمت های دوره: </h3>
            </div> --}}

        <br />

    </div>
</div>

</div>

@endsection

@section('js')

<script src="{{asset('Panel/vendor/ckeditor/ckeditor.js')}}"></script>
<script>
    $(document).ready(function(){
        CKEDITOR.replace('content',{
            extraPlugins: 'uploadimage',
            filebrowserUploadUrl: '{{route('UploadImage')}}?type=file',
            imageUploadUrl: '{{route('UploadImage')}}?type=image'
        });
        $.validator.addMethod('filesize', function (value, element, param) {
        return this.optional(element) || (element.files[0].size <= param)
         }, 'سایز تصویر نمی تواند بیشتر از دو مگابایت باشد');
        $("#upload-file").validate({
		rules: {
            image:{
                
                filesize:2000 * 1024,
                accept: "jpg|jpeg|png|JPG|JPEG|PNG"
            },
		},
		messages: {
            image:{
                filesize:"حجم تصویر بیش از حد مجاز میباشد",
                accept: "تصویر دارای فرمت غیر مجاز می باشد"
            },
		}
	});

$(document).on('click','.clone-bottom',function(e){
  e.preventDefault()
  let cloned = $(this).siblings('.wrapper-content').clone()
  cloned.find('input[type="text"]').val('')

  cloned.prepend(`<div class="col-md-12"><a class="remove-link float-left" href="#" >
                                    <i class="fas fa-trash text-danger"></i>
                                </a></div>`)
                               
  $(this).prev('.clone').append(cloned)
})


$(document).on('click','.remove-link',function(e){
    e.preventDefault()
    $(this).parents('.wrapper-content').remove()
  
})



});
</script>
@endsection