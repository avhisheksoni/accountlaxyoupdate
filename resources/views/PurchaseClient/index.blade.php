@extends('layouts.master')
@section('content')



<main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-th-list"></i>Petty Contractor List</h1>
          <p>All Record till Now</p>
        </div>
        <ul class="app-breadcrumb breadcrumb side">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item">Petty Contractor</li>
          <li class="breadcrumb-item active"><a href="">Petty Contractor Add</a></li>
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
              <a href="{{url('vendor_export')}}" class="btn btn-primary">Export Excel</a>
            </div>
            
            <div class="tile-body">
              
              <div class="table-responsive">
                <table class="table table-hover table-bordered" id="sampleTable">
                  <thead>
                    <tr>
                      <th>Petty Contractor</th>
                      <th>Petty Code</th>
                      <th>GSTIN/UIN of Recipient</th>
                      <th>Action</th>
                      <th>Delete</th>
                      <!-- <th>Permission</th> -->
                    </tr>
                  </thead>
                  <tbody>
                  	
                 <?php $s_no=1 ?>
                    @foreach( $pclient as $perm)
                    <tr>
                      <td>{{ $perm->name }}</td>
                      <td>{{ $perm->unique_contract_code }}</td>
                      <td>{{ $perm->gstin }}</td>
                      
                      <td><a href="{{ route('PurchaseClient.show',[$perm->id])}}"><button class="btn btn-warning"><i class="fa fa-lg fa-eye"></i></button></a>
                     <a href="{{ route('PurchaseClient.edit',[$perm->id])}}"><button class="btn btn-primary"><i class="fa fa-lg fa-edit"></i></button></a>
                   </td>
                   <td>
                    <form action="{{ route('PurchaseClient.destroy',$perm->id)}}" method="POST">
                      @method('DELETE')
                      @csrf
                      <button class="btn btn-danger" onclick="return confirm('Are you sure?')"><i class="fa fa-lg fa-trash"></i></button>
                    </form>
                      </td>

                    <!--   <td>
                        <input type="radio" value="check">Sadmin
                        <input type="radio">admin
                        <input type="radio">Manger
                      </td> -->
                    </tr>
                    <?php $s_no++ ?>
                    @endforeach
                  </tbody>
                </table>
                {{ $pclient->links() }}
              </div>
            </div>
          </div>
            <div class="tile-footer">
                <a href="{{ route('PurchaseClient.create')}}"><button class="btn btn-primary"><i class="fa fa-lg fa-plus"></i>Add Petty Contractor</button></a>
              </div>
        </div>
      </div>
      <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    </div>
  </div>
    </main>
@endsection