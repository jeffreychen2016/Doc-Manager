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

	function getDirectories(){
		$dir = '.\\docs\\';
		$directories = array_slice(scandir($dir),2);

		return $directories;
	};

	function buildDomStringForDirectoryDropDown(){
		$directories = getDirectories();
		$domString = '';
		$domString .= '<select id="file_destination" name="file_destination_dropdown">';

		for ($i = 0; $i < count($directories); $i++ ) {
			$domString .= '<option value="' . $directories[$i] . '">' . ($directories[$i]) . '</option>';
		};

		$domString .= '</select>';
		echo $domString;
	};

	function generatingDirectoriesInNav(){
		$directories = getDirectories();
		$domString = '';

		for ($i = 0; $i < count($directories); $i++ ) {
			$domString .= '<li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">' . $directories[$i] . '<span class="caret"></span></a>';
			$domString .= generatingFilesInEachDirectory($directories[$i]);
			$domString .= '</li>';
		};

		echo $domString;
	};

	function generatingFilesInEachDirectory($directoryName){
		$dir = '.\\docs\\'. $directoryName . '\\';
		$files = array_slice(scandir($dir),2);
		$domString = '';
		$domString .= '<ul class="dropdown-menu">';

		for ($i = 0; $i < count($files); $i++ ) {
			$fileNameWithoutExtension = pathinfo($files[$i],PATHINFO_FILENAME);
			// add both direcotry name and file name to the url
			// get click on the link, get request sent, the url will have both directory and file name for later retireving file back
			$domString .=	'<li class="open-pdf-iframe"><a href="index.php?' . 'directoryName=' . $directoryName . '&' .'fileName=' . $fileNameWithoutExtension . '">' . $fileNameWithoutExtension . '</a></li>';
		}

		$domString .= '</ul>';
		return $domString;
	};

	function listAllDirectories(){
		$directories = getDirectories();
		$domString = '';
		$domString .= '<ul id="doc_manager_dir_list">';

		for ($i = 0; $i < count($directories); $i++ ) {
			$domString .= '<li><a name="' . $directories[$i] . '" value="' . $directories[$i] . '">' . $directories[$i] . '</a></li>';
		};

		$domString .= '</ul>';

		echo $domString;
	};

	function uploadFile(){
		if (isset($_POST['submit'])) 
		{	
			$target_dir = '.\\docs\\' . $_POST['file_destination_dropdown'] . '\\';
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

	function createNewDirectory(){
		if (isset($_POST['submit_directory_name'])) {
			echo 'xxxxx';
		}
	}

	uploadFile();
	createNewDirectory();
?>