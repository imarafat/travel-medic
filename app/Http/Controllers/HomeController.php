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
    
    
    


    public function users(Request $request)
    {
        
        $travellers = DB::table('travellers')->get();
        $users = DB::table('users')->get();

     //   $passenger = User::factory()->count(20)->create();

        return view('users', compact('travellers','users'));

    }   // close users
    
    
    
    


    public function drug_test(Request $request)
    {
        
        $travellers = DB::table('travellers')->get();
        $drug_test = DB::table('drug_test')->get();

     //   $passenger = User::factory()->count(20)->create();

        return view('drug_test', compact('travellers','drug_test'));

    }   // close drug test
    
    


    public function clinical_records(Request $request)
    {
        
        $travellers = DB::table('travellers')->get();
        $clinical = DB::table('clinical_records')->get();

     //   $passenger = User::factory()->count(20)->create();

        return view('clinical', compact('travellers','clinical'));

    }   // close clinical_records
    
    
    


    public function radiology(Request $request)
    {
        
        $travellers = DB::table('travellers')->get();
        $radiology = DB::table('radiology')->get();

     //   $passenger = User::factory()->count(20)->create();

        return view('radiology', compact('travellers','radiology'));

    }   // close radiology Exam
    
    
    


    public function remarks(Request $request)
    {
        
        $travellers = DB::table('travellers')->get();
        $remarks = DB::table('remarks')->get();

     //   $passenger = User::factory()->count(20)->create();

        return view('remarks', compact('travellers','remarks'));

    }   // close Remarks
    
    
    


    public function physical(Request $request)
    {
        
        $travellers = DB::table('travellers')->get();
        $physical = DB::table('physical_exam')->get();

     //   $passenger = User::factory()->count(20)->create();

        return view('physical_exam', compact('travellers','physical'));

    }   // close physical Exam
    
    


    public function user_types(Request $request)
    {
        
        $travellers = DB::table('travellers')->get();
        $users = DB::table('user_type')->get();

     //   $passenger = User::factory()->count(20)->create();

        return view('user_types', compact('travellers','users'));

    }   // close User Role
    
    
    
   
    public function new_user_type(Request $request)
    {
            
        $role = $request->input('role_name');


DB::table('user_type')->insert(['role'=>$role, "created_at" => \Carbon\Carbon::now()]);


        return redirect()->back()->with('message', 'New Agency has been created successfully!');

    }   // close New User Role

    
   
    public function new_agency(Request $request)
    {
            
        $name = $request->input('agency_name');
        $address = $request->input('address');

DB::table('agency')->insert(['name'=>$name, 'address'=>$address, "created_at" => \Carbon\Carbon::now()]);


        return redirect()->back()->with('message', 'New Agency has been created successfully!');

    }   // close New agency

    
    
    public function new_clinical_records(Request $request)
    {
        $today = date('Y-m-d');
        
        $user_id = Auth::id();

        $traveller = $request->input('traveller');
        $hiv = $request->input('hiv');
        $malaria = $request->input('malaria');
        $leprosy = $request->input('leprosy');
        $chronic = $request->input('chronic');
        $hepatitiesB = $request->input('hepatitiesB');
        $hepatitiesC = $request->input('hepatitiesC');
        $cancer = $request->input('cancer');
        $leshman = $request->input('leshman');
        $syph = $request->input('syph');
        $epil = $request->input('epil');
        $mental = $request->input('mental');
        $filaria = $request->input('filaria');
        $remarks = $request->input('remarks');


DB::table('clinical_records')->insert(['pasport_no'=>$traveller, 
                                    'date'=> $today,
                                    'hiv'=>$hiv,
                                    'malaria'=>$malaria, 
                                    'leprosy'=>$leprosy, 
                                    'chronic'=>$chronic, 
                                    'hepa_b'=>$hepatitiesB, 
                                    'hepa_c'=>$hepatitiesC, 
                                    'leshman'=>$leshman, 
                                    'syph'=>$syph, 
                                    'tumor'=>$cancer, 
                                    'epil'=>$epil, 
                                    'mental'=>$mental, 
                                    'filaria'=>$filaria, 
                                    'user_id'=>$user_id, 
                                    'remarks'=>$remarks, 
                                    "created_at" => \Carbon\Carbon::now()]);


        return redirect()->back()->with('message', 'New Clinical test has been created successfully!');

    }   // close New Clinical test

    
    
    public function new_drug_test(Request $request)
    {
        $today = date('Y-m-d');
        
        $user_id = Auth::id();

        $traveller = $request->input('traveller');
        $opiate = $request->input('opiate');
        $amph = $request->input('amph');
        $canabis = $request->input('canabis');
        $remarks = $request->input('remarks');


DB::table('drug_test')->insert(['pasport_no'=>$traveller, 
                                    'date'=> $today,
                                    'opiate'=>$opiate,
                                    'amph'=>$amph, 
                                    'canabis'=>$canabis, 
                                    'user_id'=>$user_id, 
                                    'remarks'=>$remarks, 
                                    "created_at" => \Carbon\Carbon::now()]);


        return redirect()->back()->with('message', 'New Drug test has been created successfully!');

    }   // close New drug_test

    
    
    
    public function new_remarks(Request $request)
    {
        $today = date('Y-m-d');
        
        $user_id = Auth::id();

        $traveller = $request->input('traveller');
        $note = $request->input('note');
        $status = $request->input('status');
        $remarks = $request->input('remarks');


DB::table('remarks')->insert(['pasport_no'=>$traveller, 
                                    'note'=>$note,
                                    'remarks_txt'=>$remarks, 
                                    'user_id'=>$user_id, 
                                    'status'=>$status, 
                                    "created_at" => \Carbon\Carbon::now()]);


        return redirect()->back()->with('message', 'New Remarks has been created successfully!');

    }   // close New Remarks 
    
    
    public function new_radio_test(Request $request)
    {
        $today = date('Y-m-d');
        
        $user_id = Auth::id();

        $traveller = $request->input('traveller');
        $tb = $request->input('tb');
        $xray = $request->input('xray');
        $remarks = $request->input('remarks');


DB::table('radiology')->insert(['pasport_no'=>$traveller, 
                                    'date'=> $today,
                                    'tb'=>$tb,
                                    'unexpect_xray'=>$xray, 
                                    'user_id'=>$user_id, 
                                    'remarks'=>$remarks, 
                                    "created_at" => \Carbon\Carbon::now()]);


        return redirect()->back()->with('message', 'New Radiology test has been created successfully!');

    }   // close New Radiology test

    
    public function new_physical_exam(Request $request)
    {
        $today = date('Y-m-d');
        // $today = today();
           
        $traveller = $request->input('traveller');
        $eyes = $request->input('eyes');
        $lft = $request->input('lft');
        $remarks = $request->input('remarks');

DB::table('physical_exam')->insert(['pasport_no'=>$traveller, 
                                    'date'=> $today,
                                    'eyes'=>$eyes,
                                    'lft'=>$lft, 
                                    'remarks'=>$remarks, 
                                    "created_at" => \Carbon\Carbon::now()]);


        return redirect()->back()->with('message', 'New physical examination has been created successfully!');

    }   // close New physical exam



    
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
