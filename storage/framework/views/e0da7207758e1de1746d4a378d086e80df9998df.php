<?php $__env->startSection('content'); ?>


<div class="panel panel-default open card">
    <div class="panel-heading card-body">       
        <h1 class="card-title">Approved Endorsements<small></small></h1> 
    </div>
    <div class="panel-body"> 
            <div class="auto-scroll table-responsive">
                <table class="table table-bordered table-striped dpib_approved_endorsement_list color-table info-table">
                    <thead>
                        <tr>
                            <th   class="nowrap">Endorsement no</th>
                            <th   class="nowrap">Policy</th>
                            <th  style="width:40%" class="nowrap">Customer</th>
                            <th>Type</th>
                            <th class="nowrap">Issue date</th> 
                            <th  class="nowrap" >Due date</th>
                            <th  class="nowrap" >Amount</th>
                             <th  class="nowrap" >Vat</th>
                            <th  class="nowrap" >Vat amount</th>
                            <th  class="nowrap" >Total Amount</th>
                        </tr>
                    </thead>
                    <tbody>
           
                   </tbody>
                </table>
            </div>
        </div> 

</div>








<?php $__env->stopSection(); ?>

<?php $__env->startSection('customcss'); ?>
<link rel="stylesheet" type="text/css" href=" <?php echo e(asset('elitedesign/assets/node_modules/datatables.net-bs4/css/dataTables.bootstrap4.css')); ?> ">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('elitedesign/assets/node_modules/datatables.net-bs4/css/responsive.dataTables.min.css')); ?>"> 


<?php $__env->stopSection(); ?>

<?php $__env->startSection('customscript'); ?> 
        
<script src="<?php echo e(asset('elitedesign/assets/node_modules/datatables.net/js/jquery.dataTables.min.js')); ?>"></script>
<script src="<?php echo e(asset('elitedesign/assets/node_modules/datatables.net-bs4/js/dataTables.responsive.min.js')); ?>"></script>
<script src="<?php echo e(asset('js/global/datatable/moment.min.js')); ?>" type="text/javascript"></script>
<script src="<?php echo e(asset('js/global/datatable/datetime.js')); ?>" type="text/javascript"></script>

    
<?php $__env->stopSection(); ?>

<?php $__env->startSection('pagescript'); ?> 
     
<script>
    var columnDefs =[] , 
    columnDefs1 = [];
  
  
    var approvedendorsementlistTable ='';
    var roleArray = <?php echo json_encode(Auth::user()->roles, 15, 512) ?>;
   $(function(){
    
        
    
columnDefs1.push({"name": 'endorsementno',  "targets": 0, data: function (row, type, val, meta) {
                            var urlString = '<?php echo route("overviewendorsement",["##RID"]); ?>';
                            var link = urlString.replace("##RID", row['id']);
                            var subject = (row['endorsement_number'] !==null) ? row['endorsement_number']: "---not issued---";
                            var subject =   (row['endorsement_number'] !==null) ? "<a href='"+link+"'>"+ row['endorsement_number']+"</a>": "<a href='"+link+"'>"+"---not issued---"+"</a>";
                            row.sortData = row['endorsement_number'];
                            row.displayData = subject; 
                           
                            return row;
                        }, render: {"_": 'sortData', "display": 'displayData', 'filter': 'sortData'}}); 

      columnDefs1.push({"name": 'policynumber',  "targets": 1, data: function (row, type, val, meta) {
                            var urlString = '<?php echo route("policyoverview",["##RID"]); ?>';
                            var link = urlString.replace("##RID", row['policy_id']);
                            var subject = (row['policy_number'] !==null) ? row['policy_number']: "---not issued---";
                            var subject =   (row['policy_number'] !==null) ? "<a href='"+link+"'>"+ row['policy_number']+"</a>": "<a href='"+link+"'>"+"---not issued---"+"</a>";
                            row.sortData = row['policy_number'];
                            row.displayData = subject; 
                           
                            return row;
                        }, render: {"_": 'sortData', "display": 'displayData', 'filter': 'sortData'}}); 

      columnDefs1.push({"name": "customer",  "targets": 2, "orderable": true,data: function (row, type, val, meta) {
                            var subject = row['customerName'];
                            row.sortData = row['customerName'];
                            row.displayData = subject;
                           
                            
                            return row;
                        }, render: {"_": 'sortData', "display": 'displayData', 'filter': 'sortData'}});
        columnDefs1.push({"name": "endorse_type",  "targets": 3, "orderable": false,data: function (row, type, val, meta) {
                            var subject = row['typeString'];
                            row.sortData = row['typeString'];
                            row.displayData = subject;
                           
                            
                            return row;
                        }, render: {"_": 'sortData', "display": 'displayData', 'filter': 'sortData'}});
                    
        columnDefs1.push({"name": 'issueDate',  "targets": 4, "orderable": true, data: function (row, type, val, meta) {
                            var subject =row['formatted_issueDate'] ;
                            row.sortData = row['issue_date'];
                            row.displayData = subject;                           
                            
                            return row;
                        }, render: {"_": 'sortData', "display": 'displayData', 'filter': 'sortData'}});  
        columnDefs1.push({"name": 'due_date',  "targets": 5, "orderable": true, data: function (row, type, val, meta) {
                            var subject = (row['due_date'] !=null) ? moment(row['due_date']).format('DD.MM.YYYY'):'-';
                            row.sortData = (row['due_date'] !=null) ? moment(row['due_date']).format('DD.MM.YYYY'):'-';
                            row.displayData = subject;                           
                            
                            return row;
                        }, render: {"_": 'sortData', "display": 'displayData', 'filter': 'sortData'}});   
         columnDefs1.push({"name": 'sum',  "targets": 6, data: function (row, type, val, meta) {
              
                        row.sortData = (row['amount']).toFixed(2);
                        row.displayData = (row['amount']).toFixed(2);                         
                           
                            return row;
                        }, render: {"_": 'sortData', "display": 'displayData', 'filter': 'sortData'}});          
                    
        columnDefs1.push({"name": 'vat',  "targets": 7, "orderable": true, data: function (row, type, val, meta) {
                            var subject =  row['vat_percentage'];
                            row.sortData = row['vat_percentage'];
                            row.displayData = row['vat_percentage']+'%';                           
                            
                            return row;
                        }, render: {"_": 'sortData', "display": 'displayData', 'filter': 'sortData'}}); 
        columnDefs1.push({"name": 'vatAmount',  "targets": 8, "orderable": true, data: function (row, type, val, meta) {
                            var subject =  row['vat_amount'].toFixed(2);
                            row.sortData = row['vat_amount'].toFixed(2);
                            row.displayData = subject;                           
                            
                            return row;
                        }, render: {"_": 'sortData', "display": 'displayData', 'filter': 'sortData'}}); 
                   
      columnDefs1.push({"name": 'totalAmount',  "targets": 9, "orderable": true, data: function (row, type, val, meta) {
                            var subject =  (row['amount']+row['vat_amount']).toFixed(2);
                            row.sortData = (row['amount']+row['vat_amount']).toFixed(2);
                            row.displayData = subject;                           
                            
                            return row;
                        }, render: {"_": 'sortData', "display": 'displayData', 'filter': 'sortData'}});
                    

    approvedendorsementlistTable =   $('.dpib_approved_endorsement_list').DataTable( {
                data: <?php echo $approvedEndorsement; ?>,
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
                columnDefs:columnDefs1,
                language: {

                                paginate: {
                                    "first": '<i class="fa fa-angle-double-left"></i>',
                                    "last": '<i class="fa fa-angle-double-right"></i>',
                                    "next": '<i class="fa fa-angle-right"></i>',
                                    "previous": '<i class="fa fa-angle-left"></i>'
                                }
                            },
                dom: "Blftip"
     
    } ); 
    
    
    
    
    
    
    


            
          
   
       
   });



</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.elite',['notificationCount'=>$notificationCount ] , \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Xampp_new\htdocs\inslyportal\resources\views/Dashboard/financeapprovedendorsementTable.blade.php ENDPATH**/ ?>