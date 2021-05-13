@extends('layouts.master')
@section('content')
 <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-edit"></i>Fund Request</h1>
          <p>Fund Request Form</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
         <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item">Fund Request Form</li>
          <li class="breadcrumb-item"><a href="{{  route('purchaselist') }}">Fund Request List</a></li>
        </ul>
      </div>
       <p><a class="btn btn-primary icon-btn" href="{{ route('fund-request-list') }}">Back</a></p>
      <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <form action="{{ route('fund-request-update',[$fund->id]) }}" method="post">
              @csrf
            <div class="row">
              <div class="col-md-4">
          <div class="tilk">
            <div class="tile-body">
              {{-- <form class="form-horizontal"> --}}
                <div class="form-group row">
                  <label class="control-label col-md-3"><b>Request code</b></label>
                  <div class="col-md-8">
                    <input class="form-control" type="text" value="{{ $fund->request_code }}" name="request_code" placeholder="Enter request code" readonly >
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
                    <input class="form-control" type="text"  name="job" value="{{ $job->job_describe }}" placeholder="Enter job" readonly>
                     @error('name')
                    <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                  </div>
                </div>
                <div class="form-group row">
                  <label class="control-label col-md-3"><b>Request By</b></label>
                  <div class="col-md-8">
                    <input class="form-control" type="text" value="{{ $fund->request_by }}" name="request_by" placeholder="Enter request by" readonly>
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
                    <textarea class="form-control" name="note"  rows="4" placeholder="Enter Details">{{ $fund->note }}</textarea>
                  </div>
                </div>
             {{-- </form> --}}
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="tilk">
            <div class="tile-body">
              {{-- <form class="form-horizontal"> --}}
                <div class="form-group row">
                  <label class="control-label col-md-3"><b>Request On</b></label>
                  <div class="col-md-8">
                    <input class="form-control"   value="{{ $fund->request_on }}" type="text" name="request_on" placeholder="Enter user name" readonly >
                     @error('name')
                    <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                  </div>
                </div>
                <div class="form-group row">
                  <label class="control-label col-md-3"><b>Month-Year</b></label>
                  <div class="col-md-8">
                    <input class="form-control" value="{{ $fund->month_year }}" type="text" name="month_year" placeholder="choose month & year" readonly>
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
        <div class="col-md-4">
            {{--   <form class="form-horizontal"> --}}
                <div class="form-group row">
                  <label class="control-label col-md-3"><b>Status</b></label>
                  <div class="col-md-8">
                    <input class="form-control" type="text" name="status" value="{{ $fund->status }}" placeholder="Enter status" readonly>
                     @error('name')
                    <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                  </div>
                </div>
                <div class="form-group row">
                  <label class="control-label col-md-3"><b>Request Amount</b></label>
                  <div class="col-md-8">
                    <input class="form-control" type="text" value="{{ $tamt }}" name="amount" placeholder="Enter request amount" readonly>
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
              <a href="{{ route('fund-request-approval',[$fund->request_code]) }}"><button class="btn btn-primary">Request  Approval</button></a>
        <div class="tile">
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
                    @foreach( $fund_req as $perm)
                    <tr>
                      <td>{{ $s_no }}</td>
                      <td>{{ $perm->ledger_id }}</td>
                      <td>{{ App\ledger::find($perm->ledger_id)->ladger }}</td>
                      <td>{{ $perm->amount }}</td>
                      <td>{{ $perm->note }}</td>
                      <input type="hidden"  name="total" id="{{ "amount".$s_no }}" value="{{ $perm->amount }}">
                    </tr>
                    <?php $s_no++ ?>
                    @endforeach
                  </tbody>
                </table>
                {{-- {{ $fund->links() }} --}}
              </div>
            </div>
          </div>
         <div class="custom-control custom-checkbox" id="shipping_address">
          <input type="checkbox" class="custom-control-input" id="same-address">
          <label class="custom-control-label" for="same-address">Add Fund Request Amount Details</label>
        </div>
        <form action="{{ route('fund-request-amount-store',[$fund->request_code]) }}" method="post">
          @csrf
        <input class="form-control" type="hidden" value="{{ $fund->request_code }}" name="fund_code" placeholder="Enter request code" readonly >
        <div class="row" id="shippingform">
     <div class="col-lg-4 col-md-4">
    <div class="form-group row">
                  <label class="control-label col-md-3"><b>Ladger</b></label>
                  <div class="col-md-8">
                    <select class="form-control" name="ledger_id">
                      @foreach($ledger as $led)
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
          </div>
          <div class="col-lg-4 col-md-4">
     <div class="form-group row">
                  <label class="control-label col-md-3"><b>Amount</b></label>
                  <div class="col-md-8">
                    <input class="form-control" type="number" name="amount" placeholder="Enter request amount" >
                     @error('name')
                    <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                  </div>
                </div>
          </div>
          <div class="col-lg-4 col-md-4">
     <div class="form-group row">
                  <label class="control-label col-md-3"><b>Note</b></label>
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
           <div class="tile-footer">
              <button class="btn btn-primary" type="submit">Add Request Amount</button>
            </div>
          </form>
        </div>
        </div>
          </div>
        </div>
    </main>
@endsection

