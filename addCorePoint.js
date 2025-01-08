		function SubmitForm(btnClick)
		{
			//alert('Hi');
			if(btnClick == "Add")
			{
				var isError = false;
				var txtTitle = document.getElementById('txtTitle').value;
				var txtBody =document.getElementById('txtBody').value;
				
				alert(txtTitle);
				if( txtTitle== "") 
				{
					document.getElementById('passportError').innerHTML = '<font color="red" name="Arial" size="6">Title Cannot Be Empty</font>';
					isError = true;
				}
				if(txtBody == "")
				{
					document.getElementById('passportError').innerHTML = document.getElementById('passportError').innerHTML + '<br /><font color="red" name="Arial" size="6">Body Cannot Be Empty</font';
					isError = true;
					//alert(document.getElementById('passportError').innerHTML );
				}
				if(isError == false){
					//document.forms['addCorePoint'].submit();
					
				}
				
			}
			
		}
		
		function MouseOverMenu(mnuOption)
		{
			//alert(document.getElementById(""+mnuOption+"").innerHTML);
			
			document.getElementById(""+mnuOption+"").style.backgroundColor = '#FFBFAA';
		}
		
		
		function MouseOutMenu(mnuOption)
		{
			//alert(document.getElementById(""+mnuOption+"").innerHTML);
			
			document.getElementById(""+mnuOption+"").style.backgroundColor = '#FFDFFF';
		}
		
		
		
		function SetImg()
		{
			document.getElementById("passport").innerHTML = ['<img height="150px" width="200px" class="thumb" src="', 'images/icon_photo.png',
							'" title="', escape("images/icon_photo.png"), '"/>'].join('');
		
		}
		