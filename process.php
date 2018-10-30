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
		$domString .= '<select name="selected_directory_to_delete" size="10" id="doc_manager_dir_list">';

		for ($i = 0; $i < count($directories); $i++ ) {
			$domString .= '<option class="list_of_directory" value="'. $directories[$i] . '">'. $directories[$i] . '</option>';
		};

		$domString .= '</select>';

		echo $domString;
	};

	function uploadFile(){
		if (isset($_POST['submit_upload_file'])) 
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
		if (isset($_POST['submit_create_directory'])) {
			$directoryName = $_POST['add_directory_name'];
			mkdir(".\\docs\\" . $directoryName, 0700, false);
			header('Location: index.php'); 
		}
	}

	function deleteDirectory(){
		if (isset($_POST['selected_directory_to_delete'])) {
			$path = '.\\docs\\' . $_POST['selected_directory_to_delete']; 
			$files = glob($path . '/*');
			//remove files in side the directory
			foreach ($files as $file) {
				is_dir($file) ? removeDirectory($file) : unlink($file);
			}
			//remove the directory itself
			rmdir($path);

			header('Location: index.php'); 
		}
	}

	function listAllFiles(){
		if (isset($_GET['selectedDir'])) {
			$dir = '.\\docs\\' . $_GET['selectedDir'];
			$files = array_slice(scandir($dir),2);
			$domString = '';
			$domString .= '<select name="selected_file_to_delete" size="10" id="doc_manager_file_list">';
	
			for ($i = 0; $i < count($files); $i++ ) {
				$domString .= '<option class="list_of_file" value="'. $files[$i] . '">'. $files[$i] . '</option>';
			};
	
			$domString .= '</select>';
			// add directory name when generating the list of file, 
			// so when trying to delete a file, I know which dir the file is in
			$domString .= '<input type="text" id="dirForFileDelete" name="dirForFileDelete" value="' . $_GET['selectedDir'] . '" hidden>';
			echo $domString;
		}
	}

	function deleteFiles(){
		if (isset($_POST['selected_file_to_delete'])) {
			$path = '.\\docs\\' . $_POST['dirForFileDelete']; 
			$fileToDelete = $path . '\\' . $_POST['selected_file_to_delete'];
			unlink($fileToDelete);
			header('Location: index.php'); 
		} 
	}

	function renameDir(){
		if (isset($_POST['submit_edit_directory'])) {
			$originalDirName = '.\\docs\\' . $_POST['selected_dir_for_renaming'];
			$newDirName = '.\\docs\\' . $_POST['edit_directory_name'];

			rename($originalDirName, $newDirName);
			header('Location: index.php'); 
		} 
	}

	function renameFile(){
		if (isset($_POST['submit_edit_file'])) {
			// $originalFileName = '.\\docs\\' . $_POST['selected_dir_name'] . '\\';
			$originalFileName = '.\\docs\\' . $_POST['selected_dir_name'] . '\\' . $_POST['selected_file_for_renaming'];
			$newFileName = '.\\docs\\' . $_POST['selected_dir_name'] . '\\' . $_POST['edit_file_name'];

			rename($originalFileName, $newFileName);
			header('Location: index.php'); 
		} 
	}


	uploadFile();
	createNewDirectory();
	deleteDirectory();
	listAllFiles();
	deleteFiles();
	renameDir();
	renameFile();
?>