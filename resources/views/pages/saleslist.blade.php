@extends('layouts.master')
@section('content')

<main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-th-list"></i>Sales List</h1>
          <p>All Sales Recoreded Tille Now</p>
        </div>
        {{-- text --}}
        <ul class="app-breadcrumb breadcrumb side">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item">salelist</li>
          <li class="breadcrumb-item active"><a href="{{ route('saleform') }}">sale-form</a></li>
        </ul>
      </div>
        <form action="{{ route('export-sale-filter') }}" method="post">
          @csrf
      <div class="row" style="margin-bottom: 15px">
      <div class="col-md-4">
        <div class="form-group">
          @php
          $comp = App\Company_mast::all();
          @endphp
         <label for="place_of_supply"><h5>Company</h5></label>
        <select name="compid" class="form-control" id="compid">
          <option value="all">All</option>
          @foreach($comp as $com)
          <option value="{{ $com->id }}">{{ $com->name }}</option>
          @endforeach
        </select>
      </div>
      </div>
     <div class="col-md-4">
        <div class="form-group">
        <label for="place_of_supply"><h5>Receiver</h5></label>
       <select name="rece" class="form-control" id="rece_id">
          <option value="">select Company First</option>
        </select>
      </div>
      </div>
       <div class="col-md-4">
        <div class="form-group">
        <label for="place_of_supply"><h5>Work-Name</h5></label>
        <select name="job" id="workname" class="form-control">
          <option value="">select Receiver First</option>
        </select>
      </div>
      </div>
    <div class="mb-2">
              <button  class="btn btn-primary" id="export_filter">Export Excel</button>
            </div>
      </div>
    </form>
      <div class="row" id="fikr">
        <div class="col-md-12">
             @if($message = Session::get('message'))
      <div class="alert alert-success">  {{$message}}
      </div>
      @endif 
          <div class="tile">
            <div class="tile-body">
              <div class="table-responsive" id="tableBody">
               @include('pages.sales_table')
              </div>
            </div>
          </div>
        </div>
      </div>
      {{-- <div class="row" style="display: none" id="seif">
         @include('pages.sales_table')
      </div> --}}
    </main>

    <script type="text/javascript">
      $(document).ready(function(){
        $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
  });
        $("#compid").on("change",function(){
          var rec_id  = $(this).val();
          if(rec_id != 'all'){
           $.ajax({
                 type: "GET",
                 url: "{{ route('get-company-client') }}?id="+rec_id,
                 success: function(res){
                  if(res){
                    //console.log(res);
                    // $("#fikr").hide();
                    // $("#seif").show();
                       $("#rece_id").empty();
                       $("#rece_id").append('<option value="">select Receiver</option>');
                    $.each(res,function(index, rece){
                        $("#rece_id").append('<option value='+rece.client['id']+'>'+rece.client['name']+'</option>')
                    });
                    
                  }else{
                      $("#district").empty();

                  }
                }
                      });
          }else{
            location.reload();
          }
          
        });

        $("#rece_id").on('change',function(){

           var rid= $(this).val();
           var cmp_id= document.getElementById('compid').value;

           $.ajax({
                 type: "GET",
                 url: "{{ route('get-client-work') }}",
                  data: {'id':rid,'cid':cmp_id},
                 success: function(res){
                  //console.log(res);
                  if(res){
                       $("#workname").empty();
                       $("#workname").append('<option value="">select work</option>');
                    $.each(res,function(index, rece){
                        $("#workname").append('<option value='+rece.id+'>'+rece.job_describe+'</option>')
                    });
                    
                  }else{
                      $("#district").empty();

                  }
                }
                      });

        });

        $("#workname").on('change',function(){
          
          var wname = $(this).val();
          var cmp_id = document.getElementById('compid').value;

           $.ajax({

              type: "GET",
              url:"{{ route('get-sale-details') }}",
              data:{'id':wname,'cid':cmp_id},
              success: function(result){
                console.log(result);
                    // $("#fikr").hide();
                    // $("#seif").show();
                    $('#tableBody').empty().html(result);
                    $('#filter').show();
                    // $('#seif').html($('#seif',result).html());
                    // // $("#seif").append('<input type="text">');
              }
              

           })

        });

      });
    </script>


@endsection