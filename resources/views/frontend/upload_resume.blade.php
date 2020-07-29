@extends('frontend.master')
@section('title','Upload Resume')
@push('css')
<style type="text/css">
     .bar{
     	background-color: #000000;
        border-radius: 2px;
     }
     .para{
     	background-color: #E9EBEC;
     	border-radius: 5px;
     }
     .center{
     	margin:auto;
     }
     .upload{
     	text-align: center;
        border: 2px dotted #A8A8A8;
        padding: 10px;
        min-height: 200px;
     }
     .page{
        font-size: 100px;
        padding: 10px;
        margin-bottom: 20px;
     }
     .notice{
     	margin: 30px 0px;
     }
     .header{
     	font-size: 18px;
        color: #100dd6;
     }
     .file_note{
     	padding: 0px 20px;
     	margin:0px;
     }
     .form{
      padding: 20px 0px;
     }
     .resume{
      display: block;
      background-color: #b4bcc3;
      text-align: center;
      border-radius: 5px;
      margin: 40px 110px;
      padding: 8px;
      color: white;
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
             <div class="col-md-3">
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
             <div class="col-md-9">
             	<div class="card">
				  <div class="card-header text-white bg-dark">
				    <i class="fa fa-file" aria-hidden="true"></i> CV Attachment
				  </div>
            @include('common.message')
				  <div class="card-body">

				  	 <div class="para" style=""><p style="padding: 10px;">In this section you can upload your resume. CV attachment is the best way to stand out from the other candidates.
                                                        Show your skills on your own way.</p></div>
                     <div class="row">
                        <div class="col-md-8 center">
                          <?php 
                                   $id = Session::get('id');
                                   $resumes = DB::table('candidate_resume')
                                            ->where('candidate_id',$id)
                                            ->get();
                                   foreach ($resumes as $resume) {
                                  
                                   }
                            ?>
                          
                           <div class="upload">
                            @if(!empty($resume))
                           	   <p class="resume">{{$resume->resume}}</p>
                               <form id="delete-form-{{$resume->id}}" action="{{route('upload_resume.destroy',$resume->id)}}" method="POST" style="display:none">
                                  @csrf
                                  @method('DELETE')
                                  
                                </form>

                                <button class="btn btn-danger btn-sm"
                                onclick="if(confirm('Are You Sure You Want to Delete This')){
                                    event.preventDefault();
                                     document.getElementById('delete-form-{{$resume->id}}').submit();
                                }else{
                                       event.preventDefault();
                                }
                                ">
                                <i class="fa fa-trash" aria-hidden="true"></i>
                                </button>
                            @else
                              <i class="fa fa-files-o page" aria-hidden="true"></i>
                              <p><b>You didn't upload any CV yet.</b></p>
                            @endif  
                           </div>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-md-8 center">
                           <div class="preview" id="preview">
                            <canvas id="pdfViewer" style="width:90%;">
                           </div>
                            
				                   <div class="form">
                              <div class="row form-group">
                                <div class="col-md-8">
                                  {{Form::open(array('route'=>['upload_resume.store'],'method'=>'post','files'=>true))}}
                                   <input type="hidden" name="candidate_id" value="<?php echo $id; ?>">
                                   <input type="file" name="resume" id="myPdf">
                                  
                                </div>
                                <div class="col-md-4">
                                  <input type="submit" value="Upload" class="btn btn-primary btn-md  py-2 px-5">
                                </div>
                                {!! Form::close() !!}
                              </div>
                           </div>
				            
                        </div>
                        <div class="col-md-8 center">
                           <div class="notice">
                           	   <h3 class="header">Standard file uploading guideline.</h3>
                           	       <p class="file_note">File must be less than 1 MB.</p>
                           	       <p class="file_note">File format should be .pdf</p>
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
<script src="https://mozilla.github.io/pdf.js/build/pdf.js"></script>
<script>
 // Loaded via <script> tag, create shortcut to access PDF.js exports.
var pdfjsLib = window['pdfjs-dist/build/pdf'];
// The workerSrc property shall be specified.
pdfjsLib.GlobalWorkerOptions.workerSrc = 'https://mozilla.github.io/pdf.js/build/pdf.worker.js';

$("#myPdf").on("change", function(e){
  var file = e.target.files[0]
  if(file.type == "application/pdf"){
    var fileReader = new FileReader();  
    fileReader.onload = function() {
      var pdfData = new Uint8Array(this.result);
      // Using DocumentInitParameters object to load binary data.
      var loadingTask = pdfjsLib.getDocument({data: pdfData});
      loadingTask.promise.then(function(pdf) {
        console.log('PDF loaded');
        
        // Fetch the first page
        var pageNumber = 1;
        pdf.getPage(pageNumber).then(function(page) {
        console.log('Page loaded');
        
        var scale = 1.0;
        var viewport = page.getViewport({scale: scale});

        // Prepare canvas using PDF page dimensions
        var canvas = $("#pdfViewer")[0];
        var context = canvas.getContext('2d');
        canvas.height = viewport.height;
        canvas.width = viewport.width;

        // Render PDF page into canvas context
        var renderContext = {
          canvasContext: context,
          viewport: viewport
        };
        var renderTask = page.render(renderContext);
        renderTask.promise.then(function () {
          console.log('Page rendered');
        });
        });
      }, function (reason) {
        // PDF loading error
        console.error(reason);
      });
    };
    fileReader.readAsArrayBuffer(file);
  }
});
</script>
@endpush