
@if (isset($requestId))
{{ Form::open(array('route' => array('editcrmrequest', $customerId,$requestId), 'name' => 'form_quote_request_edit','id'=>'form_quote_request_edit','files'=>'true' )) }}
@else
{{ Form::open(array('route' => array('savecrmrequest', $customerId), 'name' => 'form_quote_request_add','id'=>'form_quote_request_add','files'=>'true' )) }}
@endif


@csrf 

<div class="dialogform" id="fieldgroup_addperson">
    <table class="insly-form">
        <tbody>
            <tr id="field_addperson_name" class="field">
                <td class="">
                    <div class="label ">
                        <span class="text-danger icon-asterix"></span>
                        <span class="title">Customer</span>
                    </div>
                </td>
                <td>
                    <div class="element">
                        {{ Form::select('customer_select',[''=>'---- select customer ----'] + $customerDetails, isset($requestDetails->customer_id) ? $requestDetails->customer_id:$customerId,array('id' =>'customer_select','style'=>'width: 100%;','class'=>"autocomplete required select2 form-control custom-select","required" =>"required" ,"error-message"=>'Customer selection is mandatory'))}}                                                    
                    </div>
                </td>
            </tr>

            <tr id="field_addperson_name" class="field">
                <td class="">
                    <div class="label ">
                        <span class="text-danger icon-asterix"></span>
                        <span class="title">Type</span>
                    </div>
                </td>
                <td>
                    <div class="element">
                      
                       @if (isset($requestId))
                            @php
                                $fieldArray = array('id' =>'crm_type','style'=>'width: 100%;','required'=>'required','class'=>'required form-control custom-select','error-message' =>"Type field is mandatory",'disabled' => true );
                               
                            @endphp
                        @else
                            @php
                             $fieldArray = array('id' =>'crm_type','style'=>'width: 100%;','required'=>'required','class'=>'required form-control custom-select','error-message' =>"Type field is mandatory");
                            @endphp
                       @endif

                        {{ Form::select('crm_type', array(''=>'---Not set---',1 => 'Request',3=>'Renewal'),isset($requestDetails->type) ? $requestDetails->type:1,$fieldArray)}}
                        
                        @if (isset($requestId))
                         <input type="hidden" name="hiddenType" value="{{$requestDetails->type}}" >
                        @endif

                    </div>
                </td>
            </tr> 



            <tr id="field_user" class="field hide">
                <td class="">
                    <div class="label ">
                        <span class="text-danger icon-asterix"></span>
                        <span class="title">Assign</span>
                    </div>
                </td>
                <td>
                    <div class="element">
                        {{ Form::select('user_select', [''=>'---- select user ----'] +$userDetails, isset($requestDetails->assigned_to) ? $requestDetails->assigned_to:Auth::user()->id,array('id' =>'user_select','style'=>'width: 100%;','class'=>"required","required" =>"required" ,"error-message"=>'User field is mandatory'))}}                                                    


                    </div>
                </td>
            </tr>

            <tr id="field_subject" class="field dib_task">
                <td class="">
                    <div class="label ">
                        <span class="text-danger "></span>
                        <span class="title">Subject</span>
                    </div>
                </td>
                <td>
                    <div class="element">
                        <textarea class="note_add_entry full-width" name="request_subject" rows="10" wrap="soft" >{{isset($requestDetails->subject) ? $requestDetails->subject:''}}</textarea>
                    </div>
                </td>
            </tr>

            <tr id="field_attendees" class="field dib_task">
                <td class="">
                    <div class="label ">
                        <span class="text-danger "></span>
                        <span class="title">Attendees</span>
                    </div>
                </td>
                <td>
                    <div class="element">
                        <textarea class="note_add_entry full-width" name="request_attendees" rows="10" wrap="soft" >{{isset($requestDetails->attendees) ? $requestDetails->attendees:''}}</textarea>
                    </div>
                </td>
            </tr>

            <tr id="field_priority" class="field" style="display:none">
                <td class="">
                    <div class="label ">
                        <span class="text-danger "></span>
                        <span class="title">Priority</span>
                    </div>
                </td>
                <td>
                    <div class="element">
                        {{ Form::select('crm_priority', array(1 => 'Low',2 => 'Medium',3=>'High'), isset($requestDetails->priority) ? $requestDetails->priority:0,array('id' =>'crm_priority','required'=>'required','class'=>'required','error-message' =>"Gender field is mandatory" ))}}
                    </div>
                </td>
            </tr>
            <tr id="field_location" class="field dib_task">
                <td class="">
                    <div class="label ">
                        <span class="text-danger "></span>
                        <span class="title">Location</span>
                    </div>
                </td>
                <td>
                    <div class="element">
                        <textarea class="note_add_entry full-width" name="request_location" rows="10" wrap="soft" >{{isset($requestDetails->location) ? $requestDetails->location:''}}</textarea>
                    </div>
                </td>
            </tr>

<!--            <tr id="field_task_description" class="field dib_task">
                <td class="">
                    <div class="label ">
                        <span class="text-danger "></span>
                        <span class="title">Description</span>
                    </div>
                </td>
                <td>
                    <div class="element">
                        <textarea class="note_add_entry full-width" name="task_description" rows="10" wrap="soft" >{{isset($requestDetails->description) ? $requestDetails->description:''}}</textarea>
                    </div>
                </td>
            </tr>-->



            @if (isset($requestId))

            <tr id="field_status" class="field dib_task">
                <td class="">
                    <div class="label "> 
                        <span class="text-danger "></span>
                        <span class="title">Status</span>
                    </div>
                </td>
                <td>
                    <div class="element">

                        {{ Form::select('request_status_task', array('0' => 'Open','1' => 'Underprocess', '9' =>'Completed'), isset($requestDetails->status) ? $requestDetails->status:0,array('id' =>'request_status_task','style'=>'width: 100%;','required'=>'required','class'=>'required request_status','error-message' =>"Gender field is mandatory" ))}}

                    </div>
                </td>
            </tr> 
            
             <tr id="field_status" class="field dib_request">
                <td class="">
                    <div class="label ">                        
                        <span class="title">Status</span>
                    </div>
                </td>
                <td>
                    <div class="element">
                         @if (isset($requestId))
                        {{ Form::select('request_status_request', array('0' => 'Open','1' => 'Underprocess','2'=>'Technical review','3'=>'Approved submissions','4' =>'Quote uploaded','5' =>'Revise quotation', '6' =>'Request policy', '7' =>'Policy uploaded', '8' =>'Reject', '9' =>'Completed','10' =>'Lost','11'=>'Pending with sales','12'=>'Pending with client'), isset($requestDetails->status) ? $requestDetails->status:0,array('id' =>'request_status_request','required'=>'required','style'=>'width: 100%;','class'=>'required request_status','error-message' =>"Gender field is mandatory" ,'disabled' => true))}}
                        @else
                         {{ Form::select('request_status_request', array('0' => 'Open','1' => 'Underprocess','2'=>'Technical review','3'=>'Approved submissions','4' =>'Quote uploaded','5' =>'Revise quotation', '6' =>'Request policy', '7' =>'Policy uploaded', '8' =>'Reject', '9' =>'Completed','10' =>'Lost','11'=>'Pending with sales','12'=>'Pending with client'), isset($requestDetails->status) ? $requestDetails->status:0,array('id' =>'request_status_request','required'=>'required','style'=>'width: 100%;','class'=>'required request_status','error-message' =>"Gender field is mandatory" ))}}
                        @endif
                    </div>
                </td>
            </tr> 
            
            <tr id="field_status" class="field dpib_reject_reason" style="display:none">
                <td class="">
                    <div class="label ">
                        <span class="text-danger icon-asterix"></span>
                        <span class="title">Reason</span>
                    </div>
                </td>
                <td>
                    <div class="element">

                     <textarea class="note_add_entry" name="reject_reason" rows="10" wrap="soft" >{{isset($requestDetails->reject_reason) ? $requestDetails->reject_reason:''}}</textarea>   

                    </div>
                </td>
            </tr> 
            
            <tr id="field_status" class="field dpib_comment_reason" style="display:none">
                <td class="">
                    <div class="label ">
                        <span class="text-danger icon-asterix"></span>
                        <span class="title">Comment</span>
                    </div>
                </td>
                <td>
                    <div class="element">
                        <textarea class="note_add_entry" name="close_comment" rows="10" wrap="soft" >{{isset($requestDetails->comments) ? $requestDetails->comments:''}}</textarea>
                        

                    </div>
                </td>
            </tr> 
            
            <tr id="field_status" class="field dpib_revise_reason" style="display:none">
                <td class="">
                    <div class="label ">
                        <span class="text-danger icon-asterix"></span>
                        <span class="title">Revise reason</span>
                    </div>
                </td>
                <td>
                    <div class="element">
                        <textarea class="note_add_entry" name="revise_comment" rows="10" wrap="soft" >{{isset($requestDetails->revise_reason) ? $requestDetails->revise_reason:''}}</textarea>
                        

                    </div>
                </td>
            </tr>
            
            
            @endif
             <tr id="field_customer_gender" class="field customertype" >
                                            <td class="">
                                                <div class="label">
                                                    <span class="text-danger icon-asterix"></span>
                                                    <span class="title">Sale person</span>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="element">
                                                    @php
                                                    $selected = '';
                                                    @endphp

                                                  @if(isset($requestDetails->policy_sales_person))
                                                        @php
                                                          $selected = $requestDetails->policy_sales_person ;
                                                       @endphp 
                                                    @elseif(isset($selectedcustomer->sales_person) )
                                                        @php
                                                          $selected = $selectedcustomer->sales_person ;
                                                        @endphp                                                            
                                                    @endif

                                                    {{ Form::select('customer_sales_person', array('' => '--- not entered ---')+$salesperson, $selected,array('id' =>'customer_sales_person','required'=>'required','class'=>'required form-control custom-select','error-message' =>"Sales person field is mandatory" ))}}




                                                </div>
                                            </td>
                                        </tr>
            
               <tr id="field_request_lob" class="field dib_request customertype">
                <td class="">
                    <div class="label ">
                        <span class="text-danger "></span>
                        <span class="title">Line of business</span>
                    </div>
                </td>
                <td>
                    <div class="element">
                         {{ Form::select('request_lineof_business', ['' =>'----Not Select----']+$lineofbusiness, isset($requestDetails->lineofbusiness) ? $requestDetails->lineofbusiness:'',array('id' =>'request_lineof_business','required'=>'required','style'=>'width: 100%;','class'=>'request_lineof_business required form-control custom-select','error-message' =>"Line of business field is mandatory" ))}}
                    </div>
                </td>
            </tr> 
            
               <tr id="field_dib_old_policies" class="field dib_old_policies" style='display:none'>
                <td class="">
                    <div class="label ">
                        <span class="text-danger "></span>
                        <span class="title">Active policies</span>
                    </div>
                </td>
                <td>
                    <div class="element" >
                         {{ Form::select('activePolicyList', ['' =>'----Not Select----'], '',array('id' =>'activePolicyList','required'=>'required','style'=>'width: 100%;','class'=>'request_lineof_business required form-control custom-select','error-message' =>"Policy  field is mandatory" ))}}
                    </div>
                </td>
            </tr>
            
            
                @if (isset($requestId)) 
             <tr id="field_request_lob" class="field dib_request customertype">
                <td class="">
                    <div class="label ">
                        <span class="text-danger "></span>
                        <span class="title">Notification start date</span>
                    </div>
                </td>
                <td>
                    <div class="element">
                        <div> <input type="date" id="notification_start_date" name="notification_start_date" value="{{isset($requestDetails->notification_start_date) ? date('Y-m-d',strtotime($requestDetails->notification_start_date)): date('Y-m-d') }}" maxlength="10" autocomplete="off" class="form-control required" style="margin-right: 0px !important" onchange="FORM.checkPastDate('#notification_start_date');"><div style="float: right; width: 40%; padding-left: 10px; padding-top: 9px; overflow: hidden"><div id="policy_date_issue_comment"></div></div></div>
                    </div>
                </td>
            </tr>  
            @endif
            
            

            <tr id="field_request_description" class="field dib_request">
                <td class="">
                    <div class="label ">
                        <span class="text-danger "></span>
                        <span class="title">Description</span>
                    </div>
                </td>
                <td>
                    <div class="element">
                        <textarea class="note_add_entry full-width" name="request_description" rows="10" wrap="soft" >{{isset($requestDetails->description) ? $requestDetails->description:''}}</textarea>
                    </div>
                </td>
            </tr>


            <tr id="field_reminder" class="field dib_task">
                <td class="">
                    <div class="label ">
                        <span class="text-danger "></span>
                        <span class="title">Reminder </span>
                    </div>
                </td>
                <td>


                    <div class="element">
                         <input type="hidden" name="prop_reminder" value="{{(isset($requestDetails->reminder) && $requestDetails->reminder !=null) ? $requestDetails->reminder:0}}">
                        <label class="label-without-margins" style="cursor: pointer; color: rgb(87, 87, 87);">
                            <input type="checkbox" id="prop_reminder" name="prop_reminder" value="{{(isset($requestDetails->reminder) && $requestDetails->reminder !=null) ? $requestDetails->reminder:0}}">
                            <span class="{{(isset($requestDetails->reminder) && $requestDetails->reminder==1) ? 'icon-check-empty icon-check':'icon-check-empty'}} "></span>
                            yes
                        </label>
                    </div>


                </td>
            </tr>
            <tr id="field_repeat" class="field dib_task">
                <td class="">
                    <div class="label ">
                        <span class="text-danger "></span>
                        <span class="title">Repeat </span>
                    </div>
                </td>
                <td>
                    <div class="element">
                        <input type="hidden" name="prop_repeat_flag" value="{{(isset($requestDetails->repeat_flag) && $requestDetails->repeat_flag !=null) ? $requestDetails->repeat_flag:0}}">
                        <label class="label-without-margins" style="cursor: pointer; color: rgb(87, 87, 87);width:auto">
                            <input type="checkbox" id="prop_repeat_flag" name="prop_repeat_flag" value="{{(isset($requestDetails->repeat_flag) && $requestDetails->repeat_flag !=null) ? $requestDetails->repeat_flag:0}}">
                            <span class="{{isset($requestDetails->repeat_flag) && $requestDetails->repeat_flag !=null ? 'icon-check-empty icon-check':'icon-check-empty'}}"></span>
                            yes
                        </label>
                        <input type="text" id="prop_repeat_date" name="prop_repeat_date" value="{{ isset($requestDetails->repeat_date)  ? date('d.m.Y',strtotime($requestDetails->repeat_date)):''}}" maxlength="10" autocomplete="off" class="datefield" style="margin-right: 0px !important">
                    </div>


                </td>
            </tr>




        </tbody>
    </table>
</div>
{{ Form::close() }}  
<script id='active_policy_template' type='text/template'>
         <option value=''>--Select--</option>
        <% _.each( activepolicies, function( name,key ){ %>
           <option value=<%- key %>><%- name %></option>
          <% }); %>
});

</script>
<script>
$(function(){
  //Document upload initialization
$("#customer_select").select2({dropdownParent: $("#db_quote_request_popup")});
 $(document).off('change','#crm_type');
    $(document).on('change','#crm_type',function(){
     $(".dib_task").hide();
      $("#field_dib_old_policies").hide();
      $('#request_lineof_business').trigger('change');
     
     $(".dib_request").hide();
       if($(this).val()==0) {
         $(".dib_task").show();
       }  else {
         $(".dib_request").show(); 
       }
       
    });  
    $('#crm_type').trigger('change');
    
    
    $(document).off('change','#request_lineof_business');
    $(document).on('change','#request_lineof_business',function() {

       if($(this).val() !='' && $('#customer_select').val() !='' && $("#crm_type").val() ==3) {
        
         var urlString = "{!! route('getCustomerpolicy','##CID') !!}";
         var plink = urlString.replace("##CID", $('#customer_select').val());  
         $.ajax({
                url: plink,
                type: "GET",
                 data:{'lob':$("#request_lineof_business option:selected" ).text()}
                }).done(function (data) {
                     
                     if(_.size(data.options) >0) {
                         $("#field_dib_old_policies").show();
                         var template = _.template($("#active_policy_template").html()); 
               
                     var data = {'activepolicies': data.options };   
                     var result = template(data); 
                     $("#activePolicyList").html(result);
                     } else {
                         $("#field_dib_old_policies").hide(); 
                     }
   
                    
                    
                }); 
      } else {
      
      }
        
    
});
  
$(document).off('change','#customer_select');
      $(document).on('change','#customer_select',function() {
        $('#request_lineof_business').trigger('change');  
      });
      
        
    
});

</script>

