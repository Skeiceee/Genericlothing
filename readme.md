# Genericlothing
Este sistema fue creado como proyecto final de unviersidad, el sistema trata de gestionar cualquier tienda de ropa ya sea via online o con tiendas fisicas 

# Instalación en el servidor.

1. El servidor debera tener instalado previamente XAMPP y Composer
    * [XAMPP](https://www.apachefriends.org/es/index.html)
    * [Composer](https://getcomposer.org/)
2. Deberas crear una base de detos vacía, con el nombre de tu empresa o preferencía.
3. Crear un archivo llamado .env en la carpeta raiz del sistema.
4. Copiar el código de .env.example y copiarlo en el archivo .env 
5. Una vez hecho esto se configura la base de datos en el archivo .env:

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=NombreDeLaBaseDeDatos
DB_USERNAME='Usuario'
DB_PASSWORD='Contraseña'
```
6. Ejecutar el siguente comando en el archivo raiz de sistema:
![Alt Text](http://oi66.tinypic.com/inwg1w.jpg)

7. Ejecutar la migración de todo el modelo de la base de datos:
![Alt Text](http://oi68.tinypic.com/2rmkxo7.jpg)
