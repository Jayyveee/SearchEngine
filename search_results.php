<!DOCTYPE html>
<html>
<head><title> Search Results </title>
<style type = "text/css">
body{
	background-color: #454545;
}
form{
margin: 3%
}
input{
  width: 100%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
  margin-top: 16px;
  margin-bottom: 16px;
}
input[type=submit] {
  background-color: #4CAF50;
  color: white;
  width: 50%;
}


</style>
</head>
<body>
	<form method="get" action="search_results.php">
	<span><b>Your Keyword:</b><span>
	<input type = "text" name = "user_keywords" required /> 
	<center> <input type = "submit" name = "result" value = "Hunt now"/> </center>
	</form>
	<?php 
		$server_name = "localhost";
		$mysql_user = "root";
		$mysql_pass = "";
		$db_name = "search";
		$conn = mysqli_connect($server_name,$mysql_user,$mysql_pass,$db_name);
		
		if(isset($_GET['Hunt Now']))
		{
			$get_value = $_GET['query'];
			
			$result_query = "select * from sites where site_keywords like '%$get_value%'";
			$run_query = mysql_query($result_query);
			while($row = mysql_fetch_array($run_query))
			{
				$site_name = $row[$site_name];
				$site_link = $row[$site_link];
				// $site_keywords = $row[$site_keywords]; this line not required cuz we don't to show in the results part 
				$site_description = $row[$site_description];
				$site_image = $row[$site_image];


				echo "<div class = 'display'>
					<h2 align ='center'>$site_name</h2>
					<a href = '$site_link' target = '_blank'>$site_link</a>	// blank means opening in a new page
					<p align = 'justify'> $site_description</p>
					<img src = 'Files/$site_image' width = '100' height = '150' >
				</div>";
			}
		}
	?>
</body>
</html>
