@extends('frontend.master')
@section('title','Candidate Create Account')
@section('content')
<section class="customerlogin">
	<div class="site-section bg-light">
      <div class="container">
        <div class="row">
          <div class="col-lg-8 center" style="margin-top:100px;">
            <div class="cusLogin border rounded">
              @include('common.message')
              <form action="{{route('candidate.store')}}" method="POST" class="p-5 bg-white">
                @csrf
                <h3 class="font-weight-bold" style="color:#90C317;">Create Account</h3>
              <div class="row form-group">
                <div class="col-md-6 mb-3 mb-md-0">
                  <label class="font-weight-bold" for="fullname">Full Name</label>
                  <input type="text" id="fullname" name="fullname" class="form-control" placeholder="eg. Enter Your Full Name">
                </div>

                <div class="col-md-6 mb-3 mb-md-0">  
                  <label class="font-weight-bold" for="gender">Gender</label>
                    <select class="form-control" id="gender" name="gender">
                      <option value="">Select</option>
                      <option value="Male">Male</option>
                      <option value="Female">Female</option>
                      <option value="Others">Others</option>
                    </select>
                </div>
              </div>

              <div class="row form-group mb-5">
                <div class="col-md-12 mb-3 mb-md-0">
                  <label class="font-weight-bold" for="email">Email</label>
                  <input type="text" id="email" name="email" class="form-control" placeholder="eg. example95@gmail.com">
                </div>
              </div>

              <div class="row form-group mb-5">
                <div class="col-md-6 mb-3 mb-md-0">
                  <label class="font-weight-bold" for="fullname">Password</label>
                  <input type="password" id="password" name="password" class="form-control" placeholder="eg. your password">
                </div>
                <div class="col-md-6 mb-3 mb-md-0">
                  <label class="font-weight-bold" for="fullname">Confirm Password</label>
                  <input type="password" id="password2" name="password2" class="form-control" placeholder="eg. Retype your password">
                </div>
              </div>
              
              <div class="row form-group mb-5">
                <div class="col-md-12 mb-3 mb-md-0">
                  <label class="font-weight-bold" for="fullname">Mobile</label>
                  <input type="text" id="mobile" name="mobile" class="form-control" placeholder="eg. 01726340588">
                </div>
              </div>

              <div class="row form-group">
                <div class="col-md-12">
                  <input type="submit" value="Create Account" class="btn btn-primary  py-2 px-5">
                </div>
              </div>

            </form>
            
            </div>   
          </div>
           
          <div class="col-lg-4" style="margin-top:100px;" >
              <div class="sidenote border rounded" style="margin-top: 0px;">
                 <img src="{{asset('frontend/images/ico.png')}}" alt="image" style="float: left;width: 20%;border-radius: 50%;margin-right: 10px;">
                 <p style="font-style: italic;text-align: left;">Get instant Notification about New job Posting, Match Jobs and More.</p>
              </div>
              <div class="sidenote border rounded" style="margin-top: 10px;">
                 <img src="{{asset('frontend/images/ico.png')}}" alt="image" style="float: left;width: 20%;border-radius: 50%;margin-right: 10px;">
                 <p style="font-style: italic;text-align: left;">Get instant Notification about New job Posting, Match Jobs and More.</p>
              </div>
              <div class="sidenote border rounded" style="margin-top: 10px;">
                 <img src="{{asset('frontend/images/ico.png')}}" alt="image" style="float: left;width: 20%;border-radius: 50%;margin-right: 10px;">
                 <p style="font-style: italic;text-align: left;">Get instant Notification about New job Posting, Match Jobs and More.</p>
              </div>
              <div class="sidenote border rounded" style="margin-top: 10px;">
                 <img src="{{asset('frontend/images/ico.png')}}" alt="image" style="float: left;width: 20%;border-radius: 50%;margin-right: 10px;">
                 <p style="font-style: italic;text-align: left;">Get instant Notification about New job Posting, Match Jobs and More.</p>
              </div>
          </div>
        </div>
      </div>
    </div>
</section>
@endsection