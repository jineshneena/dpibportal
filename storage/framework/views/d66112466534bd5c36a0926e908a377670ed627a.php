    
<?php $__env->startSection('headtitle'); ?>
     Import installment details
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <div class="row col-12 dpib-custom-form">
        <div class="col-md-12">
            <div class="card">
                      <div class="card-body">
                    <div class="insly-form">
<?php echo e(Form::open(array('route' => array('salespersondataimport'), 'name' => 'customerimport','id'=>'customerimport','files'=>'true' ))); ?>

    <?php echo csrf_field(); ?>    
    <div class="dialogform">
        <table class="insly_dialogform">
                <tbody>
                    <tr id="field_document_file" class="field">
                        <td class=""><div class="label"><span class="text-danger icon-asterix"></span><span class="title">File</span></div></td>
                        <td><div class="element"><div><input type="file" error-message="Please upload one file!!!" id="document_file"  class="required" name="document_file"  accept=".csv,application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel," onchange="FORM.validateFile($(this), 5, 'Maximum file upload size 128 MB exceeded!')"></div></div></td>
                    </tr>   
                    
                    <tr id="field_documenttype_oid" class="field ">
                        <td class="">
                            <div class="label ">
                                <span class="text-danger "></span>
                                <span class="title">Customer</span>
                            </div>
                        </td>
                        <td>
                            <div class="element">
                             <?php echo e(Form::select('customer_id',  [''=>'--Select customer--']+$allCustomers, '',array('name'=>'customer_id','id' =>'customer_id','required'=>'required','class'=>'autocomplete required select2 form-control custom-select','error-message' =>"Coustomer field is mandatory"))); ?>

                            </div>
                        </td>
                    </tr>
                    
                    

                </tbody></table></div>
    
    <div class="buttonbar pull-right">
                            <div class="submit"><button type="button" id="submit_save" name="submit_save" class="btn waves-effect waves-light btn-rounded btn-success">Import</button><button type="button" id="submit_cancel" class="btn waves-effect waves-light btn-rounded btn-danger" name="submit_cancel" onclick="FORM.cancel()">Cancel</button></div>
                        </div>
    <?php echo e(Form::close()); ?>

                       
                    </div>
                </div>
            </div>
        </div>
    </div>


<?php $__env->stopSection(); ?>

<?php $__env->startSection('pagescript'); ?>


<script>
   
   var selectedAddressType = []; 
    

   
    $(function () {
  $(".custom-select").select2();
  
         $(document).on('click','#submit_save',function(e){
             
            var isValid = true;
         var errorMessage = "";
                var i=0;
                $(".required:visible").each(function(){                
                 if($(this).val()=='') {
                    isValid = false; 
                    $(this).addClass('form-control-danger');
                    $(this).parent('.element').addClass('has-danger')
                    if( i==0 ) {
                     errorMessage+="<b>The following errors occurred while validating data:"+"</b><br/>";
                     i++;
                    }
                    errorMessage+="<b>"+ $(this).attr('error-message')+"</b><br/>"
                  
                 } else {
                    $(this).removeClass('error'); 
                    $(this).removeClass('form-control-danger');
                    $(this).parent('.element').removeClass('has-danger')
                 }
                });
                

            if(isValid) {
              $("#customerimport").submit();
            } else {
              DIB.alert(errorMessage,'Error!!!!');    
            }
                    
         })
         
         $(document).off('change', '#customer_id');
    $(document).on('change', '#customer_id', function () {
        $.ajax({
            url: "<?php echo route('clientpolicies'); ?>",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: "post",
            data: {'customer_id': $(this).val(), 'selectedoption': '','allFlag':true}

        }).done(function (data) {
            if (data.status) {
                $("#complaint_policy").empty().html(data.optionstring);
                $("#complaint_policy").val($("#complaint_policy").attr('selected_id'))
            }

        });

    });
         
         
      
    })
    function validateEmail($email) {
        var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
        return emailReg.test( $email );
    }

</script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.elite_fullwidth',['sidemenustatus' => array(),'countDetails'=>array(),'notificationCount'=>array() ] , \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Xampp_new\htdocs\inslyportal\resources\views/Import/installmentimport.blade.php ENDPATH**/ ?>