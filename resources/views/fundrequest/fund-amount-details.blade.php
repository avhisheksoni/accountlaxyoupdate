@extends('layouts.master')
@section('content')



<main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-th-list"></i>Fund Amount Details</h1>
          <p>All Fund Details Requested by <b>{{ $request_by->request_by }}</b> Now</p>
        </div>
        <ul class="app-breadcrumb breadcrumb side">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item">Fund Request List</li>
          <li class="breadcrumb-item active"><a href="{{ route('purchaseform') }}">Fund Details</a></li>
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
                      <th>Ledger</th>
                      <th>Func-code</th>
                      <th>request_on</th>
                      <th>Amount</th>
                      <th>note</th>
                    </tr>
                  </thead>
                  <tbody>
                  	
                 <?php $s_no=1 ?>
                    @foreach( $details as $perm)
                    <tr>
                      <td>{{ $s_no }}</td>
                      <td>{{ App\ledger::find($perm->ledger_id)->ladger }}</td>
                      <td>{{ $perm->fund_code }}</td>
                      <td>{{ $request_by->request_on }}</td>
                      <td>{{ $perm->amount }}</td>
                      <td>{{ $perm->note }}</td>
                    </tr>
                    <?php $s_no++ ?>
                    @endforeach
                  </tbody>
                </table>
                {{ $details->links() }}
              </div>
            </div>
          </div>
         {{--   <div class="tile-footer">
              <button class="btn btn-primary" type="submit" data-toggle="modal" data-target="#myModal">ADD New Request</button>
            </div> --}}
        </div>
      </div>
    </main>

@endsection

{{-- {{ route('fund-amount-details',[$perm->request_code])}} --}}