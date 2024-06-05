<?php
include_once 'dbconfig.php';

function filterData(&$str)
{
    $str = preg_replace("/\t/","\\t",$str);
    $str = preg_replace("/\r?\n/","\\n",$str);
    if(strstr($str,'"')) $str = '"' . str_replace('"','""',$str) . '"'; 
}

$fileName = "customers-data_" . date('Y-m-d') . ".xls";
$fields = array('ID','NAME','GENDER','EMAIL','ADDRESS','CITY','STATE','MOBILE','PIN CODE');
$excelData = implode("\t",array_values($fields)) . "\n";

$query = $connection->query("SELECT * FROM customers ORDER BY id ASC");

if($query->num_rows > 0)
{
    while($row = $query->fetch_assoc())
    {
        $lineData = array($row['id'],$row['name'],$row['gender'],$row['email'],$row['address'],$row['city'],$row['state'],$row['phone'],$row['pin_code']);
        array_walk($lineData,'filterData');
        $excelData .= implode("\t",array_values($lineData)) . "\n"; 
    }
}
else
{
    $excelData .= "No Records Found" . "\n";
}
header("Content-Type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=\"$fileName\"");

echo $excelData;

exit;
?>
