<div class="span10 offset1">
<input type="hidden" name="" id="datetime_started_reference" value="<?=isset($current_job['datetime_started']) ? $current_job['datetime_started'] : ""?>">	
<div class="span10 offset1" style="position: relative;">

		<div class="clock_number" id="clock_number_1">Balance $<?=$current_balance?></div>

</div>
<script type="text/javascript">
</script>
	<table class="table table-striped span8">
		<thead>
			<tr>
				<th>ID</th>
				<th>Reference</th>
				<th>Cash Amount</th>
				<th>Transaction Date</th>
			</tr>
		</thead>
		<?if(!$movements){?>
			<tbody>
				<tr>
					<td colspan='7'>No cash movements yet. <a href="/cash/movement">Add new</a></td>
				</tr>
			</tbody>
		<?}else{?>
			<tbody>
				<?foreach($movements as $m){?>
				
				<tr>
					<td><a href="/cash/view_movement/<?=$m['id']?>"><?=$m['id']?></a></td>
					<td><?=$m['reference']?></td>
					<td><?=$m['cash_amount']?></td>
					<td><?=date("d/m/Y h:i",strtotime($m['date_created']))?></td>
				</tr>
				
			<?	}//foreach?>

			</tbody>
						<tr>
				<td colspan=7><a href="/cash/movement"><i class="icon-plus-sign"></i> Add New</a></td>
			</tr>
		<?}//else?>
	</table>
</div>