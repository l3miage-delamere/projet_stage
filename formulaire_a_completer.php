<html>
    <head>
        <link rel="stylesheet" href="style.css" />
    </head>
    <?php
        /*require("fpdf183/fpdf.php");
        $pdf = new PDF('P','mm','A4');*/
        //connection à la base de données
        $hs = "localhost";
        $us = "root";
        $psw= "";
        $dbName = "projet_stage";
        $mysqlconn = mysqli_connect("$hs", "$us", "$psw", $dbName);

        if($mysqlconn === false){
            die("my sql is not connected");
        }
        $nO_stage = $_POST["N_dossier"];

        //différentes requêtes nécessaires :

        //STAGE
        //sélection du stage
        $select_stage = "select * from stage where nO_stage=".$nO_stage;
        $res_select_stage = $mysqlconn->query($select_stage);
        $resultat_select_stage = mysqli_fetch_assoc($res_select_stage);

        //récupération des informations du stage
        $titre = $resultat_select_stage["titre"];
        $date_debut = $resultat_select_stage["date_debut"];
        $date_fin = $resultat_select_stage["date_fin"];
        $nbHeuresTotal = $resultat_select_stage["nbHeuresTotal"];
        $description = $resultat_select_stage["description"];
        $objectifs = $resultat_select_stage["objectifs"];
        $taches = $resultat_select_stage["taches"];
        $details = $resultat_select_stage["details"];
        $bool_grati = $resultat_select_stage["bool_grati"];
        $etudiant = $resultat_select_stage["etudiant"];
        $entreprise = $resultat_select_stage["entreprise"];
        $nom_tuteur = $resultat_select_stage["nom_tuteur"];
        $prenom_tuteur = $resultat_select_stage["prenom_tuteur"];
        $bool_confidentialite = $resultat_select_stage["bool_confidentialite"];
        $montant = $resultat_select_stage["montant"];
        $type_versement = $resultat_select_stage["type_versement"];
        $organisme = $resultat_select_stage["organisme"];
        $avantages = $resultat_select_stage["avantages"];

        //ETUDIANT
        //selection de l'étudiant
        $select_etudiant = "select * from etudiant where nO_etu=".$etudiant;
        $res_select_etudiant = $mysqlconn->query($select_etudiant);
        $resultat_select_etudiant = mysqli_fetch_assoc($res_select_etudiant);

        //récupération des informations de l'étudiant
        $nom_etu = $resultat_select_etudiant["nom"];
        $prenom_etu = $resultat_select_etudiant["prenom"];
        $tel_etu = $resultat_select_etudiant["tel"];
        $mail_etu = $resultat_select_etudiant["mail"];
        $type_aff_etu = $resultat_select_etudiant["type_aff"];
        $nO_rue_etu = $resultat_select_etudiant["nO_rue"];
        $rue_etu = $resultat_select_etudiant["rue"];
        $filiere_etu = $resultat_select_etudiant["filiere"];
        $caisse_maladie_etu = $resultat_select_etudiant["caisse_maladie"];

        if($nO_rue_etu!='' && $rue_etu!=''){
            //ADRESSE DE L'ETUDIANT
            //selection de l'adresse de l'étudiant
            $select_adresse_etu = "select * from adresse where nO_rue=".$nO_rue_etu." and rue='".$rue_etu."';";
            $res_select_adresse_etu = $mysqlconn->query($select_adresse_etu);
            $resultat_select_adresse_etu = mysqli_fetch_assoc($res_select_adresse_etu);

            //récupération des informations de l'adresse de l'étudiant
            $code_postal_etu = $resultat_select_adresse_etu["code_postal"];
            $ville_etu = $resultat_select_adresse_etu["ville"];
            $pays_etu = $resultat_select_adresse_etu["pays"];
        }
        else{
            $code_postal_etu = '';
            $ville_etu = '';
            $pays_etu = '';
        }

        if($entreprise!=''){
            //ENTREPRISE
            //selection des coordonnées de l'entreprise
            $select_entreprise = "select * from entreprise where nO_siret=".$entreprise;
            $res_select_entreprise = $mysqlconn->query($select_entreprise);
            $resultat_select_entreprise = mysqli_fetch_assoc($res_select_entreprise);

            //récupération des informations de l'entreprise
            $raison_sociale_entreprise = $resultat_select_entreprise["raison_sociale"];
            $representant_entreprise = $resultat_select_entreprise["representant"];
            $fonction_representant_entreprise = $resultat_select_entreprise["fonction_representant"];
            $nO_rue_entreprise = $resultat_select_entreprise["nO_rue"];
            $rue_entreprise = $resultat_select_entreprise["rue"];
            $code_ape_entreprise = $resultat_select_entreprise["code_ape"];
            $activite_entreprise = $resultat_select_entreprise["activite"];
            $effectif_entreprise = $resultat_select_entreprise["effectif"];
            $nom_service_rh_entreprise = $resultat_select_entreprise["nom_service_RH"];
            $prenom_service_rh_entreprise = $resultat_select_entreprise["prenom_service_RH"];
            $service_accueil_entreprise = $resultat_select_entreprise["service_accueil"];

            if($nO_rue_entreprise!='' && $rue_entreprise){
                //selection de l'adresse de l'entreprise
                $select_adresse_entreprise = "select * from adresse where nO_rue=".$nO_rue_entreprise." and rue='".$rue_entreprise."';";
                $res_select_adresse_entreprise = $mysqlconn->query($select_adresse_entreprise);
                $resultat_select_adresse_entreprise = mysqli_fetch_assoc($res_select_adresse_entreprise);

                //récupération des informations de l'adresse de l'entreprise
                $code_postal_entreprise = $resultat_select_adresse_entreprise["code_postal"];
                $ville_entreprise = $resultat_select_adresse_entreprise["ville"];
                $pays_entreprise = $resultat_select_adresse_entreprise["pays"];
            }
            else{
                $code_postal_entreprise = '';
                $ville_entreprise = '';
                $pays_entreprise = '';
            }
        }
        else{
            $raison_sociale_entreprise = '';
            $representant_entreprise = '';
            $fonction_representant_entreprise = '';
            $nO_rue_entreprise = '';
            $rue_entreprise = '';
            $code_ape_entreprise = '';
            $activite_entreprise = '';
            $effectif_entreprise = '';
            $nom_service_rh_entreprise = '';
            $prenom_service_rh_entreprise = '';
            $service_accueil_entreprise = '';
            $code_postal_entreprise = '';
            $ville_entreprise = '';
            $pays_entreprise = '';
        }

        if($nom_service_rh_entreprise!='' && $prenom_service_rh_entreprise!=''){
            //SERVICE RH
            //selection des informations du service rh
            $select_service_rh = "select * from service_rh where nom='".$nom_service_rh_entreprise."' and prenom='".$prenom_service_rh_entreprise."';";
            $res_select_service_rh = $mysqlconn->query($select_service_rh);
            $resultat_select_service_rh = mysqli_fetch_assoc($res_select_service_rh);

            //récupération des informations du service RH
            $tel_service_rh = $resultat_select_service_rh["tel"];
            $mail_service_rh = $resultat_select_service_rh["mail"];
            $nO_rue_service_rh = $resultat_select_service_rh["nO_rue"];
            $rue_service_rh = $resultat_select_service_rh["rue"];

            if($nO_rue_service_rh!='' && $rue_service_rh=''){
                //selection de l'adresse du service RH
                $select_adresse_service_rh = "select * from adresse where nO_rue=".$nO_rue_service_rh." and rue='".$rue_service_rh."';";
                $res_select_adresse_service_rh = $mysqlconn->query($select_adresse_service_rh);
                $resultat_select_adresse_service_rh = mysqli_fetch_assoc($res_select_adresse_service_rh);

                //récupération des informations de l'adresse du service RH
                $code_postal_service_rh = $resultat_select_adresse_service_rh["code_postal"];
                $ville_service_rh = $resultat_select_adresse_service_rh["ville"];
                $pays_service_rh = $resultat_select_adresse_service_rh["pays"];
            }
            else{
                $code_postal_service_rh = '';
                $ville_service_rh = '';
                $pays_service_rh = '';
            }

        }
        else{
            $tel_service_rh = '';
            $mail_service_rh = '';
            $nO_rue_service_rh = '';
            $rue_service_rh = '';
            $code_postal_service_rh = '';
            $ville_service_rh = '';
            $pays_service_rh = '';
        }

        if($nom_tuteur!='' && $prenom_tuteur!=''){
            //TUTEUR
            //selection des informations du tuteur
            $select_tuteur = "select * from tuteur where nom='".$nom_tuteur."' and prenom='".$prenom_tuteur."';";
            $res_select_tuteur = $mysqlconn->query($select_tuteur);
            $resultat_select_tuteur = mysqli_fetch_assoc($res_select_tuteur);

            //récupération des informations du tuteur
            $fonction_tuteur = $resultat_select_tuteur["fonction"];
            $service_tuteur = $resultat_select_tuteur["service"];
            $tel_tuteur = $resultat_select_tuteur["tel"];
            $mail_tuteur = $resultat_select_tuteur["mail"];
            $disponibilite_tuteur = $resultat_select_tuteur["dispo"];
            $nO_rue_tuteur = $resultat_select_tuteur["nO_rue"];
            $rue_tuteur = $resultat_select_tuteur["rue"];

            if($nO_rue_tuteur!='' && $rue_tuteur!=''){
                //selection de l'adresse du tuteur
                $select_adresse_tuteur = "select * from adresse where nO_rue=".$nO_rue_tuteur." and rue='".$rue_tuteur."';";
                $res_select_adresse_tuteur = $mysqlconn->query($select_adresse_tuteur);
                $resultat_select_adresse_tuteur = mysqli_fetch_assoc($res_select_adresse_tuteur);

                //récupération des informations de l'adresse du tuteur
                $code_postal_tuteur = $resultat_select_adresse_tuteur["code_postal"];
                $ville_tuteur = $resultat_select_adresse_tuteur["ville"];
                $pays_tuteur = $resultat_select_adresse_tuteur["pays"];
            }
            else{
                $code_postal_tuteur = '';
                $ville_tuteur = '';
                $pays_tuteur = '';
            }
        }
        else{
            $fonction_tuteur = '';
            $service_tuteur = '';
            $tel_tuteur = '';
            $mail_tuteur = '';
            $disponibilite_tuteur = '';
            $nO_rue_tuteur = '';
            $rue_tuteur = '';
            $code_postal_tuteur = '';
            $ville_tuteur = '';
            $pays_tuteur = '';
        }
    ?>
    <strong> votre numéro de formulaire est le : <?php echo  $nO_stage ?> notez ce numéro, il sera demander pour poursuivre le remplissage de cette fiche! </strong>
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
    <form action="enregistrement_a_completer.php" method="post">
        <div>
            <b>COORDONNEES DE L'ETUDIANT:</b><br><br>
            <label>NOM: </label>
            <input type="text" name="nom" value="<?php echo $nom_etu ?>">
            <label>PRENOM: </label>
            <input type="text" name="prenom" value="<?php echo $prenom_etu ?>">
            <br>

            <label>N° étudiant: </label>
            <input type="text" name="N_etudiant" value="<?php echo $etudiant ?>">
            <label>N° téléphone: </label>
            <input type="text" name="N_telephone" value="<?php echo $tel_etu ?>">
            <br>

            <label>e-mail :</label>
            <input type="text" name="e-mail" value="<?php echo $mail_etu ?>">
            <br>

            <b>Adresse:</b>
            <label>N° Rue:</label>
            <input type="number" name="N_Rue" value="<?php echo $nO_rue_etu ?>">
            <label>Rue:</label>
            <input type="text" name="Rue" value="<?php echo $rue_etu ?>">
            <label>Code postal:</label>
            <input type="number" name="Code_postal" value="<?php echo $code_postal_etu ?>">
            <label>Ville:</label>
            <input type="text" name="Ville" value="<?php echo $ville_etu ?>">
            <label>Pays:</label>
            <input type="text" name="Pays" value="<?php echo $pays_etu ?>">
            <br>

            Type d'affiliation à la sécuruté sociale:
            <select name="type_d'affiliation">
                <option <?php if($caisse_maladie_etu == "ayant droit") echo 'selected'; ?>>ayant droit</option>
                <option <?php if($caisse_maladie_etu == "etudiant") echo 'selected'; ?>>etudiant</option>
                <option <?php if($caisse_maladie_etu == "assuré volontaire") echo 'selected'; ?>>assuré volontaire</option>
                <option <?php if($caisse_maladie_etu == "etudiant etranger") echo 'selected'; ?>>etudiant etranger</option>
            </select>
            <br>

            Caisse d’assurance maladie :
            <select name="assurance_maladie">
                <option <?php if($caisse_maladie_etu == "CPAM") echo 'selected'; ?>>CPAM</option>
                <option <?php if($caisse_maladie_etu == "MSA") echo 'selected'; ?>>MSA</option>
                <option <?php if($caisse_maladie_etu == "Travailleur independant") echo 'selected'; ?>>Travailleur independant</option>
                <option <?php if($caisse_maladie_etu == "regimes speciaux") echo 'selected'; ?>>regimes speciaux</option>
            </select>
            <br>

            <label>Inscrit en (préciser la filière d'études) : L3</label>
            <input type="text" name="filiere" value="<?php echo $filiere_etu ?>">
            <br>

            Enseignant référent pour l’encadrement du stage pour votre année d’étude (validera cette fiche) : L.Pierre
        </div><br>

        <div>
            <b>COORDONNEES DE L'ETABLISSEMENT D'ACCUEIL:</b><br><br>

            <label>Raison sociale</label>
            <input type="text" name="Raison_sociale" value="<?php echo $raison_sociale_entreprise ?>">
            <br>

            <label>Représentant légal</label>
            <input type="text" name="Représentant_legal" value="<?php echo $representant_entreprise ?>">
            <label>Fonction</label>
            <input type="text" name="Fonction" value="<?php echo $fonction_representant_entreprise ?>">
            <br>

            <label>N° SIRET</label>
            <input type="text" name="N_SIRET" value="<?php echo $entreprise ?>">
            <label>Code APE</label>
            <input type="text" name="Code_APE" value="<?php echo $code_ape_entreprise ?>">
            <br>

            <label>Domaine d'activité</label>
            <input type="text" name="domaine_d'activité" value="<?php echo $activite_entreprise ?>">
            <br>

            <label>Effectif</label>
            <input type="text" name="Effectif" value="<?php echo $effectif_entreprise ?>">
            <br>

            <b>Adresse:</b>
            <label>N° Rue:</label>
            <input type="number" name="N°_Rue_EA" value="<?php echo $nO_rue_entreprise ?>">
            <label>Rue:</label>
            <input type="text" name="Rue_EA" value="<?php echo $rue_entreprise ?>">
            <label>Code postal:</label>
            <input type="number" name="Code_postal_EA" value="<?php echo $code_postal_entreprise ?>">
            <label>Ville:</label>
            <input type="text" name="Ville_EA" value="<?php echo $ville_entreprise ?>">
            <label>Pays:</label>
            <input type="text" name="Pays_EA" value="<?php echo $pays_entreprise ?>">
            <br>

            <label>Service d'accueil du stagiaire :</label>
            <input type="text" name="Service_accueil" value="<?php echo $service_accueil_entreprise ?>">
            <br><br><br>

            <em><strong>Service assurant la gestion des stagiaires (RH)</strong></em><br><br>
            <label>Nom:</label>
            <input type="text" name="Nom_RH" value="<?php echo $nom_service_rh_entreprise ?>">
            <label>Prénom</label>
            <input type="text" name="Prénom_RH" value="<?php echo $prenom_service_rh_entreprise ?>">
            <br>

            <label>Téléphone</label>
            <input type="text" name="Téléphone" value="<?php echo $tel_service_rh ?>">
            <br>

            <label>e-mail :</label>
            <input type="text" name="e-mail_RH" value="<?php echo $mail_service_rh ?>">
            <br>

            <b>Adresse:</b>
            <label>N° Rue:</label>
            <input type="number" name="N°_Rue_RH" value="<?php echo $nO_rue_service_rh ?>">
            <label>Rue:</label>
            <input type="text" name="Rue_RH" value="<?php echo $rue_service_rh ?>">
            <label>Code postal:</label>
            <input type="number" name="Code_postal_RH" value="<?php echo $code_postal_service_rh ?>">
            <label>Ville:</label>
            <input type="text" name="Ville_RH" value="<?php echo $ville_service_rh ?>">
            <label>Pays:</label>
            <input type="text" name="Pays_RH" value="<?php echo $pays_service_rh ?>">
            <br>
        </div><br>

        <div>
            <b>TUTEUR PROFESSIONNEL DU STAGIAIRE </b><em>(à remplir par le responsable de l’encadrement du stagiaire)</em><br><br>
            <label>Nom:</label>
            <input type="text" name="Nom_tuteur" value="<?php echo $nom_tuteur?>">
            <label>Prénom</label>
            <input type="text" name="Prenom_tuteur" value="<?php echo $prenom_tuteur?>">
            <br>

            <label>Fonction</label>
            <input type="text" name="Fonction_tuteur" value="<?php echo $fonction_tuteur?>">
            <label>Service</label>
            <input type="text" name="Service_tuteur" value="<?php echo $service_tuteur?>">

            <label>Téléphone</label>
            <input type="text" name="Téléphone_tuteur" value="<?php echo $tel_tuteur?>">
            <br>

            <label>e-mail :</label>
            <input type="text" name="e-mail_tuteur" value="<?php echo $mail_tuteur?>">
            <br>

            <b>Adresse:</b>
            <label>N° Rue:</label>
            <input type="number" name="N°_Rue_tuteur" value="<?php echo $nO_rue_tuteur?>">
            <label>Rue:</label>
            <input type="text" name="Rue_tuteur" value="<?php echo $rue_tuteur?>">
            <label>Code postal:</label>
            <input type="number" name="Code_postal_tuteur" value="<?php echo $code_postal_tuteur?>">
            <label>Ville:</label>
            <input type="text" name="Ville_tuteur" value="<?php echo $ville_tuteur?>">
            <label>Pays:</label>
            <input type="text" name="Pays_tuteur" value="<?php echo $pays_tuteur?>">
            <br>
            
            Disponibilité du tuteur professionnel de stage : 
            <select name="dispo">
                <option <?php if($disponibilite_tuteur == "importante") echo 'selected'; ?>>importante</option>
                <option <?php if($disponibilite_tuteur == "partielle") echo 'selected'; ?>>partielle</option>
                <option <?php if($disponibilite_tuteur == "inexistante") echo 'selected'; ?>>inexistante</option>
            </select>
            <br>

            <b>DATES DU STAGE</b><br><br>
            <label>date de début:</label>
            <input type="date" name="date_de_début" value="<?php echo $date_debut ?>">
            <label>date de fin:</label>
            <input type="date" name="date_de_fin" value="<?php echo $date_fin ?>">
            <br>

            <label>Nombre d'heures</label>
            <input type="number" name="Nombre_heures" value="<?php echo $nbHeuresTotal ?>">
            <br>

            <strong>GRATIFICATIONS </strong><em>(obligatoires pour tout stage, même fractionné, à partir du 45ème jour de présence) :</em><br><br>

            <input type="radio" name="gratification" name="oui" <?php if($bool_grati == 1) echo 'checked'; ?>>
            <label>oui</label><br>
            <input type="radio" name="gratification" name="non" <?php if($bool_grati == 0) echo 'checked'; ?>>
            <label>non</label>
            <br>

            <strong>Si oui:</strong><br>
            <label>Montant gratification horaire (si montant mensuel, le diviser par 154) :</label>
            <input type="number" name="montant" step="any" min=0 value="<?php echo $montant ?>"> €
            <br>

            Versement de la gratification :
            <select name="Versement" value="<?php echo $type_versement ?>">
                <option <?php if($disponibilite_tuteur == "aucun") echo 'selected'; ?>>aucun</option>
                <option <?php if($disponibilite_tuteur == "cheque") echo 'selected'; ?>>cheque</option>
                <option <?php if($disponibilite_tuteur == "virement bancaire") echo 'selected'; ?>>virement bancaire</option>
                <option <?php if($disponibilite_tuteur == "especes") echo 'selected'; ?>>especes</option>
            </select>
            <br>

            <label>Pour les laboratoires de l’UGA, préciser l'organisme de prise en charge :</label>
            <input type="text" name="organisme" value="<?php echo $organisme ?>">
            <br>

            <label>Avantages en nature:</label>
            <input type="text" name="Avantages" value="<?php echo $avantages ?>">
            <br>

            <strong>Confidentialité du stage</strong><br>
            <input type="radio" name="confidentialité" name="yes" <?php if($bool_confidentialite == 1) echo 'checked'; ?>>
            <label>oui</label><br>
            <input type="radio" name="confidentialité" name="no" <?php if($bool_confidentialite == 0) echo 'checked'; ?>>
            <label>non</label>
            <br>

            <label><strong>TITRE DU STAGE :</strong></label>
            <input type="text" name="titre" value="<?php echo $titre ?>">
            <br>

            <strong>Description du <font color="red">projet</font> de l'entreprise dans lequel le stagiaire sera intégré / du produit sur lequel il travaillera :</strong>
            <br>
            <textarea name="Description" rows=5 cols=130><?php echo $description ?></textarea>
            <br>

            <strong><font color="red">Objectifs</font> du stage dans ce projet :</strong>
            <br>
            <textarea name="Objectifs" rows=5 cols=130 ><?php echo $objectifs ?></textarea>
            <br>

            <strong><font color="red">Tâches</font> qui seront confiées au stagiaire pour cette mission :</strong>
            <br>
            <textarea name="taches" rows=5 cols=130 ><?php echo $taches ?></textarea>
            <br>
            
            <strong><font color="red">Détail des travaux</font> à réaliser, avec langages et technos qui seront utilisés :</strong>
            <br>
            <textarea name="Detail" rows=5 cols=130 ><?php echo $details ?></textarea>
            <br>
        </div>
        <input name="nO_stage" value="<?php echo $nO_stage ?>" type="hidden">
        <p><input type="submit" value="Valider mes informations"></p>
    </form>
    </body>
</html>