@extends('layouts.master')
@section('content')
 <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-edit"></i>Expense Edit</h1>
          <p>Expense Edit Form</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
         <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item">Fund Request Form</li>
          <li class="breadcrumb-item"><a href="{{  route('purchaselist') }}">Expense  List</a></li>
        </ul>
      </div>
       <p><a class="btn btn-primary icon-btn" href="{{ route('fund-request-list') }}">Back</a></p>
      <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <form action="{{ route('expense-update',[$expense->id]) }}" method="post">
              @csrf
            <div class="row">
              <div class="col-md-6">
          <div class="tilk">
            <div class="tile-body">
              {{-- <form class="form-horizontal"> --}}
                <div class="form-group row">
                  <label class="control-label col-md-3"><b>Date</b></label>
                  <div class="col-md-8">
                    <input class="form-control" type="text" id="purchase_date" value="{{ $expense->expense_data }}" name="expense_data" placeholder="choose New Date"  autocomplete="off">
                     @error('name')
                    <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                  </div>
                </div>
                <div class="form-group row"> 
                  <label class="control-label col-md-3"><b>Ref. Number</b></label>
                  <div class="col-md-8">
                    <input class="form-control" type="text"  name="reference" value="{{ $expense->reference }}" placeholder="Reference Number" autocomplete="off" >
                     @error('name')
                    <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                  </div>
                </div>
                <div class="form-group row">
                  <label class="control-label col-md-3"><b>vendor</b></label>
                  <div class="col-md-8">
                   <select name="vendor_id" class="form-control">
                   	@foreach($vendor as $ven)
                   <option @if($ven->id == App\vendor::find($expense->vendor_id)->id) selected  @endif value="{{ $ven->id }}"
                >{{ $ven->name }}</option>
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
                  <label class="control-label col-md-3"><b>Ledger</b></label>
                  <div class="col-md-8">
                   <select name="ladger_id" class="form-control">
                   	@foreach($ledger as $led)
                   <option @if($led->id == App\ledger::find($expense->ladger_id)->id) selected  @endif value="{{ $led->id }}"
                >{{ $led->ladger }}</option>
                    @endforeach
                   </select>
                  </div>
                </div>
                  <div class="form-group row">
                  <label class="control-label col-md-3"><b>Job</b></label>
                  <div class="col-md-8">
                    <select name="job_id" class="form-control">
                   @foreach($job as $jobs)
                   <option @if($jobs->id == App\ledger::find($expense->job_id)->id) selected  @endif value="{{ $jobs->id }}"
                >{{ $jobs->job_describe }}</option>
                    @endforeach
                   </select>
                  </div>
                </div>
             {{-- </form> --}}
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="tilk">
            <div class="tile-body">
              {{-- <form class="form-horizontal"> --}}
                <div class="form-group row">
                  <label class="control-label col-md-3"><b>status</b></label>
                  <div class="col-md-8">
                    <input class="form-control"   value="{{ $expense->status }}" type="text" name="status" readonly>
                     @error('name')
                    <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                  </div>
                </div>
                <div class="form-group row">
                  <label class="control-label col-md-3"><b>SAC/HSN Code</b></label>
                  <div class="col-md-8">
                    <input class="form-control" value="{{ $expense->sac_hsn_code }}" type="text" name="sac_hsn_code" placeholder="SAC/HSN Code" >
                     @error('name')
                    <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                  </div>
                </div>
                 <div class="form-group row">
                  <label class="control-label col-md-3"><b>Amount</b></label>
                  <div class="col-md-8">
                    <input class="form-control" type="text" name="amount" value="{{ $expense->amount }}" placeholder="Enter Amount" >
                     @error('name')
                    <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                  </div>
                </div>
                 <div class="form-group row">
                  <label class="control-label col-md-3"><b>Note</b></label>
                  <div class="col-md-8">
                     <textarea class="form-control" name="note"  rows="4" placeholder="Enter Details">{{ $expense->note }}</textarea>
                     @error('name')
                    <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                  </div>
                </div>
             {{-- </form> --}}
            </div>
              
          </div>
        </div>
            {{--   <form class="form-horizontal"> --}}
               
               
                <div class="form-group row">
                  <label class="control-label col-md-3"><b>Attachment</b></label>
                  <div class="col-md-8">
                    <input type="file" name="file" placeholder="Enter user name">
                     @error('name')
                    <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                  </div>
                </div>
             {{-- </form> --}}
        
           <div class="tile-footer">
              <button class="btn btn-primary" type="submit">update</button>
            </div>

      </form>
      </div>
        </div>