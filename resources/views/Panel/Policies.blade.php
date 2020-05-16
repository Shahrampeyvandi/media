@extends('layout.Panel.temp')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="tab-wrapper">
            <a href="{{route('Panel.Policies')}}" @if (request()->path() == "panel/policies")
                class="btn btn-info d-inline-block mb-3" @else class="btn btn-light d-inline-block mb-3" @endif
                >دانشجویان</a>
            <a href="{{route('Panel.Policies','t')}}" @if (request()->path() == "panel/policies/t")
                class="btn btn-info d-inline-block mb-3" @else class="btn btn-light d-inline-block mb-3" @endif>
                اساتید</a>
        </div>
    </div>
</div>
<div class="row">

    <div class="col-md-12">

        <div class="card p-3">
            <div class="d-flex justify-content-end">
                @if (request()->path() == "panel/policies")
                <a href="{{route('Panel.EditPolicies','students')}}">ویرایش <i class="fa fa-pencil-alt"></i></a>
                @endif
                
                
                @if (request()->path() == "panel/policies/t")
                <a href="{{route('Panel.EditPolicies','teachers')}}">ویرایش <i class="fa fa-pencil-alt"></i></a>
                @endif
            </div>
            <form id="upload-file" method="post" action="{{ route('Panel.SavaPolicy') }}" enctype="multipart/form-data">
                @csrf

                <input type="hidden" name="relatedto" @if (request()->path() == "panel/policies")
                value="students" @else value="teachers" @endif >

                <div class="row">
                    <div class="form-group col-md-12">
                        <label for="content">متن خود را وارد نمایید </label>
                        <textarea class="form-control" name="content" id="content" cols="30" rows="20"></textarea>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-3 my-2 btn--wrapper">
                        <input type="submit" name="upload" value="ذخیره" class="btn btn-sm btn-success" />
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

<!-- begin::input mask -->
<script src="{{asset('Panel/vendor/input-mask/jquery.mask.js')}}"></script>
<script src="{{asset('Panel/assets/js/input-mask.js')}}"></script>
<!-- end::input mask -->
<script src="http://malsup.github.com/jquery.form.js"></script>
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