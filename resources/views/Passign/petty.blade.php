@extends('layouts.master')
@section('content')

<main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-th-list"></i>Petty Contarctor Assign List</h1>
          <p>All Record till Now</p>
        </div>
        <ul class="app-breadcrumb breadcrumb side">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item">Petty Contarctor Assign</li>
          <li class="breadcrumb-item active"><a href="">Petty Contarctor Assign Add</a></li>
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
                <table class="table table-hover table-bordered" id="sampleTable">
                  <thead>
                    <tr>
                      <th>Petty Contractor</th>
                      <th>GSTIN/UIN of Recipient</th>
                      <th>Pan No.</th>
                      <th>Contact No.</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($petty as $py)
                    <tr>
                      <td>{{ $py->firm_name }}</td>
                      <td>{{ $py->gst_number }}</td>
                      <td>{{ $py->pan_no }}</td>
                      <td>{{ $py->mobile }}</td>
                     </tr>
                     @endforeach
                  </tbody>
                </table>
                 {{ $petty->links() }}
              </div>
            </div>
          </div>
            <div class="tile-footer">
        </div>
      </div>
      <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    </div>
  </div>
    </main>
@endsection