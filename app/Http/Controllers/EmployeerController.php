<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Employer;
use App\JobPost;
use Session;
use Hash;
use DB;
use Response;
use Validator;

session_start();

class EmployeerController extends Controller
{
    public function index(){
    	return view('frontend.employers.emp_sign');
    }
    public function employer_dashboard(){
        $this->employCheck();
        return view ('frontend.employers.employer_dashboard'); 
    }

    public function employerLogin(Request $request){

    	$username = ($request->username);
    	$password = ($request->password);

    	$result = DB::table('employers')
    	          ->where('username',$username)
    	          //->where('password',$password)
    	          ->first();
        /*dd($result);*/

    	    if ($result) {
    	          	if (Hash::check($password,$result->password)) {
    	          	Session::put('employer_id',$result->id);
		            Session::put('username',$result->username);
		            Session::put('con_per_name',$result->con_per_name); 
		            return redirect ('/EmployerDashboard');     
    	       }
    	    else{
	          	Session::flash('flash_message', "Username, Email or Password invailed !!");
	            return redirect()->back()->with('status_color','warning');
               } 
    	          }else{
    	          	Session::flash('flash_message', "Username, Email or Password invailed !!");
	                return redirect()->back()->with('status_color','warning');
    	          }   	

        
    }

    public function employer_post_job($id){

            $this->employCheck();

        $posts = JobPost::where('employers_id',$id)->paginate(5);
        return view ('frontend.employers.post_job',compact('posts'));
    }

    public function emp_logout(){

        Session::flush();
      return Redirect::to('/');
    }

    public function employCheck(){

        $com_contact_name = Session::get('con_per_name');
        if ($com_contact_name) {
             return;
        }else{
            return Redirect::to('/employeer_sign')->send();
        }
    }
}


