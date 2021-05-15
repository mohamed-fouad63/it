
$("#typeahead").focus();
$('input.typeahead').typeahead({
name: 'typeahead1',
remote:'../search_live.php?key=%QUERY',
limit : 10
});