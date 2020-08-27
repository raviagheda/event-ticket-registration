<?php
include 'base.php';
session_start();
$flag = 0;
if(isset($_POST['submit']))
{
	$verify = mysqli_query($conn,"select * from members where email = '{$_POST['email']}'");
	if(mysqli_num_rows($verify)>0)
	{
		$_SESSION['email'] = $_POST['email'];
		$flag = 1;
	}
	else
	{
		header('Location: notreg.html');
		// header('Location:ticket.html?index=1');
	}
}
else if(!isset($_SESSION['email']) && $flag != 1)
 {
 	header('Location: index.php');
 }

// $user_data_query = mysqli_query($conn,"");
$user_data = mysqli_fetch_assoc(mysqli_query($conn,"select * from members where email = '{$_SESSION['email']}'"));

// Ticket code generation
$qr = "uiuxfundamentalsandcareeroportunities";
if($flag != 1)
{
$ti_num = $user_data['id']  + 1000;	
}
else
{
	$ti_num = $user_data['ticketid'];		
}

$qr = $qr . $ti_num . $user_data['fname'] . $user_data['lname'];

mysqli_query($conn,"update members set ticketid = $ti_num where email = '{$_SESSION['email']}'");

$user_data = mysqli_fetch_assoc(mysqli_query($conn,"select * from members where email = '{$_SESSION['email']}'"));

?>
<!DOCTYPE html>
<html>
<head>
	<title>
		
	</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	  <link rel="stylesheet" href="css/ticket.css">
	  <link href="https://fonts.googleapis.com/css?family=Roboto+Slab" rel="stylesheet">
</head>
<body>	
	<div class="ticket-img">
		<?php
      	echo "<img src=\"https://chart.googleapis.com/chart?chs=350x350&cht=qr&chl=$qr&choe=UTF-8\" title=\"Qr Code\" />";
			
      	?>
		</div>

		<div class="ticket-box">
			<p class="ticket-box-a">UI/UX Fundamentals & Career Opportunities.</p>
			<p class="ticket-box-b">By Paresh Khatri
		</div>
			

			<div class="main-ticket">
					<div class="ticket-name">
			<p class="ticket-name-a">Student Name</p>
			<p class="ticket-name-b"><?php echo "{$user_data['fname']} {$user_data['lname']}"; ?></p>
			
		</div>



		<div class="ticket-date-time">
			<div class="ticket-ID">
				<p class="ticket-id-a">Ticket ID</p>
				<p class="ticket-id-b"><?php echo "{$user_data['ticketid']}"; ?></p>
			</div>
			<div class="ticket-time">
				<p class="ticket-id-a">Event Date & Time</p>
				<p class="ticket-id-b">10:00AM | WED-27 FEB, 2019</p>
			</div>
		</div>
		<div class="ticket-venue">
			<div class="ticket-ven-a">
				<p class="ticket-ve-lab-a">Venue<br>
				<span class="ticket-ve-lab-b">BMCET IO Lab</span><br>
				<span class="ticket-ve-lab-c">6th Floor, BMCET</span>
				</p>
			</div>
			<div class="ticket-ven-b">
				<img src="images/io_red.png" width="50px">
			
			</div>
		</div>
		</div>

		<div class="ticket-entry">
				<p class="ticket-entry-a">Show this ticket to get entry at the event</p>
			</div>
			<?php
			session_destroy();
			$curl = curl_init();

			curl_setopt_array($curl, array(
    		CURLOPT_URL => "https://api.pdfshift.io/v2/convert/",
    		CURLOPT_RETURNTRANSFER => true,
    		CURLOPT_POST => true,
    		CURLOPT_POSTFIELDS => json_encode(array("source" => "ticket.php", "landscape" => false, "use_print" => false)),
    		CURLOPT_HTTPHEADER => array('Content-Type:application/json'),
    		CURLOPT_USERPWD => 'db7e7f730bc24277a3d7d1b821a9564d'
			));

			$response = curl_exec($curl);
			file_put_contents('pdfhsift-documentation.pdf', $response);
			?>
</body>
</html>