<?php $__env->startSection('headtitle'); ?>
<h3 class="text-blue bold">Renewal report </h3>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<div class="card">
    <div class="card-body">
        <h4 class="card-title">Filters</h4>

  
            <?php echo e(Form::open(array('route' => 'renewalfilter', 'name' => 'salesrequestfilter','id'=>'salesrequestfilter','class'=>'') )); ?>

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

            
            
            <button type="submit" class="btn btn-success mr-2">Generate report</button>
            <button type="button" class="btn btn-dark" id='filterCancel' redirectUrl='<?php echo e(route('corporatepipelinereport')); ?>'>Cancel</button>

       <?php echo e(Form::close()); ?>

    </div>
</div>


<?php if(isset($renewalDetails60)): ?>
<div class=" card">
    <div class="card-body">
        
 <a href="<?php echo e(route('renewaldaysexport')); ?>"><button type="button" class="btn btn-info d-none d-lg-block m-l-15 pull-right"><i class="mdi mdi-file-export"></i> Export</button></a>

        <ul class="nav nav-tabs" role="tablist">
                                    <li class="nav-item dpip-pipeline-report"> <a class="nav-link active" data-toggle="tab" href="#home" role="tab"><span class="hidden-sm-up"><i class="mdi mdi-table"></i></span> <span class="hidden-xs-down">60 days</span></a> </li>
                                    <li class="nav-item dpip-issuance-report" > <a class="nav-link" data-toggle="tab" href="#profile" role="tab" ><span class="hidden-sm-up"><i class="mdi mdi-table"></i></span> <span class="hidden-xs-down">90 days</span></a> </li>
                                    <li class="nav-item dpip-renewal-report"> <a class="nav-link" data-toggle="tab" href="#messages" role="tab"><span class="hidden-sm-up"><i class="mdi mdi-table"></i></span> <span class="hidden-xs-down">120 days</span></a> </li>
                                </ul>




    
                                <!-- Tab panes -->
 <div class="tab-content tabcontent-border" style='width:100%;'>
        <div class="tab-pane active" id="home" role="tabpanel">                    
                                        
            <div class="auto-scroll" style='width:100%;padding-top:10px'>
                <table class="table table-bordered table-striped dpib_renewal_list60 color-table info-table"  style="width:100%">
                    <thead>
                        <tr>
                            <th style="" class="nowrap">Client segment</th>                                                      
                            <th style="" class="nowrap">Channel</th>
                            <th style="" class="nowrap">Current Policy</th> 
                            <th  class="">Premium</th>
                            <th  class="">Agent</th>
                            <th  class="">LOB</th>
                            <th  class="">Client</th>          
                            <th  class="">Product</th>
                            <th  class="">Expiry date</th>                              
                            <th  class="">Renewal date</th>
                            <th  class="">Remainig days</th>                          
                        </tr>
                    </thead>
                    <tbody>
           
                   </tbody>
                </table>
            </div>
        </div>



        <div class="tab-pane" id="profile" role="tabpanel">                    
                                        
            <div class="auto-scroll" style='width:100%;padding-top:10px'>
                <table class="table table-bordered table-striped dpib_renewal_list90 color-table info-table"  style="width:100%">
                    <thead>
                        <tr>
                            <th style="" class="nowrap">Client segment</th>                                                      
                            <th style="" class="nowrap">Channel</th>
                            <th style="" class="nowrap">Current Policy</th> 
                            <th  class="">Premium</th>
                            <th  class="">Agent</th>
                            <th  class="">LOB</th>
                            <th  class="">Client</th>          
                            <th  class="">Product</th>
                            <th  class="">Expiry date</th>                              
                            <th  class="">Renewal date</th>
                            <th  class="">Remainig days</th>                          
                        </tr>
                    </thead>
                    <tbody>
           
                   </tbody>
                </table>
            </div>
        </div>




        <div class="tab-pane" id="messages" role="tabpanel">                    
                                        
            <div class="auto-scroll" style='width:100%;padding-top:10px'>
                <table class="table table-bordered table-striped dpib_renewal_list120 color-table info-table"  style="width:100%">
                    <thead>
                        <tr>
                            <th style="" class="nowrap">Client segment</th>                                                      
                            <th style="" class="nowrap">Channel</th>
                            <th style="" class="nowrap">Current Policy</th> 
                            <th  class="">Premium</th>
                            <th  class="">Agent</th>
                            <th  class="">LOB</th>
                            <th  class="">Client</th>          
                            <th  class="">Product</th>
                            <th  class="">Expiry date</th>                              
                            <th  class="">Renewal date</th>
                            <th  class="">Remainig days</th>                          
                        </tr>
                    </thead>
                    <tbody>
           
                   </tbody>
                </table>
            </div>
        </div>





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
    var rencolumnDefs = [];
    var complaintTable = '';
    var renewalTable60,renewalTable90,renewalTable120 = '';
    var underIssuanceTable = '';
    var roleArray = <?php echo json_encode(Auth::user()->roles, 15, 512) ?>;
   $(function(){

    $('a[data-toggle="tab"]').on("shown.bs.tab", function (e) {
$($.fn.dataTable.tables(true)).DataTable()
.columns.adjust()
.responsive.recalc();
});

       
    <?php if(isset($renewalDetails60)): ?>
        
    //Renewal column
    
  
    
     rencolumnDefs.push({"name": 'segment',  "targets": 0, data: function (row, type, val, meta) {
                
                                             
                            var subject = (row['premiumAmount'] > 0) ? clientSegment(row['premiumAmount']):'Small';
                            row.sortData = subject;
                            row.displayData = subject; 
                           
                            return row;
                        }, render: {"_": 'sortData', "display": 'displayData', 'filter': 'sortData'}}); 
                        
        
                    
       rencolumnDefs.push({"name": "channel",  "targets": 1, "orderable": false,data: function (row, type, val, meta) {
                            var subject =  row['channel'];
                            row.sortData = row['channel'];
                            row.displayData = subject;
                            
                            return row;
                        }, render: {"_": 'sortData', "display": 'displayData', 'filter': 'sortData'}});
                    
        rencolumnDefs.push({"name": 'policy',  "targets": 2, "orderable": false, data: function (row, type, val, meta) {
                            var subject =row['policy_number'] ;
                            row.sortData = row['policy_number'];
                            row.displayData = subject;
                            
                            return row;
                        }, render: {"_": 'sortData', "display": 'displayData', 'filter': 'sortData'}}); 
                    
        rencolumnDefs.push({"name": 'premium',  "targets": 3, "orderable": false, data: function (row, type, val, meta) {
                            var subject =row['total_premium'] ;
                            row.sortData = row['total_premium'];
                            row.displayData = subject;
                            
                            return row;
                        }, render: {"_": 'sortData', "display": 'displayData', 'filter': 'sortData'}}); 
                    
                    
                    
        rencolumnDefs.push({"name": 'agent',  "targets": 4, "orderable": false, data: function (row, type, val, meta) {
                            var subject =row['agent'] ;
                            row.sortData = row['agent'];
                            row.displayData = subject;                           
                            
                            return row;
                        }, render: {"_": 'sortData', "display": 'displayData', 'filter': 'sortData'}});
                    
      rencolumnDefs.push({"name": 'lob',  "targets": 5, data: function (row, type, val, meta) {
              
                        row.sortData = row['lineofbusinesstitle'];
                        row.displayData = row['lineofbusinesstitle'];                         
                           
                            return row;
                        }, render: {"_": 'sortData', "display": 'displayData', 'filter': 'sortData'}}); 
                    
        rencolumnDefs.push({"name": 'client',  "targets": 6, "orderable": false, data: function (row, type, val, meta) {
                            var subject =  row['customerName'];
                            row.sortData = row['customerName'];
                            row.displayData = subject;
                            
                            return row;
                        }, render: {"_": 'sortData', "display": 'displayData', 'filter': 'sortData'}});    
                    
                    
          rencolumnDefs.push({"name": 'product',  "targets": 7, "orderable": false, data: function (row, type, val, meta) {
                            var subject =  row['product_name'];
                            row.sortData = row['product_name'];
                            row.displayData = subject;
                            
                            return row;
                        }, render: {"_": 'sortData', "display": 'displayData', 'filter': 'sortData'}});               
                    
                   
                    
        rencolumnDefs.push({"name": 'expirydate',  "targets": 8, "orderable": false, data: function (row, type, val, meta) {
                            var subject = moment(row['end_date']).format('DD-MM-YYYY');
                            row.sortData =row['end_date'];
                            row.displayData = subject;
                            return row;
                        }, render: {"_": 'sortData', "display": 'displayData', 'filter': 'sortData'}});
                    
         rencolumnDefs.push({"name": 'renewaldate',  "targets": 9, "orderable": false, data: function (row, type, val, meta) {
                                             
                     var subject = moment(row['expirydate']).format('DD-MM-YYYY');
                            row.sortData =row['expirydate'];
                            row.displayData = subject;
                            return row;
                        }, render: {"_": 'sortData', "display": 'displayData', 'filter': 'sortData'}});
                        
         rencolumnDefs.push({"name": 'remainingdays',  "targets": 10, "orderable": false, data: function (row, type, val, meta) {
                                             
                           var subject = row['datediff'];
                            row.sortData =row['datediff'];
                            row.displayData = subject;
                            return row;
                        }, render: {"_": 'sortData', "display": 'displayData', 'filter': 'sortData'}});
                        
                        
                        
                        
                 renewalTable60 =   $('.dpib_renewal_list60').DataTable( {
                data: <?php echo $renewalDetails60; ?>,
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
                order: [[1, "desc"]],
                pageLength: 10,
                displayLength: 10,
                autoFill: false,
                search: false,
                columnDefs:rencolumnDefs,
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

renewalTable90 =   $('.dpib_renewal_list90').DataTable( {
                data: <?php echo $renewalDetails90; ?>,
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
                order: [[1, "desc"]],
                pageLength: 10,
                displayLength: 10,
                autoFill: false,
                search: false,
                columnDefs:rencolumnDefs,
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
    
    renewalTable120 =   $('.dpib_renewal_list120').DataTable( {
                data: <?php echo $renewalDetails120; ?>,
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
                order: [[1, "desc"]],
                pageLength: 10,
                displayLength: 10,
                autoFill: false,
                search: false,
                columnDefs:rencolumnDefs,
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
   
   function clientSegment(amount) {
         var segment ='';
        if( amount <= 500000) {
          segment = "Small";  
        } else if(amount <= 3000000) {
           segment = "Medium"; 
        } else if(amount <= 10000000) {
          segment = "Large";  
        } else if(amount > 10000000) {
           segment = "Key Account"; 
        }
        return segment;
   
   }



</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.elite',['notificationCount'=>0 ] , \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Xampp_new\htdocs\inslyportal\resources\views/Reports/renewalreport.blade.php ENDPATH**/ ?>