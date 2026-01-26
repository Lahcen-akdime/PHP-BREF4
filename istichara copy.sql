
CREATE TYPE role_enum AS ENUM ('admin','avocat','uissier','client');
CREATE TYPE status_enum AS ENUM ('Pending', 'Accepted', 'Rejected');
CREATE TYPE specialite_enum AS ENUM ('Droit_penal','civil','famille','affaires');
CREATE TYPE types_enum AS ENUM ('signification','execution','constats');

CREATE TABLE avocats (
  id INT PRIMARY KEY REFERENCES users(id) ON DELETE CASCADE,
  specialite specialite_enum NOT NULL,
  consultation_en_ligne BOOLEAN DEFAULT true,
  Annes_dex INT NOT NULL,
  ville_id INT REFERENCES villes(id) ON DELETE SET NULL,
  status status_enum DEFAULT 'Pending',
  taarif DECIMAL(10,2),
  document VARCHAR(255)[],
  disponibilite JSONB
);
CREATE TABLE huissiers (
  id INT PRIMARY KEY REFERENCES users(id) ON DELETE CASCADE,
  types_actes types_enum NOT NULL,
  consultation_en_ligne BOOLEAN DEFAULT true,
  Annes_dex INT NOT NULL,
  status status_enum DEFAULT 'Pending',
  taarif DECIMAL(10,2),
  document VARCHAR(255)[],
  ville_id INT REFERENCES villes(id) ON DELETE SET NULL,
  disponibilite JSONB
);
CREATE TABLE demandes (
  id SERIAL PRIMARY KEY,
  status status_enum DEFAULT 'Pending',
  client_id INT REFERENCES users(id) ON DELETE CASCADE,
  professionel_id INT REFERENCES users(id) ON DELETE CASCADE,
  date_debut TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  date_fin TIMESTAMP NOT NULL DEFAULT (CURRENT_TIMESTAMP + INTERVAL '1 hour')
);

CREATE TABLE rendez_vous (
  id SERIAL PRIMARY KEY,
  link VARCHAR(100),
  demande_id INT REFERENCES demandes(id) ON DELETE CASCADE,
  date_debut TIMESTAMP,
  date_fin TIMESTAMP,
  heures DECIMAL(10,2)
);
