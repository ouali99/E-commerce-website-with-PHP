-- Supprimer la base de données si elle existe
drop database if exists KOLI;

-- Créer une nouvelle base de données nommée KOLI
create database KOLI;

-- Utiliser la base de données KOLI
use KOLI;

-- Créer la table Utilisateur
create table Utilisateur
(
    id_utilisateur int primary key auto_increment,
    nom            varchar(100) not null,
    prenom         varchar(100),
    email          varchar(255) not null unique,
    telephone      varchar(20),
    date_naissance date,
    id_role        int,
    mot_de_passe   text not null
);

-- Créer la table Role
create table Role
(
    id_role  int primary key auto_increment,
    description varchar(100) not null
);

-- Créer la table Adresse
create table Adresse
(
    id_adresse  int primary key auto_increment,
    rue         varchar(100) not null,
    ville       varchar(100) not null,
    code_postal varchar(10)  not null,
    province    varchar(100) not null,
    defaut      int
);

-- Créer la table AdresseUtilisateur
create table AdresseUtilisateur
(
    id_utilisateur int,
    id_adresse     int,
    foreign key (id_adresse) references Adresse (id_adresse) on update cascade,
    foreign key (id_utilisateur) references Utilisateur (id_utilisateur) on delete cascade on update cascade
);

-- Créer la table Categorie
create table Categorie
(
    id_categorie int primary key auto_increment,
    nom_categorie varchar(100) not null
);
create table SousCategorie
(
    idSousCategory int primary key auto_increment,
    id_categorie     int,
    nomSousCategory varchar(100) not null,
    foreign key (id_categorie) references Categorie (id_categorie) on delete cascade on update cascade
);

-- Créer la table Article
create table Article
(
    id_article int primary key auto_increment,
    nomArticle varchar(100) not null,
    prix varchar(10) not null,
    courte_description text,
    description text,
    quantite int,
    id_categorie int,
    id_sous_categorie int,
    foreign key (id_categorie) references Categorie (id_categorie) on delete cascade on update cascade
    foreign key (id_sous_categorie) references SousCategorie(idSousCategory) on delete cascade on update cascade;
);
-- Créer la table ImageArticle
create table ImageArticle
(
    id_image int primary key auto_increment,
    id_article int,
    chemin_image text,
    foreign key (id_article) references Article (id_article)
);

-- Créer la table ArticleCommande
create table ArticleCommande
(
    id_article int,
    id_commande int,
    quantite int,
    foreign key (id_article) references Article (id_article),
    foreign key (id_commande) references Commande (id_commande)
);

-- Créer la table Commande
create table Commande
(
    id_commande int primary key auto_increment,
    quantite int,
    prix varchar(10),
    statut varchar(50),
    date_creation date,
    id_utilisateur int,
    mode_paiement varchar(50),
    foreign key (id_utilisateur) references Utilisateur (id_utilisateur)
);

-- Créer la table Slider
create table Slider
(
    id_slider int primary key auto_increment,
    titre varchar(255),
    sousTitre varchar(255),
    description text
);

-- Créer la table ImageSlider
create table ImageSlider
(
    id_image int primary key auto_increment,
    id_slider int,
    chemin_image text,
    foreign key (id_slider) references Slider (id_slider)
);

-- Ajouter une contrainte de clé étrangère pour le rôle de l'utilisateur
alter table Utilisateur
    add constraint fk_role_utilisateur
        foreign key (id_role) references Role (id_role);

-- Ajouter des rôles par défaut
insert into Role(description) value ('admin'),('client');
