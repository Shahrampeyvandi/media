@extends('layout.Panel.temp')

@section('content')

<div class="col-md-6 offset-md-3 mb-3">
    <form id="edit" action="{{route('Request.VerifyMobile')}}" method="post" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="id" value="{{$member->id}}">
        <div class="card p-3">
            <div class="row">
                <div class="col-md-12 text-center mb-5">
                    <h3><<  تایید شماره تلفن >></h3>
                    <hr>
                </div>
                <div class="col-md-12 text-center mb-2">
                    @include('Includes.errors')
                </div>
            </div>
            @if($member->channelInformations && $member->channelInformations->accepted==1)

            درخواست شما در دست بررسی می باشد
            @elseif($member->channelInformations && $member->channelInformations->accepted==2)

            در خواست شما تایید شد

            @elseif($member->channelInformations && $member->channelInformations->accepted==3)

            در خواست شما رد شد

            @else
            <div class="row justify-content-center">
                <div class="form-group  col-md-6">
                   
                <input type="number" class="form-control" name="mobile" id="mobile" value="{{$member->mobile}}" 
                placeholder="شماره تماس" >
                </div>
           
               
            </div>
            
            <div class="row justify-content-center">
                <div class="form-group col-md-12 text-center">
                    <input type="submit" class="btn btn-sm btn-primary " value="تایید">
                </div>
            </div>

         
        </div>
    </form>
    @endif
</div>
@endsection
@section('js')
<script type="text/javascript">
    $(document).ready(function(){
  
        $('#role').on('change',function(){
    if ($(this).val() == "official"){
        $('.permission_work_section').fadeIn();
      }else{
        $('.permission_work_section').fadeOut();

      }
   });
  
   $.validator.addMethod(
    "regex",
    function(value, element, regexp) {
        return this.optional(element) || regexp.test(value);
    },
    "Please check your input."
);
  
    $("#edit").validate({
		rules: {
         
          mobile:{
              required:true,
              regex:/^09[0-9]{9}$/

          }
		},
		messages: {
		
		mobile:{
              required:"َشماره تماس خود را وارد نمایید",
              regex:"شماره موبایل دارای فرمت نامعتبر می باشد"
              
          }
		}
	});
  })
</script>

@endsection