
<div class="card open">
    <div class="card-body"> 
    <div class="panel-heading">
    
        <h1 class="card-title col-3">Endorsement<small></small></h1>
    </div>
    
            <div class="table-responsive" style='width:100%;'>
                <table class="display nowrap table table-hover table-striped table-bordered dataTable dpib_endorsement_list" width='100%'>
                    <thead>
                        <tr>
                            <th style="width: 10%" class="nowrap">Endorsement number</th>                                                      
                            <th>Type</th>
                            <th style="width: 5%" class="nowrap">Issue date</th> 
                            <th  class="nowrap" >Inception date</th>
                            <th  class="nowrap" >Expiry date</th>
                            <th  class="nowrap" >Due date</th>
                            <th  class="nowrap" >Amount</th>
                            
                        </tr>
                    </thead>
                    <tbody>
           
                   </tbody>
                </table>
            </div>
        
    </div>
</div>

<script src="<?php echo e(asset('js/global/datatable/moment.min.js')); ?>" type="text/javascript"></script>
<script src="<?php echo e(asset('js/global/datatable/datetime.js')); ?>" type="text/javascript"></script>
 		

       
<script>
    var columnDefs = [];
    var endorsementlistTable = '';
    var roleArray = <?php echo json_encode(Auth::user()->roles, 15, 512) ?>;
    var deleteUser = <?php echo e(Auth::user()->id); ?>

    
   $(function(){
    
        columnDefs.push({"name": 'enorsenumber',  "targets": 0, data: function (row, type, val, meta) {
                        
                            var urlString = '<?php echo route("overviewendorsement",["##EID"]); ?>';
                            var link = urlString.replace("##EID", row['id']);
                            var linkFlag = true; 
                        
                            var subject =  row['endorsement_number'];

                          
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
                            var subject =row['formatted_issueDate'] ;                            
                            row.sortData = row['issue_date'];
                            row.displayData = subject;                           
                            
                            return row;
                        }, render: {"_": 'sortData', "display": 'displayData', 'filter': 'sortData'}}); 
                    
                      
                    
        columnDefs.push({"name": 'inception_date',  "targets": 3, "orderable": true, data: function (row, type, val, meta) {
                            var subject =  row['formatted_startDate'];
                            row.sortData = row['start_date'];
                            row.displayData = subject;                           
                            
                            return row;
                        }, render: {"_": 'sortData', "display": 'displayData', 'filter': 'sortData'}});
                    
        columnDefs.push({"name": 'expiry_date',  "targets": 4, "orderable": true, data: function (row, type, val, meta) {
                            var subject = (row['expiryDate'] !=null)? moment(row['expiryDate']).format('DD.MM.YYYY'):moment(row['expiryDate']).format('DD.MM.YYYY'); 
                            row.sortData = (row['expiryDate'] !=null)? moment(row['expiryDate']).format('DD.MM.YYYY'):moment(row['expiryDate']).format('DD.MM.YYYY');
                            row.displayData = subject;                           
                            
                            return row;
                        }, render: {"_": 'sortData', "display": 'displayData', 'filter': 'sortData'}});
         columnDefs.push({"name": 'due_date',  "targets": 5, "orderable": true, data: function (row, type, val, meta) {
                            var subject = (row['due_date'] !=null)? moment(row['due_date']).format('DD.MM.YYYY'):'-';
                            row.sortData = moment(row['due_date']).format('DD.MM.YYYY'); 
                            row.displayData = subject;                           
                            
                            return row;
                        }, render: {"_": 'sortData', "display": 'displayData', 'filter': 'sortData'}});   
                    
                    
                    
        columnDefs.push({"name": 'sum',  "targets": 6, data: function (row, type, val, meta) {
                        var totalAmount = row['amount']+row['vat_amount'];
                        row.sortData = totalAmount.toFixed(2);
                        row.displayData = totalAmount.toFixed(2) ;                         
                           
                            return row;
                        }, render: {"_": 'sortData', "display": 'displayData', 'filter': 'sortData'}});  
                    
                  

                    
                  
                    
        
       
      endorsementlistTable =   $('.dpib_endorsement_list').DataTable( {
                data: <?php echo $endorsementDetails; ?>,
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
    $(document).off('click','.dpib_endorsement_add');
    $(document).on('click','.dpib_endorsement_add',function(){    
   
            $.ajax({
                    url: $(this).attr('data-url'),
                    type: "GET"

            }).done(function (data) {
                $("#db_quote_request_editpopup").remove();
                $('body').append('<div id="db_quote_request_editpopup" title="Add endorsement" style="display:none" >' + data.content + '</div>');
                var dialogElement = $("#db_quote_request_editpopup");

                dialogElement.dialog({
                    width: 900,
                   
                    modal: true,
                    buttons: {
                        "Save": {
                           class: "btn waves-effect waves-light btn-rounded btn-success",
                            text:"Save",
                            click: function () {
                                DIB.progressDialog(LOCALE.get('dib.common.progress.loading'));

                           
                                var isValid = true;
                                var errorMessage = "";
                                var i=0;
                                $("form#form_endorsement_save .required:visible").each(function(){                
                            if($(this).val()=='') {                                                                                            isValid = false; 
                                                                                                  
                                                                                                    $(this).parent('.form-group').addClass('error');
                                                                                                   if( i==0 ) {
                                                                                                    errorMessage+="<b>The following errors occurred while validating data:"+"</b><br/>";
                                                                                                    i++;
                                                                                                   }
                                                                                                   errorMessage+="<b>"+ $(this).attr('error-message')+"</b><br/>"

                                                                                                } else {
                                                                                                   $(this).removeClass('error'); 
                                                                                                }
                                                                                               });


                                                                                           if(isValid) {
                                                                                                   $("form#form_endorsement_save").submit();
                                                                                           } else {
                                                                                             DIB.alert(errorMessage,'Error!!!!'); 
                                                                                             
                                                                                           }

                            }
                        },
                        "cancel": {
                            class: "btn waves-effect waves-light btn-rounded btn-danger"
                            text:"Cancel",
                            click: function () {
                                dialogElement.dialog('close');
                                dialogElement.remove();
                            }
                        }
                    },
                    open: function (event, ui) {
                        FORM.setDatePicker('.datefield');
                    }
                });               

            
DIB.centerDialog();
            });
          
    })
    
    
     $(document).off('click','.dpib_endorsement_edit');
    $(document).on('click','.dpib_endorsement_edit',function(){    
     var urlString = '<?php echo route("editendorsement",[$policyId,"##EID"]); ?>';
     var link = urlString.replace("##EID", $(this).attr('docId'));
            $.ajax({
                    url: link,
                    type: "GET"

            }).done(function (data) {
                $("#db_quote_request_editpopup").remove();
                $('body').append('<div id="db_quote_request_editpopup" title="Edit endorsement" style="display:none" >' + data.content + '</div>');
                var dialogElement = $("#db_quote_request_editpopup");

                dialogElement.dialog({
                    width: 900,                  
                    modal: true,
                    buttons: {
                        "Update": {
                            class: "btn waves-effect waves-light btn-rounded btn-success",
                            text:"Update",
                            click: function () {
                                DIB.progressDialog(LOCALE.get('dib.common.progress.loading'));

                               $("form#form_endorsement_save").submit();
                               

                            }
                        },
                        "cancel": {
                            class: "btn waves-effect waves-light btn-rounded btn-danger",
                            text:"Cancel",
                            click: function () {
                                dialogElement.dialog('close');
                                dialogElement.remove();
                            }
                        }
                    },
                    open: function (event, ui) {
                        FORM.setDatePicker('.datefield');
                    }
                });               

            
DIB.centerDialog();
            });
          
    })
    

    $(document).off('click','.dpib_endorsement_delete');
    $(document).on('click','.dpib_endorsement_delete',function(){    
   var urlString = '<?php echo route("deleteendorsementdetails",[$policyId,"##EID"]); ?>';
     var link = urlString.replace("##EID", $(this).attr('docId'));
            DIB.progressDialog(LOCALE.get('DIB.COMMON.Progress.Loading'));
            
                         $("#db_quote_request_editpopup").remove();
                $('body').append('<div id="db_quote_request_editpopup" title="Delete endorsement" style="display:none" > Do you want to delete endorsement!!!!</div>');
                var dialogElement = $("#db_quote_request_editpopup");

                dialogElement.dialog({
                    width: 900,
                   
                    modal: true,
                    buttons: {
                        "Delete": {
                            class: "btn waves-effect waves-light btn-rounded btn-success",
                            text:"Delete",
                            click: function () {
                                DIB.progressDialog(LOCALE.get('dib.common.progress.loading'));

                               $.ajax({
                    url: link,
                    type: "GET"

            }).done(function (data) {
                if (data.success) {
                    location.reload(true);
                }
            });
                               

                            }
                        },
                        "cancel": {
                            class: "btn waves-effect waves-light btn-rounded btn-danger",
                            text:"Cancel",
                            click: function () {
                                dialogElement.dialog('close');
                                dialogElement.remove();
                            }
                        }
                    }
                });               

            
                  DIB.centerDialog();   
           
          
    });
    
    
       
   });



</script>
<?php /**PATH D:\Xampp_new\htdocs\inslyportal\resources\views/Client/endorsementList.blade.php ENDPATH**/ ?>