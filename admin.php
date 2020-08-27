<!DOCTYPE html>
<html>
<head>
	<title>Admin Pane</title>
	<style>
		
	</style>
</head>
<body>
<?php
include 'base.php';
$entry = mysqli_fetch_assoc(mysqli_query($conn,"select count(id) \"num\" from members"));
echo $entry['num'];
?>
</body>
</html>
