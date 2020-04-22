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

                        <a href="/Digiato" class="picture image">
                            {{-- <img
                                src="https://static.cdn.asset.aparat.com/profile-photo/349868-m.jpg"
                                class=" avatar-img"> --}}
                                <i class="fa fa-user channel-pic"></i>
                            
                            </a>

                        <div class="channel-title">
                            <a id="channelTitle" href="/Digiato" title="دیجیاتو">
                                <h3 class="title">
                                    <span class="name">{{$member->username}}</span>

                                </h3>
                            </a>
                        </div>
                    </div>
                    <a href="/login?afterlogin=follow&amp;userid=349868" title="دیجیاتو"
                        class="button follow-button-349868 button-small follow-btn mr-2"
                        data-target="#txWrapper" data-insert="replace" data-channel-follow=""
                        data-userid="349868" data-username="Digiato" data-status="login"><svg
                            class="icon icon-add" viewBox="0 0 24 24" 0="" 24="" 24""="">
                            <use xlink:href="#si_add">
                                <g id="si_add" data-viewBox="0 0 24 24">
                                    <path d="M19 13h-6v6h-2v-6H5v-2h6V5h2v6h6z"></path>
                                    <path d="M0 0h24v24H0z" fill="none"></path>
                                </g>
                            </use>
                        </svg> <span class="text">دنبال کردن</span></a>
                </div>

                <div class="item">
                    <div class="stat">

                        <span class="number channel-followers-349868">{{$followers}}</span>
                        <span class="text">دنبال‌ کننده</span>
                    </div>
                    <div class="stat">
                        <span class="number">{{$followings}}</span>
                        <span class="text">دنبال شونده</span>
                    </div>
                </div>
            </div>
        </div>
    </section>
</header>
<section class="main mt-5">
   
    <div class="tabs d-flex flex-wrap pr-2">
        <a href="{{route('User.Videos','name')}}" class="tabs push_btn ml-2 px-2 mb-2"> فیلم ها و انیمیشن ها</a>
        <a href="#" class="tabs push_btn ml-2 px-2 mb-2">کلیپ ها</a>
        <a href="#" class="tabs push_btn ml-2 px-2 mb-2">موسیقی ها</a>

        <a href="#" class="tabs push_btn ml-2 px-2 mb-2">پادکست ها</a>

        <a href="#" class="tabs push_btn ml-2 px-2 mb-2">دوره های آموزشی</a>
        <a href="{{route('User.About','name')}}"  @if(request()->route()->getName() == "User.About")
            class="tabs push_btn active ml-2 px-2 mb-2" @else class="tabs push_btn ml-2 px-2 mb-2"  @endif >درباره کانال</a>

    </div>

</section>