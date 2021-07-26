<?php $__env->startSection('content'); ?>

     
<!--                  content here  -->
<!--TAB AREA-->
<div class="row">
   <?php $__env->startSection('headtitle'); ?>
Customer <i class="fas fa-angle-double-right"></i><span class='text-blue' style='font-size:25px'> <?php if(!empty($customers->customerName)): ?> <?php echo e($customers->customerName); ?> <?php endif; ?></span>
<?php $__env->stopSection(); ?>
 
    
    
    
    
    
    
    <div class="col-md-12 card" >
        
        
        <ul class="nav nav-tabs" role="tablist">
                                <li id="tab_overview" class="nav-item" onclick="TAB.select('overview', null, 1)"> <a class="nav-link <?php echo e(empty($overviewTab) || $overviewTab == 'overview' ? 'active' : ''); ?>" data-toggle="tab" href="#content_overview" role="tab" aria-selected="true"><span class="hidden-sm-up"><i class="ti-home"></i></span> <span class="hidden-xs-down">Overview</span></a> </li>
                                <?php if($policyCount >0): ?>
                                <li id="tab_policy" class="nav-item" onclick="TAB.select('policy', '<?php echo e(route('policylisting', $customers->customId)); ?>', 0)"> <a class="nav-link <?php echo e(!empty($overviewTab) && $overviewTab == 'policy' ? 'active' : ''); ?>" data-toggle="tab" href="#content_policy" role="tab" aria-selected="false"><span class="hidden-sm-up"><i class="ti-user"></i></span> <span class="hidden-xs-down">Policies (<?php echo e($policyCount); ?>)</span></a> </li>
                                <?php endif; ?>
                                
                                <?php if(in_array('ROLE_TECHNICAL_MANAGER', Auth::user()->roles) || in_array('ROLE_TECHNICAL', Auth::user()->roles) || in_array('ROLE_FINANCE_MANAGER', Auth::user()->roles) || in_array('ROLE_FINANCE', Auth::user()->roles)): ?>  
                                <li id="tab_quotes" class="nav-item" onclick="TAB.select('quotes', '<?php echo e(route('quotelisting', $customers->customId)); ?>', 0)"> <a class="nav-link <?php echo e(!empty($overviewTab) && $overviewTab == 'quote' ? 'active' : ''); ?>" data-toggle="tab" href="#content_quotes" role="tab" aria-selected="false"><span class="hidden-sm-up"><i class="ti-email"></i></span> <span class="hidden-xs-down">Quotes (<?php echo e($quoteCount); ?>)</span></a> </li>
                                <?php endif; ?>
                               
                                
                                
                            <li id="tab_crm" class="nav-item" onclick="TAB.select('crm', '<?php echo e(route('quoterequestlist', $customers->customId)); ?>', 0)"> <a class="nav-link <?php echo e(!empty($overviewTab) && $overviewTab == 'crm' ? 'active' : ''); ?>" data-toggle="tab" href="#content_crm" role="tab" aria-selected="false"><span class="hidden-sm-up"><i class="ti-email"></i></span> <span class="hidden-xs-down">Requests (<?php echo e($requestData); ?>)</span></a> </li>
                            <li id="tab_document" class="nav-item" onclick="TAB.select('document', '<?php echo e(route('customerdocdata', $customers->customId)); ?>', 0)"> <a class="nav-link <?php echo e(!empty($overviewTab) && $overviewTab == 'document' ? 'active' : ''); ?>" data-toggle="tab" href="#content_document" role="tab" aria-selected="false"><span class="hidden-sm-up"><i class="ti-email"></i></span> <span class="hidden-xs-down">Documents (<?php echo e($documentcount); ?>)</span></a> </li>
        <li id="tab_log" class="nav-item" onclick="TAB.select('log', '<?php echo e(route('customerlogdata', $customers->customId)); ?>', 0)"> <a class="nav-link <?php echo e(!empty($overviewTab) && $overviewTab == 'log' ? 'active' : ''); ?>" data-toggle="tab" href="#content_log" role="tab" aria-selected="false"><span class="hidden-sm-up"><i class="ti-email"></i></span> <span class="hidden-xs-down">Log</span></a> </li>
        <li id="tab_timeline" class="nav-item" onclick="TAB.select('timeline', '<?php echo e(route('customertimeline',[$customers->customId,date('Y')])); ?>', 0)"> <a class="nav-link <?php echo e(empty($overviewTab) || $overviewTab == 'timeline' ? 'active' : ''); ?>" data-toggle="tab" href="#content_timeline" role="tab" aria-selected="false"><span class="hidden-sm-up"><i class="fa fa-th-list"></i></span> <span class="hidden-xs-down">Timeline</span></a> </li>
        <li id="tab_users" class="nav-item" onclick="TAB.select('users', null, 0)"> <a class="nav-link <?php echo e(empty($overviewTab) || $overviewTab == 'users' ? 'active' : ''); ?>" data-toggle="tab" href="#content_users" role="tab" aria-selected="false"><span class="hidden-sm-up"><i class="fas fa-users"></i></span> <span class="hidden-xs-down">Active users</span></a> </li>
        
        </ul>
        

    </div>
</div>
<!--TAB CONTENT AREA-->
<div class="row card">

        <div id="content_overview" class="tabcontent col-md-12 card-body  ribbon-wrapper-reverse card" >
            <?php if($policyCount >0): ?>
            <?php
            if(!is_null($policyAmountDetails['active'])) {
            $totalAmount = $policyAmountDetails['active']->grossAmount+$policyAmountDetails['active']->endorsementAmount;
            } else {
                $totalAmount = 0;
            }
             
            
            ?>
            <?php if($totalAmount <=500000): ?>
             <div class="ribbon ribbon-bookmark ribbon-right ribbon-danger">Small</div>
            <?php elseif($totalAmount <=3000000): ?>
             <div class="ribbon ribbon-bookmark ribbon-right ribbon-danger">Medium</div>
            <?php elseif($totalAmount <=10000000): ?>
             <div class="ribbon ribbon-bookmark ribbon-right ribbon-danger">Large</div>
            <?php elseif($totalAmount >10000000): ?>
             <div class="ribbon ribbon-bookmark ribbon-right ribbon-danger">Key account</div>
            <?php endif; ?>
           
            <?php endif; ?>
            <div class="row">
  
                
                
                <div id="main-content" class="col-md-7">
                    <div id="panel-customer_overview" class="panel panel-default open">
                        <div class="panel-heading">
            <?php if(in_array('ROLE_TECHNICAL_MANAGER', Auth::user()->roles) || in_array('ROLE_SALES_MANAGER', Auth::user()->roles) || in_array('ROLE_FINANCE_MANAGER', Auth::user()->roles) || Auth::user()->id == $customers->customer_management_user || Auth::user()->id == $customers->created_user): ?>                
            <ul class="panel-actions list-inline pull-right">
               
                <li ><a href="<?php echo e(route('editcustomer',$customers->customId)); ?>"><button type="button" class="btn btn-success btn-rounded"><i class="fas fa-edit"></i> Edit</button></a></li>
                 <li ><a href="<?php echo e(route('newrequest',$customers->customId)); ?>"><button type="button" class="btn btn-success btn-rounded"><i class="fas fa-plus"><div class="notify" > <span class="heartbit" style='top:-16px;'></span> <span class="point" style='top:-4px;'></span> </div></i>Add request</button></a></li>

<!--                <li><div class="btn-group"><button type="button"><span class="icon-settings"></span><span class="icon-arrow-down"></span><span class="icon-active"></span></button>
                        <ul id="settings-menu" class="dropdown-menu" role="menu">
                            <li><a >Merge customer</a></li>
                        </ul>
                    </div>
                </li>-->
            </ul>
              <?php endif; ?>              
                            <h3 class="panel-title">Customer info</h3></div>
            <div id="customer_overview" class="panel-collapse panel-body">
                
                                    
                                   
                          
                <table class="info-table">
                    <tbody>
                        <tr><td style='width:55%'>Customer type:</td><td><?php echo e(($customers->type ==1) ? 'Company' : 'Individual'); ?></td></tr>
                        <tr><td>Name:</td><td><?php echo e($customers->customerName); ?></td></tr>
                        <tr><td>ID code / reg no:</td><td><?php echo e($customers->id_code); ?></td></tr>
                        <tr><td>Customer code:</td><td><?php echo e($customers->customer_code); ?></td></tr>
                        <tr class="subtitle"><th colspan="2" style='font-weight:600'>Contact info</th></tr>
                        <tr><td>E-mail address:</td><td><a><?php echo e($customers->email); ?></a></td></tr>
                        <tr><td>Phone:</td><td class="phoneNumber"><?php echo e($customers->customerPhone); ?></td></tr>
                        <tr><td>Mobile phone:</td><td class="phoneNumber"><?php echo e($customers->mobile); ?></td></tr>
                        <tr><td>Preferred communication channel:</td><td><?php echo e($customers->prefered_communication_type); ?></td></tr>
                        <tr class="subtitle"><th colspan="2" style='font-weight:600'>Customer management</th></tr>
                        <tr><td>Account manager:</td><td><span class="person-popover" data-toggle="popover" data-title="Dbroker company" data-content="<?php echo e($customers->accountManager); ?>" data-original-title="" title=""><?php echo e($customers->accountManager); ?></span></td></tr>
                        <tr><td>Sale person:</td><td><span class="person-popover" data-toggle="popover" data-title="Dbroker company" data-content="<?php echo e($customers->saleperson); ?>" data-original-title="" title=""><?php echo e($customers->saleperson); ?></span></td></tr>
                        
                        <tr><td>Customer group:</td><td><?php echo e($customers->customer_group); ?></td></tr>
                        <tr><td>Language:</td><td>english</td></tr>
                    </tbody>
                </table>
            </div></div>
            <div id="panel-customer_address" class="panel panel-default open">
                <div class="panel-heading">
                    <ul class="panel-actions list-inline pull-right">
                         <li ><span class="fas fa-plus text-blue dpib_add_contact_address_more" data-toggle="tooltip"  data-url="<?php echo e(route('addcustomeraddress',$customers->customId)); ?>" title="" data-original-title="Add address"></span></li>
                        
                    </ul>
<h3 class="panel-title">Customer addresses</h3>
                </div>
<div id="customer_address" class="panel-collapse panel-body">
    
    
    <?php if(count($addressDetails) >0): ?>
            <table class="table table-bordered table-striped table-hovered color-table">
                <thead>
                   <tr> <th>ADDRESS</th><th class="nowrap">MODIFIED </th><th class="nowrap"> </th></tr> 
                    
                </thead>
                <tbody>
                    
                    
                    <?php $__currentLoopData = $addressDetails; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $address): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                    <tr>
                        
                        <td><?php echo e($address->building_no); ?> <?php echo e($address->	street_name); ?> <?php echo e($address->	district_name); ?><br />
                            <?php echo e($address->city_name); ?>  <?php echo e($address->zip_code); ?> <?php echo e($address->additional_no); ?>  <br />
                            <?php echo e($address->unit_no); ?>

                        </td>
                        <td><?php echo e($address->modifies_at); ?> </td>
                        <td class="nowrap iconactions"><a  class="dpib_editcontactaddress" data-url="<?php echo e(route('editcontactaddress',[$address->customer_id,$address->id])); ?>"><span class="fas fa-edit text-blue mr-right" data-toggle="tooltip" title="" data-original-title="Edit a contact address"></span></a><a class="dpib_deletecontactaddress" data-url="<?php echo e(route('deletecontactaddressconfirm',[$address->customer_id,$address->id])); ?>"><span class="fas fa-archive text-blue" data-toggle="tooltip" title="" data-original-title="Delete contact person"></span></a></td>
                    </tr>
                     <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        
                </tbody></table>
            <?php endif; ?>

   </div>
</div>

<div id="panel-customer_contact" class="panel panel-default open">
    <div class="panel-heading">
                                                                      <ul class="panel-actions list-inline pull-right">
                                                                          <li ><span class="fas fa-plus text-blue dpib_add_contact_person_more" data-toggle="tooltip" title="" data-original-title="Add a contact person"></span></li>
                                                                      </ul>
        <h3 class="panel-title">Contact persons</h3></div>
        <div id="customer_contact" class="panel-collapse panel-body">
            <?php if(count($contactpersonDetails) >0): ?>
            <table class="table table-bordered table-striped table-hovered">
                <thead>
                   <tr> <th>PERSON</th><th>CONTACTS</th><th class="nowrap"> </th><th class="nowrap"> </th></tr> 
                    
                </thead>
                <tbody>
                    
                    
                    <?php $__currentLoopData = $contactpersonDetails; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $contactperson): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                    <tr>
                        <td><?php echo e($contactperson->person_name); ?><br /><small><?php echo e($contactperson->person_title); ?></small></td>
                        <td>Email: <a href="mailto:<?php echo e($contactperson->email); ?>"><?php echo e($contactperson->email); ?> </a><br />
                            Mobile: <?php echo e($contactperson->mobile_phone); ?> <br />
                            Phone: <?php echo e($contactperson->phone); ?>

                        </td>
                        <td><?php echo e($contactperson->updated_date); ?> </td>
                        <td class="nowrap iconactions"><a class="dpib_editcontactperson" data-url="<?php echo e(route('editcontactperson',[$contactperson->customer_id,$contactperson->id])); ?>"><span class="fas fa-edit text-blue mr-right" data-toggle="tooltip" title="" data-original-title="Edit a contact person"></span></a><a class="dpib_deletecontactperson" data-url="<?php echo e(route('deletecontactpersonconfirm',[$contactperson->customer_id,$contactperson->id])); ?>"><span class="fas fa-archive text-blue" data-toggle="tooltip" title="" data-original-title="Delete contact person"></span></a></td>
                    </tr>
                     <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        
                </tbody></table>
            <?php endif; ?>
        </div>
  </div>
<div id="panel-related_customer" class="panel panel-default open">
    <div class="panel-heading">
                                                                      <ul class="panel-actions list-inline pull-right">
                                                                          <li ><span class="fas fa-plus text-blue dpib_connect_customers" data-toggle="tooltip" title="" data-original-title="Connect customer" data-url="<?php echo e(route('addcontactconnection',[$customers->customId])); ?>" ></span></li>
                                                                      </ul>
        <h3 class="panel-title">Related customers</h3></div>
        <div id="customer_contact" class="panel-collapse panel-body">
            <?php if(count($customerRelationdetails) >0): ?>
            <table class="table table-bordered table-striped table-hovered">
                <thead>
                   <tr> <th>RELATED CUSTOMER</th><th>RELATION</th><th class="nowrap"> </th></tr> 
                    
                </thead>
                <tbody>
                    
                    
                    <?php $__currentLoopData = $customerRelationdetails; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $relationdetails): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                    <tr>
                        <td><a href="<?php echo e(route('customeroverview',[$relationdetails->related_customer_id])); ?>"   target="_blank"><?php echo e($relationdetails->name); ?></a></td>
                        <td> <?php echo e($relationdetails->relation_type); ?></td>
                       
                        <td class="nowrap iconactions"><a  class="dpib_connect_customers_edit" data-url="<?php echo e(route('editconnectiondetailsform',[$customers->customId, $relationdetails->mainId])); ?>"><span class="fas fa-edit text-blue mr-right" data-toggle="tooltip" title="" data-original-title="Edit a connection details"></span></a><a class="dpib_deletecustomerconnection" data-url="<?php echo e(route('deletecustomerconnection',[$customers->customId,$relationdetails->mainId])); ?>"><span class="fas fa-archive text-blue" data-toggle="tooltip" title="" data-original-title="Delete customer connection"></span></a></td>
                    </tr>
                     <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        
                </tbody></table>
            <?php endif; ?>
        </div>
  </div>



                
 </div>
                              <aside class="col-4 row">
                    <?php if($policyCount >0): ?>

                    <div id="panel-customer_profile" class="panel panel-default open col-12">
                        <div class="panel-heading col-12">
                            <h3 class="panel-title">Policies</h3>
                        </div>
                        <div id="customer_profile" class="panel-collapse panel-body col-12">
                            <?php if(count($policyAmountDetails) > 0): ?>
                            <table class="table table-sm table-bordered" style="font-size:smaller;">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>Gross premium</th>
                                        <th>Customer payable</th>
                                        <th>Comm.</th>
                                    </tr>
                                </thead>
                                <tbody>
                            
                                <?php $__currentLoopData = $policyAmountDetails; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $amountDetails): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr><td class="nowrap" style="color: #000;font-weight: bold"><?php echo e($key); ?>:</td>
                                    <td class="nowrap"><span style="color: #000;font-weight: bold"><b><?php echo e((!empty($amountDetails)) ? number_format($amountDetails->grossAmount,2, '.', ',') :0.00); ?></b></span></td>
                                        <td class="nowrap"><span style="color: #000;font-weight: bold"><b><?php echo e((!empty($amountDetails)) ? number_format($amountDetails->grossAmount + $amountDetails->endorsementAmount+$vatDetails[$key]->installmentVat+$amountDetails->additionAmount,2, '.', ',')  :0.00); ?></b></span></td>
                                        <td class="nowrap"><span style="color: #000;font-weight: bold"><b><?php echo e((!empty($amountDetails)) ? number_format($amountDetails->commision ,2, '.', ',') :0.00); ?></b></span></td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                            </table>
                             <?php endif; ?>
                            

                        </div>
                    </div>
                    <?php endif; ?>
                    <div id="panel-customer_salesopportunities" class="panel panel-default open col-12" style="display:none">
                        <div class="panel-heading"><h3 class="panel-title">Sales opportunities</h3></div>
                        <div id="customer_salesopportunities" class="panel-collapse panel-body">

                        </div>
                    </div>
                    <div id="panel-entries-block" class="panel panel-default open col-12" style="display:none">
                        <div class="panel-heading">
                            <ul class="panel-actions list-inline pull-right">
                                <li><span class="fas fa-plus text-blue" data-toggle="tooltip" title="" data-original-title="Add a task"></span></li>
                            </ul><h3 class="panel-title">Tasks </h3></div>
                            <div id="entries-block" class="panel-collapse panel-body">

                            </div>
                    </div>
                    <div id="panel-customer_reminder" class="panel panel-default open col-12">
                        <div class="panel-heading">
                            <ul class="panel-actions list-inline pull-right">
                                <li ><span class="fas fa-plus text-blue dp_customer_note_add" data-toggle="tooltip" title="" data-original-title="Add"></span></li>
                            </ul><h3 class="panel-title">Notes</h3>
                        </div>
                        <div id="customer_reminder" class="panel-collapse panel-body">
                            <ul class="list-group list-notes" style="padding-left:29px">
                                <?php if($notes->count() >0): ?>
                                 <?php $__currentLoopData = $notes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $note): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                     <li style="padding-left: 8px"><?php echo e($note->comment); ?></li> 
                                  
                                 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php else: ?>
                                 <li style="padding-left: 8px">No notes.</li>
                                <?php endif; ?>
                                
    <!-- ko if: _.size(notes()) == 0 -->
    
    <!-- /ko -->

    <!-- ko foreach:notes--><!-- /ko -->
</ul>
<div id="add_note_template_1" style="display:none;">
    <textarea class="note_add_entry full-width" name="note_add_entry" rows="10" wrap="soft" default_setting='<?php echo e(route('newnote', $customers->customId)); ?>' overview_url="<?php echo e(route('customeroverview', $customers->customId)); ?>" style="width:100%"></textarea>
</div>
                            
                            
                            
                            
<div id="add_note_template_2" style="display:none;">
    <textarea class="note_add_entry full-width" name="note_add_entry" rows="10" wrap="soft" data-bind="value: noteAddEntry"></textarea>
    <div class="well" data-bind="fileDrag: multiFileData">
        <div class="form-group row">
            <div class="col-md-6">
                <!-- ko foreach: {data: multiFileData().fileArray, as: 'file'} -->
                <span class="img-rounded thumb" data-bind="css: window.FileIcons.getClassWithColor(file.name), visible: file, text: file.name"></span><br>
                <!-- /ko -->
                <div data-bind="ifnot: multiFileData().fileArray().length">
                    <label class="drag-label">Drag files here</label>
                </div>
            </div>
            <div class="col-md-6">
                
            </div>
        </div>
    </div>
</div>

</div>
                        
</div>
                    
                </aside>
 </div>
 </div>
        
        
        
        
        
        
        
        
    <div id="content_policy" class="tabcontent col-12" rel="<?php echo e(route('policylisting', $customers->customId)); ?>" style="display:none">
                Policy display area
                
            </div>

        <div id="content_quotes" class="tabcontent col-12" rel="" style="display:none">
            
            Offer display area
        </div>
        <div id="content_invoice" class="tabcontent col-12" rel="" style="display:none">
            
            invoice display area
        </div>
        <div id="content_document" class="tabcontent col-12" rel="" style="display:none">
            
           document display area 
        </div>
        
        <div id="content_crm" class="tabcontent col-12"  style="display:none">
            crm display area
        </div>

        <div id="content_log" class="tabcontent col-12"  style="display:none;">
           log display area 
            
        </div>
       <div id="content_timeline" class="tabcontent col-12"  style="display:none;" rel="<?php echo e(route('customertimeline',[$customers->customId,date('Y')])); ?>">
<!--            timeline display area -->

        </div>
                
      <div id="content_users" class="tabcontent col-12"  style="display:none;" >
       <div class="card open">
            <div class="card-body"> 
   
                <h1 class="card-title col-3">Active users<small></small></h1> </div>
            <div class="table-responsive" style='width:100%;'>
                <table class="display nowrap table table-hover table-striped table-bordered dataTable dpib_client_user_list" width='100%'>
                    <thead>
                        <tr>
                            <th  class="nowrap">Name</th>
                            <th  class="nowrap">Email</th>                      
                            <th  class="nowrap" >Role</th>
                            <th  class="nowrap" >Active from</th>
        
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
</div>
        </div> 

        </div>
                
   
        
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('customcss'); ?>

<link rel="stylesheet" type="text/css" href=" <?php echo e(asset('elitedesign/dist/css/pages/ribbon-page.css')); ?> ">
<link rel="stylesheet" type="text/css" href=" <?php echo e(asset('elitedesign/assets/node_modules/datatables.net-bs4/css/dataTables.bootstrap4.css')); ?> ">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('elitedesign/assets/node_modules/datatables.net-bs4/css/responsive.dataTables.min.css')); ?>"> 


<?php $__env->stopSection(); ?>
<?php $__env->startSection('customscript'); ?>

<script src="<?php echo e(asset('elitedesign/assets/node_modules/datatables.net/js/jquery.dataTables.min.js')); ?>"></script>
<script src="<?php echo e(asset('elitedesign/assets/node_modules/datatables.net-bs4/js/dataTables.responsive.min.js')); ?>"></script>
<script src="<?php echo e(asset('js/global/datatable/moment.min.js')); ?>" type="text/javascript"></script>
<script src="<?php echo e(asset('js/global/datatable/datetime.js')); ?>" type="text/javascript"></script>
<script src="<?php echo e(asset('js/dibcustom/dib-customer-overview.js')); ?>" type="text/javascript"></script>
<script src="<?php echo e(asset('js/dibcustom/dib-quote-request.js')); ?>" type="text/javascript"></script>
        


<?php $__env->stopSection(); ?>
<?php $__env->startSection('pagescript'); ?>
<script>
    var customerOverview ='';
 var ucolumnDefs = [];
    var userTable = '';
   $(function() {
     //dp_customer_note_add 
     
     <?php if(Session::get('overviewtabselected')): ?>
         var tabValue = "<?php echo Session::get('overviewtabselected'); ?>";
         $('#tab_'+tabValue).find('a').trigger('click');
     <?php endif; ?>
     var options ={'contactpersonAddUrl': '<?php echo route("addcontactperson",$customers->customId); ?>'}
     customerOverview = new Customeroverview(options);
     customerOverview.initialSettings();
     
     var options = {};
      var quoteRequest = new DibQuoterequest(options);
      quoteRequest.initialSetting();
      
      ucolumnDefs.push({"name": 'uname',  "targets": 0, data: function (row, type, val, meta) {
                
                           
                            
                             var subject =    row['name'];

                          
                            row.sortData = row['name'];
                            row.displayData = subject; 
                           
                            return row;
                        }, render: {"_": 'sortData', "display": 'displayData', 'filter': 'sortData'}}); 
        ucolumnDefs.push({"name": "username",  "targets": 1, "orderable": true,data: function (row, type, val, meta) {
                            var subject = row['email'];
                            row.sortData = row['email'];
                            row.displayData = subject;
                           
                            
                            return row;
                        }, render: {"_": 'sortData', "display": 'displayData', 'filter': 'sortData'}});
                    
        ucolumnDefs.push({"name": 'role',  "targets": 2, "orderable": false, data: function (row, type, val, meta) {
                            var subject = createRoles(row['roles']); ;
                            
                            row.sortData = subject;
                            row.displayData = subject;                           
                            
                            return row;
                        }, render: {"_": 'sortData', "display": 'displayData', 'filter': 'sortData'}}); 
                    
          
        ucolumnDefs.push({"name": 'createdat',  "targets": 3, "orderable": true, data: function (row, type, val, meta) {
                            var subject = $.format.date( row['created_at'], "dd.MM.yyyy");
                            row.sortData = $.format.date( row['created_at'], "dd.MM.yyyy"); 
                            row.displayData = subject;                           
                            
                            return row;
                        }, render: {"_": 'sortData', "display": 'displayData', 'filter': 'sortData'}});             
       

                    
                  
                    
        
       
      userTable =   $('.dpib_client_user_list').DataTable( {
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
                columnDefs:ucolumnDefs,
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

   $('a[data-toggle="tab"]').on("shown.bs.tab", function (e) {
$($.fn.dataTable.tables(true)).DataTable()
.columns.adjust()
.responsive.recalc();
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
<?php echo $__env->make('layouts.elite_fullwidth',['sidemenustatus' => array(),'countDetails'=>array(),'notificationCount'=>array() ] , \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Xampp_new\htdocs\inslyportal\resources\views/customer/customeroverview.blade.php ENDPATH**/ ?>