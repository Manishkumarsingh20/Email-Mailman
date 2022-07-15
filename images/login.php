<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="../css1/login.css">
</head>

<body class="mt-5">
    <section class="Form my-4 mx-5">
        <div class="container">
            <div class="row no-gutters">
                <div class="col-lg-5 mt-3">
                    <img src="../img1/j.png" alt="" class="img-fluid">
                </div>
                <div class="col-lg-7 pt-5 px-5">
                    <h2 class="font-weight-bold py-2">Mailman</h2>
                    <h3>Login Into Your Account</h3>
                    <form class="">
                        <div class="form-row">
                            <div class="">
                                <label>Email</label>
                                <input type="email" class="form-control my-3" placeholder="Email-Address" id="remail1">
                            </div>

                        </div>

                        <div class="form-row">
                            <div class="">
                                <label>Password</label>
                                <input type="password" class="form-control my-3" placeholder="Enter Password" id="cp1">

                            </div>

                        </div>
                        <div class="form-row d-flex justify-content-between" >
                            <div>
                                <a class="" href="forgot.php">Forgot Password</a>
                            </div>
                            <div class="">
                                <button type="button" onclick="myvalidation()" class="btn btn-outline-primary">Login</button>
                            </div>

                        </div>
                    </form>

                    <p>Don't have an account yet?</p>
                    <button type="button"  class="btn btn-outline-warning mb-3"><a href="signup.php">Create One</a></button>
                </div>
                

                
            </div>
        </div>

    </section>


    <script src="../js1/login.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2"
        crossorigin="anonymous"></script>
<!-- Code injected by live-server -->
<script type="text/javascript">
	// <![CDATA[  <-- For SVG support
	if ('WebSocket' in window) {
		(function () {
			function refreshCSS() {
				var sheets = [].slice.call(document.getElementsByTagName("link"));
				var head = document.getElementsByTagName("head")[0];
				for (var i = 0; i < sheets.length; ++i) {
					var elem = sheets[i];
					var parent = elem.parentElement || head;
					parent.removeChild(elem);
					var rel = elem.rel;
					if (elem.href && typeof rel != "string" || rel.length == 0 || rel.toLowerCase() == "stylesheet") {
						var url = elem.href.replace(/(&|\?)_cacheOverride=\d+/, '');
						elem.href = url + (url.indexOf('?') >= 0 ? '&' : '?') + '_cacheOverride=' + (new Date().valueOf());
					}
					parent.appendChild(elem);
				}
			}
			var protocol = window.location.protocol === 'http:' ? 'ws://' : 'wss://';
			var address = protocol + window.location.host + window.location.pathname + '/ws';
			var socket = new WebSocket(address);
			socket.onmessage = function (msg) {
				if (msg.data == 'reload') window.location.reload();
				else if (msg.data == 'refreshcss') refreshCSS();
			};
			if (sessionStorage && !sessionStorage.getItem('IsThisFirstTime_Log_From_LiveServer')) {
				console.log('Live reload enabled.');
				sessionStorage.setItem('IsThisFirstTime_Log_From_LiveServer', true);
			}
		})();
	}
	else {
		console.error('Upgrade your browser. This Browser is NOT supported WebSocket for Live-Reloading.');
	}
	// ]]>
</script></body>

</html>