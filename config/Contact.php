<?php
require 'databaseconfig.php';

if ($conn === false) {
    die(print_r(sqlsrv_errors(), true));
}

$sql = "SELECT ContactMessageId + 1 From tblIDSetting";

$stmt = sqlsrv_query($conn, $sql);

if ($stmt === false) {
    die(print_r(sqlsrv_errors(), true));
}

while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_NUMERIC)) {
    $No = $row[0];
}

sqlsrv_free_stmt($stmt);

$ClientName = $_POST["CName"];
$Clientmail = $_POST["email"];
$clientMessage = $_POST["newmessage"];



$tsql_callSP = "{call sp_insertcontact(?,?,?,?)}";

$params = array(
    array($No, SQLSRV_PARAM_IN),
    array($ClientName, SQLSRV_PARAM_IN),
    array($Clientmail, SQLSRV_PARAM_IN),
    array($clientMessage, SQLSRV_PARAM_IN)
    
);

/* Execute the query. */
$stmt = sqlsrv_query($conn, $tsql_callSP, $params);
if ($stmt === false) {
    echo "Error in executing statement 3.\n";
    die(print_r(sqlsrv_errors(), true));
}

/* Free the statement and connection resources. */
sqlsrv_free_stmt($stmt);
sqlsrv_close($conn);



echo "<script>
alert('Thanks for contacting us, Urbanup Glezz will connect with you soon !!');
document.location='../index.php'
</script>";
?>
