@extends('layout.Panel.temp')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card p-3">
            <form id="upload-file" method="post" action="{{ route('Members.SubmitMessage') }}"
                enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" value="{{$member->id}}">

                <div class="row">
                    <div class="form-group col-md-12">
                        <h3 class=" mb-2">ارسال پیام برای  {{$member->firstname .' '.$member->lastname}} </h3>
                        <textarea class="form-control" name="message" id="message" cols="30" rows="20"></textarea>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-3 my-2 btn--wrapper">
                        <input type="submit" name="upload" value="ارسال" class="btn btn-sm btn-success" />
                    </div>
                </div>
            </form>
        </div>
        <br />
    </div>
</div>
<div class="row ">
    <div class="col-md-12">
        <div class="card p-3">
            <h3 class="mb-2">پیام های شما با {{$member->firstname .' '.$member->lastname}}</h3>
            @foreach(\App\Models\Members\Messages::where('recived_id',$member->id)->orWhere('members_id',$member->id)->latest()->get()
            as $item)

            @if ($item->recived_id == null)
            <div class="d-flex my-3">

                <span class="member_box  radius-10" style="padding: 5px 20px;
            background: #f3fdfa;border: 1px solid #e2e2e2;width:100%;
        ">
        <div class="d-flex justify-content-between mb-3" style="border-bottom: 1px solid #d2dae2;">
            <span><a href="#"><span><i class="fas fa-user"></i>
                {{$member->firstname .' '.$member->lastname}}</span></a> <br>
               
            </span>
            <div>
                <span
                class="fs-0-8">{{\Morilog\Jalali\Jalalian::forge($item->created_at)->format('%d %B %Y')}}</span>
               
               </div>
          

        </div>


                    {!! $item->message !!}


                </span>
            </div>
            @endif
            @if ($item->members_id == null)
            <div class="d-flex my-3 ">

                <span class="member_box  radius-10 position-relative" style="padding: 5px 20px;
                background: #f9f9f9;
                border: 1px solid #e2e2e2;
                width:100%;">
                    <div class="d-flex justify-content-between mb-3" style="border-bottom: 1px solid #d2dae2;">
                        <span><span><i class="fas fa-user"></i>
                                شما</span> <br>
                           
                        </span>
                       <div>
                        <span
                        class="fs-0-8">{{\Morilog\Jalali\Jalalian::forge($item->created_at)->format('%d %B %Y')}}</span>
                        <a title="حذف پیام" href="{{route('Admin.Message.Delete',$item->id)}}"
                            style="position: absolute;left: 4px;color: red;"><i class="fas fa-times"></i></a>
                       </div>

                    </div>
                    {!! $item->message !!}

                </span>
            </div>
            @endif
            @endforeach

        </div>
    </div>
</div>

</div>

@endsection

@section('js')

<script src="{{asset('Panel/vendor/ckeditor/ckeditor.js')}}"></script>
<script>
    $(document).ready(function(){
        CKEDITOR.replace('message',{
            extraPlugins: 'uploadimage',
            filebrowserUploadUrl: '{{route('UploadImage')}}?type=file',
            imageUploadUrl: '{{route('UploadImage')}}?type=image'
        });
});
</script>
@endsection