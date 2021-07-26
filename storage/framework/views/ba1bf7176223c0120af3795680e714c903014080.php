<div class="panel-heading"><h3 class="panel-title"><?php echo e($formtitle); ?></h3></div>
       <?php if(isset($objdata) && count($objdata) >0): ?>
                    <?php echo e(Form::open(array('route' => array('updateobjectdata',$objdata->policy_id, $objdata->id),'name' => 'objectForm','id'=>'objectForm') )); ?>

        <?php elseif(isset($objdata) && count($objdata) ==0): ?>                  
                    <?php echo e(Form::open(array('route' => array('createnewobject',$policyId),'name' => 'objectForm','id'=>'objectForm') )); ?>

        <?php endif; ?>

<div class="panel-body" id="fieldgroup_vehicle">
    <table class="insly-form">
        <tbody>

 
                      
            <tr id="field_object_make" class="field ">
                <td class="">
                    <div class="label ">
                        <span class="text-danger icon-asterix"></span>
                        <span class="title">Make</span>
                        <input type="hidden" id="object_type" name="object_type" value="<?php echo e(($singleFlag)? 'vehicle' :'vehicle_multiple'); ?>" class='form-control'>
                    </div>
                </td>
                <td>
                    <div class="element">
                        <select id="object_make" name="object_make[1]" class='form-control'>
                            <option value="">--- select from here ---</option>
                            <?php
                            $makeArray = array("ASTON MARTIN",
                            "AUDI",
                            "BENTLEY",
                            "BMW",
                            "BUGATTI",
                            "BUICK",
                            "BYD",
                            "CADILLAC",
                            "CHEVROLET",
                            "CHEVROLET",
                            "CHRYSLER",
                            "CITROEN",
                            "DAEWOO",
                            "DODGE",
                            "FERRARI",
                            "FIAT",
                            "FORD",
                            "GEELY",
                            "GMC",
                            "GRAND",
                            "HONDA",
                            "HUMMER",
                            "HYUNDAI",
                            "ISUZU",
                            "JAGUAR",
                            "KIA",
                            "LAMBORGHINI",
                            "LAND ROVER",
                           "LEXUS", 
                           "LINCOLN",
                           "LONDON TAXIS",
                           "LOTUS",
                           "MASERATI",
                           "MAZDA",
                           "MCLAREN",
                           "MERCEDES-BENZ",
                           "MINI COOPER",
                           "MITSUBISHI",
                           "NISSAN",
                           "PEUGEOT", 
                           "PONTIAC",
                           "PORSCHE",
                           "RANGE ROVER",
                            "ROLLS-ROYCE",
                            "SAAB",
                            "SEAT",
                           "SKODA",
                            "SUBARU",
                            "SUZUKI",
                           "TESLA",
                            "TOYOTA",
                            "VOLKSWAGEN",
                            "VOLVO",
                            "JEEP");
                            ?>
                            
                            <?php $__currentLoopData = $makeArray; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $make): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                               <option value="<?php echo e($make); ?>" <?php echo e(isset($objdata->make) ? (($objdata->make==$make)? 'selected':''): ''); ?>><?php echo e($make); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            
                           
                            

                        </select>


                    </div>
                </td>
            </tr>
            <tr id="field_model" class="field ">
                <td class="">
                    <div class="label ">
                        <span class="text-danger icon-asterix"></span>
                        <span class="title">Model</span>
                    </div>
                </td>
                <td>
                    <div class="element">
                        <input type="text" id="object_model" name="object_model[1]" value="<?php echo e(isset($objdata->model) ? $objdata->model : ''); ?>" autocomplete="off" maxlength="255" class='form-control'>
                    </div>
                </td>
            </tr>
            <tr id="field_object_year" class="field ">
                <td class="">
                    <div class="label ">
                        <span class="text-danger icon-asterix"></span>
                        <span class="title">Year</span>
                    </div>
                </td>
                <td>
                    <div class="element">
                        <input type="text" id="object_year" name="object_year[1]" value="<?php echo e(isset($objdata->year) ? $objdata->year : ''); ?>" autocomplete="off" data-m-dec="0" class='form-control'>
                    </div>
                </td>
            </tr>
            <tr id="field_object_license_plate" class="field ">
                <td class="">
                    <div class="label ">
                        <span class="text-danger icon-asterix"></span>
                        <span class="title">License plate</span>
                    </div>
                </td>
                <td>
                    <div class="element">
                        <input type="text" id="object_license_plate" name="object_license_plate[1]" value="<?php echo e(isset($objdata->license_plate) ? $objdata->license_plate : ''); ?>" autocomplete="off" maxlength="32" class='form-control'>
                    </div>
                </td>
            </tr>
            <tr id="field_object_body_type" class="field ">
                <td class="">
                    <div class="label ">
                        <span class="text-danger icon-asterix"></span>
                        <span class="title">Body Type</span>
                    </div>
                </td>
                <td>
                    <div class="element">
                        <select id="object_body_type" name="object_body_type[1]" class='form-control'>
                            <option value="">--- select from here ---</option>
                            
                            <?php
                            $bodytypeArray = array("BUS",
                            "COUPE/SPORT",
                            "HEAD",
                            "PICKUP",
                            "SEDAN",
                            "SUV",
                            "VAN"
                            
                            );
                            ?>
                            
                            <?php $__currentLoopData = $bodytypeArray; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bodytype): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                               <option value="<?php echo e($bodytype); ?>" <?php echo e(isset($objdata->body_type) ? (($objdata->body_type==$bodytype)? 'selected':''): ''); ?>><?php echo e($bodytype); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            
                            

                        </select>


                    </div>
                </td>
            </tr>
            <tr id="field_object_vincode" class="field ">
                <td class="">
                    <div class="label ">
                        <span class="text-danger icon-asterix"></span>
                        <span class="title">VIN code</span>
                    </div>
                </td>
                <td>
                    <div class="element">
                        <input type="text" id="object_vincode" name="object_vincode[1]" value="<?php echo e(isset($objdata->vin_code) ? $objdata->vin_code : ''); ?>" autocomplete="off" maxlength="32" minlength="6" class='form-control'>
                    </div>
                </td>
            </tr>
            <tr id="field_object_usage" class="field ">
                <td class="">
                    <div class="label ">
                        <span class="text-danger icon-asterix"></span>
                        <span class="title">Usage</span>
                    </div>
                </td>
                <td>
                    <div class="element">
                        <select id="object_usage" name="object_usage[1]" class='form-control'>
                            <option value="">--- select from here ---</option>
                                      <?php
                            $usageArray = array("Private",
                            "Commercial",
                            "Other"
                            );
                            ?>
                            
                            <?php $__currentLoopData = $usageArray; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $usage): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                               <option value="<?php echo e($usage); ?>" <?php echo e(isset($objdata->vehicle_usage) ? (($objdata->vehicle_usage==$usage)? 'selected':''): ''); ?>><?php echo e($usage); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            
                            
                            
                        </select>


                    </div>
                </td>
            </tr>
            <tr id="field_object_number_of_passengers" class="field ">
                <td class="">
                    <div class="label ">
                        <span class="text-danger icon-asterix"></span>
                        <span class="title">CAR NUMBER OF PASSENGERS</span>
                    </div>
                </td>
                <td>
                    <div class="element">
                        <input type="text" id="object_number_of_passengers" name="object_number_of_passengers[1]" value="<?php echo e(isset($objdata->no_of_passengers) ? $objdata->no_of_passengers : ''); ?>" autocomplete="off" data-m-dec="0" class='form-control'>
                    </div>
                </td>
            </tr>
            <tr id="field_object_power" class="field ">
                <td class="">
                    <div class="label ">
                        <span class="text-danger "></span>
                        <span class="title">Power (kw)</span>
                    </div>
                </td>
                <td>
                    <div class="element">
                        <input type="text" id="object_power" name="object_power[1]" value="<?php echo e(isset($objdata->power) ? $objdata->power : ''); ?>" autocomplete="off" data-m-dec="0" class='form-control'>
                    </div>
                </td>
            </tr>
            <tr id="field_object_gross_weight" class="field ">
                <td class="">
                    <div class="label ">
                        <span class="text-danger icon-asterix"></span>
                        <span class="title">Gross weight (kg)</span>
                    </div>
                </td>
                <td>
                    <div class="element">
                        <input type="text" id="object_gross_weight" name="object_gross_weight[1]" value="<?php echo e(isset($objdata->gross_weight) ? $objdata->gross_weight : ''); ?>" autocomplete="off" data-m-dec="0" class='form-control'>
                    </div>
                </td>
            </tr>
            
            
        </tbody>
    
    
    </table>

</div>
<?php if(isset($objdata)): ?>

 <?php echo e(Form::close()); ?>

                        
<?php endif; ?> <?php /**PATH D:\Xampp_new\htdocs\inslyportal\resources\views/Policy/vehicleobjecttplform.blade.php ENDPATH**/ ?>