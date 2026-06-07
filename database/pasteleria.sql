create database pasteleria
character set utf8mb4
collate utf8mb4_general_ci;
use pasteleria;

create table pastel (
id_pastel int auto_increment primary key,
nombre varchar(100) not null,
descripcion varchar(500),
preparado_por varchar(100) not null,
fecha_creacion date not null,
fecha_vencimiento date not null
) engine=InnoDB;

Create table ingrediente (
id_ingrediente int auto_increment primary key,
nombre varchar(100) not null,
descripcion varchar(500),
fecha_ingreso date not null, 
fecha_vencimiento date not null
) engine=InnoDB;

create table pastel_ingrediente (
id_pastel_ingrediente int auto_increment primary key,
id_pastel int not null,
id_ingrediente int not null,
cantidad decimal(10,2) not null,
unidad varchar(20) not null,

constraint fk_pi_pastel
foreign key (id_pastel) references pastel(id_pastel)
on delete cascade on update cascade,
constraint fk_pi_ingrediente
foreign key (id_ingrediente) references ingrediente(id_ingrediente)
on delete restrict on update cascade
) engine=InnoDB;


INSERT INTO ingrediente (nombre, descripcion, fecha_ingreso, fecha_vencimiento) values
('Harina', 'Harina de trigo refinada', '2026-6-01', '2026-12-01'),
('Azucar', 'Azucar blanca granulada', '2026-06-01', '2027-06-01'),
('Huevos', 'Huevos frescos de granja', '2026-06-02', '2026-06-25'),
('Mantequilla', 'Mantequilla sin sal', '2026-06-01', '2026-08-01'),
('Chocolate', 'Chocolate semi-amargo en barra', '2026-06-01', '2026-12-31');

Insert into pastel (nombre, descripcion, preparado_por, fecha_creacion, fecha_vencimiento) values
('Pastel de chocolate', 'Pastel humedo de chocolate con cobertura', 'Maria Lopez', '2026-06-03', '2026-06-10'),
('Pastel de vainilla', 'Pastel clasico de vainilla con relleno de crema', 'Juan Perez', '2026-06-03', '2026-06-10');

Insert into pastel_ingrediente (id_pastel, id_ingrediente, cantidad, unidad) values
(1, 1, 500.00, 'gramos'),
(1, 2, 300.00, 'gramos'),
(1, 3, 4.00, 'unidades'),
(1, 4, 250.00, 'gramos'),
(1, 5, 200.00, 'gramos'),
(2, 1, 400.00, 'gramos'),
(2, 2, 250.00, 'gramos'),
(2, 3, 3.00, 'unidades'),
(2, 4, 200.00, 'gramos');




































