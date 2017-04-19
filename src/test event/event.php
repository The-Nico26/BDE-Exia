<html>
	<head>
		<meta name="viewport" content="width=device-width, user-scalable=no">
		<meta charset="utf-8">
        <link href="../css/metro.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="../css/nico.css">
        <link rel="stylesheet" type="text/css" href="../css/Document/event.css">
        <title><?= htmlspecialchars($_POST["titre"]); ?> - BDE cesi</title>
    </head>
    <body>
		<div class="background">
			<div class="container"></div>
		</div>
		<nav>
			<div class="link">
				<a href="#"><div>Accueil</div></a>
				<a href="#"><div>Evènement</div></a>
				<span class="logo"><img src="../img/logo.png"></span>
				<a href="#"><div>Association</div></a>
				<a href="#"><div>Boutique</div></a>
				<a class="connect" href="#"><div><i class="fa fa-user"></i></div></a>
			</div>
		</nav>
	
		<section class="tileheigt">
			<div class="title">
				<?= htmlspecialchars($_POST["titre"]); ?>
			</div>
		</section>
		
		<section class="box">
			<div class="section">
				<div class="titre">
				 <?= htmlspecialchars($_POST["titre2"]); ?>
				</div>
				<div class="text">
				<?= htmlspecialchars($_POST["desc"]); ?>
				</div>
			</div>
			<div class="formulaire">
					Organisateur
				<div class="cont">
					<?= htmlspecialchars($_POST["org"]); ?>
				</div>
					Contact
				<div class="cont">
					<?= htmlspecialchars($_POST["mail"]); ?>
					<?= htmlspecialchars($_POST["tel"]); ?>
				</div>
					Lieu
				<div class="cont">
					<?= htmlspecialchars($_POST["lieu"]); ?>
				</div>
					Date
				<div class="cont">
					<?= htmlspecialchars($_POST["date"]); ?>
				</div>
			</div>
			<div class="btns">

			</div>
		</section>
		
		<footer>
			Copyright
		</footer>
        <script src="../js/live.js"></script>
	</body>
</html>