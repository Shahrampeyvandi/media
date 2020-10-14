@extends('layout.Main.template')
@section('title')
{{$title}}
@endsection
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
                    <div class="description w-100 put-right pr-2 mt-5">

                        <div class=" mb-lg text-black-50" style="text-align: left">
                            {!!$content->desc!!}
                        </div>
                    </div>
                    @if ($content->otheroninformation)
                    <div class="description w-100 put-right pr-2">
                        <h3 class="fs-0-9 mb-xs">متن محتوا: </h3>
                        <div class=" mb-lg text-black-50" style="text-align: left">
                            {!!$content->otheroninformation!!}
                        </div>
                    </div>
                    @endif
                    <div id="primary" class="primary" style="float: right;
                    width: 100%;">

                        @include('Includes.Main.player')
                    </div>

                    @include('Includes.Main.playerSubtitles')
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
                                        <span class="name fs-0-8">دنبال کننده ها {{$followers}}</span>
                                    </h3>
                                </a>
                            </div>
                        </div>
                        @if (auth()->check())
                        @if(\App\Models\Members\Follows::where('follower_id',auth()->user()->id)->where('followed_id',$content->members->id)->count())
                        <a href="#" title="" data-id="{{$content->members->id}}" class="follow-link followed"> <span
                                class="text">دنبال میکنید</span></a>
                        @else
                        <a href="#" title="" data-id="{{$content->members->id}}" class="follow-link"><i
                                class="fa fa-plus"></i> <span class="text">دنبال
                                کردن</span></a>

                        @endif
                        @endif

                    </div>
                    <div class="channel rel w-100 put-right py-xl">
                        <div class="avatar">
                            <a href="{{route('Category',['slug'=>$content->categories->latin_name])}}"
                                title="{{$content->categories->name}}" class="picture cat-icon">
                                <i class="fa fa-list"></i>
                            </a>

                            <div class="details">
                                <a href="{{route('Category',['slug'=>$content->categories->latin_name])}}"
                                    title="{{$content->categories->name}}" class="title">دسته بندی:
                                    {{$content->categories->name}}</a>
                                <span class="caption">{{$countcategoryposts}}
                                    {{$content->categories->name}}</span>
                            </div>
                        </div>
                    </div>

                    @include('Includes.Main.Details')

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
                   toastr.success('این محتوا پسند شد');
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
                         toastr.success('این محتوا به علاقه مندی هام افزوده شد')
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