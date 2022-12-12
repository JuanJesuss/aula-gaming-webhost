CREATE TABLE `alumnos`
(
    `email` VARCHAR(60) NOT NULL,
    `password` VARCHAR(40) NOT NULL,
    `alias` VARCHAR(21) NOT NULL,
    `turno` VARCHAR(10) NOT NULL,
    `nombre` VARCHAR(50) NOT NULL, 
    `apellidos` VARCHAR(50) NOT NULL,
    `codigo_recuperacion_password` VARCHAR(6),
    CONSTRAINT `PK_alumnos_email` PRIMARY KEY (`email`)
) ENGINE=InnoDB;

CREATE TABLE `reservas`
(
    `id` VARCHAR(8) NOT NULL,
    `puesto` VARCHAR(1) NOT NULL,
    `fecha` DATE NOT NULL,
    `email` VARCHAR(60) NOT NULL,
    `turno` VARCHAR(10) NOT NULL,
    `registrador` VARCHAR(2) NOT NULL,
    `alias` VARCHAR(21) NOT NULL,
    CONSTRAINT `PK_reservas_id` PRIMARY KEY (`id`)
) ENGINE=InnoDB;

CREATE TABLE `partidas`
(
    `id` VARCHAR(8) NOT NULL,
    `fecha` DATE NOT NULL,
    `juego` VARCHAR(50) NOT NULL,
    `posicion` VARCHAR(10) NOT NULL,
    `email` VARCHAR(60) NOT NULL,
    `nombre` VARCHAR(50) NOT NULL, 
    `apellidos` VARCHAR(50) NOT NULL,
    `alias` VARCHAR(30) NOT NULL,
    `turno` VARCHAR(10) NOT NULL,
    CONSTRAINT `PK_partidas_id` PRIMARY KEY (`id`)
) ENGINE=InnoDB;

CREATE TABLE `juegos`
(
    `id` VARCHAR(2) NOT NULL,
    `juego` VARCHAR(50) NOT NULL,
    `fecha` DATE NOT NULL,
    CONSTRAINT `PK_juegos_id` PRIMARY KEY (`id`)
) ENGINE=InnoDB;
