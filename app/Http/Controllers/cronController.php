<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class cronController extends Controller
{
    public function testing(Request $request)
    {
        DB::table("users")->update(["email_verified_at"=>date("Y-m-d h:i:s")]);
    }
}
