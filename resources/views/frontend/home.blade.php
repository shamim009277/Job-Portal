@extends('frontend.master')
@section('title','Job Portal')
@section('content')
<section class="content">
	<!--Search Job Option-->
	<div class="site-blocks-cover overlay" style="background-image: url('frontend/images/hero_1.jpg');" data-aos="fade" data-stellar-background-ratio="0.5">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-12" data-aos="fade">
            <h1>Find Job</h1>
            <form action="#">
              <div class="row mb-3">
                <div class="col-md-9">
                  <div class="row">
                    <div class="col-md-6 mb-3 mb-md-0">
                      <input type="text" class="mr-3 form-control border-0 px-4" placeholder="job title, keywords or company name ">
                    </div>
                    <div class="col-md-6 mb-3 mb-md-0">
                      <div class="input-wrap">
                        <span class="icon icon-room"></span>
                      <input type="text" class="form-control form-control-block search-input  border-0 px-4" id="autocomplete" placeholder="city, province or region" onFocus="geolocate()">
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-3">
                  <input type="submit" class="btn btn-search btn-primary btn-block" value="Search">
                </div>
              </div>  
            </form>
          </div>
        </div>
      </div>
    </div><!--End Search Job Option-->

   <!--Popular Categories-->
	<div class="site-section">
      <div class="container">
        <div class="row">
          <div class="col-md-6 mx-auto text-center mb-5 section-heading">
            <h2 class="mb-5">Popular Categories</h2>
          </div>
        </div>
        <?php 
              $categories = DB::table('categories')
                           ->where('status',1)
                           ->get();   
                           
         ?>
        
        <div class="row">
        @foreach($categories as $category) 
           <?php 
                 $posts = DB::table('job_posts')
                         ->where('job_category',$category->id)
                         ->count();

            ?>
          @if(($posts)!= 0)
             
          <div class="col-sm-6 col-md-4 col-lg-3" data-aos="fade-up" data-aos-delay="100">
            <a href="#" class="feature-item">
              <h2>{{$category->category_name}}</h2>  
              <h2>({{$posts}})</h2>  
            </a>
          </div>
          @endif 
        @endforeach
                     
        </div>
       
      </div>
    </div><!--End Popular Categories-->

    <!--Hot Jobs Option-->
	<div class="site-section bg-light">
      <div class="container">
	   <div class="row">
          <div class="col-md-6 mx-auto text-center mb-5 section-heading">
            <h2 class="mb-5">Hot Jobs</h2>
          </div>
        </div>
        <div class="row">
          <div class="col-md-3 mb-2" data-aos="fade-up" data-aos-delay="100">
              <div class="card">
				  <img src="frontend/images/img_3.jpg" height="110px" class="card-img-top" alt="...">
				  <div class="card-body">
				    <h5>Company Name</h5>
					<p class="card-text">Application Position</p>
				  </div>
			  </div>
          </div> 
          <div class="col-md-3 mb-2" data-aos="fade-up" data-aos-delay="100">
              <div class="card">
				  <img src="frontend/images/img_3.jpg" height="110px" class="card-img-top" alt="...">
				  <div class="card-body">
				    <h5>Company Name</h5>
					<p class="card-text">Application Position</p>
				  </div>
			  </div>
          </div>
          <div class="col-md-3 mb-2" data-aos="fade-up" data-aos-delay="100">
              <div class="card">
				  <img src="frontend/images/img_3.jpg" height="110px" class="card-img-top" alt="...">
				  <div class="card-body">
				    <h5>Company Name</h5>
					<p class="card-text">Application Position</p>
				  </div>
			  </div>
          </div>
		  <div class="col-md-3 mb-2" data-aos="fade-up" data-aos-delay="100">
              <div class="card">
				  <img src="frontend/images/img_3.jpg" height="110px" class="card-img-top" alt="...">
				  <div class="card-body">
				    <h5>Company Name</h5>
					<p class="card-text">Application Position</p>
				  </div>
			  </div>
          </div>		  		  
        </div>		
      </div>
    </div><!--End Hot Jobs Option-->

	<div class="site-section" data-aos="fade">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-md-6 mb-5 mb-md-0">
            
              <div class="img-border">
                <a href="https://vimeo.com/28959265" class="popup-vimeo image-play">
                  <span class="icon-wrap">
                    <span class="icon icon-play"></span>
                  </span>
                  <img src="images/hero_2.jpg" alt="Image" class="img-fluid rounded">
                </a>
              </div>
            
          </div>
          <div class="col-md-5 ml-auto">
            <div class="text-left mb-5 section-heading">
              <h2>Testimonies</h2>
            </div>
            <p class="mb-4 h5 font-italic lineheight1-5">&ldquo;Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eaque, nisi Lorem ipsum dolor sit amet, consectetur adipisicing elit. Odit nobis magni eaque velit eum, id rem eveniet dolor possimus voluptas..&rdquo;</p>
            <p>&mdash; <strong class="text-black font-weight-bold">John Holmes</strong>, Marketing Strategist</p>
            <p><a href="https://vimeo.com/28959265" class="popup-vimeo text-uppercase">Watch Video <span class="icon-arrow-right small"></span></a></p>
          </div>
        </div>
      </div>
    </div>


    <div class="site-blocks-cover overlay inner-page" style="background-image: url('images/hero_1.jpg');" data-aos="fade" data-stellar-background-ratio="0.5">
      <div class="container">
        <div class="row align-items-center justify-content-center">
          <div class="col-md-6 text-center" data-aos="fade">
            <h1 class="h3 mb-0">Your Dream Job</h1>
            <p class="h3 text-white mb-5">Is Waiting For You</p>
            <p><a href="#" class="btn btn-outline-warning py-3 px-4">Find Jobs</a> <a href="#" class="btn btn-warning py-3 px-4">Apply For A Job</a></p>
            
          </div>
        </div>
      </div>
    </div>

	<div class="site-section site-block-feature bg-light">
      <div class="container">        
        <div class="text-center mb-5 section-heading">
          <h2>Why Choose Us</h2>
        </div>
        <div class="d-block d-md-flex border-bottom">
          <div class="text-center p-4 item border-right" data-aos="fade">
            <span class="flaticon-worker display-3 mb-3 d-block text-primary"></span>
            <h2 class="h4">More Jobs Every Day</h2>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Obcaecati reprehenderit explicabo quos fugit vitae dolorum.</p>
            <p><a href="#">Read More <span class="icon-arrow-right small"></span></a></p>
          </div>
          <div class="text-center p-4 item" data-aos="fade">
            <span class="flaticon-wrench display-3 mb-3 d-block text-primary"></span>
            <h2 class="h4">Creative Jobs</h2>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Obcaecati reprehenderit explicabo quos fugit vitae dolorum.</p>
            <p><a href="#">Read More <span class="icon-arrow-right small"></span></a></p>
          </div>
        </div>
        <div class="d-block d-md-flex">
          <div class="text-center p-4 item border-right" data-aos="fade">
            <span class="flaticon-stethoscope display-3 mb-3 d-block text-primary"></span>
            <h2 class="h4">Healthcare</h2>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Obcaecati reprehenderit explicabo quos fugit vitae dolorum.</p>
            <p><a href="#">Read More <span class="icon-arrow-right small"></span></a></p>
          </div>
          <div class="text-center p-4 item" data-aos="fade">
            <span class="flaticon-calculator display-3 mb-3 d-block text-primary"></span>
            <h2 class="h4">Finance &amp; Accounting</h2>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Obcaecati reprehenderit explicabo quos fugit vitae dolorum.</p>
            <p><a href="#">Read More <span class="icon-arrow-right small"></span></a></p>
          </div>
        </div>
      </div>
    </div>

	<div class="site-section block-15">
      <div class="container">
        <div class="row">
          <div class="col-md-6 mx-auto text-center mb-5 section-heading">
            <h2>Recent Blog</h2>
          </div>
        </div>
        <div class="nonloop-block-15 owl-carousel">
            <div class="media-with-text">
              <div class="img-border-sm mb-4">
                <a href="#" class="image-play">
                  <img src="{{asset('frontend/images/img_1.jpg')}}" alt="" class="img-fluid">
                </a>
              </div>
              <h2 class="heading mb-0 h5"><a href="#">Jobs are made easy</a></h2>
              <span class="mb-3 d-block post-date">January 20, 2018 &bullet; By <a href="#">Admin</a></span>
              <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Optio dolores culpa qui aliquam placeat nobis veritatis tempora natus rerum obcaecati.</p>
            </div>
          
            <div class="media-with-text">
              <div class="img-border-sm mb-4">
                <a href="#" class="image-play">
                  <img src="frontend/images/img_2.jpg" alt="" class="img-fluid">
                </a>
              </div>
              <h2 class="heading mb-0 h5"><a href="#">Jobs are made easy</a></h2>
              <span class="mb-3 d-block post-date">January 20, 2018 &bullet; By <a href="#">Admin</a></span>
              <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Optio dolores culpa qui aliquam placeat nobis veritatis tempora natus rerum obcaecati.</p>
            </div>
          
            <div class="media-with-text">
              <div class="img-border-sm mb-4">
                <a href="#" class="image-play">
                  <img src="frontend/images/img_3.jpg" alt="" class="img-fluid">
                </a>
              </div>
              <h2 class="heading mb-0 h5"><a href="#">Jobs are made easy</a></h2>
              <span class="mb-3 d-block post-date">January 20, 2018 &bullet; By <a href="#">Admin</a></span>
              <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Optio dolores culpa qui aliquam placeat nobis veritatis tempora natus rerum obcaecati.</p>
            </div>

            <div class="media-with-text">
              <div class="img-border-sm mb-4">
                <a href="#" class="image-play">
                  <img src="frontend/images/img_1.jpg" alt="" class="img-fluid">
                </a>
              </div>
              <h2 class="heading mb-0 h5"><a href="#">Jobs are made easy</a></h2>
              <span class="mb-3 d-block post-date">January 20, 2018 &bullet; By <a href="#">Admin</a></span>
              <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Optio dolores culpa qui aliquam placeat nobis veritatis tempora natus rerum obcaecati.</p>
            </div>
          
            <div class="media-with-text">
              <div class="img-border-sm mb-4">
                <a href="#" class="image-play">
                  <img src="frontend/images/img_2.jpg" alt="" class="img-fluid">
                </a>
              </div>
              <h2 class="heading mb-0 h5"><a href="#">Jobs are made easy</a></h2>
              <span class="mb-3 d-block post-date">January 20, 2018 &bullet; By <a href="#">Admin</a></span>
              <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Optio dolores culpa qui aliquam placeat nobis veritatis tempora natus rerum obcaecati.</p>
            </div>
          
            <div class="media-with-text">
              <div class="img-border-sm mb-4">
                <a href="#" class="image-play">
                  <img src="frontend/images/img_3.jpg" alt="" class="img-fluid">
                </a>
              </div>
              <h2 class="heading mb-0 h5"><a href="#">Jobs are made easy</a></h2>
              <span class="mb-3 d-block post-date">January 20, 2018 &bullet; By <a href="#">Admin</a></span>
              <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Optio dolores culpa qui aliquam placeat nobis veritatis tempora natus rerum obcaecati.</p>
            </div>
            
            <div class="media-with-text">
              <div class="img-border-sm mb-4">
                <a href="#" class="image-play">
                  <img src="frontend/images/img_1.jpg" alt="" class="img-fluid">
                </a>
              </div>
              <h2 class="heading mb-0 h5"><a href="#">Jobs are made easy</a></h2>
              <span class="mb-3 d-block post-date">January 20, 2018 &bullet; By <a href="#">Admin</a></span>
              <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Optio dolores culpa qui aliquam placeat nobis veritatis tempora natus rerum obcaecati.</p>
            </div>
          
            <div class="media-with-text">
              <div class="img-border-sm mb-4">
                <a href="#" class="image-play">
                  <img src="frontend/images/img_2.jpg" alt="" class="img-fluid">
                </a>
              </div>
              <h2 class="heading mb-0 h5"><a href="#">Jobs are made easy</a></h2>
              <span class="mb-3 d-block post-date">January 20, 2018 &bullet; By <a href="#">Admin</a></span>
              <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Optio dolores culpa qui aliquam placeat nobis veritatis tempora natus rerum obcaecati.</p>
            </div>
          
            <div class="media-with-text">
              <div class="img-border-sm mb-4">
                <a href="#" class="image-play">
                  <img src="frontend/images/img_3.jpg" alt="" class="img-fluid">
                </a>
              </div>
              <h2 class="heading mb-0 h5"><a href="#">Jobs are made easy</a></h2>
              <span class="mb-3 d-block post-date">January 20, 2018 &bullet; By <a href="#">Admin</a></span>
              <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Optio dolores culpa qui aliquam placeat nobis veritatis tempora natus rerum obcaecati.</p>
            </div>
        </div>
      </div>
    </div>
</section>
@endsection