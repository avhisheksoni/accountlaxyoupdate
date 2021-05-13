@extends('layouts.master')
@section('content')
    <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-edit"></i>Edit Party</h1>
          <p>Edit Party Name</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
         <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item">Edit Party Name</li>
          <li class="breadcrumb-item"><a href="">Edit Party List</a></li>
        </ul>
      </div>
       <p><a class="btn btn-primary icon-btn" href="{{  route('company-list') }}">Back</a></p>
      <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <form action="{{ route('company-party-update',[$edit->id]) }}" method="post">
              @csrf
            <div class="row">
              <div class="col-md-6">
          <div class="tilk">
            <h3 class="tile-title">Company Party</h3>
            <div class="tile-body">
              <form class="form-horizontal">
                <div class="form-group row">
                  <label class="control-label col-md-3">Company</label>
                  <div class="col-md-8">
                  @php  
                    $company  =  App\Company_mast::all();
                    @endphp
                     <select name="company_id" class="form-control">
                     @foreach($company as $name)
                <option value="{{ $name->id }}" {{ $edit->company_id == $name->id ? 'selected' : '' }}>{{ $name->name }}</option>
                @endforeach
                     </select>
                     @error('company_id')
                    <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                  </div>
                </div>
                <div class="form-group row">
                  <label class="control-label col-md-3">Party</label>
                  <div class="col-md-8">
                    <input class="form-control" type="text" name="company_party" value="{{ $edit->company_party }}" placeholder="Enter Company name" >
                     @error('company_party')
                    <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                  </div>
                </div>
                 <div class="form-group row">
                  <label class="control-label col-md-3">Party code</label>
                  <div class="col-md-8">
                    <input class="form-control" type="text" name="party_code" value="{{ $edit->party_code }}" placeholder="Enter Company name">
                     @error('party_code')
                    <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                  </div>
                </div>
                  <div class="form-group row">
                  <label class="control-label col-md-3">code</label>
                  <div class="col-md-8">
                    <input class="form-control" type="number" name="code_gen" value="{{ $edit->code_gen }}" placeholder="Enter Company name">
                     @error('code_gen')
                    <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                  </div>
                </div>
                 <div class="tile-footer">
              <button class="btn btn-primary" type="submit">update</button>
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