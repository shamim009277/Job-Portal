@extends('admin.layout.app')
@section('title','Add Category')
@section('content')

<section class="content">
<div class="row">
        <div class="col-md-12">
          <div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title">Add New Category</h3>
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
         @if(!empty($edit_category))
         {{ Form::open(array('route'=>['category.update',$edit_category->id],'method'=>'PUT','files'=>true)) }}
         <?php $but = "Update"; ?>
         @else
         {{ Form::open(array('route'=>['category.store'],'method'=>'POST','files'=>true)) }}
         <?php $but = "Save"; ?>
         @endif
         	@csrf

            <div class="box-body">
              <div class="row">
                 <div class="col-md-12">
                 		
                 		<div class="form-group row">
		                  <label for="category_name" class="col-sm-4 control-label">Category Name</label>
		                  <div class="col-sm-6">
		                    <input type="text" class="form-control" id="category_name" name="category_name" placeholder="Enter Category Name" >
		                  </div>
		                </div>

		                <div class="form-group row">
		                  <label for="status" class="col-sm-4 control-label">Publication Status</label>
		                  <div class="col-sm-8">
		                    <input type="checkbox" name="status" value="1">
		                  </div>
		                </div> 	
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

  </section> 
@endsection