<?php echo $header; ?>
<?php echo $column_left; ?>
<div id="content">
      <div class="page-header">
    <div class="container-fluid">
      <div class="pull-right">
        <button type="button" onclick="$('#form').submit();" form="form-fedex" data-toggle="tooltip" title="<?php echo $button_save; ?>" class="btn btn-primary"><i class="fa fa-save"></i></button>
        <a href="<?php echo $cancel; ?>" data-toggle="tooltip" title="<?php echo $button_cancel; ?>" class="btn btn-default"><i class="fa fa-reply"></i></a></div>
      <h1><?php echo $heading_title; ?></h1>
      <ul class="breadcrumb">
        <?php foreach ($breadcrumbs as $breadcrumb) { ?>
        <li><a href="<?php echo $breadcrumb['href']; ?>"><?php echo $breadcrumb['text']; ?></a></li>
        <?php } ?>
      </ul>
    </div>
  </div>
  
    <?php if ($error_warning) { ?>
    <div class="alert alert-danger"><i class="fa fa-exclamation-circle"></i> <?php echo $error_warning; ?>
      <button type="button" class="close" data-dismiss="alert">&times;</button>
    </div>
    <?php } ?>
  
    <div class="container-fluid">
	  <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data" id="form" class="form-horizontal">
	    <table class="form table">
          <tr>
            <td><?php echo $entry_status; ?></td>
            <td><select name="geozones_weight_status" class="form-control">
                <?php if ($geozones_weight_status) { ?>
	                <option value="1" selected="selected"><?php echo $text_enabled; ?></option>
	                <option value="0"><?php echo $text_disabled; ?></option>
                <?php } else { ?>
	                <option value="1"><?php echo $text_enabled; ?></option>
	                <option value="0" selected="selected"><?php echo $text_disabled; ?></option>
                <?php } ?>
              </select></td>
          </tr>
          <tr>
            <td><?php echo $entry_sort_order; ?></td>
            <td><input class="form-control" type="text" name="geozones_weight_sort_order" value="<?php echo $geozones_weight_sort_order; ?>" size="1"  placeholder="<?php echo $entry_sort_order; ?>"/></td>
          </tr>
	    </table>
	    
        <table id="geozones-weight-shipping" class="list table">
          <thead>
            <tr>
              <td class="left"><?php echo $entry_geozone; ?></td>
              <td class="left"><span data-toggle="tooltip" title="<?php echo $entry_weight_from_tooltip; ?>"><?php echo $entry_weight_from; ?></span></td>
              <td class="left"><span data-toggle="tooltip" title="<?php echo $entry_weight_to_tooltip; ?>"><?php echo $entry_weight_to; ?></span></td>
              <td class="left"><?php echo $entry_first; ?></td>
              <td class="left"><?php echo $entry_next; ?></td>
              <td class="left"><?php echo $entry_tax_class; ?></td>
              <td class="left"><span data-toggle="tooltip" title="<?php echo $entry_title_tooltip; ?>"><?php echo $entry_title; ?></span></td>
              <td class="left"><span data-toggle="tooltip" title="<?php echo $entry_dsc_tooltip; ?>"><?php echo $entry_dsc; ?></span></td>
              <td></td>
            </tr>
          </thead>
          
          <?php $row = 0; ?>
            <?php if (is_array($geozones_weight_data)) { ?>
	          <?php foreach ($geozones_weight_data as $gtwd) { ?>
	          <tbody id="geozones-weight-row-<?php echo $row; ?>">
	            <tr>
	              <td>
	                <select class="form-control" name="geozones_weight_data[<?php echo $row; ?>][geo_zone_id]">
	                  <?php foreach ($geo_zones as $zone) { ?>
	                    <?php  if ($zone['geo_zone_id'] == $gtwd['geo_zone_id']) { ?>
	                      <option value="<?php echo $zone['geo_zone_id']; ?>" selected="selected"><?php echo $zone['name']; ?></option>
	                    <?php } else { ?>
	                      <option value="<?php echo $zone['geo_zone_id']; ?>"><?php echo $zone['name']; ?></option>
	                    <?php } ?>
	                  <?php } ?>
	                </select>
	              </td>
	              
	              <td>
	              	<input class="form-control" type="text" size="4" maxlength="9" name="geozones_weight_data[<?php echo $row; ?>][weight_from]" value="<?php echo number_format($gtwd['weight_from'], 2, '.', ''); ?>" />
	              </td>
	              
	              <td>
	              	<input class="form-control" type="text" size="4" maxlength="9" name="geozones_weight_data[<?php echo $row; ?>][weight_to]" value="<?php echo number_format($gtwd['weight_to'], 2, '.', ''); ?>" />
	              </td>

	              <td>
	              	<input class="form-control" type="text" size="4" maxlength="9" name="geozones_weight_data[<?php echo $row; ?>][cost]" value="<?php echo number_format($gtwd['cost'], 2, '.', ''); ?>" />
	              </td>
	              
	              <td>
	              	<input class="form-control" type="text" size="4" maxlength="9" name="geozones_weight_data[<?php echo $row; ?>][each_next]" value="<?php echo number_format($gtwd['each_next'], 2, '.', ''); ?>" />
	              </td>
	              
	              <td>
	               <select class="form-control" name="geozones_weight_data[<?php echo $row; ?>][tax_class_id]">
	                  <option value="0"><?php echo $text_none; ?></option>
	                  <?php foreach ($tax_classes as $tax_class) { ?>
	                    <?php if ($gtwd['tax_class_id'] == $tax_class['tax_class_id']) { ?>
	                  	  <option value="<?php echo $tax_class['tax_class_id']; ?>" selected="selected"><?php echo $tax_class['title']; ?></option>
	                    <?php } else { ?>
	                    	<option value="<?php echo $tax_class['tax_class_id']; ?>"><?php echo $tax_class['title']; ?></option>
	                    <?php } ?>
	                  <?php } ?>
	                </select>
	               </td>
	              
	              <td>
	              	<input class="form-control" type="text" name="geozones_weight_data[<?php echo $row; ?>][title]" value="<?php echo htmlspecialchars($gtwd['title']); ?>" />
	              </td>
	              
	              <td>
	              	<input class="form-control" type="text" name="geozones_weight_data[<?php echo $row; ?>][dsc]" value="<?php echo htmlspecialchars($gtwd['dsc']); ?>" />
	              </td>
	              
	              <td class="left">
	              	<a onclick="$('#geozones-weight-row-<?php echo $row; ?>').remove();" class="btn btn-danger"><?php echo $button_remove; ?></a>
	              </td>
	            </tr>
	          </tbody>
	          <?php $row++; ?>
	          <?php } ?>
	        <?php } ?>
          <tfoot>
            <tr>
              <td colspan="8"></td>
              <td class="left"><a onclick="addRow();" class="btn btn-success">Add</a></td>
            </tr>
          </tfoot>
        </table>
	    
	  </form>
  </div>
</div>
  
<script type="text/javascript"><!--
var row = <?php echo $row; ?>;

function addRow() {
	html  = '<tbody id="geozones-weight-row-' + row + '">';
	html += '<tr>';
		html += '<td><select class="form-control" name="geozones_weight_data[' + row + '][geo_zone_id]">';
		<?php foreach ($geo_zones as $zone) { ?>
		html += '<option value="<?php echo $zone['geo_zone_id']; ?>"><?php echo addslashes($zone['name']); ?></option>';
		<?php } ?>   
		html += '</select></td>';
		html += '<td><input class="form-control" size="5" maxlength="9" type="text" name="geozones_weight_data['+row+'][weight_from]" value="0.00" />';
		html += '<td><input class="form-control" size="5" maxlength="9" type="text" name="geozones_weight_data['+row+'][weight_to]" value="0.00" />';
		html += '<td><input class="form-control" size="5" maxlength="9" type="text" name="geozones_weight_data['+row+'][cost]" value="0.00" />';
	    html += '<td><input class="form-control" size="5" maxlength="9" type="text" name="geozones_weight_data['+row+'][each_next]" value="0.00" />';
		html += '<td>';
		html += '<select class="form-control" name="geozones_weight_data[' + row + '][tax_class_id]">';
		html += '<option value="0"><?php echo $text_none; ?></option>';
	    <?php foreach ($tax_classes as $tax_class) { ?>
	    	html += '<option value="<?php echo $tax_class['tax_class_id']; ?>"><?php echo $tax_class['title']; ?></option>';
	    <?php } ?>
		html += '</select></td>';
	    html += '<td><input class="form-control" type="text" name="geozones_weight_data['+row+'][title]" />';
	    html += '<td><input class="form-control" type="text" name="geozones_weight_data['+row+'][dsc]" />';
		html += '<td class="left"><a onclick="$(\'#geozones-weight-row-' + row + '\').remove();" class="btn btn-danger"><?php echo $button_remove; ?></a></td>';
	html += '</tr>';
	html += '</tbody>';
	
	$('#geozones-weight-shipping > tfoot').before(html);
		
	row++;
}
//--></script> 

<?php echo $footer; ?> 