<div class="item w-100 ml-5 mr-2  my-5 card" style="max-width: 233px;{{isset($style) ? $style:''}}">
    <div class="position-relative">
        <div class="item-overlay opacity r r-2x bg-black">
            <a class="item-overlay"
                href="{{route('ShowItem',['content'=>$music->categories->name,'slug'=>$music->slug])}}">

                <div class="text-info padder m-t-sm text-sm"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i
                        class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> </div>
                <div class="center text-center m-t-n"> <i class="ti ti-control-play fs-2"></i>
                </div>
                <div class="bottom padder m-b-sm">

                    <a href="{{route('ShowItem',['content'=>$music->categories->name,'slug'=>$music->slug])}}"
                        class="ml-2"> <span class="text-info">
                            {{count($music->comments)}}</span><svg class="icon v-m  icon-comments" viewBox="0 0 24 24"
                            0="" 24="" 24""="">
                            <use xlink:href="#si_comments">
                                <g id="si_comments" data-viewBox="0 0 24 24">
                                    <path d="M0 0h24v24H0z" fill="none"></path>
                                    <path
                                        d="M4 4h16v12H5.17L4 17.17V4m0-2a2 2 0 0 0-1.99 2L2 22l4-4h14a2.006 2.006 0 0 0 2-2V4a2.006 2.006 0 0 0-2-2z">
                                    </path>
                                    <path d="M6 12h8v2H6zM6 9h12v2H6zM6 6h12v2H6z"></path>
                                </g>
                            </use>
                        </svg>
                    </a>
                    <a href="{{route('ShowItem',['content'=>$music->categories->name,'slug'=>$music->slug])}}">
                        <span
                            class="text-success">{{\App\Models\Contents\Likes::where('posts_id',$music->slug)->count()}}</span>
                        <svg class="icon icon-like d-in v-m g-20 fs-1-2 ml-xxs" viewBox="0 0 24 24" 0="" 24="" 24""="">
                            <use xlink:href="#si_thumb-up">
                                <g id="si_thumb-up" data-viewbox="0 0 24 24">
                                    <path d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M0 0h24v24H0z" fill="none"></path>
                                    <path
                                        d="M9 21h9a1.987 1.987 0 0 0 1.84-1.22l3.02-7.05A1.976 1.976 0 0 0 23 12v-2a2.006 2.006 0 0 0-2-2h-6.31l.95-4.57.03-.32a1.505 1.505 0 0 0-.44-1.06L14.17 1 7.58 7.59A1.987 1.987 0 0 0 7 9v10a2.006 2.006 0 0 0 2 2zM9 9l4.34-4.34L12 10h9v2l-3 7H9z">
                                    </path>
                                    <path transform="translate(1 9)" d="M0 0h4v12H0z">
                                    </path>
                                </g>
                            </use>
                        </svg>

                    </a>
                    <span class="badge-rate badge-rate float-left text-white-80"><span>
                            @if (substr($music->duration,0,1) == '0' &&
                            substr($music->duration,1,1)
                            == '0')
                            {{substr($music->duration,3)}}
                            @else
                            {{$music->duration}}
                            @endif
                        </span>
                        <i class="fa fa-clock-o pl-1"></i>
                    </span>
                </div>
            </a>
        </div>
        <div class="top"> <span class="pull-right m-t-n-xs m-r-sm text-white"> <i class="fa fa-bookmark i-lg"></i>
            </span> </div> <a href="{{route('ShowItem',['content'=>$music->categories->name,'slug'=>$music->slug])}}"
            class="music-img">
            @if($music->picture)
            <img src="{{asset($music->picture)}}" width="100%;" style="height: 131px;" alt="{{$music->title}}"
                class="r r-2x img-full">
            @else
            <img src="{{asset('assets/images/logo-music1.png')}}" width="100%;" style="height: 131px;"
                alt="{{$music->title}}" class="r r-2x img-full">
            @endif
        </a>
    </div>
    <div class="padder-v px-2"> <a
            href="{{route('ShowItem',['content'=>$music->categories->name,'slug'=>$music->slug])}}"
            class="text-ellipsis ">
            <span
                class="d-block {{preg_match('/^[^\x{600}-\x{6FF}]+$/u', $music->title) ? 'text-left dir-ltr' : '' }} ">
                {{Illuminate\Support\Str::limit($music->title,22)}}</span>
            <p href="#" class="text-ellipsis text-black-50">موضوع: {{$music->subjects->name}}
            </p>
            <p href="#" class="item-level position-relative text-ellipsis text-black-50">سطح:
                @if ($music->levels->name == 'مقدماتی')
                <img src="{{asset('assets/images/audio-level-1.png')}}" alt="">
                <img src="{{asset('assets/images/audio-level-0.png')}}" alt="">
                <img src="{{asset('assets/images/audio-level-0.png')}}" alt="">
                @elseif($music->levels->name == 'متوسط')

                <img src="{{asset('assets/images/audio-level-1.png')}}" alt="">
                <img src="{{asset('assets/images/audio-level-1.png')}}" alt="">
                <img src="{{asset('assets/images/audio-level-0.png')}}" alt="">
                @else
                <img src="{{asset('assets/images/audio-level-1.png')}}" alt="">
                <img src="{{asset('assets/images/audio-level-1.png')}}" alt="">
                <img src="{{asset('assets/images/audio-level-1.png')}}" alt="">
                @endif
            </p>

            <a href="{{route('ShowItem',['content'=>$music->categories->name,'slug'=>$music->slug])}}"
                class="text-ellipsis text-xs text-muted">
                @if ($music->languages)
                {{$music->language}}
                @endif
                <div class="d-flex justify-content-between mt-3">
                    <span class="fs-0-8 text-black-50">
                        {{$music->languages->name}}
                    </span>
                    <span class="fs-0-8 text-black-50">
                        {{\Morilog\Jalali\Jalalian::forge($music->created_at)->format('%d %B %Y')}}
                    </span>

                </div>
            </a>
        </a>
    </div>
</div>