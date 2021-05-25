@extends('layouts.master')
@section('content')



<main class="app-content">
      <div class="app-title">
        <div class="row">
          <h1> <i class="fa fa-history" aria-hidden="true"></i>Item Application (Direct) - History</h1>&nbsp&nbsp
          <!-- <div><a href="{{ route('receiving-direct.create') }}"><button class="btn btn-primary">Add Request</button></a></div> -->
        </div>
        
        <ul >
        <a href="{{ route('receiving-direct.index') }}"><button class="btn btn-sm btn-info" >Back </button></a>
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
                      {{-- <th class="text-center">ADMIN</th> --}}
                      {{-- <th class="text-center">SUP-ADMIN</th> --}}
                      <th class="text-center">VIEW</th>
                      <th class="text-center">ACTION</th>
                    </tr>
                  </thead>
                  <tbody>
                      
                   
                 @php $count = 0; @endphp
                   @foreach($site['receiving'] as $receiving)
                    <tr>
                      <td class="text-center">{{ ++$count }}</td>
                      <td>{{ $receiving['site']->job_describe }}</td>
                      <td class="text-center">{{ strtoupper($receiving['warehouse']->name) }}</td>
                      <td class="text-center">{{ date("M d, Y : h:i A", strtotime($receiving->created_at)) }}</td>
                      <td class="text-center">

                        @if($receiving->manager == 1 )

                          <span style="color: green"><b>APPROVED</b></span>

                        @elseif($receiving->manager == 0 && $receiving->complete == 1 )

                          <span style="color: red"><b>DECLINED</b></span>

                        @else

                          <b>PENDING</b>
                        @endif
                      </td>
                      {{-- <td class="text-center">
                        @if($receiving->admin == 1 )

                          <span style="color: green"><b>APPROVED</b></span>

                        @elseif($receiving->admin == 0 && $receiving->complete == 1 )

                          <b>PENDING</b>

                        @elseif($receiving->admin == 0 && $receiving->complete == 2 )

                          <span style="color: red"><b>DECLINED</b></span>
                        @endif
                      </td>
                      <td class="text-center">
                        @if($receiving->super_admin == 1 )

                          <span style="color: green"><b>APPROVED</b></span>

                        @elseif($receiving->super_admin == 0 && $receiving->complete == 1 )

                          <b>PENDING</b>

                        @elseif($receiving->super_admin == 0 && $receiving->complete == 2 )

                          <span style="color: red"><b>DECLINED</b></span>

                        @endif
                      </td> --}}
                      <td class="text-center">
                        <a href="{{ route('receiving-direct.show', $receiving->id ) }}"><button class="btn btn-sm btn-primary " id="requestShow" data-toggle="modal" data-target="#reqModal"><i class="fa fa-lg fa-eye"></i></button></a>
                        @if($receiving->manager == 1)
                          <a href="{{ route('receiving-challan', $receiving->id ) }}"><button class="btn btn-sm btn-warning " title="View Challan" id="requestShow" data-toggle="modal" data-target="#reqModal"><i class="fa fa-cart-arrow-down" aria-hidden="true"></i></button></a>
                        @endif
                      </td>
                      <td>

                          {{-- @if($receiving->status == 1 )
                            <span style="color: blue"><b>RECEIVED</b></span>
                          @elseif($receiving->status == 2 )
                            <span style="color: red"><b>DECLINED</b></span> --}}
                          @if($receiving->applicant_status == 1 )
                            
                            <span style="color: #5e5ec5; " ><b>RECEIVED</b></span>

                          @elseif($receiving->applicant_status == 2 )

                            <span style="color: red; "><b>DECLINED</b></span>
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

      alert([request_id, btnValue])
      $.ajax({
        type: "POST",
        url: '{{ route('receiving-req.approval') }}',
        data:{request_id:request_id, btnValue:btnValue, receiving_id:receiving_id, _token:_token},
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