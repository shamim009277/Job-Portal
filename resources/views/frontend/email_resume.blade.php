@extends('frontend.master')
@section('title','Send Email')
@push('css')
<style type="text/css">
     .bar{
     	background-color: #000000;
        border-radius: 2px;
     }
     .para{
     	background-color: #D9D9D9;
	    border-radius: 2px;
	    padding: 5px 5px;
	    font-weight: 500;
	    color: #483333;
     }
     .center{
     	margin:auto;
     }
</style>
@endpush
@section('content')
<section class="welcome">
	<div class="site-section bg-light">
      <div class="container">
        <div class="row" style="margin-top:100px;">
          <!-- <div class="col-md-2 border rounded center">
              <h2>Bangladesh</h2>
          </div> -->
             <div class="col-md-3">
             	<nav class="navbar navbar-inverse bar">
				  <ul class="nav navbar-nav">
				    <li><a href="#">Home</a></li>
				  </ul>  
				</nav>
				<div class="">
					<p>RESUME</p>
				</div>
				<nav class="navbar navbar-inverse bar">
				  <ul class="nav navbar-nav">
				    <li><a href="#">View Resume</a></li>
				    <li><a href="#">Edit Resume</a></li>
				    <li><a href="{{url('/upload_resume')}}">Uoload Resume</a></li>
				    <li><a href="#">Email Resume</a></li>
				  </ul>  
				</nav>
             </div>
             <div class="col-md-9">
             	<div class="card">
				  <div class="card-header text-white bg-dark">
				    Send Mail
				  </div>
				  <div class="card-body">
				  	 <div class="row">
                        <div class="col-md-12">
                           <p class="para">Email Resume to a Company</p>
                        </div>
				  	 </div>
				  	 <div class="row">
                        <div class="col-md-12">
                           {{Form::open(array('url'=>'/sendEmail/send','method'=>'post','files'=>'true'))}}

                              <div class="row form-group">
                                 <div class="col-md-11 mb-3 mb-md-0 center">
					                  <label for="fullname" class="font-weight-bold">My Email</label>
					                  <input type="text" name="my_email" class="form-control">
				                 </div>
                              </div>
                              <div class="row form-group">
                                 <div class="col-md-11 mb-3 mb-md-0 center">
					                  <label for="fullname" class="font-weight-bold">Company Email</label>
					                  <input type="text" name="company_email" class="form-control" placeholder="Company Email Address..">
				                 </div>
                              </div>
                              <div class="row form-group">
                                 <div class="col-md-11 mb-3 mb-md-0 center">
					                  <label for="fullname" class="font-weight-bold">Subject</label>
					                  <input type="text" name="subject" class="form-control" placeholder="Type a subject">
				                 </div>
                              </div>
                              <div class="row form-group">
                                 <div class="col-md-11 mb-3 mb-md-0 center">
					                  <label for="fullname" class="font-weight-bold">File</label>
					                  <input type="file" name="file" class="form-control">
				                 </div>
                              </div>
                              
							  <div class="row form-group">
                                 <div class="col-md-11 mb-3 mb-md-0 center">
					                  <label for="fullname" class="font-weight-bold">Message</label>
					                  <textarea class="form-control" rows="5" name="message" id="comment"></textarea>
				                 </div>
                              </div>
                              <div class="row form-group">
				                <div class="col-md-11 center">
				                  <input type="submit" value="Send Message" class="btn btn-primary  py-2 px-5">
				                </div>
				              </div>
                           {!! Form::close() !!}
                        </div>
				  	 </div>
				     
				  </div>
				</div>
             </div>
        </div>
      </div>
    </div>
    @include('sweetalert::alert')
</section>
@endsection