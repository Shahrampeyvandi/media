@foreach($videos as $movie)


<div class="thumbnail-movie thumbnail-serial mb-5 mx-3 card" style="max-width: 220px;">
    <div class="thumb-wrapper">
        <a class="thumb" href="{{route('ShowItem',['id'=>$movie->id])}}">
            <div class="abs-fit">
               @if ($movie->picture)
               <img src="{{asset("$movie->picture")}}" alt="{{$movie->title}}"
               aria-label="{{$movie->title}}" class="thumb-image">
               @else 
              <div class="d-flex justify-content-center align-items-center h-100">
                {{-- <img src="{{asset('assets/images/cinema.png')}}" alt="{{$movie->title}}"
                aria-label="{{$movie->title}}" class="thumb-image"> --}}
            <i class="ti ti-video-camera text-black-50" style="font-size: 5rem;"></i>  
            </div>
               @endif 
               
            </div>
            <div class="tools">
                <span class="badge-rate">
                    <span>{{count($movie->likes)}}</span>
                    <svg class="icon icon-thumb-up d-in v-m g-20 fs-1-2 ml-xxs"
                        viewBox="0 0 24 24" viewBox="viewBox=" 0 0 24 24"">
                        <use xlink:href="#si_thumb-up">
                            <g id="si_thumb-up" data-viewBox="0 0 24 24">
                                <path d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M0 0h24v24H0z" fill="none"></path>
                                <path
                                    d="M9 21h9a1.987 1.987 0 0 0 1.84-1.22l3.02-7.05A1.976 1.976 0 0 0 23 12v-2a2.006 2.006 0 0 0-2-2h-6.31l.95-4.57.03-.32a1.505 1.505 0 0 0-.44-1.06L14.17 1 7.58 7.59A1.987 1.987 0 0 0 7 9v10a2.006 2.006 0 0 0 2 2zM9 9l4.34-4.34L12 10h9v2l-3 7H9z">
                                </path>
                                <path transform="translate(1 9)" d="M0 0h4v12H0z"></path>
                            </g>
                        </use>
                    </svg> </span>
                <span class="badge-rate">
                    <span>
                        @if (substr($movie->duration,0,1) == '0' && substr($movie->duration,1,1) == '0')
                        {{substr($movie->duration,3)}}
                        @else
                        {{$movie->duration}}
                        @endif
                        
                    </span>
                    <i class="fa fa-clock-o pl-1"></i>
                </span>
            </div>
        </a>
    </div>
    <div class="position-relative px-2 pt-3">

        <a href="{{route('ShowItem',['id'=>$movie->id])}}" title="{{$movie->title}}"
            class="title title d-block mb-2"><span>{{$movie->title}}</span></a>
            <p class=""><span class="text-black-50">موضوع: </span><span class="fw-500">
                @if ($movie->subjects)
                
                {{$movie->subjects->name}}
                @endif
            </span></p>
            <p class=""><span class="text-black-50">زبان: </span><span class="fw-500 fs-0-8">
                @if ($movie->languages)
                {{$movie->languages->name}}
                @endif
            </span></p>
            <p class=""><span class="fs-0-9">سطح: {{$movie->levels->name}}</span></p>

        <ul class="meta-tags d-b w-100 mt-xs  pb-2">
            <li class="meta d-in light-60 dark-110">{{\Morilog\Jalali\Jalalian::forge($movie->created_at)->format('%d %B %Y')}}</li>
       
        </ul>

    </div>
</div>


@endforeach