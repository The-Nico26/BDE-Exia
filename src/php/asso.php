<?php
	ini_set('display_errors', 1);
	include_once('../php/header/head.php');
	$head->setup();
	$head->addLink("<link rel=\"stylesheet\" type=\"text/css\" href=\"../css/Document/asso.css\">");
	$head->setTitle('Association - BDE cesi');
	$head->getHead();
	require('../php/header/menu.php');
?>  

<body>

		
		<section class="situation">
			<div class="numero">
				<div class="numero_left"></div>
				<div class="numero_center">
					<span class="numero_text">Association</span>
					<span class="numero_right"></span>
				</div>
			</div>
		</section>
		<?php
			foreach(assoDAO::find() as $row){
		?>
		<section class="asso">
			<div class="cadre">
				<div class="content">
					<div class="left">
						<div class="title">
							<?= $row->titre ?>
						</div>
							<?= $row->description ?>
					</div>
					<div class="right">
						<img src="../img/logo.png">
					</div>
				</div>
				<div class="bottom">
					<div class="taff">
						President <?= $row->president ?><br>
						Secretary <?= $row->secretary ?>
					</div>
					<button>show more <i class="fa fa-arrow-right"></i></button>
				</div>
			</div>
			
		</section>
		
		<footer>
			Copyright
		</footer>
		
        <script src="../js/jquery.js"></script>
        <script src="../js/metro.js"></script>
        <script src="../js/live.js"></script>
	</body>
</html>