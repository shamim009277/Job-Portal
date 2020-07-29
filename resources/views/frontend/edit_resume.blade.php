@extends('frontend.master')
@section('title','Edit Resume')
@push('css')
<style type="text/css">
   .categories{
	    display: block;
	    background-color: #91a9bd;
	    float: left;
	    padding: 8px;
	    margin-right: 10px;
	    margin-top: 5px;
	    border-radius: 4px;
	    text-align: center;  	  
   }
   .text{
   	 color:#1D9B72;
   	 /*border: none; */
   }
   .bar{
     	background-color: #000000;
        border-radius: 5px;
        margin-top:20px;
     }
     .para{
     	background-color: #E9EBEC;
     	border-radius: 5px;
     }
     .photograph{
     	border: 1px dotted #dee2e6;
     	padding: 20px;
     }
     .center{
     	margin: auto;
     }
     .item_center{
     	text-align:center;
     }

</style>
@endpush
@section('content')
  <section class="editresume">
      <div class="site-section bg-light">
      <div class="container">
        <div class="row" style="margin-top:100px;">
          <!-- <div class="col-md-2 border rounded center">
              <h2>Bangladesh</h2>
          </div> -->
          <div class="col-md-2" style="background-color:white;">
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
				    <li><a href="#">Uoload Resume</a></li>
				  </ul>  
				</nav>

          </div>
          <div class="col-md-10 center" style="background-color:white;">
          	<p style="padding: 12px 12px;font-family: -webkit-pictograph;font-size: 18px;">Here you can edit your resume in five different steps (Personal, Education/ Training, Employment, Other Information and Photograph). To enrich your resume provide authentic information.</p>
          	<h4 style="padding: 6px 14px;font-size: 18px;font-weight: bold;font-family: -webkit-pictograph;">Home || Edit Resume</h4>
          	<div class="row">
               <div class="col-sm-12">
                   <nav class="navbar navbar-expand-md bg-dark navbar-dark" style="margin: 0px 15px;border-radius: 8px;">
					  <a class="navbar-brand" href="#"><i class="fa fa-graduation-cap" aria-hidden="true"></i> Personal</a>
					  <!-- Navbar links -->
					</nav>
               </div>
          	</div>

            <!--Personal Information-->

              <div class="box" style="padding: 20px 15px; ">
                  <div class="row" style="background: #F8F9FA; background-color:white;">
                  	<div class="col-md-12">
                      <div id="accordion">
                       @include('common.message')
					  <div class="card">
					    <div class="card-header">
					      <a class="card-link" data-toggle="collapse" href="#collapseOne" style="font-weight: bold;">
					        Personal Details
					      </a>

					      <?php 
					             $id = Session::get('id');
                                 $singleInfo = DB::table('candidate_personal_infos')
                                             ->where('candidate_id',$id)
                                             ->first();
                                 //dd($singleInfo);            

					       ?>
					    </div>
					     
					    <div id="collapseOne" class="collapse show" data-parent="#accordion">
					      <div class="card-body">
					      	@if(!empty($singleInfo))
					      	 {{Form::open(array('route'=>['edit_resume.update',$singleInfo->id],'method'=>'put','files'=>true))}}
					      	 <?php $btn = "Edit Information"; ?>
					      	@else
					        {{Form::open(array('route'=>['edit_resume.store'],'method'=>'POST','files'=>'true'))}}
					        <?php $btn = "Add Info"; ?>
					        @endif
				              <div class="row form-group">
				              	<?php 
                                      $candidate_id = Session::get('id');

				              	 ?>
				                <div class="col-md-6 mb-3 mb-md-0">
				                  <label class="font-weight-bold" for="fullname">First Name<span class="text-danger"> *</span></label>
				                  <input type="text" id="fname" name="fname" value="{{isset($singleInfo->fname)?$singleInfo->fname:old('fname')}}" class="form-control" placeholder="eg. Shamim">
				                  <input type="hidden" name="candidate_id" value="<?php echo $candidate_id; ?>">
				                </div>
				                <div class="col-md-6 mb-3 mb-md-0">
				                  <label class="font-weight-bold" for="fullname">Last Name <span class="text-danger"> *</span></label>
				                  <input type="text" id="lname" name="lname" value="{{isset($singleInfo->lname)?$singleInfo->lname:old('lname')}}" class="form-control" placeholder="eg. Hassan">
				                </div>
				              </div>

				              <div class="row form-group">
				                <div class="col-md-6 mb-3 mb-md-0">
				                  <label class="font-weight-bold" for="fullname">Father's Name<span class="text-danger"> *</span></label>
				                  <input type="text" id="father_name" name="father_name" value="{{isset($singleInfo->father_name)?$singleInfo->father_name:old('father_name')}}" class="form-control" placeholder="eg. Your Father Name">
				                </div>
				                <div class="col-md-6 mb-3 mb-md-0">
				                  <label class="font-weight-bold" for="fullname">Mother's Name <span class="text-danger"> *</span></label>
				                  <input type="text" id="mother_name" name="mother_name" value="{{isset($singleInfo->mother_name)?$singleInfo->mother_name:old('mother_name')}}" class="form-control" placeholder="eg. Your Mother Name">
				                </div>
				              </div>

				              <div class="row form-group">
				                <div class="col-md-6 mb-3 mb-md-0">
				                  <label class="font-weight-bold" for="fullname">National Id No</label>
				                  <input type="text" id="nid" name="nid" class="form-control" value="{{isset($singleInfo->nid)?$singleInfo->nid:old('nid')}}" placeholder="eg. Your Name">
				                </div>
				                <div class="col-md-6 mb-3 mb-md-0">
				                  <label class="font-weight-bold" for="fullname">Passport Number</label>
				                  <input type="text" id="pass_num" name="pass_num" class="form-control" value="{{isset($singleInfo->pass_num)?$singleInfo->pass_num:old('pass_num')}}" placeholder="eg. Your Passport Number">
				                </div>
				              </div>

				              <div class="row form-group">
				                <div class="col-md-6 mb-3 mb-md-0">
				                  <label class="font-weight-bold" for="fullname">Date of Birth</label>
				                  <input type="date" id="birth_date" name="birth_date" value="{{isset($singleInfo->birth_date)?$singleInfo->birth_date:old('birth_date')}}" class="form-control">
				                </div>
				                <div class="col-md-6 mb-3 mb-md-0">
				                  <label class="font-weight-bold" for="fullname">Passport Issue Date</label>
				                  <input type="date" id="nissue_date" name="nissue_date" value="{{isset($singleInfo->nissue_date)?$singleInfo->nissue_date:old('nissue_date')}}" class="form-control">
				                </div>
				              </div>

				              <div class="row form-group">
				                <div class="col-md-6 mb-3 mb-md-0">
				                  <label class="font-weight-bold" for="gender">Gender</label>
				                  <select class="form-control" name="gender" id="gender">
                                      
                                      @if(!empty($singleInfo->gender))
                                      <option value="{{$singleInfo->gender}} {{'selected'}}">{{$singleInfo->gender}}</option>
                                      <option value="">Select</option>
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
				                <div class="col-md-6 mb-3 mb-md-0">
				                  <label class="font-weight-bold" for="fullname">Mobile Number</label>
				                  <input type="text" id="mobile_number" name="mobile_number" value="{{isset($singleInfo->mobile_number)?$singleInfo->mobile_number:old('mobile_number')}}" class="form-control">
				                </div>
				              </div>

				              <div class="row form-group">
				                <div class="col-md-6 mb-3 mb-md-0">
				                  <label class="font-weight-bold" for="religion">Religion</label>
				                  <select class="form-control" name="religion" id="religion" value="{{isset($singleInfo->religion)?$singleInfo->religion:old('religion')}}">
				                  	  @if(!empty($singleInfo->religion))
				      
				                  	  <option value="{{$singleInfo->religion}}">{{$singleInfo->religion}}</option>
                                      <option value="Islam">Islam</option>
                                      <option value="Hinduism">Hinduism</option>
                                      <option value="Christianity">Christianity</option>
                                      <option value="Others">Others</option>
				                  	  @else
				                  	  <option value="">Select</option>
                                      <option value="Islam">Islam</option>
                                      <option value="Hinduism">Hinduism</option>
                                      <option value="Christianity">Christianity</option>
                                      <option value="Others">Others</option>
				                  	  @endif
                                      
				                  </select>      
				                </div>
				                <div class="col-md-6 mb-3 mb-md-0">
				                  <label class="font-weight-bold" for="fullname">Marital status</label>
				                  <select class="form-control" name="marital_status" id="marital_status">
				                  	  @if(!empty($singleInfo->marital_status))
				                  	  <option value="{{$singleInfo->marital_status}}">{{$singleInfo->marital_status}}</option>
                                      <option value="Married">Married</option>
                                      <option value="Unmarried">Unmarried</option>
                                      <option value="Single">Single</option>
				                  	  @else
				                  	  <option value="">Select</option>
                                      <option value="Married">Married</option>
                                      <option value="Unmarried">Unmarried</option>
                                      <option value="Single">Single</option>
				                  	  @endif
                                      
				                  </select> 
				                </div>
				              </div>

				              <div class="row form-group mb-5">
				                <div class="col-md-6 mb-3 mb-md-0">
				                  <label class="font-weight-bold" for="fullname">Email</label>
				                  <input type="text" id="email" name="email" value="{{isset($singleInfo->email)?$singleInfo->email:old('email')}}" class="form-control" placeholder="eg. example95@gmail.com">
				                </div>
				                <div class="col-md-6 mb-3 mb-md-0">
				                  <label class="font-weight-bold" for="fullname">Nationality </label>
				                  <input type="text" id="nationality" name="nationality" class="form-control" value="Bangladeshi" readonly>
				                </div>
				              </div>

				              <div class="row form-group">
				                <div class="col-md-12">
				                  <input type="submit" value="<?php echo $btn; ?>" class="btn btn-primary  py-2 px-5">
				                </div>
				              </div>
				            {!! Form::close() !!}
					      </div>
					    </div>
					  </div>

					  <div class="card">
					    <div class="card-header">
					      <a class="card-link" data-toggle="collapse" href="#collapseTwo" style="font-weight: bold;">
					        Address Details
					      </a>
					    </div>
					    <?php 
                              $id = Session::get('id');
                              $address = DB::table('candidate_addresses')
                                       ->where('candidate_id',$id)
                                       ->first();
					     ?>
					    <div id="collapseTwo" class="collapse" data-parent="#accordion">
					      <div class="card-body">
					      @if(!empty($address))
					      {{Form::open(array('route'=>['address.update',$address->id],'method'=>'put','files'=>'true'))}}
					      <?php $btn="Edit Info"; ?>
					      @else
                          {{Form::open(array('route'=>['address.store'],'method'=>'post','files'=>'true'))}}
                          <?php $btn="Add Info"; ?>
                          @endif
					         <div class="row form-group">
					         	<?php 
                                      $candidate_id = Session::get('id');

				              	 ?>
				                <div class="col-md-6 mb-3 mb-md-0">
				                  <label class="font-weight-bold" for="fullname">Present Address</label><br>
				                  <input type="hidden" name="candidate_id" value="<?php echo $candidate_id; ?>">
				                  @if(isset($address->present_address))
				                  <textarea class="form-control" name="present_address" id="present_address">{{$address->present_address}}
				                  </textarea>
				                  @else
				                  <textarea class="form-control" name="present_address" id="present_address">
				                  </textarea>
				                  @endif
				                </div>
				                <div class="col-md-6 mb-3 mb-md-0">
				                  <label class="font-weight-bold" for="fullname">Parmanent Address</label><br>
				                  @if(isset($address->permanent_address))
				                  <textarea class="form-control" name="permanent_address" id="permanent_address">{{$address->permanent_address}}
				                  </textarea>
				                  @else
				                  <textarea class="form-control" name="permanent_address" id="permanent_address">
				                  </textarea>
				                  @endif
				                </div>
				             </div>
				             <div class="row form-group">
				                <div class="col-md-12">
				                  <input type="submit" value="<?php echo $btn; ?>" class="btn btn-primary  py-2 px-5">
				                </div>
				             </div>
                           {!! Form::close() !!}
					      </div>
					    </div>
					  </div>

					  <div class="card">
					    <div class="card-header">
					      <a class="collapsed card-link" data-toggle="collapse" href="#collapseThree" style="font-weight: bold;">
					        Career and Application Information
					      </a>
					    </div>
	                        <?php 
	                              $id = Session::get('id');
                                  $career = DB::table('candidate_career_infos')
                                           ->where('candidate_id',$id)
                                           ->first();
	                         ?>

					    <div id="collapseThree" class="collapse" data-parent="#accordion">
					      <div class="card-body">
					      	@if(!empty($career))
					      	{{Form::open(array('route'=>['career.update',$career->id],'method'=>'put','files'=>'true'))}}
					      	<?php $btn = "Edit Info"; ?>
					      	@else
					      	{{Form::open(array('route'=>['career.store'],'method'=>'post','files'=>'true'))}}
					      	<?php $btn = "Add Info"; ?>
					      	@endif
					          <div class="row form-group">
					          	<?php 
                                      $candidate_id = Session::get('id');
				              	 ?>
				                <div class="col-md-12 mb-3 mb-md-0">
				                  <label class="font-weight-bold" for="Objective">Objective</label>
				                  <input type="hidden" name="candidate_id" value="<?php echo $candidate_id; ?>">
				                  @if(isset($career->Objective))
				                  <textarea class="form-control" id="Objective" name="Objective">{{$career->Objective}}</textarea>
				                  @else
				                  <textarea class="form-control" id="Objective" name="Objective"></textarea>
				                  @endif
				                </div>
				              </div>
				              <div class="row form-group mb-5">
				                <div class="col-md-6 mb-3 mb-md-0">
				                  <label class="font-weight-bold" for="Present Salary">Present Salary</label>
				                  <input type="text" id="psalary" name="psalary" value="{{isset($career->psalary)?$career->psalary:old('psalary')}}" class="form-control">
				                </div>
				                <div class="col-md-6 mb-3 mb-md-0">
				                  <label class="font-weight-bold" for="Expected Salary">Expected Salary </label>
				                  <input type="text" id="exsalary" name="exsalary" value="{{isset($career->exsalary) ? $career->exsalary:old('exsalary')}}" class="form-control">
				                </div>
				              </div>

				              <div class="row form-group mb-5">
				                <div class="col-md-6 mb-3 mb-md-0">
				                 <label class="font-weight-bold" for="Job Natuare">Job Label</label><br>
				                 @if(isset($career->joblavel))
				                  <div class="custom-control custom-radio">
								      <input type="radio" class="custom-control-input" id="male" name="joblavel" value="Beginer">
								      <label class="custom-control-label" for="male">Beginer</label><br>
								  </div>
								  <div class="custom-control custom-radio">
								      <input type="radio" class="custom-control-input" id="female" name="joblavel" value="Mid Label">
								      <label class="custom-control-label" for="female">Mid Label</label><br>
								  </div>
								  <div class="custom-control custom-radio">
								      <input type="radio" class="custom-control-input" id="other" name="joblavel" value="Expert">
								      <label class="custom-control-label" for="other">Expert</label><br>
								  </div>
								  <a href="#" class="feature">{{$career->joblavel}}</a>
				                 @else
				                  <div class="custom-control custom-radio">
								      <input type="radio" class="custom-control-input" id="male" name="joblavel" value="Beginer">
								      <label class="custom-control-label" for="male">Beginer</label><br>
								  </div>
								  <div class="custom-control custom-radio">
								      <input type="radio" class="custom-control-input" id="female" name="joblavel" value="Mid Label">
								      <label class="custom-control-label" for="female">Mid Label</label><br>
								  </div>
								  <div class="custom-control custom-radio">
								      <input type="radio" class="custom-control-input" id="other" name="joblavel" value="Expert">
								      <label class="custom-control-label" for="other">Expert</label><br>
								  </div>
				                  @endif
				                </div>
				                <div class="col-md-6 mb-3 mb-md-0">
				                  <label class="font-weight-bold" for="Job Natuare">Job Natuare</label>
				                  @if(isset($career->jobnature))
				                  <div class="custom-control custom-checkbox">
								      <label for="part-time">
					                    <input type="checkbox" id="full-time" name="jobnature[]" value="Full Time"> Full Time
					                  </label>
								  </div>
								  <div class="custom-control custom-checkbox">
								      <label for="part-time">
					                    <input type="checkbox" id="part-time" name="jobnature[]" value="Part Time"> Part Time
					                  </label>
								  </div>
								  <div class="custom-control custom-checkbox">
								      <label for="part-time">
					                    <input type="checkbox" id="internship" name="jobnature[]" value="Internship"> Internship
					                  </label>
								  </div>
								  <div class="custom-control custom-checkbox">
								      <label for="part-time">
					                    <input type="checkbox" id="contractual" name="jobnature[]" value="Contractual"> Contractual
					                  </label>
								  </div>
								  <?php 
								        $jobnatures = $career->jobnature;            
                                        $content = json_decode($jobnatures, true);
                                          
								   ?>
								   @foreach($content as $jobnature)
								       <a href="#" class="feature">{{$jobnature}}</a>
								   @endforeach 
				                  @else
				                  <div class="custom-control custom-checkbox">
								      <label for="part-time">
					                    <input type="checkbox" id="full-time" name="jobnature[]" value="Full Time"> Full Time
					                  </label>
								  </div>
								  <div class="custom-control custom-checkbox">
								      <label for="part-time">
					                    <input type="checkbox" id="part-time" name="jobnature[]" value="Part Time"> Part Time
					                  </label>
								  </div>
								  <div class="custom-control custom-checkbox">
								      <label for="part-time">
					                    <input type="checkbox" id="internship" name="jobnature[]" value="Internship"> Internship
					                  </label>
								  </div>
								  <div class="custom-control custom-checkbox">
								      <label for="part-time">
					                    <input type="checkbox" id="contractual" name="jobnature[]" value="Contractual"> Contractual
					                  </label>
								  </div>
								   @endif
				                </div>
				              </div>
				              <div class="row form-group">
				                <div class="col-md-12">
				                  <input type="submit" value="<?php echo $btn; ?>" class="btn btn-primary  py-2 px-5">
				                </div>
				             </div>
                            {!! Form::close() !!}
					      </div>
					    </div>
					  </div>

					  <div class="card">
					    <div class="card-header">
					      <a class="collapsed card-link" data-toggle="collapse" href="#collapseFour" style="font-weight: bold;">
					        Preferred Areas
					      </a>
					    </div>
					      <?php 
                                $id = Session::get('id');
                                $area = DB::table('candidate_preferred_areas')
                                      ->where('candidate_id',$id)
                                      ->first();

					       ?>
					    <div id="collapseFour" class="collapse" data-parent="#accordion">
					      <div class="card-body">
					      	@if(!empty($area))
					      	{{ Form::open(array('route'=>['area.update',$area->id],'method'=>'put','files'=>'true'))}}
					      	  <?php $btn = "Edit Info"; ?>
					      	@else
					      	{{ Form::open(array('route'=>['area.store'],'method'=>'post','files'=>'true'))}}
					      	  <?php $btn = "Add Info"; ?>
					      	@endif
					          <div class="row form-group mb-5">  	
				                <div class="col-md-6 mb-3 mb-md-0">
				                  <label class="font-weight-bold" for="Preferred Job Categories">Preferred Job Categories</label><br>
                                   @if(!empty($area->preferred_job_categories))
                                   <div class="category" style="margin-left: 25px;">
                                   	  <?php 
                                             $categories = DB::table('categories')
                                                       ->where('status',1)
                                                       ->get();
                                            $candidate_id = Session::get('id');           
                                   	   ?>
                                    @foreach($categories as $category)
                                      <input type="hidden" name="candidate_id" value="<?php echo $candidate_id; ?>">
                                      <input type="checkbox" id="preferred_job_categories" name="preferred_job_categories[]" value="{{$category->category_name}}">
									  <label for="preferred_job_categories"> {{$category->category_name}}</label><br>
									@endforeach
                                   </div>
                                    
	                                   <?php 
	                                          $category= $area->preferred_job_categories;      
	                                          $category = json_decode($category, true);
										 ?>
									 @foreach($category as $category)
									   <span class="categories">{{$category}}</span>
									 @endforeach
									 @else
									 <div class="category" style="margin-left: 25px;">
                                   	  <?php 
                                             $categories = DB::table('categories')
                                                       ->where('status',1)
                                                       ->get();
                                            $candidate_id = Session::get('id');           
                                   	   ?>
	                                    @foreach($categories as $category)
	                                      <input type="hidden" name="candidate_id" value="<?php echo $candidate_id; ?>">
	                                      <input type="checkbox" id="preferred_job_categories" name="preferred_job_categories[]" value="{{$category->category_name}}">
										  <label for="preferred_job_categories"> {{$category->category_name}}</label><br>
										@endforeach
                                      </div>
                                     @endif
				                </div>
				                <div class="col-md-6 mb-3 mb-md-0">
				                  <label class="font-weight-bold" for="Preferred Job Location">Preferred Job Location </label><br>
				                  @if(!empty($area->preferred_job_location))
				                  <div class="location" style="margin-left: 25px;">
				                  	<input type="checkbox" id="dhaka" name="preferred_job_location[]" value="Dhaka">
                                    <label for="dhaka"> Dhaka</label><br>
				                  </div>
				                  <div class="location" style="margin-left: 25px;">
				                  	<input type="checkbox" id="rajshahi" name="preferred_job_location[]" value="Rajshahi">
                                    <label for="rajshahi"> Rajshahi</label><br>
				                  </div>
				                  <div class="location" style="margin-left: 25px;">
				                  	<input type="checkbox" id="khulna" name="preferred_job_location[]" value="Khulna">
                                    <label for="khulna"> Khulna</label><br>
				                  </div>
				                  <div class="location" style="margin-left: 25px;">
				                  	<input type="checkbox" id="" name="preferred_job_location[]" value="Barishal">
                                    <label for="barishal"> Barishal</label><br>
				                  </div>
				                  <?php 
                                       $location= $area->preferred_job_location;
                                       $location = json_decode($location, true);  
				                   ?>
				                  @foreach($location as $location)
									   <span class="categories">{{$location}}</span>
								  @endforeach
								  @else
								  <div class="location" style="margin-left: 25px;">
				                  	<input type="checkbox" id="dhaka" name="preferred_job_location[]" value="Dhaka">
                                    <label for="dhaka"> Dhaka</label><br>
				                  </div>
				                  <div class="location" style="margin-left: 25px;">
				                  	<input type="checkbox" id="rajshahi" name="preferred_job_location[]" value="Rajshahi">
                                    <label for="rajshahi"> Rajshahi</label><br>
				                  </div>
				                  <div class="location" style="margin-left: 25px;">
				                  	<input type="checkbox" id="khulna" name="preferred_job_location[]" value="Khulna">
                                    <label for="khulna"> Khulna</label><br>
				                  </div>
				                  <div class="location" style="margin-left: 25px;">
				                  	<input type="checkbox" id="" name="preferred_job_location[]" value="Barishal">
                                    <label for="barishal"> Barishal</label><br>
				                  </div>
								  @endif
				                </div>
				              </div>
				              <div class="row form-group">
				                <div class="col-md-12">
				                  <input type="submit" value="<?php echo $btn; ?>" class="btn btn-primary  py-2 px-5">
				                </div>
				             </div>
				             {!! Form::close() !!}
					      </div>
					    </div>
					  </div>

					</div>
                  </div>
                  </div>
              </div><!--End Personal Information-->

             <div class="row">
               <div class="col-sm-12">
                   <nav class="navbar navbar-expand-md bg-dark navbar-dark" style="margin: 0px 15px;border-radius: 8px;">
					  <a class="navbar-brand" href="#"><i class="fa fa-graduation-cap" aria-hidden="true"></i> Education \ Training</a>
					  <!-- Navbar links -->
					</nav>
               </div>
          	 </div>

 
            <!--Academic Summary-->
             <div class="box" style="padding: 20px 15px; ">
                  <div class="row" style="background: #F8F9FA; background-color:white;">
                  	<div class="col-md-12">
                      <div id="summary">

					  <div class="card">
					    <div class="card-header">
					      <a class="card-link" data-toggle="collapse" href="#educationOne" style="font-weight: bold;">
					        <i class="fa fa-plus"></i> Academic Summary
					      </a>
					    </div>
					    <div id="educationOne" class="collapse show" data-parent="#summary">
					      <div class="card-body">
					        <form action="#" id="form" class="bg-white">

                            <div class="academic" id="academic">
                            <div class="education" id="education">

                              
                              <div class="row form-group">
                                 <div class="col-md-12">
                                    <h2 style="float:left;float: left;font-size: 22px;font-weight: bold;font-family: -webkit-pictograph;">Education : <span id="sl">1</span></h2>
                                    <h2 id="add" style="padding: 7px 10px;border: 2px solid #F5BD86;margin: 5px 0px;border-radius: 5px;font-size: 19px;cursor: pointer;font-family: auto;float:right">Add Institute</h2>
                                 </div>
                              </div>

				              <div class="row form-group">
				                <div class="col-md-6 mb-3 mb-md-0">
				                  <label class="font-weight-bold" for="fullname">Label Of Education<span class="text-danger"> *</span></label>
				                  <select class="form-control" id="edu" name="edu[]">
                                      <option>Select Education label</option>
                                      <option value="1">Secondary</option>
                                      <option value="2">Higher Secondary</option>
                                      <option value="3">Diploma</option>
                                      <option value="4">Bachelor/Honors</option>
                                      <option value="5">Masters</option>
                                      <option value="6">PhD (Doctor of Philosophy)</option>
				                  </select>
				                </div>
				                <div class="col-md-6 mb-3 mb-md-0">
				                  <label class="font-weight-bold" for="fullname">Result <span class="text-danger"> *</span></label>
				                  <select class="form-control" id="result" name="result[]">
                                        <option>Select Result</option>
                                        <option value="1">First Division / Class</option>
                                        <option value="2">Second Division / Class</option>
                                        <option value="3">Third Division / Class</option>
                                        <option value="4">Grade</option>
                                        <option value="5">Appeared</option>
				                  </select>
				                </div>
				              </div>

				              <div class="row form-group">
				                <div class="col-md-6 mb-3 mb-md-0">
				                  <label class="font-weight-bold" id="lexam" for="fullname">Exam \ Degree Title<span class="text-danger"> *</span></label>
				                  <select class="form-control" id="exam" name="exam[]">
                                       <option>Select Result</option>
				                  </select>
				                </div>
				                <div class="col-md-6 mb-3 mb-md-0" id="dcgpa">
				                  <label class="font-weight-bold" for="CGPA" id="lcgpa">CGPA <span class="text-danger"> *</span></label>
				                  <input type="text" id="cgpa" name="cgpa[]" class="form-control" placeholder="eg. 4.65">
				                </div>
				              </div>

				              <div class="row form-group">
				                <div class="col-md-6 mb-3 mb-md-0">
				                  <label class="font-weight-bold" for="fullname">Major \ Group</label>
				                  <input type="text" id="group" name="group[]" class="form-control" placeholder="eg. Science">
				                </div>
				                <div class="col-md-6 mb-3 mb-md-0">
				                  <label class="font-weight-bold" for="fullname">Scale</label>
				                  <input type="text" id="scale" name="scale[]" class="form-control" placeholder="eg. 5">
				                </div>
				              </div>

				              <div class="row form-group">
				                <div class="col-md-6 mb-3 mb-md-0">
				                  <label class="font-weight-bold" for="fullname">Institute</label>
				                  <input type="text" id="institute" name="institute[]" class="form-control" placeholder="eg. ADC University">
				                </div>
				                <div class="col-md-6 mb-3 mb-md-0">
				                  <label class="font-weight-bold" for="fullname">Year of Passing</label>
				                  <input type="text" id="passing_year" name="passing_year[]" class="form-control" placeholder="eg. 2008">
				                </div>
				              </div>
  
                             </div> 
                             </div> 

				              <div class="row form-group">
				                <div class="col-md-12">
				                  <input type="submit" value="Add Info" class="btn btn-primary  py-2 px-5" style="margin-top: 20px;">
				                </div>
				              </div>
				            </form>
					      </div>
					    </div>
					  </div>



<!--Training Summary--><!--Training Summary-->

					  <div class="card">
					    <div class="card-header">
					      <a class="card-link" data-toggle="collapse" href="#educationTwo" style="font-weight: bold;">
					        Training Summary
					      </a>
							      <?php 
		                                $candidate_id = Session::get('id');
		                                $trainings = DB::table('candidate_traings')
		                                            ->where('candidate_id',$candidate_id)
		                                            ->get();
		                                //echo $trainings;
		                                foreach ($trainings as $trany) {
		                                          
		                                            }            
							       ?>
					    </div>
					    <div id="educationTwo" class="collapse" data-parent="#summary">
					      <div class="card-body">
					      	@if(!empty($trany))
					      	{{ Form::open(array('url'=>'/traing/editTrain','method'=>'post','files'=>'true'))}}
					      	   @foreach($trainings as $training)
					      	   <div class="row form-group">
                                 <div class="col-md-12">
                                    <h2 style="float:left;font-size: 22px;font-weight: bold;font-family: -webkit-pictograph;">Training Summary </h2>
                                    <a class="btn btn-success btn-sm" style="float:right;" href="{{url('/traing/delete',$training->id)}}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                        
                                 </div>
                               </div>
					      	 <div class="row form-group">
				                <div class="col-md-6 mb-3 mb-md-0">
				                  <input type="hidden" name="id[]" value="{{$training->id}}">
				                  <input type="hidden" name="candidate_id" value="<?php echo $candidate_id; ?>">
				                  <label class="font-weight-bold" for="fullname">Training Title<span class="text-danger"> *</span></label>
				                  <input type="text" id="title" name="training_title[]" class="form-control" placeholder="eg. Web Design & Development" value="{{$training->training_title}}">
				                </div>
				                <div class="col-md-6 mb-3 mb-md-0">
				                  <label class="font-weight-bold" for="fullname">Country <span class="text-danger"> *</span></label>
				                  <input type="text" id="country" name="country[]" class="form-control" placeholder="eg. Bangladesh" value="{{$training->country}}">
				                </div>
				              </div>
				              <div class="row form-group">
				                <div class="col-md-6 mb-3 mb-md-0">
				                  <label class="font-weight-bold" for="fullname">Topic Covered<span class="text-danger"> *</span></label>
				                  <input type="text" id="topic" name="topic[]" class="form-control" placeholder="eg. Javascript, JQuery, HTML, CSS" value="{{$training->topic}}">
				                </div>
				                <div class="col-md-6 mb-3 mb-md-0">
				                  <label class="font-weight-bold" for="fullname">Training Year <span class="text-danger"> *</span></label>
				                  <input type="text" id="year" name="year[]" class="form-control" placeholder="eg. 2013" value="{{$training->year}}">
				                </div>
				              </div>
				              <div class="row form-group">
				                <div class="col-md-6 mb-3 mb-md-0">
				                  <label class="font-weight-bold" for="fullname">Institude<span class="text-danger"> *</span></label>
				                  <input type="text" id="institute" name="institute[]" class="form-control" placeholder="eg. DDetect IT Ltd." value="{{$training->institute}}">
				                </div>
				                <div class="col-md-6 mb-3 mb-md-0">
				                  <label class="font-weight-bold" for="fullname">Duration(Years/Months) <span class="text-danger"> *</span></label>
				                  <input type="text" id="duration" name="duration[]" class="form-control" placeholder="eg. 6" value="{{$training->duration}}">
				                </div>
				              </div>
				              <div class="row form-group">
				                <div class="col-md-6 mb-3 mb-md-0">
				                  <label class="font-weight-bold" for="fullname">Location<span class="text-danger"> *</span></label>
				                  <input type="text" id="location" name="location[]" class="form-control" placeholder="eg. Uttara, Dhaka" value="{{$training->location}}">
				                </div>
				                <div class="col-md-3 mb-3 mb-md-0">
				                  <label class="font-weight-bold" for="fullname">Training Period<span class="text-danger"> *</span></label>
				                  <input type="date" id="start_time" name="start_time[]" class="form-control" placeholder="eg. Start Time" value="{{$training->start_time}}">
				                </div>
				                <div class="col-md-3 mb-3 mb-md-0 mt-2">
				                  <label class="font-weight-bold" for="fullname"></label>
				                  <input type="date" id="end_time" name="end_time[]" class="form-control" placeholder="eg. End Time" value="{{$training->end_time}}">
				                </div>     
				              </div>
					      	   @endforeach
					      	   <div class="row form-group mt-5">
				                <div class="col-md-12">
				                  <input type="submit" value="Edit Training" class="btn btn-primary  py-2 px-5">
				                  <h2 id="add_more_training" style="padding: 7px 10px;border: 2px solid #F5BD86;margin: 5px 0px;border-radius: 5px;font-size: 19px;cursor: pointer;font-family: auto;float:right">Add More Training</h2>
				                </div>
				               </div>
					      	   {!! Form::close() !!}
					      	   
					      	@else
					      	{{ Form::open(array('route'=>['traing.store'],'method'=>'post','files'=>'true'))}}
					      	<?php $btn = "Add Training"; ?>
					      	<div class="training" id="training">
					      	<div class="train" id="train">
					      	 <div class="row form-group">
                                 <div class="col-md-12">
                                    <h2 style="float:left;float: left;font-size: 22px;font-weight: bold;font-family: -webkit-pictograph;">Training : <span id="sl">1</span></h2>
                                    <h2 id="add_institute" style="padding: 7px 10px;border: 2px solid #F5BD86;margin: 5px 0px;border-radius: 5px;font-size: 19px;cursor: pointer;font-family: auto;float:right">Add Institute</h2>
                                 </div>
                              </div>
					         <div class="row form-group">
				                <div class="col-md-6 mb-3 mb-md-0">
				                  <input type="hidden" name="candidate_id" value="<?php echo $candidate_id; ?>">
				                  <label class="font-weight-bold" for="fullname">Training Title<span class="text-danger"> *</span></label>
				                  <input type="text" id="title" name="training_title[]" class="form-control" placeholder="eg. Web Design & Development">
				                </div>
				                <div class="col-md-6 mb-3 mb-md-0">
				                  <label class="font-weight-bold" for="fullname">Country <span class="text-danger"> *</span></label>
				                  <input type="text" id="country" name="country[]" class="form-control" placeholder="eg. Bangladesh">
				                </div>
				              </div>
				              <div class="row form-group">
				                <div class="col-md-6 mb-3 mb-md-0">
				                  <label class="font-weight-bold" for="fullname">Topic Covered<span class="text-danger"> *</span></label>
				                  <input type="text" id="topic" name="topic[]" class="form-control" placeholder="eg. Javascript, JQuery, HTML, CSS">
				                </div>
				                <div class="col-md-6 mb-3 mb-md-0">
				                  <label class="font-weight-bold" for="fullname">Training Year <span class="text-danger"> *</span></label>
				                  <input type="text" id="year" name="year[]" class="form-control" placeholder="eg. 2013">
				                </div>
				              </div>
				              <div class="row form-group">
				                <div class="col-md-6 mb-3 mb-md-0">
				                  <label class="font-weight-bold" for="fullname">Institude<span class="text-danger"> *</span></label>
				                  <input type="text" id="institute" name="institute[]" class="form-control" placeholder="eg. DDetect IT Ltd.">
				                </div>
				                <div class="col-md-6 mb-3 mb-md-0">
				                  <label class="font-weight-bold" for="fullname">Duration(Years/Months) <span class="text-danger"> *</span></label>
				                  <input type="text" id="duration" name="duration[]" class="form-control" placeholder="eg. 6">
				                </div>
				              </div>
				              <div class="row form-group">
				                <div class="col-md-6 mb-3 mb-md-0">
				                  <label class="font-weight-bold" for="fullname">Location<span class="text-danger"> *</span></label>
				                  <input type="text" id="location" name="location[]" class="form-control" placeholder="eg. Uttara, Dhaka">
				                </div>
				                <div class="col-md-3 mb-3 mb-md-0">
				                  <label class="font-weight-bold" for="fullname">Training Period<span class="text-danger"> *</span></label>
				                  <input type="date" id="start_time" name="start_time[]" class="form-control" placeholder="eg. Start Time">
				                </div>
				                <div class="col-md-3 mb-3 mb-md-0 mt-2">
				                  <label class="font-weight-bold" for="fullname"></label>
				                  <input type="date" id="end_time" name="end_time[]" class="form-control" placeholder="eg. End Time">
				                </div>     
				              </div>
				            </div>
				            </div>
			
				              <div class="row form-group mt-5">
				                <div class="col-md-12">
				                  <input type="submit" value="<?php echo $btn; ?>" class="btn btn-primary  py-2 px-5">
				                </div>
				              </div>
				              {!! Form::close() !!}
				              @endif
					      </div>
					    </div>
					  </div>

<!--End Training Summary--><!--End Training Summary-->



					  <div class="card">
					    <div class="card-header">
					      <a class="collapsed card-link" data-toggle="collapse" href="#educationThree" style="font-weight: bold;">
					        Professional Certification Summary
					      </a>
					      <?php 
                                $candidate_id = Session::get('id');
                                $cartifications = DB::table('candidate_cartifications')
                                                 ->where('candidate_id',$candidate_id)
                                                 ->get();
                                $count = DB::table('candidate_cartifications')
                                                 ->where('candidate_id',$candidate_id)
                                                 ->count();                 
                                $n = 0;                 
					       ?>
					    </div>
					    <div id="educationThree" class="collapse" data-parent="#summary">
					      <div class="card-body">
					      	@if(!empty($cartifications))
					      	{{Form::open(array('url'=>'/cartification/edit','method'=>'post','files'=>'true'))}}
					      	  @foreach($cartifications as $cartification)
					      	  <div class="row form-group">
                                 <div class="col-md-12">
                                    <h2 style="float:left;float: left;font-size: 22px;font-weight: bold;font-family: -webkit-pictograph;">Certification : (<?php echo ++$n; ?>) </h2>
                                    <a class="btn btn-danger btn-sm" style="float:right;" href="{{url('/cartification/delete',$cartification->id)}}"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                                 </div>
                              </div>
                              <div class="row form-group">
				                <div class="col-md-6 mb-3 mb-md-0">
				                  <label class="font-weight-bold" for="fullname">Certification</label>
				                  <input type="hidden" name="id[]" value="{{$cartification->id}}">
				                  <input type="hidden" name="candidate_id" value="<?php echo $candidate_id; ?>">
				                  <input type="text" id="certification" name="certification[]" class="form-control text" value="{{$cartification->certification}}">
				                </div>
				                <div class="col-md-6 mb-3 mb-md-0">
				                  <label class="font-weight-bold" for="fullname">Location </label>
				                  <input type="text" id="location" name="location[]" class="form-control text" value="{{$cartification->location}}">
				                </div>
				              </div>
				              <div class="row form-group">
				                <div class="col-md-6 mb-3 mb-md-0">
				                  <label class="font-weight-bold" for="fullname">Institute</label>
				                  <input type="text" id="institute" name="institute[]" class="form-control text" value="{{$cartification->institute}}">
				                </div>
				                <div class="col-md-6 mb-3 mb-md-0">
				                  <label class="font-weight-bold" for="fullname">Duration (Months)</label>
				                  <input type="text" id="duration" name="duration[]" class="form-control text" value="{{$cartification->duration}}">
				                </div>
				              </div>
					      	  @endforeach
					      	  <div class="row form-group mt-5">
				                <div class="col-md-12">
				                  <input type="submit" value="Edit Certification" class="btn btn-primary  py-2 px-5">
				                  <h2 id="add_cartification" style="padding: 7px 10px;border: 2px solid #F5BD86;margin: 5px 0px;border-radius: 5px;font-size: 19px;cursor: pointer;font-family: auto;float:right">Add Certification</h2>
				                </div>
				              </div>
				              {!! Form::close() !!}
					      	@else

					      	{{ Form::open(array('route'=>['cartification.store'],'method'=>'post','files'=>'true')) }}
                              <div class="pro_cartification" id="pro_cartification">
                              <div class="cert" id="cert">
                              	<h2 class="carti" style="text-align:center;font-size: 18px;font-weight: bold;font-family: -webkit-pictograph;"></h2>
					      	  <div class="row form-group">
                                 <div class="col-md-12">
                                    <h2 style="float:left;float: left;font-size: 22px;font-weight: bold;font-family: -webkit-pictograph;">Certification : (1)</h2>
                                    <h2 id="add_cartification" style="padding: 7px 10px;border: 2px solid #F5BD86;margin: 5px 0px;border-radius: 5px;font-size: 19px;cursor: pointer;font-family: auto;float:right">Add Certification</h2>        
                                 </div>
                              </div>
				              <div class="row form-group">
				                <div class="col-md-6 mb-3 mb-md-0">
				                  <label class="font-weight-bold" for="fullname">Certification</label>
				                  <input type="hidden" name="candidate_id" value="<?php echo $candidate_id; ?>">
				                  <input type="text" id="certification" name="certification[]" class="form-control" placeholder="eg. Network Certifications(CCNA)">
				                </div>
				                <div class="col-md-6 mb-3 mb-md-0">
				                  <label class="font-weight-bold" for="fullname">Location </label>
				                  <input type="text" id="location" name="location[]" class="form-control" placeholder="eg. Uttara, Dhaka">
				                </div>
				              </div>

				              <div class="row form-group">
				                <div class="col-md-6 mb-3 mb-md-0">
				                  <label class="font-weight-bold" for="fullname">Institute</label>
				                  <input type="text" id="institute" name="institute[]" class="form-control" placeholder="eg. Cloud Computing System Ltd.">
				                </div>
				                <div class="col-md-6 mb-3 mb-md-0">
				                  <label class="font-weight-bold" for="fullname">Duration (Months)</label>
				                  <input type="text" id="duration" name="duration[]" class="form-control" placeholder="eg. 6">
				                </div>
				              </div>     
                              </div>
                              </div>
                              <div class="row form-group mt-5">
				                <div class="col-md-12">
				                  <input type="submit" value="Add Cartification" class="btn btn-primary  py-2 px-5">
				                </div>
				              </div>
				              {!! Form::close() !!}
				              @endif
					      </div>
					    </div>
					  </div>



					</div>
                  </div>
                </div>
              </div><!--End Academic Summary-->

              <div class="row">
                <div class="col-sm-12">
                   <nav class="navbar navbar-expand-md bg-dark navbar-dark" style="margin: 0px 15px;border-radius: 8px;">
					  <a class="navbar-brand" href="#"><i class="fa fa-graduation-cap" aria-hidden="true"></i> Employment</a>
					  <!-- Navbar links -->
					</nav>
                </div>
          	  </div>
 
<!--Employment History--> 
          	  <div class="box" style="padding: 20px 15px; ">
                  <div class="row" style="background: #F8F9FA; background-color:white;">
                  	<div class="col-md-12">
                      <div id="employment">
       <!-- Employment History-->
					  <div class="card">
					    <div class="card-header">
					      <a class="card-link" data-toggle="collapse" href="#employMentOne" style="font-weight: bold;">
					        <i class="fa fa-plus"></i> Employment History
					      </a>
					      <?php 
                                $candidate_id = Session::get('id');
                                $histories = DB::table('candidate_employment_histories')
                                         ->where('candidate_id',$candidate_id)
                                         ->get();
                                //echo $histories;
                                foreach ($histories as $key => $value) {
                                }
					       ?>
					       
					    </div>
					    <div id="employMentOne" class="collapse show" data-parent="#employment">
					      <div class="card-body">
                             
					      	@if(!empty($value))
					      	 <?php $btn = "Edit Info"; ?>
					      	 {{ Form::open(array('url'=>'/experience/editHistory','method'=>'post','files'=>'true'))}}
					      	 
                            @foreach($histories as $history)
                            
                             <div class="row form-group">
                                 <div class="col-md-12">
                                    <h2 style="float:left;float: left;font-size: 22px;font-weight: bold;font-family: -webkit-pictograph;">Experience </h2>
                                    <a class="btn btn-success btn-sm" style="float:right;" href="{{url('/experience/delete',$history->id)}}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                 </div>
                             </div>
                   
                             <div class="row form-group">
				                <div class="col-md-6 mb-3 mb-md-0">
				                  <input type="hidden" name="candidate_id" value="<?php echo $candidate_id; ?>">
				                  <input type="hidden" name="id[]" value="{{$history->id}}">
				                  <label class="font-weight-bold" for="Company Name">Company Name<span class="text-danger"> *</span></label>
				                  <input type="text" id="company_name" name="company_name[]" class="form-control" placeholder="eg. XYZ IT Ltd" value="{{$history->company_name}}">
				                </div>
				                <div class="col-md-6 mb-3 mb-md-0">
				                  <label class="font-weight-bold" for="Company Business">Company Business <span class="text-danger"> *</span></label>
				                  <input type="text" id="company_business" name="company_business[]" class="form-control" placeholder="eg. Software Business" value="{{$history->company_business}}">
				                </div>
				              </div>
				              <div class="row form-group">
				                <div class="col-md-6 mb-3 mb-md-0">
				                  <label class="font-weight-bold" for="Designation">Designation<span class="text-danger"> *</span></label>
				                  <input type="text" id="designation" name="designation[]" class="form-control" placeholder="eg. Software Engineer" value="{{$history->designation}}">
				                </div>
				                <div class="col-md-6 mb-3 mb-md-0">
				                  <label class="font-weight-bold" for="Responsibilities">Responsibilities  </label>
				                  <textarea class="form-control" name="responsibilities[]" id="responsibilities">{{$history->responsibilities}}
				                  </textarea>
				                </div>
				              </div>

				              <div class="row form-group">
				                <div class="col-md-6 mb-3 mb-md-0">
				                  <label class="font-weight-bold" for="Department">Department</label>
				                  <input type="text" id="department" name="department[]" class="form-control" placeholder="eg. IT" value="{{$history->department}}">
				                </div>
				                <div class="col-md-6 mb-3 mb-md-0">
				                  <label class="font-weight-bold" for="Company Location">Company Location</label>
				                  <input type="text" id="company_location" name="company_location[]" class="form-control" placeholder="eg. Uttara, Dhaka" value="{{$history->company_location}}">
				                </div>
				              </div>
				              <div class="row form-group">
				                <div class="col-md-6 mb-3 mb-md-0">
				                  <label class="font-weight-bold" for="fullname">Period(Joining to Resign)</label>
				                  <input type="date" id="join_time" name="join_time[]" class="form-control" placeholder="Joining Time" value="{{$history->join_time}}">
				                </div>
				                <div class="col-md-6 mb-3 mb-md-0 mt-2">
				                  <label class="font-weight-bold" for="fullname"></label>
				                  <input type="date" id="resign_time" name="resign_time[]" class="form-control" placeholder="Resign Time (If Continuing select current time.)" value="{{$history->resign_time}}">
				                </div>
				              </div>    
                            @endforeach
                              <div class="row form-group mt-5">
				                <div class="col-md-12">
				                  <input type="submit" value="<?php echo $btn; ?>" class="btn btn-primary  py-2 px-5">
				                  <h2 id="add_more_experience" style="padding: 7px 10px;border: 2px solid #F5BD86;margin: 5px 0px;border-radius: 5px;font-size: 19px;cursor: pointer;font-family: auto;float:right">Add More Institute</h2>
				                </div>
				              </div>
                            {!! Form::close() !!}
                             
				             

				             {{ Form::open(array('route'=>['experience.store'],'method'=>'post','files'=>'true'))}}
                                <?php $btn = "Submit"; ?>
                             <div class="experience2" id="experience2">
                             <div class="exper" id="exper">
                             	
                             	
                             </div>
                             </div>
                             {!! Form::close() !!} 
					      	@else
					        {{ Form::open(array('route'=>['experience.store'],'method'=>'post','files'=>'true'))}}
					        <?php $btn = "Add Info"; ?>
                           
                            <div class="experience" id="experience">
                            <div class="exper" id="exper">
              
                              <div class="row form-group">
                                 <div class="col-md-12">
                                    <h2 style="float:left;float: left;font-size: 22px;font-weight: bold;font-family: -webkit-pictograph;">Experience : <span id="sl">1</span></h2>
                                    <h2 id="add_experience" style="padding: 7px 10px;border: 2px solid #F5BD86;margin: 5px 0px;border-radius: 5px;font-size: 19px;cursor: pointer;font-family: auto;float:right">Add Institute</h2>
                                 </div>
                              </div>
				              <div class="row form-group">
				                <div class="col-md-6 mb-3 mb-md-0">
				                  <input type="hidden" name="candidate_id" value="<?php echo $candidate_id; ?>">
				                  <label class="font-weight-bold" for="Company Name">Company Name<span class="text-danger"> *</span></label>
				                  <input type="text" id="company_name" name="company_name[]" class="form-control" placeholder="eg. XYZ IT Ltd">
				                </div>
				                <div class="col-md-6 mb-3 mb-md-0">
				                  <label class="font-weight-bold" for="Company Business">Company Business <span class="text-danger"> *</span></label>
				                  <input type="text" id="company_business" name="company_business[]" class="form-control" placeholder="eg. Software Business">
				                </div>
				              </div>

				              <div class="row form-group">
				                <div class="col-md-6 mb-3 mb-md-0">
				                  <label class="font-weight-bold" for="Designation">Designation<span class="text-danger"> *</span></label>
				                  <input type="text" id="designation" name="designation[]" class="form-control" placeholder="eg. Software Engineer">
				                </div>
				                <div class="col-md-6 mb-3 mb-md-0">
				                  <label class="font-weight-bold" for="Responsibilities">Responsibilities  </label>
				                  <textarea class="form-control" name="responsibilities[]" id="responsibilities">
				                  </textarea>
				                </div>
				              </div>

				              <div class="row form-group">
				                <div class="col-md-6 mb-3 mb-md-0">
				                  <label class="font-weight-bold" for="Department">Department</label>
				                  <input type="text" id="department" name="department[]" class="form-control" placeholder="eg. IT">
				                </div>
				                <div class="col-md-6 mb-3 mb-md-0">
				                  <label class="font-weight-bold" for="Company Location">Company Location</label>
				                  <input type="text" id="company_location" name="company_location[]" class="form-control" placeholder="eg. Uttara, Dhaka">
				                </div>
				              </div>

				              <div class="row form-group">
				                <div class="col-md-6 mb-3 mb-md-0">
				                  <label class="font-weight-bold" for="fullname">Period(Joining to Resign)</label>
				                  <input type="date" id="join_time" name="join_time[]" class="form-control" placeholder="Joining Time">
				                </div>
				                <div class="col-md-6 mb-3 mb-md-0 mt-2">
				                  <label class="font-weight-bold" for="fullname"></label>
				                  <input type="date" id="resign_time" name="resign_time[]" class="form-control" placeholder="Resign Time (If Continuing select current time.)">
				                </div>
				              </div>
  
                             </div> 
                             </div> 
                            
				              <div class="row form-group">
				                <div class="col-md-12">
				                  <input type="submit" value="<?php echo $btn; ?>" class="btn btn-primary  py-2 px-5">
				                </div>
				              </div>
				            {!! Form::close() !!}
				            @endif
					      </div>
					    </div>
					  </div>
        <!--End Employment History-->
                     <div class="card">
					    <div class="card-header">
					      <a class="card-link" data-toggle="collapse" href="#employMentTwo" style="font-weight: bold;">
					        <i class="fa fa-plus"></i> Photograph
					      </a> 
					    </div>
					    <div id="employMentTwo" class="collapse" data-parent="#employment">
					      <div class="card-body">

                             <div class="row form-group">
                                <div class="col-md-10 center" >
                                   <div class="photograph">
                                   	  <div class="row">
                                        <div class="col-md-8 item_center center"> 
							                <img id="image" style="width:50%;border-radius:50%" />
							            </div>      
                                        </div>
                                      <div class="row">
                                        <div class="col-md-6 item_center"> 
							                <input type="file" name="photo" id="photo" onchange="loadFile(event)">
							            </div>
							            <div class="col-md-6 item_center"> 
							                <input type="submit" value="Upload" class="btn btn-primary btn-md py-1 px-5">
							            </div>
                                            
                                        </div>
                                      </div>	
                                   </div>

                                </div>
                             </div>
					      	
					      </div>
					    </div>
					  </div>

          </div>
        </div>
      </div>
    </div>
  </section>
@endsection

@push('scripts')
  <script type="text/javascript">

    var loadFile = function(event) {
    var reader = new FileReader();
    reader.onload = function(){
      var output = document.getElementById('image');
      output.src = reader.result;
    };
    reader.readAsDataURL(event.target.files[0]);
  };


    $(document).ready(function(){
        var max_fields = 10;
        var wrapper = $(".academic");
        var add_button = $("#add");
        var x=1;
    $(add_button).click(function(e){
        
    	e.preventDefault();
    	if (x < max_fields) {
           x++;
           $(wrapper).append('<div class="education" id="education" style="margin-top: 30px;">\
           	                     <div class="row form-group">\
           	                        <div class="col-md-12">\
           	                          <h2 style="float:left;float: left;font-size: 22px;font-weight: bold;font-family: -webkit-pictograph;">Education : </h2>\
           	                          <h2 id="remove_institute" style="padding: 7px 10px;border: 2px solid #F5BD86;margin: 5px 0px;border-radius: 5px;font-size: 19px;cursor: pointer;font-family: auto;float:right">Remove Institute</h2>\
           	                        </div>\
           	                     </div>\
           	                     <div class="row form-group">\
	           	                     <div class="col-md-6 mb-3 mb-md-0">\
	           	                         <label class="font-weight-bold" for="fullname">Label Of Education<span class="text-danger"> *</span></label>\
	           	                         <select class="form-control" id="edu" name="edu[]">\
			                                  <option>Select Education label</option>\
			                                  <option value="1">Secondary</option>\
			                                  <option value="2">Higher Secondary</option>\
			                                  <option value="3">Diploma</option>\
			                                  <option value="4">Bachelor/Honors</option>\
			                                  <option value="5">Masters</option>\
			                                  <option value="6">PhD (Doctor of Philosophy)</option>\
						                  </select>\
						                  </div>\
	           	                     <div class="col-md-6 mb-3 mb-md-0">\
	           	                         <label class="font-weight-bold" for="fullname">Result <span class="text-danger"> *</span></label>\
	           	                         <select class="form-control" id="result" name="result[]">\
		                                        <option>Select Result</option>\
		                                        <option value="1">First Division / Class</option>\
		                                        <option value="2">Second Division / Class</option>\
		                                        <option value="3">Third Division / Class</option>\
		                                        <option value="4">Grade</option>\
		                                        <option value="5">Appeared</option>\
						                  </select>\
	           	                     </div>\
           	                     </div>\
           	                     <div class="row form-group">\
           	                         <div class="col-md-6 mb-3 mb-md-0">\
					                    <label class="font-weight-bold" id="lexam" for="fullname">Exam or Degree Title<span class="text-danger"> *</span></label>\
				                        <select class="form-control" id="exam" name="exam[]">\
                                            <option>Select Result</option>\
				                        </select>\
					                 </div>\
					                <div class="col-md-6 mb-3 mb-md-0" id="dcgpa">\
					                   <label class="font-weight-bold" for="CGPA" id="lcgpa">CGPA <span class="text-danger"> *</span></label>\
					                   <input type="text" id="cgpa" name="cgpa[]" class="form-control" placeholder="eg. 4.65">\
					                </div>\
           	                     </div>\
           	                     <div class="row form-group">\
	           	                    <div class="col-md-6 mb-3 mb-md-0">\
	           	                        <label class="font-weight-bold" for="fullname">Major or Group</label>\
				                        <input type="text" id="group" name="group[]" class="form-control" placeholder="eg. Your Name">\
	           	                    </div>\
	           	                    <div class="col-md-6 mb-3 mb-md-0">\
	           	                        <label class="font-weight-bold" for="fullname">Scale</label>\
	           	                        <input type="text" id="scale" name="scale[]" class="form-control" placeholder="eg. Your Name">\
	           	                    </div>\
           	                     </div>\
           	                     <div class="row form-group">\
					                <div class="col-md-6 mb-3 mb-md-0">\
					                  <label class="font-weight-bold" for="fullname">Institute</label>\
					                  <input type="text" id="institute" name="institute[]" class="form-control">\
					                </div>\
					                <div class="col-md-6 mb-3 mb-md-0">\
					                  <label class="font-weight-bold" for="fullname">Year of Passing</label>\
					                  <input type="text" id="passing_year" name="passing_year[]" class="form-control">\
					                </div>\
					              </div>\
           	                  </div>');
    	}
    });
     
	     $(wrapper).on("click","#remove_institute", function(e){ //user click on remove text
	     	//console.log(e);
	     e.preventDefault(); 
	     $(this).parent('div').parent('div').parent('div').remove(); x--;
    });

     
//Education 

    $('#result').change(function(){
    	var cgpa = "CGPA<span class='text-danger'>*</span>";
    	var marks = "Marks % <span class='text-danger'>*</span>";
	  if($(this).val() == '1' || $(this).val() == '2' || $(this).val() == '3'){
	  	$('#dcgpa').show();
	    $('#lcgpa').html(marks); // or this.value == 'volvo'
	    //$('#dcgpa').remove();
	  }else if($(this).val() == '4'){
	  	$('#lcgpa').html(cgpa);
	  	$('#dcgpa').show();
	  	
	  }else{
	  	$('#dcgpa').hide();
	  }
	}); 


    $('#edu').change(function(){
    	var secondary ="<option value='SSC'>SSC</option>\
    	                <option value='O Lavel'>O Lavel</option>\
    	                <option value='Dakhil (Madrasah)'>Dakhil (Madrasah)</option>\
    	                <option value='Other'>Other</option>";
        var higher ="<option value='HSC'>HSC</option>\
    	             <option value='A Lavel'>A Lavel</option>\
    	             <option value='Alim (Madrasah)'>Alim (Madrasah)</option>\
    	             <option value='Other'>Other</option>";
    	var diploma ="<option value='Diploma in Computer'>Diploma in Computer</option>\
    	              <option value='Diploma in Mechanical'>Diploma in Mechanical</option>\
    	              <option value='Diploma in Electrical'>Diploma in Electrical</option>\
    	              <option value='Diploma in Nursing'>Diploma in Nursing</option>\
    	              <option value='Diploma in Electronics'>Diploma in Electronics</option>";
       var bachelor = "<option value='Bachelor of Arts(BA)'>Bachelor of Arts(BA)</option>\
    	            <option value='Bachelor of Commerce(BCom)'>Bachelor of Commerce(BCom)</option>\
    	            <option value='Bachelor of Business Administration(BBA)'>Bachelor of Business Administration(BBA)</option>\
    	            <option value='Bachelor of Computer Application(BCA)'>Bachelor of Computer Application(BCA)</option>\
    	            <option value='Bachelor of Science'>Bachelor of Science(BSc)</option>";

	  if($(this).val() == '1'){  	
	  	$('#exam').html(secondary); 
	  }else if($(this).val() == '2'){
	  	$('#exam').html(higher);  	
	  }else if($(this).val() == '3'){
        $('#exam').html(diploma);
	  }else if($(this).val() == '4'){
        $('#exam').html(bachelor);
	  }
	}); 

    });


//Training Institute
$(document).ready(function(){
    var max_field = 10;
    var wrapper2 = $(".training");
    var add_button2 = $("#add_institute");
    var x=1;
    //alert(max_field);

    $(add_button2).click(function(e){
         e.preventDefault();
    	if (x < max_field) {
           x++;
           $(wrapper2).append('<div class="training" id="training" style="margin-top: 30px;">\
           	                     <div class="row form-group">\
           	                        <div class="col-md-12">\
           	                          <h2 style="float:left;float: left;font-size: 22px;font-weight: bold;font-family: -webkit-pictograph;">Training : </h2>\
           	                          <h2 id="remove_training" style="padding: 7px 10px;border: 2px solid #F5BD86;margin: 5px 0px;border-radius: 5px;font-size: 19px;cursor: pointer;font-family: auto;float:right">Remove Institute</h2>\
           	                        </div>\
           	                     </div>\
           	                     <div class="row form-group">\
					                <div class="col-md-6 mb-3 mb-md-0">\
					                  <label class="font-weight-bold" for="fullname">Training Title<span class="text-danger"> *</span></label>\
					                  <input type="text" id="title" name="training_title[]" class="form-control" placeholder="eg. Web Design & Development">\
					                </div>\
					                <div class="col-md-6 mb-3 mb-md-0">\
					                  <label class="font-weight-bold" for="fullname">Country <span class="text-danger"> *</span></label>\
					                  <input type="text" id="country" name="country[]" class="form-control" placeholder="eg. Bangladesh">\
					                </div>\
				                 </div>\
           	                     <div class="row form-group">\
					                <div class="col-md-6 mb-3 mb-md-0">\
					                  <label class="font-weight-bold" for="fullname">Topic Covered<span class="text-danger"> *</span></label>\
					                  <input type="text" id="topic" name="topic[]" class="form-control" placeholder="eg. Javascript, JQuery, HTML, CSS">\
					                </div>\
					                <div class="col-md-6 mb-3 mb-md-0">\
					                  <label class="font-weight-bold" for="fullname">Training Year <span class="text-danger"> *</span></label>\
					                  <input type="text" id="year" name="year[]" class="form-control" placeholder="eg. 2013">\
					                </div>\
				                 </div>\
				                 <div class="row form-group">\
					                <div class="col-md-6 mb-3 mb-md-0">\
					                  <label class="font-weight-bold" for="fullname">Institude<span class="text-danger"> *</span></label>\
					                  <input type="text" id="institute" name="institute[]" class="form-control" placeholder="eg. DDetect IT Ltd.">\
					                </div>\
					                <div class="col-md-6 mb-3 mb-md-0">\
					                  <label class="font-weight-bold" for="fullname">Duration(Months) <span class="text-danger"> *</span></label>\
					                  <input type="text" id="duration" name="duration[]" class="form-control" placeholder="eg. 6">\
					                </div>\
				                 </div>\
           	                     <div class="row form-group">\
					                <div class="col-md-6 mb-3 mb-md-0">\
					                  <label class="font-weight-bold" for="fullname">Location<span class="text-danger"> *</span></label>\
					                  <input type="text" id="location" name="location[]" class="form-control" placeholder="eg. Uttara, Dhaka">\
					                </div>\
					                <div class="col-md-3 mb-3 mb-md-0">\
				                       <label class="font-weight-bold" for="fullname">Training Period<span class="text-danger"> *</span></label>\
				                       <input type="date" id="start_time" name="start_time[]" class="form-control" placeholder="eg. Start Time">\
				                    </div>\
				                    <div class="col-md-3 mb-3 mb-md-0">\
					                  <label class="font-weight-bold" for="fullname"></label>\
					                  <input type="date" id="end_time" name="end_time[]" class="form-control" placeholder="eg. End Time">\
					                </div>\
				                 </div>\
           	                  </div>');
    	}
    });

    $(wrapper2).on("click","#remove_training", function(e){ //user click on remove text
	     	//console.log(e);
	     e.preventDefault(); 
	     $(this).parent('div').parent('div').parent('div').remove(); x--;
    });

});  

//Experience

$(document).ready(function(){
	var max_field = 10;
    var wrapper3 = $(".experience");
    var add_button3 = $("#add_experience");
    var x=1;

    $(add_button3).click(function(e){
        e.preventDefault();
    	if (x < max_field) {
        x++;
        $(wrapper3).append('<div class="training" id="training" style="margin-top: 30px;">\
           	                     <div class="row form-group">\
           	                        <div class="col-md-12">\
           	                          <h2 style="float:left;float: left;font-size: 22px;font-weight: bold;font-family: -webkit-pictograph;">Experience : </h2>\
           	                          <h2 id="remove_experience" style="padding: 7px 10px;border: 2px solid #F5BD86;margin: 5px 0px;border-radius: 5px;font-size: 19px;cursor: pointer;font-family: auto;float:right">Remove Experience</h2>\
           	                        </div>\
           	                     </div>\
           	                     <div class="row form-group">\
					                <div class="col-md-6 mb-3 mb-md-0">\
					                  <label class="font-weight-bold" for="Company Name">Company Name<span class="text-danger"> *</span></label>\
					                  <input type="text" id="company_name" name="company_name[]" class="form-control" placeholder="eg. XYZ IT Ltd">\
					                </div>\
					                <div class="col-md-6 mb-3 mb-md-0">\
					                  <label class="font-weight-bold" for="Company Business">Company Business <span class="text-danger"> *</span></label>\
					                  <input type="text" id="company_business" name="company_business[]" class="form-control" placeholder="eg. Software Business">\
					                </div>\
				                 </div>\
           	                     <div class="row form-group">\
					                <div class="col-md-6 mb-3 mb-md-0">\
					                  <label class="font-weight-bold" for="Designation">Designation<span class="text-danger"> *</span></label>\
					                  <input type="text" id="designation" name="designation[]" class="form-control" placeholder="eg. Software Engineer">\
					                </div>\
					                <div class="col-md-6 mb-3 mb-md-0">\
					                  <label class="font-weight-bold" for="Responsibilities">Responsibilities  </label>\
					                  <textarea class="form-control" name="responsibilities[]" id="responsibilities">\
					                  </textarea>\
					                </div>\
				                 </div>\
				                 <div class="row form-group">\
					                <div class="col-md-6 mb-3 mb-md-0">\
					                  <label class="font-weight-bold" for="Department">Department</label>\
					                  <input type="text" id="department" name="department[]" class="form-control" placeholder="eg. IT">\
					                </div>\
					                <div class="col-md-6 mb-3 mb-md-0">\
					                  <label class="font-weight-bold" for="Company Location">Company Location</label>\
					                  <input type="text" id="company_location" name="company_location[]" class="form-control" placeholder="eg. Uttara, Dhaka">\
					                </div>\
				                 </div>\
				                 <div class="row form-group">\
					                <div class="col-md-6 mb-3 mb-md-0">\
					                  <label class="font-weight-bold" for="fullname">Period(Joining to Resign)</label>\
					                  <input type="date" id="join_time" name="join_time[]" class="form-control" placeholder="Joining Time">\
					                </div>\
					                <div class="col-md-6 mb-3 mb-md-0 mt-2">\
					                  <label class="font-weight-bold" for="fullname"></label>\
					                  <input type="date" id="resign_time" name="resign_time[]" class="form-control" placeholder="Resign Time (If Continuing select current time.)">\
					                </div>\
				                 </div>\
           	                     </div>');
    	}
    });
   $(wrapper3).on("click","#remove_experience", function(e){ //user click on remove text
	     	//console.log(e);
	     e.preventDefault(); 
	     $(this).parent('div').parent('div').parent('div').remove(); x--;
    });
});

//Add More Institute

$(document).ready(function(){
	var max_field = 10;
    var wrapper4 = $(".experience2");
    var add_button4 = $("#add_more_experience");
    var x=1;

    $(add_button4).click(function(e){
        e.preventDefault();
    	if (x < max_field) {
        x++;
        $(wrapper4).append('<div class="training" id="training" style="margin-top: 30px;">\
           	                     <div class="row form-group">\
           	                        <div class="col-md-12">\
           	                          <h2 style="float:left;float: left;font-size: 22px;font-weight: bold;font-family: -webkit-pictograph;">Experience : </h2>\
           	                          <h2 id="remove_experience" style="padding: 7px 10px;border: 2px solid #F5BD86;margin: 5px 0px;border-radius: 5px;font-size: 19px;cursor: pointer;font-family: auto;float:right">Remove Experience</h2>\
           	                        </div>\
           	                     </div>\
           	                     <div class="row form-group">\
					                <div class="col-md-6 mb-3 mb-md-0">\
					                  <label class="font-weight-bold" for="Company Name">Company Name<span class="text-danger"> *</span></label>\
					                  <input type="text" id="company_name" name="company_name[]" class="form-control" placeholder="eg. XYZ IT Ltd">\
					                </div>\
					                <div class="col-md-6 mb-3 mb-md-0">\
					                  <label class="font-weight-bold" for="Company Business">Company Business <span class="text-danger"> *</span></label>\
					                  <input type="text" id="company_business" name="company_business[]" class="form-control" placeholder="eg. Software Business">\
					                </div>\
				                 </div>\
           	                     <div class="row form-group">\
					                <div class="col-md-6 mb-3 mb-md-0">\
					                  <label class="font-weight-bold" for="Designation">Designation<span class="text-danger"> *</span></label>\
					                  <input type="text" id="designation" name="designation[]" class="form-control" placeholder="eg. Software Engineer">\
					                </div>\
					                <div class="col-md-6 mb-3 mb-md-0">\
					                  <label class="font-weight-bold" for="Responsibilities">Responsibilities  </label>\
					                  <textarea class="form-control" name="responsibilities[]" id="responsibilities">\
					                  </textarea>\
					                </div>\
				                 </div>\
				                 <div class="row form-group">\
					                <div class="col-md-6 mb-3 mb-md-0">\
					                  <label class="font-weight-bold" for="Department">Department</label>\
					                  <input type="text" id="department" name="department[]" class="form-control" placeholder="eg. IT">\
					                </div>\
					                <div class="col-md-6 mb-3 mb-md-0">\
					                  <label class="font-weight-bold" for="Company Location">Company Location</label>\
					                  <input type="text" id="company_location" name="company_location[]" class="form-control" placeholder="eg. Uttara, Dhaka">\
					                </div>\
				                 </div>\
				                 <div class="row form-group">\
					                <div class="col-md-6 mb-3 mb-md-0">\
					                  <label class="font-weight-bold" for="fullname">Period(Joining to Resign)</label>\
					                  <input type="date" id="join_time" name="join_time[]" class="form-control" placeholder="Joining Time">\
					                </div>\
					                <div class="col-md-6 mb-3 mb-md-0 mt-2">\
					                  <label class="font-weight-bold" for="fullname"></label>\
					                  <input type="date" id="resign_time" name="resign_time[]" class="form-control" placeholder="Resign Time (If Continuing select current time.)">\
					                </div>\
				                 </div>\
				                 <div class="row form-group mt-5">\
					                <div class="col-md-12">\
					                  <input type="submit" value="<?php echo $btn; ?>" class="btn btn-primary  py-2 px-5">\
					                </div>\
					             </div>\
           	                     </div>');
    	}
    });
   $(wrapper4).on("click","#remove_experience", function(e){ //user click on remove text
	     	//console.log(e);
	     e.preventDefault(); 
	     $(this).parent('div').parent('div').parent('div').remove(); x--;
    });
});


//Professional Cartification

$(document).ready(function(){
	var max_field = 03;
    var wrapper5 = $(".pro_cartification");
    var add_button5 = $("#add_cartification");
    var x=1;

    $(add_button5).click(function(e){
        e.preventDefault();
    	if (x < max_field) {
        x++;
        $(wrapper5).append('<div class="training" id="training" style="margin-top: 30px;">\
           	                     <div class="row form-group">\
           	                        <div class="col-md-12">\
           	                          <h2 style="float:left;float: left;font-size: 22px;font-weight: bold;font-family: -webkit-pictograph;">Cartification : ('+ x +')</h2>\
           	                          <h2 id="remove_cartification" style="padding: 7px 10px;border: 2px solid #F5BD86;margin: 5px 0px;border-radius: 5px;font-size: 19px;cursor: pointer;font-family: auto;float:right">Remove Cartification</h2>\
           	                        </div>\
           	                     </div>\
           	                     <div class="row form-group">\
					                <div class="col-md-6 mb-3 mb-md-0">\
					                  <label class="font-weight-bold" for="fullname">Certification</label>\
					                  <input type="text" id="certification" name="certification[]" class="form-control" placeholder="eg. Network Certifications(CCNA)">\
					                </div>\
					                <div class="col-md-6 mb-3 mb-md-0">\
					                  <label class="font-weight-bold" for="fullname">Location </label>\
					                  <input type="text" id="location" name="location[]" class="form-control" placeholder="eg. Uttara, Dhaka">\
					                </div>\
					              </div>\
           	                     <div class="row form-group">\
					                <div class="col-md-6 mb-3 mb-md-0">\
					                  <label class="font-weight-bold" for="fullname">Institute</label>\
					                  <input type="text" id="institute" name="institute[]" class="form-control" placeholder="eg. Cloud Computing System Ltd.">\
					                </div>\
					                <div class="col-md-6 mb-3 mb-md-0">\
					                  <label class="font-weight-bold" for="fullname">Duration (Months)</label>\
					                  <input type="text" id="duration" name="duration[]" class="form-control" placeholder="eg. 6">\
					                </div>\
					              </div>\
           	                     </div>');
    	}else{
    		$(".carti").html("<span class='text-danger'>You Can Add Maximum 3 Professional cartification</span>");
    	}
    });
   $(wrapper5).on("click","#remove_cartification", function(e){ //user click on remove text
	     	//console.log(e);
	     e.preventDefault(); 
	     $(this).parent('div').parent('div').parent('div').remove(); x--;
    });
});


  </script>
@endpush


