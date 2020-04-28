@extends('layout.Panel.temp')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card p-3">
            
            <form id="upload-file" method="post" action="{{ route('Panel.SaveEditSlideShow') }}"
                enctype="multipart/form-data">
                @csrf
        <input type="hidden" name="id" value="{{$slideshow->id}}">
                <img style="width:25%;" src="{{asset($slideshow->banner)}}" alt="">
                <div class="row mt-2">
                    <div class="form-group col-md-12">
                        <label for="pic" class="col-form-label"><span class="text-danger">*</span> تصویر جدید : </label>
                    <input type="file" class="form-control"  name="pic" id="pic" />
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-12">
                        <label for="title">متن اسلایدشو </label>
                        <textarea class="form-control" name="title" id="title" cols="30" rows="20">

                            {!! $slideshow->title !!}
                        </textarea>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-md-12">
                    <label for="link" class="col-form-label"><span class="text-danger">*</span> لینک: </label>
                    <input type="link" name="link" id="link" value="{{$slideshow->link}}" class="form-control">
                  </div>
                </div>

                <div class="row">
                    <div class="col-md-3 my-2 btn--wrapper">
                        <input type="submit" name="upload" value="ویرایش" class="btn btn-sm btn-success" />
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