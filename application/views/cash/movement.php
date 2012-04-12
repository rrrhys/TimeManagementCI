<script type="text/javascript">
	$(function(){
		$(".cash_direction").click(function(){
			var cash_direction = $("input[@name=cash_direction]:checked").val();
			
			var cash_amount = Math.abs($("#cash_amount").val());
			//alert(cash_amount);
			if(cash_direction == "cash_out"){
				cash_amount *=-1;
			}
			$("#cash_amount").val(cash_amount);
		})
	})
</script>
<div class="span6 offset3">
	<?=form_open("/cash/movement/",array('class'=>'form-horizontal'))?>
	<input type="hidden" name="submitted" value="yes">
	<div class="control-group">
		<label for="cash_amount" class="control-label">Cash Amount</label>
		<div class="controls"><input type="text" name="cash_amount" id="cash_amount" class="input-xlarge"></div>
	</div>
	<div class="control-group">
		<label for="cash_in_or_out" class="control-label">In or out?</label>
		<div class="controls">
		<label for="" class="radio">
			<input type="radio" name="cash_direction" id="cash_in" class="cash_direction" value="cash_in"> In
		</label>
		<label for="" class="radio">
			<input type="radio" name="cash_direction" id="cash_in" class="cash_direction" value="cash_out"> Out
		</label>
		

		</div>
	</div>
	<div class="control-group">
		<label for="reference" class="control-label">Reference</label>
		<div class="controls"><input type="text" name="reference" id="reference" class="input-xlarge"></div>
	</div>
	<div class="form-actions"><button type="submit" class="btn btn-primary btn-large" name="submit">Add movement</button></div>
</div>