<html>
<head>
<title>Insert DB</title>
</head>
<body>
<?php
	
$new_date = date("d")." ".$month_arr[date("n")]." ".(date("Y")+543);
echo $new_date;
$new_time = date("H:i:s");
echo $new_time;
	
$objConnect = mssql_connect("203.154.162.41","sa","Adminchul@book1") or die("Error Connect to Database");
$objDB = mssql_select_db("Line_Project");
$strSQL = "INSERT INTO Attend ";
$strSQL .="("TIME","DATE") ";
$strSQL .="VALUES ";
$strSQL .="("$new_time","$new_date")";

$objQuery = mssql_query($strSQL);
if($objQuery)
{
	echo "Save Done.";
}
else
{
	echo "Error Save [".$strSQL."]";
}
mssql_close($objConnect);
?>
</body>
</html>
