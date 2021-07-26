<?php $__env->startSection('headtitle'); ?>
  Complaint report 
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<div class="card">
    <div class="card-body">
        <h4 class="card-title">Filters</h4>

  
            <?php echo e(Form::open(array('route' => 'complaintfilter', 'name' => 'salesrequestfilter','id'=>'salesrequestfilter','class'=>'') )); ?>

            <div class="form-group mt-5 row">
                <label for="example-text-input" class="col-2 col-form-label">Date period</label>
                <div class="col-5">
                    <input class="form-control" type="date" value="" id="startDate" name='startDate'>
                </div>
                <div class="col-5">
                    <input class="form-control" type="date" value="" id="endDate" name='endDate'>
                </div>
            </div>
            <div class="form-group row ui-widget">
                <label for="customer_name" class="col-2 col-form-label">Customer</label>
                <div class="col-10">
                    <input  class='form-control' name='search' id="customer_name">
                    <input type='hidden' name='customerId' id='customerId' value=0 />
                    
                </div>

            </div>
            <div class="form-group row">
                <label for="example-email-input" class="col-2 col-form-label">Validity</label>
                <div class="col-10">
                
                    <?php echo e(Form::select('complaint_validity', [''=>'---Select---']+ $validityArray,  '' ,array('id' =>'complaint_validity','class'=>'custom-select col-12','error-message' =>"Gender field is mandatory" ))); ?>  
                </div>
            </div>
            <div class="form-group row">
                <label for="example-email-input" class="col-2 col-form-label">Status</label>
                <div class="col-10">
                
                    <?php echo e(Form::select('complaint_status', [''=>'---Select---']+ $statusArray,  '' ,array('id' =>'complaint_status','class'=>'custom-select col-12','error-message' =>"Gender field is mandatory" ))); ?>  
                </div>
            </div>
            
            
            <button type="submit" class="btn btn-success mr-2">Generate report</button>
            <button type="button" class="btn btn-dark" id='filterCancel' redirectUrl='<?php echo e(route('policycompliant')); ?>'>Cancel</button>

       <?php echo e(Form::close()); ?>

    </div>
</div>


<?php if(isset($complaintDetails)): ?>
<div class=" card">
    <div class="card-body">
 <a href="<?php echo e(route('complaintexport')); ?>"><button type="button" class="btn btn-info d-none d-lg-block m-l-15 pull-right"><i class="mdi mdi-file-export"></i> Export</button></a>
   
            <div class="auto-scroll" style='width:100%;padding-top:10px'>
                <table class="table table-bordered table-striped dpib_policy_list color-table info-table" >
                    <thead>
                        <tr>
                            <th style="" class="nowrap">Complaint no:</th>                                                      
                            <th>Type</th>
                            <th style="" class="nowrap">Client name</th>
                            <th style="" class="nowrap">Policy</th> 
                            <th  class="" >Requested date</th>
                            <th  class="" >Remarks</th>
                            <th  class="" >Validity</th>                            
                            <th  class="" >Status</th>
                            <th  class="" >Created date</th>
                            <th  class="" >Updated date</th>                         
                          
                        </tr>
                    </thead>
                    <tbody>
           
                   </tbody>
                </table>
            </div>
      

</div>
</div>
<?php endif; ?>

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
    var columnDefs = [];
    var complaintTable = '';
    var roleArray = <?php echo json_encode(Auth::user()->roles, 15, 512) ?>;
   $(function(){
    <?php if(isset($complaintDetails)): ?>
        columnDefs.push({"name": 'complaintnumber',  "targets": 0, data: function (row, type, val, meta) {
                
                            var urlString = '<?php echo route("complaintoverview",["##CID"]); ?>';
                            var link = urlString.replace("##CID", row['id']);
                            var linkFlag = true; 
                        
                            var subject = "<a href='"+link+"'>"+ row['id']+"</a>";
                            row.sortData = row['id'];
                            row.displayData = subject; 
                           
                            return row;
                        }, render: {"_": 'sortData', "display": 'displayData', 'filter': 'sortData'}}); 
        columnDefs.push({"name": "complaint_type",  "targets": 1, "orderable": false,data: function (row, type, val, meta) {
                            var subject = row['complaintType'];
                            row.sortData = row['complaintType'];
                            row.displayData = subject;
                           
                            
                            return row;
                        }, render: {"_": 'sortData', "display": 'displayData', 'filter': 'sortData'}});
                    
       columnDefs.push({"name": "clientname",  "targets": 2, "orderable": false,data: function (row, type, val, meta) {
                            var subject =  row['clientName'];
                            row.sortData = row['clientName'];
                            row.displayData = subject;
                           
                            
                            return row;
                        }, render: {"_": 'sortData', "display": 'displayData', 'filter': 'sortData'}});
                    
        columnDefs.push({"name": 'policy',  "targets": 3, "orderable": false, data: function (row, type, val, meta) {
                            var subject =row['policy_number'] ;
                            row.sortData = row['policy_number'];
                            row.displayData = subject;                           
                            
                            return row;
                        }, render: {"_": 'sortData', "display": 'displayData', 'filter': 'sortData'}});  
        columnDefs.push({"name": 'requested_date',  "targets": 4, "orderable": false, data: function (row, type, val, meta) {
                            var subject =row['requested_date'] ;
                            row.sortData = row['requested_date'];
                            row.displayData = subject;                           
                            
                            return row;
                        }, render: {"_": 'sortData', "display": 'displayData', 'filter': 'sortData'}}); 
      columnDefs.push({"name": 'remarks',  "targets": 5, data: function (row, type, val, meta) {
              
                        row.sortData = row['remarks'];
                        row.displayData = row['remarks'];                         
                           
                            return row;
                        }, render: {"_": 'sortData', "display": 'displayData', 'filter': 'sortData'}}); 
        columnDefs.push({"name": 'validity',  "targets": 6, "orderable": false, data: function (row, type, val, meta) {
                            var subject =  row['complaintValidity'];
                            row.sortData = row['complaintValidity'];
                            row.displayData = subject;                           
                            
                            return row;
                        }, render: {"_": 'sortData', "display": 'displayData', 'filter': 'sortData'}});              
                    
                   
                    
        columnDefs.push({"name": 'status',  "targets": 7, "orderable": false, data: function (row, type, val, meta) {
                            var subject = row['statusString'];
                            row.sortData =row['statusString'];
                            row.displayData = subject;
                            return row;
                        }, render: {"_": 'sortData', "display": 'displayData', 'filter': 'sortData'}});
                    
         columnDefs.push({"name": 'created_date',  "targets": 8, "orderable": false, data: function (row, type, val, meta) {
                                             
                     var subject = row['created_at'];
                            row.sortData =row['created_at'];
                            row.displayData = subject;
                            return row;
                        }, render: {"_": 'sortData', "display": 'displayData', 'filter': 'sortData'}});
         columnDefs.push({"name": 'updated_date',  "targets": 9, "orderable": false, data: function (row, type, val, meta) {
                                             
                           var subject = row['updated_at'];
                            row.sortData =row['updated_at'];
                            row.displayData = subject;
                            return row;
                        }, render: {"_": 'sortData', "display": 'displayData', 'filter': 'sortData'}});                   
          
                  
                    
        
       
      complaintTable =   $('.dpib_policy_list').DataTable( {
                data: <?php echo $complaintDetails; ?>,
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
                order: [[9, "desc"]],
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
                dom: "Brtip"
     
    } ); 
    <?php endif; ?>
    
      $("#customer_name").autocomplete({
  disabled: false,
   position: { my : "right top", at: "right bottom" },
      source: function( request, response ) {
        $.ajax( {
          url: '<?php echo route("seachcustomer",["customer"]); ?>',
          headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          dataType: "json",
          data: {
            search: request.term
          },
          success: function( data ) {
 
                    
                    
        response($.map(data, function (item)
                    {
                        return{
                            label: item.name,
                            value: item.id,
                            id:item.name
                           
                        }
                    }))

          }
        } );
      },
      minLength: 2,
      select: function( event, ui ) {
          $('#customer_name').val(ui.item.label); // display the selected text
          $('#customerId').val(ui.item.value);
   
   return false;
      }
    } );
    
    $(document).on('click','#filterCancel',function(){
      window.location.href = $(this).attr('redirectUrl');
    })
    
    
       
   });



</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.elite',['notificationCount'=>0 ] , \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Xampp_new\htdocs\inslyportal\resources\views/Reports/complaintlist.blade.php ENDPATH**/ ?>