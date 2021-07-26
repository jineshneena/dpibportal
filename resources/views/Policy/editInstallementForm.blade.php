


{{ Form::open(array('route' => array('updateinstallment',$installmentId), 'name' => 'form_installment_edit','id'=>'form_installment_edit','files'=>'true' )) }}
@csrf 


<div class="dialogform">
    <table class="insly_dialogform">
        <tbody>


            <tr id="field_policy_installment_sum" class="field">
                <td class=""><div class="label"><span class="text-danger icon-asterix"></span><span class="title">Premium amount</span></div></td>
                <td><div class="element"><input type="text" id="policy_installment_sum" name="policy_installment_sum" value="{{ number_format($installmentData->amount, 2, '.','')  }}" autocomplete="off" style="width: 490px; width: 50%;" class="numberfield currencyfield" data-m-dec="2">
                    </div></td>
             </tr>
              <tr id="field_policy_installment_sum" class="field">
                <td class=""><div class="label"><span class="text-danger icon-asterix"></span><span class="title">Vat</span></div></td>
                <td><div class="element"><input type="text" id="policy_installment_vat" name="policy_installment_vat" value="{{ number_format($installmentData->vat_amount, 2, '.','')  }}" autocomplete="off" style="width: 490px; width: 50%;" class="numberfield currencyfield" data-m-dec="2" disabled="disabled">
                    </div></td>
             </tr>
              <tr id="field_policy_installment_sum" class="field">
                <td class=""><div class="label"><span class="text-danger icon-asterix"></span><span class="title">Total</span></div></td>
                <td><div class="element"><input type="text" id="policy_installment_sum_vat" name="policy_installment_sum_vat" value="{{ number_format(($installmentData->amount+$installmentData->vat_amount), 2, '.','')    }}" autocomplete="off" style="width: 490px; width: 50%;" class="numberfield currencyfield" data-m-dec="2">
                    </div></td>
             </tr>


            <tr id="field_policy_installment_date" class="field" style="display: none">
                <td class="">
                    <div class="label"><span class="text-danger icon-asterix"></span><span class="title">Period begin</span></div></td>
                <td><div class="element">
                        <input type="date" id="policy_installment_date" name="policy_installment_date" value="{{ date('Y-m-d', strtotime($installmentData->start_date))   }}" maxlength="10" autocomplete="off" class="datefield" style="margin-right: 0px !important">
                        <div style="float: right; width: 40%; padding-left: 10px; padding-top: 9px; overflow: hidden"><div id="policy_installment_date_comment"></div>

                        </div></div></td>
            </tr>
            <tr id="field_policy_installment_date_end" class="field" style="display: none">
                <td class=""><div class="label"><span class="text-danger icon-asterix"></span><span class="title">Period end</span></div></td><td><div class="element"><input type="date" id="policy_installment_date_end" name="policy_installment_date_end" value="{{  date('Y-m-d', strtotime($installmentData->end_date)) }}" maxlength="10" autocomplete="off" class="datefield  " style="margin-right: 0px !important"><div style="float: right; width: 40%; padding-left: 10px; padding-top: 9px; overflow: hidden"><div id="policy_installment_date_end_comment"></div></div></div></td>
            </tr>
            <tr id="field_policy_installment_date_due" class="field"><td class=""><div class="label"><span class="text-danger icon-asterix"></span><span class="title">Due date</span></div></td><td><div class="element"><input type="date" id="policy_installment_date_due" name="policy_installment_date_due" value="{{  date('Y-m-d', strtotime($installmentData->due_date)) }}" maxlength="10" autocomplete="off" class="datefield  " style="margin-right: 0px !important"><div style="float: right; width: 40%; padding-left: 10px; padding-top: 9px; overflow: hidden"><div id="policy_installment_date_due_comment"></div></div></div></td></tr>  
            <tr id="field_policy_installment_collection" class="field paymenttype paymenttype1 paymenttype2 paymenttype3" style="display: table-row; overflow: hidden;">
                <td class="">
                    <div class="label ">
                        <span class="text-danger "></span>
                        <span class="title">Collects</span>
                    </div>
                </td>
                <td>
                    <div class="element">
                        <select id="policy_installment_collection" name="policy_installment_collection">
                           
                            <option value="1" {{ isset($installmentData->collect_by) ? (($installmentData->collect_by=="1")? 'selected':''): '' }} >Broker</option>

                            <option value="2" {{ isset($installmentData->collect_by) ? (($installmentData->collect_by=="2")? 'selected':''): '' }} >insurer</option>

                            <option value="3" {{ isset($installmentData->collect_by) ? (($installmentData->collect_by=="3")? 'selected':''): '' }} >retailer</option>

                            <option value="4" {{ isset($installmentData->collect_by) ? (($installmentData->collect_by=="4")? 'selected':''): '' }} >premium financier</option>

                        </select>


                    </div>
                </td>
            </tr>
            
            
            
          
            
          
             <tr id="field_policy_installment_paid" class="field paymenttype paymenttype1" style="display: table-row; overflow: hidden;">
                <td class="">
                    <div class="label ">
                        <span class="text-danger icon-asterix"></span>
                        <span class="title">Vat</span>
                    </div>
                </td>
                <td>
                    <div class="element">
                        <select id="installment_tax" name="policy_installment_tax" data-default-value="5">
                                        
                                        <option value="0" {{ isset($installmentData->vat_percentage) ? (($installmentData->vat_percentage=="0")? 'selected':''): '' }}>Nil (0%)</option>

<!--                                        <option value="5" {{ isset($installmentData->vat_percentage) ? (($installmentData->vat_percentage=="5")? 'selected':''): '' }}>VAT (5%)</option>-->
                                         <option value="15" selected>VAT (15%)</option>

                                    </select>  
                    </div>
                </td>
            </tr>
        
            
            
            <tr id="field_policy_installment_paid" class="field paymenttype paymenttype1" style="display: table-row; overflow: hidden;">
                <td class="">
                    <div class="label ">
                        <span class="text-danger icon-asterix"></span>
                        <span class="title">Paid status</span>
                    </div>
                </td>
                <td>
                    <div class="element">
                        <select id="policy_installment_paid_status" name="policy_installment_paid_status">
                           

                            <option value="0" {{ isset($installmentData->paid_status) ? (($installmentData->paid_status=="0")? 'selected':''): '' }}>Unpaid</option>

                            <option value="1" {{ isset($installmentData->paid_status) ? (($installmentData->paid_status=="1")? 'selected':''): '' }}>Paid</option>


                        </select>
                    </div>
                </td>
            </tr>


        </tbody>
    </table>
</div>

{{ Form::close() }}
<script>
              
$(function() {


$(document).off('blur', '#policy_installment_sum_vat');
 $(document).on('blur', '#policy_installment_sum_vat', function () {
    var _that = $(this);
  
  var sumwithVat = _that.val();
  var  vatPercentage = $("#installment_tax option:selected" ).val();
  if(sumwithVat !='' && sumwithVat >0){
    var sumWithoutVat = sumwithVat / (1 + (vatPercentage/100));
    var vatAmount = sumWithoutVat *  (vatPercentage/100);
    $("#policy_installment_sum").val(Number((sumWithoutVat).toFixed(2)));
    $("#policy_installment_vat").val(Number((vatAmount).toFixed(2)));
    
}


 });

 $(document).off('blur', '#policy_installment_sum');
 $(document).on('blur', '#policy_installment_sum', function () {
    var _that = $(this);
  var sumwithoutVat = $(this).val();
  var  vatPercentage = $("#installment_tax option:selected" ).val();
  if(sumwithoutVat !='' && sumwithoutVat >0) {
    var sumWithVat = sumwithoutVat * (1 + (vatPercentage/100));
    var vatAmount = sumwithoutVat *  (vatPercentage/100);
    $("#policy_installment_vat").val(Number((vatAmount).toFixed(2)));
    $("#policy_installment_sum_vat").val(Number((sumWithVat).toFixed(2)));
    

  }


 });

//policy_installment_sum_vat


})
</script>