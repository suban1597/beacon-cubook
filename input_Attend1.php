<?php
$objConnect = mssql_connect("203.154.162.41","sa","Adminchul@book1") or die("Error Connect to Database");
$objDB = mssql_select_db("Line_Project");

$json = file_get_contents('php://input');
$request = json_decode($json, true);
$queryText = $request["queryResult"]["queryText"];
$query = "INSERT INTO Attend(Line_Id,Line_date,Line_Time,Machine_Id) VALUE ('1','1','1','1')";
$resource = mysql_query($query) or die ("error".mysql_error());
?>
