@extends('frontend.master')
@section('title','Job Search')
@push('css')

    <style type="text/css">
         p{
          font-size: 16px;
          font-family: -webkit-pictograph;
          line-height: 4px;
          margin-left: 20px;
        }
        .icon{
          font-size:20px;
        }
    </style>

@endpush
@section('content')
<section class="jobsearch">
   <div class="site-section bg-light">
      <div class="container">
        <div class="row" style="margin-top:100px;">  
          <div class="col-md-12" style="background-color:white;">
              <div class="box" style="padding: 20px 15px;margin: 5px 10px;">
               
                        @foreach($posts as $post)
                         {{$post->application_deadline}}
                         {{$post->published_date}}
                        @if($post->application_deadline > $post->published_date)
               
                          <div class="row border rounded mb-3" style="background:#E9EBEC;">
                            <div class="col-md-8">
                             <h2 style="font-size: 20px;font-weight: bold;font-family: -webkit-pictograph;margin-top: 5px;color: #03c703;"><a href="{{URL::to('/jobdetails',$post->id)}}">{{$post->job_title}}</a></h2>
                             <h2 style="font-size: 16px;font-weight: bold;font-family: -webkit-pictograph;">{{$post->company_name}}</h2>
                             <p><i class="fa fa-map-marker " aria-hidden="true" style="font-size: 20px;
                                    margin-right: 6px; margin-left: 3px;"></i> {{$post->job_location}}</p>
                             <p><i class="fa fa-graduation-cap " aria-hidden="true"></i> {!! $post->educational_requirements !!}</p>
                
                             <p><i class="fa fa-envelope " aria-hidden="true" style="margin-right: 3px;"></i> {!!$post->experience_requirements!!}</p>
                             <h6 style="float: right;font-size: 16px;font-weight: bold;font-family: -webkit-pictograph;"><i class="fa fa-calendar" aria-hidden="true"></i> Application Deadline : {{ date('F d, Y',strtotime($post->application_deadline))}}</h6>
                            </div> 
                            <div class="col-md-4">
                              <img src="/image/{{$post->logo}}" alt="logo" style="float: right;width: 40%;padding: 10px 5px;margin-top: 15px;border-radius: 50%;"><br>
                            </div>
                            </div>
                          
                       @endif
                      @endforeach
                </div>  
                  <?php echo $posts->render(); ?>
              </div>
          </div>
        </div>
      </div>
    </div>
</section>
@endsection
