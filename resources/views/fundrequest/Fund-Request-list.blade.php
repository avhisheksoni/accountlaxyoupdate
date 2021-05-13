@extends('layouts.master')
@section('content')



<main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-th-list"></i>Fund Request List</h1>
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
                      <th>Action</th>
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
                      <td>{{ $perm->note }}</td>
                      <td>{{ $perm->month_year }}</td>
                      <td>{{ $perm->status }}</td>
                      <td>{{ $perm->amount }}</td>
                      @if($perm->status == 'Draft')
                      <td><a href="{{ route('fund-request-edit',[$perm->request_code,$perm->job_id]) }}"><button class="btn btn-primary"><i class="fa fa-lg fa-edit"></i></button></a><a href=""><button class="btn btn-danger"><i class="fa fa-lg fa-trash"></i></button></a>
                      </td>
                      @elseif($perm->status == 'Approved')
                      <td ><button class="btn btn-success">Approved</button>
                      </td>
                       @elseif($perm->status == 'send-request')
                      <td ><button class="btn btn-warning">Requested</button>
                      </td>
                      @endif
                    </tr>
                    <?php $s_no++ ?>
                    @endforeach
                  </tbody>
                </table>
                {{ $fund->links() }}
              </div>
            </div>
          </div>
           <div class="tile-footer">
              <button class="btn btn-primary" type="submit" data-toggle="modal" data-target="#myModal">ADD New Request</button>
            </div>
        </div>
      </div>
      <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Fund Request</h4>
        </div>
        <div class="modal-body">
          <p>Add Fund Request</p>
           <div class="tile-body">
              <form action="{{ route('fund-request-add') }}" method="post">
                  @csrf
                <div class="form-group row">
                  <label class="control-label col-md-3">job</label>
                  <div class="col-md-8">
                    <select class="form-control" type="text" name="job_id" placeholder="Enter user name">
                      @foreach($job as $jobs)
                      <option value="{{ $jobs->id }}">{{ $jobs->job_describe }}</option>
                      @endforeach
                    </select>
                     @error('name')
                    <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                  </div>
                </div>
                 <div class="form-group row">
                  <label class="control-label col-md-3">Month-year</label>
                  <div class="col-md-8">
                    <input class="form-control" id="demo-2" type="text" name="month_year" placeholder="Enter user name">
                     @error('name')
                    <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                  </div>
                </div>
                <div class="modal-footer">
          <input type="submit" class="btn btn-primary" value="Add New Request">
        </div>
              </form>
            </div>
        </div>
        
      </div>
      
    </div>
  </div>
    </main>

@endsection