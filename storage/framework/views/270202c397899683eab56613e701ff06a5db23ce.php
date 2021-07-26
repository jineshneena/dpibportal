<?php $__env->startSection('overviewmenu'); ?>
 <ul id="page-content-menu" class="list-inline pull-right" style="display:none">
  
                    <li data-url="<?php echo e(route('updatecrmrequestnotificationflag', ['quote',$crmDetails->mainId,$crmDetails->quotes_notification_flag])); ?>" class="dpib_request_flag_change">

<button type="button" class="btn waves-effect waves-light btn-rounded btn-success"> <?php if($crmDetails->quotes_notification_flag==1): ?> Disable quotes notification  <?php else: ?> Enable quotes notification  <?php endif; ?></button>
                      

                    </li>
                    
 </ul>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>


<!--                  content here  -->
<!--TAB AREA-->
<div class="row">
    
           <?php $__env->startSection('headtitle'); ?>
         <a href='<?php echo e(route('customeroverview',$crmDetails->customerId)); ?>'><?php echo e(ucfirst(trans($crmDetails->customerName))); ?></a> <i class="fas fa-angle-double-right"></i><span class='text-blue' style='font-size:25px'><?php echo e($crmDetails->crm_request_id); ?> </span>
<?php $__env->stopSection(); ?>
   
           <div class="col-md-12 card">
        
        
        <ul class="nav nav-tabs" role="tablist">
                                <li id="tab_overview" class="nav-item" onclick="TAB.select('overview', null, 1)"> <a class="nav-link <?php echo e(empty($overviewTab) || $overviewTab == 'overview' ? 'active' : ''); ?>" data-toggle="tab" href="#content_overview" role="tab" aria-selected="true"><span class="hidden-sm-up"><i class="ti-home"></i></span> <span class="hidden-xs-down">Overview</span></a> </li>
                                <li id="tab_document" class="nav-item" onclick="TAB.select('document', '<?php echo e(route('customercrmdocuments',[$crmDetails->customerId, $crmDetails->mainId])); ?>', 0)"> <a class="nav-link <?php echo e(empty($overviewTab) || $overviewTab == 'document' ? 'active' : ''); ?>" data-toggle="tab" href="#content_document" role="tab" aria-selected="false"><span class="hidden-sm-up"><i class="ti-email"></i></span> <span class="hidden-xs-down">Documents (<?php echo e($docCount); ?>)</span></a> </li>
                               <?php if( in_array('ROLE_TECHNICAL_MANAGER', Auth::user()->roles) || in_array('ROLE_TECHNICAL', Auth::user()->roles)   ): ?>
                                <li id="tab_brokingslip" class="nav-item" onclick="TAB.select('brokingslip', '<?php echo e(route('brokingsliplist',[$crmDetails->customerId, $crmDetails->mainId])); ?>', 0)"> <a class="nav-link <?php echo e(empty($overviewTab) || $overviewTab == 'brokingslip' ? 'active' : ''); ?>" data-toggle="tab" href="#content_brokingslip" role="tab" aria-selected="false"><span class="hidden-sm-up"><i class="ti-user"></i></span> <span class="hidden-xs-down">Broking slip (<?php echo e($brokingslipCount); ?>)</span></a> </li>
                                
                                <?php endif; ?>
                                 <li id="tab_policy" class="nav-item" onclick="TAB.select('policy', null, 1)"> <a class="nav-link <?php echo e(empty($overviewTab) || $overviewTab == 'policy' ? 'active' : ''); ?>" data-toggle="tab" href="#content_policy" role="tab" aria-selected="false"><span class="hidden-sm-up"><i class="ti-email"></i></span> <span class="hidden-xs-down">Policy</span></a> </li>
                                <li id="tab_log" class="nav-item" onclick="TAB.select('log', '<?php echo e(route('crmrequestlogdata', $crmDetails->mainId)); ?>', 0)"> <a class="nav-link <?php echo e(empty($overviewTab) || $overviewTab == 'log' ? 'active' : ''); ?>" data-toggle="tab" href="#content_log"  role="tab" aria-selected="false"><span class="hidden-sm-up"><i class="ti-email"></i></span> <span class="hidden-xs-down">Log</span></a> </li>
                                
        </ul>
        

    </div>
   
    
    
</div>
<!--TAB CONTENT AREA-->
<div class="row card  ribbon-wrapper-reverse">
    <div class="ribbon ribbon-bookmark ribbon-right ribbon-info"><i class="ti-hand-point-right"></i>&nbsp;<?php echo e($crmDetails->statusString); ?></div>
    

    
    
    
    <div class="col-md-12 tab-content tabcontent-border">
        <div id="content_overview" class="tabcontent col-md-12 card-body" >
            <div class="row" >
<div class="col-md-12 row button-group">
                                    <div class="col-lg-4 col-xlg-4 mb-4" style='margin-left: 24px;'>
                        
                                <?php if(in_array('ROLE_TECHNICAL_MANAGER', Auth::user()->roles) || in_array('ROLE_SALES_MANAGER', Auth::user()->roles)  || Auth::user()->id == $crmDetails->user_id || Auth::user()->id == $crmDetails->assigned_to): ?>
                          
                                <button type="button" class="btn btn-success btn-rounded dpib_request_edit dib-cursor-style" editUrl='<?php echo route("getquoterequesteditform",[$crmDetails->customerId,$crmDetails->mainId]); ?>' data-toggle="tooltip" title="" data-original-title="Edit CRM"><i class="fas fa-edit"></i> Edit</button>
                        
                                <?php endif; ?>
                                <?php if(in_array('ROLE_TECHNICAL_MANAGER', Auth::user()->roles) ): ?>
                               
                                    
                                <button type="button" class="btn btn-success btn-rounded dpib_sales_crm_assign dib-cursor-style" data-toggle="tooltip" title="" data-original-title="Assign request"><i class="fas fa-handshake"></i>Assign</button>
                                <?php elseif($crmDetails->type ==3  &&(in_array('ROLE_OPERATION_MANAGER', Auth::user()->roles) || in_array('ROLE_OPERATION_LEAD', Auth::user()->roles))): ?>
                                                  <button type="button" class="btn btn-success btn-rounded dpib_sales_crm_assign dib-cursor-style"" data-toggle="tooltip" title="" data-original-title="Assign request"><i class="fas fa-handshake"></i>Assign</button>
                                <?php endif; ?>
                                <?php if(in_array('ROLE_SALES_MANAGER', Auth::user()->roles)): ?>
                                  
                                <button type="button" class="btn btn-success btn-rounded dpib_crm_request_delete dib-cursor-style" data-toggle="tooltip" title="" data-original-title="Delete CRM" delete_url='<?php echo route("removecrmrequest",[$crmDetails->customerId, $crmDetails->mainId]); ?>' return-url='<?php echo route("salescrmlist"); ?>' ><i class="fas fa-archive"></i> Delete</button>
                                
                                <?php endif; ?>
                                <button type="button" class="btn btn-success btn-rounded dpib_crm_request_reciepient dib-cursor-style" data-toggle="tooltip" title="" data-original-title="Mail reciepients"  ><i class="fas fa-envelope-open"></i>&nbsp;Mail reciepients</button>
                             
                                
                                
                             
                

                         
                                    </div>
    
    <div class="col-lg-8 col-xlg-8 mb-4" style='text-align:right;margin-left:-126px;'>
 
            <?php if($crmDetails->status !=9): ?>
         
                                <?php if(in_array('ROLE_TECHNICAL_MANAGER', Auth::user()->roles) || in_array('ROLE_SALES_MANAGER', Auth::user()->roles)|| in_array('ROLE_OPERATION_SUPERVISER', Auth::user()->roles) || in_array('ROLE_OPERATION_MANAGER', Auth::user()->roles) || in_array('ROLE_OPERATION', Auth::user()->roles) ||  Auth::user()->id == $crmDetails->assigned_to || Auth::user()->id == $crmDetails->user_id ): ?>
                                               
                                                   <?php echo e(Form::open(array('route' => array('customercrmstatusedit', $crmDetails->customerId,$crmDetails->mainId), 'name' => 'form_crm_status_edit','id'=>'form_crm_status_edit','files'=>'true' ))); ?>

                                                       
                                                        <?php
                                                        $iCount =1;
                                                        ?>
                                                       <?php $__currentLoopData = $statusArray; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$statusdetail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <?php if($crmDetails->status !=$key): ?>
                                                                <?php if($iCount ==4): ?>
                                                                            <div class="btn-group">
                                                                             <button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                                       More
                                                                            </button>
                                                                                <div class="dropdown-menu">
                                                                                    <a class="dropdown-item dpib-status-change" href="javascript:void(0)" data-status='<?php echo e($key); ?>'><?php echo e($statusdetail); ?></a>
                                                          
                                                                <?php elseif($iCount >4): ?>
                                                                    <a class="dropdown-item dpib-status-change" href="javascript:void(0)" data-status='<?php echo e($key); ?>'><?php echo e($statusdetail); ?></a>  
                                                                  
                                                                <?php else: ?>
                                                                    <button class="btn btn-success btn-rounded dpib-status-change" type="button" data-status='<?php echo e($key); ?>'><?php echo e($statusdetail); ?></button> 
                                                                <?php endif; ?>
                                                             
                                                                <?php
                                                                    $iCount = $iCount +1;                                                     
                                                                ?>
                                                                                                                      
                                                            <?php endif; ?>
                                                            <?php if( $loop->last && count($statusArray)>3): ?>
                                                                
                                                                  </div>
                                                              </div>
                                                        
                                                            <?php endif; ?>
                                                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                      <input type='hidden' name='crm_status' class="crm_status" value='<?php echo e($crmDetails->status); ?>' />
                                                      
                                                       <?php echo e(Form::close()); ?>

                                        
                                               
                                                  
                                              
                                    <?php elseif($crmDetails->type ==3  &&(in_array('ROLE_OPERATION_MANAGER', Auth::user()->roles) || in_array('ROLE_OPERATION_LEAD', Auth::user()->roles) ||  Auth::user()->id == $crmDetails->assigned_to) ): ?>
                                               

                                                    <?php echo e(Form::open(array('route' => array('customercrmstatusedit', $crmDetails->customerId,$crmDetails->mainId), 'name' => 'form_crm_status_edit','id'=>'form_crm_status_edit','files'=>'true' ))); ?>

                                                       
                                                                <?php
                                                                $iCount =1;
                                                                ?>
                                                               <?php $__currentLoopData = $statusArray; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$statusdetail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                    <?php if($crmDetails->status !=$key): ?>
                                                                     <?php if($iCount ==3): ?>
                                                                        <div class="btn-group">
                                                                            <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                                     More
                                                                            </button>
                                                                          <div class="dropdown-menu">
                                                                              <a class="dropdown-item dpib-status-change" href="javascript:void(0)" data-status='<?php echo e($key); ?>'><?php echo e($statusdetail); ?></a>
                                                                        <?php elseif($iCount >3 && $loop->last): ?>
                                                                            <a class="dropdown-item dpib-status-change" href="javascript:void(0)" data-status='<?php echo e($key); ?>'><?php echo e($statusdetail); ?></a>
                                                                              </div>
                                                                             </div>
                                                                        <?php elseif($iCount >3): ?>
                                                                            <a class="dropdown-item dpib-status-change" href="javascript:void(0)" data-status='<?php echo e($key); ?>'><?php echo e($statusdetail); ?></a>  

                                                                        <?php else: ?>
                                                                                <button class="btn btn-success btn-rounded dpib-status-change" type="button" data-status='<?php echo e($key); ?>'><?php echo e($statusdetail); ?></button> 
                                                                       <?php endif; ?>

                                                                                    <?php
                                                                                        $iCount+1;                                                     
                                                                                    ?>

                                                                <?php endif; ?>
                                                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                      
                                                        <input type='hidden' name='crm_status' class="crm_status" value='<?php echo e($crmDetails->status); ?>' />
                                                      
                                                      
                                                    <?php echo e(Form::close()); ?>


                                      
                                <?php endif; ?>  
                                                
            <?php endif; ?>  
    </div>
    
</div>            
                <div id="main-content" class="col-md-5" >
                               <div id="panel-customer_overview" class="panel panel-default open">
                      
                        
                        
                        <div class="panel-heading">
                            <h3 class="panel-title">Request info</h3></div>
                        <div id="customer_overview" class="panel-collapse panel-body">
                            <table class="info-table" width='100%'>
                                <tbody>
                                    
                                    <tr><td>CRM No:</td><td><b><?php echo e($crmDetails->crm_request_id); ?></b></td></tr>
                                    <tr><td>Customer:</td><td><b class='bg-cyan'><?php echo e(ucfirst(trans($crmDetails->customerName))); ?></b></td></tr>
                                    <tr><td>CRM Type:</td><td>
                                           
                                        <?php if($crmDetails->type == 0): ?>
                                          <?php echo e('Task'); ?>

                                        <?php elseif($crmDetails->type == 1): ?>
                                          <?php echo e('Request'); ?>

                                        <?php else: ?>
                                         <span class='capital-first font-bold text-danger'>Renewal</span> 
                                        <?php endif; ?>
                                        </td></tr>
                                     <?php if($crmDetails->type == 2): ?>
                                     <tr><td>Policy:</td><td><a href='<?php echo route("policyoverview",[$crmDetails->policyId]); ?>'><?php echo e($crmDetails->policy_number); ?></a></td></tr>
                                    <?php endif; ?>
                                    <tr><td>Line of business:</td><td><?php echo e($crmDetails->lineofbusinesstitle); ?></td></tr>  
                                     


                                    <tr><td>Created By:</td><td><?php echo e($crmDetails->userName); ?></td></tr>
                                    <tr><td>Created date:</td><td><?php echo e(date("d.m.Y h:i",strtotime($crmDetails->created_date))); ?></td></tr>
                                    
                                   
                                        <tr><td>Assigned to:</td><td><?php echo e($crmDetails->assignedName); ?></td></tr>
                                  
                                    <tr><td>Priority:</td><td><?php echo e($crmDetails->priorityString); ?></td></tr>
                                      <?php if($crmDetails ->type ==1 || $crmDetails ->type ==3): ?>
                                                  
                                        <tr><td>Description:</td><td><?php echo e($crmDetails->description); ?></td></tr>  
                                      <?php else: ?>               
                                        <tr><td>Subject:</td><td><?php echo e($crmDetails->subject); ?></td></tr>
                                        <tr><td>Attendees:</td><td><?php echo e($crmDetails->attendees); ?></td></tr> 
                                        <tr><td>Location:</td><td><?php echo e($crmDetails->location); ?></td></tr> 
                                        <tr><td>Reminder:</td><td><?php echo e(($crmDetails->reminder == 1) ? 'Yes' : 'No'); ?>  </td></tr>
                                         <?php if($crmDetails->repeat_flag ==1): ?>
                                            <tr><td>Repeat date:</td><td><?php echo e(date("d.m.Y h:i",strtotime($crmDetails->repeat_date))); ?></td></tr>
                                         <?php endif; ?>  
                                     <?php endif; ?> 
                                     <tr ><td>Does policy schedule is needed?</td><td><div class="custom-control custom-switch">
  <input type="checkbox" changeUrl='<?php echo route("changepolicyscheduleflag",[$crmDetails->customerId,$crmDetails->mainId]); ?>' class="custom-control-input" id="customSwitch1" <?php if($crmDetails->policy_schedule_flag ==1): ?>   checked <?php endif; ?> >
  <label class="custom-control-label" for="customSwitch1"></label>
</div></td></tr>

<?php if($crmDetails->policy_schedule_flag ==0): ?>  
<tr><td>Reason:</td><td><?php echo e($crmDetails->policy_schedule_reason); ?></td></tr>

<?php endif; ?>

                                  

                                        <tr><td>Status:</td><td><a><?php echo e($crmDetails->statusString); ?></a></td></tr>
                                        <tr><td>Technical reporting date:</td><td class="phoneNumber"><?php echo e(($crmDetails->technical_reporting_date !=null)? date("d.m.Y",strtotime($crmDetails->technical_reporting_date)):''); ?></td></tr>
                                        <tr><td>Last modified date:</td><td class="phoneNumber"><?php echo e(date("d.m.Y h:i",strtotime($crmDetails->updated_date))); ?></td></tr>
                                        <tr><td>Next notification date:</td><td class="phoneNumber"><?php echo e(($crmDetails->notification_start_date !=null)? date("d.m.Y",strtotime($crmDetails->notification_start_date)):''); ?></td></tr>
                                        <?php if($crmDetails ->type ==1 && $crmDetails ->status==5): ?>
                                            <tr><td>Revise reason</td><td class="phoneNumber"><?php echo e($crmDetails->revise_reason); ?></td></tr>
                                        <?php endif; ?> 
                                        <?php if($crmDetails ->type ==1 && $crmDetails ->status==8): ?>
                                            <tr><td>Reject reason:</td><td><?php echo e($crmDetails->reject_reason); ?></td></tr>
                                        <?php endif; ?> 
                                        
                                        <?php if($crmDetails ->comments !=''): ?>
                                            <tr><td>Comments:</td><td><?php echo e($crmDetails ->comments); ?></td></tr>
                                        <?php endif; ?>
                                   
                                </tbody>
                            </table>
                        </div>
                      </div>


                </div>
                <aside class="col-md-6">
                           
                    
                    
                    <div id="panel-entries-block" class="panel panel-default open">
                      
                         <div class="panel-heading">
                            <?php if( in_array('ROLE_TECHNICAL_MANAGER', Auth::user()->roles) || in_array('ROLE_TECHNICAL', Auth::user()->roles)   ): ?>
                            <ul class="panel-actions list-inline pull-right">
                                <li class="dpib_crm_quote_add dib-cursor-style"><span class="panel-action-add"  data-toggle="tooltip" title="Upload a quote"><span class="fas fa-plus text-blue"></span></span></li>
                                
                            </ul>
                            <?php endif; ?>
                            <h3 class="panel-title">Quote list</h3>
                        </div>
                        <div id="entries-block" class="panel-collapse panel-body">
                            
                             <?php if( $quotes ->count() >0): ?> 
                              <table class="table table-hovered table-bordered table-striped" id="brokenslip_entries-list" style="table-layout: fixed;">
                                <thead>
                                    <tr>
                                        <th style="width: 20%;">Filename</th>
                                        <th style="width: 10%;">Company</th>
                                        <th style="width: 8%;">Uploaded date</th>
                                         <th style="width: 8%;">Policy</th>
                                        <th style="width: 10%;">Action</th>
                                    </tr>
                                </thead>
                                <thead>
                                       <?php $__currentLoopData = $quotes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $quote): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                      <tr class="datarow">
                                          <td class="nohover"><a href='<?php echo route("getfiledownload",[$crmDetails->customerId,"quote",$crmDetails->mainId,$quote->file_name,0]); ?> '><?php echo e($quote->file_name); ?></a></td>
                                          <td class="nohover"><?php echo e($quote->insurer_name); ?></td>
                                          <td class="nohover"><?php echo e(date("d.m.Y h:i",strtotime($quote->created_at))); ?></td>
                                          <td class="nohover">
                                              <?php if(isset($quote->policy_number)): ?>
                                              <a href='<?php echo route("policyoverview",$quote->policy_id); ?> '><?php echo e($quote->policy_number); ?></a>
                                              <?php endif; ?>
                                              </td>
                                          <td class="nohover"> 
                                              <a href='<?php echo route("viewfile",[$crmDetails->customerId,"quote",$crmDetails->mainId,$quote->file_name]); ?> ' target='_blank'><span class="fas fa-eye text-blue mr-right" data-toggle="tooltip" title="" data-original-title="View quotes"></span></a>
                                              <a class="dpib_brokingslip_sendmail" openUrl='<?php echo route("sendquotespopup",[$crmDetails->customerId,$crmDetails->mainId,$quote->mainId,"quote"]); ?>' data-title="Send quote"><span class="fas fa-envelope text-blue mr-right" data-toggle="tooltip" title="" data-original-title="Send email" ></span></a>
                                              <a class="dpib_brokingslip_sendmail" openUrl='<?php echo route("addpolicy",[$crmDetails->customerId,$crmDetails->mainId,$quote->mainId]); ?>' data-title="Add policy" href='<?php echo route("addpolicy",[$crmDetails->customerId,$crmDetails->mainId,$quote->mainId]); ?>'><span class="fas fa-plus text-blue" data-toggle="tooltip" title="" data-original-title="Add policy" ></span></a>
                                              <?php if(in_array('ROLE_TECHNICAL_MANAGER', Auth::user()->roles) || in_array('ROLE_TECHNICAL', Auth::user()->roles)): ?>  
                                              <?php if($quote->display_flag==0): ?>
                                              <a class="dpib_quote_salesview" openUrl='<?php echo route("displayquote",[$crmDetails->customerId,$crmDetails->mainId,$quote->mainId]); ?>' data-title="Add policy" href='#' action-type="1" ><span class="mdi mdi-account-off text-red" data-toggle="tooltip" title="" data-original-title="Enable sales display" ></span></a>
                                              <?php else: ?>
                                              <a class="dpib_quote_salesview" openUrl='<?php echo route("displayquote",[$crmDetails->customerId,$crmDetails->mainId,$quote->mainId]); ?>' data-title="Add policy" href='#' action-type="0" ><span class="mdi mdi-account text-blue" data-toggle="tooltip" title="" data-original-title="disable sales display" ></span></a>
                                              <?php endif; ?>
                                              <?php endif; ?>
                                          </td>
                                      </tr>
                                  
                                 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                   
                                </thead>
                            </table>
                             
                             
                             <?php endif; ?>
                            

                        </div>
                    </div>
                    
                    
                    
             
                    
                    
                    
                    
                    
                    <div id="panel-entries-block" class="panel panel-default open">
                        <div class="panel-heading">
                            <?php if( in_array('ROLE_TECHNICAL_MANAGER', Auth::user()->roles) || in_array('ROLE_TECHNICAL', Auth::user()->roles)   ): ?>
                            <ul class="panel-actions list-inline pull-right">
                                <li ><a href="<?php echo e(route("createcomparisondoc",[$crmDetails->customerId,$crmDetails->mainId])); ?>" class="btn waves-effect waves-light btn-rounded btn-success">Create comparison list</a></li> 
                                <li class="dpib_customer_crm_comparisondoc_add dib-cursor-style"><span class="panel-action-add"  data-toggle="tooltip" title="Add a document"><span class="fas fa-plus text-blue"></span></span></li>
                                
                            </ul>
                            <?php endif; ?>
                            <h3 class="panel-title">Comparison documents</h3>
                        </div>
                        <div id="entries-block" class="panel-collapse panel-body">
                            
                             <?php if( $comparisonfiles ->count() >0): ?> 
                              <table class="table table-hovered table-bordered table-striped" id="brokenslip_entries-list" style="table-layout: fixed;">
                                <thead>
                                    <tr>
                                        <th style="width: 30%;">Filename</th>                                       
                                        <th style="width: 8%;">Uploaded date</th>
                                        <th style="width: 10%;">Action</th>
                                    </tr>
                                </thead>
                                <thead>
                                       <?php $__currentLoopData = $comparisonfiles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comparisonfile): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                      <tr class="datarow">
                                          <td class="nohover"><a href='<?php echo route("getfiledownload",[$crmDetails->customerId,"comparison",$crmDetails->mainId,$comparisonfile->filename,0]); ?> '><?php echo e($comparisonfile->filename); ?></a></td>
                                          <td class="nohover"><?php echo e(date("d.m.Y h:i",strtotime($comparisonfile->uploaded_at))); ?></td>
                                          <td class="nohover"> 
                                              <a href='<?php echo route("viewfile",[$crmDetails->customerId,"comparison",$crmDetails->mainId,$comparisonfile->filename]); ?> ' target='_blank'><span class="fas fa-eye text-blue mr-right" data-toggle="tooltip" title="" data-original-title="View comparison doc"></span></a>
                                              <a class="dpib_brokingslip_sendmail" openUrl='<?php echo route("sendquotespopup",[$crmDetails->customerId,$crmDetails->mainId,$comparisonfile->mainId,"comparison"]); ?>' data-title="Send comparison document"><span class="fas fa-envelope text-blue" data-toggle="tooltip" title="" data-original-title="Send email" ></span></a>
                                              
                                          </td>
                                      </tr>
                                  
                                 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                   
                                </thead>
                            </table>
                             
                             
                             <?php endif; ?>
                            

                        </div>
                    </div>
                    
                    <?php if(count($reciepientDetails['details']) >0): ?> 
                    
                       
                    <div id="panel-customer_comments" class="panel panel-default open"><div class="panel-heading">
                     <h3 class="panel-title">Reciepient list</h3></div>
                        <div id="customer_overview" class="panel-collapse panel-body fixed-table-header">
                            <table class="info-table table-striped table table-hover" width='100%'>
                                <tbody>
                                  

                                  <?php $__currentLoopData = $reciepientDetails['details']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $reciepient): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                      <td style='width:35%'>
                                        <span class='text-warning'> <?php echo e($reciepient->name); ?> </span><br/>                                        
                                       
                                      </td>
                                      <td><span ><i> <?php echo e($reciepient->email); ?></i></span></td>
                                    </tr>
                                          
                                   <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                         
                                   
                                </tbody>
                            </table>
                        </div>
                      </div>
                    
                    <?php endif; ?>
                    
                    
                    
                    <div id="panel-customer_comments" class="panel panel-default open"><div class="panel-heading">
                            <ul class="panel-actions list-inline pull-right">

                                <li class="dpib_comment_add" ><span class="fas fa-plus text-blue" data-toggle="tooltip" title="" data-original-title="Add Comments"></span></li>


                            </ul><h3 class="panel-title">Comments</h3></div>
                        <div id="customer_overview" class="panel-collapse panel-body fixed-table-header">
                            <table class="info-table table-striped table table-hover" width='100%'>
                                <tbody>
                                  

                                  <?php $__currentLoopData = $commentDetails; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $commentDetail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                      <td style='width:35%'>
                                        <span class='text-warning'> <?php echo e($commentDetail->createdBy); ?> </span><br/>
                                        <span  class="text-warning"><?php echo e(date('m.d.Y h:i A',strtotime($commentDetail-> created_at))); ?></span><br />
                                       
                                      </td>
                                      <td><span ><i> <?php echo e($commentDetail->comments); ?></i></span></td>
                                    </tr>
                                          
                                   <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                         
                                   
                                </tbody>
                            </table>
                        </div>
                      </div>

                </aside>



            </div>
        </div>
        <div id="content_document" class="tabcontent col-12"  style="display:none" rel="<?php echo e(route('customercrmdocuments',[$crmDetails->customerId, $crmDetails->mainId])); ?>" >
           
            Document display area

        </div>
        
         <div id="content_brokingslip" class="tabcontent col-12"  style="display:none" rel="<?php echo e(route('brokingsliplist',[$crmDetails->customerId, $crmDetails->mainId])); ?>" >
           
            Broking slip display area

        </div>
        
        

        <div id="content_log" class="tabcontent col-12"  style="display:none;" rel="<?php echo e(route('crmrequestlogdata', $crmDetails->mainId)); ?>" style='border:1px solid red'>
            log display area 

        </div>
        
         <div id="content_policy" class="tabcontent col-12 tab-pane"  style="display:none;" >
       
             <div class="table-responsive">
                                    <table class="table color-table">
                                        <thead>
                                            <tr>
                                                <th>Policy number</th>
                                                <th style='width:10%'>Insurer</th>
                                                <th>Premium amount</th>
                                                <th>Inception date</th>
                                                <th>End date</th>
                                                <th>Created date</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                          <?php if(count($policyDetails) >0): ?>                  
                              <?php $__currentLoopData = $policyDetails; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $policydetail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                    <tr>
                        
                        <td><a href="<?php echo e(route('policyoverview',[$policydetail->id])); ?>" target='_blank'><?php echo e($policydetail->policy_number); ?></a></td>
                       
                        <td><?php echo e($policydetail->insurer_name); ?></td>
                        <td><?php echo e(floatval($policydetail->gross_amount)); ?></td>
                         <td><?php echo e(date('d.m.Y',strtotime($policydetail->start_date))); ?></td>
                        <td><?php echo e(date('d.m.Y',strtotime($policydetail->end_date))); ?></td>
                        <td><?php echo e(date('d.m.Y h:i',strtotime($policydetail->created_at))); ?></td>
                        <td><?php echo e($policydetail->statusString); ?></td>                        
                    </tr>
                     <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                     
                     <?php else: ?>
                     <tr>
                                                <td colspn='7'>No record</td>
                                                
                                            </tr>
                     <?php endif; ?>
                                       
                                        </tbody>
                                    </table>
                                </div>

        </div>

    </div>

</div>
<script id='comment_add_template' type='text/template'>
        
        <?php echo e(Form::open(array('route' => array('savesalescomments',$crmDetails->customerId,$crmDetails->mainId), 'name' => 'form_claimant_add','id'=>'form_claimant_add','files'=>'true' ))); ?>

    <?php echo csrf_field(); ?>   
   
<div class="dialogform">
    <table class="insly_dialogform">
    <tbody><tr style="display:none;">
                    <td></td>
                <td>
                                            
                                    </td>
    </tr>
    <tr style="display:none;">
                    <td></td>
                <td>
                                                <input type="hidden" id="crm_request_id" name="crm_request_id" value="<?php echo e($crmDetails->mainId); ?>">
                                    </td>
    </tr>
    <tr id="field_claim_claimant_name" class="field ">
                    <td class="">
    <div class="label ">
                <span class="text-danger icon-asterix"></span>
        <span class="title">Comment</span>
    </div>
</td>
                <td>
            <div class="element">
              <textarea name="crm_comment" value="" autocomplete="off" wrap="soft" rows="4" class="form-control editor required"  required='required' error-message="Comment field is mandatory"></textarea>
                                                                
                                                                                                                            </div>
        </td>
    </tr>

</tbody></table></div>
  <?php echo e(Form::close()); ?>

</script>


<script id='policyscheduleflag_add_template' type='text/template'>
        
        
   
<div class="dialogform">
    <table class="insly_dialogform">
    <tbody><tr style="display:none;">
                    <td></td>
                <td>
                                            
                                    </td>
    </tr>
    <tr style="display:none;" id="reason_field" class="alert alert-danger alert-block">
                    <td></td>
                <td>Reason field is mandatory</td>
    </tr>
    <tr id="field_claim_claimant_name" class="field ">
                    <td class="">
    <div class="label ">
                <span class="text-danger icon-asterix"></span>
        <span class="title">Reason</span>
    </div>
</td>
                <td>
            <div class="element">
              <textarea id="policyscheduleflag_reason" name="policyscheduleflag_reason" value="" autocomplete="off" wrap="soft" rows="4" class="form-control editor required"  required='required' error-message="Comment field is mandatory" reasonUrl='<?php echo route("changepolicyscheduleflag",[$crmDetails->customerId,$crmDetails->mainId]); ?>'></textarea>
                                                                
                                                                                                                            </div>
        </td>
    </tr>

</tbody></table></div>
  
</script>


<script id='quote_upload_template' type='text/template'>
        
        <?php echo e(Form::open(array('route' => array('createquote',$crmDetails->customerId, $crmDetails->mainId), 'name' => 'form_quote_generation','id'=>'form_quote_generation','files'=>'true' ))); ?>

<?php echo csrf_field(); ?>    
<div class="dialogform">
    <table class="insly_dialogform" id='brokenslip_creation_table'>
        <tbody>
            <tr id="field_documenttype_oid" class="field dp_main_tr">
                <td class="">
                    <div class="label ">
                        <span class="text-danger "></span>
                        <span class="title">Insurance company</span>
                    </div>
                </td>
                <td>
                    <div class="element">
                        <?php echo e(Form::select('insurance_company',  $insuranceCompany, null,array('name'=>'companyId','id' =>'insurance_company','required'=>'required','class'=>'required form-control','error-message' =>"Insurance company field is mandatory" ))); ?>  
                    </div>
                </td>
            </tr>
                 <tr id="field_quote_comment" class="field ">
                        <td class="">
                            <div class="label ">
                                <span class="text-danger "></span>
                                <span class="title">Comment</span>
                            </div>
                        </td>
                        <td>
                            <div class="element">
                                <input type="text" id="quote_comment" name="quote_comment" value="" autocomplete="off" maxlength="255">
                            </div>
                        </td>
                    </tr>
        
            <tr id="field_document_upload" class="field dp_main_tr">
                <td class="">
                    <div class="label ">
                        <span class="text-danger"></span>
                        <span class="title">File</span>
                    </div>
                </td>
                <td>
                    <div class="element">
                        <input type="file" class="required" id="quote_file" name="quote_file[]" multiple="multiple" value="" onchange="FORM.validateFile($(this), 128, 'Maximum file upload size 128 MB exceeded!')" autocomplete="off" error-message="File field is mandatory" required>
                    </div>
                </td>
            </tr>
            
            
            
            


        </tbody></table></div>
<?php echo e(Form::close()); ?>

</script>
<script id='sales_request_assign_template' type='text/template'>
        
        <?php echo e(Form::open(array('route' => array('assignsalescrmrequest',$crmDetails->mainId), 'name' => 'form_sales_request_assign','id'=>'form_sales_request_assign','files'=>'true' ))); ?>

        
				     <div class="col-lg-12">
                                <div class="card">
                                
                                    <div class="card-body card-block">
                                        <div class="form-group">
                                            <label for="vat" class=" form-control-label">Team members</label>
                                           
                                                <?php echo e(Form::select('technical_team',  $assignUsers, null,array('id' =>'technical_team','required'=>'required','class'=>'form-control-lg form-control','error-message' =>"Gender field is mandatory" ))); ?>  
                                        </div>
                                                                               
                                        
                                    </div>
                                </div>
                            </div>
                            <?php echo e(Form::close()); ?>

			
</script>

<script id='sales_request_reason_field' type='text/template'>
        
      <?php echo e(Form::open(array('route' => array('customercrmstatusedit', $crmDetails->customerId,$crmDetails->mainId), 'name' => 'form_crm_status_edit','id'=>'form_crm_status_edit','files'=>'true' ))); ?>

    <?php echo csrf_field(); ?>    
    <div class="dialogform"><table class="insly_dialogform">
                <tbody>                    
                    <tr id="field_document_comment" class="field" >
                        <td class="">
                            <div class="label ">
                                <span class="text-danger"></span>
                                <span class="title">Comment</span>
                            </div>
                        </td> 
                        <td>
                            <div class="element">
                                <input type="text" id="crm_comment" name="crm_comment" value="" autocomplete="off" maxlength="255" class="required" error-message="Comment field is mandtory">
                                     <input type='hidden' name='crm_status' class="crm_status" value='<?php echo e($crmDetails->status); ?>'/>
                            </div>
                        </td>
                    </tr>
                    
                    
                    

                </tbody></table></div>
    <?php echo e(Form::close()); ?>

			
</script>


<script id='email_reciepient_selection' type='text/template'>
        
      <?php echo e(Form::open(array('route' => array('savereciepient', $crmDetails->mainId), 'name' => 'form_email_selection','id'=>'form_email_selection','files'=>'true' ))); ?>

    <?php echo csrf_field(); ?>    
    <div class="dialogform" style='min-height:200px'>
<table class="insly_dialogform">
                <tbody>                    
                    <tr id="field_document_comment" class="field" >
                        <td class="">
                            <div class="label ">
                                <span class="text-danger"></span>
                                <span class="title">Members</span>
                            </div>
                        </td> 
                        <td>
                            <div class="dropdown">
                            
                            
                            <?php echo e(Form::select('email_team',  $maillist, $reciepientDetails['ids'],array('id' =>'email_team','name'=>'email_team[]','required'=>'required','multiple'=>'multiple','class'=>'form-control-lg form-control selectpicker form-control btn-info required','error-message' =>"Members field is mandatory" ))); ?>  
                                    
                            </div>
                        </td>
                    </tr>
                    
                    
                    

                </tbody></table></div>
    <?php echo e(Form::close()); ?>

			
</script>








<?php $__env->stopSection(); ?>
<?php $__env->startSection('customcss'); ?>
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('elitedesign/dist/css/pages/ribbon-page.css')); ?>">
<link rel="stylesheet" type="text/css" href=" <?php echo e(asset('elitedesign/assets/node_modules/datatables.net-bs4/css/dataTables.bootstrap4.css')); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('elitedesign/assets/node_modules/datatables.net-bs4/css/responsive.dataTables.min.css')); ?>"> 
<link href="<?php echo e(asset('elitedesign/assets/node_modules/multiselect/css/multi-select.css')); ?>" rel="stylesheet" type="text/css" />
<link href="<?php echo e(asset('elitedesign/assets/node_modules/bootstrap-select/bootstrap-select.min.css')); ?>" rel="stylesheet" type="text/css" />
 


<?php $__env->stopSection(); ?>

<?php $__env->startSection('pagescript'); ?>
  <script src="<?php echo e(asset('elitedesign/assets/node_modules/bootstrap-select/bootstrap-select.min.js')); ?>" type="text/javascript"></script>                                  
<script src="<?php echo e(asset('elitedesign/assets/node_modules/datatables.net/js/jquery.dataTables.min.js')); ?>"></script>
<script src="<?php echo e(asset('elitedesign/assets/node_modules/datatables.net-bs4/js/dataTables.responsive.min.js')); ?>"></script>

<script src="<?php echo e(asset('js/dibcustom/dib-customer-overview.js')); ?>" type="text/javascript"></script>
<script src="<?php echo e(asset('js/dibcustom/dib-quote-request.js')); ?>" type="text/javascript"></script>
<script type="text/javascript" src="<?php echo e(asset('elitedesign/assets/node_modules/multiselect/js/jquery.multi-select.js')); ?>"></script>

<script>
      $(function(){
          

      var options = {};
      var quoteRequest = new DibQuoterequest(options);
      quoteRequest.initialSetting()


      $(document).on('change','#customSwitch1',function() {
        var flag=0;

         if($(this).prop('checked')) {
            $.ajax({
                    url: $(this).attr('changeUrl'),
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type: "post",
                    data:{'scheduleflag':1}

            }).done(function (data) {

                location.reload();
            });
         } else {
             $("#dp_policyscheduleflag_form").remove();                                   


                                    $('body').append('<div id="dp_policyscheduleflag_form" title="Reason"  >' +$("#policyscheduleflag_add_template").html() + '</div>');
                                    var dialogElement = $("#dp_policyscheduleflag_form");
                                        
                                     dialogElement.dialog({
                                            width: 500,
                                           
                                            modal: true,
                                            buttons: {
         
                                                    "Edit": {
                                                                
                                                                class: "btn waves-effect waves-light btn-rounded btn-success dp_document_data_edit",
                                                                text: 'Save',
                                                                click: function () {
                                                                    $.ajax({
                                                                            url: $("#policyscheduleflag_reason").attr('reasonUrl'),
                                                                            headers: {
                                                                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                                                            },
                                                                            data :{'scheduleflag':0,'document_comment':$("#policyscheduleflag_reason").val()
                                                                          },
                                                                          beforeSend: function( xhr ) {
    $("#reason_field").hide();
    if($.trim($("#policyscheduleflag_reason").val())=='') {
         $("#reason_field").show();
         return false;
    }
  }

           
                                                                            }).done(function(data) {
                                                                                if(data.status) {
                                                                                   dialogElement.dialog('close');
                                                                                   dialogElement.remove();
                                                                                   
                                                                                   DIB.progressDialog(LOCALE.get('DIB.COMMON.Progress.Loading'));
                                                                                   DIB.closeProgressDialog();
                                                                                   location.reload(); 
                                                                                }
                                                                            })
                                                                    
                                                                }
                                                            },
                                                    "cancel":   {
                                                                    class: "btn waves-effect waves-light btn-rounded btn-danger",
                                                                    text: 'Cancel',
                                                                    click: function () {
                                                                        dialogElement.dialog('close');
                                                                        dialogElement.remove();
                                                                        location.reload();
                                                                    }
                                                                }
            
                                                      },

                                            close: function (event, ui) {

                                            }
                                    });
         }
         
        



      })






      //Edit document
    
    $(document).off('click','.dpib_document_edit');
    $(document).on('click','.dpib_document_edit',function(){
        
            var documentId = $(this).attr('docId');
            var customerId = $(this).attr('customerId');

            var linkString = '<?php echo route("customerdocedit",["##customerId##","##docId##"]); ?>';
            var link = linkString.replace("##customerId##", customerId).replace("##docId##", documentId);
            $.ajax({
                url: link,
                type: "GET"           
           
            }).done( function (data) {
                                if(data.status) { 
                                    
                                    $("#dp_edit_selected_doc").remove();  
                                    $('body').append('<div id="dp_edit_selected_doc" title="Edit document"  >' + data.content + '</div>');
                                    var dialogElement = $("#dp_edit_selected_doc");
                                        
                                     dialogElement.dialog({
                                            width: 500,
                                           
                                            modal: true,
                                            buttons: {
         
                                                    "Edit": {
                                                                
                                                                class: "btn waves-effect waves-light btn-rounded btn-success dp_document_data_edit",
                                                                text: 'Edit',
                                                                click: function () {
                                                                    $.ajax({
                                                                            url: $('form#form_document_edit').attr('action'),
                                                                            headers: {
                                                                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                                                            },
                                                                            data :{'documenttype_oid':$('#documenttype_oid').val(),'document_comment':$('#document_comment').val()}
           
                                                                            })


                                                                    .done(function(data) {
                                                                                if(data.status) {
                                                                                   dialogElement.dialog('close');
                                                                                   dialogElement.remove();
                                                                                   //loading document datatable once more
                                                                                   $('#tab_document').find('a').trigger('click');
                                                                                   DIB.progressDialog(LOCALE.get('DIB.COMMON.Progress.Loading'));
                                                                                   DIB.closeProgressDialog(); 
                                                                                }
                                                                            })
                                                                    
                                                                }
                                                            },
                                                    "cancel":   {
                                                                    class: "btn waves-effect waves-light btn-rounded btn-danger",
                                                                    text: 'Cancel',
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
       
    });
    
              //Document upload initialization
    $(document).on('click','.dpib_customer_crm_comparisondoc_add',function(){
     $.ajax({
            url: "<?php echo route('comparisonuploadform',[$crmDetails->customerId,$crmDetails->mainId]); ?>",
            type: "GET"

        }).done(function (data) {
            DIB.alert(data.html, 'Add comparison document',false, false, false,'customdocadd');            

            $("button.primary").off('click');
            $("button.primary").on('click', function (event) {
        event.preventDefault();

                if($('#document_file')[0].files.length <=0) {
                   DIB.displayErrors("File is mandatory", LOCALE.get('insly.common.whoops'));  
                } else if($('#document_file')[0].files.length >0) {
                  var checkFlag = FORM.validateFile($('#document_file'), 128, 'Maximum file upload size 128 MB exceeded!');
                  
                  if(checkFlag) {
                   $("#form_document_add").submit();   
                  }
                   
                } else {
                    
                }
           
                  
                
            });


        });
    
    });
    
    
                  //Change display flag of quotes
                  $(document).off('click','.dpib_quote_salesview');
    $(document).on('click','.dpib_quote_salesview',function(){
     $.ajax({
            url: $(this).attr("openUrl"),
            data: { displayflag: $(this).attr("action-type") },
            type: "GET"

        }).done(function (data) {
    if(data.success) {
            location.reload();   
       }


        });
    
    });
    
    
    
    $(document).off('click','.dpib-status-change');
    $(document).on('click','.dpib-status-change',function(){
        
            $('.crm_status').val($(this).data('status'));
         var selectedStatus = $(this).data('status');   
         
            var arr = [ 5,8,10];   
            
       if( jQuery.inArray( $(this).data('status'), arr )  > -1   ) {
 
          $("#db_reason_add_popup").remove();



        var template = _.template($("#sales_request_reason_field").html());
        var result = template();



        $('body').append('<div id="db_reason_add_popup" title="Add reason" style="display:none" >' + result + '</div>');
        var dialogElement = $("#db_reason_add_popup");
        dialogElement.dialog({
          width: 900,
          
          modal: true,
          buttons: {
            "Save": {
              class: "btn waves-effect waves-light btn-rounded btn-success",
               text:'Save',
     
              click: function() {
                 DIB.progressDialog(LOCALE.get('dib.common.progress.loading'));

                                var isValid = true;
         var errorMessage = "";
                var i=0;
                $(".required:visible").each(function(){                
                 if($(this).val()=='' || $(this).val() == null) {
                    isValid = false; 
                    $(this).addClass('form-control-danger');
                    $(this).parent('.element').addClass('has-danger')
                    if( i==0 ) {
                     errorMessage+="<b>The following errors occurred while validating data:"+"</b><br/>";
                     i++;
                    }
                    errorMessage+="<b>"+ $(this).attr('error-message')+"</b><br/>"
                  
                 } else {
                    $(this).removeClass('error'); 
                    $(this).removeClass('form-control-danger');
                    $(this).parent('.element').removeClass('has-danger')
                 }
                });
                

            if(isValid) {
                $(".preloader").show();
                $("form#form_crm_status_edit").submit();
            } else {
              DIB.alert(errorMessage,'Error!!!!');    
            }

              }
            },
            "cancel": {
              class: "btn waves-effect waves-light btn-rounded btn-danger",
              text:'Cancel',
              click: function() {
                dialogElement.dialog('close');
                dialogElement.remove();
              }
            }
          },
          open: function() {
            $('#form_crm_status_edit .crm_status').val(selectedStatus);
          }

        });



        DIB.centerDialog();
          
          
          
          
          
          
       } else {
      
 $(".preloader").show();
 $("#form_crm_status_edit").submit();  
       }
       
    });
    

 $(document).off('click','.dpib_comment_add');
    $(document).on('click','.dpib_comment_add',function(){


        $("#db_comment_add_popup").remove();



        var template = _.template($("#comment_add_template").html());
        var result = template();



        $('body').append('<div id="db_comment_add_popup" title="Add comment" style="display:none" >' + result + '</div>');
        var dialogElement = $("#db_comment_add_popup");
        dialogElement.dialog({
          width: 900,
          
          modal: true,
          buttons: {
            "Save": {
              class: "btn waves-effect waves-light btn-rounded btn-success",
               text:'Save',
     
              click: function() {
                 DIB.progressDialog(LOCALE.get('dib.common.progress.loading'));

                                var isValid = true;
         var errorMessage = "";
                var i=0;
                $(".required:visible").each(function(){                
                 if($(this).val()=='' || $(this).val() == null) {
                    isValid = false; 
                    $(this).addClass('form-control-danger');
                    $(this).parent('.element').addClass('has-danger')
                    if( i==0 ) {
                     errorMessage+="<b>The following errors occurred while validating data:"+"</b><br/>";
                     i++;
                    }
                    errorMessage+="<b>"+ $(this).attr('error-message')+"</b><br/>"
                  
                 } else {
                    $(this).removeClass('error'); 
                    $(this).removeClass('form-control-danger');
                    $(this).parent('.element').removeClass('has-danger')
                 }
                });
                

            if(isValid) {

                $("form#form_claimant_add").submit();
            } else {
              DIB.alert(errorMessage,'Error!!!!');    
            }

               

              }
            },
            "cancel": {
              class: "btn waves-effect waves-light btn-rounded btn-danger",
              text:'Cancel',
              click: function() {
                dialogElement.dialog('close');
                dialogElement.remove();
              }
            }
          },
          open: function() {

            
          }

        });



        DIB.centerDialog();
    
    });
    
   //UPLOAD QUOTE FUNCTIONALITY
   $(document).off('click','.dpib_crm_quote_add');
       $(document).on('click','.dpib_crm_quote_add',function(){
 $("#db_quote_add_popup").remove();



        var template = _.template($("#quote_upload_template").html());
        var result = template();



        $('body').append('<div id="db_quote_add_popup" title="Upload quote" style="display:none" >' + result + '</div>');
        var dialogElement = $("#db_quote_add_popup");
        dialogElement.dialog({
          width: 900,
          
          modal: true,
          buttons: {
            "Save": {
              class: "btn waves-effect waves-light btn-rounded btn-success",
               text:'Quote upload',
     
              click: function() {
                 DIB.progressDialog(LOCALE.get('dib.common.progress.loading'));

                                var isValid = true;
         var errorMessage = "";
                var i=0;
                $(".required:visible").each(function(){                
                 if($(this).val()=='' || $(this).val() == null) {
                    isValid = false; 
                    $(this).addClass('form-control-danger');
                    $(this).parent('.element').addClass('has-danger')
                    if( i==0 ) {
                     errorMessage+="<b>The following errors occurred while validating data:"+"</b><br/>";
                     i++;
                    }
                    errorMessage+="<b>"+ $(this).attr('error-message')+"</b><br/>"
                  
                 } else {
                    $(this).removeClass('error'); 
                    $(this).removeClass('form-control-danger');
                    $(this).parent('.element').removeClass('has-danger')
                 }
                });
                

            if(isValid) {

                $("form#form_quote_generation").submit();
            } else {
              DIB.alert(errorMessage,'Error!!!!');    
            }

               

              }
            },
            "cancel": {
              class: "btn waves-effect waves-light btn-rounded btn-danger",
              text:'Cancel',
              click: function() {
                dialogElement.dialog('close');
                dialogElement.remove();
              }
            }
          },
          open: function() {

            
          }

        });



        DIB.centerDialog();
    
    });
   
//ASSIGN TO OPERATION TEAM
    
    $(document).on('click','.dpib_sales_crm_assign',function() {
         
        var assignUrl = $(this).attr('assign_url');
        
        $("#db_sales_endorsement_request_assignpopup").remove();
        var template = _.template($("#sales_request_assign_template").html());
        var result = template();
                $('body').append('<div id="db_sales_endorsement_request_assignpopup" title="Assign request" style="display:none" >' + result + '</div>');
                var dialogElement = $("#db_sales_endorsement_request_assignpopup");
                dialogElement.dialog({
                    width: 900,
                    resizable: false,
                    bgiframe: true,
                    modal: true,
                    buttons: {
                        "Delete": {
                            class: "btn waves-effect waves-light btn-rounded btn-success",
                            text:'Assign',
                            click: function () {
                                DIB.progressDialog(LOCALE.get('dib.common.progress.loading'));
                                $("form#form_sales_request_assign").submit();
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
                      $("form#form_endorsement_request_assign").attr('action',assignUrl);  
                    }
                }); 
                    DIB.centerDialog(); 
    });
    
    
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
    
    
        $(document).off('click','.dpib_crm_request_reciepient');
        $(document).on('click','.dpib_crm_request_reciepient',function() {
          $("#db_reciepient_add_popup").remove();



        var template = _.template($("#email_reciepient_selection").html());
        var result = template();



        $('body').append('<div id="db_reciepient_add_popup" title="Reciepients" style="display:none" >' + result + '</div>');
        var dialogElement = $("#db_reciepient_add_popup");
        dialogElement.dialog({
          width: 900,
          
          modal: true,
          buttons: {
            "Save": {
              class: "btn waves-effect waves-light btn-rounded btn-success",
               text:'Add',
     
              click: function() {
                 DIB.progressDialog(LOCALE.get('dib.common.progress.loading'));

                                var isValid = true;
         var errorMessage = "";
                var i=0;
                $("select.required:visible").each(function(){                
                 if($(this).val()=='' || $(this).val() == null) {
                  
                    isValid = false; 
                    $(this).addClass('form-control-danger');
                    $(this).parent('.element').addClass('has-danger')
                    if( i==0 ) {
                     errorMessage+="<b>The following errors occurred while validating data:"+"</b><br/>";
                     i++;
                    }
                    
                    errorMessage+="<b>"+ $(this).attr('error-message')+"</b><br/>"
                  
                 } else {
                    $(this).removeClass('error'); 
                    $(this).removeClass('form-control-danger');
                    $(this).parent('.element').removeClass('has-danger')
                 }
                });
                

            if(isValid) {

                $("form#form_email_selection").submit();
            } else {
              DIB.alert(errorMessage,'Error!!!!');    
            }

               

              }
            },
            "cancel": {
              class: "btn waves-effect waves-light btn-rounded btn-danger",
              text:'Cancel',
              click: function() {
                dialogElement.dialog('close');
                dialogElement.remove();
              }
            }
          },
          open: function() {
           
             $('.selectpicker').selectpicker();
          }

        });



        DIB.centerDialog();  
        });
    
    
    

    
    

          
      })          

</script>
<script>
    var crmOverview ='';
   $(function() {
         
     <?php if(Session::get('requestoverviewtabselected')): ?>
         //var tabValue = "<?php echo Session::get('requestoverviewtabselected'); ?>";
        // $('#tab_'+tabValue).find('a').trigger('click');
     <?php endif; ?> 
 
  var disabledOptions = [] ;
     <?php if(in_array('ROLE_SALES_MANAGER', Auth::user()->roles) || in_array('ROLE_SALES', Auth::user()->roles)): ?>
       //disabledOptions = [3,4,7,8,11,9] ;
    <?php elseif(in_array('ROLE_TECHNICAL_MANAGER', Auth::user()->roles) || in_array('ROLE_TECHNICAL', Auth::user()->roles)): ?> 
        //disabledOptions = ['0','1','2','9','10'] ;
        //disabledOptions = [5,6] ;
    <?php endif; ?>   
     
     $(".dpib-status-change").each(function()
        {
       
            if( jQuery.inArray($(this).data('status') , disabledOptions )  > -1   ) {
                  //$(this).attr('disabled','disabled');
                  //$(this).removeClass('dpib-status-change');
                  $(this).remove();
                  
            }
        });
 
 
 
 
 

   }); 
   
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.elite_fullwidth',['sidemenustatus' => array(),'countDetails'=>array(),'notificationCount'=>array() ] , \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Xampp_new\htdocs\inslyportal\resources\views/Request/requestoverview.blade.php ENDPATH**/ ?>