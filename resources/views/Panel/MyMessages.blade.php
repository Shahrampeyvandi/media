@extends('layout.Panel.temp')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card p-3">
            <form id="upload-file" method="post" action="{{ route('Message.Send') }}"
                enctype="multipart/form-data">
                @csrf
        <input type="hidden" name="id" value="{{$member->id}}">
               
                <div class="row">
                    <div class="form-group col-md-12">
                        <h3 class=" mb-2">متن پیام خود را وارد نمایید </h3>
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
            <h3 class="mb-2">پیام ها: </h3>
            @foreach (\App\Models\Members\Messages::where('recived_id',$member->id)->orWhere('members_id',$member->id)->latest()->get() as $item)
           
           @if ($item->members_id == null)
           <div class="d-flex my-3 ">
              
            <span class="member_box  radius-10" style="padding: 5px 20px;
            background: #f3fdfa;border: 1px solid #e2e2e2;width:100%;
                  ">
                   <div class="d-flex justify-content-between mb-3" style="border-bottom: 1px solid #d2dae2;">
                    <span><span><i class="fas fa-user"></i>
                            مدیریت </span>
                       
                    </span>
                    <span
                    class="fs-0-8">{{\Morilog\Jalali\Jalalian::forge($item->created_at)->format('%d %B %Y')}}</span>
                   
        
                </div>
           
              {!! $item->message !!}
           

        </span>
        </div>
           @endif
           @if ($item->recived_id == null)
            <div class="d-flex my-3 ">
               
                <span class="member_box  radius-10 position-relative" style="padding: 5px 20px;
                background: #f9f9f9;
                border: 1px solid #e2e2e2;width:100%;
            ">
             <div class="d-flex justify-content-between mb-3" style="border-bottom: 1px solid #d2dae2;">
                <span><span><i class="fas fa-user"></i>
                        شما </span> <br>
                    <span
                        class="fs-0-8">{{\Morilog\Jalali\Jalalian::forge($item->created_at)->format('%d %B %Y')}}</span>
                </span>
                <a title="حذف پیام" href="{{route('Message.Delete',$item->id)}}"
                    style="position: absolute;left: 4px;color: red;"><i class="fas fa-times"></i></a>
    
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




{{-- @extends('layout.Panel.temp')

@section('content')
<div class="col-sm-9 col-sm-offset-3 col-md-12  ">
    <div class="wpb_wrapper py-3">
        <h2 class="  mt-15 mb-15 title__divider title__divider--line"
            style="margin-right: 0px;"><span class="title__divider__wrapper"> پیام های من<span
                    class="line brk-base-bg-gradient-right"></span>
            </span></h2>
     
    </div>
    <div style="overflow-x: auto;">
        <table id="example1" class="table table-striped  table-bordered w-100">
            <thead>
            <tr>
                <th>ردیف</th>
                <th style="">پیام شما</th>
                <th >پاسخ مدیریت</th>
                <th >تاریخ ثبت</th>
                <th>عملیات</th>
            </tr>
            </thead>

            <tbody>
            @foreach($messages as $key=>$message)
            <tr>
            <td>{{$key+1}}</td>
            <td>{!!$message->message!!}</td>
            <td>@if ($message->response == null)
                <span class="text-primary">در انتظار</span>
                @else
               <span class="text-success"> {!!$message->response!!}</span>
            @endif</td>
            <td>{{\Morilog\Jalali\Jalalian::forge($message->created_at)->format('%d %B %Y')}}</td>
                <td>
                <!-- <a href="route('MyMessage.Delete',$message->id)" class="btn btn-danger btn-sm">حذف</a> -->
                </td>
           </tr>
            @endforeach
         

          
          
            </tbody>
        </table>
    </div>
    <div style="text-align: center">
        
    </div>
</div>
@endsection
@section('css')
   
@endsection

@section('js')


@endsection --}}