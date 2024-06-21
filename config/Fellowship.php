<?php
require 'databaseconfig.php';

if ($conn === false) {
    die(print_r(sqlsrv_errors(), true));
}

$sql = "SELECT Fellowship + 1 From tblIDSetting";

$stmt = sqlsrv_query($conn, $sql);

if ($stmt === false) {
    die(print_r(sqlsrv_errors(), true));
}

while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_NUMERIC)) {
    $No = $row[0];
}

sqlsrv_free_stmt($stmt);

$Interest = $_POST["interest"];
$IDNumber = $_POST["IDNumber"];
$Prefix = $_POST["prefix"];
$FullName = $_POST["FullName"];
$Code = $_POST["Code"];
$PNumber = $_POST["PNumber"];
$Email = $_POST["Email"];
$Zip = $_POST["Zip"];
$City = $_POST["City"];
$State = $_POST["State"];
$Country = $_POST["Country"];
$University = $_POST["University"];
$Degree = $_POST["Degree"];
$Statement = $_POST["Statement"];
$Portfolio = $_POST["Portfolio"];
$Decleration = $_POST["Decleration"];

if ($Decleration == 1) {
    $Decleration = 'True';
} else {
    $Decleration = 'False';
}

$tsql_callSP = "{call sp_insertfellowship(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)}";

$params = array(
    array($No, SQLSRV_PARAM_IN),
    array($Interest, SQLSRV_PARAM_IN),
    array($IDNumber, SQLSRV_PARAM_IN),
    array($Prefix, SQLSRV_PARAM_IN),
    array($FullName, SQLSRV_PARAM_IN),
    array($Code, SQLSRV_PARAM_IN),
    array($PNumber, SQLSRV_PARAM_IN),
    array($Email, SQLSRV_PARAM_IN),
    array($Zip, SQLSRV_PARAM_IN),
    array($City, SQLSRV_PARAM_IN),
    array($State, SQLSRV_PARAM_IN),
    array($Country, SQLSRV_PARAM_IN),
    array($University, SQLSRV_PARAM_IN),
    array($Degree, SQLSRV_PARAM_IN),
    array($Statement, SQLSRV_PARAM_IN),
    array($Portfolio, SQLSRV_PARAM_IN),
    array($Decleration, SQLSRV_PARAM_IN)
);

/* Execute the query. */
$stmt= sqlsrv_query($conn, $tsql_callSP, $params);
if ($stmt === false) {
    echo "Error in executing statement 3.\n";
    die(print_r(sqlsrv_errors(), true));
}

/* Free the statement and connection resources. */
sqlsrv_free_stmt($stmt);
sqlsrv_close($conn);

if (isset($_FILES['Document']['name'])) {
    $pdfFilePath = 'FellowshipApplication/'.$No . '.pdf';

    if (file_exists($pdfFilePath)) {
        unlink($pdfFilePath);
    }

    if (is_array($_FILES)) {
        $pdfFile = $_FILES['Document']['tmp_name'];

        if (file_exists($pdfFile)) {
            move_uploaded_file($pdfFile, $pdfFilePath);
        } else {
            echo "Error: PDF file not found.";
        }
    }
}

echo "<script>
document.location='../index.php'
alert('Your Details Successfully Recorded !!');
</script>";
?>
