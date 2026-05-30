window.addEventListener('scroll', function() {
var defaultFullscreen = document.querySelector('.section_parrallax .default_fullscreen');
var elementPosition = defaultFullscreen.getBoundingClientRect().top;
var windowHeight = window.innerHeight;

// Calcular posición en relación con el viewport
var elementTopInView = elementPosition;
var elementBottomInView = elementPosition + defaultFullscreen.offsetHeight;

// Calcular la fracción de la altura de la ventana visible
var visibilityFraction = (windowHeight - elementPosition) / windowHeight;

// Limitar la fracción a estar entre 0 y 1
visibilityFraction = Math.max(0, Math.min(1, visibilityFraction));

// Calcular el ancho deseado basado en la fracción de visibilidad
var desiredWidth = 150 * visibilityFraction; // 150rem es el ancho máximo

// Aplicar el ancho deseado al elemento
defaultFullscreen.style.width = desiredWidth + 'rem';
});