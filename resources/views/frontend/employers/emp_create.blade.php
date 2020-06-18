@extends('frontend.master')
@section('title','Employers Create')
@section('content')
<section class="employersCreate">
	<div class="site-section bg-light">
      <div class="container">
        <div class="row">
        	<div class="col-lg-5" style="margin-top:100px;" >
              <div class="sidenote border rounded" style="margin-top: 0px; padding: 15px 10px;">
                 <img src="{{asset('frontend/images/ico.png')}}" alt="image" style="float: left;width: 16%;border-radius: 50%;margin-right: 10px;">
                 <p style="font-style: italic;text-align: left;">Get instant Notification about New job Posting, Match Jobs and More.</p>
              </div>
              <div class="sidenote border rounded" style="margin-top: 10px; padding: 15px 10px;">
                 <img src="{{asset('frontend/images/ico.png')}}" alt="image" style="float: left;width: 16%;border-radius: 50%;margin-right: 10px;">
                 <p style="font-style: italic;text-align: left;">Get instant Notification about New job Posting, Match Jobs and More.</p>
              </div>
              <div class="sidenote border rounded" style="margin-top: 10px; padding: 15px 10px;">
                 <img src="{{asset('frontend/images/ico.png')}}" alt="image" style="float: left;width: 16%;border-radius: 50%;margin-right: 10px;">
                 <p style="font-style: italic;text-align: left;">Get instant Notification about New job Posting, Match Jobs and More.</p>
              </div>
              <div class="sidenote border rounded" style="margin-top: 10px; padding: 15px 10px;">
                 <img src="{{asset('frontend/images/ico.png')}}" alt="image" style="float: left;width: 16%;border-radius: 50%;margin-right: 10px;">
                 <p style="font-style: italic;text-align: left;">Get instant Notification about New job Posting, Match Jobs and More.</p>
              </div>
          </div>

          <div class="col-lg-7 center" style="margin-top:100px;">
            <div class="cusLogin border rounded">
              @include('common.message')
              <form action="{{route('employeer.store')}}" method="POST" class="p-5 bg-white">
                @csrf
              <h4 class="font-weight-bold" style="color:#90C317;">Account Information</h4>
              <div class="row form-group mb-3">
                <div class="col-md-12 mb-3 mb-md-0">
                  <label class="font-weight-bold" for="username">Username</label>
                  <input type="text" id="username" name="username" class="form-control" placeholder="eg. Enter Your Full Name">
                </div>    
              </div>
              <div class="row form-group mb-3">
                <div class="col-md-12 mb-3 mb-md-0">
                  <label class="font-weight-bold" for="fullname">Password</label>
                  <input type="password" id="password" name="password" class="form-control" placeholder="eg. your password">
                </div>
              </div>
              <div class="row form-group mb-5">
                <div class="col-md-12 mb-3 mb-md-0">
                  <label class="font-weight-bold" for="fullname">Confirm Password</label>
                  <input type="password" id="password2" name="password2" class="form-control" placeholder="eg. Retype your password">
                </div>
              </div>
              <h4 class="font-weight-bold" style="color:#90C317;">Company Details Information</h4>

              <div class="row form-group mb-3">
                <div class="col-md-12 mb-3 mb-md-0">
                  <label class="font-weight-bold" for="Company Name">Company Name</label>
                  <input type="text" id="company_name" name="company_name" class="form-control" placeholder="eg.ABC Private Ltd.">
                </div>
              </div>
              <div class="row form-group mb-3">
                <div class="col-md-12 mb-3 mb-md-0">
                  <label class="font-weight-bold" for="Company Address">Company Address</label>
                  <textarea class="form-control" name="company_address" id="company_address">
                  </textarea>
                </div>
              </div>
              <div class="row form-group mb-3">
                <div class="col-md-12 mb-3 mb-md-0">
                  <label class="font-weight-bold" for="Industary Type">Industary Type</label>
                  <select class="form-control" name="industary_type" id="industary_type">
                    <option value="">------Select Industry Type------</option>
                   <?php 
                         $categories = DB::table('categories')
                                    ->where('status',1)
                                    ->get();
                    ?>
                    @foreach($categories as $category)
                      <option value="{{$category->id}}">{{$category->category_name}}</option>
                    @endforeach
                  </select>
                </div>
              </div>
              <div class="row form-group mb-3">
                <div class="col-md-12 mb-3 mb-md-0">
                  <label class="font-weight-bold" for="Company Address">Business Description</label>
                  <textarea class="form-control" name="business_description" id="business_description">
                  </textarea>
                </div>
              </div>
              <div class="row form-group mb-3">
                <div class="col-md-12 mb-3 mb-md-0">
                  <label class="font-weight-bold" for="Company Name">Business / Trade license No</label>
                  <input type="text" id="company_licen" name="company_licen" class="form-control" placeholder="eg.173648463836.">
                </div>
              </div>
              <div class="row form-group mb-3">
                <div class="col-md-12 mb-3 mb-md-0">
                  <label class="font-weight-bold" for="Company Name">Rl No (Only Recroitiny Agency)</label>
                  <input type="text" id="company_rl" name="company_rl" class="form-control" placeholder="eg.938509387.">
                </div>
              </div>
              <div class="row form-group mb-5">
                <div class="col-md-12 mb-3 mb-md-0">
                  <label class="font-weight-bold" for="Company Name">Website URL</label>
                  <input type="text" id="company_web" name="company_web" class="form-control" placeholder="eg.https://example.com">
                </div>
              </div>
              <h4 class="font-weight-bold" style="color:#90C317;">Primary Contact</h4>
              <div class="row form-group mb-3">
                <div class="col-md-12 mb-3 mb-md-0">
                  <label class="font-weight-bold" for="Contact Persons Name">Contact Person Name</label>
                  <input type="text" id="con_per_name" name="con_per_name" class="form-control" placeholder="eg.Jon Doe">
                </div>
              </div>
              <div class="row form-group mb-3">
                <div class="col-md-12 mb-3 mb-md-0">
                  <label class="font-weight-bold" for="Contact Persons Designation">Contact Person Designation</label>
                  <input type="text" id="con_per_designation" name="con_per_designation" class="form-control" placeholder="eg. CEO ">
                </div>
              </div>
              <div class="row form-group mb-3">
                <div class="col-md-12 mb-3 mb-md-0">
                  <label class="font-weight-bold" for="Contact Persons Email">Contact Person Email</label>
                  <input type="email" id="con_per_email" name="con_per_email" class="form-control" placeholder="eg. example@gmail.com">
                </div>
              </div>
              <div class="row form-group mb-3">
                <div class="col-md-12 mb-3 mb-md-0">
                  <label class="font-weight-bold" for="Contact Persons Mobile">Contact Person Mobile</label>
                  <input type="text" id="con_per_mobile" name="con_per_mobile" class="form-control" placeholder="eg. 01732036907">
                </div>
              </div>
              <div class="row form-group">
                <div class="col-md-12">
                  <input type="submit" value="Create Account" class="btn btn-primary  py-2 px-5">
                </div>
              </div>

            </form>
            
            </div>   
          </div>
           
          
        </div>
      </div>
    </div>
</section>
@endsection