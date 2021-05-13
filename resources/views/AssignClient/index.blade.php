@extends('layouts.master')
@section('content')



<main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-th-list"></i>Assigned Company List</h1>
          <p>All Record till Now</p>
        </div>
        <ul class="app-breadcrumb breadcrumb side">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item">Assign Company</li>
          <li class="breadcrumb-item active"><a href="">Assign Company Add</a></li>
        </ul>
      </div>
      {{-- <p><a class="btn btn-primary icon-btn" href="{{ route('fund-request') }}"><i class="fa fa-plus"></i>Add Fund Request</a></p> --}}
      <div class="row">
        <div class="col-md-12">
           @if($message = Session::get('message'))
      <div class="alert alert-success">  {{$message}}
      </div>
      @endif 
          <div class="tile">
            <div class="tile-body">
              <div class="table-responsive">
                <table class="table table-hover table-bordered sampleTable13" id="">
                  <thead>
                    <tr>
                      <th>Company</th>
                      <th>Client</th>
                      <th>Comp-code</th>
                      <th>uni-code</th>
                      <th>Action_perform</th>
                    </tr>
                  </thead>
                  <tbody>
                    
                 <?php $s_no=1 ?>
                    @foreach( $acl as $perm)
                    <tr>
                      <td>{{ $perm->company->name }}</td>
                      <td>{{ $perm->client->name }}</td>
                      <td>{{ rtrim(substr($perm->unique_client_code ,0,(strlen($perm->unique_client_code)-strlen(substr($perm->unique_client_code, strrpos($perm->unique_client_code, '/') + 1))) ),"/") }}</td>
                      <td>{{ substr($perm->unique_client_code, strrpos($perm->unique_client_code, '/') + 1) }}</td>
                      
                      <td><a href="{{ route('details-ac',[$perm->id])}}"><button class="btn btn-warning btn-sm"><i class="fa fa-lg fa-eye"></i></button></a>
                      @role(['acco_super_admin','acco_admin'])
                     <a href="{{ route('edit-ac',[$perm->id])}}"><button class="btn btn-primary btn-sm"><i class="fa fa-lg fa-edit"></i></button></a>
                        <a href="{{ route('delete-ac',[$perm->id])}}"><button class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')"><i class="fa fa-lg fa-trash"></i></button></a>
                      @endrole
                      </td>
                    </tr>
                    <?php $s_no++ ?>
                    @endforeach
                  </tbody>
                </table>
                {{ $acl->links() }}
              </div>
            </div>
          </div>
           @role(['acco_super_admin','acco_admin'])
            <div class="tile-footer">
                <a href="{{ route('create-ac') }}"><button class="btn btn-primary"><i class="fa fa-lg fa-plus"></i>Assign Client</button></a>
              </div>
               @endrole
        </div>
      </div>
      <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    </div>
  </div>
    </main>
@endsection