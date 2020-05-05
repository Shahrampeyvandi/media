@extends('layout.Panel.temp')

@section('content')
<div class="col-sm-12 col-sm-offset-3 col-md-12  ">
    <div class="wpb_wrapper py-3">
        <h2 class="  mt-15 mb-15 title__divider title__divider--line" style="margin-right: 0px;"><span
                class="title__divider__wrapper">تنظیمات<span class="line brk-base-bg-gradient-right"></span>
         
        </h2>
    </div>
    <div class="row mb-3">
        <div class="col-md-6">
        <form id="setting" action="{{route('Panel.commission')}}" method="post">
                @csrf
                <div class="form-group ">
                    <label for="">میزان پورسانت : </label>
                    <input type="number" name="commission" class="form-control"id="" value="{{$setting->commission}}">
            
                  
                </div>
                </div>



                <div class="col-md-6">
                <div class="form-group ">
                    <label for="">نمایش در صفحه اصلی : </label>
            <select class="form-control" name="mainpage[]" id="" multiple>
            <option value="1"
            @if($setting->mainpage_films==1)
            selected="selected"
            @endif
            >لیست فیلم ها</option>
            <option value="2"
            @if($setting->mainpage_animations==1)
            selected="selected"
            @endif
            >لیست انیمیشن ها</option>
            <option value="3"
            @if($setting->mainpage_plus==1)
            selected="selected"
            @endif
            >لیست ژن پلاس ها</option>
            <option value="4"
            @if($setting->mainpage_musics==1)
            selected="selected"
            @endif
            >لیست موسیقی ها</option>
            <option value="5"
            @if($setting->mainpage_podcasts==1)
            selected="selected"
            @endif
            >لیست پادکست ها</option>
            <option value="6"
            @if($setting->mainpage_taturials==1)
            selected="selected"
            @endif
            >لیست دوره های آموزشی </option>

            </select>

                    </div>

                </div>
                </div>

                <div class="row mb-3">
                <div class="form-group">
                    <button class="mx-0 btn btn-sm btn-info">تایید</button>
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