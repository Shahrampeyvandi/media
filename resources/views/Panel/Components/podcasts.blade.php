<div class="row">
    @foreach($podcasts as $podcast)
    <div style="width:230px;" class="m-3">
        <div class="card radius shadowDepth1">
            <div class="card__image border-tlr-radius">
                 @if ($podcast->picture)
                <img src="{{asset("$podcast->picture")}}" alt="image" class="border-tlr-radius">
                  @else 
    
                  <img src="{{asset('assets/images/record.png')}}" alt="image" class="border-tlr-radius">
                @endif
            </div>
            <div class="card__content px-3 pb-2">
                <div class="card__share">
                    <a href="{{route('ShowItem',['id'=>$podcast->id])}}" id="" class=" share-icon"
                       ><i class="fa fa-caret-square-left"></i></a>
                </div>
                <article class="card__article mt-2 pt-3">
                    <h2><a href="{{route('ShowItem',['id'=>$podcast->id])}}" class="fs-0-8">{{$podcast->title}}</a></h2>
                    <p>{{$podcast->desc}}</p>
                </article>
            </div>
            <div class="pr-3">
                <div class="card__author">
                    <a href="#" class="fs-0-8"> زبان: {{$podcast->languages->name}}</a>
                    <p class="">سطح:  {{$podcast->levels->name}}</p>
                </div>
            </div>
            <div class="card__meta d-flex justify-content-between px-3 pt-1">
                <span class="text-black-50 fs-0-8">{{$podcast->languages->name}}</span>
                <span class="text-black-50 fs-0-8">{{\Morilog\Jalali\Jalalian::forge($podcast->created_at)->format('%d %B %Y')}}</span>
            </div>
        </div>
    </div>
    @endforeach
</div>

<div class="row">
    <div class="col-md-12">
      <a href="{{route('UploadFile')}}?c=podcasts" class=" btn btn-sm btn-outline-info btn-rounded"><i class="fa fa-plus"></i> &nbsp; آپلود  </a>
    </div>
 </div>