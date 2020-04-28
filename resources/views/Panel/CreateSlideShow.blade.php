@extends('layout.Panel.temp')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card p-3">
           
            <form id="upload-file" method="post" action="{{ route('Panel.SaveSlideShow') }}"
                enctype="multipart/form-data">
                @csrf
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
                    <label for="link" class="col-form-label"><span class="text-danger">*</span> لینک: </label>
                    <input type="link" name="link" id="link" class="form-control">
                  </div>
                </div>

                <div class="row">
                    <div class="col-md-3 my-2 btn--wrapper">
                        <input type="submit" name="upload" value="جدید" class="btn btn-sm btn-success" />
                    </div>
                </div>





            </form>
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