@extends('layout.Panel.temp')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card p-3">
            <form id="upload-file" method="post" action="{{ route('Panel.SaveSlideShow') }}"
                enctype="multipart/form-data">
                @csrf
                <div class="form-group ">
                    <label for=""><span class="text-danger">*</span> نوع : </label>
                    <select name="slider_type" id="slider-type" class="form-control  custom-select">
                        <option value="header_slideshow" >header slider</option>
                        <option value="footer_slideshow" >client slider</option>
                    </select>
                </div>
                <div class="row">
                    <div class="form-group col-md-12">
                        <label for="pic" class="col-form-label"><span class="text-danger">*</span> تصویر: </label>
                        <input type="file" class="form-control" name="pic" id="pic" />
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-12">
                        <label for="title">متن خود را وارد نمایید </label>
                        <textarea class="form-control" name="title" id="title" cols="30" rows="20"></textarea>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-12">
                        <label for="link" class="col-form-label"> لینک: </label>
                        <input type="text" name="link" id="link" class="form-control" placeholder="http://example.com">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3 my-2 btn--wrapper">
                        <input type="submit" name="upload" value="جدید" class="btn btn-sm btn-success" />
                    </div>
                </div>
            </form>
        </div>
        <br />
    </div>
</div>

</div>

@endsection

@section('js')

<!-- begin::input mask -->
<script src="{{asset('Panel/vendor/input-mask/jquery.mask.js')}}"></script>
<script src="{{asset('Panel/assets/js/input-mask.js')}}"></script>
<!-- end::input mask -->
<script src="http://malsup.github.com/jquery.form.js"></script>
<script src="{{asset('Panel/vendor/ckeditor/ckeditor.js')}}"></script>
<script>
    $(document).ready(function(){
        CKEDITOR.replace('title',{
            extraPlugins: 'uploadimage',
            filebrowserUploadUrl: '{{route('UploadImage')}}?type=file',
            imageUploadUrl: '{{route('UploadImage')}}?type=image'
        });
});
</script>
@endsection