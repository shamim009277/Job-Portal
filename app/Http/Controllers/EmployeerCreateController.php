<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employer;
use DB;
use Session;
use Response;
use Validator;

class EmployeerCreateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('frontend.employers.emp_create');
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

                'username'=>'required',
                'password'=>'required',
                'password2'=>'required',
                'company_name'=>'required',
                'company_address'=>'required',
                'industary_type'=>'required',
                'business_description'=>'required',

                'company_licen'=>'required',
                'company_rl'=>'required',
                'company_web'=>'required',
                'con_per_name'=>'required',
                'con_per_designation'=>'required',    
                'con_per_email'=>'required',
                'con_per_mobile'=>'required'
            ]);
        $input = $request->all();
        $input['password'] = bcrypt($request->password);
        $input['password2'] = bcrypt($request->password2);

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
               $insert = Employer::create($input);
                
            } catch (\Exception $e) {
               $bug = $e->errorInfo[1]; 
            }

            if($bug==0){
            Session::flash('flash_message','Employer Account Create Successfully. Now You Can Login Your account!');
            return redirect('/employeer_sign')->with('status_color','success');
            }else{
            Session::flash('flash_message','Something Error Found.');
            return redirect('/employeer_sign')->with('status_color','danger');
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
