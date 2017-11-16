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
       
          <div class="alert alert-success" style="display:none">
            <i class="fa fa-check-circle"></i><button type="button" class="close" data-dismiss="alert">×</button>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading delhivery_panel">
                <h3 class="panel-title"><i class="fa fa-pencil"></i> <?php echo $text_edit; ?></h3>
                <div class="pull-right">
                    <?php if ($delhivery_status) { ?>
                     <button class="btn btn-success" onclick="add_warehouse()">Create Warehouse</button>
                    <?php } ?>
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
                    <div class="form-group">
                      <label class="col-sm-2 control-label" for="input-sort-order"><?php echo $entry_sort_order; ?></label>
                      <div class="col-sm-10">
                        <input type="text" name="delhivery_sort_order" value="<?php echo $delhivery_sort_order; ?>" placeholder="<?php echo $entry_sort_order; ?>" id="input-sort-order" class="form-control" />
                      </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
     <?php if ($delhivery_status) { ?>
    <div class="panel panel-default warehouselist">
          <div class="panel-body">
              <div id="extension">
                <fieldset>
                  <legend><?php echo $store_list; ?></legend>
                    <div class="table-responsive">
                      <table class="table table-bordered table-hover">
                        <thead>
                          <tr>
                            <td class="text-left"><?php echo $warehousename; ?></td>
                            <td class="text-left"><?php echo $warehousecity; ?></td>
                            <td class="text-left"><?php echo $warehousepin; ?></td>
                            <td class="text-right">Action</td>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                           if($stores)
                           { 
                             foreach($stores as $store)
                             {
                          ?>   
                          <tr>
                            <td class="text-left"><?php echo $store['warehouse_name']; ?></td>
                            <td class="text-left"><?php echo $store['warehouse_city']; ?></td>
                            <td class="text-left"><?php echo $store['warehouse_pincode']; ?></td>                            
                            <td class="text-right">
                                <button class="btn btn-warning" onclick="edit_ware(<?php echo $store['warehouse_id']; ?>)"><i class="fa fa-pencil" aria-hidden="true"></i>
                                </button>
                               <button class="btn btn-danger" onclick="delete_ware(<?php echo $store['warehouse_id']; ?>)"><i class="fa fa-trash-o" aria-hidden="true"></i>
                              </button>
                            </td>
                          </tr>
                          <?php 
                              }
                            } 
                           ?>                        
                          
                        </tbody>
                      </table>
                    </div>
                </fieldset>
              </div>
          </div>
      </div>
     <?php } ?>
    <div class="container-fluid">
        <?php if ($error_store_warning) { ?>
        <div class="alert alert-danger"><i class="fa fa-exclamation-circle"></i> <?php echo $error_store_warning; ?>
            <button type="button" class="close" data-dismiss="alert">&times;</button>
        </div>
        <?php } ?>
            <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog modal-lg">
            
              <!-- Modal content-->
              <div class="modal-content">
                
                <div class="modal-body">
                     <p class="text-message text-danger"></p>
                    <div class="text-right">                     
                      <button type="button" id="btnSave" onclick="save()" class="btn btn-primary">Save</button>                     
                    </div>
                    
                <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data" id="form-delhivery-store" class="form-horizontal">
                    <!--<input type="hidden" name="storeedit" value="0">-->
                    <div class="form-group">
                      <label class="col-sm-2 control-label" for="input-warehouse-name"><?php echo $warehousename; ?></label>
                      <div class="col-sm-10">
                        <input type="text" name="name" value="" placeholder="" id="input-warehouse-name" class="form-control" />
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-2 control-label" for="input-warehouse-registered-name"><?php echo $warehouseusername; ?></label>
                      <div class="col-sm-10">
                        <input type="text" name="registered_name" value="" placeholder="" id="input-warehouse-registered-name" class="form-control" required/>
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
    </div>
<?php } else{ ?>
     <h1>cUrl not enabled. Please contact Hosting Provider.</h1>
<?php } ?>
</div>
<script>
  
  var save_method; //for save method string
  var update_id;
  function add_warehouse()
  {
    save_method = 'add';
    $('#form-delhivery-store')[0].reset(); // reset form on modals
    $('[name="email"]').prop('disabled', false);
    $('[name="city"]').prop('disabled', false);
    $('[name="country"]').prop('disabled', false);
    $('#myModal').modal('show'); // show bootstrap modal
  //$('.modal-title').text('Add Person'); // Set Title to Bootstrap modal title
  }
  

  function edit_ware(id)
   {
        update_id=id;
        save_method = 'update';
        $('#form-delhivery-store')[0].reset(); // reset form on modals
        
        var edit_link= '<?php echo $edit_action; ?>'.replace('&amp;','&');

        //Ajax Load data from ajax
        $.ajax({
          url : edit_link + "&edit_id=" + id,
          type: "GET",
          dataType: "JSON",
          success: function(data)
          {
              
              //alert(data);
              //$('[name="storeedit"]').val(data.warehouse_id);
              $('[name="name"]').val(data.warehouse_name);
              $('[name="registered_name"]').val(data.registred_name);
              $('[name="address"]').val(data.warehouse_address);
              $('[name="city"]').prop('disabled', true);
              $('[name="country"]').prop('disabled', true);
              $('[name="pin"]').val(data.warehouse_pincode);
              $('[name="contact_person"]').val(data.contact_person);
              $('[name="email"]').prop('disabled', true);
              $('[name="phone"]').val(data.warehouse_phone);
              $('#myModal').modal('show');  // show bootstrap modal when complete loaded
              //$('.panel-heading').text('Edit Book'); // Set title to Bootstrap modal title
   
          },
          error: function (jqXHR, textStatus, errorThrown)
          {
              alert('Error get data from ajax');
          }
      });
   }
   function save()
    {
        var url;
        if(save_method == 'add')
        {
            url = '<?php echo $add_action; ?>'.replace('&amp;','&');
        }
        else
        {
         url = '<?php echo $update_action; ?>'.replace('&amp;','&');
         url = url + "&edit_id=" + update_id;
        }
        //alert(url);
       // ajax adding data to database
          $.ajax({
            url : url,
            type: "POST",
            data: $('#form-delhivery-store').serialize(),
            success: function(data)
            {
              // alert(data);
              if(data =='success')
              {
                $('#myModal').modal('hide');
                //location.reload();
                $('.alert-success').css("display", "block");
                $('.alert-success').text('You can activate the warehouse once you recieve the mail from the vendor');
                setTimeout(location.reload.bind(location), 3000);
              }
              else if(data =='updated')
              {
                $('#myModal').modal('hide');
                $('.alert-success').css("display", "block");
                $('.alert-success').text('your warehouse was updated');
                setTimeout(location.reload.bind(location), 3000);
                
              }
              else
              {
                $('.text-message').text(data);
              }              
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error adding / update data');
            }
        });
    }
    function delete_ware(id)
    {
      if(confirm('Are you sure delete this data?'))
      {
        var del_link= '<?php echo $delete_action; ?>'.replace('&amp;','&');
        //Ajax Load data from ajax
        $.ajax({
          url : del_link + "&del_id=" + id,
            type: "POST",
            dataType: "JSON",
            success: function(data)
            {
               
               location.reload();
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error deleting data');
            }
        });
 
      }
    }
</script>

<?php echo $footer; ?>
