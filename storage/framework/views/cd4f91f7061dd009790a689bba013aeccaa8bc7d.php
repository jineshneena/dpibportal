                         
<li> <a class="waves-effect waves-dark" href="http://dib.fortiddns.com:8086/auth/autologin?id=1" aria-expanded="false" target="_blank"><i class="far fa-circle text-danger"></i><span class="hide-menu">Accounting</span></a></li>   

<li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="ti-align-left"></i><span class="hide-menu">Customers</span></a>
                                <ul aria-expanded="false" class="collapse">
                                     
                                    <li> 
                                        <a href="<?php echo e(route('dashboardcustomers')); ?>">
                                            <i class="mdi mdi-star-circle text-danger"></i>All customers</a>
                                    </li> 
                                    
 </ul>
 </li>  

 
  
                            
                            
   

                            
   <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="ti-align-left"></i><span class="hide-menu">Policies</span></a>
                                <ul aria-expanded="true" class="collapse">
                                    <li> 
                                        <a href="<?php echo e(route('technicalPolicyDetails')); ?>">
                                            <i class="mdi mdi-star-circle text-danger"></i>All policies</a>
                                    </li>
                                    <li> 
                                        <a href="<?php echo e(route('dashboardfinancepolicylist',0)); ?>">
                                            <i class="mdi mdi-star-circle text-danger"></i>Pending</a>
                                    </li> 
                                     <li> 
                                        <a href="<?php echo e(route('dashboardfinancepolicylist',1)); ?>">
                                            <i class="mdi mdi-star-circle text-danger"></i>Rejected</a>
                                    </li> 
                                    <li> 
                                        <a href="<?php echo e(route('dashboardfinancepolicylist',2)); ?>">
                                            <i class="mdi mdi-star-circle text-danger"></i>Completed</a>
                                    </li>


                                </ul>
                            </li>
                            
      <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="ti-align-left"></i><span class="hide-menu">Endorsements</span></a>
                                <ul aria-expanded="true" class="collapse">
                                    <li> 
                                        <a href="<?php echo e(route('financeendorsementlist',0)); ?>">
                                            <i class="mdi mdi-star-circle text-danger"></i>Pending</a>
                                    </li> 
                                     <li> 
                                        <a href="<?php echo e(route('financeendorsementlist',1)); ?>">
                                            <i class="mdi mdi-star-circle text-danger"></i>Rejected</a>
                                    </li> 
                                    <li> 
                                        <a href="<?php echo e(route('financeapprovedendorsementlist')); ?>">
                                            <i class="mdi mdi-star-circle text-danger"></i>Completed</a>
                                    </li>
                                    

                                </ul>
                            </li>

         <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="ti-align-left"></i><span class="hide-menu">Collection</span></a>
                                <ul aria-expanded="false" class="collapse">
                                    <li> 
                                        <a href="<?php echo e(route('invoicelist')); ?>">
                                            <i class="mdi mdi-star-circle text-danger"></i>Invoices</a>
                                    </li>
                                    <li> 
                                        <a href="<?php echo e(route('invoicepayment')); ?>">
                                            <i class="mdi mdi-star-circle text-danger"></i>Payments</a>
                                    </li>
                                </ul>
                            </li>
     
            <?php if(in_array('ROLE_FINANCE_MANAGER', Auth::user()->roles) || in_array('ROLE_FINANCE_SUPERVISOR', Auth::user()->roles)): ?>
                <li> <a class="waves-effect waves-dark" href="<?php echo e(route('setperiodlock')); ?>" aria-expanded="false" ><i class=" fas fa-lock text-danger"></i><span class="hide-menu">Accounting period</span></a></li>   
            <?php endif; ?>                                                                                                                                   
                            
                            <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="ti-align-left"></i><span class="hide-menu">Reports</span></a>
                                <ul aria-expanded="false" class="collapse">
                                    <li> 
                                        <a href="<?php echo e(route('invoicereport')); ?>">
                                            <i class="mdi mdi-star-circle text-danger"></i>Invoice Report</a>
                                    </li>
<!--                                    <li> 
                                        <a href="<?php echo e(route('collectionreport')); ?>">
                                            <i class="mdi mdi-star-circle text-danger"></i>Collection Report</a>
                                    </li>-->
                                    <li> 
                                        <a href="<?php echo e(route('financeproductionreport')); ?>">
                                            <i class="mdi mdi-star-circle text-danger"></i>Production Report</a>
                                    </li>

                                     <li> 
                                        <a href="<?php echo e(route('installmentreport')); ?>">
                                            <i class="mdi mdi-star-circle text-danger"></i>Installment Report</a>
                                    </li>
                                    <li> 
                                        <a href="<?php echo e(route('financepostrequestreport')); ?>">
                                            <i class="mdi mdi-star-circle text-danger"></i>Post request report</a>
                                    </li>
                                    <li> 
                                        <a href="<?php echo e(route('reportrenewalrequest')); ?>">
                                            <i class="mdi mdi-star-circle text-danger"></i>Renewal request report</a>
                                    </li>

                                </ul>
                            </li>
                       
                            
        
                 <?php /**PATH D:\Xampp_new\htdocs\inslyportal\resources\views/layouts/finance-navbar.blade.php ENDPATH**/ ?>