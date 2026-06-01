/* WebColors - client-side color generator (no server logic) */
(function () {
  "use strict";

  var state = {
    n: 444, size: 30, sections: 6,
    sort1: "l", sort2: "asc",
    black: true, square: false, wide: false, noSpacer: false, disco: false,
    palette: "" // "", "websafe", "crayola"
  };

  var cgen, wrap;

  function ri(a, b) { return Math.floor(Math.random() * (b - a + 1)) + a; }
  function clamp(v, min, max) { return Math.min(max, Math.max(min, v)); }

  function rgbToHsl(r, g, b) {
    r /= 255; g /= 255; b /= 255;
    var max = Math.max(r, g, b), min = Math.min(r, g, b);
    var h = 0, s = 0, l = (max + min) / 2;
    if (max !== min) {
      var d = max - min;
      s = l > 0.5 ? d / (2 - max - min) : d / (max + min);
      switch (max) {
        case r: h = (g - b) / d + (g < b ? 6 : 0); break;
        case g: h = (b - r) / d + 2; break;
        default: h = (r - g) / d + 4; break;
      }
      h /= 6;
    }
    return { h: h, s: s, l: l };
  }

  function randHex() {
    return ("000000" + Math.floor(Math.random() * 0x1000000).toString(16).toUpperCase()).slice(-6);
  }

  function buildHexList() {
    var out = [], seen = Object.create(null), k, hx;
    if (state.palette) {
      var src = state.palette === "websafe" ? WEBSAFE : CRAYOLA;
      for (k in src) {
        hx = String(src[k]).toUpperCase();
        if (hx.length === 6 && !seen[hx]) { seen[hx] = 1; out.push(hx); }
      }
      return out;
    }
    var target = state.n, guard = 0, cap = target * 4 + 2000;
    while (out.length < target && guard++ < cap) {
      hx = randHex();
      if (!seen[hx]) { seen[hx] = 1; out.push(hx); }
    }
    return out;
  }

  function toColorObjs(list) {
    return list.map(function (x) {
      var r = parseInt(x.slice(0, 2), 16), g = parseInt(x.slice(2, 4), 16), b = parseInt(x.slice(4, 6), 16);
      var hsl = rgbToHsl(r, g, b);
      return { x: x, h: hsl.h, s: hsl.s, l: hsl.l, sl: hsl.s * hsl.l * 1000 };
    });
  }

  function cmp(key, dir) {
    var sign = dir === "asc" ? 1 : -1;
    return function (a, b) {
      if (key === "x") { return a.x < b.x ? -sign : a.x > b.x ? sign : 0; }
      return (a[key] - b[key]) * sign;
    };
  }

  function applyBackground(colors) {
    var body = document.body;
    if (state.disco) {
      body.style.cssText = "background: linear-gradient(to right, red,orange,yellow,green,blue,indigo,violet);";
      return;
    }
    if (state.black) {
      var txt = "#dddddd";
      if (colors && colors.length) {
        var byL = colors.slice().sort(function (a, b) { return a.l - b.l; });
        var idx = clamp(Math.round(byL.length * 0.09) + 2, 0, byL.length - 1);
        txt = "#" + byL[idx].x;
      }
      body.style.cssText = "background:#000;color:" + txt + ";";
    } else {
      body.style.cssText = "";
    }
  }

  function render() {
    var colors = toColorObjs(buildHexList());
    var total = colors.length;
    colors.sort(function (a, b) { return b.h - a.h; });
    var sec = clamp(state.sections, 1, Math.max(1, total));
    var per = Math.max(1, Math.ceil(total / sec));
    var size = state.size;
    var radius = state.square ? "" : "border-radius:50%;";
    var spacerH = state.noSpacer ? 0 : 10;
    var parts = [];
    for (var i = 0; i < total; i += per) {
      var chunk = colors.slice(i, i + per).sort(cmp(state.sort1, state.sort2));
      for (var j = 0; j < chunk.length; j++) {
        var c = chunk[j];
        var hue = Math.round(360 * c.h), sat = Math.min(100, Math.round(100 * c.s)), lit = Math.round(100 * c.l);
        parts.push('<div class="swatch copy-target cursor-pointer" data-clipboard-text="#' + c.x +
          '" title="HEX: #' + c.x + ', HSL: (' + hue + '°, ' + sat + '%, ' + lit + '%)"' +
          ' style="background:#' + c.x + ';width:' + size + 'px;height:' + size + 'px;' + radius + '"></div>');
      }
      parts.push('<div class="spacer" style="height:' + spacerH + 'px;">&nbsp;</div>');
    }
    wrap.style.width = state.wide ? ((state.n / sec) * (size * 1.1)) + "px" : "98%";
    wrap.innerHTML = parts.join("");
    applyBackground(colors);
  }

  function renderPaletteGrid(src) {
    var rows = Object.keys(src).map(function (name) {
      var hex = String(src[name]).toLowerCase();
      var r = parseInt(hex.slice(0, 2), 16), g = parseInt(hex.slice(2, 4), 16), b = parseInt(hex.slice(4, 6), 16);
      var hsl = rgbToHsl(r, g, b);
      return { name: name, hex: hex, hue: Math.round(360 * hsl.h), sat: Math.min(100, Math.round(100 * hsl.s)), lit: Math.round(100 * hsl.l) };
    }).sort(function (a, b) { return a.name < b.name ? -1 : a.name > b.name ? 1 : 0; });
    return rows.map(function (c) {
      var txt = c.lit < 50 ? "#fff" : "#000";
      var info = c.name + ": #" + c.hex + ", hsl(" + c.hue + ", " + c.sat + "%, " + c.lit + "%)";
      return '<div class="wsc-color copy-target cursor-pointer" data-clipboard-text="#' + c.hex +
        '" title="' + info + '" style="background:#' + c.hex + ";color:" + txt + '"><b>' + c.name + "</b>: #" + c.hex + "</div>";
    }).join("");
  }

  function syncControls() {
    cgen.querySelector('[name="n"]').value = state.n;
    cgen.querySelector('[name="size"]').value = state.size;
    cgen.querySelector('[name="sections"]').value = state.sections;
    var s1 = cgen.querySelector('[name="sort1"][value="' + state.sort1 + '"]'); if (s1) s1.checked = true;
    byId("o-black").checked = state.black;
    byId("o-square").checked = state.square;
    byId("o-wide").checked = state.wide;
    byId("o-spacer").checked = state.noSpacer;
    byId("o-disco").checked = state.disco;
    byId("sortDir").innerHTML = state.sort2 === "asc" ? "Ascending &#8593;" : "Descending &#8595;";
    Array.prototype.forEach.call(document.querySelectorAll(".pbtn[data-pal]"), function (b) {
      var on = b.getAttribute("data-pal") === state.palette;
      b.classList.toggle("pbtn-on", on);
      b.textContent = on ? "Using ✓" : "Restrict colors";
    });
  }

  function byId(id) { return document.getElementById(id); }

  function step(name, delta) {
    var el = cgen.querySelector('[name="' + name + '"]');
    var min = parseInt(el.min, 10), max = parseInt(el.max, 10);
    if (isNaN(min)) min = 0; if (isNaN(max)) max = 999999;
    var v = clamp((parseInt(el.value, 10) || min) + delta, min, max);
    el.value = v; state[name] = v; render();
  }

  function randomize() {
    state.n = ri(100, 9999); state.size = ri(8, 60); state.sections = ri(1, 99);
    state.sort1 = ["h", "s", "l", "x", "sl"][ri(0, 4)];
    state.sort2 = ["asc", "desc"][ri(0, 1)];
    state.black = Math.random() < 0.5; state.square = Math.random() < 0.5; state.wide = Math.random() < 0.5;
    state.noSpacer = Math.random() < 0.5; state.disco = Math.random() < 0.5;
    state.palette = "";
    syncControls(); render();
  }

  // modals
  window.wcModal = function (n) { var m = byId("m-" + n); if (m) { m.classList.add("open"); document.documentElement.style.overflow = "hidden"; } };
  window.wcClose = function () { var m = document.querySelector(".wc-modal.open"); if (m) { m.classList.remove("open"); document.documentElement.style.overflow = ""; } };

  // copy-to-clipboard toast
  var toastEl;
  function toast(msg) {
    if (!toastEl) { toastEl = document.createElement("div"); toastEl.className = "wc-toast"; document.body.appendChild(toastEl); }
    toastEl.textContent = msg;
    toastEl.classList.add("show");
    clearTimeout(toast._t);
    toast._t = setTimeout(function () { toastEl.classList.remove("show"); }, 1100);
  }

  function wire() {
    cgen.querySelector('[name="n"]').addEventListener("change", function () { state.n = clamp(parseInt(this.value, 10) || 444, 100, 9999); this.value = state.n; render(); });
    cgen.querySelector('[name="size"]').addEventListener("change", function () { state.size = clamp(parseInt(this.value, 10) || 30, 1, 99); this.value = state.size; render(); });
    cgen.querySelector('[name="sections"]').addEventListener("change", function () { state.sections = clamp(parseInt(this.value, 10) || 6, 1, 99); this.value = state.sections; render(); });

    Array.prototype.forEach.call(cgen.querySelectorAll('[name="sort1"]'), function (r) {
      r.addEventListener("change", function () { state.sort1 = this.value; render(); });
    });
    byId("sortDir").addEventListener("click", function () { state.sort2 = state.sort2 === "asc" ? "desc" : "asc"; syncControls(); render(); });

    var toggles = { "o-black": "black", "o-square": "square", "o-wide": "wide", "o-spacer": "noSpacer", "o-disco": "disco" };
    Object.keys(toggles).forEach(function (id) {
      byId(id).addEventListener("change", function () { state[toggles[id]] = this.checked; render(); });
    });

    Array.prototype.forEach.call(document.querySelectorAll("[data-step]"), function (b) {
      var parts = b.getAttribute("data-step").split(":");
      b.addEventListener("click", function () { step(parts[0], parseInt(parts[1], 10)); });
    });

    Array.prototype.forEach.call(document.querySelectorAll("[data-view]"), function (b) {
      b.addEventListener("click", function () { window.wcModal(b.getAttribute("data-view")); });
    });
    Array.prototype.forEach.call(document.querySelectorAll(".pbtn[data-pal]"), function (b) {
      b.addEventListener("click", function () {
        var p = b.getAttribute("data-pal");
        state.palette = state.palette === p ? "" : p;
        syncControls(); render();
      });
    });

    byId("randBtn").addEventListener("click", randomize);

    Array.prototype.forEach.call(document.querySelectorAll(".wc-modal"), function (m) {
      m.addEventListener("click", function (e) { if (e.target === m) window.wcClose(); });
    });
    document.addEventListener("keydown", function (e) { if (e.key === "Escape") window.wcClose(); });

    document.addEventListener("click", function (e) {
      var t = e.target.closest && e.target.closest("[data-clipboard-text]");
      if (!t) return;
      var hex = t.getAttribute("data-clipboard-text");
      if (navigator.clipboard && navigator.clipboard.writeText) { navigator.clipboard.writeText(hex); }
      toast(hex + " copied");
    });
  }

  document.addEventListener("DOMContentLoaded", function () {
    cgen = byId("cgen");
    wrap = byId("color-wrappage");
    byId("m-websafe").querySelector(".wc-grid").innerHTML = renderPaletteGrid(WEBSAFE);
    byId("m-crayola").querySelector(".wc-grid").innerHTML = renderPaletteGrid(CRAYOLA);
    syncControls();
    wire();
    render();
  });
})();
