                         




<li> <a class="waves-effect waves-dark" href="<?php echo e(route('customerpolicies')); ?>" aria-expanded="false"><i class="far fa-circle text-info"></i><span class="hide-menu">Policies</span></a></li>

<li> <a class="waves-effect waves-dark" href="<?php echo e(route('createrequest',Auth::user()->customer_id)); ?>" aria-expanded="false"><i class="far fa-circle text-info"></i><span class="hide-menu">Add request</span></a></li>

<li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="ti-align-left"></i><span class="hide-menu">Endorsements</span></a>
    <ul aria-expanded="false" class="collapse">
                                    
                                 <li> 
          
          
                                        <a href="<?php echo e(route('customerrequestfilter',[0])); ?>">
                                            <i class="mdi mdi-star-circle text-danger"></i>Pending</a>
                                    </li> 
                                    <li> 
                                        <a href="<?php echo e(route('customerrequestfilter',[1])); ?>">
                                            <i class="mdi mdi-star-circle text-danger"></i>Completed</a>
                                    </li> 
                                    
                                    <li> 
                                            <a href="<?php echo e(route('customerrequestfilter')); ?>">
                                            <i class="mdi mdi-star-circle text-danger"></i>All requests</a>
                                    </li>
        
                                    
                                     


    </ul>
</li> 

<li> <a class="waves-effect waves-dark" href="<?php echo e(route('customerclaimlist')); ?>" aria-expanded="false"><i class="far fa-circle text-info"></i><span class="hide-menu">Claims</span></a></li>
<li> <a class="waves-effect waves-dark" href="<?php echo e(route('customercomplaintlist')); ?>" aria-expanded="false"><i class="far fa-circle text-info"></i><span class="hide-menu">Complaints</span></a></li>

 <?php if(in_array('CUSTOMER_MANAGER', Auth::user()->roles)): ?> 
<li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="ti-layout-grid2"></i><span class="hide-menu">Users</span></a>
    <ul aria-expanded="false" class="collapse">
                                <li> 
                                        <a href="<?php echo e(route('userform')); ?>">
                                            <i class="fas fa-user-plus text-danger"></i>&nbsp;Add users</a>
                                    </li>      
                                 <li> 
          
          
                                        <a href="<?php echo e(route('listusers',Auth::user()->customer_id)); ?>">
                                            <i class="fas fa-users text-danger"></i>&nbsp;List users</a>
                                    </li> 
                                   
      
    </ul>
</li> 
<?php endif; ?>

<li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="ti-align-left"></i><span class="hide-menu">Reports</span></a>
    <ul aria-expanded="false" class="collapse">
        <li> 
            <a href="<?php echo e(route('operationrequestreport')); ?>">
                <i class="mdi mdi-star-circle text-danger"></i>Request report</a>
        </li>
        <li> 
            <a href="<?php echo e(route('claimreport')); ?>">
                <i class="mdi mdi-star-circle text-danger"></i>Claim Report</a>
        </li>
        <li> 
            <a href="<?php echo e(route('policycompliant')); ?>">
                <i class="mdi mdi-star-circle text-danger"></i>Complaint report</a>
        </li>



    </ul>
</li>
<?php /**PATH D:\Xampp_new\htdocs\inslyportal\resources\views/layouts/client-navbar.blade.php ENDPATH**/ ?>