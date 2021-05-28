@extends('layouts.master')
@section('content')



<main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-th-list"></i>Petty Contarctor List</h1>
          <p>All Record till Now</p>
        </div>
        <ul class="app-breadcrumb breadcrumb side">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item">Petty Contarctor List</li>
          <li class="breadcrumb-item active"><a href="">Petty Contarctor List</a></li>
        </ul>
      </div>
      {{-- <p><a class="btn btn-primary icon-btn" href="{{ route('fund-request') }}"><i class="fa fa-plus"></i>Add Fund Request</a></p> --}}
      <div class="row">
        <div class="col-md-12">
           @if($message = Session::get('message'))
      <div class="alert alert-success">  {{$message}}
      </div>
      @endif 
          <div class="tile">
            <div class="tile-body">
              <div class="table-responsive">
                <table class="table table-hover table-bordered" id="">
                  <thead>
                    <tr>
                      <th>Firm-name</th>
                      <th>Email</th>
                      <th>Mobile No.</th>
                      <th>Gstin No.</th>
                      
                    </tr>
                  </thead>
                  <tbody>
                    
                 <?php $s_no=1 ?>
                    @foreach( $petty as $perm)
                    <tr>
                      <td>{{ $perm->firm_name }}</td>
                      <td>{{ $perm->email }}</td>
                      <td>{{ $perm->mobile }}</td>
                      <td>{{ $perm->gst_number }}</td>
                    </tr>
                    <?php $s_no++ ?>
                    @endforeach
                  </tbody>
                </table>
              {{--   {{ $petty->links() }} --}}
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    </div>
  </div>
    </main>
@endsection