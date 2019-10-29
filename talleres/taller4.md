# Talleres
[Inicio](../ComandosOpenShift.md)


# Taller No 4.
Inicio de trabajo con contenedores


# Comandos básicos

1. Buscar contenedores disponibles
```
[root@jmanuelcalvo ~]# docker search centos
```
En la columna OFICIAL, OK indica una imagen creada y apoyada por la empresa detrás del proyecto.

2. Descargar el contenedor a su equipo local
[root@jmanuelcalvo ~]# docker pull centos

3. Visualizar las imágenes descargadas
[root@jmanuelcalvo ~]# docker images

4. Ejecutar un contenedor en modo interactivo 
[root@jmanuelcalvo ~]# docker run -it centos
 -i, --interactive, -t, --tty

Dentro del contenedor se pueden instalar aplicaciones tal como si se estuviera dentro de un S.O
[root@59839a1b7de2 /]# yum -y install httpd
[root@59839a1b7de2 /]# vim /var/www/html/index.html
<h1>Apache en un contenedor</h1>

Importante: Observe el container ID en el prompt del sistema. En el ejemplo anterior, es 59839a1b7de2.

Una vez listo el contenedor con el software instalado y personalizado es necesario salvar los cambios
[root@jmanuelcalvo ~]# docker commit -m "instalacion de apache" -a "Autor Jose Manuel" 59839a1b7de2 carpeta/centos-httpd

Publicar un servicio en Docker
[root@jmanuelcalvo ~]# docker run -i -p 80:80 -t carpeta/centos-httpd /bin/bash
[root@1c827c63f2c5 /]# /usr/sbin/httpd 

IMPORTANTE: si quiere que el servicio de apache se ejecute automaticamente al lanzar el contenedor, se debe crear un script de inicializacion de servicio para usarlo al momento de llamar el contenedor (ejemplo iniciarservicios.sh) donde el script contenga la sentencia de comandos de inicio en formato shell
[root@jmanuelcalvo ~]# docker run -i -p 80:80 -t carpeta/centos-httpd /root/iniciarservicios.sh


Salvar y restaurar una imagen de contenedor en caso que desee guardarla o llevarla a otra maquina que soporte contenedores 
Exportar
[root@jmanuelcalvo ~]# docker save carpeta/centos-httpd -o centos-http.tgz 

Importar
[root@otroserver ~]# docker load --input centos-http.tgz


Listar los contenedores que se ejecutaron para concer su ID o los que se encuentran en ejecucion
[root@jmanuelcalvo ~]# docker ps
[root@jmanuelcalvo ~]# docker ps -a 

Borrar las imágenes descargadas 
[root@jmanuelcalvo ~]# docker rmi 02acb16f957d
