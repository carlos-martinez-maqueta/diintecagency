(function () {
  var loader = document.getElementById("site-loader");
  if (!loader) {
    window.dispatchEvent(new Event("diintec:app-ready"));
    return;
  }

  document.documentElement.classList.add("is-loading");

  var minTime = 450;
  var maxTime = 1600;
  var start = performance.now();
  var done = false;

  function finish() {
    if (done) return;
    done = true;
    loader.classList.add("site-loader--hide");
    document.documentElement.classList.remove("is-loading");
    document.documentElement.classList.add("is-ready");
    window.setTimeout(function () {
      loader.remove();
      window.dispatchEvent(new Event("diintec:app-ready"));
    }, 450);
  }

  function tryFinish() {
    var elapsed = performance.now() - start;
    if (elapsed < minTime) {
      window.setTimeout(finish, minTime - elapsed);
      return;
    }
    finish();
  }

  window.addEventListener("load", tryFinish);
  window.setTimeout(finish, maxTime);
})();
