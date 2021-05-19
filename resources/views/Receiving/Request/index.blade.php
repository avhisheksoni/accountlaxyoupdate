@extends('layouts.master')
@section('content')



<main class="app-content">
      <div class="app-title">
        <div class="row">
          <h1><i class="fa fa-th-list"></i>Item Application</h1>&nbsp&nbsp
          <div><a href="{{ route('receiving-request.create') }}"><button class="btn btn-primary">Add Request</button></a></div>
        </div>
        
        <ul class="app-breadcrumb breadcrumb side">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item">Request Item</li>
          <li class="breadcrumb-item active"><a href="">Request Item-From</a></li>
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
                          @elseif($request['receiving']->manager == 0 && $request['receiving']->complete == 1 )
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
                          @elseif($request['receiving']->admin == 0 && $request['receiving']->complete == 1 )
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
                          @elseif($request['receiving']->super_admin == 0 && $request['receiving']->complete == 1 )
                            <span style="color: red"><b>DECLINED</b></span>
                          @else
                            <b>PENDING</b>
                          @endif
                        @else
                          <b>PENDING</b>
                        @endif
                      </td>
                      <td class="text-center">
                        <a href="{{ route('receiving-request.show', $request->id ) }}"><button class="btn btn-primary " id="requestShow" data-toggle="modal" data-target="#reqModal"><i class="fa fa-lg fa-eye"></i></button></a>
                       {{--  <a href="ryeye"><button class="btn btn-danger"><i class="fa fa-lg fa-trash"></i></button></a> --}}
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
<script type="text/javascript">
$(document).ready(function(){

  $(document).on('click', '#requestShow', function(e){
    e.preventDefault();

    //var check_site  = '{{ Session::has('site_id') }}'
    var user = '{{ Auth::id() }}'
    /*if(check_site == true){
      $.ajax({
        type: "get",
        url: "/receiving-request/"+user,
        success:function(res){
          $('#reqDetailTable').html(res);
        }
      })
    }else{
      alert('Site is not selected.')
    }
*/  })
}
@endsection