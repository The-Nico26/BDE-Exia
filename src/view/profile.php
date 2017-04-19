<?php
ini_set('display_errors', 1);
include_once('../php/BDD/membreDAO.php');
include_once('../php/header/head.php');
$head->setup();
$head->addLink("<link rel=\"stylesheet\" type=\"text/css\" href=\"../css/Document/profil.css\">");
$head->setTitle('Shop - BDE cesi');
$head->getHead();
require('../php/header/menu.php');
?>

<section class="tileheigt">
    <div class="logo" style="background-image:url(https://images.duckduckgo.com/iu/?u=https%3A%2F%2Ftse3.mm.bing.net%2Fth%3Fid%3DOIP.jpQTXFYzXwrYbzhPyS_qdwEsDo%26pid%3D15.1&f=1);"></div>
    <div class="title">
        <div class="rang">
            Flooter de merde
        </div>
        Nicolas MAZARD
    </div>
</section>
<section class="profil">
    <div class="btnsavetop">
        <button>Submit</button>
    </div>
    <div class="info">
        <div class="title">Nom :</div> <input type='text' name='nom'> <br>
        <div class="title">Prénom :</div> <input type='text' name='prenom'><br>
        <div class="title">Mail :</div> <input type='text' name='mail'><br>
    </div>
    <div class="btnsavebottom">
        <button>Submit</button>
    </div>
</section>

<?php
foreach(membreDAO::find() as $row)
{?>
    <div class="title">Nom :</div> <?= $row->nom ?> <br>
    <div class="title">Prénom :</div> <?= $row->prenom ?> <br>
    <div class="title">Mail :</div> <?= $row->mail ?> <br>
    <?php
}
?>



<footer>
    Copyright
</footer>
<script src="../js/jquery.js"></script>
<script src="../js/metro.js"></script>
<script src="../js/live.js"></script>