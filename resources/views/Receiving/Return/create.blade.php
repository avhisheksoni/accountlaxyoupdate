@extends('layouts.master')
@section('content')
<div class="app-content">
	<div class="app-title">
    <div class="row"><h1><i class="fa fa-th-list"></i>Return Items</h1></div>
      <ul >
        <a href="{{route('return-receiving.index')}}" id="transfer_manager" class="btn btn-sm btn-info pull-right" title="Transfer Manager">Back</a>
      </ul>
	</div>
  <div class="row">
    <div class="col-md-8" style="background-color: white">
      <div id="register_wrapper" style="margin-top: 20px">
        <div class="row col-md-12 panel-body form-group">               
          <div class="col-md-6">
            <label class="control-label"><b>Current Site</b></label>
            <h4>{{ strtoupper($userSite['site']->job_describe) }}</h4>
          </div>
          <div class="col-md-6 pull-right">
          <div><label class="control-label text-center"><b>Select Warehouse</b></label></div>
          <div class="btn-group btn-group-toggle " data-toggle="buttons">
            @foreach($warehouses as $warehouse)
              <button class="btn btn-md btn-secondary {{ session()->get('ware-location') == $warehouse->id ? 'active' : '' }} warehouse" value="{{$warehouse->id}}" {{ session()->get('ware-location') == $warehouse->id ? 'disabled' : '' }}>{{strtoupper($warehouse->name)}} </button>
               &nbsp&nbsp
            @endforeach
          </div>
          </div>
        </div>
        <div class="panel-body form-group">
          <div class="row col-md-12">
            <div class="col-md-9">
              <input type="text" value="" placeholder="Search item name or number..." id="items" class="form-control input-sm ui-autocomplete-input" size="50" tabindex="1" autocomplete="off" {{ Session::has('ware-location') != true ? 'disabled' : '' }}>
              <input type="hidden" value="1">
              <span class="ui-helper-hidden-accessible" role="status"></span>
              <div id="itemList"></div>
            </div>
            <div class="col-md-3">
              <p class="pull-right" style="font-weight:bold; font-size:1.2em">
                Total Qty : <label class="total_qty" value=""></label>
                <input type="hidden" id="total_qty" value="total_qty">
              </p>
            </div>
          </div>
        </div><hr>
        <div class="row">
          <div class="col-md-12">
            <table class="sales_table_100" id="register" style=" width: 100%">
              <thead>
                <tr align="center">
                    <th style="width:15%;">Barcode</th>
                    <th style="width:2%;"></th>
                    <th style="width:47%;">Name</th>
                    <th style="width:2%;"></th>
                    <th style="width:10%;">In Stock</th>
                    <th style="width:2%;"></th>
                    <th style="width:10%;">Qty.</th>
                    <th style="width:2%;"></th>
                    <th style="width:10%;">Unit</th>
                </tr>
              </thead>
              <tbody>
                <tr><td id="itemBody">@include('Receiving.Return.item-display')</td></tr>
              </tbody>
            </table>
          </div>
        </div>&nbsp&nbsp
      </div>
    </div>
    <div class="col-md-4" style="background-color: white;border-left: 1px solid #dadada;">
      <div id="overall_sale" class="panel panel-default" style="margin-top: 20px">
        <div class="panel-body">
          <form action="" id="finish_receiving_form" class="form-horizontal">
            <div class="form-group form-group-sm">
              <label id="comment_label" for="comment">Remark</label>
              <textarea name="comment" cols="40" rows="6" id="comment" class="form-control input-sm"></textarea><br>
              <a href="{{route('cart-receiving.destroy')}}" class="btn btn-sm btn-danger pull-left"> &nbspCancel</a>
              <button class="btn btn-sm btn-success pull-right" id="submitReceiving" {{ Session::has('ware-location') != true ? 'disabled' : '' }} >&nbsp;Submit</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<style type="text/css">
  .btn-secondary.disabled, .btn-secondary:disabled{
    background-color: #000000;
    border-color: #000000;
  }
</style>
<script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
<script type="text/javascript">

$(document).ready(function(){

  $('.warehouse').on('click', function(){

    var warehouse_id  = $(this).val()
    var _token        = $('input[name="_token"]').val();

      $.ajax({
        type:'GET',
        url: '{{ route('set-warehouse') }}',
        data: {'warehouse_id':warehouse_id, '_token':_token},
        success: function(res) {
          alert('Warehouse is selected.')
          window.location.reload()
          /*var ware = '{{ Session::get('ware-location') }}'
          if(ware){
            
          }*/
        }
      })

  })

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
            $('#itemList').fadeIn()
            $('#itemList').html(data)
          }
        });
      }else{
        $('#itemList').fadeOut();
      }
    }
  });

  $(document).on('click', '#selectItem', function(e) {
        e.preventDefault()

        $('#items').val($(this).text())
        $('#itemList').fadeOut()

        var value         = $('#items').val()
        var res           = value.split("|")
        var item_number   = res[1];
        var _token        = $('input[name="_token"]').val()

        if (item_number != '') {

            $.ajax({
                method: "POST",
                url: '{{ route("return-receiving.store") }}',
                data:{'item_number':item_number,_token:_token}  ,              
                success: function(data) {
                   window.location.reload()
                }
            });
        }
    });

  var item_qty = 0;
  $('.item_qty').each(function() {
      item_qty = item_qty + parseInt(($(this).val()));
  });
  $('.total_qty').text(item_qty);

  $(document).on('keyup','.item_qty',function(e){
    e.preventDefault()
    var item_id= $(this).data('id');
    var qty    = $(this).val();
    var _token = $('input[name="_token"]').val();

    $.ajax({
        method: 'POST',
        url: '{{ route('cart-item-qty.update') }}',
        data:{item_id:item_id,qty:qty,_token:_token},              
        success: function(data) {
           window.location.reload();
        }
    });
  })

  $('.removeCartItem').on('click', function(e) {

    var item_id   = $(this).val();
    var _token = $('input[name="_token"]').val();

    $.ajax({
      method: "POST",
      url: '{{ route("remove-cart-item") }}',
      data:{'item_id':item_id,_token:_token}  ,              
      success: function(data) {
         window.location.reload();
      }
    });
  });

  $('#submitReceiving').on('click',function(){

    if(window.confirm("Are you sure?")) {

      var comment         = $('#comment').val()
      var total_qty       = item_qty
      var _token          = $('input[name="_token"]').val()
      var warehouse_id    = '{{ (int)Session::get('ware-location') }}'

      $.ajax({
          method: "POST",
          url: '{{ route("receiving-cart.store") }}',
          data: {comment: comment, warehouse_id: warehouse_id, total_qty: total_qty,
              _token: _token},
          beforeSend: function() { 
             $("#submitReceiving").text('...');
             $("#submitReceiving").attr('disabled', true);
           },
          success: function(data) {
            console.log(data);
            var lastId = data;
              window.location.href = "/receiving-challan/"+data;
          }
      });
    }
  });
})
</script>
@endsection