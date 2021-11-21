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
(0,'Docente'),
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
('FOLE820216Q45',4,1),
('AAHC8205301RA', 0,1),
('ADRIANA', 0,1),
('ALBERTO', 0,1),
('AMERICA', 0,1),
('ANA LILIA', 0,1),
('ANGEL', 0,1),
('ARMANDO', 0,1),
('ARTURO', 0,1),
('CACP850919UE5', 0,1),
('CAGE780609IT8', 0,1),
('CESAR', 0,1),
('CLAUDIA', 0,1),
('COAP660518Q7A',  0,1),
('COPA630507HU9', 0,1),
('CUBS740623', 0,1),
('CUELLAR',  0,1),
('DARIO', 0,1),
('DAVID', 0,1),
('DIEGO', 0,1),
('DIVISION', 0,1),
('EERI830617J66', 0,1),
('ERIKA', 0,1),
('FABIAN', 0,1),
('FEDERICO', 0,1),
('FOLE820216Q45', 0,1),
('FRANCISCO', 0,1),
('GAAE850211UI7', 0,1),
('GAOR770112', 0,1),
('GAWA7903109G4', 0,1),
('GERARDO', 0,1),
('GOAI831020UY4', 0,1),
('HUGO', 0,1),
('INTERINO1', 0,1),
('INTERINO10',0,1),
('INTERINO11',0,1),
('INTERINO12',0,1),
('INTERINO13',0,1),
('INTERINO2', 0,1),
('INTERINO3', 0,1),
('INTERINO4', 0,1),
('INTERINO5', 0,1),
('INTERINO6', 0,1),
('INTERINO7', 0,1),
('INTERINO8', 0,1),
('INTERINO9', 0,1),
('ISELA', 0,1),
('ITZEL', 0,1),
('JARR790328', 0,1),
('JENNY',  0,1),
('JESSICA',0,1),
('JILW840910VC2', 0,1),
('JONH', 0,1),
('JOSE LUIS', 0,1),
('KARINA', 0,1),
('LABE8408304C1', 0,1),
('LOCJ700629GE6', 0,1),
('LOCM820210152', 0,1),
('LUISALBERT', 0,1),
('MARANITO', 0,1),
('MARCOS', 0,1),
('MARIA', 0,1),
('MARIO', 0,1),
('MARTHA', 0,1),
('MARTIN', 0,1),
('MERA881111NY7', 0,1),
('MOCM721003', 0,1),
('NAHIM', 0,1),
('NC', 0,1),
('NO', 0,1),
('NOHEMI', 0,1),
('OCTAVIO',  0,1),
('OOCR750829AF4', 0,1),
('PRISCO', 0,1),
('PUGA', 0,1),
('RAPT7803212E2', 0,1),
('RIRL840211QA7', 0,1),
('ROAP4503305N6', 0,1),
('RODRIGO', 0,1),
('ROGELIO', 0,1),
('ROSARIO',0,1),
('RUCR830314FDA', 0,1),
('SOGC8411097R7', 0,1),
('thishouldn',0,1),
('TOSCANO', 0,1),
('TUN', 0,1),
('VAPM820913890', 0,1),
('VIJV850720RV1', 0,1),
('VINCULACION', 0,1),
('VIVL780905TG1', 0,1),
('YADIRA', 0,1);

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

