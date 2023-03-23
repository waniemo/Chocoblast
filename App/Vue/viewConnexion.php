<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./Public/Style/main.css">
    <script src="./Public/Script/script.js"></script>
    <title>Connexion</title>
</head>
<body>
    <?php include './App/Vue/viewMenu.php' ?>
    <h1>Connexion</h1>
    <div class="form">
        <form action="" method="POST">
            <input type="email" name="mail_utilisateur">
            <input type="password" name="password_utilisateur">
            <input type="submit" name="submit" value="Se connecter">
        </form>
        <div id="error"><?php echo $message; ?></div>
    </div>
</body>
</html>