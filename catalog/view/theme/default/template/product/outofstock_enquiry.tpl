<div class="outofstock_enquiry" style="width:94%;">

  <div id="outofstock_enquiry"> </div>

  <form id="form-ask" method="POST" enctype="multipart/form-data" class="form-horizontal">
    <fieldset>
      <h3 class="text-center"><?php echo $heading_title; ?></h3>
      <input type="hidden" name="product_name" id="input-product_name" value="<?php echo $product_name; ?>" />
      <div class="text-center" style="padding-bottom: 12px; padding-top: 3px;"> 
        <?php if ($thumb) { ?>
          <img src="<?php echo $thumb; ?>" title="<?php echo $product_name; ?>" alt="<?php echo $product_name; ?>" />
        <?php } ?>
      </div>
      <div class="form-group required">
        <label class="col-sm-2 control-label" for="input-name"><?php echo $entry_name; ?></label>
        <div class="col-sm-10">
          <input type="text" name="name" value="" id="input-name" class="form-control" required="required" /> 
        </div>
      </div>
      <div class="form-group required">
        <label class="col-sm-2 control-label" for="input-email" style="padding: 5px;"><?php echo $entry_email; ?></label>
        <div class="col-sm-10">
          <input type="text" name="email" value=""  id="input-email" class="form-control" required="required"/>
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-2 control-label" for="input-phone" style="padding: 5px;"><?php echo $entry_phone; ?></label>
        <div class="col-sm-10">
          <input type="text" name="phone" value=""  id="input-phone" class="form-control" /> 
        </div>
      </div>
		  <div class="form-group required">
        <label class="col-sm-2 control-label" for="input-enquiry"><?php echo $entry_enquiry; ?>:</label>
        <div class="col-sm-10">
          <textarea name="enquiry"  rows="10" id="input-enquiry" class="form-control" required="required"></textarea>
        </div>
      </div>
    </fieldset>
    <div class="buttons">
      <div class="pull-right">
        <input class="btn btn-primary" type="button" data-loading-text="Loading" id="button-submit" value="<?php echo $button_save;?>" />
      </div>
    </div>
  </form>
</div>

<script type="text/javascript"><!--
  $('#button-submit').on('click', function() {
    $.ajax({
      url: 'index.php?route=product/outofstock_enquiry/write&product_id=<?php echo $product_id; ?>',
      type: 'post',
      dataType: 'json',
	    data: 'name=' + encodeURIComponent($('input[name=\'name\']').val()) + '&enquiry=' + encodeURIComponent($('textarea[name=\'enquiry\']').val()) + '&email=' + encodeURIComponent($('input[name=\'email\']').val()) + '&product_name=' + encodeURIComponent($('input[name=\'product_name\']').val()) + '&phone=' + encodeURIComponent($('input[name=\'phone\']').val()) ,
      
      data: $("#form-ask").serialize(),
      beforeSend: function() {
        $('#button-submit').button('loading');
      },
      complete: function() {
        $('#button-submit').button('reset');
      },
      success: function(json) {
        $('.alert-success, .alert-danger').remove();
        
        if (json['error']) {
          $('#outofstock_enquiry').after('<div class="alert alert-danger"><i class="fa fa-exclamation-circle"></i> ' + json['error'] + '</div>');
        }
        if (json['success']) {
          $('#outofstock_enquiry').after('<div class="alert alert-success"><i class="fa fa-check-circle"></i> ' + json['success'] + '</div>');
          
          $('input[name=\'name\']').val('');
          $('input[name=\'email\']').val('');
          $('input[name=\'phone\']').val('');
          $('textarea[name=\'enquiry\']').val('');
          //$('input[name=\'product_name\']').val('');
        }
      } 
    });
  });
//--></script>