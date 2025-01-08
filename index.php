 <?php
	require_once 'createStuffs.php';
?>
<!DOCTYPE html> 
<html>
<head>
    <title>Christian Awareness Initiative Of Nigeria - CHAIN</title>
    
	<link rel='stylesheet' href='general.css' type='text/css'> </link>
	
	<script type='text/JavaScript' src='addCorePoint.js'></script>
	
</head>
 
<body style="background-image: url(images/background.jpg);background-repeat: repeat-x repeat-y;">
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
													<a href='index.php'><b class='activeButton'>Home</b></a>
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
									<td >
										<!--core points space-->
										<table style="background-color:#FFDFFF;border-style:double;border-right-style: outset;border-bottom-style: outset; border-color: #999999; border-right-width: 10px; border-bottom-width: 5px;">
											<?php
												/*$visionStatement = "";
												$visionPicture ="";
												
												$strategyStatement = "";
												$strategyPicture ="";
												
												$objectiveStatement = "";
												$objectivePicture ="";
												
												require_once 'connection.php';
												$sql = "SELECT corePointPicture, body FROM tblCorePoints";
												
												$result = mysql_query($sql, $db);
												while($row = mysql_fetch_assoc($result))
												{
												
													
												}
												*/
											?>
											<tr>
												<td colspan='2' style='background-color:#CC00FF;' align='center'>
												
													<b>Vision</b>
												</td>
											</tr>
											<tr>
												<td width='40%'>
													<img src='CorePictures/corePointVision.jpg' alt='Vision' height='125px' width='100%' />
												</td>
												<td align='justify'>
													To continually awaken and ginger up Christians in Nigeria to their 
													spiritual and civic responsibilities to God...
													<a href='aboutUs.php'><button class='menuButton' name='btnVision' id='btnVision'>Read More</button></a>
												</td>
											</tr>
										</table>
									</td>
									<td colspan=''>
										<!--core points space-->
										<table style="background-color:#FFDFFF;border-style:double;border-right-style: outset;border-bottom-style: outset; border-color: #999999; border-right-width: 10px; border-bottom-width: 5px;">
											<tr>
												<td colspan='2' style='background-color:#CC00FF;' align='center'>
													<b>Objective</b>
												</td>
											</tr>
											<tr>
												<td width='40%'>
													<img src='CorePictures/corePointObjective.jpg' alt='Vision' height='125px' width='100%' />
												</td>
												<td align='justify'>
													CHAIN-Christian awareness initiative of Nigerian, a christian non-governmental organization. As...
													<a href='aboutUs.php'><button class='menuButton' name='btnObjective' id='btnObjective'>Read More</button></a>
												</td>
											</tr>
										</table>
									</td>
									<td colspan=''>
										<!--core points space-->
										<table  style="background-color:#FFDFFF;border-style:double;border-right-style: outset;border-bottom-style: outset; border-color: #999999; border-right-width: 10px; border-bottom-width: 5px;">
											<tr>
												<td colspan='2' style='background-color:#CC00FF;' align='center'>
													<b>Strategy</b>
												</td>
											</tr>
											<tr>
												<td width='40%'>
													<img src='CorePictures/corePointStrategy.jpg' alt='Vision' height='125px' width='100%' />
												</td>
												<td align='justify'>
													To enable us achieve our set out goals and objectives, we shall adopt various methods in...
													<a href='aboutUs.php'><button class='menuButton' name='btnStrategy' id='btnStrategy'>Read More</button></a>
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
									
									<td colspan='3'>
										<!--sub body space-->
										<table>
										
											<tr>
												<td width='25%' rowspan='4'>
													<img src='images/ceo-chain.jpg' alt='Rev. John Joseph Hayab, CEO CHAIN' style="border: 2px solid black; float: left;"  height='200px' width='100%' />
													<br /><font color='#993366' size='4'><b><center>Rev. John Joseph Hayab <br /> CEO CHAIN</center></b></font>
												</td>
											</tr>
											<tr>
												
												<td width='75%'style='margin:15px' align='center'>
													Welcome to Christian Awareness Initiative of Nigeria (CHAIN), 
													where we bring to you information that will increase your spiritual, 
													political, economic and social commitments to the need of Christians. 
													We invite you to join us as we promote Jesus and strive to develop our Society. 
													Christian Awareness Initiative of Nigeria (CHAIN) is <font color='#993366'><b>registered with the Corporate
													Affairs Commission, Federal Republic of Nigeria with certificate 
													NO:CAC/IT/NO 32275.</b></font>
												</td>
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
</body>
</html>

