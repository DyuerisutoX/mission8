-- 
-- tout dabord Focus sur la table EQUIPIER
--
--
DROP DATABASE IF EXISTS surfwave;

/*Créer la BDD*/
CREATE DATABASE surfwave;

ALTER DATABASE surfwave charset UTF8;

USE surfwave;

/*Table duree*/
CREATE TABLE DUREE
(
    codeDuree   VARCHAR(5) PRIMARY KEY NOT NULL,
    libDuree    VARCHAR(255)
);

INSERT INTO DUREE    VALUES
    ( '1H'  , '1 heure') ,
    ( '2H'   , '2 heures') , 
    ( '3H'   , '3 heures') , 
    ( '4H'   , '4 heures') , 
    ( '1J'  , '1 jour') , 
    ( '2J'   , '2 jour') , 
    ( '3J'   , '3 jour') , 
    ( '4J'   , '4 jour') , 
    ( '5J'   , '5 jour'),
    ( '6J'   , '6 jour');

/*Table catProd*/
CREATE TABLE CATPROD
(
    categoProd   VARCHAR(5) PRIMARY KEY NOT NULL,
    libCategoProd    VARCHAR(255)
);

INSERT INTO CATPROD    VALUES
    ( 'PS'  , 'Planche de Surf') ,
    ( 'BB'   , 'Bodyboard') , 
    ( 'CO'   , 'Combinaison');


/*Table tarif*/
CREATE TABLE TARIFER
(
    codeDuree   VARCHAR(5) NOT NULL,
    categoProd   VARCHAR(5) NOT NULL,
    prixLocation    INT(2),

    PRIMARY KEY(codeDuree, categoProd)
);

ALTER TABLE TARIFER
    
    ADD CONSTRAINT tarif_FK1 FOREIGN KEY (codeDuree) REFERENCES DUREE (codeDuree),
    ADD CONSTRAINT tarif_FK2 FOREIGN KEY (categoProd) REFERENCES CATPROD (categoProd)

    ON DELETE RESTRICT
    ON UPDATE RESTRICT;

INSERT INTO TARIFER    VALUES
    ( '1H'  , 'PS', '10') ,
    ( '1H'  , 'BB', '7') ,
    ( '1H'  , 'CO', '7') ,
    ( '2H'  , 'PS', '15') ,
    ( '2H'  , 'BB', '10') ,
    ( '2H'  , 'CO', '10') ,
    ( '3H'  , 'PS', '20') ,
    ( '3H'  , 'BB', '15') ,
    ( '3H'  , 'CO', '15') ,
    ( '4H'  , 'PS', '25') ,
    ( '4H'  , 'BB', '20') ,
    ( '4H'  , 'CO', '20') ,
    ( '1J'  , 'PS', '35') ,
    ( '1J'  , 'BB', '25') ,
    ( '1J'  , 'CO', '25') ,
    ( '2J'  , 'PS', '45') ,
    ( '2J'  , 'BB', '35') ,
    ( '2J'  , 'CO', '35') ,
    ( '3J'  , 'PS', '55') ,
    ( '3J'  , 'BB', '45') ,
    ( '3J'  , 'CO', '45') ,
    ( '4J'  , 'PS', '65') ,
    ( '4J'  , 'BB', '55') ,
    ( '4J'  , 'CO', '55') ,
    ( '5J'  , 'PS', '75') ,
    ( '5J'  , 'BB', '65') ,
    ( '5J'  , 'CO', '65') ,
    ( '6J'  , 'PS', '85') ,
    ( '6J'  , 'BB', '75') ,
    ( '6J'  , 'CO', '75') ;

/*↑↑↑↑↑ ajout sql perso ↑↑↑↑↑*/
CREATE TABLE EQUIPIER (
    codeEq      VARCHAR(5) NOT NULL , 
    surnomEq    VARCHAR(15) NOT NULL , 
    nomEq       VARCHAR(50) , 
    fonctionEq  VARCHAR(15) NOT NULL , 
    noRole      INT(1),
    PRIMARY KEY (codeEq)	
);

INSERT INTO EQUIPIER    VALUES
    ( 'BOSS'  , 'Gourou' 	, 'MARCON Emmanuel'	, 'Directeur', 1 ) ,
    ( 'DAN'   , 'Dantel' 	, 'CASTOR Jean'	, 'Commercial' , 2) , 
    ( 'DID'   , 'Didi' 	, 'LAMBROUY Didier' , 'Commercial' , 2) , 
    ( 'PAT'   , 'Patou' 	, NULL			, 'Moniteur' , 3) , 
    ( 'FRED'  , 'Fredo' 	, NULL			, 'Moniteur' , 3) , 
    ( 'WIL'   , 'Will' 	, 'SOVÉ Willy'	, 'Moniteur' , 3) , 
    ( 'KIM'   , 'Kimi' 	, 'GAGA Géralde'	, 'e-commerce' , 4) , 
    ( 'ADJ'   , 'Isa' 	, 'FONFEC Sophie'	, 'e-commerce' , 4) , 
    ( 'FAN'   , 'Fany' 	, NULL			, 'e-commerce' , 4);

--
--
-- Et voici le reste du script
--
CREATE TABLE QUESTION (
    idQuest 	INT 		NOT NULL , 
    libQuest VARCHAR(100) NOT NULL ,
    PRIMARY KEY (idQuest)	
);

CREATE TABLE QDP (
    codeEq   VARCHAR(5)   NOT NULL , 
    idQuest 	INT 		NOT NULL , 
    reponse  VARCHAR(500) , 
    PRIMARY KEY (codeEq , idQuest) , 
    FOREIGN KEY (codeEq) REFERENCES EQUIPIER(codeEq) , 
    FOREIGN KEY (idQuest) REFERENCES QUESTION(idQuest)
);
--
-- data pour finir
INSERT INTO QUESTION   VALUES
    ( 1  , "Ma qualité préférée chez les autres."  ) ,
    ( 2  , "Mon idée du bonheur. "  ) ,
    ( 3  , "La couleur que je préfère."  ) ,
    ( 4  , "Le plat que je préfère."  ) ,
    ( 5  , "En quoi je voudrais être réincarné.e."  );

INSERT INTO QDP   VALUES
    ( "BOSS" , 1  , "Présider et décider"  ) ,
    ( "BOSS" , 2  , "Etre roi de ce pays"  ) ,
    ( "BOSS" , 3  , "Jaune sable"  ) ,
    ( "BOSS" , 4  , "La dinde de la cour"  ) ,
    ( "BOSS" , 5  , "Louis XIV"  ) ;