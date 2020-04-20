@extends('layout.Main.template')

@section('css')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.3.1/js/swiper.js"></script>
<link href="https://vjs.zencdn.net/7.7.5/video-js.css" rel="stylesheet" />
<link rel="stylesheet" href="{{route('BaseUrl')}}/assets/css/style.css" />

<!-- If you'd like to support IE8 (for Video.js versions prior to v7) -->
<script src="https://vjs.zencdn.net/ie8/1.1.2/videojs-ie8.min.js"></script>

@endsection
@section('content')


<div id="container" class="container">
    <div class="view">


        <div class="row">
            <div class="col-md-9">
                <div class="pr-3">
                    <div id="primary" class="primary">

                        
                        <section id="play" class="mt-3">
                            <video id="my-video" class="video-js" controls preload="auto" width="640" height="264"
                                poster="{{route('BaseUrl')}}/{{$content->picture}}" data-setup="{}">
                                <source src="{{route('BaseUrl')}}/{{$content->content_link}}" type="video/mp4" />
                                <source src="{{route('BaseUrl')}}/{{$content->content_link}}" type="video/webm" />
                                {{-- <track kind="captions" src="{{asset('files/record.vtt')}}" srclang="en"
                                label="English" default> --}}
                                <p class="vjs-no-js">
                                    To view this video please enable JavaScript, and consider upgrading to a
                                    web browser that
                                    <a href="https://videojs.com/html5-video-support/" target="_blank">supports
                                        HTML5 video</a>
                                </p>
                            </video>
                        </section>
                    </div>
                    <div id="popup1" class="overlay1">
                        <div class="popup">
                            <a class="close" href="#">&times;</a>
                            <div class="content">
                                <form id="" action="{{route('AddComment')}}" method="post">
                                    @csrf
                                    <div class="mt-3">
                                        <h5 class="modal-title px-3 pt-1 mb-2" id="exampleModalLabel"> افزودن دیدگاه
                                        </h5>
                                        <div class="form-group col-md-12">
                                            <input type="hidden" id="parent_id" name="parent_id" value="0">
                                            <input type="hidden" name="post_id" value="{{$content->id}}">
                                            <textarea type="text" rows="4" class="form-control" name="comment"
                                                id="comment"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <button type="submit" class="btn btn-sm btn-primary">ارسال </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div id="popup1" class="overlay report">
                        <div class="popup">
                            <a class="close" href="#">&times;</a>
                            <div class="content">
                                <form id="" action="{{route('Post.Report')}}" method="post">
                                    @csrf
                                    <div class="mt-3">
                                        <h5 class="modal-title px-3 pt-1 mb-2" id="exampleModalLabel"> ارسال گزارش تخلف
                                        </h5>
                                        <div class="form-group col-md-12">
                                            <input type="hidden" id="parent_id" name="parent_id" value="0">
                                            <input type="hidden" name="postid" value="{{$content->id}}">
                                            
                                            <textarea type="text" placeholder="توضیح " rows="4" class="form-control" name="info"
                                                id="description"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <button type="submit" class="btn btn-sm btn-primary">ارسال </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="head w-100 put-right  border-b-1 light-bc-30 dark-bc-100">
                        <div class="genre mb-md">
                            @foreach($content->tags as $tag)
                            <a href="#" class="actor d-in v-m fs-0-9 c-blue ml-xs"><span
                                    class="text">#{{$tag->name}}</span></a>
                            @endforeach
                        </div>
                        <div class="d-flex justify-content-between align-items-center col-11">
                            <h1 class="title fs-1-4 fw-300"> {{$content->title}}</h1>
                            <div class="d-flex align-items-center">

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
                                <a  class="report-btn  p-1 text-danger mr-2 fs-0-8 radius-5 border-1 bc-red">

                                    گزارش تخلف محتوا
                                </a>
                                @endif
                            
                                @if (auth()->check())
                                <a data-id="0" class="button__  p-1 text-primary mr-2 fs-0-8 radius-5 border-1 bc-blue">

                                    افزودن دیدگاه
                                </a>
                              
                                @endif
                            </div>
                        </div>

                    </div>
                    <div class="channel rel w-100 put-right py-xl">
                        <div class="avatar">
                            <a href="#" title="{{$content->categories->name}}" class="picture"><svg
                                    class="icon icon-videos" viewBox="0 0 24 24" 0="" 24="" 24""="">
                                    <use xlink:href="#si_videos"></use>
                                </svg></a>

                            <div class="details">
                                <a href="{{route('Category',['slug'=>$content->categories->latin_name])}}" title="{{$content->categories->name}}" class="title">دسته بندی:
                                    {{$content->categories->name}}</a>
                                <span class="caption">{{$countcategoryposts}}
                                    {{$content->categories->name}}</span>
                            </div>
                        </div>
                    </div>
                    <div class="description w-100 put-right">
                        <h3 class="fs-0-9 mb-xs">توضیحات</h3>
                        <p class="paragraph mb-lg text-black-50">
                            {!!$content->desc!!}
                        </p>
                    </div>

                    <div class="information w-100 put-right  fs-0-9 fw-300 light-80 dark-white mt-xl mb-5">
                        <div class="d-tr">
                            <div class="d-tc w-20 py-xs light-60 dark-110">مربوط به</div>
                            <div class="d-tc py-xs">
                                <span class="text">{{$content->members->username}}</span>
                                <span class="d-in v-m"></span>
                            </div>
                        </div>
                        <div class="d-tr">
                            <div class="d-tc w-20 py-xs light-60 dark-110">تاریخ انتشار</div>
                            <div class="d-tc py-xs">
                                {{\Morilog\Jalali\Jalalian::forge($content->created_at)->format('%d %B %Y')}}</div>
                        </div>
                        <div class="d-tr">
                            <div class="d-tc w-20 py-xs light-60 dark-110">مدت</div>
                            <div class="d-tc py-xs">{{$content->duration}}</div>
                        </div>
                        <div class="d-tr">
                            <div class="d-tc w-20 py-xs light-60 dark-110">زبان</div>
                            <div class="d-tc py-xs">
                                <span class="text">{{$content->languages->name}}</span>
                            </div>
                        </div>
                        <div class="d-tr">
                            <div class="d-tc w-20 py-xs light-60 dark-110">موضوع</div>
                            <div class="d-tc py-xs">
                                <span class="text">{{$content->subjects->name}}</span>
                            </div>
                        </div>
                        <div class="d-tr">
                            <div class="d-tc w-20 py-xs light-60 dark-110">سطح</div>
                            <div class="d-tc py-xs">
                                <span class="text">{{$content->levels->name}}</span>
                            </div>
                        </div>
                    </div>

                    
                    <div id="episodes_list" class="episodes_list">
                        <div class="episodes_list--section">
                            
                            <div class="episodes_list--item ">
                                <div class="section-right"><span class="episodes_list--number">۰</span>
                                    <div class="episodes_list--title"><a
                                            href="{{route('ShowItem',['id'=>$content->id])}}">معرفی دوره</a></div>
                                </div>
                                <div class="section-left">
                                    <div class="episodes_list--details"><span class="detail-type">رایگان</span> <span
                                            class="detail-time">{{$content->duration}}</span></div>
                                </div>
                            </div>

                            @foreach($episodes as $episode)
                            <div class="episodes_list--item lock">
                                <div class="section-right"><span class="episodes_list--number">{{$episode->number}}</span>
                                    <div class="episodes_list--title"><a
                                            href="{{route('ShowItem.Episode',['id'=>$content->id,'ep'=>$episode->number])}}">
                                            {{$episode->title}}
                                            </a></div>
                                </div>
                                <div class="section-left">
                                    <div class="episodes_list--details"> <span
                                            class="detail-time">{{$episode->duration}}</span></div>
                                </div>
                            </div>

@endforeach

                        
                            
                           
                        </div>
                    </div>
              


                     <div class="w-100 information put-right mt-2 mb-5 pl-3 grey lighten-2 radius-5">
                        <h3 class="mb-2 pr-2 pt-3 text-white">نظرهای شما</h3>
                        @if (count($comments))
                        @foreach ($comments as $comment)
                        <div class="row mr-2 ml-5 mb-2" style="   background: #fbfbfc;
                                border-radius: 5px;
                                padding: 10px;">
                            <div class="col-4 col-md-1 pl-0">
                                <div class="w-100 d-flex justify-content-center pt-3">
                                    <img class="w-100 rounded-circle" src="{{asset('assets/images/avatar.png')}}"
                    alt="">
                </div>
            </div>
            <div class="col-12 col-md-11 pl-3">
                <div class="mt-3">
                    <div class=" d-flex justify-content-between mb-2">
                        <h3>{{$comment->members->firstname .' '.$comment->members->lastname }}</h3>
                        <span class="text-black-50 fs-0-8">
                            {{\Morilog\Jalali\Jalalian::forge($comment->created_at)->format('%d %B %Y')}}
                        </span>
                    </div>
                    <p style="word-wrap: break-word;min-height: 40px;" class="w-100">
                        {!!$comment->text!!}
                    </p>
                    <div>
                        <div class="d-flex justify-content-end">

                            <div>
                                <a data-id="{{$comment->id}}" class="like-comment border-1 radius-5 pr-2 text-success"
                                    href="#"> <span
                                        class="text-success pl-3">{{\App\Models\Contents\CommentsLikes::where('comments_id',$comment->id)->where('score','like')->count()}}</span>
                                    <i class="fa fa-plus-square"></i>
                                </a>
                                <a data-id="{{$comment->id}}"
                                    class="dislike-comment border-1 radius-5 pr-2 text-danger mr-2" href="#"> <span
                                        class="text-success pl-3">{{\App\Models\Contents\CommentsLikes::where('comments_id',$comment->id)->where('score','dislike')->count()}}</span>
                                    <i class="fa fa-plus-square pl-1"></i>
                                </a>
                            </div>
                            <div class="text-info mr-2">
                                <a href="#"
                                    data-name="{{$comment->members->firstname .' '.$comment->members->lastname }}"
                                    data-id="{{$comment->id}}" class="button__"> پاسخ
                                    <i class="fa fa-reply"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @foreach(\App\Models\Contents\Comments::where('parent_id',$comment->id)->where('confirmed',1)->get()
        as
        $comment_l2)
        <div class="row mr-3 ml-2 mb-2" style="   background: #fbfbfc;
                                                       border-radius: 5px;
                                                       padding: 10px;">
            <div class="col-4 col-md-1 pl-0">
                <div class="w-100 d-flex justify-content-center pt-3">
                    <img class="w-100 rounded-circle" src="{{asset('assets/images/avatar.png')}}" alt="">
                </div>
            </div>
            <div class="col-12 col-md-11 pl-3">
                <div class="mt-3">
                    <div class=" d-flex justify-content-between mb-2">
                        <h3>{{$comment_l2->members->firstname .' '.$comment_l2->members->lastname }}
                        </h3>
                        <span class="text-black-50 fs-0-8">
                            {{\Morilog\Jalali\Jalalian::forge($comment_l2->created_at)->format('%d %B %Y')}}
                        </span>
                    </div>

                    <p style="word-wrap: break-word;min-height: 40px;" class="w-100">
                        {!!$comment_l2->text!!}
                    </p>
                    <div>
                        <div class="d-flex justify-content-end">

                            <div>
                                <a data-id="{{$comment_l2->id}}"
                                    class="like-comment border-1 radius-5 pr-2 text-success" href="#"> <span
                                        class="text-success pl-3">{{\App\Models\Contents\CommentsLikes::where('comments_id',$comment_l2->id)->where('score','like')->count()}}</span>
                                    <i class="fa fa-plus-square"></i>
                                </a>
                                <a data-id="{{$comment_l2->id}}"
                                    class="dislike-comment border-1 radius-5 pr-2 text-danger mr-2" href="#"> <span
                                        class="text-success pl-3">{{\App\Models\Contents\CommentsLikes::where('comments_id',$comment_l2->id)->where('score','dislike')->count()}}</span>
                                    <i class="fa fa-plus-square pl-1"></i>
                                </a>
                            </div>
                            <div class="text-info mr-2">
                                <a href="#" data-id="{{$comment_l2->id}}" class="button__"> پاسخ
                                    <i class="fa fa-reply"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @foreach(\App\Models\Contents\Comments::where('parent_id',$comment_l2->id)->where('confirmed',1)->get()
        as $comment_l3)
        <div class="row mr-5 ml-2 mb-2" style="   background: #fbfbfc;
                            border-radius: 5px;
                            padding: 10px;">
            <div class="col-4 col-md-1 pl-0">
                <div class="w-100 d-flex justify-content-center pt-3">
                    <img class="w-100 rounded-circle" src="{{asset('assets/images/avatar.png')}}" alt="">
                </div>
            </div>
            <div class="col-12 col-md-11 pl-3">
                <div class="mt-3">
                    <div class=" d-flex justify-content-between mb-2">
                        <h3>{{$comment_l3->members->firstname .' '.$comment_l3->members->lastname }}
                        </h3>
                        <span class="text-black-50 fs-0-8">
                            {{\Morilog\Jalali\Jalalian::forge($comment_l3->created_at)->format('%d %B %Y')}}
                        </span>
                    </div>

                    <p style="word-wrap: break-word;min-height: 40px;" class="w-100">
                        {!!$comment_l3->text!!}
                    </p>
                    <div>
                        <div class="d-flex justify-content-end">

                            <div>
                                <a href="#"> <span class="text-success">0</span>
                                    <svg class="icon icon-thumb-up d-in v-m c-theme fs-1-2 ml-xxs" viewBox="0 0 24 24"
                                        0="" 24="" 24""="">
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
                                    </svg> </a>
                            </div>
                            <div class="text-info mr-2">
                                <a href="#" data-id="{{$comment_l3->id}}" class="button__"> پاسخ
                                    <i class="fa fa-reply"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
        @endforeach
        @endforeach
        @else
        <p class="py-3 pr-2 text-black-50">هیچ نظری برای این پست ثبت نشده است</p>
        @endif
    </div> 
</div>
</div>
<div class="col-md-3">
    <aside id="secondary" class="secondary">
        <section id="recom" class="single-recom">
            <header class="recom-header">
                <h3 class="title">پست های مرتبط</h3>
            </header>
            <div class="recommended-list">
                <div class="inner">
                   @if (count($relateds))
                   @foreach($relateds as $related)
                   <div id="thumb" class="d-flex flex-md-wrap m-3 mx-md-0">
                       <div class="w-40">
                           @if ($related->picture)
                           <a href="{{route('ShowItem',['id'=>$related->id])}}"> <img
                                   src="{{route('BaseUrl')}}/{{$related->picture}}" alt="{{$related->title}}"
                                   aria-label="{{$related->title}}" class="thumb-image" style="min-height: 130px;"></a>
                           @else
                           <a href="{{route('ShowItem',['id'=>$related->id])}}">
                               <div class="d-flex justify-content-center align-items-center h-100 p-3" style="    border: 1px solid gray;
                                           border-radius: 4px;">
                                   {{-- <img src="{{asset('assets/images/cinema.png')}}"
                                   alt="{{$movie->title}}"
                                   aria-label="{{$movie->title}}" class="thumb-image"> --}}
                                   <i class="ti ti-video-camera text-black-50" style="font-size: 4rem;"></i>
                               </div>
                           </a>
                           @endif
                       </div>
                       <div class="thumb-details pr-2 pt-2 mb-3">
                           <h4 class="thumb-title">
                               <a href="{{route('ShowItem',['id'=>$related->id])}}" title="{{$related->title}}"
                                   class="title"><span>{{$related->title}}</span></a>
                           </h4>
                           <a href="{{route('Category',['slug'=>$related->categories->latin_name])}}"
                               title="{{$related->categories->name}}" class="thumb-channel has-priority"><span
                                   class="channel-name">{{$related->categories->name}}</span>
                               <span class="priority-brand" title="رسمی">
                                   <svg class="icon icon-tick icon-priority" viewBox="0 0 24 24" 0="" 24="" 24""="">
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

                   @else
                   <p class="text-secondary">پست مرتبط با این موضوع وجود ندارد</p>
                   @endif
                </div>
            </div>
        </section>
    </aside>
</div>
</div>
</div>
</div>
</main>


<script src="https://vjs.zencdn.net/7.7.5/video.js"></script>


@endsection

@section('js')

@endsection