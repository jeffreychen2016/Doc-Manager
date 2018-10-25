<?php
include 'process.php';
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
<body>
	<div id="main-container">
		<nav class="navbar navbar-inverse">
			<div class="container-fluid">
				<div class="navbar-header">
					<a class="navbar-brand" href="#">Docs Storage</a>
				</div>
				<ul class="nav navbar-nav">
					<?php
						generatingDirectoriesInNav();
					?>
				</ul>		
			</div>
		</nav>

		<div class="result">
			<!-- side bar secion -->
			<div class="sidebar">
				<ul>
					<li>
						<a href=<?php getLinksForDownladingDocx() ?> class="sidebar-icon sidebar-icon-label" download><span class="glyphicon glyphicon-download-alt sidebar-icon"></span>Download</a>
					</li>
					<li>
						<a href="#" class="sidebar-icon sidebar-icon-label" id="upload_btn"><span class="glyphicon glyphicon-upload sidebar-icon"></span>Upload</a>
					</li>
					<li>
						<a href="mailto:jchen@comdata.com" class="sidebar-icon sidebar-icon-label"><span class="glyphicon glyphicon-envelope sidebar-icon"></span>Email</a>
					</li>
					<li>
						<a href="http://localhost/Comdata_Prod/phpmyfaq/index.php" class="sidebar-icon sidebar-icon-label" target="_blank"><span class="glyphicon glyphicon-question-sign sidebar-icon"></span>F.A.Q</a>
					</li>
					<li>
						<a href="#" class="sidebar-icon sidebar-icon-label" id="SQL_convertor_btn"><span class="glyphicon glyphicon-wrench sidebar-icon"></span>SQL Convertor</a>
					</li>
					<!-- <li><a class="glyphicon glyphicon-envelope" href="mailto:jchen@comdata.com"></a></li> -->
				</ul>
			</div>
			<a class="btn-open-side-bar">
				<span class="glyphicon glyphicon-menu-hamburger"></span>
			</a>
			<!-- iframe section -->
 			<div id="iframe-container">
				<?php
					if (!empty(key($_GET)) && (key($_GET) != 'msg')) 
					{
						// (key($_GET) = file name without extension
						// it is the one in url filename=true
						openPDF($_GET['directoryName'],$_GET['fileName']);
					}
				 ?>
			</div>
			<!-- iframe section end -->
			<!-- SQL Convertor -->
			<div id="SQL_convertor_container">
				<textarea id="SQL_convertor_textarea"></textarea>
				<label>Batch Number: </label><input type="text" name="" id="input_batch_number">
				<label>Tenant ID: </label><input type="text" name="" id="input_tenant_id">
				<input type="submit" name="submit" value="Convert->SQLyog" id="convert-btn">
				<input type="submit" name="submit" value="Copy" id="copy-btn">
				<input type="submit" name="submit" value="Reverse->ET" id="reverse-btn">
			</div>
			<!-- SQL Convertor end -->
		</div>
		<div id="upload_window">
			<form action="process.php" method="post" enctype="multipart/form-data" id="file_upload_form">
				 <h1>Upload your file using this form:</h1>
				 <input type="hidden" name="MAX_FILE_SIZE" value="300000">
				 <p><input type="file" name="the_file" id="choose_file_btn"></p>
				 <label for="choose_file_btn" class="btn btn-info">Please choose a file to upload</label>
				 <span id="file_selected">No file selected</span>
				 <div id="categories">
					 <?php
						buildDomStringForDirectoryDropDown();
					 ?>
				 </div>
				 <span id="directory_selected">No directory selected</span>
				 <p><input type="submit" name="submit_upload_file" value="Upload This File" id="upload_this_file"></p>
				 <?php 
				 	if (isset($_GET['msg'])) 
				 	{
				 		$response_code = $_GET['msg'];
				 		if ($response_code == 1) 
				 		{
				 			print '<p class="success_message">Your file was uploaded succesfully!</p>';
				 		} else {
							print '<p class="failure_message">Something is broken, failed to upload!</p>';
						}
					}
				 ?>
			</form>
		</div>
		<div id="doc_manager_container">
			<h2 id="doc_manager_title">Doc Manager</h2>
			<div id="doc_manager_wrapper">
				<div id="directory_manager">
					<h3 class="sub_title">Directories</h3>
					<form action="process.php" method="post" enctype="multipart/form-data" id="directory_manager_form">
						<?php
							listAllDirectories();
						?>
					</form>
					<div class="doc_manager_btn_group">
						<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Add</button>
						<button type="button" class="btn btn-primary">Edit</button>
						<button type="button" class="btn btn-primary">Delete</button>
					</div>
				</div>
				
				<div id="arrow_sign">
						
				</div>

				<div id="file_manager">
					<h3 class="sub_title">Files</h3>
					<form action="process.php" method="post" enctype="multipart/form-data" id="directory_manager_form">

					</form>
					<div class="doc_manager_btn_group">
						<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Primary</button>
						<button type="button" class="btn btn-primary">Primary</button>
						<button type="button" class="btn btn-primary">Primary</button>
					</div>
				</div>
			</div>
		</div>


		<div id="footer">
			
		</div>
		<!-- Create Directory Modal -->
		<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			<form action="process.php" method="post" id="create_directory_form">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<h4 class="modal-title" id="myModalLabel">Add Directory</h4>
						</div>
						<div class="modal-body">
							<label for="add_directory_name">Directory Name</label>
							<input type="text" id="add_directory_name" name="directory_name">
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
							<input type="submit" class="btn btn-primary"  name="submit_create_directory" value="Add Directory"></input>
							<!-- <button name="submit_create_directory" class="btn btn-primary" id="submit_file_name"></button> -->
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>

	<!--CSS,JQuery,JS -->
	<script
	  src="https://code.jquery.com/jquery-3.2.1.min.js"
	  integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
	  crossorigin="anonymous"></script>
	<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<!-- My CSS -->
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<script type="text/javascript" src="js/js.js"></script>	  
</body>
</html>