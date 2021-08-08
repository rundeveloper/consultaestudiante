<?php 
//Definición de los parámetros de conexión. 
// La sintaxis del código fuente (Data Source Name o DSN) 
// es específica de cada controlador. 
$codigo = 'mysql:host=bjeinhljkvgjxtnufqej-mysql.services.clever-cloud.com;dbname=bjeinhljkvgjxtnufqej'; 
$usuario = 'uohtx3roycvhvief'; 
$contrasenia = 'SBCu4PUBWCZoEAwXkE9P'; 
// Definición de dos consultas de prueba. 
// Nótese que la consulta de inserción está configurada 
// (es, en realidad, la única característica emulada por PDO, 
// si no es soportada nativamente por la base de datos). 
$sql_select = 'SELECT * FROM estudiante'; 
// Todas las operaciones se efectúan en un bloque 'try' 
// para recuperar las excepciones identificadas por PDO. 
try { 
  // Conexión a la base de datos. 
  $db = new PDO($codigo, $usuario, $contrasenia); 
  // Modificación de los parámetros de conexión 
  // para solicitar que se identifiquen excepciones 
  // en caso de error. 
  $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION); 
  // Preparar una consulta. 
  // Para las bases de datos que soportan las transacciones, 
  // los métodos beginTransaction(), commit() y rollback() 
  // de los objetos PDO pueden utilizarse. 
  //$st->execute(); 
  // Preparar una consulta para la selección. 
  $st = $db->prepare($sql_select); 
  // Ejecutar la consulta. 
  $st->execute(); 
  // Recuperar el resultado. 
  // Pueden utilizarse varios métodos para recuperar 
  // el resultado: fetch(), fetchObject(), fetchAll(). 
  // El método fetch() dispone de un parámetro que permite 
  // especificar el tipo de resultado (tabla, objeto, etc.). 
  while ($fila = $st->fetch()) { 
    echo "$fila[1] - $fila[2] $fila[3]<br />\n"; 
  } 
  // Liberar los recursos. 
  $st = null; 
  $db = null; 
} catch (PDOException $e) { 
  // Gestionar las excepciones 
  echo 'Error!: ',$e->getMessage(),'<br />'; 
  die(); 
} 
?>