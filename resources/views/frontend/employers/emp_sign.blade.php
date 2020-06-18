@extends('frontend.master')
@section('title','Employers Signin')
@section('content')
<section class="employers_signin">
	<div class="site-section bg-light">
      <div class="container">
        <div class="row">
          <div class="col-lg-5 col-sm-10 center" style="margin-top:100px;">
            <div class="cusLogin" style="margin: 0 auto;text-align: center;">
             @include('common.message')
            <form action="{{url('/employer_signin')}}" method="POST" class="p-4 border rounded" style="background-color: #375a5a;">
              @csrf
               <div class="logo">
                  <img src="{{asset('frontend/images/person_1.jpg')}}" style="width: 40%;border-radius: 50%;">
               </div>

              <div class="row form-group">
                <div class="col-md-12 mb-3 mb-md-0">
                  <label class="text-black" for="fname">Username</label>
                  <input type="text" id="username" name="username" class="form-control" placeholder="Username or Email ...">
                </div>
              </div>
              <div class="row form-group mb-4">
                <div class="col-md-12 mb-3 mb-md-0">
                  <label class="text-black" for="fname">Password</label>
                  <input type="password" id="password" name="password" class="form-control" placeholder="Password ...">
                </div>
              </div>

              <div class="row form-group">
                <div class="col-md-12">
                  <input type="submit" value="Log In" class="btn px-4 btn-primary btn-sm text-white">
                </div>
              </div>
              <hr style="background-color: #c1c1c1;">
              <hr width="80%" style="background-color: #c1c1c1;">
              <h4 style="color: #90C317;">Don't have account?</h4>
              <a href="{{URL::to('/employeer')}}" class="btn btn-info btn-sm text-black">Create Account</a>
            </form>
            </div>   
          </div>
          <div class="col-md-7 col-sm-10" style="margin-top:100px;">    
            <div class="Login">
            	<h4>Shortlisted Jobs & other Features</h4>
        				<p>Save yourself from unwanted hassle!</p>

        				<p>Use Shortlisted Jobs feature to save preferred jobs and get back to it easily.</p>

        				<p>Stay up-to-date with statistical report of job activities.</p>
            </div>
          </div>          
        </div>
      </div>
    </div>
</section>
@endsection