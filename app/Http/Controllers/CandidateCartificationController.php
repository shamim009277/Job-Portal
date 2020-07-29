<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CandidateCartification;
use Response;
use Validator;
use DB;
use Session;

session_start();
class CandidateCartificationController extends Controller
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
        //return $request->all();
        $validator = Validator::make($request->all(),[
               
               'certification.*'  =>'required',
               'location.*'       =>'required',
               'institute.*'      =>'required',
               'duration.*'       =>'required',
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
             for ($i=0; $i < count($request->certification); $i++){
           $data[] = [
               'candidate_id'  =>$request->candidate_id,
               'certification' =>$request->certification[$i],
               'location'      =>$request->location[$i],
               'institute'     =>$request->institute[$i],
               'duration'      =>$request->duration[$i],
           ];
           CandidateCartification::insert($data);
        }
        } catch (\Exception $e) {
            $bug = $e->erroeInfo[1];
        }
        if($bug==0){
            Session::flash('flash_message','Professional Certification Added Successfully!!');
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

    public function editCertification(Request $request){
        
        $validator = Validator::make($request->all(),[
               
               'certification.*'  =>'required',
               'location.*'       =>'required',
               'institute.*'      =>'required',
               'duration.*'       =>'required',
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

              $cartification = CandidateCartification::find($request->id[$key]); 
              
              $cartification->certification = $request->certification[$key]; 
              $cartification->location      = $request->location[$key]; 
              $cartification->institute     = $request->institute[$key]; 
              $cartification->duration      = $request->duration[$key]; 
              $cartification->save(); 
          }
        } catch (\Exception $e) {
            $bug = $e->erroeInfo[1];
        }
        if($bug==0){
            Session::flash('flash_message','Professional Certification Added Successfully!!');
            return redirect()->back()->with('status_color','success');
            }else{
            Session::flash('flash_message','Something Error Found.');
            return redirect()->back()->with('status_color','danger');
            }
    }


    public function delete($id){

        $cartification = CandidateCartification::find($id);
        try {
           $bug = 0;
           $cartification->delete();
       } catch (\Exception $e) {
           $bug = $e->erroeInfo[1];
       }
       if($bug==0){
            Session::flash('flash_message','Professional Certification Deleted Successfully!!');
            return redirect()->back()->with('status_color','success');
            }else{
            Session::flash('flash_message','Something Error Found.');
            return redirect()->back()->with('status_color','danger');
            }
    }



}
