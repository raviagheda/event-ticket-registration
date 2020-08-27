<?php
include 'base.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Check</title>
	<link href="https://fonts.googleapis.com/css?family=Muli" rel="stylesheet"> 
	<style type="text/css">
		.msg
		{
		margin-top: 250px;
		}
		.greet
		{
		font-family: 'Muli', sans-serif;
		font-weight: bold;
		font-size: 65px;
		text-align: left;
		color: #0e1531;
		}
		.name
		{
		font-family: 'Muli', sans-serif;
		font-weight: normal;
		font-size: 68px;
		text-align: left;
		color: #1c223c;
		}
		.oops
		{
		font-family: 'Muli', sans-serif;
		font-weight: bold;
		font-size: 65px;
text-align: left;
color: #ff3449;
		}
	</style>
</head>
<body>
	<center>
<div class="msg">
<?php

if(isset($_GET['qrstring']))
{
		$qr = $_GET['qrstring'];
        preg_match_all('!\d+!', $qr, $ticketid);
        $ticketid = $ticketid[0][0];

        $verify = mysqli_query($conn,"select * from members where ticketid = $ticketid");
        $verify2 = mysqli_query($conn,"select * from members where id + 1000 = $ticketid");
        if(mysqli_num_rows($verify) > 0 || mysqli_num_rows($verify2) > 0)
        {
        	if(mysqli_num_rows($verify) > 0)
        		$data = mysqli_fetch_assoc($verify);
        	else if(mysqli_num_rows($verify2) > 0)
        		$data = mysqli_fetch_assoc($verify2);

        	mysqli_query($conn,"update members set scan = 1 where id = {$data['id']}");
        	
        	
        	echo "<div> <span class = \"greet\">Hello! </span><br><span class=\"name\">{$data['fname']} {$data['lname']}.</span></div>";
        }

        else
        {
        	echo "<span class=\"oops\">OOPS! </span> <br> <span class=\"name\">Verification Failed </span>";

        }
}

?>
</div>
</center>
</body>
</html>
<script type="text/javascript">
	setTimeout(myFunction, 3000);
	function myFunction()
	{
	 	window.location.href = "qr.php";
	}
</script>