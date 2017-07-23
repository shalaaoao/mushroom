/*
 * Adapted from Neil Wallis' Water Java simulation
 * http://www.neilwallis.com/projects/java/water/index.php
 *
 */

var ge1doot = ge1doot || {
        /*
         \|||/
         (o o)
         +~~~~ooO~~(_)~~~~~~~~+
         | Please             |
         | don't feed the     |
         | TROLLS !           |
         +~~~~~~~~~~~~~~Ooo~~~+
         |__|__|
         || ||
         ooO Ooo
         */

        screen: {
            elem:     null,
            callback: null,
            ctx:      null,
            width:    0,
            height:   0,
            left:     0,
            top:      0,
            init: function (id, callback, initRes) {
                this.elem = document.getElementById(id);
                this.callback = callback || null;
                if (this.elem.tagName == "CANVAS") this.ctx = this.elem.getContext("2d");
                window.addEventListener('resize', function () {
                    this.resize();
                }.bind(this), false);
                this.elem.onselectstart = function () { return false; }
                this.elem.ondrag        = function () { return false; }
                initRes && this.resize();
                return this;
            },
            resize: function () {
                var o = this.elem;
                this.width  = o.offsetWidth;
                this.height = o.offsetHeight;
                for (this.left = 0, this.top = 0; o != null; o = o.offsetParent) {
                    this.left += o.offsetLeft;
                    this.top  += o.offsetTop;
                }
                if (this.ctx) {
                    this.elem.width  = this.width;
                    this.elem.height = this.height;
                }
                this.callback && this.callback();
            },
            pointer: {
                screen:   null,
                elem:     null,
                callback: null,
                pos:   {x:0, y:0},
                mov:   {x:0, y:0},
                drag:  {x:0, y:0},
                start: {x:0, y:0},
                end:   {x:0, y:0},
                active: false,
                touch: false,
                down: function (e, touch) {
                    this.touch = touch;
                    e.preventDefault();
                    var pointer = touch ? e.touches[0] : e;
                    (!touch && document.setCapture) && document.setCapture();
                    this.pos.x = this.start.x = pointer.clientX - this.screen.left;
                    this.pos.y = this.start.y = pointer.clientY - this.screen.top;
                    this.active = true;
                    this.callback.down && this.callback.down();
                },
                up: function (e, touch) {
                    this.touch = touch;
                    e.preventDefault();
                    (!touch && document.releaseCapture) && document.releaseCapture();
                    this.end.x = this.drag.x;
                    this.end.y = this.drag.y;
                    this.active = false;
                    this.callback.up && this.callback.up();
                },
                move: function (e, touch) {
                    this.touch = touch;
                    e.preventDefault();
                    var pointer = touch ? e.touches[0] : e;
                    this.mov.x = pointer.clientX - this.screen.left;
                    this.mov.y = pointer.clientY - this.screen.top;
                    if (this.active) {
                        this.pos.x = this.mov.x;
                        this.pos.y = this.mov.y;
                        this.drag.x = this.end.x - (this.pos.x - this.start.x);
                        this.drag.y = this.end.y - (this.pos.y - this.start.y);
                        this.callback.move && this.callback.move();
                    }
                },
                init: function (callback) {
                    this.screen = ge1doot.screen;
                    this.elem = this.screen.elem;
                    this.callback = callback || {};
                    if ('ontouchstart' in window) {
                        // touch
                        this.elem.ontouchstart  = function (e) { this.down(e, true); }.bind(this);
                        this.elem.ontouchmove   = function (e) { this.move(e, true); }.bind(this);
                        this.elem.ontouchend    = function (e) { this.up(e, true);   }.bind(this);
                        this.elem.ontouchcancel = function (e) { this.up(e, true);   }.bind(this);
                    }
                    // mouse
                    document.addEventListener("mousedown", function (e) { this.down(e, false); }.bind(this), true);
                    document.addEventListener("mousemove", function (e) { this.move(e, false); }.bind(this), true);
                    document.addEventListener("mouseup",   function (e) { this.up  (e, false); }.bind(this), true);
                    return this;
                }
            },
            loadImages: function (container) {
                var elem = document.getElementById(container),
                    canvas = document.createElement('canvas'), ctx,
                    init = false, complete = false,
                    n = document.images.length;
                function arc(color, val, r) {
                    ctx.beginPath();
                    ctx.moveTo(50,50);
                    ctx.arc(50, 50, r, 0, val);
                    ctx.fillStyle = color;
                    ctx.fill();
                    ctx.closePath();
                }
                function load () {
                    if (complete) {
                        canvas.style.display = "none";
                        return;
                    }
                    var m = 0, timer = 32;
                    for(var i = 0; i < n; i++) m += (document.images[i].complete)?1:0;
                    if (m < n) {
                        if (!init) {
                            init = true;
                            canvas.style.width = canvas.style.height = "100px";
                            canvas.width = canvas.height = 100;
                            canvas.style.position = "fixed";
                            canvas.style.left = canvas.style.top = "50%";
                            canvas.style.marginTop = canvas.style.marginLeft = "-50px";
                            canvas.style.zIndex = 10000;
                            ctx = canvas.getContext("2d");
                            arc('rgb(64,64,64)', Math.PI*2, 48);
                            elem.appendChild(canvas);
                        }
                        arc('rgb(255,255,255)', (m / n) * 2 * Math.PI, 50);
                    } else {
                        if (init) {
                            arc('rgb(255,255,255)', 2 * Math.PI, 50);
                            timer = 300;
                        }
                        complete = true;
                    }
                    setTimeout(load, timer);
                }
                setTimeout(load, 32);
            }
        }
    }

window.addEventListener('load', function() {
    "use strict";
    // source image
    var img = new Image();
    img.src = document.getElementById("texture").getAttribute("data-image");
    var screen = ge1doot.screen.init("canvas", null, true),
        ctx = screen.ctx,
        width = screen.width,
        height = screen.height,
        hwidth = width / 2,
        hheight = height / 2,
        pointer = screen.pointer.init(),
        size = width * (height + 2) * 2,
        len = width * height,
        map = new Int16Array(size),
        oldind = width,
        newind = width * (height + 3);
    ctx.drawImage(img, 0, 0);
    // source texture
    var texture = ctx.getImageData(0, 0, width, height);
    var textureBuffer = new ArrayBuffer(texture.data.length);
    var textureBuffer8 = new Uint8ClampedArray(textureBuffer); // 8 bit clamped view
    var textureBuffer32 = new Uint32Array(textureBuffer); // 32 bits view
    // copy texture image
    for (var i = 0; i < textureBuffer8.length; i++) {
        textureBuffer8[i] = texture.data[i];
    }
    // ripple texture
    var ripple = ctx.getImageData(0, 0, width, height);
    var rippleBuffer = new ArrayBuffer(ripple.data.length);
    var rippleBuffer8 = new Uint8ClampedArray(rippleBuffer);
    var rippleBuffer32 = new Uint32Array(rippleBuffer);
    // create wave
    function wave(dx, dy, r) {
        for (var j = dy - r; j < dy + r; j++) {
            for (var k = dx - r; k < dx + r; k++) {
                if (j >= 0 && j < height && k >= 0 && k < width) {
                    map[oldind + (j * width) + k] += 512;
                }
            }
        }
    }

    function gloop() {
        wave(hwidth | 0, hheight | 0, 8);
    }

    function water() {
        var i, x, y, a, b, data, mapind;
        // toggle maps each frame
        i = oldind;
        oldind = newind;
        newind = i;
        mapind = oldind;
        for (i = 0; i < len; i++) {
            x = (i % width) | 0;
            y = (i / width) | 0;
            data = (
                    (
                        map[mapind - width] +
                        map[mapind + width] +
                        map[mapind - 1] +
                        map[mapind + 1]
                    ) >> 1
                ) - map[newind + i];
            data -= data >> 6;
            mapind++;
            if (x !== 0) map[newind + i] = data;
            data = 1024 - data;
            // offsets
            a = (((x - hwidth) * data / 1024) + hwidth) | 0;
            b = (((y - hheight) * data / 1024) + hheight) | 0;
            // bounds check
            if (a >= width) a = width - 1;
            else if (a < 0) a = 0;
            if (b >= height) b = height - 1;
            else if (b < 0) b = 0;
            // 32 bits pixel copy
            rippleBuffer32[i] = textureBuffer32[a + (b * width)];
        }
        ripple.data.set(rippleBuffer8);
    }
    // main loop
    function run() {
        requestAnimationFrame(run);
        water();
        ctx.putImageData(ripple, 0, 0);
        // create waves
        if (pointer.active) {
            wave(pointer.pos.x | 0, pointer.pos.y | 0, 3);
        }
    }
    // start
    requestAnimationFrame(run);
    gloop();
    setInterval(gloop, 4000);
});



