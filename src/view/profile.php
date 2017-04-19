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
        <button onclick="save()">Submit</button>
    </div>
    <div class="info">
        <input type="hidden" value="1" name="id">
        <div class="title">Nom :</div> <input type='text' name='nom'> <br>
        <div class="title">Prénom :</div> <input type='text' name='prenom'><br>
        <div class="title">Mail :</div> <input type='text' name='mail'><br>
        <div class="title">PassWord :</div> <input type='text' name='passWord'><br>
        <div class="title">Promotion :</div> <input type='text' name='promotion'><br>
    </div>
    <div class="btnsavebottom">
        <button onclick="save()">Submit</button>
    </div>
</section>

<?php
foreach(membreDAO::find() as $row)
{?>
    <div class="title">Nom :</div> <?= htmlspecialchars($_POST["nom"]); ?> <br>
    <div class="title">Prenom :</div> <?= htmlspecialchars($_POST["prenom"]); ?> <br>
    <div class="title">Mail :</div> <?= htmlspecialchars($_POST["mail"]); ?> <br>
    <div class="title">PassWord :</div> <?= htmlspecialchars($_POST["passWord"]); ?> <br>
    <div class="title">Promotion :</div> <?= htmlspecialchars($_POST["promotion"]); ?> <br>
    <?php
}
?>



<footer>
    Copyright
</footer>
<script src="../js/jquery.js"></script>
<script src="../js/metro.js"></script>
<script src="../js/site.js"></script>
<script>
    var data = "";
    function save(){
        var nom = $("input[name=nom]").val();
        var prenom = $("input[name=prenom]").val();
        var mail = $("input[name=mail]").val();
        var passWord = $("input[name=passWord").val();
        var promotion = $("input[name=promotion").val();
        var id = $("input[name=id]").val();
        data = "action=add&nom="+nom+"&prenom="+prenom+"&mail="+mail+"&passWord"+passWord+"&promotion"+promotion+"&id="+id;
        send("../php/ajax/gestionProfile.php", data);
    }
    function modif(prenom, nom, mail, passWord, promotion, id){
        $("input[name=nom]").val(nom);
        $("input[name=prenom").val(prenom);
        $("input[name=mail]").val(mail);
        $("input[name=passWord]").val(passWord);
        $("input[name=promotion]").val(promotion);
        $("input[name=id]").val(id);
    }
    function net(){
        $("input[name=prenom]").val("");
        $("input[name=nom]").val("");
        $("input[name=mail]").val("");
        $("input[name=id]").val("-1");
        $("textarea").val("");
    }
    function remove(id){
        send("../php/ajax/gestionProfile.php", "action=remove&id="+id);
    }
</script>