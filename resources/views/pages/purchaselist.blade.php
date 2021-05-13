@extends('layouts.master')
@section('content')

<main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-th-list"></i>Purchase List</h1>
          <p>All Sales Recoreded Tille Now</p>
        </div>
        {{-- text --}}
        <ul class="app-breadcrumb breadcrumb side">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item">Purchaselist</li>
          <li class="breadcrumb-item active"><a href="{{ route('purchaseform') }}">Purchase-form</a></li>
        </ul>
      </div>
      <div class="row" style="margin-bottom: 15px">
         {{-- <div class="col-md-1">
        <div class="form-group">
       <a href="{{ route('purchaselist')}}"><button class="btn btn-success btn-lg">All</button></a>
      </div>
      </div> --}}
      <div class="col-md-4">
        <div class="form-group">
          @php
          $comp = App\Company_mast::all();
          @endphp
         <label for="place_of_supply"><h5>Receiver</h5></label>
        <select name="compid" class="form-control" id="compid">
          <option value="all">ALL</option>
          @foreach($comp as $com)
          <option value="{{ $com->id }}">{{ $com->name }}</option>
          @endforeach
        </select>
      </div>
      </div>
     <div class="col-md-4">
        <div class="form-group">
        <label for="place_of_supply"><h5>Company</h5></label>
        <select name="client_id" class="form-control" id="client_id">
          <option value="">choose Receiver First</option>
        </select>
      </div>
      </div>
     <div class="col-md-4">
        <div class="form-group">
        <label for="place_of_supply"><h5>Work-Name</h5></label>
        <select name="work" id="workid" class="form-control">
          <option value="">choose Company first</option>
        </select>
      </div> 
      </div>
      {{--  <div class="col-md-1 mt-4">
        <div class="form-group">
       <a href="{{ route('purchaselist')}}"><button class="btn btn-success">All</button></a>
      </div>
      </div> --}}
      </div>
      <div class="row">
        <div class="col-md-12">
             @if($message = Session::get('message'))
      <div class="alert alert-success">  {{$message}}
      </div>
      @endif 
          <div class="tile">
            <div class="tile-body">
              <div class="table-responsive" id="tableBody">
                @include('pages.purchase_table')
              </div>
            </div>
          </div>
        </div>
      </div>
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
          // alert(rec_id);
          if(rec_id != 'all'){
           $.ajax({
                 type: "GET",
                 url: "{{ route('get-receiver-company') }}?id="+rec_id,
                 success: function(result){
                    console.log(result);
                    $('#client_id').empty();
                    $('#client_id').append('<option value="">select Company</option>');
                    $.each(result,function(index,rece){
                      $('#client_id').append('<option value='+rece.petty['id']+'>'+rece.petty['firm_name']+'</option>');

                    });
              
                }
                      });
          }else{

           location.reload();
          }
          
        });

        $("#client_id").on("change",function(){
          var cnid = $(this).val();
          var cid = document.getElementById('compid').value;
          $.ajax({
               type: "GET",
               url: "{{ route('get-company-work') }}",
               data:{ 'id':cnid ,'cid':cid},
                 
                 success :function(result){
                  
                  $("#workid").empty();
                  $("#workid").append('<option value="">select work Name</option>');
                  $.each(result,function(index,rece){
                    $("#workid").append('<option value='+rece.id+'>'+rece.name+'</option>')

                  })
                 }

          })


        });

        $("#workid").on("change",function(){
            var wid= $(this).val();
            var cid = document.getElementById('compid').value;

            $.ajax({
                    
                  type: "GET",
                  url: "{{ route('get-work-details')}}",
                  data:{'id':wid,'cid':cid},

                  success: function(result){

                   $("#tableBody").empty().html(result);
                  }  

            });
            
        });


      });
    </script>
@endsection