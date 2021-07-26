<li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="ti-align-left"></i><span class="hide-menu">Leads</span></a>
                                <ul aria-expanded="false" class="collapse">
                                    <li> 
                                        <a href="<?php echo e(route('customeradd')); ?>">
                                            <i class="mdi mdi-star-circle text-danger"></i>Add Lead</a>
                                    </li>
                                    
                                    <li> 
                                        <a href="<?php echo e(route('leads')); ?>">
                                            <i class="mdi mdi-star-circle text-danger"></i>All Leads</a>
                                    </li> 
                                    
                                    
 </ul>
                            </li>
                            
                            
                            
   <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="ti-align-left"></i><span class="hide-menu">Customers</span></a>
                                <ul aria-expanded="false" class="collapse">
                                     <li> 
                                        <a href="<?php echo e(route('dashboardcustomers')); ?>">
                                            <i class="mdi mdi-star-circle text-danger"></i>All customers</a>
                                    </li> 
                                       
                                    
 </ul>
                            </li>  
                            
                            
    <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="ti-align-left"></i><span class="hide-menu">Policies</span></a>
                                <ul aria-expanded="false" class="collapse">
                                     <li> 
                                        <a href="<?php echo e(route('technicalPolicyDetails')); ?>">
                                            <i class="mdi mdi-star-circle text-danger"></i>All policies</a>
                                    </li> 
                                       <li> 
                                        <a href="<?php echo e(route('renewalnotificationlist')); ?>">
                                            <i class="mdi mdi-star-circle text-danger"></i>Pending for renewals</a>
                                    </li> 
                                    
 </ul>
                            </li>                          
                            
                            

                            
        <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="ti-align-left"></i><span class="hide-menu">Requests</span></a>
                                <ul aria-expanded="true" class="collapse">
                                    <li> 
                                        <a href="<?php echo e(route('newrequest',0)); ?>">
                                            <i class="mdi mdi-star-circle text-danger"></i>Add request</a>
                                    </li> 
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
                            
                            
 <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="ti-align-left"></i><span class="hide-menu">Reports</span></a>
                                <ul aria-expanded="false" class="collapse">
                                    <li> 
                                        <a href="<?php echo e(route('salesrequest')); ?>">
                                            <i class="mdi mdi-star-circle text-danger"></i>Request status</a>
                                    </li>
                                    <li> 
                                        <a href="<?php echo e(route('saleslead')); ?>">
                                            <i class="mdi mdi-star-circle text-danger"></i>Leads Report</a>
                                    </li>
                                    <li> 
                                        <a href="<?php echo e(route('salescustomer')); ?>">
                                            <i class="mdi mdi-star-circle text-danger"></i>Customer Report</a>
                                    </li>
                                </ul>
                            </li>                        
                            
 <?php /**PATH D:\Xampp_new\htdocs\inslyportal\resources\views/layouts/sales-navbar.blade.php ENDPATH**/ ?>