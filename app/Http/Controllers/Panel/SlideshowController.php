<?php

namespace App\Http\Controllers\Panel;

use Illuminate\Http\Request;
use App\Models\Students\Student;
use App\Http\Controllers\Controller;
use App\Models\Members\Members;
use App\Models\Contents\Posts;
use App\Models\Setting;
use App\Models\SlideShow\Slideshow;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;
use Symfony\Component\HttpFoundation\File\File as FileFile;

class SlideshowController extends Controller
{

    public function Index()
    {
        $slideshows = Slideshow::all();
        $count = Setting::first()->header_slide_count;

        return view('Panel.SlideShow', compact(['slideshows','count']));
    }


    public function Submit(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'pic' => 'mimes:jpeg,png,jpg',

        ]);

        if ($validator->fails()) {
            toastr()->error('لطفا تصویر را وارد نمایید');
            return back();
        }

        $destinationPath = "files/slideshow/";
        if (!file_exists($destinationPath)) {
            mkdir($destinationPath, 0755, true);
        }
        if ($request->hasFile('pic')) {
            $picextension = $request->file('pic')->getClientOriginalExtension();
            $fileName = 'pic_' . time() . '.' . $picextension;
            $request->file('pic')->move($destinationPath, $fileName);
            $picPath = "files/slideshow/$fileName";
        }

        $slideshow = new Slideshow;
        $slideshow->title = $request->title;
        $slideshow->type = $request->slider_type;
        $slideshow->link = $request->link;
        $slideshow->banner = $picPath;

        $slideshow->save();
        toastr()->success('اسلایدشو با موفقیت افزوده شد');
        return back();
    }

    public function Delete(Request $request)
    {

        $slideshow = Slideshow::find($request->comment_id);

        File::delete(public_path() . '/' . $slideshow->banner);

        $slideshow->delete();

        return back();
    }

    public function EditSlideShow($id)
    {
        $slideshow = Slideshow::whereId($id)->first();
        if (!is_null($slideshow)) {
            return view('Panel.EditSlideShow', compact('slideshow'));
        } else {
            toastr()->error('اسلایدشو یافت نشد');
            return back();
        }
    }

    public function SaveEditSlideShow(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'link' => 'required',
            'pic' => 'nullable|mimes:jpeg,png,jpg',

        ]);
        if ($validator->fails()) {
            toastr()->error('لطفا ورودی ها را کامل کنید');
            return back();
        }
        $slideshow = Slideshow::whereId($request->id)->first();
        if ($request->hasFile('pic')) {
            File::delete($slideshow->banner);
            $destinationPath = "files/slideshow/";
            if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 0755, true);
            }

            $picextension = $request->file('pic')->getClientOriginalExtension();
            $fileName = 'pic_' . time() . '.' . $picextension;
            $request->file('pic')->move($destinationPath, $fileName);
            $picPath = "files/slideshow/$fileName";
        } else {
            $picPath = $slideshow->banner;
        }
        Slideshow::where('id', $request->id)->update([
            'title' => $request->title,
            'link' => $request->link,
            'banner' => $picPath
        ]);
        toastr()->success('با موفقیت آپدیت شد');
        return back();
    }
    public function CreateSlideShow()
    {

        return view('Panel.CreateSlideShow');
    }
   
}
