                         




<li> <a class="waves-effect waves-dark" href="{{ route('customerpolicies') }}" aria-expanded="false"><i class="far fa-circle text-info"></i><span class="hide-menu">Policies</span></a></li>

<li> <a class="waves-effect waves-dark" href="{{ route('createrequest',Auth::user()->customer_id) }}" aria-expanded="false"><i class="far fa-circle text-info"></i><span class="hide-menu">Add request</span></a></li>

<li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="ti-align-left"></i><span class="hide-menu">Endorsements</span></a>
    <ul aria-expanded="false" class="collapse">
                                    
                                 <li> 
          
          
                                        <a href="{{route('customerrequestfilter',[0]) }}">
                                            <i class="mdi mdi-star-circle text-danger"></i>Pending</a>
                                    </li> 
                                    <li> 
                                        <a href="{{route('customerrequestfilter',[1]) }}">
                                            <i class="mdi mdi-star-circle text-danger"></i>Completed</a>
                                    </li> 
                                    
                                    <li> 
                                            <a href="{{ route('customerrequestfilter') }}">
                                            <i class="mdi mdi-star-circle text-danger"></i>All requests</a>
                                    </li>
        
                                    
                                     


    </ul>
</li> 

<li> <a class="waves-effect waves-dark" href="{{ route('customerclaimlist') }}" aria-expanded="false"><i class="far fa-circle text-info"></i><span class="hide-menu">Claims</span></a></li>
<li> <a class="waves-effect waves-dark" href="{{ route('customercomplaintlist') }}" aria-expanded="false"><i class="far fa-circle text-info"></i><span class="hide-menu">Complaints</span></a></li>

 @if (in_array('CUSTOMER_MANAGER', Auth::user()->roles)) 
<li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="ti-layout-grid2"></i><span class="hide-menu">Users</span></a>
    <ul aria-expanded="false" class="collapse">
                                <li> 
                                        <a href="{{route('userform') }}">
                                            <i class="fas fa-user-plus text-danger"></i>&nbsp;Add users</a>
                                    </li>      
                                 <li> 
          
          
                                        <a href="{{route('listusers',Auth::user()->customer_id) }}">
                                            <i class="fas fa-users text-danger"></i>&nbsp;List users</a>
                                    </li> 
                                   
      
    </ul>
</li> 
@endif

<li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="ti-align-left"></i><span class="hide-menu">Reports</span></a>
    <ul aria-expanded="false" class="collapse">
        <li> 
            <a href="{{ route('operationrequestreport') }}">
                <i class="mdi mdi-star-circle text-danger"></i>Request report</a>
        </li>
        <li> 
            <a href="{{ route('claimreport') }}">
                <i class="mdi mdi-star-circle text-danger"></i>Claim Report</a>
        </li>
        <li> 
            <a href="{{ route('policycompliant') }}">
                <i class="mdi mdi-star-circle text-danger"></i>Complaint report</a>
        </li>



    </ul>
</li>
