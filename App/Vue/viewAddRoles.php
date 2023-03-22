<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter rôles</title>
</head>
<body>
    <h1>Ajouter un rôle</h1>
    <form action="" method="post">
    <label for="nom_roles">Saisir votre role :</label>
        <input type="text" name="nom_roles">
        <input type="submit" value="Ajouter" name="submit">
    </form>
    <div id="error"><?php echo $message; ?></div>
</body>
</html>