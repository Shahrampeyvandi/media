<div style="width:230px;" class="m-3">
    <div class="card radius shadowDepth1">
        <div class="card__image border-tlr-radius">
            <a href="{{route('ShowItem',['content'=>$podcast->categories->name,'slug'=>$podcast->slug])}}">
                @if ($podcast->picture)
                <img src="{{asset("$podcast->picture")}}" alt="{{$podcast->title}}" class="border-tlr-radius">
                @else

                <img src="{{asset('assets/images/logo-music1.png')}}" alt="{{$podcast->title}}"
                    class="border-tlr-radius">
                @endif
            </a>
        </div>

        <div class="card__content px-3 pb-2">
            <div class="card__share">
                <a href="{{route('ShowItem',['content'=>$podcast->categories->name,'slug'=>$podcast->slug])}}" id=""
                    class=" share-icon"><i class="fa fa-play-circle"></i></a>
            </div>
            <article class="card__article mt-2 pt-3">
                <h2><a href="{{route('ShowItem',['content'=>$podcast->categories->name,'slug'=>$podcast->slug])}}"
                        class="fs-0-8 {{preg_match('/^[^\x{600}-\x{6FF}]+$/u', $podcast->title) ? 'text-left dir-ltr' : '' }}">{{Illuminate\Support\Str::limit($podcast->title,22)}}</a>
                </h2>

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
                <p class="item-level position-relative">
                    بازدید: {{$podcast->views}}
                </p>
            </div>
        </div>
        <div class="card__meta d-flex justify-content-between px-3 pt-1">
            <span class="text-black-50 fs-0-8">
                <i class="fa fa-clock-o pl-1"></i>
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