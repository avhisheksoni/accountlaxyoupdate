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
                      {{-- <th>S.no.</th> --}}
                      <th>Bank code</th>
                      <th>Bank</th>
                      <th>Ac_Holder_Name</th>
                      <th>Ifsc_code</th>
                      <th>A/c No.</th>
                      <th>Bank_Branch_Adddress</th>
                      <th>Person_Contact</th>
                      <th>Email</th>
                      <th>Action_perform</th>
                      @role(['acco_super_admin','acco_admin'])
                      <th>Delete</th>
                      @endrole
                      {{-- <th>Status</th> --}}
                    </tr>
                  </thead>
                  <tbody>
                  	
                 <?php $s_no=1 ?>
                    @foreach( $bank as $perm)
                    <tr>
                      {{-- <td>{{ $s_no }}</td> --}}
                      <td>{{ $perm->bank_code }}</td>
                      <td>{{ $perm->name }}</td>
                      <td>{{ $perm->account_holder }}</td>
                      <td>{{ $perm->ifsc_code }}</td>
                      <td>{{ $perm->account_no }}</td>
                      <td>{{ $perm->branch }}</td>
                      <td>{{ $perm->contact_person."-".$perm->contact }}</td>
                      <td>{{ $perm->email }}</td>
                       <td><a href="{{ route('bank-detail-view',[$perm->id])}}"><button class="btn btn-warning btn-sm mr-2"><i class="fa fa-lg fa-eye"></i></button></a><a href="{{ route('bank-edit',[$perm->id])}}"><button class="btn btn-primary btn-sm"><i class="fa fa-lg fa-edit"></i></button></a></td>
                       @role(['acco_super_admin','acco_admin'])
                        <td></a>
                          <a class="btn btn-danger" onclick="return confirm('Are you sure?')" href="{{ route('bank-delete',[$perm->id])}}"><i class="fa fa-trash"></i></a>
                       @endrole

                      </td>
                    {{--   <td>Status</td> --}}

                    {{--{{route('city-delete', $result->my_id)}}--}}
                    </tr>
                    <?php $s_no++ ?>
                    @endforeach
                  </tbody>
                </table>
                {{ $bank->links() }}
              </div>
            </div>
          </div>
             <div class="tile-footer">
                <a href="{{ route('bank-add') }}"><button class="btn btn-primary">Add Bank</button></a>
              </div>
        </div>
      </div>
    </main>




@endsection