$(function() {
	$('#send').click(function() {
		var message = $('#first_form').serialize();
		$.ajax({
			type: 'POST',
			url: '../php/action.php',
			data: message,
			success: function(data) {
				// $('#second_form').html(data);
				alert('Success.');
			},
			error: function(xhr, str) {
				alert('Failed: ' + xhr.responseCode);
			}
		});		
	});
});