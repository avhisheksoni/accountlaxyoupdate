@extends('layouts.master')
@section('content')

    <main class="app-content">
		<div class="app-title">
      <div>
        <h1><i class="fa fa-edit"></i>Apply Here</h1>
        <p>Request Form</p>
      </div>
	    <!-- <div class="row">
        <div class="col-12">
          <label class="alert alert-success "  id="msg" style="display: none;"></label> 
        </div>
        <div class="col-md-12">
          @if($message = Session::get('success'))
  	        <div class="alert alert-success alert-block">
  	          <button type="button" class="close" data-dismiss="alert">×</button>
  	          <p>{{ $message }} </p>
  	        </div>
          @endif
        </div>
	  	</div> -->
      <ul >
        <a href="{{ route('request-new-item.index') }}"><button class="btn btn-sm btn-info" >Back </button></a>
      </ul>
    </div>
        <!-- <div class=""> -->
			<div class="tile">
        <div class="row container">
          <div class="col-md-12">
              <span style="font-size: 20px; font-weight: bold"></i> Site Name -</span>
              <span style="font-size: 20px; font-weight: bold">{{ strtoupper($userSite['site']->job_describe) }} </span>
          
          </div><br>
      <div class="col-md-12" style="float:left">
            	<form action="{{ route('request-new-item.store') }}" method="post">
                	@csrf
                  <div class="row">
                    <div class="col-6 form-group">
                      <label for="">Employee Name</label>
                      <input type="text" class="form-control" value="{{ Auth::user()->name }}" readonly="">
                      <input type="hidden" name="user_id" value="{{ Auth::id() }}">
                      
                    </div>
                    
                    <div class="col-6 form-group">
                      <label for="current_site">Warehouse</label>
                      <select name="warehouse" data-srno="1" class="form-control input-sm" required="">
                        <option value="warehouse_id">Select a Site</option>
                        @foreach($warehouses as $warehouse)
                          <option value="{{$warehouse->id}}">{{$warehouse->name}}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>
					<table id="invoice-item-table" class="table table-bordered">
			            <tr>
			              	<th class="text-center" style="width: 5%;">#</th>
			              	<th class="text-center" style="width: 30%;">Item Name</th>
			              	<th class="text-center" style="width: 20%;">Quantity | Unit</th>
			              	<th class="text-center" style="width: 45%;">Description</th>
			              	<th class="text-center" style="width: 10%;"></th>
			            </tr>
			            <tr>
							<td><span id="sr_no">1</span></td>
			              	<td>
								<input type="text" name="item[1][name]" id="item_name1" class="form-control input-sm" required=""/>
			              	</td>
			              	<td>
	                      		<div class="row">
	                        		<div class="col-md-5">
	    			              		<input type="number" name="item[1][quantity]" id="quantity1" data-srno="1" class="form-control input-sm quantity" required=""/>
	                        		</div>
	                        		<div class="col-md-7">
	                          			<select name="item[1][unit_id]" id="unit1" data-srno="1" class="form-control input-sm unit" required="">
	                          				<option value="">Units</option>
	                          				@foreach($units as $unit)
	                              			<option value="{{$unit->id}}">{{$unit->name}}</option>
	                              			@endforeach
	                          			</select>
	                        		</div>
	                      		</div>
			              	</td>
							<td>
				            	<textarea name="item[1][description]" id="description1" data-srno="1" class="form-control input-sm number_only description" required=""></textarea>
							</td>
							
			            </tr>
					</table>
					<div align="right">
						<button type="button" name="add_row" id="add_row" class="btn btn-success btn-sm">+</button>
					</div>
                	<button type="submit" name="submit" class="btn btn-sm btn-primary error-w3l-btn px-4" onclick="return confirm('Are you sure you want to submit this from?');">Submit</button>
            	</form>
        	</div>
      	<!-- </div> -->
    </main>

<style type="text/css">
  .items-dropdown{
    height: 250px !important;
    overflow-x: hidden !important;
    background: #dadada !important;
    width: 100% !important;
  }
  .items-dropdown > li{
    padding: 5px !important;
    border-bottom: 1px solid #8c4949 !important;
}
</style>

<script type="text/javascript" charset="utf8" src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.7.1.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.0.min.js"></script>

<script type="text/javascript">

$(document).on('click', '#requestShow', function(e){
  e.preventDefault();

  var check_site  = '/'
  var user = '{{ Auth::id() }}'
  if(check_site == true){
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
})

$(document).ready(function(){

	var final_total_amt = $('#final_total_amt').text();
  var count = 1;

  $('#item_name'+count).keyup(function(){ 
    var query = $(this).val();
    if(query != '')
    {
      var _token = $('input[name="_token"]').val();
      $.ajax({
        url:"",
        method:"POST",
        data:{query:query, _token:_token},
        success:function(data){
          $('#itemList'+count).fadeIn();  
          $('#itemList'+count).html(data);
        }
      });
    }
    else
    {
      $('#itemList'+count).fadeOut();
    }
  });

	$(document).on('click', 'li', function(){ 
    $('#item_name'+count).val($(this).text()); 
    $('#itemList'+count).fadeOut(); 
  });

  $(document).on('click', '#add_row', function(){
    count++;
    //alert("wrq");
    $('#total_item').val(count);
    var html_code = '';
    html_code += '<tr id="row_id_'+count+'">';
    html_code += '<td><span id="sr_no">'+count+'</span></td>';
    
    html_code += '<td><input type="text" name="item['+count+'][name]" id="item_name'+count+'" class="form-control input-sm" /></td>';
    html_code += '<td><div class="row"><div class="col-md-5"><input type="number" name="item['+count+'][quantity]" id="quantity'+count+'" data-srno="'+count+'" class="form-control input-sm number_only quantity" /></div><div class="col-md-7"><select name="item['+count+'][unit_id]" id="unit'+count+'" data-srno="'+count+'" class="form-control input-sm unit" ><option value="">Units</option>@foreach($units as $unit)<option value="{{$unit->id}}">{{ $unit->name }}</option>@endforeach</select></div></div></td>';
    html_code += '<td><textarea name="item['+count+'][description]" id="description'+count+'" data-srno="'+count+'" class="form-control input-sm number_only description"></textarea></td>';
    html_code += '<td><button type="button" name="remove_row" id="'+count+'" class="btn btn-danger btn-sm remove_row mt-3">x</button></td>';
    html_code += '</tr>';
    $('#invoice-item-table').append(html_code);

    $('#item_name'+count).keyup(function(){ 
      var query = $(this).val();
      if(query != '')
      {
        var _token = $('input[name="_token"]').val();
        $.ajax({
          url:"",
          method:"POST",
          data:{query:query, _token:_token},
          success:function(data){
            $('#itemList'+count).fadeIn();  
            $('#itemList'+count).html(data);
          }
        });
      }
      else
      {
        $('#itemList'+count).fadeOut();
      }
    });
    
    $(document).on('click', 'li', function(){ 
      $('#item_name'+count).val($(this).text()); 
      $('#itemList'+count).fadeOut(); 
    });

  });
  
  $(document).on('click', '.remove_row', function(){
    var row_id = $(this).attr("id");
    var total_item_amount = $('#order_item_final_amount'+row_id).val();
    var final_amount = $('#final_total_amt').text();
    var result_amount = parseFloat(final_amount) - parseFloat(total_item_amount);
    $('#final_total_amt').text(result_amount);
    $('#row_id_'+row_id).remove();
    count--;
    $('#total_item').val(count);
  });

  /*******Check if item qty exceed*********/    
  
  $('#applicantSite').on('change', function(){
    var site_id = $('#applicantSite :selected').val()
    $.ajax({
      method: 'GET',
      url: '{{ route('receiving-site') }}',
      data:{'site_id': site_id},
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

});
</script>
     
@endsection

