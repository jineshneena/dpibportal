@extends('layouts.elite',['notificationCount'=>0 ] )


@section('content')
<div class="card open">
    <div class="card-body"> 
    <div class="panel-heading">
        

        <h1 class="card-title">{{$title}}<small></small></h1> 
    </div>
    
            <div class="table-responsive" style='width:100%;'>
                <table class="display nowrap table table-hover table-striped table-bordered dataTable dpib_endorsement_list" width='100%'>
                    <thead>
                        <tr>
                            <th style="width: 10%" class="nowrap">Endorsement number</th>                                                      
                            <th>Type</th>
                            <th style="width: 5%" class="nowrap">Issue date</th> 
                            <th  class="nowrap" >Inception date</th>                       
                            <th  class="nowrap" >Due date</th>
                            <th  class="nowrap" >Amount</th>
                            <th>Status</th>
                                                      
                        </tr>
                    </thead>
                    <tbody>
           
                   </tbody>
                </table>
            </div>
        
    </div>
</div>
@endsection

 @section('customcss')
  <link rel="stylesheet" type="text/css" href=" {{ asset('elitedesign/assets/node_modules/datatables.net-bs4/css/dataTables.bootstrap4.css') }} ">
    <link rel="stylesheet" type="text/css" href="{{ asset('elitedesign/assets/node_modules/datatables.net-bs4/css/responsive.dataTables.min.css') }}"> 
 
 @endsection

   @section('customscript')    		
<script src="{{ asset('elitedesign/assets/node_modules/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('elitedesign/assets/node_modules/datatables.net-bs4/js/dataTables.responsive.min.js') }}"></script>
 <script src="{{ asset('js/global/datatable/moment.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/global/datatable/datetime.js') }}" type="text/javascript"></script>
  @endsection
 		
@section('pagescript')     
<script>
    var columnDefs = [];
    var endorsementlistTable = '';
    var roleArray = @json(Auth::user()->roles);
    var deleteUser = {{Auth::user()->id}}
    
   $(function(){
    
        columnDefs.push({"name": 'enorsenumber',  "targets": 0, data: function (row, type, val, meta) {
                        
                            var urlString = '{!! route("overviewendorsement",["##EID"]) !!}';
                            var link = urlString.replace("##EID", row['id']);
                            var linkFlag = true; 
                        
                            var subject = "<a href='"+link+"'>"+ row['endorsement_number']+"</a>";

                          
                            row.sortData = row['endorsement_number'];
                            row.displayData = subject; 
                           
                            return row;
                        }, render: {"_": 'sortData', "display": 'displayData', 'filter': 'sortData'}}); 
        columnDefs.push({"name": "endorse_type",  "targets": 1, "orderable": false,data: function (row, type, val, meta) {
                            var subject = row['typeString'];
                            row.sortData = row['typeString'];
                            row.displayData = subject;
                           
                            
                            return row;
                        }, render: {"_": 'sortData', "display": 'displayData', 'filter': 'sortData'}});
                    
        columnDefs.push({"name": 'issueDate',  "targets": 2, "orderable": true, data: function (row, type, val, meta) {
                            var subject = moment(row['issue_date']).format('DD.MM.YYYY');                      
                            row.sortData = row['issue_date'];
                            row.displayData = subject;                           
                            
                            return row;
                        }, render: {"_": 'sortData', "display": 'displayData', 'filter': 'sortData'}}); 
                    
                      
                    
        columnDefs.push({"name": 'inception_date',  "targets": 3, "orderable": true, data: function (row, type, val, meta) {
                            var subject =  moment(row['start_date']).format('DD.MM.YYYY');
                            row.sortData = row['start_date'];
                            row.displayData = subject;                           
                            
                            return row;
                        }, render: {"_": 'sortData', "display": 'displayData', 'filter': 'sortData'}});
                    

        columnDefs.push({"name": 'due_date',  "targets": 4, "orderable": true, data: function (row, type, val, meta) {
                            var subject = (row['due_date'] !=null)? moment(row['due_date']).format('DD.MM.YYYY'):'-';
                            row.sortData = moment(row['due_date']).format('DD.MM.YYYY'); 
                            row.displayData = subject;                           
                            
                            return row;
                        }, render: {"_": 'sortData', "display": 'displayData', 'filter': 'sortData'}});   
                    
                    
                    
        columnDefs.push({"name": 'sum',  "targets": 5, data: function (row, type, val, meta) {
                        var totalAmount = row['amount']+row['vat_amount'];
                        row.sortData = totalAmount.toFixed(2);
                        row.displayData = totalAmount.toFixed(2) ;                         
                           
                            return row;
                        }, render: {"_": 'sortData', "display": 'displayData', 'filter': 'sortData'}});  
                    
        columnDefs.push({"name": 'sum',  "targets": 6, data: function (row, type, val, meta) {
                            var subject =  row['endstatusString'];
                            row.sortData = row['endorsement_status'];
                            row.displayData = subject;                                         
                           
                            return row;
                        }, render: {"_": 'sortData', "display": 'displayData', 'filter': 'sortData'}});   
                    
       
                    
                  
                    
        
       
      endorsementlistTable =   $('.dpib_endorsement_list').DataTable( {
                data: {!! $endorsementDetails !!},
                autoWidth: true,
                stateSave: false,
                stateDuration: 60 * 60 * 24,
                responsive: true,
                deferRender: true,
                lengthChange: true,
                pagination: true,
                rowLength: true,
                scrollX: true,
                pagingType: 'full_numbers',
                processing: true,
                serverSide: false,
                destroy: true,
                order: [[2, "desc"]],
                pageLength: 10,
                displayLength: 10,
                autoFill: false,
                search: false,
                columnDefs:columnDefs,
                language: {

                                paginate: {
                                    "first": '<i class="fa fa-angle-double-left"></i>',
                                    "last": '<i class="fa fa-angle-double-right"></i>',
                                    "next": '<i class="fa fa-angle-right"></i>',
                                    "previous": '<i class="fa fa-angle-left"></i>'
                                }
                            },
                dom: "Bfrtip"
     
    } ); 


    
    
       
   });



</script>
 @endsection