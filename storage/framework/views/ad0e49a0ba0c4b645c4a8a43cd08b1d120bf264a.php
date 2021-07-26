    

<div style="width:200px;float:right;color:green;margin-top:20px"><select id='dpib_timeline_year'>
    <?php for($i=2017;$i<=date('Y',strtotime('+1 year'));$i++): ?>
    <?php if($selectedYear ==$i): ?>
        <option value='<?php echo e($i); ?>' selected><?php echo e($i); ?></option>
    <?php else: ?>
        <option value='<?php echo e($i); ?>'><?php echo e($i); ?></option>
    <?php endif; ?>
    <?php endfor; ?>
                
    </select><a href="<?php echo e(route('downloadcustomertimeline',[$customerId,$selectedYear])); ?>" style='margin-left:25px'><i class="fa fa-download" aria-hidden="true"></i></a>
</div>
     
    <?php if(count($timelines) > 0): ?>
<div class="timeline">
    <?php
    $iCount = 1;
    ?>
    <?php $__currentLoopData = $timelines; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key =>$timeline): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php $__currentLoopData = $timeline; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $details): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
             <?php if( $iCount%2 ==0): ?>
               <div class="timelinecontainer right">
            <?php else: ?>
        <div class="timelinecontainer left">
            <?php endif; ?>
            <div class="date"><?php echo e(date('M j, Y',strtotime($details['startDate']))); ?></div>
            <i class="icon fa fa-home"></i>
            <div class="content">
                <?php if($details['type']==1): ?>
                 <h2>Policy start</h2>
                <p>
                   Policy number <?php echo e($details['policyNumber']); ?> was issued on  <?php echo e(date('d-m-Y', strtotime($details['issueDate']))); ?> with <?php echo e($details['installmentNumber']); ?> installment
                </p>
                <?php elseif($details['type']==2): ?>
                 <h2>Installment<?php echo e($details['installment']); ?></h2> 
                 <p>
                  Installment due amount of  policy number <?php echo e($details['policyNumber']); ?> is <?php echo e(number_format(($details['amount']+$details['vatAmount']), 2, '.',',')); ?> SAR 
                 </p>
                <?php elseif($details['type']==3): ?>
                  <h2>Schedule -<?php echo e($details['policyNumber']); ?></h2> 
                   <p>
                    <?php echo e($details['description']); ?>

                </p>
                <?php else: ?>
                <h2>Policy End</h2>
                        <p>
                    Policy number <?php echo e($details['policyNumber']); ?> ends on <?php echo e(date('d-m-Y', strtotime($details['startDate']))); ?>

                            </p>
                <?php endif; ?>
               
                
            </div>
        </div>
        <?php
            $iCount = $iCount+1;
        ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
   
        
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


    </div>                  


</div>
    


    <style>



        .timeline {
            position: relative;
            width: 100%;
            max-width: 1140px;
            margin: 0 auto;
            padding: 15px 0;
        }

        .timeline::after {
            content: '';
            position: absolute;
            width: 2px;
            background: #006E51;
            top: 0;
            bottom: 0;
            left: 50%;
            margin-left: -1px;
        }

        .timelinecontainer {
            padding: 15px 30px;
            position: relative;
            background: inherit;
            width: 50%;
        }

        .timelinecontainer.left {
            left: 0;
        }

        .timelinecontainer.right {
            left: 50%;
        }

        .timelinecontainer::after {
            content: '';
            position: absolute;
            width: 16px;
            height: 16px;
            top: calc(50% - 8px);
            right: -8px;
            background: #ffffff;
            border: 2px solid #006E51;
            border-radius: 16px;
            z-index: 1;
        }

        .timelinecontainer.right::after {
            left: -8px;
        }

        .timelinecontainer::before {
            content: '';
            position: absolute;
            width: 50px;
            height: 2px;
            top: calc(50% - 1px);
            right: 8px;
            background: #006E51;
            z-index: 1;
        }

        .timelinecontainer.right::before {
            left: 8px;
        }

        .timelinecontainer .date {
            position: absolute;
            display: inline-block;
            top: calc(50% - 8px);
            text-align: center;
            font-size: 14px;
            font-weight: bold;
            color: #006E51;
            text-transform: uppercase;
            letter-spacing: 1px;
            z-index: 1;
        }

        .timelinecontainer.left .date {
            right: -112px;
        }

        .timelinecontainer.right .date {
            left: -112px;
        }

        .timelinecontainer .icon {
            position: absolute;
            display: inline-block;
            width: 40px;
            height: 40px;
            padding: 9px 0;
            top: calc(50% - 20px);
            background: #F6D155;
            border: 2px solid #006E51;
            border-radius: 40px;
            text-align: center;
            font-size: 18px;
            color: #006E51;
            z-index: 1;
        }

        .timelinecontainer.left .icon {
            right: 56px;
        }

        .timelinecontainer.right .icon {
            left: 56px;
        }

        .timelinecontainer .content {
            padding: 30px 90px 30px 30px;
            background: #F6D155;
            position: relative;
            border-radius: 0 500px 500px 0;
        }

        .timelinecontainer.right .content {
            padding: 30px 30px 30px 90px;
            border-radius: 500px 0 0 500px;
        }

        .timelinecontainer .content h2 {
            margin: 0 0 10px 0;
            font-size: 18px;
            font-weight: normal;
            color: #006E51;
        }

        .timelinecontainer .content p {
            margin: 0;
            font-size: 16px;
            line-height: 22px;
            color: #000000;
        }

        @media (max-width: 767.98px) {
            .timeline::after {
                left: 90px;
            }

            .timelinecontainer {
                width: 100%;
                padding-left: 120px;
                padding-right: 30px;
            }

            .timelinecontainer.right {
                left: 0%;
            }

            .timelinecontainer.left::after, 
            .timelinecontainer.right::after {
                left: 82px;
            }

            .timelinecontainer.left::before,
            .timelinecontainer.right::before {
                left: 100px;
                border-color: transparent #006E51 transparent transparent;
            }

            .timelinecontainer.left .date,
            .timelinecontainer.right .date {
                right: auto;
                left: 15px;
            }

            .timelinecontainer.left .icon,
            .timelinecontainer.right .icon {
                right: auto;
                left: 146px;
            }

            .timelinecontainer.left .content,
            .timelinecontainer.right .content {
                padding: 30px 30px 30px 90px;
                border-radius: 500px 0 0 500px;
            }
        }



    </style>

    <script>
    
    $(function() {
        $(document).off('change','#dpib_timeline_year');
        $(document).on('change','#dpib_timeline_year',function(){
            var selectedYear = $(this).children("option:selected").val();
            var linkString ="<?php echo e(route('customertimelinefilter',[$customerId,'##YEAR##'])); ?>";
            var link = linkString.replace("##YEAR##", selectedYear);
            console.log(link);
       
                $.ajax({
                   url: link,                    
                    type: "get"
                    
                }).done(function (data) {
console.log(data);
                    if (data.status) {
                      $("#content_timeline").html(data.content);
                    }

                });
       
        });
        
        
        
    })
    
    
    
    </script>
    <?php else: ?>
    
   <div class="alert alert-info alert-block" style='width:400px'>
	<button type="button" class="close" data-dismiss="alert">×</button>	
	<strong>No record is available</strong>
</div>
    <?php endif; ?>


<?php /**PATH D:\Xampp_new\htdocs\inslyportal\resources\views/Timeline/customertimeline.blade.php ENDPATH**/ ?>