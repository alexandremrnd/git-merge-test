<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajout d'un cadastre</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="presentation">
        <h1>Bienvenue sur le gestionnaire de cadastres.</h1>
        <p>MIRANDA DIAS Alexandre</p>
    </div>
    <form method="POST" action="cadastre.php">
        <div class="imgandtext">
            <h3>Ajout d'un cadastre</h3>
        </div>
        

        <label for="city">Ville</label>
        <input type="text" placeholder="Paris" id="city" name="city" required>

        <label for="password">Longueur</label>
        <input type="number" placeholder="6" id="length" name="length" required>

        <label for="password">Largeur</label>
        <input type="number" placeholder="8" id="width" name="width" required>

        <input type="button" id="csbutton" onclick="calcsurface()" value="Calculer la surface">

        <button name="submit">Envoyer</button>
        
        </form>
</body>
<script src="script.js"></script>
</html>