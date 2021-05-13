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
            <form action="{{ route('fund-request-store') }}" method="post">
              @csrf
            <div class="row">
              <div class="col-md-4">
          <div class="tilk">
            <div class="tile-body">
              {{-- <form class="form-horizontal"> --}}
                <div class="form-group row">
                  <label class="control-label col-md-3"><b>Request code</b></label>
                  <div class="col-md-8">
                    <input class="form-control" type="text" name="request_code" placeholder="Enter request code">
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
                    <input class="form-control" type="text" name="job_id" placeholder="Enter job">
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
                    <input class="form-control" type="text" name="request_by" placeholder="Enter request by">
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
                    <textarea class="form-control" name="note" rows="4" placeholder="Enter your address"></textarea>
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
                    <input class="form-control" id="purchase_date" type="text" name="request_on" placeholder="Enter user name">
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
                    <input class="form-control" id="demo-2" type="text" name="month_year" placeholder="choose month & year">
                     @error('name')
                    <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                  </div>
                </div>
                <div class="form-group row">
                  <label class="control-label col-md-3"><b>Request Year</b></label>
                  <div class="col-md-8">
                    <input class="form-control" type="text" name="year" placeholder="Enter year">
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
                    <input class="form-control" type="text" name="status" placeholder="Enter status">
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
                    <input class="form-control" type="text" name="amount" placeholder="Enter request amount">
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
                    <input class="form-control" type="text" name="file" placeholder="Enter user name">
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
           <div class="tile-footer">
              <button class="btn btn-primary" type="submit">Save</button>
            </div>
      </form>
        </div>
          </div>
        </div>
    </main>
@endsection