# Talleres
[Inicio](../ComandosOpenShift.md)

### NOTA:
Antes de iniciar a trabajar con Ansible, garantice que las maquinas con las que se va a conectar tengan realcion de confianza por ssh.

# Trabajando con Ansible

Creacion de archivos de inventario agrupando servidores en masters, infra, apps, nfs

```
[user01@bastion ~]$ cat << EOF > hosts
[masters]
master1.1b84.internal
master2.1b84.internal
master3.1b84.internal
[infra]
infranode1.1b84.internal
infranode2.1b84.internal
[apps]
node1.1b84.internal
node2.1b84.internal
node3.1b84.internal
[nfs]
support1.1b84.internal
[loadbalancer]
loadbalancer.1b84.internal
EOF
```

## Extructura comando ansible

| Encabezado 1 | Encabezado 2 | Encabezado 3 |
| --------- | --------- | --------- |
| renglón 1, columna 1 | renglón 1, columna 2 | renglón 1, columna 3|



| commando  |  grupo de servidores | -i archivo hosts | accion |
| --------- | --------- | --------- | --------- |

[user01@bastion ~]$ ansible all -i hosts  --list-hosts
  hosts (10):
    infranode1.1b84.internal
    infranode2.1b84.internal
    support1.1b84.internal
    node1.1b84.internal
    node2.1b84.internal
    node3.1b84.internal
    loadbalancer.1b84.internal
    master1.1b84.internal
    master2.1b84.internal
    master3.1b84.internal

Una vez creado el archivo, podemos realizar las verificacion de estos grupos
