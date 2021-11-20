drop database if exists sapce3;
create database sapce3;
use sapce3;

CREATE TABLE cargo (
  idc varchar(15) CHARACTER SET utf8 COLLATE utf8_spanish_ci,
  nomc varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci,
  PRIMARY KEY  (idc)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
INSERT INTO cargo (idc, nomc) VALUES
('ACAD', 'SUBDIRECCION ACADEMICA'),
('ADM', 'SUBDIRECCION DE SERVICIOS ADMINISTRATIVOS'),
('CBAS', 'DEPARTAMENTO DE CIENCIAS BASICAS'),
('CI', 'DEPARTAMENTO DE CENTRO DE INFORMACION'),
('DEP', 'DIVISION DE ESTUDIOS PROFESIONALES'),
('DIR', 'DIRECCION'),
('ECOAD', 'DEPARTAMENTO DE CIENCIAS ECONOMICO ADMINISTRATIVAS'),
('EXT', 'DEPARTAMENTO DE ACTIVIDADES EXTRAESCOLARES'),
('ING', 'DEPARTAMENTO DE INGENIERIAS'),
('PLAN', 'SUBDIRECCION  DE PLANEACION Y VINCULACION'),
('PPP', 'DEPARTAMENTO DE PLANEACION,PROGRAMACION Y PRESUPUESTACION'),
('RF', 'DEPARTAMENTO DE RECURSOS FINANCIEROS '),
('RH', 'DEPARTAMENTO DE RECURSOS  HUMANOS'),
('RMAT', 'DEPARTAMENTO DE  RECURSOS materiasLES  Y SERVICIOS'),
('SE', 'DEPARTAMENTO DE SERVICIOS ESCOLARES'),
('CTIC', 'COORDINADOR DE CARRERA TICS'),
('CADM', 'COORDINADOR DE CARRERA ADMINISTRACION'),
('CLOG', 'COORDINADOR DE CARRERA LOGISTICA'),
('VIN', 'DEPARTAMENTO DE GESTION TECNOLOGICA  Y VINCULACION');

create table encarga(
  idc varchar(15) CHARACTER SET utf8 COLLATE utf8_spanish_ci,
  idoc varchar(15) CHARACTER SET utf8 COLLATE utf8_spanish_ci,
  fini date,
  ffin date,
  status int,
  primary key(idc,idoc),
  foreign key (idc) references cargo(idc) on update cascade on delete cascade,
  foreign key (idoc) references docente(idoc) on update cascade on delete cascade
)ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO encarga (idc, idoc, fini, status,ffin) VALUES
('CI', 'AAHC8205301RA', '0000-00-00', 1, '0000-00-00'),
('DEP', 'FOLE820216Q45', '0000-00-00', 1, '0000-00-00'),
('RF', 'SOGC8411097R7', '0000-00-00', 1, '0000-00-00'),
('VIN', 'ITZEL', '2020-03-02', 1, '2020-02-02'),
('VIN', 'MERA881111NY7', '0000-00-00', 0, '2020-02-02');

create table rol(
 idr int not null primary key,
 tipo varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci
)ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
insert into rol (idr, tipo) values 
(1,'Administrador'),
(2,'Control Escolar'),
(3,'Subdirección'),
(4,'Division de Estudios Profesionales'),
(5,'Vinculación'),
(6,'Recursos Financieros'),
(7,'Desarrollo Académico');

create table permisos(
    idoc varchar(13) CHARACTER SET utf8 COLLATE utf8_spanish_ci not null,
    idr int not null,
    status tinyint,
    primary key(idoc, idr),
    FOREIGN KEY(idoc) REFERENCES docente(idoc) on update cascade on delete cascade,
    FOREIGN KEY(idr) REFERENCES rol(idr) on update cascade on delete cascade
)ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT into permisos (idoc, idr, status) values 
('CUBS740623',1,1),
('CACP850919UE5',2,1),
('LOCM820210152',3,1),
('FOLE820216Q45',4,1);

CREATE TABLE especialidad (
  idesp varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci,
  nomesp varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci,
  status int,
  idcar varchar(20) CHARACTER SET utf8 COLLATE utf8_spanish_ci,
  PRIMARY KEY  (idesp),
  KEY idcar (idcar)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO especialidad (idesp, nomesp, status, idcar) VALUES
('IADM1', 'PRIMERA ESP DE ADMINISTRACION', 0, 'IADM-2010-213'),
('IADM2', 'SEGUNDA ESP ADMINISTRACION', 1, 'IADM-2010-213'),
('IADM3', 'ALTA DIRECCION E INTELIGENCIA ESTRATEGICA', 1, 'IADM-2010-213'),
('ILOG1', 'PRIMERA ESPECIALIDAD DE LOGISTICA', 0, 'ILOG-2009-202'),
('ILOG2', 'SEGUNDA ESP LOGISTICA', 1, 'ILOG-2009-202'),
('ILOG3', 'SEGURIDAD INDUSTRIAL', 1, 'ILOG-2009-202'),
('ITIC1', 'PRIMERA ESP EN TICS', 0, 'ITIC-2010-225'),
('ITIC2', 'SEGUNDA ESP EN TICS', 1, 'ITIC-2010-225'),
('ITIC3', 'DESARROLLO GESTION DE SISTEMAS Y DISPOSITIVOS ELECTRONICOS AVANZADOS', 1, 'ITIC-2010-225');

