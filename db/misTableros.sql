

DROP TABLE IF EXISTS equipos CASCADE;

CREATE TABLE equipos
(
      id         BIGSERIAL    PRIMARY KEY
    , nombre     VARCHAR(255) NOT NULL

);


DROP TABLE IF EXISTS tableros CASCADE;

CREATE TABLE tableros
(

      id     BIGSERIAL    PRIMARY KEY
    , nombre VARCHAR(255) NOT NULL
    , equipo_id BIGINT       REFERENCES equipos (id)
                              ON DELETE CASCADE
                              ON UPDATE CASCADE

);

INSERT INTO equipos (nombre)
    VALUES ('Tableros personales'),
            ('2º DAW');

INSERT INTO tableros (nombre, equipo_id)
    VALUES ('Bienvenido', 1),
            ('Programación', 2),
            ('Autoevaluación', 2);
