@extends('layout.Main.template')
@section('title')
    {{$title}}
@endsection
@section('css')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.3.1/js/swiper.js"></script>

<link rel="stylesheet" href="{{route('BaseUrl')}}/assets/css/style.css" />


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

                        @include('Includes.Main.playerSubtitles')

                    


                    <div>
                        <div class="head  put-right  light-bc-30 dark-bc-100 mt-2" style="display: flex; ">
                            <div class="avatar">
                                @if ($content->members->avatar)
                                <a href="{{route('User.Show',['name'=>$content->members->username])}}"
                                    class="picture user-avatar">
                                    <img src="{{asset('members/1587120640.jpg')}}" alt="">
                                </a>

                                @else
                                <a href="{{route('User.Show',['name'=>$content->members->username])}}"
                                    class="picture image"
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
                                        <span class="name fs-0-8">دنبال کننده ها  {{$followers}}</span>
                                        </h3>
                                    </a>
                                </div>
                            </div>

                            @if(auth()->user() &&
                            \App\Models\Members\Follows::where('follower_id',auth()->user()->id)->where('followed_id',$content->members->id)->count())
                            <a href="#" title="" data-id="{{$content->members->id}}" class="follow-link followed"> <span
                                    class="text">دنبال میکنید</span></a>
                            @else
                            <a href="#" title="" data-id="{{$content->members->id}}" class="follow-link"><i
                                    class="fa fa-plus"></i> <span class="text">دنبال
                                    کردن</span></a>

                            @endif
                        </div>

                    </div>
                    <div class="channel rel w-100 put-right py-xl">
                        <div class="avatar">
                            <a href="#" title="{{$content->categories->name}}" class="picture"><svg
                                    class="icon icon-videos" viewBox="0 0 24 24" 0="" 24="" 24""="">
                                    <use xlink:href="#si_videos"></use>
                                </svg></a>

                            <div class="details">
                                <a href="/movies" title="{{$content->categories->name}}" class="title">دسته بندی:
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
                    <div class="description w-100 put-right pr-2 mt-3">
                        <h3 class="fs-0-9 mb-xs">متن زیرنویس: </h3>
                        <p class="paragraph mb-lg text-black-50">
                            {!!$content->otheroninformation!!}
                        </p>
                    </div>
                    @endif
                    @include('Includes.Main.Details')
                    @if ($content->type == "money")
                    @if($isbuyedit==false)
                    <div class="buy w-100 put-right  fs-0-9 fw-300 light-80 dark-white mt-xl mb-5 pr-2 ">
                        
                        <h3>شهریه دوره : {{$content->price}} تومان </h3>

                        <form action="{{route('Pay.Start')}}" method="post">
                            @csrf
                            <input type="hidden" name="id" value="{{$id}}">
                            <input type="submit" class="btn btn-success btn-sm mr-0" value="پرداخت">
                        </form>

                    </div>
                    @endif
                    @endif

                    <div id="episodes_list" class="episodes_list">
                        <div class="episodes_list--section">

                            <div class="episodes_list--item "  @if ($episode_id == null)
                            style="background: #92d7ff54;"
                            @endif>
                                <div class="section-right"><span class="episodes_list--number">۰</span>
                                    <div class="episodes_list--title"><a
                                            href="{{route('ShowItem',['content'=>$post->categories->name,'slug'=>$post->slug])}}">معرفی دوره</a></div>
                                </div>
                                <div class="section-left">
                                    <div class="episodes_list--details">
                                        @if(auth()->user())
                                        @if ($content->members_id == auth()->user()->id)

                                        <span class="btn btn-info btn-sm btn-rounded">
                                            تعداد بازدیدها {{$post->views}}</span>
                                        @endif
                                        @endif
                                        <span class="detail-type">
                                            رایگان</span>
                                        <span class="detail-time">{{$post->duration}}
                                        </span>

                                    </div>
                                </div>
                            </div>

                            @foreach($episodes as $key=>$episode)
                            <div @if ($content->type == "money" && !$isbuyedit)
                                class="episodes_list--item lock"
                                @else
                                class="episodes_list--item "
                                @endif

                                @if ($episode->id == $episode_id)
                                    style="background: #92d7ff54;"
                                @endif

                                >
                                <div class="section-right">
                                    @if ($content->type == "money")
                                    <span class="episodes_list--number">{{$episode->number}}</span>
                                    @else
                                    <span class="episodes_list--free">{{$episode->number}}</span>
                                    @endif
                                    <div class="episodes_list--title">
                                        @if($isbuyedit==true)
                                        <a
                                            href="{{route('ShowItem.Episode',['slug'=>$episode->post->slug,'ep'=>$episode->number])}}">
                                            @endif
                                            {{$episode->title}}
                                        </a></div>
                                </div>
                                <div class="section-left">
                                    <div class="episodes_list--details">
                                        @if(auth()->user())
                                        @if ($content->members_id == auth()->user()->id)
                                        <a href="#"><span class="btn btn-danger btn-sm btn-rounded">
                                                حذف </span></a>
                                        <span class="btn btn-info btn-sm btn-rounded">
                                            تعداد بازدیدها {{$episode->views}}</span>
                                        @endif
                                        @endif

                                        <span class="detail-time">{{$episode->duration}}</span>

                                    </div>
                                </div>
                            </div>

                            @endforeach




                        </div>
                    </div>


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


<link rel="stylesheet" href="{{route('BaseUrl')}}/assets/css/emojionearea.min.css">
<script src="{{route('BaseUrl')}}/assets/js/emojionearea.min.js"></script>

<script>
    $(".add-emoji").emojioneArea({
    attributes: {
        dir : "rtl",
       
    },
    textcomplete: {
        maxCount  : 20,
        placement : 'absright'
    },
    pickerPosition: "bottom"
});

//     var controls =
// [
//     'play-large', // The large play button in the center
    
//     'rewind', // Rewind by the seek time (default 10 seconds)
//     'play', // Play/pause playback
//     'fast-forward', // Fast forward by the seek time (default 10 seconds)
//     'progress', // The progress bar and scrubber for playback and buffering
//     'current-time', // The current time of playback
//     'duration', // The full duration of the media
//     'mute', // Toggle mute
//     'volume', // Volume control
//     'captions', // Toggle captions
//     'settings', // Settings menu
//     'pip', // Picture-in-picture (currently Safari only)
//     'airplay', // Airplay (currently Safari only)
//     'download', // Show a download button with a link to either the current source or a custom URL you specify in your options
//     'fullscreen' // Toggle fullscreen
// ];
// const player = new Plyr('#player',{
//         controls
//     ,
//     speed:{ selected: 1, options: [ 0.5, 0.75, 1, 1.25] }
//     });
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