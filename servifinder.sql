drop database if exists servifinder;
CREATE DATABASE IF NOT EXISTS servifinder;
USE servifinder;

-- roles
CREATE TABLE roles (
  Id_Rol int primary key not null auto_increment,
  valor varchar(20) not null
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- usuarios
CREATE TABLE usuarios (
  Id_Usuario int primary key NOT NULL auto_increment,
  Id_Rol int not null,
  Estado enum('activo', 'inactivo') NOT NULL default 'activo',
  Correo varchar(100) not null,
  Contraseña varchar(50) NOT NULL,
  foreign key (Id_Rol) references roles(Id_Rol)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


-- cliente
CREATE TABLE clientes (
  Id_Cliente int primary key NOT NULL auto_increment,
  Nombre varchar(50) not null,
  F_Nacimiento date not null,
  Sexo enum('M', 'F') not null,
  Latitud decimal(20, 6) not null,
  Longitud decimal(20, 6) not null,
  Id_Usuario int not null,
  foreign KEY (Id_Usuario) references usuarios(Id_Usuario)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- doctores
CREATE TABLE doctores (
  Id_Doctor int primary key not null unique auto_increment,
  Nombre varchar(100) not null,
  Cedula varchar(50) not null,
  F_Nacimiento date not null,
  Lengua varchar(50) not null,
  Idioma varchar(50) not null,
  Sexo enum('F','M') not null
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Doctores y telefonos
CREATE TABLE doctel (
  Telefono varchar(20) primary key NOT NULL,
  Id_Doctor int not null,
  foreign key (Id_Doctor) references doctores(Id_Doctor)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Especialidad
CREATE TABLE especialidad (
  Id_Especialidad int primary key NOT NULL auto_increment,
  Nombre varchar(100) DEFAULT NULL,
  Descripcion varchar(200) not null
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- especialidad de doctores
CREATE TABLE docesp (
  Id_DocEsp int primary key not null auto_increment,
  Id_Doctor int NOT NULL,
  Id_Especialidad int NOT NULL,
  Costo decimal(20,6),
  Horario varchar(50) NOT NULL,
  Dias_Labo varchar(50) NOT NULL,
  Latitud decimal(20, 6) not null,
  Longitud decimal(20, 6) NOT NULL,
  foreign KEY (Id_doctor) references doctores(Id_Doctor),
  foreign KEY (Id_Especialidad) references especialidad(Id_Especialidad)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- usuario-doctor
CREATE TABLE usrdoc (
  Id_UsuarioDoc int primary key unique NOT NULL auto_increment,
  Id_Doctor int not null,
  foreign KEY (Id_Doctor) references doctores(Id_Doctor)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- reseñadoc
CREATE TABLE reseñadoc (
  Id_ReseñaDoc int primary key NOT NULL auto_increment,
  Fecha_hora datetime not null,
  Puntuacion int(5) not null,
  Comentario varchar(300),
  Id_Usuario int not null,
  Id_Doctor int not null,
  foreign KEY (Id_Usuario) references usuarios(Id_Usuario),
  foreign KEY (Id_Doctor) references doctores(Id_Doctor)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



-- profesionistas
CREATE TABLE profesionistas (
  Id_Profesionista int primary key NOT NULL auto_increment,
  Nombre varchar(100) not null,
  Lenguas varchar(50) not null,
  Idiomas varchar(50) not null,
  Sexo enum('M','F') not null,
  F_Nacimiento date not null
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- telefono de profesionistas
CREATE TABLE telefonoprof (
  Telefono varchar(20) primary key NOT NULL,
  Id_profesionista int NOT NULL,
  foreign KEY (Id_Profesionista) references profesionistas(Id_Profesionista)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- servicio
CREATE TABLE servicio (
  Id_servicio int primary key NOT NULL auto_increment,
  Nombre varchar(100) NOT NULL,
  Descripcion varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Profesionista y servicio
CREATE TABLE profserv (
  Id_ProfServ int primary key NOT NULL auto_increment,
  Id_Profesionistas int NOT NULL,
  Id_Servicio int NOT NULL,
  Costo decimal(20,6),
  Horario varchar(50) not null,
  Dias_Lab varchar(50) not null,
  Latitud decimal(20,6) not null,
  Longitud decimal(20,6) not null
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- usuario-profesionista
CREATE TABLE usrprof (
  Id_UsuarioProf int primary key NOT NULL unique auto_increment,
  Id_Profesionista int NOT NULL,
  Id_Usuario int not null,
  foreign KEY (Id_Profesionista) references profesionistas(Id_Profesionista),
  foreign key (Id_Usuario) references usuarios(Id_Usuario)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- reseñaprof
CREATE TABLE reseñaprof (
  Id_ReseñaProf int primary key NOT NULL auto_increment,
  Fecha_hora datetime not null,
  Puntuacion int(5) not null,
  Comentario varchar(300),
  Id_Usuario int not null,
  Id_profesionista int not null,
  foreign KEY (Id_Usuario) references usuarios(Id_Usuario),
  foreign KEY (Id_profesionista) references profesionistas(Id_profesionista)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


-- Estableciento
CREATE TABLE establecimientos (
  Id_Establecimiento int primary key NOT NULL auto_increment,
  Nombre varchar(100) DEFAULT NULL,
  Descripcion varchar(200) DEFAULT NULL,
  Horario varchar(50) DEFAULT NULL,
  Dias_labo varchar(50) DEFAULT NULL,
  Direccion varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- reseña establecimientio
CREATE TABLE reseñaest (
  Id_ReseñaEst int primary key NOT NULL auto_increment,
  Comentario varchar(300) DEFAULT NULL,
  Puntuacion int(5) DEFAULT NULL,
  Fecha_Hora datetime DEFAULT NULL,
  Id_Usuario int DEFAULT NULL,
  Id_Establecimiento int DEFAULT NULL,
  foreign KEY (Id_Establecimiento) references establecimientos(Id_Establecimiento),
  foreign KEY (Id_Usuario) references usuarios(Id_Usuario)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- cita
CREATE TABLE cita(
  Id_Cita int primary key not null unique auto_increment,
  Id_Cliente int not null,
  Id_Doctor int not null,
  Detalle varchar(300) not null,
  FechaHora_R datetime not null,
  Fecha_Cita date not null,
  Estado enum('Pendiente','Aceptada','Rechazada') not null default 'Pendiente',
  foreign key (Id_Cliente) references clientes(Id_Cliente),
  foreign key (Id_Doctor) references doctores(Id_Doctor)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;