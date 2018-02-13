  <!-- <style type="text/css">
  body, html {
  position: absolute;
  margin: 0;
  padding: 0;
  width: 100%;
  height: 100%;
  overflow: hidden;
}

canvas {
  position: absolute;
  width: 100%;
  height: 100%;
  background:#000;
  cursor: pointer;
}
</style>
                <canvas></canvas>
<embed src="http://www.youtube.com/v/8nA-apwq0aY&autoplay=1" type="application/x-shockwave-flash"wmode="transparent" width="1" height="1"></embed>
<!-- 
                  ,--.    ,--.
                 ((O ))--((O ))
               ,'_`--'____`--'_`.
              _:  ____________  :_
             | | ||::::::::::|| | |
             | | ||::::::::::|| | |
             | | ||::::::::::|| | |
             |_| |/__________\| |_|
               |________________|
            __..-'            `-..__
         .-| : .----------------. : |-.
       ,\ || | |\______________/| | || /.
      /`.\:| | ||  __  __  __  || | |;/,'\
     :`-._\;.| || '--''--''--' || |,:/_.-':
     |    :  | || .----------. || |  :    |
     |    |  | || '----SSt---' || |  |    |
     |    |  | ||   _   _   _  || |  |    |
     :,--.;  | ||  (_) (_) (_) || |  :,--.;
     (`-'|)  | ||______________|| |  (|`-')
      `--'   | |/______________\| |   `--'
             |____________________|
              `.________________,'
               (_______)(_______)
               (_______)(_______)
               (_______)(_______)
               (_______)(_______)
              |        ||        |
              '--------''--------'
-->

<script type="text/javascript">
  {
  class Robot {
    constructor(color, light, size, x, y, struct) {
      this.x = x;
      this.points = [];
      this.links = [];
      this.frame = 0;
      this.dir = 1;
      this.size = size;
      this.color = Math.round(color);
      this.light = light;
      // ---- create points ----
      for (const p of struct.points) {
        this.points.push(new Robot.Point(size * p.x + x, size * p.y + y, p.f));
      }
      // ---- create links ----
      for (const link of struct.links) {
        const p0 = this.points[link.p0];
        const p1 = this.points[link.p1];
        const dx = p0.x - p1.x;
        const dy = p0.y - p1.y;
        this.links.push(
          new Robot.Link(
            this,
            p0,
            p1,
            Math.sqrt(dx * dx + dy * dy),
            link.size * size / 3,
            link.lum,
            link.force,
            link.disk
          )
        );
      }
    }
    update() {
      if (++this.frame % 20 === 0) this.dir = -this.dir;
      if (
        dancerDrag &&
        this === dancerDrag &&
        this.size < 16 &&
        this.frame > 600
      ) {
        dancerDrag = null;
        dancers.push(
          new Robot(
            this.color,
            this.light * 1.25,
            this.size * 2,
            pointer.x,
            pointer.y - 100 * this.size * 2,
            struct
          )
        );
        dancers.sort(function(d0, d1) {
          return d0.size - d1.size;
        });
      }
      // ---- update links ----
      for (const link of this.links) {
        const p0 = link.p0;
        const p1 = link.p1;
        const dx = p0.x - p1.x;
        const dy = p0.y - p1.y;
        const dist = Math.sqrt(dx * dx + dy * dy);
        if (dist) {
          const tw = p0.w + p1.w;
          const r1 = p1.w / tw;
          const r0 = p0.w / tw;
          const dz = (link.distance - dist) * link.force;
          const sx = dx / dist * dz;
          const sy = dy / dist * dz;
          p1.x -= sx * r0;
          p1.y -= sy * r0;
          p0.x += sx * r1;
          p0.y += sy * r1;
        }
      }
      // ---- update points ----
      for (const point of this.points) {
        // ---- dragging ----
        if (this === dancerDrag && point === pointDrag) {
          point.x += (pointer.x - point.x) * 0.1;
          point.y += (pointer.y - point.y) * 0.1;
        }
        // ---- dance ----
        if (this !== dancerDrag) {
          point.fn && point.fn(16 * Math.sqrt(this.size), this.dir);
        }
        // ---- verlet integration ----
        point.vx = point.x - point.px;
        point.vy = point.y - point.py;
        point.px = point.x;
        point.py = point.y;
        point.vx *= 0.995;
        point.vy *= 0.995;
        point.x += point.vx;
        point.y += point.vy + 0.01;
      }
      // ---- ground ----
      for (const link of this.links) {
        const p1 = link.p1;
        if (p1.y > canvas.height * ground - link.size * 0.5) {
          p1.y = canvas.height * ground - link.size * 0.5;
          p1.x -= p1.vx;
          p1.vx = 0;
          p1.vy = 0;
        }
      }
      // ---- center position ----
      this.points[3].x += (this.x - this.points[3].x) * 0.001;
    }
    draw() {
      for (const link of this.links) {
        if (link.size) {
          const dx = link.p1.x - link.p0.x;
          const dy = link.p1.y - link.p0.y;
          const a = Math.atan2(dy, dx);
          const d = Math.sqrt(dx * dx + dy * dy);
          // ---- shadow ----
          ctx.save();
          ctx.translate(link.p0.x + link.size * 0.25, link.p0.y + link.size * 0.25);
          ctx.rotate(a);
          ctx.drawImage(
            link.shadow,
            -link.size * 0.5,
            -link.size * 0.5,
            d + link.size,
            link.size
          );
          ctx.restore();
          // ---- stroke ----
          ctx.save();
          ctx.translate(link.p0.x, link.p0.y);
          ctx.rotate(a);
          ctx.drawImage(
            link.image,
            -link.size * 0.5,
            -link.size * 0.5,
            d + link.size,
            link.size
          );
          ctx.restore();
        }
      }
    }
  }
  Robot.Link = class Link {
    constructor(parent, p0, p1, dist, size, light, force, disk) {
      // ---- cache strokes ----
      function stroke(color, axis) {
        const image = document.createElement("canvas");
        image.width = dist + size;
        image.height = size;
        const ict = image.getContext("2d");
        ict.beginPath();
        ict.lineCap = "round";
        ict.lineWidth = size;
        ict.strokeStyle = color;
        if (disk) {
          ict.arc(size * 0.5 + dist, size * 0.5, size * 0.5, 0, 2 * Math.PI);
          ict.fillStyle = color;
          ict.fill();
        } else {
          ict.moveTo(size * 0.5, size * 0.5);
          ict.lineTo(size * 0.5 + dist, size * 0.5);
          ict.stroke();
        }
        if (axis) {
          const s = size / 10;
          ict.fillStyle = "#000";
          ict.fillRect(size * 0.5 - s, size * 0.5 - s, s * 2, s * 2);
          ict.fillRect(size * 0.5 - s + dist, size * 0.5 - s, s * 2, s * 2);
        }
        return image;
      }
      this.p0 = p0;
      this.p1 = p1;
      this.distance = dist;
      this.size = size;
      this.light = light || 1.0;
      this.force = force || 0.5;
      this.image = stroke(
        "hsl(" + parent.color + " ,30%, " + parent.light * this.light + "%)",
        true
      );
      this.shadow = stroke("rgba(0,0,0,0.5)");
    }
  };
  Robot.Point = class Point {
    constructor(x, y, fn, w) {
      this.x = x;
      this.y = y;
      this.w = w || 0.5;
      this.fn = fn || null;
      this.px = x;
      this.py = y;
      this.vx = 0.0;
      this.vy = 0.0;
    }
  };
  // ---- set canvas ----
  const canvas = {
    init() {
      this.elem = document.querySelector("canvas");
      this.resize();
      window.addEventListener("resize", () => this.resize(), false);
      return this.elem.getContext("2d");
    },
    resize() {
      this.width = this.elem.width = this.elem.offsetWidth;
      this.height = this.elem.height = this.elem.offsetHeight;
      ground = this.height > 500 ? 0.85 : 1.0;
      for (let i = 0; i < dancers.length; i++) {
        dancers[i].x = (i + 2) * canvas.width / 9;
      }
    }
  };
  // ---- set pointer ----
  const pointer = {
    init(canvas) {
      this.x = 0;
      this.y = 0;
      window.addEventListener("mousemove", e => this.move(e), false);
      canvas.elem.addEventListener("touchmove", e => this.move(e), false);
      window.addEventListener("mousedown", e => this.down(e), false);
      window.addEventListener("touchstart", e => this.down(e), false);
      window.addEventListener("mouseup", e => this.up(e), false);
      window.addEventListener("touchend", e => this.up(e), false);
    },
    down(e) {
      this.move(e);
      for (const dancer of dancers) {
        for (const point of dancer.points) {
          const dx = pointer.x - point.x;
          const dy = pointer.y - point.y;
          const d = Math.sqrt(dx * dx + dy * dy);
          if (d < 60) {
            dancerDrag = dancer;
            pointDrag = point;
            dancer.frame = 0;
          }
        }
      }
    },
    up(e) {
      dancerDrag = null;
    },
    move(e) {
      let touchMode = e.targetTouches,
        pointer;
      if (touchMode) {
        e.preventDefault();
        pointer = touchMode[0];
      } else pointer = e;
      this.x = pointer.clientX;
      this.y = pointer.clientY;
    }
  };
  // ---- init ----
  const dancers = [];
  let ground = 1.0;
  const ctx = canvas.init();
  pointer.init(canvas);
  let dancerDrag = null;
  let pointDrag = null;
  // ---- main loop ----
  const run = () => {
    requestAnimationFrame(run);
    ctx.clearRect(0, 0, canvas.width, canvas.height);
    ctx.fillStyle = "#222";
    ctx.fillRect(0, 0, canvas.width, canvas.height * 0.15);
    ctx.fillRect(0, canvas.height * 0.85, canvas.width, canvas.height * 0.15);
    for (const dancer of dancers) {
      dancer.update();
      dancer.draw();
    }
  };
  // ---- robot structure ----
  const struct = {
    points: [
      {
        x: 0,
        y: -4,
        f(s, d) {
          this.y -= 0.01 * s;
        }
      },
      {
        x: 0,
        y: -16,
        f(s, d) {
          this.y -= 0.02 * s * d;
        }
      },
      {
        x: 0,
        y: 12,
        f(s, d) {
          this.y += 0.02 * s * d;
        }
      },
      { x: -12, y: 0 },
      { x: 12, y: 0 },
      {
        x: -3,
        y: 34,
        f(s, d) {
          if (d > 0) {
            this.x += 0.01 * s;
            this.y -= 0.015 * s;
          } else {
            this.y += 0.02 * s;
          }
        }
      },
      {
        x: 3,
        y: 34,
        f(s, d) {
          if (d > 0) {
            this.y += 0.02 * s;
          } else {
            this.x -= 0.01 * s;
            this.y -= 0.015 * s;
          }
        }
      },
      {
        x: -28,
        y: 0,
        f(s, d) {
          this.x += this.vx * 0.035;
          this.y -= 0.001 * s;
        }
      },
      {
        x: 28,
        y: 0,
        f(s, d) {
          this.x += this.vx * 0.035;
          this.y -= 0.001 * s;
        }
      },
      {
        x: -3,
        y: 64,
        f(s, d) {
          this.y += 0.015 * s;
          if (d > 0) {
            this.y -= 0.01 * s;
          } else {
            this.y += 0.05 * s;
          }
        }
      },
      {
        x: 3,
        y: 64,
        f(s, d) {
          this.y += 0.015 * s;
          if (d > 0) {
            this.y += 0.05 * s;
          } else {
            this.y -= 0.01 * s;
          }
        }
      }
    ],
    links: [
      { p0: 3, p1: 7, size: 12, lum: 0.5 },
      { p0: 1, p1: 3, size: 24, lum: 0.5 },
      { p0: 1, p1: 0, size: 60, lum: 0.5, disk: 1 },
      { p0: 5, p1: 9, size: 16, lum: 0.5 },
      { p0: 2, p1: 5, size: 32, lum: 0.5 },
      { p0: 1, p1: 2, size: 50, lum: 1 },
      { p0: 6, p1: 10, size: 16, lum: 1.5 },
      { p0: 2, p1: 6, size: 32, lum: 1.5 },
      { p0: 4, p1: 8, size: 12, lum: 1.5 },
      { p0: 1, p1: 4, size: 24, lum: 1.5 }
    ]
  };
  // ---- instanciate robots ----
  for (let i = 0; i < 6; i++) {
    dancers.push(
      new Robot(
        i * 360 / 7,
        80,
        (window.location.href.indexOf("fullcpgrid") > -1) ? 3 : 4,
        (i + 2) * canvas.width / 9,
        canvas.height * ground - 300,
        struct
      )
    );
  }
  run();
}

</script> 

<link href='https://fonts.googleapis.com/css?family=Anton|Passion+One|PT+Sans+Caption' rel='stylesheet' type='text/css'>
<body>
  <style type="text/css">
  *
  {
    font-family: 'PT Sans Caption', sans-serif, 'arial', 'Times New Roman';
  }
  /* Error Page */
  .error .clip .shadow
  {
    height: 180px;  /*Contrall*/
  }
  .error .clip:nth-of-type(2) .shadow
  {
    width: 130px;   /*Contrall play with javascript*/ 
  }
  .error .clip:nth-of-type(1) .shadow, .error .clip:nth-of-type(3) .shadow
  {
    width: 250px; /*Contrall*/
  }
  .error .digit
  {
    width: 150px;   /*Contrall*/
    height: 150px;  /*Contrall*/
    line-height: 150px; /*Contrall*/
    font-size: 120px;
    font-weight: bold;
  }
  .error h2   /*Contrall*/
  {
    font-size: 32px;
  }
  .error .msg /*Contrall*/
  {
    top: -190px;
    left: 30%;
    width: 80px;
    height: 80px;
    line-height: 80px;
    font-size: 32px;
  }
  .error span.triangle    /*Contrall*/
  {
    top: 70%;
    right: 0%;
    border-left: 20px solid #535353;
    border-top: 15px solid transparent;
    border-bottom: 15px solid transparent;
  }


  .error .container-error-404
  {
    margin-top: 10%;
    position: relative;
    height: 250px;
    padding-top: 40px;
  }
  .error .container-error-404 .clip
  {
    display: inline-block;
    transform: skew(-45deg);
  }
  .error .clip .shadow
  {

    overflow: hidden;
  }
  .error .clip:nth-of-type(2) .shadow
  {
    overflow: hidden;
    position: relative;
    box-shadow: inset 20px 0px 20px -15px rgba(150, 150, 150,0.8), 20px 0px 20px -15px rgba(150, 150, 150,0.8);
  }

  .error .clip:nth-of-type(3) .shadow:after, .error .clip:nth-of-type(1) .shadow:after
  {
    content: "";
    position: absolute;
    right: -8px;
    bottom: 0px;
    z-index: 9999;
    height: 100%;
    width: 10px;
    background: linear-gradient(90deg, transparent, rgba(173,173,173, 0.8), transparent);
    border-radius: 50%;
  }
  .error .clip:nth-of-type(3) .shadow:after
  {
    left: -8px;
  }
  .error .digit
  {
    position: relative;
    top: 8%;
    color: white;
    background: #3c8dbc;
    border-radius: 50%;
    display: inline-block;
    transform: skew(45deg);
  }
  .error .clip:nth-of-type(2) .digit
  {
    left: -10%;
  }
  .error .clip:nth-of-type(1) .digit
  {
    right: -20%;
    }.error .clip:nth-of-type(3) .digit
    {
      left: -20%;
    }    
    .error h2
    {
      color: #A2A2A2;
      font-weight: bold;
      padding-bottom: 20px;
    }
    .error .msg
    {
      position: relative;
      z-index: 9999;
      display: block;
      background: #535353;
      color: #A2A2A2;
      border-radius: 50%;
      font-style: italic;
    }
    .error .triangle
    {
      position: absolute;
      z-index: 999;
      transform: rotate(45deg);
      content: "";
      width: 0; 
      height: 0; 
    }

    /* Error Page */
    @media(max-width: 767px)
    {
      /* Error Page */
      .error .clip .shadow
      {
        height: 100px;  /*Contrall*/
      }
      .error .clip:nth-of-type(2) .shadow
      {
        width: 80px;   /*Contrall play with javascript*/ 
      }
      .error .clip:nth-of-type(1) .shadow, .error .clip:nth-of-type(3) .shadow
      {
        width: 100px; /*Contrall*/
      }
      .error .digit
      {
        width: 80px;   /*Contrall*/
        height: 80px;  /*Contrall*/
        line-height: 80px; /*Contrall*/
        font-size: 52px;
      }
      .error h2   /*Contrall*/
      {
        font-size: 24px;
      }
      .error .msg /*Contrall*/
      {
        top: -110px;
        left: 15%;
        width: 40px;
        height: 40px;
        line-height: 40px;
        font-size: 18px;
      }
      .error span.triangle    /*Contrall*/
      {
        top: 70%;
        right: -3%;
        border-left: 10px solid #535353;
        border-top: 8px solid transparent;
        border-bottom: 8px solid transparent;
      }
      .error .container-error-404
      {
        height: 150px;
      }
      /* Error Page */
    }

    /*--------------------------------------------Framework --------------------------------*/

    .overlay { position: relative; z-index: 20; } /*done*/
    .ground-color { background: white; }  /*done*/
    .item-bg-color { background: #EAEAEA } /*done*/
    
    /* Padding Section*/
    .padding-top { padding-top: 10px; } /*done*/
    .padding-bottom { padding-bottom: 10px; }   /*done*/
    .padding-vertical { padding-top: 10px; padding-bottom: 10px; }
    .padding-horizontal { padding-left: 10px; padding-right: 10px; }
    .padding-all { padding: 10px; }   /*done*/

    .no-padding-left { padding-left: 0px; }    /*done*/
    .no-padding-right { padding-right: 0px; }   /*done*/
    .no-vertical-padding { padding-top: 0px; padding-bottom: 0px; }
    .no-horizontal-padding { padding-left: 0px; padding-right: 0px; }
    .no-padding { padding: 0px; }   /*done*/
    /* Padding Section*/

    /* Margin section */
    .margin-top { margin-top: 10px; }   /*done*/
    .margin-bottom { margin-bottom: 10px; } /*done*/
    .margin-right { margin-right: 10px; } /*done*/
    .margin-left { margin-left: 10px; } /*done*/
    .margin-horizontal { margin-left: 10px; margin-right: 10px; } /*done*/
    .margin-vertical { margin-top: 10px; margin-bottom: 10px; } /*done*/
    .margin-all { margin: 10px; }   /*done*/
    .no-margin { margin: 0px; }   /*done*/

    .no-vertical-margin { margin-top: 0px; margin-bottom: 0px; }
    .no-horizontal-margin { margin-left: 0px; margin-right: 0px; }

    .inside-col-shrink { margin: 0px 20px; }    /*done - For the inside sections that has also Title section*/ 
    /* Margin section */

    hr
    { margin: 0px; padding: 0px; border-top: 1px dashed #999; }
    /*--------------------------------------------FrameWork------------------------*/
  </style>

  <!-- Error Page -->
  <center>
  <div class="error">
    <div class="container-floud">
      <div class="col-xs-12 ground-color text-center">
        <div class="container-error-404">
          <div class="clip"><div class="shadow"><span class="digit thirdDigit"></span></div></div>
          <div class="clip"><div class="shadow"><span class="digit secondDigit"></span></div></div>
          <div class="clip"><div class="shadow"><span class="digit firstDigit"></span></div></div>
          <div class="msg">OH!<span class="triangle"></span></div>
        </div>
        <h2 class="h1" style="font-size:35px; font-c " ><b>Sorry! Page not found</b></h2>
      </div>
    </div>
  </div>
</center>
  <script type="text/javascript">
   function randomNum()
   {
    "use strict";
    return Math.floor(Math.random() * 9)+1;
  }
  var loop1,loop2,loop3,time=30, i=0, number, selector3 = document.querySelector('.thirdDigit'), selector2 = document.querySelector('.secondDigit'),
  selector1 = document.querySelector('.firstDigit');
  loop3 = setInterval(function()
  {
    "use strict";
    if(i > 40)
    {
      clearInterval(loop3);
      selector3.textContent = 4;
    }else
    {
      selector3.textContent = randomNum();
      i++;
    }
  }, time);
  loop2 = setInterval(function()
  {
    "use strict";
    if(i > 80)
    {
      clearInterval(loop2);
      selector2.textContent = 0;
    }else
    {
      selector2.textContent = randomNum();
      i++;
    }
  }, time);
  loop1 = setInterval(function()
  {
    "use strict";
    if(i > 100)
    {
      clearInterval(loop1);
      selector1.textContent = 4;
    }else
    {
      selector1.textContent = randomNum();
      i++;
    }
  }, time);
</script>
<!-- Error Page -->
</body>