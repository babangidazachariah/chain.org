<?php 
SESSION_START();
	//require_once 'createStuffs.php';
	$genError ="";
	$limit = 10;
	if(isset($_POST['submitComment']))
	{
		
		$author = '';
		$articleBody = '';
		$errorMessage = '';
		
		//print("Here!!!");
		if(!empty($_POST['author']) )
		{
			$author = 'Anonymous';
		}else{
			$author = $_POST['author'];
		}
		if(!empty($_POST['articleTitle']) )
		{
			//print($_POST['commentBox']);
			if(!empty($_POST['articleBody']))
			{
				//print("Here!!!");
				$articleBody = substr(trim($_POST['articleBody']), 0, strpos($_POST['articleBody'],"."));
				require_once 'connection.php';
				
						
				$sql = "INSERT INTO tblArticles (title, body, author) VALUES ('" . $_POST['articleTitle']."','" .$articleBody."','".$author."')";
				$result = mysql_query($sql, $db);
				
				$id = mysql_insert_id();
				$handle ='';
				$isError = false;
				$filename = "article".$id.".txt";
				
				if($handle = fopen($filename, 'a')) {
					if(fwrite($handle, $_POST['articleBody']) === FALSE) {
						$isError = true;
					}

				}else{
					$isError = true;
				}
				
				if($isError )
				{
					$sql = "DELETE FROM tblArticles WHERE articleID=".$id;
					$result = mysql_query($sql, $db);
					$errorMessage = 'Unable To Post Article. Try Again!!!';
				}else{
					$errorMessage = 'Article Posted Successfully.';
				}

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
	<form method='POST' action='postArticles.php'>
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
												<tr>
												
													<td><font size='4' color='red'><b><?php print($errorMessage);?></b></font></td>
												</tr>
												<tr>
												
													<td><b>Article Title :</b> <input id='articleTitle' name='articleTitle' type='text' /></td>
												</tr>
												
												<tr>
													
													<td><b>Article :</b><br /><textarea id='articleBody' name='articleBody' maxlength='5000'cols='100' rows='20'></textarea></td>
												</tr>
												
												<tr>
												
													<td><b>Author :</b> <input id='author' name='author' type='text' /></td>
												</tr>
												<tr>
													<td align='right'><button class='sendButton' name='submitComment' id='submitComment'>Send</button></td>
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
