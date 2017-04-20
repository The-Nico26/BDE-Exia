<script src="js/jquery.js"></script>
<script src="js/site.js"></script>

<div class="background">
	<div class="container"></div>
</div>
<nav>
	<div class="link">
		<a href="?/index"><div>Accueil</div></a>
		<a href="?/events"><div>Evènement</div></a>
		<span class="logo"><img src="img/logo.png"></span>
		<a href="?/assos"><div>Association</div></a>
		<a href="?/shop"><div>Boutique</div></a>
		<?php
			if($_SESSION['token'] == "-1"){
				echo '<a class="connect" onclick="showConnection();"><div><i class="fa fa-user"></i></div></a>';
			} else {
				echo '<a class="connect" href="?/profile">
						<div style="background-image:url(\''.$membre->avatar.'\'); background-size:contain; width:50%; margin-left: 25%; background-repeat:no-repeat;height:100%;"></div>
					</a>';
			}
		?>

	</div>
</nav>
<?php
	if($_SESSION['token'] == "-1"){ ?>
<div class="connection" onclick="hideConnection();">
	<div class="box">
		<div class="content formulaire">
			<div class="text"> Identifiant </div> <input type="text" name="name"> <hr>
			<div class="text"> Password </div> <input type="password" name="password">
		</div>
	</div>
	<div class="box">
		<div class="content" onclick="connection();">
			Connection
		</div>
		<div class="content" onclick="inscription();">
			Inscription
		</div>
	</div>
</div>

<script>
	$('.connection').hide();
	function showConnection(){
		$('.connection').show();
	}
	function hideConnection(){
		$('.connection').hide();
	}
	$('.box').click(function(event){
		event.stopPropagation();
	})
	function inscription(){
		var name = $("input[name=name]").val();
		var password = $("input[name=password]").val();
		var email = "";
		var boem = true;
		do {
			if(boem)
				email = prompt("Your mail :", "@viacesi.fr");
			else
				email = prompt("Must domain with viacesi.fr or cesi.fr\n Your e-mail :", "@viacesi.fr");
			boem = false;
		}while(!email.match(/^[a-z]+[a-z.]*@(via)?cesi\.fr/));

		var data = "action=inscription&name="+name+"&password="+password+"&email="+email;
		send('php/ajax/gestionConnection.php', data);
	}
	function connection(){
		var name = $("input[name=name]").val();
		var password = $("input[name=password]").val();
		var data = "action=connection&name="+name+"&password="+password;
		send('php/ajax/gestionConnection.php', data);
	}
</script>
<?php 
}
?>