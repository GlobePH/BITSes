<?php

class side_nav{
	function __construct(){

		$c_id = $_SESSION['C_ID'];

		$db = new database();

		$query=$db->query("SELECT C_firstname, C_lastname from commuter where C_ID = $c_id");

		$result_array = $query->fetch_array();
		$firstname = $result_array['C_firstname'];
		$lastname = $result_array['C_lastname'];

		echo '
		<script type="text/javascript" src="js/jquery-3.1.0.min.js"></script>
    	<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
	    <script type="text/javascript" src="js/materialize.min.js"></script>
	    <script type="text/javascript" src="js/script.js"></script>
	    <script type="text/javascript" src="js/modal.js"></script>
	    <script type="text/javascript" src="js/side-nav.js"></script>
	    <script type="text/javascript" src="js/init.js"></script>

		<ul id="slide-out" class="side-nav">
			<li><a href="welcome.php">Home</a></li>
		    <li><a href="editprofile.php">'.$firstname." ".$lastname.'</a></li>
		    <li><a href="ticket.php">Tickets</a></li>
		    	
		    <li><a href="usedticket.php">History</a></li>
		    <li><a href="help.php">Help</a></li>
		    <li><a href="#"></a></li>
		    <li><a href="sign_out.php">Logout</a></li>
		</ul>
		';
	}
}
?>