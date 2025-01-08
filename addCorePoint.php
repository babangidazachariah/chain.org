<?php 
$passportError = "";
	if(isset($_POST['upload'])){
			//print("entered successfully");
			//if(isset($_POST['title']) && isset($_POST['body'])){
				//print("here");
				if(empty($_POST['txtTitle']) || empty($_POST['txtBody']) || empty($_FILES['uploadfile'])) {
					if(empty($_POST['txtTitle'])){
						$passportError = "Title Cannot Be Empty!!!";
					}
					if(empty($_POST['txtBody'])){
						$passportError = $passportError . "Title Cannot Be Empty!!!";
					}
					if(empty($_FILES['uploadfile'])){
						$passportError = $passportError . "Upload Core Point's Icon/Picture!!!";
					}
					
					
				}
				
						
					//if(!empty($_FILES['uploadfile'])){
				if(empty($passportError))
				{
					require_once'connection.php';
					
					//change this path to match your images directory
					$dir ="C:/wamp/www/Christianawareness.org/CorePictures";
					//make sure the uploaded file transfer was successful
					if ($_FILES['uploadfile']['error'] != UPLOAD_ERR_OK) {
					
						switch ($_FILES['uploadfile']['error']) {
							case UPLOAD_ERR_INI_SIZE:
								$passportError = 'The uploaded file exceeds the upload_max_filesize directive in php.ini.';
								die();
								break;
							case UPLOAD_ERR_FORM_SIZE:
								$passportError = 'The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form.';
								die();
								break;
							
							case UPLOAD_ERR_PARTIAL:
								$passportError = 'The uploaded file was only partially uploaded.';
								die();
								
								break;
							case UPLOAD_ERR_NO_FILE:
								$passportError = 'No file was uploaded.';
								die();
								break;
							case UPLOAD_ERR_NO_TMP_DIR:
								$passportError ='The server is missing a temporary folder.';
								die();
								break;
							case UPLOAD_ERR_CANT_WRITE:
								$passportError = 'The server failed to write the uploaded file to disk.';
								die();
								break;
							case UPLOAD_ERR_EXTENSION:
								$passportError = 'File upload stopped by extension.';
								die();
								break;
						}
					}
					//get info about the image being uploaded
					//$password = $_POST['password'];
					//$userName = $_POST['username'];
					$imageDate = date('Y-m-d');
					list($width, $height, $type, $attr) = getimagesize($_FILES['uploadfile']['tmp_name']);
					// make sure the uploaded file is really a supported image
					$image = "";
					$ext ="";
					switch ($type) {
						case IMAGETYPE_GIF:
							try{
								$image = imagecreatefromgif($_FILES['uploadfile']['tmp_name']);
								$ext = '.gif';
							}catch(Exception $e) {
								//echo $e->getMessage();
								//echo 'Sorry, could not upload file';
								$passportError = 'The file you uploaded was not a supported filetype.';
								die();
								}
							break;
						case IMAGETYPE_JPEG:
							try{
								$image = imagecreatefromjpeg($_FILES['uploadfile']['tmp_name']);
								//print($image);
								$ext = '.jpg';
							}catch(Exception $e) {
								//echo $e->getMessage();
								//echo 'Sorry, could not upload file';
								$passportError = 'The file you uploaded was not a supported filetype.';
								die();
							}
							break;
						case IMAGETYPE_PNG:
							try{
								$image = imagecreatefrompng($_FILES['uploadfile']['tmp_name']);
								$ext = '.png';
							}catch(Exception $e) {
								//echo $e->getMessage();
								//echo 'Sorry, could not upload file';
								$passportError = 'The file you uploaded was not a supported filetype.';
								die();
							}
							break;
						default:
							$passportError = 'The file you uploaded was not a supported filetype.';
							die();
					}
					//insert information into image table
					$query = "INSERT INTO tblCorePoints (title, body) VALUES ('" . $_POST['txtTitle']. "','" . $_POST['txtBody'] ."')";
					$result = mysql_query($query, $db) or die (mysql_error($db));
					//print("inserted successfully");
					//retrieve the image_id that MySQL generated automatically when we inserted
					//the new record
					$last_id = mysql_insert_id();
					//because the id is unique, we can use it as the image name as well to make
					//sure we don't overwrite another image that already exists
					$imagename = 'CorePoint'. trim($_POST['txtTitle']). $ext;
					// update the image table now that the final filename is known.
					$query = "UPDATE tblCorePoints SET picture = '" .$imagename . "'	WHERE corePointID = " . $last_id;
					$result = mysql_query($query, $db) or die (mysql_error($db));
					//print("updated successfully");
					//save the image to its final destination
					switch ($type) {
						case IMAGETYPE_GIF:
							imagegif($image, $dir . '/' . $imagename);
							break;
						case IMAGETYPE_JPEG:
							imagejpeg($image, $dir . '/' . $imagename, 100);
							//print("Success");
							break;
						case IMAGETYPE_PNG:
							imagepng($image, $dir . '/' . $imagename);
							break;
					}
					
					imagedestroy($image);
					$passportError ="Added Successfully!!!";
					//header("location:requestMembershipGuarantor.php");
						//header("location:memberHome.php");
					//}else{
					//	$passportError ="Select/Browse Passport First!!!";
						
					//}
				}else{
					
					print($passportError);
					exit();
				}
			
		}
?>
<!DOCTYPE html> 
<html>
<head>
    <title>CHAIN - Add/Edit Core Points</title>
    
	<link rel='stylesheet' href='general.css' type='text/css'> </link>
	
	<script type='text/JavaScript' src='addCorePoint.js'></script>
	
</head>
 
<body onload='SetImg()' style="background-image: url(images/background.jpg);background-repeat: repeat-x repeat-y;">
	<form id='addCorePoint' action="addCorePoint.php" method="POST" enctype="multipart/form-data">
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
										<td colspan='3' align='center'>
											<!--core points space-->
											
											<table >
											
												<tr>
													<td colspan ="3" bgcolor="#FFFF99" align='center'> <!-- body table First Column -->
														<font color="black" name="Arial" size="10"><b>Add/Edit Core Point</b></font>
													</td>
												</tr>
												
												
												<tr>
													<td colspan ="3" bgcolor="#FFFF99"> <!-- body table First Column-->
														<font color="red" name="Arial" size="8"><?php print($passportError); ?><!-- display success or error message--></font>
													</td>
												</tr>
												<tr>
													<td colspan ="3" bgcolor="#FFFF99" id='passportError'> 
													
													</td>
												</tr>
												<!--
												<tr>
													<td colspan ="3" bgcolor="#FFFF99" align="right" >
														
														<!-- body table First Column--
														 an empty row here!!!
													</td>
												</tr>
												-->
												
												
												<!--
												<tr>
									
													<td height="20px" colspan="3" align="center">
														iuhji
													</td>
												</tr>
												-->
												<tr>
													<td align='right' width='50%'>
														<table width='100%'> 
															<tr>
																<td align='right'>
																	<b>Title :</b>
																</td>
																<td>
																	<input type='text' name='txtTitle' id='txtTitle' maxlength = '50'/><font color="red" size='4'>*</font>
																</td>
																<td id='titleError'>
																	<!-- institution error-->
																</td>
															</tr>
													
															<tr>
																<td align='right'>
																
																	<b>Body :</b>
																</td>
																<td>
																	<textarea name='txtBody' id='txtBody' maxlength = '500'></textarea><font color="red" size='4'>*</font>
																</td>
																<td id='bodyError'>
																	<!-- institution error-->
																</td>
															</tr>
															
														</table>
													</td>	
													<td width='50%'>
														<table width='100%'>
															<tr>
												
																<td colspan="3" align="center"><br /><p />
																	<font color="#000000" size='4'><b>Upload Core Point Picture Here!!!</b></font>
																</td>
															</tr>
															<tr>
																
																<td id="passport" align="center"><br /><p />
																	
																</td>
															</tr>
															
															
															<tr>
																<td align="center" colspan="3">
																	<font color="red"><b>Must be 2MB or less</b></font><br />
																	<input type="file" id="uploadfile" name="uploadfile" />
																	<!--<button onclick="abortRead();">Cancel read</button>-->
																	<div id="progress_bar"><div class="percent">0%</div></div>

																	<script>
																	  var reader;
																	  var progress = document.querySelector('.percent');

																	  function abortRead() {
																		reader.abort();
																	  }

																	  function errorHandler(evt) {
																		switch(evt.target.error.code) {
																		  case evt.target.error.NOT_FOUND_ERR:
																			alert('File Not Found!');
																			break;
																		  case evt.target.error.NOT_READABLE_ERR:
																			alert('File is not readable');
																			break;
																		  case evt.target.error.ABORT_ERR:
																			break; // noop
																		  default:
																			alert('An error occurred reading this file.');
																		};
																	  }

																	  function updateProgress(evt) {
																		// evt is an ProgressEvent.
																		if (evt.lengthComputable) {
																		  var percentLoaded = Math.round((evt.loaded / evt.total) * 100);
																		  // Increase the progress bar length.
																		  if (percentLoaded < 100) {
																			progress.style.width = percentLoaded + '%';
																			progress.textContent = percentLoaded + '%';
																		  }
																		}
																	  }

																	  function handleFileSelect(evt) {
																		
																		// Reset progress indicator on new file selection.
																		progress.style.width = '0%';
																		progress.textContent = '0%';

																		reader = new FileReader();
																		reader.onerror = errorHandler;
																		reader.onprogress = updateProgress;
																		reader.onabort = function(e) {
																		  alert('File read cancelled');
																		};
																		reader.onloadstart = function(e) {
																		  document.getElementById('progress_bar').className = 'loading';
																		};
																			reader.onload = function(e) {
																				  // Ensure that the progress bar displays 100% at the end.
																				  progress.style.width = '100%';
																				  progress.textContent = '100%';
																				  setTimeout("document.getElementById('progress_bar').className='';", 2000);
																			};
																			// Read in the image file as a binary string.
																			reader.readAsBinaryString(evt.target.files[0]);
																			// Loop through the FileList and render image files as thumbnails.
																			var files = evt.target.files; // FileList object
																			for (var i = 0, f; f = files[i]; i++) {
																				//alert("Here");
																			  // Only process image files.
																				 if (!f.type.match('image.*')) {
																					continue;
																				 }

																				var readerImage = new FileReader();

																				  // Closure to capture the file information.
																				 readerImage.onload = (function(theFile) {
																					return function(e) {
																					  // Render thumbnail.
																					  document.getElementById("passport").innerHTML = ['<img height="150px" width="200px" class="thumb" src="', e.target.result,
																						'" title="', escape(theFile.name), '"/>'].join('');
																					
																					};
																				})(f);

																				  // Read in the image file as a data URL.
																				 readerImage.readAsDataURL(f);
																			}
																		
																	  }

																	  document.getElementById('uploadfile').addEventListener('change', handleFileSelect, false);
																	</script>
																</td>
																<td>
																	<!-- institution error-->
																</td>
															</tr>
															
															
															
														</table>
													</td>
												</tr>
												<tr>
									
													<td height="20px" colspan="3" align="center">
														
													</td>
												</tr>
												<tr>
													<td  align="right" width='300' ><!-- body table First Column-->
														<font color="black" name="Arial" size="4" ><b></b></font>
													</td>
													<td>
														<button id='upload' class="sendButton" name='upload'> Add </button>
														<button id='cancel' class="sendButton" name='cancel'>Cancel</button>
													</td>
													<td>
														<!-- institution error-->
													</td>
													
												</tr>
											</table>
										</td>
										
									</tr>
									<tr>
										<td colspan=''>
											<!--picture space-->
										</td>
										<td colspan='2'>
											<!--sub body space-->
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

