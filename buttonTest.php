<html> 
	<head>
		<style type='text/css'>
		
			.myButton
					{
					
						background-color:green;
						-moz-border-radius: 20px;
						-webkit-border-radius: 20px;
						border-radius:20px;
						display:ouset-block;
						padding: 10px 10px;
						cursor:pointer;
						margin-top:0;border-top-right-radius:0;border-top-left-radius:0
					}
			.myButton:hover
					{
					
						background-color:WHITE;
						border-top: 2px solid blue;
						
					}
			.myButton:active
					{
					
						position:relative;
						top:2px;
					}
		</style>
		<script type='text/javascript'>
			function TestPrompt()
			{
				var email = prompt("What is your name?","Title Of Prompt");
				//daddonyone@gmail.com
				var starting = "This is my split function at work";
				//alert(starting);
				//var gmail = email.substring(starting + 1);
				//alert(gmail);
				var arrayList = starting.split("a b cdefghijklmnopqrstuvwxyz");
				for(var i = 0; i < arrayList.length; i++)
				{
					alert(arrayList[i]);
				}
			}
		</script>
	</head>
	<body>
	
		<table>
			<tr>
				<td class='mybutton' onclick='TestPrompt()'>
					Send
				</td>
			</tr>
		</table>
	</body>
</html>