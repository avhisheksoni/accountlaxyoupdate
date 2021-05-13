@extends('layouts.master')
@section('content')
    <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-edit"></i>USer Role Add</h1>
          <p>Add Role</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
         <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item">Role Add Form</li>
          <li class="breadcrumb-item"><a href="{{  route('purchaselist') }}">User Role List</a></li>
        </ul>
      </div>
       <p><a class="btn btn-primary icon-btn" href="{{ route('permissionlist') }}">Back</a></p>
        <h3>{{ $user->name }}</h3>
      <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <form action="{{ route('role-user-store',[$user->id]) }}" method="post">
              @csrf
            <div class="row">
          <div class="col-md-6">
          <div class="tilk">
            <h3 class="tile-title">Add Role User</h3>
            <div class="tile-body">
              <form class="form-horizontal">
                <div class="form-group row">
                  <input type="hidden" name="username" value="<?=  $user->id  ?>">
                  @foreach($roles as $role)
                  <label class="control-label col-md-3">{{ $role->name }}</label>
                  <div class="col-md-8">
                    <input class="col-md-8" name="role[]" value="{{ $role->id }}" type="checkbox"  >
                     @error('display_name')
                    <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                  </div>
                  @endforeach
                </div>
            </div>
            <div class="tile-footer">
              <button class="btn btn-primary" type="submit">ADD</button>
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