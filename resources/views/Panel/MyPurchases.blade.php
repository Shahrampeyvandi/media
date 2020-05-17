@extends('layout.Panel.temp')

@section('content')
<div class="col-sm-9 col-sm-offset-3 col-md-12  ">
    <div class="wpb_wrapper py-3">
        <h2 class="  mt-15 mb-15 title__divider title__divider--line"
            style="margin-right: 0px;"><span class="title__divider__wrapper">  دوره های خریداری شده ی من<span
                    class="line brk-base-bg-gradient-right"></span>
            </span></h2>
     
    </div>
    <div style="overflow-x: auto;">
        <table id="example1" class="table table-striped  table-bordered w-100">
            <thead>
            <tr>
                <th>ردیف</th>
                <th >دوره</th>
                <th >هزینه پرداخت شده</th>
                <th >اطلاعات پرداخت</th>
                <th >وضعیت تراکنش</th>
                <th >تاریخ خرید </th>

            </tr>
            </thead>

            <tbody>
            @foreach($purchases as $key=>$purchase)
            <tr>
            <td>{{$key+1}}</td>

            <td><a href="{{route('ShowItem',['id'=>$purchase->posts->id])}}">
            {{$purchase->posts->title}}
            </a></td>
            <td>{{$purchase->payedprice}}</td>
            <td>{!!$purchase->payinfo!!}</td>
            <td>
            @if($purchase->success ==1)
            <span class="text-success">موفق</span>

            @else
            <span class="text-danger">نا موفق</span>

            @endif
            </td>


            <td>{{\Morilog\Jalali\Jalalian::forge($purchase->created_at)->format('%d %B %Y')}}</td>

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


@endsection