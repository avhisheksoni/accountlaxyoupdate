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
                      <th>our Company</th>
                      <th>Client</th>
                      <th>Comp-code</th>
                      <th>Uni -code</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  	@foreach($acl as $grahak)
                    <tr>
                     <td>{{ $grahak->company->name }}</td>
                     <td>{{ $grahak->client->name }}</td>
                      <td>{{ rtrim(substr($grahak->unique_client_code ,0,(strlen($grahak->unique_client_code)-strlen(substr($grahak->unique_client_code, strrpos($grahak->unique_client_code, '/') + 1))) ),"/") }}</td>
                      <td>{{ substr($grahak->unique_client_code, strrpos($grahak->unique_client_code, '/') + 1) }}</td>
                     
                      <td><a href=""><button class="btn btn-warning"><i class="fa fa-lg fa-eye"></i></button></a>
                      <a href=""><button class="btn btn-primary"><i class="fa fa-lg fa-edit"></i></button></a>
                      <a href=""><button class="btn btn-danger"><i class="fa fa-lg fa-trash"></i></button></a></td>
                    </tr>
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