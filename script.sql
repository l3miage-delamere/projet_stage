CREATE TABLE adresse
(
    nO_rue int(11) NOT NULL,
    rue VARCHAR(50) NOT NULL,
    code_postal int(11),
    ville varchar(50),
    pays VARCHAR(50),
    primary key (nO_rue,rue)
)

CREATE TABLE service_rh
(
    nom varchar(50) NOT NULL,
    prenom varchar(50) NOT NULL,
    tel VARCHAR(30),
    mail VARCHAR(50),
    nO_rue int(11),
    rue VARCHAR(50),
    foreign key nO_rue REFERENCES adresse(nO_rue),
    foreign key rue REFERENCES adresse(rue)
)

CREATE TABLE entreprise
(
    nO_siret varchar(20) PRIMARY KEY NOT NULL,
    raison_sociale VARCHAR(50),
    representant VARCHAR(30),
    fonction_representant VARCHAR(50),
    code_ape varchar(50),
    activite VARCHAR(50),
    effectif int(11),
    service_accueil VARCHAR(30),
    nO_rue int(11),
    rue VARCHAR(50),
    nom_service_RH varchar(50),
    prenom_service_RH varchar(50),
    foreign key nO_rue REFERENCES adresse(nO_rue),
    foreign key rue REFERENCES adresse(rue),
    foreign key nom_service_RH REFERENCES service_rh(nom),
    foreign key prenom_service_RH REFERENCES service_rh(prenom)
)

CREATE TABLE etudiant
(
    nO_etu varchar(20) NOT NULL,
    nom varchar(50),
    prenom varchar(30),
    tel VARCHAR(30),
    mail VARCHAR(50),
    type_aff varchar(30),
    filiere varchar(20),
    enseignant varchar(11),
    caisse_maladie varchar(30),
    nO_rue int(11),
    rue VARCHAR(50),
    foreign key nO_rue REFERENCES adresse(nO_rue),
    foreign key rue REFERENCES adresse(rue)
)

create table super_utilisateur(
    pseudo varchar(50) PRIMARY KEY NOT NULL,
    mdp VARCHAR(50)
)

CREATE TABLE tuteur
(
    prenom varchar(20) NOT NULL,
    nom varchar(50) NOT NULL,
    fonction varchar(30),
    service varchar(30),
    tel VARCHAR(30),
    mail VARCHAR(50),
    dispo varchar(11),
    nO_rue int(11),
    rue VARCHAR(50),
    foreign key nO_rue REFERENCES adresse(nO_rue),
    foreign key rue REFERENCES adresse(rue)
)

CREATE TABLE stage
(
    nO_stage int(11) PRIMARY KEY NOT NULL,
    date_debut date,
    date_fin date,
    nbHeuresTotal int(11),
    description text,
    taches text,
    details text,
    bool_grati tinyint(1),
    bool_confidentialite tinyint(1),
    titre VARCHAR(50),
    montant float,
    type_versement VARCHAR(30),
    organisme varchar(30),
    avantages varchar(100),
    etudiant varchar(30),
    entreprise varchar(20),
    nom_tuteur varchar(50),
    prenom_tuteur varchar(50),
    foreign key etudiant REFERENCES etudiant(nO_etu),
    foreign key entreprise REFERENCES entreprise(nO_siret),
    foreign key nom_tuteur REFERENCES tuteur(nom),
    foreign key prenom_tuteur REFERENCES tuteur(prenom)
)
