<html>
    <head>
        <link rel="stylesheet" href="style.css" />
    </head>
    <img src="logo-im2ag" height="150px" width="210px" align="center"/>
    <h1> Bonjour, vous voulez créer un nouveau formulaire? Compléter un formulaire?</h1>
    <br>
    <br>
    <br>

    

    <body id="index">
        <a href="nouveau_formulaire.php"><input type="button" value="nouveau formulaire"></a>
        <br><br>

        <form action="formulaire_a_completer.php" method="post">
            <label>Entrez votre numéro de dossier à remplir : </label>
            <input type="number" name="N_dossier">
            <input type="submit" value="Valider le numéro de dossier">
        </form>
    </body>
</html>