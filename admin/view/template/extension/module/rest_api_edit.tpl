<?php echo $header; ?><?php echo $column_left; ?>
<div id="content">
   <div class="page-header">
      <div class="container-fluid">
         <div class="pull-right">
            <button type="submit" form="form-user" data-toggle="tooltip" title="<?php echo $button_save; ?>" class="btn btn-primary"><i class="fa fa-save"></i></button>
            <a href="<?php echo $cancel; ?>" data-toggle="tooltip" title="<?php echo $button_cancel; ?>" class="btn btn-default"><i class="fa fa-reply"></i></a></div>
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
         <div class="panel panel-default">
            <div class="panel-heading">
               <h3 class="panel-title"><i class="fa fa-pencil"></i> <?php echo $text_form; ?></h3>
            </div>
            <div class="panel-body">
               <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data" id="form-user" class="form-horizontal">
                  <div class="form-group required">
                     <label class="col-sm-2 control-label" for="input-username"><?php echo $entry_title; ?></label>
                     <div class="col-sm-10">
                        <input type="text" name="title" value="<?php echo $title; ?>" placeholder="<?php echo $entry_title; ?>" id="input-username" class="form-control" />
                        <?php if ($error_title) { ?>
                        <div class="text-danger"><?php echo $error_title; ?></div>
                        <?php } ?>
                     </div>
                  </div>
                  <div class="form-group required">
                     <label class="col-sm-2 control-label" for="input-firstname"><?php echo $entry_public; ?></label>
                     <div class="col-sm-10">
                        <input type="text" name="public" value="<?php echo $public; ?>" placeholder="<?php echo $entry_public; ?>" id="input-firstname" class="form-control" />
                        <?php if ($error_public) { ?>
                        <div class="text-danger"><?php echo $error_public; ?></div>
                        <?php } ?>
                     </div>
                  </div>
                  <div class="form-group required">
                     <label class="col-sm-2 control-label" for="input-lastname"><?php echo $entry_private; ?></label>
                     <div class="col-sm-10">
                        <input type="text" name="private" value="<?php echo $private; ?>" placeholder="<?php echo $entry_private; ?>" id="input-lastname" class="form-control" />
                        <?php if ($error_private) { ?>
                        <div class="text-danger"><?php echo $error_private; ?></div>
                        <?php } ?>
                        <?php if ($id) { ?>
                        <input type="hidden" name="id" value="<?=$id?>">
                        <?php } ?>
                     </div>
                  </div>
               </form>
            </div>
         </div>
      </div>
   </div>
   <?php echo $footer; ?>