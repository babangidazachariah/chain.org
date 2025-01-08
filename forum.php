<?php
SESSION_START();
	//require_once 'createStuffs.php';
	$genError ="";
	$limit = 10;
	if(isset($_POST['submitComment']))
	{
	
		//print("Here!!!");
		if(!empty($_SESSION['userID']) && !empty($_SESSION['topicID']))
		{
			//print($_POST['commentBox']);
			if(!empty($_POST['commentBox']))
			{
				//print("Here!!!");
				require_once 'connection.php';
				$sql = "INSERT INTO tblForum (forumTopicID, postedByID, postedMessage) VALUES (" . $_SESSION['topicID']."," .$_SESSION['userID'].",'".$_POST['commentBox']."')";
				$result = mysql_query($sql, $db);
				//if(mysql_insert_id() > 0)
				//{
				
					
				//}
			}
		}
		
	}
?>
<!DOCTYPE html> 
<html>
<head>
    <title>CHAIN Forum</title>
    
	<link rel='stylesheet' href='general.css' type='text/css'> </link>
	
	<script type='text/JavaScript' src='addCorePoint.js'></script>
	
</head>
 
<body style="background-image: url(images/background.jpg);background-repeat: repeat-x repeat-y;">
	<form method='POST' action='forum.php'>
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
													<a href='forumLogin.php'><b class='activeButton'>Forum</b></a>
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
										<td width='30%'>
											<!--Subjects Comments space-->
											<table id='topicsTable' width='100%'style='float:left; top: 20%; left: 50%;'>
												<!--Scrollable Table space-->
												<?php
													require_once 'connection.php';
													$sql = "";
													//format query so that other topics may be visible anytim and not only the first 10
													if(empty($_SeSSION['limit']))
													{
														$sql = "SELECT forumTopicID, topic FROM tblForumTopics ORDER BY forumTopicID LIMIT " .$limit;
														$_SeSSION['limit'] = 20;
													}else{
														$sql = "SELECT forumTopicID, topic FROM tblForumTopics ORDER BY forumTopicID";
													}
													$result = mysql_query($sql, $db);
													
													while($row = mysql_fetch_assoc($result))
													{
														//$_SESSION['topicID'] = $row['forumTopicID'];
														print("<tr><td><a href='forum.php?id=" . $row['forumTopicID']."'><b>" .$row['topic'] ."</b></a></td></tr>");
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
											<table id='commentsTable' width='100%' border='1'>
												
												<?php
													
													require_once 'connection.php';
													
													$passport = "";
													
													$sql = "SELECT passport FROM tblForumUsers WHERE userID ='" . $_SESSION['userID']."'";
													
													$result = mysql_query($sql, $db);
													while($row = mysql_fetch_assoc($result))
													{
													
														$passport = $row['passport'];
														//print($_SESSION['email']);
													}
													//print($_SESSION['topicID']);
													$getID = 0;
													if(!empty($_GET['id']))
													{
														$_SESSION['topicID'] = $_GET['id'];
													}
													$sql = "SELECT * FROM tblForumTopics WHERE forumTopicID =" . $_SESSION['topicID'];
													$result = mysql_query($sql, $db);
													while($row = mysql_fetch_assoc($result))
													{
														
														print("<tr><td colspan='3'><font size='10' color='blue'>".$row['topic']."</font></td></tr>");
													}
													
													$sql = "SELECT tblForumUsers.username, tblForumUsers.passport, tblForum.postedMessage FROM tblForumUsers, tblForum WHERE tblForumUsers.userID = tblForum.postedByID AND tblForum.forumTopicID =" . $_SESSION['topicID'];
													$result = mysql_query($sql, $db);
													//print($sql);
													
													while($row = mysql_fetch_assoc($result))
													{
														
														
														print("<tr><td><img width='60px' height='50px' src='ForumUsers/".$row['passport']."' <br />" .$row['username']."</td><td>".$row['postedMessage']."</td></tr>");
														
													
													}
													
												?>
												<tr>
												
													<td id='senderPic' width='5%'align='right'><img width='60px' height='50px'src='ForumUsers/<?php print($passport);?>' alt='<?php print($_SESSION['username']); ?>' /></td><td width='70%' align='right'><textarea id='commentBox' name='commentBox' maxlength='5000'cols='50' rows='2'></textarea></td><td width='10%'><button class='sendButton' name='submitComment' id='submitComment'>Send</button></td>
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

