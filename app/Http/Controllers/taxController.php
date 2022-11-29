<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Tax;
use App\Models\TaxDetail;
use DB;


class taxController extends Controller
{
    public function save_tax(Request $request){

        $validatedData = $request->validate([
            'pan_card' => 'required',
            'password' => 'required',
            'tax_document' => 'required',
            'start_year' => 'required',
            'end_year' => 'required',
        ]);

        $user = Auth::user();

        $tax = Tax::where('user_id',$user->id)->first();
        if($tax != NULL){

            $tax = DB::table('taxes')->where('user_id',$user->id)->update(['pan_card' => $request->pan_card,'password' => $request->password]);
        }
        else{

            $tax = Tax::create([
                'user_id' => $user->id,
                'pan_card' => $request->pan_card,
                'password' => $request->password,
            ]);

        }
        $tax = Tax::where('user_id',$user->id)->first();

        $tax_detail = TaxDetail::create([
            'tax_id' => $tax->id,
            'start_year' => $request->start_year,
            'end_year' => $request->end_year,
        ]);

        $filenames = "";
        $files = $request->file('tax_document');
        foreach($files as $file){   

            $filename = $file->getClientOriginalName(); 
            $filename = time().$filename;
            $path = $file->storeAs(config('path.tax_document'), $filename);
            $filenames .= $filename.",";

        }
        $tax_detail->document = trim($filenames,",");
        $tax_detail->save();

        return redirect()->back()->with('alert', 'Tax stored successfully!!');
    }

    public function view_tax($id,Request $request){

        $tax_detail = TaxDetail::where('id',$id)->first();
        return view('tax')->with('tax_detail',$tax_detail);
    }

    public function update_password(Request $request){

        $tax = DB::table('taxes')->where('id',$request->tax_id)->update(['password' => $request->password]);

        return redirect()->back()->with('alert', 'Password Changed Successfully!!');
    }
    
}
