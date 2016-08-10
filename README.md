Autores
=======

* Antonio
* Jose Luis
* Jose Bolivar

A Symfony project created on August 8, 2016, 10:25 am.


PRIMEROS PASOS PARA CREAR EL PROYECTO:


1.- DESCARGA/INSTALACION CARPETA ASSESTS E IMAGES

    1.1 Descargar la carpeta assests y carpeta images del proyecto anterior (semana5).
    1.2 Volver a nuestro nuevo proyecto (semana6) y copiar ambos ficheros en la carpeta web

    OJO!! Como estamos trabajando con windows, nuestros ficheros se descargaran con extensión .zip, por lo que a la hora de descomprimirlos, 
    utilizaremos UNZIP nombrearchivo

    1.3 En c9, cambiamos a nuestro directorio WEB, y descomprimimos ambos archivos, utilizando "unzip assests.zip" y "unzip images.zip"

    1.4 Una vez descomprimidos ambos ficheros .zip, podemos observar que dentro de WEB se nos han creados dos nuevas carpetas, con lo cual ya podemos borrar
    ambos ficheros con extensión .zip.
    
2.- SE NOS HA IDO OLVIDANDO PONER TODO LO QUE HEMOS HECHO PARA EL PROYECTO

3.- EN ESTE PASO HE INSTALADO FOSUserBundle

    He seguido el manual https://symfony.com/doc/master/bundles/FOSUserBundle/index.html
    Y he cambiado el contenido de algunos ficheros además de crear otros, que son los siguientes:
    
        
        composer.json
        composer.lock
        AppKernel
        config.yml
        security.yml
        routing.yml
        y src/AppBundle/Entity/Persona.php

4.- Creación de entidades Persona y Trayecto

    Se crean las dos entidades de la BBDD que usamos hasta el momento usando la sintáxis correcta.
    Una vez credas hay que generar los set y los get usando:
       $ php app/console generate:doctrine:entities AppBundle/Entity
    Comprobamos que se han creado correctamente todos los get y los set.