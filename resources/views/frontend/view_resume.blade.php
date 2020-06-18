@extends('frontend.master')
@section('title','View Resume')
@section('content')
<section class="welcome">
	<div class="site-section bg-light">
      <div class="container">
        <div class="row" style="margin-top:100px;">
          <!-- <div class="col-md-2 border rounded center">
              <h2>Bangladesh</h2>
          </div> -->
             <div class="col-md-2 border rounded">
             	
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
             <div class="col-md-10">
             	<div class="card">
				  <div class="card-header text-white bg-dark"> 
				    View Resume
				  </div>
				  <div class="card-body">
				  	 <div class="row">
				  	 	<div class="col-md-12">
				  	 		<?php 
                                  $candidate_id = Session::get('id');
                                  $candidate = DB::table('candidates')
                                             
                                             ->join('candidate_addresses','candidates.id','=','candidate_addresses.candidate_id')
                                             ->join('candidate_personal_infos','candidates.id','=','candidate_personal_infos.candidate_id')
                                             ->where('candidates.id',$candidate_id)
                                             ->select('candidates.*','candidate_addresses.present_address','candidate_personal_infos.*')
                                             ->get();
                               //return $candidate;
                               foreach ($candidate as $candy) {
                                   
                                             }              
				  	 		 ?>
				  	 		 {{$candidate}}
				  	 		<div class="address" style="float:left;">
				  	 			<h5>{{$candy->fullname}}</h5>
				  	 			<p>{{$candy->present_address}}</p>
				  	 			<p>Email: </p>
				  	 			<p>Phone: </p>
				  	 			
				  	 		</div>
				  	 		<div class="photo" style="float: right;width: 20%;border: 2px solid #000;">
				  	 			<img src="{{asset('frontend/images/ico.png')}}" style="width:100%">
				  	 		</div>

				  	 	</div>
				  	 	   <hr>
				  	 </div>
				  </div>
				</div>
             </div>
        </div>
      </div>
    </div>
</section>
@endsection