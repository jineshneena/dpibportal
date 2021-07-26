
@extends('layouts.elite_client' )



@section('content')

<div class="row col-12 dpib-custom-form">



    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="insly-form">

                    {{ Form::open(array('route' => array('saverequestinfo', $customer), 'name' => 'form_request_add','id'=>'form_quote_request_add','files'=>'true' )) }}
            


                    @csrf  
                    <div class="panel panel-default panel-dark">
                        <div class="panel-heading" id="fieldgroup_title_customer">
                            <!-- <div class="blocktitle"> -->
                            <h3 class="panel-title">Add request</h3>							
                            <!-- </div> -->
                        </div>
                        <div class="panel-body" id="fieldgroup_customer">
                            <table class="insly-form" id="request_add_table">
                               <tr id="field_policy_oid" class="field ">
                                    <td class="">
                                        <div class="label ">
                                          
                                            <span class="text-danger "></span>
                                            <span class="title">Type</span>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="element">
                                            {{ Form::select('request_type', [''=>'--Select--']+$requestType, '',array('id' =>'request_type','required'=>'required','class'=>'required form-control','error-message' =>"Request type field is mandatory" ))}} 
                                        </div>
                                    </td>
                                </tr>
                                
                                <tr id="field_policy_oid" class="field ">
                                    <td class="">
                                        <div class="label ">
                                           
                                            <span class="text-danger "></span>
                                            <span class="title">Policy</span>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="element">
                                            {{ Form::select('request_policy',  $policies, '',array('id' =>'request_policy','required'=>'required','class'=>'required form-control','error-message' =>"Policy field is mandatory" ))}} 
                                        </div>
                                    </td>
                                </tr>  
                            </table>
                        </div>
                    </div>
   <div class="buttonbar pull-right">
            <div class="submit"><button type="submit" id="submit_save" name="submit_save" class="btn waves-effect waves-light btn-rounded btn-success" onclick="FORM.submit()">Add</button>
                <button type="button" id="submit_cancel" name="submit_cancel" onclick="FORM.cancel()" class='btn waves-effect waves-light btn-rounded btn-danger'>Cancel</button></div>
        </div>
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
</div>
    
    <script id='endorsement_request_add_template' type='text/template'>

       <tr id="field_request_type" class="field newfield">
            <td class="">
                <div class="label ">
                <span class="text-danger "></span>
                <span class="title">Endorsement type</span>
                </div>
            </td>
            <td>

                <div class="element">
                {{ Form::select('endorsement_type',  $endorsementType, '',array('id' =>'endorsement_type','required'=>'required','class'=>'required form-control','error-message' =>"Gender field is mandatory" ))}}  
                </div>
            </td>
        </tr>
        <tr id="field_request_comment" class="field newfield">
            <td class="">
                <div class="label ">
                <span class="text-danger "></span>
                <span class="title">Description</span>
                </div>
            </td>
            <td>
                <div class="element">
                <textarea id="request_comment" name="request_comment"  autocomplete="off" maxlength="255" wrap="soft" rows="4" autocomplete="off"  class="form-control"></textarea>
                </div>
            </td>
        </tr>
        <tr id="field_document_file" class="field newfield">
                        <td class="">
                            <div class="label"><span class="text-danger icon-asterix"></span><span class="title">File</span></div>
                        </td>
                                <td>
                                    <div class="element"><div><input type="file" id="endorsement_document_file" name="endorsement_document_file[]" multiple="multiple" onchange="FORM.validateFile($(this), 128, 'Maximum file upload size 128 MB exceeded!')"></div></div>
                                </td>
        </tr>

    </script>

    <script id='complaint_request_add_template' type='text/template'>
        <tr id="field_request_type" class="field newfield">
            <td class="">
                <div class="label ">
                <span class="text-danger "></span>
                <span class="title">Complaint type</span>
                </div>
            </td>
            <td>

                <div class="element">
                {{ Form::select('complaint_type',  $complaintType, '',array('id' =>'complaint_type','required'=>'required','class'=>'required form-control','error-message' =>"Gender field is mandatory" ))}}  
                </div>
            </td>
        </tr>





        <tr id="field_request_comment" class="field newfield">
            <td class="">
                <div class="label ">
                <span class="text-danger "></span>
                <span class="title">Remarks</span>
                </div>
            </td>
            <td>
                <div class="element">
                <textarea id="complaint_remarks" name="complaint_remarks"  autocomplete="off"  wrap="soft" rows="4" class='form-control'></textarea>
                </div>
            </td>
        </tr>


        <tr id="field_request_comment" class="field newfield">
            <td class="">
                <div class="label ">
                <span class="text-danger "></span>
                <span class="title">Bill amount</span>
                </div>
            </td>
            <td>
                <div class="element">
                <input type="text" id="complaint_bill_amount" name="complaint_bill_amount"  autocomplete="off"  wrap="soft"   maxlength="255" value="0.00" placeholder="0.00"  class='form-control'/>
                </div>
            </td>
        </tr>

        <tr id="field_request_comment" class="field newfield">
            <td class="">
                <div class="label ">
                <span class="text-danger"></span>
                <span class="title">Approve amount</span>
                </div>
            </td>
            <td>
                <div class="element">
                <input type="text" id="complaint_approve_amount" name="complaint_approve_amount"  autocomplete="off"  wrap="soft" value="0.00" placeholder="0.00" class='form-control'/>
                </div>
            </td>
        </tr>




    </script>

    <script id='claim_request_add_template' type='text/template'>
        <tr id="field_claim_date_incident" class="field newfield">
            <td class="">
                <div class="label"><span class="text-danger icon-asterix"></span><span class="title">Loss date and time</span></div>
            </td>
            <td>
                <div class="element">
                <input type="datetime-local" id="claim_date_incident" name="claim_date_incident"   value="{{date('d.m.Y')}}" class="datefield form-control" style="margin-right: 0px !important"/>

                <div style="float: right; width: 40%; padding-left: 10px; padding-top: 9px; overflow: hidden"><div id="claim_date_incident_comment"></div>

                </div></div>
            </td>
        </tr>

        <tr id="field_prop_claim_insurace_claimnumber" class="field newfield">
            <td class="">
                <div class="label ">
                <span class="text-danger "></span>
                <span class="title">Insurance claim number</span>
                </div>
            </td>
            <td>
                <div class="element">
                <input type="text" id="claim_insurace_claimnumber" name="claim_insurace_claimnumber"  autocomplete="off" class='form-control' />
                </div>
            </td>
        </tr>
        
         <tr id="field_prop_claim_insurace_claimnumber" class="field newfield">
            <td class="">
                <div class="label ">
                <span class="text-danger "></span>
                <span class="title">Location</span>
                </div>
            </td>
            <td>
                <div class="element">
                <input type="text" id="claim_location" name="claim_location"  autocomplete="off" class='form-control' />
                </div>
            </td>
        </tr>
        
        <tr id="field_document_file" class="field newfield">
                        <td class="">
                            <div class="label"><span class="text-danger icon-asterix"></span><span class="title">File</span></div>
                            </td>
                                <td>
                                    <div class="element"><div><input type="file" id="document_file" name="document_file[]" multiple="multiple" onchange="FORM.validateFile($(this), 128, 'Maximum file upload size 128 MB exceeded!')"></div></div>
                                    </td>
                                    </tr>
        
        
        
        
        

    </script>
    @endsection
    
    @section('pagescript')
    <script>
    $(function(){
       $(document).on('change','#request_type',function(){
           
           var template='';
            
        var data = {};
        
           if($(this).val() ==='endorsement') {
            $("#request_add_table tr").remove('.newfield');
            template = _.template($("#endorsement_request_add_template").html());   
           } else if($(this).val() ==='claim') {
              $("#request_add_table tr").remove('.newfield');
              template = _.template($("#claim_request_add_template").html());   
           } else if($(this).val() ==='complaint') {
            $("#request_add_table tr").remove('.newfield');
            template = _.template($("#complaint_request_add_template").html());    
           }
           
           var result = template(data);
           $("#request_add_table").append(result);
       }); 
        
        
        
        
    })
    
    </script>
    
     @endsection