@extends('admin.layout.app')
@section('title','Admin Dashboard | Job Category')
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
                    <a href="{{route('category.create')}}" class="btn btn-info pull-right"><i class="fa fa-plus"></i> Add Category</a>
                  </div>
                </div><!-- /.box-header -->
                <div class="box-body">
                   <table id="example1" class="table table-bordered table-striped table-responsive dataTable">
                <thead>
                <tr>
                  <th>Sl</th>
                  <th>Category Name</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php $i=0; ?>
                @foreach($all_category as $category)
                
                <tr>
                  <td><?php echo ++$i; ?></td>
                  <td>{{$category->category_name}}</td>
                  <td>
                    @if($category->status==1)
                    <span class="label label-success">Active</span>
                    @else
                    <span class="label label-danger">Unactive</span>
                    @endif
                  </td>
                  <td>
                    @if($category->status==1)
                    <a class="btn btn-danger btn-sm" href=""><i class="fa fa-thumbs-down" aria-hidden="true"></i></a>
                    @else
                    <a class="btn btn-info btn-sm" href=""><i class="fa fa-thumbs-up" aria-hidden="true"></i></a>
                    @endif
                    <a class="btn btn-success btn-sm" href="{{route('category.edit',$category->id)}}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                    <form id="delete-form-{{$category->id}}" action="{{route('category.destroy',$category->id)}}" method="POST" style="display:none">
                      @csrf
                      @method('DELETE')
                      
                    </form>

                    <button class="btn btn-danger btn-sm"
                    onclick="if(confirm('Are You Sure You Want to Delete This')){
                        event.preventDefault();
                         document.getElementById('delete-form-{{$category->id}}').submit();
                    }else{
                           event.preventDefault();
                    }
                    ">
                    <i class="fa fa-trash" aria-hidden="true"></i>
                    </button>
                    
                  </td>
                </tr> 
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



