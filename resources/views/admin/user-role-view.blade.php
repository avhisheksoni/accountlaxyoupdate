@extends('layouts.master')
@section('content')



<main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-th-list"></i>User Role View</h1>
          <p>Role Record till Now</p>
        </div>
        <ul class="app-breadcrumb breadcrumb side">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item">Permission List</li>
          <li class="breadcrumb-item active"><a href="{{ route('purchaseform') }}">Role-view</a></li>
        </ul>
      </div>
      <p><a class="btn btn-primary icon-btn" href="{{ route('userlist') }}"><i class="fa fa-backward" aria-hidden="true"></i>Back</a></p>
      <h3>{{ $username->name }}</h3>
      <div class="row">
        <div class="col-md-12">
        	 @if($message = Session::get('message'))
      <div class="alert alert-success">  {{$message}}
      </div>
      @endif 
          <div class="tile">
            <div class="tile-body">
              <div class="table-responsive">
                @if(count($roleuser)==0)
                 No Role Is Assigned 
                  @else
                   <form action="{{ route('role-user-store',[$username->id]) }}" method="post">
              @csrf
                <table class="table table-hover table-bordered" id="sampleTable">
                  <thead>
                    <tr>
                      <th>S.no.</th>
                      <th>Role</th>
                      <th>check</th>
                    </tr>
                  </thead>
                  <tbody>
                  	
                 <?php $s_no=1 ?>
                 @foreach( $roleuser as $users)
                    <tr>
                      <td>{{ $s_no }}</td>
                      <td>{{ $users->display_name }}</td>
                      <td><input type="checkbox" <?php if(in_array($users->id, $roleId)){ echo 'checked';} ?> name="role[]" value="{{ $users->id }}" ></td>
                      </td>
                    </tr>
                    <?php $s_no++ ?>
                    @endforeach
                    @endif
                  </tbody>
                </table>
                 <div class="tile-footer">
              <button class="btn btn-primary" type="submit">ADD</button>
            </div>
              </form>
                {{-- {{ $permission->links() }} --}}
              </div>
            </div>
          </div>
        </div>
      </div>
    </main>

@endsection