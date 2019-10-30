# Talleres
[Inicio](../ComandosOpenShift.md)

# Backup OpenShift

## Backup de Proyectos
Existe un procedimiento que se puede utilizar para realizar copias de seguridad de proyectos. El comando de exportación oc se utiliza para hacer una copia de seguridad de los objetos a nivel de proyecto. Ejecute el comando para cada objeto que se guardará. Por ejemplo, para hacer una copia de seguridad del archivo de configuración de implementación front-end llamado frontend como dc-frontend en formato YAML, ejecute el siguiente comando:

```
[user@master ~]$ oc export dc frontend -o yaml > dc-frontend.yaml
```
Backup de un proyecto entero
```
[user@master ~]$ oc export all -o yaml > project.yaml
```
## Application Data Backup
Use el comando oc rsync para hacer una copia de seguridad de los datos de la aplicación cuando rsync está instalado dentro de un contenedor. También puede usar soluciones de almacenamiento como Cinder, Gluster y NFS.

## Project Restore
Para restaurar un proyecto, debe volver a crear todo el proyecto y todos los objetos que se exportaron durante el procedimiento de copia de seguridad. Use el comando oc create para restaurar los objetos que se guardaron.
