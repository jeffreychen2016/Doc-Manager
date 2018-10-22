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
					<li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Export Guide<span class="caret"></span></a>
						<ul class="dropdown-menu">
							<li><a href="index.php?sage=true" class="open-pdf-iframe">Sage</a></li>
							<li><a href="index.php?viewpoint=true" class="open-pdf-iframe">ViewPoint</a></li>
							<li><a href="index.php?spectrum=true" class="open-pdf-iframe">Spectrum</a></li>
							<li><a href="index.php?cmic=true" class="open-pdf-iframe">CMiC</a></li>
							<li><a href="index.php?cgc=true" class="open-pdf-iframe">CGC</a></li>
						</ul>
					</li>
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
						<a href="#" class="sidebar-icon sidebar-icon-label"><span class="glyphicon glyphicon-upload sidebar-icon" id="upload_btn"></span>Upload</a>
					</li>
					<li>
						<a href="mailto:jchen@comdata.com" class="sidebar-icon sidebar-icon-label"><span class="glyphicon glyphicon-envelope sidebar-icon"></span>Email</a>
					</li>
					<li>
						<a href="http://localhost/Comdata_Prod/phpmyfaq/index.php" class="sidebar-icon sidebar-icon-label" target="_blank"><span class="glyphicon glyphicon-question-sign sidebar-icon"></span>F.A.Q</a>
					</li>
					<li>
						<a href="#" class="sidebar-icon sidebar-icon-label"><span class="glyphicon glyphicon-wrench sidebar-icon" id="SQL_convertor_btn"></span>SQL Convertor</a>
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
						openPDF();
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
				 <p>Upload a file using this form:</p>
				 <input type="hidden" name="MAX_FILE_SIZE" value="300000">
				 <p><input type="file" name="the_file" id="choose_file_btn"></p>
				 <label for="choose_file_btn" class="btn btn-info">Please choose a file to upload</label>
				 <span id="file_chosen_span">No file chosen</span>
				 <p><input type="submit" name="submit" value="Upload This File" id="upload_this_file"></p>
				 <?php  
				 	if (isset($_GET['msg'])) 
				 	{
				 		$response_code = $_GET['msg'];
				 		if ($response_code == 1) 
				 		{
				 			print '<p>Your file was uploaded succesfully!</p>';
				 		}
				 	}
				 ?>
			</form>
		</div>

		<div id="footer">
			
		</div>
	</div>


	<!--CSS,JQuery,JS -->
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script
	  src="https://code.jquery.com/jquery-3.2.1.min.js"
	  integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
	  crossorigin="anonymous"></script>
	<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<!-- My CSS -->
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<script type="text/javascript" src="js/js.js"></script>	  
</body>
</html>