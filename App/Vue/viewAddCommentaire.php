<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./Public/Style/main.css">
    <script src="./Public/Script/script.js" defer></script>
    <title>Ajouter un commentaire</title>
</head>
<body>
    <?php include './App/Vue/viewMenu.php' ?>
    <h1>Ajouter un commentaire</h1>
    <form action="" method="post">
        <label for="text_commentaire">Entrez votre message</label>
        <input type="text" name="text_commentaire">
        <label for="note_commentaire">Entrez votre note</label>
        <input type="text" name="note_commentaire">
        <label for="date_commentaire">Entrez la date</label>
        <input type="date" name="date_commentaire">
        <input type="submit" value="Envoyer" name="submit">
    </form>
    <div id="error"><?php echo $message; ?></div>
</body>
</html>