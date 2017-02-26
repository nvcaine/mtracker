$(document).ready(onDocumentReady);

function onDocumentReady() {
	//$("#submit_button").click(submitButtonEventListener);
	$("#label-cost-form").submit(submitEventListener);
}

function submitEventListener() {
	var labelValue = $("#label-input").val();
	var costValue = $("#cost-input").val();
	var alertText = "You spend " + costValue + " on " + labelValue;

	alert(alertText);
}