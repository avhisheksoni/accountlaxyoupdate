@extends('layouts.master')
@section('content')

<div class="app-content">
	<div class="app-title">
        <div class="row"><h1><i class="fa fa-th-list"></i>Return Item Application</h1></div>
	</div>
    <div class="row">
        <div class="col-md-8" style="background-color: white">
             <div id="register_wrapper" style="margin-top: 20px">
                <input type="hidden" name="employee_id" value="" id="employee_id">
                
                <a href="{{ route('receiving.log') }}" id="transfer_manager" class="btn btn-sm btn-info pull-right" target="_blank" title="Transfer Manager">
                    Manage Transfer</a>
            <br><br>

            <div class="panel-body form-group">               
				<div class="col-md-6">
					<label class="control-label">Select Current Site</label>
					<select name="site" id="applicantSite" class="form-control" >
					<option value="">Select Site</option>
                    	@foreach($sites as $site)
                      		<option value="{{$site->id}}" @if(Session::has('return_site_id')) {{ Session::get('return_site_id') == $site->id ? 'selected' : '' }} @endif>{{$site->job_describe}}</option>
						@endforeach
                    </select>
				</div>
        
            </div>
            <div class="panel-body form-group">
              {{-- <form  id="mode_form" class="form-horizontal panel panel-default" accept-charset="utf-8"> --}}
                <div class="row col-md-12">
                  <div class="col-md-9">
                        <input type="text" {{-- name="barcode" --}} value="" placeholder="Start typing Item Name or scan Number..." id="item" class="form-control input-sm ui-autocomplete-input" size="50" tabindex="1" autocomplete="off">

                        <input type="hidden" {{-- name="status" --}} value="1">
                         <span class="ui-helper-hidden-accessible" role="status"></span>
                            <div id="itemList"></div>
                  </div>
                  <div class="col-md-3">
                        <p class="pull-left" style="font-weight:bold; font-size:1.2em">
                            Total Qty: <label class="total_qty" value=""></label>
                            <input type="hidden" {{-- name="total_qty" --}} id="total_qty" value="total_qty">
                        </p>
                  </div>
                </div>
              {{-- </form> --}}
            </div>
            <div class="row">
                <div class="col-md-12">
                    <table class="sales_table_100" id="register" style="background-color: #f2f2f2; width: 100%">
                        <thead>
                            <tr align="center">
                                <th style="width:10%;">Action</th>
                                <th style="width:20%;">Barcode</th>
                                <th style="width:45%;">Item Name</th>
                                <th style="width:15%;">Qty.</th>
                                <th style="width:10%;">Unit.</th>
                            </tr>
                        </thead>
                        <tbody>
                           <tr>
                              <td id="itemBody">
                                {{-- @include('receivings.itmes-display') --}}
                              </td>
                           </tr>
                        </tbody>
                    </table>
                </div>
            </div>
          </div>
        </div>
        <div class="col-md-4">
            <div id="overall_sale" class="panel panel-default" style="margin-top: 20px">
            	<div class="row">
                     <div class="col-md-12">
                     <label class="control-label">Destination Location</label>
                        <select name="destination" id="destination" class="form-control" >
                        @foreach($warehouses as $warehouse)
                          	<option value="{{$warehouse->id}}">{{$warehouse->name}}</option>
                       @endforeach
                        </select>
                     </div>
                </div>
            <div class="panel-body">
                <div id="finish_sale">
                    <form action="" id="finish_receiving_form" class="form-horizontal" method="post" accept-charset="utf-8">
                        <div class="form-group form-group-sm">
                            <label id="comment_label" for="comment">Comments</label>
                            <textarea name="comment" cols="40" rows="6" id="comment" class="form-control input-sm"></textarea>
                            <br>
                            <a href="{{-- {{route('session_distroy')}} --}}" class="btn btn-sm btn-danger pull-left" id="cancel_receiving_button"><span class="glyphicon glyphicon-remove">&nbsp;</span>Cancel</a>
                            
                            <input type="hidden" name="location_owner" value="7">

                            <div class="btn btn-sm btn-success pull-right" id="finish_receiving_button"><span class="glyphicon glyphicon-ok">&nbsp;</span>Finish</div>
                        </div>
                    </form>                         
                </div>
            </div>
        </div>
        </div>
       &nbsp&nbsp&nbsp
        
    </div>
      
</div>
<script src="//code.jquery.com/jquery-1.11.0.min.js"></script>

<script type="text/javascript">

$(document).ready(function(){

	$('#applicantSite').on('change', function(){
	    var site_id = $('#applicantSite :selected').val()
	    var _token = $('input[name="_token"]').val();
	    $.ajax({
			method: 'POST',
			url: '{{ route('return-receiving-site') }}',
			data:{'site_id': site_id, '_token':_token},
			success:function(res){
	        	if(res == 1){
					alert('Site has been selected.')
					location.reload();
		        }else{
		          alert('No site has been selected.')
		          location.reload();

		        }
			}
		})
	})

	$('#item').on('keyup', function(e) {

		var return_site_id = '{{ Session::get('return_site_id') }}'

        if(Session::has('return_site_id')){
        	var query = $(this).val();
	        if (e.keyCode == 13 || e.keyCode == 8 && query !='') {

		        if (query != '') {

		        	alert(query)
		          var _token = $('input[name="_token"]').val();
		            $.ajax({
		              type: 'post',
		              url: '{{ route("return.fetch-items") }}',
		              data: {'query':query, '_token':_token},
		               
		                success: function(data) {
		                 //alert(query);

		                    $('#itemList').fadeIn();
		                    $('#itemList').html(data);
		                }
		            });
		        } else {
		            $('#itemList').fadeOut();
		        }
	     	}
	     }else{
	     	alert('Please select site first.')
	     }
    });
})
</script>
@endsection