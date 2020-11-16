<?php
$host = getenv('IP');
$username = 'lab5_user';
$password = 'password123';
$dbname = 'world';
$country = (isset($_GET['country']) ? $_GET['country']:null);
$cities = (isset($_GET['cities']) ? $_GET['cities']:null);

// $country1 = filter_var($_GET['country'], FILTER_SANITIZE_STRING);
$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
$stmt = $conn->query("SELECT * FROM countries WHERE name LIKE '%$country%'");
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>





<table border="5">
 <tr>
    <th>Name</th>
    <th>Continent</th>
    <th>Independence</th>
    <th>Head of State</th>
 </tr>
  
<?php foreach ($results as $row): ?>

 <tr><td><?= $row['name']?></td>
  	<td><?= $row['continent']?></td>
  	<td><?= $row['independence_year']?></td>
  	<td><?= $row['head_of_state']?></td>
 </tr>
  
  
<?php endforeach; ?>
</table>