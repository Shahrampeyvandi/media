<header class="channel-header">
    <section class="cover-wrapper">

        @if (\App\Models\Members\ChannelInformations::where('members_id',$member->id)->first() && $url = \App\Models\Members\ChannelInformations::where('members_id',$member->id)->first()->image )
        <div class="cover"
            style="background-image: url({{asset($url)}}); background-position: center;">
        </div>
        @else 
        <div class="cover"
            style="background-image: url({{asset('assets/images/edu.jpg')}}); background-position: center;">
        </div>   
        @endif
        <div class="wrapper">

            @if (!is_null(\App\Models\Members\ChannelInformations::where('members_id',$member->id)->first()))
            <ul class="socials">


                <li class="social">
                    <a href="{{\App\Models\Members\ChannelInformations::where('members_id',$member->id)->first()->link_whatsapp}}"
                        class="social-icons" title="whatsapp" target="_blank"><i class="fa fa-whatsapp"></i></a>
                </li>
                <li class="social">
                    <a href="{{\App\Models\Members\ChannelInformations::where('members_id',$member->id)->first()->link_telegram}}"
                        class="social-icons" title="telegram" target="_blank"><i class="fa fa-telegram"></i></a>
                </li>
                <li class="social">
                    <a href="{{\App\Models\Members\ChannelInformations::where('members_id',$member->id)->first()->link_instagram}}"
                        class="social-icons" title="instagram" target="_blank"><i class="fa fa-instagram"></i></a>
                </li>

            </ul>
            @endif
        </div>
    </section>
    <section class="details-row">
        <div class="wrapper">
            <div class="details">
                <div class="item">
                    <div class="avatar">

                        <a href="{{route('User.Show',['name'=>$member->username])}}" class="picture image">
                            @if ($member->avatar)
                            <img
                                src="{{$member->avatar}}"
                                alt="تصویر پروفایل"
                                class=" avatar-img">
                            @else
                            <i class="fa fa-user channel-pic"></i>

                            @endif
                            

                        </a>

                        <div class="channel-title">
                            <a id="channelTitle" href="{{route('User.Show',['name'=>$member->username])}}"
                                title="{{$member->username}}">
                                <h3 class="title">
                                    <span class="name">{{$member->username}}</span>

                                </h3>
                            </a>
                        </div>
                    </div>
                    <a href="#" title="" data-id="{{$member->id}}"
                        class="follow-link button follow-button-349868 button-small follow-btn mr-2 mt-0">
                        @if ($checkfollow)
                        <span class="text">دنبال میکنید</span>
                        @else
                        <svg class="icon icon-add" viewBox="0 0 24 24" 0="" 24="" 24""="">
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

                <div class="">
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
