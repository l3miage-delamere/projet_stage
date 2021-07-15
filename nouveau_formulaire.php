<html>
    <head>
        <link rel="stylesheet" href="style.css" />
    </head>
    <?php
    //connection à la base de données
        $hs = "localhost";
        $us = "root";
        $psw= "";
        $dbName = "projet_stage";
        $mysqlconn = mysqli_connect("$hs", "$us", "$psw", $dbName);

        if($mysqlconn === false){
            die("my sql is not connected");
        }

        $get_next_AUTO_INCREMENT = "SELECT `AUTO_INCREMENT` FROM  INFORMATION_SCHEMA.TABLES WHERE TABLE_SCHEMA = 'projet_stage' AND   TABLE_NAME   = 'stage';";
        $result_AUTO_INCREMENT = mysqli_query($mysqlconn,$get_next_AUTO_INCREMENT);
        $res = mysqli_fetch_assoc($result_AUTO_INCREMENT);
    ?>
    <strong> votre numéro de formulaire est le : <?php echo  $res["AUTO_INCREMENT"] ?> notez ce numéro, il sera demander pour poursuivre le remplissage de cette fiche! </strong>
    <br>
    <br>

    <img src="logo-im2ag" height="100px" width="150px" align="left"/>
    <br><br>
    <p name="entete">UFR IM²AG - Relations Entreprises et Stages 60 rue de la Chimie – UGA – CS 40700 – 38058 Grenoble cedex 9
    Tel . 04 76 63 57-25</p>
    <br>
    <h1> FICHE DE RENSEIGNEMENTS DE STAGE - 2021/2022 </h1>
    <p id="mise-en-garde"> <b>ATTENTION ! </b><br>
    Cette fiche de renseignements <U>ne tient pas lieu de convention</U><br><br>
    <b>Ces informations sont nécessaires pour l’établissement et la gestion de votre convention de stage.
    Cette fiche doit être <font color="red">envoyée par mail à <U>Laurence.Pierre@univ-grenoble-alpes.fr</U></font>
    pour validation <font color="red"><U>avant</U> saisie de la convention</font> dans Pstage.</b></p>
    <body>
    <form action="enregistrement_new.php" method="post">
        <div>
            <b>COORDONNEES DE L'ETUDIANT:</b><br><br>
            <label>NOM: </label>
            <input type="text" name="nom">
            <label>PRENOM: </label>
            <input type="text" name="prenom">
            <br>

            <label>N° étudiant: </label>
            <input type="text" name="N_etudiant">
            <label>N° téléphone: </label>
            <input type="text" name="N_telephone">
            <br>

            <label>e-mail :</label>
            <input type="text" name="e-mail">
            <br>

            <b>Adresse:</b>
            <label>N° Rue:</label>
            <input type="number" name="N_Rue">
            <label>Rue:</label>
            <input type="text" name="Rue">
            <label>Code postal:</label>
            <input type="number" name="Code_postal">
            <label>Ville:</label>
            <input type="text" name="Ville">
            <label>Pays:</label>
            <input type="text" name="Pays">
            <br>

            Type d'affiliation à la sécuruté sociale:
            <select name="type_d'affiliation">
                <option>ayant droit</option>
                <option>etudiant</option>
                <option>assuré volontaire</option>
                <option>etudiant etranger</option>
            </select>
            <br>

            Caisse d’assurance maladie :
            <select name="assurance_maladie">
                <option>CPAM</option>
                <option>MSA</option>
                <option>Travailleur independant</option>
                <option>regimes speciaux</option>
            </select>
            <br>

            <label>Inscrit en (préciser la filière d'études) : L3</label>
            <input type="text" name="filiere">
            <br>

            Enseignant référent pour l’encadrement du stage pour votre année d’étude (validera cette fiche) : L.Pierre
        </div><br>

        <div>
            <b>COORDONNEES DE L'ETABLISSEMENT D'ACCUEIL:</b><br><br>

            <label>Raison sociale</label>
            <input type="text" name="Raison_sociale">
            <br>

            <label>Représentant légal</label>
            <input type="text" name="Représentant_legal">
            <label>Fonction</label>
            <input type="text" name="Fonction">
            <br>

            <label>N° SIRET</label>
            <input type="text" name="N_SIRET">
            <label>Code APE</label>
            <input type="text" name="Code_APE">
            <br>

            <label>Domaine d'activité</label>
            <input type="text" name="domaine_d'activité">
            <br>

            <label>Effectif</label>
            <input type="text" name="Effectif">
            <br>

            <b>Adresse:</b>
            <label>N° Rue:</label>
            <input type="number" name="N°_Rue_EA">
            <label>Rue:</label>
            <input type="text" name="Rue_EA">
            <label>Code postal:</label>
            <input type="number" name="Code_postal_EA">
            <label>Ville:</label>
            <input type="text" name="Ville_EA">
            <label>Pays:</label>
            <input type="text" name="Pays_EA">
            <br>

            <label>Service d'accueil du stagiaire :</label>
            <input type="text" name="Service_accueil">
            <br><br><br>

            <em><strong>Service assurant la gestion des stagiaires (RH)</strong></em><br><br>
            <label>Nom:</label>
            <input type="text" name="Nom_RH">
            <label>Prénom</label>
            <input type="text" name="Prénom_RH">
            <br>

            <label>Téléphone</label>
            <input type="text" name="Téléphone">
            <br>

            <label>e-mail :</label>
            <input type="text" name="e-mail_RH">
            <br>

            <b>Adresse:</b>
            <label>N° Rue:</label>
            <input type="number" name="N°_Rue_RH">
            <label>Rue:</label>
            <input type="text" name="Rue_RH">
            <label>Code postal:</label>
            <input type="number" name="Code_postal_RH">
            <label>Ville:</label>
            <input type="text" name="Ville_RH">
            <label>Pays:</label>
            <input type="text" name="Pays_RH">
            <br>
        </div><br>

        <div>
            <b>TUTEUR PROFESSIONNEL DU STAGIAIRE </b><em>(à remplir par le responsable de l’encadrement du stagiaire)</em><br><br>
            <label>Nom:</label>
            <input type="text" name="Nom_tuteur">
            <label>Prénom</label>
            <input type="text" name="Prenom_tuteur">
            <br>

            <label>Fonction</label>
            <input type="text" name="Fonction_tuteur">
            <label>Service</label>
            <input type="text" name="Service_tuteur">

            <label>Téléphone</label>
            <input type="text" name="Téléphone_tuteur">
            <br>

            <label>e-mail :</label>
            <input type="text" name="e-mail_tuteur">
            <br>

            <b>Adresse:</b>
            <label>N° Rue:</label>
            <input type="number" name="N°_Rue_tuteur">
            <label>Rue:</label>
            <input type="text" name="Rue_tuteur">
            <label>Code postal:</label>
            <input type="number" name="Code_postal_tuteur">
            <label>Ville:</label>
            <input type="text" name="Ville_tuteur">
            <label>Pays:</label>
            <input type="text" name="Pays_tuteur">
            <br>
            
            Disponibilité du tuteur professionnel de stage : 
            <select name="dispo">
                <option>importante</option>
                <option>partielle</option>
                <option>inexistante</option>
            </select>
            <br>

            <b>DATES DU STAGE</b><br><br>
            <label>date de début:</label>
            <input type="date" name="date_de_début" value="2021-05-25">
            <label>date de fin:</label>
            <input type="date" name="date_de_fin" value="2021-07-16">
            <br>

            <label>Nombre d'heures</label>
            <input type="number" name="Nombre_heures">
            <br>

            <strong>GRATIFICATIONS </strong><em>(obligatoires pour tout stage, même fractionné, à partir du 45ème jour de présence) :</em><br><br>

            <input type="radio" name="gratification" name="oui">
            <label>oui</label><br>
            <input type="radio" name="gratification" name="non">
            <label>non</label>
            <br>

            <strong>Si oui:</strong><br>
            <label>Montant gratification horaire (si montant mensuel, le diviser par 154) :</label>
            <input type="number" name="montant" step="any" min=0> €
            <br>

            Versement de la gratification :
            <select name="Versement">
                <option>aucun</option>
                <option>Cheque</option>
                <option>Virement bancaire</option>
                <option>Especes</option>
            </select>
            <br>

            <label>Pour les laboratoires de l’UGA, préciser l'organisme de prise en charge :</label>
            <input type="text" name="organisme">
            <br>

            <label>Avantages en nature:</label>
            <input type="text" name="Avantages">
            <br>

            <strong>Confidentialité du stage</strong><br>
            <input type="radio" name="confidentialité" name="yes">
            <label>oui</label><br>
            <input type="radio" name="confidentialité" name="no">
            <label>non</label>
            <br>

            <label><strong>TITRE DU STAGE :</strong></label>
            <input type="text" name="titre">
            <br>

            <strong>Description du <font color="red">projet</font> de l'entreprise dans lequel le stagiaire sera intégré / du produit sur lequel il travaillera :</strong>
            <br>
            <textarea name="Description" rows=5 cols=130></textarea>
            <br>

            <strong><font color="red">Objectifs</font> du stage dans ce projet :</strong>
            <br>
            <textarea name="Objectifs" rows=5 cols=130></textarea>
            <br>

            <strong><font color="red">Tâches</font> qui seront confiées au stagiaire pour cette mission :</strong>
            <br>
            <textarea name="taches" rows=5 cols=130></textarea>
            <br>
            
            <strong><font color="red">Détail des travaux</font> à réaliser, avec langages et technos qui seront utilisés :</strong>
            <br>
            <textarea name="Detail" rows=5 cols=130></textarea>
            <br>
        </div>
        <p><input type="submit" value="Valider mes informations"></p>
    </form>
    </body>
</html>
