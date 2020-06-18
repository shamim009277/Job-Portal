@extends('frontend.master')
@section('title','Candidate Dashboard')
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