<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Models\Upload;
use Image;

class generalController extends Controller
{
    public function uploads(Request $request)
    {
        $banners = Upload::where('type','banner')->get();
        $youtubes = Upload::where('type','youtube')->get();
        return view('upload')->with('banners',$banners)->with('youtubes',$youtubes);
    }

    public function save_uploads(Request $request)
    {
        if($request->type == 'banner'){

            $validatedData = $request->validate([
                'banner_img' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            ]);

            $image = $request->file('banner_img');
            $rand_name = time() . Str::random(12);
            $filename = $rand_name . '.jpg';
            $photo = Image::make($image)->encode('jpg', 80);
            Storage::disk('public')->put(config('path.banner').$filename, $photo);

            $upload = Upload::create([
                'type' => $request->type,
                'banner' => $filename,
                'banner_link' => $request->banner_link,
            ]);

            return redirect()->back()->with('alert', 'Banner added successfully.');

        }
        elseif($request->type == 'youtube'){

            $validatedData = $request->validate([
                'youtube_link' => 'required',
            ]);

            $upload = Upload::create([
                'type' => $request->type,
                'youtube_link' => $request->youtube_link,
            ]);

            return redirect()->back()->with('alert', 'Youtube link added successfully.');
        }
    }

    public function delete_upload($id,Request $request)
    {

        $youtubes = Upload::where('id',$id)->delete();
        return redirect()->back()->with('alert', 'Deleted successfully.');
    }


}
