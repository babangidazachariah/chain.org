<?php 
SESSION_START();
	$inputError = "";
	$username = "";
	$password = "";
	$isError = false;
	if(isset($_POST['login']))
	{
		
		if(!empty($_POST['username'])) 
		{
		
			$username = $_POST['username'];
		}else{
			$isError = true;
			$inputError = "Username Field Cannot be Empty!!!";
		}
		
		if(!empty($_POST['password'])) 
		{
		
			$password = $_POST['password'];
		}else{
			$isError = true;
			$inputError = "Password Field Cannot be Empty!!!";
		}
		
		if(!$isError)
		{
			
			require_once 'connection.php';
			$sql = "SELECT * FROM tblAdmin WHERE username='". $username . "' AND password = '". $password."'";

			$result = mysql_query($sql, $db);
			if(mysql_num_rows($result) > 0)
			{
			
				while($row = mysql_fetch_assoc($result))
				{
					$_SESSION['email'] = $row['email'];
					$_SESSION['username'] = $row['username'];
					$_SESSION['userID'] = $row['userID'];
				}
				header('location:adminDashboard.php');
			}else{
				$inputError = "Invalid Username or Password!!!";
			}
			
		}
	}elseif(isset($_POST['register']))
	{
		
		header('location:registerNewAdmin.php');
	}
?>
<html>
	<head>
		<style>
			  #progress_bar {
				margin: 10px 0;
				padding: 3px;
				border: 1px solid #000;
				font-size: 14px;
				clear: both;
				opacity: 0;
				-moz-transition: opacity 1s linear;
				-o-transition: opacity 1s linear;
				-webkit-transition: opacity 1s linear;
			  }
			  #progress_bar.loading {
				opacity: 1.0;
			  }
			  #progress_bar .percent {
				background-color: #99ccff;
				height: auto;
				width: 0;
			  }
		</style>

		<script>
			<!--
				function SetImg(){
					document.getElementById("passport").innerHTML = ['<img height="150px" width="200px" class="thumb" src="', 'Images/icon_photo.png',
									'" title="', escape("Images/icon_photo.png"), '"/>'].join('');
				
				}
			-->
		</script>
		<title>CHAIN Forum Login</title>
    
		<link rel='stylesheet' href='general.css' type='text/css'> </link>
		
		<script type='text/JavaScript' src='addCorePoint.js'></script>
	</head>
	<body style="background-image: url(images/background.jpg);background-repeat: repeat-x repeat-y;">
		<form action="admin.php" method="POST">
	
			<table width='100%'>
		
				<tr>
				
					<td width='10%'>
					
					</td>
					
					<td width='80%'>
						<table width='100%' style="background-color:#FFDFFF;border-right-style: outset;border-bottom-style: outset; border-color: #999999; border-right-width: 10px; border-bottom-width: 5px;" >
							<tr>
								<td colspan='3' height='20px'>
								
								</td>
							</tr>
							<tr>
								<td  width='3%'>
									
									
								</td>
								
								<td width='94%'>
									<table width='100%' class='Example_J' >

										<tr>
											<td colspan='3' height='200px' style="background-image: url(images/logo.jpg); ">
												<!--logo-->
											</td>
										</tr>
										<tr>
											<td colspan='3' height='20px'>
												<!--empty space-->
											</td>
										</tr>
										
										<tr>
											<td colspan='3'>
												<!--menu space-->
												<table width='100%' class='Example_J'>
											<tr>
												<td id='home' align='center' >
													<a href='index.php'><b class='menuButton'>Home</b></a>
												</td>
												<td id='admin' align='center'>
													<a href='admin.php'><b class='activeButton'>Admin</b></a>
												</td>
												<td id='trustees' align='center'>
													<a href='trustees.php'><b class='menuButton'>Trustees</b></a>
												</td>
												<td id='videos' align='center'>
													<a href='videos.php'><b  class='menuButton'>Videos</b></a>
												</td>
												<td id='pictures' align='center' >
													<a href='pictures.php'><b class='menuButton'>Pictures</b></a>
												</td>
												<td id='articles' align='center'>
													<a href='articles.php'><b class='menuButton'>Articles</b></a>
												</td>
												<td id='reportNews' align='center'>
													<a href='reportsNews.php'><b class='menuButton'>Reports/News</b></a>
												</td>
												<td id='forum' align='center' >
													<a href='forumLogin.php'><b class='menuButton'>Forum</b></a>
												</td>
												<td id='donation' align='center' >
													<a href='donation.php'><b class='menuButton'>Donation</b></a>
												</td>
												<td id='about' align='center' >
													<a href='aboutUs.php'><b class='menuButton'>About</b></a>
												</td>
												<td id='contact' align='center'>
													<a href='contact.php'><b class='menuButton'>Contact</b></a>
												</td>
											</tr>
										</table>
											</td>
										</tr>
										<tr>
											<td colspan='3' height='20px'>
												<!--empty space-->
											</td>
										</tr>
										<tr>
											<td width='100%' align='center'>
												<!--Subjects Comments space-->
												<table width='50%'>
													<tr>
														<td align='center' colspan='2'><font color='red' size='6'><b>Admin Login!!!</b></font></td>
														
													</tr>
													<tr>
														<td align='center' colspan='2'><font color='red' size='6'><b><?php print($inputError); ?></b></font></td>
														
													</tr>
													<tr>
														<td align='right'><b>Username :</b></td>
														<td><input type='text' name='username' id='username' /></td>
													</tr>
													<tr>
														<td align='right'><b>Password :</b></td>
														<td><input type='password' name='password' id='password' /></td>
													</tr>
													
													<tr>
														<td></td><td  align='left'><button class='sendButton' name='login' id='login'>Login</button></td>
														
													</tr>
													
												</table>
											</td>
											
										</tr>
										
									</table>
								</td>
								
								<td width='3%'>
									
								</td>
							</tr>
						</table>
					
					</td>
					
					<td width='10%'>
					
					</td>
				</tr>
				<tr>
			<td colspan='3' height='20px'>
				<!--empty space-->
			</td>
		</tr>
		<tr>
			<td colspan='3' height='20px'>
				<center><font color='yellow' size='4'><b>Powered By Just-In-Time Technologies</b></font></center>
			</td>
		</tr>
			</table>
		</form>