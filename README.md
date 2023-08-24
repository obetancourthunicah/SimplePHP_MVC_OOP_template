# Simple PHP MVC Orientado a Objetos

Simple PHP MVC OOP es un framework básico y sencillo de MVC diseñado para PHP 7.4 y versiones posteriores. Fue desarrollado a lo largo de varios períodos académicos en el contexto de la asignatura de Desarrollo de Negocios Web. El propósito de este framework es proporcionar una base para la creación de aplicaciones web en PHP, haciendo uso del patrón de diseño Modelo-Vista-Controlador (MVC) y la programación orientada a objetos (OOP). Esto brinda la oportunidad a los estudiantes de comprender cada uno de los componentes del MVC y cómo interactúan entre sí. El diseño se encuentra en un nivel de abstracción muy elemental, lo que permite adquirir los fundamentos y comprender cómo operan los componentes de un MVC, facilitando su comprensión y aplicabilidad en otros frameworks MVC.

## Instalación

1. Ejecutar el comando `composer install` para instalar las dependencias.
  - Nota: Si no tiene instalado composer en su computadora puede descargarlo desde el sitio web oficial [Composer](https://getcomposer.org/download/).
2. Copiar y renombrar el archivo `renameTo_parameters.env` a `parameters.env` y configurar las variables de entorno.
3. En el archivo `parameters.env` modificar la línea `BASE_DIR = ` por la ruta relativa de la carpeta de su proyecto en el servidor web.
    - Ejemplo en WAMP:
        - `BASE_DIR = SimplePHP_MVC_OOP` si la ruta a la carpeta e su proyecto es `C:\wamp64\www\SimplePHP_MVC_OOP`
    - Ejemplo en XAMPP:
        - `BASE_DIR = mvc` si la ruta a la carpeta e su proyecto es `C:\xampp\htdocs\mvc`
        - `BASE_DIR = nw/mvc` si la ruta a la carpeta e su proyecto es `C:\xampp\htdocs\nv\mvc`
    - Ejemplo en MAMP
        - `BASE_DIR = mvc` si la ruta a la carpeta e su proyecto es `\Applications\MAMP\htdocs\mvc`
    - Ejemplo en LAMP
        - `BASE_DIR = mvc` si la ruta a la carpeta e su proyecto es `/var/www/html/mvc`
4. Correr en el Browser la ruta `http://localhost/{BASE_DIR}/index.php` donde `{BASE_DIR}` es el nombre de la carpeta de su proyecto. Nota si su web server corre en otro puerto recuerde agregar el puerto en la ruta. Ejemplo: `http://localhost:8080/{BASE_DIR}/index.php`

## Estructura de directorios

La estructura de directorios del framework es la siguiente:

```
SimplePHP_MVC_OOP
├── src
│   ├── Controllers                         Carpeta que contiene los controladores de la aplicación.
|   |   ├── IController.php                 Interfaz que deben implementar todos los controladores.
|   |   ├── PrivateController.php           Controlador base para las vistas privadas.
|   |   ├── PublicController.php            Controlador base para las vistas públicas.
|   |   ├── PrivateNoAuthException.php      Excepción para vistas privadas sin autorización.
|   |   └── PrivateNoLoggedException.php    Excepción para vistas privadas sin sesión iniciada.
|   ├── Dao                                 Carpeta que contiene los DAOs (Modelos) de la aplicación.
|   |   ├── Dao.php                         Conexion a la base de datos.
|   |   └── Table.php                       Clase base para los DAOs.
|   ├── Utilities                           Clases de utilidad.
|   └── Views
|   |   ├── templates                       Carpeta que contiene las plantillas de las vistas.
|   |   └── Renderer.php                    Clase para renderizar las vistas.
├── public                                  Carpeta pública del proyecto para recursos estáticos.
│   ├── css                                 Carpeta para hojas de estilo.  
│   ├── imgs                                Carpeta para imágenes.
│   └── css_src                             Carpeta para hojas de estilo fuente con LESS.
├── vendor                                  Carpeta para dependencias de composer.
├── .gitignore                              Archivo para ignorar archivos y carpetas en git.
├── composer.json                           Archivo de configuración de composer.
├── index.php                               Archivo de entrada de la aplicación.
├── parameters.env                          Archivo de configuración de variables de entorno.
└── README.md                               Archivo de documentación.
```
