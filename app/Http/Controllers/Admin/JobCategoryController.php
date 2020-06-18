<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Jobcategory;
use Session;
use DB;
use Validator;
use Response;

class JobCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $all_category = Jobcategory::
                       get();
        return view('admin.job_category.List',compact('all_category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.job_category.add_edit');
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
               
               'category_name'=>'required',
               'status'=>'required'
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

        try{
            $bug = 0;
            $insert = JobCategory::create($input);
        }catch(\Exception $e){
            $bug=$e->errorInfo[1];
        }
        if($bug==0){
        Session::flash('flash_message','Category Added Successfully !');
        return redirect('/category')->with('status_color','success');
        }else{
        Session::flash('flash_message','Something Error Found.');
        return redirect('/category')->with('status_color','danger');
        } 
        //return $allCategory;
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
        $edit_category = JobCategory::findOrFail($id);
        return view('admin.job_category.add_edit',compact('edit_category'));
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
        $validator = Validator::make($request->all(),[
               
               'category_name'=>'required',
               'status'=>'required'
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

        try{
            $bug = 0;
            $insert = JobCategory::update($input);
        }catch(\Exception $e){
            $bug=$e->errorInfo[1];
        }
        if($bug==0){
        Session::flash('flash_message','Category Added Successfully !');
        return redirect('/category')->with('status_color','success');
        }else{
        Session::flash('flash_message','Something Error Found.');
        return redirect('/category')->with('status_color','danger');
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
        //
    }
}



