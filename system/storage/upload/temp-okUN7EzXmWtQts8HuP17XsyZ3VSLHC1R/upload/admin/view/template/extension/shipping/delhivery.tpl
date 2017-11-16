<?php echo $header; ?><?php echo $column_left; ?>
<div id="content">
<?php if($curlinstall){ ?>
    <div class="page-header">
        <div class="container-fluid">

            <h1><?php echo $heading_title; ?></h1>
            <ul class="breadcrumb">
            <?php foreach ($breadcrumbs as $breadcrumb) { ?>
                <li><a href="<?php echo $breadcrumb['href']; ?>"><?php echo $breadcrumb['text']; ?></a></li>
            <?php } ?>
            </ul>
        </div>
    </div>
    <div class="container-fluid">
        <?php if ($error_warning) { ?>
        <div class="alert alert-danger"><i class="fa fa-exclamation-circle"></i> <?php echo $error_warning; ?>
            <button type="button" class="close" data-dismiss="alert">&times;</button>
        </div>
        <?php } ?>
        <?php if ($store_add_message) { ?>
        <div class="alert alert-success">
            <i class="fa fa-check-circle"></i><?php echo $store_add_message; ?><button type="button" class="close" data-dismiss="alert">×</button>
        </div>
        <?php } ?>
        <div class="panel panel-default">
            <div class="panel-heading delhivery_panel">
                <h3 class="panel-title"><i class="fa fa-pencil"></i> <?php echo $text_edit; ?></h3>
                <div class="pull-right">
    		        <a href="<?php echo $refresh; ?>" data-toggle="tooltip" title="<?php echo $button_refresh; ?>" class="btn btn-info"><i class="fa fa-refresh"></i></a>
                    <button type="submit" form="form-delhivery" data-toggle="tooltip" title="<?php echo $button_save; ?>" class="btn btn-primary"><i class="fa fa-save"></i></button>
                    <a href="<?php echo $cancel; ?>" data-toggle="tooltip" title="<?php echo $button_cancel; ?>" class="btn btn-default"><i class="fa fa-reply"></i></a>
                </div>
            </div>
            <div class="panel-body">
                <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data" id="form-delhivery" class="form-horizontal">
                    <div class="form-group">
                      <label class="col-sm-2 control-label" for="input-status"><?php echo $delhi_status; ?></label>
                      <div class="col-sm-10">
                        <select name="delhivery_status" id="input-status" class="form-control">
                          <?php if ($delhivery_status) { ?>
                          <option value="1" selected="selected"><?php echo $text_enabled; ?></option>
                          <option value="0"><?php echo $text_disabled; ?></option>
                          <?php } else { ?>
                          <option value="1"><?php echo $text_enabled; ?></option>
                          <option value="0" selected="selected"><?php echo $text_disabled; ?></option>
                          <?php } ?>
                        </select>
                        <input type="hidden" name="apikeyedit" value="1">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-2 control-label" for="input-sort-order"><?php echo $delhi_api_url; ?></label>
                      <div class="col-sm-10">
                        <input type="text" name="delhivery_api_url" value="<?php echo $delhivery_api_url; ?>" placeholder="<?php echo $delhi_api_url; ?>" id="input-sort-order" class="form-control" />
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-2 control-label" for="input-sort-order"><?php echo $delhi_token_name; ?></label>
                      <div class="col-sm-10">
                        <input type="text" name="delhivery_token" value="<?php echo $delhivery_token; ?>" placeholder="<?php echo $delhi_token_name; ?>" id="input-sort-order" class="form-control" />
                      </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php if($delhivery_status){ ?>
    <div class="container-fluid">
        <?php if ($error_store_warning) { ?>
        <div class="alert alert-danger"><i class="fa fa-exclamation-circle"></i> <?php echo $error_store_warning; ?>
            <button type="button" class="close" data-dismiss="alert">&times;</button>
        </div>
        <?php } ?>
        <div class="panel panel-default">
            <div class="panel-heading delhivery_panel">
                <h3 class="panel-title" data-toggle="collapse" href="#collapse1"><i class="fa fa-pencil"></i> <a href=""><?php echo $text_store_edit; ?></a></h3>
                <div class="pull-right">
    		        <a href="<?php echo $refresh; ?>" data-toggle="tooltip" title="<?php echo $button_refresh; ?>" class="btn btn-info"><i class="fa fa-refresh"></i></a>
                    <button type="submit" form="form-delhivery-store" data-toggle="tooltip" title="<?php echo $button_save; ?>" class="btn btn-primary"><i class="fa fa-save"></i></button>
                    <a href="<?php echo $cancel; ?>" data-toggle="tooltip" title="<?php echo $button_cancel; ?>" class="btn btn-default"><i class="fa fa-reply"></i></a>
                </div>
            </div>
            <div id="collapse1" class="panel-collapse collapse panel-body">
                <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data" id="form-delhivery-store" class="form-horizontal">
                    <input type="hidden" name="storeedit" value="1">
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
                            <input type="text" name="country" value="" placeholder="" id="input-warehouse-country" class="form-control" />
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
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <?php if ($error_store_warning) { ?>
        <div class="alert alert-danger"><i class="fa fa-exclamation-circle"></i> <?php echo $error_store_warning; ?>
            <button type="button" class="close" data-dismiss="alert">&times;</button>
        </div>
        <?php } ?>
        <div class="panel panel-default">
            <div class="panel-heading delhivery_panel">
                <h3 class="panel-title" data-toggle="collapse" href="#collapse2"><i class="fa fa-pencil"></i> <a href="">Edit store/pickup location</a></h3>
                <div class="pull-right">
    		        <a href="<?php echo $refresh; ?>" data-toggle="tooltip" title="<?php echo $button_refresh; ?>" class="btn btn-info"><i class="fa fa-refresh"></i></a>
                    <button type="submit" form="form-delhivery-store-edit" data-toggle="tooltip" title="<?php echo $button_save; ?>" class="btn btn-primary"><i class="fa fa-save"></i></button>
                    <a href="<?php echo $cancel; ?>" data-toggle="tooltip" title="<?php echo $button_cancel; ?>" class="btn btn-default"><i class="fa fa-reply"></i></a>
                </div>
            </div>
            <div id="collapse2" class="panel-collapse collapse panel-body">
                <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data" id="form-delhivery-store-edit" class="form-horizontal">
                    <input type="hidden" name="storeeditfields" value="1">
                    <div class="form-group">
                      <label class="col-sm-2 control-label" for="input-edit-warehouse-name"><?php echo $warehousename; ?></label>
                      <div class="col-sm-10">

                        <?php if ($stores) { ?>
                        <select name="name" id="input-edit-warehouse-name" class="form-control">
                          <?php foreach ($stores as $store) { ?>
                          <option value="<?php echo $store['warehouse_name']; ?>"><?php echo $store['warehouse_name']; ?></option>
                          <?php } ?>
                        </select>
                        <?php } ?>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-2 control-label" for="input-edit-warehouse-registered-name"><?php echo $warehouseusername; ?></label>
                      <div class="col-sm-10">
                        <input type="text" name="registered_name" value="" placeholder="" id="input-edit-warehouse-registered-name" class="form-control" />
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-2 control-label" for="input-edit-warehouse-address"><?php echo $warehouseaddress; ?></label>
                      <div class="col-sm-10">
                        <input type="text" name="address" value="" placeholder="" id="input-edit-warehouse-address" class="form-control" />
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-2 control-label" for="input-edit-warehouse-phone"><?php echo $warehousephone; ?></label>
                      <div class="col-sm-10">
                        <input type="text" name="phone" value="" placeholder="" id="input-edit-warehouse-phone" class="form-control" />
                      </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- <div class="container-fluid">
    <fieldset>
      <legend><?php echo $store_list; ?><sup>*</sup></legend>
      <div class="table-responsive">
        <table class="table table-bordered table-hover">
          <thead>
            <tr>
              <td class="text-center">S.NO</td>
              <td class="text-left">Warehouse Address</td>
            </tr>
          </thead>
          <tbody>
            <?php if ($warehoueses) { $store_row =1; ?>
            <?php foreach ($warehoueses as $warehouese) { ?>
            <tr>
                <td class="text-center"><?php echo $store_row; ?></td>
                <td class="text-left"><?php echo $warehouese['name']; ?></td>
            </tr>
            <?php $store_row++; } ?>
            <?php } else { ?>
            <tr>
              <td class="text-center" colspan="5"><?php echo $text_no_results; ?></td>
            </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
    </fieldset>
    <sup>*</sup> Warehouse approval made by Delhivery Support team
 </div> -->
 <?php } ?>

<?php }else{ ?>
     <h1>cUrl not enabled. Please contact Hosting Provider.</h1>
<?php } ?>
</div>
<?php echo $footer; ?>
