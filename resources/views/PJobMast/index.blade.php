@extends('layouts.master')
@section('content')

<main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-th-list"></i>Petty-Job List</h1>
          <p>All Sales Recoreded Tille Now</p>
        </div>
        {{-- text --}}
        <ul class="app-breadcrumb breadcrumb side">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item">salelist</li>
          <li class="breadcrumb-item active"><a href="{{ route('saleform') }}">Petty-Job-form</a></li>
        </ul>
      </div>
      <div class="row" style="margin-bottom: 15px">
      <div class="col-md-6">
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
     <div class="col-md-6">
        <div class="form-group">
        <label for="place_of_supply"><h5>Petty Contractor</h5></label>
       <select name="compid" class="form-control" id="rece_id">
          <option value="">select Company First</option>
        </select>
      </div>
      </div>
      </div>
      <div class="row" id="fikr">
        <div class="col-md-12">
             @if($message = Session::get('message'))
      <div class="alert alert-success">  {{$message}}
      </div>
      @endif 
          <div class="tile">
            <div class="tile-body">
              <div class="table-responsive" id="tableBody">
               @include('PJobMast.petty_search_table')
              </div>
            </div>
          </div>
        </div>
      </div>
      {{-- <div class="row" style="display: none" id="seif">
         @include('pages.sales_table')
      </div> --}}
      <div class="tile-footer">
                <a href="{{ route('PJobMast.create')}}"><button class="btn btn-primary">Add Job</button></a>
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
          if(rec_id != 'all'){
           $.ajax({
                 type: "GET",
                 url: "{{ route('get-petty-company') }}?id="+rec_id,
                 success: function(res){
                  if(res){
                    console.log(res);
                    // $("#fikr").hide();
                    // $("#seif").show();
                       $("#rece_id").empty();
                       $("#rece_id").append('<option value="">select petty Contractor</option>');
                    $.each(res,function(index, rece){
                        $("#rece_id").append('<option value='+rece.petty['id']+'>'+rece.petty['firm_name']+'</option>')
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
                 url: "{{ route('get-perrty-assign-work') }}",
                  data: {'id':rid,'cid':cmp_id},
                 success: function(result){
                  //console.log(result);
                  if(result){
                       $('#tableBody').empty().html(result);
                }
                      }

        });

        // $("#workname").on('change',function(){
          
        //   var wname = $(this).val();
        //   var cmp_id = document.getElementById('compid').value;

        //    $.ajax({

        //       type: "GET",
        //       url:"{{ route('get-sale-details') }}",
        //       data:{'id':wname,'cid':cmp_id},
        //       success: function(result){
        //         console.log(result);
        //             // $("#fikr").hide();
        //             // $("#seif").show();
        //             $('#tableBody').empty().html(result);
        //             // $('#seif').html($('#seif',result).html());
        //             // // $("#seif").append('<input type="text">');
        //       }
              

        //    })

        // });

      });
      });
    </script>

@endsection