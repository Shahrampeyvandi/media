<div class="head w-100 put-right  border-b-1 light-bc-30 dark-bc-100">
    <div class="genre mb-md">
        @foreach($content->tags as $tag)
        <a href="#" class="actor d-in v-m fs-0-9 c-blue ml-xs"><span
                class="text">#{{$tag->name}}</span></a>
        @endforeach
    </div>
    <div class="d-flex justify-content-between  flex-column flex-md-rw col-12 mb-2">
        <h1 class="title fs-1-2 fw-300"> {{$content->title}}</h1>
        <div class="d-flex align-items-center my-3">
            <a id="shareinmedia" href="#"
                class="button button-medium button-gray button-hollow "><svg class="icon icon-share"
                    viewBox="0 0 24 24" 0="" 24="" 24""="">
                    <use xlink:href="#si_share">
                        <g id="si_share" data-viewBox="0 0 24 24">
                            <path d="M0 0h24v24H0z" fill="none"></path>
                            <path
                                d="M18 16.08a2.912 2.912 0 0 0-1.96.77L8.91 12.7A3.274 3.274 0 0 0 9 12a3.274 3.274 0 0 0-.09-.7l7.05-4.11A2.993 2.993 0 1 0 15 5a3.274 3.274 0 0 0 .09.7L8.04 9.81a3 3 0 1 0 0 4.38l7.12 4.16a2.821 2.821 0 0 0-.08.65A2.92 2.92 0 1 0 18 16.08zM18 4a1 1 0 0 1 1 1l.063-1-1.83-.656C16.683 3.344 17 5.55 17 5a1 1 0 0 1 1-1zM6 13c-.55 0 .672.847.672.3S5.45 13.219 6 13.219s0-.019 0 .531.55-.75 0-.75zm12 7.02c-.55 0-.234 1.046-.234.5s-.237-.172.313-.172.172-.55.172 0 .299-.328-.251-.328z">
                            </path>
                        </g>
                    </use>
                </svg></a>
            <a href="#" id="like-post" data-id="{{$content->id}}"> <span class="text-success">
                    {{$likes}}
                </span>
                <svg class="icon icon-thumb-up d-in v-m c-theme fs-1-2 ml-xxs" viewBox="0 0 24 24"
                    0="" 24="" 24""="">
                    <use xlink:href="#si_thumb-up">
                        <g id="si_thumb-up" data-viewbox="0 0 24 24">
                            <path d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M0 0h24v24H0z" fill="none"></path>
                            <path
                                d="M9 21h9a1.987 1.987 0 0 0 1.84-1.22l3.02-7.05A1.976 1.976 0 0 0 23 12v-2a2.006 2.006 0 0 0-2-2h-6.31l.95-4.57.03-.32a1.505 1.505 0 0 0-.44-1.06L14.17 1 7.58 7.59A1.987 1.987 0 0 0 7 9v10a2.006 2.006 0 0 0 2 2zM9 9l4.34-4.34L12 10h9v2l-3 7H9z">
                            </path>
                            <path transform="translate(1 9)" d="M0 0h4v12H0z"></path>
                        </g>
                    </use>
                </svg> </a>
            <a href="#" data-id="{{$content->id}}" class="favorite-post pt-2 mx-2">
                <svg class="icon icon-favorite" @if ($favorite_status) fill="red" @else fill="gray"
                    @endif viewBox="0 0 24 24" 0="" 24="" 24""="">
                    <use xlink:href="#si_favorite">
                        <g id="si_favorite" data-viewBox="0 0 24 24">
                            <path d="M0 0h24v24H0z" fill="none"></path>
                            <path
                                d="M16.5 3A5.988 5.988 0 0 0 12 5.09 5.988 5.988 0 0 0 7.5 3 5.447 5.447 0 0 0 2 8.5c0 3.78 3.4 6.86 8.55 11.54L12 21.35l1.45-1.32C18.6 15.36 22 12.28 22 8.5A5.447 5.447 0 0 0 16.5 3zm-4.4 15.55l-.1.1-.1-.1C7.14 14.24 4 11.39 4 8.5A3.418 3.418 0 0 1 7.5 5a3.909 3.909 0 0 1 3.57 2.36h1.87A3.885 3.885 0 0 1 16.5 5 3.418 3.418 0 0 1 20 8.5c0 2.89-3.14 5.74-7.9 10.05z">
                            </path>
                        </g>
                    </use>
                </svg>

            </a>
            @if (auth()->check())
            <a class="report-btn  p-1 text-danger mr-2 fs-0-8 radius-5 border-1 bc-red">

                گزارش تخلف
            </a>
            @endif

            @if (auth()->check())
            <a data-id="0" class="button__  p-1 text-primary mr-2 fs-0-8 radius-5 border-1 bc-blue">

                 دیدگاه
            </a>

            <a class="downloadfile p-1 text-success mr-2 fs-0-8 radius-5 border-1 bc-theme" 
                                @if (Illuminate\Support\Facades\Route::currentRouteName()=='ShowItem.Episode' )
                            
                                href="{{route('Download')}}?type=2&id={{$episode_id}}"
                                
                                @else
                                
                                href="{{route('Download')}}?type=1&id={{$id}}"
                                
                                @endif
                                >

                                    دانلود
                                </a>

            @endif

        </div>
    </div>

</div>