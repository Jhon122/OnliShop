$(function(){
	//plugin Cuenta-Regresiva
	$('.hot-deal').countdown('2018/12/23 23:59:00', function(event){
		$('#dias').html(event.strftime('%D'));
		$('#horas').html(event.strftime('%H'));
		$('#minutos').html(event.strftime('%M'));
		$('#segundos').html(event.strftime('%S'));
	});


	//Map
	var map = L.map('mapa').setView([-11.982107, -77.000299], 16);

	L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
	    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
	}).addTo(map);

	L.marker([-11.982107, -77.000299]).addTo(map)
    .bindPopup('Me Encuentro Aqui!!')
    .openPopup()
    .bindTooltip('ONLISHOP Tienda Virtual')
    .openTooltip();

	
});




