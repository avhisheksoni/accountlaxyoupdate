@extends('layouts.master')
@section('content')



<main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-th-list"></i>Party</h1>
          <p>All Record till Now</p>
        </div>
        <ul class="app-breadcrumb breadcrumb side">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item">Party</li>
          <li class="breadcrumb-item active"><a href="">Party Form</a></li>
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
                    <!--   {{-- <th>S.no.</th> --}}
                     {{--  <th>code</th> --}} -->
                      <th>Party-code</th>
                      <th>Party-Type</th>
                      <th>Company</th>
                      
                      <th>Performance_Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  	
                 <?php $s_no=1 ?>
                    @foreach( $Party as $perm)
                    <tr>
                     <!--  {{-- <td>{{ $s_no }}</td> --}}
                     {{--  <td>{{ $perm->party_code }}</td> --}} -->
                      <td>{{ $perm->party_code }}</td>
                      <td>{{ $perm->company_party }}</td>
                      <td>{{ App\Company_mast::find($perm->company_id)->name }}</td>
                      
                      <td><a href="{{ route('company-party-details',[$perm->id])}}"><button class="btn btn-warning"><i class="fa fa-lg fa-eye"></i></button></a>
                     <a href="{{ route('company-party-edit',[$perm->id]) }}"><button class="btn btn-primary"><i class="fa fa-lg fa-edit"></i></button></a>
                     <a href="{{ route('company-party-delete',[$perm->id]) }}"><button class="btn btn-danger"><i class="fa fa-lg fa-trash"></i></button></a>
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
                <a href="{{ route('company-party-create') }}"><button class="btn btn-primary">Add Party</button></a>
              </div>
        </div>
      </div>
      <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    </div>
  </div>
    </main>
@endsection