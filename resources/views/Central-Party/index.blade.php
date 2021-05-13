@extends('layouts.master')
@section('content')



<main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-th-list"></i>Central Party List</h1>
          <p>All Record till Now</p>
        </div>
        <ul class="app-breadcrumb breadcrumb side">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item">Central Party</li>
          <li class="breadcrumb-item active"><a href="">Central Party-From</a></li>
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
                <table class="table table-hover table-bordered" id="sampleTable">
                  <thead>
                    <tr>
                      {{-- <th>S.no.</th> --}}
                      <th>Party Type code</th>
                      <th>Party Type</th>
                      <th>Party</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    
                 <?php $s_no=1 ?>
                    @foreach( $Party as $perm)
                    <tr>
                      {{-- <td>{{ $s_no }}</td> --}}
                      <td>{{ App\CompanyPartyModel::find($perm->party_id)->party_code }}</td>
                      <td>{{ App\CompanyPartyModel::find($perm->party_id)->company_party }}</td>
                      <td>{{ $perm->sub_party_code."--".$perm->party_name }}</td>
                      <td><a href="{{ route('central-party-details',[$perm->id])}}"><button class="btn btn-warning"><i class="fa fa-lg fa-eye"></i></button></a>
                     <a href="{{ route('central-party-edit',[$perm->id])}}"><button class="btn btn-primary"><i class="fa fa-lg fa-edit"></i></button></a>
                        <a href="{{ route('central-party-delete',[$perm->id]) }}"><button class="btn btn-danger"><i class="fa fa-lg fa-trash"></i></button></a>
                      </td>
                    </tr>
                    <?php $s_no++ ?>
                    @endforeach
                  </tbody>
                </table>
                {{ $Party->links() }}
              </div>
            </div>
          </div>
            <div class="tile-footer">
                <a href="{{ route('central-party-create') }}"><button class="btn btn-primary">Add Party</button></a>
              </div>
        </div>
      </div>
      <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    </div>
  </div>
    </main>
@endsection