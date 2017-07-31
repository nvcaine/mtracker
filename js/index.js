$(document).ready(onDocumentReady);

function onDocumentReady() {
	$('#label-cost-form').submit(submitEventListener);
}

function submitEventListener() {
	var requestData = {
		label: $('#label-input').val(),
		amount: $('#cost-input').val()
	};

	$.post('http://localhost/submodule_test/', requestData, function(data) {
		console.log(data);
	});

	$('#label-cost-form').find('input').val('');
	return false;
}