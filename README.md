# DeepKey
Aplicación web para almacenar contraseñas.

# Bases de Datos
El motor de bases de datos recomendado para el correcto funcionamiento de la aplicación es **MySQL** o **MariaDB**. Con los siguientes comandos se podrá crear la base de datos.

## Crear base de datos
> `CREATE DATABASE deepkey;`

## Seleccionar base de datos
> `USE deepkey;`

## Crear tabla de usuarios
> `CREATE TABLE Users(
    UserID INTEGER AUTO INCREMENT,
    FirstName VARCHAR(50) NOT NULL,
    LastName VARCHAR(50) NOT NULL,
    Email VARCHAR(100) NOT NULL,
    Password VARCHAR(50) NOT NULL,
    State BOOLEAN NOT NULL,
    PRIMARY KEY (UserID)
);`

## Crear tabla de llaves
> `CREATE TABLE DeepKeys (
    DeepKeyID INTEGER AUTO_INCREMENT PRIMARY KEY,
    UserID INTEGER NOT NULL,
    Name VARCHAR(50) NOT NULL,
    User VARCHAR(100) NOT NULL,
    Password VARCHAR(50) NOT NULL,
    Notes VARCHAR(150),
    FOREIGN KEY (UserID) REFERENCES Users(UserID)
);`

## Conexión a la base de datos
El archivo **`/models/Connection.txt`** contiene el código para realizar la conexión hacia las bases de datos. Es importante cambiar su extensión  a **`/models/Connection.php`** y modificar los siguientes datos en la linea 11:

1. IP del servidor de bases de datos.
2. Usuario para las bases de datos.
3. Contraseña del usuario.
