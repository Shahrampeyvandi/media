<header class="channel-header">
    <section class="cover-wrapper">

        <div class="cover"
            style="background-image: url({{asset('assets/images/edu.jpg')}}); background-position: center;">
        </div>
        <div class="wrapper">

            <ul class="socials">
                <li class="social">
                    <a href="#" class="social-icons" title="facebook" target="_blank" ><i class="fa fa-facebook"></i></a>
                </li>
                <li class="social">
                    <a href="#" class="social-icons" title="facebook" target="_blank" ><i class="fa fa-telegram"></i></a>
                </li>
                <li class="social">
                    <a href="#" class="social-icons" title="facebook" target="_blank" ><i class="fa fa-instagram"></i></a>
                </li>
                
            </ul>
        </div>
    </section>
    <section class="details-row">
        <div class="wrapper">
            <div class="details">
                <div class="item">
                    <div class="avatar">

                        <a href="{{route('User.Show',['name'=>$member->username])}}" class="picture image">
                            {{-- <img
                                src="https://static.cdn.asset.aparat.com/profile-photo/349868-m.jpg"
                                class=" avatar-img"> --}}
                                <i class="fa fa-user channel-pic"></i>
                            
                            </a>

                        <div class="channel-title">
                            <a id="channelTitle" href="{{route('User.Show',['name'=>$member->username])}}" title="{{$member->username}}">
                                <h3 class="title">
                                    <span class="name">{{$member->username}}</span>

                                </h3>
                            </a>
                        </div>
                    </div>
                <a href="#" title="" data-id="{{$member->id}}" 
                        class="follow-link button follow-button-349868 button-small follow-btn mr-2 mt-0"
                        >
                        @if ($checkfollow)
                        <span class="text">دنبال میکنید</span>
                        @else
                        <svg
                        class="icon icon-add" viewBox="0 0 24 24" 0="" 24="" 24""="">
                        <use xlink:href="#si_add">
                            <g id="si_add" data-viewBox="0 0 24 24">
                                <path d="M19 13h-6v6h-2v-6H5v-2h6V5h2v6h6z"></path>
                                <path d="M0 0h24v24H0z" fill="none"></path>
                            </g>
                        </use>
                    </svg> 
                    <span class="text">دنبال کردن</span>
                    @endif
                </a>
                </div>

                <div class="item">
                    <div class="stat">

                        <span class="number channel-followers-349868">{{count($member->followers)}}</span>
                        <span class="text">دنبال‌ کننده</span>
                    </div>
                    <div class="stat">
                        <span class="number">{{count($member->followings)}}</span>
                        <span class="text">دنبال شونده</span>
                    </div>
                </div>
            </div>
        </div>
    </section>
</header>
<section class="main mt-5">
   
    <div class="tabs d-flex flex-wrap pr-2">
        <a href="{{route('User.Show',['name'=>$member->username,'slug'=>''])}}" class="tabs push_btn ml-2 px-2 mb-2 @if(Request::url() == route('User.Show',['name'=>$member->username,'slug'=>''])) active @endif">فیلم ها</a>
        <a href="{{route('User.Show',['name'=>$member->username,'slug'=>'animations'])}}" class="tabs push_btn ml-2 px-2 mb-2 @if(Request::url() == route('User.Show',['name'=>$member->username,'slug'=>'animations'])) active @endif">انیمیشن ها</a>
        <a href="{{route('User.Show',['name'=>$member->username,'slug'=>'clips'])}}" class="tabs push_btn ml-2 px-2 mb-2 @if(Request::url() == route('User.Show',['name'=>$member->username,'slug'=>'clips'])) active @endif">کلیپ ها</a>
        <a href="{{route('User.Show',['name'=>$member->username,'slug'=>'musics'])}}" class="tabs push_btn ml-2 px-2 mb-2 @if(Request::url() == route('User.Show',['name'=>$member->username,'slug'=>'musics'])) active @endif">موسیقی ها</a>
        <a href="{{route('User.Show',['name'=>$member->username,'slug'=>'podcasts'])}}" class="tabs push_btn ml-2 px-2 mb-2 @if(Request::url() == route('User.Show',['name'=>$member->username,'slug'=>'podcasts'])) active @endif">پادکست ها</a>
        <a href="{{route('User.Show',['name'=>$member->username,'slug'=>'tutorial'])}}" class="tabs push_btn ml-2 px-2 mb-2 @if(Request::url() == route('User.Show',['name'=>$member->username,'slug'=>'tutorial'])) active @endif">دوره های آموزشی</a>

        <a href="{{route('User.About',['name'=>$member->username])}}"  @if(request()->route()->getName() == "User.About")
            class="tabs push_btn active ml-2 px-2 mb-2" @else class="tabs push_btn ml-2 px-2 mb-2"  @endif >درباره کانال</a>

    </div>

</section>