<?php

namespace App\Http\Controllers;

use App\CandidatePersonalInfo;
use Illuminate\Http\Request;
use Validator;
use Session;
use DB;
use Response;
session_start();
class CandidatePersonalInfoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('frontend.edit_resume');
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

            'candidate_id'  =>'required',
            'fname'         =>'required',
            'lname'         =>'required',
            'father_name'   =>'required',
            'mother_name'   =>'required',
            'nid'           =>'required',
            'pass_num'      =>'required',
            'birth_date'    =>'required',
            'nissue_date'   =>'required',
            'gender'        =>'required',
            'mobile_number' =>'required',
            'religion'      =>'required',
            'marital_status'=>'required', 
            'email'         =>'required',
            'nationality'   =>'required'

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

        try {
            $bug = 0;
            $insert = CandidatePersonalInfo::create($input);
            return view('frontend.edit_resume',compact('insert'));
            
        } catch (\Exception $e) {
            $bug = $e->errorInfo[1];
        }

        if($bug==0){
            Session::flash('flash_message','Candidate Account Create Successfully. Now You Can Login Your account!');
            return redirect()->back()->with('status_color','success');
            }else{
            Session::flash('flash_message','Something Error Found.');
            return redirect()->back()->with('status_color','danger');
            } 
        //return $input;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\CandidatePersonalInfo  $candidatePersonalInfo
     * @return \Illuminate\Http\Response
     */
    public function show(CandidatePersonalInfo $candidatePersonalInfo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\CandidatePersonalInfo  $candidatePersonalInfo
     * @return \Illuminate\Http\Response
     */
    public function edit(CandidatePersonalInfo $candidatePersonalInfo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\CandidatePersonalInfo  $candidatePersonalInfo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CandidatePersonalInfo $candidatePersonalInfo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\CandidatePersonalInfo  $candidatePersonalInfo
     * @return \Illuminate\Http\Response
     */
    public function destroy(CandidatePersonalInfo $candidatePersonalInfo)
    {
        //
    }
}


