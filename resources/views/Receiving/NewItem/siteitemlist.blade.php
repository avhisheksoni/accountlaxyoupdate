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
          <li class="breadcrumb-item active"><a href="">Bank-From</a></li>
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
                      <td>{{ App\PurchaseItem::where('item_number',$item->item_id)->first()->title }}</td>
                      <td>{{ $item->wareh_id}}</td>
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
                <a href=""><button class="btn btn-primary">Add Bank</button></a>
              </div>
        </div>
      </div>
    </main>

@endsection