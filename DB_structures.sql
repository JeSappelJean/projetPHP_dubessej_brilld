DROP TABLE IF EXISTS secteurs_structures;
DROP TABLE IF EXISTS secteur;
DROP TABLE IF EXISTS structure;

CREATE TABLE IF NOT EXISTS secteur (
  ID int(11) NOT NULL AUTO_INCREMENT,
  LIBELLE varchar(100) NOT NULL UNIQUE,
  PRIMARY KEY (ID)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS structure (
  ID int(11) NOT NULL AUTO_INCREMENT,
  NOM varchar(100) NOT NULL,
  RUE varchar(200) NOT NULL,
  CP varchar(5) NOT NULL,
  VILLE varchar(100) NOT NULL,
  ESTASSO tinyint(1) NOT NULL,
  NB_DONATEURS INT,
  NB_ACTIONNAIRES INT,
  PRIMARY KEY (ID)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE  IF NOT EXISTS secteurs_structures (
  ID int(11) NOT NULL AUTO_INCREMENT,
  ID_STRUCTURE int(11) NOT NULL,
  ID_SECTEUR int(11) NOT NULL,
  PRIMARY KEY (ID),
  KEY ID_STRUCTURE (ID_STRUCTURE),
  KEY ID_SECTEUR (ID_SECTEUR),
  CONSTRAINT secteurs_structures_structure_fk FOREIGN KEY (ID_STRUCTURE) REFERENCES structure (ID),
  CONSTRAINT secteurs_structures_secteur_fk FOREIGN KEY (ID_SECTEUR) REFERENCES secteur (ID)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO secteur(LIBELLE) VALUES ('Energie');
INSERT INTO secteur(LIBELLE) VALUES ('Environnement');
INSERT INTO secteur(LIBELLE) VALUES ('Transport');
INSERT INTO secteur(LIBELLE) VALUES ('Automobile');
INSERT INTO secteur(LIBELLE) VALUES ('Informatique');

INSERT INTO structure(NOM,RUE,CP,VILLE,ESTASSO,NB_ACTIONNAIRES) VALUES ('Veolia','rue veolia','75000','Paris',0,1000000);
INSERT INTO structure(NOM,RUE,CP,VILLE,ESTASSO,NB_ACTIONNAIRES) VALUES ('Renault','rue Renault','78000','Versailles',0,2000000);
INSERT INTO structure(NOM,RUE,CP,VILLE,ESTASSO,NB_DONATEURS) VALUES ('WWF','rue WWF','92000','Antony',1,500000);
INSERT INTO structure(NOM,RUE,CP,VILLE,ESTASSO,NB_ACTIONNAIRES) VALUES ('Microsoft','rue Microsoft','75000','Paris',0,3000000);

INSERT INTO secteurs_structures(ID_STRUCTURE,ID_SECTEUR) VALUES (1,1);
INSERT INTO secteurs_structures(ID_STRUCTURE,ID_SECTEUR) VALUES (1,2);
INSERT INTO secteurs_structures(ID_STRUCTURE,ID_SECTEUR) VALUES (1,3);
INSERT INTO secteurs_structures(ID_STRUCTURE,ID_SECTEUR) VALUES (2,4);
INSERT INTO secteurs_structures(ID_STRUCTURE,ID_SECTEUR) VALUES (3,2);
INSERT INTO secteurs_structures(ID_STRUCTURE,ID_SECTEUR) VALUES (4,5);

COMMIT;
