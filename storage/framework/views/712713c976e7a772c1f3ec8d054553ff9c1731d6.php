<?php
    $companyIndex = 0;
?>

<?php $__currentLoopData = $companyDetails; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$companyData): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

<?php
    $companyIndex = $key;
?>
 <table>
  
    <tbody>
    <tr>
        <td  colspan=15 style='text-align:center;background-color: #03a9f3;font-size:28;color:#fff'><?php echo e(strtoupper($companyData)); ?></td>        
    </tr>
<?php $__currentLoopData = $requestDatas[$companyIndex]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rkey=>$requestData): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <?php if($rkey==0): ?>
    <tr>
        <?php $__currentLoopData = $requestData; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $mIndex=>$insuranceClass): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if($mIndex==0): ?>
                <td style="background-color:#002db3;color:#fff"><?php echo e(ucfirst($insuranceClass)); ?></td>
            <?php else: ?>
             <td colspan="3" style="background-color:#002db3;color:#fff"><?php echo e(ucfirst($insuranceClass)); ?></td>
            <?php endif; ?>

        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <td rowspan="2" style="text-align:center;background-color:#03a9f3;color:#fff;" valign="middle">TOTAL MEMBERS</td>
        <td rowspan="2"  style="text-align:center;background-color:#03a9f3;color:#fff;" valign="middle">TOTAL PREMIUM</td>
    </tr>
    <?php elseif($rkey==1): ?>
    <tr>

        <?php $__currentLoopData = $requestData; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $nIndex =>$categoryData): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if($nIndex==0): ?>
                <td style="background-color:#002db3;color:#fff;"><?php echo e(ucfirst($categoryData)); ?></td>
            <?php else: ?>
             <td style="background-color:#03a9f3;color:#fff;"> <?php echo e(ucfirst($categoryData)); ?></td>
            <?php endif; ?>
        
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        
    </tr>
    <?php else: ?>
    <tr>
<?php
    
$valueIndex =0 ;
?>
         <?php $__currentLoopData = $requestData; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $valueData): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if($valueIndex==0): ?>
                <td style="background-color:#002db3;color:#fff;"><?php echo e($valueData); ?></td>
            <?php else: ?>
             <td><?php echo e($valueData); ?></td>
            <?php endif; ?>
        <?php
    
$valueIndex++ ;
?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        
    </tr>
    <?php endif; ?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>



<tr>
    <td style='background-color:#03a9f3'>TOTAL</td>
    <?php $__currentLoopData = $totalCategoryCountDetails[$companyIndex]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cIndex =>$details): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <td style='background-color:#70db70'><?php echo e($details); ?></td>
    <td colspan='2' style='background-color:#70db70'>SAR <?php echo e(number_format($totalCategoryPremiumDetails[$companyIndex][$cIndex],2)); ?></td>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
   <td style='background-color:#70db70'><?php echo e($grandTotalMember[$companyIndex]); ?></td> 
   <td style='background-color:#70db70'>SAR <?php echo e(number_format($grandTotalPremium[$companyIndex],2)); ?></td>
</tr>

<tr >
    <?php
     $colspan = (count($totalCategoryCountDetails[$companyIndex])*3)+1;  
    ?>
    <td colspan="<?php echo e($colspan); ?>" style='background-color:#A0A0A0;color:#fff;text-align:right'><b>VAT</b></td>    
   <td style='background-color:#A0A0A0;color:#fff;'><b>5%</b></td> 
   <td style='background-color:#A0A0A0;color:#fff;'><b>SAR <?php echo e(number_format((($grandTotalPremium[$companyIndex] * 5)/100), 2)); ?></b></td>
</tr>


<tr >
    <?php
     $colspan = (count($totalCategoryCountDetails[$companyIndex])*3)+2;  
    ?>
      
   <td colspan="<?php echo e($colspan); ?>" style='background-color:#ffff00;text-align:right'><b>TOTAL</b> </td> 
   <td style='background-color:#ffff00;text-align:right'><b>

    SAR <?php echo e(number_format( ((($grandTotalPremium[$companyIndex] * 5)/100)+$grandTotalPremium[$companyIndex]) , 2)); ?></b>
   </td>
</tr>

    </tbody>
</table>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php /**PATH D:\Xampp_new\htdocs\inslyportal\resources\views/comparisonExcel/sheet_1.blade.php ENDPATH**/ ?>