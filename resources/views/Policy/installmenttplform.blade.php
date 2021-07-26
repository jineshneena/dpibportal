<table class="insly-form panel-body" id='dpib_installment_table'>
    <tbody>
								<tr id="field_policy_installments" class="field">
                                                                    <td><div class="label">Installments</div></td>
                                                                    <td colspan="6"><div class="element">
                                                                            <select id="policy_installments" name="policy_installments" style="width: 340px" class="form-control">
                                                                                <option value="0" {{($installmentnumber =='')}}>0</option>
                                                                                @for ($i = 0; $i < 13; $i++)
                                                                                  @php
                                                                                      $selected = '';
                                                                                  @endphp
                                                                                @if($installmentnumber == $i)
                                                                                    @php
                                                                                      $selected = 'selected=selected';
                                                                                  @endphp
                                                                                
                                                                                @endif
                                                                                <option value="{{$i}}" {{$selected }}>{{$i}}</option>
                                                                                @endfor
                                                                            </select>
                                                                            <button type="button" id="dip_installment_generate" class="btn waves-effect waves-light btn-outline-primary" openUrl="{{route("generateinstallment")}}">Generate installment schedule</button>
                                                                        </div></td>
                                                                </tr>
                                                                <tr class="installmentschedulerow" style="height: 30px">
                                                                    <th style="font-weight: bold"></th>
                                                                    
                                                                    
                                                                    <th style="width: 5%; text-align: left; font-weight: bold">Due date</th>
                                                                    <th style="width: 20%; text-align: left; font-weight: bold">Premium amount</th>
                                                                    <th style="width: 10%; text-align: left; font-weight: bold">Vat</th>
                                                                    <th style="width: 20%; text-align: left; font-weight: bold">Total</th>


                                                                    <th style="width: 7%; text-align: left; font-weight: bold">Paid</th>
                                                                    <th style="width: 15%; text-align: left; font-weight: bold">Paid amount</th>
                                                                   
                                                                </tr>
                                                                @foreach ( $installments as $key =>$installment)
                                                                <tr class="field installmentschedulerow">
                                                                    <td><input type="hidden" id="installmentschedule_num_{{$key}}" name="installmentschedule_num[{{$key}}]" value="{{$key}}">
                                                                        <input type="hidden" name="installmentschedule_vatpercentage[{{$key}}]" value="{{$installment['vat_percentage']}}" id="installmentschedule_vatpercentage" />
                                                                        <input type="hidden" name="installmentschedule_vatamount[{{$key}}]" value="{{$installment['vat_amount']}}" id="installmentschedule_vatamount_{{$key}}" />
                                                                        <div class="label">Installment #{{$key}}:</div>
                                                                    </td>
                                                                   
                                                                    <td class="element" style="width: 5%;text-align: left">
                                                                     <input type="hidden" autocomplete="off" class="datefield form-control" maxlength="10" id="installmentschedule_date_end_{{$key}}" name="installmentschedule_date_end[{{$key}}]" value="{{ date('Y-m-d', strtotime($installment['endDate'])) }}">

                                                                       <input type="hidden" autocomplete="off" class="datefield form-control" maxlength="10" id="installmentschedule_date_{{$key}}" name="installmentschedule_date[{{$key}}]" value="{{ date('Y-m-d', strtotime($installment['startDate'])) }}">



                                                                      <input type="date" autocomplete="off" class="datefield form-control" maxlength="10" id="installmentschedule_date_due_{{$key}}" name="installmentschedule_date_due[{{$key}}]" value="{{ date('Y-m-d', strtotime($installment['dueDate'])) }}">


                                                                    </td>
                                                                    <td class="element" style="text-align: left">
                                                                      <input type="text" autocomplete="off" class="numberfield installment_sum form-control" onkeyup="POLICY.ADD.checkInstallmentSum();" style="width: 50% !important" maxlength="10" id="installmentschedule_sum_{{$key}}" name="installmentschedule_sum[{{$key}}]" value="{{  number_format($installment['amount'],2, '.', '')}}" data-key-value="{{$key}}"><input type="hidden" id="installmentschedule_currency_{{$key}}" name="installmentschedule_currency[{{$key}}]" value="SAR">
                                                                     </td>
                                                                     
                                                                     <td class="element" style="text-align: left">
                                                                         <input type="text" autocomplete="off" class="numberfield form-control"  style="width: 100% !important" maxlength="20" id="installment_vat_{{$key}}" name="installment_vat[{{$key}}]" value="{{  number_format($installment['vat_amount'],2, '.', '')}}" data-key-value="{{$key}}" disabled="disabled">
                                                                     </td>
                                                                     
                                                                     <td>
                                                                     <input type="text" autocomplete="off" class="numberfield installment_sum_vat form-control"  style="width: 100% !important" maxlength="10" id="installmentschedule_sum_vat_{{$key}}" name="installmentschedule_sum_vat[{{$key}}]" value="{{  number_format($installment['amount_with_vat'],2, '.', '')}}" data-key-value="{{$key}}">
                                                                    
                                                                     </td>
                                                                   <!--  <td class="element" style="text-align: left;"> <input type="hidden" name="installmentschedule_paidstatus[{{$key}}]" value="0" class="installment_paid_status"><input type="checkbox" id="installmentschedule_paidstatus_{{$key}}"  value="1" class='dib_select_box custom-control-input'><label class="custom-control-label" for="installmentschedule_paidstatus_{{$key}}"></label>
                                                                    </td> -->
                                                                     <td class="element" style="text-align: left"><input type="checkbox" name="installmentschedule_paidstatus[{{$key}}]" value="0" class="installment_paid_status custom-control-input" id="installmentschedule_paidstatus_{{$key}}"/><label class="custom-control-label"  style="margin-left:27px" for="installmentschedule_paidstatus_{{$key}}"></label>
                                                                     </td>
                                                                     <td class="element" style="text-align: left">
                                                                        <input type="text" autocomplete="off" class="numberfield form-control" style="width: 100% !important" maxlength="20" id="inst_paid_amount_{{$key}}" name="inst_paid_amount[{{$key}}]" value="{{  number_format(0.00, 2, '.',',')}}">
                                                                     </td>

                                                                </tr>
                                                                @endforeach
                                                                <tr class="field installmentschedulerow">
                                                                  <td style="text-align: right"><div class="label">Total: </div>
                                                                  </td>
                                                                  <td class="element" style="text-align:center;color:#aa0000;line-height:32px;" colspan="3">
                                                                    <div class="element"><b id="installmentTotalSum">{{ number_format($totalPremium, 2, '.',',')  }}</b> <b>SAR</b></div>
                                                                    <div class="element"><b class="hidden" id="installment_error">Sum of installments does not match the signed premium</b></div>
                                                                  </td>
                                                                  <td style="text-align:left" colspan="2">
                                                                    <div class="element">
                                                                      <b id="installmentTotalSumwithvat">{{ number_format($premiumwithVat, 2, '.',',')  }}</b> 
                                                                      <b>SAR</b></div>
                                                                      <div class="element"><b class="hidden" id="installment_vatsum_error">Total payment does not match the signed premium</b>
                                                                        <input  type="hidden" name="premiumwitvat" id="premiumwitvat" value="{{ $premiumwithVat }}" />


                                                                      </div>
                                                                  </td>
                                                                  
                                                                </tr>
    </tbody>
						</table>
            <script>
              
$(function() {

//Calculate sum wwithout value
 $(document).off('blur', '.installment_sum_vat');
 $(document).on('blur', '.installment_sum_vat', function () {
  var _that = $(this);
  var currentKey = _that.data('keyValue');
  var sumwithVat = _that.val();
  var  vatPercentage = $("#installmentschedule_vatpercentage").val();
  $("#installment_vatsum_error").hide();
  if(sumwithVat !='' && sumwithVat >0){
    var sumWithoutVat = sumwithVat / (1 + (vatPercentage/100));
    $("#installmentschedule_sum_"+currentKey).val(Number((sumWithoutVat).toFixed(2)));
    var vatAmount = sumWithoutVat *  (vatPercentage/100);
    $("#installmentschedule_vatamount_"+currentKey).val(vatAmount);
    $("#installment_vat_"+currentKey).val( Number((vatAmount).toFixed(2)));
    var totalAmount = 0;
    $('.installment_sum_vat').each(function(e){
      totalAmount = parseFloat(totalAmount) + parseFloat($(this).val());

      
    });
    if(totalAmount >0) {
      $("#installmentTotalSumwithvat").text(Number((totalAmount).toFixed(2)) );
      
       if(Math.round($("#premiumwitvat").val()) != Math.round(totalAmount)) {
        $("#installment_vatsum_error").show();
        $("#installment_vatsum_error").parents('td').css('color','#aa0000');
        
       } else {
        $("#installment_vatsum_error").hide();
       }
       POLICY.ADD.checkInstallmentSum();
    }
    
  }
   

 });

 //calculate sum with  vat value

 $(document).off('blur', '.installment_sum');
 $(document).on('blur', '.installment_sum', function () {

  var currentKey = $(this).data('keyValue');
  var sumwithoutVat = $(this).val();
  var  vatPercentage = $("#installmentschedule_vatpercentage").val();
  if(sumwithoutVat !='' && sumwithoutVat >0){
    var sumWithVat = sumwithoutVat * (1 + (vatPercentage/100));

    $("#installmentschedule_sum_vat_"+currentKey).val(Number((sumWithVat).toFixed(2)));
    var vatAmount = sumwithoutVat *  (vatPercentage/100);
    $("#installmentschedule_vatamount_"+currentKey).val(vatAmount);
    $("#installment_vat_"+currentKey).val( Number((vatAmount).toFixed(2)));

  }
   
checktotalSum();
 });

})


function checktotalSum() {
var totalSum =0;
  $('.installment_sum_vat').each(function(e){
      totalSum = parseFloat(totalSum) + parseFloat($(this).val());
      
    });
  $("#installmentTotalSumwithvat").text(Number((totalSum).toFixed(2)));

}


            </script>