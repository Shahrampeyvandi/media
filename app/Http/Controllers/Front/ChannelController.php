<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Contents\Categories;
use App\Models\Contents\Posts;
use App\Models\Contents\Subjects;
use App\Models\Members\Follows;
use App\Models\Members\Members;
use Illuminate\Http\Request;

class ChannelController extends Controller
{
    public function List()
    {
        $channels = Members::where('approved', 1)->get();
        return view('Main.channel.list', compact('channels'));
    }
    public function ShowAll()
    {
        
        $subject = Subjects::where('name', request()->subject)->first();
        $category = Categories::where('latin_name', request()->category)->first();
        if (!is_null($subject) && !is_null($category)) {
            $member = Members::where('username', request()->member)->first();
            $posts = $member->posts()->where('categories_id', $category->id)->where('subjects_id', $subject->id)->paginate(12);
            $paginate = $posts->links()->render();
            $checkfollow = 0;
            if (auth()->user()) {
                $checkfollow = Follows::where('followed_id', $member->id)->where('follower_id', auth()->user()->id)->count();
            }

            return view('Main.channel.showall', compact(['posts','paginate','member','checkfollow']));
        } else {
            return back();
        }
    }
}
