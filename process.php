<?php
	// error_reporting(0);
	function openPDF(){
		if (isset($_GET['ET_Template']))
		{
			$file = array_keys($_GET)[1];
			$filename = $file . '.txt';		
			echo "<div class='iframe'>Your file is ready to be downloaded here:<br>
							<a href='Default_Export_Templates/" . $filename . "' download>". $filename . "</a>
						</div>";
		}
		else
		{
			$file = key($_GET);
			$filename = $file . '.pdf';
			// echo '<iframe class="iframe" src="docs/' . $filename . '"' . '></iframe>';
			echo '<iframe class="iframe" src="docs/Example.pdf"></iframe>';
		};
	};

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
		};
	};

	function readDirecotries(){
		$dir = 'C:\\xampp\\htdocs\\Comdata_Prod\\docs\\';
		$files1 = array_slice(scandir($dir),2);
		$domString = '';
		$domString .= '<select id="file_destination" name="file_destination_dropdown">';

		for ($i = 0; $i < count($files1); $i++ ) {
			$domString .= '<option value="' . $files1[$i] . '">' . ($files1[$i]) . '</option>';
		};

		$domString .= '</select>';
		echo $domString;
	};

	// function validateFileFormat(file) {

	// };

	if (isset($_POST['submit'])) 
	{	
		$target_dir = 'C:\\xampp\htdocs\\Comdata_Prod\\docs\\' . $_POST['file_destination_dropdown'] . '/';
		$target_file = $target_dir . basename($_FILES["the_file"]["name"]);
		// $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    if (move_uploaded_file($_FILES["the_file"]["tmp_name"], $target_file)) {
			echo "The file ". basename( $_FILES["the_file"]["name"]). " has been uploaded.";
		} else {
			echo "Sorry, there was an error uploading your file.";
		};
	};
?>