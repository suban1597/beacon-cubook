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

//$new_date = date("d")." ".$month_arr[date("n")]." ".(date("Y")+543);
//$new_date = date("d")."/".date("m")."/".(date("Y")+543);
$new_date = date("d/m/Y");
echo $new_date;
$new_time = date("H:i:s");
echo $new_time;
$line_id = '0444';
echo $line_id;
$machine_id = '1';
echo $machine_id;
	
$objConnect = mssql_connect("203.154.162.41","sa","Adminchul@book1") or die("Error Connect to Database");
$objDB = mssql_select_db("Line_Project");
$strSQL = "INSERT INTO Attend ";
$strSQL .="(Line_Id,Line_Date,Line_Time,Machine_Id) ";
$strSQL .="VALUES ";
$strSQL .="('$line_id','$new_date','$new_time','$machine_id')";

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
