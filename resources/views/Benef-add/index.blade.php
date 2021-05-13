@extends('layouts.master')
@section('content')



<main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-th-list"></i>Beneficiary List</h1>
          <p>All Record till Now</p>
        </div>
        <ul class="app-breadcrumb breadcrumb side">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item">Beneficiary</li>
          <li class="breadcrumb-item active"><a href="{{ route('benef-create')}}">Beneficiary-From</a></li>
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
                <table class="table table-hover table-bordered sampleTable13" id="">
                  <thead>
                    <tr>
                      {{-- <th>S.no.</th> --}}
                      <th>BG-code</th>
                      <th>Company</th>
                      <th>Beneficiary</th>
                      <th>PAN  No.</th>
                      <th>Contact No.</th>
                      <th>Email</th>
                      <th>City</th>
                     {{--  <th>view</th> --}}
                      <th>Action_Performance</th>
                    </tr>
                  </thead>
                  <tbody>
                    
                 <?php $s_no=1 ?>
                    @foreach( $benef as $perm)
                    <tr>
                      {{-- <td>{{ $s_no }}</td> --}}
                      <td>{{ $perm->bg_request_id  }}</td>
                      <td>{{ $perm->company->name }}</td>
                     <td>{{ $perm->beneficiary->name }}</td>
                     <td>{{ $perm->beneficiary->pan_no}}</td>
                      <td>{{ $perm->beneficiary->contact}}</td>
                      <td>{{ $perm->beneficiary->email }}</td>
                      <td>{{ App\City::find($perm->beneficiary->city_code)->city_name }}</td>
                      <td><a href="{{ route('benef-details',[$perm->id]) }}"><button class="btn btn-warning"><i class="fa fa-lg fa-eye"></i></button></a>
                      <a href="{{ route('benef-edit',[$perm->id]) }}"><button class="btn btn-primary"><i class="fa fa-lg fa-edit"></i></button></a>
                        <a href="{{ route('benef-delete',[$perm->id]) }}"><button class="btn btn-danger" onclick="return confirm('Are you sure?')"><i class="fa fa-lg fa-trash"></i></button></a>
                      </td>
                    </tr>
                    <?php $s_no++ ?>
                    @endforeach
                  </tbody>
                </table>
                {{ $benef->links() }}
              </div>
            </div>
          </div>
            <div class="tile-footer">
                <a href="{{ route('benef-create')}}"><button class="btn btn-primary">Add Request</button></a>
              </div>
        </div>
      </div>
      <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    </div>
  </div>
    </main>
@endsection