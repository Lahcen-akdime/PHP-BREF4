CREATE TABLE ville (
id int PRIMARY key AUTO_INCREMENT ,
name varchar(100) not null
);
//
CREATE TABLE AVOCAT (
 id int PRIMARY key AUTO_INCREMENT ,
 name varchar(100) not null ,
 specialite ENUM("Droit_penal","civil","famille","affaires") not null ,
 consultation_en_ligne bool DEFAULT true ,
 Annes_dex int not null ,
 ville_id int ,
 FOREIGN KEY (ville_id) REFERENCES ville(id)
 ON DELETE SET NULL
);

CREATE TABLE HUISSIER (
 id int PRIMARY key AUTO_INCREMENT ,
 name varchar(100) not null ,
 types_actes ENUM("Signification","execution","constats") not null ,
 consultation_en_ligne bool DEFAULT true ,
 Annes_dex int not null ,
 ville_id int ,
 FOREIGN KEY (ville_id) REFERENCES ville(id)
 ON DELETE SET NULL
)

CREATE TABLE HUISSIER (
 id int PRIMARY key AUTO_INCREMENT ,
 name varchar(100) not null ,
 types_actes ENUM("Signification","execution","constats") not null ,
 consultation_en_ligne bool DEFAULT true ,
 Annes_dex int not null ,
 ville_id int ,
 FOREIGN KEY (ville_id) REFERENCES ville(id)
 ON DELETE SET NULL
)