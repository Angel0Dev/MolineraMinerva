CREATE TABLE `usuarios` (
 `id` int NOT NULL AUTO_INCREMENT,
 `nombre` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
 `apellido` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
 `correo` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
 `telefono` varchar(15) COLLATE utf8mb4_general_ci NOT NULL,
 `direccion` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
 `perfil` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
 `clave` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
 `token` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
 `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
 `estado` int NOT NULL DEFAULT '1',
 `rol` int NOT NULL,
 PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci


CREATE TABLE `carpetas` (
 `id` int NOT NULL AUTO_INCREMENT,
 `nombre` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
 `fecha_create` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
 `estado` int NOT NULL DEFAULT '1',
 `id_usuario` int NOT NULL,
 PRIMARY KEY (`id`),
 KEY `id_usuario` (`id_usuario`),
 CONSTRAINT `carpetas_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci



CREATE TABLE `archivos` (
 `id` int NOT NULL AUTO_INCREMENT,
 `nombre` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
 `tipo` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
 `fecha_create` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
 `estado` int NOT NULL DEFAULT '1',
 `elimina` datetime DEFAULT NULL,
 `id_carpeta` int NOT NULL,
 `id_usuario` int NOT NULL,
 PRIMARY KEY (`id`),
 KEY `id_carpeta` (`id_carpeta`),
 KEY `id_usuario` (`id_usuario`),
 CONSTRAINT `archivos_ibfk_1` FOREIGN KEY (`id_carpeta`) REFERENCES `carpetas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
 CONSTRAINT `archivos_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci



CREATE TABLE `detalle_archivos` (
 `id` int NOT NULL AUTO_INCREMENT,
 `fecha_add` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
 `correo` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
 `estado` int NOT NULL DEFAULT '1',
 `elimina` datetime DEFAULT NULL,
 `id_archivo` int NOT NULL,
 `id_usuario` int NOT NULL,
 PRIMARY KEY (`id`),
 KEY `id_archivo` (`id_archivo`),
 KEY `id_usuario` (`id_usuario`),
 CONSTRAINT `detalle_archivos_ibfk_1` FOREIGN KEY (`id_archivo`) REFERENCES `archivos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
 CONSTRAINT `detalle_archivos_ibfk_3` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci
