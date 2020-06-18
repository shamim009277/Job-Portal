@extends('frontend.master')
@section('title','Employer Dashboard')
@section('content')
<section class="welcome">
	<div class="site-section bg-light">
      <div class="container">
        <div class="row" style="margin-top:100px;">
          <!-- <div class="col-md-2 border rounded center">
              <h2>Bangladesh</h2>
          </div> -->
             <div class="col-md-3 border rounded" >
             	<nav class="navbar navbar-inverse" style="background-color: #343A40;">
				  <ul class="nav navbar-nav">
				    <li><a href="#" style="padding: 2px 10px;color: #fff;"><i class="fa fa-home" aria-hidden="true"></i> Home</a></li>
				  </ul>  
				</nav>
				<div class="para">
					<p>RESUME</p>
				</div>
				<?php 
				     $employer_id = Session::get('employer_id');

				 ?>

				<nav class="navbar navbar-inverse" style="background-color: #343A40;">
				  <ul class="nav navbar-nav">
				    <li><a href="#" style="font-weight: bold;font-family: -webkit-pictograph;"><i class="fa fa-university" aria-hidden="true"></i> Company Info</a></li>
				    <li><a href="{{URL::to('/employeer/job_posts',$employer_id)}}" style="font-weight: bold;font-family: -webkit-pictograph;" target="blank"><i class="fa fa-id-card" aria-hidden="true"></i> Post Job</a></li>
				  </ul>  
				</nav>
             </div>
             <div class="col-md-9">
             	<div class="card">
             		@include('common.message')
				  <div class="card-header text-white bg-dark">
				    My Status 
				  </div>
				  <div class="card-body">
				  	 <div class="para" style="background-color: #E9EBEC;"><p style="padding: 10px;">Here you can check your detailed states like Companies viewed my Resume, Online Application, Emailed Resume, Shortlisted Jobs etc. Beside My Stats in Edit Resume option you can find all features at a glance to add/update.</p></div>
				     <table class="table table-hover">
					  <tbody>
					    <tr>
					      <th scope="row">Companies viewed my Resume</th>
					      <td>2</td>
					    </tr>
					    <tr>
					      <th scope="row">Online Application</th>
					      <td>2</td>
					    </tr>
					    <tr>
					      <th scope="row">Emailed Resume</th>
					      <td>2</td>
					    </tr>
					  </tbody>
					</table>
				  </div>
				</div>
             </div>
        </div>
      </div>
    </div>
</section>
@endsection