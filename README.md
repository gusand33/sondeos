# README del Proyecto

## Proyecto de Sondeos con Laravel Sail, Blade, Bootstrap, jQuery y API de Recursos de Libros

Este proyecto de ejemplo muestra cómo crear una aplicación web utilizando Laravel Sail para gestionar recursos de libros. El proyecto utiliza Blade para las vistas, Bootstrap para el diseño y jQuery para la interacción del cliente. También se incluye una API correspondiente para la gestión de libros.

## Stack Tecnológico

- **Laravel Sail**: Conjunto de herramientas para desarrollar aplicaciones Laravel con Docker.
- **Laravel**: Framework PHP que proporciona una estructura sólida para desarrollar aplicaciones web.
- **Blade**: Motor de plantillas de Laravel para la creación de vistas.
- **Bootstrap**: Framework CSS para el diseño responsive y componentes de interfaz de usuario.
- **jQuery**: Biblioteca JavaScript para la manipulación del DOM y la interacción del cliente.
- **MySQL**: Base de datos utilizada para almacenar información de libros.
- **Docker**: Contenedor utilizado para simplificar la configuración del entorno de desarrollo.

## Requerimientos del Sistema

Asegúrate de que tu sistema cumpla con los siguientes requisitos antes de iniciar el proyecto:

- [Docker](https://www.docker.com/get-started)
- [Docker Compose](https://docs.docker.com/compose/install/)

## Instrucciones para Iniciar el Proyecto Localmente

Sigue estos pasos para iniciar el proyecto en tu entorno local:

1. Clona este repositorio en tu máquina local:
    - git clone https://github.com/gusand33/sondeos.git

2. Accede al directorio del proyecto:
    - cd sondeos

3. Copia el archivo de configuración .env.example a .env:
    - cp .env.example .env

4. Edita el archivo .env y configura las variables de entorno para la base de datos, asegurándote de que los valores correspondan a tu entorno Docker.

5. Inicia el entorno de desarrollo con Laravel Sail:
    - ./vendor/bin/sail up -d

6. Ejecuta las migraciones para crear las tablas de la base de datos:
    - ./vendor/bin/sail artisan migrate
    - ./vendor/bin/sail php artisan db:seed

7. Ejecuta el comando para instalar las dependencias de PHP:
    - ./vendor/bin/sail composer install

8. Ejecuta el comando para instalar las dependencias de Node.js:
    - ./vendor/bin/sail npm install

9. Compila los recursos frontend: 
    - ./vendor/bin/sail npm run dev

10. Abre tu navegador web y accede a la siguiente URL para ver la aplicación:
    - http://localhost

11. Para acceder a la API de recursos de libros, consulta la documentación de la API o las rutas definidas en Laravel y realiza las solicitudes HTTP correspondientes.

## Instrucciones de Uso de las Rutas de API con Autenticación

Este proyecto utiliza Laravel Passport para autenticar las solicitudes a las rutas de API bajo el prefijo 'v1'. A continuación, se explican las rutas disponibles y cómo utilizarlas con autenticación Passport:

1. Realiza una solicitud POST a /oauth/token con las siguientes credenciales:

    ## Crea un cliente 
        - ./vendor/bin/sail php artisan passport:client
        
        . grant_type: password
        . client_id: El ID de cliente de Passport
        . client_secret: El secreto de cliente de Passport

La respuesta incluirá un token de acceso. Guárdalo y utilízalo para realizar solicitudes a las rutas protegidas.

2. Rutas de Recursos API
Una vez que tengas un token de acceso válido, puedes utilizarlo en las siguientes rutas de recursos de API:

## Listar Todos los Libros
Ruta: GET /v1/books
Descripción: Esta ruta devuelve una lista de todos los libros disponibles en la base de datos.
Uso: Realiza una solicitud GET a la URL /v1/books y agrega el token de acceso como encabezado de autorización (Bearer Token).

## Crear un Nuevo Libro
Ruta: POST /v1/books
Descripción: Utiliza esta ruta para agregar un nuevo libro a la base de datos.
Uso: Realiza una solicitud POST a la URL /v1/books con los datos del nuevo libro en el cuerpo de la solicitud y agrega el token de acceso como encabezado de autorización (Bearer Token).

## Mostrar los Detalles de un Libro
Ruta: GET /v1/books/{id}
Descripción: Recupera los detalles de un libro específico utilizando su identificador (ID).
Uso: Realiza una solicitud GET a la URL /v1/books/{id} para obtener los detalles del libro con el ID proporcionado y agrega el token de acceso como encabezado de autorización (Bearer Token).

## Actualizar un Libro
Ruta: PUT /v1/books/{id}
Descripción: Utiliza esta ruta para actualizar la información de un libro existente.
Uso: Realiza una solicitud PUT a la URL /v1/books/{id} con los datos actualizados en el cuerpo de la solicitud para modificar un libro específico y agrega el token de acceso como encabezado de autorización (Bearer Token).

## Eliminar un Libro
Ruta: DELETE /v1/books/{id}
Descripción: Esta ruta permite eliminar un libro de la base de datos utilizando su identificador (ID).
Uso: Realiza una solicitud DELETE a la URL /v1/books/{id} para eliminar el libro con el ID proporcionado y agrega el token de acceso como encabezado de autorización (Bearer Token).
