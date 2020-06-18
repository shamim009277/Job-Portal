@extends('frontend.master')
@section('title','Candidate Account Setting')
@section('content')
<section class="welcome">
	<div class="site-section bg-light">
      <div class="container">
        <div class="row" style="margin-top:100px;">
          <!-- <div class="col-md-2 border rounded center">
              <h2>Bangladesh</h2>
          </div> -->
             <div class="col-md-3 border rounded">
             	<nav class="navbar navbar-inverse">
				  <ul class="nav navbar-nav">
				    <li><a href="#">Home</a></li>
				  </ul>  
				</nav>
				<div class="para">
					<p>RESUME</p>
				</div>
				<nav class="navbar navbar-inverse">
				  <ul class="nav navbar-nav">
				    <li><a href="#">View Resume</a></li>
				    <li><a href="#">Edit Resume</a></li>
				    <li><a href="#">Uoload Resume</a></li>
				  </ul>  
				</nav>
             </div>
             <div class="col-md-9">
             	<div class="card">
				  <div class="card-header text-white bg-dark">
				    Account Setting
				  </div>
				  @include('common.message')
				  <div class="card-body">
				  	 <form action="{{route('candidate.update',$candidate->id)}}" method="PUT" class="p-5 bg-white">
		           
		              <div class="row form-group">
		                <div class="col-md-6 mb-3 mb-md-0">
		                  <label class="font-weight-bold" for="fullname">Full Name</label>
		                  <input type="text" id="fullname" name="fullname" class="form-control" value="{{$candidate->fullname}}">
		                </div>

		                <div class="col-md-6 mb-3 mb-md-0">  
		                  <label class="font-weight-bold" for="gender">Gender</label>
		                    <select class="form-control" id="gender" name="gender">
		                    	@if(!empty($candidate))
		                    	<option value="{{$candidate->gender}}">{{$candidate->gender}}</option>
		                    	<option value="Male">Male</option>
		                        <option value="Female">Female</option>
		                        <option value="Others">Others</option>
		                    	@else
		                    	<option value="">Select</option>
		                        <option value="Male">Male</option>
		                        <option value="Female">Female</option>
		                        <option value="Others">Others</option>
		                    	@endif
		                      
		                    </select>
		                </div>
		              </div>

		              <div class="row form-group mb-5">
		                <div class="col-md-12 mb-3 mb-md-0">
		                  <label class="font-weight-bold" for="email">Email</label>
		                  <input type="text" id="email" name="email" class="form-control" value="{{$candidate->email}}">
		                </div>
		              </div>

		              <div class="row form-group mb-5">
		                <div class="col-md-12 mb-3 mb-md-0">
		                  <label class="font-weight-bold" for="fullname">Mobile</label>
		                  <input type="text" id="mobile" name="mobile" class="form-control" value="{{$candidate->mobile}}">
		                </div>
		              </div>

		              <div class="row form-group mb-5">
		                <div class="col-md-6 mb-3 mb-md-0">
		                  <label class="font-weight-bold" for="fullname">New Password</label>
		                  <input type="password" id="password" name="password" class="form-control">
		                </div>
		                <div class="col-md-6 mb-3 mb-md-0">
		                  <label class="font-weight-bold" for="fullname">Confirm New Password</label>
		                  <input type="password" id="password2" name="password2" class="form-control">
		                </div>
		              </div>

		              <div class="row form-group mb-5">
		                <div class="col-md-12 mb-3 mb-md-0">
		                  <label class="font-weight-bold" for="fullname">Old Password</label>
		                  <input type="password" id="password" name="new_password" class="form-control">
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
             </div>
        </div>
      </div>
    </div>
</section>
@endsection