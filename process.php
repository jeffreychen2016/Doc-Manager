<?php
// error_reporting(0);

	function openPDF (){
		if (isset($_GET['ET_Template']))
		{
			$file = array_keys($_GET)[1];
			$filename = $file . '.txt';		
			echo "<div class='iframe'>Your file is ready to be downloaded here:<br><a href='Default_Export_Templates/" . $filename . "' download>". $filename . "</a></p></div>";
		}
		else
		{
			$file = key($_GET);
			$filename = $file . '.pdf';
			echo '<iframe class="iframe" src="docs/' . $filename . '"' . '></iframe>';
		}
	}

	function getLinksForDownladingDocx(){
		if (isset($_GET['ET_Template']))
		{
			$file = array_keys($_GET)[1]; //second key in the url
			$filename = $file . '.txt';
			echo '"Default_Export_Templates/' . $filename . '"';			
		}
		else
		{
			$file = key($_GET);
			$filename = $file . '.docx';
			echo '"docs/' . $filename . '"';
		}

	}

	if (isset($_POST['submit'])) 
	{	
		
		$uploaded_filename = $_FILES['the_file']['name'];
		$uploaded_file_extension = end(explode('.', $uploaded_filename));

		//check the uploading file's extension
		if ($uploaded_file_extension == 'docx') 
		{
			//try to move the uploaded file:
			if (move_uploaded_file($_FILES['the_file']['tmp_name'], "docs/{$_FILES['the_file']['name']}")) 
			{
				//copy original file and rename the copy
				$copied_file = "docs/$uploaded_filename" . '-copy';
				copy("docs/$uploaded_filename", $copied_file);

				//get the copied file and change its extension
				rename($copied_file,str_replace(end(explode('.', $copied_file)), 'pdf', $copied_file));
				// echo "$filename_PDF";

				header("Location: index.php?msg=1");
				exit();
			}
			else
			{

				print '<p>Your file could not be uploaded because: ';
				//print a message based upon the error:
				switch ($_FILES['the_file']['error']) 
				{
					case 1:
						print 'The file exceeds the upload_max_filesize setting in php.ini.';
						break;
					case 2:
						print 'The file exceeds the MAX_FILE_SIZE setting in the HTML form.';
						break;
					case 3:
						print 'The file was only partially uploaded.';
						break;
					case 4:
						print 'No file was uploaded.';
						break;
					case 6:
						print 'The temporary folder does not exist.';
						break;							
					default:
						print 'Something unforeseen happened.';
						break;
				print '</p>';
				} //end of move_uploaded_file() IF
			} //end of submission IF		
		} 
		else
		{
			print 'The file must be in .docx format!';
		}//end of checking extension
	}


?>