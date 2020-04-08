-- Gestion de la Base de données 

DROP DATABASE IF EXISTS tp_php;
CREATE DATABASE tp_php
    DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE tp_php;

-- Création des tables

CREATE TABLE task_status (
    id TINYINT UNSIGNED AUTO_INCREMENT,
    status_name VARCHAR(50) NOT NULL,
    PRIMARY KEY(id)
);

CREATE TABLE category (
    id TINYINT UNSIGNED AUTO_INCREMENT,
    category_name VARCHAR(50) NOT NULL,
    PRIMARY KEY(id)
);


CREATE TABLE task (
    id INT UNSIGNED AUTO_INCREMENT,
    title VARCHAR(50) NOT NULL,
    progression INT UNSIGNED,
    due_date DATETIME,
    task_status_id TINYINT UNSIGNED NOT NULL,
    category_id TINYINT UNSIGNED NOT NULL,
    PRIMARY KEY (id),

    CONSTRAINT task_to_category
        FOREIGN KEY(category_id)
        REFERENCES category(id),

    CONSTRAINT task_to_status
        FOREIGN KEY(task_status_id)
        REFERENCES task_status(id)
);


-- Insertion des données 

INSERT INTO task_status (status_name)
VALUES ('A faire'),('En cours'),('Terminée');


INSERT INTO category (category_name)
VALUES('Rappel'),('Important'),('Shopping');


INSERT INTO task(title, progression, due_date, task_status_id, category_id)
VALUES('Ecrire à Franck', 0, '2020-04-22 16:32:22', 1,1), ('Envoyer code source', 0,'2020-04-12 16:32:22', 1,2), 
('Commit les modif', 0, '2020-04-2 16:32:22', 1,2),('Oeufs', 0, '2020-04-12 16:32:22', 1,3), ('Poivrons', 0, '2020-04-12 16:32:22', 1,3), 
('Lentilles', 0, '2020-04-12 16:32:22', 1,3), ('Quinoa', 0,'2020-04-12 16:32:22', 1,3),('Poivrons', 0, '2020-04-12 16:32:22', 1,3),
('Pizzas', 0, '2020-04-12 16:32:22', 1,3),('Thé', 0, '2020-04-12 16:32:22', 1,3),('Masque FFP2', 0, '2020-04-12 16:32:22', 1,3)
,('Chocolat', 0, '2020-04-12 16:32:22', 1,3),('Contacter EPSI', 0, '2020-04-12 16:32:22', 1,2),('Ajouter photos', 0, '2020-04-12 16:32:22', 1,2)
,('Faire le logo', 0, '2020-04-12 16:32:22', 1,2),('Modifier mdp', 0, '2020-04-12 16:32:22', 1,2),('Faire tests Coding Games', 0, '2020-04-12 16:32:22', 1,2);


