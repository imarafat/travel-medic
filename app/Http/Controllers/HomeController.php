<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }




    public function agency(Request $request)
    {
        
        $agency = DB::table('agency')->get();

        return view('agency', compact('agency'));

    }   // close agency
    
    
    


    public function travellers(Request $request)
    {
        
        $travellers = DB::table('travellers')->get();
        $agency = DB::table('agency')->get();

     //   $passenger = User::factory()->count(20)->create();

        return view('travellers', compact('travellers','agency'));

    }   // close travellers
    
    
    
    
    
    public function new_agency(Request $request)
    {
            
        $name = $request->input('agency_name');
        $address = $request->input('address');

DB::table('agency')->insert(['name'=>$name, 'address'=>$address, "created_at" => \Carbon\Carbon::now()]);


        return redirect()->back()->with('message', 'New Agency has been created successfully!');

    }   // close New agency



    
    public function new_travellers(Request $request)
    {
            
        $pasport_no = $request->input('pasport_no');
        $invoice_id = $request->input('invoice_id');

        $full_name = $request->input('full_name');
        $father_name = $request->input('father_name');
        $mother_name = $request->input('mother_name');
        $dob = $request->input('dob');
        $reg_no = $request->input('reg_no');
        
        $gender = $request->input('gender');
        $age = $request->input('age');
        $address = $request->input('address');
        $country = $request->input('country');
        $agency_id = $request->input('agency_id');

        
        
        if ($request->hasFile('photo')) {

            $extension = $request->photo->extension();
            
    $photo = $pasport_no.".".$extension;
            $request->photo->storeAs('public/img', $photo);
    
                }else{
        $photo = '';
                }

        $user_id = Auth::id();


// $cus = Auth::guard('customers')->user();
// $cus_id = $cus->id;

        

    DB::table('travellers')->insert(['pasport_no'=>$pasport_no, 
                                    'invoice_id'=>$invoice_id, 
                                    'full_name'=>$full_name, 
                                    'father_name'=>$father_name, 
                                    'mother_name'=>$mother_name, 
                                    'dob'=>$dob, 
                                    'reg_no'=>$reg_no, 
                                    'gender'=>$gender, 
                                    'age'=>$age, 
                                    'address'=>$address, 
                                    'country'=>$country, 
                                    'agency_id'=>$agency_id, 
                                    'photo'=>$photo, 
                                    'user_id'=>$user_id,
                                    'created_at' => \Carbon\Carbon::now()
                                ]);


        return redirect()->back()->with('message', 'New Travellers has been created successfully!');

    }   // close New  Travellers





}
