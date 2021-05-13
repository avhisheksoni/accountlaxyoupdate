@extends('layouts.master')
@section('content')



<main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-th-list"></i>Expense List</h1>
          <p>All Record till Now</p>
        </div>
        <ul class="app-breadcrumb breadcrumb side">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item">Expense List</li>
          <li class="breadcrumb-item active"><a href="{{ route('purchaseform') }}">Expense-From</a></li>
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
                      <th>Job-Name</th>
                      <th>Vendor</th>
                      <th>Ladger-Category</th>
                      <th>Amount</th>
                      <th>Reference</th>
                      <th>Status</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  	
                 <?php $s_no=1 ?>
                    @foreach( $expense as $perm)
                    <tr>
                      <td>{{ $s_no }}</td>
                      <td>{{ $perm->expense_data }}</td>
                      <td>{{ App\job_master::find($perm->job_id)->job_describe}}</td>
                      <td>{{ App\vendor::find($perm->vendor_id)->name}}</td>
                      <td>{{ App\ledger::find($perm->ladger_id)->ladger}}</td>
                      <td>{{ $perm->amount }}</td>
                      <td>{{ $perm->reference }}</td>
                      <td>{{ $perm->status }}</td>
                      <td><a href="{{ route('expense-edit',[$perm->id]) }}"><button class="btn btn-primary"><i class="fa fa-lg fa-edit"></i></button></a><a href="{{ route('expense-delete',[$perm->id]) }}"><button class="btn btn-danger"><i class="fa fa-lg fa-trash"></i></button></a>
                      </td>
                    </tr>
                    <?php $s_no++ ?>
                    @endforeach
                  </tbody>
                </table>
                {{ $expense->links() }}
              </div>
            </div>
          </div>
           <div class="tile-footer">
              <button class="btn btn-primary" type="submit" data-toggle="modal" data-target="#myModal">ADD New Expense</button>
            </div>
        </div>
      </div>
      <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Expense From</h4>
        </div>
        <div class="modal-body">
          <p>Add Expense</p>
           <div class="tile-body">
              <form action="{{ route('expenses-add') }}" method="post">
                  @csrf
                  <div class="row">
                    <div class="col-md-6">
                <div class="form-group row">
                  <label class="control-label col-md-3">Date</label>
                  <div class="col-md-8">
                    <input  class="form-control" type="text" id="purchase_date"  name="expense_data" placeholder="Choose Date" autocomplete="off">
                     @error('name')
                    <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                  </div>
                </div>
                <div class="form-group row">
                  <label class="control-label col-md-3">Ref. Number</label>
                  <div class="col-md-8">
                    <input  class="form-control" type="text"  name="reference" placeholder="Enter refrence">
                     @error('name')
                    <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                  </div>
                </div>
                 <div class="form-group row">
                  <label class="control-label col-md-3">Job</label>
                  <div class="col-md-8">
                   <select class="form-control" name="job_id">
                     <option value="">Choose</option>
                    @foreach( $job as  $jobs )
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
                  <label class="control-label col-md-3"><b>Attachment</b></label>
                  <div class="col-md-8">
                    <input  type="file" name="file" >
                     @error('name')
                    <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                 <div class="form-group row">
                  <label class="control-label col-md-3">Ladger</label>
                  <div class="col-md-8">
                    <select class="form-control" name="ladger_id">
                      <option value="">Choose</option>
                      @foreach( $ledger as  $led )
                      <option value="{{ $led->id }}">{{ $led->ladger }}</option>
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
                  <label class="control-label col-md-3">Vendor</label>
                  <div class="col-md-8">
                    <select class="form-control" name="vendor_id">
                      <option value="">Choose</option>
                      @foreach( $vendor as  $ven )
                      <option value="{{ $ven->id }}">{{ $ven->name }}</option>
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
                  <label class="control-label col-md-3">SAC/HSN Code</label>
                  <div class="col-md-8">
                    <input class="form-control" type="text" name="sac_hsn_code" placeholder="SAC/HSN Code">
                     @error('name')
                    <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                  </div>
                </div>
                 <div class="form-group row">
                  <label class="control-label col-md-3">Amount</label>
                  <div class="col-md-8">
                    <input class="form-control"  type="text" name="amount" placeholder="Enter Amount">
                     @error('name')
                    <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                  </div>
                </div>
                    <div class="form-group row">
                  <label class="control-label col-md-3">Note</label>
                  <div class="col-md-8">
                    <textarea class="form-control" name="note"  rows="4" placeholder="Enter Details"></textarea>
                     @error('name')
                    <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                  </div>
                </div>
              </div>
              </div>
                <div class="modal-footer">
          <input type="submit" class="btn btn-primary" value="Add Expense">
        </div>
              </form>
            </div>
        </div>
        
      </div>
      
    </div>
  </div>
    </main>

@endsection