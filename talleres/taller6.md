# Talleres
[Inicio](../ComandosOpenShift.md)

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

