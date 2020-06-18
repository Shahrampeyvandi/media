<section class="main mt-5">

    <div class="tabs d-flex flex-wrap pr-2">
        <a href="{{route('User.Show',['name'=>$member->username,'slug'=>''])}}"
            class="tabs push_btn ml-2 px-2 mb-2 @if(Request::url() == route('User.Show',['name'=>$member->username,'slug'=>''])) active @endif">فیلم
            ها</a>
        <a href="{{route('User.Show',['name'=>$member->username,'slug'=>'animations'])}}"
            class="tabs push_btn ml-2 px-2 mb-2 @if(Request::url() == route('User.Show',['name'=>$member->username,'slug'=>'animations'])) active @endif">انیمیشن
            ها</a>
        <a href="{{route('User.Show',['name'=>$member->username,'slug'=>'genplus'])}}"
            class="tabs push_btn ml-2 px-2 mb-2 @if(Request::url() == route('User.Show',['name'=>$member->username,'slug'=>'genplus'])) active @endif">ژن پلاس
            ها</a>
        <a href="{{route('User.Show',['name'=>$member->username,'slug'=>'musics'])}}"
            class="tabs push_btn ml-2 px-2 mb-2 @if(Request::url() == route('User.Show',['name'=>$member->username,'slug'=>'musics'])) active @endif">موسیقی
            ها</a>
        <a href="{{route('User.Show',['name'=>$member->username,'slug'=>'podcasts'])}}"
            class="tabs push_btn ml-2 px-2 mb-2 @if(Request::url() == route('User.Show',['name'=>$member->username,'slug'=>'podcasts'])) active @endif">پادکست
            ها</a>
        <a href="{{route('User.Show',['name'=>$member->username,'slug'=>'tutorial'])}}"
            class="tabs push_btn ml-2 px-2 mb-2 @if(Request::url() == route('User.Show',['name'=>$member->username,'slug'=>'tutorial'])) active @endif">دوره
            های آموزشی</a>
            @if(auth()->check())
        @if (auth()->user()->approved == 1 || auth()->user()->group == "admin")

        <a href="{{route('User.About',['name'=>$member->username])}}" @if(request()->route()->getName() == "User.About")
            class="tabs push_btn active ml-2 px-2 mb-2" @else class="tabs push_btn ml-2 px-2 mb-2" @endif >درباره
            کانال</a>
        @endif
        @endif

    </div>

</section>