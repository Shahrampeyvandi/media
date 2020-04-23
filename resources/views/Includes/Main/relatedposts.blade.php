<div class="col-md-3">
    <aside id="secondary" class="secondary">
        <section id="recom" class="single-recom">
            <header class="recom-header">
                <h3 class="title mr-3 mr-md-0">پست های مرتبط</h3>
            </header>
            <div class="recommended-list">
                <div class="inner">
                    @foreach($relateds as $related)
                    <div id="thumb" class="d-flex flex-md-wrap m-3 mx-md-0">
                        <div class="w-40">
                            @if ($related->picture)
                            <a href="{{route('ShowItem',['id'=>$related->id])}}"> <img
                                    src="{{route('BaseUrl')}}/{{$related->picture}}"
                                    alt="{{$related->title}}" aria-label="{{$related->title}}"
                                    class="thumb-image" style="min-height: 130px;"></a>
                            @else
                            <a href="{{route('ShowItem',['id'=>$related->id])}}">
                                <div class="d-flex justify-content-center align-items-center h-100 p-3"
                                    style="    border: 1px solid gray;
                                border-radius: 4px;">
                                    {{-- <img src="{{asset('assets/images/cinema.png')}}"
                                    alt="{{$movie->title}}"
                                    aria-label="{{$movie->title}}" class="thumb-image"> --}}
                                    <i class="ti ti-video-camera text-black-50"
                                        style="font-size: 4rem;"></i>
                                </div>
                            </a>
                            @endif
                        </div>
                        <div class="thumb-details pr-2 pt-2 mb-3">
                            <h4 class="thumb-title">
                                <a href="{{route('ShowItem',['id'=>$related->id])}}"
                                    title="{{$related->title}}"
                                    class="title"><span>{{$related->title}}</span></a>
                            </h4>
                            <a href="{{route('Category',['slug'=>$related->categories->latin_name])}}"
                                title="{{$related->categories->name}}"
                                class="thumb-channel has-priority"><span
                                    class="channel-name">{{$related->categories->name}}</span>
                                <span class="priority-brand" title="رسمی">
                                    <svg class="icon icon-tick icon-priority" viewBox="0 0 24 24" 0="" 24=""
                                        24""="">
                                        <use xlink:href="#si_tick">
                                            <g id="si_tick" data-viewBox="0 0 24 24">
                                                <path d="M0 0h24v24H0z" fill="none"></path>
                                                <path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41z">
                                                </path>
                                            </g>
                                        </use>
                                    </svg> </span></a>
                            <ul class="meta-tags d-b w-100 mt-xs">
                                <li class="meta d-in light-60 dark-110 fs-0-8">زبان:
                                    {{$related->languages->name}}
                                </li>
                            </ul>
                            <ul class="meta-tags d-b w-100">
                                <li class="meta d-in light-60 dark-110 fs-0-8">موضوع:
                                    {{$related->subjects->name}}
                                </li>
                            </ul>
                            <ul class="meta-tags d-b w-100">
                                <li class="meta d-in light-60 dark-110 fs-0-8">سطح:
                                    {{$related->levels->name}}
                                </li>
                            </ul>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>
    </aside>
</div>