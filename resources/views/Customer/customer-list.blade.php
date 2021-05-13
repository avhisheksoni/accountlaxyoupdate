@extends('layouts.master')
@section('content')



<main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-th-list"></i>Banks</h1>
          <p>All Record till Now</p>
        </div>
        <ul class="app-breadcrumb breadcrumb side">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item">Banks</li>
          <li class="breadcrumb-item active"><a href="{{ route('purchaseform') }}">Bank-From</a></li>
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
                      <th>S.no.</th>
                      <th>Name</th>
                      <th>code</th>
                      <th>Email</th>
                      <th>Gstin</th>
                      <th>Designation</th>
                      <th>contact</th>
                      <th>address</th>
                      <th>City</th>
                      <th>State</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  	
                 <?php $s_no=1 ?>
                    @foreach( $cust as $perm)
                    <tr>
                      <td>{{ $s_no }}</td>
                      <td>{{ $perm->customer_desc }}</td>
                      <td>{{ $perm->cust_code }}</td>
                      <td>{{ $perm->email }}</td>
                      <td>{{ $perm->gstin }}</td>
                      <td>{{ $perm->designation }}</td>
                      <td>{{ $perm->contact1 }}</td>
                      <td>{{ $perm->address }}</td>
                      <td>{{ App\City::find($perm->district)->city_name }}</td>
                      <td>{{ App\state::find($perm->state)->state_name }}</td>
                      <td><a href="{{ route('customer-edit',[$perm->id]) }}"><button class="btn btn-primary"><i class="fa fa-lg fa-edit"></i></button></a><a href=""><button class="btn btn-danger"><i class="fa fa-lg fa-trash"></i></button></a>
                      </td>
                    </tr>
                    <?php $s_no++ ?>
                    @endforeach
                  </tbody>
                </table>
                {{ $cust->links() }}
              </div>
            </div>
          </div>
             <div class="tile-footer">
                <a href="{{ route('customer-add') }}"><button class="btn btn-primary">Add Request</button></a>
              </div>
        </div>
      </div>
    </main>

@endsection