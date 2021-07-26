
 <table>
  
    <tbody >
    <tr>
        <td colspan="4" style='text-align:center;background-color: #03a9f3;font-size:16;color:#fff'>SUMMARY</td>        
    </tr>
    <tr>
        <td style='text-align:center;background-color: #03a9f3;font-size:11;color:#fff'>INSURER</td>
        <td style='text-align:center;background-color: #03a9f3;font-size:11;color:#fff'>PREMIUM</td>
        <td style='text-align:center;background-color: #03a9f3;font-size:11;color:#fff'>VAT</td>
        <td style='text-align:center;background-color: #03a9f3;font-size:11;color:#fff'>TOTAL</td>        
    </tr>
    <?php $__currentLoopData = $companyDetails; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $companyIndex=>$companyData): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>


    <tr>
        <td style="background-color:blue;color:#fff"><span><?php echo e(strtoupper($companyData)); ?></span></td>

      <td ><b>SAR <?php echo e(number_format( $grandTotalPremium[$companyIndex] , 2)); ?></b> </td>

   <td ><b>SAR <?php echo e(number_format((($grandTotalPremium[$companyIndex] * 5)/100), 2)); ?></b> </td>
   <td style="background-color:#002080;color:#fff"><b>SAR <?php echo e(number_format( ((($grandTotalPremium[$companyIndex] * 5)/100)+$grandTotalPremium[$companyIndex]) , 2)); ?></b> </td>
             
        
    </tr>

    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>






    </tbody>
</table>
<?php /**PATH D:\Xampp_new\htdocs\inslyportal\resources\views/comparisonExcel/sheet_2.blade.php ENDPATH**/ ?>