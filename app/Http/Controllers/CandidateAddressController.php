<?php

namespace App\Http\Controllers;

use App\CandidateAddress;
use Illuminate\Http\Request;
use Validator;
use Session;
use DB;
use Response;
session_start();
class CandidateAddressController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
                'candidate_id'=>'required',
                'present_address'=>'required',  
                'permanent_address'=>'required'
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
              $input = CandidateAddress::create($input);
        } catch (\Exception $e) {
              $bug = $e->erroeInfo[1];
        }
        if($bug==0){
            Session::flash('flash_message','Candidate Addess Added Successfully!!');
            return redirect()->back()->with('status_color','success');
            }else{
            Session::flash('flash_message','Something Error Found.');
            return redirect('')->back()->with('status_color','danger');
            }    
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\CandidateAddress  $candidateAddress
     * @return \Illuminate\Http\Response
     */
    public function show(CandidateAddress $candidateAddress)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\CandidateAddress  $candidateAddress
     * @return \Illuminate\Http\Response
     */
    public function edit(CandidateAddress $candidateAddress)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\CandidateAddress  $candidateAddress
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CandidateAddress $candidateAddress)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\CandidateAddress  $candidateAddress
     * @return \Illuminate\Http\Response
     */
    public function destroy(CandidateAddress $candidateAddress)
    {
        //
    }
}
