<?php $__env->startSection('content'); ?>
<div class="panel panel-default open">
    <div class="panel-heading">
            
        
       <h1 class="panel-title">Users<small></small></h1> </div><div class="panel-body"> 
            <div class="auto-scroll">
                <table class="table table-bordered table-striped dpib_policy_list color-table info-table" style='width:100%;'>
                    <thead>
                        <tr>
                            <th  class="nowrap">Name</th>
                            <th  class="nowrap">Username</th>                      
                            <th  class="nowrap" >Role</th>
                             <th  class="nowrap" >Status</th>
                             <th  class="nowrap" >Created at</th>
                            <th  class="nowrap" >Actions</th>
                                                
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
    
        columnDefs.push({"name": 'uname',  "targets": 0, data: function (row, type, val, meta) {
                
                           
                            
                             var subject =    row['name'];

                          
                            row.sortData = row['name'];
                            row.displayData = subject; 
                           
                            return row;
                        }, render: {"_": 'sortData', "display": 'displayData', 'filter': 'sortData'}}); 
        columnDefs.push({"name": "username",  "targets": 1, "orderable": true,data: function (row, type, val, meta) {
                            var subject = row['email'];
                            row.sortData = row['email'];
                            row.displayData = subject;
                           
                            
                            return row;
                        }, render: {"_": 'sortData', "display": 'displayData', 'filter': 'sortData'}});
                    
        columnDefs.push({"name": 'role',  "targets": 2, "orderable": false, data: function (row, type, val, meta) {
                            var subject = createRoles(row['roles']); ;
                            
                            row.sortData = subject;
                            row.displayData = subject;                           
                            
                            return row;
                        }, render: {"_": 'sortData', "display": 'displayData', 'filter': 'sortData'}}); 
                    
          columnDefs.push({"name": 'status',  "targets": 3, "orderable": false, data: function (row, type, val, meta) {
                  if(row['status']==0) {
                    var subject = '<button type="button" class="btn waves-effect waves-light btn-danger">Inactive</button>';   
                  }   else {
                    var subject = '<button type="button" class="btn waves-effect waves-light btn-success">Active</button>';   
                  }       
                  
                            row.sortData = subject;
                            row.displayData = subject;                           
                            
                            return row;
                        }, render: {"_": 'sortData', "display": 'displayData', 'filter': 'sortData'}});           
        columnDefs.push({"name": 'createdat',  "targets": 4, "orderable": true, data: function (row, type, val, meta) {
                            var subject = $.format.date( row['created_at'], "dd.MM.yyyy HH:mm");
                            row.sortData = $.format.date( row['created_at'], "dd.MM.yyyy HH:mm"); 
                            row.displayData = subject;                           
                            
                            return row;
                        }, render: {"_": 'sortData', "display": 'displayData', 'filter': 'sortData'}});             
       
        columnDefs.push({"name": 'status',  "targets": 5, "orderable": false, data: function (row, type, val, meta) {
                           if(row['status'] ==1) {
                            var subject = '<a class="dpib_delete_user" actionUrl="" docId="'+row['id']+'"><span class="fas fa-ban text-danger mr-right" data-toggle="tooltip" data-placement="left" title="" data-original-title="Deactivate"></span></a>';   
                           } else {
                             var subject = '<a class="dpib_activate_user" actionUrl="" docId="'+row['id']+'"><span class=" fas fa-check-circle text-success mr-right" data-toggle="tooltip" data-placement="left" title="" data-original-title="Activate"></span></a>';  
                           }
            
                          row.sortData = subject;
                          row.displayData = subject;
                          return row;
                        }, render: {"_": 'sortData', "display": 'displayData', 'filter': 'sortData'}});
                    
                  
                    
        
       
      policyTable =   $('.dpib_policy_list').DataTable( {
                data: <?php echo $details; ?>,
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
                order: [[3, "desc"]],
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
    
    
    
    $(document).off('click','.dpib_delete_user');
    $(document).on('click', '.dpib_delete_user', function(){

                var removeId = $(this).attr('docId');
                 $("#db_quote_request_editpopup").remove();
                $('body').append('<div id="db_quote_request_editpopup" title="Delete document" style="display:none" > Do you realy want to deactivate this user?</div>');
                console.log($("#db_quote_request_editpopup").length);
                var dialogElement = $("#db_quote_request_editpopup");

                dialogElement.dialog({
                    width: 900,
                    resizable: false,
                    bgiframe: true,
                    modal: true,
                    buttons: {
                        "Yes": {
                            class: "btn waves-effect waves-light btn-rounded btn-success",
                             text:"Yes",
                            click: function () {
                                $(".preloader").show(); 
                                
        $.ajax({
                url: "<?php echo route('userdelete'); ?>",
                        headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        data :{'docId':removeId}
                }).done(function (data) {
                if (data.success) {
                $(".preloader").hide(); 
        location.reload(true);
                }
                });
                              

                            }
                        },
                        "No": {
                            class: "btn waves-effect waves-light btn-rounded btn-danger",
                            text:"No",
                            click: function () {
                                dialogElement.dialog('close');
                                dialogElement.remove();
                            }
                        }
                    }
                });               

            
                  DIB.centerDialog(); 
                
                
                
                
                });
                
                
                 $(document).off('click','.dpib_activate_user');
    $(document).on('click', '.dpib_activate_user', function(){

                var removeId = $(this).attr('docId');
                 $("#db_quote_request_editpopup").remove();
                $('body').append('<div id="db_quote_request_editpopup" title="Delete document" style="display:none" > Do you realy want to activate this user?</div>');
                console.log($("#db_quote_request_editpopup").length);
                var dialogElement = $("#db_quote_request_editpopup");

                dialogElement.dialog({
                    width: 900,
                    resizable: false,
                    bgiframe: true,
                    modal: true,
                    buttons: {
                        "Yes": {
                            class: "btn waves-effect waves-light btn-rounded btn-success",
                             text:"Yes",
                            click: function () {
                                 $(".preloader").show(); 
                                 $.ajax({
                url: "<?php echo route('activateuser'); ?>",
                        headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        data :{'docId':removeId}
                }).done(function (data) {
                if (data.success) {
                 $(".preloader").hide(); 
                location.reload(true);
                }
                });
                              

                            }
                        },
                        "No": {
                            class: "btn waves-effect waves-light btn-rounded btn-danger",
                            text:"No",
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

   function createRoles(roles) {
        var objectString =''; 
       
      var jsonObj =JSON.parse(roles);


        $.each(jsonObj,function(key,value){
              if(value =='CUSTOMER_OFFICER') {
                objectString +=(value !==null) ? ' OFFICER'+"," : '';
  
              } else if(value =='CUSTOMER_MANAGER'){
                 objectString +=(value !==null) ? ' MANAGER'+"," : '';  
              } 
                
                               });
              objectString = objectString.substring(0, objectString.length - 1);                 
                               return objectString;
   
   }

</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.elite_client', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Xampp_new\htdocs\inslyportal\resources\views/Client/userlist.blade.php ENDPATH**/ ?>