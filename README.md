# Test Decameron

Este es la guia para desplegar de manera correcta el proyecto de Decameron


## Authors

- [@carlosbernal03]


## Documentation

[Documentation](https://laravel.com/docs/6.x)


## Deployment

Para iniciar el proyecto deben descargarlo de github con el siguiente comando

```bash
  git clone https://github.com/carlosbernal93/back-decameron
```
Luego de descargarlo se debe ejecutar el composer de la siguiente manera

```bash
  composer install
```

Después de que haya completado la instalación se deberá modificar el archivo .env para el uso de la base de datos, con su respectivo usuario y contraseña que utilicen en su ambiente de base de datos.
Luego se ejecuta el siguiente comando para activar el cors para el uso de API de laravel

```bash
php artisan vendor:publish --tag="cors"
```

El dump de la base de datos se encuentra en el correo enviado, pero en caso de que se requiera la BD desde 0 este proyecto cuenta con migraciones y seeders que facilitaran la creación de las tablas.
para usar estas migraciones se debe utilizar el comando.

```bash
  php artisan migrate
```
y luego ejecutar los seeder con los siguientes comandos
```bash
  php artisan db:seed --class=CiudadesSeeder
  php artisan db:seed --class=TiposSeeder
```
