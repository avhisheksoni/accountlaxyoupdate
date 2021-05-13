<div class="col-md-12">
             @if($message = Session::get('message'))
      <div class="alert alert-success">  {{$message}}
      </div>
      @endif 
          <div class="tile">
            <div class="tile-body">
              <div class="table-responsive">
                <table class="table table-hover table-bordered" id="sampleTable13">
                  <thead>
                    <tr>
                      <th>Job-code</th>
                      <th>Job_Name/Work_name</th>
                      <th>Start Date</th>
                      <th>End Date</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $s_no=1; ?>
                    @foreach( $job as $perm)
                    <tr>
                      <td>{{ $perm->job_code }}</td>
                      <td>{{ $perm->job_describe }}</td>
                      <td>{{ $perm->work_s_data }}</td>
                      <td>{{ $perm->Work_end_date }}</td>
                      <td><a href="{{ route('job-details',[$perm->id]) }}"><button class="btn btn-warning btn-sm"><i class="fa fa-lg fa-eye"></i></button></a>
                        @role(['acco_super_admin','acco_admin'])
                      <a href="{{ route('job-edit',[$perm->id]) }}"><button class="btn btn-primary btn-sm"><i class="fa fa-lg fa-edit"></i></button></a><a class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')" href="{{ route('job-delete',[$perm->id]) }}"><i class="fa fa-trash"></i></a>

                       @endrole
                      </td>
                    </tr>
                     <?php $s_no++ ?>
                    @endforeach
                  </tbody>
                </table>
                {{-- {{ $job->links() }} --}}
              </div>
            </div>
          </div>
           <div class="tile-footer">
                <a href="{{route('job-create')}}"><button class="btn btn-primary">Add Job</button></a>
          </div>
        </div>
  <script type="text/javascript">
      $(document).ready(function(){

      var table2 =  $('#sampleTable13').DataTable({
        dom: 'Bfrtip',
       buttons: [ { extend: 'copyHtml5', footer: true },
            { extend: 'excelHtml5', footer: true }]
    });
    table2.buttons().container()
        .appendTo( '#example_wrapper .col-md-6:eq(0)' );
        })
  </script>