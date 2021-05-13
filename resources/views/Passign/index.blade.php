@extends('layouts.master')
@section('content')



<main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-th-list"></i>Petty Contarctor Assign List</h1>
          <p>All Record till Now</p>
        </div>
        <ul class="app-breadcrumb breadcrumb side">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item">Petty Contarctor Assign</li>
          <li class="breadcrumb-item active"><a href="">Petty Contarctor Assign Add</a></li>
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
                      <th>Contrator</th>
                      <th>Comp-code</th>
                      <th>uni-code</th>
                      <th>Action</th>
                      @role(['acco_super_admin','acco_admin'])
                      <th>Delete</th>
                      @endrole
                    </tr>
                  </thead>
                  <tbody>
                    
                 <?php $s_no=1 ?>
                    @foreach( $passign as $perm)
                    <tr>
                      <td>{{ $perm->company->name }}</td>
                      <td>{{ $perm->petty->firm_name }}</td>
                      <td>{{ rtrim(substr($perm->unique_contract_code , 0 ,(strlen($perm->unique_contract_code)-strlen(substr($perm->unique_contract_code, strrpos($perm->unique_contract_code, '/') + 1)))),"/") }}</td>
                      <td>{{ substr($perm->unique_contract_code, strrpos($perm->unique_contract_code, '/') + 1) }}</td>
                      
                      <td><a href="{{ route('Passingn.show',$perm->id )}}"><button class="btn btn-warning"><i class="fa fa-lg fa-eye"></i></button></a>
                     <a href="{{ route('Passingn.edit',$perm->id )}}"><button class="btn btn-primary"><i class="fa fa-lg fa-edit"></i></button></a></td>
                     @role(['acco_super_admin','acco_admin'])
                     <td><form action="{{ route('Passingn.destroy',$perm->id)}}" method="POST">
                      @method('DELETE')
                      @csrf
                      <button class="btn btn-danger" onclick="return confirm('Are you sure?')"><i class="fa fa-lg fa-trash"></i></button>
                    </form>
                      </td>
                      @endrole
                    </tr>
                    <?php $s_no++ ?>
                    @endforeach
                  </tbody>
                </table>
                {{ $passign->links() }}
              </div>
            </div>
          </div>
            <div class="tile-footer">
                <a href="{{  route('Passingn.create')}}"><button class="btn btn-primary"><i class="fa fa-lg fa-plus"></i>Assign Receiver</button></a>
              </div>
        </div>
      </div>
      <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    </div>
  </div>
    </main>
@endsection