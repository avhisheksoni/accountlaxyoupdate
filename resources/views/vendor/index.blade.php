@extends('layouts.master')
@section('content')



<main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-th-list"></i>Vendors Listing</h1>
          <p>All Record till Now</p>
        </div>
        <ul class="app-breadcrumb breadcrumb side">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item">Vendors Listing</li>
          <li class="breadcrumb-item active"><a href="">Vendors Listing</a></li>
        </ul>
      </div>
      <div class="row">
        <div class="col-md-12">
           @if($message = Session::get('success'))
      <div class="alert alert-success">  {{$message}}
      </div>
      @endif 
          <div class="tile">
            <div class="tile-body">
              <div class="table-responsive">
                <table class="table table-hover table-bordered" id="sampleTable13">
                  <thead>
                    <tr>
                      <th>S.No</th>
                      <th>Firm Name</th>
                      <th>Email</th>
                      <th>Mobile No.</th>
                      <th>Reg. vendor No.</th>
                      <th>GST No.</th>
                      <th>Action_perform</th>
                    </tr>
                  </thead>
                  <tbody>
                    @php $s_no = 1 @endphp
                  @foreach($vendors as $ven)
                    <tr>
                      <td>{{ $s_no++ }}</td>
                      <td>{{ $ven->firm_name }}</td>
                      <td>{{ $ven->email }}</td>
                      <td>{{ $ven->mobile }}</td>
                      <td>ryrey</td>
                      <td>{{ $ven->gst_number }}</td>
                      
                      <td><a href="{{ route('vendor.show',[$ven->id])}}"><button class="btn btn-warning btn-sm"><i class="fa fa-lg fa-eye"></i></button></a>
                     <a href="{{ route('vendor.edit',[$ven->id]) }}"><button class="btn btn-primary btn-sm"><i class="fa fa-lg fa-edit"></i></button></a>
                      @role(['acco_super_admin','acco_admin'])
                        <a href=""><button class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')"><i class="fa fa-lg fa-trash"></i></button></a>
                      @endrole
                      </td>
                    </tr>
                @endforeach
                  </tbody>
                </table>
              {{--   {{ $acl->links() }} --}}
              </div>
            </div>
          </div>
            <div class="tile-footer">
                <a href="{{route('vendor.create')}}"><button class="btn btn-primary"><i class="fa fa-lg fa-plus"></i>Create Vendor</button></a>
              </div>
        </div>
      </div>
      <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    </div>
  </div>
    </main>

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
@endsection