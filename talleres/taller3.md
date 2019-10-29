# Talleres
[Inicio](../ComandosOpenShift.md)


# Taller No 3.
Despliegue de aplicaciones mas complejas donde se cuenta con una BD y un servidor de aplicaciones

# Recuerde todos los pasos de los ejercicios anteriores para persistir los datos

1. Cree un nuevo proyecto 
```
[user01@bastion ~]$ oc new-project wordpress
Now using project "wordpress" on server "https://192.168.64.2:8443".

You can add applications to this project with the 'new-app' command. For example, try:

    oc new-app centos/ruby-25-centos7~https://github.com/sclorg/ruby-ex.git

to build a new example application in Ruby.
````

Joses-MacBook-Pro:~ jmanuel$ oc new-app mysql --name=mysql -e MYSQL_USER=wpuser -e MYSQL_PASSWORD=mypa55 -e MYSQL_ROOT_PASSWORD=r00tpa55 -e MYSQL_DATABASE=wordpress
--> Found image f171d28 (10 months old) in image stream "openshift/mysql" under tag "5.7" for "mysql"

    MySQL 5.7
    ---------
    MySQL is a multi-user, multi-threaded SQL database server. The container image provides a containerized packaging of the MySQL mysqld daemon and client application. The mysqld server daemon accepts connections from clients and provides access to content from MySQL databases on behalf of the clients.

    Tags: database, mysql, mysql57, rh-mysql57

    * This image will be deployed in deployment config "mysql"
    * Port 3306/tcp will be load balanced by service "mysql"
      * Other containers can access this service through the hostname "mysql"

--> Creating resources ...
    imagestreamtag.image.openshift.io "mysql:5.7" created
    deploymentconfig.apps.openshift.io "mysql" created
    service "mysql" created
--> Success
    Application is not exposed. You can expose services to the outside world by executing one or more of the commands below:
     'oc expose svc/mysql'
    Run 'oc status' to view your app.
