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




1. Cree un archivo llamado data01.yml
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
