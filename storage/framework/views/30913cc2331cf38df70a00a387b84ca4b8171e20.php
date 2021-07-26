
<div class="card open" style="padding:0px;">
    <div class="card-body" style="padding:0px;">  
    <div class="panel-heading">
        <h1 class="card-title col-3"><small>Log</small></h1> 
    </div>
            <div class="table-responsive" style='width:100%;'>
                <table class="display nowrap table table-hover table-striped table-bordered dataTable dpib_customer_log" style='width:100%;'>
                    <thead>
                            <tr>
                            <th style="width:10%" class="nowrap">Date/time</th>
                            <th style="width:10%" class="nowrap">Edited by</th>                         
                            <th class="nowrap" >Old value</th>
                             <th  style="width:100%">Title</th>
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
    var customerLogTable = '';
   $(function(){
    
        columnDefs.push({"name": 'createdby',  "targets": 0, data: function (row, type, val, meta) {
                            var subject = (row['edited_at'] !=null)? moment(row['edited_at']).format('DD.MM.YYYY hh:mm'):'-';
                            row.sortData = row['edited_at'];
                            row.displayData = subject; 
                           
                            return row;
                        }, render: {"_": 'sortData', "display": 'displayData', 'filter': 'sortData'}}); 
        columnDefs.push({"name": "editedBy",  "targets": 1, "orderable": false,data: function (row, type, val, meta) {
                            var subject = row['userName'];
                            row.sortData = row['userName'];
                            row.displayData = subject;
                           
                            
                            return row;
                        }, render: {"_": 'sortData', "display": 'displayData', 'filter': 'sortData'}});
                    
        columnDefs.push({"name": 'title',  "targets": 3, "orderable": false, data: function (row, type, val, meta) {
                            var subject = row['title'];
                            row.sortData = row['title'];
                            row.displayData = subject;
                           
                            
                            return row;
                        }, render: {"_": 'sortData', "display": 'displayData', 'filter': 'sortData'}});            
                    
        columnDefs.push({"name": 'oldValue',  "targets": 2, "orderable": false, data: function (row, type, val, meta) {
                            var subject = row['old_value'];
                            row.sortData = row['old_value'];
                            row.displayData = subject;
                           
                            
                            return row;
                        }, render: {"_": 'sortData', "display": 'displayData', 'filter': 'sortData'}});
        
             
      customerLogTable =   $('.dpib_customer_log').DataTable( {
                data: <?php echo $logdata; ?>,
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
                order: [[0, "desc"]],
                pageLength: 50,
                displayLength: 50,
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
   <?php /**PATH D:\Xampp_new\htdocs\inslyportal\resources\views/Request/logData.blade.php ENDPATH**/ ?>