<?php

namespace App\Http\Controllers;

use App\CandidateCareerInfo;
use Illuminate\Http\Request;
use Validator;
use Session;
use DB;
use Response;
session_start();
class CandidateCareerInfoController extends Controller
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

                 'Objective'=>'required',
                 'psalary'=>'required',
                 'exsalary'=>'required',
                 'joblavel'=>'required',
                 'jobnature'=>'required'
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

        $data['candidate_id'] = $request->candidate_id;
        $data['Objective']    = $request->Objective;
        $data['psalary']      = $request->psalary;
        $data['exsalary']     = $request->exsalary;
        $data['joblavel']     = $request->joblavel;
        $data['jobnature']    = json_encode($request->jobnature);
        //return $data;
        
        try {
              $bug = 0;
              $data=CandidateCareerInfo::create($data);
        } catch (\Exception $e) {
              $bug = $e->erroeInfo[1];
        }
        if($bug==0){
            Session::flash('flash_message','Candidate Addess Added Successfully!!');
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
        //
    }
}
