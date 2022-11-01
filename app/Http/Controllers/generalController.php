<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\SMTPController;
use Illuminate\Support\Str;
use App\Models\Upload;
use App\Models\Template;
use App\Models\User;
use Image;
use DB;

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

            return redirect()->back()->with('alert', 'Youtube code added successfully.');
        }
    }

    public function delete_upload($id,Request $request)
    {

        $youtubes = Upload::where('id',$id)->delete();
        return redirect()->back()->with('alert', 'Deleted successfully.');
    }

    public function videos(Request $request)
    {
        $youtubes = Upload::where('type','youtube')->get();
        return view('video')->with('youtubes',$youtubes);
    }

    public function email_templates(Request $request)
    {
        $templates = Template::all();
        return view('email_template')->with('templates',$templates);
    }

    public function save_templates(Request $request)
    {
        $template = Template::create([
            'name' => $request->name,
            'subject' => $request->subject,
            'template' => $request->template,
            'is_active' => 1,
        ]);

        return redirect()->back()->with('alert', 'Template added successfully!!');
    }

    public function edit_template($id,Request $request)
    {
        $template = Template::where('id',$id)->first();
        return view('edit_template')->with('template',$template);
    }

    public function update_template(Request $request)
    {
        //return $request;

        DB::table('templates')->where('id',$request->id)->update(['name' => $request->name,'subject' => $request->subject,'template' => $request->template,'is_active' => $request->is_active]);

        return redirect()->back()->with('alert', 'Updated Successfully!!');
    }

    public function send_mail(Request $request)
    {
        $user = User::where('id','500001')->first();

        //Mail
        $emailsetting = Template::where([['id',1],['is_active',1]])->first(); 
        if($emailsetting != null){
            $email_template = $emailsetting->template;
            $date = $user->created_at->toDateString();
            $emailContentReplace=['##NAME##'=>$user->first_name.' '.$user->last_name,'##PHONE##'=>$user->phone,'##DATE##'=>$date];
            $txt = strtr($email_template,$emailContentReplace);
            $emailId = "tena.visansoft@gmail.com";
            $subject = $emailsetting->subject;
            $mailstatus = SMTPController::sendMail($emailId,$subject,$txt);
        }
        //End Mail

    }




}
