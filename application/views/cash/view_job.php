<div class="span6 offset3">
<?
$disabled_field = "";
if($edit_disabled == true){
	$disabled_field = "disabled";
}?>
<?if(!$disabled_field){?>
	<?=form_open("/app/edit_job/" . $job['id'],array('class'=>'form-horizontal'))?>
<?}?>
	<input type="hidden" name="submitted" value="yes">
	<div class="control-group">
		<label for="job_number" class="control-label">Job Number</label>
		<div class="controls"><input type="text" name="job_number" id="job_number" class="input-xlarge <?=$disabled_field?>" <?=$disabled_field?> value="<?=$job['job_number']?>"></div>
	</div>
	<div class="control-group">
		<label for="datetime_started" class="control-label">Time Started</label>
		<div class="controls"><input type="text" name="datetime_started" id="datetime_started" class="input-xlarge disabled" disabled value="<?=$job['datetime_started']?>"></div>
	</div>
	<div class="control-group">
		<label for="datetime_finished" class="control-label">Time Finished</label>
		<div class="controls"><input type="text" name="datetime_finished" id="datetime_finished" class="input-xlarge disabled" disabled value="<?=$job['datetime_finished']?>"></div>
	</div>
	<div class="control-group">
		<label for="customer_name" class="control-label">Customer Name</label>
		<div class="controls"><input type="text" name="customer_name" id="customer_name" class="input-xlarge <?=$disabled_field?>" <?=$disabled_field?> value="<?=$job['customer_name']?>"></div>
	</div>
	<div class="control-group">
		<label for="work_type" class="control-label">Work Type</label>
		<div class="controls"><input type="text" name="work_type" id="work_type" class="input-xlarge <?=$disabled_field?>" <?=$disabled_field?> value="<?=$job['work_type']?>"></div>
	</div>
	<div class="control-group">
		<label for="work_description" class="control-label">Work Description</label>
		<div class="controls"><textarea name="work_description" id="work_description" cols="30" rows="10" class="input-xlarge <?=$disabled_field?>" <?=$disabled_field?>><?=$job['work_description']?></textarea></div>
		
	</div>
	<div class="control-group">
		<label for="work_comments" class="control-label">Work Comments</label>
		<div class="controls">
<textarea name="work_comments" id="work_comments" cols="30" rows="10" class="input-xlarge <?=$disabled_field?>" <?=$disabled_field?>><?=$job['work_comments']?></textarea></div>
	</div>
	<?if(!$disabled_field){?><div class="form-actions"><button type="submit" class="btn btn-primary btn-large" name="submit">Finish</button><?}?></div>
</div>