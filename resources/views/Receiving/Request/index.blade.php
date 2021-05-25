@extends('layouts.master')
@section('content')



<main class="app-content">
      <div class="app-title">
        <div class="row">
          <h1><i class="fa fa-th-list"></i>Application for Item</h1>&nbsp&nbsp
          <div><a href="{{ route('receiving-request.create') }}"><button class="btn btn-sm btn-primary">+ Request</button></a></div>
        </div>
        
        <ul >
        <a href="{{ route('receiving-request.history') }}"><button class="btn btn-sm btn-info" >
        <i class="fa fa-history" aria-hidden="true"></i>History </button></a>
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
                      <th class="text-center">MANAGER</th>
                      <th class="text-center">ADMIN</th>
                      <th class="text-center">SUP-ADMIN</th>
                      <th class="text-center">VIEW</th>
                      <th class="text-center">ACTION</th>
                    </tr>
                  </thead>
                  <tbody>
                  	
                 @php $count = 0; @endphp
                   @foreach($requests as $request)
                    <tr>
                      <td class="text-center">{{ ++$count }}</td>
                      <td>{{ $request['site']->job_describe }}</td>
                      <td class="text-center">{{ strtoupper($request['warehouse']->name) }}</td>
                      <td class="text-center">{{ date("M d, Y : h:i A", strtotime($request->created_at)) }}</td>
                      <td class="text-center">
                        @if($request['receiving'] != null)
                          @if($request['receiving']->manager == 1 )
                            <span style="color: green"><b>APPROVED</b></span>
                          @elseif($request['receiving']->manager == 0 && $request['receiving']->complete == 2 )
                            <span style="color: red"><b>DECLINED</b></span>
                          @else
                            <b>PENDING</b>
                          @endif
                        @else
                          <b>PENDING</b>
                        @endif
                      </td>
                      <td class="text-center">
                        @if($request['receiving'] != null)
                          @if($request['receiving']->admin == 1 )
                            <span style="color: green"><b>APPROVED</b></span>
                          @elseif($request['receiving']->admin == 0 && $request['receiving']->complete == 2 )
                            <span style="color: red"><b>DECLINED</b></span>
                          @else
                            <b>PENDING</b>
                          @endif
                        @else
                          <b>PENDING</b>
                        @endif
                      </td>
                      <td class="text-center">
                        @if($request['receiving'] != null)
                          @if($request['receiving']->super_admin == 1 )
                            <span style="color: green"><b>APPROVED</b></span>
                          @elseif($request['receiving']->super_admin == 0 && $request['receiving']->complete == 2 )
                            <span style="color: red"><b>DECLINED</b></span>
                          @else
                            <b>PENDING</b>
                          @endif
                        @else
                          <b>PENDING</b>
                        @endif
                      </td>
                      <td class="text-center">
                        <a href="{{ route('receiving-request.show', $request->id ) }}"><button class="btn btn-sm btn-primary " title="Requested Items" id="requestShow" data-toggle="modal" data-target="#reqModal"><i class="fa fa-lg fa-eye"></i></button></a>
                        @if($request['receiving'] != null && $request['receiving']->super_admin == 1)
                          <a href="{{ route('receiving-challan', $request['receiving']->id ) }}"><button class="btn btn-sm btn-warning " title="View Challan" id="requestShow" data-toggle="modal" data-target="#reqModal"><i class="fa fa-cart-arrow-down" aria-hidden="true"></i></button></a>
                        @endif
                      </td>
                      <td>
                        @if($request['receiving'] != null)
                          @if($request->status == 1 )
                            <span style="color: #5e5ec5"><b>RECEIVED</b></span>
                          @elseif($request->status == 2 )
                            <span style="color: red"><b>DECLINED</b></span>
                          @elseif($request['receiving']->super_admin == 1 && $request->status == 0 )
                            <button class="btn btn-sm btn-info approvalBtn" id="acceptBtn_{{ $request->id }}" value="1" data-id="{{ $request->id }}" data-receiving="{{ $request->return_receiving_id }}"><i class="fa fa-check" aria-hidden="true"></i></button>

                            <span style="color: #5e5ec5; display: none;" id="acceptMsg_{{ $request->id }}"><b>RECEIVED</b></span>

                            <button class="btn btn-sm btn-danger approvalBtn" id="declineBtn_{{ $request->id }}" value="2" data-id="{{ $request->id }}" data-receiving="{{ $request->return_receiving_id }}"><i class="fa fa-times" aria-hidden="true"></i></button>

                            <span style="color: red; display: none;" id="declineMsg_{{ $request->id }}"><b>DECLINED</b></span>
                          @endif
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

<script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<script type="text/javascript">

$(document).ready(function(){

    $(document).on('click', '.approvalBtn', function(){ 
      var btnValue      = $(this).val()
      var request_id    = $(this).data("id")
      var receiving_id  = $(this).data("receiving")
      var _token = $('input[name="_token"]').val();

      $.ajax({
        type: "POST",
        url: '{{ route('receiving-req.approval') }}',
        data:{request_id:request_id, btnValue:btnValue, receiving_id:receiving_id, _token:_token},
        beforeSend: function() { 
                   $("#acceptBtn_"+request_id).text(' ...');
                   $("#acceptBtn_"+request_id).attr('disabled',true);
                   $("#declineBtn_"+request_id).text(' ...');
                   $("#declineBtn_"+request_id).attr('disabled',true);
                 },
        success:function(res){
          if(res == 1){
            
            $('#acceptBtn_'+request_id).hide()
            $('#declineBtn_'+request_id).hide()
            $('#acceptMsg_'+request_id).show()

          }else if(res == 2){
            $('#acceptBtn_'+request_id).hide()
            $('#declineBtn_'+request_id).hide()
            $('#declineMsg_'+request_id).show()
          }
        }
      })
    })

});
</script>
@endsection