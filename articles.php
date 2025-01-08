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
													<a href='articles.php'><b class='activeButton'>Articles</b></a>
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
										<td width='30%'>
											<!--Subjects Comments space-->
											<table id='topicsTable' width='100%'style='float:left; top: 20%; left: 50%;'>
												<!--Scrollable Table space-->
												
												<tr>
												
													<td align='center'>
														<!--<a href='createNewTopic.php'>Create New Topic</a>-->
													</td>
												</tr>
											</table>
										</td>
										<td width='70%'>
											<!--Subjects Comments space-->
											<table id='commentsTable' width='100%'>
											<?php
												require_once 'connection.php';
												if($_GET['id'] == '')
												{
													
													$sql = "SELECT * FROM tblArticles";
													$result = mysql_query($sql,$db);
													//$DOCUMENT_ROOT = $HTTP_SERVER_VARS['DOCUMENT_ROOT'];
													while($row = mysql_fetch_assoc($result))
													{
													
														print("<tr>
												
																<td><font size='5' color ='blue'><b><a href=articles.php?id=". $row['articleID'].">".$row['title']. "</a></b></td>
															</tr>
															<tr>
																<td>".$row['body']."</td>
															</tr>
															<tr>
															
																<td><a href=articles.php?id=". $row['articleID']."><b class='sendButton'>Read More...</b></a></td>
															</tr>");
													}
												}else{
													$sql = "SELECT * FROM tblArticles WHERE articleID=". $_GET['id'];
													$result = mysql_query($sql,$db);
													//$DOCUMENT_ROOT = $HTTP_SERVER_VARS['DOCUMENT_ROOT'];
													$title = '';
													$author ='';
													while($row = mysql_fetch_assoc($result))
													{
														$title = $row['title'];
														$author = $row['author'];
													}
													print("<tr>
												
																<td><font size='6' color ='blue'><b><u>".$title. "</u></b><p /></td>
															</tr>
															<tr>
																<td align='justify'>");
														$lines = file("article".$_GET['id'].".txt");
														foreach ($lines as $line)
														{
															// Skip it if it's a comment
															if (substr(trim($line), -1, 1) == '.' || substr(trim($line), -1, 1) == '!')//if( $line == '')
															{
																print($line."<p />");
															}else{
																print($line);
															}
															
														}
													 print("Author : <em><b>".$author ."</b></em>");
													print("</td>
															</tr>
															<tr>
																<td><p /><a href='articles.php'><b>Click To View Other Titles</b></a></td>
															</tr>
															");
												}
											?>
												
												
												
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

