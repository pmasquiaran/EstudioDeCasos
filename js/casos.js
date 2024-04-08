// Función para ocultar el preloader y mostrar el contenido después de 3 segundos
window.onload = function() {
	setTimeout(function() {
		var preloader = document.querySelector('.preloader');
		preloader.style.opacity = '0'; // Cambia la opacidad del preloader
		setTimeout(function() {
			preloader.style.display = 'none'; // Oculta el preloader
			document.getElementById('content').classList.add('show'); // Muestra el contenido real con efecto fade
		}, 500); // Tiempo de espera después de la transición
	}, 2000); // 3000 milisegundos = 3 segundos
};

( function () {

	$('.carousel').carousel({
		dist: -50,
		indicators: true,
		padding: 15,
		shift: 15
	});

	
} )();

