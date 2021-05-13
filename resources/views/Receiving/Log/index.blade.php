@extends('layouts.master')
@section('content')
<main class="app-content">
      <div class="app-title">
        <div class="row">
          <h1><i class="fa fa-th-list"></i>&nbsp Application Log</h1>
        </div>
        <ul >
          <a href="{{ route('receiving-request.index') }}"><button class="btn btn-info" >back </button></a>
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
                      <span style="font-size: 20px; font-weight: bold"><i style="font-size: 15px;" class="fa fa-globe"></i> </span>
                      <span style="font-size: 20px; font-weight: bold"></span>
                  </div>
              </div><hr>
              <div class="row container">
                  
              </div><br>
              @php $count = 0; @endphp
              
              </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </main>
@endsection