 <?php  
	//require_once 'createStuffs.php';
	$genError = "";
	if(isset($_POST['submitEnquiry']))
	{
		
		if(empty($_POST['email']))
		{
		
			$genError .="<br />Email Field Cannot Be Empty!!!";
		}
		if(empty($_POST['enquiry']))
		{
		
			$genError .="<br />Enquiry Field Cannot Be Empty!!!";
		}
		if(!preg_match('/^[a-zA-Z0-9_\-\.\\/]+@[a-zA-Z0-9\-\/]+\.[a-zA-Z0-9\-\.]+$/', $_POST['email']))
		{
		
			$genError .= "<br />Invalid Email Format!!!";
		}
		if(empty($genError))
		{
		
			require_once 'connection.php';
			$sql = "INSERT INTO tblEnquiry (email, enquiry, status) VALUES ('". $_POST['email']."','". $_POST['enquiry']."',0)";
			$result = mysql_query($sql, $db);
			
			if(mysql_insert_id() > 0)
			{
				$genError = "Your Enquiry Was Successfully Recieved. We'll Respond As Soon As Possible!!!";
			}
		}
	}
?>
<!DOCTYPE html> 
<html>
<head>
    <title>CHAIN - About Us</title>
    
	<link rel='stylesheet' href='general.css' type='text/css'> </link>
	
	<script type='text/JavaScript' src='addCorePoint.js'></script>
	
</head>
 
<body style="background-image: url(images/background.jpg);background-repeat: repeat-x repeat-y;">
	<form method='POST' action='contact.php'>
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
													<a href='admin.php'><b class='menuButton'>Admin</b></a>
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
													<a href='contact.php'><b class='activeButton'>Contact</b></a>
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
										<td >
											
											<table width='100%' style="background-color:#FFDFFF;border-style:double;border-right-style: outset;border-bottom-style: outset; border-color: #999999; border-right-width: 10px; border-bottom-width: 5px;">
												
												<tr>
													<td align='center'>
														<font color='blue' size='8'><b>Contact Us</b></font>
														<hr />
													</td>
												</tr>
												<tr>
													<td align='justify'>
														<img src='images/contact.png' alt='Contact' />
													</td>
												</tr>
												<tr>
													<td align='justify'>
														<img src='images/con_address.png' alt='Contact Address' /><br />
														<b>
															31 King Hassan Lane by Mass Housing<br />
															Narayi High Cost<br />
															Kaduna<br />
															Nigeria
														</b>
														<hr />
													</td>
												</tr>
												
												
												<tr>
													<td align='justify'>
														<img src='images/con_tel.png' alt='Contact Telephone Number' />
														<b>
															08057331601<br />
															<img src='images/con_mobile.png' alt='Contact Mobile Number' />
															08057331601<br />
															
														</b>
														<hr />
													</td>
												</tr>
												<tr>
													<td align='center'>
														<table>
															<tr>
																<td colspan='2' align='center'>
																	<font color='blue' size='8'><b>Enquiry Form</b></font>
																</td>
															</tr>
															<tr>
																<td colspan='2'>
																	<font color='red' size='4'><b><?php print($genError); ?></b></font>
																</td>
															</tr>
															<tr>
																<td>
																	<b>Email :</b>
																</td>
																<td>
																	<input name='email' id='email' type='text' /><font color='red' size='3'><b>*</b></font>Eg : chain@gmail.com
																</td>
															</tr>
															<tr>
																<td>
																	<b>Enquiry :</b>
																</td>
																<td>
																	<textarea name='enquiry' id='enquiry'></textarea><font color='red' size='3'><b>*</b></font>
																</td>
															</tr>
															<tr>
																<td>
																	
																</td>
																<td>
																	<button name='submitEnquiry' id='submitEnquiry' class='sendButton'>Send</button>
																</td>
															</tr>
														</table>
														<hr />
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
					<center><font color='yellow' size='4'><b>Developed By Just-In-Time Technologies</b></font></center>
				</td>
			</tr>
		</table>
	</form>
</body>
</html>

