<!-- 
	CSI2132 project
	created: 2017-03-30
	Any reuse of the code must notify the author
	and must be granted by the author
-->

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>AllFood</title>
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

<div class="foodcontent">
	<div class = "search d2">
	<center>
	<a class="green button" href="adminPage.html">DBA Page</a>
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	
	<form method = "post">
		<input type = "text" name="foodid" value="Food ID to Add New Food">
		<input type = "text" name="foodname" value="Food Name">
		<input type = "text" name="price" value="Price">
		<input type = "text" name="quantity" value="Quantity">
		<input type = "text" name="threshold" value="Threshold">
		<input type = "text" name="category" value="Category">
		<button type ="submit" ></button>
	</form>
	
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<form method = "post">
		<input type = "text" name="count" value="Update Quantity to a Existing Food">
		<input type = "text" name="foodid2" value="Food ID">
		<button type ="submit" ></button>
	</form>
	
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<form method = "post">
		<input type = "text" name="price2" value="update price to a Existing Food">
		<input type = "text" name="foodid3" value="Food ID">
		<button type ="submit" ></button>
	</form>
</center>
</div>

<center><table style="border:dotted;border-color:#F06">
	<caption>Food in the fridge</caption>
	<br><br>
<tr><th>ID</th>
		<th>NAME</th>
		<th>PRICE</th>
		<th></th><th></th><th></th><th></th><th></th><th></th><th></th>
		<th></th><th></th><th></th><th></th><th></th><th></th>
		<th>QUANITTY</th>
		<th></th><th></th><th></th><th></th><th></th><th></th><th></th>
		<th></th><th></th><th></th><th></th><th></th><th></th>
		<th>CATEGORY</th></tr>
		</center>
		


  <?php
		
		$myname="";
		$pass="";
		$host="";  
		$port="";
		$dbconn = pg_pconnect("host=$host port=$port dbname=$myname user=$myname password=$pass")     
		or die('Could not connect: ' . pg_last_error());
		
			$queryoffood = "select *from PROJECT.food order by food_id";
	
			$resultoffood = pg_query($queryoffood)
				or die('Query failed: ' . pg_last_error());
		
			while($row=pg_fetch_assoc($resultoffood)){
				
				 echo"<tr>
				 <td>".$row["food_id"]."</td>
				 <td>".$row["food_name"]."</td>
				 <td>".$row["price"]."</td>
				 <td></td><td></td><td></td><td></td><td></td><td></td><td></td>
				 <td></td><td></td><td></td><td></td><td></td><td></td>
				 <td>".$row["count"]."</td>
				 <td></td><td></td><td></td><td></td><td></td><td></td><td></td>
				 <td></td><td></td><td></td><td></td><td></td><td></td>
				 <td>".$row["category"]."</td>
				 </tr>";
			
			}
		
		
		// @ this simple stops from giving  
		// "Notice: Undefined index: getfood in C:\wamp64\www\program\detail.php on line 88"
		//warning
		
		// get food out of the fridge and update database
		// double click the GETFOOD button to update the database
		@ $foodid = $_POST['foodid']; 
		@ $foodname = $_POST['foodname']; 
		@ $price = $_POST['price']; 
		@ $quantity = $_POST['quantity']; 
		@ $threshold = $_POST['threshold']; 
		@ $category = $_POST['category']; 
	
		$query = "insert into project.food 
					values($foodid, '$foodname',$price, $quantity, $threshold, '$category')";
	
			if( @ pg_query($query) ){
				$_POST['getfood'] = "";
			
			}
		//end 
	
		@ $foodid2 = $_POST['foodid2']; 
		@ $count = $_POST['count']; 
		$updateQuery = "update project.food set count = $count where food_id = $foodid2";
		
		@ pg_query($updateQuery);
	
		@ $foodid3 = $_POST['foodid3']; 
		@ $price2 = $_POST['price2']; 
		$updateQuery = "update project.food set price = $price2 where food_id = $foodid3";
		
		@ pg_query($updateQuery);
			
			pg_free_result($resultoffood);

			// Closing connection	
			pg_close($dbconn);
   ?>
  </div>
  </div>

</body>
</html>
