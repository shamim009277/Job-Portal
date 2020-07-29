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
             
             <div class="col-md-12">
             	<div class="card">
				  <div class="card-header text-white bg-dark">
				    Posted Job
				    <div class="pull-right">
                        <a href="{{route('post_job.create')}}" class="btn btn-success btn-sm">Post Job</a>
				    </div>
				  </div>
				  <div class="card-body">
				  	 <table id="example1" class="table table-bordered table-striped">
		                <thead>
		                <tr>
		                  <th>Sl</th>
		                  <th>Job Title</th>
		                  <th>Application Deadline</th>
		                  <th>Status</th>
		                  <th>Apply Candidate</th>
		                  <th>Action</th>
		                </tr>
		                </thead>
 
		                <tbody> 
		                	<!-- @foreach($posts as $post)
		                	{!!$post->job_description!!}
		                	@endforeach -->
		             <?php $n=0; ?>
		            @foreach($posts as $post) 
		                <?php 

                            $dead_line = date('d-m-Y', strtotime($post->application_deadline));
                            $current_date = new DateTime('now', new DateTimezone('Asia/Dhaka'));
                            $current_date->format('d-m-Y g:i a');

                            $start_time = \Carbon\Carbon::parse($current_date);
                            $finish_time = \Carbon\Carbon::parse($dead_line);

                           echo $result = $start_time->diffInDays($finish_time, false); 
                            

		                 ?>

		                <tr>
		                  <td><?php echo ++$n; ?></td>
		                  <td>{{$post->job_title}}</td>
		                  <td>
                               <span class="label label-success">{{ date('d-M-y', strtotime($post->application_deadline))}}</span>
		                  </td>
		                  <td>
                           @if($result > 0)
		                  	<a href="#" class="btn btn-success btn-sm">Active</a>
		                   @else
		                    <a href="#" class="btn btn-warning btn-sm">Inactive</a>
		                   @endif
		                  </td>
		                  <td>
		                  	<a href="#" class="btn btn-info btn-sm">Candidates</a>
		                  </td>
		                  <td> 
		                    <a href="{{route('post_job.edit',$post->id)}}" class="btn btn-success btn-sm" title="Edit Post"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
		                    <form id="delete-form-{{$post->id}}" action="{{route('post_job.destroy',$post->id)}}" method="POST" style="display:none">
		                        @csrf
		                        @method('DELETE')
		                      </form>
		                      <button class="btn btn-danger btn-sm" onclick="if(confirm('Are you sure you want ot delete this permanently ! ')){
		                        event.preventDefault();
		                        document.getElementById('delete-form-{{$post->id}}').submit();

		                      }else{
		                          event.preventDefault();
		                        }
		                      " title="Delete Post"><i class="fa fa-trash" aria-hidden="true"></i></button>
		                    <a href="{{route('post_job.show',$post->id)}}" class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i></a>
		                  </td>  
		                </tr>
		            @endforeach                                  
		                </tbody>
		               
		              </table>
				     
				   </div>
				     <?php echo $posts->render(); ?>
				</div>
             </div>
        </div>
      </div>
    </div>
</section>
@endsection



