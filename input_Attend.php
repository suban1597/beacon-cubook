<?php


$API_URL = 'https://api.line.me/v2/bot/message';
//it-beacon
$ACCESS_TOKEN = '4rdPrwctgzH4f52jYbtvykZkki+MN2xZK+finbLthiCRMR1fyBLt+dlKU8ExfQxxcV7ZC9VX+lG/VG5XnZHp7xuoVQs4tyoCNUA0TxZek8M1DqArJBPPalW51qk2NWCu0L1En5v+FdTDw3csua882gdB04t89/1O/w1cDnyilFU='; 
$channelSecret = '39a9b2c7954e9685bc7007335ea632ba';
//it@cubook
//$ACCESS_TOKEN = 'MalHeKonc+s+4OxE1F17SBgCojCXD37LHJpTEmsmUwEm6lAqxZyRN28h5jISMwoKUtuZTNQVw8z6582k6avlNPpED8QLmdMDcTGKSdONAFL4e/PZ+1NGrb0j4M1Q59hnpKYaUT4elMd92DmjRyuyWAdB04t89/1O/w1cDnyilFU=';
//$channelSecret = '2669bb384ac7522ea63d19dd55f324de';

$POST_HEADER = array('Content-Type: application/json', 'Authorization: Bearer ' . $ACCESS_TOKEN);

$request = file_get_contents('php://input');   // Get request content
$request_array = json_decode($request, true);   // Decode JSON to Array
var_export($request_array);            //Mark for "Null" message
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

$fh = fopen('input_Attend.php', 'w');
$ch = curl_init('https://beacon-cubook.herokuapp.com/input_Attend.php');
curl_setopt($ch, CURLOPT_FILE, $fh);
curl_exec($ch);
curl_close($ch);

# at this point your file is not complete and corrupted
#read_file('input_Attend.php');
fclose($fh);

# now you can use your file;

read_file('input_Attend.php');

?>
