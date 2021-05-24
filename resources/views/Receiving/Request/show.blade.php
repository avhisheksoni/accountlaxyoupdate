@extends('layouts.master')
@section('content')
<main class="app-content">
      <div class="app-title">
        <div class="row">
          <h1><i class="fa fa-th-list"></i>&nbsp Application Detail</h1>
        </div>
        <ul >
          <a href="{{ route('receiving-request.index') }}"><button class="btn btn-sm btn-info" >Back </button></a>
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
                <div class="row">
                  <div class="col">
                      <span style="font-size: 20px; font-weight: bold"><i style="font-size: 15px;" class="fa fa-globe"></i> Site -</span>
                      <span style="font-size: 20px; font-weight: bold">{{ $request['site']->job_describe }} </span>
                  </div>
              </div><hr>
              <div class="row container">
                  <div class="col">
                      <span style="font-size: 20px; font-weight: bold"></i> Warehouse -</span>
                      <span style="font-size: 20px; font-weight: bold">{{ strtoupper($request['warehouse']->name) }} </span>
                  </div>
              </div><br>
              @php $count = 0; @endphp
              @foreach($request['requestItems'] as $item)
               <div class="row col-12">
                <div class="col-12 form-group">
                    <label for=""><b>ITEM {{ ++$count }}</b><hr></label>
                  </div>
                  <div class="col-6 form-group">
                    <label for=""><b>Name : </b></label>
                      <b>{{ $item['purchaseItem']->title }}</b>
                  </div>
                  <div class="col-6 form-group">
                    <label for=""><b>Item Number : </b></label>
                      <b>{{ $item->item_number }}</b>
                  </div>
                  <div class="col-6 form-group">
                    <label for=""><b>Quantity : </b></label>
                    <b>{{ $item->qty }}</b>
                  </div>
                </div>
                @endforeach
              </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </main>
@endsection