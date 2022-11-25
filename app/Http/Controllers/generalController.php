<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\SMTPController;
use Illuminate\Support\Str;
use App\Models\Upload;
use App\Models\Template;
use App\Models\User;
use App\Models\SocialIcon;
use App\Models\HtmlPage;
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

            //return $request;

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

    public function get_upload(Request $request)
    {
        $id = $request->id;
        $data = Upload::where('id',$id)->first();
        return $data;
    }

    public function update_banner(Request $request)
    {
        //return $request;
        if($request->image_b != NULL){
            $image = $request->file('image_b');
            $rand_name = time() . Str::random(12);
            $filename = $rand_name . '.jpg';
            $photo = Image::make($image)->encode('jpg', 80);
            Storage::disk('public')->put(config('path.banner').$filename, $photo);

            $upload = DB::table('uploads')->where('id',$request->banner_id)->update(['banner' => $filename,'banner_link' => $request->b_link]);
        }
        else{

            $upload = DB::table('uploads')->where('id',$request->banner_id)->update(['banner_link' => $request->b_link]);

        }

        return redirect()->back()->with('alert', 'Banner updated successfully.');
        
        
    }

    public function update_youtube(Request $request)
    {
        //return $request;
        $upload = DB::table('uploads')->where('id',$request->youtube_id)->update(['youtube_link' => $request->code]);
        return redirect()->back()->with('alert', 'Youtube code updated successfully.');
        
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
            $emailId = "info@smartfinservice.com";
            $subject = $emailsetting->subject;
            $mailstatus = SMTPController::sendMail($emailId,$subject,$txt);
        }
        //End Mail
    }

    public function settings(Request $request)
    {
        $icons = SocialIcon::all();
        return view('setting')->with('icons',$icons);
    }

    public function save_setting(Request $request)
    {
        $validatedData = $request->validate([
            'project_name' => 'required',
            'email' => 'required|email',
            'phone' => 'required|numeric|digits:10',
            'address' => 'required',
            'admin_email' => 'required|email',
            'cc_email' => 'required|email',
        ]);

        DB::table('settings')->where('key','project_name')->update(['value' => $request->project_name]);
        DB::table('settings')->where('key','email')->update(['value' => $request->email]);
        DB::table('settings')->where('key','phone')->update(['value' => $request->phone]);
        DB::table('settings')->where('key','address')->update(['value' => $request->address]);
        DB::table('settings')->where('key','admin_email')->update(['value' => $request->admin_email]);
        DB::table('settings')->where('key','cc_email')->update(['value' => $request->cc_email]);

        return redirect()->back()->with('alert', 'Updated Successfully!!');

    }

    public function save_social_media(Request $request)
    {


        $validatedData = $request->validate([
            'name' => 'required',
            'logo' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);

        //return $request;

        $image = $request->file('logo');
        $rand_name = time() . Str::random(12);
        $filename = $rand_name . '.jpg';
        $photo = Image::make($image)->encode('jpg', 80);
        Storage::disk('public')->put('logo/'.$filename, $photo);

        $upload = SocialIcon::create([
            'name' => $request->name,
            'logo' => $filename,
            'link' => $request->link,
        ]);

        return redirect()->back()->with('alert', 'Social icon added successfully.'); 
        
    }

    public function get_logo(Request $request)
    {
        $id = $request->id;
        $data = SocialIcon::where('id',$id)->first();
        return $data;
    }

    public function delete_logo($id,Request $request)
    {

        $logo = SocialIcon::where('id',$id)->delete();
        return redirect()->back()->with('alert', 'Deleted successfully.');
    }

    public function save_html_pages(Request $request)
    {

        $validatedData = $request->validate([
            'loan_terms_and_condition' => 'required',
        ]);

        DB::table('html_pages')->where('name','loan_terms_and_condition')->update(['content' => $request->loan_terms_and_condition]);
        return redirect()->back()->with('alert', 'Updated Successfully!!');

    }

    public function loan_terms_and_condition(Request $request)
    {
        $loan_terms_and_condition = HtmlPage::where('name','loan_terms_and_condition')->first();
        return view('loan_terms_and_condition')->with('loan_terms_and_condition',$loan_terms_and_condition);
    }


}
