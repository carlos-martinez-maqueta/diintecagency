(function () {
  var container = document.getElementById("peru-map");
  var dataEl = document.getElementById("peru-map-data");
  if (!container || !dataEl || typeof maplibregl === "undefined") return;

  var points = [];
  try {
    points = JSON.parse(dataEl.textContent || "[]");
  } catch (e) {
    return;
  }
  if (!points.length) return;

  var map = new maplibregl.Map({
    container: "peru-map",
    style: "https://basemaps.cartocdn.com/gl/dark-matter-gl-style/style.json",
    center: [-75.2, -9.4],
    zoom: 4.65,
    minZoom: 4,
    maxZoom: 12,
    maxBounds: [
      [-82.5, -19.5],
      [-68.2, -0.2],
    ],
    attributionControl: true,
  });

  map.addControl(new maplibregl.NavigationControl({ showCompass: false }), "top-right");

  map.on("load", function () {
    points.forEach(function (p, i) {
      var el = document.createElement("button");
      el.type = "button";
      el.className = "peru-map-marker";
      el.setAttribute("aria-label", p.city + ": " + p.label);
      el.innerHTML =
        '<span class="peru-map-marker__ring"></span><span class="peru-map-marker__core"></span>';

      var popup = new maplibregl.Popup({
        offset: 18,
        closeButton: false,
        className: "peru-map-popup",
      }).setHTML(
        "<strong>" +
          escapeHtml(p.label) +
          " — " +
          escapeHtml(p.city) +
          "</strong><p>" +
          escapeHtml(p.description) +
          "</p><span>" +
          p.projects_count +
          " proyectos</span>"
      );

      new maplibregl.Marker({ element: el, anchor: "center" })
        .setLngLat([p.lng, p.lat])
        .setPopup(popup)
        .addTo(map);

      if (i === 0) {
        popup.addTo(map);
      }
    });
  });

  function escapeHtml(str) {
    return String(str || "")
      .replace(/&/g, "&amp;")
      .replace(/</g, "&lt;")
      .replace(/>/g, "&gt;")
      .replace(/"/g, "&quot;");
  }
})();
