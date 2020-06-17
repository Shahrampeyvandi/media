@extends('layout.Panel.temp')

@section('content')
<div class="col-sm-12 col-sm-offset-3 col-md-12  ">
    <div class="wpb_wrapper py-3">
        <h2 class="  mt-15 mb-15 title__divider title__divider--line" style="margin-right: 0px;"><span
                class="title__divider__wrapper">افزودن تبلیغ<span class="line brk-base-bg-gradient-right"></span>

        </h2>
    </div>
    <div class="row">
        <div class="col-md-12 d-flex justify-content-center mb-2">
            @if ($advert->type == 'video')

            <video width="600" height="400" controls>
                <source src="{{$advert->content_link}}" type="video/mp4">


            </video>
            @else
            <a href="{{$advert->content_link}}" target="_blank"><img src="{{$advert->pic_address}}"
                    style="width:200px;"></a>
            @endif
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-md-12 card">
            <form id="advert" action="{{route('Panel.Content.SubmitEditAdvertLink')}}" method="post"
                enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" value="{{$advert->id}}">
                <div class="row">
                    <div class="form-group col-md-6">
                        <h3 class="mt-3 mb1">مربوط به : </h3>
                        <select name="category" id="category" class="form-control custom-select">
                            <option value="همه">همه</option>
                            @foreach (\App\Models\Contents\Categories::whereNotIn('id', [4,5])->get() as $item)
                            <option value="{{$item->id}}">{{$item->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group col-md-6">
                        <h3 class="mt-3 mb1">تعداد بازدیدهای مجاز</h3>
                        <input type="number" name="count" id="count" value="{{$advert->view_count}}"
                            class="form-control">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-6 mr-0">

                        @if ($advert->type == 'video')
                        <div class="checkstores custom-control custom-radio custom-control-inline ml-3 mr-0"
                            style="margin-left: -1rem;">
                            <input type="radio" id="1" name="content_type" class="custom-control-input content_type"
                                value="video" checked>
                            <label class="custom-control-label" for="1">ویدئو</label>
                        </div>
                        @else
                        <div class="checkstores custom-control custom-radio custom-control-inline ml-3"
                            style="margin-left: -1rem;">
                            <input type="radio" id="2" name="content_type" class="custom-control-input content_type"
                                value="image" checked>
                            <label class="custom-control-label" for="2">تصویر</label>
                        </div>
                        @endif


                    </div>
                </div>
                <div class="row pic-wrap" style="display: none;">


                    <div class="form-group col-md-6  ">
                        <h3 class="mt-3 mb1">تصویر را وارد نمایید</h3>
                        <input name="pic_address" id="pic_address" type="file" class="form-control">
                    </div>
                </div>
                <h3 class="mt-3 mb-1">آدرس : </h3>
            <p>{{$advert->content_link}}</p>

                <div class="row">
                    <div class="col-md-3 my-2 btn--wrapper">
                        <input type="submit" name="upload" value="ذخیره" class="btn btn-sm btn-success" />
                    </div>
                </div>

            </form>
        </div>
    </div>
    @endsection

    @section('js')
    <script>
        $(document).ready(function(){
            $('input[name=content_type]').change(function(){
               
               if($(this).val() == 'image') {
                   $('.pic-wrap').show()
                }else{
                    $('.pic-wrap').hide()
                    $('#pic_address').val('')
                }
                })
                

                
       
 $.validator.addMethod(
    "regex",
    function(value, element, regexp) {
        return this.optional(element) || regexp.test(value);
    },
    "Please check your input."
);

        $("#advert").validate({
		rules: {
            count: "required",
           
            pic_address:{
            required: function(element){
            return $("input[name=content_type]:checked").val() == "image";
        }
      },
      link:{
        required: function(element){
            return  $("input[name=content_type]:checked").val() == "image";
        },
        regex:/^(http|https)?:\/\/[a-zA-Z0-9-\.]+\.[a-z]{2,4}/
       
      },
      file:{
        accept: "avi|mp4|mov|ogg|mpga|mkv|3gp"

      }
		},
		messages: {
			count: "لطفا تعداد نمایش های مجاز تبلیغ را وارد نمایید",
            pic_address: "لطفا تصویر  را وارد نمایید",
            link:{required:"لینک تصویر را وارد نمایید",regex:"لینک دارای فرمت غیر مجاز میباشد"},
			
            file:{accept:"فرمت فایل غیرمجاز می باشد"},
		}
	});
    })
    </script>
    @endsection