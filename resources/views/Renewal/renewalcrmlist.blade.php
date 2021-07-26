@extends('layouts.elite',['notificationCount'=>$notificationCount ] )

@section('content')

<div class="panel panel-default open card row">
    <div class="panel-heading card-body">

        <ul class="panel-actions list-inline pull-right dib_head">

            <li>
                <a class="dpib_client_request_add">
                   <span class="icon-add fas fa-plus large-size" data-toggle="tooltip" title="add request"></span>
                </a>
            </li>

                            </ul>
                            <h1 class="panel-title" ><small>Renewal Requests</small></h1>
    </div>
                            <div class="panel-body"> 
            <div class="auto-scroll table-responsive" style='width:100%;'>
                
        
                <table class="table table-bordered table-striped dpib_quote_request_list color-table info-table">
                    <thead>
                        <tr>
                            <th style="width: 15%" class="nowrap">Request id</th>
                            <th style="width: 15%" class="nowrap">Customer name</th>
                            <th  class="nowrap" style="width: 10%">Type</th>
                            <th  class="nowrap" style="width: 15%">LOB</th>
                            <th  class="nowrap" style="width: 15%">Policy</th>
                            <th  class="nowrap" style="width: 15%">Assign to</th>
                            
                            <th  class="nowrap" style="width: 10%">Status</th>
                            <th  class="nowrap" style="width: 10%">Created at</th>
                            <th  class="nowrap" style="width: 15%">Last modified at</th> 
                            @if (in_array('ROLE_OPERATION_MANAGER', Auth::user()->roles) || in_array('ROLE_OPERATION_LEAD', Auth::user()->roles))   
                            <th  class="nowrap" style="width: 15%">Actions</th>
                            @endif
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
    var quoterequestTable = '';


      var roleArray = @json(Auth::user()->roles);     
      var keyobj = _.keys(@json($monthlyPremium));     
     var dataobj = _.values(@json($monthlyPremium));
   $(function(){
    
        columnDefs.push({"name": 'requetid',  "targets": 0, data: function (row, type, val, meta) {
                
                            var urlString = '{!! route("crmrequestOverview",["##RID"]) !!}';
                            var link = urlString.replace("##RID", row['mainId']);
                            var linkFlag = true;                            
                             
                    
                            var subject = (linkFlag) ?  "<a class='dp_quote_request_overview' openUrl='"+link+"' href='"+link+"'>"+row['crm_request_id']+"</a>" : row['crm_request_id'];
                            row.sortData = row['crm_request_id'];
                            row.displayData = subject; 
                           
                            return row;
                        }, render: {"_": 'sortData', "display": 'displayData', 'filter': 'sortData'}}); 
        columnDefs.push({"name": "customername",  "targets": 1, "orderable": true,data: function (row, type, val, meta) {
                            var subject = row['customerName'];
                            row.sortData = row['customerName'];
                            row.displayData = subject;
                           
                            
                            return row;
                        }, render: {"_": 'sortData', "display": 'displayData', 'filter': 'sortData'}});
                    
        columnDefs.push({"name": 'type',  "targets": 2, "orderable": true, data: function (row, type, val, meta) {
                            var subject = 'Request';
                            if(row['type']==0) {
                                subject = 'Task';
                            } else if(row['type']==1) {
                                subject = 'Request';
                            } else {
                                subject = "<span class='capital-first font-bold text-danger'>Renewal</span>";
                            }
                            
                            row.sortData = row['type'];
                            row.displayData = subject;                           
                            
                            return row;
                        }, render: {"_": 'sortData', "display": 'displayData', 'filter': 'sortData'}});  
        columnDefs.push({"name": 'Description',  "targets": 3, "orderable": false, data: function (row, type, val, meta) {
                            var subject = row['lineofbusinesstitle'];
                            row.sortData = row['lineofbusinesstitle'];
                            row.displayData = subject;                           
                            
                            return row;
                        }, render: {"_": 'sortData', "display": 'displayData', 'filter': 'sortData'}});
                    
        columnDefs.push({"name": 'policy',  "targets": 4, "orderable": false, data: function (row, type, val, meta) {
                            var urlString = '{!! route("policyoverview",["##PID"]) !!}';
                            var link = urlString.replace("##PID", row['policyId']);
                             var subject =   (row['policy_number'] !==null) ? "<a href='"+link+"'>"+ row['policy_number']+"</a>": '-';
                            row.sortData = row['policy_id'];
                            row.displayData = subject;                           
                            
                            return row;
                        }, render: {"_": 'sortData', "display": 'displayData', 'filter': 'sortData'}});             
                    
     columnDefs.push({"name": 'Assign',  "targets": 5, "orderable": true, data: function (row, type, val, meta) {
                            var subject = row['assigned'];
                            row.sortData = row['assigned'];
                            row.displayData = subject;                           
                            
                            return row;
                        }, render: {"_": 'sortData', "display": 'displayData', 'filter': 'sortData'}});

                    
        columnDefs.push({"name": 'status',  "targets": 6, data: function (row, type, val, meta) {
                            var newclass = getStatusColor(row['status']);
                             var subject = "<span class='capital-first font-bold "+newclass+"'>"+row['statusString']+"</span>";
                             row.sortData = row['statusString'];
                            if((($.inArray( "ROLE_SALES_MANAGER", roleArray ) > -1) || ($.inArray( "ROLE_SALES", roleArray ) > -1)) &&  ($.inArray( row['status'], [2,5,6] ) > -1) ) {
                               row.sortData = "Pending with technical department";
                              subject ="<span class='capital-first font-bold'>Pending with technical department</span>";   
                            }
                            
                            
                            row.displayData = subject;
                            
                            return row;
                        }, render: {"_": 'sortData', "display": 'displayData', 'filter': 'sortData'}});
                    
        columnDefs.push({"name": 'createdat',  "targets": 7,"type":"date", "orderable": true, data: function (row, type, val, meta) {
                            var subject = (row['created_date'] !=null)?  moment(row['created_date']).format('DD.MM.YYYY HH:mm') :'';
                            row.sortData = (row['created_date'] !=null)? moment(row['created_date']).format('DD.MM.YYYY HH:mm') :'';
                            row.displayData = subject;
                            return row;
                        }, render: {"_": 'sortData', "display": 'displayData', 'filter': 'sortData'}});
                    
        columnDefs.push({"name": 'updatedat',  "targets": 8,"type":"date", "orderable": true, data: function (row, type, val, meta) {
                            var subject = (row['updated_date'] !=null)? $.format.date( row['updated_date'], "dd.MM.yyyy HH:mm"):'';
                            row.sortData = (row['updated_date'] !=null)? $.format.date( row['updated_date'], "dd.MM.yyyy HH:mm"):'';
                            
                            row.displayData = subject;
                            
                            return row;
                        }, render: {"_": 'sortData', "display": 'displayData', 'filter': 'sortData'}}); 
                        
           @if (in_array('ROLE_OPERATION_MANAGER', Auth::user()->roles) || in_array('ROLE_OPERATION_LEAD', Auth::user()->roles))          
            columnDefs.push({"name": 'actions',  "targets": 9, "orderable": false, data: function (row, type, val, meta) {
                                                                
                            var linkString = '<a class="dpib_crm_request_delete dib-cursor-style" return-url="{!! route("salescrmlist") !!}" delete_url="{!! route("removecrmrequest",["##CID","##CRMID"]) !!}"><span class="fas fa-archive dib-delete-icon" data-toggle="tooltip" title="" data-original-title="Delete CRM request"></span></a>';
                            var link = linkString.replace("##CID", row['customerId']).replace("##CRMID",row['mainId'] );
                             row.displayData = link
                            return row;
                        }, render: {"_": 'sortData', "display": 'displayData', 'filter': 'sortData'}});       
           @endif        
        
       
      quoterequestTable =   $('.dpib_quote_request_list').DataTable( {
                data: {!! $requestData !!},
                autoWidth: true,
                stateSave: false,
                stateDuration: 60 * 60 * 24,
                responsive: true,
                deferRender: true,
                lengthChange: true,
                pagination: true,
                rowLength: true,
                scrollX: true,
                pagingType: 'simple_numbers',
                processing: false,
                serverSide: false,
                destroy: true,
                order: [[7, "asc"]],
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
    

    
    
   
    
    
     //DELETE REQUEST
      $(document).off('click','.dpib_crm_request_delete');
        $(document).on('click','.dpib_crm_request_delete',function() {
         
        var deleteUrl = $(this).attr('delete_url');
        var returnUrl = $(this).attr('return-url');
        
        $("#db_crm_endorsement_request_deletepopup").remove();
                $('body').append('<div id="db_crm_endorsement_request_deletepopup" title="Remove crm request" style="display:none" > Do you really want to remove CRM request ?</div>');
                var dialogElement = $("#db_crm_endorsement_request_deletepopup");
                dialogElement.dialog({
                    width: 900,
                    resizable: false,
                    bgiframe: true,
                    modal: true,
                    buttons: {
                        "Delete": {
                            class: "btn waves-effect waves-light btn-rounded btn-success",
                            text:'Delete',
                            click: function () {
                                DIB.progressDialog(LOCALE.get('dib.common.progress.loading'));
                                 $.ajax({
                                 url: deleteUrl,
                               type: "GET"

                               }).done(function (data) {
                                   if(data.status) {
                                     location.replace(returnUrl);
                                   }
                                       
                                  })
                               
                            }
                        },
                        "cancel": {
                            class: "btn waves-effect waves-light btn-rounded btn-danger",
                             text:'Cancel',
                            click: function () {
                                dialogElement.dialog('close');
                                dialogElement.remove();
                            }
                        }
                    }
                }); 
                    DIB.centerDialog(); 
    }); 
    
    //CLEAR FILTER
 $(document).on('click','#mg_clear_filter',function(){
   window.location.href = "{!! route('renewalrequestlist')  !!}";
    
})

   });
   function getStatusColor(status) {
    var newclass='';
        switch(status){
        case 0:
            newclass='text-primary';
            break;
        case 1:
            newclass='text-primary';
            
            break;
        case 2:
            newclass='text-warning';
          
            break;
        case 3:
              newclass='text-success';
            
            break;
        case 4:
            newclass='text-success';
            
            break;
        case 5:
            newclass='text-info';
            break;
        case 6:
            newclass='text-dark';
            break;
        case 7:
            newclass='text-cyan';
            break;
        case 8:
            newclass='text-warning';
            break;
        case 9:
            newclass='text-purple';
            break;
        case 10:
            newclass='text-danger';
            break;            
        
    }
    
    return newclass;
   
   }


</script>


@endsection