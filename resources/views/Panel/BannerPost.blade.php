@extends('layout.Panel.temp')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card p-3">
            <form id="upload-file" method="post" action="{{ route('Panel.SaveBannesPost') }}"
                enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="form-group col-md-6">
                        <select name="position" id="position" class="form-control browser-default custom-select">
                            <option value="" selected>جایگاه</option>
                            <option value="top_banner" >top_banner</option>
                            <option value="bottom_banner" >bottom_banner</option>
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <select name="type" id="type" class="form-control browser-default custom-select">
                            <option value="" selected>دسته بندی</option>

                            @forelse (\App\Models\Contents\Categories::where('id','!=',6)->latest()->get() as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                            @empty
                            <option value="" selected>دسته بندی تعریف نشده است</option>
                            @endforelse

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
                    <div class="form-group col-md-6">
                        <select name="content" id="content" class="form-control browser-default custom-select">
                            <option value="0">ابتدا دسته بندی و زبان را انتخاب کنید</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                 
                </div>
                <div class="row">
                    <div class="form-group col-md-6">
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
                    <div class="col-md-3 my-2 btn--wrapper">
                        <input type="submit" name="upload" value="تایید" class="btn btn-sm btn-success" />
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
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        CKEDITOR.replace('title',{
            extraPlugins: 'uploadimage',
            filebrowserUploadUrl: '{{route('UploadImage')}}?type=file',
            imageUploadUrl: '{{route('UploadImage')}}?type=image'
        });


        $('#lang').change(function(e){
            e.preventDefault();
           var type =  $('#type').val()
           var lang = $(this).val()
          
        $.ajax({
                    url: '{{route('Panel.GetAjaxContent')}}',
                    type: 'POST',
                    data: {type: type,lang:lang},
                    dataType: 'JSON',
                    cache: false,
                    success: function (res) {
                       $('#content').html(res)

                    }
                });

        });
});
</script>
@endsection