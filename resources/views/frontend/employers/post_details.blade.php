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
             <div class="col-md-8" >
             	<div class="row bg-white" style="padding: 12px 0px;">
             		<div class="col-md-12 ">
                        <?php 
                              $categories   = DB::table('categories')
                                            ->where('id',$posts->job_category)
                                            ->first();
                                            
                         ?>

                        <h6 class="float-right">Category : {{$categories->category_name}}</h6>
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
        </div>
      </div>
    </div>
</section>
@endsection