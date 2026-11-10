-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 10-11-2026 a las 04:39:23
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `usuario`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `anecdatario`
--

CREATE TABLE `anecdatario` (
  `documentoestudiante` varchar(15) NOT NULL,
  `nombreestudiante` varchar(50) NOT NULL,
  `fechanacimiento` date NOT NULL,
  `direccion` varchar(50) NOT NULL,
  `nombremadre` varchar(50) NOT NULL,
  `documentom` varchar(20) NOT NULL,
  `telefonom` varchar(20) NOT NULL,
  `nombrepadre` varchar(50) NOT NULL,
  `documentop` varchar(20) NOT NULL,
  `telefonop` varchar(20) NOT NULL,
  `acudiente` varchar(50) NOT NULL,
  `parentesco` varchar(50) NOT NULL,
  `telefonoacu` varchar(20) NOT NULL,
  `docente` varchar(50) NOT NULL,
  `fechainiciacion` date NOT NULL,
  `grado` int(11) NOT NULL,
  `año` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `anecdatario`
--

INSERT INTO `anecdatario` (`documentoestudiante`, `nombreestudiante`, `fechanacimiento`, `direccion`, `nombremadre`, `documentom`, `telefonom`, `nombrepadre`, `documentop`, `telefonop`, `acudiente`, `parentesco`, `telefonoacu`, `docente`, `fechainiciacion`, `grado`, `año`) VALUES
('1020410001', 'SAMUEL RESTREPO GIRALDO', '2022-03-14', 'CALLE 18 # 10-20', 'LUZ MARINA GIRALDO OSPINA', '43251001', '3001000001', 'CARLOS ANDRÉS RESTREPO HENAO', '71251001', '3002000001', '', '', '', 'PAULA ANDREA SUÁREZ GIL', '2026-02-02', 345, 2026),
('1020410018', 'MARIANA PÉREZ MONSALVE', '2020-12-02', 'CALLE 19 # 11-21', 'DIANA PATRICIA MONSALVE RÍOS', '43251012', '3001000002', 'JUAN CAMILO PÉREZ GALLEGO', '71251014', '3002000002', '', '', '', 'MÓNICA OSPINA TABORDA', '2026-02-02', 456, 2026),
('1020410035', 'EMMANUEL MARTÍNEZ CARDONA', '2023-06-21', 'CALLE 20 # 12-22', 'YULIANA CARDONA ZULUAGA', '43251023', '3001000003', 'JHON FREDY MARTÍNEZ OCAMPO', '71251027', '3002000003', '', '', '', 'ERIKA JOHANA BETANCUR YEPES', '2026-02-02', 234, 2026),
('1020410052', 'ISABELLA GARCÍA OSORIO', '2022-09-09', 'CALLE 21 # 13-23', 'PAOLA ANDREA OSORIO GÓMEZ', '43251034', '3001000004', 'LUIS FERNANDO GARCÍA SÁNCHEZ', '71251040', '3002000004', '', '', '', 'DANIELA CORREA PALACIO', '2026-02-02', 346, 2026),
('1020410069', 'JUAN JOSÉ HERNÁNDEZ VÉLEZ', '2024-01-18', 'CALLE 22 # 14-24', 'CATALINA VÉLEZ MEJÍA', '43251045', '3001000005', 'SEBASTIÁN HERNÁNDEZ AGUDELO', '71251053', '3002000005', '', '', '', 'MARÍA ELENA RENDÓN CASTRO', '2026-02-02', 123, 2026),
('1020410086', 'VALENTINA RAMÍREZ ARANGO', '2021-02-25', 'CALLE 23 # 15-25', 'SANDRA MILENA ARANGO LONDOÑO', '43251056', '3001000006', 'ANDRÉS FELIPE RAMÍREZ CASTAÑO', '71251066', '3002000006', '', '', '', 'CAROLINA FRANCO LOPERA', '2026-02-02', 457, 2026),
('1020410103', 'SANTIAGO MORALES QUINTERO', '2023-10-05', 'CALLE 24 # 16-26', 'JOHANA QUINTERO MARÍN', '43251067', '3001000007', 'DIEGO ALEJANDRO MORALES CARDONA', '71251079', '3002000007', '', '', '', 'GLORIA INÉS ALZATE RIVERA', '2026-02-02', 235, 2026),
('1020410120', 'SALOMÉ ROJAS DUQUE', '2024-07-30', 'CALLE 25 # 17-27', 'NATALIA DUQUE ALZATE', '43251078', '3001000008', 'JULIÁN DAVID ROJAS ARBOLEDA', '71251092', '3002000008', '', '', '', 'LILIANA ESCOBAR NARANJO', '2026-02-02', 124, 2026),
('1020410137', 'MATEO TAMAYO SALAZAR', '2025-04-12', 'CALLE 26 # 18-28', 'MARTHA LUCÍA SALAZAR PINEDA', '43251089', '3001000009', 'WILSON ALBERTO TAMAYO URREA', '71251105', '3002000009', '', '', '', 'CLAUDIA PATRICIA SERNA VALENCIA', '2026-02-02', 110, 2026),
('1020410154', 'LUCIANA GIRALDO TORO', '2026-03-03', 'CALLE 27 # 19-29', 'VANESSA TORO ECHEVERRI', '43251100', '3001000010', 'MAURICIO GIRALDO LÓPEZ', '71251118', '3002000010', '', '', '', 'ADRIANA MUÑOZ LOAIZA', '2026-02-02', 100, 2026),
('1040034855', 'Samuel Cardona', '2026-11-10', 'Calle 9 Sur 79C 115 Interior 1801', 'ALEJANDRA RICO', '1040030405', '3053059161', 'jose rios', '12345678', '31284921', '', '', '', 'LUISA', '2026-11-02', 234, 2026),
('123', 'juan', '1999-12-12', 'la ceja', 'maria', '12345', '34251672', 'jose', '98765', '32178493', 'julio', 'xtio', '67853', 'juana', '1999-10-12', 0, 2020);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `anecdota`
--

CREATE TABLE `anecdota` (
  `id` int(11) NOT NULL,
  `documentoestudiante` varchar(15) NOT NULL,
  `fecha` date NOT NULL,
  `comportamiento` text NOT NULL,
  `firma` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `anecdota`
--

INSERT INTO `anecdota` (`id`, `documentoestudiante`, `fecha`, `comportamiento`, `firma`) VALUES
(1, '1040034855', '2026-11-02', 'El estudiante aprendió a leer los números', 'LUISA'),
(2, '1020410001', '2026-02-10', 'Se integra con facilidad al juego en grupo y comparte los materiales con sus compañeros.', 'PAULA ANDREA SUÁREZ GIL'),
(3, '1020410018', '2026-02-24', 'Lloró al momento de la despedida, pero se calmó con el apoyo de la docente en pocos minutos.', 'MÓNICA OSPINA TABORDA'),
(4, '1020410035', '2026-03-09', 'Muestra interés por los cuentos y participa repitiendo palabras y frases cortas.', 'ERIKA JOHANA BETANCUR YEPES'),
(5, '1020410052', '2026-03-23', 'Reconoce los colores primarios y los nombra durante la actividad de pintura.', 'DANIELA CORREA PALACIO'),
(6, '1020410069', '2026-04-14', 'Le cuesta esperar su turno; se trabajó el respeto de turnos con una actividad guiada.', 'MARÍA ELENA RENDÓN CASTRO'),
(7, '1020410086', '2026-05-05', 'Sigue instrucciones sencillas y colabora con el orden del salón al terminar la actividad.', 'CAROLINA FRANCO LOPERA'),
(8, '1020410001', '2026-05-19', 'Estuvo inquieto durante la siesta; se conversó con la familia sobre sus rutinas de sueño.', 'PAULA ANDREA SUÁREZ GIL'),
(9, '1020410018', '2026-06-02', 'Mejora en su coordinación motora fina al ensartar fichas y usar el lápiz.', 'MÓNICA OSPINA TABORDA'),
(10, '1020410035', '2026-08-11', 'Expresa sus emociones con palabras y pide ayuda cuando la necesita.', 'ERIKA JOHANA BETANCUR YEPES'),
(11, '1020410052', '2026-09-01', 'Disfruta las actividades de música y movimiento y baila siguiendo el ritmo.', 'DANIELA CORREA PALACIO'),
(12, '1020410069', '2026-09-22', 'Ayudó a un compañero a recoger los juguetes sin que se lo pidieran.', 'MARÍA ELENA RENDÓN CASTRO'),
(13, '1020410086', '2026-10-13', 'Participó con entusiasmo en la salida pedagógica a la huerta del jardín.', 'CAROLINA FRANCO LOPERA'),
(14, '1040034855', '2026-11-03', 'Le pegó a un estudiante', 'LUISA');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `docente`
--

CREATE TABLE `docente` (
  `documento` int(11) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellidos` varchar(50) NOT NULL,
  `sexo` varchar(50) NOT NULL,
  `fecha` date NOT NULL,
  `lugar` varchar(50) NOT NULL,
  `direccion` varchar(50) NOT NULL,
  `barrio` varchar(50) NOT NULL,
  `eps` varchar(50) NOT NULL,
  `rh` varchar(50) NOT NULL,
  `grado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `docente`
--

INSERT INTO `docente` (`documento`, `password`, `nombre`, `apellidos`, `sexo`, `fecha`, `lugar`, `direccion`, `barrio`, `eps`, `rh`, `grado`) VALUES
(39410001, '39410001', 'ADRIANA', 'MUÑOZ LOAIZA', 'femenino', '1988-03-12', 'LA CEJA', 'CARRERA 20 # 15-30', 'EL CARMEN', 'NUEVA EPS', 'AB+', 100),
(39410008, '39410008', 'CLAUDIA PATRICIA', 'SERNA VALENCIA', 'femenino', '1985-07-21', 'MEDELLÍN', 'CARRERA 21 # 16-31', 'SAN RAFAEL', 'SALUD TOTAL', 'O+', 110),
(39410015, '39410015', 'MARÍA ELENA', 'RENDÓN CASTRO', 'femenino', '1979-11-05', 'RIONEGRO', 'CARRERA 22 # 17-32', 'LAS PALMAS', 'SANITAS', 'A+', 123),
(39410022, '39410022', 'LILIANA', 'ESCOBAR NARANJO', 'femenino', '1990-01-29', 'ENVIGADO', 'CARRERA 23 # 18-33', 'LOS PINOS', 'COOSALUD', 'B-', 124),
(39410029, '39410029', 'ERIKA JOHANA', 'BETANCUR YEPES', 'femenino', '1992-06-17', 'LA CEJA', 'CARRERA 24 # 19-34', 'LA ESPERANZA', 'SAVIA SALUD', 'O+', 234),
(39410036, '39410036', 'GLORIA INÉS', 'ALZATE RIVERA', 'femenino', '1983-09-02', 'EL RETIRO', 'CARRERA 25 # 20-35', 'EL PORVENIR', 'SURA', 'A+', 235),
(39410043, '39410043', 'PAULA ANDREA', 'SUÁREZ GIL', 'femenino', '1994-04-26', 'LA CEJA', 'CARRERA 26 # 21-36', 'CENTRO', 'NUEVA EPS', 'O+', 345),
(39410050, '39410050', 'DANIELA', 'CORREA PALACIO', 'femenino', '1996-12-08', 'MARINILLA', 'CARRERA 27 # 22-37', 'SAN CAYETANO', 'SALUD TOTAL', 'B+', 346),
(39410057, '39410057', 'MÓNICA', 'OSPINA TABORDA', 'femenino', '1981-05-14', 'LA CEJA', 'CARRERA 28 # 23-38', 'LA ALDEA', 'SANITAS', 'O-', 456),
(39410064, '39410064', 'CAROLINA', 'FRANCO LOPERA', 'femenino', '1991-10-31', 'ABEJORRAL', 'CARRERA 29 # 24-39', 'MIRAFLORES', 'COOSALUD', 'A-', 457),
(1040034732, '1040034732', 'LUISA', 'BOTERO', 'femenino', '2006-07-16', 'LA CEJA', 'LA CEJA', 'CENTRO', 'NUEVA EPS', 'A+', 456);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `documentos`
--

CREATE TABLE `documentos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `contenido` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `documentos`
--

INSERT INTO `documentos` (`id`, `nombre`, `contenido`) VALUES
(1, 'pagare', '5.  PAGARÉ A LA ORDEN.docx'),
(2, 'consentimiento', '6.  CONSENTIMIENTO INFORMADO MENORES.doc'),
(3, 'autorizacion', '8.  AUTORIZACION TOMA DE FOTOS Y REGISTROS 2021.docx'),
(4, 'renovacion_datos', '3.  renovacion datos NIÑOS 2022.docx'),
(5, 'prestacion', '4.  CONTRATO DE PRESTACIÓN DE SERVICIOS EDUCATIVOS.docx'),
(6, 'salidas_pedagogicas', '7.  AUTORIZACIÓN SALIDAS PEDAGÓGICAS.docx'),
(24, 'CONTRATO', 'contrato.docx');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudiante`
--

CREATE TABLE `estudiante` (
  `documento` int(11) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellidos` varchar(50) NOT NULL,
  `sexo` varchar(50) NOT NULL,
  `fecha` date NOT NULL,
  `expedicion` varchar(50) NOT NULL,
  `lugar` varchar(50) NOT NULL,
  `direccion` varchar(50) NOT NULL,
  `barrio` varchar(50) NOT NULL,
  `eps` varchar(50) NOT NULL,
  `rh` varchar(50) NOT NULL,
  `mama` int(11) NOT NULL,
  `papa` int(11) NOT NULL,
  `grado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `estudiante`
--

INSERT INTO `estudiante` (`documento`, `password`, `nombre`, `apellidos`, `sexo`, `fecha`, `expedicion`, `lugar`, `direccion`, `barrio`, `eps`, `rh`, `mama`, `papa`, `grado`) VALUES
(1020410001, '1020410001', 'SAMUEL', 'RESTREPO GIRALDO', 'masculino', '2022-03-14', 'LA CEJA', 'LA CEJA', 'CALLE 18 # 10-20', 'CENTRO', 'SURA', 'O+', 43251001, 71251001, 345),
(1020410018, '1020410018', 'MARIANA', 'PÉREZ MONSALVE', 'femenino', '2020-12-02', 'LA CEJA', 'LA CEJA', 'CALLE 19 # 11-21', 'SAN CAYETANO', 'NUEVA EPS', 'B+', 43251012, 71251014, 456),
(1020410035, '1020410035', 'EMMANUEL', 'MARTÍNEZ CARDONA', 'masculino', '2023-06-21', 'LA CEJA', 'LA CEJA', 'CALLE 20 # 12-22', 'LA ALDEA', 'SALUD TOTAL', 'O-', 43251023, 71251027, 234),
(1020410052, '1020410052', 'ISABELLA', 'GARCÍA OSORIO', 'femenino', '2022-09-09', 'LA CEJA', 'LA CEJA', 'CALLE 21 # 13-23', 'MIRAFLORES', 'SANITAS', 'A-', 43251034, 71251040, 346),
(1020410069, '1020410069', 'JUAN JOSÉ', 'HERNÁNDEZ VÉLEZ', 'masculino', '2024-01-18', 'LA CEJA', 'LA CEJA', 'CALLE 22 # 14-24', 'EL CARMEN', 'COOSALUD', 'AB+', 43251045, 71251053, 123),
(1020410086, '1020410086', 'VALENTINA', 'RAMÍREZ ARANGO', 'femenino', '2021-02-25', 'LA CEJA', 'LA CEJA', 'CALLE 23 # 15-25', 'SAN RAFAEL', 'SAVIA SALUD', 'O+', 43251056, 71251066, 457),
(1020410103, '1020410103', 'SANTIAGO', 'MORALES QUINTERO', 'masculino', '2023-10-05', 'LA CEJA', 'LA CEJA', 'CALLE 24 # 16-26', 'LAS PALMAS', 'SURA', 'A+', 43251067, 71251079, 235),
(1020410120, '1020410120', 'SALOMÉ', 'ROJAS DUQUE', 'femenino', '2024-07-30', 'LA CEJA', 'LA CEJA', 'CALLE 25 # 17-27', 'LOS PINOS', 'NUEVA EPS', 'B-', 43251078, 71251092, 124),
(1020410137, '1020410137', 'MATEO', 'TAMAYO SALAZAR', 'masculino', '2025-04-12', 'LA CEJA', 'LA CEJA', 'CALLE 26 # 18-28', 'LA ESPERANZA', 'SALUD TOTAL', 'O+', 43251089, 71251105, 110),
(1020410154, '1020410154', 'LUCIANA', 'GIRALDO TORO', 'femenino', '2026-03-03', 'LA CEJA', 'LA CEJA', 'CALLE 27 # 19-29', 'EL PORVENIR', 'SANITAS', 'A+', 43251100, 71251118, 100),
(1040034855, '$2y$10$KMvZUIZO.67CgYmsA4TL4.pZC5wZvzR0GdnbpJUczD2Ynfx4g3P.q', 'Samuel', 'Cardona', 'masculino', '2026-11-10', 'La Ceja', 'La Ceja', 'Calle 9 Sur 79C 115 Interior 1801', 'Montesol', 'Salud Total', 'O+', 1040030405, 12345678, 234);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grados`
--

CREATE TABLE `grados` (
  `codigo` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `descripcion` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `grados`
--

INSERT INTO `grados` (`codigo`, `nombre`, `descripcion`) VALUES
(100, 'sala cuna', 'grado inicial, bebés'),
(110, 'caminadores', 'grado para niños que empiezan a caminar'),
(123, 'parvulos', 'grado menor'),
(124, 'parvulos B', 'segundo grupo de parvulos'),
(234, 'prejardin', 'grado superior a parvulos'),
(235, 'prejardin B', 'segundo grupo de prejardin'),
(345, 'jardin', 'grado superior a prejardin'),
(346, 'jardin B', 'segundo grupo de jardin'),
(456, 'transicion', 'grado superior'),
(457, 'transicion B', 'segundo grupo de transicion');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `informe`
--

CREATE TABLE `informe` (
  `codigo` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `estudiante` int(11) NOT NULL,
  `dimensiones` varchar(100) NOT NULL,
  `valoracion` varchar(100) NOT NULL,
  `definitiva` varchar(100) NOT NULL,
  `profesor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `informe`
--

INSERT INTO `informe` (`codigo`, `fecha`, `estudiante`, `dimensiones`, `valoracion`, `definitiva`, `profesor`) VALUES
(1, '2026-06-15', 1020410001, 'Cognitiva', 'Reconoce formas y colores y resuelve rompecabezas sencillos.', 'Superior', 39410043),
(2, '2026-06-15', 1020410018, 'Comunicativa', 'Amplía su vocabulario y relata hechos cortos con claridad.', 'Alto', 39410057),
(3, '2026-06-15', 1020410035, 'Corporal', 'Mejora su equilibrio y la coordinación en juegos de movimiento.', 'Alto', 39410029),
(4, '2026-06-15', 1020410052, 'Socioafectiva', 'Comparte con sus compañeros y reconoce sus emociones.', 'Superior', 39410050),
(5, '2026-06-15', 1020410069, 'Estética', 'Participa con creatividad en actividades de pintura y modelado.', 'Básico', 39410015),
(6, '2026-10-30', 1020410086, 'Ética', 'Respeta las normas del salón y los turnos de participación.', 'Alto', 39410064),
(7, '2026-10-30', 1020410103, 'Cognitiva', 'Reconoce formas y colores y resuelve rompecabezas sencillos.', 'Superior', 39410036),
(8, '2026-10-30', 1020410120, 'Comunicativa', 'Amplía su vocabulario y relata hechos cortos con claridad.', 'Alto', 39410022),
(9, '2026-10-30', 1020410137, 'Corporal', 'Mejora su equilibrio y la coordinación en juegos de movimiento.', 'Básico', 39410008),
(10, '2026-10-30', 1020410154, 'Socioafectiva', 'Comparte con sus compañeros y reconoce sus emociones.', 'Superior', 39410001);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mama`
--

CREATE TABLE `mama` (
  `documentom` int(11) NOT NULL,
  `passwordm` varchar(255) NOT NULL,
  `nombrem` varchar(50) NOT NULL,
  `apellidosm` varchar(50) NOT NULL,
  `sexom` varchar(50) NOT NULL,
  `estadocivilm` varchar(50) NOT NULL,
  `fecham` date NOT NULL,
  `expedicionm` varchar(50) NOT NULL,
  `lugarm` varchar(50) NOT NULL,
  `direccionm` varchar(50) NOT NULL,
  `barriom` varchar(50) NOT NULL,
  `epsm` varchar(50) NOT NULL,
  `rhm` varchar(50) NOT NULL,
  `profesionm` varchar(50) NOT NULL,
  `telefonom` varchar(50) NOT NULL,
  `correom` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `mama`
--

INSERT INTO `mama` (`documentom`, `passwordm`, `nombrem`, `apellidosm`, `sexom`, `estadocivilm`, `fecham`, `expedicionm`, `lugarm`, `direccionm`, `barriom`, `epsm`, `rhm`, `profesionm`, `telefonom`, `correom`) VALUES
(129, '129', 'maria', 'lopez', 'femenino', 'soltero', '1999-10-10', 'la ceja', 'la ceja', 'calle 20', 'cayeto', 'sura', 'AP', 'ama de casa', '31063628', 'maria@gmail.com'),
(39189, '39189', 'MONICA', 'MORENO ', 'femenino', 'soltero', '1999-05-14', 'LA CEJA', 'LA CEJA', 'CALLE 21', 'CENTRO', 'SURA', 'AP', 'CONTADORA', '3147243873', 'MONI@GMAIL.COM'),
(43251001, '43251001', 'LUZ MARINA', 'GIRALDO OSPINA', 'femenino', 'casado', '1990-04-12', 'LA CEJA', 'RIONEGRO', 'CALLE 18 # 10-20', 'CENTRO', 'SURA', 'A+', 'AMA DE CASA', '3001000001', 'madre1@example.com'),
(43251012, '43251012', 'DIANA PATRICIA', 'MONSALVE RÍOS', 'femenino', 'unionlibre', '1988-09-23', 'MEDELLÍN', 'ENVIGADO', 'CALLE 19 # 11-21', 'SAN CAYETANO', 'NUEVA EPS', 'O+', 'ENFERMERA', '3001000002', 'madre2@example.com'),
(43251023, '43251023', 'YULIANA', 'CARDONA ZULUAGA', 'femenino', 'casado', '1995-01-30', 'RIONEGRO', 'LA CEJA', 'CALLE 20 # 12-22', 'LA ALDEA', 'SALUD TOTAL', 'B+', 'AUXILIAR CONTABLE', '3001000003', 'madre3@example.com'),
(43251034, '43251034', 'PAOLA ANDREA', 'OSORIO GÓMEZ', 'femenino', 'soltero', '1991-07-08', 'ENVIGADO', 'EL RETIRO', 'CALLE 21 # 13-23', 'MIRAFLORES', 'SANITAS', 'O-', 'DISEÑADORA', '3001000004', 'madre4@example.com'),
(43251045, '43251045', 'CATALINA', 'VÉLEZ MEJÍA', 'femenino', 'casado', '1993-11-17', 'LA CEJA', 'LA CEJA', 'CALLE 22 # 14-24', 'EL CARMEN', 'COOSALUD', 'A-', 'ABOGADA', '3001000005', 'madre5@example.com'),
(43251056, '43251056', 'SANDRA MILENA', 'ARANGO LONDOÑO', 'femenino', 'separado', '1989-05-02', 'EL RETIRO', 'MARINILLA', 'CALLE 23 # 15-25', 'SAN RAFAEL', 'SAVIA SALUD', 'AB+', 'COMERCIANTE', '3001000006', 'madre6@example.com'),
(43251067, '43251067', 'JOHANA', 'QUINTERO MARÍN', 'femenino', 'unionlibre', '1994-12-21', 'LA CEJA', 'LA CEJA', 'CALLE 24 # 16-26', 'LAS PALMAS', 'SURA', 'O+', 'PSICÓLOGA', '3001000007', 'madre7@example.com'),
(43251078, '43251078', 'NATALIA', 'DUQUE ALZATE', 'femenino', 'casado', '1992-03-14', 'MARINILLA', 'ABEJORRAL', 'CALLE 25 # 17-27', 'LOS PINOS', 'NUEVA EPS', 'A+', 'ADMINISTRADORA', '3001000008', 'madre8@example.com'),
(43251089, '43251089', 'MARTHA LUCÍA', 'SALAZAR PINEDA', 'femenino', 'casado', '1986-08-27', 'LA CEJA', 'LA CEJA', 'CALLE 26 # 18-28', 'LA ESPERANZA', 'SALUD TOTAL', 'B-', 'FLORICULTORA', '3001000009', 'madre9@example.com'),
(43251100, '43251100', 'VANESSA', 'TORO ECHEVERRI', 'femenino', 'unionlibre', '1996-02-09', 'ABEJORRAL', 'MEDELLÍN', 'CALLE 27 # 19-29', 'EL PORVENIR', 'SANITAS', 'O+', 'ODONTÓLOGA', '3001000010', 'madre10@example.com'),
(1040030405, '1040030405', 'ALEJANDRA', 'RICO', 'femenino', 'unionlibre', '1980-04-05', 'LA CEJA', 'LA CEJA', 'DIAGONAL 13', 'MIRAFLORES', 'SURA', 'AP', 'SECRETARIA', '3053059161', 'ALEJARICO@HOTMAIL.COM');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `papa`
--

CREATE TABLE `papa` (
  `documentop` int(11) NOT NULL,
  `passwordp` varchar(255) NOT NULL,
  `nombrep` varchar(50) NOT NULL,
  `apellidosp` varchar(50) NOT NULL,
  `sexop` varchar(50) NOT NULL,
  `estadocivilp` varchar(50) NOT NULL,
  `fechap` date NOT NULL,
  `expedicionp` varchar(50) NOT NULL,
  `lugarp` varchar(50) NOT NULL,
  `direccionp` varchar(50) NOT NULL,
  `barriop` varchar(50) NOT NULL,
  `epsp` varchar(50) NOT NULL,
  `rhp` varchar(50) NOT NULL,
  `profesionp` varchar(50) NOT NULL,
  `telefonop` varchar(50) NOT NULL,
  `correop` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `papa`
--

INSERT INTO `papa` (`documentop`, `passwordp`, `nombrep`, `apellidosp`, `sexop`, `estadocivilp`, `fechap`, `expedicionp`, `lugarp`, `direccionp`, `barriop`, `epsp`, `rhp`, `profesionp`, `telefonop`, `correop`) VALUES
(15385, '15385', 'LUIS ', 'BOTERO', 'masculino', 'casado', '1988-08-12', 'LA CEJA', 'LA CEJA', 'CALLE 12', 'LA ALDEA', 'SURA', 'AP', 'TAXISTA', '3218356860', 'LUIS@GMAIL.COM'),
(12345678, '12345678', 'jose', 'rios', 'masculino', 'soltero', '1999-10-10', 'la ceja', 'la ceja', 'calle 23', 'san cayetano', 'sura', 'AN', 'abogado', '31284921', 'jose@gmail.com'),
(15378633, '15378633', 'HORACIO', 'BOTERO', 'masculino', 'casado', '1950-06-03', 'LA CEJA', 'LA CEJA', 'CALLE 23A 18-47', 'SAN CAYETANO', 'SALUD TOTAL', 'BP', 'INDEPENDIENTE', '3147509403', 'HORACIO@GMAIL.COM'),
(71251001, '71251001', 'CARLOS ANDRÉS', 'RESTREPO HENAO', 'masculino', 'casado', '1988-06-15', 'MEDELLÍN', 'ENVIGADO', 'CALLE 18 # 10-20', 'CENTRO', 'SALUD TOTAL', 'O-', 'INGENIERO CIVIL', '3002000001', 'padre1@example.com'),
(71251014, '71251014', 'JUAN CAMILO', 'PÉREZ GALLEGO', 'masculino', 'unionlibre', '1985-10-04', 'RIONEGRO', 'LA CEJA', 'CALLE 19 # 11-21', 'SAN CAYETANO', 'SANITAS', 'A-', 'CONTADOR', '3002000002', 'padre2@example.com'),
(71251027, '71251027', 'JHON FREDY', 'MARTÍNEZ OCAMPO', 'masculino', 'casado', '1990-02-19', 'ENVIGADO', 'EL RETIRO', 'CALLE 20 # 12-22', 'LA ALDEA', 'COOSALUD', 'AB+', 'CONDUCTOR', '3002000003', 'padre3@example.com'),
(71251040, '71251040', 'LUIS FERNANDO', 'GARCÍA SÁNCHEZ', 'masculino', 'soltero', '1987-12-01', 'LA CEJA', 'LA CEJA', 'CALLE 21 # 13-23', 'MIRAFLORES', 'SAVIA SALUD', 'O+', 'COMERCIANTE', '3002000004', 'padre4@example.com'),
(71251053, '71251053', 'SEBASTIÁN', 'HERNÁNDEZ AGUDELO', 'masculino', 'casado', '1992-05-25', 'EL RETIRO', 'MARINILLA', 'CALLE 22 # 14-24', 'EL CARMEN', 'SURA', 'A+', 'PROGRAMADOR', '3002000005', 'padre5@example.com'),
(71251066, '71251066', 'ANDRÉS FELIPE', 'RAMÍREZ CASTAÑO', 'masculino', 'separado', '1989-09-13', 'LA CEJA', 'LA CEJA', 'CALLE 23 # 15-25', 'SAN RAFAEL', 'NUEVA EPS', 'B-', 'ARQUITECTO', '3002000006', 'padre6@example.com'),
(71251079, '71251079', 'DIEGO ALEJANDRO', 'MORALES CARDONA', 'masculino', 'unionlibre', '1991-01-07', 'MARINILLA', 'ABEJORRAL', 'CALLE 24 # 16-26', 'LAS PALMAS', 'SALUD TOTAL', 'O+', 'TÉCNICO ELECTRICISTA', '3002000007', 'padre7@example.com'),
(71251092, '71251092', 'JULIÁN DAVID', 'ROJAS ARBOLEDA', 'masculino', 'casado', '1993-04-22', 'LA CEJA', 'LA CEJA', 'CALLE 25 # 17-27', 'LOS PINOS', 'SANITAS', 'A+', 'MÉDICO', '3002000008', 'padre8@example.com'),
(71251105, '71251105', 'WILSON ALBERTO', 'TAMAYO URREA', 'masculino', 'casado', '1984-11-30', 'ABEJORRAL', 'MEDELLÍN', 'CALLE 26 # 18-28', 'LA ESPERANZA', 'COOSALUD', 'O+', 'AGRICULTOR', '3002000009', 'padre9@example.com'),
(71251118, '71251118', 'MAURICIO', 'GIRALDO LÓPEZ', 'masculino', 'unionlibre', '1990-08-18', 'LA CEJA', 'RIONEGRO', 'CALLE 27 # 19-29', 'EL PORVENIR', 'SAVIA SALUD', 'B+', 'ABOGADO', '3002000010', 'padre10@example.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pension`
--

CREATE TABLE `pension` (
  `id` int(11) NOT NULL,
  `estudiante` int(11) NOT NULL,
  `anio` int(11) NOT NULL,
  `mes` tinyint(4) NOT NULL,
  `valor` int(11) NOT NULL,
  `concepto` varchar(50) NOT NULL DEFAULT 'mensualidad',
  `estado` enum('por pagar','pagada') NOT NULL DEFAULT 'por pagar',
  `fecha_pago` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `pension`
--

INSERT INTO `pension` (`id`, `estudiante`, `anio`, `mes`, `valor`, `concepto`, `estado`, `fecha_pago`) VALUES
(12, 1020410001, 2026, 1, 452200, 'mensualidad', 'pagada', '2026-01-05'),
(13, 1020410018, 2026, 1, 452200, 'mensualidad', 'pagada', '2026-01-05'),
(14, 1020410035, 2026, 1, 452200, 'mensualidad', 'pagada', '2026-01-05'),
(15, 1020410052, 2026, 1, 452200, 'mensualidad', 'pagada', '2026-01-05'),
(16, 1020410069, 2026, 1, 452200, 'mensualidad', 'pagada', '2026-01-05'),
(17, 1020410086, 2026, 1, 452200, 'mensualidad', 'pagada', '2026-01-05'),
(18, 1020410103, 2026, 1, 452200, 'mensualidad', 'pagada', '2026-01-05'),
(19, 1020410120, 2026, 1, 452200, 'mensualidad', 'pagada', '2026-01-05'),
(20, 1020410137, 2026, 1, 452200, 'mensualidad', 'pagada', '2026-01-05'),
(21, 1020410154, 2026, 1, 452200, 'mensualidad', 'pagada', '2026-01-05'),
(22, 1020410001, 2026, 2, 452200, 'mensualidad', 'pagada', '2026-02-05'),
(23, 1020410018, 2026, 2, 452200, 'mensualidad', 'pagada', '2026-02-05'),
(24, 1020410035, 2026, 2, 452200, 'mensualidad', 'pagada', '2026-02-05'),
(25, 1020410052, 2026, 2, 452200, 'mensualidad', 'pagada', '2026-02-05'),
(26, 1020410069, 2026, 2, 452200, 'mensualidad', 'pagada', '2026-02-05'),
(27, 1020410086, 2026, 2, 452200, 'mensualidad', 'pagada', '2026-02-05'),
(28, 1020410103, 2026, 2, 452200, 'mensualidad', 'pagada', '2026-02-05'),
(29, 1020410120, 2026, 2, 452200, 'mensualidad', 'pagada', '2026-02-05'),
(30, 1020410137, 2026, 2, 452200, 'mensualidad', 'pagada', '2026-02-05'),
(31, 1020410154, 2026, 2, 452200, 'mensualidad', 'pagada', '2026-02-05'),
(32, 1020410001, 2026, 3, 452200, 'mensualidad', 'pagada', '2026-03-05'),
(33, 1020410018, 2026, 3, 452200, 'mensualidad', 'pagada', '2026-03-05'),
(34, 1020410035, 2026, 3, 452200, 'mensualidad', 'pagada', '2026-03-05'),
(35, 1020410052, 2026, 3, 452200, 'mensualidad', 'pagada', '2026-03-05'),
(36, 1020410069, 2026, 3, 452200, 'mensualidad', 'pagada', '2026-03-05'),
(37, 1020410086, 2026, 3, 452200, 'mensualidad', 'pagada', '2026-03-05'),
(38, 1020410103, 2026, 3, 452200, 'mensualidad', 'pagada', '2026-03-05'),
(39, 1020410120, 2026, 3, 452200, 'mensualidad', 'pagada', '2026-03-05'),
(40, 1020410137, 2026, 3, 452200, 'mensualidad', 'pagada', '2026-03-05'),
(41, 1020410154, 2026, 3, 452200, 'mensualidad', 'pagada', '2026-03-05'),
(42, 1020410001, 2026, 4, 452200, 'mensualidad', 'pagada', '2026-04-05'),
(43, 1020410018, 2026, 4, 452200, 'mensualidad', 'pagada', '2026-04-05'),
(44, 1020410035, 2026, 4, 452200, 'mensualidad', 'pagada', '2026-04-05'),
(45, 1020410052, 2026, 4, 452200, 'mensualidad', 'pagada', '2026-04-05'),
(46, 1020410069, 2026, 4, 452200, 'mensualidad', 'pagada', '2026-04-05'),
(47, 1020410086, 2026, 4, 452200, 'mensualidad', 'pagada', '2026-04-05'),
(48, 1020410103, 2026, 4, 452200, 'mensualidad', 'pagada', '2026-04-05'),
(49, 1020410120, 2026, 4, 452200, 'mensualidad', 'pagada', '2026-04-05'),
(50, 1020410137, 2026, 4, 452200, 'mensualidad', 'pagada', '2026-04-05'),
(51, 1020410154, 2026, 4, 452200, 'mensualidad', 'pagada', '2026-04-05'),
(52, 1020410001, 2026, 5, 452200, 'mensualidad', 'pagada', '2026-05-05'),
(53, 1020410018, 2026, 5, 452200, 'mensualidad', 'pagada', '2026-05-05'),
(54, 1020410035, 2026, 5, 452200, 'mensualidad', 'pagada', '2026-05-05'),
(55, 1020410052, 2026, 5, 452200, 'mensualidad', 'pagada', '2026-05-05'),
(56, 1020410069, 2026, 5, 452200, 'mensualidad', 'pagada', '2026-05-05'),
(57, 1020410086, 2026, 5, 452200, 'mensualidad', 'pagada', '2026-05-05'),
(58, 1020410103, 2026, 5, 452200, 'mensualidad', 'pagada', '2026-05-05'),
(59, 1020410120, 2026, 5, 452200, 'mensualidad', 'pagada', '2026-05-05'),
(60, 1020410137, 2026, 5, 452200, 'mensualidad', 'pagada', '2026-05-05'),
(61, 1020410154, 2026, 5, 452200, 'mensualidad', 'pagada', '2026-05-05'),
(62, 1020410001, 2026, 6, 452200, 'mensualidad', 'pagada', '2026-06-05'),
(63, 1020410018, 2026, 6, 452200, 'mensualidad', 'pagada', '2026-06-05'),
(64, 1020410035, 2026, 6, 452200, 'mensualidad', 'pagada', '2026-06-05'),
(65, 1020410052, 2026, 6, 452200, 'mensualidad', 'pagada', '2026-06-05'),
(66, 1020410069, 2026, 6, 452200, 'mensualidad', 'pagada', '2026-06-05'),
(67, 1020410086, 2026, 6, 452200, 'mensualidad', 'pagada', '2026-06-05'),
(68, 1020410103, 2026, 6, 452200, 'mensualidad', 'pagada', '2026-06-05'),
(69, 1020410120, 2026, 6, 452200, 'mensualidad', 'pagada', '2026-06-05'),
(70, 1020410137, 2026, 6, 452200, 'mensualidad', 'pagada', '2026-06-05'),
(71, 1020410154, 2026, 6, 452200, 'mensualidad', 'pagada', '2026-06-05'),
(72, 1020410001, 2026, 7, 452200, 'mensualidad', 'pagada', '2026-07-05'),
(73, 1020410018, 2026, 7, 452200, 'mensualidad', 'pagada', '2026-07-05'),
(74, 1020410035, 2026, 7, 452200, 'mensualidad', 'pagada', '2026-07-05'),
(75, 1020410052, 2026, 7, 452200, 'mensualidad', 'pagada', '2026-07-05'),
(76, 1020410069, 2026, 7, 452200, 'mensualidad', 'pagada', '2026-07-05'),
(77, 1020410086, 2026, 7, 452200, 'mensualidad', 'pagada', '2026-07-05'),
(78, 1020410103, 2026, 7, 452200, 'mensualidad', 'pagada', '2026-07-05'),
(79, 1020410120, 2026, 7, 452200, 'mensualidad', 'pagada', '2026-07-05'),
(80, 1020410137, 2026, 7, 452200, 'mensualidad', 'pagada', '2026-07-05'),
(81, 1020410154, 2026, 7, 452200, 'mensualidad', 'por pagar', NULL),
(82, 1020410001, 2026, 8, 452200, 'mensualidad', 'pagada', '2026-08-05'),
(83, 1020410018, 2026, 8, 452200, 'mensualidad', 'pagada', '2026-08-05'),
(84, 1020410035, 2026, 8, 452200, 'mensualidad', 'pagada', '2026-08-05'),
(85, 1020410052, 2026, 8, 452200, 'mensualidad', 'pagada', '2026-08-05'),
(86, 1020410069, 2026, 8, 452200, 'mensualidad', 'pagada', '2026-08-05'),
(87, 1020410086, 2026, 8, 452200, 'mensualidad', 'pagada', '2026-08-05'),
(88, 1020410103, 2026, 8, 452200, 'mensualidad', 'pagada', '2026-08-05'),
(89, 1020410120, 2026, 8, 452200, 'mensualidad', 'por pagar', NULL),
(90, 1020410137, 2026, 8, 452200, 'mensualidad', 'pagada', '2026-08-05'),
(91, 1020410154, 2026, 8, 452200, 'mensualidad', 'por pagar', NULL),
(92, 1020410001, 2026, 9, 452200, 'mensualidad', 'pagada', '2026-09-05'),
(93, 1020410018, 2026, 9, 452200, 'mensualidad', 'pagada', '2026-09-05'),
(94, 1020410035, 2026, 9, 452200, 'mensualidad', 'pagada', '2026-09-05'),
(95, 1020410052, 2026, 9, 452200, 'mensualidad', 'pagada', '2026-09-05'),
(96, 1020410069, 2026, 9, 452200, 'mensualidad', 'pagada', '2026-09-05'),
(97, 1020410086, 2026, 9, 452200, 'mensualidad', 'pagada', '2026-09-05'),
(98, 1020410103, 2026, 9, 452200, 'mensualidad', 'por pagar', NULL),
(99, 1020410120, 2026, 9, 452200, 'mensualidad', 'por pagar', NULL),
(100, 1020410137, 2026, 9, 452200, 'mensualidad', 'pagada', '2026-09-05'),
(101, 1020410154, 2026, 9, 452200, 'mensualidad', 'por pagar', NULL),
(102, 1020410001, 2026, 10, 452200, 'mensualidad', 'pagada', '2026-10-05'),
(103, 1020410018, 2026, 10, 452200, 'mensualidad', 'pagada', '2026-10-05'),
(104, 1020410035, 2026, 10, 452200, 'mensualidad', 'pagada', '2026-10-05'),
(105, 1020410052, 2026, 10, 452200, 'mensualidad', 'pagada', '2026-10-05'),
(106, 1020410069, 2026, 10, 452200, 'mensualidad', 'pagada', '2026-10-05'),
(107, 1020410086, 2026, 10, 452200, 'mensualidad', 'por pagar', NULL),
(108, 1020410103, 2026, 10, 452200, 'mensualidad', 'por pagar', NULL),
(109, 1020410120, 2026, 10, 452200, 'mensualidad', 'por pagar', NULL),
(110, 1020410137, 2026, 10, 452200, 'mensualidad', 'pagada', '2026-10-05'),
(111, 1020410154, 2026, 10, 452200, 'mensualidad', 'por pagar', NULL),
(112, 1020410001, 2026, 11, 452200, 'mensualidad', 'pagada', '2026-11-05'),
(113, 1020410018, 2026, 11, 452200, 'mensualidad', 'pagada', '2026-11-05'),
(114, 1020410035, 2026, 11, 452200, 'mensualidad', 'pagada', '2026-11-05'),
(115, 1020410052, 2026, 11, 452200, 'mensualidad', 'por pagar', NULL),
(116, 1020410069, 2026, 11, 452200, 'mensualidad', 'por pagar', NULL),
(117, 1020410086, 2026, 11, 452200, 'mensualidad', 'por pagar', NULL),
(118, 1020410103, 2026, 11, 452200, 'mensualidad', 'por pagar', NULL),
(119, 1020410120, 2026, 11, 452200, 'mensualidad', 'por pagar', NULL),
(120, 1020410137, 2026, 11, 452200, 'mensualidad', 'pagada', '2026-11-05'),
(121, 1020410154, 2026, 11, 452200, 'mensualidad', 'por pagar', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rector`
--

CREATE TABLE `rector` (
  `documento` int(11) NOT NULL,
  `nombre` text NOT NULL,
  `firma` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `rector`
--

INSERT INTO `rector` (`documento`, `nombre`, `firma`) VALUES
(10200007, 'HERMANA CLARA INÉS LOAIZA', 'imagenfirma.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `secretario`
--

CREATE TABLE `secretario` (
  `documento` int(11) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellidos` varchar(50) NOT NULL,
  `sexo` varchar(50) NOT NULL,
  `estadocivil` varchar(50) NOT NULL,
  `fecha` date NOT NULL,
  `telefono` varchar(20) NOT NULL,
  `correo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `secretario`
--

INSERT INTO `secretario` (`documento`, `password`, `nombre`, `apellidos`, `sexo`, `estadocivil`, `fecha`, `telefono`, `correo`) VALUES
(1036100001, '1036100001', 'ALEJANDRA', 'RICO MESA', 'femenino', 'unionlibre', '1985-02-11', '3003000001', 'secretaria1@example.com'),
(1036100010, '1036100010', 'OSCAR IVÁN', 'LÓPEZ CORTÉS', 'masculino', 'casado', '1982-08-19', '3003000002', 'secretaria2@example.com'),
(1036100019, '1036100019', 'MARISOL', 'GUTIÉRREZ ROLDÁN', 'femenino', 'soltero', '1993-05-03', '3003000003', 'secretaria3@example.com'),
(1036100028, '1036100028', 'JAIME ANDRÉS', 'MEJÍA VARGAS', 'masculino', 'soltero', '1995-10-27', '3003000004', 'secretaria4@example.com'),
(1036100037, '1036100037', 'LEIDY JOHANA', 'CASTRILLÓN RUIZ', 'femenino', 'casado', '1989-12-15', '3003000005', 'secretaria5@example.com'),
(1036100046, '1036100046', 'FABIO ALBERTO', 'AGUIRRE POSADA', 'masculino', 'divorciado', '1978-04-09', '3003000006', 'secretaria6@example.com'),
(1036100055, '$2y$10$I/LxtzxygUDs9tOtgnqzGeWv9aSphAiL5bOBTwEfPY7iM4Za8n.Xy', 'TATIANA', 'HOYOS VILLA', 'femenino', 'soltero', '1997-07-22', '3003000007', 'secretaria7@example.com'),
(1036100064, '1036100064', 'RICARDO', 'MONTOYA SIERRA', 'masculino', 'casado', '1980-01-13', '3003000008', 'secretaria8@example.com'),
(1036100073, '$2y$10$6Z3PEd/fx8Ndg9..4XoSTOPVDNKKG4G72U0MAW3z6feAnbQRSwtNW', 'NORA ELENA', 'BUITRAGO LEÓN', 'femenino', 'viudo', '1972-09-06', '3003000009', 'secretaria9@example.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `acudiente` varchar(50) NOT NULL,
  `docente` varchar(50) NOT NULL,
  `estudiante` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`acudiente`, `docente`, `estudiante`) VALUES
('43251001', '39410043', '1020410001'),
('43251012', '39410057', '1020410018'),
('43251023', '39410029', '1020410035'),
('43251034', '39410050', '1020410052'),
('43251045', '39410015', '1020410069'),
('43251056', '39410064', '1020410086'),
('43251067', '39410036', '1020410103'),
('43251078', '39410022', '1020410120'),
('43251089', '39410008', '1020410137'),
('43251100', '39410001', '1020410154');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `anecdatario`
--
ALTER TABLE `anecdatario`
  ADD PRIMARY KEY (`documentoestudiante`);

--
-- Indices de la tabla `anecdota`
--
ALTER TABLE `anecdota`
  ADD PRIMARY KEY (`id`),
  ADD KEY `documentoestudiante` (`documentoestudiante`);

--
-- Indices de la tabla `docente`
--
ALTER TABLE `docente`
  ADD PRIMARY KEY (`documento`),
  ADD KEY `documento` (`documento`),
  ADD KEY `grado` (`grado`);

--
-- Indices de la tabla `documentos`
--
ALTER TABLE `documentos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `estudiante`
--
ALTER TABLE `estudiante`
  ADD PRIMARY KEY (`documento`),
  ADD KEY `documento` (`documento`),
  ADD KEY `mama` (`mama`),
  ADD KEY `papa` (`papa`),
  ADD KEY `grado` (`grado`);

--
-- Indices de la tabla `grados`
--
ALTER TABLE `grados`
  ADD PRIMARY KEY (`codigo`),
  ADD KEY `codigo` (`codigo`);

--
-- Indices de la tabla `informe`
--
ALTER TABLE `informe`
  ADD PRIMARY KEY (`codigo`),
  ADD KEY `estudiante` (`estudiante`),
  ADD KEY `profesor` (`profesor`);

--
-- Indices de la tabla `mama`
--
ALTER TABLE `mama`
  ADD PRIMARY KEY (`documentom`),
  ADD UNIQUE KEY `documentom` (`documentom`);

--
-- Indices de la tabla `papa`
--
ALTER TABLE `papa`
  ADD PRIMARY KEY (`documentop`),
  ADD UNIQUE KEY `documentop` (`documentop`);

--
-- Indices de la tabla `pension`
--
ALTER TABLE `pension`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unica_mensualidad` (`estudiante`,`anio`,`mes`);

--
-- Indices de la tabla `rector`
--
ALTER TABLE `rector`
  ADD PRIMARY KEY (`documento`),
  ADD UNIQUE KEY `documento` (`documento`);

--
-- Indices de la tabla `secretario`
--
ALTER TABLE `secretario`
  ADD PRIMARY KEY (`documento`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `anecdota`
--
ALTER TABLE `anecdota`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `documentos`
--
ALTER TABLE `documentos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de la tabla `informe`
--
ALTER TABLE `informe`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `pension`
--
ALTER TABLE `pension`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=122;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `anecdota`
--
ALTER TABLE `anecdota`
  ADD CONSTRAINT `anecdota_ibfk_1` FOREIGN KEY (`documentoestudiante`) REFERENCES `anecdatario` (`documentoestudiante`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `docente`
--
ALTER TABLE `docente`
  ADD CONSTRAINT `docente_ibfk_1` FOREIGN KEY (`grado`) REFERENCES `grados` (`codigo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `estudiante`
--
ALTER TABLE `estudiante`
  ADD CONSTRAINT `estudiante_ibfk_1` FOREIGN KEY (`mama`) REFERENCES `mama` (`documentom`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `estudiante_ibfk_2` FOREIGN KEY (`papa`) REFERENCES `papa` (`documentop`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `estudiante_ibfk_3` FOREIGN KEY (`grado`) REFERENCES `grados` (`codigo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `informe`
--
ALTER TABLE `informe`
  ADD CONSTRAINT `informe_ibfk_1` FOREIGN KEY (`estudiante`) REFERENCES `estudiante` (`documento`),
  ADD CONSTRAINT `informe_ibfk_2` FOREIGN KEY (`profesor`) REFERENCES `docente` (`documento`);

--
-- Filtros para la tabla `pension`
--
ALTER TABLE `pension`
  ADD CONSTRAINT `pension_ibfk_1` FOREIGN KEY (`estudiante`) REFERENCES `estudiante` (`documento`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
