<?php
session_start();
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>
			Cyber Crime Cell | Userstatus
		</title>
		<style>
			<?php include('style.css'); ?>
			<?php include('table.css'); ?>
			<?php include('foot.css'); ?>
			
		</style>
	</head>
	<body>
		<header>
			<div class="department">
				<em>WELCOME TO OUR WEBSITE</em>
				<div class="welcome">
					<a href="http://localhost/Project/logout_user.php">
						<em>Logout</em>
					</a>
				</div>
			</div>
			<div class="container">
				<div id="branding">
					<a href="http://localhost/Project/html/home.html">
						<h1>
							Cyber Crime Cell
						</h1>
					</a>
				</div>
			</div>
			
			<!--NAVIGATION BAR-->
			<nav >
				<ul class="navbar">
					<li><a href="http://localhost/Project/html/home.html">Home</a></li>
					<li><a href="http://localhost/Project/html/about.html">About The Cyber Cell</a></li>
					<li><a href="http://localhost/Project/html/cybercrimes.html">Cyber Crimes</a></li>
					<li><a href="http://localhost/Project/html/cybersafety.html">Cyber Safety</a></li>
					<li><a href="http://localhost/Project/html/report.html">Report A Cyber Crime</a></li>
					<li><a href="http://localhost/Project/detective_login.php">Detective Login</a></li>
					<li><a href="http://localhost/Project/html/contact.html">Contact Us</a></li>
				</ul>
			</nav>
		</header>
		
		<section>
			<div class="container">
				<h1 style="font-size: 45px; color: #2c3e50;">
					<center>STATUS OF YOUR COMPLAINT</center>
				</h1>
				<?php	
					$serverName = "localhost";
					$dbUsername = "root";
					$dbPassword = "";
					$dbName = "cybercell";

					// Database Name
					$conn = new mysqli($serverName, $dbUsername, $dbPassword, $dbName);
					// Connnection
					if ($conn -> connect_error)
					  {
						  die("Connection failed: " . $conn -> connect_error);
					  }	
					$sql="SELECT caseid,subject,date,time,complaint,status FROM complaintdetails WHERE emid = '$_SESSION[newem]' ";
					$result = $conn -> query($sql);
					
					if($result -> num_rows >0)
					{
						echo "<table ><tr><th>CASE ID</th><th>SUBJECT</th><th>DATE</th><th>TIME</th><th>Complaint</th><th>Status</th></tr>";
						while($row=$result->fetch_assoc())
						{		if($row["status"]==1)
							{
							
							echo " <tr><td>".$row["caseid"]."</td><td>".$row["subject"].  "</td><td>".$row["date"]."</td><td>".$row["time"]."</td><td class='x'>".$row["complaint"]."</td><td>Accepted</td></tr>" ;
							}
							else
								echo " <tr><td>".$row["caseid"]."</td><td>".$row["subject"].  "</td><td>".$row["date"]."</td><td>".$row["time"]."</td><td class='x'>".$row["complaint"]."</td><td>Pending</td></tr>" ;
						}
						echo "</table>";
						
					}
					else
					{	
						echo "No complaints are registered yet.";
					}
					$conn->close();				
				?>
				<br />
				<form>
					<a href="http://localhost/Project/compaint.php">
						<input type="button" class="button" value="Go Back" />
						
					</a>
				</form>
			</div>
		</section>
		<br />
		<br />
		<br />
		
		<!--FOOTER CONTAINING QUICK LINKS TO OTHER PAGES OF THE WEBSITE-->
		<footer>
			<div class="container">
				<div class="footerbxs">
					
					<div class="foot1">
						
						<h4>Main Link</h4>
						<span></span>
						
						<ul>
							<li><a href="http://localhost/Project/html/home.html">Home</a></li>
							<li><a href="http://localhost/Project/html/cybercrimes.html">Cyber Crimes</a></li>
							<li><a href="http://localhost/Project/html/cybersafety.html">Cyber Safety</a></li>
							<li><a href="http://localhost/Project/html/report.html">Report A Cyber Crime</a></li>
							<li><a href="http://localhost/Project/detective_login.php">Detective Login</a></li>
							<li><a href="http://localhost/Project/html/contact.html">Contact Us</a></li>
						</ul>
					</div>
					
					<div class="foot2">
						
						<h4>Cyber Crimes</h4>
						<span></span>
						
						<ul>
							<li><a href="http://localhost/Project/html/emailfrauds.html">Email Frauds</a></li> 
							<li><a href="http://localhost/Project/html/socialmediacrimes.html">Social Media Crimes</a></li> 
							<li><a href="http://localhost/Project/html/mobileapprelatedcrimes.html">Mobile App related Crimes</a></li> 
							<li><a href="http://localhost/Project/html/wiredtransfer.html">Business Email Compromise</a></li> 
							<li><a href="http://localhost/Project/html/datatheft.html">Data Theft</a></li> 
							<li><a href="http://localhost/Project/html/ransomware.html">Ransomeware</a></li>
						</ul>
						
						<ul>
							<li><a href="http://localhost/Project/html/netbanking.html">Net Banking/ATM Frauds</a></li> 
							<li><a href="http://localhost/Project/html/fakecallsfrauds.html">Fake Calls Frauds</a></li> 
							<li><a href="http://localhost/Project/html/insurancefrauds.html">Insurance Frauds</a></li> 
							<li><a href="http://localhost/Project/html/lotteryscam.html">Lottery Scam</a></li> 						
							<li><a href="http://localhost/Project/html/bitcoin.html">Bitcoin</a></li>	
							<li><a href="http://localhost/Project/html/cheatingscams.html">Cheating Scams</a></li>
						</ul>
					
					</div>
					
					<div class="foot4">
					
						<h4>Contact Us</h4>
						<span></span>
						
						<ul>
							<p  style="color:#e8d0a2;">
								BMS College Of Engineering,<br />
								Bull Temple Road,<br />
								Basavanguddi,<br />
								Bengaluru - 560019
								<br />
								<br />
								Email us at:  <u>cybercrimecell@bmsce.ac.in</u>
							</p>
						</ul>
					
					</div>
				</div>
			</div>
		</footer>
	</body>
</html>