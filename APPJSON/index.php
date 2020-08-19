<?php 

//en la variable url se lee la variable
 $url="https://byrontosh.github.io/SOAJSON/personal.json";

 //variable para leer el archivo
 $miVar=file_get_contents($url);
 //echo $miVar;
 //Variable para decodificar el json y para ser leido por php

 $decodjson=json_decode($miVar);

 echo "Informacion JSON desde la url";
 echo "<br>";

 foreach ($decodjson as $p) 
 {
 	echo "NOMBRE: ".$nombre = $p->nombre;
 	echo "<br>";
 	echo "DEPARTAMENTO: ".$departamento = $p->depto;
 	echo "<br>";
 	echo "CARGO: ".$cargo = $p->cargo;
 	echo "<br>";
 	echo "EMAIL: ".$email = $p->email;
 	echo "<br>";
 	echo "GENERO: ".$genero = $p->genero;
 	echo "<br>";
 	echo "TELEFONO: ".$telefono = $p->telefono;
 	echo "<br>";

 	echo "DIRECCIONES: ";
 	echo "<br>";

 	$cont="";
 	foreach ($p->direccion as $d) 
 	{
 		echo $d."--- ";
 		$cont=$cont." ".$d;
 	}

 		$con = mysqli_connect("mysql-mauryrodriguez.alwaysdata.net", "212099", "maurylife2010") or die("Sin conexion");
 		mysqli_set_charset($con, "utf8");
 		mysqli_select_db($con, "mauryrodriguez_empresanueva");
 		$consulta = "INSERT INTO personal (nombre, departamento, cargo, email, genero, direccion,telefono) VALUES ('$nombre','$departamento','$cargo','$email','$genero','$cont','$telefono')";
 		$resultado = mysqli_query($con, $consulta);
 		echo"<br>";

 }

if ($resultado == true) {
	echo "<br>";
	echo "Datos Guardados";

}
else
{
	echo "<br>";
	echo "Error";
}



echo "<br>";
echo "<br>";

echo "Datos desde la base MYSQL";

$sql = "select *from personal";
$rs = mysqli_query($con, $sql);

while ($row1 = mysqli_fetch_object($rs) ){
	$datos[] = $row1;
}

foreach ($datos as $dat) {
	echo "<br>";
	echo "$dat->nombre";
	echo "<br>";
}

mysqli_close($con);



 ?>

