@extends('layouts.master')
@section('content')



<main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-th-list"></i>Expense Report List</h1>
          <p>All Record till Now</p>
        </div>
        <ul class="app-breadcrumb breadcrumb side">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item">Expense Report List</li>
          <li class="breadcrumb-item active"><a href="{{ route('purchaseform') }}">Expense Report-From</a></li>
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
                      <th>Date</th>
                      <th>Title</th>
                      <th>Job</th>
                      <th>Created-By</th>
                      <th>Amount</th>
                      <th>status</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  	
                 <?php $s_no=1 ?>
                    @foreach( $exreport as $perm)
                    <tr>
                      <td>{{ $s_no }}</td>
                      <td>{{ $perm->reportdate }}</td>
                      <td>{{ $perm->title }}</td>
                      <td>{{ App\job_master::find($perm->job_id)->job_describe }}</td>
                      <td>{{ $perm->created_by }}</td>
                      <td>{{ $perm->amount }}</td>
                      <td>{{ $perm->status }}</td>
                      <td><a href="{{ route('expense-report-edit',[$perm->id]) }}"><button class="btn btn-primary"><i class="fa fa-lg fa-edit"></i></button></a><a href="{{ route('expense-report-delete',[$perm->id]) }}"><button class="btn btn-danger"><i class="fa fa-lg fa-trash"></i></button></a>
                      </td>
                    </tr>
                    <?php $s_no++ ?>
                    @endforeach
                  </tbody>
                </table>
                {{ $exreport->links() }}
              </div>
            </div>
          </div>
           <div class="tile-footer">
              <button class="btn btn-primary" type="submit" data-toggle="modal" data-target="#myModal">ADD Expense Report</button>
            </div>
        </div>
      </div>
      <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Expense Report</h4>
        </div>
        <div class="modal-body">
          <p>Add Expense Report</p>
           <div class="tile-body">
              <form action="{{ route('expense-report-store') }}" method="post">
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
                  <label class="control-label col-md-3">Date</label>
                  <div class="col-md-8">
                    <input class="form-control" id="purchase_date" type="text" name="reportdate" placeholder="Choose Date" autocomplete="off">
                     @error('name')
                    <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                  </div>
                </div>
                  <div class="form-group row">
                  <label class="control-label col-md-3">Title</label>
                  <div class="col-md-8">
                    <input class="form-control"  type="text" name="title" placeholder="Enter Title" autocomplete="off">
                     @error('name')
                    <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                  </div>
                </div>
                <div class="modal-footer">
          <input type="submit" class="btn btn-primary" value="Add Expense Report">
        </div>
              </form>
            </div>
        </div>
        
      </div>
      
    </div>
  </div>
    </main>

@endsection