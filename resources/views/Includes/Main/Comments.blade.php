
                    <div class="w-100 information put-right mt-2 mb-5 pl-3 radius-5 text-black-50 border-1">

                        <h3 class="mb-2 pr-2 pt-3 text-info">نظرات</h3>
                        @if (count($comments))
                        @foreach ($comments as $comment)
                            @if ($comment->id == $bestcomment_id && $countbestcomments == 1)
                            <div class="row mr-2 ml-5 mb-2" style="background: #d3fff1;
                            border-radius: 5px;
                            padding: 10px;">
                            @else
                            <div class="row mr-2 ml-5 mb-2" style="background: #f3f3f39c;
                            border-radius: 5px;
                            padding: 10px;">
                            @endif
                       
                            <div class="col-2 col-md-1 pl-0">
                                <div class="w-100 d-flex justify-content-center pt-3">
                                    <img class="w-100 rounded-circle" src="{{asset('assets/images/avatar.png')}}"
                                        alt="">
                                </div>
                            </div>
                            <div class="col-12 col-md-11 pl-3 comment-user-name">
                                <div class="mt-4">
                                    <div class=" d-flex justify-content-between mb-3">
                                        <h4>{{$comment->members->firstname .' '.$comment->members->lastname }}</h4>
                                        <span class="text-black-50 fs-0-8">
                                            {{\Morilog\Jalali\Jalalian::forge($comment->created_at)->format('%d %B %Y')}}
                                        </span>
                                    </div>
                                    <p style="word-wrap: break-word;min-height: 40px;font-size:16px;" class="w-100">
                                        {!!$comment->text!!}
                                    </p>
                                    <div>
                                        <div class="d-flex justify-content-end">

                                            <div>
                                                <a data-id="{{$comment->id}}"
                                                    class="like-comment border-1 radius-5 pr-2 text-success" href="#">
                                                    <span
                                                        class="text-success pl-3">{{\App\Models\Contents\CommentsLikes::where('comments_id',$comment->id)->where('score','like')->count()}}</span>
                                                    <i class="fa fa-check"></i>
                                                </a>
                                                <a data-id="{{$comment->id}}"
                                                    class="dislike-comment border-1 radius-5 pr-2 text-danger mr-2"
                                                    href="#"> <span
                                                        class="text-success pl-3">{{\App\Models\Contents\CommentsLikes::where('comments_id',$comment->id)->where('score','dislike')->count()}}</span>
                                                    <i class="fa fa-close pl-1"></i>
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
                         @if ($comment_l2->id == $bestcomment_id && $countbestcomments == 1)
                         <div class="row mr-3 ml-2 mb-2" style="background: #d3fff1;
                         border-radius: 5px;
                         padding: 10px;">
                         @else
                        <div class="row mr-3 ml-2 mb-2" style="   background: #f3f3f39c;
                                                       border-radius: 5px;
                                                       padding: 10px;">
                        @endif
                            <div class="col-2 col-md-1 pl-0">
                                <div class="w-100 d-flex justify-content-center pt-3">
                                    <img class="w-100 rounded-circle" src="{{asset('assets/images/avatar.png')}}"
                                        alt="">
                                </div>
                            </div>
                            <div class="col-12 col-md-11 pl-3 comment-user-name">
                                <div class="mt-4">
                                    <div class=" d-flex justify-content-between mb-3">
                                        <h4>{{$comment_l2->members->firstname .' '.$comment_l2->members->lastname }}
                                        </h4>
                                        <span class="text-black-50 fs-0-8">
                                            {{\Morilog\Jalali\Jalalian::forge($comment_l2->created_at)->format('%d %B %Y')}}
                                        </span>
                                    </div>

                                    <p style="word-wrap: break-word;min-height: 40px;font-size:16px;" class="w-100">
                                        {!!$comment_l2->text!!}
                                    </p>
                                    <div>
                                        <div class="d-flex justify-content-end">

                                            <div>
                                                <a data-id="{{$comment_l2->id}}"
                                                    class="like-comment border-1 radius-5 pr-2 text-success" href="#">
                                                    <span
                                                        class="text-success pl-3">{{\App\Models\Contents\CommentsLikes::where('comments_id',$comment_l2->id)->where('score','like')->count()}}</span>
                                                    <i class="fa fa-check"></i>
                                                </a>
                                                <a data-id="{{$comment_l2->id}}"
                                                    class="dislike-comment border-1 radius-5 pr-2 text-danger mr-2"
                                                    href="#"> <span
                                                        class="text-success pl-3">{{\App\Models\Contents\CommentsLikes::where('comments_id',$comment_l2->id)->where('score','dislike')->count()}}</span>
                                                    <i class="fa fa-close pl-1"></i>
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
                         @if ($comment_l3->id == $bestcomment_id && $countbestcomments == 1)
                         <div class="row mr-5 ml-2 mb-2" style="background: #d3fff1;
                         border-radius: 5px;
                         padding: 10px;">
                         @else
                        <div class="row mr-5 ml-2 mb-2" style="   background: #f3f3f39c;
                            border-radius: 5px;
                            padding: 10px;">
                         @endif   
                            <div class="col-2 col-md-1 pl-0">
                                <div class="w-100 d-flex justify-content-center pt-3">
                                    <img class="w-100 rounded-circle" src="{{asset('assets/images/avatar.png')}}"
                                        alt="">
                                </div>
                            </div>
                            <div class="col-12 col-md-11 pl-3 comment-user-name">
                                <div class="mt-4">
                                    <div class=" d-flex justify-content-between mb-3">
                                        <h4>{{$comment_l3->members->firstname .' '.$comment_l3->members->lastname }}
                                        </h4>
                                        <span class="text-black-50 fs-0-8">
                                            {{\Morilog\Jalali\Jalalian::forge($comment_l3->created_at)->format('%d %B %Y')}}
                                        </span>
                                    </div>

                                    <p style="word-wrap: break-word;min-height: 40px;font-size:16px;" class="w-100">
                                        {!!$comment_l3->text!!}
                                    </p>
                                    <div>
                                        <div class="d-flex justify-content-end">

                                            <div>
                                                <a data-id="{{$comment_l3->id}}"
                                                    class="like-comment border-1 radius-5 pr-2 text-success" href="#">
                                                    <span
                                                        class="text-success pl-3">{{\App\Models\Contents\CommentsLikes::where('comments_id',$comment_l3->id)->where('score','like')->count()}}</span>
                                                    <i class="fa fa-check"></i>
                                                </a>
                                                <a data-id="{{$comment_l3->id}}"
                                                    class="dislike-comment border-1 radius-5 pr-2 text-danger mr-2"
                                                    href="#"> <span
                                                        class="text-success pl-3">{{\App\Models\Contents\CommentsLikes::where('comments_id',$comment_l3->id)->where('score','dislike')->count()}}</span>
                                                    <i class="fa fa-close pl-1"></i>
                                                </a>
                                            </div>
                                            <div class="text-info mr-2">
                                                <a href="#"
                                                    data-name="{{$comment_l3->members->firstname .' '.$comment_l3->members->lastname }}"
                                                    data-id="{{$comment_l3->id}}" class="button__"> پاسخ
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
                        <p class="py-3 pr-2 text-black-50">هنوز هیچ نظری ثبت نشده است</p>
                        @endif
                    </div>