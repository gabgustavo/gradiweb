<p align="center">
<img src="https://res.cloudinary.com/dtfbvvkyp/image/upload/v1566331377/laravel-logolockup-cmyk-red.svg" width="400">
</p>

### Crear token
```
http://localhost/gradiweb/public/api/cli-get-token
en body > raw 
{
    "usuario": "xxx",
    "contrasena": "xxx"
}
Header: Content-Type: application/json
```

### consultar los vehiculos por marcas
```
http://localhost/gradiweb/public/api/vehiculos

{
    "token": "xxx"
}
Header: Content-Type: application/json
```

### Consultar los tipos de documentos
```
http://localhost/gradiweb/public/api/tipos-documento
{
    "token": "xxx"
}
Header: Content-Type: application/json
```

### Consultar los clientes por documento
```
http://localhost/gradiweb/public/api/cliente/No-documento
{
    "token": "xxx"
}
Header: Content-Type: application/json
```

### Crear clientes y vehiculos
```
http://localhost/gradiweb/public/api/crear-cliente
{
  "token": "lTyo7mDJvLaFIkBm5jPiGYrqKmMXjVRF8vMP8E1ceKBQ9hp7svxdJgRJqDAI",
  "cliente": {
            "nombre": "Luis Ávila",
            "documento": 652135478,
            "tipo_documento": "C.C"//cod del tipo de documento tambien
            "telefono":""//opcional
            "email":""//opcional
        },"vehiculo": [
            {
                "placa": "LKJ123",
                "tipo": "1 ", //consultar tipos y marcas y colocar el cod
                "marca": "1"
            }
        ]
}
Header: Content-Type: application/json
```