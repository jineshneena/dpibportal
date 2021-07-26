<?php $__env->startSection('content'); ?>


<!--                  content here  -->
<!--TAB AREA-->
<div class="row">
          <?php $__env->startSection('headtitle'); ?>
         <a href='<?php echo e(route("policyoverview",$policyId)); ?>'><?php echo e($overviewData->policy_number); ?></a> <i class="fas fa-angle-double-right"></i><span class='text-blue' style='font-size:25px'><?php echo e($overviewData->endorsement_number); ?> </span>
<?php $__env->stopSection(); ?>
    
      <div class="col-md-12 card">
        
        
        <ul class="nav nav-tabs" role="tablist">
                                <li id="tab_overview" class="nav-item <?php echo e(!empty($overviewTab) && $overviewTab == 'overview' ? 'active' : ''); ?>" onclick="TAB.select('overview', null, 1)"> <a class="nav-link <?php echo e(empty($overviewTab) || $overviewTab == 'overview' ? 'active' : ''); ?>" data-toggle="tab" href="#content_overview" role="tab" aria-selected="true"><span class="hidden-sm-up"><i class="ti-home"></i></span> <span class="hidden-xs-down">Overview</span></a> </li>
                                
                                <li id="tab_document" class="nav-item <?php echo e(!empty($overviewTab) && $overviewTab == 'document' ? 'active' : ''); ?>" onclick="TAB.select('document', null, 0);customerdocumentTable.columns.adjust().draw();"> <a class="nav-link <?php echo e(empty($overviewTab) || $overviewTab == 'document' ? 'active' : ''); ?>" data-toggle="tab" href="#content_document" role="tab" aria-selected="false"><span class="hidden-sm-up"><i class="ti-user"></i></span> <span class="hidden-xs-down">Documents (<?php echo e(count($documentDetails)); ?>)</span></a> </li>
             
                                
                               
        </ul>
        

    </div>
    
    
    
</div>
<!--TAB CONTENT AREA-->
<div class="row card ribbon-wrapper-reverse">
    <div class="ribbon ribbon-bookmark ribbon-right ribbon-info"><i class="ti-hand-point-right"></i>&nbsp;<?php echo e($overviewData->statusString); ?></div>
        <div id="content_overview" class="tabcontent col-md-12 card-body">
            <div class="row">
<div class="col-md-12 row button-group">
                                    <div class="col-lg-9 col-xlg-9 mb-4">
                        
 <button type="button" class="btn btn-success btn-rounded dpib_endorsement_edit dib-cursor-style" editUrl='<?php echo route("editendorsement",[$policyId, $overviewData->id]); ?>' data-toggle="tooltip" title="" data-original-title="Edit endorsement"><i class="fas fa-edit"></i> Edit</button>                          
                            
                     
                                    </div>
    
    <div class="col-lg-3 col-xlg-3 mb-4" style='text-align:right'>
      <?php if((in_array('ROLE_FINANCE_MANAGER', Auth::user()->roles) || in_array('ROLE_FINANCE', Auth::user()->roles) || in_array('ROLE_OPERATION_MANAGER', Auth::user()->roles)  ) && $overviewData->endorsement_status !=2): ?>   
 <?php if($overviewData->endorsement_status==1): ?>
     <button type="button" class="btn btn-success btn-rounded dpib_endorsement_issue dib-cursor-style" endorsement_id="<?php echo e($overviewData->id); ?>" policy_id="<?php echo e($policyId); ?>" data-toggle="tooltip" title="" data-original-title="Approve" ><i class="mdi mdi-thumb-up"></i> Approve</button>
     <button type="button" class="btn btn-success btn-rounded dib-cursor-style dpib_endorsement_reject" endorsement_id="<?php echo e($overviewData->id); ?>" policy_id="<?php echo e($policyId); ?>"  data-toggle="tooltip" title="" data-original-title="Reject" ><i class="mdi mdi-thumb-down"></i> Reject</button>
     <?php elseif((in_array('ROLE_FINANCE_MANAGER', Auth::user()->roles) || in_array('ROLE_FINANCE', Auth::user()->roles) || in_array('ROLE_OPERATION_MANAGER', Auth::user()->roles)  ) && $overviewData->endorsement_status==3): ?>
     <button type="button" class="btn btn-success btn-rounded dib-cursor-style dpib_endorsement_issue"  endorsement_id="<?php echo e($overviewData->id); ?>" policy_id="<?php echo e($policyId); ?>" data-toggle="tooltip" title="" data-original-title="Approve" ><i class="mdi mdi-thumb-up"></i> Approve</button>
     
     <?php endif; ?>
    <?php endif; ?>    
         
                                
    </div>
    
</div> 
        
                <div id="main-content" class="col-md-12" >
                    
                    
                    
                    
                    
                    
                    
                    <div id="panel-customer_overview" class="panel panel-default open"><div class="panel-heading">
                           <h3 class="panel-title">Endorsement info</h3></div>
                        <div id="customer_overview" class="panel-collapse panel-body ">
                            <table class="info-table" width='100%'>
                                <tbody>
                                    <tr><td>Endorsement no:</td><td><b><?php echo e($overviewData->endorsement_number); ?></b></td></tr>
                                    <tr><td>Type:</td><td><?php echo e($overviewData->typeString); ?> </td></tr>
                                    <tr><td>Policy no:</td><td><a href='<?php echo route("policyoverview",[$policyId]); ?>'><b><?php echo e($overviewData->policy_number); ?></b></a></td></tr>
                                     <tr><td>Customer</td><td><a href='<?php echo route("customeroverview",[$overviewData->customerId]); ?>'><b><?php echo e($overviewData->customerName); ?></b></a></td></tr>
                                     <tr><td>Insurance:</td><td><?php echo e($overviewData->insurer_name); ?> </td></tr>
                                    <tr><td>Inception date:</td><td><?php echo e(date('d.m.Y',strtotime($overviewData->start_date))); ?></td></tr>
                                    <tr><td>End date:</td><td><?php echo e(date('d.m.Y',strtotime($overviewData->expiry_date))); ?></td></tr>
                                    <tr><td>Issue date:</td><td><?php echo e(date('d.m.Y',strtotime($overviewData->issue_date))); ?></td></tr>
                                    <tr><td>Due date:</td><td><?php echo e(($overviewData->due_date !=null) ? date('d.m.Y',strtotime($overviewData->due_date)) :'-'); ?></td></tr>
                                    <tr><td>Amount:</td><td><b><?php echo e(number_format($overviewData->amount,2)); ?> SAR</b></td></tr>
                                    <tr><td>Vat:</td><td><b><?php echo e($overviewData->vat_percentage); ?>%</b></td></tr>
                                    <tr><td>Vat amount</td><td><b><?php echo e(number_format($overviewData->vat_amount,2)); ?> SAR</b></td></tr>
                                    <tr><td>Total amount</td><td><b><?php echo e(number_format(($overviewData->vat_amount+$overviewData->amount),2)); ?> SAR</b></td></tr>
                                    
                                    <tr><td>Endorsement count:</td><td><?php echo e($overviewData->endorsement_count); ?></td></tr>
                                    
                                    
               <tr class="subtitle"><th colspan="2" style='padding-top:0;padding-bottom:0'>         <div class="panel-heading" style='padding-left:0;padding-bottom:0'>
                
                                                <h3 class="panel-title">Current info</h3>
                                            </div></th></tr>
                                        <tr><td>Status:</td><td><a><?php echo e($overviewData->statusString); ?></a></td></tr>

                                            <?php if($overviewData->endorsement_status==2): ?>
                                                <tr><td>Approved date:</td><td class="phoneNumber"><?php echo e(date("d.m.Y",strtotime($overviewData->approved_date))); ?></td></tr>
                                            <?php endif; ?>

                                        <?php if($overviewData->endorsement_status==3): ?>
                                        <tr><td>Reject reason:</td><td class="phoneNumber"><i><?php echo e($overviewData->reject_reason); ?></i></td></tr>
                                        <?php endif; ?>


                                        <tr><td>Last modified date:</td><td class="phoneNumber"><?php echo e($overviewData->created_at); ?></td></tr>

                                   
                                </tbody>
                            </table>
                        </div></div>


                </div>

                 
            </div>



        </div>
        <div id="content_document" class="tabcontent col-12"  style="display:none"  >
           
        
    <div class="card open">
        <div class="card-body"> 
        <ul class="panel-actions list-inline pull-right">
          <li class="dpib_endorsement_crm_document_add"><span class="panel-action-add"  data-toggle="tooltip" title="Add a document"><span class="fas fa-plus text-blue"></span></span></li>  
        </ul> 
        <h1 class="card-title col-3">Documents<small></small></h1> </div>
            <div class="table-responsive" style='width:100%;'>
                <table class="display nowrap table table-hover table-striped table-bordered dataTable dpib_request_doc" width='100%'>
                    <thead>
                        <tr>
                            <th style="width: 25%" class="nowrap">File</th>
                            <th style="width: 25%" class="nowrap">Comment</th>                           
                            <th  class="nowrap" style="width: 10%">Type</th>
                            <th  class="nowrap" style="width: 10%">Uploaded By</th>
                            <th  class="nowrap" style="width: 5%">Uploaded at</th>
                             <th  class="nowrap" style="width: 5%">Modified at</th>
                            <th  class="nowrap" >  </th>
                        </tr>
                    </thead>
                    <tbody>
           
                   </tbody>
                </table>
            </div>
        </div> 

</div>


</div>      

 



<script id='request_status_template' type='text/template'>

   <?php echo e(Form::open(array('route' => array('updateendorsementstatus',$overviewData->id), 'name' => 'form_endorsement_status_edit','id'=>'form_endorsement_status_edit','files'=>'true' ))); ?>


    <div class="dialogform"><table class="insly_dialogform">
                <tbody>                    
                    <tr id="field_request_type" class="field">
                        <td class="">
                            <div class="label ">
                                <span class="text-danger "></span>
                                <span class="title">Type</span>
                            </div>
                        </td>
                        <td>
                            
                            <div class="element">
                                <input type='hidden' name='endorsementId' value='<?php echo e($overviewData->id); ?>'>
                                <input type='hidden' name='endorsementPolicyId' value='<?php echo e($policyId); ?>'>
                             <?php echo e(Form::select('request_status',  $statusArray, $overviewData->endorsement_status,array('id' =>'request_status','required'=>'required','class'=>'required form-control','error-message' =>"Gender field is mandatory" ))); ?>  
                            </div>
                        </td>
                    </tr>
                    
                    
                    

                </tbody></table></div>
    <?php echo e(Form::close()); ?>

</script>
<script id='request_document_upload_template' type='text/template'>
<?php echo e(Form::open(array('route' => array('endorsementinvoicesave', $overviewData->id), 'name' => 'form_document_add','id'=>'form_document_add','files'=>'true' ))); ?>

    
    <div class="dialogform">
        <table class="insly_dialogform">
                <tbody><tr id="field_document_file" class="field"><td class=""><div class="label"><span class="text-danger icon-asterix"></span><span class="title">File</span></div></td><td><div class="element"><div><input type="file" id="document_file" name="document_file[]" multiple="multiple" onchange="FORM.validateFile($(this), 128, 'Maximum file upload size 128 MB exceeded!')"></div></div></td></tr>    <tr id="field_documenttype_oid" class="field ">
                        <td class="">
                            <div class="label ">
                                <span class="text-danger "></span>
                                <span class="title">Type</span>
                            </div>
                        </td>
                        <td>
                            <div class="element">
                                <input type='hidden' name='customer_id' value='<?php echo $overviewData->customer_id; ?>'>
                                <input type='hidden' name='policy_id' value='<?php echo e($policyId); ?>'>


                             <?php echo e(Form::select('documenttype_oid',[''=>'--- other ---'] +  $documentType, 11,array('id' =>'documenttype_oid','required'=>'required','class'=>'required form-control','error-message' =>"Gender field is mandatory" ))); ?>  
                            </div>
                        </td>
                    </tr>
                    <tr id="field_document_comment" class="field ">
                        <td class="">
                            <div class="label ">
                                <span class="text-danger "></span>
                                <span class="title">Comment</span>
                            </div>
                        </td>
                        <td>
                            <div class="element">
                                <input type="text" id="document_comment" name="document_comment" value="" autocomplete="off" maxlength="255" class="form-control">
                            </div>
                        </td>
                    </tr>
                    

                </tbody></table></div>
    <?php echo e(Form::close()); ?>

</script>

<script id='request_document_upload_edit_template' type='text/template'>
<?php echo e(Form::open(array('route' => array('endorsementcrmdocumentedit', $overviewData->id), 'name' => 'form_document_add','id'=>'form_document_add','files'=>'true' ))); ?>

    


    <div class="dialogform">
        <table class="insly_dialogform">
                <tbody>

                    <tr id="field_documenttype_oid" class="field">
                        <td class="">
                            <div class="label ">
                                <span class="text-danger "></span>
                                <span class="title">Type</span>
                            </div>
                        </td>
                        <td>
                            <div class="element">
                                <input type='hidden' name='customer_id' value='<?php echo $overviewData->customer_id; ?>'>
                                <input type='hidden' name='policy_id' value='<?php echo e($policyId); ?>'>
                                <input type='hidden' name='doc_id' value='<%= docId %>'>
                                 <input type='hidden' name='crm_id' value='<%= crmId %>'>
                             
                             <?php echo e(Form::select('documenttype_oid',[''=>'--- other ---'] +  $documentType, '',array('id' =>'documenttype_oid','required'=>'required','class'=>'required form-control','error-message' =>"Gender field is mandatory" ))); ?>  
                            </div>
                        </td>
                    </tr>
                    <tr id="field_document_comment" class="field ">
                        <td class="">
                            <div class="label ">
                                <span class="text-danger "></span>
                                <span class="title">Comment</span>
                            </div>
                        </td>
                        <td>
                            <div class="element">
                                <input type="text" id="document_comment" name="document_comment" value="<%= doccomment %>" autocomplete="off" maxlength="255" class="form-control">
                            </div>
                        </td>
                    </tr>
                    

                </tbody></table></div>
    <?php echo e(Form::close()); ?>

</script>

<script id='endorsement_rejected_template' type='text/template'>
    
 <?php echo e(Form::open(array('route' => array('rejectendorsement'), 'name' => 'form_endorsement_reject','id'=>'form_endorsement_reject','files'=>'true' ))); ?>


    <div class="dialogform"><table class="insly_dialogform">
                <tbody>                    
                    <tr id="field_reject_reason" class="field">
                  
                        <td>
                            
                           Reject reason
                                <input type='hidden' name='reject_endorsement_id' value="<?php echo e($overviewData->id); ?>">
                                    <input type="hidden" id="reject_policyId" name="reject_endorsement_policy_id" value="<?php echo e($policyId); ?>"  >
                 
                        </td>
                        <td>
                            <div class="element"><textarea id="reject_reason" name="reject_reason" wrap="soft" rows="4" autocomplete="off" maxlength="255" class="editor col-md-12 form-control" required error-message="Reject reason is mandatory"></textarea>
<span id="error-message" style="display:none">Reject reason is mandatory</span></div>

                            <td>
                    </tr>
                    
                    
                    

                </tbody></table></div>
    <?php echo e(Form::close()); ?>   
    
    
</script>

<script id='endorsement_issued_template' type='text/template'>
    
 <?php echo e(Form::open(array('route' => array('issueendorsement'), 'name' => 'form_endorsement_issue','id'=>'form_endorsement_issue','files'=>'true' ))); ?>


    <div class="dialogform"><table class="insly_dialogform">
                <tbody>                    
                    <tr id="field_request_type" class="field">
                  
                        <td>
                            
                            Do you really want to issue endorsement?.
                                <input type='hidden' name='endorsement_id' value="<%- endorsementId %>">
                                    <input type="hidden" id="policyId" name="endorsement_policy_id" value="<%- policyId %>"  >
                 
                        </td>
                    </tr>
                    
                    
                    

                </tbody></table></div>
    <?php echo e(Form::close()); ?>   
    
    
</script>


<?php $__env->stopSection(); ?>
<?php $__env->startSection('customcss'); ?>
<link rel="stylesheet" type="text/css" href=" <?php echo e(asset('elitedesign/dist/css/pages/ribbon-page.css')); ?> ">
<link rel="stylesheet" type="text/css" href=" <?php echo e(asset('elitedesign/assets/node_modules/datatables.net-bs4/css/dataTables.bootstrap4.css')); ?> ">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('elitedesign/assets/node_modules/datatables.net-bs4/css/responsive.dataTables.min.css')); ?>"> 

<?php $__env->stopSection(); ?>

       


<?php $__env->startSection('pagescript'); ?>

<script src="<?php echo e(asset('elitedesign/assets/node_modules/datatables.net/js/jquery.dataTables.min.js')); ?>"></script>
<script src="<?php echo e(asset('elitedesign/assets/node_modules/datatables.net-bs4/js/dataTables.responsive.min.js')); ?>"></script>


    
<script>
    var columnDefs = [];
    var columnDefs1 = [];
    var customerLogTable='';
    var customerdocumentTable ='';
    var policyId = <?php echo $policyId; ?>

    var customerId = <?php echo $overviewData->customer_id; ?>


      $(function(){
          
            
     
      //Edit document
      
      
      
      
    
    $(document).off('click','.dpib_endorsement_status_edit');
    $(document).on('click','.dpib_endorsement_status_edit',function(){
        var _this =$(this);
        var template = _.template($("#request_status_template").html());
        var data = {};
        var result = template(data);

            $("#db_quote_request_editpopup").remove();
                $('body').append('<div id="db_quote_request_editpopup" title="Update request status" style="display:none" >' + result + '</div>');
                var dialogElement = $("#db_quote_request_editpopup");

                dialogElement.dialog({
                    width: 900,
                    modal: true,
                    buttons: {
                        "Update": {
                            class: "btn waves-effect waves-light btn-rounded btn-success",
                            text:'Update',
                            click: function () {
                                DIB.progressDialog(LOCALE.get('DIB.COMMON.Progress.Loading'));
                                if($("#request_status").val() ==3) {

                                    rejectAction(_this);

                                } else {
                                  $("form#form_endorsement_status_edit").submit();  
                                }
                                
                             
                               
                               

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
                    },
                    open:function(){
                       

                    }
                });  
       
    });
    
    
    var fileName, fileExtension;
    
   
    
    columnDefs1.push({"name": 'filename',  "targets": 0, data: function (row, type, val, meta) {
                            var subject = row['file_name'];
                            row.sortData = row['file_name'];
                            if(row['endorsement_id'] !=null ) {
                            linkString = "<a href='<?php echo route('getCustomerDownload',['##CID','##PID','##FILE']); ?>'>" + subject + "</a>";
                            var link = linkString.replace("##CID", customerId).replace('##PID',policyId) .replace("##FILE", subject);
                           } else {
                            linkString = "<a href='<?php echo route('getCustomerDownload',['##CID','##PID','##FILE']); ?>'>" + subject + "</a>";
                            var link = linkString.replace("##CID", customerId).replace('##PID',0) .replace("##FILE", subject);
                           }
                             
                           
                            row.displayData = link;
                            return row;
                        }, render: {"_": 'sortData', "display": 'displayData', 'filter': 'sortData'}}); 
        columnDefs1.push({"name": "comment",  "targets": 1, "orderable": false,data: function (row, type, val, meta) {
                            var subject = row['comment'];
                            row.sortData = row['comment'];
                            row.displayData = subject;
                           
                            
                            return row;
                        }, render: {"_": 'sortData', "display": 'displayData', 'filter': 'sortData'}});
                    
        columnDefs1.push({"name": 'filetype',  "targets": 2,  data: function (row, type, val, meta) {
                            var subject = row['docType'];
                            row.sortData = row['docType'];
                            row.displayData = subject;                           
                            
                            return row;
                        }, render: {"_": 'sortData', "display": 'displayData', 'filter': 'sortData'}});            
                    
        columnDefs1.push({"name": 'Uploaded by',  "targets": 3, "orderable": false, data: function (row, type, val, meta) {
                            var subject = (row['dbroker_user']) ? row['dbroker_user']:row['uploadedBy'];
                            row.sortData = subject;
                            row.displayData = subject;
                           
                            
                            return row;
                        }, render: {"_": 'sortData', "display": 'displayData', 'filter': 'sortData'}});
                    
        columnDefs1.push({"name": 'Uploaded at',  "targets": 4,  data: function (row, type, val, meta) {
                            var subject = row['upload_at'];
                            row.sortData = row['upload_at'];
                            row.displayData = subject;
                           
                            
                            return row;
                        }, render: {"_": 'sortData', "display": 'displayData', 'filter': 'sortData'}});
        columnDefs1.push({"name": 'Edited at',  "targets": 5,  data: function (row, type, val, meta) {
                            var subject = row['edited_at'];
                            row.sortData = row['edited_at'];
                            row.displayData = subject;
                           
                            
                            return row;
                        }, render: {"_": 'sortData', "display": 'displayData', 'filter': 'sortData'}});                
                    
         columnDefs1.push({"name": 'actions',  "targets": 6, "orderable": false, data: function (row, type, val, meta) {
                            var subject = '-';                           
                            
                              fileName = row['file_name'];
                              fileExtension = fileName.substr((fileName.lastIndexOf('.') + 1));
                              var extensionArray = ['jpeg','pdf','jpg','png'];
                              var displayAction = '<a class="dpib_endorsement_document_edit dib-cursor-style" docId=' + row['docId'] + ' customerId =' + customerId + ' ><span class="fas fa-edit text-blue mr-right" data-toggle="tooltip" title="" data-original-title="Edit document info" data-placement="left"></span></a>' + '<a class="dpib_document_delete dib-cursor-style" docId=' + row['docId'] + ' customerId =' + customerId + '><span class="fas fa-archive text-blue" data-toggle="tooltip" title="" data-original-title="Delete document" data-placement="left"></span></a>';
                            
                            if(jQuery.inArray(fileExtension.toLowerCase(), extensionArray) !== -1){
                               var link ='<a href="<?php echo url("/"); ?>/uploads/'+customerId+'/document/'+policyId+'/'+ fileName +'" class="dib-cursor-style"  target="_blank" style="margin-left:3px"><span class="fas fa-eye text-blue mr-right" data-toggle="tooltip" title="" data-original-title="Preview file" data-placement="left"></span></a>';
                              displayAction += link; 
                            }
                              row.displayData =displayAction; 
                            
                            return row;
                        }, render: {"_": 'sortData', "display": 'displayData', 'filter': 'sortData'}});
    
    
    
    
    
   customerdocumentTable = $('.dpib_request_doc').DataTable( {
                data: <?php echo $documentDetails; ?>,
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
                order: [[5, "desc"]],
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
                dom: "Bfrtip"
     
    } ); 
    
    
    
    
     $(document).off('click','.dpib_endorsement_crm_document_add');
    $(document).on('click','.dpib_endorsement_crm_document_add',function(){
        var template = _.template($("#request_document_upload_template").html());
        var data = {};
        var result = template(data);

            $("#db_endorsement_request_docpopup").remove();
                $('body').append('<div id="db_endorsement_request_docpopup" title="Add document" style="display:none" >' + result + '</div>');
                var dialogElement = $("#db_endorsement_request_docpopup");

                dialogElement.dialog({
                    width: 900,
                    modal: true,
                    buttons: {
                        "Add": {
                           class: "btn waves-effect waves-light btn-rounded btn-success",
                            text:'Add',
                            click: function () {
                                DIB.progressDialog(LOCALE.get('DIB.COMMON.Progress.Loading'));

                               $("form#form_document_add").submit();
                               

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
       
    });
    
        
     //Edit document

                $(document).off('click', '.dpib_endorsement_document_edit');
                $(document).on('click', '.dpib_endorsement_document_edit', function(){

                var documentId = $(this).attr('docId');
                var customerId = $(this).attr('customerId');
                var linkString = '<?php echo route("customerdocedit",["##customerId##","##docId##"]); ?>';
                var link = linkString.replace("##customerId##", customerId).replace("##docId##", documentId);
                $.ajax({
                url: link,
                        type: "GET"

                }).done(function (data) {
                if (data.status) {

                $("#dp_edit_selected_doc").remove();
                $('body').append('<div id="dp_edit_selected_doc" title="Edit document"  >' + data.content + '</div>');
                var dialogElement = $("#dp_edit_selected_doc");
                dialogElement.dialog({
                width: 500,
                        resizable: false,
                        bgiframe: true,
                        modal: true,
                        buttons: {

                        "Edit": {
                        class: "primary dp_document_data_edit btn waves-effect waves-light btn-rounded btn-success",
                                text:"Edit",
                                click: function () {
                                $.ajax({
                                url: $('form#form_document_edit').attr('action'),
                                        headers: {
                                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                        },
                                        data :{'documenttype_oid':$('#documenttype_oid').val(), 'document_comment':$('#document_comment').val()}

                                }).done(function(data) {
                                if (data.status) {
                                dialogElement.dialog('close');
                                dialogElement.remove();
                                //loading document datatable once more
                                location.reload(true);
                                DIB.progressDialog(LOCALE.get('DIB.COMMON.Progress.Loading'));
                                DIB.closeProgressDialog();
                                }
                                })

                                }
                        },
                                "cancel":   {
                                class: "btn waves-effect waves-light btn-rounded btn-danger",
                                text:"Cancel",
                                        click: function () {
                                        dialogElement.dialog('close');
                                        dialogElement.remove();
                                        }
                                }

                        },
                        close: function (event, ui) {

                        }
                });
                }
                });
                })

//DELETE DOCUMENT
 $(document).off('click', '.dpib_document_delete');
                $(document).on('click', '.dpib_document_delete', function(){
              var customerId = $(this).attr('customerId');
                var removeId = $(this).attr('docId');

   var linkString = '<?php echo route("customerdocdelete",["##customerId##"]); ?>';
                var link = linkString.replace("##customerId##", customerId)

                 $("#db_quote_request_editpopup").remove();
                $('body').append('<div id="db_quote_request_editpopup" title="Delete document" style="display:none" > Do you realy want to delete this document?</div>');
                var dialogElement = $("#db_quote_request_editpopup");

                dialogElement.dialog({
                    width: 900,
                    resizable: false,
                    bgiframe: true,
                    modal: true,
                    buttons: {
                        "Delete": {
                            class: "btn waves-effect waves-light btn-rounded btn-success",
                            text:"Delete",
                            click: function () {
                                DIB.progressDialog(LOCALE.get('dib.common.progress.loading'));
                                 $.ajax({
                url: link,
                        headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        data :{'docId':removeId}
                }).done(function (data) {
                if (data.success) {
                location.reload(true);
                }
                });
                              

                            }
                        },
                        "cancel": {
                            class: "btn waves-effect waves-light btn-rounded btn-danger",
                            text:"cancel",
                            click: function () {
                                dialogElement.dialog('close');
                                dialogElement.remove();
                            }
                        }
                    }
                });               

            
                  DIB.centerDialog();              
                
                
                
                });

//Endorsement edit

                 $(document).off('click','.dpib_endorsement_edit');
    $(document).on('click','.dpib_endorsement_edit',function(){    
    
     var link = $(this).attr("editUrl");
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
                                 var regex = /^\$?(([1-9][0-9]{0,2}([0-9]{3})*)|[0-9]+)?(.[0-9]{0,4})?$/;
                                                                                                    var test = $("#policy_endorsement_premium").val();
                                                                                                    if(regex.test(test) === false){                                                                                                       
                                                                                                        $("#policy_endorsement_premium").addClass('form-control-danger');
                                                                                                        $("#policy_endorsement_premium").parent('.element').addClass('has-danger')
                                                                                                           return; 
                                                                                                        }
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
          
    });

      $(document).off('click','.dpib_endorsement_issue');
      $(document).on('click','.dpib_endorsement_issue',function(){   
    var _this =$(this);
        approveAction(_this);
        
        
        
        
        })
        
        $(document).off('click','.dpib_endorsement_reject');
       $(document).on('click','.dpib_endorsement_reject',function(){   
      var _this =$(this);
        rejectAction(_this);
        
        
        
        
        })
    
    

  
    
    
      });          

</script>
<script>
    function rejectAction(_this) {

var template = _.template($("#endorsement_rejected_template").html());
     
                var result = template({'endorsementId':_this.attr('endorsement_id'),'policyId':_this.attr('policy_id')});
                $("#db_endorsement_issued_popup").remove();
                $('body').append('<div id="db_endorsement_issued_popup" title="Reject policy endorsement" style="display:none" >' + result + '</div>');
                var dialogElement = $("#db_endorsement_issued_popup");
                dialogElement.dialog({
                    width: 900,
                   
                    modal: true,
                    buttons: {
                        "Issue": {
                            class: "btn waves-effect waves-light btn-rounded btn-success",
                            text:"Reject",
                            click: function () {
                               $("#field_reject_reason").find('.element').removeClass('has-danger');
                               $("#error-message").hide();

                                if($.trim($("#reject_reason").val()) =='') {
                                    $("#field_reject_reason").find('.element').addClass('has-danger');
                                    $("#error-message").show();
                                
                                    return false;
                                }
                                  $(".preloader").show();                               
                                    
                                    $("form#form_endorsement_reject").submit();
                                  
                                
                            }
                        },
                        "cancel": {
                            class: "btn waves-effect waves-light btn-rounded btn-danger",
                                    text:"cancel",
                            click: function () {
                                dialogElement.dialog('close');
                                dialogElement.remove();
                            }
                        }
                    }
                });
                DIB.centerDialog();
                
           }//new
           
           function approveAction (_this) {
           var template = _.template($("#endorsement_issued_template").html());
     
     console.log($(this).attr('endorsement_id'),$(this).attr('policy_id'));
                var result = template({'endorsementId':_this.attr('endorsement_id'),'policyId':_this.attr('policy_id')});
                $("#db_endorsement_issued_popup").remove();
                $('body').append('<div id="db_endorsement_issued_popup" title="Issue policy endorsement" style="display:none" >' + result + '</div>');
                var dialogElement = $("#db_endorsement_issued_popup");
                dialogElement.dialog({
                    width: 900,
                   
                    modal: true,
                    buttons: {
                        "Issue": {
                            class: "btn waves-effect waves-light btn-rounded btn-success",
                            text:"Issue",
                            click: function () {
                                $(".preloader").show();
                                
                                    $("#endorsement_number").removeClass('error');
                                    $("form#form_endorsement_issue").submit();
                                    $("#endorsement_number").removeClass('error');
                                
                            }
                        },
                        "cancel": {
                            class: "btn waves-effect waves-light btn-rounded btn-danger",
                                    text:"cancel",
                            click: function () {
                                dialogElement.dialog('close');
                                dialogElement.remove();
                            }
                        }
                    }
                });
                DIB.centerDialog();
        
        }
   
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.elite_fullwidth',['sidemenustatus' => array(),'countDetails'=>array(),'notificationCount'=>array() ] , \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Xampp_new\htdocs\inslyportal\resources\views/Endorsement/overviewEndorsement.blade.php ENDPATH**/ ?>