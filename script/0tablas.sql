drop database if exists sapce3;
create database sapce3;
use sapce3;

CREATE TABLE estado (
  idedo int(11) NOT NULL,
  edo varchar(30) NOT NULL,
  PRIMARY KEY  (idedo)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcar la base de datos para la tabla estado
--

INSERT INTO estado (idedo, edo) VALUES
(1, 'Aguascalientes'),
(2, 'Baja California'),
(3, 'Baja California Sur'),
(4, 'Campeche'),
(5, 'Chiapas'),
(6, 'Chihuahua'),
(7, 'Coahuila de Zaragoza'),
(8, 'Colima'),
(9, 'Distrito Federal'),
(10, 'Durango'),
(11, 'Guanajuato'),
(12, 'Guerrero'),
(13, 'Estado de Hidalgo'),
(14, 'Jalisco'),
(15, 'Estado de M?xico'),
(16, 'Michoac?n de Ocampo'),
(17, 'Morelos'),
(18, 'Nayarit'),
(19, 'Nuevo Le?n'),
(20, 'Oaxaca'),
(21, 'Puebla'),
(22, 'Quer?taro'),
(23, 'Quintana Roo'),
(24, 'San Luis Potosí'),
(25, 'Sinaloa'),
(26, 'Sonora'),
(27, 'Tabasco'),
(28, 'Tamaulipas'),
(29, 'Tlaxcala'),
(30, 'Veracruz de Ignacio de la Llav'),
(31, 'Yucatán'),
(32, 'Zacatecas'),
(33, 'Estados Unidos'),
(34, 'Canad'),
(35, 'Centro Am?rica y el Caribe'),
(36, 'Sudam?rica'),
(37, 'Africa'),
(38, 'Asia'),
(39, 'Europa'),
(40, 'Ocean'),
(41, 'Otro Pa');


CREATE TABLE control (
  id int NOT NULL,
  descrip varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci,
  opcion int NOT NULL,
  PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
INSERT INTO control VALUES
(1, 'CONTROL DE SOLICITUD DE INSCRIPCION', 1698),
(2, 'CONTROL DE ASIGNACION DE NUMERO DE CONTROL', 0),
(3, 'CONTROL DE ASIGNAR CALIFICACIONES', 1),
(4, 'CONTROL DE FICHAS', 0),
(5, 'CONTROL DE NUMERO DE HORARIO', 2130),
(6, 'http://localhost', 0),
(7, 'ESLOGAN DE OFICIOS', 0),
(8, 'CONTROL DE NUMEROS DE HORARIO EXTRAESCOLAR COM', 0),
(9, 'CONTROL DE NUMEROS DE HORARIO DE INGLES', 0),
(10, 'CONTROL DE EVALUACION DE SERVICIOS', 36),
(11, 'Control de numero de folio de horarios', 1307),
(12, '2019-2', 0);

CREATE TABLE `periodo` ( `periodo` varchar(6) CHARACTER SET utf8 COLLATE utf8_spanish_ci,
`noper` int(11) default NULL,
`descper` varchar(60) CHARACTER SET utf8 COLLATE utf8_spanish_ci,
`reporte` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci,
`predet` tinyint(4) default NULL,
PRIMARY KEY (`periodo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
INSERT INTO `periodo` (`periodo`, `noper`, `descper`, `reporte`, `predet`) VALUES
('2009-2', '1', 'AGOSTO - DICIEMBRE 2009', 'AGOSTO - DICIEMBRE 2009', '0') ,
('2010-1', '2', 'ENERO - JULIO 2010', 'ENERO - JULIO 2010', '0') ,
('2010-2', '3', 'AGOSTO - DICIEMBRE 2010', 'AGOSTO - DICIEMBRE 2010', '0') ,
('2011-1', '4', 'ENERO - JULIO 2011', 'ENERO - JULIO 2011', '0') ,
('2011-2', '5', 'AGOSTO - DICIEMBRE 2011', 'AGOSTO - DICIEMBRE 2011', '0') ,
('2012-1', '6', 'ENERO - JULIO 2012', 'ENERO - JULIO 2012', '0') ,
('2012-2', '7', 'AGOSTO - DICIEMBRE 2012', 'AGOSTO - DICIEMBRE 2012', '0') ,
('2013-1', '8', '05/02/2013 AL 07/06/2013', 'ENERO - JULIO 2013', '0') ,
('2013-2', '9', 'AGOSTO - DICIEMBRE 2013', '19/08/2013 - 06/12/2013', '0') ,
('2014-1', '10', 'ENERO-JULIO 2014', '', '0') ,
('2014-2', '11', 'AGOSTO 2014 - ENERO 2015', '23/Agosto/14 - 12/Dic/14', '0') ,
('2015-1', '12', 'FEBRERO - JUNIO 2015', '', '0') ,
('2015-2', '13', 'AGOSTO 2015 - ENERO 2016', '', '0') ,
('2016-1', '14', 'ENERO - JULIO 2016', '', '0') ,
('2016-2', '16', 'AGOSTO - DICIEMBRE 2016', '', '0') ,
('2016-3', '15', 'JULIO - AGOSTO 2016', '', '0') ,
('2017-1', '17', 'FEBRERO - JUNIO 2017', '', '0') ,
('2017-2', '19', 'AGOSTO - DICIEMBRE 2017', '', '0') ,
('2017-V', '18', 'JUNIO - AGOSTO 2017', '', '0') ,
('2018-1', '20', 'FEBRERO - JUNIO 2018', '', '0') ,
('2018-2', '22', 'AGOSTO-DICIEMBRE 2018', '', '0') ,
('2018-V', '21', 'JUNIO - AGOSTO 2018 / VERANO', '', '0') ,
('2019-1', '23', 'ENERO-JUNIO 2019', '28/01/19-03/06/19', '0') ,
('2019-2', '25', 'AGOSTO 2019 - DICIEMBRE 2019', '26/08/2019 - 13/12/19', '0') ,
('2019-V', '24', 'JUNIO 2019 JULIO 2019', '17/06/19-26/07/19', '0') ,
('2020-1', '26', 'ENERO 2020 A JUNIO 2020', '27/01/2020.-12/06/2020', '0') ,
('2020-2', '28', 'SEPTIEMBRE 2020-ENERO 2021', '21/09/2020-26/01/2021', '1') ,
('2020-V', '27', 'JUNIO 2020-AGOSTO 2020', '29/06/2020-07/08/2020', '0') ;

CREATE TABLE `docente` (
`idoc` varchar(15) CHARACTER SET utf8 COLLATE utf8_spanish_ci,
`nomdoc` varchar(60) CHARACTER SET utf8 COLLATE utf8_spanish_ci,
`passdoc` varchar(40) CHARACTER SET utf8 COLLATE utf8_spanish_ci,
`dirdoc` varchar(60) CHARACTER SET utf8 COLLATE utf8_spanish_ci,
`teldoc` varchar(15) CHARACTER SET utf8 COLLATE utf8_spanish_ci,
`maildoc` varchar(40) CHARACTER SET utf8 COLLATE utf8_spanish_ci,
`status` int(11) default NULL,
`contra` int(11) default NULL,
PRIMARY KEY (`idoc`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


INSERT INTO `docente` (`idoc`, `nomdoc`, `passdoc`, `dirdoc`, `teldoc`, `maildoc`, `status`, `contra`) VALUES
('AAHC8205301RA', 'LIC. ARAIZA HERRERA CINTHYA BERENICE', 'd96b5af31b798f1a342f486f3f20dd6ba74a0328', '', '', '', '1', '0') ,
('ADRIANA', 'M. B. A. LUZ ADRIANA ESPINOSA SAMANIEGO', '01b307acba4f54f55aafc33bb06bbbf6ca803e9a', '', '', '', '1', '0') ,
('ALBERTO', 'LIC. SALMERON PEREZ ALBERTO JOVANNY', '2ab9e73848a9934560caf045e0c8ef672008c6c6', '', '', '', '1', '') ,
('AMERICA', 'M. EN T. A. GALLEGOS PEREZ AMERICA', 'abaa50e401943b846d3cd5b01b750d7540b32dc5', '', '', '', '1', '0') ,
('ANA LILIA', 'MC.ANA LILIA LOPEZ VALDEZ', '2ab9e73848a9934560caf045e0c8ef672008c6c6', '', '', '', '0', '') ,
('ANGEL', 'LIC. ANDRES MORALES ANGEL', '2ab9e73848a9934560caf045e0c8ef672008c6c6', '', '', '', '1', '') ,
('ARMANDO', 'MATL. MONTES RIVERA ARMANDO', '6a9600c3122fd31b0901cbebc931fe57871603f2', '', '', '', '1', '0') ,
('ARTURO', 'ING. FABIAN ARTURO CHAVARRIA LOMELI', 'b0496d56fa4d7d5ac4041f0fca00797202cc2653', '', '', '', '1', '0') ,
('CACP850919UE5', 'LIC. CASTILLO CASTILLO PABLO', '6970e18ae651fd666fc12b95db59bccd860a667a', 'CENTAURO DEL NORTE', '5532414631', 'PABLO_1934@HOTMAIL.COM', '1', '0') ,
('CAGE780609IT8', 'QUIM. CANEDA GUZMAN ENRIQUE', '3aac51b79ae48c0b1673e2e3d8d6ca6bb54f79ca', '', '', '', '1', '0') ,
('CESAR', 'M. ISC. CESAR ALEJANDRO LOPEZ CASTAÃƒÆ’Ã†â€™Ã�', '7be07aaf460d593a323d0db33da05b64bfdcb3a5', '', '', '', '0', '0') ,
('CLAUDIA', 'REYES AVENDA?O CLAUDIA GABRIELA', '2ab9e73848a9934560caf045e0c8ef672008c6c6', '', '', '', '1', '') ,
('COAP660518Q7A', 'LIC. PASCUAL CORAZA AGUIRRE', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '', '', '', '0', '0') ,
('COPA630507HU9', 'ING. JOSE ANTONIO CONEJO PLATA', '2ab9e73848a9934560caf045e0c8ef672008c6c6', '', '', '', '1', '0') ,
('CUBS740623', 'ING. SALVADOR CUEVAS BUSTOS', '47aec343bc07f9885d21b6e78cd06693697e599f', '', '', '', '1', '0') ,
('CUELLAR', 'HUGO ERNESTO CUELLAR CARREON', 'c787a7edae2f92a969186c3238f0b02444399111', '', '', '', '1', '0') ,
('DARIO', 'DARIO EMILIANO MENDOZA AVILA', 'fa8d142d209d2ee91fd3558b2da26f02553b3e56', '', '', '', '1', '0') ,
('DAVID', 'ING. RONQUILLO ARVIZU REY DAVID', '724290da9bbddb990767e2cf46c6b97eb580f5c2', '', '', '', '1', '0') ,
('DIEGO', 'LIC. ANTERO REYES DIEGO', '2ab9e73848a9934560caf045e0c8ef672008c6c6', '', '', '', '1', '') ,
('DIVISION', 'DIVISION DE ESTUDIOS PROFESIONALES', 'f7c3bc1d808e04732adf679965ccc34ca7ae3441', '', '', '', '1', '1') ,
('EERI830617J66', 'LIC. ECHEVERRIA RODRIGUEZ ISMAEL', 'db80b5b3cae5f079382e150d855da2d96908fee6', '', '', '', '1', '0') ,
('ERIKA', 'ERIKA SANTIBAÑEZ HERNÁNDEZ', 'f7c3bc1d808e04732adf679965ccc34ca7ae3441', '', '', '', '1', '0') ,
('FABIAN', 'M. EN T.A. FABIAN GABRIEL PANTOJA NERIA', '9bc7f9717ef67e102967638d78af221293c1c5e2', '', '', '', '1', '0') ,
('FEDERICO', 'ING. FEDERICO MEJIA CRUZ', 'bb69541a9a943bd84c4722b46e351378ac7a9a2b', '', '', '', '1', '0') ,
('FOLE820216Q45', 'LIC. FLORES LOPEZ EVA MARIA', 'c15eb4b55bd000f4a876c1d715bee42e62b3e576', '', '', '', '1', '0') ,
('FRANCISCO', 'ING. FRANCISCO MUNOZ BUSTOS', 'a168506a3e885be4b0d77d5d69be7c2f084b10dd', '', '', '', '1', '0') ,
('GAAE850211UI7', 'FIS. EDUARDO GARCIA AMADOR', '2c6b6a1d0d76227b69f40c8f8548fc16bf97c8e5', '', '', '', '1', '0') ,
('GAOR770112', 'LIC. GARCIA ORTIZ REBECA ESTHER', 'f7c3bc1d808e04732adf679965ccc34ca7ae3441', '', '', '', '1', '0') ,
('GAWA7903109G4', 'LIC. GARCIA WALLE ANA CELSA', '7c222fb2927d828af22f592134e8932480637c0d', '', '', 'CELSA_1507@HOTMAIL.COM', '1', '0') ,
('GERARDO', 'ING. PRADEL MU?OZ GERARDO', '2ab9e73848a9934560caf045e0c8ef672008c6c6', '', '', '', '1', '') ,
('GOAI831020UY4', 'ING. GOMEZ AYALA IVAN ALEJANDRO', '9bc7f9717ef67e102967638d78af221293c1c5e2', '', '', '', '1', '0') ,
('HUGO', 'LIC. HUGO MACIAS MACEDO', '7e91fc74bdce4a3f16e20ba0a17815f93b37cf9f', '', '', '', '1', '0') ,
('INTERINO1', 'INTERINO1', '2ab9e73848a9934560caf045e0c8ef672008c6c6', '', '', '', '1', '') ,
('INTERINO10', 'INTERINO10', '2ab9e73848a9934560caf045e0c8ef672008c6c6', '', '', '', '1', '') ,
('INTERINO11', 'INTERINO11', '2ab9e73848a9934560caf045e0c8ef672008c6c6', '', '', '', '1', '') ,
('INTERINO12', 'INTERINO12', '2ab9e73848a9934560caf045e0c8ef672008c6c6', '', '', '', '1', '') ,
('INTERINO13', 'INTERINO13', '2ab9e73848a9934560caf045e0c8ef672008c6c6', '', '', '', '0', '') ,
('INTERINO2', 'MC.ANA LILIA LOPEZ VALDEZ', '2ab9e73848a9934560caf045e0c8ef672008c6c6', '', '', '', '1', '') ,
('INTERINO3', 'INTERINO3', '2ab9e73848a9934560caf045e0c8ef672008c6c6', '', '', '', '0', '') ,
('INTERINO4', 'INTERINO4', '2ab9e73848a9934560caf045e0c8ef672008c6c6', '', '', '', '0', '') ,
('INTERINO5', 'INTERINO5', '2ab9e73848a9934560caf045e0c8ef672008c6c6', '', '', '', '0', '') ,
('INTERINO6', 'INTERINO6', '2ab9e73848a9934560caf045e0c8ef672008c6c6', '', '', '', '0', '') ,
('INTERINO7', 'INTERINO7', '2ab9e73848a9934560caf045e0c8ef672008c6c6', '', '', '', '0', '') ,
('INTERINO8', 'INTERINO8', '2ab9e73848a9934560caf045e0c8ef672008c6c6', '', '', '', '0', '') ,
('INTERINO9', 'INTERINO9', '2ab9e73848a9934560caf045e0c8ef672008c6c6', '', '', '', '0', '') ,
('ISELA', 'ING. ARELLANO GAMEZ ROSA ISELA', '2ab9e73848a9934560caf045e0c8ef672008c6c6', '', '', '', '0', '') ,
('ITZEL', 'LIC. ITZEL CHAVARRIA SALINAS', '7c222fb2927d828af22f592134e8932480637c0d', '', '', '', '1', '0') ,
('JARR790328', 'ING. ROBERTO JARDON RODRIGUEZ', 'f7c3bc1d808e04732adf679965ccc34ca7ae3441', '', '', '', '1', '0') ,
('JENNY', 'LIC. JENNY JANETE ESPINOSA ALVAREZ', '2ab9e73848a9934560caf045e0c8ef672008c6c6', '', '', '', '1', '0') ,
('JESSICA', 'JESSICA YVONNE LUNA GALLEGOS', '2ab9e73848a9934560caf045e0c8ef672008c6c6', '', '', '', '1', '') ,
('JILW840910VC2', 'ING. JIMENEZ LOPEZ WILLIAM', 'fa8d142d209d2ee91fd3558b2da26f02553b3e56', '', '', '', '1', '0') ,
('JONH', 'ING. YONATHAN ANGEL ALMANZA SANCHEZ', '7be07aaf460d593a323d0db33da05b64bfdcb3a5', '', '', '', '1', '0') ,
('JOSE LUIS', 'LIC. JOSE LUIS ESTRADA GONZALES', '2ab9e73848a9934560caf045e0c8ef672008c6c6', '', '', '', '1', '') ,
('KARINA', 'LIC. KARINA LÖPEZ ANDRES', 'bfe54caa6d483cc3887dce9d1b8eb91408f1ea7a', '', '', '', '1', '0') ,
('LABE8408304C1', 'LIC. EDITH LLAMAS BECERRIL', '7be07aaf460d593a323d0db33da05b64bfdcb3a5', '', '', '', '0', '0') ,
('LOCJ700629GE6', 'LIC. LOPEZ CRUZ JUANA BEATRIZ', 'ae6635fcc871e8cafd0717f8f66dc7c2d53c9c84', '', '', '', '1', '0') ,
('LOCM820210152', 'ING. LOPEZ CELAYA MICHEL', '9bc7f9717ef67e102967638d78af221293c1c5e2', '', '5560272484', 'MITCHESS25@HOTMAIL.COM', '1', '0') ,
('LUISALBERT', 'ING. LUIS ALBERTO SOLORZANO LUVIANO', '7be07aaf460d593a323d0db33da05b64bfdcb3a5', '', '', '', '1', '1') ,
('MARANITO', 'MC. JUANA SANCHEZ OSORIO', '7be07aaf460d593a323d0db33da05b64bfdcb3a5', '', '', '', '1', '0') ,
('MARCOS', 'LIC. MARCOS EDGAR BERNAL TAPIA', '7be07aaf460d593a323d0db33da05b64bfdcb3a5', '', '', '', '0', '0') ,
('MARIA', 'MARIA DEL ROSARIO RODRIGUEZ VASQUEZ', 'caa70946d8da3b59d1e0e798712934907f004695', '', '', '', '1', '0') ,
('MARIO', 'LIC. MARIO ESQUIVEL GOMEZ', '8cb2237d0679ca88db6464eac60da96345513964', '', '', '', '0', '0') ,
('MARTHA', 'LIC. MARTHA BAZAN BETANZOS', '7be07aaf460d593a323d0db33da05b64bfdcb3a5', '', '', '', '0', '0') ,
('MARTIN', 'ING. MARTIN RONQUILLO ARVIZU', '7be07aaf460d593a323d0db33da05b64bfdcb3a5', '', '', '', '0', '') ,
('MERA881111NY7', 'LIC. ATZIRI YERALDIN MERLO RODR?GUEZ', 'f7c3bc1d808e04732adf679965ccc34ca7ae3441', '', '', '', '1', '0') ,
('MOCM721003', 'M.D. MONICA MONTANEZ CRUZ', '7c222fb2927d828af22f592134e8932480637c0d', '', '', '', '1', '0') ,
('NAHIM', 'MIC. DE LUNA MENDOZA NAIM', '2ab9e73848a9934560caf045e0c8ef672008c6c6', '', '', '', '1', '') ,
('NC', 'CONTADORA', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '', '', '', '', '') ,
('NO', 'POR ASIGNAR', '2ab9e73848a9934560caf045e0c8ef672008c6c6', '', '', '', '1', '') ,
('NOHEMI', 'DRA. NOHEMÃƒÆ’Ã†â€™Ãƒâ€ Ã¢â‚¬â„�', 'ebb57006b88f48ea953d2cc9ebd4ff071bb986f0', '', '', '', '1', '1') ,
('OCTAVIO', 'ING. OCTAVIO CIENEGA CACEREZ', 'e331b72617e2a02b6a8d9f24065d1a293b6f99bb', '', '', '', '1', '0') ,
('OOCR750829AF4', 'ING. OROZCO CELAYA ROBERTO', 'fa8d142d209d2ee91fd3558b2da26f02553b3e56', '', '', '', '1', '0') ,
('PRISCO', 'LIC. QUETZALCOATL PRISCO TORRES', '13e47666aeb1620ce1a81fead825fc6795293b0f', '', '', '', '', '') ,
('PUGA', 'ING. ANGEL EDUARDO RIVERA PUGA', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', '', '', '', '0', '0') ,
('RAPT7803212E2', 'MC. RAMIREZ PALMA TANIA ANGELICA', 'bfe54caa6d483cc3887dce9d1b8eb91408f1ea7a', '', '', '', '1', '0') ,
('RIRL840211QA7', 'LIC. RINCON REAL LOURDES VIVIANA', 'f7c3bc1d808e04732adf679965ccc34ca7ae3441', '', '', '', '1', '0') ,
('ROAP4503305N6', 'LIC. PEDRO REGULO ROMO ALTAMIRANO', 'f7c3bc1d808e04732adf679965ccc34ca7ae3441', '', '', '', '1', '0') ,
('RODRIGO', 'RODRIGO JOB CRUZ GARCÍA', 'bfe54caa6d483cc3887dce9d1b8eb91408f1ea7a', '', '', '', '1', '0') ,
('ROGELIO', 'ING. CERVANTES ORTEGA ROGELIO', '7c222fb2927d828af22f592134e8932480637c0d', '', '', '', '1', '0') ,
('ROSARIO', 'QUIM. RAMIREZ PALMA MARIA DEL ROSARIO', '0babfd72b0f49bc2a65f833ebb4d183898b058af', '', '', '', '1', '0') ,
('RUCR830314FDA', 'ING. RUIZ CASTILLO RAFAEL', 'bc9eb301708e79534d5e2bc42ff9a5af93c0d897', '', '', '', '1', '0') ,
('SOGC8411097R7', 'LIC. SOSA GUZMAN CLAUDIA PATRICIA', 'fa8d142d209d2ee91fd3558b2da26f02553b3e56', '', '', '', '1', '0') ,
('thishouldn', 'ZAP', '2ab9e73848a9934560caf045e0c8ef672008c6c6', '', '', '', '1', '') ,
('TOSCANO', 'TOSCANO', '2ab9e73848a9934560caf045e0c8ef672008c6c6', '', '', '', '0', '') ,
('TUN', 'LIC. JULIAN ROMO TUN', 'f97a2c6cf3e600f0fa7a618159e29d0480061251', '', '', '', '1', '0') ,
('VAPM820913890', 'LIC. VACA PARRA MARIA', 'f7c3bc1d808e04732adf679965ccc34ca7ae3441', '', '', '', '1', '0') ,
('VIJV850720RV1', 'LIC. VICENTE JIMENEZ VICTOR IVAN', '2ab9e73848a9934560caf045e0c8ef672008c6c6', 'CENTAURO', '123', 'WELCAREA', '1', '1') ,
('VINCULACION', 'PLANEACION Y VINCULACION', '7be07aaf460d593a323d0db33da05b64bfdcb3a5', '', '', '', '1', '1') ,
('VIVL780905TG1', 'LIC. VICENTE VASQUEZ LUCELY', 'f7c3bc1d808e04732adf679965ccc34ca7ae3441', '', '', '', '1', '0') ,
('YADIRA', 'TRINIDAD BELLO GLORIA YADIRA', '2ab9e73848a9934560caf045e0c8ef672008c6c6', '', '', '', '0', '') ;

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

CREATE TABLE carrera (
  idcar varchar(20) CHARACTER SET utf8 COLLATE utf8_spanish_ci,
  descar varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci,
  status tinyint,
  credito int,
  cvec varchar(4) CHARACTER SET utf8 COLLATE utf8_spanish_ci,
  reticula varchar(4) CHARACTER SET utf8 COLLATE utf8_spanish_ci,
  PRIMARY KEY  (idcar)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
INSERT INTO carrera (idcar, descar, status, credito, cvec, reticula) VALUES
('IADM-2010-213', 'INGENIER?A EN ADMINISTRACI?N', 1, 260, '001', '2010'),
('ILOG-2009-202', 'INGENIERIA EN LOGISTICA', 1, 260, '003', '2009'),
('ITIC-2010-225', 'INGENIERIA EN TECNOLOGIAS DE LA INFORMACION Y COMUNICACIONES', 1, 260, '002', '2010'),
('POR ASIGNAR', 'CARRERA SIN ASIGNAR', 1, NULL, NULL, NULL);

CREATE TABLE alumnos (
  matricula varchar(9) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  nom varchar(40) CHARACTER SET utf8 COLLATE utf8_spanish_ci,
  app varchar(20) CHARACTER SET utf8 COLLATE utf8_spanish_ci,
  apm varchar(20) CHARACTER SET utf8 COLLATE utf8_spanish_ci,
  sexo varchar(2) CHARACTER SET utf8 COLLATE utf8_spanish_ci ,
  curp varchar(25) CHARACTER SET utf8 COLLATE utf8_spanish_ci,
  dialecto int,
  fecnac date default NULL,
  edociv varchar(30) CHARACTER SET utf8 COLLATE utf8_spanish_ci,
  otro varchar(30) CHARACTER SET utf8 COLLATE utf8_spanish_ci,
  calle varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci,
  colonia varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci,
  idedo int,
  ciudad varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci,
  cp varchar(5) CHARACTER SET utf8 COLLATE utf8_spanish_ci,
  telal varchar(15) CHARACTER SET utf8 COLLATE utf8_spanish_ci,
  email varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci,
  idesc int,
  otesc varchar(60) CHARACTER SET utf8 COLLATE utf8_spanish_ci,
  prepa varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci,
  propre float default NULL,
  secu varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci,
  prose float default NULL,
  idcar varchar(20) CHARACTER SET utf8 COLLATE utf8_spanish_ci,
  passal varchar(40) CHARACTER SET utf8 COLLATE utf8_spanish_ci,
  status int(11) default NULL,
  nomtut varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci,
  dirtut varchar(60) CHARACTER SET utf8 COLLATE utf8_spanish_ci,
  teltut varchar(15) CHARACTER SET utf8 COLLATE utf8_spanish_ci,
  insc tinyint(4) NOT NULL,
  bandera int(11) default NULL,
  fecalta date default NULL,
  discap int(11) default NULL,
  proc varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci,
  PRIMARY KEY  (matricula),
  KEY matricula (matricula),
  KEY idcar (idcar),
  FOREIGN KEY (idcar) REFERENCES carrera (idcar) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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



CREATE TABLE materias (
  idmat varchar(10) CHARACTER SET utf8 COLLATE utf8_spanish_ci,
  nommat varchar(60) CHARACTER SET utf8 COLLATE utf8_spanish_ci,
  credit int,
  habil tinyint,
  depto varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci,
  unid int,
  cred varchar(6) CHARACTER SET utf8 COLLATE utf8_spanish_ci,
  idesp varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci,
  PRIMARY KEY  (idmat)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;



CREATE TABLE `posee` (
`idcar` varchar(20) CHARACTER SET utf8 COLLATE utf8_spanish_ci,
`idmat` varchar(10) CHARACTER SET utf8 COLLATE utf8_spanish_ci,
`sem` int(11) default NULL,
`cven` varchar(7) CHARACTER SET utf8 COLLATE utf8_spanish_ci,
`tipom` int(11) default NULL,
`prerre` int(11) default NULL,
`ht` int(11) default NULL,
`hp` int(11) default NULL,
`orden` int(11) default NULL,
`renglon` int(11) default NULL,
`status` varchar(2) CHARACTER SET utf8 COLLATE utf8_spanish_ci,
PRIMARY KEY (`idcar`,`idmat`),
KEY `idmat` (`idmat`),
FOREIGN KEY (`idcar`) REFERENCES `carrera` (`idcar`) ON UPDATE CASCADE,
FOREIGN KEY (`idmat`) REFERENCES `materias` (`idmat`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;




CREATE TABLE oportunidad (
  opor int NOT NULL,
  descopor varchar(20) CHARACTER SET utf8 COLLATE utf8_spanish_ci,
  PRIMARY KEY  (opor)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
INSERT INTO oportunidad (opor, descopor) VALUES
(1, 'ORDINARIO'),
(2, 'REPETICION'),
(3, 'ESPECIAL'),
(4, 'GLOBAL ORDINARIO'),
(5, 'GLOBAL REPETICION'),
(6, 'SEMIPRESENCIAL');

CREATE TABLE aula (
  ida int NOT NULL,
  aula varchar(10) CHARACTER SET utf8 COLLATE utf8_spanish_ci,
  PRIMARY KEY  (ida)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
INSERT INTO aula (ida, aula) VALUES
(1, 'A-1'),
(2, 'A-L1'),
(3, 'B-1'),
(4, 'B-2'),
(5, 'B-3'),
(6, 'B-4'),
(7, 'B-5'),
(8, 'B-6'),
(9, 'C-1'),
(10, 'C-2'),
(11, 'C-3'),
(12, 'C-4'),
(13, 'C-5'),
(14, 'C-6'),
(15, 'C-L1'),
(16, 'C-C1'),
(17, 'C-C2'),
(18, 'D-1'),
(19, 'D-2'),
(20, 'D-3'),
(21, 'D-4'),
(22, 'D-5'),
(23, 'D-6'),
(24, 'D-7'),
(25, '25'),
(26, '26'),
(27, '27'),
(28, '28'),
(29, 'B2'),
(30, 'CC');

CREATE TABLE semana (
  idia int(11) NOT NULL,
  dia varchar(10) default NULL,
  PRIMARY KEY  (idia)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO semana (idia, dia) VALUES
(1, 'LUNES'),
(2, 'MARTES'),
(3, 'MIERCOLES'),
(4, 'JUEVES'),
(5, 'VIERNES');

CREATE TABLE reloj (
idr int(11) NOT NULL,
hora varchar(11) CHARACTER SET utf8 COLLATE utf8_spanish_ci,
PRIMARY KEY (idr)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO reloj (idr, hora) VALUES
(1, '07-08'),
(2, '08-09'),
(3, '08-09'),
(4, '09-10'),
(5, '10-11'),
(6, '11-12'),
(7, '12-13'),
(8, '13-14'),
(9, '14-15'),
(10, '15-16'),
(11,'16-17'),
(12,'17-18'),
(13,'18-19'),
(14,'19-20'),
(15,'20-21');


CREATE TABLE `grupo` (
`idg` varchar(12) CHARACTER SET utf8 COLLATE utf8_spanish_ci,
`descgpo` varchar(30) CHARACTER SET utf8 COLLATE utf8_spanish_ci,
PRIMARY KEY (`idg`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


INSERT INTO `grupo` (`idg`, `descgpo`) VALUES
('10A-ADM', 'D?CIMO A ADMINISTRACI?N') ,
('10A-LOG', 'D?CIMO A LOG?STICA') ,
('10A-TIC', 'D?CIMO A TICS') ,
('1A-ADM', 'PRIMERO A ADMINISTRACI?N') ,
('1A-LOG', 'PRIMERO A LOG?STICA') ,
('1A-TIC', 'PRIMERO A TICS') ,
('1B-ADM', 'PRIMERO B ADMINISTRACI?N') ,
('1B-LOG', 'PRIMERO B LOG?STICA') ,
('1B-TIC', 'PRIMERO B TICS') ,
('2A-ADM', 'SEGUNDO A ADMINISTRACI?N') ,
('2A-LOG', 'SEGUNDO A LOG?STICA') ,
('2A-TIC', 'SEGUNDO A TICS') ,
('2B-ADM', 'SEGUNDO B ADMINISTRACI?N') ,
('2B-LOG', 'SEGUNDO B LOGISTICA') ,
('2B-TIC', 'SEGUNDO B') ,
('3A-ADM', 'TERCERO A ADMINISTRACI?N') ,
('3A-LOG', 'TERCERO A LOG?STICA') ,
('3A-TIC', 'TERCERO A TICS') ,
('3B-ADM', 'TERCERO A - ADMINISTRACION') ,
('4A-ADM', 'CUARTO A ADMINISTRACI?N') ,
('4A-LOG', 'CUARTO A LOG?STICA') ,
('4A-TIC', 'CUARTO A TICS') ,
('4B-ADM', 'CUARTO B ADMINISTRACI?N') ,
('5A-ADM', 'QUINTO A ADMINISTRACI?N') ,
('5A-LOG', 'QUINTO A LOG?STICA') ,
('5A-TIC', 'QUINTO A TICS') ,
('6A-ADM', 'SEXTO A ADMINISTRACI?N') ,
('6A-LOG', 'SEXTO A LOG?STICA') ,
('6A-TIC', 'SEXTO A TICS') ,
('6B-ADM', 'SEXTO B - ADMINISTRACION') ,
('7A-ADM', 'S?PTIMO A ADMINISTRACI?N') ,
('7A-LOG', 'S?PTIMO A LOG?STICA') ,
('7A-TIC', 'S?PTIMO A TICS') ,
('8A-ADM', 'OCTAVO A ADMINISTRACI?N') ,
('8A-LOG', 'OCTAVO A LOG?STICA') ,
('8A-TIC', 'OCTAVO A TICS') ,
('8B-ADM', '') ,
('8B-LOG', '') ,
('8B-TIC', '') ,
('9A-ADM', 'NOVENO A ADMINISTRACI?N') ,
('9A-LOG', 'NOVENO A LOG?STICA') ,
('9A-TIC', 'NOVENO A TICS') ;

CREATE TABLE `encarre` (
`idg` varchar(12) CHARACTER SET utf8 COLLATE utf8_spanish_ci,
`idcar` varchar(20) CHARACTER SET utf8 COLLATE utf8_spanish_ci,
PRIMARY KEY (`idg`,`idcar`),
KEY `idcar` (`idcar`),
FOREIGN KEY (`idg`) REFERENCES `grupo` (`idg`) ON DELETE CASCADE ON UPDATE CASCADE,
FOREIGN KEY (`idcar`) REFERENCES `carrera` (`idcar`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


INSERT INTO `encarre` (`idg`, `idcar`) VALUES
('10A-ADM', 'IADM-2010-213') ,
('1A-ADM', 'IADM-2010-213') ,
('1B-ADM', 'IADM-2010-213') ,
('2A-ADM', 'IADM-2010-213') ,
('2B-ADM', 'IADM-2010-213') ,
('3A-ADM', 'IADM-2010-213') ,
('3B-ADM', 'IADM-2010-213') ,
('4A-ADM', 'IADM-2010-213') ,
('4B-ADM', 'IADM-2010-213') ,
('5A-ADM', 'IADM-2010-213') ,
('6A-ADM', 'IADM-2010-213') ,
('6B-ADM', 'IADM-2010-213') ,
('7A-ADM', 'IADM-2010-213') ,
('8A-ADM', 'IADM-2010-213') ,
('8B-ADM', 'IADM-2010-213') ,
('9A-ADM', 'IADM-2010-213') ,
('10A-LOG', 'ILOG-2009-202') ,
('1A-LOG', 'ILOG-2009-202') ,
('2A-LOG', 'ILOG-2009-202') ,
('3A-LOG', 'ILOG-2009-202') ,
('4A-LOG', 'ILOG-2009-202') ,
('5A-LOG', 'ILOG-2009-202') ,
('6A-LOG', 'ILOG-2009-202') ,
('7A-LOG', 'ILOG-2009-202') ,
('8A-LOG', 'ILOG-2009-202') ,
('8B-LOG', 'ILOG-2009-202') ,
('9A-LOG', 'ILOG-2009-202') ,
('10A-TIC', 'ITIC-2010-225') ,
('1A-TIC', 'ITIC-2010-225') ,
('1B-TIC', 'ITIC-2010-225') ,
('2A-TIC', 'ITIC-2010-225') ,
('2B-TIC', 'ITIC-2010-225') ,
('3A-TIC', 'ITIC-2010-225') ,
('4A-TIC', 'ITIC-2010-225') ,
('5A-TIC', 'ITIC-2010-225') ,
('6A-TIC', 'ITIC-2010-225') ,
('7A-TIC', 'ITIC-2010-225') ,
('8A-TIC', 'ITIC-2010-225') ,
('8B-TIC', 'ITIC-2010-225') ,
('9A-TIC', 'ITIC-2010-225') ;


CREATE TABLE `horario` (
`idh` int(11) NOT NULL,
`idoc` varchar(15) CHARACTER SET utf8 COLLATE utf8_spanish_ci,
`idmat` varchar(10) CHARACTER SET utf8 COLLATE utf8_spanish_ci,
`periodo` varchar(6) CHARACTER SET utf8 COLLATE utf8_spanish_ci,
`num` int(11) default NULL,
`cupo` int(11) default NULL,
`folio` varchar(11) CHARACTER SET utf8 COLLATE utf8_spanish_ci,
PRIMARY KEY (`idh`),
KEY `idoc` (`idoc`),
KEY `idmat` (`idmat`),
KEY `periodo` (`periodo`),
FOREIGN KEY (`idoc`) REFERENCES `docente` (`idoc`) ON UPDATE CASCADE,
FOREIGN KEY (`idmat`) REFERENCES `materias` (`idmat`) ON UPDATE CASCADE,
FOREIGN KEY (`periodo`) REFERENCES `periodo` (`periodo`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE `imparte` (
`idh` int(11) NOT NULL,
`idia` int(11) NOT NULL,
`idr` int(11) NOT NULL,
`ida` int(11) NOT NULL,
PRIMARY KEY (`idh`,`idia`,`idr`,`ida`),
KEY `idh` (`idh`),
KEY `idia` (`idia`),
KEY `idr` (`idr`),
KEY `ida` (`ida`),
FOREIGN KEY (`idh`) REFERENCES `horario` (`idh`) ON DELETE CASCADE ON UPDATE CASCADE,
FOREIGN KEY (`idia`) REFERENCES `semana` (`idia`) ON DELETE CASCADE ON UPDATE CASCADE,
FOREIGN KEY (`idr`) REFERENCES `reloj` (`idr`) ON DELETE CASCADE ON UPDATE CASCADE,
FOREIGN KEY (`ida`) REFERENCES `aula` (`ida`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


CREATE TABLE `hgrupo` (
`idh` int(11) NOT NULL default '0',
`idg` varchar(12) CHARACTER SET utf8 COLLATE utf8_spanish_ci,
PRIMARY KEY (`idh`,`idg`),
KEY `idg` (`idg`),
FOREIGN KEY (`idg`) REFERENCES `grupo` (`idg`) ON DELETE CASCADE ON UPDATE CASCADE,
FOREIGN KEY (`idh`) REFERENCES `horario` (`idh`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE `cursa` (
`idh` int(11) NOT NULL,
`matricula` varchar(9) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
`opor` int(11) NOT NULL default '0',
`fecing` date default NULL,
`asigna` varchar(10) CHARACTER SET utf8 COLLATE utf8_spanish_ci,
`eval` int(11) default NULL,
`po1` float default NULL,
`so1` float default NULL,
`po2` float default NULL,
`so2` float default NULL,
`po3` float default NULL,
`so3` float default NULL,
`po4` float default NULL,
`so4` float default NULL,
`po5` float default NULL,
`so5` float default NULL,
`po6` float default NULL,
`so6` float default NULL,
`po7` float default NULL,
`so7` float default NULL,
`po8` float default NULL,
`so8` float default NULL,
`po9` float default NULL,
`so9` float default NULL,
`deser` int(11) default NULL,
`prom` float default NULL,
`pso` int(11) default NULL,
PRIMARY KEY (`idh`,`matricula`,`opor`),
KEY `idh` (`idh`,`matricula`),
KEY `matricula` (`matricula`),
KEY `opor` (`opor`),
FOREIGN KEY (`idh`) REFERENCES `horario` (`idh`) ON UPDATE CASCADE,
FOREIGN KEY (`matricula`) REFERENCES `alumnos` (`matricula`) ON UPDATE CASCADE,
FOREIGN KEY (`opor`) REFERENCES `oportunidad` (`opor`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE `prerequi` (
`nop` int(11) NOT NULL,
`idcar` varchar(20) CHARACTER SET utf8 COLLATE utf8_spanish_ci,
`idmat` varchar(10) CHARACTER SET utf8 COLLATE utf8_spanish_ci,
PRIMARY KEY (`nop`),
KEY `idcar` (`idcar`),
KEY `idmat` (`idmat`),
FOREIGN KEY (`idcar`) REFERENCES `carrera` (`idcar`) ON UPDATE CASCADE,
FOREIGN KEY (`idmat`) REFERENCES `materias` (`idmat`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;




-- 81 registros
CREATE TABLE `listapre` (
`nop` int(11) NOT NULL,
`idmat` varchar(10) CHARACTER SET utf8 COLLATE utf8_spanish_ci,
KEY `nop` (`nop`),
KEY `idmat` (`idmat`),
FOREIGN KEY (`nop`) REFERENCES `prerequi` (`nop`) ON UPDATE CASCADE,
FOREIGN KEY (`idmat`) REFERENCES `materias` (`idmat`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;





-- 9 registros
create table certificado(
matricula varchar(9) NOT NULL primary key,
numero varchar(10),
libro varchar(10),
foja varchar(10),
fecha varchar(11),
periodo varchar(100),
fechaexp varchar(100)
)ENGINE=InnoDB DEFAULT CHARSET=latin1;



INSERT INTO certificado (matricula, numero, libro, foja, fecha, periodo, fechaexp) VALUES
('101090107', '', '', '', '', '', '') ,
('131090055', '', '', '', '', '', '') ,
('131090061', '', '', '', '', '', '') ,
('131090156', '', '', '', '', '', '') ,
('141090141', '0448', '1', '018', '2019-12-20', 'AGOSTO DE 2014 A DICIEMBRE DE 2019', '2019-12-20') ,
('151090015', '0454', '1', '019', '2019-12-20', 'ENERO DE 2015 A DICIEMBRE DE 2019', '2019-12-20') ,
('151090045', '0447', '1', '018', '2019-12-20', 'AGOSTO DE 2015 A DICIEMBRE DE 2019', '2019-12-20') ,
('151090060', '', '', '', '', '', '') ,
('161090068', '', '', '', '', '', '') ;