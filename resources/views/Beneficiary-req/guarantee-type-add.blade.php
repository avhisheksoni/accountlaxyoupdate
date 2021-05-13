@extends('layouts.master')
@section('content')
 <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-edit"></i>Add Beneficiary Request</h1>
          <p>Add Beneficiary Form</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
         <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item">Add Beneficiary Form</li>
          <li class="breadcrumb-item"><a href="{{  route('purchaselist') }}">Beneficiary Request List</a></li>
        </ul>
      </div>
       <p><a class="btn btn-primary icon-btn" href="">Back</a></p>
      <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <form action="{{ route('guarantee-store') }}" method="post">
              @csrf
            <div class="row">
              <div class="col-md-12">
          <div class="tilk">
            <div class="tile-body">
              {{-- <form class="form-horizontal"> --}}
                
               
                 <div class="form-group row">
                  <label class="control-label col-md-3"><b>Beneficiary Type</b></label>
                  <div class="col-md-8">
                    <input class="form-control" type="text" value="{{ old('name')}}" name="name" placeholder="Enter Beneficiary Type" autocomplete="off">
                     @error('name')
                    <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                  </div>
                </div>
                 <div class="form-group row">
                  <label class="control-label col-md-3"><b>status</b></label>
                  <div class="col-md-8">
                    <select name="status_lc" class="form-control">
                    	<option value="">Select Status</option>
                    	<option value="True">True</option>
                    	<option value="False">False</option>
                    </select>
                     @error('status_lc')
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
    