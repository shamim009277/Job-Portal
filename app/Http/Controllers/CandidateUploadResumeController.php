<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CandidateResume;
use Response;
use DB;
use Validator;
use Session;

session_start();
class CandidateUploadResumeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('frontend.upload_resume');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
                 
                 'resume'=>'required|mimes:pdf|max:1024',
                 
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

        $input['candidate_id']  = $request->candidate_id;
        $image = $request->file('resume');
        if ($image) {
            //$img_name = $image->getClientOriginalName();
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = uniqid().".".$ext;
            $image_path = 'resume/';
            $image_url = $image_path.$image_full_name;
            $success=$image->move($image_path,$image_full_name);
            if ($success) {
                $input['resume'] = $image_full_name;
            }            
        }else{
            $input['resume'] = 'default.png';
        }
        /*dd($input);*/

        try{
            $bug = 0;
            $insert = CandidateResume::create($input);
        }catch(\Exception $e){
            $bug=$e->errorInfo[1];
        }
        if($bug==0){
            Session::flash('flash_message','Candidate Resume Added Successfully!!');
            return redirect()->back()->with('status_color','success');
            }else{
            Session::flash('flash_message','Something Error Found.');
            return redirect()->back()->with('status_color','danger');
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    
        $resume = CandidateResume::findorFail($id);
        $image_path = 'resume/';
        $old_image = $image_path.$resume->resume;
        if(file_exists($old_image)) {
            @unlink($old_image);
        }
        $resume->delete();
        Session::flash('flash_message','Candidate Resume Delete Successfully!!');
            return redirect()->back()->with('status_color','success');

    }
}
