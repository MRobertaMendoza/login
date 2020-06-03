
<?php

//base de datos local, nuestra propia pc

$dbhost = "localhost";
//usuario en base de datos
$dbbuser = "root";
$dbpass = ""; // sin contraseña
$dbname = "tesoreria"; // nombre de la base de datos


// alojamos en la variable connn la coneccion a la base de datos
$conn = mysqli_connect( $dbhost, $dbbuser, $dbpass,$dbname );


// creamos una condicionante , por si np hay coneccion, que nos muestre donde esta el error
if(!$conn){


	die("No hay conexión  : ".mysql_connect_error());



}

// ahora creamos dos variables que obtendran los valores de los text box del html, uno para el usuario otro para el password

$nombre = $_POST["txtusuario"];// los nombres dados desde el html lo ubicamos entre las comillas del POST
$pass = $_POST["txtpassword"];


// continuamos con el query o consulta que haremos

 $query = mysqli_query($conn, "SELECT * FROM login WHERE usuario = '".$nombre."'  and password = '".$pass."'");
 // en este query seleccionara todo de la tabla login y buscara coincidencias entre el usuario
 // y password ingresados con la tabla del sql, una vez que encuentre la coincidencia nos dara como resultado una fila


// en esta variable almacenamos el numero de fila que sera 1

 $nr = mysqli_num_rows($query);


 // entonces si la fila es igual a 1 le dara la bienevenida o lo deja entrar a la pagina 

 if( $nr == 1){

     echo "Bienvenido!!".$nombre;
 	//header("Location : login.html");
 	 


 	 // en caso que devolvio cero no ingreso ninguna fila =0

}else  if($nr == 0){
// mostramos un pequeño mensaje o redireccionamos a la pagina de login
	echo "No ingreso, no existe";



}



?>
