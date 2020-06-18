<div class="site-navbar-wrap js-site-navbar bg-white">
	
	<section id="top nav">
	   <nav class="navbar navbar-expand-lg navbar-light bg-light">
	    <div class="container">
		   <div class="row">
		     <div class="col-md-8">
				  <ul class="navbar-nav mr-auto">
					  <li class="nav-item active">
						<a class="nav-link" href="#">JOBS</a>
					  </li>
					  <li class="nav-item">
						<a class="nav-link" href="{{URL::to('/job')}}">MYBDJOBS</a>
					  </li>
					  <li class="nav-item">
						<a class="nav-link" href="{{URL::to('/employeer_sign')}}">EMPLOYERS</a>
					 </li>
				   </ul>
	    
		     </div>        
		  </div> 
		  <div class="row">
             
        <div class="site-navbar" style="margin-right: 15px;background-color: #F8F9FA !important">
          <div class="py-1">
            <div class="row align-items-center">
              <div class="col-12">
                <nav class="mx-auto site-navigation text-right">
		            <ul class="site-menu js-clone-nav">
		              
                      <?php 
                          $con_per_name = Session::get('con_per_name');
                       ?>
                       @if(!empty($con_per_name))
		              <img src="{{asset('frontend/images/person_1.jpg')}}" style="width: 4%;border-radius: 50%;">
		              <li class="has-children">
		                <a href="#" style="text-transform: none;font-family: auto;font-weight: bold;padding-right: 25px;"><?php echo $con_per_name; ?></a>
		                <ul class="dropdown">
		                  
		                  <li><a href="" style="text-transform: none;font-family: auto;font-weight: bold;padding-right: 25px;">View Resume</a></li>
		                  <li><a href="" style="text-transform: none;font-family: auto;font-weight: bold;padding-right: 25px;">Email Resume</a></li>
		                  
		                  <li><a href="" style="text-transform: none;font-family: auto;font-weight: bold;padding-right: 25px;"><i class="fa fa-cog" aria-hidden="true"></i> Setting</a></li>
		                  <li><a href="{{URL::to('/emp_logout')}}" style="text-transform: none;font-family: auto;font-weight: bold;padding-right: 25px;"><i class="fa fa-sign-out" aria-hidden="true"></i> Logout</a></li>
		                  
		                </ul>
		              </li>
		              @endif

		            </ul>
		        </nav>
              </div>
            </div>
          </div>
        </div>
      
		  </div>
		</div>	  
	   </nav>
	</section>
	
      <div class="container">
        <div class="site-navbar bg-light">
          <div class="py-1">
            <div class="row align-items-center">
              <div class="col-2">
                <h2 class="mb-0 site-logo"><a href="index.html">Job<strong class="font-weight-bold">Finder</strong> </a></h2>
              </div>
              <div class="col-10">
                 <!-- <nav class="site-navigation text-right" role="navigation">
                  <div class="container">
                    <ul class="site-menu d-none d-lg-block">
                      <li><a href="{{URL::to('/can_signin')}}">For Candidates</a></li>
                      <li><a href="#">Contact</a></li>
                      <li><a href="#"><img src="">Name</a></li>
                      
                    </ul>
                  </div>
                </nav>  -->
                <nav class="mx-auto site-navigation text-right">
		            <ul class="site-menu js-clone-nav d-none d-xl-block ml-0 pl-0">
		              <li><a href="" class="nav-link active" style="text-transform: none;font-family: auto;font-weight: bold;">Home</a></li>
		              <li><a href="{{URL::to('/can_signin')}}" class="nav-link active" style="text-transform: none;font-family: auto;font-weight: bold;">For Candidates</a></li>
                      <?php 
                          $user_name = Session::get('fullname');
                          $id = Session::get('id');
                       ?>
                       @if(!empty($user_name))
		              <img src="{{asset('frontend/images/person_1.jpg')}}" style="width: 4%;border-radius: 50%;">
		              <li class="has-children">
		                <a href="#" style="text-transform: none;font-family: auto;font-weight: bold;padding-right: 25px;"><?php echo $user_name; ?></a>
		                <ul class="dropdown">
		                  <li><a href="{{URL::to('/edit_resume')}}" style="text-transform: none;font-family: auto;font-weight: bold;padding-right: 25px;">Edit Resume</a></li>
		                  <li><a href="{{URL::to('/candidate_dashboard/view_resume')}}" style="text-transform: none;font-family: auto;font-weight: bold;padding-right: 25px;">View Resume</a></li>
		                  <li><a href="" style="text-transform: none;font-family: auto;font-weight: bold;padding-right: 25px;">Email Resume</a></li>
		                  <hr>
		                  <li><a href="{{route('candidate.edit',$id)}}" style="text-transform: none;font-family: auto;font-weight: bold;padding-right: 25px;"><i class="fa fa-cog" aria-hidden="true"></i> Setting</a></li>
		                  <li><a href="{{URL::to('/candidate_logout')}}" style="text-transform: none;font-family: auto;font-weight: bold;padding-right: 25px;"><i class="fa fa-sign-out" aria-hidden="true"></i> Logout</a></li>
		                  
		                </ul>
		              </li>
		              @endif

		            </ul>
		        </nav>
              </div>
            </div>
          </div>
        </div>
      </div>
</div>