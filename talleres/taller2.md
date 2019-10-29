# Talleres
[Inicio](../ComandosOpenShift.md)


# Taller No 2.
Datos persistentes para las aplicaciones

# A traves de Volumenes persistentes:
Los PVC pueden ser de 3 tipos:


| MODO   |      ABREVIATURA      |  DESCRIPCION |
|----------|:-------------:|------:|
| ReadWriteOnce |  RWO | The volume can be mounted as read-write by a single node. |
| ReadOnlyMany |    ROX   |   The volume can be mounted read-only by many nodes. |
| ReadWriteMany | RWX |    The volume can be mounted as read-write by many nodes. |




1. Cree un archivo llamado data01.yml y defina el tipo de almacenamiento 
```
[user01@bastion ~]$ cat << EOF > data01.yml
apiVersion: v1
kind: PersistentVolumeClaim
metadata:
  name: data01
spec:
  accessModes:
  - ReadWriteOnce
  resources:
    requests:
      storage: 5Gi
EOF

```
Verifique el archivo creado
```
[user01@bastion ~]$ cat data01.yml
...
...
```
2. Verifique los Persistent Volume Claim (PVC) creados previamente
```
[user01@bastion ~]$ oc get pvc
NAME      STATUS    VOLUME    CAPACITY   ACCESS MODES   STORAGECLASS   AGE
```
3. Cree el nuevo PVC y verifiquelo
```
[user01@bastion ~]$ oc create -f data01.yml
persistentvolumeclaim/data01 created

[user01@bastion ~]$ oc get pvc
NAME      STATUS    VOLUME    CAPACITY   ACCESS MODES   STORAGECLASS   AGE
data01    Bound     pv7       5Gi        RWO                           2s
```

4. Montar el nuevo PVC sobre un contenedor existente
```
[user01@bastion ~]$ oc set volume dc/app2 --add --type=persistentVolumeClaim --claim-name=data01 --mount-path=/data2
```

5. Verificar que el nuevo pod tenga la carpeta montada
```diff
[user01@bastion ~]$ oc get pod
NAME           READY     STATUS      RESTARTS   AGE
app2-1-build   0/1       Completed   0          4h
app2-7-pm5vk   1/1       Running     0          2m

[user01@bastion ~]$ oc rsh  app2-7-pm5vk
sh-4.2$ df -h
Filesystem                                      Size  Used Avail Use% Mounted on
overlay                                          50G  7.5G   43G  15% /
tmpfs                                           3.9G     0  3.9G   0% /dev
tmpfs                                           3.9G     0  3.9G   0% /sys/fs/cgroup
- support1.1b84.internal:/srv/nfs/user-vols/pv7   197G  4.6G  183G   3% /data2
/dev/xvda2                                       50G  7.5G   43G  15% /etc/hosts
shm                                              64M     0   64M   0% /dev/shm
tmpfs                                           3.9G   16K  3.9G   1% /run/secrets/kubernetes.io/serviceaccount
tmpfs                                           3.9G     0  3.9G   0% /proc/acpi
tmpfs                                           3.9G     0  3.9G   0% /proc/scsi
tmpfs                                           3.9G     0  3.9G   0% /sys/firmware
```
