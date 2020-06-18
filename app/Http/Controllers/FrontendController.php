<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Candidate;
use App\JobPost;
use Session;
use Response;
use DB;
use Validator;
use Hash;

session_start();
class FrontendController extends Controller
{
    public function index(){
    	return view('frontend.home');
    }
    public function candidateSignin(){
    	return view('frontend.can_sign');
    }
    /*public function candidateCreateAccount(){
    	return view('frontend.candi_create');
    }*/
    public function jobsearch(){
        $posts = DB::table('job_posts')
                         ->join('employers','job_posts.employers_id','=','employers.id')
                         ->select('job_posts.*','employers.company_name')
                         ->paginate(2);
        //$posts = JobPost::paginate(2);                 
    	return view('frontend.jobsearch')->with('posts',$posts);
    }
    public function jobWelcome(){
        $this->checkCandidate();
        return view('frontend.welcome');
    }
    public function jobdetails($id){
        $posts = JobPost::findOrFail($id);
        return view('frontend.jobdetails',compact('posts'));
    }
    public function view_resume(){
        return view('frontend.view_resume');
    }
    /*public function editResume(){
        return view('frontend.edit_resume');
    }*/
    /*public function jobPost(){
        return view ('frontend.employers.post_job');
    }*/
    public function candidateSign(Request $request){

        $email = $request->email;
        $password = ($request->password);
        //dd($password);

        $result=Candidate::where('email',$email)
                  //->where('password',$password)
                  ->first();

     if ($result) {
                if (Hash::check($password,$result->password)) {
                Session::put('id',$result->id);
                Session::put('email',$result->email);
                Session::put('fullname',$result->fullname); 
                return redirect ('/candidate_dashboard');     
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

    public function candidate_logout(){
         Session::flush();
       return Redirect::to('/');
    }

    public function checkCandidate(){
        $candidate = Session::get('fullname');
        if ($candidate) {
              return;
        }else{
            return Redirect::to('/can_signin')->send();
        }
    }
}

