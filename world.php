<style>
	table, th, td {
    border: 1px solid black;
    border-collapse: collapse;
	}
tr:nth-child(even){
		background-color: white;
	}

tr:nth-child(odd){
		background-color: #f7fafc;
	}
</style>

<?php
$host = getenv('IP');
$username = 'lab5_user';
$password = 'password123';
$dbname = 'world';
$country = (isset($_GET['country']) ? $_GET['country']:null);
$context = (isset($_GET['context']) ? $_GET['context']:null);
$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);

// $stmt1= $conn->query("SELECT c.name as city, c.district, c.population FROM cities c JOIN countries cs ON c.country_code=cs.code WHERE cs.name like '%$country%'");

// $results = $stmt1->fetchAll(PDO::FETCH_ASSOC);


if (isset($country)==true && isset($GET_['context'])==false){
	$stmt = $conn->query("SELECT * FROM countries WHERE name LIKE '%$country%'");
	$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

	echo "<table>
	 <tr>
	    <th>Name</th>
	    <th>Continent</th>
	    <th>Independence</th>
	    <th>Head of State</th>
	 </tr>";
	  
	foreach ($results as $row){

		 echo "<tr>";
		 echo 	"<td>".$row['name']."</td>";
		 echo  	"<td>".$row['continent']."</td>";
		 echo  	"<td>".$row['independence_year']."</td>";
		 echo  	"<td>".$row['head_of_state']."</td>";
		 echo "</tr>";
		 }  

		echo "</table>";

}elseif (isset($country)==true && isset($GET_['context'])==true) {
	$stmt= $conn->query("SELECT c.name as city, c.district, c.population FROM cities c INNER JOIN countries cs ON c.country_code=cs.code WHERE cs.name LIKE '%$country%'");
	$results = $stmt->fetchAll(PDO::FETCH_ASSOC);


	echo "<table>
	<tr>
		<th>Name</th>
		<th>District</th>
		<th>Population</th>
	</tr>";

	foreach ($results as $row){
		// echo "<tr><td>" .$row['city']. "</td><td>".$row['district']."</td><td>".$row['population']."</td></tr>";
		 echo "<tr>";
		 echo 	"<td>".$row['city']."</td>";
		 echo  	"<td>".$row['district']."</td>";
		 echo  	"<td>".$row['population']."</td>";
		 echo "</tr>";
	}
	echo "</table";
// }else {
// 	echo "0 Results Found";
// }
}

