

DROP TABLE IF EXISTS tableros;

CREATE TABLE tableros
(

      id     BIGSERIAL PRIMARY KEY
    , nombre VARCHAR(255) NOT NULL

);

INSERT INTO tableros (nombre)
    VALUES ('Bienvenido');
