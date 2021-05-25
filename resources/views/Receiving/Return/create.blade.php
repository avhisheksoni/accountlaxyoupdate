@extends('layouts.master')
@section('content')

<div class="app-content">
	<div class="app-title">
        <div class="row"><h1><i class="fa fa-th-list"></i>Return Item Application</h1></div>
        <ul >
                <a href="{{route('return-receiving.history')}}" id="transfer_manager" class="btn btn-sm btn-info pull-right" target="_blank" title="Transfer Manager">
                    Manage Transfer</a>
                  </ul>
	</div>
    <div class="row">
        <div class="col-md-8" style="background-color: white">
             <div id="register_wrapper" style="margin-top: 20px">
               {{--  <input type="hidden" name="employee_id" value="" id="employee_id">

            <br><br> --}}

            <div class="panel-body form-group">               
				<div class="col-md-6">
					<label class="control-label">Current Site</label>
          <h4>{{ strtoupper($userSite['site']->job_describe) }}</h4>
					{{-- <select name="site" id="applicantSite" class="form-control" >
					<option value="">Select Site</option>
                    	@foreach($sites as $site)
                      		<option value="{{$site->id}}" @if(Session::has('return_site_id')) {{ Session::get('return_site_id') == $site->id ? 'selected' : '' }} @endif>{{$site->job_describe}}</option>
						@endforeach
                    </select> --}}

				</div>
        
            </div>
            <div class="panel-body form-group">
                <div class="row col-md-12">
                  <div class="col-md-9">
                        <input type="text" value="" placeholder="Search item name or number..." id="items" class="form-control input-sm ui-autocomplete-input" size="50" tabindex="1" autocomplete="off">

                        <input type="hidden" value="1">
                         <span class="ui-helper-hidden-accessible" role="status"></span>
                            <div id="itemList"></div>
                  </div>
                  <div class="col-md-3">
                        <p class="pull-left" style="font-weight:bold; font-size:1.2em">
                            Total Qty : <label class="total_qty" value=""></label>
                            <input type="hidden" {{-- name="total_qty" --}} id="total_qty" value="total_qty">
                        </p>
                  </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <table class="sales_table_100" id="register" style="background-color: #f2f2f2; width: 100%">
                        <thead>
                            <tr align="center">
                                <th style="width:20%;">Barcode</th>
                                <th style="width:45%;">Name</th>
                                <th style="width:15%;">Qty.</th>
                                <th style="width:10%;">Unit</th>
                                {{-- <th style="width:10%;">Action</th> --}}
                            </tr>
                        </thead>
                        <tbody>
                           <tr>
                              <td id="itemBody">
                                @include('Receiving.Return.item-display')
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

	$('#items').on('keyup', function(e) {

        var query = $(this).val();

        if (e.keyCode == 13 || e.keyCode == 8 && query !='') {

          if (query != '' ) {

            var _token = $('input[name="_token"]').val();

              $.ajax({
                type:'POST',
                url: '{{ route('fetch-items') }}',
                data: {'query':query, '_token':_token},
                 
                  success: function(data) {

                      $('#itemList').fadeIn();
                      $('#itemList').html(data);
                  }
              });
        } else {
            $('#itemList').fadeOut();
        }
     }
  });


  $(document).on('click', '#selectItem', function(e) {
        e.preventDefault()

        $('#items').val($(this).text());
        $('#itemList').fadeOut();


        var value         = $('#items').val();
        var res           = value.split("|");
        var item_number   = res[1];
        var _token        = $('input[name="_token"]').val();

        if (item_number != '') {

            $.ajax({
                method: "POST",
                url: '{{ route("return-receiving.store") }}',
                data:{'item_number':item_number,_token:_token,flag:'item_list_update'}  ,              
                success: function(data) {
                   window.location.reload();
                }
            });
          
        }
    });

  $('.deleteItem').on('click', function(e) {
        var item_id   = $(this).val();
        var _token = $('input[name="_token"]').val();
        alert(item_id);
        $.ajax({
          url: "remove_entry_session",
          method: "post",
          data:{'item_id':item_id,_token:_token}  ,              
          success: function(data) {
             window.location.reload();
          }
      });
    });
})
</script>
@endsection