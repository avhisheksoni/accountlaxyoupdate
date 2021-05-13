@extends('layouts.master')
@section('content')



<main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-th-list"></i>Client List</h1>
          <p>All Record till Now</p>
        </div>
        <ul class="app-breadcrumb breadcrumb side">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item">Clients</li>
          <li class="breadcrumb-item active"><a href="">Client Add</a></li>
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
            <div class="mb-2">
              <a href="{{url('client_export')}}" class="btn btn-primary">Export Excel</a>
            </div>
            <div class="tile-body">
              <div class="table-responsive">
                <table class="table table-hover table-bordered sampleTable13" id="">
                  <thead>
                    <tr>
                      <th>Client</th>
                      <th>GSTIN/UIN of Recipient</th>
                      <th>CLI-Code</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  	
                 <?php $s_no=1 ?>
                    @foreach( $cli as $perm)
                    <tr>
                      <td>{{ $perm->name }}</td>
                      <td>{{ $perm->gstin }}</td>
                      <td>{{ $perm->cli_code }}</td>
                      
                      <td><a href="{{ route('client-view',[$perm->id]) }}"><button class="btn btn-warning btn-sm"><i class="fa fa-lg fa-eye"></i></button></a>
                     <a href="{{ route('client-edit',[$perm->id]) }}"><button class="btn btn-primary btn-sm"><i class="fa fa-lg fa-edit"></i></button></a>
                     @role(['acco_super_admin','acco_admin'])
                        <a href="{{ route('client-delete',[$perm->id]) }}"><button class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')"><i class="fa fa-lg fa-trash"></i></button></a>
                     @endrole
                      </td>
                    </tr>
                    <?php $s_no++ ?>
                    @endforeach
                  </tbody>
                </table>
                {{-- {{ $cli->links() }} --}}
              </div>
            </div>
          </div>
            <div class="tile-footer">
                <a href="{{ route('client-create')}}"><button class="btn btn-primary">Add Client</button></a>
              </div>
        </div>
      </div>
      <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    </div>
  </div>
    </main>
@endsection