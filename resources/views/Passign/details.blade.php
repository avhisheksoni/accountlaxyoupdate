@extends('layouts.master')
@section('content')
    <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-edit"></i>P-Assign Receiver Details</h1>
          <p>P-Assign Receiver Details</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
         <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item">P-Assign Receiver Details</li>
          <li class="breadcrumb-item"><a href="">P-Assigned Receiver List</a></li>
        </ul>
      </div>
       <p><a class="btn btn-primary icon-btn" href="{{  route('assign-client-list') }}">Back</a></p>
      <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <form action="{{ route('Passingn.update',$edit->id) }}" method="post">
              @csrf
              @method('PATCH')
            <div class="row">
              <div class="col-md-6">
          <div class="tilk">
            <h3 class="tile-title">Assign Receiver</h3>
            <div class="tile-body">
              <form class="form-horizontal">
                <div class="form-group row">
                  <label class="control-label col-md-3">Receiver</label>
                  <div class="col-md-8">
                    @php
                    $cmp = App\Company_mast::all();
                    @endphp
                    <input class="form-control" type="text" name="comp_id" value="{{ $edit->company->name }}" placeholder="Enter Client Gstin" readonly="">
                   @error('comp_id')
                    <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                  </div>
                </div>
                  <div class="form-group row">
                  <label class="control-label col-md-3">P-Company</label>
                  <div class="col-md-8">
                   <input class="form-control" type="text" name="client_id" value="{{ $edit->petty->firm_name }}" placeholder="Enter Client" readonly="">
                     @error('client_id')
                    <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                  </div>
                </div>
            <div class="tile-footer">
            </div>
              </form>
          </div>
        </div>
        </div>
      </form>
        </div>
          </div>
        </div>
    </main>
@endsection