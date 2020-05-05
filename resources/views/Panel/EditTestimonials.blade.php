@extends('layout.Panel.temp')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card p-3">
           
            <form id="upload-file" method="post" action="{{ route('Panel.EditTestimonials') }}" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" value="{{$testimonial->id}}">

                <div class="row">
                    <div class="form-group col-md-12">
                        <label for="content">متن خود را وارد نمایید </label>
                        <textarea class="form-control" name="content" id="content" cols="30" rows="20">

                            {!! $testimonial->content !!}
                        </textarea>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-3 my-2 btn--wrapper">
                        <input type="submit" name="upload" value="ویرایش" class="btn btn-sm btn-success" />
                    </div>
                </div>





        </div>

        </form>

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
});
</script>
@endsection

