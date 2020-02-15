<?php
/**** function connection to database  for mssql ****/
$objConnect = mssql_connect("203.154.162.41","sa","Adminchul@book1") or die("Error Connect to Database");
$objDB = mssql_select_db("Line_Project");
?>
