<?php 
SESSION_START();
	//require_once 'createStuffs.php';
	$newError = "";
	//if(!empty($_SESSION['username']))
	//{
	
		if(isset($_POST['submitNew'])){
			
			if((!empty($_POST['newTopic'])) && ($_POST['newTopic'] != " ")){
				require_once 'connection.php';
				$sql = "INSERT INTO tblForumTopics (topic) VALUES ('". $_POST['newTopic'] ."')";
				$result = mysql_query($sql, $db) or $newError = mysql_error();
				$newError = "Topic Added Successfully!!!";
			}else{
				
				$newError = "There was a problem sending your new topic. Please Try Again1!!!";
			}
		}
	//}else{
	//	header('location:forumLogin.php');
	//}
?>
<!DOCTYPE html> 
<html>
<head>
    <title>CHAIN Forum</title>
    
	<link rel='stylesheet' href='general.css' type='text/css'> </link>
	
	<script type='text/JavaScript' src='addCorePoint.js'></script>
	
</head>
 
<body style="background-image: url(images/background.jpg);background-repeat: repeat-x repeat-y;">
	<form method='POST' action='createNewTopic.php'>
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
								<table width='100%' border='2' class='Example_J' >

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
													<td id='home' align='center' class='menuButton'>
														<b><a href='index.php'>Home</a></b>
													</td>
													<td id='admin' align='center'class='menuButton'>
														<b><a href='admin.php'>Admin</a></b>
													</td>
													<td id='trustees' align='center'class='menuButton'>
														<b><a href='trustees.php'>Trustees</a></b>
													</td>
													<td id='videos' align='center' class='menuButton'>
														<b><a href='videos.php'>Videos</a></b>
													</td>
													<td id='pictures' align='center' class='menuButton'>
														<b><a href='pictures.php'>Pictures</a></b>
													</td>
													<td id='articles' align='center' class='menuButton'>
														<b><a href='articles.php'>Articles</a></b>
													</td>
													<td id='reportNews' align='center' class='menuButton'>
														<b><a href='reportsNews.php'>Reports/News</a></b>
													</td>
													<td id='forum' align='center' class='activeButton'>
														<b><a href='forumLogin.php'>Forum</a></b>
													</td>
													<td id='donation' align='center' class='menuButton'>
														<b><a href='donation.php'>Donation</a></b>
													</td>
													<td id='about' align='center' class='menuButton'>
														<b><a href='aboutUs.php'>About</a></b>
													</td>
													<td id='contact' align='center' class='menuButton'>
														<b><a href='contact.php'>Contact</a></b>
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
										<td width='30%'> 
											<!--Subjects Comments space-->
											<table id='topics' width='100%'>
												<!--Scrollable Table space-->
												<?php
													require_once 'connection.php';
													$sql = "SELECT forumTopicID, topic FROM tblForumTopics ORDER BY forumTopicID LIMIT 10";
													
													$result = mysql_query($sql, $db);
													
													while($row = mysql_fetch_assoc($result))
													{
													
														print("<tr><td><b><a href='forum.php?id=" . $row['forumTopicID']."'>" .$row['topic'] ."</a></b></td></tr>");
													}
												?>
												<tr>
												
													<td align='center'>
														<a href='createNewTopic.php'>Create New Topic</a>
													</td>
												</tr>
											</table>
										</td>
										<td width='70%'>
											<!--Subjects Comments space-->
											<table id='commentsTable' width='100%' style="background-color:#FFDFFF;border-style:double;border-right-style: outset;border-bottom-style: outset; border-color: #999999; border-right-width: 10px; border-bottom-width: 5px;">
												
												<tr>
												
													<td align='center' colspan ='2'><font color='red' size='6'><?php print($newError); ?></td>
												</tr>
												<tr>
												
													<td align='right'><b>New Topic : </b></td><td width='70%' align='left'><input id='newTopic' name='newTopic' /><button class='sendButton' name='submitNew' id='submitNew'>Create</button></td>
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
</body>
</html>

