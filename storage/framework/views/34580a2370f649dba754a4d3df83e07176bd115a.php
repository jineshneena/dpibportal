                         
   <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="ti-align-left"></i><span class="hide-menu">Customers</span></a>
                                <ul aria-expanded="false" class="collapse">
                                     <li> 
                                        <a href="<?php echo e(route('customeradd')); ?>">
                                            <i class="mdi mdi-star-circle text-danger"></i>Add leads</a>
                                    </li> 
                                       <li> 
                                        <a href="<?php echo e(route('leads')); ?>">
                                            <i class="mdi mdi-star-circle text-danger"></i>All leads</a>
                                    </li> 
                                    
                                    <li> 
                                        <a href="<?php echo e(route('dashboardcustomers')); ?>">
                                            <i class="mdi mdi-star-circle text-danger"></i>All customers</a>
                                    </li> 
                                    
 </ul>
 </li>  

                            
         <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="ti-align-left"></i><span class="hide-menu">Requests</span></a>
                                <ul aria-expanded="true" class="collapse">
                                    <li> 
                                        <a href="<?php echo e(route('newrequest',0)); ?>">
                                            <i class="mdi mdi-star-circle text-danger"></i>Add request</a>
                                    </li> 
                                    <?php if(in_array('ROLE_TECHNICAL_MANAGER', Auth::user()->roles)): ?>
                                     <li> 
                                        <a href="<?php echo e(route('salescrmlist')); ?>">
                                            <i class="mdi mdi-star-circle text-danger"></i>All request</a>
                                    </li> 
                                  <?php endif; ?>
                                  <li> <a class="has-arrow" href="javascript:void(0)" aria-expanded="false">New Sales</a>
                                    <ul aria-expanded="false" class="collapse">
                                        <li><a href="<?php echo e(route('dashboardrequestfilter',['new',0])); ?>">Pending</a></li>
                                        <li><a href="<?php echo e(route('dashboardrequestfilter',['new',1])); ?>">Completed</a></li>
                                        <li><a href="<?php echo e(route('dashboardrequestfilter',['new',2])); ?>">Lost</a></li>
                                    </ul>
                                 </li>
                                  <li> <a class="has-arrow" href="javascript:void(0)" aria-expanded="false">Renewals</a>
                                    <ul aria-expanded="false" class="collapse">
                                         <li><a href="<?php echo e(route('dashboardrequestfilter',['renewal',0])); ?>">Pending</a></li>
                                        <li><a href="<?php echo e(route('dashboardrequestfilter',['renewal',1])); ?>">Completed</a></li>
                                        <li><a href="<?php echo e(route('dashboardrequestfilter',['renewal',2])); ?>">Lost</a></li>
                                    </ul>
                                </li>

                                  
                                </ul>
                            </li>   
                            
               <?php if(in_array('ROLE_TECHNICAL_MANAGER', Auth::user()->roles)): ?>              
                  <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="ti-align-left"></i><span class="hide-menu">Operation requests</span></a>
    <ul aria-expanded="true" class="collapse">
        <li> 
            <a href="<?php echo e(route('newendorsementrequest')); ?>">
                <i class="mdi mdi-star-circle text-danger"></i>Add requests</a>
        </li> 

        <li> 
            <a href="<?php echo e(route('dashboardendorsementlist',0)); ?>">
                <i class="mdi mdi-star-circle text-danger"></i>Pending</a>
        </li> 
        <li> 
            <a href="<?php echo e(route('dashboardendorsementlist',1)); ?>">
                <i class="mdi mdi-star-circle text-danger"></i>Completed</a>
        </li> 
        <li> 
            <a href="<?php echo e(route('dashboardendorsementlist')); ?>">
                <i class="mdi mdi-star-circle text-danger"></i>All requests</a>
        </li>
        
        
        

    </ul>
</li>          
                            
   <?php endif; ?>                         
                            
                            

                            
                            
        <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="ti-align-left"></i><span class="hide-menu">Policies</span></a>
                                <ul aria-expanded="false" class="collapse">
                                   <?php if(in_array('ROLE_TECHNICAL_MANAGER', Auth::user()->roles)): ?> 
<!--                                    <li> 
                                        <a href='<?php echo route("createpolicy"); ?>'>
                                            <i class="mdi mdi-star-circle text-danger"></i>Add policies</a>
                                    </li>-->
                                    <?php endif; ?>
                                    
                                    <li> 
                                        <a href="<?php echo e(route('renewalnotificationlist')); ?>">
                                            <i class="mdi mdi-star-circle text-danger"></i>Pending for renewals</a>
                                    </li> 
                                     <li> 
                                        <a href="<?php echo e(route('listpolicyfilter',1)); ?>">
                                            <i class="mdi mdi-star-circle text-danger"></i>Posted</a>
                                    </li> 
                                       <li> 
                                        <a href="<?php echo e(route('listpolicyfilter',2)); ?>">
                                            <i class="mdi mdi-star-circle text-danger"></i>Issued</a>
                                    </li> 
                                    <li> 
                                        <a href="<?php echo e(route('listpolicyfilter',6)); ?>">
                                            <i class="mdi mdi-star-circle text-danger"></i>Rejected</a>
                                    </li>
                                    <li> 
                                        <a href="<?php echo e(route('technicalPolicyDetails')); ?>">
                                            <i class="mdi mdi-star-circle text-danger"></i>All policies</a>
                                    </li>
                                                                        
 </ul>
                            </li>    
                            
                            
             <li> <a class="waves-effect waves-dark" href="<?php echo e(route('dashboardendorsementdetaillist')); ?>" aria-expanded="false"><i class="far fa-circle text-info"></i><span class="hide-menu">All Endorsements</span></a></li>                
             <li> <a class="waves-effect waves-dark" href="<?php echo e(route('dashboardquoteslist')); ?>" aria-expanded="false"><i class="far fa-circle text-info"></i><span class="hide-menu">All Quotes</span></a></li>               
                            
  <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="ti-align-left"></i><span class="hide-menu">Reports</span></a>
                                <ul aria-expanded="false" class="collapse">
                                    <li> 
                                        <a href="<?php echo e(route('corporatepipelinereport')); ?>">
                                            <i class="mdi mdi-star-circle text-danger"></i>Corporate pipeline report</a>
                                    </li>
                                    <li> 
                                        <a href="<?php echo e(route('productionreport')); ?>">
                                            <i class="mdi mdi-star-circle text-danger"></i>Production Report</a>
                                    </li>
                                    <li> 
                                        <a href="<?php echo e(route('renewalreport')); ?>">
                                            <i class="mdi mdi-star-circle text-danger"></i>Renewal report</a>
                                    </li>
                                    <li> 
                                        <a href="<?php echo e(route('quotesreport')); ?>">
                                            <i class="mdi mdi-star-circle text-danger"></i>Quotes report</a>
                                    </li>
                                    <li> 
            <a href="<?php echo e(route('reportrenewalrequest')); ?>">
                <i class="mdi mdi-star-circle text-danger"></i>Renewal request report</a>
        </li>
                             

                                </ul>
                            </li>  
                 <?php /**PATH D:\Xampp_new\htdocs\inslyportal\resources\views/layouts/technical-navbar.blade.php ENDPATH**/ ?>