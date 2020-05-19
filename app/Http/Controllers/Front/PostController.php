<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Members\Members;
use App\Models\Contents\Posts;
use App\Models\Contents\Episodes;
use App\Models\Contents\Categories;
use App\Models\Contents\Comments;
use App\Models\Accounting\Purchase;
use App\Models\Contents\Advert;
use App\Models\Contents\AdvertLink;
use App\Models\Contents\AdvertVisit;
use App\Models\Contents\CommentsLikes;
use App\Models\Contents\Likes;
use App\Models\Members\Favorites;
use App\Models\Members\Follows;

class PostController extends Controller
{
    public function index($id)
    {
        $content = Posts::whereId($id)->first();
        $title= "ژن برتر - $content->title";
        $followers = Follows::where('followed_id',$content->members_id)->count();
        $advert = AdvertLink::where(['cat_id' => $content->categories_id, 'status' => 1])->latest()->first();
        if ($advert) {
            $link = $advert->content_link;
            $pic_link = $advert->pic_address;
            $link_type = $advert->type;
        } else {
            $link = '';
            $pic_link = '';
            $link_type = '';
        }

        if ($advert) {
            if (AdvertVisit::where('ip', request()->ip())->count() == 0) {
                $advert->visits()->create([
                    'ip' => request()->ip(),
                ]);
            }
        }

        $favorite_status = 0;
        if (auth()->user()) {
            $user_id = auth()->user()->id;
            $favorite_status = Favorites::where('posts_id', $content->id)->where('members_id', $user_id)->count();
        }

        $likes = Likes::where('posts_id', $content->id)->count();
        $content->views = $content->views + 1;
        $views = Posts::whereId($id)->update(['views' => $content->views]);
        $content->update();

        $isbuyedit = false;
        if (auth()->user()) {
            $purchase = Purchase::where('members_id', auth()->user()->id)->where('posts_id', $id)->where('success', 1)->first();
            if ($purchase) {
                $isbuyedit = true;
            }
            if ($content->members_id == auth()->user()->id) {
                $isbuyedit = true;
            }
        }
        if ($content->type == 'free') {
            $isbuyedit = true;
        }

        $relateds = Posts::where('categories_id', $content->categories_id)->where('id', '!=', $id)->take(5)->get();
        $categories = Categories::all();
        $countcategoryposts = Posts::where('categories_id', $content->categories_id)->count();
        $comments =
            Comments::where('posts_id', $id)
            ->where('parent_id', 0)
            ->where('confirmed', 1)
            ->latest()->get();
        $allpostcomments =
            Comments::where('posts_id', $id)
            ->where('confirmed', 1)
            ->latest()->get();
        $from = date("Y-m-01 00:00:00");
        $to = date("Y-m-29 23:59:59");
        $maxlike = 0;
        $mostlikeid = 1;
        $comment_id = 0;
        $array = [];
        $best = [];
        if (count($allpostcomments)) {
            foreach ($allpostcomments as $comment) {
                $like = CommentsLikes::where('comments_id', $comment->id)->where('score', 'like')->count();
                $array[$comment->id] = $like;
            }
            $max = 0;
            $countbestcomments = 0;
            foreach ($array as $key => $value) {
                if ($value > $max) {
                    $best = [];
                    $max = $value;
                    $bestcomment_id = $key;
                    $best[$key] = $value;
                }
            }
            foreach ($array as $key => $value) {
                if ($value == $max) $countbestcomments++;
            }
        } else {
            $bestcomment_id = 0;
            $countbestcomments = 0;
        }

        $type = "post";
        $episode_id = null;
        if ($content->categories_id == 6) {

            $episodes = Episodes::where('posts_id', $id)->orderBy('number', 'asc')->get();

            $post = $content;
            //dd($episodes);
            return view('Main.tutorial', compact([
                'title',
                'episode_id',
                'type',
                'isbuyedit',
                'id',
                'post',
                'content',
                'comments',
                'likes',
                'favorite_status',
                'relateds',
                'categories',
                'countcategoryposts',
                'episodes',
                'bestcomment_id',
                'countbestcomments',
                'link',
                'link_type',
                'pic_link',
                'followers'

            ]));
        } else {
            // get Epizodes
            return view('Main.single', compact([
                'title',
                'type',
                'isbuyedit',
                'id',
                'content',
                'comments',
                'likes',
                'favorite_status',
                'relateds',
                'categories',
                'countcategoryposts',
                'bestcomment_id',
                'countbestcomments',
                'link',
                'link_type',
                'pic_link',
                'followers'
            ]));
        }
    }

    public function ConfirmUnConfPost(Request $request)
    {

        $post = Posts::find($request->id)->update('confirmed', $request->c);

        return back();
    }

    public function create(Request $request)
    {
    }


    public function episode($id, $ep)
    {

        $content = Episodes::where('posts_id', $id)->where('number', $ep)->first();
       $title= "ژن برتر - $content->title";
        $post = Posts::whereId($id)->first();
        $favorite_status = 0;
        $isbuyedit = true;

        if (auth()->user()) {
            $user_id = auth()->user()->id;
            $favorite_status = Favorites::where('posts_id', $id)->where('members_id', $user_id)->count();
        }

        if ($post->type == 'money') {
            if (auth()->user()) {
                $purchase = Purchase::where('members_id', auth()->user()->id)->where('posts_id', $id)->where('success', 1)->first();
                $isbuyedit = false;
                if ($purchase) {
                    $isbuyedit = true;
                }
                if ($content->members_id == auth()->user()->id) {
                    $isbuyedit = true;
                }
            } else {
                toastr()->error('برای مشاهده این قسمت بایستی دوره را خریداری کنید');
                return back();
            }
        }



        $likes = Likes::where('episodes_id', $content->id)->count();
        $content->views = $content->views + 1;
        $views = Episodes::whereId($content->id)->update(['views' => $content->views]);
        $content->update();


        $relateds = Posts::where('categories_id', $post->categories_id)->where('id', '!=', $id)->take(5)->get();
        $categories = Categories::all();
        $countcategoryposts = Posts::where('categories_id', $post->categories_id)->count();
        $comments =
            Comments::where('episodes_id', $content->id)
            ->where('parent_id', 0)
            ->where('confirmed', 1)
            ->latest()->get();

        $content->tags = [];
        $type = "episode";
        $episodes = Episodes::where('posts_id', $id)->orderBy('number', 'asc')->get();
        $episode_id = $ep;
        $advert = AdvertLink::where(['cat_id' => $content->post->categories_id, 'status' => 1])->latest()->first();
        if ($advert) {
            $link = $advert->content_link;
            $pic_link = $advert->pic_address;
            $link_type = $advert->type;
        } else {
            $link = '';
            $pic_link = '';
            $link_type = '';
        }
        // $episodes=Episodes::where('posts_id',$)
        return view('Main.tutorial', compact([
            'title',
            'episode_id',
            'type',
            'isbuyedit',
            'id',
            'content',
            'comments',
            'likes',
            'favorite_status',
            'relateds',
            'categories',
            'countcategoryposts',
            'post',
            'episodes',
            'link',
            'pic_link',
            'link_type',
        ]));
    }

    // public function ShowVideo($id)
    // {
    //     $content = Posts::whereId($id)->first();
       
    //     $response = response($content->content_link);
    //     $response->header('Content-Type', 'video/mp4');
    //     return $response;
    // }
}
