/**
 * Capa tipo "constelación / conocimiento" inspirada en sitios showcase (p. ej. Dala, Brokerpilot):
 * al cargar, la red aparece unida; al bajar, se dispersa; al subir, vuelve a unirse.
 */
(function () {
  var reduced =
    window.matchMedia &&
    window.matchMedia("(prefers-reduced-motion: reduce)").matches;
  if (reduced || typeof ScrollTrigger === "undefined") {
    return;
  }

  var heroSection = document.querySelector(".main_hv[data-particles]");
  var canvas = document.querySelector(".hero-particle-canvas");
  if (!heroSection || !canvas) {
    return;
  }

  var ctx = canvas.getContext("2d");
  var DPR = Math.min(window.devicePixelRatio || 1, 2);
  var W = 0;
  var H = 0;
  var cx = 0;
  var cy = 0;
  var particles = [];
  var orderProgress = 1;
  var rafId = 0;

  function countParticles() {
    return window.innerWidth < 640 ? 48 : 88;
  }

  function buildParticles() {
    var n = countParticles();
    particles = [];
    var R = Math.min(W, H) * 0.24;
    for (var i = 0; i < n; i++) {
      var layer = i % 4;
      var ring = R * (0.55 + layer * 0.12);
      var ang = (i / n) * Math.PI * 2 + layer * 0.25;
      var tx = cx + Math.cos(ang) * ring;
      var ty = cy + Math.sin(ang) * ring;
      particles.push({
        x: Math.random() * W,
        y: Math.random() * H,
        tx: tx,
        ty: ty,
        ox: (Math.random() - 0.5) * W * 0.48,
        oy: (Math.random() - 0.5) * H * 0.48,
        r: Math.random() * 1.05 + 0.55,
        pulse: Math.random() * Math.PI * 2,
        driftA: 8 + Math.random() * 20,
        driftB: 8 + Math.random() * 22,
        driftS: 0.25 + Math.random() * 0.55,
      });
    }
  }

  function resize() {
    W = Math.max(1, window.innerWidth);
    H = Math.max(1, window.innerHeight);
    cx = W * 0.5;
    cy = H * 0.5;
    canvas.width = Math.floor(W * DPR);
    canvas.height = Math.floor(H * DPR);
    canvas.style.width = W + "px";
    canvas.style.height = H + "px";
    ctx.setTransform(DPR, 0, 0, DPR, 0, 0);
    buildParticles();
  }

  var heroScroll = ScrollTrigger.create({
    trigger: document.documentElement,
    start: 0,
    end: "max",
    scrub: 0.35,
    onUpdate: function (self) {
      orderProgress = 1 - self.progress;
    },
  });
  orderProgress = 1 - heroScroll.progress;

  function tick() {
    var blend = Math.min(1, Math.max(0, orderProgress * 1.12));
    var chaos = 1 - blend;
    var attract = 0.032 + blend * 0.15;
    var now = performance.now() * 0.001;
    var i;
    var j;
    var dx;
    var dy;
    var d;
    var t;

    for (i = 0; i < particles.length; i++) {
      var p = particles[i];
      var driftX = Math.cos(now * p.driftS + p.pulse) * p.driftA;
      var driftY = Math.sin(now * (p.driftS * 0.86) + p.pulse) * p.driftB;
      var tx = p.tx + p.ox * chaos + driftX * (0.18 + chaos * 0.82);
      var ty = p.ty + p.oy * chaos + driftY * (0.18 + chaos * 0.82);
      p.x += (tx - p.x) * attract;
      p.y += (ty - p.y) * attract;
      p.pulse += 0.018;
    }

    ctx.clearRect(0, 0, W, H);
    var connectDist = 96 + blend * 58;
    var lineAlpha = 0.075 + blend * 0.19;

    for (i = 0; i < particles.length; i++) {
      for (j = i + 1; j < particles.length; j++) {
        dx = particles[i].x - particles[j].x;
        dy = particles[i].y - particles[j].y;
        d = Math.sqrt(dx * dx + dy * dy);
        if (d < connectDist) {
          t = 1 - d / connectDist;
          ctx.strokeStyle = "rgba(140, 155, 255, " + t * lineAlpha + ")";
          ctx.lineWidth = 0.55 + blend * 0.45;
          ctx.beginPath();
          ctx.moveTo(particles[i].x, particles[i].y);
          ctx.lineTo(particles[j].x, particles[j].y);
          ctx.stroke();
        }
      }
    }

    for (i = 0; i < particles.length; i++) {
      var dot = particles[i];
      var dotA = 0.24 + blend * 0.46 + Math.sin(dot.pulse) * 0.05;
      ctx.fillStyle = "rgba(255,255,255," + dotA + ")";
      ctx.beginPath();
      ctx.arc(dot.x, dot.y, dot.r, 0, Math.PI * 2);
      ctx.fill();
    }

    rafId = window.requestAnimationFrame(tick);
  }

  var resizeTimer;
  function onResize() {
    window.clearTimeout(resizeTimer);
    resizeTimer = window.setTimeout(function () {
      DPR = Math.min(window.devicePixelRatio || 1, 2);
      resize();
      ScrollTrigger.refresh();
    }, 120);
  }

  resize();
  window.addEventListener("resize", onResize);
  rafId = window.requestAnimationFrame(tick);

  if (typeof ScrollTrigger !== "undefined") {
    ScrollTrigger.refresh();
  }
})();
