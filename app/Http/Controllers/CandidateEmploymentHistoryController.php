<?php

namespace App\Http\Controllers;

use App\CandidateEmploymentHistory;
use Illuminate\Http\Request;
use Session;
use DB;
use Validator;
use Response;

session_start();
class CandidateEmploymentHistoryController extends Controller
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
               
               'company_name.*'=>'required',
               'company_business.*'=>'required',
               'designation.*'=>'required',
               'responsibilities.*'=>'required',
               'department.*'=>'required',
               'company_location.*'=>'required',
               'join_time.*'=>'required',
               'resign_time.*'=>'required'

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
        for ($i=0; $i < count($request->company_name); $i++){
           $data[] = [
               'candidate_id'    =>$request->candidate_id,
               'company_name'    =>$request->company_name[$i],
               'company_business'=>$request->company_business[$i],
               'designation'     =>$request->designation[$i],
               'responsibilities'=>$request->responsibilities[$i],
               'department'      =>$request->department[$i],
               'company_location'=>$request->company_location[$i],
               'join_time'       =>$request->join_time[$i],
               'resign_time'     =>$request->resign_time[$i]
           ];
           CandidateEmploymentHistory::insert($data);
        }
        } catch (\Exception $e) {
              $bug = $e->erroeInfo[1];
        }
        if($bug==0){
            Session::flash('flash_message','Employment History Added Successfully!!');
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

    public function editHistory(Request $request){

        //dd($request->all());
        $validator = Validator::make($request->all(),[
               'company_name.*'=>'required',
               'company_business.*'=>'required',
               'designation.*'=>'required',
               'responsibilities.*'=>'required',
               'department.*'=>'required',
               'company_location.*'=>'required',
               'join_time.*'=>'required',
               'resign_time.*'=>'required'
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
        foreach($request->id as $key => $value){ 

              $experience = CandidateEmploymentHistory::find($request->id[$key]); 
              //$quarters->candidate_id = $request->candidate_id; 
              $experience->company_name     = $request->company_name[$key]; 
              $experience->company_business = $request->company_business[$key]; 
              $experience->designation      = $request->designation[$key]; 
              $experience->responsibilities = $request->responsibilities[$key]; 
              $experience->department       = $request->department[$key]; 
              $experience->company_location = $request->company_location[$key]; 
              $experience->join_time        = $request->join_time[$key]; 
              $experience->resign_time      = $request->resign_time[$key]; 
              //$experience->company_name = $request->company_name[$key]; 
              $experience->save(); 
      }



        dd($experience);
    }

    public function delete($id){
        
       $history = CandidateEmploymentHistory::find($id);
       try {
           $bug = 0;
           $history->delete();
       } catch (\Exception $e) {
           $bug = $e->erroeInfo[1];
       }
       if($bug==0){
            Session::flash('flash_message','Employment History Deleted Successfully!!');
            return redirect()->back()->with('status_color','success');
            }else{
            Session::flash('flash_message','Something Error Found.');
            return redirect()->back()->with('status_color','danger');
            } 
    }
}
