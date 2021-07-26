<?php $__env->startSection('content'); ?>


<!--                  content here  -->
<!--TAB AREA-->
<div class="row">

    <div class="col-md-12 card">


        <ul class="nav nav-tabs customtab card-body" role="tablist">
            <li id="tab_overview" class="<?php echo e(empty($overviewTab) || $overviewTab == 'overview' ? 'active' : ''); ?>" onclick="TAB.select('overview', null, 1)"><a href="#content_overview">Overview</a></li>

        </ul>


    </div>

</div>
<!--TAB CONTENT AREA-->
<div class="row card">

    <div id="content_overview" class="tabcontent col-md-12 card-body">
        <div class="row">

            <div id="main-content" class="col-md-8">
                <div id="panel-customer_overview" class="panel panel-default open">
                    <div class="panel-heading">
                        <ul class="panel-actions list-inline pull-right">

                            <li class="dpib_complaint_edit" edit_url="<?php echo e(route('editcomplaint',$complaintDetails->id)); ?>"><span class="fas fa-edit text-blue" data-toggle="tooltip" title="" data-original-title="Edit complaint"></span></li>


                        </ul>
                        <h3 class="panel-title">Complaint Info</h3>
                    </div>
                    <div id="customer_overview" class="panel-collapse panel-body">
                        <table class="info-table">
                            <tbody>
                                <tr><td style='width:60%'>Customer:</td><td><a href='<?php echo e(route('customeroverview',$complaintDetails->client_id)); ?>'><?php echo e($complaintDetails->clientName); ?></a> </td></tr>
                                <tr><td>Policy:</td><td><?php if($complaintDetails->policy_number !=''): ?>  <span class='text-success' style='font-weight: bold'><?php echo e($complaintDetails->policy_number); ?><span> <?php else: ?> <span class='text-danger' style='font-weight: bold'>not issued</span><?php endif; ?></td></tr>
                                                <tr><td>Complaint type:</td><td><?php echo e($complaintDetails->complaintType); ?></td></tr>

                                                <tr><td>Requested date:</td><td class="phoneNumber"><?php echo e(date('d.m.Y', strtotime($complaintDetails->requested_date))); ?></td></tr>
                                                <tr><td>Description:</td><td class="phoneNumber"><?php echo e($complaintDetails->remarks); ?></td></tr>
                                                <tr><td>Request status:</td><td> <?php echo e($complaintDetails->statusString); ?>  </td></tr>

                                                <tr><td>Validity:</td><td><?php echo e($complaintDetails->complaintValidity); ?></td></tr>

                                                <tr><td>Bill amount:</td><td><?php echo e(number_format($complaintDetails->bill_amount, 2, '.', ',')); ?></td></tr>

                                                <tr><td>Approve amount:</td><td><?php echo e(number_format($complaintDetails->approve_amount, 2, '.', ',')); ?></td></tr>                                   

                                                <?php if( isset($complaintDetails->closed_date) && !empty($complaintDetails->closed_date)): ?>
                                                <tr><td>Closed date:</td><td><?php echo e(date('d.m.Y', strtotime($complaintDetails->closed_date))); ?></td></tr>
                                                <?php endif; ?>

                                                <tr><td>Created date:</td><td><?php echo e(date('d.m.Y', strtotime($complaintDetails->created_at))); ?></td></tr>
                                                <tr><td>Updated date:</td><td><?php echo e(date('d.m.Y', strtotime($complaintDetails->updated_at))); ?></td></tr>
                                                <tr><td>Created by:</td><td><?php echo e($complaintDetails->userName); ?></td></tr>



                                                </tbody>
                                                </table>
                                                </div></div>





                                                </div>
                                                </div>
                                                </div>

                                                </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('pagescript'); ?>

                                                <script>
                                                    $(function () {

                                                        $(document).on('click', '.dpib_complaint_edit', function () {

                                                            $.ajax({
                                                                url: $(this).attr('edit_url'),
                                                                type: "GET"

                                                            }).done(function (data) {
                                                                $("#db_complaint_edit_popup").remove();
                                                                $('body').append('<div id="db_complaint_edit_popup" title="Edit Complaint" style="display:none" >' + data.content + '</div>');
                                                                var dialogElement = $("#db_complaint_edit_popup");
                                                                dialogElement.dialog({
                                                                    width: 900,                                                                   
                                                                    modal: true,
                                                                    buttons: {
                                                                        "Update": {
                                                                            class: "btn waves-effect waves-light btn-rounded btn-success",
                                                                            text:'Update',
                                                                            click: function () {
                                                                                DIB.progressDialog(LOCALE.get('dib.common.progress.loading'));
                                                                                 if ($('#complaint_policy').val() == '' || $('#complaint_policy').val() ==null) {

                                                                                              $('#complaint_policy').parent('.form-group').addClass('error');
                                                                                             
                                                                                  } else {
                                                                                            $(".preloader").show(); 
                                                                                            $("form#form_complaint_create").submit(); 
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
                                                                    },
                                                                    open: function (event, ui) {

                                                                        FORM.setDatePicker('.datefield');
                                                                        $(document).off('change', '#complaint_client');
                                                                        $(document).on('change', '#complaint_client', function () {
                                                                            DIB.progressDialog(LOCALE.get('dib.common.progress.loading'));
                                                                            $.ajax({
                                                                                url: "<?php echo route('clientpolicies'); ?>",
                                                                                headers: {
                                                                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                                                                },
                                                                                type: "post",
                                                                                data: {'customer_id': $(this).val(), 'selectedoption': $("#complaint_policy").attr('selected_id')}

                                                                            }).done(function (data) {
                                                                                if (data.status) {
                                                                                    $("#complaint_policy").empty().html(data.optionstring);
                                                                                }

                                                                            })

                                                                        });

                                                                        $("#complaint_client").trigger('change');
                                                                        
                                                                         <?php if(in_array('CUSTOMER_OFFICER', Auth::user()->roles) || in_array('CUSTOMER_MANAGER', Auth::user()->roles) ): ?>
                                                                             $('#complaint_client').attr('disabled',true);
                                                                         $('#complaint_handle_user').attr('disabled',true);
                                                                          $('#complaint_request_date').attr('disabled',true);
                                                                         
                                                                         <?php endif; ?>

                                                                    }
                                                                });
                                                                DIB.centerDialog();
                                                            });

                                                        });



                                                    });
                                                </script>

                                                <?php $__env->stopSection(); ?>
<?php echo $__env->make((in_array('CUSTOMER_MANAGER', Auth::user()->roles) ||  in_array('CUSTOMER_OFFICER', Auth::user()->roles))? 'layouts.elite_client'  :'layouts.elite_fullwidth' , \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Xampp_new\htdocs\inslyportal\resources\views/Complaint/overview.blade.php ENDPATH**/ ?>