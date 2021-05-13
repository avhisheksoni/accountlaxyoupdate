<!-- Essential javascripts for application to work-->
    <script src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
    <!-- The javascript plugin to display page loading on top-->
    <script src="{{ asset('js/plugins/pace.min.js') }}"></script>
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script src="http://code.jquery.com/jquery-1.11.2.min.js"></script>
<link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.11.3/themes/smoothness/jquery-ui.css">
<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.11.3/jquery-ui.min.js"></script>
<script src="{{ asset('js/jquery.mtz.monthpicker.js') }}"></script>
    <!-- Page specific javascripts-->
    <script type="text/javascript" src="{{ asset('js/plugins/jquery.dataTables.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/plugins/dataTables.bootstrap.min.js') }}"></script>
   {{--  <script type="text/javascript">$('#sampleTable').DataTable();</script> --}}
    <script type="text/javascript" src="{{ asset('js/plugins/chart.js') }}"></script>
  <script type="text/javascript" src="js/plugins/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.2/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.bootstrap4.min.js"></script>
   
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
  
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.3.1/js/buttons.html5.min.js"></script>


    {{-- <script type="text/javascript" src="js/plugins/dataTables.bootstrap.min.js"></script> --}}
   {{--  <script type="text/javascript">
      $(document).ready(function(){
       var table =  $('#sampleTable').DataTable({
        dom: 'Bfrtip',
       buttons: [ 'pdf', 'excel']
    });
    table.buttons().container()
        .appendTo( '#example_wrapper .col-md-6:eq(0)' );
        })
  </script> --}}
  <script type="text/javascript">
      $(document).ready(function(){
       var table =  $('#sampleTable').DataTable({
        dom: 'Bfrtip',
       // buttons: [ { extend: 'copyHtml5', footer: true },
       //      { extend: 'excelHtml5', footer: true },
       //      // { extend: 'csvHtml5', footer: true },
       //      // { extend: 'pdfHtml5', footer: true }
       //      ]
    });
    //     var table2 =  $('#sampleTable2').DataTable({
    //     dom: 'Bfrtip',
    //    buttons: [ { extend: 'copyHtml5', footer: true },
    //         { extend: 'excelHtml5', footer: true }]
    // });
    table.buttons().container()
        .appendTo( '#example_wrapper .col-md-6:eq(0)' );
        })
  </script>
    <script>
$(document).ready(function(){
$("#shipping_address").on('change',function(){
  $("#shippingform").slideToggle(!this.checked);

});
});
</script>
    <script>
$('#demo-2').monthpicker({pattern: 'yyyy-mm', 
    selectedYear: 2020,
    startYear: 1900,
    finalYear: 2212,});
  var options = {
    selectedYear: 2015,
    startYear: 2008,
    finalYear: 2018,
    openOnFocus: false // Let's now use a button to show the widget
};
</script>
    {{-- <script type="text/javascript">
      var data = {
      	labels: ["January", "February", "March", "April", "May"],
      	datasets: [
      		{
      			label: "My First dataset",
      			fillColor: "rgba(220,220,220,0.2)",
      			strokeColor: "rgba(220,220,220,1)",
      			pointColor: "rgba(220,220,220,1)",
      			pointStrokeColor: "#fff",
      			pointHighlightFill: "#fff",
      			pointHighlightStroke: "rgba(220,220,220,1)",
      			data: [65, 59, 80, 81, 56]
      		},
      		{
      			label: "My Second dataset",
      			fillColor: "rgba(151,187,205,0.2)",
      			strokeColor: "rgba(151,187,205,1)",
      			pointColor: "rgba(151,187,205,1)",
      			pointStrokeColor: "#fff",
      			pointHighlightFill: "#fff",
      			pointHighlightStroke: "rgba(151,187,205,1)",
      			data: [28, 48, 40, 19, 86]
      		}
      	]
      };
      var pdata = [
      	{
      		value: 300,
      		color: "#46BFBD",
      		highlight: "#5AD3D1",
      		label: "Complete"
      	},
      	{
      		value: 50,
      		color:"#F7464A",
      		highlight: "#FF5A5E",
      		label: "In-Progress"
      	}
      ]
      
      var ctxl = $("#lineChartDemo").get(0).getContext("2d");
      var lineChart = new Chart(ctxl).Line(data);
      
      var ctxp = $("#pieChartDemo").get(0).getContext("2d");
      var pieChart = new Chart(ctxp).Pie(pdata);
    </script> --}}
    <!-- Google analytics script-->
    <script type="text/javascript">
      if(document.location.hostname == 'pratikborsadiya.in') {
      	(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      	(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      	m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      	})(window,document,'script','//www.google-analytics.com/analytics.js','ga');
      	ga('create', 'UA-72504830-1', 'auto');
      	ga('send', 'pageview');
      }
    </script>
     <script>
  $( function() {
     $('body').on('focus', '.cheque_date2', function(){
   $(this).datepicker({ maxDate: new Date() });
});
    $( "#cheque_date" ).datepicker({  maxDate: new Date() });
     $( ".cheque_date2" ).datepicker({  maxDate: new Date() });
    $( "#sales_date" ).datepicker({  maxDate: new Date() });
    $( "#purchase_date" ).datepicker({  maxDate: new Date() });
    // $( "#purchase_date" ).datepicker({ dateFormat: 'yy-mm-dd' });
    $( "#claim_date" ).datepicker({  maxDate: new Date() });
    $( "#bg_date" ).datepicker({  maxDate: new Date() });
    $( "#expiry_date" ).datepicker({  maxDate: new Date() });
    $( ".jobdate" ).datepicker({ dateFormat: 'yy-mm-dd' });
  } );
  </script>
   <script type="text/javascript">
      $(document).ready(function(){

      var table2 =  $('.sampleTable13').DataTable({
        dom: 'Bfrtip',
       buttons: [ { extend: 'copyHtml5', footer: true },
            { extend: 'excelHtml5', footer: true }]
    });
    table2.buttons().container()
        .appendTo( '#example_wrapper .col-md-6:eq(0)' );
        })
  </script>
  </body>
</html>