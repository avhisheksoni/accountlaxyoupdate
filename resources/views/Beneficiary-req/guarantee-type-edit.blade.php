@extends('layouts.master')
@section('content')
 <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-edit"></i>Edit Guarantee</h1>
          <p>Edit Guarantee</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
         <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item">Edit Guarantee</li>
          <li class="breadcrumb-item"><a href="{{  route('purchaselist') }}">Guarantee List</a></li>
        </ul>
      </div>
       <p><a class="btn btn-primary icon-btn" href="">Back</a></p>
      <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <form action="{{ route('guarantee-update-bg',[$edit->id]) }}" method="post">
              @csrf
            <div class="row">
              <div class="col-md-12">
          <div class="tilk">
            <div class="tile-body">
              {{-- <form class="form-horizontal"> --}}
                <div class="form-group row">
                  <label class="control-label col-md-3"><b>Type</b></label>
                  <div class="col-md-8">
                  <input class="form-control" type="text" name="name" value="{{ $edit->name }}" autocomplete="off">
                     @error('beneficiary_id')
                    <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                  </div>
                </div>
                <div class="form-group row">
                  <label class="control-label col-md-3"><b>Status-Lc</b></label>
                  <div class="col-md-8">
                     <select name="status_lc" class="form-control">
                      <option @if($edit->status_lc == 'True') selected  @endif value="True">True</option>
                     <option @if($edit->status_lc == 'False') selected  @endif value="False">False</option>
                     </select>
                     @error('job_id')
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
              <button class="btn btn-primary" type="submit">update</button>
            </div>
      </form>
        </div>
          </div>
        </div>
    </main>
@endsection
    