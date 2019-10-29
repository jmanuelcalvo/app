# Taller No 1.

Tenga en cuenta que para los ejercicios, debe cambiar el nombre del usuario user0X por el que le fue asignado

# Ejecute los siguientes comandos:
```
[user01@bastion ~]$ oc whoami
user01
[user01@bastion ~]$  oc login https://loadbalancer.1b84.example.opentlc.com -u user0X

[user01@bastion ~]$ oc new-project project01
Now using project "project01" on server "https://loadbalancer.1b84.internal:443".

You can add applications to this project with the 'new-app' command. For example, try:

    oc new-app centos/ruby-25-centos7~https://github.com/sclorg/ruby-ex.git

to build a new example application in Ruby.

[user01@bastion ~]$ oc new-app php~https://github.com/jmanuelcalvo/app.git --name=app01
--> Found image ab2fbc4 (13 days old) in image stream "openshift/php" under tag "7.1" for "php"

    Apache 2.4 with PHP 7.1
    -----------------------
    PHP 7.1 available as container is a base platform for building and running various PHP 7.1 applications and frameworks. PHP is an HTML-embedded scripting language. PHP attempts to make it easy for developers to write dynamically generated web pages. PHP also offers built-in database integration for several commercial and non-commercial database management systems, so writing a database-enabled webpage with PHP is fairly simple. The most common use of PHP coding is probably as a replacement for CGI scripts.

    Tags: builder, php, php71, rh-php71

    * A source build using source code from https://github.com/jmanuelcalvo/app.git will be created
      * The resulting image will be pushed to image stream tag "app01:latest"
      * Use 'start-build' to trigger a new build
    * This image will be deployed in deployment config "app01"
    * Ports 8080/tcp, 8443/tcp will be load balanced by service "app01"
      * Other containers can access this service through the hostname "app01"

--> Creating resources ...
    imagestream.image.openshift.io "app01" created
    buildconfig.build.openshift.io "app01" created
    deploymentconfig.apps.openshift.io "app01" created
    service "app01" created
--> Success
    Build scheduled, use 'oc logs -f bc/app01' to track its progress.
    Application is not exposed. You can expose services to the outside world by executing one or more of the commands below:
     'oc expose svc/app01'
    Run 'oc status' to view your app.


oc get pod
oc get service
oc get all
oc get route
oc get dc
oc get bc

oc describe pod
oc describe service
oc describe route
oc describe dc
oc describe bc
```

# Publicar app
```
oc get route
oc expose svc appX
oc get route
```

Ingresar al navegador con la ruta que se muestra
http://app1-jmanuel-project1.apps.1b84.example.opentlc.com

Luego ingresar a la pagina por la linea de comandos curl
```
curl http://app1-jmanuel-project1.apps.1b84.example.opentlc.com/hostname.php
```
y validar el nombre y la IP

Escalar el numero de pods
```
oc scale --replicas=3 dc app1
```
y validar que el comando curl ahora muestra los 3 IPs diferentes

Por ulitmo eliminar todo e intentar hacer lo mismo por la interfase Web
```
oc delete all --all
```
