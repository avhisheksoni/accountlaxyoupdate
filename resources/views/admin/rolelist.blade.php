@extends('layouts.master')
@section('content')



<main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-th-list"></i>Role</h1>
          <p>All Record till Now</p>
        </div>
        <ul class="app-breadcrumb breadcrumb side">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item">Role List</li>
          <li class="breadcrumb-item active"><a href="{{ route('purchaseform') }}">Role-From</a></li>
        </ul>
      </div>
      <p><a class="btn btn-primary icon-btn" href="{{ route('role-create') }}"><i class="fa fa-plus"></i>Add Role	</a></p>
      <div class="row">
        <div class="col-md-12">
        	 @if($message = Session::get('message'))
      <div class="alert alert-success">  {{$message}}
      </div>
      @endif 
          <div class="tile">
            <div class="tile-body">
              <div class="table-responsive">
                <table class="table table-hover table-bordered" id="sampleTable">
                  <thead>
                    <tr>
                      <th>S.no.</th>
                      <th>Role Display</th>
                      <th>Role Description</th>
                      <th>Role</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  	
                 <?php $s_no=1 ?>
                   @foreach( $role as $roles)
                    <tr>
                      <td>{{ $s_no }}</td>
                      <td>{{ $roles->name }}</td>
                      <td>{{ $roles->display_name }}</td>
                      <td>{{ $roles->description }}</td>
                      <td><a href="{{ route('edit',[$roles->id]) }}"><button class="btn btn-primary"><i class="fa fa-lg fa-edit"></i></button></a><a href="{{ route('delete',[$roles->id]) }}"><button class="btn btn-danger"><i class="fa fa-lg fa-trash"></i></button></a>
                      </td>
                    </tr>
                    <?php $s_no++ ?>
                    @endforeach
                  </tbody>
                </table>
                {{ $role->links() }}
              </div>
            </div>
          </div>
        </div>
      </div>
    </main>

@endsection