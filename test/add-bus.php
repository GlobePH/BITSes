<?php require 'db.php'; ?>

<form>
	<input type="text" name="name" value="" class="inputs" />
	<input type="text" name="bus_number" value="" class="inputs" />
	<input type="text" name="bus_number" value="" class="inputs" />

	<?php
		$query = $db->query("SELECT * FROM `routes`");
		$routes = array();
		while($row = $query->fetch_array()){
			$routes[] = $row;
		}
	?>
	<select>
	<?php
		foreach($routes as $route):
			echo "<option value='".$route['id']."'>".$route['route']."</option>";
		endforeach; 
	?>
	</select>
	<input />
</form>