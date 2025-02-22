CREATE DATABASE connect_user;

USE connect_user;  -- Changé 'inscription' en 'connect_user' pour correspondre à la base créée

CREATE TABLE inscription (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(100),
    prenom VARCHAR(100),  -- Changé DECIMAL(10,2) en VARCHAR(100) car c'est plus approprié pour un prénom
    username VARCHAR(100),
    password VARCHAR(255),  -- Changé 'password' en VARCHAR(255) car 'password' n'est pas un type valide
    confirm_password VARCHAR(255)  -- Changé 'password' en VARCHAR(255) et ajouté une virgule manquante avant
);  -- Retiré la virgule finale qui n'est pas nécessaire