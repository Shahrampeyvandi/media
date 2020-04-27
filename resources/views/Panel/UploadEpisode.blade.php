@extends('layout.Panel.temp')

@section('content')
<div class="row">
    <div class="col-md-12">

        <div class="card p-3">
            <div class="wpb_wrapper py-3">
                <h2 class="font__family-open-sans font__size-20  mt-15 mb-15 title__divider title__divider--line"
                    style="margin-right: 0px;"><span class="title__divider__wrapper">ایجاد قسمت جدید<span
                            class="line brk-base-bg-gradient-right"></span>
                    </span></h2>

            </div>
            <form id="upload-episode" action="{{route('UploadEpizode')}}" method="post" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="post_id" value="{{$id}}">
                <div class="card epizode p-3">
                    <h3 class="mb-2">آپلود قسمت های دوره: </h3>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <input type="number" class="form-control" name="epizode_number" id="epizode_number"
                                value="{{$number+1}}" placeholder="شماره قسمت">
                        </div>
                        <div class="form-group col-md-6">
                            <input type="text" class="form-control" name="epizode_title" id="epizode_title"
                                placeholder="عنوان">
                        </div>
                        <div class="form-group col-md-12">
                            <label for="desc">تصویر: </label>
                            <input type="file" class="form-control" name="epizode_pic" id="epizode_pic" />
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-12">
                            <label for="desc">فایل: </label>
                            <input type="file" class="form-control" name="file" id="file" />
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-12">
                            <label for="epizode_desc">توضیحات : </label>
                            <textarea class="form-control" name="epizode_desc" id="epizode_desc" cols="30"
                                rows="8"></textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-12">
                            <label for="desc">افزودن زیرنویس: فایل زیرنویس باید با فرمت vtt باشد </label>
                            <input type="file" class="form-control" name="epizode_subtitle" id="epizode_subtitle" />
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-3 my-2 ">
                            <input type="submit" id="upload" name="upload" value="آپلود"
                                class="btn btn-sm btn-success" />
                        </div>
                    </div>
                </div>
            </form>


            @endsection

            @section('js')
            {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script> --}}
            {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" /> --}}
            {{-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script> --}}
            <!-- begin::input mask -->
            <script src="{{asset('Panel/vendor/input-mask/jquery.mask.js')}}"></script>
            <script src="{{asset('Panel/assets/js/input-mask.js')}}"></script>
            <!-- end::input mask -->
            <script src="http://malsup.github.com/jquery.form.js"></script>
            <script src="{{asset('Panel/vendor/ckeditor/ckeditor.js')}}"></script>
            <script>
                $(document).ready(function(){
      
        CKEDITOR.replace('epizode_desc',{
            extraPlugins: 'uploadimage',
            filebrowserUploadUrl: '{{route('UploadImage')}}?type=file',
            imageUploadUrl: '{{route('UploadImage')}}?type=image'
        });


        $("#upload-episode").validate({
		rules: {
            epizode_number:"required",
            epizode_title:"required",
            file:"required",
           
		},
		messages: {
			
            epizode_number: {required: "لطفا شماره قسمت را وارد نمایید",},
            epizode_title:"لطفا عنوان قسمت را وارد نمایید",
            file:"لطفا فایل قسمت را وارد نمایید",
			},
        
	});
   
});
            </script>
            @endsection