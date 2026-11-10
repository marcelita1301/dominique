-- Datos de prueba para el sistema Dominique (TODOS son ficticios).
-- Úsalo DESPUÉS de ejecutar migracion.sql, y solo UNA vez (si lo repites, volverá a duplicar observaciones e informes).
-- No borra ni cambia nada de lo que ya tienes: solo agrega filas nuevas.
-- Contraseña de cada persona nueva = su número de documento (se cifra sola en el primer ingreso).

SET NAMES utf8mb4;
START TRANSACTION;

-- 1) Grados
INSERT INTO `grados` (`codigo`, `nombre`, `descripcion`) VALUES
(100, 'sala cuna', 'grado inicial, bebés'),
(110, 'caminadores', 'grado para niños que empiezan a caminar'),
(124, 'parvulos B', 'segundo grupo de parvulos'),
(235, 'prejardin B', 'segundo grupo de prejardin'),
(346, 'jardin B', 'segundo grupo de jardin'),
(457, 'transicion B', 'segundo grupo de transicion');

-- 2) Madres
INSERT INTO `mama` (`documentom`, `passwordm`, `nombrem`, `apellidosm`, `sexom`, `estadocivilm`, `fecham`, `expedicionm`, `lugarm`, `direccionm`, `barriom`, `epsm`, `rhm`, `profesionm`, `telefonom`, `correom`) VALUES
(43251001, '43251001', 'LUZ MARINA', 'GIRALDO OSPINA', 'femenino', 'casado', '1990-04-12', 'LA CEJA', 'RIONEGRO', 'CALLE 18 # 10-20', 'CENTRO', 'SURA', 'A+', 'AMA DE CASA', '3001000001', 'madre1@example.com'),
(43251012, '43251012', 'DIANA PATRICIA', 'MONSALVE RÍOS', 'femenino', 'unionlibre', '1988-09-23', 'MEDELLÍN', 'ENVIGADO', 'CALLE 19 # 11-21', 'SAN CAYETANO', 'NUEVA EPS', 'O+', 'ENFERMERA', '3001000002', 'madre2@example.com'),
(43251023, '43251023', 'YULIANA', 'CARDONA ZULUAGA', 'femenino', 'casado', '1995-01-30', 'RIONEGRO', 'LA CEJA', 'CALLE 20 # 12-22', 'LA ALDEA', 'SALUD TOTAL', 'B+', 'AUXILIAR CONTABLE', '3001000003', 'madre3@example.com'),
(43251034, '43251034', 'PAOLA ANDREA', 'OSORIO GÓMEZ', 'femenino', 'soltero', '1991-07-08', 'ENVIGADO', 'EL RETIRO', 'CALLE 21 # 13-23', 'MIRAFLORES', 'SANITAS', 'O-', 'DISEÑADORA', '3001000004', 'madre4@example.com'),
(43251045, '43251045', 'CATALINA', 'VÉLEZ MEJÍA', 'femenino', 'casado', '1993-11-17', 'LA CEJA', 'LA CEJA', 'CALLE 22 # 14-24', 'EL CARMEN', 'COOSALUD', 'A-', 'ABOGADA', '3001000005', 'madre5@example.com'),
(43251056, '43251056', 'SANDRA MILENA', 'ARANGO LONDOÑO', 'femenino', 'separado', '1989-05-02', 'EL RETIRO', 'MARINILLA', 'CALLE 23 # 15-25', 'SAN RAFAEL', 'SAVIA SALUD', 'AB+', 'COMERCIANTE', '3001000006', 'madre6@example.com'),
(43251067, '43251067', 'JOHANA', 'QUINTERO MARÍN', 'femenino', 'unionlibre', '1994-12-21', 'LA CEJA', 'LA CEJA', 'CALLE 24 # 16-26', 'LAS PALMAS', 'SURA', 'O+', 'PSICÓLOGA', '3001000007', 'madre7@example.com'),
(43251078, '43251078', 'NATALIA', 'DUQUE ALZATE', 'femenino', 'casado', '1992-03-14', 'MARINILLA', 'ABEJORRAL', 'CALLE 25 # 17-27', 'LOS PINOS', 'NUEVA EPS', 'A+', 'ADMINISTRADORA', '3001000008', 'madre8@example.com'),
(43251089, '43251089', 'MARTHA LUCÍA', 'SALAZAR PINEDA', 'femenino', 'casado', '1986-08-27', 'LA CEJA', 'LA CEJA', 'CALLE 26 # 18-28', 'LA ESPERANZA', 'SALUD TOTAL', 'B-', 'FLORICULTORA', '3001000009', 'madre9@example.com'),
(43251100, '43251100', 'VANESSA', 'TORO ECHEVERRI', 'femenino', 'unionlibre', '1996-02-09', 'ABEJORRAL', 'MEDELLÍN', 'CALLE 27 # 19-29', 'EL PORVENIR', 'SANITAS', 'O+', 'ODONTÓLOGA', '3001000010', 'madre10@example.com');

-- 3) Padres
INSERT INTO `papa` (`documentop`, `passwordp`, `nombrep`, `apellidosp`, `sexop`, `estadocivilp`, `fechap`, `expedicionp`, `lugarp`, `direccionp`, `barriop`, `epsp`, `rhp`, `profesionp`, `telefonop`, `correop`) VALUES
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

-- 4) Docentes
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
(39410064, '39410064', 'CAROLINA', 'FRANCO LOPERA', 'femenino', '1991-10-31', 'ABEJORRAL', 'CARRERA 29 # 24-39', 'MIRAFLORES', 'COOSALUD', 'A-', 457);

-- 5) Secretarios
INSERT INTO `secretario` (`documento`, `password`, `nombre`, `apellidos`, `sexo`, `estadocivil`, `fecha`, `telefono`, `correo`) VALUES
(1036100001, '1036100001', 'ALEJANDRA', 'RICO MESA', 'femenino', 'unionlibre', '1985-02-11', '3003000001', 'secretaria1@example.com'),
(1036100010, '1036100010', 'OSCAR IVÁN', 'LÓPEZ CORTÉS', 'masculino', 'casado', '1982-08-19', '3003000002', 'secretaria2@example.com'),
(1036100019, '1036100019', 'MARISOL', 'GUTIÉRREZ ROLDÁN', 'femenino', 'soltero', '1993-05-03', '3003000003', 'secretaria3@example.com'),
(1036100028, '1036100028', 'JAIME ANDRÉS', 'MEJÍA VARGAS', 'masculino', 'soltero', '1995-10-27', '3003000004', 'secretaria4@example.com'),
(1036100037, '1036100037', 'LEIDY JOHANA', 'CASTRILLÓN RUIZ', 'femenino', 'casado', '1989-12-15', '3003000005', 'secretaria5@example.com'),
(1036100046, '1036100046', 'FABIO ALBERTO', 'AGUIRRE POSADA', 'masculino', 'divorciado', '1978-04-09', '3003000006', 'secretaria6@example.com'),
(1036100055, '1036100055', 'TATIANA', 'HOYOS VILLA', 'femenino', 'soltero', '1997-07-22', '3003000007', 'secretaria7@example.com'),
(1036100064, '1036100064', 'RICARDO', 'MONTOYA SIERRA', 'masculino', 'casado', '1980-01-13', '3003000008', 'secretaria8@example.com'),
(1036100073, '1036100073', 'NORA ELENA', 'BUITRAGO LEÓN', 'femenino', 'viudo', '1972-09-06', '3003000009', 'secretaria9@example.com');

-- 6) Estudiantes
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
(1020410154, '1020410154', 'LUCIANA', 'GIRALDO TORO', 'femenino', '2026-03-03', 'LA CEJA', 'LA CEJA', 'CALLE 27 # 19-29', 'EL PORVENIR', 'SANITAS', 'A+', 43251100, 71251118, 100);

-- 7) Fichas del anecdotario
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
('1020410154', 'LUCIANA GIRALDO TORO', '2026-03-03', 'CALLE 27 # 19-29', 'VANESSA TORO ECHEVERRI', '43251100', '3001000010', 'MAURICIO GIRALDO LÓPEZ', '71251118', '3002000010', '', '', '', 'ADRIANA MUÑOZ LOAIZA', '2026-02-02', 100, 2026);

-- 8) Observaciones del anecdotario
INSERT INTO `anecdota` (`documentoestudiante`, `fecha`, `comportamiento`, `firma`) VALUES
('1020410001', '2026-02-10', 'Se integra con facilidad al juego en grupo y comparte los materiales con sus compañeros.', 'PAULA ANDREA SUÁREZ GIL'),
('1020410018', '2026-02-24', 'Lloró al momento de la despedida, pero se calmó con el apoyo de la docente en pocos minutos.', 'MÓNICA OSPINA TABORDA'),
('1020410035', '2026-03-09', 'Muestra interés por los cuentos y participa repitiendo palabras y frases cortas.', 'ERIKA JOHANA BETANCUR YEPES'),
('1020410052', '2026-03-23', 'Reconoce los colores primarios y los nombra durante la actividad de pintura.', 'DANIELA CORREA PALACIO'),
('1020410069', '2026-04-14', 'Le cuesta esperar su turno; se trabajó el respeto de turnos con una actividad guiada.', 'MARÍA ELENA RENDÓN CASTRO'),
('1020410086', '2026-05-05', 'Sigue instrucciones sencillas y colabora con el orden del salón al terminar la actividad.', 'CAROLINA FRANCO LOPERA'),
('1020410001', '2026-05-19', 'Estuvo inquieto durante la siesta; se conversó con la familia sobre sus rutinas de sueño.', 'PAULA ANDREA SUÁREZ GIL'),
('1020410018', '2026-06-02', 'Mejora en su coordinación motora fina al ensartar fichas y usar el lápiz.', 'MÓNICA OSPINA TABORDA'),
('1020410035', '2026-08-11', 'Expresa sus emociones con palabras y pide ayuda cuando la necesita.', 'ERIKA JOHANA BETANCUR YEPES'),
('1020410052', '2026-09-01', 'Disfruta las actividades de música y movimiento y baila siguiendo el ritmo.', 'DANIELA CORREA PALACIO'),
('1020410069', '2026-09-22', 'Ayudó a un compañero a recoger los juguetes sin que se lo pidieran.', 'MARÍA ELENA RENDÓN CASTRO'),
('1020410086', '2026-10-13', 'Participó con entusiasmo en la salida pedagógica a la huerta del jardín.', 'CAROLINA FRANCO LOPERA');

-- 9) Informes
INSERT INTO `informe` (`fecha`, `estudiante`, `dimensiones`, `valoracion`, `definitiva`, `profesor`) VALUES
('2026-06-15', 1020410001, 'Cognitiva', 'Reconoce formas y colores y resuelve rompecabezas sencillos.', 'Superior', 39410043),
('2026-06-15', 1020410018, 'Comunicativa', 'Amplía su vocabulario y relata hechos cortos con claridad.', 'Alto', 39410057),
('2026-06-15', 1020410035, 'Corporal', 'Mejora su equilibrio y la coordinación en juegos de movimiento.', 'Alto', 39410029),
('2026-06-15', 1020410052, 'Socioafectiva', 'Comparte con sus compañeros y reconoce sus emociones.', 'Superior', 39410050),
('2026-06-15', 1020410069, 'Estética', 'Participa con creatividad en actividades de pintura y modelado.', 'Básico', 39410015),
('2026-10-30', 1020410086, 'Ética', 'Respeta las normas del salón y los turnos de participación.', 'Alto', 39410064),
('2026-10-30', 1020410103, 'Cognitiva', 'Reconoce formas y colores y resuelve rompecabezas sencillos.', 'Superior', 39410036),
('2026-10-30', 1020410120, 'Comunicativa', 'Amplía su vocabulario y relata hechos cortos con claridad.', 'Alto', 39410022),
('2026-10-30', 1020410137, 'Corporal', 'Mejora su equilibrio y la coordinación en juegos de movimiento.', 'Básico', 39410008),
('2026-10-30', 1020410154, 'Socioafectiva', 'Comparte con sus compañeros y reconoce sus emociones.', 'Superior', 39410001);

-- 10) Usuarios (vínculo acudiente - docente - estudiante)
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

-- 11) Rectores (datos de ejemplo)
INSERT INTO `rector` (`documento`, `nombre`, `firma`) VALUES
(10200001, 'PADRE JORGE IVÁN MEJÍA', 'imagenfirma.jpg'),
(10200004, 'HERMANA ROSA ELENA GÓMEZ', 'imagenfirma.jpg'),
(10200007, 'HERMANA CLARA INÉS LOAIZA', 'imagenfirma.jpg'),
(10200010, 'PADRE ÁLVARO SERNA', 'imagenfirma.jpg'),
(10200013, 'HERMANA MARÍA TERESA OCAMPO', 'imagenfirma.jpg'),
(10200016, 'HERMANA LUZ DARY RENDÓN', 'imagenfirma.jpg'),
(10200019, 'PADRE GUILLERMO ZULUAGA', 'imagenfirma.jpg'),
(10200022, 'HERMANA BEATRIZ VALLEJO', 'imagenfirma.jpg'),
(10200025, 'HERMANA ANA CECILIA TORO', 'imagenfirma.jpg'),
(10200028, 'PADRE HERNÁN ARISTIZÁBAL', 'imagenfirma.jpg');

-- 12) Pensiones 2026 de los 10 estudiantes nuevos (11 mensualidades cada uno).
-- Algunos quedan al día y otros con meses pendientes, para probar el paz y salvo.
INSERT INTO `pension` (`estudiante`, `anio`, `mes`, `valor`, `concepto`, `estado`, `fecha_pago`)
SELECT e.documento, 2026, m.n, 452200, 'mensualidad',
  CASE WHEN m.n <= CASE e.documento
      WHEN 1020410001 THEN 11
      WHEN 1020410018 THEN 11
      WHEN 1020410035 THEN 11
      WHEN 1020410052 THEN 10
      WHEN 1020410069 THEN 10
      WHEN 1020410086 THEN 9
      WHEN 1020410103 THEN 8
      WHEN 1020410120 THEN 7
      WHEN 1020410137 THEN 11
      WHEN 1020410154 THEN 6
      ELSE 0 END THEN 'pagada' ELSE 'por pagar' END,
  CASE WHEN m.n <= CASE e.documento
      WHEN 1020410001 THEN 11
      WHEN 1020410018 THEN 11
      WHEN 1020410035 THEN 11
      WHEN 1020410052 THEN 10
      WHEN 1020410069 THEN 10
      WHEN 1020410086 THEN 9
      WHEN 1020410103 THEN 8
      WHEN 1020410120 THEN 7
      WHEN 1020410137 THEN 11
      WHEN 1020410154 THEN 6
      ELSE 0 END THEN STR_TO_DATE(CONCAT('2026-', LPAD(m.n, 2, '0'), '-05'), '%Y-%m-%d') ELSE NULL END
FROM `estudiante` e
JOIN (SELECT 1 AS n UNION SELECT 2 UNION SELECT 3 UNION SELECT 4 UNION SELECT 5 UNION SELECT 6 UNION SELECT 7 UNION SELECT 8 UNION SELECT 9 UNION SELECT 10 UNION SELECT 11) m
WHERE e.documento IN (1020410001, 1020410018, 1020410035, 1020410052, 1020410069, 1020410086, 1020410103, 1020410120, 1020410137, 1020410154);

COMMIT;
