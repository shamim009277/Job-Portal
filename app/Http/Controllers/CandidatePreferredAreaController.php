<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CandidatePreferredArea;
use DB;
use Validator;
use Response;
use Session;

session_start();
class CandidatePreferredAreaController extends Controller
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

                 'preferred_job_categories'=>'required',
                 'preferred_job_location'=>'required',
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
        $data['preferred_job_categories'] = json_encode($request->preferred_job_categories);
        $data['preferred_job_location'] = json_encode($request->preferred_job_location);
        //return $data;

         try {
              $bug = 0;
              $data = CandidatePreferredArea::create($data);
        } catch (\Exception $e){
              $bug = $e->erroeInfo[1];
        }
        if($bug==0){
            Session::flash('flash_message','Candidate Preferred Area Added Successfully!!');
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
        
    }
}
