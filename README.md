# AMBC en CodeIgniter 4

## ¿Que contiene?

- Consultas: Listado y Detalles de Usuarios.
- Altas: Creacion de Usuarios.
- Modificacion: Edicion de Usuarios existentes.
- Baja: Borrado de Usuarios existentes.

## Instalacion

Es una aplicacion creada con `composer`. Para su instalacion se debera utilizarlo.
- Clonar desde el repositorio `git clone https://github.com/evagil/AMBC.git`.
- Ejecutar el comando `composer install` para instalar las dependecias que se usaron.
- Ahora ya se puede ejecutar el comando `php spark serve` para levantarlo localmente.

## Requerimientos

PHP version 7.3 o mayor, con las siguientes extenciones activadas:

- [intl](http://php.net/manual/en/intl.requirements.php)
- [libcurl](http://php.net/manual/en/curl.requirements.php) if you plan to use the HTTP\CURLRequest library
- json (habilitada por default - no la desactives)
- [mbstring](http://php.net/manual/en/mbstring.installation.php)
- [mysqlnd](http://php.net/manual/en/mysqlnd.install.php)
- xml (habilitada por default - no la desactives)