@extends('admin.layout.app')
@section('title','Dashboard | Add Blog')
@push('css')
     <link rel="stylesheet" href="{{asset('frontend/css/summernote.main.css')}}">  
     <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.16/dist/summernote.min.css" rel="stylesheet">
     
@endpush
@section('content')

<section class="content">
<div class="row">
        <div class="col-md-12">
          <div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title">Add New Blog</h3>
              @include('common.message')
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
               
                <button type="button" class="btn btn-box-tool" data-toggle="dropdown">
                    <i class="fa fa-wrench"></i></button>
                              
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
         @if(!empty($editBlog))
         {{ Form::open(array('route'=>['blog.update',$editBlog->id],'method'=>'PUT','files'=>true)) }}
         <?php $but = "Update Blog"; ?>
         @else
         {{ Form::open(array('route'=>['blog.store'],'method'=>'POST','files'=>true)) }}
         <?php $but = "Add Blog"; ?>
         @endif
         	@csrf

            <div class="box-body">
              <div class="row">
                 <div class="col-md-12">
                 		
                 		<div class="form-group row">
		                  <label for="blog_title" class="col-sm-3 control-label">Blog Title</label>
		                  <div class="col-sm-8">
		                    <input type="text" class="form-control" id="title" value="{{isset($editBlog->title)?$editBlog->title:old('title')}}" name="title" placeholder="Enter Blog Title" >
		                  </div>
		                </div>

                    <div class="form-group row">
                      <label for="description" class="col-sm-3 control-label">Description</label>
                      <div class="col-sm-8">
                        <textarea name="description" class="summernote">
                        {!! isset($editBlog->description) ? $editBlog->description : old('description') !!}    
                       </textarea>
                      </div>      
                    </div>
                    @if(isset($editBlog->photo))
                    <div class="form-group row">
                      <label for="Photo" class="col-sm-3 control-label">Old Photo</label>
                      <div class="col-sm-8">
                        <img src='{{asset("blog_image/$editBlog->photo")}}'>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="Photo" class="col-sm-3 control-label">New Photo</label>
                      <div class="col-sm-8">
                        <input type="file" name="new_photo" onchange="loadFile(event)">
                        <img id="output" width="20%" style="margin-top:5px;" />
                      </div>
                    </div>

                    @else
                    <div class="form-group row">
                      <label for="Photo" class="col-sm-3 control-label">Photo</label>
                      <div class="col-sm-8">
                        <input type="file" name="photo" onchange="loadFile(event)">
                        <img id="output" width="20%" style="margin-top:5px;" />
                      </div>
                    </div>
                    @endif
                  </div>
               
             </div>
              <!-- /.row -->
            </div>
            <!-- ./box-body -->
            <div class="box-footer">
              <div class="row">
                <div class="col-md-12">
                	<button type="submit" class="btn btn-primary pull-right"><?php echo $but; ?>
                	</button>

                	<button type="reset" class="btn btn-default"> Cancel
                	</button>    	
                </div>                
              </div>
            </div>
          {!! Form::close() !!}
            <!-- /.box-footer -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <script>
         var loadFile = function(event) {
         var reader = new FileReader();
         reader.onload = function(){
         var output = document.getElementById('output');
         output.src = reader.result;
                                     };
    reader.readAsDataURL(event.target.files[0]);
       };
      </script>

  </section> 
@endsection
@push('scripts')
    <script src="{{asset('frontend/js/summernote.main.js')}}"></script>
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