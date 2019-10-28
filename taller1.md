########################################################
oc whoami
oc login https://loadbalancer.1b84.example.opentlc.com -u user0X
oc new-project XXX-project1
oc new-app php~https://github.com/jmanuelcalvo/app.git --name=appX

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

Publicar app
oc get route
oc expose svc appX
oc get route

Ingresar al navegador con la ruta que se muestra
http://app1-jmanuel-project1.apps.1b84.example.opentlc.com

Luego ingresar a la pagina por la linea de comandos curl
curl http://app1-jmanuel-project1.apps.1b84.example.opentlc.com/hostname.php

y validar el nombre y la IP

Escalar el numero de pods

oc scale --replicas=3 dc app1

y validar que el comando curl ahora muestra los 3 IPs diferentes

Por ulitmo eliminar todo e intentar hacer lo mismo por la interfase Web

oc delete all --all
