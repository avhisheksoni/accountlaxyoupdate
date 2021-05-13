<div class="col-md-12">
             @if($message = Session::get('message'))
      <div class="alert alert-success">  {{$message}}
      </div>
      @endif 
          <div class="tile">
            <div class="tile-body">
              <div class="table-responsive">
                <table class="table table-hover table-bordered" id="sampleTable2">
                  <thead>
                    <tr>
                      <th>INVOICE No.</th>
{{--                       <th>Work_Name</th>
                      <th>Client</th> --}}
                      {{-- <th>GSTIN-Recipient</th> --}}
                      <th>Base Taxable value</th>
                      <th>Gst Amount</th>
                      <th>Gross Amount</th>
                     {{--  <th>Tds Amount</th> --}}
                      <th>Payment Date</th>
                      <th>Payment Received Amount</th>
                      <th>Total Deduction</th>
                      <th>Outstanding</th>
                      <th>Action_performance</th>
                    </tr>
                  </thead>
                  <tbody>
                    
                 <?php $s_no=1 ?>
                   @foreach($saleslist as $sale)
                    <tr>
                      <td>{{ $sale->invoive_number }}</td>
{{--                       <td>{{ $sale->job->job_describe }}</td>
                      <td>{{ $sale->job->client->name }}</td> --}}
                      {{-- <td>{{ $sale->job->client->gstin }}</td> --}}
                      <td>{{ $sale->base_amount_taxable_value }}</td>
                      <td>{{ $sale->gst_amount }}</td>
                      <td>{{ $sale->gross_total_invoice_value }}</td>
                     {{--  <td>{{ $sale->tds_amount }}</td> --}}
                      <td>{{ ($sale->cheque_date == '' ) ? '' : date('d-m-Y', strtotime($sale->cheque_date)) }}</td>
                      <td>{{ $sale->total_ck_rec }}</td>
                      <td>{{ $sale->total_deduct_amount }}</td>
                      <td>{{ $sale->outstanding }}</td>
                      <td><a href="{{ route('saledetails',[$sale->id])}}"><button class="btn btn-warning btn-sm"><i class="fa fa-lg fa-eye"></i></button></a>
                      <a href="{{ route('saleedit',[$sale->id])}}"><button class="btn btn-primary btn-sm"><i class="fa fa-lg fa-edit"></i></button></a>
                      @role(['acco_super_admin','acco_admin'])
                      <a href="{{ route('saledelete',[$sale->id])}}"><button class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')" ><i class="fa fa-lg fa-trash"></i></button></a></td>
                      @endrole
                    </tr>
                    <?php $s_no++ ?>
                    @endforeach
                  </tbody>
                  <tfoot>
                      <tr><th>Total</th>
                          <th>{{ $sum['bamount'] }}</th>
                          <th>{{ $sum['gst'] }}</th>
                          <th>{{ $sum['sum'] }}</th>
                          <th></th>
                          <th>{{  $sum['cra'] }}</th>
                          <th></th>
                          <th>{{ $sum['usd'] }}</th>
                          <th></th>
              
                      </tr>

                  </tfoot>
                </table>
              </div>
            </div>
          </div>
        </div>
  <script type="text/javascript">
      $(document).ready(function(){

      var table2 =  $('#sampleTable2').DataTable({
        dom: 'Bfrtip',
       buttons: [ { extend: 'copyHtml5', footer: true },
            { extend: 'excelHtml5', footer: true }]
    });
    table2.buttons().container()
        .appendTo( '#example_wrapper .col-md-6:eq(0)' );
        })
  </script>