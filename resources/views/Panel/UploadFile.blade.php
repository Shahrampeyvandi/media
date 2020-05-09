@extends('layout.Panel.temp')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card p-3">
            <div class="wpb_wrapper py-3">
                <h2 class="font__family-open-sans font__size-20  mt-15 mb-15 title__divider title__divider--line"
                    style="margin-right: 0px;"><span class="title__divider__wrapper">ایجاد پست جدید<span
                            class="line brk-base-bg-gradient-right"></span>
                    </span></h2>
            </div>
            <form id="upload-file" method="post" action="{{ route('sUploadFile') }}" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="form-group col-md-6">
                        <select name="type" id="type" class="form-control browser-default custom-select">
                            <option value="" selected>دسته بندی</option>
                            @if($member->group=='student')
                            @forelse (\App\Models\Contents\Categories::where('id','!=',6)->latest()->get() as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                            @empty
                            <option value="" selected>دسته بندی تعریف نشده است</option>
                            @endforelse
                            @else
                            @forelse (\App\Models\Contents\Categories::latest()->get() as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                            @empty
                            <option value="" selected>دسته بندی تعریف نشده است</option>
                            @endforelse
                            @endif
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <select name="lang" id="lang" class="form-control browser-default custom-select">
                            <option value="" selected>انتخاب زبان</option>
                            @forelse (\App\Models\Contents\Languages::latest()->get() as $laguage)
                            <option value="{{$laguage->id}}">{{$laguage->name}}</option>
                            @empty
                            <option value="0" selected>زبان تعریف نشده است</option>
                            @endforelse
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-6">
                        <select name="subject" id="subject" class="form-control browser-default custom-select">
                            <option value="" selected>موضوع</option>
                            @forelse (\App\Models\Contents\Subjects::latest()->get() as $subject)
                            <option value="{{$subject->id}}">{{$subject->name}}</option>
                            @empty
                            <option value="0" selected>موضوع تعریف نشده است</option>
                            @endforelse
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <select name="level" id="level" class=" form-control browser-default custom-select">
                            <option value="" selected>سطح علمی</option>
                            @forelse (\App\Models\Contents\Levels::latest()->get() as $level)
                            <option value="{{$level->id}}">{{$level->name}}</option>

                            @empty
                            <option value="0" selected>سطح علمی تعریف نشده است</option>
                            @endforelse
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-6">
                        <input type="text" class="form-control" name="title" id="title" placeholder="عنوان">
                    </div>
                    <div class="form-group col-md-6">
                        <input type="text" class="form-control" name="owner" placeholder="نام صاحب اثر">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-6">
                        <div class="form-row">
                            <div class="col-md-3">
                                <label for="">تصویر فایل</label>
                            </div>
                            <div class="col-md-9">
                                <input type="file" class="form-control" id="pic" name="pic">
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <input type="text" class="form-control" name="url" placeholder="آدرس یکتا">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-12">
                        <label for="desc">توضیحات : </label>
                        <textarea class="form-control" name="desc" id="desc" cols="30" rows="8"></textarea>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-12">
                        <label for="desc">متن فایل: (این متن میتواند ترجمه فایل باشد)</label>
                        <textarea class="form-control" name="desc2" id="desc2" cols="30" rows="8"></textarea>
                    </div>
                </div>
                <div class="form-footer">
                    <div class="row fileform">
                        <div class="form-group col-md-6">
                            <label for="desc">فایل: <span class="genplus text-primary fs-0-8" style="display:none;">مدت زمان ژن پلاس (کلیپ) حداکثر 3
                                    دقیقه می باشد</span></label>
                            <input type="file" class="form-control" name="file" id="file" />
                        </div>

                        <div class="form-group col-md-6">
                            <label for="desc">افزودن زیرنویس: فایل زیرنویس باید با فرمت vtt باشد </label>
                            <input type="file" class="form-control" name="subtitle" id="subtitle" />
                        </div>
                    </div>
                    @if (auth()->user()->group !== "student")
                    <div class="row price" style="display: none;">
                        <div class="form-group col-md-4">
                            <label for="desc">قیمت: </label>
                            <input type="number" class="form-control" value="0" name="price" id="price" placeholder="">
                            <span class="rial">تومان</span>
                        </div>
                    </div>
                    @endif
                    <div class="row">
                        <div class="col-md-3 my-2 btn--wrapper">
                            <input type="submit" name="upload" id="upload" value="آپلود"
                                class="btn btn-sm btn-success" />
                        </div>
                    </div>
                </div>
        </div>
        </form>
        <hr>
        <div class="progress">
            <div class="progress-bar" role="progressbar" aria-valuenow="" aria-valuemin="0" aria-valuemax="100"
                style="width: 0%">
                0%
            </div>
        </div>
        <br />
        <div id="success">
        </div>
    </div>
</div>
</div>
<div class="row">
    <div class="col-md-12 mt-3 mb-5">
        <div class="sc-gZMcBi ePNtwd"><span>پسوند های مجاز فایل </span>
            <div class="sc-gqjmRU CZXVf">؟</div>
        </div>
        <div class="sc-VigVT hESCWV">
            <p>avi,mp4,mp3,mpga,mkv,3gp
            </p>
        </div>
    </div>
</div>
@endsection
@section('js')
{{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script> --}}
{{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" /> --}}
{{-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script> --}}
<!-- begin::input mask -->
<script src="{{asset('Panel/vendor/input-mask/jquery.mask.js')}}"></script>
<script src="{{asset('Panel/assets/js/input-mask.js')}}"></script>
<!-- end::input mask -->
<script src="{{asset('Panel/assets/js/jquery.form.min.js')}}"></script>
<script src="{{asset('Panel/vendor/ckeditor/ckeditor.js')}}"></script>
<script>
    $(document).ready(function(){
        CKEDITOR.replace('desc',{
            extraPlugins: 'uploadimage',
            filebrowserUploadUrl: '{{route('UploadImage')}}?type=file',
            imageUploadUrl: '{{route('UploadImage')}}?type=image'
        });
    CKEDITOR.replace('desc2',{
            extraPlugins: 'uploadimage',
            filebrowserUploadUrl: '{{route('UploadImage')}}?type=file',
            imageUploadUrl: '{{route('UploadImage')}}?type=image'
        });
        CKEDITOR.replace('epizode_desc',{
            extraPlugins: 'uploadimage',
            filebrowserUploadUrl: '{{route('UploadImage')}}?type=file',
            imageUploadUrl: '{{route('UploadImage')}}?type=image'
        });
        $(document).on('change','#type',function(){

            if($(this).val() == '6'){
                $('.price').show()
               
            }else{
                $('.price').hide()
                
            }
            if($(this).val() == '3'){
                $('.genplus').show()
               
            }else{
                $('.genplus').hide()
                
            }
        })
        $.validator.addMethod('filesize', function (value, element, param) {
        return this.optional(element) || (element.files[0].size <= param)
         }, 'سایز تصویر نمی تواند بیشتر از دو مگابایت باشد');
        $.validator.addMethod(
        "regex",
        function(value, element, regexp) {
            return this.optional(element) || regexp.test(value);
        },
        "Please check your input."
        );

        $("#upload-file").validate({
		rules: {
            title:"required",
            type:"required",
            pic:{
                filesize:2000 * 1024,
                accept: "jpg|jpeg|png|JPG|JPEG|PNG"
            },
            file:{required:true,accept: "avi,mp4,mov,ogg,qt,mp3,mpga,mkv,3gp"},
            lang:"required",
            subject:"required",
            level:"required",
            desc:"required",
            price:{
                regex:/^(?:[1-9]\d*|0)$/
            }
		},
		messages: {
            title: {
            required: "لطفا عنوان فایل را وارد نمایید",
        
            },
            type:"محتوای فایل را انتخاب کنید",
            lang:"زبان فایل را انتخاب کنید",
            level:"سطح علمی فایل را انتخاب کنید",
            subject:"موضوع مورد نظر خود را انتخاب کنید",
            desc:"توضیحات برای فایل الزامی است",
            file:{required:"فایل مورد نظر خود را انتخاب نمایید",accept:"فرمت فایل غیرمجاز می باشد"},
            price:{
                regex:"قیمت نمی تواند با صفر شروع شود",
                accept:"تصویر دارای فرمت غیرمجاز می باشد"
             }
			},
	});
    
    $('#upload').click(function(){
           if($('#upload-file').valid()){
            $(this).val('در حال آپلود ...')
           }
        })
    $('form').ajaxForm({
        beforeSerialize:function($Form, options){
        /* Before serialize */
        for ( instance in CKEDITOR.instances ) {
            CKEDITOR.instances[instance].updateElement();
        }
        return true; 
    },
      beforeSend:function(){
        $('#success').empty();
        
      },
      uploadProgress:function(event, position, total, percentComplete)
      {
      
        $('.btn--wrapper').html(`<button class="btn btn-sm btn-success" type="button" disabled="">
                    <span class="spinner-border spinner-border-sm m-l-5 fs-0-8" role="status" aria-hidden="true"></span>
                    در حال بارگذاری ...
                </button>`)
        $('.progress-bar').text(percentComplete + '%');
        $('.progress-bar').css('width', percentComplete + '%');
      
      
      },
     
      success:function(data)
      {
         
        

          $('.btn--wrapper').html(`<input type="submit" name="upload" value="آپلود" class="btn btn-sm btn-success" />`)
     
        if(data.errors)
        {
            swal("خطا"
            , data.errors
            ,
             "error", {
			button: "باشه"
		});
          $('.progress-bar').text('0%');
          $('.progress-bar').css('width', '0%');
        }
        if(data.success)
        {
            console.log(data.id)
            if(data.id){
                window.location.href = "{{ route("BaseUrl")}}/panel/"+data.id+"/episode";
            }else{
                swal("موفق"
            , "فایل با موفقیت آپلود شد"
            ,
             "success", {
			button: "باشه"
		});
            }
        
            

          $('.progress-bar').text('انجام شد');
          $('.progress-bar').css('width', '100%');
         
          $('#success').append(data.image);

          var form = $('#upload-file')
            form.find('input[type="text"]').val('')
           
            form.find('input[type="file"]').val('')
           
            form.find('textarea').val('')
          
        }
      },

      error:function(data){
        swal("خطا"
            , 'آپلود ناموفق بود'
            ,
             "error", {
			button: "باشه"
		});
      }
    });

});
</script>
@endsection