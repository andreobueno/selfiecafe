
<!DOCTYPE html>
<html lang="en" dir="ltr" xmlns:fb="http://ogp.me/ns/fb#">
<head>	
<title>Selfie Cafe</title>

	<script src="js/jquery-1.10.2.js"></script>
	<link rel="stylesheet" type="text/css" href="style.css">
	<meta charset="UTF-8">
	
	<meta name="description" content="Access the desktop camera and video using HTML, JavaScript, and Canvas.  The camera may be controlled using HTML5 and getUserMedia." />
	<link rel="stylesheet" type="text/css" href="/wp-content/themes/london/style.css" media="all">
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Source+Sans+Pro:400,700">
	<link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css">
	<!--[if IE]><meta http-equiv="imagetoolbar" content="no"><script src="//cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7/html5shiv.js"></script><![endif]-->

	<script>
		$(document).ready(function(){

			
			$("#tirarFoto").hide();
			$("#coverVideo").hide();
			$("#canvas").hide();

			$("#btn").click(function(){
				$("#coverVideo").hide();
				$("#tirarFoto").hide();
				$("#canvas").hide();

		  	});
		});
	</script>

</head>

<body>
<!-- content wrapper -->
<div class="main">
	<div class="center clear"><!-- main content column -->
		<main id="main"><!--CONTENT-->
			<div class="demo-wrapper">
				<p align="center"><img src="images/logo_SelfieCafe.png" height="100px" width="350px" /></p>	


				<!--<div id="promoNode"></div>	-->


					<!--
						Ideally these elements aren't created until it's confirmed that the 
						client supports video/camera, but for the sake of illustrating the 
						elements involved, they are created with markup (not JavaScript)
					-->
					<p align="center">
						<video id="video" width="640" height="480" autoplay></video>
						<button id="snap" class="tirarFoto_btn">Tirar Foto</button>
						<canvas id="canvas" width="640" height="480"></canvas>
					</p>

					<script>

						// Put event listeners into place
						window.addEventListener("DOMContentLoaded", function() {
							// Grab elements, create settings, etc.
							var canvas = document.getElementById("canvas"),
								context = canvas.getContext("2d"),
								video = document.getElementById("video"),
								videoObj = { "video": true },
								errBack = function(error) {
									console.log("Video capture error: ", error.code); 
								};

							// Put video listeners into place
							if(navigator.getUserMedia) { // Standard
								navigator.getUserMedia(videoObj, function(stream) {
									video.src = stream;
									video.play();
								}, errBack);
							} else if(navigator.webkitGetUserMedia) { // WebKit-prefixed
								navigator.webkitGetUserMedia(videoObj, function(stream){
									video.src = window.webkitURL.createObjectURL(stream);
									video.play();
								}, errBack);
							} else if(navigator.mozGetUserMedia) { // WebKit-prefixed
								navigator.mozGetUserMedia(videoObj, function(stream){
									video.src = window.URL.createObjectURL(stream);
									video.play();
								}, errBack);
							}

						// Trigger photo take
						document.getElementById("snap").addEventListener("click", function() {
							context.drawImage(video, 0, 0, 640, 480);


							$("#tirarFoto").show();
							$("#canvas").show();
						});
						}, false);

					</script>
					
			</div>

		</main>
	</div>
</div>

<div id="tirarFoto">
	Aguarde! 
	<br />
	<br />
	Em Julho você poderá ver todas as fotos e votar nas que mais gostar.
	<br />
	<br />
	<button type="button" id="btn" class="tirarFoto_btn">Voltar</button>
</div>

<div id="coverVideo">
	
</div>

</body>
</html>