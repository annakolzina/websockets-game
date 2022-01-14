<html>
<head>
    <title>
        WebGL Beginner's Guide - Setting WebGL context attributes
    </title>
    <style type="text/css">
        canvas {border: 2px dotted blue;}
    </style>
    <script>
        var gl = null;
        var c_width = 0;
        var c_height = 0;
        window.onkeydown = checkKey;
        function checkKey(ev)
        {
            switch(ev.keyCode)
            {
                case 49:
                {
                    // 1
                    gl.clearColor(0.3,0.7,0.2,1.0);
                    clear(gl);
                    break;
                }
                case 50:
                {
                    // 2
                    gl.clearColor(0.3,0.2,0.7,1.0);
                    clear(gl);
                    break;
                }
                case 51:
                {
                    // 3
                    var color = gl.getParameter(gl.COLOR_CLEAR_VALUE);
                    // Don't get confused with the following line. It
                    // basically rounds up the numbers to one decimal cipher
                    //just for visualization purposes
                    alert('clearColor = (' +
                        Math.round(color[0]*10)/10 +
                        ',' + Math.round(color[1]*10)/10+
                        ',' + Math.round(color[2]*10)/10+')');
                    window.focus();
                    break;
                }
            }
        }
        function getGLContext()
        {
            var canvas = document.getElementById("canvas-element-id");
            if (canvas == null)
            {
                alert("there is no canvas on this page");
                return;
            }
            var names = ["webgl", "experimental-webgl", "webkit-3d", "moz-webgl"];
            var ctx = null;
            for (var i = 0; i < names.length; ++i)
            {
                try
                {
                    ctx = canvas.getContext(names[i]);
                }
                catch(e) {}
                if (ctx)
                    break;
            }
            if (ctx == null)
            {
                alert("WebGL is not available");
            }
            else
            {
                return ctx;
            }
        }
        function clear(ctx)
        {
            ctx.clear(ctx.COLOR_BUFFER_BIT);
            ctx.viewport(0, 0, c_width, c_height);
        }
        function initWebGL()
        {
            gl = getGLContext();
        }
    </script>
</head>
<body onLoad="initWebGL()">
<canvas id="canvas-element-id" width="800" height="600">
    Your browser does not support the HTML5 canvas element.
</canvas>
</body>
</html>