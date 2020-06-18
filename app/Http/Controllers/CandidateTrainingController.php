<?php

namespace App\Http\Controllers;

use App\CandidateTraining;
use Illuminate\Http\Request;
use Session;
use DB;
use Validator;
use Response;

session_start();
class CandidateTrainingController extends Controller
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
               
               
               'training_title.*'=>'required',
               'country.*'       =>'required',
               'topic.*'         =>'required',
               'year.*'          =>'required',
               'institute.*'     =>'required',
               'duration.*'      =>'required',
               'location.*'      =>'required',
               'start_time.*'    =>'required',
               'end_time.*'      =>'required'

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


        try {
             $bug = 0;
             for ($i=0; $i < count($request->training_title); $i++){
           $data[] = [
               'candidate_id'   =>$request->candidate_id,
               'training_title' =>$request->training_title[$i],
               'country'        =>$request->country[$i],
               'topic'          =>$request->topic[$i],
               'year'           =>$request->year[$i],
               'institute'      =>$request->institute[$i],
               'duration'       =>$request->duration[$i],
               'location'       =>$request->location[$i],
               'start_time'     =>$request->start_time[$i],
               'end_time'       =>$request->end_time[$i]
           ];
           CandidateTraining::insert($data);
        }
        } catch (\Exception $e) {
            $bug = $e->erroeInfo[1];
        }

        if($bug==0){
            Session::flash('flash_message','Training Summary Added Successfully!!');
            return redirect()->back()->with('status_color','success');
            }else{
            Session::flash('flash_message','Something Error Found.');
            return redirect()->back()->with('status_color','danger');
            } 
        
        //dd($data);
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

    public function editTrain(Request $request){

         $validator = Validator::make($request->all(),[
                  
               'training_title.*'=>'required',
               'country.*'       =>'required',
               'topic.*'         =>'required',
               'year.*'          =>'required',
               'institute.*'     =>'required',
               'duration.*'      =>'required',
               'location.*'      =>'required',
               'start_time.*'    =>'required',
               'end_time.*'      =>'required'

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

        try {
            $bug = 0;
            foreach($request->id as $key => $value){ 

              $training = CandidateTraining::find($request->id[$key]); 
              //$quarters->candidate_id = $request->candidate_id; 
              $training->training_title = $request->training_title[$key]; 
              $training->country        = $request->country[$key]; 
              $training->topic          = $request->topic[$key]; 
              $training->year           = $request->year[$key]; 
              $training->institute      = $request->institute[$key]; 
              $training->duration       = $request->duration[$key]; 
              $training->location       = $request->location[$key]; 
              $training->start_time     = $request->start_time[$key]; 
              $training->end_time       = $request->end_time[$key]; 
              //$experience->company_name = $request->company_name[$key]; 
              $training->save(); 
          }
        } catch (\Exception $e) {
            //$bug = $e->erroeInfo[1];
        }

        if($bug==0){
            Session::flash('flash_message','Training Summary Updated Successfully!!');
            return redirect()->back()->with('status_color','success');
            }else{
            Session::flash('flash_message','Something Error Found.');
            return redirect()->back()->with('status_color','danger');
            }

    }

    public function delete($id){
        
        $training = CandidateTraining::find($id);
        try {
           $bug = 0;
           $training->delete();
       } catch (\Exception $e) {
           $bug = $e->erroeInfo[1];
       }
       if($bug==0){
            Session::flash('flash_message','Training Summary Deleted Successfully!!');
            return redirect()->back()->with('status_color','success');
            }else{
            Session::flash('flash_message','Something Error Found.');
            return redirect()->back()->with('status_color','danger');
            } 
    }
}
