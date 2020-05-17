@extends('layout.Panel.temp')

@section('content')
<div class="row">
    <div class="col-md-12">

        <div class="card p-3">
            
            @component('Includes.Main.player',['content' => $post,'link' => $link,
            'link_type'=>$link_type,
            'pic_link'=> $pic_link])
                
            @endcomponent

            <div class="wpb_wrapper py-3">
                <h2 class="font__family-open-sans font__size-20  mt-15 mb-15 title__divider title__divider--line"
                    style="margin-right: 0px;"><span class="title__divider__wrapper">ویرایش محتوا<span
                            class="line brk-base-bg-gradient-right"></span>
                    </span></h2>
            </div>
            <form id="upload-file" method="post" action="{{route('Panel.Posts.Confirm.Submit')}}" enctype="multipart/form-data">
                @csrf
                <input type="hidden" class="" name="id" id="id" value="{{$post->id}}">

                <div class="row">
                    <div class="form-group col-md-6">
                        <select name="type" id="type" class="form-control browser-default custom-select">
                            <option value="" selected>دسته بندی</option>
                           
                            @forelse (\App\Models\Contents\Categories::latest()->get() as $category)
                            <option @if ($post->categories_id == $category->id)
                                selected
                            @endif value="{{$category->id}}">{{$category->name}}</option>

                            @empty
                            <option value="" selected>دسته بندی تعریف نشده است</option>
                            @endforelse
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <select name="lang" id="lang" class="form-control browser-default custom-select">
                            <option value="" selected>انتخاب زبان</option>
                            @forelse (\App\Models\Contents\Languages::latest()->get() as $laguage)
                            <option @if ($post->languages_id  == $laguage->id)
                                selected
                            @endif value="{{$laguage->id}}">{{$laguage->name}}</option>

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
                            <option @if ($post->subjects_id   == $subject->id)
                                selected
                            @endif value="{{$subject->id}}">{{$subject->name}}</option>

                            @empty
                            <option value="0" selected>موضوع تعریف نشده است</option>
                            @endforelse

                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <select name="level" id="level" class=" form-control browser-default custom-select">
                            <option value="" selected>سطح علمی</option>
                            @forelse (\App\Models\Contents\Levels::latest()->get() as $level)
                            <option @if ($post->levels_id    == $level->id)
                                selected
                            @endif value="{{$level->id}}">{{$level->name}}</option>

                            @empty
                            <option value="0" selected>سطح علمی تعریف نشده است</option>
                            @endforelse


                        </select>
                    </div>

                </div>
                <div class="row">
                    <div class="form-group col-md-6">
                    <input type="text" class="form-control" name="title" id="title" value="{{$post->title}}" placeholder="عنوان">
                    </div>
                    <div class="form-group col-md-6">
                        <input type="text" class="form-control" name="owner" placeholder="نام صاحب اثر">
                    </div>
                </div>

                <div class="row">
                    {{-- <div class="form-group col-md-6">
                        <div class="form-row">
                            <div class="col-md-3">
                                <label for="">تصویر فایل</label>
                            </div>
                            <div class="col-md-9">
                                <input type="file" class="form-control" name="pic">
                            </div>
                        </div>
                    </div> --}}
                    <div class="form-group col-md-6">
                        <input type="text" class="form-control" name="url" placeholder="آدرس یکتا">
                    </div>
                </div>
              
                <div class="row">
                    <div class="form-group col-md-12">
                        <label for="desc">توضیحات : </label>
                        <textarea class="form-control" name="desc" id="desc" cols="30" rows="8">{!!$post->desc!!}</textarea>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-12">
                        <label for="desc">متن فایل: (این متن میتواند ترجمه فایل باشد)</label>
                        <textarea class="form-control" name="desc2" id="desc2" cols="30" rows="8">{!!$post->desc2!!}</textarea>
                    </div>
                </div>
               @if ($post->categories->id == 6)
               <div class="row">
                 
                <div class="form-group col-md-2">
                    <label for="desc">قیمت:  </label>
                    <input type="number" class="form-control" value="{{$post->price}}" name="price" id="price" placeholder="">
                    <span class="rial">ریال</span>
                </div>
        
                
               
            </div>
               @endif

                <div class="form-footer">
                   
                    <div class="row">
                        <div class="col-md-3 my-2 btn--wrapper">
                            <input type="submit" name="upload" value="تایید محتوا" class="btn btn-sm btn-success" />
                        </div>
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
        <hr>
        <form action="{{route('UploadEpizode')}}" method="post">
            @csrf
            <div class="card epizode p-3" style="display:none;">
                <h3 class="mb-2">آپلود قسمت های دوره: </h3>
                <div class="row">
                    <div class="form-group col-md-6">
                        <input type="number" class="form-control" name="epizode_number" id="epizode_number"
                            placeholder="شماره قسمت">
                    </div>
                    <div class="form-group col-md-6">
                        <input type="text" class="form-control" name="epizode_title" id="epizode_title" placeholder="عنوان">
                    </div>
                    <div class="form-group col-md-12">
                        <label for="desc">تصویر: </label>
                        <input type="file" class="form-control" name="epizode_pic" id="epizode_pic" />
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-12">
                        <label for="desc">فایل: </label>
                        <input type="file" class="form-control" name="epizode_file" id="epizode_file" />
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
                        <input type="submit" name="upload" value="آپلود" class="btn btn-sm btn-success" />
                    </div>
                </div>
            </div>
        </form>
        
        <br />
        
    </div>
</div>

@endsection

@section('css')




@endsection

@section('js')

<link rel="stylesheet" href="https://cdn.plyr.io/3.5.10/plyr.css" />

<script src="https://cdn.plyr.io/3.5.10/plyr.js"></script>



<script src="{{asset('Panel/vendor/ckeditor/ckeditor.js')}}"></script>
<script>

    $(document).ready(function(){
        
    var controls =
[
    'play-large', // The large play button in the center
    
    'rewind', // Rewind by the seek time (default 10 seconds)
    'play', // Play/pause playback
    'fast-forward', // Fast forward by the seek time (default 10 seconds)
    'progress', // The progress bar and scrubber for playback and buffering
    'current-time', // The current time of playback
    'duration', // The full duration of the media
    'mute', // Toggle mute
    'volume', // Volume control
    'captions', // Toggle captions
    'settings', // Settings menu
    'pip', // Picture-in-picture (currently Safari only)
    'airplay', // Airplay (currently Safari only)
    'download', // Show a download button with a link to either the current source or a custom URL you specify in your options
    'fullscreen' // Toggle fullscreen
];
    const player = new Plyr('#player',{
        controls
    ,
    speed:{ selected: 1, options: [ 0.5, 0.75, 1, 1.25] }
    });


        CKEDITOR.replace('desc',{
            filebrowserUploadUrl : '{{route('UploadImage')}}',
            filebrowserImageUploadUrl : '{{route('UploadImage')}}'
        });
        CKEDITOR.replace('desc2');
        CKEDITOR.replace('epizode_desc');
        $(document).on('change','#type',function(){
            if($(this).val() == '6'){
                $('.btn--wrapper input').val('ارسال')
                $('.fileform').hide()
                $('.epizode').show()
            }else{
                $('.btn--wrapper input').val('آپلود')
                $('.fileform').show()
                $('.epizode').hide()
            }
        })
        $("#upload-file").validate({
		rules: {
            title:"required",
            type:"required",
            lang:"required",
            subject:"required",
            level:"required",
            desc:"required",
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
			},
	});
});
</script>
@endsection