create type role_enum as ENUM('admin','avocat','uissier','client')
create table users (
id SERIAL PRIMARY KEY,
name varchar(50) NOT NULL,
email varchar(250) UNIQUE NOT NULL,
password varchar(50) NOT NULL,
role role_enum
);
create type status_enum as ENUM ('Pending', 'Accepted', 'Rejected')

create table demandes(
id SERIAL PRIMARY key ,
status status_enum,
client_id int,
professionel_id int,
FOREIGN KEY (client_id) REFERENCES users(id),
FOREIGN KEY (professionel_id) REFERENCES users(id)
)
CREATE TABLE rendez_vous (
id SERIAL PRIMARY KEY ,
link varchar(100) ,
demande_id int,
FOREIGN KEY (demande_id) REFERENCES demandes(id),
date_debut TIMESTAMP ,
date_fin TIMESTAMP,
heures decimal(1,2)
)

CREATE TABLE villes (
id SERIAL PRIMARY KEY ,
name varchar(100) not null
)
CREATE TYPE specialite_enum as ENUM('Droit_penal','civil','famille','affaires');
CREATE TABLE avocats (
 specialite specialite_enum not null ,
 consultation_en_ligne bool DEFAULT true ,
 Annes_dex int not null ,
 ville_id int ,
 status bool default false,
taarif decimal(10,2),
document varchar(255) array[3],
 FOREIGN KEY (ville_id) REFERENCES villes(id)
 ON DELETE SET NULL,
 primary key (id),
 disponibilite JSONB  
)inherits(users);

CREATE TYPE types_enum  AS ENUM('signification','execution','constats');
CREATE TABLE huissiers (
 types_actes types_enum not null ,
 consultation_en_ligne bool DEFAULT true ,
 Annes_dex int not null ,
  status bool default false,
taarif decimal(10,2),
document varchar(255) array[3],
 ville_id int ,
 FOREIGN KEY (ville_id) REFERENCES villes(id)
 ON DELETE SET NULL,
  disponibilite JSONB,  
  primary key (id)
)inherits(users);

ALTER TABLE demandes 
ADD COLUMN date_debut TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
ADD COLUMN date_fin TIMESTAMP NOT NULL DEFAULT (CURRENT_TIMESTAMP + INTERVAL '1 hour');