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
					<li class="active"><a href="#">Home</a></li>
					<li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Export Guide<span class="caret"></span></a>
						<ul class="dropdown-menu">
							<li><a href="index.php?sage=true" class="open-pdf-iframe">Sage</a></li>
							<li><a href="index.php?viewpoint=true" class="open-pdf-iframe">ViewPoint</a></li>
							<li><a href="index.php?spectrum=true" class="open-pdf-iframe">Spectrum</a></li>
							<li><a href="index.php?cmic=true" class="open-pdf-iframe">CMiC</a></li>
							<li><a href="index.php?cgc=true" class="open-pdf-iframe">CGC</a></li>
						</ul>
					</li>
					<li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">ET Setup<span class="caret"></span></a>
						<ul class="dropdown-menu">
							<li><a href="index.php?ETloadexport=true" class="open-pdf-iframe">Export Setup</a></li>
							<li><a href="index.php?ETcreatetenant=true" class="open-pdf-iframe">Tenant Creation</a></li>
						</ul>
					</li>
					<li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">ET SQL<span class="caret"></span></a>
						<ul class="dropdown-menu">
							<li><a href="index.php?ET_SQL_CGC=true" class="open-pdf-iframe">CGC</a></li>
							<li><a href="index.php?ET_SQL_Explorer=true" class="open-pdf-iframe">Explorer</a></li>
							<li><a href="index.php?ET_SQL_Sage300=true" class="open-pdf-iframe">Sage300</a></li>
							<li><a href="index.php?ET_SQL_Spectrum=true" class="open-pdf-iframe">Spectrum</a></li>
							<li><a href="index.php?ET_SQL_Viewpoint=true" class="open-pdf-iframe">Viewpoint</a></li>
						</ul>
					</li>					
					<li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Sync Tool<span class="caret"></span></a>
						<ul class="dropdown-menu">
							<li><a href="index.php?Sync_Tool_User_Guide=true" class="open-pdf-iframe">Sync Tool Setup</a></li>
							<li><a href="User_Guide/user_guide.html" class="open-pdf-iframe" target="_blank">Sync Tool User Guide</a></li>
						</ul>
					</li>
					<li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Sterling Mapping<span class="caret"></span></a>
						<ul class="dropdown-menu">
							<li><a href="index.php?Adding_Trading_Partner=true" class="open-pdf-iframe">Adding Trading Partner</a></li>
							<li><a href="index.php?Adding_User_Account=true" class="open-pdf-iframe">Adding User Account</a></li>
							<li><a href="index.php?Map_Check-In=true" class="open-pdf-iframe">Map Check-In</a></li>
							<li><a href="index.php?Receive_and_Route_Rules=true" class="open-pdf-iframe">Receive and Route Rules</a></li>
							<li><a href="index.php?Export_From_QA_to_Cert=true" class="open-pdf-iframe">Export From QA to Cert</a></li>
						</ul>
					</li>
					<li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Integration<span class="caret"></span></a>
						<ul class="dropdown-menu">
							<li><a href="index.php?VC_Integration_Viewpoint=true" class="open-pdf-iframe">VC_Integration_Viewpoint</a></li>
							<li><a href="index.php?Auto_Reconcile_Viewpoint=true" class="open-pdf-iframe">Auto_Reconcile_Viewpoint</a></li>
							<li><a href="index.php?Setup_FTP_Viewpoint=true" class="open-pdf-iframe">Setup_FTP_Viewpoint</a></li>
						</ul>
					</li>					
					<li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Other Useful Info<span class="caret"></span></a>
						<ul class="dropdown-menu">
							<li><a href="index.php?Pre-Sync_Email_Sample=true" class="open-pdf-iframe">Pre-Sync Email Sample</a></li>
						</ul>
					</li>
					<li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Default Export Templates<span class="caret"></span></a>
						<ul class="dropdown-menu">
							<li><a href="index.php?ET_Template=true&Viewpoint_Single_Header=true" class="open-pdf-iframe">Viewpoint-Single Header</a></li>
							<li><a href="index.php?ET_Template=true&Spectrum_User_Vendor=true" class="open-pdf-iframe">Spectrum-User Vendor</a></li>
							<li><a href="index.php?ET_Template=true&Spectrum_Single_Header=true" class="open-pdf-iframe">Spectrum-Single Header</a></li>
						</ul>
					</li>
				</ul>
				<ul class="nav navbar-nav navbar-right">
					<li><a href="#"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
					<li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
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
<!-- 					<li>
						<a href="#" class="sidebar-icon sidebar-icon-label"><span class="glyphicon glyphicon-upload sidebar-icon" id="upload_btn"></span>Upload</a>
					</li> -->
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
			<!-- <iframe src="docs/sage.pdf" style="width:800px; height:500px;" frameborder="0"></iframe> -->
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
			<div id="SQL_convertor_container">
				<textarea id="SQL_convertor_textarea"></textarea>
				<label>Batch Number: </label><input type="text" name="" id="input_batch_number">
				<label>Tenant ID: </label><input type="text" name="" id="input_tenant_id">
				<input type="submit" name="submit" value="Convert->SQLyog" id="convert-btn">
				<input type="submit" name="submit" value="Copy" id="copy-btn">
				<input type="submit" name="submit" value="Reverse->ET" id="reverse-btn">
			</div>
		</div>
		<div id="upload_window">
			<form action="process.php" method="post" enctype="multipart/form-data">
				 <p>Upload a file using this form:</p>
				 <input type="hidden" name="MAX_FILE_SIZE" value="300000">
				 <p><input type="file" name="the_file"></p>
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