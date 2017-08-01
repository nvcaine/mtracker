var serviceURL = 'http://localhost/mtracker/items_auto/';

$( function() {

	initItemsAutocompleteDropdown(500);
});

function initItemsAutocompleteDropdown(autocompleteRequestDelay) {

	var autocompleteTimer;

	$('input[name=expense-item-label]').on('keyup', function(event) {

		if(autocompleteTimer !== null)
			autocompleteTimer = clearTimeout(autocompleteTimer);

		autocompleteTimer = setTimeout(getAutocompleteResults, autocompleteRequestDelay);
	});

	$('#item-autocomplete-dropdown').on('click', '.item-autocomplete-link', function() {
		$('input[name=expense-item-label]').val($(this).text());
		$('input[name=expense-item-id]').val($(this).data('item_id'));
		$('#item-autocomplete-dropdown').dropdown('toggle');
		return false;
	});
}

function getAutocompleteResults() {

	var dropdown = $('#item-autocomplete-dropdown');
	dropdown.find('.autocomplete-result').remove();

	$('input[name=expense-item-id]').val('');

	var query = $('input[name=expense-item-label]').val();

	$.get(serviceURL, {query: query}, function(data) {
		if(data !== undefined && data !== null && data.length > 0) {
			$.each(data, function(index, item) {
				var htmlElement = $('<li class="autocomplete-result"></li>');
				htmlElement.html(
					'<a href="#" class="item-autocomplete-link" data-item_id="' + item.item_id + '">' +
						getHighightedAutocompleteLabel(item.label, query) +
					'</a>'
				);
				dropdown.append(htmlElement);
			});
		}
	});
}

function getHighightedAutocompleteLabel(name, query) {

	var startIndex = name.toLowerCase().indexOf(query.toLowerCase());

	return name.substring(0, startIndex) +
		'<strong>' + name.substring(startIndex, startIndex + query.length) + '</strong>' +
		name.substring(startIndex + query.length);
}