DROP SCHEMA proyectoSD;
CREATE SCHEMA proyectoSD;
USE proyectoSD;

/*Crear tabla*/
/*Administrador*/
CREATE TABLE administrador(
	idAdministrador INT(10) NOT NULL AUTO_INCREMENT,
	valido BOOL NOT NULL,
	PRIMARY KEY(idAdministrador)
);

/*Huevo*/
CREATE TABLE huevo(
	idHuevo INT(10) NOT NULL AUTO_INCREMENT,
	tipoHuevo VARCHAR(45) NOT NULL,
	periodoIncubacion INT(10) NOT NULL,
	noVueltasDia INT(10) NOT NULL,
	estacionAno VARCHAR(20) NOT NULL,
	humedadUltimoDia DOUBLE NOT NULL,
	valido BOOL NOT NULL,
	PRIMARY KEY(idHuevo)
);

/*Sensor*/
CREATE TABLE sensor(
	idSensor INT(10) NOT NULL AUTO_INCREMENT,
	codigo VARCHAR(20) NOT NULL,
	rangoSensorMin DOUBLE NOT NULL,
	rangoSensorMax DOUBLE NOT NULL,
	precisionSensor DOUBLE NOT NULL,
	distanciaTransmicion DOUBLE NOT NULL,	
	voltaje DOUBLE NOT NULL,
	estadoActual BOOL NOT NULL,
	valido BOOL NOT NULL,
	PRIMARY KEY(idSensor)
);

/*Numero de huevos en agregar huevo*/
/*DATE = Ano-mes-dia(1996-09-26)*/

/*Tipo Sensor*/
CREATE TABLE tipo_sensor(
	idTipoSensor INT(10) NOT NULL AUTO_INCREMENT,
	tipoSensor INT(10) NOT NULL,
	valido BOOL NOT NULL,
	PRIMARY KEY(idTipoSensor)
);

/*Rango Huevo*/
CREATE TABLE rango_huevo(
	idRangoHuevo INT(10) NOT NULL AUTO_INCREMENT,
	rangoHuevoMax DOUBLE NOT NULL,
	rangoHuevoMin DOUBLE NOT NULL,
	valido BOOL NOT NULL,
	PRIMARY KEY(idRangoHuevo)
);

/*Registro Sensor*/
CREATE TABLE registro_sensor(
	idRegistroSensor INT(10) NOT NULL AUTO_INCREMENT,
	registro DOUBLE NOT NULL,
	valido BOOL NOT NULL,
	PRIMARY KEY(idRegistroSensor)
);

/*Visializa Incubadora*/
CREATE TABLE visualiza_incubadora(
	idVisualizaIncubadora INT(10) NOT NULL AUTO_INCREMENT,
	valido BOOL NOT NULL,
	PRIMARY KEY(idVisualizaIncubadora)
);

/*Atributos para las llaves foraneas*/
ALTER TABLE tipo_sensor
	ADD COLUMN idSensor INT NOT NULL,
	ADD COLUMN idRegistroSensor INT NOT NULL;

ALTER TABLE rango_huevo
	ADD COLUMN idHuevo INT NOT NULL,
	ADD COLUMN idTipoSensor INT NOT NULL;

ALTER TABLE registro_sensor
	ADD COLUMN idTipoSensor INT NOT NULL;

ALTER TABLE visualiza_incubadora
	ADD COLUMN idAdministrador INT NOT NULL,
	ADD COLUMN idHuevo INT NOT NULL;

/*Llaves foraneas*/
ALTER TABLE tipo_sensor
	ADD CONSTRAINT idSensor
	FOREIGN KEY (idSensor)
	REFERENCES sensor (idSensor)
	ON DELETE NO ACTION ON UPDATE NO ACTION,
	ADD CONSTRAINT idRegistroSensor
	FOREIGN KEY (idRegistroSensor)
	REFERENCES registro_sensor (idRegistroSensor)
	ON DELETE NO ACTION ON UPDATE NO ACTION;

ALTER TABLE rango_huevo
	ADD CONSTRAINT idHuevo
	FOREIGN KEY (idHuevo)
	REFERENCES huevo (idHuevo)
	ON DELETE NO ACTION ON UPDATE NO ACTION,
	ADD CONSTRAINT idTipoSensor
	FOREIGN KEY (idTipoSensor)
	REFERENCES tipo_sensor (idTipoSensor)
	ON DELETE NO ACTION ON UPDATE NO ACTION;

ALTER TABLE registro_sensor
	ADD CONSTRAINT idTipoSensor2
	FOREIGN KEY (idTipoSensor)
	REFERENCES tipo_sensor (idTipoSensor)
	ON DELETE NO ACTION ON UPDATE NO ACTION;

ALTER TABLE visualiza_incubadora
	ADD CONSTRAINT idAdministrador
	FOREIGN KEY (idAdministrador)
	REFERENCES administrador (idAdministrador)
	ON DELETE NO ACTION ON UPDATE NO ACTION,
	ADD CONSTRAINT idHuevo2
	FOREIGN KEY (idHuevo)
	REFERENCES huevo (idHuevo)
	ON DELETE NO ACTION ON UPDATE NO ACTION;

/*
--INSERT INTO cliente (nombre,apellidop,apellidom,fechanacimiento,domicilio,telefono) VALUES ('1','1','1','1996-01-01','1','1');
SELECT * FROM compra, automovil
--INSERT INTO administrador (nombre, contrasena) VALUES ('1', '1');
--INSERT INTO compra (fecha, estadoautomovil, numduenos, kilometraje, codigocliente, codigoadministrador, codigoautomovil) VALUES ('1991-01-01', '1', '1', '1', '1', '1', '1')
*/