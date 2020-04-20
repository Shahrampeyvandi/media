<?php

namespace App\Http\Controllers\Panel;

use Illuminate\Http\Request;
use App\Models\Students\Student;
use App\Http\Controllers\Controller;
use App\Models\Members\Members;
use App\Models\Contents\Posts;
use App\Models\SlideShow\Slideshow;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;

class SlideshowController extends Controller
{

    public function Index(){

        $slideshows=Slideshow::all();

        return view('Panel.SlideShow',compact('slideshows'));
        }


        public function Submit(Request $request){

            $validator = Validator::make($request->all(), [
                'title' => 'required',
                'link' => 'required',
                'pic' => 'mimes:jpeg,png,jpg',
              
            ]);
        
            if ($validator->fails()) {
                return response()->json(
                    ['errors' => 'فایل دارای فرمت نامعتبر میباشد']
                    , 200);
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

            $slideshow= new Slideshow;
            $slideshow->title=$request->title;
            $slideshow->link=$request->link;
            $slideshow->banner=$picPath;

            $slideshow->save();



    
            return back();
            }

            public function Delete(Request $request){

                $slideshow=Slideshow::find($request->id);

                File::delete(public_path() .'/'. $slideshow->banner);

                $slideshow->delete();
        
                return back();
                               
                }
}