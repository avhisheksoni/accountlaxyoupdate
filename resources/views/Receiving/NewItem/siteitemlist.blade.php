@extends('layouts.master')
@section('content')



<main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-th-list"></i>Item With Sites</h1>
          <p>All Record till Now</p>
        </div>
        <ul class="app-breadcrumb breadcrumb side">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item">Item With Sites</li>
          <li class="breadcrumb-item active"><a href="">Item With Sites</a></li>
        </ul>
      </div>
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
                      <th>Item</th>
                      <th>Warehouse</th>
                      <th>Quantity</th>
                      
                     {{--  <th>View</th> --}}
                     {{--  <th>Action</th> --}}
                    </tr>
                  </thead>
                  <tbody>
                  	@php 
                  	$s_no = 1;
                  	@endphp 
                  	@foreach($alloteitem as $item)
               
                    <tr>
                      <td>{{ $s_no++ }}</td>
                      <td>{{ $item->itemdetails->title }}</td>
                      <td>{{ $item->warehouse->name}}</td>
                      <td>{{ $item->quantity}}</td>
                     {{--  <td>yey</td> --}}
                     {{--  <td><a href=""><button class="btn btn-primary"><i class="fa fa-lg fa-eye"></i></button></a></td>
                      <td><a href=""><button class="btn btn-primary"><i class="fa fa-lg fa-edit"></i></button></a><a href=""><button class="btn btn-danger"><i class="fa fa-lg fa-trash"></i></button></a>
                      </td> --}}
                    </tr>
                    @endforeach
                  
                  </tbody>
                </table>
                
              </div>
            </div>
          </div>
             <div class="tile-footer">
               <marquee><h5 class="text-danger">Kindly Return Items To Warehouse as work Done</h5></marquee>
              </div>
        </div>
      </div>
    </main>

@endsection