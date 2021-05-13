<div class="col-md-12">
             @if($message = Session::get('message'))
      <div class="alert alert-success">  {{$message}}
      </div>
      @endif 
          <div class="tile">
            <div class="tile-body">
              <div class="table-responsive">
                <table class="table table-hover table-bordered" id="sampleTable2">
                  <thead>
                    <tr>
                      {{-- <th>S.no.</th> --}}
                      <th>Petty-code</th>
                      <th>Petty Contractor</th>
                      <th>Job_Name/Work_name</th>
                      <th>Receiver</th>
                      <th>Location</th>
                      <th>Action_perform</th>
                      @role(['acco_super_admin','acco_admin'])
                      <th>Delete</th>
                       @endrole
                    </tr>
                  </thead>
                  <tbody>
                      <?php $s_no=1 ?>
                    @foreach( $Pcl as $perm)
                    <tr>
                      <td>{{ $perm->job_code }}</td>
                      <td>{{ $perm->Pclient->firm_name }}</td>
                      <td>{{ $perm->name }}</td>
                      <td>{{ $perm->Pcompany->name }}</td>
                      <td>{{ $perm->location }}</td>
                      {{-- <td><a href=""><button class="btn btn-primary"><i class="fa fa-lg fa-eye"></i></button></a></td> --}}
                      <td><a href="{{ route('PJobMast.show',$perm->id )}}"><button class="btn btn-warning btn-sm"><i class="fa fa-lg fa-eye"></i></button></a>
                      <a href="{{ route('PJobMast.edit',$perm->id )}}"><button class="btn btn-primary btn-sm"><i class="fa fa-lg fa-edit"></i></button></a></td>
                      @role(['acco_super_admin','acco_admin'])
                      <td><form action="{{ route('PJobMast.destroy',$perm->id)}}" method="POST">
                      @method('DELETE')
                      @csrf
                      <button class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')"><i class="fa fa-lg fa-trash"></i></button>
                    </form>
                      </td>
                      @endrole
                    </tr>
                      <?php $s_no++ ?>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
  <script type="text/javascript">
      $(document).ready(function(){

      var table2 =  $('#sampleTable2').DataTable({
        dom: 'Bfrtip',
       buttons: [ { extend: 'copyHtml5', footer: true },
            { extend: 'excelHtml5', footer: true }]
    });
    table2.buttons().container()
        .appendTo( '#example_wrapper .col-md-6:eq(0)' );
        })
  </script>