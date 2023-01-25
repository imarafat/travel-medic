<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;

use Session;

Use \Carbon\Carbon;

use DB;

class FrontController extends Controller
{
    




    public function search_passport(Request $request)
    {
        
        $pasport_no = $request->input('pasport_no');

        $traveller = DB::table('travellers')->where('pasport_no', $pasport_no)->first();
        $res = DB::table('remarks')->where('pasport_no', $pasport_no)->count();
                   
        if($res > 0){

            $remarks = DB::table('remarks')->where('pasport_no', $pasport_no)->first();

            if($remarks->status == 0){

            $status = "Unpublished";
            
            }else{
            
            $status = "Published";
            
            }
                    }else{
                        
            $status = "Pending";

                    }


//        return view('welcome', compact('traveller','remarks'));
        return redirect()->back()->with('SearchResult', $status);

    }   // close search travellers





}