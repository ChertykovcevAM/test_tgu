$(function() {
	$('#get').click(function() {
		var city = document.first_form.address_city.value;
		ymaps.geocode(city, {results:1}).then(
		function(res) {
			var MyGeoObj = res.geoObjects.get(0);
			document.getElementById('latitude').value = MyGeoObj.geometry.getCoordinates()[0];
			document.getElementById('longitude').value = MyGeoObj.geometry.getCoordinates()[1];
		});
	});
});