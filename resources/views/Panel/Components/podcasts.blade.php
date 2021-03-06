<div class="row">
    @foreach($podcasts as $podcast)
    <div style="width:230px;" class="m-3">
        <div class="card radius shadowDepth1">
            <div class="card__image border-tlr-radius">
                 <a href="{{route('ShowItem',['content'=>$podcast->categories->name,'slug'=>$podcast->slug])}}">
                @if ($podcast->picture)
                <img src="{{asset("$podcast->picture")}}" alt="image" class="border-tlr-radius">
                @else
    
                <img src="{{asset('assets/images/logo-music1.png')}}" alt="image" class="border-tlr-radius">
                @endif
                 </a>
            </div>
            <div class="card__content px-3 pb-2">
                <div class="card__share">
                    <a href="{{route('ShowItem',['content'=>$podcast->categories->name,'slug'=>$podcast->slug])}}" id="" class=" share-icon"><i
                            class="fa fa-play-circle"></i></a>
                </div>
                <article class="card__article mt-2 pt-3">
                    <h2><a href="{{route('ShowItem',['content'=>$podcast->categories->name,'slug'=>$podcast->slug])}}"
                            class="fs-0-8">{{Illuminate\Support\Str::limit($podcast->title,22)}}</a></h2>
                    
                </article>
            </div>
            <div class="pr-3">
                <div class="card__author">
                    <a class="fs-0-8"> زبان: {{$podcast->languages->name}}</a>
                    <p class="item-level position-relative">سطح: 
                        @if ($podcast->levels->name == 'مقدماتی')
                        <img src="{{asset('assets/images/audio-level-1.png')}}" alt="">
                        <img src="{{asset('assets/images/audio-level-0.png')}}" alt="">
                        <img src="{{asset('assets/images/audio-level-0.png')}}" alt="">
                        @elseif($podcast->levels->name == 'متوسط')
    
                        <img src="{{asset('assets/images/audio-level-1.png')}}" alt="">
                        <img src="{{asset('assets/images/audio-level-1.png')}}" alt="">
                        <img src="{{asset('assets/images/audio-level-0.png')}}" alt="">
                        @else
                        <img src="{{asset('assets/images/audio-level-1.png')}}" alt="">
                        <img src="{{asset('assets/images/audio-level-1.png')}}" alt="">
                        <img src="{{asset('assets/images/audio-level-1.png')}}" alt="">
                        @endif    
                    </p>
                    <p  class="item-level position-relative">
                        بازدید: {{$podcast->views}}
                    </p>
                </div>
            </div>
            <div class="card__meta d-flex justify-content-between px-3 pt-1">
            <span class="text-black-50 fs-0-8">
                <i class="fas fa-clock pl-1"></i>
                @if (substr($podcast->duration,0,1) == '0' && substr($podcast->duration,1,1)
                == '0')
                {{substr($podcast->duration,3)}}
                @else
                {{$podcast->duration}}
                @endif

               
            </span>
                <span
                    class="text-black-50 fs-0-8">{{\Morilog\Jalali\Jalalian::forge($podcast->created_at)->format('%d %B %Y')}}</span>
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