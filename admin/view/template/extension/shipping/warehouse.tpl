           <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog modal-lg">
            
              <!-- Modal content-->
              <div class="modal-content">
                
                <div class="modal-body">
                    <div class="text-right">                     
                      <button type="submit" form="form-delhivery-store" data-toggle="tooltip" title="<?php echo $button_save; ?>" class="btn btn-primary"><i class="fa fa-save"></i></button>                      
                    </div>
                    
                <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data" id="form-delhivery-store" class="form-horizontal">
                    <input type="hidden" name="storeedit" value="1">
                    <input type="hidden" name="store_edit" value="<?php echo $store_edit['ware_id']; ?>">
                    <div class="form-group">
                      <label class="col-sm-2 control-label" for="input-warehouse-name"><?php echo $warehousename; ?></label>
                      <div class="col-sm-10">
                        <input type="text" name="name" value="" placeholder="" id="input-warehouse-name" class="form-control" />
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-2 control-label" for="input-warehouse-registered-name"><?php echo $warehouseusername; ?></label>
                      <div class="col-sm-10">
                        <input type="text" name="registered_name" value="" placeholder="" id="input-warehouse-registered-name" class="form-control" />
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-2 control-label" for="input-warehouse-address"><?php echo $warehouseaddress; ?></label>
                      <div class="col-sm-10">
                        <input type="text" name="address" value="" placeholder="" id="input-warehouse-address" class="form-control" />
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-2 control-label" for="input-warehouse-city"><?php echo $warehousecity; ?></label>
                      <div class="col-sm-10">
                        <input type="text" name="city" value="" placeholder="" id="input-warehouse-city" class="form-control" />
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-2 control-label" for="input-warehouse-country"><?php echo $warehousecountry; ?></label>
                      <div class="col-sm-10">

                        <?php if ($countries) { ?>
                        <select name="country" id="input-warehouse-country" class="form-control">
                          <?php foreach ($countries as $country) { ?>
                          <option value="<?php echo $country['name']; ?>"><?php echo $country['name']; ?></option>
                          <?php } ?>
                        </select>
                        <?php } else { ?>
                            <input type="text" name="country" value="<?php echo $store_edit['ware_country']; ?>" placeholder="" id="input-warehouse-country" class="form-control" />
                        <?php } ?>

                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-2 control-label" for="input-warehouse-pin"><?php echo $warehousepin; ?></label>
                      <div class="col-sm-10">
                        <input type="text" name="pin" value="" placeholder="" id="input-warehouse-pin" class="form-control" />
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-2 control-label" for="input-warehouse-contact-person"><?php echo $warehousecontactperson; ?></label>
                      <div class="col-sm-10">
                        <input type="text" name="contact_person" value="" placeholder="" id="input-warehouse-contact-person" class="form-control" />
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-2 control-label" for="input-warehouse-email"><?php echo $warehouseemail; ?></label>
                      <div class="col-sm-10">
                        <input type="text" name="email" value="" placeholder="" id="input-warehouse-email" class="form-control" />
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-2 control-label" for="input-warehouse-phone"><?php echo $warehousephone; ?></label>
                      <div class="col-sm-10">
                        <input type="text" name="phone" value="" placeholder="" id="input-warehouse-phone" class="form-control" />
                      </div>
                    </div>
                </form>
            </div><!---->
            </div><!---->
            </div><!---->
          </div><!---->