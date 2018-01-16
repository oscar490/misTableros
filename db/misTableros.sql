

DROP TABLE IF EXISTS equipos CASCADE;

CREATE TABLE equipos
(
      id         BIGSERIAL    PRIMARY KEY
    , nombre     VARCHAR(255) UNIQUE

);


DROP TABLE IF EXISTS tableros CASCADE;

CREATE TABLE tableros
(

      id     BIGSERIAL    PRIMARY KEY
    , nombre VARCHAR(255) UNIQUE

);


DROP TABLE IF EXISTS equipos_tableros CASCADE;

CREATE TABLE equipos_tableros
(

      id         BIGSERIAL PRIMARY KEY
    , equipo_id  BIGINT    REFERENCES equipos (id)
                           ON DELETE CASCADE ON UPDATE CASCADE
    , tablero_id BIGINT    REFERENCES tableros (id)
                           ON DELETE CASCADE ON UPDATE CASCADE

);

INSERT INTO equipos (nombre)
    VALUES ('Tableros personales'),
            ('2º DAW');

INSERT INTO tableros (nombre)
    VALUES ('Bienvenido'),
            ('Programación'),
            ('Autoevaluación');

INSERT INTO equipos_tableros (equipo_id, tablero_id)
    VALUES (1, 1),
            (2, 2),
            (2, 3);
