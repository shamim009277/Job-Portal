@extends('frontend.master')
@section('title','Employer Dashboard')
@push('css')
       
     <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.16/dist/summernote.min.css" rel="stylesheet">
@endpush
@section('content')
<?php
	if(!empty($editPost)){
		$plusIcon = 'fa fa-pencil';
		$addEdit = 'Edit Post';
	}else{
		$plusIcon = 'fa fa-plus-square';
		$addEdit = 'Add Post';
	}
?>
<section class="welcome">
	<div class="site-section bg-light">
      <div class="container">
        <div class="row" style="margin-top:100px;">
          <!-- <div class="col-md-2 border rounded center">
              <h2>Bangladesh</h2>
          </div> -->
             
             <div class="col-md-10 mx-auto">
             	<div class="card">
             		@include('common.message')
				  <div class="card-header text-white bg-dark" style="font-weight: bold;font-family: -webkit-pictograph;font-size: 18px;">
				    {{$addEdit}}
                    @if(empty($editPost))
				    <div class="pull-right">
                        <a href="" class="btn btn-success btn-sm">{{$addEdit}}</a>
				    </div>
                    @endif
				  </div>
				  @if(!empty($editPost))
				  {{Form::open(array('route'=>['post_job.update',$editPost->id],'method'=>'PUT','files'=>'true'))}}
				  @else
				  {{Form::open(array('route'=>['post_job.store'],'method'=>'POST','files'=>'true'))}}
				  @endif
				  <div class="card-body">
				  	<div class="row">
				  		<?php 
                               $id=Session::get('id');
				  		 ?>
				  		 <div class="col-md-12 mx-auto">
				  			<div class="form-group">
			                <label for="job-title" style="font-weight: bold;">Job Title</label>
			                <input type="text" class="form-control" id="job_title" name="job_title" placeholder="e.g. Product Designer" value="{!! isset($editPost->job_title) ? $editPost->job_title : old('job_title') !!}">
			              </div>
			              <div class="form-group">
			                <label for="job-location" style="font-weight: bold;">Location</label>
			                <input type="text" class="form-control" id="job_location" name="job_location" placeholder="e.g. Dhaka" value="{!! isset($editPost->job_location) ? $editPost->job_location : old('job_location') !!}">
			              </div>
			              <div class="form-group">
			                <label for="job-email" style="font-weight: bold;">Email</label>
			                <input type="text" class="form-control" id="email" name="email" placeholder="e.g. hrexample@gmail.com" value="{!! isset($editPost->email) ? $editPost->email : old('email') !!}">
			              </div>
			              <div class="form-group">
			                <label for="job-vacancy" style="font-weight: bold;">Vacancy</label>
			                <input type="text" class="form-control" id="job_vacancy" name="job_vacancy" placeholder="e.g. 03" value="{!! isset($editPost->job_vacancy) ? $editPost->job_vacancy : old('job_vacancy') !!}">
			              </div>
                        
			              <div class="form-group">
			                <label for="job-type" style="font-weight: bold;">Job Category</label>
			                <select class="form-control" id="job_category" name="job_category" data-width="100%" title="Select Job Type">
			                	<?php 
                                       $categories = DB::table('categories')
                                                   ->where('status',1)
                                                   ->get();
			                	 ?>
			                @if(!empty($editPost))
			                @foreach($categories as $category)  
			                  <option value="{{$category->id}}" {{($editPost->job_category==$category->id) ? 'selected' : ''}}>{{$category->category_name}}</option>
                            @endforeach
			                @else

			                <option value="">Select Category</option>
			                @foreach($categories as $category)  
			                  <option value="{{$category->id}}">{{$category->category_name}}</option>
                            @endforeach
                            @endif
			                </select>
			              </div>


			              <div class="form-group">
			                <label for="job-description" style="font-weight: bold;">Job Description</label>
			                 <textarea name="job_description" class="summernote">
                              {!! isset($editPost->job_description) ? $editPost->job_description : old('job_description') !!}
			                 </textarea> 
			              </div>

			              <div class="form-group">
			                <label for="job-description" style="font-weight: bold;">Job Responsibilities</label>
			                 <textarea name="job_responsibilities" class="summernote">
                              {!! isset($editPost->job_responsibilities) ? $editPost->job_responsibilities : old('job_responsibilities') !!}
			                 </textarea> 
			              </div>

			              <div class="form-group">
			                <label for="job-description" style="font-weight: bold;">Employment Status</label>
			                <select class="form-control" id="employment_status" name="employment_status" data-width="100%">
			                @if(!empty($editPost)))
			                   <option value="{{$editPost->employment_status}}">{{$editPost->employment_status}}</option>
			                   <option value="Full-time">Full-time</option>
			                	<option value="Part-time">Part-time</option>
			                	<option value="Internship">Internship</option>
			                	<option value="Contractual">Contractual</option>
			                @else
			                 
			                	<option value="">Select Employment Status</option>
			                	<option value="Full-time">Full-time</option>
			                	<option value="Part-time">Part-time</option>
			                	<option value="Internship">Internship</option>
			                	<option value="Contractual">Contractual</option>
			                @endif
			                </select> 
			              </div>

			              <div class="form-group">
			                <label for="job-description" style="font-weight: bold;">Educational Requirements</label>
			                 <textarea name="educational_requirements" class="summernote">
                             {!! isset($editPost->educational_requirements) ? $editPost->educational_requirements : old('educational_requirements') !!}
			                 </textarea> 
			              </div>

			              <div class="form-group">
			                <label for="job-description" style="font-weight: bold;">ExperienceRequirements</label>
			                 <input type="text" class="form-control" id="experience_requirements" name="experience_requirements" placeholder="e.g. 0-3 year(s)" value="{!! isset($editPost->experience_requirements) ? $editPost->experience_requirements : old('experience_requirements') !!}"> 
			              </div>

			              <div class="form-group">
			                <label for="job-description" style="font-weight: bold;">Additional Requirements</label>
			                 <textarea name="additional_requirements" class="summernote">
                             {!! isset($editPost->additional_requirements) ? $editPost->additional_requirements : old('additional_requirements') !!}
			                 </textarea> 
			              </div>

			              <div class="form-group">
			                <label for="job-description" style="font-weight: bold;">Other Benefits</label>
			                 <textarea name="other_benefits" class="summernote">
                             {!! isset($editPost->other_benefits) ? $editPost->other_benefits : old('other_benefits') !!}
			                 </textarea> 
			              </div>

			              <div class="form-group">
			                <label for="application-deadline" style="font-weight: bold;">Application Deadline</label>
			                <input type="date" class="form-control" id="application_deadline" name="application_deadline" value="{!! isset($editPost->application_deadline) ? $editPost->application_deadline : old('application_deadline') !!}">
			              </div>

                         @if(!empty($editPost))
                         <div class="form-group">
			                <label for="application-deadline" style="font-weight: bold;">Published Date</label>
			                <input type="date" class="form-control" id="published_date" name="published_date" value="{!! isset($editPost->published_date) ? $editPost->published_date : old('published_date') !!}">
			             </div>
                         @else
			              <div class="form-group">
			                <label for="application-deadline" style="font-weight: bold;">Published Date</label>
			                <input type="text" class="form-control" id="published_date" name="published_date" value="<?php echo $date = date('d-m-Y'); ?>" readonly>
			              </div>
			             @endif  
			              <div class="form-group">
			                <label for="company-website" style="font-weight: bold;">Salary</label>
			                <input type="text" class="form-control" id="salary" name="salary" placeholder="e.g. 20K-25K" value="{!! isset($editPost->salary) ? $editPost->salary : old('salary') !!}">
			              </div>
			              @if(!empty($editPost))
			              <div class="form-group">
			                <label for="company-logo" style="font-weight: bold;">Old Logo</label> <br>
			                
			                 <img src='{{asset("image/$editPost->logo")}}' id="image" name="logo" alt="your image" style="width:10%">

			              </div>
			              <div class="form-group">
			                <label for="company-logo" style="font-weight: bold;">Upload New Logo</label> <br>
			                <input type="file" class="btn btn-primary btn-md btn-file" id="logo" name="new_logo">
			                <!-- <img src="#" id="image" alt="your image"> -->

			              </div>
			              @else

			              <div class="form-group">
			                <label for="company-logo" style="font-weight: bold;">Upload Logo</label> <br>
			                <input type="file" class="btn btn-primary btn-md btn-file" id="logo" name="logo">
			                <!-- <img src="#" id="image" alt="your image"> -->

			              </div>
			              @endif
				  		</div>
				  	</div>          
				  </div>
				  <div class="card-footer">
                      <div class="row">
                      	<div class="col-md-12 mx-auto">
                      		<button type="submit" class="btn btn-primary btn-sm pull-right"><i class="{{$plusIcon}}"></i> {{$addEdit}}
		                	</button>

		                	<button type="reset" class="btn btn-info btn-sm"> Cancel
		                	</button>

                      	</div>
                      </div>
				  </div>
				  {!!Form::close()!!}
				</div>
             </div>
        </div>
      </div>
    </div>
    <script>
         function readURL(input){
         	if (input.files && input.files[0]) {
               var reader = new FileReader();

              reader.onload = function(e){
              	$('#image').attr('src',e.target.result);
              } 

              reader.readAsDataURL(input.files[0]);
         	}
         }

         $('#logo').change(function()){
           readURL(this);
         });
    </script>
</section>

@endsection

@push('scripts')
   
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.16/dist/summernote.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.summernote').summernote({

            	height: 120,
            	placeholder: 'All Text Will Go There....'

            });
        });
    </script>
  
@endpush