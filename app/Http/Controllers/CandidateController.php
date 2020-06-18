<?php

namespace App\Http\Controllers;

use App\Candidate;
use Illuminate\Http\Request;
use Hash;
use Session;
use DB;
use Response;
use Validator;

class CandidateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('frontend.candi_create');
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
            'fullname'=>'required',
            'email'=>'required',
            'password'=>'required',
            'password2'=>'required',
            'mobile'=>'required',
            'gender'=>'required'

        ]);
        $input = $request->all();
        $input['password'] = Hash::make($request->password);
        $input['password2'] = Hash::make($request->password2);

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
        if ($request->password != $request->password2) {
            Session::flash('flash_message', "Password doesn't match !!");
            return redirect()->back()->withErrors($validator)->withInput()->with('status_color','warning');  
        }

        
        try {
               $bug = 0;
               $insert = Candidate::create($input);
                
            } catch (\Exception $e) {
               $bug = $e->errorInfo[1]; 
            }

            if($bug==0){
            Session::flash('flash_message','Candidate Account Create Successfully. Now You Can Login Your account!');
            return redirect('/can_signin')->with('status_color','success');
            }else{
            Session::flash('flash_message','Something Error Found.');
            return redirect('/can_signin')->with('status_color','danger');
            } 

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Candidate  $candidate
     * @return \Illuminate\Http\Response
     */
    public function show(Candidate $candidate)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Candidate  $candidate
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $candidate = Candidate::findOrFail($id);
        return view('frontend.candidate_setting',compact('candidate'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Candidate  $candidate
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $input = $request->all();
        $data = Candidate::findOrFail($id);

        $data->update($input);
        

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Candidate  $candidate
     * @return \Illuminate\Http\Response
     */
    public function destroy(Candidate $candidate)
    {
        //
    }
}
