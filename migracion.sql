ALTER TABLE secretario  MODIFY password  varchar(255) NOT NULL;
ALTER TABLE docente     MODIFY password  varchar(255) NOT NULL;
ALTER TABLE estudiante  MODIFY password  varchar(255) NOT NULL;
ALTER TABLE mama        MODIFY passwordm varchar(255) NOT NULL;
ALTER TABLE papa        MODIFY passwordp varchar(255) NOT NULL;

ALTER TABLE secretario MODIFY telefono varchar(20) NOT NULL;
ALTER TABLE anecdatario
  MODIFY documentom  varchar(20) NOT NULL,
  MODIFY telefonom   varchar(20) NOT NULL,
  MODIFY documentop  varchar(20) NOT NULL,
  MODIFY telefonop   varchar(20) NOT NULL,
  MODIFY telefonoacu varchar(20) NOT NULL;

CREATE TABLE IF NOT EXISTS pension (
  id          int(11) NOT NULL AUTO_INCREMENT,
  estudiante  int(11) NOT NULL,
  anio        int(11) NOT NULL,
  mes         tinyint(4) NOT NULL,
  valor       int(11) NOT NULL,
  concepto    varchar(50) NOT NULL DEFAULT 'mensualidad',
  estado      enum('por pagar','pagada') NOT NULL DEFAULT 'por pagar',
  fecha_pago  date DEFAULT NULL,
  PRIMARY KEY (id),
  UNIQUE KEY unica_mensualidad (estudiante, anio, mes),
  CONSTRAINT pension_ibfk_1 FOREIGN KEY (estudiante) REFERENCES estudiante (documento) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE IF NOT EXISTS anecdota (
  id                  int(11) NOT NULL AUTO_INCREMENT,
  documentoestudiante varchar(15) NOT NULL,
  fecha               date NOT NULL,
  comportamiento      text NOT NULL,
  firma               varchar(100) NOT NULL,
  PRIMARY KEY (id),
  KEY documentoestudiante (documentoestudiante),
  CONSTRAINT anecdota_ibfk_1 FOREIGN KEY (documentoestudiante) REFERENCES anecdatario (documentoestudiante) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
