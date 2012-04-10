<div class="span6 offset3">
	<?=form_open("/app/new_job/",array('class'=>'form-horizontal'))?>
	<input type="hidden" name="submitted" value="yes">
	<div class="control-group">
		<label for="job_number" class="control-label">Job Number</label>
		<div class="controls"><input type="text" name="job_number" id="job_number" class="input-xlarge"></div>
	</div>
	<div class="control-group">
		<label for="customer_name" class="control-label">Customer Name</label>
		<div class="controls"><input type="text" name="customer_name" id="customer_name" class="input-xlarge" data-provide="typeahead" data-items="4" data-source="<?foreach($clients as $client){?>'<?=$client?>',<?}?>">
<input type="text" class="span3" style="margin: 0 auto;" data-provide="typeahead" data-items="4" data-source="[&quot;Alabama&quot;,&quot;Alaska&quot;,&quot;Arizona&quot;,&quot;Arkansas&quot;,&quot;California&quot;,&quot;Colorado&quot;,&quot;Connecticut&quot;,&quot;Delaware&quot;,&quot;Florida&quot;,&quot;Georgia&quot;,&quot;Hawaii&quot;,&quot;Idaho&quot;,&quot;Illinois&quot;,&quot;Indiana&quot;,&quot;Iowa&quot;,&quot;Kansas&quot;,&quot;Kentucky&quot;,&quot;Louisiana&quot;,&quot;Maine&quot;,&quot;Maryland&quot;,&quot;Massachusetts&quot;,&quot;Michigan&quot;,&quot;Minnesota&quot;,&quot;Mississippi&quot;,&quot;Missouri&quot;,&quot;Montana&quot;,&quot;Nebraska&quot;,&quot;Nevada&quot;,&quot;New Hampshire&quot;,&quot;New Jersey&quot;,&quot;New Mexico&quot;,&quot;New York&quot;,&quot;North Dakota&quot;,&quot;North Carolina&quot;,&quot;Ohio&quot;,&quot;Oklahoma&quot;,&quot;Oregon&quot;,&quot;Pennsylvania&quot;,&quot;Rhode Island&quot;,&quot;South Carolina&quot;,&quot;South Dakota&quot;,&quot;Tennessee&quot;,&quot;Texas&quot;,&quot;Utah&quot;,&quot;Vermont&quot;,&quot;Virginia&quot;,&quot;Washington&quot;,&quot;West Virginia&quot;,&quot;Wisconsin&quot;,&quot;Wyoming&quot;]">
		</div>
	</div>
	<div class="control-group">
		<label for="work_type" class="control-label">Work Type</label>
		<div class="controls"><input type="text" name="work_type" id="work_type" class="input-xlarge"></div>
	</div>
	<div class="control-group">
		<label for="work_description" class="control-label">Work Description</label>
		<div class="controls"><textarea name="work_description" id="work_description" cols="30" rows="10" class="input-xlarge"></textarea></div>
		
	</div>
	<div class="control-group">
            <label class="control-label" for="start_work_now">Start work now?</label>
            <div class="controls">
              <label class="checkbox">
                <input type="checkbox" id="start_work_now" value="start_work_now">
                Yes, start this job now.
              </label>
            </div>
    </div>
	<div class="control-group">
		<label for="work_comments" class="control-label">Work Comments</label>
		<div class="controls">
<textarea name="work_comments" id="work_comments" cols="30" rows="10" class="input-xlarge"></textarea></div>
	</div>
	<div class="form-actions"><button type="submit" class="btn btn-primary btn-large" name="submit">Start Work</button></div>
</div>