CREATE DATABASE tienda_master;
USE tienda_master;

/*tabla usuario*/
CREATE TABLE usuarios(
    id         int(200) auto_increment not null,
    nombre     varchar(30) not null,
    apellidos  varchar(30),
    email      varchar(30) not null,
    pass       varchar(30) not null,
    rol        varchar(30),
    imagen     varchar(255),

    CONSTRAINT pk_usuario PRIMARY KEY (id),
    CONSTRAINT uq_email UNIQUE(email)
)ENGINE=InnoDb;

INSERT INTO usuarios VALUES(NULL,'admin','admin','admin@admin.com','1234','admin',NULL);



/*tabla categoria*/
CREATE TABLE categoria(
    id         int(200) auto_increment not null,
    nombre     varchar(60) not null,
    CONSTRAINT pk_categoria PRIMARY KEY (id),
    CONSTRAINT uq_nombre UNIQUE(nombre)
)ENGINE=InnoDb;

INSERT INTO categoria VALUES(NULL,'Mana corta');
INSERT INTO categoria VALUES(NULL,'Mana larga');
INSERT INTO categoria VALUES(NULL,'Sudaderas');



/*tabla productos*/
CREATE TABLE productos(
    id               int(200) auto_increment not null,
    categoria_id     int(200) not null,
    nombre           varchar(30) not null,
    descripcion      text,
    precio           varchar(30) not null,
    stock            int(200) not null,
    oferta           varchar(2 ),
    fecha            date not null,
    imagen           varchar(255),

    CONSTRAINT pk_productos PRIMARY KEY (id),
    CONSTRAINT fk_Productos_categorias FOREIGN KEY(categoria_id) REFERENCES categoria(id)
)ENGINE=InnoDb;



/*tabla pedidos*/
CREATE TABLE pedidos(
    id               int(200) auto_increment not null,
    usuario_id       int(200) not null,
    provincia        varchar(30) not null,
    localidad        varchar(30) not null,
    direccion        varchar(30) not null,
    coste            int(200) not null,
    estado           varchar(20) not null,
    fecha            date not null,
    hora             time,

    CONSTRAINT pk_pedidos PRIMARY KEY (id),
    CONSTRAINT fk_pedidos_usuario FOREIGN KEY(usuario_id) REFERENCES usuarios(id)
)ENGINE=InnoDb;



/*tabla lineas_pedidos*/
CREATE TABLE lineas_pedidos(
    id            int(200) auto_increment not null,
    pedidos_id    int(200) not null,
    productos_id  int(200) not null,
    unidades      int(60) not null,
    CONSTRAINT pk_pedidos PRIMARY KEY (id),
    CONSTRAINT fk_categoria_pedidos FOREIGN KEY(pedidos_id) REFERENCES pedidos(id),
    CONSTRAINT fk_categoria_productos FOREIGN KEY(productos_id) REFERENCES productos(id)
)ENGINE=InnoDb;