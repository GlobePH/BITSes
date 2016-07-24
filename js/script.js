$(document).ready(function(){
	
	Materialize.updateTextFields();

	$(".dropdown-button").dropdown();
	$(".button-collapse").sideNav();
	$(document).ready(function(){
	    $('.modal-trigger').leanModal();
	});

	//Materialize.toast
	$('select').material_select();
	$(document).on("submit", "#FormRegister", register_user);
	$(document).on("submit", "#loginForm", login);
	$(document).on("submit", "#dest_form", get_dest);
	$(document).on("change", "#route", select_pickup);
	$(document).on("change", "#pick_up", select_dest);
	$(document).on("click", "#ticket_submit", submit_ticket);
	$(document).on("submit", "#validateTicket", validate_ticket);


});

function validate_ticket(e){
	e.preventDefault();
	e.stopPropagation();
	$.ajax({
		url: "validate_ticket.php",
		type: "post",
		data: $(this).serialize(),
		success: function(response){
			console.log(response)
		}
	});
}

function submit_ticket(e){
	e.preventDefault();
	e.stopPropagation();
	$.ajax({
		url: "exec/submit_ticket_exec.php",
		type: "post",
		data: $("#ticket_submit").serialize(),
		success: function(response){
			window.location.href="ticket.php";

		}
	});
}
function select_dest(){
	var id = $(this).val();
	$.ajax({
		url: "exec/select_dest_exec.php",
		type: "post",
		data: {"id":id},
		success: function(response){
			$("#dest").html(response);
			$('select').material_select();
		}
	});
}

function select_pickup(){
	var id = $(this).val();
	$.ajax({
		url: "exec/welcome_exec.php",
		type: "post",
		data: {"id":id},
		success: function(response){
			$("#pick_up").html(response);
			$('select').material_select();
		}
	});
}

function get_dest(e){
	e.preventDefault();
	e.stopPropagation();
	$.ajax({
		url: "exec/ticket_exec.php",
		type: "post",
		data: $(this).serialize(),
		success: function(response){
			window.location.href="welcome.php";
		}
	});
}

function login(e){
	e.preventDefault();
	e.stopPropagation();
	$.ajax({
		url: "exec/login_exec.php",
		type: "post",
		data: $(this).serialize(),
		success: function(response){
			if(response=="success"){
				window.location.href="welcome.php";
			}else if(response=="success_kon"){
				window.location.href="welcomekonduktor.php";
			}else{
				window.location.href="index.php";
			}
		}
	});
}

function register_user(e){
	e.preventDefault();
	e.stopPropagation();

	$.ajax({
		url: "register_user.php",
		type: "post",
		data: $(this).serialize(),
		success: function(response){
			window.location.href=response;
		}
	});
}

$('.dropdown-button').dropdown({
      inDuration: 300,
      outDuration: 225,
      constrain_width: false, // Does not change width of dropdown to that of the activator
      hover: true, // Activate on hover
      gutter: 0, // Spacing from edge
      belowOrigin: false, // Displays dropdown below the button
      alignment: 'left' // Displays dropdown with edge aligned to the left of button
    }
  );