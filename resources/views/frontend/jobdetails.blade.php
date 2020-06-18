@extends('frontend.master')
@section('title','Post Details')
@push('css')
  <style type="text/css">
      .heading{
        font-weight: bold;
        font-size: 18px;
        font-family: -webkit-pictograph;
      }
      .post{
        color: black;
        font-family: -webkit-pictograph;
        font-size: 17px;
      }
      .para{
        font-size: 16px;
        font-family: -webkit-pictograph;
        /*line-height: 12px;*/
      }
      .business{
      	line-height: 20px;
        font-size: 18px;
        font-family: -webkit-pictograph;
        color: black;
      }
  </style>
@endpush
@section('content')
<?php 

     $company = DB::table('job_posts')
             ->join('employers','job_posts.employers_id','=','employers.id')
             ->first();
 ?>

<section class="welcome">
	<div class="site-section bg-light">
      <div class="container">
        <div class="row bg-white" style="margin-top:100px;">
          <!-- <div class="col-md-2 border rounded center">
              <h2>Bangladesh</h2>
          </div> -->
             <div class="col-md-12">
             	<?php 
                      $categories   = DB::table('categories')
                                    ->where('id',$posts->job_category)
                                    ->first();
                                    
                ?>
                <h6 class="float-right" style="margin: 5px 5px;padding: 10px 0px; font-family: -webkit-pictograph;">Category : {{$categories->category_name}}</h6>
             </div>
             <div class="col-md-8">
             	<div class="row bg-white" style="padding: 12px 0px;">
             		<div class="col-md-12 ">

                        <p class="float-right" data-toggle="modal" data-target=".bd-example-modal-lg"><u><a href="#">View all jobs of this company</a></u></p>
             			<h5 style="font-weight: bold;font-family: -webkit-pictograph;color: #04af11;font-size: 20px;">{{$posts->job_title}}</h5>
                        <?php 
                               $employers = DB::table('employers')
                                            ->where('id',$posts->employers_id)
                                            ->first();

                         ?>

             			<h6 style="font-weight: bold;color: black;font-family: -webkit-pictograph;margin-bottom: 30px;">{{$employers->company_name}}</h6>
                        <h6 class="heading">Job Vacancy</h6>
                        <div class="post" style="margin-left: 30px;margin-bottom: 10px;">    
                            {{$posts->job_vacancy}}
                        </div>	
             			<h6 class="heading">Job Description</h6>
                        <div class="post">
                            {!!$posts->job_description!!}
                        </div>
             			<h6 class="heading">Job Responsibilities</h6>
                        <div class="post">
                            {!!$posts->job_responsibilities!!}
                        </div>

                        <h6 class="heading">Educational Reuirements</h6>
                        <div class="post">
                            <ul>
                                <li>{!!$posts->educational_requirements!!}</li>
                            </ul>
                            
                        </div>

             			<h6 class="heading">Experience Requirements</h6>
                        <div class="post">
                            <ul>
                                <li>{!!$posts->experience_requirements!!}</li>
                            </ul>
                            
                        </div>
             			<h6 class="heading">Additional Requirements</h6>
                        <div class="post">
                            {!!$posts->additional_requirements!!}
                        </div>
             			<h6 class="heading">Job Location</h6>
                        <div class="post" style="margin-left: 30px;margin-bottom: 10px;">    
                            {{$posts->job_location}}
                        </div>  
             			<h6 class="heading">Salary</h6>
                        <div class="post" style="margin-left: 30px;margin-bottom: 10px;">    
                            {{$posts->salary}}
                        </div>
             			<h6 class="heading">Other Benefits</h6>
                        <div class="post">
                            {!!$posts->other_benefits!!}
                        </div>
             		</div>
             	</div>
             	
             </div>
             <div class="col-md-4">
             	<div class="row">
                    <div class="col-md-12">
                        <div class="card">
                          <div class="card-header text-white bg-dark">
                            Job Summary 
                          </div>
                          <div class="card-body">
                             <p class="para"><b>Published on:</b> {{ date('F d, Y',strtotime($posts->published_date))}}</p>
                             <p class="para"><b>Vacancy:</b>  {{$posts->job_vacancy}}</p>
                             <p class="para"><b>Employment Status:</b> Full-time</p>
                             <p class="para"><b>Experience:</b> {!!$posts->experience_requirements!!}</p>
                             <p class="para"><b>Job Location:</b> {{$posts->job_location}}</p>
                             <p class="para"><b>Salary:</b> Tk. {{$posts->salary}} (Monthly)</p>
                             <p class="para"><b>Application Deadline:</b> {{ date('F d, Y',strtotime($posts->application_deadline))}}</p>
                             
                          </div>
                        </div>
                    </div>
                </div>
             </div>

             <div class="col-md-12">
                 <div class="apply" style="text-align: center;">
                    <h1 style="font-size: 18px;font-weight: bold;font-family: cursive;">Read Before Apply</h1>
                    <hr style="width: 20%;margin-bottom: 30px;">
                    <p>Please don't apply if your skills and experience do not match our criteria.</p>
                    <h3 style="font-size: 20px;line-height: 1px;margin-bottom: 50px;"><span style="color: red;">*Photograph</span> must be enclosed with the resume.</h3>
                    <h4 style="font-size: 18px;font-weight: bold;margin-bottom: 30px;">Apply Procedures</h4>
                    <a href="{{URL::to('/can_signin')}}" class="btn btn-success">Apply Online</a>
                    <hr width="50%">
                    <h1 style="font-size: 20px;font-weight: bold;">Email</h1>
                    <p>Send your CV to <b>{{$posts->email}}</b></p>
                    <p style="line-height: 1px;margin-bottom: 100px;">Application Deadline : <b>{{ date('F d, Y',strtotime($posts->application_deadline))}}</b></p>
                    <hr>
                 </div>
             </div>
             <div class="col-md-12">
                <div class="row">
                    <div class="col-md-10">
                    	<div class="business">
	                        <p style="color: blue;"><b>{{$company->company_name}}</b></p>
	                        <p>Address: {{$company->company_address}}</p>
	                        <p>web: <a href="">{{$company->company_web}}</a></p>
	                        <p>Business: {{$company->business_description}}</p>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <a href="#" class="btn btn-info">Follow</a>
                    </div>
                </div>
             </div>




			<!-- Open Modal -->
	
			<div class="modal fade bd-example-modal-lg" id="exampleModalScrollable" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
			  <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
			    <div class="modal-content">
			      <div class="modal-header">
			        <h5 class="modal-title" id="exampleModalScrollableTitle">Company Information</h5>
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			          <span aria-hidden="true">&times;</span>
			        </button>
			      </div>
			      <div class="modal-body">
			        <div class="business">
                        <p style="color: blue;"><b>{{$company->company_name}}</b></p>
                        <p>Address: {{$company->company_address}}</p>
                        <p>web: <a href="">{{$company->company_web}}</a></p>
                        <p>Business: {{$company->business_description}}</p>

                       <table class="table table-hover">
                        <thead>
                          <tr>
                            <th width="20%">Sl</th>
                            <th width="40%">Compant Title</th>
                            <th width="40%">Deadline</th>
                          </tr>
                        </thead>
                        <tbody>
                            <?php 
                                  $emp_id = $posts->employers_id;
                                  $num = 1;
                                  $job_list = DB::table('job_posts')
                                            -> where('employers_id',$emp_id)
                                            ->get();

                             ?>

                          @foreach($job_list as $job)
                             <?php 

                                $dead_line = date('d-m-Y', strtotime($job->application_deadline));
                                $current_date = new DateTime('now', new DateTimezone('Asia/Dhaka'));
                                $current_date->format('d-m-Y g:i a');

                                $start_time = \Carbon\Carbon::parse($current_date);
                                $finish_time = \Carbon\Carbon::parse($dead_line);

                                $result = $start_time->diffInDays($finish_time, false); 
                                
                           ?>
                          @if($result >= 0)
                          <tr>
                            <td>{{$num++}}</td>
                            <td><a href="{{URL::to('/jobdetails',$job->id)}}" target="blank"><u>{{$job->job_title}}</u></a></td>
                            <td>{{date('F d, Y',strtotime($job->published_date))}} ({{$result+1}} days left)</td>
                          </tr>
                          @endif
                          @endforeach
                        </tbody>
                      </table>
                    </div>
			      </div>
			    </div>
			  </div>
			</div>
			<!-- Open Modal -->

        </div>
      </div>
    </div>
</section>
@endsection