@extends((in_array('CUSTOMER_MANAGER', Auth::user()->roles) ||  in_array('CUSTOMER_OFFICER', Auth::user()->roles))? 'layouts.elite_client'  :'layouts.elite_fullwidth' )

@section('content')


<!--                  content here  -->
<!--TAB AREA-->
<div class="row">
 @section('headtitle')
         <a href='{{ route("policyoverview",$policyId)}}'>{{$overviewData->policy_number }}</a> <i class="fas fa-angle-double-right"></i><span class='text-blue' style='font-size:25px'>{{$overviewData->request_id}} </span>
@endsection

    <div class="col-md-12 card">


        <ul class="nav nav-tabs" role="tablist">
            <li id="tab_overview" class="nav-item {{ !empty($overviewTab) && $overviewTab == 'overview' ? 'active' : '' }}" onclick="TAB.select('overview', null, 1)"> <a class="nav-link {{ empty($overviewTab) || $overviewTab == 'overview' ? 'active' : '' }}" data-toggle="tab" href="#content_overview" role="tab" aria-selected="true"><span class="hidden-sm-up"><i class="ti-home"></i></span> <span class="hidden-xs-down">Overview</span></a> </li>

            <li id="tab_document" class="nav-item {{ !empty($overviewTab) && $overviewTab == 'document' ? 'active' : '' }}" onclick="TAB.select('document', null, 0); customerdocumentTable.columns.adjust().draw();"> <a class="nav-link {{ empty($overviewTab) || $overviewTab == 'document' ? 'active' : '' }}" data-toggle="tab" href="#content_document" role="tab" aria-selected="false"><span class="hidden-sm-up"><i class="ti-user"></i></span> <span class="hidden-xs-down">Documents ({{ count($documentDetails)}})</span></a> </li>
            
            @if(in_array($overviewData->type, [1,3,4,9]) && in_array($overviewData->status, [3,6,7,8,10]))
            <li id="tab_endorsement" class="nav-item {{ !empty($overviewTab) && $overviewTab == 'endorsement' ? 'active' : '' }}" onclick="TAB.select('endorsement', null, 0);"> <a class="nav-link {{ empty($overviewTab) || $overviewTab == 'endorsement' ? 'active' : '' }}" data-toggle="tab" href="#content_endorsement" role="tab" aria-selected="false"><span class="hidden-sm-up"><i class="ti-user"></i></span> <span class="hidden-xs-down">Endorsement</span></a> </li>
            @endif
            <li id="tab_log" class="nav-item {{ !empty($overviewTab) && $overviewTab == 'log' ? 'active' : '' }}" onclick="TAB.select('log', null, 0); customerLogTable.columns.adjust().draw();"> <a class="nav-link {{ empty($overviewTab) || $overviewTab == 'log' ? 'active' : '' }}" data-toggle="tab" href="#content_log" role="tab" aria-selected="false"><span class="hidden-sm-up"><i class="ti-email"></i></span> <span class="hidden-xs-down">Log</span></a> </li>


        </ul>


    </div>



</div>
<!--TAB CONTENT AREA-->
<div class="row card ribbon-wrapper-reverse">
<div class="ribbon ribbon-bookmark ribbon-right ribbon-info"><i class="ti-hand-point-right"></i>&nbsp;{{$overviewData->statusString}}</div>
    <div id="content_overview" class="tabcontent col-md-12 card-body">
        <div class="row">

            <div class="col-md-12 row button-group">
                <div class="col-lg-6 col-xlg-6 mb-4" style='margin-left:26px'>
                   @if (in_array('CUSTOMER_OFFICER', Auth::user()->roles) || in_array('CUSTOMER_MANAGER', Auth::user()->roles) )
                        

                            @if (in_array('CUSTOMER_MANAGER', Auth::user()->roles)  ||  Auth::user()->id == $overviewData->created_by)
                            
                                @if ($overviewData->status ==1)
                                    <button type="button" class="btn btn-success btn-rounded dpib_endorsement_request_edit dib-cursor-style" editUrl='{!! route("editcrmrequestdata",[$policyId, $requestId]) !!}' data-toggle="tooltip" title="" data-original-title="Edit endorsement request"><i class="fas fa-edit"></i> Edit</button>   
                                    <button type="button" class="btn btn-success btn-rounded dpib_endorsement_crm_delete dib-cursor-style" delete_url="{!! route('deleteendorsementcrmrequest',$requestId) !!}" return-url="{!! route('customerrequestfilter') !!}" data-toggle="tooltip" title="" data-original-title="Delete request"><i class="fas fa-archive"></i> Delete</button>                          
                                   
                                 @endif
                                                    
                            @endif
            
                        @endif
                      <button class="btn btn-success btn-rounded dpib_endorsement_crm_document_add dib-cursor-style" type="button" style='float:right'><i class="fas fa-plus"><div class="notify" > <span class="heartbit" style='top:-16px;'></span> <span class="point" style='top:-4px;'></span> </div></i>Add document</button>  
                     
                </div>
    
                <div class="col-lg-6 col-xlg-6 mb-4" style='text-align:right;margin-left:-118px'>
                
                                   
                                  


                </div>
    
            </div>  
            
            
            
            

            <div id="main-content" class="col-md-4">
                <div id="panel-customer_overview" class="panel panel-default open"><div class="panel-heading">
                        <h3 class="panel-title">Request info</h3></div>
                    <div id="customer_overview" class="panel-collapse panel-body ">
                        <table class="info-table" width='100%'>
                            <tbody>
                                <tr><td style='width:45%'>CRM No:</td><td><b>{{$overviewData->request_id}}</b></td></tr>
                                <tr><td>Type:</td><td>{{ $typeArray[$overviewData->type]  }} </td></tr>
                                <tr><td>Policy no:</td><td><a href='{{ route("clientpolicyoverview",$policyId)}}'><b>{{$overviewData->policy_number }}</b></a></td></tr>
                                
                                
                                
                                <tr><td>Created By:</td><td>{{$overviewData->userName}}</td></tr>
                                @if($overviewData->assign_to !=null)
                                <tr><td>Assign to :</td><td>{{$overviewData->AssignName}}</td></tr>
                                @endif
                                <tr><td>Created date:</td><td>{{date("d.m.Y h:i",strtotime($overviewData->created_at))}} </td></tr>

                                <tr><td>Description:</td><td>{{$overviewData->description}}</td></tr> 
                                
                    
                                
                                
                                
                                
                                
                                
                                @if(!empty($overviewData->related_request))
                                @php
                                $requestdataArray = explode('###',$overviewData->related_request);  

                                @endphp
                                <tr><td>Related request:</td><td><a href='{!! route("overviewendorsementcrmrequest",[$policyId,$requestdataArray[0]]) !!}' target="_blank">{{$requestdataArray[1]}}</a></td></tr>


                                @endif

                                @if($overviewData->inv_flag ==1) 

                                <tr><td>Invoice recieved date:</td><td>{{date("d.m.Y",strtotime($overviewData->inv_recieved_date))}}</td></tr>  

                                @endif
                                
                                

                                <tr class="subtitle"><th colspan="2" style='padding-top:0;padding-bottom:0'>         <div class="panel-heading" style='padding-left:0;padding-bottom:0'>
        
                                            <h3 class="panel-title">Current info</h3>
                                        </div></th></tr>
                                <tr><td>Status:</td><td><a>{{$overviewData->statusString}}</a></td></tr>
                                <tr><td>Last modified date:</td><td class="phoneNumber">{{date("d.m.Y h:i",strtotime($overviewData->updated_at))}}</td></tr>


                            </tbody>
                        </table>
                    </div>
                </div>


            </div>
             <aside class="col-md-7">
                           
               
                    
                    <div id="panel-customer_comments" class="panel panel-default open"><div class="panel-heading">
                            <ul class="panel-actions list-inline pull-right">

                                <li class="dpib_comment_add" ><span class="fas fa-plus text-blue" data-toggle="tooltip" title="" data-original-title="Add Comments"></span></li>


                            </ul><h3 class="panel-title">Comments</h3></div>
                        <div id="customer_overview" class="panel-collapse panel-body fixed-table-header">
                            <table class="info-table table-striped table table-hover" width='100%' style="font-size:14px;">
                                <tbody>
                                  

                                  @foreach ($commentDetails as $commentDetail)
                                    <tr>
                                      <td style='width:35%'>
                                        <span class='text-warning'> {{$commentDetail->createdBy}} </span><br/>
                                        <span  class="text-warning">{{date('m.d.Y h:i A',strtotime($commentDetail-> created_at))}}</span><br />
                                       
                                      </td>
                                      <td><span ><i> {{$commentDetail->comments}}</i></span></td>
                                    </tr>
                                          
                                   @endforeach
                                                         
                                   
                                </tbody>
                            </table>
                        </div>
                      </div>

                </aside>
            

           
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
                          
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>
        </div> 

    </div>

<!--endorsementDetail-->

    <div id="content_endorsement" class="tabcontent col-12"  style="display:none;">
        <div class="card open">
            <div class="card-body"> 
                <div class="panel-heading">
                    <ul class="panel-actions list-inline pull-right"></ul> 
                    <h1 class="card-title">Endorsement<small></small></h1> </div>
        <div class="table-responsive">
                                    <table class="table color-table">
                                        <thead>
                                            <tr>
                                                <th>Endorsement number</th>
                                                <th style='width:10%'>Type</th>
                                                <th>Amount</th>
                                                <th>Issue date</th>
                                                <th>Due date</th>
                                                <th>Created date</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                          @if(count($endorsementDetails) >0)                  
                              @foreach($endorsementDetails as $endorsementDetail) 
                    <tr>
                        
                        <td>{{$endorsementDetail->endorsement_number}}</td>
                       
                        <td>{{$endorsementDetail->typeString}}</td>
                        <td>{{ floatval($endorsementDetail->amount)}}</td>
                         <td>{{date('d.m.Y',strtotime($endorsementDetail->issue_date))}}</td>
                        <td>{{date('d.m.Y',strtotime($endorsementDetail->due_date))}}</td>
                        <td>{{date('d.m.Y h:i',strtotime($endorsementDetail->created_at))}}</td>
                        <td>{{$endorsementDetail->statusString}}</td>                        
                    </tr>
                     @endforeach
                     
                     @else
                     <tr>
                                                <td colspn='7'>No record</td>
                                                
                                            </tr>
                     @endif
                                       
                                        </tbody>
                                    </table>
                                </div>
            </div> 
        </div>
    </div>


    <div id="content_log" class="tabcontent col-12"  style="display:none;" >
        <div class="card open">
            <div class="card-body"> 
                <div class="panel-heading">
                    <ul class="panel-actions list-inline pull-right"></ul> 
                    <h1 class="card-title">Log<small></small></h1> </div>
                <div class="table-responsive" style='width:100%;'>
                    <table class="display nowrap table table-hover table-striped table-bordered dataTable dpib_request_log color-table info-table" >
                        <thead>
                            <tr>
                                <th style="width: 10%" class="nowrap">Date/time</th>
                                <th style="width: 5%" class="nowrap">Edited by</th>                           
                                <th   class="nowrap">Title</th>
                                <th   class="nowrap">Old value</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div> 
        </div>
    </div>
</div>      





<script id='request_status_template' type='text/template'>

    {{ Form::open(array('route' => array('updateendorsementrequeststatus',$policyId), 'name' => 'form_endorsement_request_status_edit','id'=>'form_endorsement_request_status_edit','files'=>'true' )) }}

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
    <input type='hidden' name='crm_request_id' value='{{$overviewData->id}}'>
    {{ Form::select('request_status',  $statusArray, $overviewData->status,array('id' =>'request_status','required'=>'required','class'=>'required form-control','error-message' =>"Gender field is mandatory" ))}}  
    </div>
    </td>
    </tr>




    </tbody></table></div>
    {{ Form::close() }}
</script>
<script id='request_document_upload_template' type='text/template'>
    {{ Form::open(array('route' => array('endorsementcrmdocumentsave', $overviewData->id), 'name' => 'form_document_add','id'=>'form_document_add','files'=>'true' )) }}

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
    <input type='hidden' name='customer_id' value='{!! $overviewData->customer_id !!}'>
    <input type='hidden' name='policy_id' value='{{$policyId}}'>
    {{ Form::select('documenttype_oid',[''=>'--- other ---'] +  $documentType, null,array('id' =>'documenttype_oid','required'=>'required','class'=>'required form-control','error-message' =>"Gender field is mandatory" ))}}  
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
    {{ Form::close() }}
</script>

<script id='request_document_upload_edit_template' type='text/template'>
    {{ Form::open(array('route' => array('endorsementcrmdocumentedit', $overviewData->id), 'name' => 'form_document_add','id'=>'form_document_add','files'=>'true' )) }}



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
    <input type='hidden' name='customer_id' value='{!! $overviewData->customer_id !!}'>
    <input type='hidden' name='policy_id' value='{{$policyId}}'>
    <input type='hidden' name='doc_id' value='<%= docId %>'>
    <input type='hidden' name='crm_id' value='<%= crmId %>'>

    {{ Form::select('documenttype_oid',[''=>'--- other ---'] +  $documentType, '',array('id' =>'documenttype_oid','required'=>'required','class'=>'required form-control','error-message' =>"Gender field is mandatory" ))}}  
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
    {{ Form::close() }}
</script>

<script id='comment_add_template' type='text/template'>

    {{ Form::open(array('route' => array('saveendorsementcomments',$policyId,$overviewData->id), 'name' => 'form_claimant_add','id'=>'form_claimant_add','files'=>'true' )) }}
    @csrf   

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
    <input type="hidden" id="crm_end_request_id" name="endorsement_request_id" value="{{$overviewData->id}}">
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
    {{ Form::close() }}
</script>


<script id='endorsement_request_assign_template' type='text/template'>

    {{ Form::open(array('route' => array('assignOwner',$overviewData->id), 'name' => 'form_endorsement_request_assign','id'=>'form_endorsement_request_assign','files'=>'true' )) }}
    <div class="col-lg-12">
    <div class="card">

    <div class="card-body card-block">
    <div class="form-group">
    <label for="vat" class=" form-control-label">Team members</label>

    {{ Form::select('operation_team',  $assignUsers, null,array('id' =>'operation_team','required'=>'required','class'=>'form-control-lg form-control','error-message' =>"Gender field is mandatory" ))}}  
    </div>


    </div>
    </div>
    </div>
    {{Form::close()}}

</script>



@endsection
@section('customcss')
<link rel="stylesheet" type="text/css" href=" {{ asset('elitedesign/dist/css/pages/ribbon-page.css') }} ">
<link rel="stylesheet" type="text/css" href=" {{ asset('elitedesign/assets/node_modules/datatables.net-bs4/css/dataTables.bootstrap4.css') }} ">
<link rel="stylesheet" type="text/css" href="{{ asset('elitedesign/assets/node_modules/datatables.net-bs4/css/responsive.dataTables.min.css') }}"> 

@endsection




@section('pagescript')

<script src="{{ asset('elitedesign/assets/node_modules/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('elitedesign/assets/node_modules/datatables.net-bs4/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('js/global/datatable/moment.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/global/datatable/datetime.js') }}" type="text/javascript"></script>

<script>
                                    var columnDefs = [];
                                    var columnDefs1 = [];
                                    var customerLogTable = '';
                                    var customerdocumentTable = '';
                                    var policyId = {!! $policyId  !!}
                                    var customerId = {!! $overviewData -> customer_id !!}

                                    $(function(){


                                    $(document).on('change', '#customSwitch1', function() {
                                    var flag = 0;
                                    if ($(this).prop('checked')) {
                                    flag = 1;
                                    }
                                    $.ajax({
                                    url: $(this).attr('changeUrl'),
                                            headers: {
                                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                            },
                                            type: "post",
                                            data:{'recievedFlag':flag}

                                    }).done(function (data) {

                                    location.reload();
                                    });
                                    });
                                    
                                    $(document).on('change', '#customSwitch3', function() {
                                    var flag = 0;
                                    if ($(this).prop('checked')) {
                                    flag = 1;
                                    }
                                    
                                    $.ajax({
                                    url: $(this).attr('changeUrl'),
                                            headers: {
                                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                            },
                                            type: "post",
                                            data:{'recievedFlag':flag}

                                    }).done(function (data) {

                                    location.reload();
                                    });
                                    });
                                    
                                    
                                    
                                    
                                    $(document).on('change', '#customSwitch2', function() {

                                    if ($(this).prop('checked')) {
                                    var template = _.template($("#request_connection_template").html());
                                    var data = {};
                                    var result = template(data);
                                    $("#db_quote_request_editpopup").remove();
                                    $('body').append('<div id="db_request_connect_popup" title="Connected request" style="display:none" >' + result + '</div>');
                                    var dialogElement = $("#db_request_connect_popup");
                                    dialogElement.dialog({
                                    width: 900,
                                            modal: true,
                                            buttons: {
                                            "Update": {
                                            class: "btn waves-effect waves-light btn-rounded btn-success",
                                                    text:'Save',
                                                    click: function () {
                                                    DIB.progressDialog(LOCALE.get('DIB.COMMON.Progress.Loading'));
                                                    if ($.trim($("#connected_request").val()) == '') {
                                                    $("form#form_request_connection").addClass('error');
                                                    $("#connected_request_error").show();
                                                    return false;
                                                    }

                                                    $("form#form_request_connection").submit();
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
                                    }


                                    });
                                    //Edit document

                                    $(document).on('click', '.dpib_endorsement_request_edit', function(){
                                    $.ajax({
                                    url: $(this).attr('editUrl'),
                                            type: "GET"

                                    }).done(function (data) {
                                    $("#db_quote_request_editpopup").remove();
                                    $('body').append('<div id="db_quote_request_editpopup" title="Edit crm request" style="display:none" >' + data.content + '</div>');
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
                                                    $("form#form_endorsement_request_create").submit();
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
                                    })



                                            
                                    columnDefs.push({"name": 'createdby', "targets": 0,'width':'5%', data: function (row, type, val, meta) {
                                    var subject = moment(row['updated_at']).format('DD.MM.YYYY HH:mm');
                                    row.sortData = moment(row['updated_at']).format('DD.MM.YYYY HH:mm');
                                    row.displayData = subject;
                                    return row;
                                    }, render: {"_": 'sortData', "display": 'displayData', 'filter': 'sortData'}});
                                    columnDefs.push({"name": "editedBy",'width':'5%', "targets": 1, "orderable": false, data: function (row, type, val, meta) {
                                    var subject = row['userName'];
                                    row.sortData = row['userName'];
                                    row.displayData = subject;
                                    return row;
                                    }, render: {"_": 'sortData', "display": 'displayData', 'filter': 'sortData'}});
                                    columnDefs.push({"name": 'title', 'width':'30%', "targets": 2, "orderable": false, data: function (row, type, val, meta) {
                                    var subject = row['kind'];
                                    row.sortData = row['kind'];
                                    row.displayData = subject;
                                    return row;
                                    }, render: {"_": 'sortData', "display": 'displayData', 'filter': 'sortData'}});
                                    columnDefs.push({"name": 'oldValue', 'width':'5%', "targets": 3, "orderable": false, data: function (row, type, val, meta) {
                                    var subject = row['old_value'];
                                    row.sortData = row['old_value'];
                                    row.displayData = subject;
                                    return row;
                                    }, render: {"_": 'sortData', "display": 'displayData', 'filter': 'sortData'}});
                                    customerLogTable = $('.dpib_request_log').DataTable({
                                    data: {!! $logData !!},
                                            autoWidth: false,
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
                                            order: [[0, "desc"]],
                                            pageLength: 25,
                                            displayLength: 25,
                                            autoFill: false,
                                            search: false,
                                            columnDefs:columnDefs,
                                            language: {

                                            paginate: {
                                            "first": '<i class="fa fa-angle-double-left"></i>',
                                                    "last": '<i class="fa fa-angle-double-right"></i>',
                                                    "next": '<i class="fa fa-angle-right"></i>',
                                                    "previous": '<i class="fa fa-angle-left"></i>'
                                            }
                                            },
                                            dom: "Bfrtip"

                                    });
                                    columnDefs1.push({"name": 'filename', "targets": 0, data: function (row, type, val, meta) {
                                    var subject = row['file_name'];
                                    row.sortData = row['file_name'];
                                    linkString = "<a href='{!! route('getCustomerDownload',['##CID','0','##FILE']) !!}'>" + subject + "</a>";
                                    var link = linkString.replace("##CID", customerId).replace("##FILE", subject);
                                    row.displayData = link;
                                    return row;
                                    }, render: {"_": 'sortData', "display": 'displayData', 'filter': 'sortData'}});
                                    columnDefs1.push({"name": "comment", "targets": 1, "orderable": false, data: function (row, type, val, meta) {
                                    var subject = row['comment'];
                                    row.sortData = row['comment'];
                                    row.displayData = subject;
                                    return row;
                                    }, render: {"_": 'sortData', "display": 'displayData', 'filter': 'sortData'}});
                                    columnDefs1.push({"name": 'filetype', "targets": 2, data: function (row, type, val, meta) {
                                    var subject = row['docType'];
                                    row.sortData = row['docType'];
                                    row.displayData = subject;
                                    return row;
                                    }, render: {"_": 'sortData', "display": 'displayData', 'filter': 'sortData'}});
                                    columnDefs1.push({"name": 'Uploaded by', "targets": 3, "orderable": false, data: function (row, type, val, meta) {
                                    var subject = (row['dbroker_user']) ? row['dbroker_user']:row['uploadedBy'];
                                    row.sortData = subject;
                                    row.displayData = subject;
                                    return row;
                                    }, render: {"_": 'sortData', "display": 'displayData', 'filter': 'sortData'}});
                                    columnDefs1.push({"name": 'Uploaded at', "targets": 4, data: function (row, type, val, meta) {
                                    var subject = moment(row['upload_at']).format('DD.MM.YYYY HH:mm');
                                    row.sortData = moment(row['upload_at']).format('DD.MM.YYYY HH:mm');
                                    row.displayData = subject;
                                    return row;
                                    }, render: {"_": 'sortData', "display": 'displayData', 'filter': 'sortData'}});
                                    columnDefs1.push({"name": 'Edited at', "targets": 5, data: function (row, type, val, meta) {
                                    var subject = row['edited_at'];
                                    row.sortData = row['edited_at'];
                                    row.displayData = subject;
                                    return row;
                                    }, render: {"_": 'sortData', "display": 'displayData', 'filter': 'sortData'}});
                                    
                                    customerdocumentTable = $('.dpib_request_doc').DataTable({
                                    data: {!! $documentDetails !!},
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

                                    });
                                    $(document).off('click', '.dpib_endorsement_crm_document_add');
                                    $(document).on('click', '.dpib_endorsement_crm_document_add', function(){
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
                                                           if($('#document_file')[0].files.length <=0) {
                                                                 DIB.displayErrors("File is mandatory", LOCALE.get('insly.common.whoops'));  
                                                             } else if($('#document_file')[0].files.length >0) {
                                                                var checkFlag = FORM.validateFile($('#document_file'), 128, 'Maximum file upload size 128 MB exceeded!');
                                                                    if($("#documenttype_oid").val()=='') {
                                                                        DIB.displayErrors("Document type is mandatory", LOCALE.get('insly.common.whoops'));   
  
                                                                    } else if(checkFlag) {
                                                                        $("form#form_document_add").submit();  
                                                                    }
                  
                   
                                                            } else {
                    
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
                                            }
                                    });
                                    });
                                    $(document).off('click', '.dpib_crm_document_edit');
                                    $(document).on('click', '.dpib_crm_document_edit', function(){
                                    var template = _.template($("#request_document_upload_edit_template").html());
                                    var data = {'docType':$(this).attr('doctype'), 'docId':$(this).attr('docid'), 'crmId':$(this).attr('crmid'), 'doccomment':$(this).attr('docdata')};
                                    var docType = $(this).attr('doctype');
                                    var result = template(data);
                                    $("#db_endorsement_request_docpopup").remove();
                                    $('body').append('<div id="db_endorsement_request_docpopup" title="Edit document details" style="display:none" >' + result + '</div>');
                                    var dialogElement = $("#db_endorsement_request_docpopup");
                                    dialogElement.dialog({
                                    width: 900,
                                            modal: true,
                                            buttons: {
                                            "Update": {
                                            class: "btn waves-effect waves-light btn-rounded btn-success",
                                                    text:'Update',
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
                                            },
                                            open: function (event, ui) {
                                            $("#documenttype_oid").val(docType)
                                            }
                                    });
                                    });
                                    $(document).off('click', '.dpib_document_delete');
                                    $(document).on('click', '.dpib_document_delete', function() {
                                    var formdata = {'docId':$(this).attr('docid'), 'crmId':$(this).attr('crmid'), 'customerId':$(this).attr('customerid'), 'policyId':$(this).attr('policyid')};
                                    $("#db_quote_request_editpopup").remove();
                                    $('body').append('<div id="db_quote_request_editpopup" title="Delete document" style="display:none" > Do you want to remove document?</div>');
                                    var dialogElement = $("#db_quote_request_editpopup");
                                    dialogElement.dialog({
                                    width: 900,
                                            modal: true,
                                            buttons: {
                                            "Delete": {
                                            class: "btn waves-effect waves-light btn-rounded btn-success",
                                                    text:'Delete',
                                                    click: function () {
                                                    DIB.progressDialog(LOCALE.get('dib.common.progress.loading'));
                                                    $.ajax({
                                                    url: "{!! route('endorsementcrmdocumentremove',$overviewData->id) !!}",
                                                            type: "GET",
                                                            data:formdata

                                                    }).done(function (data) {
                                                    if (data.status) {
                                                    location.reload(true);
                                                    }
                                                    });
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
                                    $(document).off('click', '.dpib_comment_add');
                                    $(document).on('click', '.dpib_comment_add', function(){


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
                                                    var i = 0;
                                                    $(".required:visible").each(function(){
                                                    if ($(this).val() == '' || $(this).val() == null) {
                                                    isValid = false;
                                                    $(this).addClass('form-control-danger');
                                                    $(this).parent('.element').addClass('has-danger')
                                                            if (i == 0) {
                                                    errorMessage += "<b>The following errors occurred while validating data:" + "</b><br/>";
                                                    i++;
                                                    }
                                                    errorMessage += "<b>" + $(this).attr('error-message') + "</b><br/>"

                                                    } else {
                                                    $(this).removeClass('error');
                                                    $(this).removeClass('form-control-danger');
                                                    $(this).parent('.element').removeClass('has-danger')
                                                    }
                                                    });
                                                    if (isValid) {

                                                    $("form#form_claimant_add").submit();
                                                    } else {
                                                    DIB.alert(errorMessage, 'Error!!!!');
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

                                    $(document).on('click', '.dpib_endorsement_crm_assign', function() {

                                    var assignUrl = $(this).attr('assign_url');
                                    $("#db_crm_endorsement_request_assignpopup").remove();
                                    var template = _.template($("#endorsement_request_assign_template").html());
                                    var result = template();
                                    $('body').append('<div id="db_crm_endorsement_request_assignpopup" title="Assign endorsement request" style="display:none" >' + result + '</div>');
                                    var dialogElement = $("#db_crm_endorsement_request_assignpopup");
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
                                                    $("form#form_endorsement_request_assign").submit();
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
                                            $("form#form_endorsement_request_assign").attr('action', assignUrl);
                                            }
                                    });
                                    DIB.centerDialog();
                                    });
                                    
                                    //DELETE REQUEST
                                    $(document).on('click','.dpib_endorsement_crm_delete',function() {
         
        var deleteUrl = $(this).attr('delete_url');
        var returnUrl = $(this).attr('return-url');
        
        $("#db_crm_endorsement_request_deletepopup").remove();
                $('body').append('<div id="db_crm_endorsement_request_deletepopup" title="Remove endorsement request" style="display:none" > Do you really want to remove endorsement request ?</div>');
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
                                    
                                    
                                    });
                                    
                                 

</script>

@endsection