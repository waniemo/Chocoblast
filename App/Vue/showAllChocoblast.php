<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./Public/Style/main.css">
    <script src="./Public/Script/script.js"></script>
    <title>Liste des chocoblast</title>
</head>
<body>
    <?php include './App/Vue/viewMenu.php';
    foreach($data as $value){
        echo "Slogan chocoblast".$value->slogan_chocoblast;
    }
    ?>

</body>
</html>