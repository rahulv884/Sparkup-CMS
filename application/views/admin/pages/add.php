<h2 class="page-header">add page</h2>

<?php echo form_open('admin/pages/add'); ?>
<?php echo validation_errors('<p class="alert alert-danger">'); ?>
<div class="form-group">
	<?php echo form_label('Page Title','title'); ?>
	<?php 
	$data=array(
         'name'=>'title',
         'id'=>'title',
         'maxlength'=>'100',
         'class'=>'form-control',
         'value'=>set_value('title')


	);
	?>
	<?php echo form_input($data) ?>
	<br>
	<!-- Page Subject -->
	<div class="forn-group">
		<?php echo form_label('Subject','subject_id'); ?>
		<?php echo form_dropdown('subject_id',$subject_options,0,array('class'=>'form-control')); ?>
		
	</div>
	<br>
	<!-- Page Body -->
	<div class="form-group">
	<?php echo form_label('Body','body'); ?>
	<?php 
	$data=array(
         'name'=>'body',
         'id'=>'body',
         'class'=>'form-control',
         'value'=>set_value('name')


	);
	?>
	<?php echo form_textarea($data); ?>
</div>
	<br>
	<div class="form-group">
		<?php echo form_label('Published','is_published'); ?>
		<?php echo form_radio('is_published',1,TRUE); ?> Yes
		<?php echo form_radio('is_published',0,FALSE); ?> No
	</div>
	<div class="form-group">
		<?php echo form_label('Feature','is_featured'); ?>
		<?php echo form_radio('is_featured',1,FALSE); ?> Yes
		<?php echo form_radio('is_featured',0,TRUE); ?> No
	</div>
	<div class="form-group">
		<?php echo form_label('Add To Menu','in_menu'); ?>
		<?php echo form_radio('in_menu',1,TRUE); ?> Yes
		<?php echo form_radio('in_menu',0,FALSE); ?> No
	</div>
		<div class="forn-group">
		<?php echo form_label('Order','order'); ?>
		<input type="number" name="order" id="order" class="form-control">
		
		
	</div>

	<br>

	<?php echo form_submit('mysubmit','Add Page',array('class'=>'btn btn-primary')); ?>
	
</div>

<?php echo form_close(); ?>