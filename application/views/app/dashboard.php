<div class="span10 offset1">
<input type="hidden" name="" id="datetime_started_reference" value="<?=isset($current_job['datetime_started']) ? $current_job['datetime_started'] : ""?>">	
<div class="span10 offset1" style="position: relative;">

		<div class="clock_number" id="clock_number_1">--</div>
		<div class="clock_number" id="clock_colon">:</div>
		<div class="clock_number" id="clock_number_2">--</div>

</div>
<script type="text/javascript">
$(function(){
	app.update_display_clock();
	//window.setInterval(app.update_display_clock,20000);
})
</script>
	<table class="table table-striped span8">
		<thead>
			<tr>
				<th>Job Number</th>
				<th>Work Type</th>
				<th>Comments</th>
				<th>Time Started</th>
				<th>Time Finished</th>
				<th>Time on Job</th>
				<th>Actions</th>
			</tr>
		</thead>
		<?if(!$times_entered){?>
			<tbody>
				<tr>
					<td colspan='7'>No times entered yet. <a href="/app/new_job">Add new</a></td>
				</tr>
			</tbody>
		<?}else{?>
			<tbody>
				<?foreach($times_entered as $t){?>
				
				<tr class="<?=$t['datetime_finished'] == "" ? "Unfinished" : ""?>">
					<td><a href="/app/view_job/<?=$t['id']?>"><?=$t['job_number']?></a></td>
					<td><?=$t['work_type']?></td>
					<td><?=$t['work_description']?></td>
					<td><?=date("d/m/Y h:i",strtotime($t['datetime_started']))?></td>
					<td><?=$t['datetime_finished'] == "" ? "" : date("d/m/Y h:i",strtotime($t['datetime_finished']))?></td>
					<td><?=round($t['datetime_finished'] == "" ? 
							(time() - strtotime($t['datetime_started']))/60 : 
							(strtotime($t['datetime_finished']) - strtotime($t['datetime_started']))/60)?> minutes</td>
					<td>
					<?if($t['datetime_finished'] == ""){?>
					<a class="btn btn-success" href="/app/finish_job/<?=$t['id']?>">Finish Job</a>
					<?}?>
					<?if($t['datetime_finished'] == ""){?>
					<a class="btn btn-success" href="/app/edit_job/<?=$t['id']?>">Edit Job</a>
					<?}?></td>
				</tr>
				
			<?	}//foreach?>

			</tbody>
						<tr>
				<td colspan=7><a href="/app/new_job"><i class="icon-plus-sign"></i> Add New</a></td>
			</tr>
		<?}//else?>
	</table>
</div>