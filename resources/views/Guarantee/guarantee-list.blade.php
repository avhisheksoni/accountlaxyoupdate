@extends('layouts.master')
@section('content')



<main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-th-list"></i>Guarantee Request  List</h1>
          <p>All Record till Now</p>
        </div>
        <ul class="app-breadcrumb breadcrumb side">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item">Guarantee</li>
          <li class="breadcrumb-item active"><a href="">Guarantee-From</a></li>
        </ul>
      </div>
      {{-- <p><a class="btn btn-primary icon-btn" href="{{ route('fund-request') }}"><i class="fa fa-plus"></i>Add Fund Request</a></p> --}}
      <div class="row">
        <div class="col-md-12">
           @if($message = Session::get('message'))
      <div class="alert alert-success">  {{$message}}
      </div>
      @endif 
          <div class="tile">
            <div class="tile-body">
              <div class="table-responsive">
                <table class="table table-hover table-bordered sampleTable13" id="">
                  <thead>
                    <tr>
                      {{-- <th>S.no.</th> --}}
                     {{--  <th>Code</th> --}}
                      <th>Company</th>
                      <th>Beneficiary</th>
                      <th>Tender No.</th>
                      <th>Job/Work-Name</th>
                      <th>Value</th>
                      <th>Margin (%)</th>
                      <th>Margin Amount</th>
                      <th>BG_Date</th>
                      <th>Expiry Date</th>
                      <th>Claim Expiry Date</th>
                      <th>Issuer Bank</th>
                      <th>Bank Guarantee_No.</th>
                      <th>BG_Type</th>
                      <th>status</th>
                      <th>PurPose</th>
                      <th>Performance_Action</th>
                      <th>Temp-edit</th>
                    </tr>
                  </thead>
                  <tbody>
                    
                 <?php $s_no=1 ?>
                    @foreach( $gurt as $perm)
                    <tr>
                      {{--  <td>{{ $perm->company->name }}</td>
                       <td>{{ $perm->clientname->name }}</td>
                       <td>{{ $perm->tender_no }}</td>
                       <td>{{ $perm->job->job_describe }}</td>
                      <td>{{ $perm->bg_value }}</td>
                      <td>{{ date('d-m-Y', strtotime($perm->bg_date)) }}</td>
                      <td>{{ date('d-m-Y', strtotime($perm->expiry_date)) }}</td>
                      <td>{{ date('d-m-Y', strtotime($perm->claim_expiry_date)) }}</td>
                       @if($perm->bank_code != "")
                      <td>{{ $perm->bank->name }}</td>
                       @else
                       <td>{{ $perm->bank_code }}</td>
                       @endif
                      <td>{{ $perm->bg_no }}</td>
                       <td>{{ $perm->bgstatus->name }}</td> --}}
                        <td>{{ $perm->company_imp }}</td>
                       <td>{{ $perm->beneficiary_imp }}</td>
                       <td>{{ $perm->tender_no_imp }}</td>
                       <td>{{ $perm->Job_Work_Name_imp  }}</td>
                      <td>{{ $perm->bg_value }}</td>
                      <td>{{ $perm->margrin_percentage }}</td>
                      <td>{{ $perm->margin_amount }}</td>
                      <td>{{ date('d-m-Y', strtotime($perm->bg_date)) }}</td>
                      <td>{{ date('d-m-Y', strtotime($perm->expiry_date)) }}</td>
                      <td>{{ date('d-m-Y', strtotime($perm->claim_expiry_date)) }}</td>
                     {{--   @if($perm->bank_code != "") --}}
                      <td>{{ $perm->issuer_bank_imp }}</td>
                      {{--  @else
                       <td>{{ $perm->bank_code }}</td>
                       @endif --}}
                      <td>{{ $perm->bg_no }}</td>
                      <td>{{ $perm->bg_type_imp }}</td>
                       <td>{{ $perm->status_imp }}</td>
                       <td>{{ $perm->purpose_bg_missing }}</td>
                      <td>
                        <a href="{{ route('guarantee-details',[$perm->id]) }}"><button class="btn btn-warning btn-sm"><i class="fa fa-lg fa-eye"></i></button></a>
                      <a href="{{ route('guarantee-request-edit',[$perm->id]) }}"><button class="btn btn-success btn-sm"><i class="fa fa-lg fa-edit"></i></button></a>
                        <a href="{{ route('guarantee-request-delete',[$perm->id])}}"><button class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')"><i class="fa fa-lg fa-trash"></i></button></a>
                      </td>
                      <td>
                        <a href="{{ route('guarantee-temp-edit',[$perm->id]) }}"><button class="btn btn-info btn-sm"><i class="fa fa-lg fa-edit"></i></button></a>
                      </td>
                    </tr>
                    <?php $s_no++ ?>
                    @endforeach
                     <h5 class="text-info">Total BG value:{{ $sum }}</h5>
                  </tbody>
                </table>
                {{-- {{ $gurt->links() }} --}}

              </div>
            </div>
          </div>
          {{-- @role('acco_super_admin') --}}
             <div class="tile-footer">
              <button class="btn btn-primary" type="submit" data-toggle="modal" data-target="#myModal">ADD New BG</button>
            </div>
          {{-- @endrole --}}
        </div>
      </div>
      <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Guarantee Request</h4>
        </div>
        <div class="modal-body">
          <p>Add Guarantee Request</p>
           <div class="tile-body">
              <form action="{{ route('guarantee-add') }}" method="post">
                  @csrf
                  <div class="form-group row">
                  <label class="control-label col-md-3">Company</label>
                  <div class="col-md-8">
                    @php
                    $comp = App\Company_mast::all();
                    @endphp
                   <select class="form-control" type="text" name="comp_id" placeholder="Enter user name" id="comp_id">
                    @foreach($comp as $cmp)
                    <option value="{{ $cmp->id }}">{{ $cmp->name }}</option>
                    @endforeach  
                    </select>
                     @error('name')
                    <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                  </div>
                </div>
                  <div class="form-group row">
                  <label class="control-label col-md-3">Beneficiary</label>
                  <div class="col-md-8">
                   <select class="form-control" type="text" name="beneficiary_id" id="beneficiary_id">
                    </select>
                     @error('name')
                    <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                  </div>
                </div>
                <div class="form-group row">
                  <label class="control-label col-md-3">BG-code</label>
                  <div class="col-md-8">
                   <select name="bg_code" id="jobname" class="form-control" > 
                   <option value="">Choose</option>
                   </select>
                     @error('name')
                    <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                  </div>
                </div>
            {{--     <input type="text" name="job_name" value="" id="jobonna"> --}}
                 <div class="form-group row">
                  <label class="control-label col-md-3">Job/Work-Name</label>
                  <div class="col-md-8">
                  <input type="hidden" name="job_code" value="" id="bgcode" class="form-control" readonly="">
                  <input type="text" name="job_name" value="" id="bgname" class="form-control" readonly="">
                     @error('name')
                    <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                  </div>
                </div>
                <div class="modal-footer">
          <input type="submit" class="btn btn-primary" value="Add Details">
        </div>
              </form>
            </div>
        </div>
        
      </div>
      
    </div>
  </div>
          <div class="col-md-4" style="border-left: 1px solid">
              <div class="container">
                <form action="{{ 'import_gurantee_detail'}}" method="post" enctype="multipart/form-data">
                  @csrf
                  <h2 class="text-center mt-3">Excel Import</h2><br><br>
                  <input type="file" name="excel_data" id="imgupload" style="display:none">
                  <img src="https://icons.iconarchive.com/icons/dakirby309/simply-styled/256/Microsoft-Excel-2013-icon.png" id="OpenImgUpload"><br>
                  <span class="text-muted">
                    <a class="float-right" href="{{ route('gua_sheet_for') }}" title="Excel Download">Click Here to download sheet format</a>
                  </span>
                  <br><br>
                  <button type="submit" class="btn btn-info">Import</button>
                </form>
              </div>
            </div>
    </main>
<script>
  $(document).ready(function(){

    $("#comp_id").on('click',function(){
       
        var cmpid = $(this).val();
        $.ajax({
                 type: "GET",
                 url: "{{ route('get-cmpg') }}?id="+cmpid,
                 success: function(res){
                  //console.log(res);
                   $("#beneficiary_id").empty();
                    $("#beneficiary_id").append('<option value="0">Select Beneficiary</option>');
                    $.each(res,function(index, recev){
                    $("#beneficiary_id").append('<option value='+recev.id+'>'+recev.name+'</option>');
                  }); 
                    }
                      });
//$jobs->beneficiary->name
    })

    $("#beneficiary_id").on('click',function(){
       
       var id=$(this).val();
       alert(id);
        $.ajax({
                 type: "GET",
                 url: "{{ route('get-bg-code') }}?id="+id,
                 success: function(res){
                 if(res){
               console.log(res);
               $("#jobname").empty();
                    $("#jobname").append('<option value="0">Select Job/Work-Name</option>');
                    $.each(res,function(index, recev){
                    $("#jobname").append('<option value='+recev.request_code+'>'+recev.request_code+'</option>');
                  }); 
                    
                      }
                      else{
                      $("#district").empty();
                      }
                    }
                      });

    })
    $("#jobname").on('click',function(){

       var cid = $(this).val();
       //alert(cid);
        $.ajax({
                 type: "GET",
                 url: "{{ route('get-bg-show') }}?id="+cid,
                 success: function(res){
                  if(res){
                 console.log(res);
               $("#bgcode").empty();
               $("#bgcode").val(res.id);
               $("#bgname").attr('disable','disable');
               $("#bgname").val(res.job_describe);
                      }
                      else{
                      $("#district").empty();
                      }
                    }
                      });
    })
  });
</script>

<script type="text/javascript">
  $('#OpenImgUpload').click(function(){ $('#imgupload').trigger('click'); });
</script>
@endsection