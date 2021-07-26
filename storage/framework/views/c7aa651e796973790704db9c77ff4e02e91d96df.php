<table class="insly-form panel-body" id='dpib_installment_table'>
    <tbody>
								<tr id="field_policy_installments" class="field">
                                                                    <td><div class="label">Installments</div></td>
                                                                    <td colspan="6"><div class="element">
                                                                            <select id="policy_installments" name="policy_installments" style="width: 340px" class="form-control">
                                                                                <option value="0" <?php echo e(($installmentnumber =='')); ?>>0</option>
                                                                                <?php for($i = 0; $i < 13; $i++): ?>
                                                                                  <?php
                                                                                      $selected = '';
                                                                                  ?>
                                                                                <?php if($installmentnumber == $i): ?>
                                                                                    <?php
                                                                                      $selected = 'selected=selected';
                                                                                  ?>
                                                                                
                                                                                <?php endif; ?>
                                                                                <option value="<?php echo e($i); ?>" <?php echo e($selected); ?>><?php echo e($i); ?></option>
                                                                                <?php endfor; ?>
                                                                            </select>
                                                                            <button type="button" id="dip_installment_generate" class="btn waves-effect waves-light btn-outline-primary" openUrl="<?php echo e(route("generateinstallment")); ?>">Generate installment schedule</button>
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
                                                                <?php $__currentLoopData = $installments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key =>$installment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <tr class="field installmentschedulerow">
                                                                    <td><input type="hidden" id="installmentschedule_num_<?php echo e($key); ?>" name="installmentschedule_num[<?php echo e($key); ?>]" value="<?php echo e($key); ?>">
                                                                        <input type="hidden" name="installmentschedule_vatpercentage[<?php echo e($key); ?>]" value="<?php echo e($installment['vat_percentage']); ?>" id="installmentschedule_vatpercentage" />
                                                                        <input type="hidden" name="installmentschedule_vatamount[<?php echo e($key); ?>]" value="<?php echo e($installment['vat_amount']); ?>" id="installmentschedule_vatamount_<?php echo e($key); ?>" />
                                                                        <div class="label">Installment #<?php echo e($key); ?>:</div>
                                                                    </td>
                                                                   
                                                                    <td class="element" style="width: 5%;text-align: left">
                                                                     <input type="hidden" autocomplete="off" class="datefield form-control" maxlength="10" id="installmentschedule_date_end_<?php echo e($key); ?>" name="installmentschedule_date_end[<?php echo e($key); ?>]" value="<?php echo e(date('Y-m-d', strtotime($installment['endDate']))); ?>">

                                                                       <input type="hidden" autocomplete="off" class="datefield form-control" maxlength="10" id="installmentschedule_date_<?php echo e($key); ?>" name="installmentschedule_date[<?php echo e($key); ?>]" value="<?php echo e(date('Y-m-d', strtotime($installment['startDate']))); ?>">



                                                                      <input type="date" autocomplete="off" class="datefield form-control" maxlength="10" id="installmentschedule_date_due_<?php echo e($key); ?>" name="installmentschedule_date_due[<?php echo e($key); ?>]" value="<?php echo e(date('Y-m-d', strtotime($installment['dueDate']))); ?>">


                                                                    </td>
                                                                    <td class="element" style="text-align: left">
                                                                      <input type="text" autocomplete="off" class="numberfield installment_sum form-control" onkeyup="POLICY.ADD.checkInstallmentSum();" style="width: 50% !important" maxlength="10" id="installmentschedule_sum_<?php echo e($key); ?>" name="installmentschedule_sum[<?php echo e($key); ?>]" value="<?php echo e(number_format($installment['amount'],2, '.', '')); ?>" data-key-value="<?php echo e($key); ?>"><input type="hidden" id="installmentschedule_currency_<?php echo e($key); ?>" name="installmentschedule_currency[<?php echo e($key); ?>]" value="SAR">
                                                                     </td>
                                                                     
                                                                     <td class="element" style="text-align: left">
                                                                         <input type="text" autocomplete="off" class="numberfield form-control"  style="width: 100% !important" maxlength="20" id="installment_vat_<?php echo e($key); ?>" name="installment_vat[<?php echo e($key); ?>]" value="<?php echo e(number_format($installment['vat_amount'],2, '.', '')); ?>" data-key-value="<?php echo e($key); ?>" disabled="disabled">
                                                                     </td>
                                                                     
                                                                     <td>
                                                                     <input type="text" autocomplete="off" class="numberfield installment_sum_vat form-control"  style="width: 100% !important" maxlength="10" id="installmentschedule_sum_vat_<?php echo e($key); ?>" name="installmentschedule_sum_vat[<?php echo e($key); ?>]" value="<?php echo e(number_format($installment['amount_with_vat'],2, '.', '')); ?>" data-key-value="<?php echo e($key); ?>">
                                                                    
                                                                     </td>
                                                                   <!--  <td class="element" style="text-align: left;"> <input type="hidden" name="installmentschedule_paidstatus[<?php echo e($key); ?>]" value="0" class="installment_paid_status"><input type="checkbox" id="installmentschedule_paidstatus_<?php echo e($key); ?>"  value="1" class='dib_select_box custom-control-input'><label class="custom-control-label" for="installmentschedule_paidstatus_<?php echo e($key); ?>"></label>
                                                                    </td> -->
                                                                     <td class="element" style="text-align: left"><input type="checkbox" name="installmentschedule_paidstatus[<?php echo e($key); ?>]" value="0" class="installment_paid_status custom-control-input" id="installmentschedule_paidstatus_<?php echo e($key); ?>"/><label class="custom-control-label"  style="margin-left:27px" for="installmentschedule_paidstatus_<?php echo e($key); ?>"></label>
                                                                     </td>
                                                                     <td class="element" style="text-align: left">
                                                                        <input type="text" autocomplete="off" class="numberfield form-control" style="width: 100% !important" maxlength="20" id="inst_paid_amount_<?php echo e($key); ?>" name="inst_paid_amount[<?php echo e($key); ?>]" value="<?php echo e(number_format(0.00, 2, '.',',')); ?>">
                                                                     </td>

                                                                </tr>
                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                <tr class="field installmentschedulerow">
                                                                  <td style="text-align: right"><div class="label">Total: </div>
                                                                  </td>
                                                                  <td class="element" style="text-align:center;color:#aa0000;line-height:32px;" colspan="3">
                                                                    <div class="element"><b id="installmentTotalSum"><?php echo e(number_format($totalPremium, 2, '.',',')); ?></b> <b>SAR</b></div>
                                                                    <div class="element"><b class="hidden" id="installment_error">Sum of installments does not match the signed premium</b></div>
                                                                  </td>
                                                                  <td style="text-align:left" colspan="2">
                                                                    <div class="element">
                                                                      <b id="installmentTotalSumwithvat"><?php echo e(number_format($premiumwithVat, 2, '.',',')); ?></b> 
                                                                      <b>SAR</b></div>
                                                                      <div class="element"><b class="hidden" id="installment_vatsum_error">Total payment does not match the signed premium</b>
                                                                        <input  type="hidden" name="premiumwitvat" id="premiumwitvat" value="<?php echo e($premiumwithVat); ?>" />


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


            </script><?php /**PATH D:\Xampp_new\htdocs\inslyportal\resources\views/Policy/installmenttplform.blade.php ENDPATH**/ ?>