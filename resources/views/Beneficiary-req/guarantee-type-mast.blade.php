@extends('layouts.master')
@section('content')



<main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-th-list"></i>Banks</h1>
          <p>All Record till Now</p>
        </div>
        <ul class="app-breadcrumb breadcrumb side">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item">Banks</li>
          <li class="breadcrumb-item active"><a href="{{ route('purchaseform') }}">Bank-From</a></li>
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
                      <th>S.no.</th>
                      <th>Beneficiary</th>
                      <th>status</th>
                      <th>view</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  	
                 <?php $s_no=1 ?>
                    @foreach( $guarantee as $gua)
                    <tr>
                      <td>{{ $s_no }}</td>
                      <td>{{ $gua->name }}</td>
                      <td>{{ $gua->status_lc }}</td>
                       <td><a href="{{ route('guarantee-view',[$gua->id]) }}"><button class="btn btn-primary"><i class="fa fa-lg fa-eye"></i></button></a></td>
                      <td><a href="{{ route('guarantee-edit',[$gua->id]) }}"><button class="btn btn-primary"><i class="fa fa-lg fa-edit"></i></button></a><a href="{{ route('gaurantee-delete',[$gua->id])}}"><button class="btn btn-danger"><i class="fa fa-lg fa-trash"></i></button></a>
                      </td>
                    </tr>
                    <?php $s_no++ ?>
                    @endforeach
                  </tbody>
                </table>
                {{ $guarantee->links() }}
              </div>
            </div>
          </div>
           <div class="tile-footer">
                <a href="{{ route('guarantee-type-add') }}"><button class="btn btn-primary">Add Type</button></a>
              </div>
        </div>
      </div>
    </main>

@endsection