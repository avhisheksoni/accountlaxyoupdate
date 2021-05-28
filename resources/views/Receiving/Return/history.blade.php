@extends('layouts.master')
@section('content')
<main class="app-content">
      <div class="app-title">
        <div class="row">
          <h1><i class="fa fa-th-list"></i>Application for Return</h1>&nbsp&nbsp
          <!-- <div><a href="{{ route('return-receiving.create') }}"><button class="btn btn-sm btn-primary">+ Request</button></a></div> -->
        </div>
        
        <ul >
        <a href="{{ route('return-receiving.index') }}"><button class="btn btn-sm btn-info" >
        Back </button></a>
      </ul>
      </div>
      <div class="row">
        <div class="col-md-12">
          @if($message = Session::get('message'))
            <div class="alert alert-success">  {{$message}}</div>
          @endif
        <div class="tile">

            <div class="tile-body">
              <div class="table-responsive">
                <table class="table table-bordered thead-dark" id="sampleTable">
                  <thead>
                    <tr>
                      <th class="text-center">#</th>
                      <th class="text-center">FROM</th>
                      <th class="text-center">TO</th>
                      <th class="text-center">DATE</th>
                      <th class="text-center">VIEW</th>
                      <th class="text-center">ACTION</th>
                    </tr>
                  </thead>
                  <tbody>
                    
                 @php $count = 0; @endphp
                  @foreach($receivings as $receiving)
                    <tr>
                      <td class="text-center">{{ ++$count }}</td>
                      <td>{{ $receiving['site']->job_describe }}</td>
                      <td class="text-center">{{ strtoupper($receiving['warehouse']->name) }}</td>
                      <td class="text-center">{{ date("M d, Y : h:i A", strtotime($receiving->created_at)) }}</td>
                      <td class="text-center">
                        <a href="{{ route('receiving-challan', $receiving->id ) }}"><button class="btn btn-sm btn-warning " title="View Challan" id="requestShow" data-toggle="modal" data-target="#reqModal"><i class="fa fa-cart-arrow-down" aria-hidden="true"></i></button></a>
                      </td>
                      <td class="text-center">
                        @if($receiving->manager == 0 && $receiving->complete == 0 )
                          <b>PENDING</b>
                        @elseif($receiving->manager == 1 )
                          <span style="color: #5e5ec5"><b>RECEIVED</b></span>
                        @elseif($receiving->manager == 0 && $receiving->complete == 2 )
                          <span style="color: red"><b>DECLINE</b></span>
                        @endif
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
               
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    </div>
  </div>
    </main>
@endsection