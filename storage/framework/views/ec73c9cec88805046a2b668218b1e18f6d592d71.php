<div class="panel-heading"><h3 class="panel-title"><?php echo e($formtitle); ?></h3></div>
<div class="panel-body" id="fieldgroup_5dac3deae429d">
    <table class="insly-form">    <tbody><tr id="field_5dac554a1ac30_prop_field_10068069" class="field ">
                <td class="">
                    <div class="label ">
                        <span class="text-danger icon-asterix"></span>
                        <span class="title">Transportation Type</span>
                    </div>
                </td>
                <td>
                    <div class="element">
                        <select id="product_transportation_type" name="product_transportation_type" class='form-control'>
                            <option value="">--- select from here ---</option>
                            <option value="Land" <?php echo e(isset($productData->transportation_type) ? (($productData->transportation_type=="Land")? 'selected':''): ''); ?>>Land</option>

                            <option value="Vessel" <?php echo e(isset($productData->transportation_type) ? (($productData->transportation_type=="Vessel")? 'selected':''): ''); ?>>Vessel</option>

                            <option value="Airplane" <?php echo e(isset($productData->transportation_type) ? (($productData->transportation_type=="Airplane")? 'selected':''): ''); ?>>Airplane</option>

                        </select>


                    </div>
                </td>
            </tr>
            <tr id="field_5dac554a1ac30_prop_field_10068070" class="field ">
                <td class="">
                    <div class="label ">
                        <span class="text-danger icon-asterix"></span>
                        <span class="title">Commercial Registration</span>
                    </div>
                </td>
                <td>
                    <div class="element">
                        <input type="text" id="product_commercial_registration" name="product_commercial_registration" value="<?php echo e(isset($productData->commercial_registration) ? $productData->commercial_registration : ''); ?>" autocomplete="off" data-m-dec="0" class='form-control'>
                    </div>
                </td>
            </tr>
            <tr id="product_date_shipment" class="field">
                <td class=""><div class="label"><span class="text-danger icon-asterix"></span><span class="title">Date of Shipment</span></div></td>
                <td><div class="element"><input type="date" id="product_date_shipment" name="product_date_shipment" value="<?php echo e(isset($productData->product_date_shipment) ?  date('Y-m-d', strtotime($productData->product_date_shipment))   : ''); ?>" maxlength="10" autocomplete="off" class="datefield form-control" style="margin-right: 0px !important"><div style="float: right; width: 40%; padding-left: 10px; padding-top: 9px; overflow: hidden"><div id="product_date_shipment_comment"></div></div></div></td>
            </tr> 
            <tr id="product_kind_of_goods" class="field ">
                <td class="">
                    <div class="label ">
                        <span class="text-danger icon-asterix"></span>
                        <span class="title">Kind of goods</span>
                    </div>
                </td>
                <td>
                    <div class="element">
                        <input type="text" id="product_kind_of_goods" name="product_kind_of_goods" value="<?php echo e(isset($productData->kind_of_goods) ? $productData->kind_of_goods : ''); ?>" autocomplete="off" maxlength="255" class='form-control'>
                    </div>
                </td>
            </tr>
            <tr id="field_5dac554a1ac30_prop_field_10068073" class="field ">
                <td class="">
                    <div class="label ">
                        <span class="text-danger icon-asterix"></span>
                        <span class="title">Type of Cover</span>
                    </div>
                </td>
                <td>
                    <div class="element">
                        <select id="product_type_cover" name="product_type_cover" class='form-control'>
                            <option value="">--- select from here ---</option>
                            <option value="Close A" <?php echo e(isset($productData->type_of_cover) ? (($productData->type_of_cover=="Close A")? 'selected':''): ''); ?>>Close A</option>

                            <option value="Close B" <?php echo e(isset($productData->type_of_cover) ? (($productData->type_of_cover=="Close B")? 'selected':''): ''); ?> >Close B</option>

                            <option value="Close C" <?php echo e(isset($productData->type_of_cover) ? (($productData->type_of_cover=="Close C")? 'selected':''): ''); ?>>Close C</option>

                        </select>


                    </div>
                </td>
            </tr>
            <tr id="field_5dac554a1ac30_prop_field_10068074" class="field">
                <td class=""><div class="label full-height" style="height: 39px;"><span class="title">Terms of Sales</span></div></td>
                <td><div class="form-group row pt-3" style="margin-left:10px;">
                              <?php
                           $valueArray = array();
                          ?>
                            
                            <?php if(isset($productData->terms_of_sale)): ?>
                               <?php
                                 $valueArray = explode(',', $productData->terms_of_sale);
     
                               ?>
                            <?php endif; ?>
                            <div class="col-sm-4 custom-control custom-checkbox"><input type="checkbox" class="custom-control-input" id="product_term_of_sale_CFR" name="product_term_of_sale[]" value="CFR" <?php if(in_array('CFR', $valueArray)): ?> checked='checked'  <?php endif; ?> ><label style="width: 30%; cursor: pointer; color: rgb(87, 87, 87);background-color:#fff!important" class="custom-control-label" for="product_term_of_sale_CFR"> CFR</label></div>
                            <div class="col-sm-4 custom-control custom-checkbox"> <input type="checkbox" class="custom-control-input" id="product_term_of_sale_FOB" name="product_term_of_sale[]" value="FOB" <?php if(in_array('FOB', $valueArray)): ?> checked='checked'  <?php endif; ?>  ><label style="width: 30%; cursor: pointer; color: rgb(87, 87, 87);background-color:#fff!important" class="custom-control-label" for="product_term_of_sale_FOB">FOB</label></div>
                        </div></td></tr>
        
        </tbody></table>
</div><?php /**PATH D:\Xampp_new\htdocs\inslyportal\resources\views/Policy/marineproductfieldstplform.blade.php ENDPATH**/ ?>