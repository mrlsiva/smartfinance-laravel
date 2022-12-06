<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Insurance;


class insuranceController extends Controller
{
    public function save_insurance(Request $request)
    {
        $user = Auth::user();

        if($request->category != 'Other'){
            $insurance = Insurance::create([
                'user_id' =>$user->id,
                'category' => $request->category,
                'sub_category' => $request->sub_category,
                'amount' => $request->amount,
                'tenure' => $request->tenure,
                'start_date' => $request->start_date,
                'end_date' => $request->end_date,
                'payment_due' => $request->payment_due,
                'due_date' => $request->due_date,
            ]);
        }
        else{

            $insurance = Insurance::create([
                'user_id' =>$user->id,
                'category' => $request->other_category,
                'sub_category' => $request->sub_category,
                'amount' => $request->amount,
                'tenure' => $request->tenure,
                'start_date' => $request->start_date,
                'end_date' => $request->end_date,
                'due' => $request->payment_due,
                'due_date' => $request->due_date,
            ]);

        }

        $filenames = "";
        $files = $request->file('policy_document');
        foreach($files as $file){   

            $filename = $file->getClientOriginalName(); 
            $filename = time().$filename;
            $path = $file->storeAs('/public/policy_document/',$filename);
            $filenames .= $filename.",";

        }
        $insurance->document = trim($filenames,",");
        $insurance->save();

        return redirect()->back()->with('alert', 'Insurance stored successfully!!');
        
    }

    public function view_insurance($id,Request $request){

        $insurance = Insurance::where('id',$id)->first();
        return view('view_insurance')->with('insurance',$insurance);
    }
}
