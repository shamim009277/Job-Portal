<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\JobPost;
use Session;
use Validator;
use Response;
use DB;

session_start();
class JobpostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$posts = JobPost::get();
        //return view ('frontend.employers.post_job',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('frontend.employers.post_job_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[

                
                 
                 'job_title'=>'required',
                 'job_location'=>'required',
                 'email'=>'required',
                 'job_vacancy'=>'required',
                 'job_category'=>'required',
                 'job_description'=>'required',

              'job_responsibilities'=>'required',
              'employment_status'=>'required',
              'educational_requirements'=>'required',
              'experience_requirements'=>'required',
              'additional_requirements'=>'required',
              'other_benefits'=>'required',

              'application_deadline'=>'required',
              'published_date'=>'required',
              'salary'=>'required',
              'logo'=>'required'

            ]);

        if($validator->fails())
        {
            $plainErrorText = "";
            $errorMessage = json_decode($validator->messages(), True);
            foreach ($errorMessage as $value) { 
                $plainErrorText .= $value[0].". ";
            }
            Session::flash('flash_message', $plainErrorText);
            return redirect()->back()->withErrors($validator)->withInput()->with('status_color','warning');
        }
        $input = $request->all();
        //$input = array();
        $input['employers_id']                = Session::get('employer_id');
        $input['job_title']                   = $request->job_title;
        $input['job_location']                = $request->job_location;
        $input['email']                       = $request->email;
        $input['job_vacancy']                 = $request->job_vacancy;
        $input['job_category']                = $request->job_category;
        $input['job_description']             = $request->job_description;
        $input['job_responsibilities']        = $request->job_responsibilities;
        $input['employment_status']           = $request->employment_status;
        $input['educational_requirements']    = $request->educational_requirements;
        $input['experience_requirements']     = $request->experience_requirements;
        $input['additional_requirements']     = $request->additional_requirements;
        $input['other_benefits']              = $request->other_benefits;
        $input['application_deadline']        = date('Y-m-d', strtotime($request->application_deadline));
        $input['published_date']              = date('Y-m-d', strtotime($request->published_date));


        $image = $request->file('logo');
        if ($image) {
            //$img_name = $image->getClientOriginalName();
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = uniqid().".".$ext;
            $image_path = 'image/';
            $image_url = $image_path.$image_full_name;
            $success=$image->move($image_path,$image_full_name);
            if ($success) {
                $input['logo'] = $image_full_name;
            }            
        }else{
            $input['logo'] = 'default.png';
        }

        try {
            $bug = 0;
            $insert = JobPost::create($input);
            
        } catch (\Exception $e) {
            $bug = $e->errorInfo[1];
        }

        if($bug==0){
        Session::flash('flash_message','Employer Account Create Successfully. Now You Can Login Your account!');
        return redirect('/EmployerDashboard')->with('status_color','success');
        }else{
        Session::flash('flash_message','Something Error Found.');
        return redirect('/EmployerDashboard')->with('status_color','danger');
        } 
           
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $posts = JobPost::findOrFail($id);
      return view ('frontend.employers.post_details',compact('posts'));
              
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
            $editPost = JobPost::findOrFail($id);
        return view('frontend.employers.post_job_create',compact('editPost'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $edit = JobPost::findOrFail($id);

        $input = $request->all();
        //$input = array();
        $input['employers_id']                = Session::get('employer_id');
        $input['job_title']                   = $request->job_title;
        $input['job_location']                = $request->job_location;
        $input['email']                       = $request->email;
        $input['job_vacancy']                 = $request->job_vacancy;
        $input['job_category']                = $request->job_category;
        $input['job_description']             = $request->job_description;
        $input['job_responsibilities']        = $request->job_responsibilities;
        $input['employment_status']           = $request->employment_status;
        $input['educational_requirements']    = $request->educational_requirements;
        $input['experience_requirements']     = $request->experience_requirements;
        $input['additional_requirements']     = $request->additional_requirements;
        $input['other_benefits']              = $request->other_benefits;
        $input['application_deadline']        = date('Y-m-d', strtotime($request->application_deadline));
        $input['published_date']              = date('Y-m-d', strtotime($request->published_date));

        //dd($input);

        if (($request->file('new_logo')) !== ($edit->logo)) {

         $image = $request->file('new_logo');
           if ($image) {
            //$img_name = $image->getClientOriginalName();
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = uniqid().".".$ext;
            $image_path = 'image/';
            $image_url = $image_path.$image_full_name;
            $success=$image->move($image_path,$image_full_name);
            if ($success) {
                $old_image = $image_path.$edit->logo;
                if (file_exists($old_image)) {
                    @unlink($old_image);
                }
                $input['logo'] = $image_full_name;
            }            
        }
            
        }else{
            $input['logo'] = $edit->logo;
        }

        try {
            $bug = 0;
            $edit->update($input);
            
        } catch (\Exception $e) {
            $bug = $e->errorInfo[1];
        }

        if($bug==0){
        Session::flash('flash_message','Post Edited Successfully !');
        return redirect('/EmployerDashboard')->with('status_color','success');
        }else{
        Session::flash('flash_message','Something Error Found.');
        return redirect('/EmployerDashboard')->with('status_color','danger');
        } 



    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = JobPost::findOrFail($id);
        $image_path = 'image/';
        $image = $image_path.$data->logo;
        if (file_exists($image)) {
            @unlink($image);
        }

        try {
            $bug = 0;
            $delete = $data->delete();
            
        } catch (\Exception $e) {
            $bug = $e->errorInfo[1];
        }

        if($bug==0){
        Session::flash('flash_message','Post Deleted Successfully !');
        return redirect('/EmployerDashboard')->with('status_color','success');
        }else{
        Session::flash('flash_message','Something Error Found.');
        return redirect('/EmployerDashboard')->with('status_color','danger');
        } 

    }    
}



