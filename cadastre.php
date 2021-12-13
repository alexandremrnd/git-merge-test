<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mon tableau de bord</title>
    <link rel="stylesheet" href="css/styleDashboard.css">
</head>

<body>
    <?php

    $host = "localhost";
    $dbname = "projetPG";
    $user = "root";
    $pwd = "root";

    if (isset($_POST['submit'])) {
        $city = $_POST['city'];
        $length = $_POST['length'];
        $width = $_POST['width'];
        $surface = $width * $length;
        $city = htmlentities($city, ENT_QUOTES);
        $db = new PDO('mysql:host='.$host.';dbname='.$dbname, $user, $pwd);
        $sql = "INSERT INTO terrains(ville, surface) VALUES ('$city','$surface')";
        $result = $db->prepare($sql);
        $result->execute();

        $db = new PDO('mysql:host='.$host.';dbname='.$dbname, $user, $pwd);
        $sql = "SELECT COUNT(*) FROM terrains AS nb WHERE ville = '$city'";
        $result = $db->prepare($sql);
        $result->execute();
        $data = $result->fetch();

    ?>
        <div id="dashboard">
            <div class="title">
                <h1>Mon dashboard</h1>
                <a href="plan.php">Ajouter un autre terrain</a>
            </div>
            <div class="container">
                <div class="confirmation">
                <img src="data/check.png" style="width: 10%;" alt="">
                    <h1> C'est enregistré !
                    </h1>
                    <p>Votre terrain localisé à <?php echo $city; ?> a bien été enregistré.</p>
                </div>
                <div class="score">
                    <?php
                    if ($data[0] == 1) {
                    ?>
                        <h1>Vous êtes le <?php echo $data[0]; ?>er habitant de <?php echo $city; ?> !</h1>
                        <p>Bienvenue à vous !</p>
                    <?php
                    } else {
                    ?>
                        <h1>Vous êtes le <?php echo $data[0]; ?>ème habitant de <?php echo $city; ?> !</h1>
                        <p>Vous n'êtes pas seul !</p>
                    <?php
                    } ?>

                </div>
                <div class="nbterrains">

                    <?php
                    $db = new PDO('mysql:host='.$host.';dbname='.$dbname, $user, $pwd);
                    $sql = "SELECT COUNT(*) FROM terrains AS nb";
                    $result = $db->prepare($sql);
                    $result->execute();
                    $data = $result->fetch();
                    ?>

                    <h1><?php echo $data[0]; ?></h1>
                    <p>Nombre de terrains enregistrés</p>
                </div>
                <div class="surface">
                    <h1>La surface de votre terrain est de <?php echo $surface; ?> m²</h1>
                    <p>Presque la taille d'un stade de foot !</p>
                </div>
                <div class="mintaille">

                    <?php
                    $db = new PDO('mysql:host='.$host.';dbname='.$dbname,  $user, $pwd);
                    $sql = "SELECT MIN(surface) AS nb FROM terrains";
                    $result = $db->prepare($sql);
                    $result->execute();
                    $data = $result->fetch();
                    ?>

                    <h1><?php echo $data[0]; ?> m²</h1>
                    <p>Taille du plus petit terrain</p>
                </div>
                <div class="maxtaille">
                <?php
                    $db = new PDO('mysql:host='.$host.';dbname='.$dbname,  $user, $pwd);
                    $sql = "SELECT MAX(surface) AS nb FROM terrains";
                    $result = $db->prepare($sql);
                    $result->execute();
                    $data = $result->fetch();
                    ?>

                    <h1><?php echo $data[0]; ?> m²</h1>
                    <p>Taille du plus grand terrain</p>
                </div>
                <div class="bestcity">

                    <?php
                    $db = new PDO('mysql:host='.$host.';dbname='.$dbname,  $user, $pwd);
                    $sql = "SELECT ville FROM terrains GROUP BY ville ORDER BY COUNT(*) DESC LIMIT 1";
                    $result = $db->prepare($sql);
                    $result->execute();
                    $data = $result->fetch();
                    ?>

                    <h1><?php echo $data[0]; ?></h1>
                    <p>Ville la plus populaire</p>
                </div>
            </div>


        </div>


    <?php

    } else {
        header('Location: plan.php');
        exit;
    }
    ?>

</body>
<script src="script.js"></script>

</html>
