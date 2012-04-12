var app = {};
app.update_display_clock = function(){
	var datetime_started = new Date($("#datetime_started_reference").val());
	var datetime_current = new Date();
	var datetime_minutes = Math.round((datetime_current - datetime_started)/1000/60);
	var datetime_hours = 0;

	if(isNaN(datetime_minutes)){
		datetime_minutes = "0";
	}
	else{
			while(datetime_minutes > 60){
				datetime_minutes -=60;
				datetime_hours +=1;
			}
	}
	var hours_string = datetime_hours + "";
	while(hours_string.length < 2){
		hours_string = "0" + hours_string;
	}
	var minutes_string = datetime_minutes + "";
	while(minutes_string.length < 2){
		hours_string = "0" + hours_string;
	}
	$("#clock_number_1").html(hours_string);
	$("#clock_number_2").html(minutes_string);
}