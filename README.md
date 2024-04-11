# FizzBuzz
## Instalación y puesta en marcha
Dentro de la carpeta docker, donde están los archivos necesarios para la creación de los contenedores de la aplicación. Para ello, se debe ejecutar el siguiente comando:

```bash
/usr/bin/docker compose -f docker/docker-compose.yml -p docker up -d
```
será necesario modificar la ruta de docker si no se encuentra en /usr/bin/docker.

Esto instalará un servidor http Nginx, una base de datos Postgresql y un servidor de aplicaciones PHP-FPM.
## Instalación Symfony
Pasos para instalar Symfony:

Dentro de la raíz del proyecto, copiamos el fichero .env.example a .env
```bash
cp docker/.env.example .env
```
En principio no es necesario modificar el fichero .env, pero si se desea cambiar la configuración de la base de datos, se puede hacer en este fichero.
La configuración por defecto es la siguiente:
```bash
DATABASE_URL="postgresql://postgres:password@db-fizzbuzz:5432/dbtest?serverVersion=16&charset=utf8"
```
Estos datos están definidos en el fichero docker/docker-compose.yml

Accedemos al contenedor de php-fpm
```bash
docker exec -it php-fpm-fizzbuzz sh
```
e instalamos las dependencias de Symfony 7
```bash
composer install
```

## Pasos para puesta en marcha
Lo primero que debemos hacer es crear la base de datos y cargar los datos de prueba.
Para ello, ejecutamos los siguientes comandos:
```bash
bin/console doctrine:schema:update --force
```
Una vez hecho esto, ya podemos acceder a la aplicación. Para ello, debemos acceder a la siguiente URL:
```bash
http://localhost/
```