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
                      <th>Job code</th>
                      <th>Work_Name</th>
                      <th>Receiver</th>
                      <th>GSTIN-Recipient</th>
                      <th>Base Taxable value</th>
                      <th>Gst Amount</th>
                      <th>Gross Amount</th>
                      <th> Paid Amount</th>
                      <th>Outstanding</th>
                      <th>Action_performance</th>
                    </tr>
                  </thead>
                  <tbody>
                    
                 <?php $s_no=1 ?>
                   @foreach($purchaselist as $sale)
                    <tr>
                     {{--  <td>{{ $sale->job->Pcompany->name }}</td> --}}
                      <td>{{ $sale->job->job_code }}</td>
                      <td>{{ $sale->job->name }}</td>
                      <td>{{ $sale->job->Pclient->firm_name }}</td>
                      <td>{{ $sale->job->Pclient->gst_number }}</td>
                      <td>{{ $sale->base_amount_taxable_value }}</td>
                      <td>{{ $sale->gst_amount }}</td>
                      <td>{{ $sale->gross_total_invoice_value }}</td>
                      <td>{{ $sale->total_ck_rec }}</td>
                      <td>{{ $sale->outstanding }}</td>
                      <td><a href="{{ route('purchasedetails',[$sale->id])}}"><button class="btn btn-warning"><i class="fa fa-lg fa-eye"></i></button></a>
                        @role(['acco_super_admin','acco_admin'])
                      <a href="{{ route('purchaseedit',[$sale->id])}}"><button class="btn btn-primary"><i class="fa fa-lg fa-edit"></i></button></a>
                      <a href="{{ route('purchasedelete',[$sale->id])}}"><button class="btn btn-danger" onclick="return confirm('Are you sure?')"><i class="fa fa-lg fa-trash"></i></button></a>
                      @endrole
                    </td>

                    </tr>
                    <?php $s_no++ ?>
                    @endforeach
                  </tbody>
                  <tfoot>
                    <tr><td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td><b>{{$data['bamt']}}</b></td>
                        <td><b>{{$data['gst']}}</b></td>
                        <td><b>{{$data['gross']}}</b></td>
                        <td><b>{{$data['cra']}}</b></td>
                        <td><b>{{$data['usd']}}</b></td>
                        <td></td>
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
        .appendTo( '#example_wrapper .col-md-6:eq(0)');
        })
  </script>