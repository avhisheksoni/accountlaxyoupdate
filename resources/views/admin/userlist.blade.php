@extends('layouts.master')
@section('content')



<main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-th-list"></i>User List</h1>
          <p>All Record till Now</p>
        </div>
        <ul class="app-breadcrumb breadcrumb side">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item">User List</li>
          <li class="breadcrumb-item active"><a href="{{ route('purchaseform') }}">User-From</a></li>
        </ul>
      </div>
      <p><a class="btn btn-primary icon-btn" href="{{ route('user-create') }}"><i class="fa fa-plus"></i>Add User	</a></p>
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
                      <th>User</th>
                      <th>Email</th>
                     {{--  <th>Role</th> --}}
                      <th>Action</th>
                      <th>ACL Check</th>
                    </tr>
                  </thead>
                  <tbody>
                  	
                 <?php $s_no=1 ?>
                    @foreach( $user as $users)
                    <tr>
                      <td>{{ $s_no }}</td>
                      <td>{{ $users->name }}</td>
                      <td>{{ $users->email }}</td>
                      {{-- <td>{{ $users->name }}</td> --}}
                      <td><a href="{{ route('user-edit',[$users->id]) }}"><button class="btn btn-primary"><i class="fa fa-lg fa-edit"></i></button></a><a href="{{ route('user-delete',[$users->id])}}"><button class="btn btn-danger"><i class="fa fa-lg fa-trash"></i></button></a>
                      </td>
                      <td><a href="{{ route('user-role-view',[$users->id]) }}"><button class="btn btn-success">Role</button></a>
                        <a href="{{ route('user-permission-view',[$users->id]) }}"><button class="btn btn-warning">Permission</button></a></td>
                    </tr>
                    <?php $s_no++ ?>
                    @endforeach
                  </tbody>
                </table>
                 {{ $user->links() }}
              </div>
            </div>
          </div>
        </div>
      </div>
    </main>

@endsection