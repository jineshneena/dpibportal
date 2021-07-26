                         
<li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="ti-align-left"></i><span class="hide-menu">Customers</span></a>
    <ul aria-expanded="false" class="collapse">
             <li> 
                                        <a href="{{ route('customeradd') }}">
                                            <i class="mdi mdi-star-circle text-danger"></i>Add leads</a>
                                    </li> 
                                       <li> 
                                        <a href="{{ route('leads') }}">
                                            <i class="mdi mdi-star-circle text-danger"></i>All leads</a>
                                    </li> 
                                    
                                    <li> 
                                        <a href="{{ route('dashboardcustomers') }}">
                                            <i class="mdi mdi-star-circle text-danger"></i>All customers</a>
                                    </li> 

    </ul>
</li>  

<li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="ti-align-left"></i><span class="hide-menu">Policies</span></a>
    <ul aria-expanded="false" class="collapse">

        <li> 
            <a href="{{ route('technicalPolicyDetails') }}">
                <i class="mdi mdi-star-circle text-danger"></i>All policies</a>
        </li>
        <li> 
                                        <a href="{{ route('listpolicyfilter',1) }}">
                                            <i class="mdi mdi-star-circle text-danger"></i>Posted</a>
          </li>
        <li> 
            <a href="{{ route('renewalnotificationlist') }}">
                <i class="mdi mdi-star-circle text-danger"></i>Pending for renewals</a>
        </li> 
         


    </ul>
</li>


  @if(in_array('ROLE_OPERATION_MANAGER', Auth::user()->roles))                                
                                 
                                 
<li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="ti-align-left"></i><span class="hide-menu">New sales</span></a>
    <ul aria-expanded="false" class="collapse">
                                    <li> 
                                    <a href="{{ route('newrequest',0) }}">
                                            <i class="mdi mdi-star-circle text-danger"></i>Add request</a>
                                    </li> 
                                    
                                 <li> 
          
          
                                        <a href="{{route('dashboardrequestfilter',['new',0]) }}">
                                            <i class="mdi mdi-star-circle text-danger"></i>Pending</a>
                                    </li> 
                                    <li> 
                                        <a href="{{route('dashboardrequestfilter',['new',1]) }}">
                                            <i class="mdi mdi-star-circle text-danger"></i>Completed</a>
                                    </li> 
                                    
                                     <li> 
                                        <a href="{{route('dashboardrequestfilter',['new',2]) }}">
                                            <i class="mdi mdi-star-circle text-danger"></i>Lost</a>
                                    </li>  


    </ul>
</li>                                  

@endif




<li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="ti-align-left"></i><span class="hide-menu">Renewal request</span></a>
    <ul aria-expanded="false" class="collapse">
                                    <li> 
                                    <a href="{{ route('newrequest',0) }}">
                                            <i class="mdi mdi-star-circle text-danger"></i>Add request</a>
                                    </li> 
                                    
                                 <li> 
          
          
                                        <a href="{{route('dashboardrequestfilter',['renewal',0]) }}">
                                            <i class="mdi mdi-star-circle text-danger"></i>Pending</a>
                                    </li> 
                                    <li> 
                                        <a href="{{route('dashboardrequestfilter',['renewal',1]) }}">
                                            <i class="mdi mdi-star-circle text-danger"></i>Completed</a>
                                    </li> 
                                    
                                     <li> 
                                        <a href="{{route('dashboardrequestfilter',['renewal',2]) }}">
                                            <i class="mdi mdi-star-circle text-danger"></i>Lost</a>
                                    </li>  


    </ul>
</li>  







<li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="ti-align-left"></i><span class="hide-menu">Operation requests</span></a>
    <ul aria-expanded="true" class="collapse">
        <li> 
            <a href="{{ route('newendorsementrequest') }}">
                <i class="mdi mdi-star-circle text-danger"></i>Add requests</a>
        </li> 

        <li> 
            <a href="{{ route('dashboardendorsementlist',0) }}">
                <i class="mdi mdi-star-circle text-danger"></i>Pending</a>
        </li> 
        <li> 
            <a href="{{ route('dashboardendorsementlist',1) }}">
                <i class="mdi mdi-star-circle text-danger"></i>Completed</a>
        </li> 
        <li> 
            <a href="{{ route('dashboardendorsementlist') }}">
                <i class="mdi mdi-star-circle text-danger"></i>All requests</a>
        </li>
        
        
        

    </ul>
</li>
  <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="ti-align-left"></i><span class="hide-menu">Endorsements</span></a>
                                <ul aria-expanded="true" class="collapse">
                                    <li> 
                                        <a href="{{ route('endorsementlist',0) }}">
                                            <i class="mdi mdi-star-circle text-danger"></i>Pending</a>
                                    </li> 
                                     <li> 
                                        <a href="{{ route('endorsementlist',1) }}">
                                            <i class="mdi mdi-star-circle text-danger"></i>Rejected</a>
                                    </li> 
                                    <li> 
                                        <a href="{{ route('endorsementlist',2) }}">
                                            <i class="mdi mdi-star-circle text-danger"></i>Completed</a>
                                    </li>
                                    

                                </ul>
     </li>  


<li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="ti-align-left"></i><span class="hide-menu">Claims</span></a>
    <ul aria-expanded="true" class="collapse">
        <li> 
            <a href="{{ route('newclaim') }}">
                <i class="mdi mdi-star-circle text-danger"></i>Add claims</a>
        </li> 

        <li> 
            <a href="{{ route('claimlist') }}">
                <i class="mdi mdi-star-circle text-danger"></i>All claims</a>
        </li> 


    </ul>
</li>                       

<li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="ti-align-left"></i><span class="hide-menu">Complaint</span></a>
    <ul aria-expanded="true" class="collapse">
        <li> 
            <a href="{{ route('newcomplaint') }}">
                <i class="mdi mdi-star-circle text-danger"></i>Add complaint</a>
        </li> 
        <li> 
            <a href="{{ route('dashboardcomplaintlist',1) }}">
                <i class="mdi mdi-star-circle text-danger"></i>Pending</a>
        </li> 

        <li> 
            <a href="{{ route('dashboardcomplaintlist',2) }}">
                <i class="mdi mdi-star-circle text-danger"></i>Completed</a>
        </li> 


    </ul>
</li>      

<li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="ti-layout-grid2"></i><span class="hide-menu">Reports</span></a>
    <ul aria-expanded="false" class="collapse">
        <li> 
            <a href="{{ route('operationrequestreport') }}">
                <i class="mdi mdi-star-circle text-danger"></i>Operation request report</a>
        </li>
        <li> 
            <a href="{{ route('salescustomer') }}">
                <i class="mdi mdi-star-circle text-danger"></i>Customer Report</a>
        </li>
        <li> 
            <a href="{{ route('policycompliant') }}">
                <i class="mdi mdi-star-circle text-danger"></i>Complaint report</a>
        </li>
        <li> 
            <a href="{{ route('claimreport') }}">
                <i class="mdi mdi-star-circle text-danger"></i>Claim report</a>
        </li>
        <li> 
            <a href="{{ route('endorsementreport') }}">
                <i class="mdi mdi-star-circle text-danger"></i>Endorsement report</a>
        </li>
        <li> 
            <a href="{{ route('reportrenewalrequest') }}">
                <i class="mdi mdi-star-circle text-danger"></i>Renewal request report</a>
        </li>

    </ul>
</li>           

