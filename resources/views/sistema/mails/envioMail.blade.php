<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0">
    <title>Creacion de usuario</title>
</head>
<body>
    <p>Buen día, por estemedio te informamos que tu usuario ha sido creado con éxito.</p>
    <p>Te compartimos tus datos de conexion.</p>
    <ul>
        <li>User: {{ $vdatos->usr }}</li>
        <li>Password: {{ $vdatos->pass }}</li>
    </ul>
</body>
</html>