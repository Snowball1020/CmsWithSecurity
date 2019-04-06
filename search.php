<!DOCTYPE html>
<html>
<head>
	<title>Search Results</title>
</head>
<body>
	<?php

		require('db.php');
		$user_search = $_GET['usersearch'];
		$search_words = explode(' ', $user_search);
		$query = "SELECT * FROM user WHERE ";
		$where = "";
		
		foreach($search_words as $word){

			$where = $where. "name LIKE '%$word%' OR ";


		}

		$where = substr($where,0,strlen($where) -4);
		$final_sql = $query . $where;

		$cmd = $db -> prepare($final_sql);
		$cmd -> execute();
		$results = $cmd -> fetchAll();


	echo '<table>
			<thead>
				<th>Name</th>
				<th>Email</th>
				<th>Location</th>
				<th>Picture</th>
				<th>Skill</th>
			</thead>

			<tbody>	';

	foreach($results as $result){
		echo '<tr><td>' . $result['name'] . '</td>';
		echo '<td>' . $result['email'] . '</td>';
		echo '<td>' . $result['location'] . '</td>';
		echo '<td>' . $result['profile'] . '</td>';
		echo '<td>' . $result['skill'] . '</td></tr>';

	}

	echo '</tbody></table>';

	$cmd -> closeCursor();




	?>
</body>
</html>