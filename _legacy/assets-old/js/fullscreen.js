window.addEventListener('scroll', function() {
  var targetElements = document.querySelectorAll('.fullscreen_vertical_1');

  targetElements.forEach(function(targetElement) {
    var elementPosition = targetElement.getBoundingClientRect().top;
    var windowHeight = window.innerHeight;

    // Calcular posición en relación con el viewport
    var elementTopInView = elementPosition;
    var elementBottomInView = elementPosition + targetElement.offsetHeight;

    // Verificar si el elemento está completamente dentro de la vista
    var fullyInView = (elementTopInView >= 0) && (elementBottomInView <= windowHeight);

    // Asignar la opacidad basada en si el elemento está completamente dentro de la vista
    targetElement.style.opacity = fullyInView ? 1 : 0;
  });
});