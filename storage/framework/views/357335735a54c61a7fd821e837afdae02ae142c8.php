<?php $__env->startSection('content'); ?>
<div class="panel panel-default open">
    <div class="panel-heading">
            
        
       <h1 class="panel-title">Policy<small></small></h1> </div><div class="panel-body"> 
            <div class="auto-scroll">
                <table class="table table-bordered table-striped dpib_policy_list color-table info-table" style='width:100%;'>
                    <thead>
                        <tr>
                            <th  class="nowrap">Policy No</th>
                            <th  class="nowrap">Insurer</th>                      
                            <th  class="nowrap" >Validity</th>
                            <th  class="nowrap" >Customer</th>
                            <th  class="nowrap" >Object</th>
                            <th  class="nowrap" >Status</th>                            
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
<script src="<?php echo e(asset('js/dibcustom/dib-quote-request.js')); ?>" type="text/javascript"></script>

<?php $__env->stopSection(); ?>






<?php $__env->startSection('pagescript'); ?>


 		

       
<script>
    var columnDefs = [];
    var policyTable = '';


      var roleArray = <?php echo json_encode(Auth::user()->roles, 15, 512) ?>;

   $(function(){
    
        columnDefs.push({"name": 'policyno',  "targets": 0, data: function (row, type, val, meta) {
                
                            var urlString = '<?php echo route("clientpolicyoverview",["##RID"]); ?>';
                            var link = urlString.replace("##RID", row['mainId']);
                            
                             var subject =   (row['policy_number'] !==null) ? "<a href='"+link+"'>"+ row['policy_number']+"</a>": "<a href='"+link+"'>"+"---not issued---"+"</a>";

                          
                            row.sortData = row['mainId'];
                            row.displayData = subject; 
                           
                            return row;
                        }, render: {"_": 'sortData', "display": 'displayData', 'filter': 'sortData'}}); 
        columnDefs.push({"name": "insurer",  "targets": 1, "orderable": false,data: function (row, type, val, meta) {
                            var subject = row['insurer_name'];
                            row.sortData = row['insurer_name'];
                            row.displayData = subject;
                           
                            
                            return row;
                        }, render: {"_": 'sortData', "display": 'displayData', 'filter': 'sortData'}});
                    
        columnDefs.push({"name": 'validity',  "targets": 2, "orderable": false, data: function (row, type, val, meta) {
                            var subject =row['startDate']+ " - " +row['endDate'] ;
                            row.sortData = row['start_date'];
                            row.displayData = subject;                           
                            
                            return row;
                        }, render: {"_": 'sortData', "display": 'displayData', 'filter': 'sortData'}});  
        columnDefs.push({"name": 'customer',  "targets": 3, "orderable": false, data: function (row, type, val, meta) {
                            var subject =  row['customerName'];
                            row.sortData = row['customerName'];
                            row.displayData = subject;                           
                            
                            return row;
                        }, render: {"_": 'sortData', "display": 'displayData', 'filter': 'sortData'}});              
                    
        columnDefs.push({"name": 'object',  "targets": 4, data: function (row, type, val, meta) {
                       var subject = row['product_name'];
                           
                            
                            var objectJson = JSON.parse(row['objectdetails']);
                            var objectString =(row['product_name']!=null) ? row['product_name']+'<br>':'-';
                            if(_.size(objectJson) >0) {
                                $.each(objectJson,function(key,value){
                                  objectString+= createObjectColumnValue(value,value.object_type);                                
                                   
                               })
                            }
                           // newString = (objectString !='') ? objectString.slice(0, -1) :'' ;
                            row.sortData = (objectString !='') ? objectString.slice(0, -1) :'' ;
                            row.displayData = (objectString !='') ? objectString.slice(0, -1) :'' ;                         
                           
                            return row;
                        }, render: {"_": 'sortData', "display": 'displayData', 'filter': 'sortData'}});                
                    
        columnDefs.push({"name": 'status',  "targets": 5, "orderable": false, data: function (row, type, val, meta) {
                            var subject = row['statusString'];
                            row.sortData =row['policy_status'];;
                            row.displayData = subject;
                           
                            
                            return row;
                        }, render: {"_": 'sortData', "display": 'displayData', 'filter': 'sortData'}});
                    
                  
                    
        
       
      policyTable =   $('.dpib_policy_list').DataTable( {
                data: <?php echo $allpolicies; ?>,
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
                dom: "Blftip"
     
    } ); 
    

    
    
    
       
   });
   function createObjectColumnValue(objectJson,objectType) {
        var objectString =''; 
        var personArray =['address','gender','last_name','dob'];
        var vehicleArray =['make','model','year','license_plate'];
        var propertyArray = ['property_type','year_built','area','construction_material'];

        $.each(objectJson,function(key,value){
              
                                 if(objectType =='person' && $.inArray( key, personArray )> -1) {
                                   objectString +=(value !==null) ? value+"," : '';
                                 } else if(objectType =='vehicle' && $.inArray( key, vehicleArray )> -1){
                                    objectString +=(value !==null) ? value+",": ''; 
                                 } else if(objectType =='property' && $.inArray( key, propertyArray )> -1){
                                    objectString +=(value !==null) ? value+",": '';
                                 }
                                 
                                   
                               });
                               
                               return objectString;
   
   }


</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.elite_client', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Xampp_new\htdocs\inslyportal\resources\views/Client/policyList.blade.php ENDPATH**/ ?>