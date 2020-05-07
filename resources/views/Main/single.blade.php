@extends('layout.Main.template')

@section('css')


<link rel="stylesheet" href="{{route('BaseUrl')}}/assets/css/style.css" />
<!-- If you'd like to support IE8 (for Video.js versions prior to v7) -->

@endsection
@section('content')
@include('Includes.Main.popups')

<div id="container" class="container">
    <div class="view">
        <div class="row">
            <div class="col-md-9">
                <div class="pr-3 ml-2 ml-md-0">
                    <div id="primary" class="primary">

                        @include('Includes.Main.player')
                    </div>


                    <div class="head w-100 put-right  border-b-1 light-bc-30 dark-bc-100">
                        <div class="genre mb-md">
                            @foreach($content->tags as $tag)
                            <a href="#" class="actor d-in v-m fs-0-9 c-blue ml-xs"><span
                                    class="text">#{{$tag->name}}</span></a>
                            @endforeach
                        </div>
                        <div class="d-flex justify-content-between align-items-center col-12">
                            <h1 class="title fs-1-4 fw-300"> {{$content->title}}</h1>
                            <div class="d-flex align-items-center">
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

                                    افزودن دیدگاه
                                </a>

                                @endif

                            </div>
                        </div>

                    </div>


                    <div class="head  put-right  light-bc-30 dark-bc-100 mt-2" style="display: flex; ">
                        <div class="avatar">
                            @if ($content->members->avatar)
                            <a href="{{route('User.Show',['name'=>$content->members->username])}}"
                                class="picture user-avatar">
                                <img src="{{asset('members/1587120640.jpg')}}" alt="">
                            </a>

                            @else
                            <a href="{{route('User.Show',['name'=>$content->members->username])}}" class="picture image"
                                style="width: 40px;height: 40px;    border: 2px solid #eaeaea;">
                                <i class="fa fa-user  position-absolute fs-1-5 text-white"
                                    style="right: 12px;top: 7px;"></i>
                            </a>
                            @endif


                            <div class=" fs-0-8 mt-2 mr-1">
                                <a id="" href="{{route('User.Show',['name'=>$content->members->username])}}"
                                    title="{{$content->members->username}}">
                                    <h3 class="title d-flex flex-column">
                                        <span class="name">{{$content->members->username}}</span>
                                        <span class="name fs-0-8">دنبال کننده ها 10</span>
                                    </h3>
                                </a>
                            </div>
                        </div>
                       
                        @if(\App\Models\Members\Follows::where('follower_id',auth()->user()->id)->where('followed_id',$content->members->id)->count())
                        <a href="#" title="" data-id="{{$content->members->id}}" class="follow-link followed"> <span class="text">دنبال میکنید</span></a>
                        @else
                        <a href="#" title="" data-id="{{$content->members->id}}" class="follow-link"><i
                                class="fa fa-plus"></i> <span class="text">دنبال
                                کردن</span></a>

                        @endif

                    </div>
                    <div class="channel rel w-100 put-right py-xl">
                        <div class="avatar">
                            <a href="{{route('Category',['slug'=>$content->categories->latin_name])}}"
                                title="{{$content->categories->name}}" class="picture"><svg class="icon icon-videos"
                                    viewBox="0 0 24 24" 0="" 24="" 24""="">
                                    <use xlink:href="#si_videos"></use>
                                </svg></a>

                            <div class="details">
                                <a href="{{route('Category',['slug'=>$content->categories->latin_name])}}"
                                    title="{{$content->categories->name}}" class="title">دسته بندی:
                                    {{$content->categories->name}}</a>
                                <span class="caption">{{$countcategoryposts}}
                                    {{$content->categories->name}}</span>
                            </div>
                        </div>
                    </div>

                    <div class="description w-100 put-right pr-2">
                       
                        <p class="paragraph mb-lg text-black-50">
                            {!!$content->desc!!}
                        </p>
                    </div>
                   @if ($content->otheroninformation)
                   <div class="description w-100 put-right pr-2">
                    <h3 class="fs-0-9 mb-xs">متن زیرنویس: </h3>
                    <p class="paragraph mb-lg text-black-50">
                        {!!$content->otheroninformation!!}
                    </p>
                </div>
                   @endif
                    <div class="information w-100 put-right  fs-0-9 fw-300 light-80 dark-white mt-xl mb-5 pr-2 border-t-1">
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
                    @if ($content->type == "money")
                    <div class="buy w-100 put-right  fs-0-9 fw-300 light-80 dark-white mt-xl mb-5 pr-2 ">
                     <h3 class="text-black-50">این {{$content->categories->name}} غیر رایگان می باشد و برای مشاهده دوره باید آن را خریداری کنید</h3>
                     <a href="#">پرداخت</a>
                     </div>
                    @endif
                    @include('Includes.Main.Comments')
                </div>
            </div>
            @include('Includes.Main.relatedposts')
        </div>
    </div>
</div>
</main>

@endsection

@section('js')

<link rel="stylesheet" href="https://cdn.plyr.io/3.5.10/plyr.css" />
<script src="https://cdn.plyr.io/3.5.10/plyr.js"></script>
<script>
    var controls =
[
    'play-large', // The large play button in the center
    
    'rewind', // Rewind by the seek time (default 10 seconds)
    'play', // Play/pause playback
    'fast-forward', // Fast forward by the seek time (default 10 seconds)
    'progress', // The progress bar and scrubber for playback and buffering
    'current-time', // The current time of playback
    'duration', // The full duration of the media
    'mute', // Toggle mute
    'volume', // Volume control
    'captions', // Toggle captions
    'settings', // Settings menu
    'pip', // Picture-in-picture (currently Safari only)
    'airplay', // Airplay (currently Safari only)
    'download', // Show a download button with a link to either the current source or a custom URL you specify in your options
    'fullscreen' // Toggle fullscreen
];
    const player = new Plyr('#player',{
        controls
    });
    var type = "{{$type}}";
    var checkauth = '{{auth()->user()}}';
    
    function ajaxlike(id, url) {
          
        
     
  }

  $('#like-post').click(function (e) {
      e.preventDefault();
      
      if (checkauth) {
          if(type == "post"){

          var url = '{{route("LikePost")}}';
          }
          if(type == "episode"){
         
            var url = '{{route("LikeEpisode")}}';
            
          }
          let id = $(this).data('id')
          $.ajax({
              url: url,
              type: 'POST',
              data: {id: id},
              dataType: 'JSON',
              cache: false,
              success: function (res) {
                  $('#like-post span').text(res)
              }
          });
      } else {
          window.location.href = "{{route("login")}}"
      }

  })

  $('.favorite-post').click(function (e) {
      e.preventDefault();
      if (checkauth) {
          
          let thiss = $(this)

          let url = '{{route("AddFavorite")}}';
          let id = $(this).data('id')
          $.ajax({
              url: url,
              type: 'POST',
              data: {id: id},
              dataType: 'JSON',
              cache: false,
              success: function (res) {
                  if (res == 'add') {
                      thiss.find('svg').attr('fill', 'red')
                  }
                  if (res == 'remove') {
                      thiss.find('svg').attr('fill', 'gray')
                  }
              }

          });
      } else {
          window.location.href = "{{route("login")}}"
      }
  })

</script>
@endsection