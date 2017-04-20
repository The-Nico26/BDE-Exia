<?php
    if(!$ROUTE){
        header("Location: ../?/index");
        exit();
    }
    require 'php/header/head.php';
    $head->setup();
    $head->addLink("<link rel=\"stylesheet\" type=\"text/css\" href=\"css/Document/profil.css\">");
    $head->setTitle('Profil - BDE cesi');
    $head->getHead();
    $head->requireConnection();
    require 'php/header/menu.php';
?>

        <section class="tileheigt">
            <div class="logo" style="background-image:url(<?= $membre->avatar ?>);"></div>
            <div class="title">
                <div class="rang">
                    <?= $membre->role ?>
                </div>
                <?= $membre->nom." ".$membre->prenom ?>
            </div>
        </section>
        <section class="profil">
            <div class="btnsavetop">
                <button onclick="logout()">Logout</button>
            </div>
            <div class="info">
                <input type="hidden" name="id" value="<?= $membre->id ?>">
                <div class="title">Nom :</div> <input type="text" name="nom" value="<?= $membre->nom ?>"> <br>
                <div class="title">Prénom :</div> <input type="text" name="prenom" value="<?= $membre->prenom ?>"> <br>
                <div class="title">Avatar :</div> <input type="mail" name="avatar" value="<?= $membre->avatar ?>"> <br>
                <div class="title">Mail :</div> <input type="mail" name="mail" value="<?= $membre->mail ?>"> <br>
                <div class="title">Password :</div> <input type="password" name="password"> <br>
                <div class="title">Role :</div> <input type="text" name="role" value="<?= $membre->role ?>" readonly> <br>
                <div class="title">Promotion :</div> <input type="text" name="promotion" value="<?= $membre->promotion ?>"> <br>
                <div class="title">Token :</div> <input type="text" name="token" value="<?= $membre->token ?>" readonly> <br>
            </div>
            <div class="btnsavebottom">
                <button onclick="save()">Save</button>
            </div>
        </section>
        <footer>
            Copyright
        </footer>

        <script>
            function save(){
                var nom = $("input[name=nom]").val();
                var prenom = $("input[name=prenom]").val();
                var avatar = $("input[name=avatar]").val();
                var mail = $("input[name=mail]").val();
                var password = $("input[name=password]").val();
                var role = $("input[name=role]").val();
                var promotion = $("input[name=promotion]").val();
                var token = $("input[name=token]").val();
                var id = $("input[name=id]").val();

                var data = "action=edit&nom="+nom+"&prenom="+prenom+"&avatar="+avatar+"&mail="+mail+"&password="+password+"&role="+role+"&promotion="+promotion+"&token="+token+"&id="+id;
                send("php/ajax/gestionMembre.php", data);
            }
            function logout(){
                send("php/ajax/gestionConnection.php", "action=logout");
            }
        </script>
    </body>
</html>
