<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contents\Posts;
use App\Models\Contents\Categories;
use App\Models\Contents\Languages;
use App\Models\Contents\Levels;
use App\Models\Contents\Subjects;

class CategoryController extends Controller
{
    public function show($slug)
    {

        $categories = Categories::all();
        $category = Categories::where('latin_name', $slug)->first();
        $posts = Posts::where('categories_id', $category->id)->paginate(6);
        $title = $category->name;

        $cid = Categories::where('latin_name', $slug)->first()->id;
        //dd($moveis[0]->languages);
        $levels = Levels::latest()->get();
        $langs = Languages::latest()->get();
        $subjects = Subjects::latest()->get();

        return view('Main.ShowAll', compact([
            'posts',
            'category',
            'categories',
            'title',
            'levels',
            'langs',
            'subjects',
            'cid'
        ]));
    }

    public function FilterData(Request $request)
    {


        if (count($request->except('category_id')) == 0) {
            $posts =  Posts::where('categories_id', $request->category_id)

                ->paginate(6);
            $paginate = $posts->links()->render();
        }
        if ($request->only('langs')) {


            $posts =  Posts::where('categories_id', $request->category_id)
                ->whereIn('languages_id', $request->langs)
                ->paginate(6);
            $paginate = $posts->links()->render();
        }
        if ($request->only('subjects')) {
            $posts =  Posts::where('categories_id', $request->category_id)->whereIn('subjects_id', $request->subjects)->paginate(6);
            $paginate = $posts->links()->render();
        }
        if ($request->only('levels')) {
            $posts =  Posts::where('categories_id', $request->category_id)->whereIn('levels_id', $request->levels)->paginate(6);
            $paginate = $posts->links()->render();
        }
        if ($request->has(['langs', 'subjects'])) {

            $posts =  Posts::where('categories_id', $request->category_id)
                ->whereIn('languages_id', $request->langs)
                ->whereIn('subjects_id', $request->subjects)
                ->paginate(6);
            $paginate = $posts->links()->render();
            //dd($posts);
        }
        if ($request->has(['langs', 'levels'])) {
            $posts =  Posts::where('categories_id', $request->category_id)
                ->whereIn('languages_id', $request->langs)
                ->whereIn('levels_id', $request->levels)
                ->paginate(6);
            $paginate = $posts->links()->render();
        }
        if ($request->has(['levels', 'subjects'])) {
            $posts = Posts::where('categories_id', $request->category_id)
                ->whereIn('levels_id', $request->levels)
                ->whereIn('subjects_id', $request->subjects)
                ->paginate(6);
            $paginate = $posts->links()->render();
        }
        if ($request->has(['levels', 'subjects', 'langs'])) {
            $posts = Posts::where('categories_id', $request->category_id)
                ->whereIn('languages_id', $request->langs)
                ->whereIn('subjects_id', $request->subjects)
                ->whereIn('levels_id', $request->levels)
                ->paginate(6);
            $paginate = $posts->links()->render();
        }


            $list = '';
            if ($request->category_id == 1 || $request->category_id == 2 || $request->category_id == 3) {


            foreach ($posts as $movie) {


                $list .= ' <div class="thumbnail-movie thumbnail-serial mb-5 mx-3 card" style="max-width: 220px;">
            <div class="thumb-wrapper">
            <a class="thumb" href="' . route('ShowItem', ['id' => $movie->id]) . '">
                <div class="abs-fit">';
                if ($movie->picture) {
                    $list .= ' <img src="' . asset($movie->picture) . '" alt="' . $movie->title . '"
                   aria-label="' . $movie->title . '" class="thumb-image">';
                } else {
                    $list .= ' <div class="d-flex justify-content-center align-items-center h-100">
                  
                <i class="ti ti-video-camera text-black-50" style="font-size: 5rem;"></i>  
                </div>';
                }

                $list .= '  </div>
                <div class="tools">
                    <span class="badge-rate">
                        <span>' . count($movie->likes) . '</span>
                        <svg class="icon icon-thumb-up d-in v-m g-20 fs-1-2 ml-xxs"
                            viewBox="0 0 24 24" viewBox="viewBox=" 0 0 24 24"">
                            <use xlink:href="#si_thumb-up">
                                <g id="si_thumb-up" data-viewBox="0 0 24 24">
                                    <path d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M0 0h24v24H0z" fill="none"></path>
                                    <path
                                        d="M9 21h9a1.987 1.987 0 0 0 1.84-1.22l3.02-7.05A1.976 1.976 0 0 0 23 12v-2a2.006 2.006 0 0 0-2-2h-6.31l.95-4.57.03-.32a1.505 1.505 0 0 0-.44-1.06L14.17 1 7.58 7.59A1.987 1.987 0 0 0 7 9v10a2.006 2.006 0 0 0 2 2zM9 9l4.34-4.34L12 10h9v2l-3 7H9z">
                                    </path>
                                    <path transform="translate(1 9)" d="M0 0h4v12H0z"></path>
                                </g>
                            </use>
                        </svg> </span>
                    <span class="badge-rate">
                        <span>';
                if (substr($movie->duration, 0, 1) == '0' && substr($movie->duration, 1, 1) == '0') {
                    $list .=   substr($movie->duration, 3);
                } else {
                    $list .=   $movie->duration;
                }

                $list .= '  </span>
                        <i class="fa fa-clock-o pl-1"></i>
                    </span>
                </div>
            </a>
        </div>
        <div class="position-relative px-2 pt-3">
    
            <a href="' . route('ShowItem', ['id' => $movie->id]) . '" title="' . $movie->title . '"
                class="title title d-block mb-2"><span>' . $movie->title . '</span></a>
                <p class=""><span class="text-black-50">موضوع: </span><span class="fw-500">';
                if ($movie->subjects) {
                    $list .=  $movie->subjects->name;
                }
                $list .= ' </span></p>
                <p class=""><span class="text-black-50">زبان: </span><span class="fw-500 fs-0-8">';
                if ($movie->languages) {
                    $list .=   $movie->languages->name;
                }
                $list .= '</span></p>
                <p class=""><span class="fs-0-9">سطح: ' . $movie->levels->name . '</span></p>
    
            <ul class="meta-tags d-b w-100 mt-xs  pb-2">
                <li class="meta d-in light-60 dark-110">' . \Morilog\Jalali\Jalalian::forge($movie->created_at)->format('%d %B %Y') . '</li>

            </ul>
    
        </div>
      </div>';
            }
        }

        if ($request->category_id == 4) {
            foreach ($posts as $key => $music) {
                $list .= '<div class="item w-100 ml-5 mr-2  mb-5 mt-2 card" style="max-width: 210px;">
       <div class="position-relative">
        <div class="item-overlay opacity r r-2x bg-black">
            <div class="text-info padder m-t-sm text-sm"> <i class="fa fa-star"></i> <i
                    class="fa fa-star"></i> <i class="fa fa-star"></i> <i
                    class="fa fa-star"></i> <i class="fa fa-star-o text-muted"></i> </div>
            <div class="center text-center m-t-n"> <a href="' . route('ShowItem', ['id' => $music->id]) . '"><i
                        class="ti ti-control-play fs-2"></i></a> </div>
            <div class="bottom padder m-b-sm"> <a href="#" class="ml-2"> <span
                        class="text-info">' . count($music->comments) . '</span><svg
                        class="icon v-m  icon-comments" viewBox="0 0 24 24" 0="" 24="" 24""="">
                        <use xlink:href="#si_comments">
                            <g id="si_comments" data-viewBox="0 0 24 24">
                                <path d="M0 0h24v24H0z" fill="none"></path>
                                <path
                                    d="M4 4h16v12H5.17L4 17.17V4m0-2a2 2 0 0 0-1.99 2L2 22l4-4h14a2.006 2.006 0 0 0 2-2V4a2.006 2.006 0 0 0-2-2z">
                                </path>
                                <path d="M6 12h8v2H6zM6 9h12v2H6zM6 6h12v2H6z"></path>
                            </g>
                        </use>
                    </svg> </a> <a href="#"> <span class="text-success">' . \App\Models\Contents\Likes::where('posts_id', $music->id)->count() . '</span>
                    <svg class="icon icon-like d-in v-m g-20 fs-1-2 ml-xxs" viewBox="0 0 24 24"
                        0="" 24="" 24""="">
                        <use xlink:href="#si_thumb-up">
                            <g id="si_thumb-up" data-viewbox="0 0 24 24">
                                <path d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M0 0h24v24H0z" fill="none"></path>
                                <path
                                    d="M9 21h9a1.987 1.987 0 0 0 1.84-1.22l3.02-7.05A1.976 1.976 0 0 0 23 12v-2a2.006 2.006 0 0 0-2-2h-6.31l.95-4.57.03-.32a1.505 1.505 0 0 0-.44-1.06L14.17 1 7.58 7.59A1.987 1.987 0 0 0 7 9v10a2.006 2.006 0 0 0 2 2zM9 9l4.34-4.34L12 10h9v2l-3 7H9z">
                                </path>
                                <path transform="translate(1 9)" d="M0 0h4v12H0z">
                                </path>
                            </g>
                        </use>
                    </svg>

                </a> </div>
        </div>
        <div class="top"> <span class="pull-right m-t-n-xs m-r-sm text-white"> <i
                    class="fa fa-bookmark i-lg"></i> </span> </div> <a href="#"
            class="music-img">';
                if ($music->picture) {
                    $list .= ' <img src="' . asset($music->picture) . '" width="100%;" height="230px" alt="" class="r r-2x img-full">';
                } else {
                    $list .= '<img src="' . asset('assets/images/p4.jpg') . '" width="100%;" height="230px"  alt=""
                class="r r-2x img-full">';
                }
                $list .= '</a>
        </div>
        <div class="padder-v px-2"> <a href="#" class="text-ellipsis">' . $music->title . '</a>
        <p href="#" class="text-ellipsis text-black-50">سطح: ' . $music->levels->name . '</p>
        <a href="#"
            class="text-ellipsis text-xs text-muted">';
                if ($music->languages) {
                    $list .= $music->language;
                }
                $list .= '  </a>
        <div class="d-flex justify-content-between mt-3">
            <span class="fs-0-8 text-black-50">
                ' . $music->languages->name . '
            </span>
            <span class="fs-0-8 text-black-50">
                11 بهمن 1398
            </span>

        </div>
      </div>
     </div>';
            }
        }

        if ($request->category_id == 5) {
            foreach ($posts as $key => $podcast) {

                $list .= ' <div style="width:230px;" class="m-3">
        <div class="card radius shadowDepth1">
            <div class="card__image border-tlr-radius">';
                if ($podcast->picture) {
                    $list .= '<img src="'.asset("$podcast->picture").'" alt="image" class="border-tlr-radius">';
                } else {

                    $list .= '<img src="' . asset('assets/images/record.png') . '" alt="image" class="border-tlr-radius">';
                }
                $list .= '</div>
            <div class="card__content px-3 pb-2">
                <div class="card__share">
                    <a href="' . route('ShowItem', ['id' => $podcast->id]) . '" id="" class=" share-icon"
                       ><i class="fa fa-play-circle"></i></a>
                </div>
                <article class="card__article mt-2 pt-3">
                    <h2><a href="' . route('ShowItem', ['id' => $podcast->id]) . '" class="fs-0-8">' . $podcast->title . '</a></h2>
                    <p>' . $podcast->desc . '</p>
                </article>
            </div>
            <div class="pr-3">
                <div class="card__author">
                    <a href="#" class="fs-0-8"> زبان: ' . $podcast->languages->name . '</a>
                    <p class="">سطح:  ' . $podcast->levels->name . '</p>
                </div>
            </div>
            <div class="card__meta d-flex justify-content-between px-3 pt-1">
                <span class="text-black-50 fs-0-8">' . $podcast->languages->name . '</span>
                <span class="text-black-50 fs-0-8">' . \Morilog\Jalali\Jalalian::forge($podcast->created_at)->format('%d %B %Y') . '</span>
            </div>
         </div>
       </div>';
            }
        }


        return response()->json(
            [$list, $paginate],
            200
        );
    }
}
