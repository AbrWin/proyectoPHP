<?php

$db_host = 'localhost:3306';
$db_user = 'root';
$db_pass = 'root';
$db_name = 'registro';
$db_table_name = 'tbl_usuarios';
$db_conecction = mysql_connect($db_host, $db_user, $db_pass);

if (!$db_conecction) {
    die('no se ha podido conectar a la base de datos');
}
echo 'Connected successfully<br>';



$subs_user = utf8_decode($_POST['inputUser']);
$subs_email = utf8_decode($_POST['inputEmail']);
$subs_pass = utf8_decode($_POST['inputPassword']);
$subs_genero = utf8_decode($_POST['inputGenre']);

mysql_select_db('registro') or die('No se pudo seleccionar la base de datos');
$query = mysql_query("SELECT * FROM tbl_usuarios WHERE Email = '" . $subs_email . "'")or die('Consulta fallida: ' . mysql_error());
$line = mysql_fetch_array($query, MYSQL_ASSOC);
$resultado = count($line);
$fijo = 5;
echo 'count ' . $resultado;

if (count($line) == 5) {
    header('Location : fail.html');
} else {
    $insert_value = 'INSERT INTO `'
            . $db_name . '`.`' . $db_table_name .
            '` (`usuario` , `email` , `contrasena` , `genero`) VALUES ("' . $subs_user .
            '", "' . $subs_email . '", " ' . sha1($subs_pass) . '", "' . $subs_genero . '")';

    mysql_select_db($db_name, $db_conecction);

    $retry_value = mysql_query($insert_value);

    if (!$retry_value) {
        die('Error: ' . mysql_error());
    }

    header('Location: Success.html');
}

mysql_close($db_conecction);
?>