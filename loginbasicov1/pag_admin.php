<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
     <title>PaginaAdmin</title>
     <link rel="stylesheet" href="diseño.css">	
</head>
<table>
<th colspan="2">Bienvenido admin</th><th><a href="index.html">Regresar</a></th>
<tr><th colspan="3"><h1>Listado de usuarios</h1></th></tr>
<tr>
<th>Usuario</th>
<th>Contraseña</th>
<th>Rol</th>

</tr>

<?php

 include('conexion.php');

$sql="select * from login";
$resultado=mysqli_query($conn,$sql);

while($mostrar=mysqli_fetch_array($resultado))

{
?>

<tr>
	<td><?php echo $mostrar['usuario'] ?></td>
	<td><?php echo $mostrar['pass'] ?></td>
	<td><?php echo $mostrar['rol'] ?></td>
</tr>

<?php
}
?>

</table>

</body>
</html>