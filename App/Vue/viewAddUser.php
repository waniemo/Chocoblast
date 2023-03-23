<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./Public/Style/main.css">
    <script src="./Public/Script/script.js"></script>
    <title>Ajouter un utilisateur</title>
</head>
<body>
    <?php include './App/Vue/viewMenu.php' ?>
    <div class="form">
    <h1>Ajouter un utilisateur</h1>
    <form action="" method="post">
        <label for="nom_utilisateur">Saisir votre nom :</label>
        <input type="text" name="nom_utilisateur">

        <label for="nom_utilisateur">Saisir votre prénom :</label>
        <input type="text" name="prenom_utilisateur">

        <label for="nom_utilisateur">Saisir votre adresse mail :</label>
        <input type="email" name="mail_utilisateur">

        <label for="nom_utilisateur">Saisir votre mot de passe :</label>
        <input type="password" name="password_utilisateur">

        <input type="submit" value="S'inscrire" name="submit">
    </form>
    <div id="error"><?php echo $message; ?></div>
    </div>
</body>
</html>