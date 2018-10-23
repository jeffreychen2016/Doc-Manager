<?php
	function openPDF($direcotry,$filename){
		// the space in the filename is changed to _ (underscore) for some reason
		// so in order to natch the file name, replace the _ with empty
		echo '<iframe class="iframe" src="docs/'. $direcotry . '/' . str_replace('_',' ',$filename) . '.pdf' . '"' . '></iframe>';
	};

	function getLinksForDownladingDocx(){
		if (isset($_GET['directoryName']))
		{
			$direcotryName = $_GET['directoryName'];
			$file = $_GET['fileName'];
			$fileName = $file . '.pdf';
			echo '"docs\\' . $direcotryName . '\\' . $fileName . '"';
		} else {
			echo '""';
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

	function generatingDirectoriesInNav(){
		$dir = 'C:\\xampp\\htdocs\\Comdata_Prod\\docs\\';
		$direcotries = array_slice(scandir($dir),2);
		$domString = '';

		for ($i = 0; $i < count($direcotries); $i++ ) {
			$domString .= '<li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">' . $direcotries[$i] . '<span class="caret"></span></a>';
			$domString .= generatingFilesInEachDirectory($direcotries[$i]);
			$domString .= '</li>';
		};

		echo $domString;
	};

	function generatingFilesInEachDirectory($directoryName){
		$dir = 'C:\\xampp\\htdocs\\Comdata_Prod\\docs\\'. $directoryName . '\\';
		$files = array_slice(scandir($dir),2);
		$domString = '';
		$domString .= '<ul class="dropdown-menu">';

		for ($i = 0; $i < count($files); $i++ ) {
			$fileNameWithoutExtension = pathinfo($files[$i],PATHINFO_FILENAME);
			// add both direcotry name and file name to the url
			// get click on the link, get request sent, the url will have both directory and file name for later retireving file back
			$domString .=	'<li><a href="index.php?' . 'directoryName=' . $directoryName . '&' .'fileName=' . $fileNameWithoutExtension . '" class="open-pdf-iframe">' . $fileNameWithoutExtension . '</a></li>';
		}

		$domString .= '</ul>';
		return $domString;
	};

	function uploadFile(){
		if (isset($_POST['submit'])) 
		{	
			$target_dir = 'C:\\xampp\htdocs\\Comdata_Prod\\docs\\' . $_POST['file_destination_dropdown'] . '\\';
			$target_file = $target_dir . str_replace('_','-',basename($_FILES["the_file"]["name"]));
			$message = 0;
	
			if (move_uploaded_file($_FILES["the_file"]["tmp_name"], $target_file)) {
				$message = 1;
			} else {
				$message = 0;
			};
			header('Location: index.php?msg=' . $message); 
		};
	};

	uploadFile();
?>