@extends('layout.Panel.temp')

@section('content')
<div class="row">
    <div class="col-md-12">

        <div class="card p-3">
          
            <form id="upload-file" method="post" action="{{ route('Panel.SavaPolicy') }}" enctype="multipart/form-data">
                @csrf
                <div class="row">

                    <div class="form-group col-md-6">
                        مربوط به: 
                        <select name="relatedto" id="relatedto" class="form-control browser-default custom-select">
                           
                          
                            <option value="students">دانشجویان</option>

                            
                            <option value="teachers" >اساتید</option>
                          

                        </select>
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
            filebrowserUploadUrl : '{{route('UploadImage')}}',
            filebrowserImageUploadUrl : '{{route('UploadImage')}}'
    });
});
</script>
@endsection