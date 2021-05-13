@extends('layouts.master')
@section('content')



<main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-th-list"></i>Fund Request For Approval</h1>
          <p>All Record till Now</p>
        </div>
        <ul class="app-breadcrumb breadcrumb side">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item">Fund Request List</li>
          <li class="breadcrumb-item active"><a href="{{ route('purchaseform') }}">Fund Request-From</a></li>
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
                      <th>request_code</th>
                      <th>request_by</th>
                      <th>request_on</th>
                      <th>note</th>
                      <th>month-year</th>
                      <th>status</th>
                      <th>amount</th>
                      <th>Action/Approved</th>
                    </tr>
                  </thead>
                  <tbody>
                  	
                 <?php $s_no=1 ?>
                    @foreach( $fund as $perm)
                    <tr>
                      <td>{{ $s_no }}</td>
                      <td>{{ $perm->request_code }}</td>
                      <td>{{ $perm->request_by }}</td>
                      <td>{{ $perm->request_on }}</td>
                      <td>{{ $perm->status }}</td>
                      <td>{{ $perm->amount }}</td>
                      <td>{{ $perm->amount }}</td>
                      <td>{{ $perm->amount }}</td>
                      <td><a href="{{ route('fund-amount-details',[$perm->request_code])}}"><button class="btn btn-primary"><i class="fa fa-lg fa-info"></i></button></a>
                        @if($perm->status  !='Approved')
                        <a href="{{ route('fund-approve-sadmin',[$perm->request_code]) }}"><button class="btn btn-primary"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i></button></a>
                        @endif
                      </td>
                    </tr>
                    <?php $s_no++ ?>
                    @endforeach
                  </tbody>
                </table>
                {{ $fund->links() }}
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