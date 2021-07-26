                         
<li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="ti-align-left"></i><span class="hide-menu">Customers</span></a>
    <ul aria-expanded="false" class="collapse">


        <li> 
            <a href="<?php echo e(route('managementdashboard')); ?>">
                <i class="mdi mdi-star-circle text-danger"></i>All customers</a>
        </li> 
        <li> 
            <a href="<?php echo e(route('renewalnotificationlist')); ?>">
                <i class="mdi mdi-star-circle text-danger"></i>Upcoming renewals</a>
        </li> 
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




<li> <a class="waves-effect waves-dark" href="<?php echo e(route('dashboardcomplaintlist')); ?>" aria-expanded="false"><i class="far fa-circle text-info"></i><span class="hide-menu">Complaints</span></a></li>



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
<?php /**PATH D:\Xampp_new\htdocs\inslyportal\resources\views/layouts/management-navbar.blade.php ENDPATH**/ ?>