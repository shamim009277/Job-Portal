@extends('admin.layout.app')
@section('title','Admin Dashboard | Job Seaker')
@section('content')
<section class="content">
      <div class="container-fluid">
        <!-- Info boxes -->
        <div class="row mt-20">
          <div class="col-md-12">
          	  <div class="box box-success">
                <div class="box-header">
                  <i class="ion ion-clipboard"></i>
                  <h3 class="box-title">Candidate List</h3>
                  @include('common.message')
                </div><!-- /.box-header -->
                <div class="box-body">
                   <table id="example2" class="table table-bordered table-striped table-responsive dataTable">
                <thead>
                <tr>
                  <th>Sl</th>
                  <th>Full Name</th>
                  <th>Email</th>
                  <th>Gender</th>
                  <th>Mobile</th>
                </tr>
                </thead>
                {{$candidates}}
                <tbody>
                <?php $i=0; ?>
                @foreach($candidates as $candidate)
                
                <tr>
                  <td><?php echo ++$i; ?></td>
                  <td>{{$candidate->fullname}}</td>
                  <td>{{$candidate->email}}</td>
                  <td>{{$candidate->gender}}</td>
                  <td>{{$candidate->mobile}}</td>
                </tr> 
               @endforeach                            
                </tbody> 
              </table>    
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



