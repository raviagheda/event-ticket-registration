<html>
<head>
	<title>check entries</title>
	<style type="text/css">
		.number
		{
			font-family: monospace;
			font-size: 250px;
		}
	</style>
</head>
<body>
  <!-- Select the text in the preview and type in your own -->
  <center><div>
<?php
include 'base.php';

$entry = mysqli_fetch_assoc(mysqli_query($conn,"select count(*) \"log\" from members where scan = 1"));
echo "<div class=\"number\">{$entry['log']}</div>";
?>
</div></center>
h
</body>
</html>
