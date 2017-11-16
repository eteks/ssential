<?php if ($modules) { ?>

<?php $blog_class='col-sm-3';?>

<?php if($page_route=='magikblog/article' || $page_route=='magikblog/article/tag' || $page_route=='magikblog/article/view' || $page_route=='magikblog/category' || $page_route=='magikblog') { $blog_class='col-sm-3 sidebar'; } ?>

<aside id="column-right" class="col-right col-xs-12  <?php echo $blog_class; ?>">
<?php if($blog_class=='sidebar') {  ?>
 <div role="complementary" class="widget_wrapper13" id="secondary">
 <?php } ?>
  <?php foreach ($modules as $module) { ?>
  <?php echo $module; ?>
  <?php } ?>
  <?php if($blog_class=='sidebar') {  ?>
 </div>
 <?php } ?>
</aside>
<?php } ?>
