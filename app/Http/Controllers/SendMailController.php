<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;
use Alert;


class SendMailController extends Controller
{
    public function sendview(){
    	return view('frontend.email_resume');
    }
    public function store(Request $request){
    	/*return $request->all();*/
    	$data = array(

                 'my_email'        =>$request->my_email,
                 'company_email'   =>$request->company_email,
                 'subject'         =>$request->subject,
                 'file'            =>$request->file,
                 'message'         =>$request->message,

    		);

        Mail::to($data['company_email'])->send( new SendMail($data));
        toast('Your Email Has Been Send Successfully!','success');
        return redirect()->back();
    }
}
