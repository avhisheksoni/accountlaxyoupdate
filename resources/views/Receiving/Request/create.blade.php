@extends('layouts.master')
@section('content')

    <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-edit"></i>Request for Item</h1>
          <p>Request Form</p>
        </div>

        <div class="row">
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
  </div>
        <ul >
          <a href="{{ route('receiving-request.index') }}"><button class="btn btn-info" >back </button></a>
        </ul>
      </div>
        <div class="col-md-12">
          <div class="tile">
            
          	 <div class="col-6" style="float:left">
                <form action="{{route('receiving-searach-items')}}" method="get">
                	
                  <input type="text" placeholder="Search for items or Number ..." size=50 name="search_items">
                  <button type="submit" class="btn btn-primary btn-sm" >Search</button>
                  <div>
                    <input type="radio" id="name" name="type" value="title" checked="">
                    <label for="name" class="mb-10">Name</label>&nbsp
                    <input type="radio" id="item_number" name="type" value="item_number" >
                    <label for="item_number">Number</label>
                  </div>
                </form>
              </div>
              <div class="col-4" style="float:left">
                  <div>
                    <select id="applicantSite" class="custom-select form-control">
                        <option value="">Select a Site</option>
                        @foreach($sites as $site)
                          <option value="{{ $site->id }}"
                            @if(Session::has('site_id')) {{ Session::get('site_id') == $site->id ? 'selected' : '' }} @endif
                            >{{ $site->job_describe }}</option>
                        @endforeach
                    </select>
                  </div>
              </div>
               <div class="col-2" style="float: right">
                <button class="btn btn-sm btn-primary" data-shop="" id="requestShow" style="float: right" data-toggle="modal" data-target="#reqModal">Request Items</button>
              </div>
              <br>

              <!-- -->

              <div class="fixed-table-container" style="padding-bottom: 0px;">
              <table id="myTable" class="table table-hover table-striped ">
                <thead id="table-sticky-header">
                <tr>
                  {{-- Modal --}}
                  <div class="modal fade" id="reqModal" role="dialog">
                      <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h4 class="modal-title">Request Details</h4>
                          </div>
                          <div class="modal-body table-responsive" id="reqDetailTable" style="background: #ececec">
                            <p>Please Select Site First.</p>
                          </div>

                          <div class="modal-footer">
                            <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
                          </div>
                        </div>
                      </div>
                    </div>
                    {{-- End --}}
                           <th>
                              <div class="th-inner sortable both desc text-center"> Number</div>
                              <div class="fht-cell"></div>
                           </th>
                           <th>
                              <div class="th-inner sortable both desc text-center">Names</div>
                           </th>
                           <th>
                              <div class="th-inner sortable both desc text-center">Indore(QTY) </div>
                           </th>
                           <th>
                              <div class="th-inner sortable both desc text-center">Ratlam(QTY) </div>
                           </th>
                          <th>
                              <div class="th-inner sortable both desc text-center">Unit</div>
                           </th>
                        </tr>
                      </thead>
                      <tbody>
                      @php $count =1; @endphp
                      @foreach($items as $item)
                      <tr data-index="0" data-uniqueid="13158">
                            <td class="text-center">{{$item->item_number}}</td>
                            <td class="text-center">{{$item->title}}</td>
                            @foreach($item['purchaseStoreQty'] as $qty)
                              <td class="text-center"><div style="float: left;">{{$qty->quantity}} </div> 
                             <div>
<input type="number" class="emp wharehouse"  name="itemcheck" min="0" style="width: 45px;marks: float: right;" max="{{$qty->quantity}}" data-warehouse="{{ $qty->warehouse_id  }}" data-item="{{$item->item_number}}" {{ $qty->quantity <= 0 ? 'disabled' : '' }}> </div>
                              </td>
                            @endforeach
                            <td class="text-center">{{$item['unit']->name}}</td>
                          </tr>	
                      @endforeach
                      </tbody>
                    </table>

                </div>
                {!! $items->appends(Request::all())->links()!!}
        </div>
      </div>
    </main>

<script src="//code.jquery.com/jquery-1.11.0.min.js"></script>

<script type="text/javascript">

$(document).on('click', '#requestShow', function(e){
  e.preventDefault();

  var check_site  = '{{ Session::has('site_id') }}'
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
 /*$.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
  });*/

  /*******Check if item qty exceed*********/    
  $('.wharehouse').on('change', function(){

    var reqItemVal  = $(this).val()
    var itemTotalQty= $(this).attr('max')
    var check_site  = '{{ Session::has('site_id') }}'

    if(parseInt(itemTotalQty) >= parseInt(reqItemVal) && check_site ){
      var item = {} ;

      item['user']       = '{{ Auth::id() }}'
      item['item']       = $(this).data('item')
      item['qty']        = $(this).val()
      item['warehouse']  = $(this).data('warehouse')
      site               = '{{ Session::get('site_id') }}'
      $.ajax({
        method:'GET',
        url: '/receiving-request/'+site+'/edit',
        data:{'item':item},
        success:function(data){}
      })
    }else if(parseInt(itemTotalQty) <= parseInt(reqItemVal)){

      alert('Requested quantity must be low.')
      $(this).val('0')

    }else if(check_site == false){

      alert('Site is not selected.')
      $(this).val('0')

    }
  })

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

