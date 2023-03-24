
<?php
    //Test si connecté 
    if(isset($_SESSION['connected'])){
?>  
    <!-- connecté -->
    <div id="navbar">
    <ul>
        <li><a href="./">Home</a></li>
        <li><a href="./rolesAdd">Ajouter un rôle</a></li>
        <li><a href="./chocoblastAdd">Ajouter un chocoblast</a></li>
        <li><a href="./deconnexion">Déconnexion</a></li>
    </ul>
</div>
<?php
    }
    //Test sinon non connecté
    else{
?>
    <!-- déconnecté -->
    <div id="navbar">
    <ul>
        <li><a href="./">Home</a></li>
        <li><a href="./userAdd">S'inscrire</a></li>
        <li><a href="./rolesAdd">Ajouter un rôle</a></li>
        <li><a href="./connexion">Connexion</a></li>
    </ul>
</div>
<?php
    }
?>