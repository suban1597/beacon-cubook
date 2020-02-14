<?php
	
date_default_timezone_set("Asia/Bangkok");

$month_arr=array(
    "1"=>"มกราคม",
    "2"=>"กุมภาพันธ์",
    "3"=>"มีนาคม",
    "4"=>"เมษายน",
    "5"=>"พฤษภาคม",
    "6"=>"มิถุนายน", 
    "7"=>"กรกฎาคม",
    "8"=>"สิงหาคม",
    "9"=>"กันยายน",
    "10"=>"ตุลาคม",
    "11"=>"พฤศจิกายน",
    "12"=>"ธันวาคม"                 
);

$new_date = date("d")." ".$month_arr[date("n")]." ".(date("Y")+543);
echo $new_date;
$new_time = date("H:i:s");
echo $new_time;
	
$objConnect = mssql_connect("203.154.162.41","sa","Adminchul@book1") or die("Error Connect to Database");
$objDB = mssql_select_db("Line_Project");
$strSQL = "INSERT INTO Attend ";
$strSQL .="("TIME","DATE") ";
$strSQL .="VALUES ";
$strSQL .="("$new_time,$new_date)";

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
