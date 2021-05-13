@extends('layouts.master')
@section('content')
    <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-edit"></i>Reconcillation</h1>
          <p>Sales Details</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item">Sales Details</li>
          <li class="breadcrumb-item"><a href="{{-- {{route('salelist')}} --}}">Sales List</a></li>
        </ul>
      </div>
      
        <div class="col-md-12">
          <div class="tile">
            <form action="{{ route('salesupdate',[$edit->id]) }}" method="post">
              @csrf
              <div class="row">
                 <div class="col-lg-4">
                  <div class="form-group">
                    <label for="place_of_supply">Company</label>
                   <input type="text" name="comp_id" value="{{ $edit->job->Company->name }}" class="form-control" readonly="">
                     @error('comp_id')
                    <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                  </div>
                </div>
                  <div class="col-lg-4">
                   <div class="form-group">
                    <label for="e_commerce_gstin">E-commerce_gstin</label>
                    <input class="form-control" id="e_commerce_gstin" value="{{ $edit->job->gstin->gstin}}" name="e_commerce_gstin" type="text" placeholder="E-commerce_gstin" readonly>
                     @error('e_commerce_gstin')
                    <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                  </div>
                </div>
               <div class="col-lg-4">
                  <div class="form-group">
                    <label for="place_of_supply">Place of Supply</label>
                    <input class="form-control" id="place_of_supply" value="{{ $edit->job->place_of_supply }}" name="place_of_supply" type="text" placeholder="place of supply" readonly>
                     @error('place_of_supply')
                    <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                  </div>
                </div>
              </div>
            <div class="row">
               <div class="col-lg-4">
                  <div class="form-group">
                  <label for="client_id">Receiver Name</label>
                  <select name="client_id" class="form-control" id="client_id" style="display: none">
                  <option value="">--select--</option>
                   </select> 
                   <input class="form-control" id="client_old" name="client" value="{{ $edit->job->client->name }}" type="text" aria-describedby="emailHelp" placeholder="Enter GSTIN" readonly >
                   <input class="form-control" id="client_old_id" name="client_id" value="{{ $edit->job->client_id }}" type="hidden" aria-describedby="emailHelp" placeholder="Enter GSTIN" readonly >
                    @error('client_id')
                    <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                  </div>
                </div>
                <div class="col-lg-4">
                  <div class="form-group">
                    <label for="job_id">Work Name</label>
                   <select name="job_id"  name="" id="job_id" class="form-control" style="display: none">
                    <option value="">--select--</option>
                   </select>
                    <input class="form-control" id="job_id_old" name="job_" value="{{ $edit->job->job_describe }}" type="text" aria-describedby="emailHelp" placeholder="Enter GSTIN" readonly >
                    <input class="form-control" id="job_id_old_" name="job_id" value="{{ $edit->job->id }}" type="hidden" aria-describedby="emailHelp" placeholder="Enter GSTIN" readonly >
                    @error('job_id')
                    <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                  </div>
                </div>
                <div class="col-lg-4">
                  <div class="form-group">
                    <label for="gsstin_uin_of_recipient">GSTIN/UIN of Recipient</label>
                    <input class="form-control" id="gsstin_uin_of_recipient" name="gsstin_uin_of_recipient" value="{{ $edit->job->client->gstin }}" type="text" aria-describedby="emailHelp" placeholder="Enter GSTIN" readonly >
                     @error('gsstin_uin_of_recipient')
                    <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                  </div>
                </div>
              </div> 
               
              <div class="row">
              <div class="col-lg-4">
                  <div class="form-group">
                    <label for="invoive_number">Invoice No.</label>
                    <input class="form-control" id="invoive_number" name="invoive_number" type="text" aria-describedby="emailHelp" value="{{ $edit->invoive_number }}" placeholder="Invoice No." readonly="">
                     @error('invoive_number')
                    <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                  </div>
                </div>
                <div class="col-lg-4">
                  <div class="form-group">
                    <label for="sales_date">Invoice Date</label>
                   <input type="text" id="sales_date" class="form-control" name="sales_date" value="{{ $edit->sales_date }}" placeholder="sales date" autocomplete="off" readonly="">
                     @error('sales_date')
                    <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                  </div>
                </div>
                <div class="col-lg-4">
                   <div class="form-group">
                    <label for="invoice_type">Invoice Type</label>
                    <input class="form-control" id="invoice_type" type="text" aria-describedby="emailHelp" name="invoice_type" value="Regular" placeholder="Enter invoice type" readonly="">
                     @error('invoice_type')
                    <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                  </div>
                </div>
              </div> <div class="row">
              <div class="col-lg-4">
                    <div class="form-group">
                    <label for="base_amount_taxable_value">Base Amount(taxable)</label>
                    <input class="form-control amount pro" id="base_amount_taxable_value" type="text" aria-describedby="emailHelp" value="{{ $edit->base_amount_taxable_value }}" name="base_amount_taxable_value" placeholder="Base amount taxable value" readonly="">
                     @error('base_amount_taxable_value')
                    <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                  </div>
                </div>
                <div class="col-lg-4">
                   <div class="form-group">
                    <div class="row">
                    <div class="col-lg-6">
                    <label for="gst_rate">Gst Rate(%)</label>
                    <input class="form-control" id="gst_rate" value="{{ $edit->job->gst->tax_gst }}" name="gst_rate" type="text" placeholder="gst_rate" readonly>
                     @error('gst_rate')
                    <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                  </div>
                    <div class="col-lg-6">
                    <label for="gst_amount">Gst Amount</label>
                    <input class="form-control pro" id="gst_amount" type="text" aria-describedby="emailHelp" value="{{ $edit->gst_amount }}" name="gst_amount" placeholder="gst_amount" readonly="">
                     @error('gst_amount')
                    <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                  </div>
                  </div>
                  </div>
                </div>
                <div class="col-lg-4">
                  <div class="form-group">
                    <label for="gross_total_invoice_value">gross_total(Invoice value)</label>
                    <input class="form-control pro" id="gross_total_invoice_value" name="gross_total_invoice_value"  type="text" value="{{ $edit->gross_total_invoice_value}}" aria-describedby="emailHelp" placeholder="Enter gross total" readonly="">
                     @error('gross_total_invoice_value')
                    <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                  </div>
                </div>
              </div> 
              {{--  <div class="row" >
              <div class="col-lg-5">
                   <div class="form-group">
                    <label for="cheque_date">Cheque  Date</label>
                      <input type="text" id="" class="form-control cheque_date2" name="cheque_date" value="{{ old('cheque_date')}}" placeholder="cheque  date" autocomplete="off">
                     @error('cheque_date')
                    <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                  </div>
                </div>
                <div class="col-lg-4">
                   <div class="form-group">
                    <label for="cheque_received_amount">Cheque Amount</label>
                    <input class="form-control pro adamount" id="cheque_received_amount" name="cheque_received_amount" type="text" value="{{ old('cheque_received_amount')}}" aria-describedby="emailHelp" placeholder="cheque received amount">
                  
                     @error('cheque_received_amount')
                    <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
                </div>
                 <div class="col-lg-3 mt-4">
                <div id="Content">
                  <button type="button" name="add" id="add" class="btn btn-success">Add More</button>
                </div>
                </div>
              </div> --}}
              @php  $s_no= 1 @endphp
              @foreach($ckamt as $cmaot)
              <div class="row" id="{{ "row".$s_no }}">
              <div class="col-lg-5">
                   <div class="form-group">
                    <label for="cheque_date">Payment  Date</label>
                      <input type="text" id="" class="form-control cheque_date2" name="cheque_date_[]" value="{{ $cmaot->cheque_date }}" placeholder="cheque  date" autocomplete="off" readonly="">
                     @error('cheque_date')
                    <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                  </div>
                </div>
                <input type="hidden" name="ckamtid[]" value="{{ $cmaot->id }}" id="{{ 'bal_id'.$s_no}}">
                <input type="hidden" name="sale_id" value="{{ $cmaot->sale_id }}">
                <div class="col-lg-4">
                   <div class="form-group">
                    <label for="cheque_received_amount">Payment Amount</label>
                    <input class="form-control pro adamount" id="cheque_received_amount{{ $s_no }}" name="cheque_received_amount_[]" type="text" value="{{ $cmaot->cheque_amount }}" aria-describedby="emailHelp" placeholder="cheque received amount" readonly="">
                  
                     @error('cheque_received_amount')
                    <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
                </div>
              </div>
              @php $s_no++ @endphp
               @endforeach
              <div id="dynamic_field"></div>
              <div class="row">
               <div class="col-lg-4">
                    <label for="tds">TDS Rate(%)</label>
                    <input class="form-control" id="tds" value="{{ $edit->job->tds->tds_tax }}" name="tds" type="text" placeholder="tds" readonly>
                     @error('tds')
                    <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                  </div>
                <div class="col-lg-4">
                    <label for="tds_amount">Tds Amount</label>
                    <input class="form-control pro" id="tds_amount" type="text" aria-describedby="emailHelp" value="{{ $edit->tds_amount }}" name="tds_amount" placeholder="tds_amount" readonly="">
                     @error('tds_amount')
                    <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                  </div>
                    <div class="col-lg-4">
                    <label for="total_amount">Total Amount</label>
                    <input class="form-control total pro" id="total_amount" value="{{ $edit->total_amount }}" name="total_amount" type="number" placeholder="Amount " readonly="">
                     @error('total_amount')
                    <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                  </div>
              </div>
              {{-- <div class="row">
              <div class="col-lg-4">
                   <div class="form-group">
                    <label for="cheque_date">Cheque  Date</label>
                      <input type="text" id="cheque_date" class="form-control" name="cheque_date" value="{{ $edit->cheque_date }}" placeholder="cheque  date" autocomplete="off">
                     @error('cheque_date')
                    <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                  </div>
                </div>
                <div class="col-lg-4">
                   <div class="form-group">
                    <div class="row">
                      <div class="col-lg-6">
                    <label for="cheque_received_amount">Cheque Amount</label>
                    <input class="form-control pro" id="cheque_received_amount" name="cheque_received_amount" type="text" value="{{ $edit->cheque_received_amount }}" aria-describedby="emailHelp" placeholder="cheque received amount">
                  
                     @error('cheque_received_amount')
                    <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                  </div>
                  <div class="col-lg-6">
                    <label for="tds">TDS Rate</label>
                    <input class="form-control" id="tds" value="{{ $edit->job->tds->tds_tax }}" name="tds" type="text" placeholder="tds" readonly>
                     @error('tds')
                    <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                  </div>
                </div>
                </div>
                </div>
                <div class="col-lg-4">
                  <div class="form-group">
                    <div class="row">
                  <div class="col-lg-6">
                    <label for="tds_amount">Tds Amount</label>
                    <input class="form-control pro" id="tds_amount" type="text" aria-describedby="emailHelp" value="{{ $edit->tds_amount }}" name="tds_amount" placeholder="tds_amount" readonly="">
                     @error('tds_amount')
                    <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                  </div>
                  <div class="col-lg-6">
                    <label for="total_amount">Total Amount</label>
                    <input class="form-control total pro" id="total_amount" value="{{ $edit->total_amount }}" name="total_amount" type="number" placeholder="Amount " readonly="">
                     @error('total_amount')
                    <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                  </div>
                  </div>
                  </div>
                </div>
              </div> --}} <div class="row">
              <div class="col-lg-4">
                 <div class="form-group">
                    <label for="other">other charges(if any)</label>
                    <input class="form-control gross pro newpro" id="other" name="other"  type="number" aria-describedby="emailHelp" value="{{ $edit->other }}" placeholder="Enter other" readonly="">
                  </div>
                </div>
                <div class="col-lg-4">
                  <div class="form-group">
                    <label for="five_percrnt_sd">Security Deposite Rate(%)</label>
                    <input class="form-control" id="five_percrnt_sd" name="five_percrnt_sd" type="text" aria-describedby="emailHelp" value="{{ $edit->job->sd_percentage }}" placeholder="Fixed Deposite Rate" readonly>
                     @error('five_percrnt_sd')
                    <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                  </div>
                </div>
                <div class="col-lg-4">
                   <div class="form-group">
                    <label for="tds_amount">Security Deposite Amount</label>
                    <input class="form-control pro" id="five_percrnt_sd_amount" type="text" aria-describedby="emailHelp" value="{{ $edit->five_percrnt_sd_amount }}" name="five_percrnt_sd_amount" placeholder="sd amount cal" readonly="">
                  </div>
                </div>
              </div> <div class="row">
              <div class="col-lg-6">
                  <div class="form-group">
                    <label for="outstanding">Outstanding</label>
                    <input class="form-control pro" id="outstanding" name="outstanding" type="text" aria-describedby="emailHelp" value="{{ $edit->outstanding }}" placeholder="Enter Outstanding" readonly="">
                     @error('outstanding')
                    <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                  </div>
                </div>
                {{-- <div class="col-lg-3">
                  @if($edit->bill_img != '')
                  <img src="{{ Illuminate\Support\Facades\Storage::url($edit->bill_img) }}" style="height:80%;width:100%;">
                  @else
                  <img src="{{ Illuminate\Support\Facades\Storage::url('guarantee/download.png') }}" style="height:80px;width:100px;">
                  @endif
                </div> --}}
                <div class="col-lg-6">
                  <div class="form-group">
                    <label for="description">Description</label>
                     <textarea class="form-control" id="description"   name="description" rows="3" readonly="">{{ $edit->description }}</textarea>
                      @error('description')
                    <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                  </div>
                </div>
  
              </div>  
               <div class="row">
                <div class="col-lg-6">
                 {{--  @if($edit->bill_img != '') --}}
                 @php $array = ["pdf", "xls"];
                      $ext = ["jpg", "jpeg","png"]

                  @endphp 
                 @if (in_array(pathinfo($edit->bill_img, PATHINFO_EXTENSION), $array))
                 {{-- <button ><a href="{{ route('download-pdf',$edit->id) }}" class="btn btn-danger" >PDF</a></button> --}}
                  <embed src="{{ Illuminate\Support\Facades\Storage::url($edit->bill_img) }}" style="height:80px;width:100px;">
                  @elseif(in_array(pathinfo($edit->bill_img, PATHINFO_EXTENSION), $ext))
                  <img src="{{ Illuminate\Support\Facades\Storage::url($edit->bill_img) }}" style="height:80px;width:100px;">
                  @else
                  <img src="{{ Illuminate\Support\Facades\Storage::url('guarantee/download.png') }}" style="height:80px;width:100px;">
                  @endif
                </div>
                <div class="col-lg-6">
                </div>
              </div>
                <div class="tile-footer">
            </div>
              </div>
            </form>
        </div>
      </div>
    </main>
    <script>
$(document).ready(function(){
 $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
  });
 $("#comp_id").on('change',function(){
      var rec_id = $(this).val();

      $.ajax({
                 type: "GET",
                 url: "{{ route('assign-client') }}?id="+rec_id,
                 success: function(res){
                  if(res){
                    $("#client_id").empty();
                    $("#client_id").append('<option value="0">Select Receiver</option>');
                    $.each(res,function(index, recev){
                    $("#client_id").append('<option value='+recev.client['id']+'>'+recev.client['name']+'</option>');
              });
                  }
}

 });
 });
   var i= {{ $s_no }};
  $('#add').click(function(){
    // var osfinal = document.getElementById('outstanding'). value;
    // if(osfinal > 0){
    $('#dynamic_field').append('<div class="row" id="row'+i+'"><div class="col-lg-5"><div class="form-group"><label for="cheque_date">Cheque  Date</label><input type="text" id="cheque_date'+i+'" class="form-control cheque_date2" name="cheque_date_[]" value="" placeholder="cheque  date" autocomplete="off">@error('cheque_date')<span class="invalid-feedback d-block" role="alert"><strong>{{ $message }}</strong></span>@enderror</div></div><input type="hidden" name="ckamtid[]" value=""><div class="col-lg-4"><div class="form-group"><label for="cheque_received_amount">Cheque Amount</label><input class="form-control pro adamount" id="cheque_received_amount'+i+'" name="cheque_received_amount_[]" type="text" value="" aria-describedby="emailHelp" placeholder="cheque received amount">@error('cheque_received_amount')<span class="invalid-feedback d-block" role="alert"><strong>{{ $message }}</strong></span>@enderror</div></div><div class="col-lg-3 mt-4"><div><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></div>');
    i++;
 // }
  });
  $(document).on('click', '.btn_remove', function(){
    var button_id = $(this).attr("id");
   // alert(button_id);
      var gval = document.getElementById('cheque_received_amount'+button_id).value;
      var bal_id = $('#bal_id'+button_id).val();
      alert(bal_id);
       $.ajax({
                url: "{{  route('delete-add-row')}}",
                type: 'GET',
                // headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                data: {'id':bal_id},
                success: function (data) {
                console.log(data);
                 
                }
            })
    if(gval != ''){
    var retol = document.getElementById('total_amount').value;
    var toout = document.getElementById('outstanding').value;
    $("#total_amount").val(parseInt(retol)-parseInt(gval));
    $("#outstanding").val(parseInt(toout)+parseInt(gval));
    $('#row'+button_id+'').remove();
  }else{
    $('#row'+button_id+'').remove();
  }
  });
 $("#client_id").on('change',function(){
       
       var cl_id = $(this).val();
       var cmp_id = document.getElementById('comp_id').value;
      
      $.ajax({
                url: "{{  route('get-work')}}",
                type: 'GET',
                // headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                data: {'id':cl_id,'cid':cmp_id},
                success: function (data) {
                  // console.log(data);
                  $("#job_id").empty();
                  $("#job_id").append('<option value="0">Work Name</option>');
                    $.each(data,function(index, recev){
                    $("#job_id").append('<option value='+recev.id+'>'+recev.job_describe+'</option>');
              });
                 
                }
            })
       

 });

 $("#job_id").on("change",function(){
        $(".pro").val("");
           var id = $(this).val();
          $.ajax({
                 type: "GET",
                 url: "{{ route('get-receiver') }}?id="+id,
                 success: function(res){
                  //console.log(res);
                 if(res){
                        $("#gst_rate").empty();
                        $("#gst_rate").val(res.gst['tax_gst']);
                        $("#place_of_supply").empty();
                        $("#place_of_supply").val(res.place_of_supply);
                        $("#tds").empty();
                        $("#tds").val(res.tds['tds_tax']);
                        $("#gsstin_uin_of_recipient").empty();
                        $("#gsstin_uin_of_recipient").val(res.client['gstin']);
                        $("#workname").empty();
                        $("#workname").val(res.job_describe);
                        $("#five_percrnt_sd").empty();
                        $("#five_percrnt_sd").val(res.sd_percentage);
                        $("#e_commerce_gstin").empty(res.gstn);
                        $("#e_commerce_gstin").val(res.gstn['gstin']);
                      }
                      else{
                      $("#district").empty();
                      }
                    }
                      });

            
      });

     $("#base_amount_taxable_value").on('blur',function (){
        var gross  = gross_total();
       $("#gross_total_invoice_value").val("");
       $("#gross_total_invoice_value").val(gross[0]);
       $("#gst_amount").val("");
       $("#gst_amount").val(gross[1]);
       $("#tds_amount").val("");
       $("#total_amount").val("");
       $("#cheque_received_amount").val("");
       $("#outstanding").val("");
       $("#five_percrnt_sd_amount").val("");

     });

     $(document).on("blur",".adamount,.newpro", function(){
      var item_qty = 0;
      var finalout = document.getElementById('outstanding').value;
      if(finalout >= 0 ){
           $('.adamount').each(function() {
                    item_qty = item_qty + parseInt(($(this).val()));
                });
          var tds = document.getElementById('tds').value;
          var batv = document.getElementById('base_amount_taxable_value').value;
          //var cra = document.getElementById('cheque_received_amount').value;
          var fpsd = document.getElementById('five_percrnt_sd').value;
          var tdsam = (batv * tds)/100;
          var fivesd = (batv * fpsd)/100;
           // var rectotal = document.getElementById('outstanding').value;
            var rq_a = $("#other").val();
            if(rq_a == ''){
              var rq = 0;
            }else{
              var rq = rq_a;
            }
           
          // outst = parseFloat(cra)+parseFloat(tdsam)+parseFloat(fivesd);
          totaltds = parseFloat(item_qty)+parseFloat(tdsam);
          outst = parseFloat(totaltds)+parseFloat(fivesd);
          total = document.getElementById('gross_total_invoice_value').value;
          outs = (parseFloat(total)-(parseFloat(outst)+parseFloat(rq))).toFixed(2);
          //console.log(outs);
          if(outs >= 0){
          $("#outstanding").val("");
          $("#outstanding").val(outs);
          $("#tds_amount").val("");
          $("#tds_amount").val(tdsam);
          $("#five_percrnt_sd_amount").val("");
          $("#five_percrnt_sd_amount").val(fivesd);
          $("#total_amount").val("");
          $("#total_amount").val(totaltds);
          $(add).prop('disabled', false);
        }else{
             
          //$(add).prop('disabled', true);
          $('#'+$(this).attr('id')).val("");
        }
       }else{

        alert("outsatnding received");
       }

     });

     // $(document).on('click',".btn_remove",function(){
     //    var rid = $(this).attr('id');


     // });

     $(".gross").on("blur", function() {
        var gross  = gross_total();
        var outstand = outstanding();
        var other_charges = $(this).val();

        // $(".total_deduction").val();

        // $("#gross_total_invoice_value").val(gross[0]);
        // var ggross = document.getElementById('gross_total_invoice_value').value;
        // $("#outstanding").val(parseFloat(outstand[2])-parseFloat(other_charges));

    });

     // $(".newpro").on("blur", function(){
     //    var rectotal = document.getElementById('outstanding').value;

     //      $("#outstanding").val(parseFloat(rectotal)-parseFloat($(this).val()))

     // })

        function gross_total(){
           var gst = document.getElementById('gst_rate').value;
           var batv = document.getElementById('base_amount_taxable_value').value;
           var gstrate = (batv * gst)/100;
           var total = (parseFloat(batv) + parseFloat(gstrate)).toFixed(2);
           return [total,gstrate];
        }

        function outstanding(){
             var grosst = document.getElementById('gross_total_invoice_value').value;
        if(grosst != ""){
          var tds = document.getElementById('tds').value;
          var batv = document.getElementById('base_amount_taxable_value').value;
          //var cra = document.getElementById('cheque_received_amount').value;
          var fpsd = document.getElementById('five_percrnt_sd').value;
          var tdsam = (batv * tds)/100;
           var fivesd = (batv * fpsd)/100;
           //var tcar = (parseFloat(cra)+parseFloat(tdsam)).toFixed(2);
          // outst = parseFloat(cra)+parseFloat(tdsam)+parseFloat(fivesd);
           // outst = parseFloat(tcar)+parseFloat(fivesd);
           // total = document.getElementById('gross_total_invoice_value').value;
           // outs = (parseFloat(total)-parseFloat(outst)).toFixed(2);
           return [tdsam,fivesd];

        }
      }
     });
</script>
     
@endsection

