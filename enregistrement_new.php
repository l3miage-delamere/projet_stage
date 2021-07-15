<head>
        <link rel="stylesheet" href="style.css" />
</head>
<h1> L'enregistrement de vos données a bien été effectué </h1>
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

        //récupération du numéro de stage qui vient d'être créé
        $get_next_AUTO_INCREMENT = "SELECT `AUTO_INCREMENT` FROM  INFORMATION_SCHEMA.TABLES WHERE TABLE_SCHEMA = 'projet_stage' AND   TABLE_NAME   = 'stage';";
        $result_AUTO_INCREMENT = mysqli_query($mysqlconn,$get_next_AUTO_INCREMENT);
        $res = mysqli_fetch_assoc($result_AUTO_INCREMENT);
        $nO_stage = $res["AUTO_INCREMENT"]-1;


        //création de l'étudiant
        if($_POST["N_etudiant"]!=''){
            $new_etudiant = "insert into etudiant (nO_etu) values('".$_POST["N_etudiant"]."');";
            $res = $mysqlconn->query($new_etudiant);

            //création du stage
            $create_stage = "insert into stage (etudiant) values ('".$_POST["N_etudiant"]."');";
            $res = $mysqlconn->query($create_stage);

            //insertion nom
            if($_POST["nom"]!=''){
                $update_etudiant = "update etudiant set nom='".$_POST["nom"]."' where nO_etu = '".$_POST["N_etudiant"]."';";
                $res = $mysqlconn->query($update_etudiant);
            }

            //insertion prenom
            if($_POST["prenom"]!=''){
                $update_etudiant = "update etudiant set prenom='".$_POST["prenom"]."' where nO_etu = '".$_POST["N_etudiant"]."';";
                $res = $mysqlconn->query($update_etudiant);
            }

            //insertion N_telephone
            if($_POST["N_telephone"]!=''){
                $update_etudiant = "update etudiant set tel='".$_POST["N_telephone"]."' where nO_etu = '".$_POST["N_etudiant"]."';";
                $res = $mysqlconn->query($update_etudiant);
            }

            //insertion e-mail
            if($_POST["e-mail"]!=''){
                $update_etudiant = "update etudiant set mail='".$_POST["e-mail"]."' where nO_etu = '".$_POST["N_etudiant"]."';";
                $res = $mysqlconn->query($update_etudiant);
            }

            //insertion type_aff
            if($_POST["type_d'affiliation"]!=''){
                $update_etudiant = "update etudiant set type_aff='".$_POST["type_d'affiliation"]."' where nO_etu = '".$_POST["N_etudiant"]."';";
                $res = $mysqlconn->query($update_etudiant);
            }

            //insertion filière
            if($_POST["filiere"]!=''){
                $update_etudiant = "update etudiant set filiere='".$_POST["filiere"]."' where nO_etu = '".$_POST["N_etudiant"]."';";
                $res = $mysqlconn->query($update_etudiant);
            }

            //insertion enseignant
            $update_etudiant = "update etudiant set enseignant='L.Pierre' where nO_etu = '".$_POST["N_etudiant"]."';";
            $res = $mysqlconn->query($update_etudiant);

            //insertion caisse_maladie
            if($_POST["assurance_maladie"]!=''){
                $update_etudiant = "update etudiant set caisse_maladie='".$_POST["assurance_maladie"]."' where nO_etu = '".$_POST["N_etudiant"]."';";
                $res = $mysqlconn->query($update_etudiant);
            }

            //insertion Adresse
            if($_POST["N_Rue"]!='' && $_POST["Rue"]!=''){
                $new_adresse = "insert into Adresse (nO_Rue, Rue) values(".$_POST["N_Rue"].",'".$_POST["Rue"]."');";
                $res = $mysqlconn->query($new_adresse);
                $update_etudiant = "update etudiant set nO_rue=".$_POST["N_Rue"].", rue='".$_POST["Rue"]."' where nO_etu = '".$_POST["N_etudiant"]."';";
                $res = $mysqlconn->query($update_etudiant);

                //insertion code_postal
                if($_POST["Code_postal"]!=''){
                    $update_etudiant = "update adresse set code_postal='".$_POST["Code_postal"]."' where nO_Rue = ".$_POST["N_Rue"]." and Rue = '".$_POST["Rue"]."';";
                    $res = $mysqlconn->query($update_etudiant);
                }

                //insertion Ville
                if($_POST["Ville"]!=''){
                    $update_etudiant = "update adresse set ville='".$_POST["Ville"]."' where nO_Rue = ".$_POST["N_Rue"]." and Rue = '".$_POST["Rue"]."';";
                    $res = $mysqlconn->query($update_etudiant);
                }

                //insertion Pays
                if($_POST["Pays"]!=''){
                    $update_etudiant = "update adresse set pays='".$_POST["Pays"]."' where nO_Rue = ".$_POST["N_Rue"]." and Rue = '".$_POST["Rue"]."';";
                    $res = $mysqlconn->query($update_etudiant);
                }
            }
        }
        else{
            echo "votre numéro d'étudiant doit être rempli! <br>";
        }

        if($_POST["N_SIRET"]!=''){
            $new_entreprise = "insert into entreprise (nO_siret) values('".$_POST["N_SIRET"]."');";
            $res = $mysqlconn->query($new_entreprise);

            //insertion N_siret dans le stage
            $update_stage = "update stage set entreprise='".$_POST["N_SIRET"]."' where nO_stage =".$nO_stage.";";
            $res = $mysqlconn->query($update_stage);

            //insertion raison sociale
            if($_POST["Raison_sociale"]!=''){
                $update_entreprise = "update entreprise set raison_sociale='".$_POST["Raison_sociale"]."' where nO_siret = '".$_POST["N_SIRET"]."';";
                $res = $mysqlconn->query($update_entreprise);
            }

            //insertion Représentant legal
            if($_POST["Représentant_legal"]!=''){
                $update_entreprise = "update entreprise set representant='".$_POST["Représentant_legal"]."' where nO_siret = '".$_POST["N_SIRET"]."';";
                $res = $mysqlconn->query($update_entreprise);
            }

            //insertion fonction representant
            if($_POST["Fonction"]!=''){
                $update_entreprise = "update entreprise set fonction_representant='".$_POST["Fonction"]."' where nO_siret = '".$_POST["N_SIRET"]."';";
                $res = $mysqlconn->query($update_entreprise);
            }

            //insertion code ape
            if($_POST["Code_APE"]!=''){
                $update_entreprise = "update entreprise set code_ape='".$_POST["Code_APE"]."' where nO_siret = '".$_POST["N_SIRET"]."';";
                $res = $mysqlconn->query($update_entreprise);
            }

            //insertion activite
            if($_POST["domaine_d'activité"]!=''){
                $update_entreprise = "update entreprise set activite='".$_POST["domaine_d'activité"]."' where nO_siret = '".$_POST["N_SIRET"]."';";
                $res = $mysqlconn->query($update_entreprise);
            }

            //insertion effectif
            if($_POST["Effectif"]!=''){
                $update_entreprise = "update entreprise set effectif=".$_POST["Effectif"]." where nO_siret = '".$_POST["N_SIRET"]."';";
                $res = $mysqlconn->query($update_entreprise);
            }

            //insertion Adresse
            if($_POST["N°_Rue_EA"]!='' && $_POST["Rue_EA"]!=''){
                $new_adresse = "insert into Adresse (nO_Rue, Rue) values('".$_POST["N°_Rue_EA"]."','".$_POST["Rue_EA"]."');";
                $res = $mysqlconn->query($new_adresse);
                $update_entreprise = "update entreprise set nO_rue=".$_POST["N°_Rue_EA"].", rue='".$_POST["Rue_EA"]."' where nO_SIRET = '".$_POST["N_SIRET"]."';";
                $res = $mysqlconn->query($update_entreprise);

                //insertion code_postal
                if($_POST["Code_postal_EA"]!=''){
                    $update_etudiant = "update adresse set code_postal='".$_POST["Code_postal_EA"]."' where nO_Rue = ".$_POST["N_Rue"]." and Rue = '".$_POST["Rue"]."';";
                    $res = $mysqlconn->query($update_etudiant);
                }

                //insertion Ville
                if($_POST["Ville_EA"]!=''){
                    $update_etudiant = "update adresse set ville='".$_POST["Ville_EA"]."' where nO_Rue = ".$_POST["N_Rue"]." and Rue = '".$_POST["Rue"]."';";
                    $res = $mysqlconn->query($update_etudiant);
                }

                //insertion Pays
                if($_POST["Pays_EA"]!=''){
                    $update_etudiant = "update adresse set pays='".$_POST["Pays_EA"]."' where nO_Rue = ".$_POST["N_Rue"]." and Rue = '".$_POST["Rue"]."';";
                    $res = $mysqlconn->query($update_etudiant);
                }
            }
            
            //insertion service d'accueil
            if($_POST["Service_accueil"]!=''){
                $update_entreprise = "update entreprise set service_accueil='".$_POST["Service_accueil"]."' where nO_siret = '".$_POST["N_SIRET"]."';";
                $res = $mysqlconn->query($update_entreprise);
            }

            //création Service RH
            if($_POST["Nom_RH"]!='' && $_POST["Prénom_RH"]!=''){
                $new_service = "insert into service_rh (nom, prenom) values('".$_POST["Nom_RH"]."','".$_POST["Prénom_RH"]."');";
                $res = $mysqlconn->query($new_service);
                $update_entreprise = "update entreprise set nom_service_RH='".$_POST["Nom_RH"]."', prenom_service_RH='".$_POST["Prénom_RH"]."' where nO_siret = '".$_POST["N_SIRET"]."';";
                $res = $mysqlconn->query($update_entreprise);
            }

            //insertion N_telephone
            if($_POST["Téléphone"]!=''){
                $update_etudiant = "update service_rh set tel='".$_POST["Téléphone"]."' where nom = '".$_POST["Nom_RH"]."' and prenom='".$_POST["Prénom_RH"]."';";
                $res = $mysqlconn->query($update_etudiant);
            }

            //insertion e-mail
            if($_POST["e-mail_RH"]!=''){
                $update_etudiant = "update service_rh set mail='".$_POST["e-mail_RH"]."' where nom = '".$_POST["Nom_RH"]."' and prenom='".$_POST["Prénom_RH"]."';";
                $res = $mysqlconn->query($update_etudiant);
            }

            //insertion adresse RH
            if($_POST["N°_Rue_RH"]!='' && $_POST["Rue_RH"]!=''){
                $new_adresse = "insert into Adresse (nO_Rue, Rue) values('".$_POST["N°_Rue_RH"]."','".$_POST["Rue_RH"]."');";
                $res = $mysqlconn->query($new_adresse);
                $update_service_RH = "update service_rh set nO_rue=".$_POST["N°_Rue_RH"].", rue='".$_POST["Rue_RH"]."' where nom = '".$_POST["Nom_RH"]."' and prenom='".$_POST["Prénom_RH"]."';";
                $res = $mysqlconn->query($update_service_RH);

                //insertion code_postal
                if($_POST["Code_postal_RH"]!=''){
                    $update_adresse = "update adresse set code_postal='".$_POST["Code_postal_RH"]."' where nO_Rue = ".$_POST["N°_Rue_RH"]." and Rue = '".$_POST["Rue_RH"]."';";
                    $res = $mysqlconn->query($update_adresse);
                }

                //insertion Ville
                if($_POST["Ville_RH"]!=''){
                    $update_adresse = "update adresse set ville='".$_POST["Ville_RH"]."' where nO_Rue = ".$_POST["N°_Rue_RH"]." and Rue = '".$_POST["Rue_RH"]."';";
                    $res = $mysqlconn->query($update_adresse);
                }

                //insertion Pays
                if($_POST["Pays_RH"]!=''){
                    $update_adresse = "update adresse set pays='".$_POST["Pays_RH"]."' where nO_Rue = ".$_POST["N°_Rue_RH"]." and Rue = '".$_POST["Rue_RH"]."';";
                    $res = $mysqlconn->query($update_adresse);
                }
            }
        }

        //création tuteur
        if($_POST["Nom_tuteur"]!='' && $_POST["Prenom_tuteur"]!=''){
            $new_tuteur = "insert into tuteur (nom, prenom) values('".$_POST["Nom_tuteur"]."','".$_POST["Prenom_tuteur"]."');";
            $res = $mysqlconn->query($new_tuteur);

            //insertion du tuteur dans le stage
            $update_stage = "update stage set nom_tuteur='".$_POST["Nom_tuteur"]."', prenom_tuteur='".$_POST["Prenom_tuteur"]."' where nO_stage =".$nO_stage.";";
            $res = $mysqlconn->query($update_stage);

            //insertion fonction tuteur
            if($_POST["Fonction_tuteur"]!=''){
                $update_tuteur = "update tuteur set fonction='".$_POST["Fonction_tuteur"]."' where nom = '".$_POST["Nom_tuteur"]."' and prenom ='".$_POST["Prenom_tuteur"]."';";
                $res = $mysqlconn->query($update_tuteur);
            }

            //insertion service tuteur
            if($_POST["Service_tuteur"]!=''){
                $update_tuteur = "update tuteur set service='".$_POST["Service_tuteur"]."' where nom = '".$_POST["Nom_tuteur"]."' and prenom ='".$_POST["Prenom_tuteur"]."';";
                $res = $mysqlconn->query($update_tuteur);
            }

            //insertion téléphone tuteur
            if($_POST["Téléphone_tuteur"]!=''){
                $update_tuteur = "update tuteur set tel='".$_POST["Téléphone_tuteur"]."' where nom = '".$_POST["Nom_tuteur"]."' and prenom ='".$_POST["Prenom_tuteur"]."';";
                $res = $mysqlconn->query($update_tuteur);
            }

            //insertion mail tuteur
            if($_POST["e-mail_tuteur"]!=''){
                $update_tuteur = "update tuteur set mail='".$_POST["e-mail_tuteur"]."' where nom = '".$_POST["Nom_tuteur"]."' and prenom ='".$_POST["Prenom_tuteur"]."';";
                $res = $mysqlconn->query($update_tuteur);
            }

            //insertion adresse tuteur
            if($_POST["N°_Rue_tuteur"]!='' && $_POST["Rue_tuteur"]!=''){
                $new_adresse = "insert into Adresse (nO_Rue, Rue) values('".$_POST["N°_Rue_tuteur"]."','".$_POST["Rue_tuteur"]."');";
                $res = $mysqlconn->query($new_adresse);
                $update_tuteur = "update tuteur set nO_rue=".$_POST["N°_Rue_tuteur"].", rue='".$_POST["Rue_tuteur"]."' where nom = '".$_POST["Nom_tuteur"]."' and prenom='".$_POST["Prenom_tuteur"]."';";
                $res = $mysqlconn->query($update_tuteur);

                //insertion code_postal
                if($_POST["Code_postal_tuteur"]!=''){
                    $update_adresse = "update adresse set code_postal='".$_POST["Code_postal_tuteur"]."' where nO_Rue = ".$_POST["N°_Rue_tuteur"]." and Rue = '".$_POST["Rue_tuteur"]."';";
                    $res = $mysqlconn->query($update_adresse);
                }

                //insertion Ville
                if($_POST["Ville_tuteur"]!=''){
                    $update_adresse = "update adresse set ville='".$_POST["Ville_tuteur"]."' where nO_Rue = ".$_POST["N°_Rue_tuteur"]." and Rue = '".$_POST["Rue_tuteur"]."';";
                    $res = $mysqlconn->query($update_adresse);
                }

                //insertion Pays
                if($_POST["Pays_tuteur"]!=''){
                    $update_adresse = "update adresse set pays='".$_POST["Pays_tuteur"]."' where nO_Rue = ".$_POST["N°_Rue_tuteur"]." and Rue = '".$_POST["Rue_tuteur"]."';";
                    $res = $mysqlconn->query($update_adresse);
                }
            }

            //insertion dispo tuteur
            if($_POST["dispo"]!=''){
                $update_tuteur = "update tuteur set dispo='".$_POST["dispo"]."' where nom = '".$_POST["Nom_tuteur"]."' and prenom ='".$_POST["Prenom_tuteur"]."';";
                $res = $mysqlconn->query($update_tuteur);
            }
        }

        //insertion date début
        $update_stage = "update stage set date_debut='".$_POST["date_de_début"]."' where nO_stage =".$nO_stage.";";
        $res = $mysqlconn->query($update_stage);

        //insertion date début
        $update_stage = "update stage set date_fin='".$_POST["date_de_fin"]."' where nO_stage =".$nO_stage.";";
        $res = $mysqlconn->query($update_stage);

        //insertion nombre d'heures total
        $update_stage = "update stage set nbHeuresTotal=".$_POST["Nombre_heures"]." where nO_stage =".$nO_stage.";";
        $res = $mysqlconn->query($update_stage);

        //insertion booléen gratification
        if(isset($_POST["oui"])){
            $update_stage = "update stage set bool_grati=1 where nO_stage =".$nO_stage.";";
        }
        else{
            $update_stage = "update stage set bool_grati=0 where nO_stage =".$nO_stage.";";
        }
        $res = $mysqlconn->query($update_stage);

        //insertion montant gratification
        $update_stage = "update stage set montant=".$_POST["montant"]." where nO_stage =".$nO_stage.";";
        $res = $mysqlconn->query($update_stage);

        //insertion type de versement
        $update_stage = "update stage set type_versement='".$_POST["Versement"]."' where nO_stage =".$nO_stage.";";
        $res = $mysqlconn->query($update_stage);

        //insertion organisme
        $update_stage = "update stage set organisme='".$_POST["organisme"]."' where nO_stage =".$nO_stage.";";
        $res = $mysqlconn->query($update_stage);

        //insertion avantages
        $update_stage = "update stage set avantages='".$_POST["Avantages"]."' where nO_stage =".$nO_stage.";";
        $res = $mysqlconn->query($update_stage);

        //insertion booléen confidentialité
        if(isset($_POST["yes"])){
            $update_stage = "update stage set bool_confidentialite=1 where nO_stage =".$nO_stage.";";
        }
        else{
            $update_stage = "update stage set bool_confidentialite=0 where nO_stage =".$nO_stage.";";
        }
        $res = $mysqlconn->query($update_stage);

        //insertion titre du stage
        $update_stage = "update stage set titre='".$_POST["titre"]."' where nO_stage =".$nO_stage.";";
        $res = $mysqlconn->query($update_stage);

        //insertion description
        $update_stage = "update stage set description='".$_POST["Description"]."' where nO_stage =".$nO_stage.";";
        $res = $mysqlconn->query($update_stage);

        //insertion objectifs
        $update_stage = "update stage set objectifs='".$_POST["Objectifs"]."' where nO_stage =".$nO_stage.";";
        $res = $mysqlconn->query($update_stage);

        //insertion taches
        $update_stage = "update stage set taches='".$_POST["taches"]."' where nO_stage =".$nO_stage.";";
        $res = $mysqlconn->query($update_stage);

        //insertion details
        $update_stage = "update stage set details='".$_POST["Detail"]."' where nO_stage =".$nO_stage.";";
        $res = $mysqlconn->query($update_stage);
?>