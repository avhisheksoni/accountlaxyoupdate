@extends('layouts.master')
@section('content')



<main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-th-list"></i>Permission List</h1>
          <p>All Record till Now</p>
        </div>
        <ul class="app-breadcrumb breadcrumb side">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item">Permission List</li>
          <li class="breadcrumb-item active"><a href="{{ route('purchaseform') }}">Permission-From</a></li>
        </ul>
      </div>
      <p><a class="btn btn-primary icon-btn" href="{{ route('permission-create') }}"><i class="fa fa-plus"></i>Add Permission	</a></p>
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
                      <th>Name</th>
                      <th>Display Permission</th>
                      <th>Description</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  	
                 <?php $s_no=1 ?>
                    @foreach( $permission as $perm)
                    <tr>
                      <td>{{ $s_no }}</td>
                      <td>{{ $perm->name}}</td>
                      <td>{{ $perm->display_name}}</td>
                      <td>{{ $perm->description}}</td>
                      <td><a href="{{ route('permission-edit',[$perm->id]) }}"><button class="btn btn-primary"><i class="fa fa-lg fa-edit"></i></button></a><a href="{{ route('permission-delete',[$perm->id]) }}"><button class="btn btn-danger"><i class="fa fa-lg fa-trash"></i></button></a>
                      </td>
                    </tr>
                    <?php $s_no++ ?>
                    @endforeach
                  </tbody>
                </table>
                {{ $permission->links() }}
              </div>
            </div>
          </div>
        </div>
      </div>
    </main>

@endsection