

<?php

$serverName = "AMILAA-MADHUSHA\SQLSERVER17";
$Database = "web_urbanupglezz";
$UID = "";
$PWD = "";

$connectionInfo = array("Database" => $Database, "UID" => $UID, "PWD" => $PWD);
$conn = sqlsrv_connect($serverName, $connectionInfo);
if ($conn === false) {
    die(print_r(sqlsrv_errors(), true));
}
// else {
//     echo'Connection established';
    
// }
?>
