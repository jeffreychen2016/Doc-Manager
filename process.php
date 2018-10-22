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

		for ($i = 0; $i < count($files1); $i++ ) {
			echo '<label class="single_direcotry">' . ($files1[$i]) . '</label><br>';
		};
	};

	// function validateFileFormat(file) {

	// };

	// if (isset($_POST['submit'])) 
	// {	

	// };
?>