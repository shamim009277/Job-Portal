@extends('admin.layout.app')
@section('title','Admin Dashboard | Blogs')
@section('content')
<section class="content">
      <div class="container-fluid">
        <!-- Info boxes -->
        <div class="row mt-20">
          <div class="col-md-12">
          	  <div class="box box-success">
                <div class="box-header">
                  <i class="ion ion-clipboard"></i>
                  <h3 class="box-title">Category List</h3>
                  @include('common.message')
                  <div class="box-tools pull-right">
                    <a href="{{route('blog.create')}}" class="btn btn-info pull-right"><i class="fa fa-plus"></i> Add Blog</a>
                  </div>
                </div><!-- /.box-header -->
                <div class="box-body">
                   <table id="example1" class="table table-bordered table-striped table-responsive dataTable">
                <thead>
                  
                <tr>
                  <th>Sl</th>
                  <th>Title Name</th>
                  <th>Photo</th>
                  <th>Description</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                  <?php 
                      $num = 0;
                   ?>
                  @foreach($blogs as $blog)
                    <td><?php echo ++$num; ?></td>
                    <th>{{$blog->title}}</th>
                    <td>{{$blog->short_description}}</td>
                    <td><?php echo substr($blog->description,0,100); ?> ...</td>
                    <td>
                      @if($blog->status==1)
                      <span class="label label-success">Active</span>
                      @else
                      <span class="label label-danger">Unactive</span>
                      @endif
                    </td>
                    <td>
                      @if($blog->status==1)
                      <a class="btn btn-danger btn-sm" href=""><i class="fa fa-thumbs-down" aria-hidden="true"></i></a>
                      @else
                      <a class="btn btn-info btn-sm" href=""><i class="fa fa-thumbs-up" aria-hidden="true"></i></a>
                      @endif
                      <a class="btn btn-success btn-sm" href="{{route('blog.edit',$blog->id)}}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                    </td>
                  @endforeach                      
                </tbody>
               
              </table>
                </div><!-- /.box-body -->
                <div class="box-footer clearfix no-border">
                  
                </div>
              </div>

          </div>      
        </div>
        
        <!-- /.row -->
      </div><!--/. container-fluid -->
    </section>
@endsection
@push('scripts')

<script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>

@endpush




