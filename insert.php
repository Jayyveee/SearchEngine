<!DOCTYPE html>
<html>
<head><title> Search Engine Application </title>
<style type = "text/css">
body{
	background-color: #454545;
}
form{
margin: 15%
}
table{
	table-layout: auto;
	background-color: #999999;
	width: 100%;
	border: 2px solid black;
}
td{
	border: 1px solid black;
}

</style>
</head>
<body>
	<form method="post" action="insert.php" enctype = "multipart/form-data">
	<table cellspacing= "8" align = "center">
	
	<tr>
		<td colspan ="6" align = "center"><h1>NEW WEBSITE:<h1></td>
	</tr>
	<tr>
		<td align = "center"><strong>SITE TITLE</strong></td>
		<td><input type = "text" name = "site_name" required /></td>
	</tr>
	<tr>
		<td align = "center"><strong>SITE LINK </strong></td>
		<td><input type = "text" name = "site_link" required /></td>
	</tr>
	<tr>
		<td align = "center"><strong>SITE KEYWORDS</strong></td>
		<td><input type = "text" name = "site_keywords" required /></td>
	</tr>
	<tr>
		<td align = "center"><strong>SITE DESCRIPTION</strong></td>
		<td><textarea cols="25" rows="10" name = "site_description" required></textarea></td>
	</tr>
	<tr>
		<td align = "center"><strong>SITE IMAGE</strong></td>
		<td><input type = "file" name = "site_image" required /></td>
	</tr>
	</table>
	<br>
	<div align = "center" ><input type = "submit" name = "submit" value = "Add the new site!" />
	</div>
	</form>
	
	
</body>
</html>

	<?php
		$server_name = "localhost";
		$mysql_user = "root";
		$mysql_pass = "root";
		$db_name = "search";
		$conn = mysqli_connect($server_name,$mysql_user,$mysql_pass,$db_name);
		if(!$conn) {
			echo "Database connection failed: " . mysqli_connect_error();
		}
		else{
			echo "Database running successfully";
		}
		
		if(!$db_select) {
			die("Database selection failed: " . mysqli_error());
		}
		if(isset($_POST['submit'])){
			$site_name = $_POST['site_name'];
			$site_link = $_POST['site_link'];
			$site_keywords = $_POST['site_keywords'];
			$site_description = $_POST['site_description'];
			$site_image = $_FILES['site_image']['name'];
			$site_image_tmp = $_FILES['site_image']['tmp_name'];
				
			
		
			$insert_query = "insert into sites(site_name,site_link,site_keywords,site_description,site_image) values('$site_name','$site_link','$site_keywords','$site_description','$site_image')";
			move_uploaded_file($site_image_tmp,"Files/{$site_image}");
			
			if(mysqli_query($insert_query)){
				echo "<script> alert('WEBSITE DETAILS ADDED SUCCESSFULLY')</script>";
			}

		}
	?>