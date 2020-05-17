@extends('layout.Panel.temp')

@section('content')
<div class="col-sm-12 col-sm-offset-3 col-md-12  ">
    <div class="wpb_wrapper py-3">
        <h2 class="  mt-15 mb-15 title__divider title__divider--line" style="margin-right: 0px;"><span
                class="title__divider__wrapper">تسویه حساب<span class="line brk-base-bg-gradient-right"></span>
         
        </h2>
    </div>
    <div class="row mb-3">
        <div class="col-md-12">
        <form id="setting" action="{{route('Panel.Checkout.Create')}}" method="post">
                @csrf
               <div class="row">
                <div class="form-group col-md-12">
                    <label for="" class="">انتخاب اساتید برای تسویه</label>
<br>
بعد از انتخاب اساتید و کلیک بر روی دکمه ی تایید فایلی با فرمت تکست با خروجی مبلغ و شماره شبای اساتید برای شما تولید می شود و موجودی کیف پول استید صفر خواهد شد. از فایل تولید شده برای تسویه با اساتید از طریق سیستم بام بانک ملی بخش انتقال گروهی پول اقدام فرمایید
                    <select name="checkout[]" class="form-control mt-1" id="" multiple>
                    
                    @foreach($members as $member)

                    @if($member->wallet>0)



                    <option value="{{$member->id}}">{{$member->firstname}} {{$member->lastname}} - موجودی کیف پول: {{$member->wallet}} تومان</option>

@endif


                    @endforeach
                    
                    </select>
            
                  
                </div>
               </div>
               

               <div class="row mb-3">
                    <div class="form-group col-md-12">
                        <button class="mx-0 btn btn-sm btn-primary">تایید</button>
                </div>
                </div>


            

            </form>

           
           
        </div>

    </div>

</div>
@endsection
@section('css')

@endsection

@section('js')

@endsection