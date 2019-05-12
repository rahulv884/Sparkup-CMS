<h2 class="page-header">edit page</h2>

<?php echo form_open('admin/pages/edit/'.$item->id); ?>
<?php echo validation_errors('<p class="alert alert-danger">'); ?>
<div class="form-group">
	<?php echo form_label('Page Title','title'); ?>
	<?php 
	$data=array(
         'name'=>'title',
         'id'=>'title',
         'maxlength'=>'100',
         'class'=>'form-control',
         'value'=>$item->title


	);
	?>
	<?php echo form_input($data) ?>
	<br>
	<!-- Page Subject -->
	<div class="forn-group">
		<?php echo form_label('Subject','subject_id'); ?>
		<?php echo form_dropdown('subject_id',$subject_options,$item->subject_id,array('class'=>'form-control')); ?>
		
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
         'value'=>$item->body


	);
	?>
	<?php echo form_textarea($data); ?>
</div>
	<br>
	<?php if($item->is_published ==1){
		$yes = TRUE;
		$no = FALSE;
	}
	else
	{
     $yes = FALSE;
		$no =TRUE;
	}
	?>
	<div class="form-group">
		<?php echo form_label('Published','is_published'); ?>
		<?php echo form_radio('is_published',1,$yes); ?> Yes
		<?php echo form_radio('is_published',0,$no); ?> No
	</div>
	<!-- FEATURE -->
	<?php if($item->is_featured ==1){
		$yes = TRUE;
		$no = FALSE;
	}
	else
	{
     $yes = FALSE;
		$no =TRUE;
	}
	?>

	<div class="form-group">
		<?php echo form_label('Feature','is_featured'); ?>
		<?php echo form_radio('is_featured',1,$yes); ?> Yes
		<?php echo form_radio('is_featured',0,$no); ?> No
	</div>

	<!--Menu -->
	<?php if($item->in_menu ==1){
		$yes = TRUE;
		$no = FALSE;
	}
	else
	{
     $yes = FALSE;
		$no =TRUE;
	}
	?>

	<div class="form-group">
		<?php echo form_label('Add To Menu','in_menu'); ?>
		<?php echo form_radio('in_menu',1,$yes); ?> Yes
		<?php echo form_radio('in_menu',0,$no); ?> No
	</div>
		<div class="forn-group">
		<?php echo form_label('Order','order'); ?>
		<input type="number" name="order" id="order" class="form-control" value="<?php echo $item->pg_order; ?>">
		
		
	</div>

	<br>

	<?php echo form_submit('mysubmit','Update Page',array('class'=>'btn btn-primary')); ?>
	
</div>

<?php echo form_close(); ?>