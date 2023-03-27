<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./Public/Style/main.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <script src="./Public/Script/script.js" defer></script>
    <title>Liste des chocoblast</title>
</head>
<body>
<?php include './App/Vue/viewMenu.php';?>
    <section id="parent">
        <div class="chocoContainer">
            <?php 
                //Boucle pour afficher les chocoblasts
                foreach($chocos as $value){
            ?>
                <div class="choco">
                    <p><?=$value->slogan_chocoblast?></p>
                    <p>image here</p>
                    <h1>Cible chocoblast :</h1>
                    <p><?=$value->nom_cible?> <?=$value->prenom_cible?></p>
                    <h1>Chocoblasté par :</h1>
                    <p><?=$value->nom_auteur?> <?=$value->prenom_auteur?></p>
                    <p><?=$value->date_chocoblast?></p>
                </div>
                <a href="./commentaireAdd?id_chocoblast=<?=$value->id_chocoblast?>">Ajouter un commentaire<span class="material-symbols-outlined">add</span></a>
            <?php    
                }
                
            ?>
            
        </div>
    </section>
        <!-- Modal -->
    <div id="myModal" class="modal">
        <!-- Modal content -->
        <div class="modal-content">
            <span class="close" onclick="closeModal()">&times;</span>
            <p><?= $msg ?></p>
        </div>
    </div>
</body>
</html>