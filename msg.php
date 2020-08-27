<?php
session_start();
if (!isset($_SESSION['email'])) {
	header('Location: index.php');
}
?>
<!DOCTYPE html>
<html>
<head>
	
	<title>Popup</title>
	<link href="https://fonts.googleapis.com/css?family=Roboto+Slab" rel="stylesheet">
	<style type="text/css">
	
	.centered {
  position: fixed;
  top: 50%;
  left: 50%;
  margin-top: -150px;
  margin-left: -120px;
  font-family: 'Roboto Slab', serif;
  font-size: 40px;
}
#time
{
	font-size: 25px;
}
	</style>
	<script>
				function startTimer(duration, display) {
    var timer = duration, minutes, seconds;
    setInterval(function () {
        minutes = parseInt(timer / 60, 10)
        seconds = parseInt(timer % 60, 10);

        // minutes = minutes < 10 ? "0" + minutes : minutes;
        // seconds = seconds < 10 ? "0" + seconds : seconds;

        display.textContent = minutes + ":" + seconds;

        if (--timer < 0) {
            timer = duration;
        }
    }, 1000);
}

window.onload = function () {
    var fiveMinutes = 3,
        display = document.querySelector('#time');
    startTimer(fiveMinutes, display);
};
	</script>
</head>
<body>
	<center><div class="centered">
			<p id="io"> Take The</p>
			<p> Screenshot </p>
			<p> of Next Page</p>
		</div>
		<br><br>
		<p><span id="time"></span></p>
	</center>
</body>
<script>
	setTimeout(jump, 4000);
	function jump()
	{
		document.location.href = "ticket.php";
	}
	
</script>
</html>