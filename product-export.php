<?php
include_once 'dbconfig.php';

function filterData(&$str)
{
    $str = preg_replace("/\t/","\\t",$str);
    $str = preg_replace("/\r?\n/","\\n",$str);
    if(strstr($str,'"')) $str = '"' . str_replace('"','""',$str) . '"'; 
}

$fileName = "products-data_" . date('Y-m-d') . ".xls";
$fields = array('ID','PRODUCT NAME','QUANTITY','PRICE','DESCRIPTION');
$excelData = implode("\t",array_values($fields)) . "\n";

$query = $connection->query("SELECT * FROM products ORDER BY id ASC");

if($query->num_rows > 0)
{
    while($row = $query->fetch_assoc())
    {
        $lineData = array($row['id'],$row['product_name'],$row['quantity'],$row['price'],$row['description']);
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
