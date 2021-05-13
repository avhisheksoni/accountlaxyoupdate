@extends('layouts.master')
@section('content')
    <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-edit"></i>Tax Gst Update</h1>
          <p>Tax Gst Update</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
         <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item">Tax Gst Update</li>
          <li class="breadcrumb-item"><a href="">Tax Gst List</a></li>
        </ul>
      </div>
       <p><a class="btn btn-primary icon-btn" href="">Back</a></p>
      <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <form action="{{ route('gst-update',[$edit->id]) }}" method="post">
              @csrf
            <div class="row">
              <div class="col-md-6">
          <div class="tilk">
            <h3 class="tile-title">Tax Gst Rate</h3>
            <div class="tile-body">
              <form class="form-horizontal">
                <div class="form-group row">
                  <label class="control-label col-md-3">Name</label>
                  <div class="col-md-8">
                    <input class="form-control" type="text" name="tax_gst" value="{{ $edit->tax_gst }}" placeholder="Enter tax gst">
                     @error('tax_gst')
                    <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                  </div>
                </div>
            </div>
            <div class="tile-footer">
              <button class="btn btn-primary" type="submit">Update</button>
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