<!-- Author: Junhan Liu
	Student number: 7228243
	CSI2132 project
	created: 2017-03-30
	Any reuse of the code must be notified by Junhan Liu
	and must be granted by the author
-->

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>All Chef</title>
<link href="css/style.css" rel="stylesheet" type="text/css">
<link href="css/button.css" media="all" rel="stylesheet" type="text/css" />
<style>
	body{
		font-style: italic;
		font-size: 12pt;
		font-weight: bold;
	}

	</style>

</head>
<body>

<div class ="banner">
	<center><img src="images/foodBanner.jpg" width="100%" height="227" alt=""/></center>
</div>

<div class = "search d2">
	<center>
	<a class="green button" href="adminPage.html">DBA Page</a>
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	
	<form method = "post">
		<input type = "text" name="userid" value="Enter User ID to Delete">
		<button type ="submit" ></button>
	</form>
</center>
</div>

<center>
	<table style="border:dotted;border-color:#F06">
	<caption>All Chef</caption>
	<br><br>
	<tr><th>Chef ID</th>
		<th></th>
		<th>NAME</th>
	  	<th>Birth Date</th>
		</tr>
	<?php
	
		$myname="jliu187";
		$pass="J.jjj.12";
		$host="web0.site.uottawa.ca";  
		$port="15432";
		$dbconn = pg_pconnect("host=$host port=$port dbname=$myname user=$myname password=$pass")     
		or die('Could not connect: ' . pg_last_error());
		
		$queryofmeal = "select*from PROJECT.chef";
		$resultofmeal = pg_query($queryofmeal)
				or die('Query2 failed: ' . pg_last_error());

		
		while($row=pg_fetch_assoc($resultofmeal)){
				
				 echo"<tr>
				 <td>".$row["user_id"]."</td>
				 <td></td>
				 <td>".$row["name"]."</td>
				 <td>".$row["birth_date"]."</td>
				 </tr>";
			
			}
		
		@ $userid = $_POST['userid'];
		$query = "delete from project.chef where user_id = '$userid'";
		@ pg_query($query);
		
		pg_free_result($resultofmeal);
		pg_close($dbconn);

		?>


</body>
</html>