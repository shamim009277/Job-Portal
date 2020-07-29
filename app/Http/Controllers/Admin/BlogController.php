<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;
use Session;
use DB;
use Validator;
use Response;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogs = Blog::get();
        return view ('admin.recent_blog.List',compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.recent_blog.add_edit');
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
            
            'title'=>'required',
            'description'=>'required',
            'photo'=>'required',
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
        //return $input;
        $input['title'] = $request->title;
        $input['description'] = $request->description;
        $input['status'] = $request->status;

        $image = $request->file('photo');
        if ($image) {
            //$img_name = $image->getClientOriginalName();
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = uniqid().".".$ext;
            $image_path = 'blog_image/';
            $image_url = $image_path.$image_full_name;
            $success=$image->move($image_path,$image_full_name);
            if ($success) {
                $input['photo'] = $image_full_name;
            }            
        }else{
            $input['photo'] = 'default.png';
        }
        try{
            $bug = 0;
            $insert = Blog::create($input);
        }catch(\Exception $e){
            $bug=$e->errorInfo[1];
        }
        if($bug==0){
        Session::flash('flash_message','Blogs Added Successfully !');
        return redirect('/category')->with('status_color','success');
        }else{
        Session::flash('flash_message','Something Error Found.');
        return redirect('/category')->with('status_color','danger');
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
        $editBlog = Blog::findorFail($id);
        return view ('admin.recent_blog.add_edit',compact('editBlog'));
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
        /*$validator = Validator::make($request->all(),[
            
            'title'=>'required',
            'description'=>'required',
            'photo'=>'required',
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
        }*/

        $edit = Blog::findorFail($id);
        $input = $request->all();

        $input['title']       = $request->title;
        $input['description'] = $request->description;
        
        if (($request->file('new_photo')) !== ($edit->photo)) {

         $image = $request->file('new_photo');
           if ($image) {
            //$img_name = $image->getClientOriginalName();
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = uniqid().".".$ext;
            $image_path = 'blog_image/';
            $image_url = $image_path.$image_full_name;
            $success=$image->move($image_path,$image_full_name);
            if ($success) {
                $old_image = $image_path.$edit->photo;
                if (file_exists($old_image)) {
                    @unlink($old_image);
                }
                $input['photo'] = $image_full_name;
            }            
        }
            
        }else{
            $input['photo'] = $edit->logo;
        }
        try {
            $bug = 0;
            $edit->update($input);
            
        } catch (\Exception $e) {
            $bug = $e->errorInfo[1];
        }

        if($bug==0){
        Session::flash('flash_message','Blog Edited Successfully !');
        return redirect('/blog')->with('status_color','success');
        }else{
        Session::flash('flash_message','Something Error Found.');
        return redirect('/blog')->with('status_color','danger');
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
