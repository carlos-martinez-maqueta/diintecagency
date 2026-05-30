(function () {
  var reduced =
    window.matchMedia &&
    window.matchMedia("(prefers-reduced-motion: reduce)").matches;

  function initLenis() {
    if (reduced || typeof Lenis === "undefined" || typeof gsap === "undefined") {
      return;
    }
    var lenis = new Lenis({ lerp: 0.085, smoothWheel: true });
    lenis.on("scroll", ScrollTrigger.update);
    gsap.ticker.add(function (time) {
      lenis.raf(time * 1000);
    });
    gsap.ticker.lagSmoothing(0);
  }

  function wrapHeroWords(h2) {
    var full = (h2.textContent || "").trim();
    if (!full) return false;
    var words = full.split(/\s+/);
    h2.textContent = "";
    words.forEach(function (w) {
      var mask = document.createElement("span");
      mask.className = "hero-mask-word";
      var inner = document.createElement("span");
      inner.className = "hero-mask-inner";
      inner.textContent = w;
      mask.appendChild(inner);
      h2.appendChild(mask);
    });
    return true;
  }

  function animateHeroPainPoints(hero) {
    var chips = hero.querySelectorAll(".hero-pain-points .pain-chip");
    if (!chips.length) return;

    gsap.set(chips, { opacity: 0, y: 16, scale: 0.92 });
    gsap.to(chips, {
      opacity: 1,
      y: 0,
      scale: 1,
      duration: 0.5,
      stagger: 0.04,
      delay: 0.12,
      ease: "power3.out",
    });
  }

  function initApp() {
    if (typeof gsap === "undefined" || typeof ScrollTrigger === "undefined") {
      return;
    }

    gsap.registerPlugin(ScrollTrigger);
    initLenis();

    var header = document.querySelector(".header_app");
    if (header) {
      ScrollTrigger.create({
        start: 1,
        end: 99999,
        onUpdate: function (self) {
          if (self.scroll() > 72) header.classList.add("header_app--scrolled");
          else header.classList.remove("header_app--scrolled");
        },
      });
    }

    var splitHero = document.querySelector('.main_hv[data-hero="split"]');
    var text1 = document.getElementById("text1");
    var heroBanner = document.querySelector(".main_hv .section_banner");

    if (splitHero && text1 && heroBanner) {
      wrapHeroWords(text1);
      splitHero.classList.add("is-hero-split");
      animateHeroPainPoints(splitHero);
      gsap.set(".hero-mask-inner", { yPercent: 112 });

      var extras = heroBanner.querySelectorAll(".p_info, .button_banner");
      var headerBits = document.querySelectorAll(
        ".header_app .logo_web, .header_app .nav_header, .header_app .cto_button"
      );
      var tl = gsap.timeline({ defaults: { ease: "power4.out" } });

      tl.from(headerBits, { y: -20, opacity: 0, duration: 0.45, stagger: 0.06, ease: "power3.out" }, 0);
      tl.from(
        heroBanner,
        { opacity: 0, y: 24, scale: 0.98, filter: "blur(8px)", duration: 0.5, ease: "power2.out" },
        0.04
      );
      tl.to(
        ".hero-mask-inner",
        { yPercent: 0, duration: 0.7, stagger: 0.04, ease: "power4.out" },
        0.12
      );
      if (extras.length) {
        tl.from(
          extras,
          { opacity: 0, y: 28, filter: "blur(6px)", duration: 0.65, stagger: 0.08, ease: "power3.out" },
          "-=0.42"
        );
        tl.call(function () {
          gsap.set(extras, { clearProps: "filter" });
        });
      }
      tl.call(function () {
        gsap.set(heroBanner, { clearProps: "filter" });
      });
    }

    gsap.utils.toArray("main section.site-animate").forEach(function (section) {
      gsap.from(section, {
        opacity: 0,
        y: 48,
        duration: 0.85,
        ease: "power3.out",
        scrollTrigger: { trigger: section, start: "top 88%", toggleActions: "play none none none" },
      });
    });

    var parallaxWrap = document.querySelector(".efecto_parallax .fondo_efecto_parallax img");
    if (parallaxWrap) {
      gsap.to(parallaxWrap, {
        yPercent: 14,
        ease: "none",
        scrollTrigger: {
          trigger: ".efecto_parallax",
          start: "top bottom",
          end: "bottom top",
          scrub: 0.65,
        },
      });
    }

    ScrollTrigger.refresh();
  }

  if (reduced) {
    window.addEventListener("diintec:app-ready", initApp);
    window.addEventListener("load", function () {
      window.dispatchEvent(new Event("diintec:app-ready"));
    });
    return;
  }

  window.addEventListener("diintec:app-ready", initApp);
  if (document.documentElement.classList.contains("is-ready")) {
    initApp();
  }
})();
