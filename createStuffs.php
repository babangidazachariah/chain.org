<?php 

	$db = mysql_connect("localhost","root") or die ('Unable to connect. Check your connection parameters or '.mysql_error($db));
		$sql= "CREATE DATABASE IF NOT EXISTS ChainDatabase";
		mysql_query($sql, $db) or die(mysql_error($db));
		//make sure our recently created database is the active one
		mysql_select_db('ChainDatabase', $db) or die(mysql_error($db));
		
		$sql = "CREATE TABLE IF NOT EXISTS tblCorePoints (corePointID INTEGER NOT NULL AUTO_INCREMENT,
															picture VARCHAR(50) NOT NULL,
															title VARCHAR(50) NOT NULL,															
															body VARCHAR(500) NOT NULL,
															PRIMARY KEY (corePointID)
															)
															ENGINE=MyISAM";
															
		mysql_query($sql, $db) or die(mysql_error($db));
		
		
		$sql = "CREATE TABLE IF NOT EXISTS tblNewsReport (newsReportID INTEGER NOT NULL AUTO_INCREMENT,
															picture VARCHAR(50) NOT NULL,
															title VARCHAR(100) NOT NULL,															
															body VARCHAR(5000) NOT NULL,
															PRIMARY KEY (newsReportID)
															)
															ENGINE=MyISAM";
															
		mysql_query($sql, $db) or die(mysql_error($db));												
											
		//forum topics
		$sql = "CREATE TABLE IF NOT EXISTS tblForumTopics (forumTopicID INTEGER NOT NULL AUTO_INCREMENT,
															topic VARCHAR(500) NOT NULL,
															PRIMARY KEY (forumTopicID)
															)
															ENGINE=MyISAM";
															
		mysql_query($sql, $db) or die(mysql_error($db));
		
		//forum
		$sql = "CREATE TABLE IF NOT EXISTS tblForum (forumID INTEGER NOT NULL AUTO_INCREMENT,
															forumTopicID INTEGER NOT NULL,
															postedByID INTEGER NOT NULL,
															postedMessage VARCHAR(5000) NOT NULL,
															PRIMARY KEY (forumID)
															)
															ENGINE=MyISAM";
															
		mysql_query($sql, $db) or die(mysql_error($db));
		
		//article
		$sql = "CREATE TABLE IF NOT EXISTS tblArticles (articleID INTEGER NOT NULL AUTO_INCREMENT,
															
															title VARCHAR(100) NOT NULL,
															body VARCHAR(5000) NOT NULL,
															author VARCHAR(30) NOT NULL,
															PRIMARY KEY (articleID)
															)
															ENGINE=MyISAM";
															
		mysql_query($sql, $db) or die(mysql_error($db));
		
		
		//forum users
		$sql = "CREATE TABLE IF NOT EXISTS tblForumUsers (userID INTEGER NOT NULL AUTO_INCREMENT,
															
															username VARCHAR(50) NOT NULL,
															password VARCHAR(50) NOT NULL,
															passport VARCHAR(20) NOT NULL,
															email VARCHAR(50) NOT NULL,
															PRIMARY KEY (userID)
															)
															ENGINE=MyISAM";
															
		mysql_query($sql, $db) or die(mysql_error($db));
		
		
		//Admin users
		$sql = "CREATE TABLE IF NOT EXISTS tblAdmin(userID INTEGER NOT NULL AUTO_INCREMENT,
															
															username VARCHAR(50) NOT NULL,
															password VARCHAR(50) NOT NULL,
															
															PRIMARY KEY (userID)
															)
															ENGINE=MyISAM";
															
		mysql_query($sql, $db) or die(mysql_error($db));
		
		
		//enquiries
		$sql = "CREATE TABLE IF NOT EXISTS tblEnquiry (enquiryID INTEGER NOT NULL AUTO_INCREMENT,
															
															email VARCHAR(50) NOT NULL,
															enquiry VARCHAR(500) NOT NULL,
															status INTEGER NOT NULL,
															
															PRIMARY KEY (enquiryID)
															)
															ENGINE=MyISAM";
															
		mysql_query($sql, $db) or die(mysql_error($db));
		
		$sql = "SELECT * FROM tblArticles";
		$result = mysql_query($sql, $db) or die(mysql_error($db));
		
		if(mysql_num_rows($result) < 1)
		{
			$sql = "INSERT INTO tblArticles (title, body, author) VALUES('And God Became a Mathematician','Science has always been a fascinating venture, with its never-ending quest for knowledge and exciting opportunities for stunning discoveries. It began in prehistoric times with ancient greats such as Egypt and Mesopotamia holding sway and has not let up on inundating us with loads and loads of ideas: from the spectacular to the controversial; from that which saves lives to the lethal contraptions of strife and warfare, science has come a long way.','Edidiong Esara'),
						('Where was God when you failed?','Incredible! Staring at the screen with mounting expectation and wishing my eyes were playing a fast one on me didn’t seem good enough to change this reality. Again and again, I scrolled up and down the web page, hoping to see some consolation. There was none. No choice I had but to face it: I had failed! The weeks preceding this competition were doused in anticipation. I had stressed and strained myself in preparation. I studied, thought, wrote, and prayed. The first prize was good dough – some seven hundred and fifty thousand bucks. Added to the national acclaim attached, this wasn’t worth losing.','Edidiong Esara'),
						('A Corper’s Musings On 2011 Elections','I know not why and yet it happens that I get excited by news that corps members like me will form the bulk of electoral officers in next year’s polls. Pleasure in a measure arouses me to think of playing an important role in power transition that has been one of the most thorny issues in our democratic experience.','Edidiong Esara')";
			$result = mysql_query($sql, $db) or die(mysql_error($db));
		
		}
		
											
?>