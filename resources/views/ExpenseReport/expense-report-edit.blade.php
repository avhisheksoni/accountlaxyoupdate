@extends('layouts.master')
@section('content')
 <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-edit"></i>Expense Report Edit</h1>
          <p>Expense Report Edit Form</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
         <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item">Expense Report Form</li>
          <li class="breadcrumb-item"><a href="{{  route('purchaselist') }}">Expense Report List</a></li>
        </ul>
      </div>
       <p><a class="btn btn-primary icon-btn" href="{{ route('fund-request-list') }}">Back</a></p>
      <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <form action="{{ route('expense-report-update',[$ex_report->id]) }}" method="post">
              @csrf
            <div class="row">
              <div class="col-md-6">
          <div class="tilk">
            <div class="tile-body">
              {{-- <form class="form-horizontal"> --}}
                <div class="form-group row">
                  <label class="control-label col-md-3"><b>Report-Date</b></label>
                  <div class="col-md-8">
                    <input class="form-control" type="text" id="purchase_date" value="{{ $ex_report->reportdate }}" name="reportdate" placeholder="choose New Date"  autocomplete="off"> 
                     @error('name')
                    <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                  </div>
                </div>
                <div class="form-group row"> 
                  <label class="control-label col-md-3"><b>Title</b></label>
                  <div class="col-md-8">
                    <input class="form-control" type="text"  name="title" value="{{ $ex_report->title }}" placeholder="Reference Number" autocomplete="off" >
                     @error('name')
                    <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                  </div>
                </div>
                  <div class="form-group row">
                  <label class="control-label col-md-3"><b>Job</b></label>
                  <div class="col-md-8">
                    <select name="job_id" class="form-control">
                   @foreach($job as $jobs)
                   <option @if($jobs->id == App\ledger::find($ex_report->job_id)->id) selected  @endif value="{{ $jobs->id }}"
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
                    <input class="form-control"   value="{{ $ex_report->status }}" type="text" name="status" readonly>
                     @error('name')
                    <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                  </div>
                </div>
                <div class="form-group row">
                  <label class="control-label col-md-3"><b>Created-By</b></label>
                  <div class="col-md-8">
                    <input class="form-control" value="{{ $ex_report->created_by }}" type="text" name="created_by"  >
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
                    <input class="form-control" type="text" name="amount" value="{{ $ex_report->amount }}" placeholder="Enter Amount" >
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
                     <textarea class="form-control" name="note"  rows="4" placeholder="Enter Details">{{ $ex_report->note }}</textarea>
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
        <a href="{{ route('expense-report-approval',[$ex_report->id])}}"><button class="btn btn-primary">Request  Approval</button></a>
        <div class="tile">
            <div>
          <h3><i class="fa fa-edit"></i>Expense In Report</h3>
        </div>
            <div class="tile-body">
              <div class="table-responsive">
                <table class="table table-hover table-bordered" id="sampleTable">
                  <thead>
                    <tr>
                      <th>S.no.</th>
                      <th>Ledger code</th>
                      <th>Ledger</th>
                      <th>Amount</th>
                      <th>Note</th>
                    </tr>
                  </thead>
                  <tbody>
                    
                 <?php $s_no=1 ?>
                    {{-- @foreach( $fund_req as $perm) --}}
                    <tr>
                      <td>{{ $s_no }}</td>
                      <td>tti</td>
                      <td>ytit</td>
                      <td>yutt</td>
                      <td>tyuyti</td>
                      <input type="hidden"  name="total" id="" value="">
                    </tr>
                    <?php $s_no++ ?>
                    {{-- @endforeach --}}
                  </tbody>
                </table>
                {{-- {{ $fund->links() }} --}}
              </div>
            </div>
          </div>
           <div class="tile">
            <div>
          <h3><i class="fa fa-edit"></i>Expense In Report</h3>
        </div>
            <div class="tile-body">
              <div class="table-responsive">
                <table class="table table-hover table-bordered" id="sampleTable">
                  <thead>
                    <tr>
                      <th>S.no.</th>
                      <th>Ledger code</th>
                      <th>Ledger</th>
                      <th>Amount</th>
                      <th>Note</th>
                    </tr>
                  </thead>
                  <tbody>
                    
                 <?php $s_no=1 ?>
                    {{-- @foreach( $fund_req as $perm) --}}
                    <tr>
                      <td>{{ $s_no }}</td>
                      <td>tti</td>
                      <td>ytit</td>
                      <td>yutt</td>
                      <td>tyuyti</td>
                      <input type="hidden"  name="total" id="" value="">
                    </tr>
                    <?php $s_no++ ?>
                    {{-- @endforeach --}}
                  </tbody>
                </table>
                {{-- {{ $fund->links() }} --}}
              </div>
            </div>
          </div>
        </div> <div class="tile">
            <div>
          <h3><i class="fa fa-edit"></i>Select Expense</h3>
        </div>
            <div class="tile-body">
              <div class="table-responsive">
                <table class="table table-hover table-bordered" id="sampleTable">
                  <thead>
                    <tr>
                      <th>S.no.</th>
                      <th>Ledger code</th>
                      <th>Ledger</th>
                      <th>Amount</th>
                      <th>Note</th>
                    </tr>
                  </thead>
                  <tbody>
                    
                 <?php $s_no=1 ?>
                    {{-- @foreach( $fund_req as $perm) --}}
                    <tr>
                      <td>{{ $s_no }}</td>
                      <td>tti</td>
                      <td>ytit</td>
                      <td>yutt</td>
                      <td>tyuyti</td>
                      <input type="hidden"  name="total" id="" value="">
                    </tr>
                    <?php $s_no++ ?>
                    {{-- @endforeach --}}
                  </tbody>
                </table>
                {{-- {{ $fund->links() }} --}}
              </div>
            </div>
          </div>